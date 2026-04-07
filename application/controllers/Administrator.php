<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Administrator extends CI_Controller {

       public function __construct()
	{
		parent::__construct();
		$this->load->model('model_hukum','list_dokhukum');
		$this->load->model('Model_relaas');
	}


	function index(){
		if (isset($_POST['submit'])){
			$username = $this->input->post('a');
			$password = md5($this->input->post('b'));
			$cek = $this->model_users->cek_login($username,$password);
		    $row = $cek->row_array();
		    $total = $cek->num_rows();
			if ($total > 0){
				$this->session->set_userdata('upload_image_file_manager',true);
				$this->session->set_userdata(array('username'=>$row['username'],
								   'level'=>$row['level'],'id'=>$row['id_user']));
				redirect('administrator/home');
			}else{
				$data['title'] = 'Administrator &rsaquo; Log In';
				$this->load->view('administrator/view_login',$data);
			}
		}else{
			if ($this->session->level != ''){
				redirect('administrator/home');
			}else{
				$data['title'] = 'Administrator &rsaquo; Log In';
				$this->load->view('administrator/view_login',$data);
			}
		}
	}

	function home(){
		cek_session_admin();
		$this->template->load('administrator/template','administrator/view_home');
	}

	function identitaswebsite(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}else{
			if (isset($_POST['submit'])){
				$this->model_identitas->identitas_update();
				redirect('administrator/identitaswebsite');
			}else{
				$data['record'] = $this->model_identitas->identitas()->row_array();
				$this->template->load('administrator/template','administrator/mod_identitas/view_identitas',$data);
			}
		}

	}

