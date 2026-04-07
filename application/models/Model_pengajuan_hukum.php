<?php
class Model_pengajuan_hukum extends CI_model{

    function list_pengajuan_hukum(){
        $id = $this->session->id;
        if ($this->session->level != 'admin'){
            return $this->db->query("SELECT * FROM `pengajuan_hukum`
                                JOIN `jenis_hukum` ON pengajuan_hukum.pengajuan__jenis_hukum = jenis_hukum.jenis_id
                                WHERE `pengajuan__user__created` = $id
                                AND `pengajuan__visible` = 1
                                ORDER BY pengajuan__nama_hukum DESC");
    	}else{
            return $this->db->query("SELECT * FROM `pengajuan_hukum`
                                JOIN `jenis_hukum` ON pengajuan_hukum.pengajuan__jenis_hukum = jenis_hukum.jenis_id
                                WHERE `pengajuan__visible` = 1
                                ORDER BY pengajuan__nama_hukum DESC");
        }

    }

    function list_pengajuan_hukum_edit($id){
        return $this->db->query("SELECT * , pengajuan_hukum.pengajuan__id as id_pengajuan_hukum FROM `pengajuan_hukum`
                                JOIN `jenis_hukum` ON pengajuan_hukum.pengajuan__jenis_hukum = jenis_hukum.jenis_id
                                AND pengajuan_hukum.pengajuan__id = $id");
    }


    function list_doc($id){
        return $this->db->query("SELECT * FROM `file_pengajuan`
                                WHERE file_pengajuan.pengajuanfile__id_pengajuan = ". $id ." ORDER BY pengajuanfile__id_pengajuan DESC");
    }
    function jenis_hukum(){
        return $this->db->query("SELECT * FROM `jenis_hukum` WHERE `jenis_level` = 3 ORDER BY jenis_nama DESC");
    }

    function level_hukum(){
        return $this->db->query("SELECT * FROM `level_hukum` ORDER BY level_hukum__nama DESC");
    }

    function status_hukum(){
        return $this->db->query("SELECT * FROM `status_hukum` ORDER BY status_nama DESC");
    }

    function list_pengajuan_hukum_tambah(){
            $datadb =array('pengajuan__nama_dinas'=>$this->input->post('dinas'),
                            'pengajuan__nama_hukum'=>$this->input->post('nama'),
                            'pengajuan__jenis_hukum'=>$this->input->post('jenis'),
                            'pengajuan__risalah'=>$this->input->post('risalah'),
                            'pengajuan__approval'=>'0',
                            'pengajuan__tgl_pembuatan'=>$this->input->post('tanggal_pengajuan'),
                            'pengajuan__user__created'=>$this->input->post('id'));
            $this->db->insert('pengajuan_hukum',$datadb);
            $id = $this->db->insert_id();

            $name_array = array();
            $count = count($_FILES['userfile']['size']);
            foreach($_FILES as $key=>$value)
                    for($s=0; $s<=$count-1; $s++) {
                    $_FILES['userfile']['name']=$value['name'][$s];
                    $_FILES['userfile']['type']    = $value['type'][$s];
                    $_FILES['userfile']['tmp_name'] = $value['tmp_name'][$s];
                    $_FILES['userfile']['error']       = $value['error'][$s];
                    $_FILES['userfile']['size']    = $value['size'][$s];
                    $new_name = 'No '.$this->input->post('no').' Tahun '. $this->input->post('tahun').'_'. time();
                        $config['file_name'] = $new_name;
                        $config['upload_path'] = './asset/pengajuan_hukum/';
                        $config['allowed_types'] = 'doc|docx';
                    $this->load->library('upload', $config);
                    $this->upload->do_upload();
                    $data = $this->upload->data();
                    $name_array[] = $data['file_name'];

                    $data1 = array(
                        'pengajuanfile__path' =>  '/asset/pengajuan_hukum/'.$data['file_name'],
                        'pengajuanfile__id_pengajuan' => $id
                    );
                $this->db->insert('file_pengajuan', $data1);
                }
                $names= implode(',', $name_array);
    }

    function list_rapat($id){
        return $this->db->query("SELECT * FROM `bukti_pengajuan`
                                WHERE bukti_pengajuan.buktipengajuan__id_pengajuan = ". $id ." ORDER BY buktipengajuan__id_pengajuan DESC");
    }

    function list_rapat_pengajuan_hukum_tambah(){
        $config['upload_path'] = 'asset/bukti_rapat/';
        $config['allowed_types'] = 'zip|rar';
        $new_name = $this->input->post('nama_rapat').'_'. time();
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
        $this->upload->do_upload('fileUpload');
        $hasil=$this->upload->data();
        $datadb =array('buktipengajuan__nama'=>$this->input->post('nama_rapat'),
                        'buktipengajuan__id_pengajuan'=>$this->input->post('id'),
                        'buktipengajuan__tgl_pembahasan'=>$this->input->post('tanggal_rapat'),
                        'buktipengajuan__keterangan'=>$this->input->post('keterangan'),
                        'buktipengajuan__path'=>'asset/bukti_rapat/'.$hasil['file_name']);
        $this->db->insert('bukti_pengajuan',$datadb);
        $id = $this->db->insert_id();

        // $name_array = array();
        // $count = count($_FILES['userfile']['size']);
        // foreach($_FILES as $key=>$value)
        //         for($s=0; $s<=$count-1; $s++) {
        //         $_FILES['userfile']['name']=$value['name'][$s];
        //         $_FILES['userfile']['type']    = $value['type'][$s];
        //         $_FILES['userfile']['tmp_name'] = $value['tmp_name'][$s];
        //         $_FILES['userfile']['error']       = $value['error'][$s];
        //         $_FILES['userfile']['size']    = $value['size'][$s];
        //         $new_name = 'No '.$this->input->post('no').' Tahun '. $this->input->post('tahun').'_'. time();
        //             $config['file_name'] = $new_name;
        //             $config['upload_path'] = './asset/pengajuan_hukum/';
        //             $config['allowed_types'] = 'doc|docx';
        //         $this->load->library('upload', $config);
        //         $this->upload->do_upload();
        //         $data = $this->upload->data();
        //         $name_array[] = $data['file_name'];

        //         $data1 = array(
        //             'pengajuanfile__path' =>  '/asset/pengajuan_hukum/'.$data['file_name'],
        //             'pengajuanfile__id_pengajuan' => $id
        //         );
        //     $this->db->insert('file_pengajuan', $data1);
        //     }
        //     $names= implode(',', $name_array);
}

    function list_berita_edit($id){
        return $this->db->query("SELECT * FROM berita where id_berita='$id'");
    }

    function list_pengajuan_hukum_update(){
        $datadb =array('pengajuan__nama_dinas'=>$this->input->post('dinas'),
                        'pengajuan__nama_hukum'=>$this->input->post('nama'),
                        'pengajuan__jenis_hukum'=>$this->input->post('jenis'),
                        'pengajuan__risalah'=>$this->input->post('risalah'),
                        'pengajuan__approval'=>(int)$this->input->post('approval'),
                        'pengajuan__keterangan_approval'=>$this->input->post('keterangan_approval'),
                        'pengajuan__tgl_pembuatan'=>$this->input->post('tanggal_pengajuan'));
        // $this->db->insert('pengajuan_hukum',$datadb);
        $this->db->where('pengajuan__id',$this->input->post('id'));
        $this->db->update('pengajuan_hukum',$datadb);
        $id = $this->db->insert_id();
    }
    function list_rapat_pengajuan_hukum_update(){
        $datadb =array('buktipengajuan__nama'=>$this->input->post('buktipengajuan__nama'),
                        'buktipengajuan__tgl_pembahasan'=>$this->input->post('buktipengajuan__tgl_pembahasan'),
                        'buktipengajuan__keterangan'=>$this->input->post('buktipengajuan__keterangan'));
        $this->db->where('buktipengajuan__id',$this->input->post('id_rapat'));
        $this->db->update('bukti_pengajuan',$datadb);
        $id = $this->db->insert_id();
    }
    function list_pengajuan_hukum_delete($id){
        return $this->db->query("UPDATE pengajuan_hukum SET pengajuan__visible = '0' WHERE pengajuan__id=$id");
    }
    function list_rapat_pengajuan_hukum_delete($id){
        return $this->db->query("DELETE FROM bukti_pengajuan where buktipengajuan__id='$id'");
    }


}