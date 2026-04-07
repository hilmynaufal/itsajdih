<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Relaas extends CI_Controller {
	public function index(){
		$data['title'] = 'Halaman Relaas';
		$this->load->model('model_relaas');
		$jumlah= $this->model_relaas->hitungdownload()->num_rows();
		$config['base_url'] = base_url().'relaas/index';
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 20; 	
			if ($this->uri->segment('3')!=''){
				$dari = $this->uri->segment('3');
			}else{
				$dari = 0;
			}
			if (is_numeric($dari)) {
				$data['relaas'] = $this->model_relaas->index($dari, $config['per_page']);
			}else{
				redirect('relaas');
			}

			
		$this->pagination->initialize($config);
		$this->template->load(template().'/template',template().'/view_relaas',$data);
	}

	function file(){
		$name = $this->uri->segment(3);
		$this->model_utama->updatehits($name);
		$data = file_get_contents("asset/relaas/".$name);
		force_download($name, $data);
	}

	public function detail_download($id){
            
         //  var_dump('aaa') or die();

		$data['title'] = 'Relaas';
		$this->load->model('model_relaas');
		$data['detail'] = $this->model_download->download_detail($id);
		$data['id_doc']=$id;

		//var_dump($data['detail'] ) or die();
		
		 $this->template->load(template().'/template',template().'/view_relaas_detail',$data);
// 		$this->template->load(template().'/template',template().'/view_hukum_detail',$data);
	}
}
