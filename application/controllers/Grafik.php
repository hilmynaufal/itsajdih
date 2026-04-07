<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Grafik extends CI_Controller {
	public function index(){
		$data['title'] = 'Grafik';
	//	$jumlah= $this->model_utama->get_chart_data()->num_rows();
		$config['base_url'] = base_url().'grafik/index';
	
		$data['chart_kategori'] = $this->model_utama->get_chart_kategori();
		$data['chart_tahun'] = $this->model_utama->get_chart_tahun();
		$data['chart_kategori_status'] = $this->model_utama->get_chart_kategori_status();
		//var_dump($data) or die();

        // Memuat view dan mengirim data ke view
      //  $this->load->view('chart_view', $data);
		$this->template->load(template().'/template',template().'/view_grafik',$data);
	}


}
