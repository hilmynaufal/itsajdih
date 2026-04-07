            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Semua Berita</h3>
                  <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>administrator/tambah_hukum'>Tambahkan Data</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table  class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:20px' rowspan="2">No</th>
                        <th rowspan="2">Jenis Peraturan</th>
                        <th rowspan="2">No Peraturan</th>
                        <th style="text-align:center;" colspan="2">Tanggal</th>
                        <th rowspan="2">Tentang</th>
                        <th rowspan="2">Status</th>
                        <th style='width:50px' rowspan="2">Action</th>
                      </tr>
                      <tr>
                        <th>Ditetapkan</th>
                        <th>Diundangkan</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php
                    $no = 1;
                    foreach ($record->result_array() as $row){
                    $tgl_posting = tgl_indo($row['created_at']);
                  ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row['jenis_nama']; ?></td>
                        <td><?php echo "No ". $row['no']. " Tahun ". $row['tahun']; ?></td>
                        <td><?php echo date('d M Y',strtotime($row['tanggal_ditetapkan'])); ?></td>
                        <td><?php echo date('d M Y',strtotime($row['tanggal_diundangkan']));?></td>
                        <td>
                          <?php echo $row['nama']; ?><br>
                          <?php
                            $this->load->model('model_hukum');
                            $pdf = $this->model_hukum->list_pdf($row['id']);
                            $no_path = 1;
                            foreach ($pdf->result_array() as $path){

                          ?>
                          <a class="btn-primary btn  btn-xs" target="_blank" href="<?php echo base_url($path['file_path']); ?>"><span class="glyphicon glyphicon-open"></span> Dokument <?php echo $no_path; ?></a>

                          <?php $no_path++; } ?>

                        </td>
                        <td><?php echo $row['status_nama']; ?></td>
                        <td>
                          <center>
                            <a class='btn btn-success btn-xs' title='Edit Data' href='<?= base_url()."administrator/edit_hukum/$row[id]"?>'><span class='glyphicon glyphicon-edit'></span></a>
                            <a class='btn btn-danger btn-xs' title='Delete Data' href='<?= base_url()."administrator/delete_hukum/$row[id]"?>' onclick="return confirm('Apa anda yakin untuk hapus Data ini?')"><span class='glyphicon glyphicon-remove'></span></a>
                            </center>
                        </td>
                      </tr>

                  <?php
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>