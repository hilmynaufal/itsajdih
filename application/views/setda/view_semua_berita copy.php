<section id="service-details" class="service-details section">


  <div id="list" class="text-start px-3 px-sm-4 px-xl-5">
    <div class="wrapall pt-3 pt-sm-4 pb-4 pb-sm-5">
      <div class="row gy-4 gx-4 gx-xl-5">
        <!-- kolom group pencarian hukum -->
        <div class="col col-12 col-lg-8">
          <!-- <div class="text-135 fs-4 fw-600 fst-italic text-uppercase oswald m-0 p-0 lh-1 mb-3 mb-lg-4">Pencarian Produk Hukum</div> -->
          <div class="d-flex flex-column gap-1 gap-lg-2">
          <?php echo $this->pagination->create_links(); ?>


            <?php
            echo "<p class='sidebar-title'><span class='glyphicon glyphicon-list'></span> &nbsp; $title</p><hr>";
            $no = 1;
            foreach ($berita->result_array() as $row) {
              $isi_berita = strip_tags($row['isi_berita']);
              $isi = substr($isi_berita, 0, 100);
              $isi = substr($isi_berita, 0, strrpos($isi, " "));
              $tanggal = tgl_indo($row['tanggal']);
              if ($row['gambar'] == '') {
                $foto = 'small_no-image.jpg';
              } else {
                $foto = $row['gambar'];
              } 
              echo "   <a class='d-flex border rounded bg-white align-items-top text-dark' href=''".base_url()."berita/detail/$row[judul_seo]'>
    <span class='imej ratio ratio-4x3 w-25'><img class='object-fit-cover rounded' alt='pu-nas-dem-5-raperda.jpeg' src='".base_url()."asset/foto_berita/".$foto."' style='width:150px'></span>
    <span class='teks p-3 d-flex flex-column gap-2'>
                <span class='fs-5 fw-500'>".$row['judul']."</span>
        <span class='small'><span class='small text-success'></span>".$tanggal."</span>
        <span class='small d-none d-sm-block'>HumasDPRD– Dalam Rapat Paripurna di Gedung DPRD Kota Bandung, Rabu, 6 November 2024, Fraksi Gabungan Partai NasDem-Partai Demokrat (Nasional-Demokrat) menyampaikan ...</span>    </span>
</a> ";
              if ($no % 3 == 0) {
                echo "<div style='clear:both'><hr></div>";
              }
              $no++;
            }
            ?>
            <div style="clear:both"></div>
            
            



            <!-- 
          <a class="d-flex border rounded bg-white align-items-center link-dark lh-1 gap-1 gap-lg-2 gap-xl-3 p-2 p-lg-3" href="https://jdih.dprd.bandung.go.id/dokumen/kepsekdprd/2024/25" title="Klik untuk detail">
            <span class="bi bi-award fs-1 text-135"></span>
            <span class="d-flex flex-column gap-1 gap-xl-2">
              <span class="fw-400 fs-5 pb-1">Keputusan Sekretaris Dewan Perwakilan Rakyat Daerah Kota Bandung Nomor 25 Tahun 2024</span>
              <span class="small lh-sm">Keputusan Sekretaris Dprd Kota Bandung Nomor: Kp.12.02/025-Setwan/Ii/2024 tentang Pentepatan Indikator Kinerja Utama di Lingkungan Sekretariat Dewan Perwakilan Rakyat Daerah Kota Bandung</span>
              <span class="small">Status: Berlaku</span>
              <span class="small">
                <span class="small text-secondary">Dilihat: 47 | Diunduh: 9</span>
              </span>
            </span>
          </a> -->





          </div>


        </div>

        <!-- kolom group produk hukum -->
        <div class="col-lg-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">

          <div class="service-box">
            <h4>Kategori Produk Hukum</h4>

            <?php include "group_hukum.php"; ?>

          </div><!-- End Services List -->

          <div class="service-box">
            <h4>STATISTIK</h4>
            <div class="download-catalog">
              <!-- <a href="#"><i class="bi bi-filetype-pdf"></i><span>Catalog PDF</span></a>
    <a href="#"><i class="bi bi-file-earmark-word"></i><span>Catalog DOC</span></a> -->
              <ul>
                <?php
                $pengunjung = $this->model_utama->pengunjung()->num_rows();
                $totalpengunjung = $this->model_utama->totalpengunjung()->row_array();
                $hits = $this->model_utama->hits()->row_array();
                $totalhits = $this->model_utama->totalhits()->row_array();
                $pengunjungonline = $this->model_utama->pengunjungonline()->num_rows();

                echo "<li class='download-catalog'>User Online &nbsp<span>$pengunjungonline</span></li>
                        <li class='download-catalog'>Today Visitor &nbsp<span>$pengunjung</span></li>
                        <li class='download-catalog'>Hits hari ini &nbsp  <span>$hits[total]</span></li>
                        <li class='download-catalog'>Total Hits &nbsp<span>$totalhits[total]</span></li>
                        <li class='download-catalog'>Total pengunjung  &nbsp<span>$totalpengunjung[total]</span></li>";
                ?>
              </ul>
            </div>
          </div>
          <!-- End Services List -->

          <div class="help-box d-flex flex-column justify-content-center align-items-center">
            <i class="bi bi-headset help-icon"></i>
            <a href="https://tawk.to/chat/6641c6c607f59932ab3edaa5/1htof0ufb" target="_blank">
              <h4>Pertanyaan Bisa langsung Chat ?</h4>
            </a>
            <!-- <p class="d-flex align-items-center mt-2 mb-0"><i class="bi bi-telephone me-2"></i> <span>+1 5589 55488 55</span></p>
  <p class="d-flex align-items-center mt-1 mb-0"><i class="bi bi-envelope me-2"></i> <a href="https://tawk.to/chat/6641c6c607f59932ab3edaa5/1htof0ufb">Bertanya Disini</a></p> -->
          </div>

        </div>
      </div>
    </div>
  </div>
</section>