 <!-- Section Title -->
 <div class="container section-title aos-init aos-animate" data-aos="fade-up">

        <p>Berita Terbaru </p>
      
      </div>


<div class="container">

  <div class="row g-5">
    <div id="newsCarousel" class="carousel slide" data-bs-ride="carousel">
      <div >
        <div >
          <div class="row">

          
          <?php 
              $terbaru = $this->db->query("SELECT * FROM berita ORDER BY tanggal DESC LIMIT 4");
              echo "";
              foreach ($terbaru->result_array() as $row){
                $tanggaldetail = tgl_indo($row['tanggal']);
                $isi_berita = strip_tags($row['isi_berita']);
                $isi = substr($isi_berita, 0, 100);
                $isi = substr($isi_berita, 0, strrpos($isi, " "));

                if ($row['gambar'] == ''){ $fotodetail = 'small_no-image.jpg'; }else{ $fotodetail = $row['gambar']; }
                  echo "<div class='col-md-3'>
              <div class='card-3d'>
                <div class='card'>
                  <img src='".base_url()."asset/foto_berita/".$fotodetail."' class='card-img-top' alt='News 1'>
                  <div class='card-body'>
                  
                     <h5 class='card-title'>".$row['judul']."</h5>
                      <p class='card-text'>".$isi."</p>
               
                   <small class='date text-danger'><span class='glyphicon glyphicon-time'></span> $row[hari], $tanggaldetail, $row[jam] WIB</small></td>
                  <a href='".base_url()."berita/detail/$row[judul_seo]' class='btn btn-success btn-sm'>Baca Selengkapnya</a>
                  </div>
                </div>
              </div>
            </div>";
                }
            
            ?>
       
           
           
            

          </div>
        </div>

      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#newsCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#newsCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
     
    </div>
  
  </div>
 

 
  <style>
    .card-3d {
      perspective: 1000px;
      transform-style: preserve-3d;
    }

    .card-3d .card {
      transition: transform 0.5s ease-in-out;
      transform-origin: center;
      transform: rotateY(0deg);
    }

    .card-3d:hover .card {
      transform: rotateY(30deg) scale(1.05);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.25);
    }
  </style>
  </style>



</div>


<div class="container section-title aos-init aos-animate" data-aos="fade-up">
     <br>
  
     <a href="<?= site_url('berita') ?>"  class="btn btn-success btn-sm">Tampilkan Semua Berita</a>
      </div>
</div>







