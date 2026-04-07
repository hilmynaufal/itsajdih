<?php 
class Model_relaas extends CI_model{
    function relaas(){
        return $this->db->query("SELECT * FROM relaas ORDER BY id_relaas DESC");
    }

    function hitungdownload(){
        return $this->db->query("SELECT * FROM relaas");
    }

    function index($start,$limit){
        return $this->db->query("SELECT * FROM relaas ORDER BY id_relaas DESC LIMIT $start,$limit");
    }

    function relaas_tambah(){

       
        $config['upload_path'] = 'asset/relaas/';
        $config['allowed_types'] = 'gif|jpg|png|zip|rar|pdf|doc|docx|ppt|pptx|xls|xlsx|txt';
        $config['max_size'] = '25000'; // kb
        $this->load->library('upload', $config);
        $this->upload->do_upload('b');
        $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
               
                

                    $datadb = array(
                                'pengugat'=>$this->db->escape_str($this->input->post('pengugat')),
                                'tergugat'=>$this->db->escape_str($this->input->post('tergugat')),
                                'pengadilan'=>$this->db->escape_str($this->input->post('pengadilan')),
                                'no_perkara'=>$this->db->escape_str($this->input->post('no_perkara')),
                                'keterangan'=>$this->db->escape_str($this->input->post('keterangan')),
                                'status_persidangan'=>$this->db->escape_str($this->input->post('status_persidangan')),
                                'tgl_pemberitahuan_putusan'=>$this->db->escape_str($this->input->post('tgl_pemberitahuan_putusan')),
                                'tanggal_hadir_sidang'=>$this->db->escape_str($this->input->post('tanggal_hadir_sidang')),
                                'tgl_pengumuman'=>$this->db->escape_str($this->input->post('tgl_pengumuman')),

                                'jenis_relaas'=>$this->db->escape_str($this->input->post('jenis_relaas')),

                               
                                 'create_at'=>date('Y-m-d H:i:s')
                                
                                );



                                // $datadb = array('judul'=>$this->db->escape_str($this->input->post('a')),
                                // 'tgl_posting'=>date('Y-m-d'),
                                // 'hits'=>'0');
            }else{
            		$datadb = array(
                        
                            
                                    'berkas'=>$hasil['file_name'],
                                
                                    'pengugat'=>$this->db->escape_str($this->input->post('pengugat')),
                                    'tergugat'=>$this->db->escape_str($this->input->post('tergugat')),
                                    'pengadilan'=>$this->db->escape_str($this->input->post('pengadilan')),
                                    'no_perkara'=>$this->db->escape_str($this->input->post('no_perkara')),
                                    'keterangan'=>$this->db->escape_str($this->input->post('keterangan')),
                                    'status_persidangan'=>$this->db->escape_str($this->input->post('status_persidangan')),
                                    'tgl_pemberitahuan_putusan'=>$this->db->escape_str($this->input->post('tgl_pemberitahuan_putusan')),
                                    'tanggal_hadir_sidang'=>$this->db->escape_str($this->input->post('tanggal_hadir_sidang')),
                                    'tgl_pengumuman'=>$this->db->escape_str($this->input->post('tgl_pengumuman')),
    
                                    'jenis_relaas'=>$this->db->escape_str($this->input->post('jenis_relaas'))


                                    
                                );
            }
        $this->db->insert('relaas',$datadb);
    }

    function relaas_edit($id){
        return $this->db->query("SELECT * FROM relaas where id_relaas='$id'");
    }

    function relaas_update(){
        $config['upload_path'] = 'asset/relaas/';
        $config['allowed_types'] = 'pdf/gif|jpg|png|zip|rar|pdf|doc|docx|ppt|pptx|xls|xlsx|txt';
        $config['max_size'] = '25000'; // kb
        $this->load->library('upload', $config);
        $this->upload->do_upload('b');
        $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                    $datadb = array(

                     
                                

                        'pengugat'=>$this->db->escape_str($this->input->post('pengugat')),
                        'tergugat'=>$this->db->escape_str($this->input->post('tergugat')),
                        'pengadilan'=>$this->db->escape_str($this->input->post('pengadilan')),
                        'no_perkara'=>$this->db->escape_str($this->input->post('no_perkara')),
                        'keterangan'=>$this->db->escape_str($this->input->post('keterangan')),
                        'status_persidangan'=>$this->db->escape_str($this->input->post('status_persidangan')),
                        'jenis_relaas'=>$this->db->escape_str($this->input->post('jenis_relaas')),
                        'tanggal_hadir_sidang'=>$this->db->escape_str($this->input->post('tanggal_hadir_sidang')),
                        'tgl_pengumuman'=>$this->db->escape_str($this->input->post('tgl_pengumuman')),
                        'tgl_pemberitahuan_putusan'=>date('Y-m-d')
                           
                               
                                );
            }else{
            		$datadb = array(
                               
                                    'berkas'=>$hasil['file_name'],
                                

                                    'pengugat'=>$this->db->escape_str($this->input->post('pengugat')),
                                    'tergugat'=>$this->db->escape_str($this->input->post('tergugat')),
                                    'pengadilan'=>$this->db->escape_str($this->input->post('pengadilan')),
                                    'no_perkara'=>$this->db->escape_str($this->input->post('no_perkara')),
                                    'keterangan'=>$this->db->escape_str($this->input->post('keterangan')),
                                    'status_persidangan'=>$this->db->escape_str($this->input->post('status_persidangan')),
    
                                    'tanggal_hadir_sidang'=>$this->db->escape_str($this->input->post('tanggal_hadir_sidang')),
                                    'tgl_pengumuman'=>$this->db->escape_str($this->input->post('tgl_pengumuman')),
                                    'tgl_pemberitahuan_putusan'=>date('Y-m-d')
                                
                                  );
            }
        $this->db->where('id_relaas',$this->input->post('id_relaas'));
        $this->db->update('relaas',$datadb);
    }

    function relaas_delete($id){
        return $this->db->query("DELETE FROM relaas where id_relaas='$id'");
    }
    
   



    function download_detail($id){
        // var_dump($id)or die();
     return $this->db->query("SELECT * FROM relaas where id_relaas='$id'")->row();
 }
}