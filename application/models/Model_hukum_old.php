<?php
class Model_hukum extends CI_model
{


    public function __construct()
{
    parent::__construct();
    // Load model agar bisa digunakan di semua function dalam controller ini
    $this->load->model('Model_hukum');
}

    protected $v_hukum = 'v_hukum';


    public function get_jenis_dokumen() {
        return $this->db->get('jenis_dokumen')->result_array();
    }


     public function get_status_hukum() {
        return $this->db->get('status_hukum')->result_array();
    }

    public function get_subjenis_hukum($id_kategori) {
        return $this->db->get_where('jenis_hukum', ['jenis_dokumen' => $id_kategori])->result_array();
    }

    // digunakan untuk frontend
    function semua_hukum()
    {
        return json_encode($this->db->query("SELECT * FROM `hukum`
                                JOIN `jenis_hukum` ON hukum.id_jenis = jenis_hukum.jenis_id
                                JOIN `status_hukum` ON hukum.id_status = status_hukum.status_id
                                WHERE hukum.visible = '1'
                                ORDER BY tahun DESC
                                ")->result());
    }

    function semua_hukum_mobile()
    {
        return $this->db->query("SELECT * FROM `hukum`
                                JOIN `jenis_hukum` ON hukum.id_jenis = jenis_hukum.jenis_id
                                JOIN `status_hukum` ON hukum.id_status = status_hukum.status_id
                                LEFT JOIN `file_hukum` ON file_hukum.file_id_hukum = hukum.id
                                WHERE hukum.visible = '1'
                                AND jenis_hukum.jenis_visible = '1' ORDER BY tahun DESC")->result();
    }

    function semua_hukum_mobile_limit($limit = 0)
    {
        return $this->db->query("SELECT * FROM `hukum`
                                JOIN `jenis_hukum` ON hukum.id_jenis = jenis_hukum.jenis_id
                                JOIN `status_hukum` ON hukum.id_status = status_hukum.status_id
                                LEFT JOIN `file_hukum` ON file_hukum.file_id_hukum = hukum.id
                                WHERE hukum.visible = '1' ORDER BY tahun DESC LIMIT $limit ")->result();
    }

    function semua_hukum_mobile_limit_uud($limit = 0)
    {
        return $this->db->query("SELECT * FROM `hukum`
                                JOIN `jenis_hukum` ON hukum.id_jenis = jenis_hukum.jenis_id
                                JOIN `status_hukum` ON hukum.id_status = status_hukum.status_id
                                LEFT JOIN `file_hukum` ON file_hukum.file_id_hukum = hukum.id
                                WHERE hukum.visible = '1'
                                AND jenis_hukum.jenis_nama = 'Undang Undang Dasar 1945'
                                ORDER BY tahun DESC
                                LIMIT $limit
                                ")->result();
    }

    function semua_hukum_mobile_limit_perda($limit = 0)
    {
        return $this->db->query("SELECT * FROM `hukum`
                                JOIN `jenis_hukum` ON hukum.id_jenis = jenis_hukum.jenis_id
                                JOIN `status_hukum` ON hukum.id_status = status_hukum.status_id
                                LEFT JOIN `file_hukum` ON file_hukum.file_id_hukum = hukum.id
                                WHERE hukum.visible = '1'
                                AND jenis_hukum.jenis_nama = 'Peraturan Daerah Kabupaten'
                                ORDER BY tahun DESC
                                LIMIT $limit
                                ")->result();
    }

    function semua_hukum_mobile_limit_perbup($limit = 0)
    {
        return $this->db->query("SELECT * FROM `hukum`
                                JOIN `jenis_hukum` ON hukum.id_jenis = jenis_hukum.jenis_id
                                JOIN `status_hukum` ON hukum.id_status = status_hukum.status_id
                                LEFT JOIN `file_hukum` ON file_hukum.file_id_hukum = hukum.id
                                WHERE hukum.visible = '1'
                                AND jenis_hukum.jenis_nama = 'Peraturan Bupati'
                                ORDER BY tahun DESC
                                LIMIT $limit
                                ")->result();
    }

    function semua_hukum_mobile_limit_perdprd($limit = 0)
    {
        return $this->db->query("SELECT * FROM `hukum`
                                JOIN `jenis_hukum` ON hukum.id_jenis = jenis_hukum.jenis_id
                                JOIN `status_hukum` ON hukum.id_status = status_hukum.status_id
                                LEFT JOIN `file_hukum` ON file_hukum.file_id_hukum = hukum.id
                                WHERE hukum.visible = '1'
                                AND jenis_hukum.jenis_nama = 'Peraturan DPRD'
                                ORDER BY tahun DESC
                                LIMIT $limit
                                ")->result();
    }

    function semua_hukum_mobile_limit_kepbup($limit = 0)
    {
        return $this->db->query("SELECT * FROM `hukum`
                                JOIN `jenis_hukum` ON hukum.id_jenis = jenis_hukum.jenis_id
                                JOIN `status_hukum` ON hukum.id_status = status_hukum.status_id
                                LEFT JOIN `file_hukum` ON file_hukum.file_id_hukum = hukum.id
                                WHERE hukum.visible = '1'
                                AND jenis_hukum.jenis_nama = 'Keputusan Bupati'
                                ORDER BY tahun DESC
                                LIMIT $limit
                                ")->result();
    }

    function semua_hukum_mobile_limit_perdes($limit = 0)
    {
        return $this->db->query("SELECT * FROM `hukum`
                                JOIN `jenis_hukum` ON hukum.id_jenis = jenis_hukum.jenis_id
                                JOIN `status_hukum` ON hukum.id_status = status_hukum.status_id
                                LEFT JOIN `file_hukum` ON file_hukum.file_id_hukum = hukum.id
                                WHERE hukum.visible = '1'
                                AND jenis_hukum.jenis_nama = 'Peraturan Desa'
                                ORDER BY tahun DESC
                                LIMIT $limit
                                ")->result();
    }

    function semua_hukum_mobile_limit_nasak($limit = 0)
    {
        return $this->db->query("SELECT * FROM `hukum`
                                JOIN `jenis_hukum` ON hukum.id_jenis = jenis_hukum.jenis_id
                                JOIN `status_hukum` ON hukum.id_status = status_hukum.status_id
                                LEFT JOIN `file_hukum` ON file_hukum.file_id_hukum = hukum.id
                                WHERE hukum.visible = '1'
                                AND jenis_hukum.jenis_nama = 'Naskah Akademik'
                                ORDER BY tahun DESC
                                LIMIT $limit
                                ")->result();
    }

    function search_semua_hukum($kategori, $nomor, $tahun, $tentang)
    {


        $kategori = $_GET['kategori'];
        $tahun = $_GET['tahun'];
        $tentang = $_GET['tentang'];
        $kategori = $_GET['kategori'];

        $data_ = filter_var($tentang, FILTER_SANITIZE_NUMBER_INT);


        if (preg_match('~[0-9]+~', $tentang)) {
            $nomor_ = $data_;
        } else {
            $nomor_ = "";

        }


        $cari = "SELECT
                    v_hukum.nama, 
                    v_hukum.`no`, 
                    v_hukum.tahun, 
                    v_hukum.tanggal_ditetapkan, 
                    v_hukum.tanggal_diundangkan, 
                    v_hukum.id_status, 
                    v_hukum.id_jenis, 
                    v_hukum.abstrak, 
                    v_hukum.penganti, 
                    v_hukum.katalog, 
                    v_hukum.jenis_id, 
                    v_hukum.jenis_nama,
                    v_hukum.status_nama
FROM
	v_hukum where 1=1 ";

        if ($kategori != '')
            $cari .= " AND v_hukum.jenis_id ='$kategori'";
        if ($tentang != '')
            $cari .= " AND v_hukum.nama LIKE '%$tentang%' ";
        if ($tahun != '')
            $cari .= " AND v_hukum.tahun ='$tahun'";


        return json_encode($this->db->query($cari)->result());

    }

    function search_semua_hukum_mobile($kategori, $nomor, $tahun, $tentang)
    {
        $this->db->select('*');
        $this->db->from('hukum');
        $this->db->join('jenis_hukum', 'hukum.id_jenis = jenis_hukum.jenis_id');
        $this->db->join('status_hukum', 'hukum.id_status = status_hukum.status_id');
        $this->db->join('file_hukum', 'file_hukum.file_id_hukum = hukum.id', 'left');
        if ($kategori == 'all') {
            if ($tahun == 1) {
                if (!empty($nomor) && !empty($tentang)) {
                    $this->db->where('hukum.no', $nomor);
                    $this->db->like('hukum.nama', $tentang);
                } else if (!empty($nomor)) {
                    $this->db->where('hukum.no', $nomor);
                } else if (!empty($tentang)) {
                    $this->db->like('hukum.nama', $tentang);
                }
            } else if ($tahun != 1) {
                if (!empty($nomor) && !empty($tentang)) {
                    $this->db->where('hukum.no', $nomor);
                    $this->db->like('hukum.nama', $tentang);
                } else if (!empty($nomor)) {
                    $this->db->where('hukum.no', $nomor);
                } else if (!empty($tentang)) {
                    $this->db->like('hukum.nama', $tentang);
                }
                $this->db->where('hukum.tahun', $tahun);
            }
        } else if ($tahun == 1) {
            if ($kategori == 'all') {
                if (!empty($nomor) && !empty($tentang)) {
                    $this->db->where('hukum.no', $nomor);
                    $this->db->like('hukum.nama', $tentang);
                } else if (!empty($nomor)) {
                    $this->db->where('hukum.no', $nomor);
                } else if (!empty($tentang)) {
                    $this->db->like('hukum.nama', $tentang);
                }
            } else if ($kategori != 'all') {
                if (!empty($nomor) && !empty($tentang)) {
                    $this->db->where('hukum.no', $nomor);
                    $this->db->like('hukum.nama', $tentang);
                } else if (!empty($nomor)) {
                    $this->db->where('hukum.no', $nomor);
                } else if (!empty($tentang)) {
                    $this->db->like('hukum.nama', $tentang);
                }
                $this->db->where('hukum.id_jenis', $kategori);
            }
        } else if ($kategori == 'all' && $tahun == 1) {
            if (!empty($nomor) && !empty($tentang)) {
                $this->db->where('hukum.no', $nomor);
                $this->db->like('hukum.nama', $tentang);
            } else if (!empty($nomor)) {
                $this->db->where('hukum.no', $nomor);
            } else if (!empty($tentang)) {
                $this->db->like('hukum.nama', $tentang);
            }
        } else {
            if (!empty($nomor) && !empty($tentang)) {
                $this->db->where('hukum.no', $nomor);
                $this->db->like('hukum.nama', $tentang);
            } else if (!empty($nomor)) {
                $this->db->where('hukum.no', $nomor);
            } else if (!empty($tentang)) {
                $this->db->like('hukum.nama', $tentang);
            }
            $this->db->where('hukum.id_jenis', $kategori);
            $this->db->where('hukum.tahun', $tahun);
        }

        $this->db->where('hukum.visible', 1);
        return json_encode($this->db->get()->result());
    }

    function jenis_hukum_mobile($kategori)
    {
        $this->db->select('jenis_id');
        $this->db->where('jenis_nama', $kategori);
        $query = $this->db->get('jenis_hukum')->row();
        return $query;
    }
	
	
public function detail_hukum($id) {
    return $this->db->select('
            id, id_jenis, id_status, nama, nama_inggris, no, tahun, 
            tanggal_ditetapkan, tanggal_diundangkan, katalog, abstrak, 
            penganti, jumlah_unduh, dibaca, didownload, visible, sumber, 
            subjek, status_peraturan, bahasa, lokasi, bidang_hukum, 
            kode_lampiran, tempat_penetapan, tentang, jenis_dokumen, 
            created_at, updated_at, status_nama, 
            jenis_id, jenis_nama, jenis_keterangan, path_file_abstrak, 
            path_file_inggris, path_peraturan as file_path, dokumen_id, nama_dokumen, judul,
            pengarang
        ')
        ->from('vs_hukum')
        ->where('visible', 1)
        ->where('id', $id)
        ->group_by('id') // Sebenarnya tidak wajib jika ID adalah Primary Key
        ->get()
        ->row();
}

    // function detail_hukum($id)
    // {

        // //return $this->db->query("SELECT * from `v_hukum`  WHERE v_hukum.id=  ". $id ." ");
        // return $this->db->query("SELECT
// hukum.id, 
// hukum.id_jenis, 
// hukum.id_status, 
// hukum.nama, 
// hukum.nama_inggris, 
// hukum.`no`, 
// hukum.tahun, 
// hukum.tanggal_ditetapkan, 
// hukum.tanggal_diundangkan, 
// hukum.katalog, 
// hukum.abstrak, 
// hukum.penganti, 
// hukum.jumlah_unduh, 
// hukum.dibaca, 
// hukum.didownload, 
// hukum.visible, 
// hukum.sumber as sumber, 
// hukum.subjek, 
// hukum.status_peraturan, 
// hukum.bahasa, 
// hukum.lokasi, 
// hukum.bidang_hukum, 
// hukum.kode_lampiran, 
// hukum.tempat_penetapan,
// hukum.pengarang,
// hukum.tentang,
// hukum.mg_nomor_panggil,
// hukum.mg_cetakan_edisi,
// hukum.mg_tempat_terbit,
// hukum.mg_penerbit,
// hukum.mg_tahun_terbit,
// hukum.mg_deskripsi_fisik,
// hukum.mg_isbn,
// hukum.mg_nomorinduk_buku,
// hukum.yuris_nomor_putusan,
// hukum.yuris_singakatanjenis_peradilan,
// hukum.yuris_tempat_peradilan,
// hukum.yuris_tglbln_dibacakan,
// hukum.yuris_jenis_peradilan,
// hukum.created_at,
	// `status_hukum`.`status_nama` AS `status_nama`,
	// `jenis_hukum`.`jenis_id` AS `jenis_id`,
	// `jenis_hukum`.`jenis_nama` AS `jenis_nama`,
	// `jenis_hukum`.`jenis_keterangan` AS `jenis_keterangan`,
	// file_abstrak.path_file AS path_file_abstrak, 
	// file_hukum_inggris.file_path AS path_file_inggris,
	// file_hukum.file_path AS path_peraturan,
    // `file_hukum`.`file_path` AS `file_path`,
	// `file_hukum`.file_id_hukum AS `file_id_hukum`,
    	// jenis_dokumen.dokumen_id AS dokumen_id,
	// jenis_dokumen.nama_dokumen AS nama_dokumen
	
// FROM
	// ((((((
						// `hukum`
						// JOIN `file_hukum` ON ((
								// `file_hukum`.`file_id_hukum` = `hukum`.`id` 
							// )))
					// JOIN `status_hukum` ON ((
							// `status_hukum`.`status_id` = `hukum`.`id_status` 
						// )))
				// JOIN `jenis_hukum` ON ((
						// `jenis_hukum`.`jenis_id` = `hukum`.`id_jenis` 
					// )))
			 // LEFT JOIN `file_abstrak` ON ((
					// file_abstrak.file_id_hukum = hukum.id 
				// )))
		// LEFT JOIN `file_hukum_inggris` ON ((
				// file_hukum_inggris.file_id_hukum = hukum.id 
			// ))) 
            // LEFT JOIN `jenis_dokumen` ON ((
				// jenis_dokumen.dokumen_id = hukum.jenis_dokumen 
			// ))) 
// WHERE
	// ( `hukum`.`visible` = 1 AND hukum.id=  ".$id." ) 
// GROUP BY
	// `hukum`.`id` ")->row();
    // }
    // digunakan untuk backend

    // function list_hukum_rss()
    // {
        // return $this->db->query("SELECT * FROM `hukum`s
                                // JOIN `jenis_hukum` ON hukum.id_jenis = jenis_hukum.jenis_id
                                // JOIN `status_hukum` ON hukum.id_status = status_hukum.status_id
                                // WHERE hukum.visible = 1
                                // ORDER BY nama DESC LIMIT 10");
    // }

    function list_hukum()
    {
        return $this->db->query("SELECT id, id_jenis, id_status, nama, `no`, tahun, tanggal_ditetapkan, tanggal_diundangkan, 
        katalog, abstrak, penganti, jumlah_unduh, dibaca, didownload,hukum.visible
        FROM hukum
        LEFT JOIN `jenis_hukum` ON hukum.id_jenis = jenis_hukum.jenis_id
        LEFT  JOIN `status_hukum` ON hukum.id_status = status_hukum.status_id
        WHERE hukum.visible = 1 ");
    }

    function list_hukum_edit($id)
    {
        return $this->db->query("SELECT
	hukum.id,
	hukum.id AS id_hukum,
	hukum.id_jenis,
	hukum.id_status,
	hukum.nama,
	hukum.tempat_penetapan,
	hukum.nama_inggris,
	hukum.`no`,
	hukum.tahun,
	hukum.tanggal_ditetapkan,
	hukum.tanggal_diundangkan,
	hukum.katalog,
	hukum.abstrak,
	hukum.penganti,
	hukum.jumlah_unduh,
	hukum.dibaca,
	hukum.didownload,
	hukum.visible,
	hukum.sumber,
	hukum.subjek,
	hukum.status_peraturan,
	hukum.bahasa,
	hukum.lokasi,
	hukum.bidang_hukum,
	hukum.kode_lampiran,
	hukum.pengarang,
	hukum.tentang,
	hukum.jenis_dokumen,
   hukum.mg_nomor_panggil, 
	hukum.mg_cetakan_edisi, 
	hukum.mg_tempat_terbit, 
	hukum.mg_penerbit, 
	hukum.mg_tahun_terbit, 
	hukum.mg_deskripsi_fisik, 
	hukum.mg_isbn, 
	hukum.mg_nomorinduk_buku, 
	hukum.yuris_nomor_putusan, 
	hukum.yuris_singakatanjenis_peradilan, 
	hukum.yuris_tempat_peradilan, 
	hukum.yuris_tglbln_dibacakan, 
	hukum.yuris_jenis_peradilan, 
	jenis_hukum.jenis_id,
	jenis_hukum.jenis_nama,
	jenis_hukum.jenis_level,
	jenis_hukum.jenis_visible,
	jenis_hukum.jenis_keterangan,
	status_hukum.status_id,
	status_hukum.status_nama,
	jenis_dokumen.nama_dokumen
	 
FROM
	hukum
	JOIN jenis_hukum ON hukum.id_jenis = jenis_hukum.jenis_id
	JOIN status_hukum ON hukum.id_status = status_hukum.status_id 
	join jenis_dokumen ON hukum.jenis_dokumen=jenis_dokumen.dokumen_id
WHERE hukum.visible = 1 AND hukum.id = $id");
    }


    function list_pdf($id)
    {
        return $this->db->query("SELECT * FROM `file_hukum` WHERE file_hukum.file_id_hukum = " . $id . " ORDER BY created_by DESC");
    }
    function jenis_hukum()
    {
        return $this->db->query("SELECT * FROM `jenis_hukum` ORDER BY jenis_nama DESC");
    }

    function level_hukum()
    {
        return $this->db->query("SELECT * FROM `level_hukum` ORDER BY level_hukum__nama DESC");
    }

    function status_hukum()
    {
        return $this->db->query("SELECT * FROM `status_hukum` ORDER BY status_nama DESC");
    }

    function list_hukum_tambah()
    {

        //var_dump($_POST) or die();

        $datadb = array(
            'nama' => $this->input->post('nama_indonesia'),
            'nama_inggris' => $this->input->post('nama_inggris'),
            'tentang' => $this->input->post('tentang'),
            'no' => $this->input->post('no'),
            'tahun' => $this->db->escape_str($this->input->post('tahun')),
            'tempat_penetapan' => $this->db->escape_str($this->input->post('tempat_penetapan')),
            'tanggal_ditetapkan' => $this->db->escape_str($this->input->post('tgl_ditetapkan')),
            'tanggal_diundangkan' => $this->db->escape_str($this->input->post('tgl_diundangkan')),
            'id_jenis' => $this->input->post('jenis'),
            'id_status' => $this->input->post('status'),
            'abstrak' => $this->input->post('abstrak'),
            'katalog' => $this->input->post('katalog'),
            'sumber' => $this->input->post('sumber'),
            'subjek' => $this->input->post('subjek'),
            'status_peraturan' => $this->input->post('status_peraturan'),
            'bahasa' => $this->input->post('bahasa'),
            'lokasi' => $this->input->post('lokasi'),
            'pengarang' => $this->input->post('pengarang'),
            'kode_lampiran' => $this->input->post('kode_lampiran'),
            'bidang_hukum' => $this->input->post('bidang_hukum'),
            'jenis_dokumen' => $this->input->post('kategori'),
            'created_at' => date('Y-m-d H:i:s'),
            'dibaca' => 0,
            'didownload' => 0,
            'mg_nomor_panggil ' => $this->input->post('mg_nomor_panggil'),
            'mg_cetakan_edisi ' => $this->input->post('mg_cetakan_edisi'),
            'mg_tempat_terbit ' => $this->input->post('mg_tempat_terbit'),
            'mg_penerbit ' => $this->input->post('mg_penerbit'),
            'mg_tahun_terbit ' => $this->input->post('mg_tahun_terbit'),
            'mg_deskripsi_fisik ' => $this->input->post('mg_deskripsi_fisik'),
            'mg_isbn ' => $this->input->post('mg_isbn'),
            'mg_nomorinduk_buku' => $this->input->post('mg_nomorinduk_buku'),
            'yuris_nomor_putusan' =>  $this->db->escape_str($this->input->post('yuris_nomor_putusan')),
            'yuris_singakatanjenis_peradilan ' => $this->input->post('yuris_singakatanjenis_peradilan'),
            'yuris_tempat_peradilan'  => $this->input->post('yuris_tempat_peradilan'),
            'yuris_tglbln_dibacakan ' => $this->db->escape_str($this->input->post('yuris_tglbln_dibacakan')),
            'yuris_jenis_peradilan' => $this->input->post('yuris_jenis_peradilan')
            


        );

        $new_name = 'No_' .$this->input->post('no'). '_' . 'Tahun_' . $this->input->post('tahun');



        //upload versi inggris

        $uploadDir = './asset/file_hukum/';

        // Ensure the uploads directory exists
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // File details
        $fileName = basename($_FILES['userfile']['name']);
        $fileType = $_FILES['userfile']['type'];
        $fileTmpPath = $_FILES['userfile']['tmp_name'];
        $fileSize = $_FILES['userfile']['size'];
        $destPath = $uploadDir . $fileName;
        $originalName = $_FILES['userfile']['name']; // Nama asli file

        $new_name = 'No_' . $this->db->escape_str($this->input->post('no')) . '_' . 'Tahun_' . $this->input->post('tahun');

        $fileExtension = pathinfo($originalName, PATHINFO_EXTENSION);

        // Ganti nama file
        $newFileName = replaceToUnderscore(($new_name)). '_' . uniqid('_', true) . '.' . $fileExtension;

        // Path lengkap untuk penyimpanan
        $destPath = $uploadDir . $newFileName;

      //  var_dump($newFileName) or die();



        if (move_uploaded_file($fileTmpPath, $destPath)) {
            // echo "File berhasil diunggah dengan nama: $newFileName";
            $this->db->insert('hukum', $datadb);
            $id = $this->db->insert_id();
            $data1 = array(
                'file_path' => '/asset/file_hukum/' . $newFileName,
                'file_id_hukum' => $id
            );
            $this->db->insert('file_hukum', $data1);


        } else {
            echo "Terjadi kesalahan saat mengunggah file.";
        }




        // upload hukum

        $uploadDirectory = './asset/file_lampiran/';
        // Check if the upload directory exists, if not, create it
        if (!is_dir($uploadDirectory)) {
            mkdir($uploadDirectory, 0777, true);
        }
        // Process the uploaded files
        if (isset($_FILES['lampiran'])) {
            $files = $_FILES['lampiran'];
            $errors = [];
            $success = [];

            foreach ($files['name'] as $key => $originalFileName) {
                $fileTmpName = $files['tmp_name'][$key];
                $fileError = $files['error'][$key];
                $fileSize = $files['size'][$key];

                // Generate a unique new file name
                $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);
                $new_name_lampiran = 'Lampiran_No_' . $this->db->escape_str($this->input->post('no')) . '_' . 'Tahun_' . $this->input->post('tahun');
                $newFileName = $new_name_lampiran . '_' . uniqid('file_', true) . '.' . $fileExtension;

                $targetFilePath = $uploadDirectory . $newFileName;

                if (isset($_FILES['lampiran'])) {

                    // Check for upload errors
                    if ($fileError === UPLOAD_ERR_OK) {

                        // Move the uploaded file and rename it
                        if (move_uploaded_file($fileTmpName, $targetFilePath)) {



                            $success[] = "File uploaded successfully as " . $newFileName;
                            $data1 = array(
                                'file_path' => '/asset/file_hukum/' . $newFileName,
                                'file_id_hukum' => $id
                            );
                            $this->db->insert('file_lampiran', $data1);


                        }


                    } else {
                        $errors[] = "Failed to upload " . $originalFileName;
                    }
                } else {
                    $errors[] = "Error uploading " . $originalFileName . " (Error Code: $fileError)";
                }
            }



            // Display upload results
            if (!empty($success)) {
                echo "Successfully uploaded files:<br>";
                foreach ($success as $msg) {
                    echo $msg . "<br>";


                }
            }

            if (!empty($errors)) {
                echo "Errors encountered:<br>";
                foreach ($errors as $msg) {
                    echo $msg . "<br>";
                }
            }



        } else {
            echo "No files were uploaded.";
        }


        //upload abstrak

        $uploadDir = './asset/file_abstrak/';

        // Ensure the uploads directory exists
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // File details
        $fileName = basename($_FILES['abstrak']['name']);
        $fileType = $_FILES['abstrak']['type'];
        $fileTmpPath = $_FILES['abstrak']['tmp_name'];
        $fileSize = $_FILES['abstrak']['size'];
        $destPath = $uploadDir . $fileName;
        $originalName = $_FILES['abstrak']['name']; // Nama asli file

        $new_name = 'abstrak_No_' . $this->db->escape_str($this->input->post('no')) . '_' . 'Tahun_' . $this->input->post('tahun');

        $fileExtension = pathinfo($originalName, PATHINFO_EXTENSION);

        // Ganti nama file
        $newFileName = $new_name . '_' . uniqid('_', true) . '.' . $fileExtension;

        // Path lengkap untuk penyimpanan
        $destPath = $uploadDir . $newFileName;



        if (move_uploaded_file($fileTmpPath, $destPath)) {
            // echo "File berhasil diunggah dengan nama: $newFileName";

            $data1 = array(
                'path_file' => '/asset/file_abstrak/' . $newFileName,
                'file_id_hukum' => $id
            );
            $this->db->insert('file_abstrak', $data1);

        } else {
            echo "Terjadi kesalahan saat mengunggah file.";
        }



        //upload versi inggris

        $uploadDir = './asset/file_peraturan_english/';

        // Ensure the uploads directory exists
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // File details
        $fileName = basename($_FILES['file_inggris']['name']);
        $fileType = $_FILES['file_inggris']['type'];
        $fileTmpPath = $_FILES['file_inggris']['tmp_name'];
        $fileSize = $_FILES['file_inggris']['size'];
        $destPath = $uploadDir . $fileName;
        $originalName = $_FILES['file_inggris']['name']; // Nama asli file

        $new_name = 'inggris_No_' . $this->db->escape_str($this->input->post('no')) . '_' . 'Tahun_' . $this->input->post('tahun');

        $fileExtension = pathinfo($originalName, PATHINFO_EXTENSION);

        // Ganti nama file
        $newFileName = $new_name . '_' . uniqid('_', true) . '.' . $fileExtension;

        // Path lengkap untuk penyimpanan
        $destPath = $uploadDir . $newFileName;



        if (move_uploaded_file($fileTmpPath, $destPath)) {
            // echo "File berhasil diunggah dengan nama: $newFileName";

            $data1 = array(
                'file_path' => '/asset/file_peraturan_english/' . $newFileName,
                'file_id_hukum' => $id
            );
            $this->db->insert('file_hukum_inggris', $data1);

        } else {
            echo "Terjadi kesalahan saat mengunggah file.";
        }









    }

    function list_berita_edit($id)
    {
        return $this->db->query("SELECT * FROM berita where id_berita='$id'");
    }

    function list_hukum_update()
    {




        $content = preg_replace("/[^a-zA-Z]/", " ", $this->input->post('tentang'));
        $datadb = array(
            'nama' => $this->input->post('nama_indonesia'),
            'nama_inggris' => $this->input->post('nama_inggris'),
            'tentang' => $this->input->post('tentang'),
            'no' => $this->input->post('no'),
            'tahun' => $this->db->escape_str($this->input->post('tahun')),
            'tempat_penetapan' => $this->db->escape_str($this->input->post('tempat_penetapan')),
            'tanggal_ditetapkan' => $this->db->escape_str($this->input->post('tgl_ditetapkan')),
            'tanggal_diundangkan' => $this->db->escape_str($this->input->post('tgl_diundangkan')),
            'id_jenis' => $this->input->post('jenis'),
            'id_status' => $this->input->post('status'),
            'katalog' => $this->input->post('katalog'),
            'sumber' => $this->input->post('sumber'),
            'subjek' => $this->input->post('subjek'),
            'status_peraturan' => $this->input->post('status_peraturan'),
            'bahasa' => $this->input->post('bahasa'),
            'lokasi' => $this->input->post('lokasi'),
        
            'kode_lampiran' => $this->input->post('kode_lampiran'),
            'bidang_hukum' => $this->input->post('bidang_hukum'),
            'pengarang' => $this->input->post('pengarang'),
            'kode_lampiran' => $this->input->post('kode_lampiran'),
            'bidang_hukum' => $this->input->post('bidang_hukum'),
            'jenis_dokumen' => $this->input->post('kategori'),
            'mg_nomor_panggil ' => $this->input->post('mg_nomor_panggil'),
            'mg_cetakan_edisi ' => $this->input->post('mg_cetakan_edisi'),
            'mg_tempat_terbit ' => $this->input->post('mg_tempat_terbit'),
            'mg_penerbit ' => $this->input->post('mg_penerbit'),
            'mg_tahun_terbit ' => $this->input->post('mg_tahun_terbit'),
            'mg_deskripsi_fisik ' => $this->input->post('mg_deskripsi_fisik'),
            'mg_isbn ' => $this->input->post('mg_isbn'),
            'mg_nomorinduk_buku' => $this->input->post('mg_nomorinduk_buku'),
            'yuris_nomor_putusan' =>  $this->db->escape_str($this->input->post('yuris_nomor_putusan')),
            'yuris_singakatanjenis_peradilan ' => $this->input->post('yuris_singakatanjenis_peradilan'),
            'yuris_tempat_peradilan'  => $this->input->post('yuris_tempat_peradilan'),
            'yuris_tglbln_dibacakan ' => $this->db->escape_str($this->input->post('yuris_tglbln_dibacakan')),
            'yuris_jenis_peradilan' => $this->input->post('yuris_jenis_peradilan')
        );

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('hukum', $datadb);

        $new_name = 'No_' .replaceToUnderscore($this->input->post('no')) . '_' . 'Tahun_' . $this->input->post('tahun');


        // Define the upload directory

        $uploadDirectory = './asset/file_lampiran/';


        // Check if the upload directory exists, if not, create it
        if (!is_dir($uploadDirectory)) {
            mkdir($uploadDirectory, 0777, true);
        }


        // Process the uploaded files
        if (isset($_FILES['lampiran'])) {
            $files = $_FILES['lampiran'];
            $errors = [];
            $success = [];

            foreach ($files['name'] as $key => $originalFileName) {
                $fileTmpName = $files['tmp_name'][$key];
                $fileError = $files['error'][$key];
                $fileSize = $files['size'][$key];

                // Generate a unique new file name
                $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);



                $newFileName = 'lampiran_' . $new_name . '_' . uniqid('file_', true) . '.' . $fileExtension;
                //$newFileName = $new_name. '.' . $fileExtension;


                $targetFilePath = $uploadDirectory . $newFileName;

                if (isset($_FILES['lampiran'])) {



                    // Check for upload errors
                    if ($fileError === UPLOAD_ERR_OK) {

                        // Move the uploaded file and rename it
                        if (move_uploaded_file($fileTmpName, $targetFilePath)) {


                            $success[] = "File uploaded successfully as " . $newFileName;

                            $data1 = array(
                                'file_path' => '/asset/lampiran/' . $newFileName,
                                'file_id_hukum' => $this->input->post('id')
                            );
                            $this->db->insert('file_lampiran', $data1);




                        }

                        $query1 = $this->db->get_where('file_lampiran', array('file_id_hukum' => $this->input->post('id')));

                        foreach ($query1->result_array() as $key) {


                            $id_hukum = $this->input->post('id');


                            $this->db->query("delete FROM file_lampiran where file_id_hukum='$id_hukum'  AND created_at < CURRENT_TIMESTAMP()");

                        }




                    } else {
                        $errors[] = "Failed to upload " . $originalFileName;
                    }
                } else {
                    $errors[] = "Error uploading " . $originalFileName . " (Error Code: $fileError)";
                }
            }



            // Display upload results
            if (!empty($success)) {
                echo "Successfully uploaded files:<br>";
                foreach ($success as $msg) {
                    echo $msg . "<br>";


                }
            }

            if (!empty($errors)) {
                echo "Errors encountered:<br>";
                foreach ($errors as $msg) {
                    echo $msg . "<br>";
                }
            }



        } else {
            echo "No files were uploaded.";
        }



        //upload abstrak

        $uploadDir = './asset/file_abstrak/';

        // Ensure the uploads directory exists
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // File details
        $fileName = basename($_FILES['abstrak']['name']);
        $fileType = $_FILES['abstrak']['type'];
        $fileTmpPath = $_FILES['abstrak']['tmp_name'];
        $fileSize = $_FILES['abstrak']['size'];
        $destPath = $uploadDir . $fileName;
        $originalName = $_FILES['abstrak']['name']; // Nama asli file

        $new_name = 'abstrak_No_' . $this->db->escape_str($this->input->post('no')) . '_' . 'Tahun_' . $this->input->post('tahun');

        $fileExtension = pathinfo($originalName, PATHINFO_EXTENSION);

        // Ganti nama file
        $newFileName = $new_name . '_' . uniqid('_', true) . '.' . $fileExtension;

        // Path lengkap untuk penyimpanan
        $destPath = $uploadDir . $newFileName;



        if (move_uploaded_file($fileTmpPath, $destPath)) {
            // echo "File berhasil diunggah dengan nama: $newFileName";

            $data1 = array(
                'path_file' => '/asset/file_abstrak/' . $newFileName,
                'file_id_hukum' => $this->input->post('id')
            );
            $this->db->insert('file_abstrak', $data1);


            $query1 = $this->db->get_where('file_abstrak', array('file_id_hukum' => $this->input->post('id')));

            foreach ($query1->result_array() as $key) {

                $dated_file = cek_terakhir($key['create_at']);
                $now = tgl_view(date("Y-m-d"));
                $id_hukum = $this->input->post('id');

                // var_dump($dated_file)or die();


                $this->db->query("delete FROM file_abstrak where file_id_hukum='$id_hukum'  AND create_at < CURRENT_TIMESTAMP()");

            }


        } else {
            echo "Terjadi kesalahan saat mengunggah file.";
        }



        //upload versi inggris

        $uploadDir = './asset/file_peraturan_english/';

        // Ensure the uploads directory exists
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // File details
        $fileName = basename($_FILES['file_inggris']['name']);
        $fileType = $_FILES['file_inggris']['type'];
        $fileTmpPath = $_FILES['file_inggris']['tmp_name'];
        $fileSize = $_FILES['file_inggris']['size'];
        $destPath = $uploadDir . $fileName;
        $originalName = $_FILES['file_inggris']['name']; // Nama asli file

        $new_name = 'inggris_No_' . $this->db->escape_str($this->input->post('no')) . '_' . 'Tahun_' . $this->input->post('tahun');

        $fileExtension = pathinfo($originalName, PATHINFO_EXTENSION);

        // Ganti nama file
        $newFileName = $new_name . '_' . uniqid('_', true) . '.' . $fileExtension;

        // Path lengkap untuk penyimpanan
        $destPath = $uploadDir . $newFileName;



        if (move_uploaded_file($fileTmpPath, $destPath)) {
            // echo "File berhasil diunggah dengan nama: $newFileName";

            $data1 = array(
                'file_path' => '/asset/file_peraturan_english/' . $newFileName,
                'file_id_hukum' => $this->input->post('id')
            );
            $this->db->insert('file_hukum_inggris', $data1);


            $query1 = $this->db->get_where('file_hukum_inggris', array('file_id_hukum' => $this->input->post('id')));

            foreach ($query1->result_array() as $key) {

                $dated_file = cek_terakhir($key['create_at']);
                $now = tgl_view(date("Y-m-d"));
                $id_hukum = $this->input->post('id');

                // var_dump($dated_file)or die();


                $this->db->query("delete FROM file_hukum_inggris where file_id_hukum='$id_hukum'  AND create_at < CURRENT_TIMESTAMP()");

            }


        } else {
            echo "Terjadi kesalahan saat mengunggah file.";
        }


        //upload versi inggris

        $uploadDir = './asset/file_hukum/';

        // Ensure the uploads directory exists
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // File details
        $fileName = basename($_FILES['userfile']['name']);
        $fileType = $_FILES['userfile']['type'];
        $fileTmpPath = $_FILES['userfile']['tmp_name'];
        $fileSize = $_FILES['userfile']['size'];
        $destPath = $uploadDir . $fileName;
        $originalName = $_FILES['userfile']['name']; // Nama asli file

        $new_name = 'No_' . $this->db->escape_str($this->input->post('no')) . '_' . 'Tahun_' . $this->input->post('tahun');

        $fileExtension = pathinfo($originalName, PATHINFO_EXTENSION);

        // Ganti nama file
        $newFileName = $new_name . '_' . uniqid('_', true) . '.' . $fileExtension;

        // Path lengkap untuk penyimpanan
        $destPath = $uploadDir . $newFileName;



        if (move_uploaded_file($fileTmpPath, $destPath)) {
            // echo "File berhasil diunggah dengan nama: $newFileName";

            $data1 = array(
                'file_path' => '/asset/file_hukum/' . $newFileName,
                'file_id_hukum' => $this->input->post('id')
            );
            $this->db->insert('file_hukum', $data1);


            $query1 = $this->db->get_where('file_hukum', array('file_id_hukum' => $this->input->post('id')));

            foreach ($query1->result_array() as $key) {


                $id_hukum = $this->input->post('id');

                // var_dump($dated_file)or die();


                $this->db->query("delete FROM file_hukum where file_id_hukum='$id_hukum'  AND created_at < CURRENT_TIMESTAMP()");

            }


        } else {
            echo "Terjadi kesalahan saat mengunggah file.";
        }






    }

    function list_hukum_delete($id)
    {
        return $this->db->query("UPDATE hukum SET visible = '0' WHERE id=$id");
    }

    function komentar()
    {
        return $this->db->query("SELECT * FROM komentar ORDER BY id_komentar DESC");
    }

    function komentar_edit($id)
    {
        return $this->db->query("SELECT * FROM komentar where id_komentar='$id'");
    }

    function komentar_update()
    {
        $datadb = array(
            'nama_komentar' => $this->db->escape_str($this->input->post('a')),
            'url' => $this->db->escape_str($this->input->post('b')),
            'isi_komentar' => $this->input->post('c'),
            'aktif' => $this->input->post('d')
        );
        $this->db->where('id_komentar', $this->input->post('id'));
        $this->db->update('komentar', $datadb);
    }

    function komentar_delete($id)
    {
        return $this->db->query("DELETE FROM komentar where id_komentar='$id'");
    }

    var $table = 'v_hukum';
    var $column_order = array(null, null, 'id_jenis', 'id_status', 'nama', 'no', 'tahun', 'tanggal_diundangkan', 'status_nama'); //set column field database for datatable orderable
    var $column_search = array('id', 'id_jenis', 'id_status', 'nama', 'no', 'tahun', 'tanggal_diundangkan', 'status_nama'); //set column field database for datatable searchable
    var $order = array('id' => 'DESC'); // default order


    private function _get_datatables_query()
    {
        $this->db->from($this->table);
        $i = 0;

        foreach ($this->column_search as $item) // loop column
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }


    // Get DataTable data hukum jdih dprd
    function get_list_peraturan($postData = null)
    {

        $response = array();

        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $searchValue = $postData['search']['value']; // Search value

        // Custom search filter 
        $searchtahun = $postData['searchtahun'];
        $search_jenis_produk = $postData['search_jenis_produk'];
        $searchName = $postData['searchName'];
        $searchNomor = $postData['searchNomor'];
        $jenis_dok = $postData['jenis_dok'];
   

        ## Search 
        $search_arr = array();
        $searchQuery = "";
        if ($searchValue != '') {
            $search_arr[] = " (tahun like '%" . $searchValue . "%' or 
                kategori like '%" . $searchValue . "%' or 
                nama like'%" . $searchValue . "%' ) ";
        }
        if ($searchtahun != '') {
            $search_arr[] = " tahun='" . $searchtahun . "' ";
        }
        if ($search_jenis_produk !='') {
            $search_arr[] = " jenis_nama like '" . $search_jenis_produk . "' ";
        }
        if ($searchName != '' ) {
            $search_arr[] = " nama like '%".$searchName."%' or jenis_nama like '%$searchName%' ";
        }
        if ($searchNomor != '') {
            $search_arr[] = " no = '" . $searchNomor . "' ";
        }
        if ($jenis_dok != '') {
            $search_arr[] = " status_nama like '%".$jenis_dok."%' ";
        }
       
        if (count($search_arr) > 0) {
            $searchQuery = implode(" and ", $search_arr);
        }

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $records = $this->db->get('vs_hukum')->result();
        $totalRecords = $records[0]->allcount;

        // ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $records = $this->db->get('vs_hukum')->result();
        $totalRecordwithFilter = $records[0]->allcount;

        ## Fetch records
        $this->db->select('*');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get('vs_hukum')->result();

        $data = array();

        foreach ($records as $record) {


            if (is_null($record->path_peraturan)) {
                $filePath = ''; // Path file lokal
            } else {
                $filePath = './' . $record->path_peraturan; // Path file lokal

            }


            $fileStatus = file_exists($filePath)
                ? "<a  class='btn btn-success btn-sm' title='Edit Data' href='" . base_url() . "hukum/download/" . $record->id . "'><p style='font-family: Arial, sans-serif;font-size: 11px;'>DOWNLOAD</p></a>"
                : "<button type='button' class='btn btn-warning btn-sm'><p style='font-family: Arial, sans-serif;font-size: 11px;'>FILE TIDAK ADA</p></button>";


            $fileview = file_exists($filePath)
                ? "<form target='_blank' action='" . base_url() . "hukum/viewPdf/' method='post'><button name='id'  title='Preview'  value=" . $record->id . " class='btn btn-info btn-sm' ><p style='font-family: Arial, sans-serif;font-size: 11px;'>BACA</p></button>"
                : "<button type='button' class='btn btn-warning btn-sm'><p style='font-family: Arial, sans-serif;font-size: 11px;'>FILE TIDAK ADA</p></button>";


            $data[] = array(
                "judul" => toUpperCase($record->judul),
                "no" => toUpperCase($record->no),
                "status_nama" => toUpperCase($record->status_nama),
                "jenis_nama" => toUpperCase($record->jenis_nama),
                "tanggal_ditetapkan" => toUpperCase(tgl_indo($record->tanggal_ditetapkan)),
                "id" => toUpperCase($record->id),

     
                "aksi" => $fileStatus,
                "baca" => $fileview

            );
        }

        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );

        return $response;

    }



    function get_list_peraturan_admin($postData = null)
    {

        $response = array();

        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $searchValue = $postData['search']['value']; // Search value

        // Custom search filter 
        $searchtahun = $postData['searchtahun'];
        $search_jenis_produk = $postData['search_jenis_produk'];
        $searchName = $postData['searchName'];
        $searchNomor = $postData['searchNomor'];
        $jenis_dok = $postData['jenis_dok'];
   

        ## Search 
        $search_arr = array();
        $searchQuery = "";
        if ($searchValue != '') {
            $search_arr[] = " (tahun like '%" . $searchValue . "%' or 
                kategori like '%" . $searchValue . "%' or 
                nama like'%" . $searchValue . "%' ) ";
        }
        if ($searchtahun != '') {
            $search_arr[] = " tahun='" . $searchtahun . "' ";
        }
        if ($search_jenis_produk !='') {
            $search_arr[] = " jenis_nama like '" . $search_jenis_produk . "' ";
        }
        if ($searchName != '' ) {
            $search_arr[] = " nama like '%".$searchName."%' or jenis_nama like '%$searchName%' ";
        }
        if ($searchNomor != '') {
            $search_arr[] = " no = '" . $searchNomor . "' ";
        }
        if ($jenis_dok != '') {
            $search_arr[] = " nama_dokumen like '%".$jenis_dok."%' ";
        }
       
        if (count($search_arr) > 0) {
            $searchQuery = implode(" and ", $search_arr);
        }

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $records = $this->db->get('v_hukum')->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $records = $this->db->get('v_hukum')->result();
        $totalRecordwithFilter = $records[0]->allcount;

        ## Fetch records
        $this->db->select('*');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get('v_hukum')->result();

        $data = array();

        foreach ($records as $record) {


            if (is_null($record->path_peraturan)) {
                $filePath = ''; // Path file lokal
            } else {
                $filePath = './' . $record->path_peraturan; // Path file lokal

            }

            if (is_null($record->path_file_inggris)) {
				$path_inggris = ''; // Path file lokal
			} else {
				$path_inggris = '.' .$record->path_file_inggris; // Path file lokal
			}


            if (is_null($record->path_file_abstrak)) {
				$filePathabstrak = ''; // Path file lokal
			} else {
				$filePathabstrak = '.'.$record->path_file_abstrak; // Path file lokal
				
			}

            $viewabstrak = file_exists($filePathabstrak)
			? "<form target='_blank' action='" . base_url() . "hukum/viewabstrak/' method='post'><button name='id'  title='Preview'  value=".$record->id." class='btn btn-primary btn-xs' >Baca</button>"
			: "<span class='badge badge-warning'>File Not Found</span>";

            $viewinggris= file_exists($path_inggris)
                ? "<form target='_blank' action='" . base_url() . "hukum/view_inggris/' method='post'><button name='id'  title='Preview'  value=" . $record->id . " class='btn btn-primary btn-xs' >Baca</button>"
                : "<span class='badge badge-warning'>File Not Found</span>";


         //   $fileStatus = file_exists($filePath)
             $aksi= "<a class='btn btn-success btn-xs' title='Edit Data' href='".base_url()."administrator/edit_hukum/".$record->id."'><span class='glyphicon glyphicon-edit'></span></a>
             <a class='btn btn-danger btn-xs' title='Delete Data' href=".base_url()."administrator/delete_hukum/".$record->id."  onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>";

            $fileview = file_exists($filePath)
                ? "<form target='_blank' action='" . base_url() . "hukum/viewPdf/' method='post'><button name='id'  title='Preview'  value=" . $record->id . " class='btn btn-info btn-sm' ><p style='font-family: Arial, sans-serif;font-size: 11px;'>BACA</p></button>"
                : "<button type='button' class='btn btn-warning btn-sm'><p style='font-family: Arial, sans-serif;font-size: 11px;'>FILE BELUM DIUPLOAD</p></button>";
        


                $this->load->model('model_hukum');
                $pdf = $this->model_hukum->list_pdf($record->id);
                $no_path = 1;
                $array = [];
                $color[1]='btn-primary';
                $color[2]='btn-warning';
                $color[3]='btn-info';
                $color[4]='btn-success';
                $color[5]='btn-danger';

                foreach ($pdf->result_array() as $path){

                    // $filePath = './' . $data_hukum->path_peraturan; // Path file lokal
                    // $viewabstrak = file_exists($filePath)

                 $array[] = '<a target="_blank"  class="'.$color[$no_path].' btn  btn-xs" target="_blank" href="'.base_url($path['file_path']).' "><span class="glyphicon glyphicon-open"></span> Dokument '.$no_path.' </a>';

                $no_path++;
              }

             $row[] = $array;
            
            $data[] = array(
                "judul" => toUpperCase($record->judul),
                "no" => toUpperCase($record->no),
                "status_nama" => toUpperCase($record->status_nama),
                "jenis_nama" => toUpperCase($record->jenis_nama),
                "tanggal_ditetapkan" => toUpperCase(tgl_indo($record->tanggal_ditetapkan)),
                "id" => toUpperCase($record->id),
                "lampiran"=>$array,
    
                "bacaabstrak" => $viewabstrak,
                "bacainggris" => $viewinggris,
                "baca" => $fileview,
                "aksi" => $aksi,

            );
        }

        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );

        return $response;

    }

function get_list_bahasa($postData = null)
    {

        $response = array();

        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $searchValue = $postData['search']['value']; // Search value

        // Custom search filter 
        $searchtahun = $postData['searchtahun'];
        $search_jenis_produk = $postData['search_jenis_produk'];
        $searchName = $postData['searchName'];
        $searchNomor = $postData['searchNomor'];
        $jenis_dok = $postData['jenis_dok'];
		
   

        ## Search 
        $search_arr = array();
        $searchQuery = " 1=1 AND  LENGTH(TRIM(v_hukum.path_file_inggris)) > 0";
        if ($searchValue != '') {
            $search_arr[] = " (tahun like '%" . $searchValue . "%' or 
                kategori like '%" . $searchValue . "%' or 
                nama_inggris like'%" . $searchValue . "%' ) ";
        }
        if ($searchtahun != '') {
            $search_arr[] = " tahun='" . $searchtahun . "' ";
        }
        if ($search_jenis_produk !='') {
            $search_arr[] = " jenis_nama like '" . $search_jenis_produk . "' ";
        }
        if ($searchName != '' ) {
            $search_arr[] = " nama_inggris like '%".$searchName."%' or jenis_nama like '%$searchName%' ";
        }
        if ($searchNomor != '') {
            $search_arr[] = " no = '" . $searchNomor . "' ";
        }
        if ($jenis_dok != '') {
            $search_arr[] = " nama_dokumen like '%".$jenis_dok."%' ";
        }
       
        if (count($search_arr) > 0) {
            $searchQuery = implode(" and ", $search_arr);
        }

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $records = $this->db->get('v_hukum')->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $records = $this->db->get('v_hukum')->result();
        $totalRecordwithFilter = $records[0]->allcount;

        ## Fetch records
        $this->db->select('*');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get('v_hukum')->result();

        $data = array();

        foreach ($records as $record) {


            if (is_null($record->path_peraturan)) {
                $filePath = ''; // Path file lokal
            } else {
                $filePath = './' . $record->path_peraturan; // Path file lokal

            }

            $fileStatus = file_exists($filePath)
                ? "<a  class='btn btn-success btn-sm' title='Edit Data' href='" . base_url() . "hukum/download_bahasa/" . $record->id . "'><p style='font-family: Arial, sans-serif;font-size: 11px;'>DOWNLOAD</p></a>"
                : "<button type='button' class='btn btn-warning btn-sm'><p style='font-family: Arial, sans-serif;font-size: 11px;'>FILE TIDAK ADA</p></button>";


            $fileview = file_exists($filePath)
                ? "<form target='_blank' action='" . base_url() . "hukum/viewPdf_bahasa/' method='post'><button name='id'  title='Preview'  value=" . $record->id . " class='btn btn-info btn-sm' ><p style='font-family: Arial, sans-serif;font-size: 11px;'>BACA</p></button>"
                : "<button type='button' class='btn btn-warning btn-sm'><p style='font-family: Arial, sans-serif;font-size: 11px;'>FILE TIDAK ADA</p></button>";


            $data[] = array(
                "nama_inggris" =>"<p style=' text-align: justify;font-family: Arial, sans-serif;font-size: 11px;'>".toUpperCase($record->nama_inggris)."</p>",
                "no" => toUpperCase($record->no),
                "status_nama" => toUpperCase($record->status_nama),
                "jenis_nama" => toUpperCase($record->jenis_nama),
                "tanggal_ditetapkan" => toUpperCase(tgl_indo($record->tanggal_ditetapkan)),
                "id" => toUpperCase($record->id),

     
                "aksi" => $fileStatus,
                "baca" => $fileview

            );
        }

        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );

        return $response;

    }
	
	public function search($keyword = null, $kategori = null, $tahun = null, $nomor = null)
    {

      //  var_dump($_GET) or die();
        // Tentukan tabel utama (ganti 'produk_hukum' sesuai nama tabel Anda)
        $this->db->from('v_hukum');

        // 1. Pencarian berdasarkan Keyword (mencari di judul/nama produk hukum)
        if (!empty($keyword)) {
            $this->db->like('judul', $keyword);
        }

        // 2. Pencarian berdasarkan Kategori (ID atau Nama Kategori)
        if (!empty($kategori)) {
            $this->db->where('id_jenis', $kategori);
        }

        // 3. Pencarian berdasarkan Tahun
        if (!empty($tahun)) {
            $this->db->where('tahun', $tahun);
        }

        // 4. Pencarian berdasarkan Nomor Produk Hukum
        if (!empty($nomor)) {
            $this->db->where('nomor', $nomor);
        }

        // Urutkan berdasarkan yang terbaru
        $this->db->order_by('tahun', 'DESC');
        $this->db->order_by('id', 'DESC');

        $query = $this->db->get();
        return $query->result_array();
    }


}
