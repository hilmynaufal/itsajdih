<div class='col-md-12'>
    <div class='box box-info'>
        <div class='box-header with-border'>
            <h3 class='box-title'>Tambah Peraturan Baru</h3>
        </div>
        <div class='box-body'>
            <?php $attributes = array('class' => 'form-horizontal', 'role' => 'form');
            echo form_open_multipart('administrator/edit_hukum', $attributes); ?>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="col-sm-2 control-label required" style="text-align:left;" for="nama_indonesia">Judul
                        Peraturan Bhs Indonesia</label>
                    <div class="col-sm-9">
                        <input type="hidden" id="id" name="id" value="<?= $rows['id_hukum'] ?>">
                        <input class="form-control" name="nama_indonesia" id="nama_indonesia" type="text" value="<?= $rows['nama']; ?>"
                            required />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label required" style="text-align:left;" for="nama_inggris">Judul
                        Peraturan Bhs Inggris</label>
                    <div class="col-sm-9">
                        <input type="hidden" id="id" name="id" value="<?= $rows['id_hukum'] ?>">
                        <input class="form-control" name="nama_inggris" id="nama_inggris" type="text"
                            value="<?= $rows['nama_inggris']; ?>" />
                    </div>
                </div>
            
                <div class="form-group">
                    <label class="col-sm-2 control-label" style="text-align:left;">No , Tahun</label>
                    <div class="col-sm-6">
                        <input maxlength="200" class="form-control" name="no" id="no" type="text"
                            value="<?= $rows['no']; ?>" placeholder="1" />
                    </div>
                    <div class="col-sm-3">
                        <input maxlength="50" class="form-control" name="tahun" id="tahun" type="text"
                            value="<?= $rows['tahun']; ?>" placeholder="2018" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label required" style="text-align:left;" for="tentang">Tempat
                        Penetapan</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="tempat_penetapan" id="tempat_penetapan"
                            value="<?= $rows['tempat_penetapan']; ?>" type="text" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" style="text-align:left;" for="tgl_ditetapkan">Tanggal
                        Ditetapkan</label>
                    <div class="col-sm-3">
                        <input maxlength="50" class="form-control" name="tgl_ditetapkan" id="tgl_ditetapkan" type="date"
                            value="<?= $rows['tanggal_ditetapkan']; ?>" required />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" style="text-align:left;" for="tgl_diundangkan">Tanggal
                        Diundangkan</label>
                    <div class="col-sm-3">
                        <input maxlength="50" class="form-control" name="tgl_diundangkan" id="tgl_diundangkan"
                            type="date" value="<?= $rows['tanggal_diundangkan']; ?>" required />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" style="text-align:left;" for="jenis">Jenis Dokumen</label>
                    <div class="col-sm-6">
                        <select name="kategori" id="kategori">
                        <option value="<?= $rows['jenis_dokumen']; ?>"><?= $rows['nama_dokumen']; ?></option>
                            <?php foreach ($jenis_dok as $k): ?>
                                <option value="<?= $k['dokumen_id']; ?>"><?= $k['nama_dokumen']; ?></option>
                            <?php endforeach; ?>
                            
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" style="text-align:left;" for="jenis">Jenis produk</label>
                    <div class="col-sm-6">
                        <select name="jenis" id="jenis" class="form-control" required>
                            <option value="<?= $rows['jenis_id']; ?>"><?= $rows['jenis_nama']; ?></option>
                            <?php
                            foreach ($tag->result_array() as $tag) {
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
                            <option value="<?= $rows['status_id']; ?>"><?= $rows['status_nama']; ?></option>
                            <?php
                            foreach ($record->result_array() as $record) {
                                echo "<option value='$record[status_id]'>$record[status_nama]</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group judul">
                    <label class="col-sm-2 control-label required" style="text-align:left;"
                        for="abstrak">Abstrak</label>
                    <div class="col-sm-9">

                        <input type='file' class='form-control' name="abstrak" id="abstrak">
                    </div>
                </div>
                <div class="form-group ">
                    <label class="col-sm-2 control-label" style="text-align:left;" for="spesifikasi">Katalog</label>
                    <div class="col-sm-9">
                        <textarea id='editor1' class='form-control' name='katalog' style='height:320px'
                            required><?= $rows['katalog']; ?></textarea>
                    </div>
                </div>
                <div class="form-group ">
                    <label class="col-sm-2 control-label" style="text-align:left;" for="spesifikasi">Upload Peraturan
                        Versi Indonesia</label>
                    <div class="col-sm-9">
                        <input type='file' class='form-control' name="userfile" id="userfile">
                    </div>
                </div>

                <div class="form-group ">
                    <label class="col-sm-2 control-label" style="text-align:left;" for="spesifikasi">Upload Peraturan
                        Versi Inggris</label>
                    <div class="col-sm-9">
                        <input type='file' class='form-control' name="file_inggris" id="file_inggris">
                    </div>
                </div>

                <div class="form-group ">
                    <label class="col-sm-2 control-label" style="text-align:left;" for="spesifikasi">Upload Lampiran
                        Dapat Banyak File PDF(ctrl + file)</label>
                    <div class="col-sm-9">
                        <input type='file' class='form-control' name="lampiran[]" id="lampiran" multiple>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label required" style="text-align:left;" for="tentang">Sumber</label>
                    <div class="col-sm-9">

                        <input class="form-control" name="sumber" id="sumber" type="text"
                            value="<?= $rows['sumber']; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label required" style="text-align:left;" for="tentang">Subjek</label>
                    <div class="col-sm-9">

                        <input class="form-control" name="subjek" id="subjek" type="text"
                            value="<?= $rows['subjek']; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label required" style="text-align:left;" for="tentang">Status
                        Peraturan</label>
                    <div class="col-sm-9">
                        <textarea id='editor2' class='form-control' name='status_peraturan' style='height:320px'
                            required><?= $rows['status_peraturan']; ?></textarea>
                    </div>
                </div>




                <div class="form-group">
                    <label class="col-sm-2 control-label required" style="text-align:left;">Bahasa</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="bahasa" id="bahasa" type="text"
                            value="<?= $rows['bahasa']; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label required" style="text-align:left;">Lokasi</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="lokasi" id="lokasi" type="text"
                            value="<?= $rows['lokasi']; ?>" />
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-2 control-label required" style="text-align:left;">Bidang hukum</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="bidang_hukum" id="bidang_hukum" type="text"
                            value="<?= $rows['bidang_hukum']; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label required" style="text-align:left;" for="tentang">Kode
                        Lampiran</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="kode_lampiran" id="kode_lampiran" type="text"
                            value="<?= $rows['kode_lampiran']; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label required" style="text-align:left;" for="tentang">T.E.U. Badan /
                        Pengarang</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="pengarang" id="pengarang" type="text"
                            value="<?= $rows['pengarang']; ?>" />
                    </div>
                </div>




                <div class="form-group">
                    <label class="col-sm-2 control-label" style="text-align:left;" for="spesifikasi"></label>
                    <div class="col-sm-9">
                        <?php
                        $this->load->model('model_hukum');
                        $pdf = $this->model_hukum->list_pdf($rows['id']);
                        $no_path = 1;
                        foreach ($pdf->result_array() as $path) {
                            ?>
                            <a class="btn-primary btn  btn-xs" target="_blank"
                                href="<?php echo base_url($path['file_path']); ?>"><span
                                    class="glyphicon glyphicon-open"></span> Dokument <?php echo $no_path; ?></a>
                            <?php $no_path++;
                        } ?>
                    </div>
                </div>



                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#inputCollapse" aria-expanded="false" aria-controls="inputCollapse">
                    Tambah Meta data Monografi
                </button>


                <div id="inputCollapse" class="collapse" style="margin-top: 10px;">

                    <div class="form-group">
                        <label class="col-sm-2 control-label required" style="text-align:left;"
                            for="mg_nomor_panggil">Nomor Panggil</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="mg_nomor_panggil" id="mg_nomor_panggil"
                            value="<?= $rows['mg_nomor_panggil']; ?>"  type="text" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label required" style="text-align:left;"
                            for="mg_cetakan_edisi">Cetakan Edisi</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="mg_cetakan_edisi" id="mg_cetakan_edisi" type="text" value="<?= $rows['mg_cetakan_edisi']; ?>" />
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label required" style="text-align:left;"
                            for="mg_cetakan_edisi"> Tempat Terbit</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="mg_tempat_terbit" value="<?= $rows['mg_tempat_terbit']; ?>" id="mg_tempat_terbit" type="text" />
                        </div>
                    </div>


                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label required" style="text-align:left;"
                            for="mg_cetakan_edisi"> Penerbit</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="mg_penerbit" value="<?= $rows['mg_penerbit']; ?>" id="mg_penerbit" type="text" />
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label required" style="text-align:left;"
                            for="mg_cetakan_edisi"> Tahun Penerbit</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="mg_tahun_terbit" value="<?= $rows['mg_tahun_terbit']; ?>" id="mg_tahun_terbit" type="text" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label required" style="text-align:left;"
                            for="mg_deskripsi_fisik">Deskripsi Fisik</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="mg_deskripsi_fisik" value="<?= $rows['mg_deskripsi_fisik']; ?>" id="mg_deskripsi_fisik" type="text" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label required" style="text-align:left;"
                            for="mg_isbn">ISBN/ISSN</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="mg_isbn" value="<?= $rows['mg_isbn']; ?>" mg_deskripsi_fisikid="mg_isbn" type="text" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label required" style="text-align:left;" for="mg_isbn">Nomor
                            Induk Buku</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="mg_nomorinduk_buku" value="<?= $rows['mg_nomorinduk_buku']; ?>"  id="mg_nomorinduk_buku" type="text" />
                        </div>
                    </div>


                </div>


                <button class="btn btn-primary" type="button" data-toggle="collapse"
                    data-target="#inputCollapseyuriprudensi" aria-expanded="false" aria-controls="inputCollapse">
                    Tambah Meta data Yurisprudensi
                </button>
               
                <div id="inputCollapseyuriprudensi" class="collapse" style="margin-top: 10px;">



                    <div class="form-group">
                        <label class="col-sm-2 control-label required" style="text-align:left;"
                            for="yuris_nomor_putusan">Nomor Putusan </label>
                        <div class="col-sm-9">
                            <input class="form-control" name="yuris_nomor_putusan" value="<?= $rows['yuris_nomor_putusan']; ?>"   id="yuris_nomor_putusan" type="text" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label required" style="text-align:left;"
                            for="yuris_singakatanjenis_peradilan">Singakatan jenis  peradilan </label>
                        <div class="col-sm-9">
                            <input class="form-control" name="yuris_singakatanjenis_peradilan" value="<?= $rows['yuris_singakatanjenis_peradilan']; ?>" id="yuris_singakatanjenis_peradilan" type="text" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label required" style="text-align:left;"
                            for="yuris_tempat_peradilan">Tempat Peradilan</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="yuris_tempat_peradilan" value="<?= $rows['yuris_tempat_peradilan']; ?>" id="yuris_tempat_peradilan" type="text" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label required" style="text-align:left;" for="yuris_tempat_peradilan">Tglbln dibacakan</label>
                       <div class="col-sm-3">
                        <input maxlength="50" class="form-control" name="yuris_tglbln_dibacakan" value="<?= $rows['yuris_tglbln_dibacakan']; ?>" id="yuris_tglbln_dibacakan" type="date" />
                    </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label required" style="text-align:left;"
                            for="yuris_jenis_peradilan">Jenis Peradilan</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="yuris_jenis_peradilan" value="<?= $rows['yuris_jenis_peradilan']; ?>" id="yuris_jenis_peradilan" type="text" />
                        </div>
                    </div>








                </div>


            </div>

        </div>
        <div class='box-footer'>
            <button type='submit' name='submit' class='btn btn-info'>Ubah</button>
            <a href='<?= base_url("administrator/produk_hukum") ?>'><button type='button'
                    class='btn btn-default pull-right'>Cancel</button></a>

        </div>
    </div>


    <script>
                    $(document).ready(function () {
                        $('#kategori').change(function () {
                            var id_kategori = $(this).val();

                            // Kosongkan subkategori saat kategori berubah
                            $('#jenis').html('<option value="">-- Pilih Subkategori --</option>');

                            if (id_kategori) {
                                $.ajax({
                                    url: '<?= base_url("Administrator/get_subjenishukum"); ?>',
                                    type: 'POST',
                                    data: { id_kategori: id_kategori },
                                    dataType: 'json',
                                    success: function (data) {
                                        $.each(data, function (key, value) {
                                            $('#jenis').append('<option value="' + value.jenis_id + '">' + value.jenis_keterangan + '</option>');
                                        });
                                    },
                                    error: function () {
                                        alert('Gagal mengambil data subkategori.');
                                    }
                                });
                            }
                        });
                    });
                </script>