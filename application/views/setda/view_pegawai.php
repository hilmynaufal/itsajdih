<?php
echo "<p class='sidebar-title'><span class='glyphicon glyphicon-user'></span> $title</p><hr>
<table class='table table-condensed table-hover'>
	<tr>
		<th>No</th>
		<th>Nama Pegawai</th>
		<th>Jabatan</th>
		<th>Atasan Langsung</th>
		<th>File Pdf</th>
	</tr>";
	$no = $this->uri->segment(3)+1;
	foreach ($pegawai->result_array() as $r){
			if(($no % 2)==0){ $warna="#ffffff";}
			else{ $warna="#dcfbe2"; }
			$tgl=tgl_indo($r['tgl_posting']);
				echo "<tr><td>$no</td>
					  <td>$r[nama_pegawai]</td>
					  <td>$r[jabatan]</td>
					  <td>$r[atasan_langsung]</td>";
					  if(trim($r['nama_file'])=='') {
	                    echo "<td width='70px'><a class='btn btn-danger btn-xs' href='$r[gdrive]'> Klik Disini</a></td>";
	                  }else{
	                    echo "<td width='70px'><a class='btn btn-danger btn-xs' href='".base_url()."pegawai/file/$r[nama_file]'> Klik Disini</a></td>";
	                  }
					  

					 echo "</tr>";
				$no++;
			}
	echo "</table>";
?>	

<div style="clear:both"></div>
<?php echo $this->pagination->create_links(); ?>
								