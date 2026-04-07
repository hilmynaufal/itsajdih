<?php
            echo "<p class='sidebar-title'><span class='glyphicon glyphicon-list'></span> &nbsp; Berita : $title</p><hr>";
                $no = 1;
                foreach ($kategori->result_array() as $row){
                    $isi_berita = strip_tags($row['isi_berita']); 
                    $isi = substr($isi_berita,0,100); 
                    $isi = substr($isi_berita,0,strrpos($isi," "));
                    $tanggal = tgl_indo($row['tanggal']);
                    if ($row['gambar'] == ''){ $foto = 'small_no-image.jpg'; }else{ $foto = $row['gambar']; }
                    echo "<div class='col-md-4'>
                            <small class='date pull-right'><span class='glyphicon glyphicon-time'></span> $row[hari], $tanggal</small>
                            <img width='100%' style='max-height:130px' src='".base_url()."asset/foto_berita/".$foto."'>
                            <a href='".base_url()."berita/detail/$row[judul_seo]'>".$row['judul']."</a>

                        </div>";
                        if ($no % 3 == 0){
                            echo "<div style='clear:both'><hr></div>";
                        }
                    $no++;
                }
            ?>
            <div style="clear:both"></div>
            <?php echo $this->pagination->create_links(); ?>
			
<section id="service-details" class="service-details section">

  <div id="list" class="text-start px-3 px-sm-4 px-xl-5">
    <div class="wrapall pt-3 pt-sm-4 pb-4 pb-sm-5">
      <div class="row gy-4 gx-4 gx-xl-5">
        <!-- kolom group pencarian hukum -->
        <div class="col col-12 col-lg-8">
          <!-- <div class="text-135 fs-4 fw-600 fst-italic text-uppercase oswald m-0 p-0 lh-1 mb-3 mb-lg-4">Pencarian Produk Hukum</div> -->
          <h3>Berita Kabupaten Bandung</h3>
        <p>
        Berita terbaru dari Sekretariat Dewan Perwakilan Rakyat Daerah Kabupaten Bandung
        </p>
          <div class="container mt-4">


            <div class="row row-cols-1 row-cols-md-3 g-2">
              <!-- Berita 1 -->


              <?php
          
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
              echo "<div class='col'>
                <div class='card h-100'>
                    <img src='".base_url()."asset/foto_berita/".$foto."' class='card-img-top' alt='Berita 1'>
                    
                    <div class='card-body'>
                    <span class='small'><span class='small text-success'></span>".$tanggal."</span>
                        <h5 class='card-title'>".$row['judul']."</h5>
                        <p >$isi.</p>
                        
                    </div>
                    <div class='card-footer text-center'>
                        <a href='".base_url()."berita/detail/$row[judul_seo]' class='btn btn-secondary'>Baca Selengkapnya</a>
                        
                    </div>

                </div>
            </div>";
             
              $no++;
            }
            ?>
           




             


            </div>
          </div>
          <?php echo $this->pagination->create_links(); ?>
          <!-- Bootstrap JS -->
        

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

