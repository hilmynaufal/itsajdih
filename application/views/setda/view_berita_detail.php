<div class="page-title aos-init aos-animate" data-aos="fade">
      <div class="container d-lg-flex justify-content-between align-items-center">
      
        <!-- <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Beranda</a></li>
            <li class="current">Berita</li>
          </ol>
        </nav> -->
      </div>
    </div>
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
<!-- End Services List -->

<div class="help-box d-flex flex-column justify-content-center align-items-center">
  <i class="bi bi-headset help-icon"></i>
   <a href="https://tawk.to/chat/6641c6c607f59932ab3edaa5/1htof0ufb" target="_blank"><h4>Pertanyaan Bisa langsung Chat ?</h4></a>
  <!-- <p class="d-flex align-items-center mt-2 mb-0"><i class="bi bi-telephone me-2"></i> <span>+1 5589 55488 55</span></p>
  <p class="d-flex align-items-center mt-1 mb-0"><i class="bi bi-envelope me-2"></i> <a href="https://tawk.to/chat/6641c6c607f59932ab3edaa5/1htof0ufb">Bertanya Disini</a></p> -->
</div>
          </div>

          <div class="col-lg-8 ps-lg-5 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
          <?php
$tanggal = tgl_indo($record['tanggal']);
echo "<p class='sidebar-title'><span class='glyphicon glyphicon-volume-up'></span> $record[judul]</p>
    <small class='date'><span class='glyphicon glyphicon-time'></span> $record[hari], $tanggal, $record[jam] WIB, $record[dibaca] View</small>
    <small class='date pull-right'><span class='glyphicon glyphicon-user'></span> $record[nama_lengkap]</small><hr>
<div class='col-md-12'>";
    if ($record['gambar'] != ''){
        echo "<img class='pull-left img-thumbnail' style='margin-right:7px' src='".base_url()."asset/foto_berita/".$record['gambar']."'>";
    }
    echo "<p>$record[isi_berita]</p>
</div><div style='clear:both'><br></div>";
echo "<p class='sidebar-title'><span class='glyphicon glyphicon-list'></span> &nbsp; Berita Terkait</p><hr>";
echo"<div class='container'>

<div class='row mt-4'>";
$no = 1;

foreach ($infoterkait->result_array() as $row){
    $isi_berita = strip_tags($row['isi_berita']); 
    $isi = substr($isi_berita,0,150); 
    $isi = substr($isi_berita,0,strrpos($isi," "));
    $tanggal = tgl_indo($row['tanggal']);
    if ($row['gambar'] == ''){ $foto = 'small_no-image.jpg'; }else{ $foto = $row['gambar']; }


    echo "<div class='col-md-4'>
        <div class='card mb-2'>
        <img width='100%' style='max-height:130px' src='".base_url()."asset/foto_berita/".$foto."'>
          <div class='card-body'>
            
            <p class='card-text'>".$row['judul'].".</p>
            <a href='".base_url()."berita/detail/$row[judul_seo]' class='btn btn-secondary'>Baca Selengkapnya</a>
           
          </div>
        </div>
      </div>";
     
     
   



  
    $no++;
}
echo " </div>
</div>";


?>



          </div>

        </div>

      </div>

    </section>