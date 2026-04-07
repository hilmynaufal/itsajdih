<?php
class Model_utama extends CI_model{


    // Fungsi untuk mengambil semua data chart
    public function get_chart_kategori()
    {
        $query = $this->db->query("SELECT B.jenis_nama as category, count(B.id_jenis) as value FROM (SELECT A.* FROM (SELECT	hukum.id,hukum.id_jenis,hukum.id_status,hukum.nama,hukum.`no`,hukum.tahun,hukum.tanggal_ditetapkan,hukum.tanggal_diundangkan,	hukum.katalog,hukum.abstrak,	hukum.penganti,	hukum.jumlah_unduh,	hukum.visible,	hukum.created_at,	hukum.created_by,	hukum.updated_at,
        hukum.updated_by,jenis_hukum.jenis_id,	jenis_hukum.jenis_nama,	jenis_hukum.jenis_level,jenis_hukum.jenis_keterangan,status_hukum.status_id,status_hukum.status_nama FROM hukum INNER JOIN jenis_hukum ON hukum.id_jenis = jenis_hukum.jenis_id
        INNER JOIN status_hukum ON status_hukum.status_id=hukum.id_status )A  )B GROUP BY B.id_jenis");
        return $query->result_array();
    }

    public function get_chart_tahun()
    {
        $query = $this->db->query("SELECT round(B.tahun) as name, count(B.id_jenis) as value ,'{ src: https://www.amcharts.com/lib/images/faces/A04.png }' as bulletSettings
       
          FROM (SELECT A.* FROM (SELECT	hukum.id,hukum.id_jenis,hukum.id_status,hukum.nama,hukum.`no`,hukum.tahun,hukum.tanggal_ditetapkan,hukum.tanggal_diundangkan,	hukum.katalog,hukum.abstrak,	hukum.penganti,	hukum.jumlah_unduh,	hukum.visible,	hukum.created_at,	hukum.created_by,	hukum.updated_at,
        hukum.updated_by,jenis_hukum.jenis_id,	jenis_hukum.jenis_nama,	jenis_hukum.jenis_level,jenis_hukum.jenis_keterangan,status_hukum.status_id,status_hukum.status_nama FROM hukum INNER JOIN jenis_hukum ON hukum.id_jenis = jenis_hukum.jenis_id
        INNER JOIN status_hukum ON status_hukum.status_id=hukum.id_status )A  )B GROUP BY B.tahun order BY B.tahun ASC");
        return $query->result_array();
    }

    // Fungsi Baru: Mengambil kategori dengan breakdown status berlaku/tidak
    public function get_chart_kategori_status()
    {
        // Kita menggunakan alias: 
        // h = hukum, jh = jenis_hukum, sh = status_hukum
        $sql = "SELECT 
                    jh.jenis_nama as category,
                    SUM(CASE WHEN h.id_status = 6 THEN 1 ELSE 0 END) as jumlah_berlaku,
                    SUM(CASE WHEN h.id_status != 6 THEN 1 ELSE 0 END) as jumlah_tidak_berlaku
                FROM hukum h
                INNER JOIN jenis_hukum jh ON h.id_jenis = jh.jenis_id
                INNER JOIN status_hukum sh ON sh.status_id = h.id_status
                GROUP BY jh.jenis_id, jh.jenis_nama";

        $query = $this->db->query($sql);
        return $query->result_array();
    }


    function headline($dari, $jumlah){
        return $this->db->query("SELECT a.*, b.nama_kategori FROM berita a LEFT JOIN kategori b ON a.id_kategori=b.id_kategori where a.headline='Y' ORDER BY a.id_berita DESC LIMIT $dari, $jumlah");
    }

    function headline_slide($dari, $jumlah){
        return json_encode($this->db->query("SELECT a.*, b.nama_kategori
                                            FROM berita a LEFT JOIN kategori b ON a.id_kategori=b.id_kategori
                                            where a.headline='Y' ORDER BY a.id_berita DESC LIMIT $dari, $jumlah")->result());
    }

    function kategori($dari, $jumlah){
        return $this->db->query("SELECT * FROM kategori where aktif='Y' ORDER BY id_kategori ASC LIMIT $dari, $jumlah");


    }

    function berita_perkategori($id, $dari, $jumlah){
        return $this->db->query("SELECT a.*, b.nama_kategori FROM berita a LEFT JOIN kategori b ON a.id_kategori=b.id_kategori where a.id_kategori='$id' ORDER BY a.id_berita DESC LIMIT $dari, $jumlah");
    }


    function hukum_kategori(){
        return $this->db->query("SELECT hukum.dibaca,hukum.didownload,hukum.id,hukum.id_jenis,hukum.id_status,hukum.nama,hukum.`no`,hukum.tahun,hukum.tanggal_ditetapkan,hukum.tanggal_diundangkan, hukum.katalog,hukum.abstrak,hukum.penganti,hukum.jumlah_unduh,hukum.visible,hukum.created_at,hukum.created_by,hukum.updated_at,hukum.updated_by,jenis_hukum.jenis_id, jenis_hukum.jenis_nama,jenis_hukum.jenis_level, jenis_hukum.jenis_keterangan FROM hukum INNER JOIN jenis_hukum ON hukum.id_jenis = jenis_hukum.jenis_id 
        ORDER BY hukum.tanggal_ditetapkan DESC LIMIT 5 ");
    }
    function hukum_populer(){
        return $this->db->query("SELECT hukum.dibaca,hukum.didownload,hukum.id,hukum.id_jenis,hukum.id_status,hukum.nama,hukum.`no`,hukum.tahun,hukum.tanggal_ditetapkan,hukum.tanggal_diundangkan, hukum.katalog,hukum.abstrak,hukum.penganti,hukum.jumlah_unduh,hukum.visible,hukum.created_at,hukum.created_by,hukum.updated_at,hukum.updated_by,jenis_hukum.jenis_id, jenis_hukum.jenis_nama,jenis_hukum.jenis_level, jenis_hukum.jenis_keterangan FROM hukum INNER JOIN jenis_hukum ON hukum.id_jenis = jenis_hukum.jenis_id ORDER BY  hukum.dibaca DESC LIMIT 5 ");
    }

     function hukum_perkategori($id,$dari, $jumlah){

        return $this->db->query("SELECT A.jenis_id,A.* FROM (SELECT hukum.id,hukum.id_jenis,hukum.id_status,hukum.nama,hukum.`no`,hukum.tahun,hukum.tanggal_ditetapkan,
                                hukum.tanggal_diundangkan,hukum.katalog,hukum.abstrak,hukum.penganti,hukum.jumlah_unduh,hukum.visible,hukum.created_at,hukum.created_by,
                                hukum.updated_at,hukum.updated_by,jenis_hukum.jenis_id,jenis_hukum.jenis_nama,jenis_hukum.jenis_level,jenis_hukum.jenis_keterangan,status_hukum.status_id,status_hukum.status_nama FROM hukum INNER JOIN jenis_hukum ON hukum.id_jenis = jenis_hukum.jenis_id INNER JOIN status_hukum ON status_hukum.status_id=hukum.id_status
                                )A WHERE A.id_jenis ='$id' ORDER BY A.tahun = YEAR(NOW()) DESC  LIMIT $dari, $jumlah");
    }

    function hukum_layanan_disabilitas(){
        return $this->db->query("
            SELECT DISTINCT 
                h.dibaca, h.didownload, h.id, h.id_jenis, h.id_status, h.nama, h.no, h.tahun,
                h.tanggal_ditetapkan, h.tanggal_diundangkan, h.katalog, h.abstrak, h.penganti,
                h.jumlah_unduh, h.visible, h.created_at, h.created_by, h.updated_at, h.updated_by,
                j.jenis_id, j.jenis_nama, j.jenis_level, j.jenis_keterangan
            FROM hukum h
            JOIN jenis_hukum j ON h.id_jenis = j.jenis_id
            LEFT JOIN file_braile b ON b.file_id_hukum = h.id
            LEFT JOIN file_alih_suara a ON a.file_id_hukum = h.id
            WHERE 
                b.id IS NOT NULL
                OR a.id IS NOT NULL
            ORDER BY h.created_at DESC
            LIMIT 5
        ");
    }

    function hukum_naskah_kuno(){
        return $this->db->query("
            SELECT DISTINCT 
                h.dibaca, h.didownload, h.id, h.id_jenis, h.id_status, h.nama, h.no, h.tahun,
                h.tanggal_ditetapkan, h.tanggal_diundangkan, h.katalog, h.abstrak, h.penganti,
                h.jumlah_unduh, h.visible, h.created_at, h.created_by, h.updated_at, h.updated_by,
                j.jenis_id, j.jenis_nama, j.jenis_level, j.jenis_keterangan
            FROM hukum h
            JOIN jenis_hukum j ON h.id_jenis = j.jenis_id
            JOIN file_naskah_kuno nk ON nk.file_id_hukum = h.id
            ORDER BY h.created_at DESC
            LIMIT 5
        ");
    }




    function group_hukum(){
         return $this->db->query("SELECT B.jenis_nama,B.jenis_keterangan, count(B.id_jenis) as jml,B.jenis_id  FROM (SELECT A.* FROM (SELECT	hukum.id,hukum.id_jenis,hukum.id_status,hukum.nama,hukum.`no`,hukum.tahun,hukum.tanggal_ditetapkan,hukum.tanggal_diundangkan,	hukum.katalog,hukum.abstrak,	hukum.penganti,	hukum.jumlah_unduh,	hukum.visible,	hukum.created_at,	hukum.created_by,	hukum.updated_at,
                                hukum.updated_by,jenis_hukum.jenis_id,	jenis_hukum.jenis_nama,	jenis_hukum.jenis_level,jenis_hukum.jenis_keterangan,status_hukum.status_id,status_hukum.status_nama,file_hukum.file_path  FROM hukum INNER JOIN jenis_hukum ON hukum.id_jenis = jenis_hukum.jenis_id
                                INNER JOIN status_hukum ON status_hukum.status_id=hukum.id_status
                                INNER JOIN file_hukum ON hukum.id=file_hukum.file_id_hukum)A  )B GROUP BY B.id_jenis");

    }


    function rekap_hukum(){
        return $this->db->query("SELECT B.jenis_nama,B.jenis_keterangan, count(B.id_jenis) as jml  FROM (SELECT A.* FROM (SELECT	hukum.id,hukum.id_jenis,hukum.id_status,hukum.nama,hukum.`no`,hukum.tahun,hukum.tanggal_ditetapkan,hukum.tanggal_diundangkan,	hukum.katalog,hukum.abstrak,	hukum.penganti,	hukum.jumlah_unduh,	hukum.visible,	hukum.created_at,	hukum.created_by,	hukum.updated_at,
                               hukum.updated_by,jenis_hukum.jenis_id,	jenis_hukum.jenis_nama,	jenis_hukum.jenis_level,jenis_hukum.jenis_keterangan,status_hukum.status_id,status_hukum.status_nama,file_hukum.file_path  FROM hukum INNER JOIN jenis_hukum ON hukum.id_jenis = jenis_hukum.jenis_id
                               INNER JOIN status_hukum ON status_hukum.status_id=hukum.id_status
                               INNER JOIN file_hukum ON hukum.id=file_hukum.file_id_hukum)A  )B GROUP BY B.id_jenis");

   }

    function sekilasinfo(){
        return $this->db->query("SELECT * FROM sekilasinfo ORDER BY id_sekilas DESC LIMIT 5");
    }

    function mainmenu(){
        return $this->db->query("SELECT * FROM mainmenu where aktif='Y' ORDER BY id_main ASC");
    }

    function submenu($id){
        return $this->db->query("SELECT * FROM submenu WHERE id_main='$id' AND aktif='Y' ORDER BY id_sub ASC");
    }

    function submenu1($id){
        return $this->db->query("SELECT * FROM submenu WHERE id_submain='$id' AND id_submain!='0' AND aktif='Y' ORDER BY id_sub ASC");
    }

    function pengumuman($dari, $jumlah){
        return $this->db->query("SELECT * FROM sekilasinfo ORDER BY id_sekilas DESC LIMIT $dari, $jumlah");
    }

    function linkterkait($posisi, $dari, $jumlah){
        return $this->db->query("SELECT * FROM link_terkait where posisi='$posisi' ORDER BY id_link_terkait ASC LIMIT $dari, $jumlah");
    }

    function banner($dari, $jumlah){
        return $this->db->query("SELECT * FROM banner ORDER BY id_banner DESC LIMIT $dari, $jumlah");
    }

    function kunjungan(){


        $ip      = $_SERVER['REMOTE_ADDR'];
        $tanggal = date("Y-m-d");
        $waktu   = time();
        $cekk = $this->db->query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
        $rowh = $cekk->row_array();
        if($cekk->num_rows() == 0){
            $datadb = array('ip'=>$ip, 'tanggal'=>$tanggal, 'hits'=>'1', 'online'=>$waktu);
            $this->db->insert('statistik',$datadb);

        }else{
            $hitss = $rowh['hits'] + 1;
            $datadb = array('ip'=>$ip, 'tanggal'=>$tanggal, 'hits'=>$hitss, 'online'=>$waktu);
            $array = array('ip' => $ip, 'tanggal' => $tanggal);
            $this->db->where($array);
            $this->db->update('statistik',$datadb);
        }
    }

    function grafik_kunjungan(){
        return $this->db->query("SELECT count(*) as jumlah, tanggal FROM statistik GROUP BY tanggal ORDER BY tanggal DESC LIMIT 10");
    }

    // function pengunjung(){
        // return $this->db->query("SELECT * FROM statistik WHERE tanggal='".date("Y-m-d")."' GROUP BY ip");
    // }
    function pengunjung(){

        return $this->db->query("SELECT a.hits,a.ip,a.tanggal,a.`online` FROM statistik a WHERE a.tanggal='".date("Y-m-d")."' GROUP BY a.hits,a.ip,a.tanggal,a.`online` ");
    }

    function totalpengunjung(){
        return $this->db->query("SELECT COUNT(hits) as total FROM statistik");
    }

    function hits(){
        return $this->db->query("SELECT SUM(hits) as total FROM statistik WHERE tanggal='".date("Y-m-d")."' GROUP BY tanggal");
    }

    function totalhits(){
        return $this->db->query("SELECT SUM(hits) as total FROM statistik");
    }

    function pengunjungonline(){
        $bataswaktu       = time() - 300;
        return $this->db->query("SELECT * FROM statistik WHERE online > '$bataswaktu'");
    }

    function cek_poling(){
        return $this->db->query("SELECT * from modul where nama_modul='Poling' and publish='Y'");
    }

    function pertanyaan(){
        return $this->db->query("SELECT * FROM poling WHERE aktif='Y' and status='Pertanyaan'");
    }

    function jawaban(){
        return $this->db->query("SELECT * FROM poling WHERE aktif='Y' and status='Jawaban'");
    }

    function semua_berita($start, $limit){
        return $this->db->query("SELECT * FROM berita a ORDER BY id_berita DESC LIMIT $start,$limit");
    }
    function semua_produk($start, $limit){
        return $this->db->query("SELECT hukum.dibaca,hukum.id,hukum.id_jenis,hukum.id_status,hukum.nama,hukum.`no`,hukum.tahun,hukum.tanggal_ditetapkan,hukum.tanggal_diundangkan, hukum.katalog,hukum.abstrak,hukum.penganti,hukum.jumlah_unduh,hukum.visible,hukum.created_at,hukum.created_by,hukum.updated_at,hukum.updated_by,jenis_hukum.jenis_id, jenis_hukum.jenis_nama,jenis_hukum.jenis_level, jenis_hukum.jenis_keterangan FROM hukum INNER JOIN jenis_hukum ON hukum.id_jenis = jenis_hukum.jenis_id 
        ORDER BY hukum.tanggal_ditetapkan DESC LIMIT $start,$limit");
    }

    function hitungberita(){
        return $this->db->query("SELECT * FROM berita");
    }

    function hitungproduk(){
        return $this->db->query("SELECT * FROM hukum");
    }
    function hitungprodukcari($start, $limit, $kata){
       
      

        $tahun=$kata['tahun'];
        $kategori=$kata['kategori'];
        $tentang=$kata['tentang'];
        $nomor=$kata['nomor'];
        $status=$kata['status'];
      
               
        $pisah_kata = explode(" ",$tentang);
        $jml_katakan = (integer)count($pisah_kata);
        $jml_kata = $jml_katakan-1;
       


        $filter = "1=1 ";

        if ($tentang != "") {


                for ($i=0; $i<=$jml_kata; $i++){
                            $filter .= " AND hukum.nama  LIKE '%$pisah_kata[$i]%'";
                            if ($i < $jml_kata ){
                                $cari .= " OR ";
                                }
                            }

        
        }
        if ($kategori !="") {

            $filter = $filter . " AND 	hukum.id_jenis='$kategori'";
        } 
        if ($tahun !="")
        {
              $filter = $filter . "  AND hukum.tahun='$tahun'";
        }
        if ($nomor !="")
        {
              $filter = $filter . "  AND hukum.no='$nomor'";
        }
  
        
        else {
            $filter = $filter;
        }


     
        $cari = "SELECT hukum.id,
        hukum.id_jenis,
        hukum.id_status,
        hukum.nama,
        hukum.`no`,
        hukum.tahun,
        hukum.tanggal_ditetapkan,
        hukum.tanggal_diundangkan,
        hukum.katalog,
        hukum.abstrak,
        hukum.penganti,
        hukum.jumlah_unduh,
        hukum.visible,
        hukum.created_at,
        hukum.created_by,
        hukum.updated_at,
        hukum.updated_by,
        jenis_hukum.jenis_id,
        jenis_hukum.jenis_nama,
        jenis_hukum.jenis_level,
        jenis_hukum.jenis_keterangan 
    FROM
        hukum
        INNER JOIN jenis_hukum ON hukum.id_jenis = jenis_hukum.jenis_id  WHERE " ;
            

  
            
        $cari .= " $filter ORDER BY id DESC LIMIT $start,$limit";
        return $this->db->query($cari);
    }
    

    function hitunghukum(){
        return $this->db->query("SELECT * FROM hukum");
    }

    function searchhitunghukum($katagori,$nomor,$tahun,$tentang,$status){

        return $this->db->query("SELECT * FROM `hukum`
                                JOIN `jenis_hukum` ON hukum.id_jenis = jenis_hukum.jenis_id
                                JOIN `status_hukum` ON hukum.id_status = status_hukum.status_id
                                WHERE hukum.no = '$nomor' OR
                                hukum.tahun = '$tahun' AND
                                hukum.visible = '1'
                                ORDER BY tahun DESC");
    }

    function semua_berita_cari($start, $limit, $kata){
        $pisah_kata = explode(" ",$kata);
        $jml_katakan = (integer)count($pisah_kata);
        $jml_kata = $jml_katakan-1;

        $cari = "SELECT * FROM berita WHERE " ;
            for ($i=0; $i<=$jml_kata; $i++){
              $cari .= "judul OR isi_berita LIKE '%$pisah_kata[$i]%'";
              if ($i < $jml_kata ){
                $cari .= " OR ";
              }
            }
        $cari .= " ORDER BY id_berita DESC LIMIT $start,$limit";
        return $this->db->query($cari);
    }

    function semua_produk_cari($start, $limit, $kata){
       
       
      

        $tahun=$kata['tahun'];
        $kategori=$kata['kategori'];
        $tentang=$kata['tentang'];
        $nomor=$kata['nomor'];
        $status=$kata['status'];
      
       
        
        $pisah_kata = explode(" ",$tentang);
        $jml_katakan = (integer)count($pisah_kata);
        $jml_kata = $jml_katakan-1;
       
       // var_dump($pisah_kata) or die();

        $filter = "1=1  ";

   
        if ($tentang != "") {


                // for ($i=0; $i<=$jml_kata; $i++){
                //             $filter .= " AND hukum.nama  LIKE '%$pisah_kata[$i]%'";

                //             if ($i < $jml_kata ){
                //                 $filter .= $textcari." ";
                //                 }
                //             }

                           
                $filter .= " AND hukum.nama  LIKE '% $tentang %'";
        
        }
        



       

        if ($kategori !="") {

            $filter = $filter . " AND 	hukum.id_jenis='$kategori'";
        } 
        if ($tahun !="")
        {
              $filter = $filter . "  AND hukum.tahun='$tahun'";
        }
        if ($nomor !="")
        {
              $filter = $filter . "  AND hukum.no='$nomor'";
        }
       
  
        
        else {
            $filter = $filter;
        }


     
        $cari2 = "SELECT hukum.id,
        hukum.id_jenis,
        hukum.id_status,
        hukum.nama,
        hukum.`no`,
        hukum.tahun,
        hukum.tanggal_ditetapkan,
        hukum.tanggal_diundangkan,
        hukum.katalog,
        hukum.abstrak,
        hukum.penganti,
        hukum.jumlah_unduh,
        hukum.visible,
        hukum.created_at,
        hukum.created_by,
        hukum.updated_at,
        hukum.updated_by,
        jenis_hukum.jenis_id,
        jenis_hukum.jenis_nama,
        jenis_hukum.jenis_level,
        jenis_hukum.jenis_keterangan 
    FROM
        hukum
        INNER JOIN jenis_hukum ON hukum.id_jenis = jenis_hukum.jenis_id  WHERE " ;
            

  
            
        $cari2 .= " $filter ORDER BY id DESC LIMIT $start,$limit";
        return $this->db->query($cari2);
    }

    function berita_detail($id){
        return $this->db->query("SELECT * FROM berita a LEFT JOIN users b ON a.username=b.username LEFT JOIN kategori c ON a.id_kategori=c.id_kategori where a.id_berita='".$this->db->escape_str($id)."' OR a.judul_seo='".$this->db->escape_str($id)."'");
    }

    function berita_dibaca_update($id){
        return $this->db->query("UPDATE berita SET dibaca=dibaca+1 where id_berita='".$this->db->escape_str($id)."' OR judul_seo='".$this->db->escape_str($id)."'");
    }


    function document_didownload($id){
       
        return $this->db->query("UPDATE hukum SET didownload=didownload+1 where hukum.id='".$id."'");
    }



    function produk_dibaca_update($id){

        $query = $this->db->get_where('file_hukum', array('file_id_hukum' => $id));
        $data= $query->row_array();


       return $this->db->query("UPDATE hukum set dibaca=dibaca+1 where hukum.id='".$data['file_id_hukum']."'");
    }

    function detail_kategori($id,$dari,$sampai){
        return $this->db->query("SELECT * FROM berita where id_kategori='".$this->db->escape_str($id)."' ORDER BY id_berita DESC LIMIT $dari,$sampai");
    }

    function info_terkait($limit,$tag){
        $pisah_kata  = explode(",",$tag);
        $jml_katakan = (integer)count($pisah_kata);
        $jml_kata = $jml_katakan-1;
        $cari = "SELECT * FROM berita WHERE " ;
                for ($i=0; $i<=$jml_kata; $i++){
                  $cari .= "tag LIKE '%$pisah_kata[$i]%'";
                  if ($i < $jml_kata ){
                    $cari .= " OR ";
                  }
                }
        $cari .= " ORDER BY id_berita DESC LIMIT $limit";
        return $this->db->query($cari);
    }

    function hitungberitakategori($kat){
        return $this->db->query("SELECT * FROM berita where id_kategori='".$this->db->escape_str($kat)."'");
    }

    function page_detail($id){
        return $this->db->query("SELECT * FROM halamanstatis where lower(replace(judul,' ','-'))='".$this->db->escape_str($id)."'");
    }

    function agenda($start, $limit){
        return $this->db->query("SELECT a.*, b.nama_lengkap FROM agenda a JOIN users b ON a.username=b.username ORDER BY a.id_agenda DESC LIMIT $start, $limit");
    }

    function hitungagenda(){
        return $this->db->query("SELECT * FROM agenda");
    }

    function agenda_detail($id){
        return $this->db->query("SELECT a.*, b.nama_lengkap FROM agenda a JOIN users b ON a.username=b.username where a.tema_seo='".$this->db->escape_str($id)."'");
    }

    function index($start,$limit){
        return $this->db->query("SELECT * FROM download ORDER BY id_download DESC LIMIT $start,$limit");
    }

    function updatehits($file){
        return $this->db->query("UPDATE download set hits=hits+1 where nama_file='".$this->db->escape_str($file)."'");
    }

    function hitungdownload(){
        return $this->db->query("SELECT * FROM download");
    }

    function album($start, $limit){
        return $this->db->query("SELECT * FROM album ORDER BY id_album DESC LIMIT $start, $limit");
    }

    function hitungalbum(){
        return $this->db->query("SELECT * FROM album");
    }

    function hitungfoto($album){
        return $this->db->query("SELECT * FROM gallery where id_album='$album'");
    }

    function gallery($id, $start, $limit){
        return $this->db->query("SELECT * FROM gallery where id_album='$id' ORDER BY id_gallery DESC LIMIT $start, $limit");
    }

    function kirim_Pesan(){
        $nama     = cetak($this->input->post('a'));
        $email    = cetak($this->input->post('b'));
        $subjek   = cetak($this->input->post('c'));
        $pesan    = cetak($this->input->post('d'));
            $datadb = array('nama'=>$nama,
                            'email'=>$email,
                            'subjek'=>$subjek,
                            'pesan'=>$pesan,
                            'tanggal'=>date('Y-m-d'));
        $this->db->insert('hubungi',$datadb);
    }

    function vote($pilihan){
        return $this->db->query("UPDATE poling SET rating=rating+1 WHERE id_poling='$pilihan'");
    }

    function jumlah_vote(){
        return $this->db->query("SELECT SUM(rating) as jml_vote FROM poling WHERE aktif='Y'");
    }

    function hasil_vote(){
        return $this->db->query("SELECT * FROM poling WHERE aktif='Y' and status='Jawaban'");
    }
}