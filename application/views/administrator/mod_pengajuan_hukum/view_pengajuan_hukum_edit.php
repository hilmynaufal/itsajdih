
<!-- line modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			<h3 class="modal-title" id="lineModalLabel">Tambah Berita Acara Rapat</h3>
		</div>
		<div class="modal-body">
        <?php  $attributes = array('role'=>'form');
                echo form_open_multipart('administrator/tambah_rapat_pengajuan_hukum',$attributes); ?>
              <div class="form-group">
                <label for="nama_rapat">Pembahasan Rapat</label>
                <input type="text" class="form-control" name="nama_rapat" >
                <input type="hidden" id="id" name="id" value="<?= $rows['id_pengajuan_hukum']; ?>">
              </div>
              <div class="form-group">
                <label for="keterangan">Keterangan Rapat</label>
                <textarea class='form-control' name='keterangan' required></textarea>
              </div>
              <div class="form-group">
                <label for="keterangan">Tanggal Rapat</label>
                <input type="date" class="form-control" name="tanggal_rapat" >
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Upload bukti rapat</label>
                <input type="file" id="fileUpload" required name="fileUpload">
                <i>Harap masukan file bertipe <i style="color:red;">.rar</i> atau <i style="color:red;">.zip</i></i>
              </div>
              <button type="submit" class="btn btn-default">Simpan</button>
            </form>
		</div>
	</div>
  </div>
</div>


