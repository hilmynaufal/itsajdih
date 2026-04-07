<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Skm extends CI_Controller {
	public function index(){
		$data['title'] = 'SKM Kab Bandung';
		$config['base_url'] = base_url().'skm/index';
		
		$this->load->view('setda/view_skm', $data);

        // Memuat view dan mengirim data ke view
		// $this->template->load(template().'/template',template().'/view_grafik',$data);
	}


}
