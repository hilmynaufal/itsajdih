<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit File Download</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/edit_download',$attributes); 
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$rows[id_download]'>
                    <tr><th width='120px' scope='row'>Judul</th>    <td><input type='text' class='form-control' name='judul' value='$rows[judul]' required></td></tr>
                    <tr><th width='120px' scope='row'>Ganti File</th>    <td><input type='file' class='form-control' name='b'>";
                       if ($rows['nama_file'] != ''){ echo "File : <a target='_BLANK' href='".base_url()."download/file/$rows[nama_file]'>$rows[nama_file]</a>"; } echo "</td></tr>
                 
                  <tr><th width='120px' scope='row'>Pengarang</th>    <td><input  class='form-control' name='pengarang' value='$rows[pengarang]'></td></tr>
                    <tr><th width='120px' scope='row'>Tempat Terbit</th>    <td><input  class='form-control' name='tempat_terbit' value='$rows[pengarang]'></td></tr>
                    <tr><th width='120px' scope='row'>Tanggal Terbit</th><td><input maxlength='50' class='form-control' name='tgl_terbit' id='tgl_terbit' type='date' value='$rows[tgl_terbit]' required/></td></tr>
                    <tr><th width='120px' scope='row'>Sumber </th>    <td><input  class='form-control' name='sumber' value='$rows[sumber]'></td></tr>
                    <tr><th width='120px' scope='row'>Subjek</th>    <td><input  class='form-control' name='subjek' value='$rows[subjek]'></td></tr>
                    <tr><th width='120px' scope='row'>Bahasa</th>    <td><input  class='form-control' name='bahasa' value='$rows[bahasa]'></td></tr>
                    <tr><th width='120px' scope='row'>Bidang Hukum</th>    <td><input  class='form-control' name='bidang_hukum' value='$rows[bidang_hukum]'></td></tr>
                    <tr><th width='120px' scope='row'>Lokasi</th>    <td><input  class='form-control' name='lokasi' value='$rows[lokasi]'></td></tr>
                       </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div>";
