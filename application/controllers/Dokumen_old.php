<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dokumen extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_dokumen'); // Load model
        $this->load->library('pagination'); // Load library pagination
    }


    public function index()
    {
        $ids = $this->uri->segment(3);

        $string = $ids;
        $find = array('/%20/', '/%F2/');
        $replace = array('-', '?');
        $res_string = preg_replace($find, $replace, $string);
        $dat = $this->db->query("SELECT * FROM `vs_hukum` where lower(replace(jenis_nama,' ','-'))='$ids'");

        $row = $dat->row();
        $total = $dat->num_rows();
        if ($total == 0) {
            redirect('hukum');
        }


        $this->template->load(template() . '/template', template() . '/view_hukum_groupproduk');
    }

    public function fetch_data()
    {

     $keyword = $this->input->post('keyword');
        $page = $this->input->post('page');
        $limit = 2; // Data per halaman
        $offset = ($page - 1) * $limit;

        // Ambil data
        $data = $this->Model_dokumen->search_data($keyword, $limit, $offset);
        $total_rows = $this->Model_dokumen->count_data($keyword);

        // Konfigurasi pagination
        $config['base_url'] = '#';
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $limit;
        $config['use_page_numbers'] = TRUE;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $output = [
            'data' => $data,
            'pagination' => $this->pagination->create_links()
        ];

        echo json_encode($output);
    }


    public function kategori()
    
    {

        $this->load->model('model_hukum');
        $ids = $this->uri->segment(3);


        $string = $ids;
        $find = array('/%20/', '/%F2/');
        $replace = array('-', '?');
        $res_string = preg_replace($find, $replace, $string);

        $dat = $this->db->query("SELECT * FROM `vs_hukum` where lower(replace(jenis_nama,' ','-')) LIKE '%$ids%'");

        $row = $dat->row();
        $total = $dat->num_rows();
        if ($total == 0) {
            redirect('utama');
        }

        $data['title'] = $row->nama;
        $data['jenis'] = $row->jenis_nama;
        $data['nama_dokumen'] = $row->nama_dokumen;
        $data['jenis_produk'] = $this->model_hukum->jenis_hukum();
        $data['record'] = $this->model_hukum->status_hukum();
        $data['jenis_dokumen'] = $this->model_hukum->get_jenis_dokumen();
        $data['ids'] = $ids;

        $this->template->load(template() . '/template', template() . '/view_hukum_groupproduk', $data);
    }


    public function tag()
    {
       
         $searchName= $_POST['searchName'];
         $this->load->model('model_hukum');
        
        $dat = $this->db->query("SELECT * FROM `vs_hukum` where vs_hukum.nama LIKE '%$searchName%'");

        $row = $dat->row();
         $total = $dat->num_rows();
        if ($total == 0) {
            redirect('utama');
        }

        $data['title'] = $row->nama;
        $data['jenis'] = $row->jenis_nama;
        $data['nama_dokumen'] = $row->nama_dokumen;
        $data['jenis_produk'] = $this->model_hukum->jenis_hukum();
        $data['record'] = $this->model_hukum->status_hukum();
        $data['jenis_dokumen'] = $this->model_hukum->get_jenis_dokumen();
        $data['searchName'] = $_POST['searchName'];


        //   $data['ids'] = $ids;
        $this->template->load(template() . '/template', template() . '/view_tag', $data);
    }


    public function peraturan()
    {
        $this->load->model('model_hukum');
     
        $ids = $this->uri->segment(3);
    
        $string = $ids;
        $find = array('/%20/', '/%F2/');
        $replace = array('-', '?');
        $res_string = preg_replace($find, $replace, $string);
        $dat = $this->db->query("SELECT * FROM `vs_hukum` where lower(replace(nama_dokumen,' ','-'))='$ids'");

        $row = $dat->row();
        $total = $dat->num_rows();
        if ($total == 0) {
            redirect('hukum');
        }
        $data['jenis_produk'] = $this->model_hukum->jenis_hukum();
        $data['record'] = $this->model_hukum->status_hukum();
        $data['jenis_dokumen'] = $this->model_hukum->get_jenis_dokumen();
        $data['title'] = $row->nama;
        $data['jenis'] = $row->jenis_nama;
        $data['nama_dokumen'] = $row->nama_dokumen;
      


        //   $data['ids'] = $ids;
        $this->template->load(template() . '/template', template() . '/view_hukum_groupdokumen', $data);
    }



    public function cari()
    {
  
        $this->load->model('model_hukum');


        $searchtahun= $_POST['searchtahun'];
        $search_jenis_produk= $_POST['search_jenis_produk'];
        $searchNomor= $_POST['searchNomor'];
        $jenis_dok= $_POST['jenis_dok'];
        $data_cari1= $_POST['searchtahun'];

     // $filter = " 1=1 ";


      if ($searchtahun !='') {
        $tahun =$searchtahun;
        $data_cari =$searchtahun;
        
         }

        if ($search_jenis_produk !='') {
            $search_jenis_produk=$search_jenis_produk;
            $data_cari1=$search_jenis_produk;
        }

        if ($jenis_dok !='') {

           $jenis_dok=$jenis_dok;
           $data_cari2=$jenis_dok;
        } 

        if ($searchNomor !='') {

            $searchNomor=$searchNomor;
            $data_cari=$searchNomor;
        } 
       
          

       $data['data_cari1'] =$data_cari1;
       //$data['data_cari2'] =$data_cari2;
        $data['search_jenis_produk'] = $search_jenis_produk;

        $data['jenis_dok'] = $jenis_dok;
        $data['searchtahun'] = $searchtahun;
        $data['searchNomor'] = $searchNomor;

        $data['jenis_produk'] = $this->model_hukum->jenis_hukum();
        $data['record'] = $this->model_hukum->get_status_hukum();
        $data['jenis_dokumen'] = $this->model_hukum->get_jenis_dokumen();

        $this->template->load(template() . '/template', template() . '/view_hukum_cari', $data);
    }
	
	
	public function tag_bahasa()
    {
 
       
       
       //  $searchName= $_POST['searchName'];
         $this->load->model('model_hukum');
        
		
		
        $dat = $this->db->query("SELECT * FROM `vs_hukum` WHERE LENGTH(TRIM(vs_hukum.path_file_inggris)) > 0");

        $row = $dat->row();
         $total = $dat->num_rows();
        if ($total == 0) {
            redirect('utama');
        }

        $data['title'] = $row->nama;
        $data['jenis'] = $row->jenis_nama;
        $data['nama_dokumen'] = $row->nama_dokumen;
        $data['jenis_produk'] = $this->model_hukum->jenis_hukum();
        $data['record'] = $this->model_hukum->status_hukum();
        $data['jenis_dokumen'] = $this->model_hukum->get_jenis_dokumen();
    
        $data['searchName'] = 'of';

        //   $data['ids'] = $ids;
        $this->template->load(template() . '/template', template() . '/view_bahasa', $data);
    }

    public function tag_disabilitas()
    {
 
       
       
       //  $searchName= $_POST['searchName'];
         $this->load->model('model_hukum');
        
		
		
        $dat = $this->db->query("SELECT * FROM `vs_hukum` WHERE LENGTH(TRIM(vs_hukum.path_file_inggris)) > 0");

        $row = $dat->row();
         $total = $dat->num_rows();
        if ($total == 0) {
            redirect('utama');
        }

        $data['title'] = $row->nama;
        $data['jenis'] = $row->jenis_nama;
        $data['nama_dokumen'] = $row->nama_dokumen;
        $data['jenis_produk'] = $this->model_hukum->jenis_hukum();
        $data['record'] = $this->model_hukum->status_hukum();
        $data['jenis_dokumen'] = $this->model_hukum->get_jenis_dokumen();
    
        $data['searchName'] = 'of';

        //   $data['ids'] = $ids;
        $this->template->load(template() . '/template', template() . '/view_disabilitas', $data);
    }

}
