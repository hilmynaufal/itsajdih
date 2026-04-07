    <div id="custom_carousel" class="carousel slide" data-ride="carousel" data-interval="2500">
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <?php 
              $headline = $this->model_utama->headline(0, 5);
              $no = 1;
              foreach ($headline->result_array() as $row){
                  $isi_berita = strip_tags($row['isi_berita']); 
                  $isi = substr($isi_berita,0,700); 
                  $isi = substr($isi_berita,0,strrpos($isi," "));
                  $tanggal = tgl_indo($row['tanggal']);
                  if ($row['gambar'] == ''){ $foto = 'small_no-image.jpg'; }else{ $foto = $row['gambar']; }
                  if ($no == 1){ $aktif = 'active'; }else{ $aktif = ''; }
                echo "<div class='item $aktif'>
                          <div class='container-fluid'>
                              <div class='row'>
                                  <div class='col-md-3'><img class='img-thumbnail' src='".base_url()."asset/foto_berita/".$foto."' class='img-responsive'></div>
                                  <div class='col-md-9'>
                                      <h3><a href='".base_url()."berita/detail/$row[judul_seo]'>$row[judul]</a></h3>
                                      <p>$isi... <a href='".base_url()."berita/detail/$row[judul_seo]'><span class='btn btn-warning btn-xs'><small>Baca Selanjutnya</small></span></a></p>
                                  </div>
                              </div>
                          </div>            
                      </div> ";
                  $no++;
              }
            ?>
        <!-- End Item -->
        </div>
        <!-- Controls -->
  <a class="left carousel-control" href="#custom_carousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#custom_carousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
    </div>
