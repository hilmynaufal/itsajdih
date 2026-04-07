            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Yurisprudensi </h3>
                  <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>administrator/tambah_yurisprudensi'>Tambahkan Data</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>No Putusan</th>
                        <th>Tanggal Putusan</th>
                        <th>Judul</th>
                        <th>Pengadilan</th>
                        <th>Status Putusan</th>
                        <th style='width:70px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $no = 1;
                    foreach ($record->result_array() as $row){
                    $tgl_Posting = tgl_indo($row['tanggal_putusan']);
                    echo "<tr><td>$no</td>
                          <td>$row[no_putusan]</td>
                          <td>$row[tanggal_putusan] </td>
                          <td><a title='$row[judul]' target='_BLANK' href='".base_url()."asset/yurisprudensi/$row[berkas]'>$row[judul]</a></td>
                          <td>$row[jenis_peradilan]</td>
                          <td>$row[status_putusan]</td>
                         <td><center>
                                <a class='btn btn-success btn-xs' title='Edit Data' href='".base_url()."administrator/edit_yurisprudensi/$row[id_yurisprudensi]'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."administrator/delete_yurisprudensi/$row[id_yurisprudensi]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                              </center></td>
                          </tr>";
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>