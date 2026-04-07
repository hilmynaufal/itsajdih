<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Download extends CI_Controller {
	public function index(){
		$data['title'] = 'Halaman Download';
		$jumlah= $this->model_utama->hitungdownload()->num_rows();
		$config['base_url'] = base_url().'download/index';
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 20; 	
			if ($this->uri->segment('3')!=''){
				$dari = $this->uri->segment('3');
			}else{
				$dari = 0;
			}
			if (is_numeric($dari)) {
				$data['download'] = $this->model_utama->index($dari, $config['per_page']);
			}else{
				redirect('download');
			}

			
		$this->pagination->initialize($config);
		$this->template->load(template().'/template',template().'/view_download',$data);
	}

	function file(){
		$name = $this->uri->segment(3);
		$this->model_utama->updatehits($name);
		$data = file_get_contents("asset/files/".$name);
		force_download($name, $data);
	}

	public function detail_download($id){
            
         //  var_dump('aaa') or die();

		$data['title'] = 'News Letter JDIH DPRD Bandung';
		$this->load->model('model_hukum');
		$data['detail'] = $this->model_download->download_detail($id);
		$data['id_doc']=$id;

		//var_dump($data['detail'] ) or die();
		
		 $this->template->load(template().'/template',template().'/view_download_detail',$data);
// 		$this->template->load(template().'/template',template().'/view_hukum_detail',$data);
	}
}
