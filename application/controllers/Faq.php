<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Faq extends CI_Controller {
	public function index(){
		// $this->load->model('model_hukum');
		// $data['level'] = $this->model_hukum->level_hukum();
		$this->template->load(template().'/template',template().'/view_faq');
	}

}
