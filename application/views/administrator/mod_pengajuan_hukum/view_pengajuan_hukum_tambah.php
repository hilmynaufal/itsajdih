<div class='col-md-12'>
<div class='box box-info'>
   <div class='box-header with-border'>
     <h3 class='box-title'>Tambah Produk Hukum Baru</h3>
   </div>
     <div class='box-body'>
       <?php  $attributes = array('class'=>'form-horizontal','role'=>'form');
       echo form_open_multipart('administrator/tambah_pengajuan_hukum',$attributes); ?>
               <div class="col-md-12">
                         <div class="form-group">
                             <label class="col-sm-2 control-label required" style="text-align:left;" for="dinas">Nama Dinas</label>
                             <div class="col-sm-9">
                                 <input type="hidden" id="id" name="id" value="<?= $this->session->id; ?>">
                                 <input maxlength="50" class="form-control" name="dinas" id="dinas" type="text" required/>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="col-sm-2 control-label" style="text-align:left;">Nama Hukum</label>
                             <div class="col-sm-9">
                                 <input maxlength="50" class="form-control" name="nama" id="nama" type="text"/>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="col-sm-2 control-label" style="text-align:left;" for="jenis">Jenis Hukum</label>
                             <div class="col-sm-3">
                                <select name="jenis" id="jenis" class="form-control" required>
                                    <option value="">-- Jenis Peraturan --</option>
                                    <?php
                                    foreach ($tag->result_array() as $tag){
                                    echo "<option value='$tag[jenis_id]'>$tag[jenis_nama]AAA</option>";
                                    }
                                    ?>
                                </select>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="col-sm-2 control-label" style="text-align:left;" for="risalah">Risalah</label>
                             <div class="col-sm-9">
                                 <textarea id='editor1' class='form-control' name='risalah' required></textarea>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="col-sm-2 control-label" style="text-align:left;" for="tanggal_pengajuan">Tanggal Pengajuan</label>
                             <div class="col-sm-9">
                                 <input maxlength="50" class="form-control" name="tanggal_pengajuan" id="tanggal_pengajuan" type="date" />
                             </div>
                         </div>
                         <div class="form-group spesifikasi">
                             <label class="col-sm-2 control-label" style="text-align:left;" for="spesifikasi">Upload File</label>
                             <div class="col-sm-9">
                               <input type='file' class='form-control' name="userfile[]" id="userfile" multiple>
                                <i>Harap masukan file bertipe <i style="color:red;">.doc</i> atau <i style="color:red;">.docx</i></i>
                             </div>
                         </div>
                     </div>

       </div>
       <div class='box-footer'>
             <button type='submit' name='submit' class='btn btn-info'>Tambahkan</button>
             <a href='<?= base_url("administrator/pengajuan_hukum") ?>'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>

           </div>
     </div>
