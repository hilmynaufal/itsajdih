            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Semua Pengajuan Produk Hukum</h3>
                  <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>administrator/tambah_pengajuan_hukum'>Tambahkan Data</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>Nama Dinas</th>
                        <th>Nama Hukum</th>
                        <th style="text-align:center;">Jenis Hukum</th>
                        <th style="width:320px">Risalah</th>
                        <th>Status Approval</th>
                        <th>Tanggal Pembuatan</th>
                        <th style='width:50px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php
                    $no = 1;
                    foreach ($record->result_array() as $row){
                    $tgl_posting = tgl_indo($row['pengajuan__date__created']);
                  ?>
                      <tr
                        <?= $row['pengajuan__approval'] == 1 ? 'class="btn-success"' : '' ; ?>
                        <?= $row['pengajuan__approval'] == 2 ? 'class="btn-danger"' : '' ; ?>
                        <?= $row['pengajuan__approval'] == 0 ? 'class="btn-primary"' : '' ; ?>
                      >
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row['pengajuan__nama_dinas']; ?></td>
                        <td><?php echo $row['pengajuan__nama_hukum']; ?></td>
                        <td><?php echo $row['jenis_nama']; ?></td>
                        <td><?php echo $row['pengajuan__risalah']; ?> <br>
                            <?php
                              if($row['pengajuan__approval'] == 1){
                                echo '<p style="color:black;"><b>Proses Pengajuan Telah disetujui</b>
                                      <br><i>'.$row['pengajuan__keterangan_approval'].'</i></p>';
                              }else if($row['pengajuan__approval'] == 2){
                                echo '<p style="color:black;"><b>Proses Pengajuan ditolak</b>
                                      <br><i>'.$row['pengajuan__keterangan_approval'].'</i></p>';
                              }
                            ?>
                        </td>
                        <td>
                          <?php
                              if($row['pengajuan__approval'] == 1){
                                echo 'DISETUJUI';
                              }else if($row['pengajuan__approval'] == 2){
                                echo 'DITOLAK';
                              }else{
                                echo 'PROSES PEMBAHASAN';
                              }

                          ?>
                        </td>
                        <td><?php echo $row['pengajuan__tgl_pembuatan']; ?></td>
                        <td>
                          <?php if($row['pengajuan__approval'] == 0 || $this->session->level == 'admin'){ ?>
                          <center>
                            <a class='btn btn-success btn-xs' title='Edit Data' href='<?= base_url()."administrator/edit_pengajuan_hukum/$row[pengajuan__id]"?>'><span class='glyphicon glyphicon-edit'></span></a>
                            <?php if($this->session->level == 'admin'){ ?>
                              <a class='btn btn-danger btn-xs' title='Delete Data' href='<?= base_url()."administrator/delete_pengajuan_hukum/$row[pengajuan__id]"?>' onclick="return confirm('Apa anda yakin untuk hapus Data ini?')"><span class='glyphicon glyphicon-remove'></span></a>
                            <?php }?>
                          </center>
                          <?php }?>
                        </td>
                      </tr>

                  <?php
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>