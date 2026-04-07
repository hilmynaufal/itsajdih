<?php 
class Model_yurisprudensi extends CI_model{
    function yurisprudensi(){
        return $this->db->query("SELECT * FROM yurisprudensi ORDER BY id_yurisprudensi DESC");
    }

    function yurisprudensi_tambah(){

       
        $config['upload_path'] = 'asset/yurisprudensi/';
        $config['allowed_types'] = 'pdf|gif|jpg|png|zip|rar|pdf|doc|docx|ppt|pptx|xls|xlsx|txt';
        $config['max_size'] = '25000'; // kb
        $this->load->library('upload', $config);
        $this->upload->do_upload('b');
        $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
               
                


                    $datadb = array(
                        'no_putusan'=>$this->db->escape_str($this->input->post('no_putusan')),
                        'jenis_peradilan'=>$this->db->escape_str($this->input->post('jenis_peradilan')),
                        'judul'=>$this->db->escape_str($this->input->post('judul')),
                                'tahun'=>$this->db->escape_str($this->input->post('tahun')),
                                'sumber'=>$this->db->escape_str($this->input->post('sumber')),
                                'subjek'=>$this->db->escape_str($this->input->post('subjek')),
                                'status_putusan'=>$this->db->escape_str($this->input->post('status_putusan')),
                                'bahasa'=>$this->db->escape_str($this->input->post('bahasa')),
                                'bidang_hukum'=>$this->db->escape_str($this->input->post('bidang_hukum')),
                              

                                'tanggal_putusan'=>$this->db->escape_str($this->input->post('tanggal_putusan')),
                               
                                 'create_at'=>date('Y-m-d H:i:s')
                                
                                );



                                // $datadb = array('judul'=>$this->db->escape_str($this->input->post('a')),
                                // 'tgl_posting'=>date('Y-m-d'),
                                // 'hits'=>'0');
            }else{
            		$datadb = array(
                        
                            
                                    'berkas'=>$hasil['file_name'],
                                

                                    'no_putusan'=>$this->db->escape_str($this->input->post('no_putusan')),
                                    'jenis_peradilan'=>$this->db->escape_str($this->input->post('jenis_peradilan')),
                                    'judul'=>$this->db->escape_str($this->input->post('judul')),
                                    'tahun'=>$this->db->escape_str($this->input->post('tahun')),
                                    'sumber'=>$this->db->escape_str($this->input->post('sumber')),
                                    'subjek'=>$this->db->escape_str($this->input->post('subjek')),
                                    'status_putusan'=>$this->db->escape_str($this->input->post('status_putusan')),
                                    'bahasa'=>$this->db->escape_str($this->input->post('bahasa')),
                                    'bidang_hukum'=>$this->db->escape_str($this->input->post('bidang_hukum')),
                                  
    
                                    'tanggal_putusan'=>$this->db->escape_str($this->input->post('tanggal_putusan')),
                                   
                                     'create_at'=>date('Y-m-d H:i:s')
                                    
                                    


                                    
                                );
            }
        $this->db->insert('yurisprudensi',$datadb);
    }

    function yurisprudensi_edit($id){
        return $this->db->query("SELECT * FROM yurisprudensi where id_yurisprudensi='$id'");
    }

    function yurisprudensi_update(){

      //  var_dump($_POST) or die();
        $config['upload_path'] = 'asset/yurisprudensi/';
        $config['allowed_types'] = 'gif|jpg|png|zip|rar|pdf|doc|docx|ppt|pptx|xls|xlsx|txt';
        $config['max_size'] = '25000'; // kb
        $this->load->library('upload', $config);
        $this->upload->do_upload('b');
        $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                    $datadb = array(

                                          
                        'no_putusan'=>$this->db->escape_str($this->input->post('no_putusan')),
                        'jenis_peradilan'=>$this->db->escape_str($this->input->post('jenis_peradilan')),
                        'judul'=>$this->db->escape_str($this->input->post('judul')),
                                'tahun'=>$this->db->escape_str($this->input->post('tahun')),
                                'sumber'=>$this->db->escape_str($this->input->post('sumber')),
                                'subjek'=>$this->db->escape_str($this->input->post('subjek')),
                                'status_putusan'=>$this->db->escape_str($this->input->post('status_putusan')),
                                'bahasa'=>$this->db->escape_str($this->input->post('bahasa')),
                                'bidang_hukum'=>$this->db->escape_str($this->input->post('bidang_hukum')),
                              

                                'tanggal_putusan'=>$this->db->escape_str($this->input->post('tanggal_putusan')),
                           
                               
                                );
            }else{
            		$datadb = array(
                               
                                    'berkas'=>$hasil['file_name'],
                                
                                    'no_putusan'=>$this->db->escape_str($this->input->post('no_putusan')),
                                    'jenis_peradilan'=>$this->db->escape_str($this->input->post('jenis_peradilan')),
                                    'judul'=>$this->db->escape_str($this->input->post('judul')),
                                            'tahun'=>$this->db->escape_str($this->input->post('tahun')),
                                            'sumber'=>$this->db->escape_str($this->input->post('sumber')),
                                            'subjek'=>$this->db->escape_str($this->input->post('subjek')),
                                            'status_putusan'=>$this->db->escape_str($this->input->post('status_putusan')),
                                            'bahasa'=>$this->db->escape_str($this->input->post('bahasa')),
                                            'bidang_hukum'=>$this->db->escape_str($this->input->post('bidang_hukum')),
                                          
            
                                            'tanggal_putusan'=>$this->db->escape_str($this->input->post('tanggal_putusan')),
                                
                                  );
            }
        $this->db->where('id_yurisprudensi',$this->input->post('id'));
        $this->db->update('yurisprudensi',$datadb);
    }

    function yurisprudensi_delete($id){
        return $this->db->query("DELETE FROM yurisprudensi where id_yurisprudensi='$id'");
    }
    
   



    function download_detail($id){
        // var_dump($id)or die();
     return $this->db->query("SELECT * FROM download where id_download='$id'")->row();
 }
}