// Controller Modul Pegawai

	function pegawai(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$data['record'] = $this->model_download->pegawai();
		$this->template->load('administrator/template','administrator/mod_download/view_pegawai',$data);
	}

	function tambah_pegawai(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		if (isset($_POST['submit'])){
			$this->model_download->pegawai_tambah();
			redirect('administrator/pegawai');
		}else{
			$this->template->load('administrator/template','administrator/mod_download/view_pegawai_tambah');
		}
	}

	function edit_pegawai(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$this->model_download->pegawai_update();
			redirect('administrator/pegawai');
		}else{
			$data['rows'] = $this->model_download->pegawai_edit($id)->row_array();
			$this->template->load('administrator/template','administrator/mod_download/view_pegawai_edit',$data);
		}
	}

	function delete_pegawai(){
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		$this->model_download->pegawai_delete($id);
		redirect('administrator/pegawai');
	}

	// Controller Modul Menu Utama

	function menuutama(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$data['record'] = $this->model_menu->menuutama();
		$this->template->load('administrator/template','administrator/mod_menu/view_menu',$data);
	}

	function tambah_menuutama(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		if (isset($_POST['submit'])){
			$this->model_menu->menuutama_tambah();
			redirect('administrator/menuutama');
		}else{
			$this->template->load('administrator/template','administrator/mod_menu/view_menu_tambah');
		}
	}

	function edit_menuutama(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$this->model_menu->menuutama_update();
			redirect('administrator/menuutama');
		}else{
			$data['rows'] = $this->model_menu->menuutama_edit($id)->row_array();
			$this->template->load('administrator/template','administrator/mod_menu/view_menu_edit',$data);
		}
	}

	function delete_menuutama(){
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		$this->model_menu->menuutama_delete($id);
		redirect('administrator/menuutama');
	}



	// Controller Modul Sub Menu

	function submenu(){
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		cek_session_admin();
		$data['record'] = $this->model_menu->submenu();
		$this->template->load('administrator/template','administrator/mod_submenu/view_submenu',$data);
	}

	function tambah_submenu(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		if (isset($_POST['submit'])){
			$this->model_menu->submenu_tambah();
			redirect('administrator/submenu');
		}else{
			$data['utama'] = $this->model_menu->cek_menuutama();
			$data['submenu'] = $this->model_menu->cek_submenu();
			$this->template->load('administrator/template','administrator/mod_submenu/view_submenu_tambah',$data);
		}
	}

	function edit_submenu(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$this->model_menu->submenu_update();
			redirect('administrator/submenu');
		}else{
			$data['rows'] = $this->model_menu->submenu_edit($id)->row_array();
			$data['utama'] = $this->model_menu->cek_menuutama();
			$data['submenu'] = $this->model_menu->cek_submenu();
			$this->template->load('administrator/template','administrator/mod_submenu/view_submenu_edit',$data);
		}
	}

	function delete_submenu(){
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		$this->model_menu->submenu_delete($id);
		redirect('administrator/submenu');
	}


	// Controller Modul Halaman Baru

	function halamanbaru(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$data['record'] = $this->model_halaman->halamanstatis();
		$this->template->load('administrator/template','administrator/mod_halaman/view_halaman',$data);
	}

	function tambah_halamanbaru(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		if (isset($_POST['submit'])){
			$this->model_halaman->halamanstatis_tambah();
			redirect('administrator/halamanbaru');
		}else{
			$this->template->load('administrator/template','administrator/mod_halaman/view_halaman_tambah');
		}
	}

	function edit_halamanbaru(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$this->model_halaman->halamanstatis_update();
			redirect('administrator/halamanbaru');
		}else{
			$data['rows'] = $this->model_halaman->halamanstatis_edit($ids)->row_array();
			$this->template->load('administrator/template','administrator/mod_halaman/view_halaman_edit',$data);
		}
	}

	function delete_halamanbaru(){
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		$this->model_halaman->halamanstatis_delete($id);
		redirect('administrator/halamanbaru');
	}



	// Controller Modul List Berita

	function cepat_berita(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		if (isset($_POST['submit'])){
			$this->model_berita->list_berita_cepat();
			redirect('administrator/berita');
		}
	}

	function berita(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$data['record'] = $this->model_berita->list_berita();
		$data['rss']    = $this->model_berita->list_berita_rss();
                $data['iden']   = $this->db->query("SELECT * FROM identitas ORDER BY id_identitas DESC LIMIT 1")->row_array();
                $this->load->view(template().'/rss',$data);
		$this->template->load('administrator/template','administrator/mod_berita/view_berita',$data);
	}

	function tambah_berita(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		if (isset($_POST['submit'])){
			$this->model_berita->list_berita_tambah();
			redirect('administrator/berita');
		}else{
			$data['tag'] = $this->model_berita->tag_berita();
			$data['record'] = $this->model_berita->kategori_berita();
			$data['users'] = $this->model_users->users();
			$this->template->load('administrator/template','administrator/mod_berita/view_berita_tambah',$data);
		}
	}

	function edit_berita(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$this->model_berita->list_berita_update();
			redirect('administrator/berita');
		}else{
			$data['tag'] = $this->model_berita->tag_berita();
			$data['record'] = $this->model_berita->kategori_berita();
			$data['rows'] = $this->model_berita->list_berita_edit($id)->row_array();
			$data['users'] = $this->model_users->users();
			$this->template->load('administrator/template','administrator/mod_berita/view_berita_edit',$data);
		}
	}

	function delete_berita(){
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		$this->model_berita->list_berita_delete($id);
		redirect('administrator/berita');
	}


	// Controller Modul Komentar Berita

	function komentar(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$data['record'] = $this->model_berita->komentar();
		$this->template->load('administrator/template','administrator/mod_komentar/view_komentar',$data);
	}

	function edit_komentar(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$this->model_berita->komentar_update();
			redirect('administrator/komentar');
		}else{
			$data['rows'] = $this->model_berita->komentar_edit($id)->row_array();
			$this->template->load('administrator/template','administrator/mod_komentar/view_komentar_edit',$data);
		}
	}

	function delete_komentar(){
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		$this->model_berita->komentar_delete($id);
		redirect('administrator/komentar');
	}


	// Controller Modul Kategori Berita

	function kategoriberita(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$data['record'] = $this->model_berita->kategori_berita();
		$this->template->load('administrator/template','administrator/mod_kategori/view_kategori',$data);
	}

	function tambah_kategoriberita(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		if (isset($_POST['submit'])){
			$this->model_berita->kategori_berita_tambah();
			redirect('administrator/kategoriberita');
		}else{
			$this->template->load('administrator/template','administrator/mod_kategori/view_kategori_tambah');
		}
	}

	function edit_kategoriberita(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$this->model_berita->kategori_berita_update();
			redirect('administrator/kategoriberita');
		}else{
			$data['rows'] = $this->model_berita->kategori_berita_edit($id)->row_array();
			$this->template->load('administrator/template','administrator/mod_kategori/view_kategori_edit',$data);
		}
	}

	function delete_kategoriberita(){
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		$this->model_berita->kategori_berita_delete($id);
		redirect('administrator/kategoriberita');
	}


	// Controller Modul Sensor Kata

	function sensorkata(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$data['record'] = $this->model_berita->sensorkata();
		$this->template->load('administrator/template','administrator/mod_sensorkata/view_sensorkata',$data);
	}

	function tambah_sensorkata(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		if (isset($_POST['submit'])){
			$this->model_berita->sensorkata_tambah();
			redirect('administrator/sensorkata');
		}else{
			$this->template->load('administrator/template','administrator/mod_sensorkata/view_sensorkata_tambah');
		}
	}

	function edit_sensorkata(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$this->model_berita->sensorkata_update();
			redirect('administrator/sensorkata');
		}else{
			$data['rows'] = $this->model_berita->sensorkata_edit($id)->row_array();
			$this->template->load('administrator/template','administrator/mod_sensorkata/view_sensorkata_edit',$data);
		}
	}

	function delete_sensorkata(){
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		$this->model_berita->sensorkata_delete($id);
		redirect('administrator/sensorkata');
	}


	// Controller Modul Tag Berita

	function tagberita(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$data['record'] = $this->model_berita->tag_berita();
		$this->template->load('administrator/template','administrator/mod_tag/view_tag',$data);
	}

	function tambah_tagberita(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		if (isset($_POST['submit'])){
			$this->model_berita->tag_berita_tambah();
			redirect('administrator/tagberita');
		}else{
			$this->template->load('administrator/template','administrator/mod_tag/view_tag_tambah');
		}
	}

	function edit_tagberita(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$this->model_berita->tag_berita_update();
			redirect('administrator/tagberita');
		}else{
			$data['rows'] = $this->model_berita->tag_berita_edit($id)->row_array();
			$this->template->load('administrator/template','administrator/mod_tag/view_tag_edit',$data);
		}
	}

	function delete_tagberita(){
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		$this->model_berita->tag_berita_delete($id);
		redirect('administrator/tagberita');
	}



	// Controller Modul Iklan Sidebar

	function banner(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$data['record'] = $this->model_iklan->banner();
		$this->template->load('administrator/template','administrator/mod_banner/view_banner',$data);
	}

	function tambah_banner(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		if (isset($_POST['submit'])){
			$this->model_iklan->banner_tambah();
			redirect('administrator/banner');
		}else{
			$this->template->load('administrator/template','administrator/mod_banner/view_banner_tambah');
		}
	}

	function edit_banner(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$this->model_iklan->banner_update();
			redirect('administrator/banner');
		}else{
			$data['rows'] = $this->model_iklan->banner_edit($id)->row_array();
			$this->template->load('administrator/template','administrator/mod_banner/view_banner_edit',$data);
		}
	}

	function delete_banner(){
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		$this->model_iklan->banner_delete($id);
		redirect('administrator/banner');
	}



	// Controller Modul Template Website

	function templatewebsite(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$data['record'] = $this->model_template->template();
		$this->template->load('administrator/template','administrator/mod_template/view_template',$data);
	}

	function tambah_templatewebsite(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		if (isset($_POST['submit'])){
			$this->model_template->template_tambah();
			redirect('administrator/templatewebsite');
		}else{
			$this->template->load('administrator/template','administrator/mod_template/view_template_tambah');
		}
	}

	function edit_templatewebsite(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$this->model_template->template_update();
			redirect('administrator/templatewebsite');
		}else{
			$data['rows'] = $this->model_template->template_edit($id)->row_array();
			$this->template->load('administrator/template','administrator/mod_template/view_template_edit',$data);
		}
	}

	function delete_templatewebsite(){
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		$this->model_template->template_delete($id);
		redirect('administrator/templatewebsite');
	}



	// Controller Modul Agenda

	function agenda(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$data['record'] = $this->model_agenda->agenda();
		$this->template->load('administrator/template','administrator/mod_agenda/view_agenda',$data);
	}

	function tambah_agenda(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		if (isset($_POST['submit'])){
			$this->model_agenda->agenda_tambah();
			redirect('administrator/agenda');
		}else{
			$this->template->load('administrator/template','administrator/mod_agenda/view_agenda_tambah');
		}
	}

	function edit_agenda(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$this->model_agenda->agenda_update();
			redirect('administrator/agenda');
		}else{
			$data['rows'] = $this->model_agenda->agenda_edit($id)->row_array();
			$this->template->load('administrator/template','administrator/mod_agenda/view_agenda_edit',$data);
		}
	}

	function delete_agenda(){
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		$this->model_agenda->agenda_delete($id);
		redirect('administrator/agenda');
	}



	// Controller Modul Pesan Masuk

	function pesanmasuk(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$data['record'] = $this->model_hubungi->pesan_masuk();
		$this->template->load('administrator/template','administrator/mod_pesanmasuk/view_pesanmasuk',$data);
	}

	function detail_pesanmasuk(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$this->model_hubungi->pesan_masuk_kirim();
			$data['rows'] = $this->model_hubungi->pesan_masuk_view($id)->row_array();
			$this->template->load('administrator/template','administrator/mod_pesanmasuk/view_pesanmasuk_detail',$data);
		}else{
			$data['rows'] = $this->model_hubungi->pesan_masuk_view($id)->row_array();
			$this->template->load('administrator/template','administrator/mod_pesanmasuk/view_pesanmasuk_detail',$data);
		}
	}

	function delete_pesanmasuk(){
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		$this->model_hubungi->pesan_masuk_delete($id);
		redirect('administrator/pesanmasuk');
	}


	// Controller Modul User

	function manajemenuser(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$data['record'] = $this->model_users->users();
		$this->template->load('administrator/template','administrator/mod_users/view_users',$data);
	}

	function tambah_manajemenuser(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->session->username;
		if (isset($_POST['submit'])){
			$this->model_users->users_tambah();
			redirect('administrator/manajemenuser');
		}else{
			$data['mo'] = $this->model_modul->users_modul();
			$data['rows'] = $this->model_users->users_edit($id)->row_array();
			$this->template->load('administrator/template','administrator/mod_users/view_users_tambah',$data);
		}
	}

	function edit_manajemenuser(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$this->model_users->users_update();
			redirect('administrator/manajemenuser');
		}else{
			$data['mo'] = $this->model_modul->users_modul();
			$data['rows'] = $this->model_users->users_edit($id)->row_array();
			$this->template->load('administrator/template','administrator/mod_users/view_users_edit',$data);
		}
	}

	function delete_manajemenuser(){
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		$this->model_users->users_delete($id);
		redirect('administrator/manajemenuser');
	}




	// Controller Modul Modul
	function manajemenmodul(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$data['record'] = $this->model_modul->modul();
		$this->template->load('administrator/template','administrator/mod_modul/view_modul',$data);
	}

	function tambah_manajemenmodul(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		if (isset($_POST['submit'])){
			$this->model_modul->modul_tambah();
			redirect('administrator/manajemenmodul');
		}else{
			$this->template->load('administrator/template','administrator/mod_modul/view_modul_tambah');
		}
	}

	function edit_manajemenmodul(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$this->model_modul->modul_update();
			redirect('administrator/manajemenmodul');
		}else{
			$data['rows'] = $this->model_modul->modul_edit($id)->row_array();
			$this->template->load('administrator/template','administrator/mod_modul/view_modul_edit',$data);
		}
	}

	function delete_manajemenmodul(){
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		$this->model_modul->modul_delete($id);
		redirect('administrator/manajemenmodul');
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}


	// Controller Modul Download

	function download(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$data['record'] = $this->model_download->download();
		$this->template->load('administrator/template','administrator/mod_download/view_download',$data);
	}

	function tambah_download(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		if (isset($_POST['submit'])){
			$this->model_download->download_tambah();
			redirect('administrator/download');
		}else{
			$this->template->load('administrator/template','administrator/mod_download/view_download_tambah');
		}
	}

	function edit_download(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$this->model_download->download_update();
			redirect('administrator/download');
		}else{
			$data['rows'] = $this->model_download->download_edit($id)->row_array();
			$this->template->load('administrator/template','administrator/mod_download/view_download_edit',$data);
		}
	}

	function delete_download(){
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		$this->model_download->download_delete($id);
		redirect('administrator/download');
	}


	// Controller Modul Polling

	function polling(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$data['record'] = $this->model_polling->polling();
		$this->template->load('administrator/template','administrator/mod_polling/view_polling',$data);
	}

	function tambah_polling(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		if (isset($_POST['submit'])){
			$this->model_polling->polling_tambah();
			redirect('administrator/polling');
		}else{
			$this->template->load('administrator/template','administrator/mod_polling/view_polling_tambah');
		}
	}

	function edit_polling(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$this->model_polling->polling_update();
			redirect('administrator/polling');
		}else{
			$data['rows'] = $this->model_polling->polling_edit($id)->row_array();
			$this->template->load('administrator/template','administrator/mod_polling/view_polling_edit',$data);
		}
	}

	function delete_polling(){
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		$this->model_polling->polling_delete($id);
		redirect('administrator/polling');
	}



	// Controller Modul Sekilas Info

	function sekilasinfo(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$data['record'] = $this->model_sekilasinfo->sekilasinfo();
		$this->template->load('administrator/template','administrator/mod_sekilasinfo/view_sekilasinfo',$data);
	}

	function tambah_sekilasinfo(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		if (isset($_POST['submit'])){
			$this->model_sekilasinfo->sekilasinfo_tambah();
			redirect('administrator/sekilasinfo');
		}else{
			$this->template->load('administrator/template','administrator/mod_sekilasinfo/view_sekilasinfo_tambah');
		}
	}

	function edit_sekilasinfo(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$this->model_sekilasinfo->sekilasinfo_update();
			redirect('administrator/sekilasinfo');
		}else{
			$data['rows'] = $this->model_sekilasinfo->sekilasinfo_edit($id)->row_array();
			$this->template->load('administrator/template','administrator/mod_sekilasinfo/view_sekilasinfo_edit',$data);
		}
	}

	function delete_sekilasinfo(){
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		$this->model_sekilasinfo->sekilasinfo_delete($id);
		redirect('administrator/sekilasinfo');
	}


	// Controller Modul Link Terkait

	function linkterkait(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$data['record'] = $this->model_linkterkait->linkterkait();
		$this->template->load('administrator/template','administrator/mod_linkterkait/view_linkterkait',$data);
	}

	function tambah_linkterkait(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		if (isset($_POST['submit'])){
			$this->model_linkterkait->linkterkait_tambah();
			redirect('administrator/linkterkait');
		}else{
			$this->template->load('administrator/template','administrator/mod_linkterkait/view_linkterkait_tambah');
		}
	}

	function edit_linkterkait(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$this->model_linkterkait->linkterkait_update();
			redirect('administrator/linkterkait');
		}else{
			$data['rows'] = $this->model_linkterkait->linkterkait_edit($id)->row_array();
			$this->template->load('administrator/template','administrator/mod_linkterkait/view_linkterkait_edit',$data);
		}
	}

	function delete_linkterkait(){
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		$this->model_linkterkait->linkterkait_delete($id);
		redirect('administrator/linkterkait');
	}



	// Controller Modul shoutbox

	function shoutbox(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$data['record'] = $this->model_shoutbox->shoutbox();
		$this->template->load('administrator/template','administrator/mod_shoutbox/view_shoutbox',$data);
	}

	function edit_shoutbox(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$this->model_shoutbox->shoutbox_update();
			redirect('administrator/shoutbox');
		}else{
			$data['rows'] = $this->model_shoutbox->shoutbox_edit($id)->row_array();
			$this->template->load('administrator/template','administrator/mod_shoutbox/view_shoutbox_edit',$data);
		}
	}

	function delete_shoutbox(){
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		$this->model_shoutbox->shoutbox_delete($id);
		redirect('administrator/shoutbox');
	}


	// Controller Modul Album

	function album(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$data['record'] = $this->model_album->album();
		$this->template->load('administrator/template','administrator/mod_album/view_album',$data);
	}

	function tambah_album(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		if (isset($_POST['submit'])){
			$this->model_album->album_tambah();
			redirect('administrator/album');
		}else{
			$this->template->load('administrator/template','administrator/mod_album/view_album_tambah');
		}
	}

	function edit_album(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$this->model_album->album_update();
			redirect('administrator/album');
		}else{
			$data['rows'] = $this->model_album->album_edit($id)->row_array();
			$this->template->load('administrator/template','administrator/mod_album/view_album_edit',$data);
		}
	}

	function delete_album(){
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		$this->model_album->album_delete($id);
		redirect('administrator/album');
	}


	// Controller Modul Galeri

	function galeri(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$data['record'] = $this->model_album->galeri();
		$this->template->load('administrator/template','administrator/mod_galeri/view_galeri',$data);
	}

	function tambah_galeri(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		if (isset($_POST['submit'])){
			$this->model_album->galeri_tambah();
			redirect('administrator/galeri');
		}else{
			$data['record'] = $this->model_album->album();
			$this->template->load('administrator/template','administrator/mod_galeri/view_galeri_tambah',$data);
		}
	}

	function edit_galeri(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$this->model_album->galeri_update();
			redirect('administrator/galeri');
		}else{
			$data['rows'] = $this->model_album->galeri_edit($id)->row_array();
			$data['record'] = $this->model_album->album();
			$this->template->load('administrator/template','administrator/mod_galeri/view_galeri_edit',$data);
		}
	}

	function delete_galeri(){
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		$this->model_album->galeri_delete($id);
		redirect('administrator/galeri');
	}



	function produk_hukum(){
		cek_session_admin();
                $this->load->helper('url');
	/*	if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}*/
		$this->load->model('model_hukum');

		$data['jenis_produk'] = $this->model_hukum->jenis_hukum();
        $data['record'] = $this->model_hukum->status_hukum();
        $data['jenis_dokumen'] = $this->model_hukum->get_jenis_dokumen();

		// $data['search_jenis_produk'] = $search_jenis_produk;

        // $data['jenis_dok'] = $jenis_dok;
        // $data['searchtahun'] = $searchtahun;
        // $data['searchNomor'] = $searchNomor;


		// $data['record'] = $this->model_hukum->list_hukum();
        $data['iden'] = $this->db->query("SELECT * FROM identitas ORDER BY id_identitas DESC LIMIT 1")->row_array();
		$this->template->load('administrator/template','administrator/mod_hukum/view_hukum',$data);
	}



        public function ajax_list()
	{
		$list = $this->list_dokhukum->get_datatables();
		$data = array();

		$no = $_POST['start'];
		
		foreach ($list as $data_hukum) {
			$no++;
			$row = array();
			
			$row[] = $no;
					
			if (is_null($data_hukum->path_file_abstrak)) {
				$filePathabstrak = ''; // Path file lokal
			} else {
				$filePathabstrak = '.'.$data_hukum->path_file_abstrak; // Path file lokal
				
			}

 			$viewabstrak = file_exists($filePathabstrak)
			? "<form target='_blank' action='" . base_url() . "hukum/viewabstrak/' method='post'><button name='id'  title='Preview'  value=".$data_hukum->id." class='btn btn-primary btn-xs' >Baca</button>"
			: "<span class='badge badge-danger'>File Not Found</span>";


			if (is_null($data_hukum->path_peraturan)) {
				$path_peraturan = ''; // Path file lokal
			} else {
				$path_peraturan = '.' .$data_hukum->path_peraturan; // Path file lokal
			}
            $viewperaturan = file_exists($path_peraturan)
                ? "<form target='_blank' action='" . base_url() . "hukum/viewPdf/' method='post'><button name='id'  title='Preview'  value=" . $data_hukum->id . " class='btn btn-primary btn-xs' >Baca</button>"
                : "<span class='badge badge-danger'>File Not Found</span>";


			if (is_null($data_hukum->path_file_inggris)) {
				$path_inggris = ''; // Path file lokal
			} else {
				$path_inggris = '.' .$data_hukum->path_file_inggris; // Path file lokal
			}

            $viewinggris= file_exists($path_inggris)
                ? "<form target='_blank' action='" . base_url() . "hukum/view_inggris/' method='post'><button name='id'  title='Preview'  value=" . $data_hukum->id . " class='btn btn-primary btn-xs' >Baca</button>"
                : "<span class='badge badge-danger'>File Not Found</span>";
	

				$row[] =$viewabstrak;
				$row[] =$viewperaturan;


			//$row[] = '<form target="_blank" action="' . base_url() . 'hukum/viewabstrak/" method="post"><button name="id"  title="Preview"  value=' . $data_hukum->id . ' class="btn btn-primary btn-xs" >Baca</button></form>';
    				$this->load->model('model_hukum');
                            $pdf = $this->model_hukum->list_pdf($data_hukum->id);
                            $no_path = 1;
                            $array = [];
                            $color[1]='btn-primary';
                            $color[2]='btn-warning';
                            $color[3]='btn-info';
                            $color[4]='btn-success';
                            $color[5]='btn-danger';

                            foreach ($pdf->result_array() as $path){

								// $filePath = './' . $data_hukum->path_peraturan; // Path file lokal
								// $viewabstrak = file_exists($filePath)

                             $array[] = '<a target="_blank"  class="'.$color[$no_path].' btn  btn-xs" target="_blank" href="'.base_url($path['file_path']).' "><span class="glyphicon glyphicon-open"></span> Dokument '.$no_path.' </a>';

                            $no_path++;
                          }

                        // $row[] = $array;
						$row[]='<a href="'.base_url().'hukum/detail_hukum/'.$data_hukum->id.'">'.$data_hukum->nama.' </a>
                            <div class="modal fade" id="myModal'.$data_hukum->id.'"  role="dialog" style="margin-top: 10px;">
                                    <div class="modal-dialog">
                                     <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Abstrak</h4>
                                            </div>
                                            <div class="modal-body">
                                            <dl class="dl-vertical">
                                            <dd> <a class="btn-primary btn  btn-xs" target="_blank" href="'.base_url($data_hukum->path_file_abstrak).' ">Ada : <span class="glyphicon glyphicon-open"></span> Dokument '.($no_path-1).' </a></dd>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                        </div>
                                        </div>
                                    </div>';
					
			$row[] = $data_hukum->nama_inggris;
			$row[] = $viewinggris;

						//$row[] = '<form target="_blank"  action="' . base_url() . 'hukum/view_inggris/" method="post"><button name="id"  title="Preview"  value=' . $data_hukum->id . ' class="btn btn-primary btn-xs" >Baca</button></form>';
						$row[] = $data_hukum->tanggal_ditetapkan;
			
			$row[] = $data_hukum->no;
			$row[] = $data_hukum->tahun;
			$row[] = $data_hukum->jenis_nama;
			$row[] = $data_hukum->status_nama;
			$row[] = $data_hukum->id;
             $row[]='<a class="btn btn-success btn-xs" title="Edit Data" href="'.base_url().'administrator/edit_hukum/'.$data_hukum->id.'"><span class="glyphicon glyphicon-edit"></span></a>
             <a class="btn btn-danger btn-xs" title="Delete Data" href='.base_url().'administrator/delete_hukum/'.$data_hukum->id.'  onclick=\'return confirm("Apa anda yakin untuk hapus Data ini?")\'><span class="glyphicon glyphicon-remove"></span></a>';
                        $data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->list_dokhukum->count_all(),
						"recordsFiltered" => $this->list_dokhukum->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

     function tambah_hukum(){
		cek_session_admin();
	/*	if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}*/
		$this->load->model('model_hukum');
		if (isset($_POST['submit'])){
			$this->model_hukum->list_hukum_tambah();
			redirect('administrator/produk_hukum');
		}else{
			$data['tag'] = $this->model_hukum->jenis_hukum();
			$data['record'] = $this->model_hukum->status_hukum();
			$data['users'] = $this->model_users->users();
			$data['jenis_dokumen'] = $this->model_hukum->get_jenis_dokumen();
			$this->template->load('administrator/template','administrator/mod_hukum/view_hukum_tambah',$data);
		}
	}


	public function get_subjenishukum() {

		$this->load->model('model_hukum');
        $id_kategori = $this->input->post('id_kategori');
        $subkategori = $this->model_hukum->get_subjenis_hukum( $id_kategori);
        echo json_encode($subkategori);
    }



	



	function edit_hukum(){
		$this->load->model('model_hukum');
		cek_session_admin();
/*		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}*/
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$this->model_hukum->list_hukum_update();
			redirect('administrator/produk_hukum');
		}else{
			$data['rows'] = $this->model_hukum->list_hukum_edit($id)->row_array();
			$data['tag'] = $this->model_hukum->jenis_hukum();
			$data['jenis_dok'] = $this->model_hukum->get_jenis_dokumen();

			$data['record'] = $this->model_hukum->status_hukum();
			$data['users'] = $this->model_users->users();
			$this->template->load('administrator/template','administrator/mod_hukum/view_hukum_edit',$data);
		}
	}

	function delete_hukum(){
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		$this->load->model('model_hukum');
		$this->model_hukum->list_hukum_delete($id);
		redirect('administrator/produk_hukum');
	}

	// controller modul pengajuan produk hukum
	function pengajuan_hukum(){
		cek_session_admin();
		$this->load->model('model_pengajuan_hukum');
		$data['record'] = $this->model_pengajuan_hukum->list_pengajuan_hukum();
        $data['iden'] = $this->db->query("SELECT * FROM identitas ORDER BY id_identitas DESC LIMIT 1")->row_array();
		$this->template->load('administrator/template','administrator/mod_pengajuan_hukum/view_pengajuan_hukum',$data);
	}

	function tambah_pengajuan_hukum(){
		cek_session_admin();
		$this->load->model('model_pengajuan_hukum');
		if (isset($_POST['submit'])){
			$this->model_pengajuan_hukum->list_pengajuan_hukum_tambah();
			redirect('administrator/pengajuan_hukum');
		}else{
			$data['tag'] = $this->model_pengajuan_hukum->jenis_hukum();
			$data['users'] = $this->model_users->users();
			$this->template->load('administrator/template','administrator/mod_pengajuan_hukum/view_pengajuan_hukum_tambah',$data);
		}
	}
	function tambah_rapat_pengajuan_hukum(){
		cek_session_admin();
		$this->load->model('model_pengajuan_hukum');
			$this->model_pengajuan_hukum->list_rapat_pengajuan_hukum_tambah();
			redirect('administrator/edit_pengajuan_hukum/'.$this->input->post('id'));
	}

	function ubah_rapat_pengajuan_hukum(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		$this->load->model('model_pengajuan_hukum');
		if (isset($_POST['submit'])){
			$this->model_pengajuan_hukum->list_rapat_pengajuan_hukum_update();
			redirect('administrator/edit_pengajuan_hukum/'.$this->input->post('id'));
		}
	}

	function edit_pengajuan_hukum(){
		$this->load->model('model_pengajuan_hukum');
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$this->model_pengajuan_hukum->list_pengajuan_hukum_update();
			redirect('administrator/pengajuan_hukum');
		}else{
			$data['rows'] = $this->model_pengajuan_hukum->list_pengajuan_hukum_edit($id)->row_array();
			$data['tag'] = $this->model_pengajuan_hukum->jenis_hukum();
			$data['users'] = $this->model_users->users();
			$this->template->load('administrator/template','administrator/mod_pengajuan_hukum/view_pengajuan_hukum_edit',$data);
		}
	}

	function delete_pengajuan_hukum(){
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		$this->load->model('model_pengajuan_hukum');
		$this->model_pengajuan_hukum->list_pengajuan_hukum_delete($id);
		redirect('administrator/pengajuan_hukum');
	}

	function delete_rapat_pengajuan_hukum($id,$id_pengajuan){
		// $id = $this->uri->segment(3);
		$this->load->model('model_pengajuan_hukum');
		$this->model_pengajuan_hukum->list_rapat_pengajuan_hukum_delete($id);
		redirect('administrator/edit_pengajuan_hukum/'.$id_pengajuan);
	}

	function get_data_hukum(){
		if (!isset($_SERVER['PHP_AUTH_USER'])) {
		header('WWW-Authenticate: Basic realm="JDIH"');
		header('HTTP/1.0 401 Unauthorized');
		echo 'Fail To Authenticating';
		exit;
		} else
			//74341b7c2fd64b3ad1d4226c23f89f71 &&&& 93294294c0e04797faa194fab8345c5c
		{
		if ($_SERVER['PHP_AUTH_USER'] == 'bag.hukum@bandungkab.go.id' && md5($_SERVER['PHP_AUTH_PW']) == '74341b7c2fd64b3ad1d4226c23f89f71') {
		$DBHOST= "localhost" ;
		$DBUSER= "root" ;
		$DBPASSWORD= "jdih2014" ;
		$DBNAME= "jdih2018";
		$con=mysqli_connect($DBHOST,$DBUSER,$DBPASSWORD,$DBNAME);
		$query="SELECT * FROM `hukum`
		JOIN `jenis_hukum` ON hukum.id_jenis = jenis_hukum.jenis_id
		JOIN `status_hukum` ON hukum.id_status = status_hukum.status_id
		WHERE hukum.visible = '1'
		ORDER BY tahun DESC";
		$res=mysqli_query($con,$query);
		$response=array();
		$date = new DateTime();



		while($result=mysqli_fetch_array($res)){
					$query1 =  "SELECT * FROM `file_hukum`
					WHERE file_hukum.file_id_hukum = ". $result['id'] ." ORDER BY created_by DESC";
					$res1=mysqli_query($con,$query1);
					while($result1=mysqli_fetch_array($res1)){
					
						$row_array['tanggalData']=$date->format('Y-m-d');
						$row_array['idData']=(int)$result['id'];
						$row_array['jenis']=$result['jenis_nama'];
						$row_array['urlDownload']= "http://jdih.bandungkab.go.id/".$result1['file_path'];
						$row_array['urlDetailPeraturan']="";
						$row_array['tanggal']= date('Y-m-d', strtotime($result['created_at']));
						$row_array['tahun']=(int)$result['tahun'];
						$row_array['operasi']=4;
						$row_array['noPeraturan']=(int)$result['no'];	
						$row_array['judul']=preg_replace('/[\x00-\x1F\x80-\xFF]/', '',utf8_encode($result['nama']));
						$row_array['fileDownload']="";
						$row_array['hasilUjiMateriMk']=$result['status_nama'];
						$row_array['abstrak']="";
						$row_array['katalog']="";
						$row_array['status']=$result['status_nama'];
						$row_array['idkategori']=11501;
						$row_array['display']=1;

						array_push($response,$row_array);
					}

				// Digunakan untuk mengambil tahun
				}
				header('Content-Type: application/json');
				echo json_encode($response);
			}else{
				header('WWW-Authenticate: Basic realm="JDIH"');
				header('HTTP/1.0 401 Unauthorized');
				echo 'Fail To Authenticating';
				exit;
			}
		}
	}
	// Controller Modul Download

	function relaas(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
	//	$this->load->model('Model_relaas');
		$data['record'] = $this->Model_relaas->relaas();
		$this->template->load('administrator/template','administrator/mod_relaas/view_relaas',$data);
	}

	function tambah_relaas(){
	
		
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		

		if (isset($_POST['submit'])){
			$this->load->model('Model_relaas');
			$this->Model_relaas->relaas_tambah();
			redirect('administrator/relaas');
		}else{
			$this->template->load('administrator/template','administrator/mod_relaas/view_relaas_tambah');
		}
	}

	function edit_relaas(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$this->load->model('Model_relaas');
			$this->Model_relaas->relaas_update();
			redirect('administrator/relaas');
		}else{
			
			$data['rows'] = $this->Model_relaas->relaas_edit($id)->row_array();
			$this->template->load('administrator/template','administrator/mod_relaas/view_relaas_edit',$data);
		}
	}

	function delete_relaas(){
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		$this->Model_relaas->relaas_delete($id);
		redirect('administrator/relaas');
	}

	

