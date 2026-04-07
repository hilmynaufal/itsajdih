<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit relaas </h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/edit_relaas',$attributes); 
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                       <input type='text' name='id_relaas' value='$rows[id_relaas]'>
                      <tr><th width='120px' scope='row'>pengugat</th>    <td><input type='text' class='form-control' name='pengugat' value='$rows[pengugat]' required></td></tr>
                        <tr><th width='120px' scope='row'>tergugat</th>    <td><input  class='form-control' name='tergugat'value='$rows[tergugat]'></td></tr>
                   
                   
                    <tr><th width='120px' scope='row'>Ganti File</th>    <td><input type='file' class='form-control' name='b'>";
                       if ($rows['berkas'] != ''){ echo "File : <a target='_BLANK' href='".base_url()."asset/relaas/$rows[berkas]'>$rows[berkas]</a>"; } echo "</td></tr>
                 
                         <tr><th width='120px' scope='row'>pengadilan</th>    <td><input  class='form-control' name='pengadilan' value='$rows[pengadilan]'></td></tr>
                    <tr><th width='120px' scope='row'>no_perkara</th>    <td><input  class='form-control' name='no_perkara' value='$rows[no_perkara]'></td></tr>

                    <tr><th width='120px' scope='row'>tanggal_hadir_sidang</th><td><input maxlength='50' class='form-control' name='tanggal_hadir_sidang' id='tanggal_hadir_sidang' type='date'  value='$rows[tanggal_hadir_sidang]' required/></td></tr>
                    <tr><th width='120px' scope='row'>tgl_pengumuman</th><td><input maxlength='50' class='form-control' name='tgl_pengumuman' id='tgl_pengumuman' type='date'  value='$rows[tgl_pengumuman]' required/></td></tr>
                    <tr><th width='120px' scope='row'>tgl_pemberitahuan_putusan</th><td><input maxlength='50' class='form-control' name='tgl_pemberitahuan_putusan'  value='$rows[tgl_pemberitahuan_putusan]' id='tgl_pemberitahuan_putusan' type='date' required/></td></tr>
                    
                    
                    
                    <tr><th width='120px' scope='row'>jenis_rellas </th>    <td><input  class='form-control' name='jenis_relaas'  value='$rows[jenis_relaas]'></td></tr>
                    <tr><th width='120px' scope='row'>status_persidangan</th>    <td><input  class='form-control' name='status_persidangan'  value='$rows[status_persidangan]'></td></tr>
       


                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                  <a href='".base_url()."/administrator/relaas'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div>";
