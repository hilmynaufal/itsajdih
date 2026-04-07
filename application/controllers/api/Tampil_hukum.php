<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tampil_hukum extends CI_Controller {

	public function __construct()
	{
 
		parent::__construct();
		$this->load->model('model_hukum');
      	$this->load->model('model_utama');
        date_default_timezone_set('Asia/Jakarta');
        $this->load->database(); // pastikan database sudah di-load
	
	}
  
  public function halamanstatis()
{
    // 1. Pengaturan Kredensial
    $valid_username = 'admin';
    $valid_password = 'password_rahasia543';

    // 2. Ambil data dari Header Authorization
    $user = isset($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : null;
    $pass = isset($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : null;

    // 3. Validasi Basic Auth
    if ($user !== $valid_username || $pass !== $valid_password) {
        header('WWW-Authenticate: Basic realm="API JDIH"');
        header('HTTP/1.0 401 Unauthorized');
        header('Content-Type: application/json');
        echo json_encode([
            "status" => false, 
            "message" => "Akses Ditolak: Username atau Password salah"
        ]);
        exit; // Penting agar firewall tidak membaca proses selanjutnya
    }

    // 4. Jika Auth Berhasil, Jalankan Query
    // Anda bisa menambahkan select() jika ingin membatasi kolom yang tampil
    $query = $this->db->get('halamanstatis');
    $results = $query->result();

    // Base URL untuk gambar halaman statis (sesuaikan path folder jika berbeda)
    $base_url = 'https://jdihd.bandungkab.go.id/asset/foto_statis/';

    // Proses data jika terdapat field gambar
    foreach ($results as &$item) {
        if (isset($item->gambar) && !empty($item->gambar)) {
            $item->gambar = $base_url . $item->gambar;
        }
    }

    $response = [
        'status' => true,
        'total'  => count($results),
        'data'   => $results
    ];

    // 5. Output JSON
    $this->output
         ->set_content_type('application/json')
         ->set_status_header(200)
         ->set_output(json_encode($response));
}
  
  	
	
	public function berita()
{
    // 1. Pengaturan Kredensial (Ganti sesuai keinginan Anda)
    $valid_username = 'admin';
    $valid_password = 'password_rahasia543';

    // 2. Ambil data dari Header Authorization
    $user = isset($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : null;
    $pass = isset($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : null;

    // 3. Validasi Basic Auth
    if ($user !== $valid_username || $pass !== $valid_password) {
        header('WWW-Authenticate: Basic realm="API JDIH"');
        header('HTTP/1.0 401 Unauthorized');
        header('Content-Type: application/json');
        echo json_encode([
            "status" => false, 
            "message" => "Akses Ditolak: Username atau Password salah"
        ]);
        exit; // Menghentikan eksekusi agar tidak bocor ke bawah
    }

    // 4. Jika Auth Berhasil, Jalankan Query Data Berita
	$this->db->select('id_berita, id_kategori, judul, judul_seo, headline, isi_berita, hari, tanggal, jam, gambar, dibaca, tag');
    $this->db->order_by('tanggal', 'DESC');
    $query = $this->db->get('berita');
    $results = $query->result();

    // Base URL gambar
    $base_url = 'https://jdih.bandungkab.go.id/asset/foto_berita/';

    // Ubah field gambar jadi URL lengkap
    foreach ($results as &$item) {
        if (!empty($item->gambar)) {
            $item->gambar = $base_url . $item->gambar;
        }
    }

    $response = [
        'status' => true,
        'data' => $results,
        'total' => count($results)
    ];

    // 5. Output JSON
    $this->output
         ->set_content_type('application/json')
         ->set_status_header(200) // Memastikan status 200 OK
         ->set_output(json_encode($response));
}

	
	public function search() {
    // --- START BASIC AUTH ---
    $valid_username = 'admin';
    $valid_password = 'password_rahasia543';

    $user = isset($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : null;
    $pass = isset($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : null;

    if ($user !== $valid_username || $pass !== $valid_password) {
        header('WWW-Authenticate: Basic realm="API JDIH"');
        header('HTTP/1.0 401 Unauthorized');
        header('Content-Type: application/json');
        echo json_encode(["status" => false, "message" => "Akses Ditolak"]);
        exit;
    }
    // --- END BASIC AUTH ---

    // Ambil parameter
    $keyword = $this->input->get('keyword');
    $kategori = $this->input->get('kategori');
    $tahun = $this->input->get('tahun');
    $nomor = $this->input->get('nomor');

    // Validasi input minimal satu parameter
    if (empty($keyword) && empty($kategori) && empty($tahun) && empty($nomor)) {
        $this->output
            ->set_content_type('application/json')
            ->set_status_header(400)
            ->set_output(json_encode([
                'status' => false,
                'message' => 'Setidaknya satu parameter pencarian harus diisi.'
            ]));
        return;
    }
    
    // Panggil Model
    $results = $this->Model_hukum->search($keyword, $kategori, $tahun, $nomor);
    
    $response = [
        'status' => true,
        'total' => count($results),
        'data' => $results
    ];
    
    $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($response));
}
	

    public function statistik()
    {
        // Ambil data dari model
        $pengunjung = $this->model_utama->pengunjung()->num_rows();
        $totalpengunjung = $this->model_utama->totalpengunjung()->row_array();
        $hits = $this->model_utama->hits()->row_array();
        $pengunjungonline = $this->model_utama->pengunjungonline()->num_rows();

        // Susun data response
        $data = [
            'user_online'        => (int) $pengunjungonline,
            'today_visitor'      => (int) $pengunjung,
            'today_hit'          => (int) ($hits['total'] ?? 0),
            'total_pengunjung'   => (int) ($totalpengunjung['total'] ?? 0),
            'tanggal'            => date('Y-m-d H:i:s'),
        ];

        // Response API
        $response = [
            'status' => true,
            'message' => 'Data statistik pengunjung',
            'data' => $data
        ];

        // Output JSON
        $this->output
             ->set_content_type('application/json')
             ->set_output(json_encode($response));
    }
	
	// =============================
    //  DOKUMEN TERBARU
    // =============================
   public function hukum_terbaru()
{
    // 1. Pengaturan Kredensial
    $valid_username = 'admin';
    $valid_password = 'password_rahasia543';

    // 2. Ambil data dari Header Authorization
    $user = isset($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : null;
    $pass = isset($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : null;

    // 3. Validasi Basic Auth
    if ($user !== $valid_username || $pass !== $valid_password) {
        header('WWW-Authenticate: Basic realm="API JDIH"');
        header('HTTP/1.0 401 Unauthorized');
        header('Content-Type: application/json');
        echo json_encode([
            "status" => false, 
            "message" => "Akses Ditolak: Username atau Password salah"
        ]);
        exit; // Menghentikan eksekusi agar tidak terjadi error lanjutan
    }

    // 4. Pastikan model dimuat (Mencegah Error 500)
    $this->load->model('model_utama');

    // 5. Jalankan Query
    $query = $this->model_utama->hukum_kategori();
    $results = $query->result();

    // Base URL dokumen
    $base_url = 'https://jdih.bandungkab.go.id/asset/dokumen/';

    // Format data untuk menyertakan URL lengkap dokumen
    foreach ($results as &$item) {
        if (!empty($item->file_dokumen)) {
            $item->file_url = $base_url . $item->file_dokumen;
        } else {
            $item->file_url = null;
        }
    }

    // Susun Response
    $response = [
        'status'  => true,
        'message' => 'Data dokumen terbaru',
        'total'   => count($results),
        'data'    => $results
    ];

    // 6. Output JSON
    $this->output
         ->set_content_type('application/json')
         ->set_status_header(200)
         ->set_output(json_encode($response));
}

    // =============================
    //  DOKUMEN TERPOPULER
    // =============================
   public function hukum_populer()
{
    // 1. Pengaturan Kredensial (Sesuaikan dengan kredensial API Anda)
    $valid_username = 'admin';
    $valid_password = 'password_rahasia543';

    // 2. Mengambil data dari Header HTTP Authorization
    $user = isset($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : null;
    $pass = isset($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : null;

    // 3. Verifikasi Keamanan
    if ($user !== $valid_username || $pass !== $valid_password) {
        // Jika gagal, kirim header untuk memicu dialog login di browser/mobile
        header('WWW-Authenticate: Basic realm="API JDIH"');
        header('HTTP/1.0 401 Unauthorized');
        header('Content-Type: application/json');
        
        echo json_encode([
            "status" => false, 
            "message" => "Akses Ditolak: Kredensial salah atau tidak ditemukan"
        ]);
        exit; // Menghentikan eksekusi agar tidak bocor ke logika bisnis
    }

    // 4. Pastikan Model sudah ter-load (Mencegah Error 500)
    $this->load->model('model_utama');

    // 5. Eksekusi Query melalui Model
    $query = $this->model_utama->hukum_populer();
    $results = $query->result();

    // Base URL lokasi file dokumen
    $base_url = 'https://jdih.bandungkab.go.id/asset/dokumen/';

    // 6. Formatting URL Dokumen Lengkap
    foreach ($results as &$item) {
        if (!empty($item->file_dokumen)) {
            $item->file_url = $base_url . $item->file_dokumen;
        } else {
            $item->file_url = null;
        }
    }

    // Menyusun struktur response JSON
    $response = [
        'status'  => true,
        'message' => 'Data dokumen terpopuler',
        'total'   => count($results),
        'data'    => $results
    ];

    // 7. Mengirimkan Output
    $this->output
         ->set_content_type('application/json')
         ->set_status_header(200) // Status OK
         ->set_output(json_encode($response));
}
  
  	public function detail($id = null)
    {
        // Jika ID tidak dikirim
        if ($id === null) {
            $response = [
                'status' => false,
                'message' => 'Parameter ID diperlukan',
                'data' => [],
                'total' => 0
            ];

            return $this->output
                        ->set_content_type('application/json')
                        ->set_output(json_encode($response));
        }

        // Ambil data dari model
        $data = $this->model_hukum->detail($id);

        // Tambahkan file_url jika ada
        if ($data) {
            $response = [
                'status' => true,
                'message' => 'Detail dokumen hukum',
                'data' => [$data],
                'total' => 1
            ];
        } else {
            $response = [
                'status' => false,
                'message' => 'Data hukum tidak ditemukan',
                'data' => [],
                'total' => 0
            ];
        }

        // Kirim response JSON
        $this->output
             ->set_content_type('application/json')
             ->set_output(json_encode($response));
    }


	
	
	public function rekapjdih()
{
    // 1. Tentukan Username & Password (bisa dipindah ke config atau database)

	$valid_username = 'admin';
    $valid_password = 'password_rahasia543';

    // 2. Ambil data dari Header Authorization
    $user = isset($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : null;
    $pass = isset($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : null;

    // 3. Validasi
    if ($user !== $valid_username || $pass !== $valid_password) {
        // Jika gagal, kirim status 401 Unauthorized
        header('WWW-Authenticate: Basic realm="API JDIH"');
        header('HTTP/1.0 401 Unauthorized');
        echo json_encode(["status" => false, "message" => "Akses Ditolak: Username atau Password salah"]);
        return;
    }

    // 4. Jika Berhasil, Jalankan Query
    $query = $this->model_utama->rekap_hukum();
    $result = $query->result_array();

    // Set header sebagai JSON
    header('Content-Type: application/json');
    echo json_encode($result);
}
	
	
	


	public function rekaptahun()

    {
		$query = $this->db->query("SELECT round(B.tahun) as name, count(B.id_jenis) as value 
       
		FROM (SELECT A.* FROM (SELECT	hukum.id,hukum.id_jenis,hukum.id_status,hukum.nama,hukum.`no`,hukum.tahun,hukum.tanggal_ditetapkan,hukum.tanggal_diundangkan,	hukum.katalog,hukum.abstrak,	hukum.penganti,	hukum.jumlah_unduh,	hukum.visible,	hukum.created_at,	hukum.created_by,	hukum.updated_at,
	  hukum.updated_by,jenis_hukum.jenis_id,	jenis_hukum.jenis_nama,	jenis_hukum.jenis_level,jenis_hukum.jenis_keterangan,status_hukum.status_id,status_hukum.status_nama FROM hukum INNER JOIN jenis_hukum ON hukum.id_jenis = jenis_hukum.jenis_id
	  INNER JOIN status_hukum ON status_hukum.status_id=hukum.id_status )A  )B GROUP BY B.tahun order BY B.tahun ASC");
        $result= $query->result_array();

		echo json_encode($result);
    }
	
	
		public function kategorihukum()
{
    // 1. Pengaturan Kredensial
    $valid_username = 'admin';
    $valid_password = 'password_rahasia543';

    // 2. Ambil data dari Header Authorization
    $user = isset($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : null;
    $pass = isset($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : null;

    // 3. Validasi Basic Auth
    if ($user !== $valid_username || $pass !== $valid_password) {
        header('WWW-Authenticate: Basic realm="API JDIH"');
        header('HTTP/1.0 401 Unauthorized');
        header('Content-Type: application/json');
        
        echo json_encode([
            "status" => false, 
            "message" => "Akses Ditolak: Username atau Password salah"
        ]);
        exit; // Menghentikan proses agar tidak mengeksekusi query database
    }

    // 4. Jalankan Query Database
    $query = $this->db->query("SELECT
            jenis_hukum.jenis_id,
            jenis_hukum.jenis_nama,
            jenis_hukum.jenis_level,
            jenis_hukum.jenis_keterangan
        FROM
            jenis_hukum");
    $result = $query->result_array();

    // 5. Output Response JSON
    $this->output
         ->set_content_type('application/json')
         ->set_status_header(200)
         ->set_output(json_encode([
             'status' => true,
             'total'  => count($result),
             'data'   => $result
         ]));
}
        
     
        
        
       

	



}