//	modul yurisprudensi admin

	function yurisprudensi(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$this->load->model('Model_yurisprudensi');
		$data['record'] = $this->Model_yurisprudensi->yurisprudensi();
		$this->template->load('administrator/template','administrator/mod_yurisprudensi/view_yurisprudensi',$data);
	}

	function tambah_yurisprudensi(){
	
		
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		
		if (isset($_POST['submit'])){
			$this->load->model('Model_yurisprudensi');
			$this->Model_yurisprudensi->yurisprudensi_tambah();
			redirect('administrator/yurisprudensi');
		}else{
			$this->template->load('administrator/template','administrator/mod_yurisprudensi/view_yurisprudensi_tambah');
		}
	}

	function edit_yurisprudensi(){
		cek_session_admin();
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$this->load->model('Model_yurisprudensi');
			$this->Model_yurisprudensi->yurisprudensi_update();
			redirect('administrator/yurisprudensi');
		}else{
			$this->load->model('Model_yurisprudensi');
			$data['rows'] = $this->Model_yurisprudensi->yurisprudensi_edit($id)->row_array();
			$this->template->load('administrator/template','administrator/mod_yurisprudensi/view_yurisprudensi_edit',$data);
		}
	}

	function delete_yurisprudensi(){
		if ($this->session->level != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
		$id = $this->uri->segment(3);
		$this->load->model('Model_yurisprudensi');
		$this->Model_yurisprudensi->yurisprudensi_delete($id);
		redirect('administrator/yurisprudensi');
	}




	public function get_subjenis_hukum() {
        $id_kategori = $this->input->post('id_kategori');
        $subkategori = $this->Model_hukum->get_subjenis_hukum($id_kategori);
        echo json_encode($subkategori);
    }


}
