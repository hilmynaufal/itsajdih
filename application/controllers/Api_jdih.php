<?php
		if (!isset($_SERVER['PHP_AUTH_USER'])) {
		header('WWW-Authenticate: Basic realm="JDIH"');
		header('HTTP/1.0 401 Unauthorized');
		echo 'Fail To Authenticating';
		exit;
		} else {
		if ($_SERVER['PHP_AUTH_USER'] == 'and@dung.com' && md5($_SERVER['PHP_AUTH_PW']) == '93294294c0e04797faa194fab8345c5c') {
		$DBHOST= "localhost" ;
		$DBUSER= "root" ;
		$DBPASSWORD= "Masuk*12345" ;
		$DBNAME= "jdih_cms";
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
						$row_array['idData']=$result['id'];
						$row_array['jenis']=$result['jenis_nama'];
						$row_array['urlDownload']= "jdih.bandungkab.go.id".$result1['file_path'];
						$row_array['urlDetailPeraturan']="jdih.bandungkab.go.id"."/hukum/detail_hukum/".$result['id'];
						$row_array['tanggal']= date('d M Y', strtotime($result['created_at']));
						$row_array['tahun']=$result['tahun'];
						$row_array['operasi']=4;
						$row_array['noPeraturan']=$result['no'];
						$row_array['judul']=preg_replace('/[\x00-\x1F\x80-\xFF]/', '',utf8_encode($result['nama']));
						$row_array['fileDownload']="jdih.bandungkab.go.id".$result1['file_path'];
						$row_array['hasilUjiMateriMk']=$result['status_nama'];
						$row_array['abstrak']=$result['abstrak'];
						$row_array['katalog']=$result['katalog'];
						$row_array['status']=$result['status_nama'];
						$row_array['idkategori']=73;
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