<div class='col-md-12'>
<div class='box box-info'>
   <div class='box-header with-border'>
     <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">Pengajuan Hukum</a></li>
            <?php
                $this->load->model('model_pengajuan_hukum');
                $doc = $this->model_pengajuan_hukum->list_rapat($rows['id_pengajuan_hukum']);
                $no_path = 1;
                foreach ($doc->result_array() as $path){
            ?>
                <li><a data-toggle="tab" href="#menu<?= $no_path ?>">Rapat <?= $no_path ?></a></li>
            <?php $no_path++; } ?>
        <li><a data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span> Tambah Berita Rapat </a></li>
    </ul>
   </div>
    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <div class='box-body'>
                <?php  $attributes = array('class'=>'form-horizontal','role'=>'form'); echo form_open_multipart('administrator/edit_pengajuan_hukum',$attributes); ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label required" style="text-align:left;" for="dinas">Nama Dinas</label>
                    <div class="col-sm-9">
                        <input type="hidden" id="id" name="id" value="<?= $rows['id_pengajuan_hukum']; ?>">
                        <input maxlength="50" class="form-control" name="dinas" id="dinas" type="text" value="<?= $rows['pengajuan__nama_dinas']; ?>" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" style="text-align:left;">Nama Hukum</label>
                    <div class="col-sm-9">
                        <input maxlength="50" class="form-control" name="nama" id="nama" value="<?= $rows['pengajuan__nama_hukum']; ?>" type="text"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" style="text-align:left;" for="jenis">Jenis Hukum</label>
                    <div class="col-sm-3">
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
                    <label class="col-sm-2 control-label" style="text-align:left;" for="risalah">Risalah</label>
                    <div class="col-sm-9">
                        <textarea id='editor1' class='form-control' name='risalah' required><?= $rows['pengajuan__risalah']; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" style="text-align:left;" for="tanggal_pengajuan">Tanggal Pengajuan</label>
                    <div class="col-sm-9">
                        <input maxlength="50" class="form-control" name="tanggal_pengajuan" id="tanggal_pengajuan" value="<?= $rows['pengajuan__tgl_pembuatan']; ?>" type="date" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" style="text-align:left;" for="spesifikasi"></label>
                        <div class="col-sm-9">
                            <?php
                                $this->load->model('model_pengajuan_hukum');
                                $doc = $this->model_pengajuan_hukum->list_doc($rows['id_pengajuan_hukum']);
                                $no_path = 1;
                                foreach ($doc->result_array() as $path){
                            ?>
                                <a class="btn-primary btn  btn-xs" target="_blank" href="<?php echo base_url($path['pengajuanfile__path']); ?>"><span class="glyphicon glyphicon-open"></span> Dokument <?php echo $no_path; ?></a>
                            <?php $no_path++; } ?>
                        </div>
                </div>
                <?php if ($this->session->level == 'admin'){ ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label" style="text-align:left;" for="spesifikasi">Approval Pengajuan Hukum</label>
                    <div class="col-sm-9">
                        <select name="approval" id="approval" class="form-control" required>
                            <?php
                                if($rows['pengajuan__approval'] ==  0){
                                    echo "<option value='0'>Proses Pembahasan</option>
                                        <option value='1'>Disetujui</option>
                                        <option value='2'>Ditolak</option>";
                                }else if($rows['pengajuan__approval'] ==  1){
                                    echo " <option value='1'>Disetujui</option>
                                        <option value='0'>Proses Pembahasan</option>
                                        <option value='2'>Ditolak</option>";
                                }else{
                                    echo " <option value='2'>Ditolak</option>
                                    <option value='1'>Disetujui</option>
                                    <option value='0'>Proses Pembahasan</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" style="text-align:left;" for="keterangan_approval">Keterangan Approval</label>
                    <div class="col-sm-9">
                        <textarea id='editor1' class='form-control' name='keterangan_approval'><?= $rows['pengajuan__keterangan_approval']; ?></textarea>
                    </div>
                </div>
                <?php }?>
            <div class='box-footer'>
                <button type='submit' name='submit' class='btn btn-info'>Ubah</button>
                <a href='<?= base_url("administrator/pengajuan_hukum") ?>'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
            </div>
            </form>
        </div>
    </div>
    <?php
        $this->load->model('model_pengajuan_hukum');
        $doc = $this->model_pengajuan_hukum->list_rapat($rows['id_pengajuan_hukum']);
        $no_path = 1;
        foreach ($doc->result_array() as $data){
    ?>
        <div id="menu<?=$no_path?>" class="tab-pane fade">
            <div class="tab-content">
                <div class='box-body'>
                    <?php  $attributes = array('class'=>'form-horizontal','role'=>'form'); echo form_open_multipart('administrator/ubah_rapat_pengajuan_hukum',$attributes); ?>
                    <div class="form-group">
                        <label class="col-sm-2 control-label required" style="text-align:left;" for="dinas">Nama Rapat</label>
                        <div class="col-sm-9">
                            <input type="hidden" id="id" name="id" value="<?= $rows['id_pengajuan_hukum']; ?>">
                            <input type="hidden" id="id_rapat" name="id_rapat" value="<?= $data['buktipengajuan__id']; ?>">
                            <input maxlength="50" class="form-control" name="buktipengajuan__nama" id="buktipengajuan__nama" type="text" value="<?= $data['buktipengajuan__nama']; ?>" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" style="text-align:left;" for="risalah">Keterangan Rapat</label>
                        <div class="col-sm-9">
                            <textarea class='form-control' name='buktipengajuan__keterangan' required><?= $data['buktipengajuan__keterangan']; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" style="text-align:left;" for="tanggal_pengajuan">Tanggal Rapat</label>
                        <div class="col-sm-9">
                            <input maxlength="50" class="form-control" name="buktipengajuan__tgl_pembahasan" id="buktipengajuan__tgl_pembahasan" value="<?= $data['buktipengajuan__tgl_pembahasan']; ?>" type="date" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" style="text-align:left;" for="tanggal_pengajuan"></label>
                        <div class="col-sm-9">
                        <a class="btn-success btn btn-xs" target="_blank" href="<?= base_url(). $data['buktipengajuan__path']; ?>"><span class="glyphicon glyphicon-open"></span> Download</a>
                        </div>
                    </div>
                    <div class='box-footer'>
                        <button type='submit' name='submit' class='btn btn-info'>Ubah</button>
                        <a class='btn btn-danger' title='Delete Data' href='<?= base_url()."administrator/delete_rapat_pengajuan_hukum/$data[buktipengajuan__id]/$rows[id_pengajuan_hukum]"?>' onclick="return confirm('Apa anda yakin untuk hapus Data ini?')">Hapus</a>
                        <a href='<?= base_url("administrator/pengajuan_hukum") ?>'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    </div>
                    </form>
                </div>
            </div>

        </div>

    <?php $no_path++; } ?>
</div>




