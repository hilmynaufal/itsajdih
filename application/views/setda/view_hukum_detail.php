<style>
    .p1 {
        font-family: "Times New Roman", Times, serif;
    }

    .p2 {
        font-family: Arial, Helvetica, sans-serif;
    }

    .p3 {
        font-family: "Lucida Console", "Courier New", monospace;
    }
    .fa-info-circle {
        font-size: 14px !important;
    }  
    /* Area PDF */
    .pdf-viewer-wrap {
        width: 100%;
        height: calc(100vh - 180px); /* kurangi header + menu + margin */
        min-height: 600px;
        border: 1px solid #ddd;
        border-radius: 6px;
        overflow: hidden;
        background: #fff;
    }

    /* iframe PDF */
    .pdf-viewer-wrap iframe {
        width: 100%;
        height: 100%;
        border: none;
    }

</style>
<section id="service-details" class="service-details section">
    <div class="container">
        <div class="row gy-5">
            <div class="col-lg-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                <!-- Riwayat Status -->
                <div class="service-box">
                    <h4>Riwayat Status</h4>
                    <div style="font-size: 14px;">
                        <div style="color: #888; padding: 15px; border: 1px dashed #ddd; border-radius: 4px; text-align: center; background: #fafafa;">
                            <i class="fa fa-info-circle" style="padding-right: 5px;"></i> Tidak ada riwayat status hukum untuk dokumen ini.
                        </div>
                        <div style="margin-top:20px; border: 1px solid #eee; padding: 15px; border-radius: 8px; background-color: #fcfcfc;">
					        <strong style="color: #333; display: block; margin-bottom: 10px;">
						        Peraturan Terkait:
					        </strong>
					        <ul class="dasar-hukum-list" style="padding-left: 0; list-style: none; font-size: 13px;">
						        <li style="color: rgb(153, 153, 153); font-style: italic; padding-left: 5px; font-size: 13px; line-height: 20px;" data-asw-org-font-size="13" data-asw-org-line-height="20"><i class="fa fa-info-circle"></i> Tidak ada peraturan terkait yang terdaftar.</li>
                            </ul>
				        </div>
                        <div style="margin-top:20px; border: 1px solid #eee; padding: 15px; border-radius: 8px; background-color: #fcfcfc;">
					        <strong style="color: #333; display: block; margin-bottom: 10px;">
						        Peraturan Pelaksanaan:
					        </strong>
					        <ul class="dasar-hukum-list" style="padding-left: 0; list-style: none; font-size: 13px;">
						        <li style="color: rgb(153, 153, 153); font-style: italic; padding-left: 5px; font-size: 13px; line-height: 20px;" data-asw-org-font-size="13" data-asw-org-line-height="20"><i class="fa fa-info-circle"></i> Tidak ada peraturan pelaksanaan yang terdaftar.</li>
                            </ul>
				        </div>
                        <div style="margin-top:20px; border: 1px solid #eee; padding: 15px; border-radius: 8px; background-color: #fcfcfc;">
					        <strong style="color: #333; display: block; margin-bottom: 10px;">
						        Dokumen Terkait/Pembentukan:
					        </strong>
					        <ul class="dasar-hukum-list" style="padding-left: 0; list-style: none; font-size: 13px;">
						        <li style="color: rgb(153, 153, 153); font-style: italic; padding-left: 5px; font-size: 13px; line-height: 20px;" data-asw-org-font-size="13" data-asw-org-line-height="20"><i class="fa fa-info-circle"></i> Tidak ada dokumen terkait yang terdaftar.</li>
                            </ul>
				        </div>
                    </div>
                </div><!-- End Services List -->

                <!-- Metadata Dokumen -->
                <div class="service-box">
                    <h4>Metadata Dokumen</h4>
                    <div class="table-responsive">
                        <p class="p1"></p>
                        <table class="table" width="100">
                            <tbody class='small text-secondary'>
                                <!-- === KOLOM YANG SELALU TAMPIL === -->
                                <tr>
                                    <th width="30%" scope="row">Tipe Dokumen</th>
                                    <td><?= $detail->nama_dokumen ?></td>
                                </tr>
                                <tr>
                                    <th width="30%" scope="row">Jenis</th>
                                    <td><?php echo $detail->jenis_nama ?></td>
                                </tr>
                                <tr>
                                    <th width="30%" scope="row">Judul</th>
                                    <td><?php echo ucwords(strtolower($detail->jenis_nama . ' Nomor ' . $detail->no . ' Tahun ' . $detail->tahun . ' Tentang ' . $detail->nama)) ?></td>
                                </tr>
                                <tr>
                                    <th width="30%" scope="row">T.E.U Badan / Pengarang</th>
                                    <td><?= $detail->pengarang ?></td>
                                </tr>
                                <tr>
                                    <th width="30%" scope="row">Tanggal Upload</th>
                                    <td>
                                        <?= date('d F Y', strtotime($detail->updated_at)); ?>
                                    </td>
                                </tr>

                                <!-- === TIPE: Produk Hukum: Perundang-undangan Metadata === -->
                                <?php if ($detail->nama_dokumen == 'Peraturan Perundang-Undangan'): ?>
                                    <tr>
                                        <th width="30%" scope="row">Nomor Peraturan </th>
                                        <td><?= $detail->no; ?></a></td>
                                    </tr>
                                    <tr>
                                        <th width="30%" scope="row">Jenis Peraturan </th>
                                        <td><?= $detail->jenis_nama; ?></td>
                                    </tr>
                                    <tr>
                                        <th width="30%" scope="row">Singkatan </th>
                                        <td><?= $detail->jenis_keterangan; ?></td>
                                    </tr>
                                    <tr>
                                        <th width="30%" scope="row">Tempat Penetapan </th>
                                        <td><?= $detail->tempat_penetapan; ?></td>
                                    </tr>
                                    <tr>
                                        <th width="30%" scope="row">Tahun </th>
                                        <td><?php echo ucwords(strtolower($detail->mg_tahun_terbit)); ?> </td>
                                    </tr>
                                    <tr>
                                        <th width="30%" scope="row">Tanggal Penetapan </th>
                                        <td><?= tgl_indoo($detail->tanggal_ditetapkan); ?></a></td>
                                    </tr>
                                    <tr>
                                        <th width="30%" scope="row">Tanggal Pengundangan </th>
                                        <td><?= tgl_indoo($detail->tanggal_ditetapkan); ?></a></td>
                                    </tr>
                                    <tr>
                                        <th width="30%" scope="row">Sumber </th>
                                        <td><?= $detail->sumber; ?></td>
                                    </tr>
                                    <tr>
                                        <th width="30%" scope="row">Subjek </th>
                                        <td><?= $detail->subjek; ?></td>
                                    </tr>
                                    <tr>
                                        <th width="30%" scope="row">Bahasa </th>
                                        <td>
                                            <?php echo ucwords(strtolower($detail->bahasa)); ?>
                                    </tr>
                                    <tr>
                                        <th width="30%" scope="row">Lokasi </th>
                                        <td><?php echo ucwords(strtolower($detail->lokasi)); ?> </td>
                                    </tr>
                                    <tr>
                                        <th width="30%" scope="row">Bidang Hukum</th>
                                        <td><?php echo ucwords(strtolower($detail->bidang_hukum)); ?></td>
                                    </tr>
                                    <tr>
                                        <th width="30%" scope="row">Abstrak </th>
                                        <td>
                                            <?PHP

                                            if (is_null($detail->path_file_abstrak)) {
                                                $path_file_abstrak = ''; // Path file lokal
                                            } else {
                                                $path_file_abstrak = '.' . $detail->path_file_abstrak; // Path file lokal
                                            }

                                            $path_file_abstrak = file_exists($path_file_abstrak)
                                            ? "  <a  class='btn btn-secondary btn-sm' href='#' onclick='sendPostRequest_abstrak()'>Baca Abstrak</a>"
                                            : "<span>Tidak Ada File</span>";

                                        echo $path_file_abstrak;
                                            ?>
                                            </td>
                                    </tr>
                                    <tr>
                                        <th width="30%" scope="row">English Version </th>
                                        <td>
                                            <?PHP

                                            if (is_null($detail->path_file_inggris)) {
                                                $path_inggris = ''; // Path file lokal
                                            } else {
                                                $path_inggris = '.' . $detail->path_file_inggris; // Path file lokal
                                            }

                                            $viewinggris = file_exists($path_inggris)
                                                ? " <a class='btn btn-secondary btn-sm' href='#' onclick='sendPostRequest_inggris()'>Baca Inggris</a>"
                                                : "<span>Tidak Ada File</span>";

                                            echo $viewinggris;
                                            ?>                                     
                                        </td>
                                    </tr>

                                <?php elseif ($detail->nama_dokumen == 'Dokumen Lainnya'): ?>
                                    <!-- === TIPE: MONOGRAFI METADATA === -->
                                    <?php if ($detail->jenis_nama == 'Monografi'): ?>
                                        <tr>
                                            <th width="30%" scope="row">Nomor Panggil </th>
                                            <td><?php echo ucwords(strtolower($detail->mg_nomor_panggil)); ?> </td>
                                        </tr>
                                        <tr>
                                            <th width="30%" scope="row">Cetakan Edisi </th>
                                            <td><?php echo ucwords(strtolower($detail->mg_cetakan_edisi)); ?> </td>
                                        </tr>
                                        <tr>
                                            <th width="30%" scope="row">Tempat Terbit </th>
                                            <td><?php echo ucwords(strtolower($detail->mg_tempat_terbit)); ?> </td>
                                        </tr>
                                        <tr>
                                            <th width="30%" scope="row">Penerbit </th>
                                            <td><?php echo ucwords(strtolower($detail->mg_penerbit)); ?> </td>
                                        </tr>
                                        <tr>
                                            <th width="30%" scope="row">Tahun Terbit </th>
                                            <td><?php echo ucwords(strtolower($detail->mg_tahun_terbit)); ?> </td>
                                        </tr>
                                        <tr>
                                            <th width="30%" scope="row">Deskripsi Fisik </th>
                                            <td><?php echo ucwords(strtolower($detail->mg_deskripsi_fisik)); ?> </td>
                                        </tr>
                                        <tr>
                                            <th width="30%" scope="row">Subjek</th>
                                            <td><?php echo $detail->subjek ?></td>
                                        </tr>
                                        <tr>
                                            <th width="30%" scope="row">ISBN </th>
                                            <td><?php echo ucwords(strtolower($detail->mg_isbn)); ?> </td>
                                        </tr>
                                        <tr>
                                            <th width="30%" scope="row">Bahasa</th>
                                            <td><?php echo $detail->bahasa ?></td>
                                        </tr>
                                        <tr>
                                            <th width="30%" scope="row">Bidang Hukum</th>
                                            <td><?php echo ucwords(strtolower($detail->bidang_hukum)); ?></td>
                                        </tr>
                                        <tr>
                                            <th width="30%" scope="row">Nomor Induk </th>
                                            <td><?php echo ucwords(strtolower($detail->mg_nomorinduk_buku)); ?> </td>
                                        </tr>
                                        <tr>
                                            <th width="30%" scope="row">Lokasi </th>
                                            <td><?php echo ucwords(strtolower($detail->lokasi)); ?> </td>
                                        </tr>

                                        <!-- === TIPE: ARTIKEL METADATA === -->
                                    <?php elseif ($detail->jenis_nama == 'Artikel Hukum'): ?>
                                        <tr>
                                            <th width="30%" scope="row">Tempat Terbit</th>
                                            <td><?php echo $detail->mg_tempat_terbit ?></td>
                                        </tr>
                                        <tr>
                                            <th width="30%" scope="row">Tahun Terbit</th>
                                            <td><?php echo $detail->mg_tahun_terbit ?></td>
                                        </tr>
                                        <tr>
                                            <th width="30%" scope="row">Sumber</th>
                                            <td><?php echo $detail->sumber ?></td>
                                        </tr>
                                        <tr>
                                            <th width="30%" scope="row">Subjek</th>
                                            <td><?php echo $detail->subjek ?></td>
                                        </tr>
                                        <tr>
                                            <th width="30%" scope="row">Bahasa</th>
                                            <td><?php echo $detail->bahasa ?></td>
                                        </tr>
                                        <tr>
                                            <th width="30%" scope="row">Bidang Hukum</th>
                                            <td><?php echo $detail->bidang_hukum ?></td>
                                        </tr>
                                        <tr>
                                            <th width="30%" scope="row">Lokasi</th>
                                            <td><?php echo $detail->lokasi ?></td>
                                        </tr>

                                        <!-- === TIPE: YURISPRUDENSI METADATA === -->
                                    <?php elseif ($detail->jenis_nama == 'Yurisprudensi' || $detail->jenis_nama == 'Putusan Pengadilan'): ?>
                                        <tr>
                                            <th width="30%" scope="row">Nomor Putusan</th>
                                            <td><?php echo $detail->no ?></td>
                                        </tr>
                                        <tr>
                                            <th width="30%" scope="row">Jenis Peradilan</th>
                                            <td><?php echo $detail->yuris_jenis_peradilan ?></td>
                                        </tr>
                                        <tr>
                                            <th width="30%" scope="row">Singkatan Jenis Peradilan</th>
                                            <td><?php echo $detail->yuris_singakatanjenis_peradilan ?></td>
                                        </tr>
                                        <tr>
                                            <th width="30%" scope="row">Tempat Peradilan</th>
                                            <td><?php echo $detail->yuris_tempat_peradilan ?></td>
                                        </tr>
                                        <tr>
                                            <th width="30%" scope="row">Tahun</th>
                                            <td><?php echo $detail->tahun ?></td>
                                        </tr>
                                        <tr>
                                            <th width="30%" scope="row">Tanggal Dibacakan</th>
                                            <td><?php echo $detail->yuris_tglbln_dibacakan ?></td>
                                        </tr>
                                        <tr>
                                            <th width="30%" scope="row">Sumber</th>
                                            <td><?php echo $detail->sumber ?></td>
                                        </tr>
                                        <tr>
                                            <th width="30%" scope="row">Subjek</th>
                                            <td><?php echo $detail->subjek ?></td>
                                        </tr>
                                        <tr>
                                            <th width="30%" scope="row">Bahasa</th>
                                            <td><?php echo $detail->bahasa ?></td>
                                        </tr>
                                        <tr>
                                            <th width="30%" scope="row">Bidang Hukum / Jenis Perkara</th>
                                            <td><?php echo $detail->bidang_hukum ?></td>
                                        </tr>
                                        <tr>
                                            <th width="30%" scope="row">Lokasi</th>
                                            <td><?php echo $detail->lokasi ?></td>
                                        </tr>
                                    <?php endif; ?>

                                <?php else: ?>
                                    <!-- fallback jika tipe dokumen tidak dikenali -->
                                <?php endif; ?>

                                <!-- <tr>
                                  <th width="30%" scope="row">Braille</th>
                                  <td colspan="2" >Tidak Tersedia</td>
                              	</tr> -->
                                <tr>
                                    <th width="30%" scope="row">Braille</th>
                                    <td colspan="2">
                                        <?php if (!empty($braile)): ?>
                                            <a class="btn btn-success btn-sm" target="_blank" href="<?= base_url($braile) ?>">
                                                <i class="fa fa-eye"></i> Lihat Braille
                                            </a>
                                            <a class="btn btn-primary btn-sm" href="<?= base_url($braile) ?>" download>
                                                <i class="fa fa-download"></i> Download
                                            </a>
                                        <?php else: ?>
                                            <span class="text-muted">Tidak tersedia</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>

                              	<!-- <tr>
                                  <th width="30%" scope="row">Alih Suara</th>
                                  <td colspan="2" >Tidak Tersedia</td>
                              	</tr> -->
                                <tr>
                                    <th width="30%" scope="row">Alih Suara</th>
                                    <td colspan="2">
                                        <?php if (!empty($audio)): ?>
                                            <audio controls style="width:100%">
                                                <source src="<?= base_url($audio) ?>" type="audio/mpeg">
                                                Browser tidak mendukung audio.
                                            </audio>
                                        <?php else: ?>
                                            <span class="text-muted">Tidak tersedia</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2">Halaman Ini Diakses sebanyak <b><?= $detail->dibaca; ?></b> Kali dan
                                        di Unduh Sebanyak <b><?= $detail->didownload; ?></b> Kali</td>
                                </tr>
                            </tbody>
                        </table>
                        </p>
                    </div>
                    <!-- <h4>Kategori Produk</h4> -->
                    <!-- <div class="services-list">
                        <a href="#" class="active"><i class="bi bi-arrow-right-circle"></i><span>Web Design</span></a>
                        <a href="#"><i class="bi bi-arrow-right-circle"></i><span>Web Design</span></a>
                        <a href="#"><i class="bi bi-arrow-right-circle"></i><span>Product Management</span></a>
                        <a href="#"><i class="bi bi-arrow-right-circle"></i><span>Graphic Design</span></a>
                        <a href="#"><i class="bi bi-arrow-right-circle"></i><span>Marketing</span></a>
                        </div> -->
                </div><!-- End Services List -->

                <!-- Download Dokumen -->
                <div class="service-box">
                    <h4>Download Dokumen</h4>
                    <div class="download-catalog">
                        <a href="<?PHP echo base_url() . $detail->file_path; ?>"><i class="bi bi-filetype-pdf"></i><span>Download</span></a>
                        <!-- <a href="#"><i class="bi bi-file-earmark-word"></i><span>Catalog DOC</span></a> -->
                    </div>
                </div><!-- End Services List -->

                <div class="help-box d-flex flex-column justify-content-center align-items-center">
                    <i class="bi bi-headset help-icon"></i>
                    <h4>Survey SKM?</h4>
                    <p class="d-flex align-items-center mt-2 mb-0"><i class="bi bi-telephone me-2"></i> <span></span>
                    </p>
                    <!-- <p class="d-flex align-items-center mt-1 mb-0"><i class="bi bi-envelope me-2"></i> <a href="mailto:contact@example.com">contact@example.com</a></p> -->
                </div>

            </div>

            <div class="col-lg-8 ps-lg-5 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">

                <img src="assets/img/services.jpg" alt="" class="img-fluid services-img">


                <?php

                $file_download = $detail->file_path;
                $siteaddressAPI = base_url() . $file_download . "";



                // 					$pisah=explode("/", $siteaddressAPI);

                // 				 	$pisah[]=array();

                // 				 $file=$pisah[6];

                // 			//	  var_dump($file) or die();

                // 	header("content-type: application/pdf");

                // readfile('./asset/file_hukum/'.$file);
                ?>
                <iframe src="<?PHP ''; echo $siteaddressAPI 
                                    ?>" width="100%" height="600px"></iframe>
            </div>

        </div>

    </div>
    <link rel="stylesheet" href="css/style.css">
    <link href="<?php echo base_url(); ?>template/<?php echo template(); ?>/css/pdf/style.css rel=" stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" type="image/png"
        href="https://play-lh.googleusercontent.com/kIwlXqs28otssKK_9AKwdkB6gouex_U2WmtLshTACnwIJuvOqVvJEzewpzuYBXwXQQ=w240-h480-rw">
    <script src="<?php echo base_url(); ?>template/<?php echo template(); ?>/js/pdf.js"></script>




    <script>
        function sendPostRequest_abstrak() {
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = '<?php echo site_url('hukum/viewabstrak'); ?>';

            // Tambahkan data ke dalam form jika diperlukan
            var hiddenField1 = document.createElement('input');
            hiddenField1.type = 'hidden';
            hiddenField1.name = 'id';
            hiddenField1.value = <?= $detail->id; ?>;
            form.appendChild(hiddenField1);

            // var hiddenField2 = document.createElement('input');
            // hiddenField2.type = 'hidden';
            // hiddenField2.name = 'data2';
            // hiddenField2.value = 'value2';
            // form.appendChild(hiddenField2);

            document.body.appendChild(form);
            form.submit();
        }

        function sendPostRequest_inggris() {
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = '<?php echo site_url('hukum/view_inggris'); ?>';

            var hiddenField1 = document.createElement('input');
            hiddenField1.type = 'hidden';
            hiddenField1.name = 'id';
            hiddenField1.value = <?= $detail->id; ?>;
            form.appendChild(hiddenField1);

            // var hiddenField2 = document.createElement('input');
            // hiddenField2.type = 'hidden';
            // hiddenField2.name = 'data2';
            // hiddenField2.value = 'value2';
            // form.appendChild(hiddenField2);

            document.body.appendChild(form);
            form.submit();
        }
    </script>

</section>