<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Produk extends CI_Controller {
	public function index(){
		

		$data_cari = array(
			'tentang' => $this->input->post('tentang',TRUE),
			'status' => $this->input->post('status',TRUE),
			'kategori' => $this->input->post('kategori',TRUE),
			'tahun' => $this->input->post('tahun',TRUE),
			'nomor' => $this->input->post('nomor',TRUE),
			'submit' => $this->input->post('submit',TRUE)
		);


	
	  
	if (isset($_POST['submit'])){
		


	$data_cari = array(
		'tentang' => $this->input->post('tentang',TRUE),
		'status' => $this->input->post('status',TRUE),
		'kategori' => $this->input->post('kategori',TRUE),
		'tahun' => $this->input->post('tahun',TRUE),
		'nomor' => $this->input->post('nomor',TRUE),
		'submit' => $this->input->post('submit',TRUE)
	);

	
	

			
			$keyword = cetak($this->input->post('tentang'));
			$data['title'] = 'Pencarian keyword : '.$keyword;
		//	$jumlah= $this->model_utama->hitungprodukcari(0,21,$data_cari)->num_rows();
			$data['produk'] = $this->model_utama->semua_produk_cari(0,21,$data_cari);
		
			
		}
		else{

			//var_dump('b') or die();
			$data['title'] = 'Produk Hukum';
			$jumlah= $this->model_utama->hitungproduk()->num_rows();

			$config['base_url'] = base_url().'produk/index/';


			$config['full_tag_open'] = '<ul class="pagination">';        
			$config['full_tag_close'] = '</ul>';        
			$config['first_link'] = 'First';        
			$config['last_link'] = 'Last';        
			$config['first_tag_open'] = '<li class="page-item"><span class="page-link">';        
			$config['first_tag_close'] = '</span></li>';        
			$config['prev_link'] = '&laquo';        
			$config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';        
			$config['prev_tag_close'] = '</span></li>';        
			$config['next_link'] = '&raquo';        
			$config['next_tag_open'] = '<li class="page-item"><span class="page-link">';        
			$config['next_tag_close'] = '</span></li>';        
			$config['last_tag_open'] = '<li class="page-item"><span class="page-link">';        
			$config['last_tag_close'] = '</span></li>';        
			$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';        
			$config['cur_tag_close'] = '</a></li>';        
			$config['num_tag_open'] = '<li class="page-item"><span class="page-link">';        
			$config['num_tag_close'] = '</span></li>';
			$config['total_rows'] = $jumlah;
			$config['per_page'] = 10; 	
				if ($this->uri->segment('3')!=''){
					$dari = $this->uri->segment('3');
				}else{
					$dari = 0;
				}

				if (is_numeric($dari)) {
					
					$data['produk'] = $this->model_utama->semua_produk($dari, $config['per_page']);
				}else{
				
					redirect('produk');
				}
			$this->pagination->initialize($config);
		}
		$this->template->load(template().'/template',template().'/view_semua_produk',$data);
	}
	public function detail(){
		$ids = $this->uri->segment(3);
		$dat = $this->db->query("SELECT * FROM berita where judul_seo='$ids' OR id_berita='$ids'");
	    $row = $dat->row();
	    $total = $dat->num_rows();
	        if ($total == 0){
	        	redirect('utama');
	        }
		$data['title'] = $row->judul;
		$data['record'] = $this->model_utama->berita_detail($ids)->row_array();
		$data['infoterkait'] = $this->model_utama->info_terkait(3,$row->tag);
		$this->model_utama->produk_dibaca_update($ids);
		$this->load->helper('captcha');
		$vals = array(
            'img_path'	 => './captcha/',
            'img_url'	 => base_url().'captcha/',
            'font_path' => './asset/Tahoma.ttf',
            'font_size'     => 16,
            'img_width'	 => '100',
            'img_height' => 30,
            'border' => 0,
            'word_length'   => 5,
            'expiration' => 7200
        );

        $cap = create_captcha($vals);
        $data['image'] = $cap['image'];
        $this->session->set_userdata('mycaptcha', $cap['word']);
		$this->template->load(template().'/template',template().'/view_berita_detail',$data);
	}

	public function kategori(){
		$ids = $this->uri->segment(3);
		$dat = $this->db->query("SELECT * FROM kategori where kategori_seo='".$this->db->escape_str($ids)."'");
	    $row = $dat->row();
	    $total = $dat->num_rows();
	        if ($total == 0){
	        	redirect('utama');
	        }
	    $jumlah= $this->model_utama->hitungberitakategori($row->id_kategori)->num_rows();
		$config['base_url'] = base_url().'berita/kategori/'.$row->kategori_seo;
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 21;
			if ($this->uri->segment('4')!=''){
				$dari = $this->uri->segment('4');
			}else{
				$dari = 0;
			}

			if (is_numeric($dari)) {
				$data['kategori'] = $this->model_utama->detail_kategori($row->id_kategori, $dari, $config['per_page']);
			}else{
				redirect('berita');
			}
		$this->pagination->initialize($config);
		$data['title'] = $row->nama_kategori;
		$this->template->load(template().'/template',template().'/view_kategori',$data);
	}

	function kirim_komentar(){
		if (isset($_POST['submit'])){
			$cek = $this->model_berita->list_berita_edit($this->input->post('a'));
			$row = $cek->row_array();
			if ($cek->num_rows()<=0){
				redirect('utama');
			}else{
				if ($this->input->post() && (strtolower($this->input->post('secutity_code')) == strtolower($this->session->userdata('mycaptcha')))) {
					$this->model_berita->kirim_komentar();
				}
			}
			redirect('berita/detail/'.$row['judul_seo'].'#listcomment');

		}
	}
}
