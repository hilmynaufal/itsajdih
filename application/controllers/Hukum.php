<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Hukum extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','download'));		
		$this->load->model('model_hukum','list_hukum');
                $this->load->helper('url');
                
	}

               
	public function index(){
			$data['title'] = 'Semua Produk Hukum';
			$config['base_url'] = base_url().'hukum/index';
			$this->load->model('model_hukum');	
			$data['berita'] = $this->model_hukum->semua_hukum();
				$this->load->helper('url');

				$this->template->load(template().'/template',template().'/view_hukum',$data);
	}

	public function detail_hukum($id){
   
	
		$data['title'] = 'Semua Produk Hukum';
		$this->load->model('model_hukum');
		$data['detail'] = $this->model_hukum->detail_hukum($id);

		// tambahkan ini
		$data['braile'] = $this->model_hukum->get_braile($id)->result_array()[0]['file_path'];
		$data['audio']  = $this->model_hukum->get_audio($id)->result_array()[0]['file_path'];
	
		$data['id_doc']=$id;
		
		   $this->load->model('model_hukum');
                            $pdf = $this->model_hukum->list_pdf($id);
                            $no_path = 1;
                            $array = [];
                            $color[1]='btn-primary';
                            $color[2]='btn-warning';
                            $color[3]='btn-info';
                            $color[4]='btn-success';
                            $color[5]='btn-danger';

                            foreach ($pdf->result_array() as $path){
                             $array[] = '<a class="'.$color[$no_path].' btn  btn-xs" target="_blank" href="'.base_url($path['file_path']).' "><span class="glyphicon glyphicon-open"></span> Dokument '.$no_path.' </a>';
                            $no_path++;


                          }
					
						  $this->model_utama->produk_dibaca_update($id);	
		
		
		 $this->template->load(template().'/template',template().'/view_hukum_detail',$data);

	}
	
	
	public function detail_hukum_bahasa($id){
 


		$data['title'] = 'Semua Produk Hukum';
		$this->load->model('model_hukum');
		$data['detail'] = $this->model_hukum->detail_hukum($id);
		$data['id_doc']=$id;
		
		   $this->load->model('model_hukum');
                            $pdf = $this->model_hukum->list_pdf($id);
                            $no_path = 1;
                            $array = [];
                            $color[1]='btn-primary';
                            $color[2]='btn-warning';
                            $color[3]='btn-info';
                            $color[4]='btn-success';
                            $color[5]='btn-danger';

                            foreach ($pdf->result_array() as $path){
                             $array[] = '<a class="'.$color[$no_path].' btn  btn-xs" target="_blank" href="'.base_url($path['file_path']).' "><span class="glyphicon glyphicon-open"></span> Dokument '.$no_path.' </a>';
                            $no_path++;


                          }
					
		  $this->model_utama->produk_dibaca_update($id);	
		
		
		
		 $this->template->load(template().'/template',template().'/view_hukum_detail_bahasa',$data);

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

	function search(){
         
            // POST data
			$postData = $this->input->post();
			$jumlah= $this->model_utama->hitunghukum()->num_rows();
			$config['base_url'] = base_url().'hukum/index';
			$this->load->model('model_hukum');
//			$data['tampil_hukum'] = $this->model_hukum->search_semua_hukum($katagori, $nomor,$tahun,$tentang);
                        $data['tampil_hukum'] = $this->model_hukum->getUsers($postData);
                       // var_dump($postData)OR die();
                        $this->template->load(template().'/template',template().'/view_hukum',$data);
		//}
          // }
        }
        
    public function ajax_list()
	{
		$list = $this->list_hukum->get_datatables();
		$data = array();
		$no = $_POST['start'];
		//var_dump($list) or die();
		foreach ($list as $customers) {
			$no++;
			$row = array();
            $row[] = $no;
			$row[] = '<a data-toggle="modal" data-target="#myModal'.$customers->id.'"><span class="glyphicon glyphicon-plus"></span></a>';
            $row[] = '<a href="'.base_url().'hukum/detail_hukum/'.$customers->id.'">'.$customers->nama.'</a>';
			$row[] = $customers->jenis_nama;
			$row[] = $customers->no;
			$row[] = $customers->tahun;
			$row[] = $customers->created_at;
			$row[] = $customers->status_nama.'<div class="modal fade" id="myModal'.$customers->id.'"  role="dialog" style="margin-top: 150px;"> 
                                    <div class="modal-dialog"> 
                                     <div class="modal-content">  
                                     <div class="modal-header">  
									<button type="button" class="close" data-dismiss="modal">&times;</button>  
									<h4 class="modal-title">Informasi Tambahan</h4>  
									</div>  
									<div class="modal-body">  
									<dl class="dl-vertical">  
									<dt>Abstak : </dt>  
									<dd> '.$customers->id.' </dd>  
									<dt>Katalog</dt>  
									<dd> '.$customers->id.' </dd>  
									<div class="modal-footer">  
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
									</div>  
									</div>  
									</div>  
									</div>';

			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->customers->count_all(),
						"recordsFiltered" => $this->customers->count_filtered(),
						"data" => $data,
				);
	
		echo json_encode($output);
	}
	
	
	function inlislite(){
	
				header('location: http://perpus.bandungkab.go.id/opac/');
	}
	
	
	function sidokter(){
	    
	    
	
				header('location: http://sidokter.bandungkab.go.id/');
	}
        
        
        
           public function userList(){
            $this->load->model('model_hukum');
                    // POST data
                    $postData = $this->input->post();

                    // Get data
                    $data = $this->model_hukum->get_list_peraturan($postData);
                  //  var_dump($data)or die();
                    echo json_encode($data);
                  }
				  
				   public function list_bahasa(){
            $this->load->model('model_hukum');
                    // POST data
                    $postData = $this->input->post();

                    // Get data
                    $data = $this->model_hukum->get_list_bahasa($postData);
                  //  var_dump($data)or die();
                    echo json_encode($data);
                  }

				  public function list_disabilitas(){
            $this->load->model('model_hukum');
                    // POST data
                    $postData = $this->input->post();

                    // Get data
                    $data = $this->model_hukum->get_list_disabilitas($postData);
                  //  var_dump($data)or die();
                    echo json_encode($data);
                  }



				  public function list_adminhukum(){
					$this->load->model('model_hukum');
							// POST data
							$postData = $this->input->post();
		
							// Get data
							$data = $this->model_hukum->get_list_peraturan_admin($postData);
						  //  var_dump($data)or die();
							echo json_encode($data);
						  }


				  public function lakukan_download(){				
					force_download('gambar/malasngoding.png',NULL);
				}	


				function download($id){

					

					$this->model_utama->document_didownload($id);
					
					$name = $this->uri->segment(3);
					$query=$this->db->get_where('file_hukum',array('file_id_hukum'=>$name));
					$ret = $query->row_array();
					$file_download=$ret["file_path"];
				
					$siteaddressAPI = base_url().$file_download;

					
					$pisah=explode("/", $file_download);				
					$pisah[]=array();
					$file=$pisah[3];
					//var_dump($file_download)or die();
				
					$data = file_get_contents($file_download);
					
					force_download($file, $data);
				}
				
				
				
				
				
				

				function viewPdf()

					{
						
				
							// Check if the file ID is set in the POST request
							if (isset($_POST['id'])) {
								// Sanitize the input to prevent SQL injection
								$id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);

								// Get the file information from the database
								$query = $this->db->get_where('file_hukum', array('file_id_hukum' => $id));
								$res = $query->row_array();

								// Check if the file was found in the database
								if ($res) {
									$filePath = $res["file_path"];
									
									// Construct the full file path on the server
									$fullPath = FCPATH . $filePath;

									// Check if the file exists on the server
									if (file_exists($fullPath)) {
										// Update the read count for the product
										$this->model_utama->produk_dibaca_update($id);

										// Set the appropriate headers for PDF download
										header('Content-Type: application/pdf');
										header('Content-Disposition: inline; filename="' . basename($filePath) . '"');
										header('Content-Length: ' . filesize($fullPath));
										header('Cache-Control: public, must-revalidate');
										header('Pragma: public');

										// Read the file and send it to the browser
										readfile($fullPath);
										exit; // Stop further script execution
									} else {
										// Handle case where file is not found on the server
										http_response_code(404);
										echo "Error: File not found on server.";
									}
								} else {
									// Handle case where file ID is not found in the database
									http_response_code(404);
									echo "Error: File not found in database.";
								}
							} else {
								// Handle case where ID is not provided
								http_response_code(400);
								echo "Error: Invalid request. No ID provided.";
							}



						//$this->template->load(template().'/template',template().'/view_hukum_detail',$data);



					}

					function viewabstrak()
					{
						//var_dump($_POST)or die();
						if (isset($_POST['id'])) {

							//var_dump($_POST['id'])or die();
						
							$id=$_POST['id'];
						
							$query=$this->db->get_where('file_abstrak',array('file_id_hukum'=>$id));
							$res = $query->row_array();
							$file_download=$res["path_file"];

							//var_dump($file_download)or die();

							$siteaddressAPI = base_url().$file_download;

								$pisah=explode("/", $siteaddressAPI);

								$pisah[]=array();

								 $file=$pisah[6];

							$filename = ".".$file_download;
    
							// Header content type
							header("Content-type: application/pdf");
							header("Content-Length: " . filesize($filename));
							
							// Send the file to the browser.
							readfile($filename);

						}

						
					}


					function view_inggris()
					{

						
						
						if (isset($_POST['id'])) {

						
							$id=$_POST['id'];
						
							$query=$this->db->get_where('file_hukum_inggris',array('file_id_hukum'=>$id));
							$res = $query->row_array();
							$file_download=$res["file_path"];

							//var_dump($file_download)or die();

							$siteaddressAPI = base_url().$file_download;

								$pisah=explode("/", $siteaddressAPI);

								$pisah[]=array();

								 $file=$pisah[6];

							$filename = ".".$file_download;
    
							// Header content type
							header("Content-type: application/pdf");
							header("Content-Length: " . filesize($filename));
							
							// Send the file to the browser.
							readfile($filename);

						}

						
					}
					
					
					
					function viewPdf_bahasa()

					{
						
						if (isset($_POST['id'])) {

						
							$id=$_POST['id'];
						  $this->model_utama->produk_dibaca_update($id);	
		
							$query=$this->db->get_where('file_hukum_inggris',array('file_id_hukum'=>$id));
							$res = $query->row_array();
							$file_download=$res["file_path"];

							//var_dump($file_download)or die();

							$siteaddressAPI = base_url().$file_download;

								$pisah=explode("/", $siteaddressAPI);

								$pisah[]=array();

								 $file=$pisah[6];

							$filename = ".".$file_download;
    
							// Header content type
							header("Content-type: application/pdf");
							header("Content-Length: " . filesize($filename));
							
							// Send the file to the browser.
							readfile($filename);

						}

						//$this->template->load(template().'/template',template().'/view_hukum_detail',$data);

					}
					
						function download_bahasa($id){

					

					$this->model_utama->document_didownload($id);
					
					$name = $this->uri->segment(3);
					$query=$this->db->get_where('file_hukum_inggris',array('file_id_hukum'=>$name));
					$ret = $query->row_array();
					$file_download=$ret["file_path"];
			
					$siteaddressAPI = base_url().$file_download;

					
					$pisah=explode("/", $file_download);				
					$pisah[]=array();
					$file=$pisah[3];
						
				
					$data = file_get_contents("asset/file_peraturan_english/".$file);
					
					force_download($file, $data);
				}




					




					



	
}
