<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah File News Letter</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/tambah_download',$attributes); 
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value=''>
                    <tr><th width='120px' scope='row'>Judul</th>    <td><input type='text' class='form-control' name='judul' required></td></tr>
                    <tr><th width='120px' scope='row'>Dokumen Pendukung</th>    <td><input type='file' class='form-control' name='b'></td></tr>
                    <tr><th width='120px' scope='row'>Pengarang</th>    <td><input  class='form-control' name='pengarang'></td></tr>
                    <tr><th width='120px' scope='row'>Tempat Terbit</th>    <td><input  class='form-control' name='tempat_terbit'></td></tr>
                    <tr><th width='120px' scope='row'>Tanggal Terbit</th><td><input maxlength='50' class='form-control' name='tgl_terbit' id='tgl_terbit' type='date' required/></td></tr>
                    <tr><th width='120px' scope='row'>Sumber </th>    <td><input  class='form-control' name='sumber'></td></tr>
                    <tr><th width='120px' scope='row'>Subjek</th>    <td><input  class='form-control' name='subjek'></td></tr>
                    <tr><th width='120px' scope='row'>Bahasa</th>    <td><input  class='form-control' name='bahasa'></td></tr>
                    <tr><th width='120px' scope='row'>Bidang Hukum</th>    <td><input  class='form-control' name='bidang_hukum'></td></tr>
                    <tr><th width='120px' scope='row'>Lokasi</th>    <td><input  class='form-control' name='lokasi'></td></tr>
                    <tr><th width='120px' scope='row'>Cover Better</th>    <td><input type='file' class='form-control' name='cover'></td></tr>
                    
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambahkan</button>
                    <a href='".base_url()."/administrator/download'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div>";
