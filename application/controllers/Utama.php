<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Utama extends CI_Controller {
	public function index(){

	
		$this->load->model('model_hukum');
		$data['level'] = $this->model_hukum->level_hukum();
		$data['jenis_produk'] = $this->model_hukum->jenis_hukum();
        $data['record'] = $this->model_hukum->get_status_hukum();
        $data['jenis_dokumen'] = $this->model_hukum->get_jenis_dokumen();


		$this->template->load(template().'/template',template().'/view_home',$data);

		//$this->template->load(template().'/template',template().'/view_home',$data);
	}

}
