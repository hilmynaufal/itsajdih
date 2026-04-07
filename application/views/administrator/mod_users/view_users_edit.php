<?php
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Data User</h3>
                </div>
              <div class='box-body'>";
              if (validation_errors() != "") {
                echo "<div class='alert alert-danger'>".validation_errors()."</div>";
              }
              if (isset($error)) {
                echo "<div class='alert alert-danger'>$error</div>";
              }
              if ($this->session->flashdata('new_password')) {
                echo "<div class='alert alert-success'>Password has been reset to: <b>".$this->session->flashdata('new_password')."</b><br>Please save this password, it will only be displayed once.</div>";
              }
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/edit_manajemenuser/'.$this->uri->segment(3), $attributes);
          echo "<div class='col-md-12'>
                  <div class='alert alert-warning'><b>Username</b> tidak bisa diubah, dan Apabila password tidak diubah, dikosongkan saja...</div>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$rows[username]'>
                    <tr><th width='120px' scope='row'>Username</th>   <td><input type='text' class='form-control' name='a' value='$rows[username]' readonly='on'></td></tr>";

                    if ($this->session->username == $rows['username']) {
                      echo "<tr><th scope='row'>Ganti Password</th>           <td><input type='password' class='form-control' name='b' placeholder='Kosongkan jika tidak ingin mengubah password (min. 12 karakter, huruf besar/kecil, angka, simbol)'></td></tr>
                            <tr><th scope='row'>Konfirmasi Password Lama</th> <td><input type='password' class='form-control' name='old_password' placeholder='Wajib diisi jika ingin mengganti password'></td></tr>";
                    } elseif ($this->session->level == 'admin' && $rows['level'] == 'user') {
                      echo "<tr><th scope='row'>Password</th>                 <td><button type='submit' name='reset_password' class='btn btn-warning btn-sm' onclick=\"return confirm('Reset password for this user?')\">Reset Password</button> <small class='text-muted'>Will generate a random password.</small></td></tr>";
                    } else {
                      echo "<tr><th scope='row'>Password</th>                 <td><input type='text' class='form-control' value='********' disabled> <small class='text-muted'>You cannot change another admin\'s password.</small></td></tr>";
                    }

                    echo "<tr><th scope='row'>Nama Lengkap</th>             <td><input type='text' class='form-control' name='c' value='$rows[nama_lengkap]'></td></tr>
                    <tr><th scope='row'>Email</th>                    <td><input type='email' class='form-control' name='d' value='$rows[email]'></td></tr>
                    <tr><th scope='row'>No Telp</th>                  <td><input type='number' class='form-control' name='e' value='$rows[no_telp]'></td></tr>";
                    if ($this->session->level == 'admin'){
                      echo "<tr><th scope='row'>Level User</th>               <td><select name='f' class='form-control'>
                      ";
                      if($rows['level'] == 'admin'){
                        echo " <option value='admin'>admin</option>
                                <option value='user'>user</option>";
                      }else{
                        echo " <option value='user'>user</option>
                                <option value='admin'>admin</option>";
                      }
                      echo "</select></td></tr>
                      <tr><th scope='row'>Blokir</th>                   <td>"; if ($rows['blokir']=='Y'){ echo "<input type='radio' name='h' value='Y' checked> Ya &nbsp; <input type='radio' name='h' value='N'> Tidak"; }else{ echo "<input type='radio' name='h' value='Y'> Ya &nbsp; <input type='radio' name='h' value='N' checked> Tidak"; } echo "</td></tr>";
                    } else {
                      echo "<input type='hidden' name='f' value='$rows[level]'>
                            <input type='hidden' name='h' value='$rows[blokir]'>";
                    }

          echo "
                  </tbody>
                  </table>
                </div>
              </div>
                <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    <a href='".base_url('administrator/manajemenuser')."'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>

                  </div>
            </div>";