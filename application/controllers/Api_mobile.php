<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Api_mobile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_hukum','customers');
	}

	public function index(){

		$this->load->model('model_hukum');
		$data = $this->model_hukum->semua_hukum_mobile();
		$jsonString = json_encode($data);
		echo $jsonString;

	}
	public function limit(){

		$this->load->model('model_hukum');
		$data = $this->model_hukum->semua_hukum_mobile_limit(3);
		$jsonString = json_encode($data);
		echo $jsonString;

	}
	public function limit_uud($limit){

		$this->load->model('model_hukum');
		$data = $this->model_hukum->semua_hukum_mobile_limit_uud($limit);
		$jsonString = json_encode($data);
		echo $jsonString;

	}

	public function limit_perda($limit){

		$this->load->model('model_hukum');
		$data = $this->model_hukum->semua_hukum_mobile_limit_perda($limit);
		$jsonString = json_encode($data);
		echo $jsonString;

	}

	public function limit_perbup($limit){

		$this->load->model('model_hukum');
		$data = $this->model_hukum->semua_hukum_mobile_limit_perbup($limit);
		$jsonString = json_encode($data);
		echo $jsonString;

	}

	public function limit_perdprd($limit){

		$this->load->model('model_hukum');
		$data = $this->model_hukum->semua_hukum_mobile_limit_perdprd($limit);
		$jsonString = json_encode($data);
		echo $jsonString;

	}

	public function limit_kepbup($limit){

		$this->load->model('model_hukum');
		$data = $this->model_hukum->semua_hukum_mobile_limit_kepbup($limit);
		$jsonString = json_encode($data);
		echo $jsonString;

	}

	public function limit_perdes($limit){

		$this->load->model('model_hukum');
		$data = $this->model_hukum->semua_hukum_mobile_limit_perdes($limit);
		$jsonString = json_encode($data);
		echo $jsonString;

	}

	public function limit_nasak($limit){

		$this->load->model('model_hukum');
		$data = $this->model_hukum->semua_hukum_mobile_limit_nasak($limit);
		$jsonString = json_encode($data);
		echo $jsonString;

	}



	public function slide(){

		$this->load->model('model_utama');
		$data = $this->model_utama->headline_slide(0, 5);
		echo $data;
	}

	function search(){

		$nomor		= $_GET['nomor'];
		$tahun		= $_GET['tahun'];
		$tentang	= $_GET['tentang'];
		$kategori	= $_GET['kategori'];

		if($nomor=='' && $tahun==1 && $tentang=='' && $kategori=='all'){
			$this->load->model('model_hukum');
			$data = $this->model_hukum->semua_hukum_mobile();
			echo json_encode($data);
		}else if($kategori != 'all'){
				$this->load->model('model_hukum');
				$jenis = $this->model_hukum->jenis_hukum_mobile($kategori);
				$data = $this->model_hukum->search_semua_hukum_mobile($jenis->jenis_id, $nomor,$tahun,$tentang);
				echo $data;
		}else{
			$this->load->model('model_hukum');
			$data = $this->model_hukum->search_semua_hukum_mobile($kategori, $nomor,$tahun,$tentang);
			echo $data;
		}
	}
}
