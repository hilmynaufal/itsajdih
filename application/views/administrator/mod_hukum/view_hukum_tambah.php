<div class='col-md-12'>
    <div class='box box-info'>
        <div class='box-header with-border'>
            <h3 class='box-title'>Tambah Produk</h3>
        </div>
        <div class='box-body'>
            <?php $attributes = array('class' => 'form-horizontal', 'role' => 'form');
            echo form_open_multipart('administrator/tambah_hukum', $attributes); ?>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="col-sm-2 control-label required" style="text-align:left;" for="nama_indonesia">Judul
                        Bhs Indonesia</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="nama_indonesia" id="nama_indonesia" type="text" required />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label required" style="text-align:left;" for="nama_inggris">Judul Bhs
                        Inggris</label>
                    <div class="col-sm-9">

                        <input class="form-control" name="nama_inggris" id="nama_inggris" type="text" value="" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label required" style="text-align:left;"
                        for="tentang">Tentang</label>
                    <div class="col-sm-9">

                        <input class="form-control" name="tentang" id="tentang" type="text" value="" />
                    </div>
                </div>



                <div class="form-group">
                    <label class="col-sm-2 control-label" style="text-align:left;">No , Tahun</label>
                    <div class="col-sm-5">
                        <input maxlength="300" class="form-control" name="no" id="no" type="text"
                            placeholder="MASUKAN NOMOR" />
                    </div>
                    <div class="col-sm-3">
                        <input maxlength="50" class="form-control" name="tahun" id="tahun" type="number"
                            placeholder="MASUKAN TAHUN " />
                    </div>
                </div><!-- row -->

                <div class="form-group">
                    <label class="col-sm-2 control-label required" style="text-align:left;" for="tentang">Tempat
                        Penetapan</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="tempat_penetapan" id="tempat_penetapan" type="text" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" style="text-align:left;" for="tgl_ditetapkan">Tanggal
                        Ditetapkan</label>
                    <div class="col-sm-3">
                        <input maxlength="50" class="form-control" name="tgl_ditetapkan" id="tgl_ditetapkan" type="date"
                            required />
                    </div>
                </div><!-- row -->

                <div class="form-group">
                    <label class="col-sm-2 control-label" style="text-align:left;" for="tgl_diundangkan">Tanggal
                        Diundangkan</label>
                    <div class="col-sm-3">
                        <input maxlength="50" class="form-control" name="tgl_diundangkan" id="tgl_diundangkan"
                            type="date" required />
                    </div>
                </div><!-- row -->

                <div class="form-group">
                    <label class="col-sm-2 control-label" style="text-align:left;" for="jenis">Jenis Dokumen</label>
                    <div class="col-sm-6">
                        <select name="kategori" id="kategori">
                            <option value="">-- Pilih Jenis Dokumen --</option>
                            <?php foreach ($jenis_dokumen as $k): ?>
                                <option value="<?= $k['dokumen_id']; ?>"><?= $k['nama_dokumen']; ?></option>
                            <?php endforeach; ?>
                        </select>
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



                <div class="form-group">
                    <label class="col-sm-2 control-label" style="text-align:left;" for="jenis">Jenis Dokumen
                        Produk</label>
                    <div class="col-sm-6">


                        <select name="jenis" id="jenis">
                            <option value="">-- Pilih Dokumen Produk --</option>
                        </select>

                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-2 control-label" style="text-align:left;" for="status">Status
                        Peraturan</label>
                    <div class="col-sm-6">
                        <select name="status" id="status" class="form-control" required>
                            <option value="">-- Status Peraturan --</option>
                            <?php
                            foreach ($record->result_array() as $record) {
                                echo "<option value='$record[status_id]'>$record[status_nama]</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label required" style="text-align:left;" for="judul">Keterangan
                        Status peraturan</label>
                    <div class="col-sm-9">
                        <textarea id='editor1' class='form-control' name='status_peraturan'
                            style='height:120px'></textarea>
                    </div>
                </div>
                <div class="form-group judul">
                    <label class="col-sm-2 control-label required" style="text-align:left;"
                        for="abstrak">Abstrak</label>
                    <div class="col-sm-9">

                        <input type='file' class='form-control' name="abstrak" id="abstrak">
                    </div>
                </div>
                <div class="form-group spesifikasi">
                    <label class="col-sm-2 control-label" style="text-align:left;" for="katalog">Katalog</label>
                    <div class="col-sm-9">
                        <textarea id='editor2' class='form-control' name='katalog' style='height:320px'></textarea>
                    </div>
                </div>
                <div class="form-group ">
                    <label class="col-sm-2 control-label" style="text-align:left;" for="spesifikasi">Upload
                        Produk Versi Indonesia</label>
                    <div class="col-sm-9">
                        <input type='file' class='form-control' name="userfile" id="userfile">
                    </div>
                </div>

                <div class="form-group ">
                    <label class="col-sm-2 control-label" style="text-align:left;" for="spesifikasi">Upload Produk Versi
                        Inggris</label>
                    <div class="col-sm-9">
                        <input type='file' class='form-control' name="file_inggris" id="file_inggris">
                    </div>
                </div>


                <div class="form-group ">
                    <label class="col-sm-2 control-label" style="text-align:left;" for="spesifikasi">Upload
                        Lampiran
                        Dapat Banyak File PDF(ctrl + file)</label>
                    <div class="col-sm-9">
                        <input type='file' class='form-control' name="lampiran[]" id="lampiran" multiple>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-2 control-label required" style="text-align:left;" for="tentang">Sumber</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="sumber" id="sumber" type="text" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label required" style="text-align:left;" for="tentang">Subjek</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="subjek" id="subjek" type="text" />
                    </div>
                </div>



                <div class="form-group">
                    <label class="col-sm-2 control-label required" style="text-align:left;" for="tentang">Bahasa</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="bahasa" id="bahasa" type="text" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label required" style="text-align:left;" for="tentang">Lokasi</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="lokasi" id="lokasi" type="text" />
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-2 control-label required" style="text-align:left;" for="tentang">Bidang
                        Hukum</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="bidang_hukum" id="bidang_hukum" type="text" />
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-2 control-label required" style="text-align:left;" for="tentang">Kode
                        Lampiran</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="kode_lampiran" id="kode_lampiran" type="text" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label required" style="text-align:left;" for="tentang">T.E.U.
                        Badan /
                        Pengarang</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="pengarang" id="pengarang" type="text" />
                    </div>
                </div>

                <div class="form-group ">
                    <label class="col-sm-2 control-label" style="text-align:left;" for="spesifikasi">Alih Suara</label>
                    <div class="col-sm-9">
                        <input type='file' class='form-control' name="alih_suara" id="alih_suara">
                    </div>
                </div>

                <div class="form-group ">
                    <label class="col-sm-2 control-label" style="text-align:left;" for="spesifikasi">Braile</label>
                    <div class="col-sm-9">
                        <input type='file' class='form-control' name="braile" id="braile">
                    </div>
                </div>

                <!-- <div class="form-group ">
                    <label class="col-sm-2 control-label" style="text-align:left;" for="spesifikasi">File Naskah Kuno</label>
                    <div class="col-sm-9">
                        <input type='file' class='form-control' name="file_naskah_kuno" id="file_naskah_kuno">
                    </div>
                </div> -->

                <div class="form-group">
                    <label class="col-sm-2 control-label required" style="text-align:left;" for="tentang">Teks Naskah Kuno</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="teks_naskah_kuno" id="teks_naskah_kuno" type="text" />
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
                            <input class="form-control" name="mg_cetakamg_nomor_panggil_edisi" id="mg_nomor_panggil"
                                type="text" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label required" style="text-align:left;"
                            for="mg_cetakan_edisi">Cetakan Edisi</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="mg_cetakan_edisi" id="mg_cetakan_edisi" type="text" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label required" style="text-align:left;"
                            for="mg_cetakan_edisi"> Tempat Terbit</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="mg_tempat_terbit" id="mg_tempat_terbit" type="text" />
                        </div>
                    </div>


                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label required" style="text-align:left;"
                            for="mg_cetakan_edisi"> Penerbit</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="mg_penerbit" id="mg_penerbit" type="text" />
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label required" style="text-align:left;"
                            for="mg_cetakan_edisi"> Tahun Penerbit</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="mg_tahun_terbit" id="mg_tahun_terbit" type="text" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label required" style="text-align:left;"
                            for="mg_deskripsi_fisik">Deskripsi Fisik</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="mg_deskripsi_fisik" id="mg_deskripsi_fisik" type="text" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label required" style="text-align:left;"
                            for="mg_isbn">ISBN/ISSN</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="mg_isbn" id="mg_isbn" type="text" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label required" style="text-align:left;" for="mg_isbn">Nomor
                            Induk Buku</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="mg_nomorinduk_buku" id="mg_nomorinduk_buku" type="text" />
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
                            <input class="form-control" name="yuris_nomor_putusan" id="yuris_nomor_putusan" type="text" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label required" style="text-align:left;"
                            for="yuris_singakatanjenis_peradilan">Singakatan jenis  peradilan </label>
                        <div class="col-sm-9">
                            <input class="form-control" name="yuris_singakatanjenis_peradilan" id="yuris_singakatanjenis_peradilan" type="text" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label required" style="text-align:left;"
                            for="yuris_tempat_peradilan">Tempat Peradilan</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="yuris_tempat_peradilan" id="yuris_tempat_peradilan" type="text" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label required" style="text-align:left;" for="yuris_tempat_peradilan">Tglbln dibacakan</label>
                       <div class="col-sm-3">
                        <input maxlength="50" class="form-control" name="yuris_tglbln_dibacakan" id="yuris_tglbln_dibacakan" type="date" />
                    </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label required" style="text-align:left;"
                            for="yuris_jenis_peradilan">Jenis Peradilan</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="yuris_jenis_peradilan" id="yuris_jenis_peradilan" type="text" />
                        </div>
                    </div>








                </div>

            </div>

        </div>
        <div class='box-footer'>
            <button type='submit' name='submit' class='btn btn-info'>Tambahkan</button>
            <a href='<?= base_url("administrator/produk_hukum") ?>'><button type='button'
                    class='btn btn-default pull-right'>Cancel</button></a>

        </div>
    </div>