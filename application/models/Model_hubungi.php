<?php
class Model_hubungi extends CI_model{
    function pesan_masuk(){
        return $this->db->query("SELECT * FROM hubungi ORDER BY id_hubungi DESC");
    }

    function pesan_baru($limit){
        return $this->db->query("SELECT * FROM hubungi ORDER BY id_hubungi DESC LIMIT $limit");
    }

    function pesan_masuk_view($id){
        return $this->db->query("SELECT * FROM hubungi where id_hubungi='$id'");
    }

    function pesan_masuk_kirim(){
       
    $nama           = $this->input->post('a');
        $email           = $this->input->post('b');
        $subject         = $this->input->post('c');
        $message         = $this->input->post('isi')." <br><hr><br> ".$this->input->post('d');
		
		
require_once($_SERVER['DOCUMENT_ROOT'].'/asset/classes/class.phpmailer.php');
	
		$mail = new PHPMailer; 
		$mail->IsSMTP();
		$mail->SMTPSecure = 'ssl'; 
		$mail->Host = "mail.jdih.bandungkab.go.id"; //host masing2 provider email
		$mail->SMTPDebug = 1;
		$mail->Port = 465;
		$mail->SMTPAuth = true;
		$mail->Username = "jdihbandungkab"; //user email
		$mail->Password = "masuk*12345"; //password email 
		$mail->SetFrom("jdih@jdih.bandungkab.go.id","jdih@jdih.bandungkab.go.id"); //set email pengirim
		$mail->Subject =  $subject; //subyek email
	//	$mail->AddAddress( "taufikridho@gmail.com","nama email tujuan"); 
			$mail->AddAddress(str_replace('"', '', $email),"nama email tujuan");
		//tujuan email
		 $mail->MsgHTML($message);
		 if($mail->Send()) ;


    }

    function kirim_Pesan(){
        $nama           = $this->input->post('a');
        $email           = $this->input->post('b');
        $subjek         = $this->input->post('c');
        $pesan         = $this->input->post('d');
            $datadb = array('nama'=>$nama,
                            'email'=>$email,
                            'subjek'=>$subjek,
                            'pesan'=>$pesan,
                            'tanggal'=>date('Y-m-d'));
        $this->db->insert('hubungi',$datadb);
    }

    function pesan_masuk_delete($id){
        return $this->db->query("DELETE FROM hubungi where id_hubungi='$id'");
    }
}