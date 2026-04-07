<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use GuzzleHttp\Client;

class Konsultasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_jdih');
        $this->load->database();
    }


public function ajax_tanya() {

ini_set('display_errors', 1);
    error_reporting(E_ALL);

    $user_query = $this->input->post('pertanyaan', TRUE);
    
    if (!$user_query) {
        echo json_encode(['status' => 'error', 'message' => 'Pertanyaan tidak boleh kosong']);
        return;
    }

    // 1. Ambil data dari database
    $data_hukum = $this->M_jdih->cari_peraturan($user_query);

    // 2. Susun konteks
    $konteks = "";
    $base_url_dokumen = base_url(''); 

    if (!empty($data_hukum)) {
        foreach ($data_hukum as $item) {
            $konteks .= "Dokumen: " . $item->nama . "\n";
            $konteks .= "Nomor/Tahun: " . $item->no . " / " . $item->tahun . "\n";
            // if(!empty($item->path_peraturan)) $konteks .= "Link Download: " . $base_url_dokumen . $item->path_peraturan . "\n";
             // Kita kirim link download terpisah di object JSON, tapi boleh juga di konteks agar AI tau
             if(!empty($item->path_peraturan)) $konteks .= base_url().$item->path_peraturan."Link Download: [ADA]\n";
            $konteks .= "-------------------\n";
        }
    } else {
        $konteks = "Data spesifik tidak ditemukan di database lokal.";
    }

    // 3. Panggil AI
    $hasil_ai = $this->_panggil_gemini($user_query, $konteks);

    // Fallback logic
    if (strpos($hasil_ai, 'Gagal') !== false || strpos($hasil_ai, 'tidak memberikan') !== false) {
        $hasil_ai = $this->_panggil_groq($user_query, $konteks);
    }

    // Return JSON
    $response = [
        'status' => 'success',
        'answer' => $hasil_ai,
        'documents' => $data_hukum
    ];

    header('Content-Type: application/json');
    echo json_encode($response);
}
	
	
  


private function _panggil_groq($query, $konteks) {
    $client = new Client();
    $apiKey = '<<INSERT YOUR API KEY HERE>>'; 
    $url = "https://api.groq.com/openai/v1/chat/completions";

    // Update Prompt agar lebih instruktif mengenai Link
    $prompt = "Anda adalah asisten cerdas JDIH Pemerintah Kabupaten Bandung Bedas. Tugas Anda menjawab pertanyaan masyarakat.
    
    ATURAN JAWABAN:
    1. Gunakan data produk hukum di bawah ini sebagai referensi utama.
    2. JIKA ada 'Link Download' atau 'Link Abstrak' dalam data, Anda WAJIB menampilkannya agar user bisa mengunduh file tersebut.
    3. Gunakan format Markdown untuk link, contoh: [Download Peraturan Disini](url_link).
    4. Jika data tidak relevan, jawablah dengan sopan.

    DATA REFERENSI:
    $konteks

    PERTANYAAN USER: $query";

    try {
        $response = $client->post($url, [
            'headers' => [
                'Authorization' => 'Bearer ' . $apiKey,
                'Content-Type'  => 'application/json',
            ],
            'json' => [
                'model' => 'llama-3.1-8b-instant', 
                'messages' => [
                    [
                        'role' => 'user', 
                        'content' => $prompt
                    ]
                ],
                'temperature' => 0.5 // Diturunkan sedikit agar AI lebih patuh pada konteks data
            ]
        ]);
        
        $res = json_decode($response->getBody(), true);
        return $res['choices'][0]['message']['content'] ?? "Maaf, AI tidak dapat memberikan jawaban.";
        
    } catch (Exception $e) {
        return "Koneksi ke AI Gagal: " . $e->getMessage();
    }
}


private function _panggil_gemini($query, $konteks) {
    $client = new \GuzzleHttp\Client();
    
    // API Key Anda
    $apiKey = 'AIzaSyBQL65XmZhygu7tJexZ592Fgb2zMY4IHfI'; 
    
    // GUNAKAN VERSI v1 (Lebih Stabil) dan pastikan nama model lengkap
    $url = "https://generativelanguage.googleapis.com/v1/models/gemini-1.5-flash:generateContent?key=" . $apiKey;

    $prompt = "Anda adalah asisten cerdas JDIH Setwan. Tugas Anda menjawab pertanyaan masyarakat.
    
    ATURAN JAWABAN:
    1. Gunakan data produk hukum di bawah ini sebagai referensi utama.
    2. JIKA ada 'Link Download' atau 'Link Abstrak' dalam data, Anda WAJIB menampilkannya.
    3. Gunakan format Markdown untuk link, contoh: [Download Disini](url_link).
    4. Jika data tidak relevan, jawablah dengan sopan.

    DATA REFERENSI:
    $konteks

    PERTANYAAN USER: $query";

    try {
        $response = $client->post($url, [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'json' => [
                'contents' => [
                    [
                        'role' => 'user', // Menambahkan role secara eksplisit
                        'parts' => [
                            ['text' => $prompt]
                        ]
                    ]
                ],
                'generationConfig' => [
                    'temperature' => 0.5,
                    'maxOutputTokens' => 2048,
                ]
            ]
        ]);
        
        $res = json_decode($response->getBody(), true);
        
        // Cek struktur response
        if (isset($res['candidates'][0]['content']['parts'][0]['text'])) {
            return $res['candidates'][0]['content']['parts'][0]['text'];
        } else {
            return "Maaf, AI Gemini tidak memberikan jawaban. Cek status API.";
        }
        
    } catch (\Exception $e) {
        // Jika masih 404, kita tangkap pesan error detailnya
        return "Koneksi ke Gemini Gagal: " . $e->getMessage();
    }
}

}
