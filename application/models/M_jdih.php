<?php
//class M_jdih extends CI_Model {
 // public function cari_peraturan($keyword) {
    // // Kita pastikan kolom 'nama', 'no', 'tahun', dan 'jenis_nama' ada di tabel vs_hukum
    // $this->db->select('nama, no, tahun, jenis_nama'); 
    // $this->db->from('vs_hukum');

    // $words = explode(' ', $keyword);
    // $this->db->group_start();
    // foreach ($words as $word) {
        // if (strlen($word) > 2) { 
            // $this->db->or_like('nama', $word);
        // }
    // }
    // $this->db->group_end();

    // $this->db->limit(5); 
    // return $this->db->get()->result();
//}



//}


class M_jdih extends CI_Model {

    public function cari_peraturan($keyword) {
        if (empty($keyword)) return [];

        $this->db->select('*'); // Mengambil semua kolom sesuai permintaan
        $this->db->from('vs_hukum');

        $words = explode(' ', $keyword);
        
        $this->db->group_start();
        
        // 1. PRIORITAS TERTINGGI: Cek apakah keyword utuh ada di 'nama' atau 'tentang'
        $this->db->like('judul', $keyword);
        $this->db->or_like('tentang', $keyword);
        $this->db->or_like('no', $keyword); // Memudahkan pencarian "UU Nomor 1"
         $this->db->or_like('tahun', $keyword);
           $this->db->or_like('jenis_keterangan', $keyword);
               $this->db->or_like('status_nama', $keyword);

        // 2. PRIORITAS MENENGAH: Cek per kata di kolom-kolom kunci
        foreach ($words as $word) {
            if (strlen($word) > 2) {
                $this->db->or_group_start();
                    $this->db->like('judul', $word);
                    $this->db->or_like('tentang', $word);
                    $this->db->or_like('subjek', $word);
                    $this->db->or_like('pengarang', $word);
                    $this->db->or_like('bidang_hukum', $word);
                    $this->db->or_like('abstrak', $word);
                    $this->db->or_like('tahun', $word);
                $this->db->group_end();
            }
        }
        
        // 3. PRIORITAS TAMBAHAN: Cek di kolom metadata buku/yurisprudensi (jika ada)
        if (count($words) > 1) {
            $this->db->or_like('mg_penerbit', $keyword);
            $this->db->or_like('yuris_nomor_putusan', $keyword);
        }

        $this->db->group_end();

        // Mengurutkan agar hasil terbaru atau yang paling sering dibaca muncul di atas
        $this->db->order_by('tahun', 'DESC');
        $this->db->order_by('dibaca', 'DESC');
        
        $this->db->limit(20); 
        return $this->db->get()->result();
    }
}

