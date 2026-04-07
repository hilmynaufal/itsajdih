<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Yurispridensi</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/tambah_yurisprudensi',$attributes); 
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value=''>
                    <tr><th width='120px' scope='row'>No Putusan</th><td><input type='text' class='form-control' name='no_putusan' required></td></tr>
                    <tr><th width='120px' scope='row'>judul</th><td><input  class='form-control' name='judul'></td></tr>
                    <tr><th width='120px' scope='row'>Jenis peradilan</th><td><input  class='form-control' name='jenis_peradilan'></td></tr>
                    <tr><th width='120px' scope='row'>Berkas</th><td><input type='file' class='form-control' name='b'></td></tr>
                       
                    <tr><th width='120px' scope='row'>Tahun</th><td><input nama='tahun' type='text' id='datepicker'/></td></tr>
                    <tr><th width='120px' scope='row'>Tanggal putusan</th><td><input maxlength='50' class='form-control' name='tanggal_putusan' id='tanggal_putusan' type='date' required/></td></tr>
                                      
                    <tr><th width='120px' scope='row'>Sumber </th><td><input  class='form-control' name='sumber'></td></tr>
                    <tr><th width='120px' scope='row'>Subjek</th><td><input  class='form-control' name='subjek'></td></tr>
                    <tr><th width='120px' scope='row'>Status putusan</th><td><input  class='form-control' name='status_putusan'></td></tr>
                    <tr><th width='120px' scope='row'>Bahasa</th><td><input  class='form-control' name='bahasa'></td></tr>
                    <tr><th width='120px' scope='row'>Bidang Hukum</th><td><input  class='form-control' name='bidang_hukum'></td></tr>
       



                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambahkan</button>
                     <a href='".base_url()."/administrator/yurisprudensi'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div>";
      ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>



<script>
$("#datepicker").datepicker({
    format: "yyyy",
    viewMode: "years", 
    minViewMode: "years"
});
</script>
