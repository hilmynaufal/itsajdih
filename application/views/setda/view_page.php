

<section id="service-details" class="service-details section">

<div class="container">

  <div class="row gy-5">

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
                  $pengunjung       = $this->model_utama->pengunjung()->num_rows();
                  $totalpengunjung  = $this->model_utama->totalpengunjung()->row_array();
                  $hits             = $this->model_utama->hits()->row_array();
                  $totalhits        = $this->model_utama->totalhits()->row_array();
                  $pengunjungonline = $this->model_utama->pengunjungonline()->num_rows();

                  echo "<li class='download-catalog'>User Online &nbsp<span>$pengunjungonline</span></li>
                        <li class='download-catalog'>Today Visitor &nbsp<span>$pengunjung</span></li>
                     
                        <li class='download-catalog'>Total pengunjung  &nbsp<span>$totalpengunjung[total]</span></li>";
              ?>
            </ul>
  </div>
</div>

<div class="help-box d-flex flex-column justify-content-center align-items-center">
  <i class="bi bi-headset help-icon"></i>
   <a href="https://tawk.to/chat/6641c6c607f59932ab3edaa5/1htof0ufb" target="_blank"><h4>Pertanyaan Bisa langsung Chat ?</h4></a>
  <!-- <p class="d-flex align-items-center mt-2 mb-0"><i class="bi bi-telephone me-2"></i> <span>+1 5589 55488 55</span></p>
  <p class="d-flex align-items-center mt-1 mb-0"><i class="bi bi-envelope me-2"></i> <a href="https://tawk.to/chat/6641c6c607f59932ab3edaa5/1htof0ufb">Bertanya Disini</a></p> -->
</div>

    </div>

    <div class="col-lg-8 ps-lg-5 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
      <img src="assets/img/services.jpg" alt="" class="img-fluid services-img">
      <!-- <h3>Temporibus et in vero dicta aut eius lidero plastis trand lined voluptas dolorem ut voluptas</h3>
      <p>
        Blanditiis voluptate odit ex error ea sed officiis deserunt. Cupiditate non consequatur et doloremque consequuntur. Accusantium labore reprehenderit error temporibus saepe perferendis fuga doloribus vero. Qui omnis quo sit. Dolorem architecto eum et quos deleniti officia qui.
      </p> -->
      <?php



$directory = './asset/foto_banner/'.$record['gambar']; // Ganti dengan direktori Anda
$file_gambar=base_url().'asset/foto_banner/'.$record['gambar'];

if (file_exists($directory)) {
  $mimeType = mime_content_type($directory);

  if ($mimeType === 'application/pdf') {
 echo "<iframe src=".base_url().'asset/foto_banner/'.$record['gambar']." width='100%' height='600px'></iframe>";
  
  } elseif ($mimeType === 'image/jpg') {
    $tanggal = tgl_indo($record['tgl_posting']);
    echo "<p class='sidebar-title'><span class='glyphicon glyphicon-volume-up'></span> $record[judul]</p><hr>
            <div class='col-md-12'>";
            echo "<img width='100%' src='".base_url()."asset/foto_banner/".$record['gambar']."'>";
                echo "<p>$record[isi_halaman]</p>
            </div><div style='clear:both'><br></div>";
  } 
  elseif ($mimeType === 'image/png') {
    $tanggal = tgl_indo($record['tgl_posting']);
    echo "<p class='sidebar-title'><span class='glyphicon glyphicon-volume-up'></span> $record[judul]</p><hr>
            <div class='col-md-12'>";
            echo "<img width='100%' src='".base_url()."asset/foto_banner/".$record['gambar']."'>";
                echo "<p>$record[isi_halaman]</p>
            </div><div style='clear:both'><br></div>";
  } 
  
  
  
  
  
  
  
  else {
    $tanggal = tgl_indo($record['tgl_posting']);
    echo "<p class='sidebar-title'> $record[judul]</p><hr>
            <div class='col-md-12'>";
          
                echo "<p>$record[isi_halaman]</p>
            </div><div style='clear:both'><br></div>";
  }
} else {
  echo "Not Found Information";
}

        
           
          ?>
  
    </div>

  </div>

</div>

</section>
