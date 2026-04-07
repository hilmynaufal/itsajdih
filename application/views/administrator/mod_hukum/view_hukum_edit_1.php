<div class='col-md-12'>
       <div class='box box-info'>
          <div class='box-header with-border'>
            <h3 class='box-title'>Tambah Produk Hukum Baru</h3>
          </div>
            <div class='box-body'>
              <?php  $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/edit_hukum',$attributes); ?>
                      <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label required" style="text-align:left;" for="tentang">Tantang Hukum</label>
                                    <div class="col-sm-9">
                                        <input type="hidden" id="id" name="id" value="<?= $rows['id_hukum'] ?>">
                                        <input class="form-control" name="tentang" id="tentang" type="text" value="<?= $rows['nama'];?>" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" style="text-align:left;">No , Tahun</label>
                                    <div class="col-sm-2">
                                        <input maxlength="50" class="form-control" name="no" id="no" type="text" value="<?= $rows['no'];?>" placeholder="1"/>
                                    </div>
                                    <div class="col-sm-3">
                                        <input maxlength="50" class="form-control" name="tahun" id="tahun" type="text" value="<?= $rows['tahun'];?>" placeholder="2018"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" style="text-align:left;" for="tgl_ditetapkan">Tanggal Ditetapkan</label>
                                    <div class="col-sm-3">
                                        <input maxlength="50" class="form-control" name="tgl_ditetapkan" id="tgl_ditetapkan" type="date" value="<?= $rows['tanggal_ditetapkan'];?>" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" style="text-align:left;" for="tgl_diundangkan">Tanggal Diundangkan</label>
                                    <div class="col-sm-3">
                                        <input maxlength="50" class="form-control" name="tgl_diundangkan" id="tgl_diundangkan" type="date" value="<?= $rows['tanggal_diundangkan'];?>" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" style="text-align:left;" for="jenis">Jenis Hukum</label>
                                    <div class="col-sm-6">
                                        <select name="jenis" id="jenis" class="form-control" required>
                                            <option value="<?= $rows['jenis_id'];?>"><?= $rows['jenis_nama'];?></option>
                                            <?php
                                            foreach ($tag->result_array() as $tag){
                                              echo "<option value='$tag[jenis_id]'>$tag[jenis_nama]</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" style="text-align:left;" for="status">Status Hukum</label>
                                    <div class="col-sm-6">
                                        <select name="status" id="status" class="form-control" required>
                                            <option value="<?= $rows['status_id'];?>"><?= $rows['status_nama'];?></option>
                                            <?php
                                            foreach ($record->result_array() as $record){
                                              echo "<option value='$record[status_id]'>$record[status_nama]</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group judul">
                                    <label class="col-sm-2 control-label required" style="text-align:left;" for="judul">Abstrak</label>
                                    <div class="col-sm-9">
                                      <textarea id='editor1' class='form-control' name='abstrak' style='height:320px' required><?= $rows['abstrak'];?></textarea>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-sm-2 control-label" style="text-align:left;" for="spesifikasi">Katalog</label>
                                    <div class="col-sm-9">
                                      <textarea id='editor2' class='form-control' name='katalog' style='height:320px' required><?= $rows['katalog'];?></textarea>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-sm-2 control-label" style="text-align:left;" for="spesifikasi">Upload File</label>
                                    <div class="col-sm-9">
                                      <input type='file' class='form-control' name="userfile[]" id="userfile" multiple>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" style="text-align:left;" for="spesifikasi"></label>
                                    <div class="col-sm-9">
                                      <?php
                                        $this->load->model('model_hukum');
                                        $pdf = $this->model_hukum->list_pdf($rows['id']);
                                        $no_path = 1;
                                        foreach ($pdf->result_array() as $path){
                                      ?>
                                        <a class="btn-primary btn  btn-xs" target="_blank" href="<?php echo base_url($path['file_path']); ?>"><span class="glyphicon glyphicon-open"></span> Dokument <?php echo $no_path; ?></a>
                                      <?php $no_path++; } ?>
                                    </div>
                                </div>


                            </div>

              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Ubah</button>
                    <a href='<?= base_url("administrator/produk_hukum") ?>'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>

                  </div>
            </div>
