    <div class='col-md-12'>
       <div class='box box-info'>
          <div class='box-header with-border'>
            <h3 class='box-title'>Tambah Produk Hukum Baru</h3>
          </div>
            <div class='box-body'>
              <?php  $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/tambah_hukum',$attributes); ?>
                      <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label required" style="text-align:left;" for="tentang">Tantang Hukum</label>
                                    <div class="col-sm-9">
                                        <input  class="form-control" name="tentang" id="tentang" type="text" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" style="text-align:left;">No , Tahun</label>
                                    <div class="col-sm-2">
                                        <input maxlength="50" class="form-control" name="no" id="no" type="text" placeholder="1"/>
                                    </div>
                                    <div class="col-sm-3">
                                        <input maxlength="50" class="form-control" name="tahun" id="tahun" type="text" placeholder="2018"/>
                                    </div>
                                </div><!-- row -->

                                <div class="form-group">
                                    <label class="col-sm-2 control-label" style="text-align:left;" for="tgl_ditetapkan">Tanggal Ditetapkan</label>
                                    <div class="col-sm-3">
                                        <input maxlength="50" class="form-control" name="tgl_ditetapkan" id="tgl_ditetapkan" type="date" required/>
                                    </div>
                                </div><!-- row -->

                                <div class="form-group">
                                    <label class="col-sm-2 control-label" style="text-align:left;" for="tgl_diundangkan">Tanggal Diundangkan</label>
                                    <div class="col-sm-3">
                                        <input maxlength="50" class="form-control" name="tgl_diundangkan" id="tgl_diundangkan" type="date" required/>
                                    </div>
                                </div><!-- row -->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" style="text-align:left;" for="jenis">Jenis Hukum</label>
                                    <div class="col-sm-6">
                                        <select name="jenis" id="jenis" class="form-control" required>
                                            <option value="">-- Jenis Peraturan --</option>
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
                                            <option value="">-- Status Peraturan --</option>
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
                                      <textarea id='editor1' class='form-control' name='abstrak' style='height:320px' required></textarea>
                                    </div>
                                </div>
                                <div class="form-group spesifikasi">
                                    <label class="col-sm-2 control-label" style="text-align:left;" for="spesifikasi">Katalog</label>
                                    <div class="col-sm-9">
                                      <textarea id='editor2' class='form-control' name='katalog' style='height:320px' required></textarea>
                                    </div>
                                </div>
                                <div class="form-group spesifikasi">
                                    <label class="col-sm-2 control-label" style="text-align:left;" for="spesifikasi">Upload File</label>
                                    <div class="col-sm-9">
                                      <input type='file' class='form-control' name="userfile[]" id="userfile" multiple>
                                    </div>
                                </div>
                            </div>

              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambahkan</button>
                    <a href='<?= base_url("administrator/produk_hukum") ?>'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>

                  </div>
            </div>
