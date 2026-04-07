            <div id='sidebar-box'>
              <ul class="nav nav-tabs" id="myTabs" role="tablist"> 
                <li role="presentation" class="active"><a href="#terpopuler" id="terpopuler-tab" role="tab" data-toggle="tab" aria-controls="terpopuler" aria-expanded="true">Terpopuler</a></li> 
                <li role="presentation" class=""><a href="#terkini" role="tab" id="terkini-tab" data-toggle="tab" aria-controls="terkini" aria-expanded="false">Terkini</a></li> 
                <li role="presentation" class=""><a href="#terkomentar" role="tab" id="terkomentar-tab" data-toggle="tab" aria-controls="terkomentar" aria-expanded="false">Terkomentar</a></li> 
              </ul> 

              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active in" role="tabpanel" id="terpopuler" aria-labelledby="terpopuler-tab"> 
                  <?php 
                    $terbaru = $this->db->query("SELECT * FROM berita ORDER BY dibaca DESC LIMIT 5");
                    echo "<table class='table table-hovered table-condensed table-striped'>";
                    foreach ($terbaru->result_array() as $row){
                      $tanggaldetail = tgl_indo($row['tanggal']);
                      if ($row['gambar'] == ''){ $fotodetail = 'small_no-image.jpg'; }else{ $fotodetail = $row['gambar']; }
                        echo "<tr>
                                <td><img class='img-thumbnail pull-left' width='80px' style='margin-right:6px; height:60px' src='".base_url()."asset/foto_berita/".$fotodetail."'>
                                    <a href='".base_url()."berita/detail/$row[judul_seo]'>".$row['judul']."</a> 
                                    <span class='btn btn-danger btn-xs'><small>$row[dibaca] View</small></span><br>
                                    <small class='date text-danger'><span class='glyphicon glyphicon-time'></span> $row[hari], $tanggaldetail, $row[jam] WIB</small></td>
                              </tr>";
                      }
                  echo "</table>";
                  ?>
                </div> 

                <div class="tab-pane fade" role="tabpanel" id="terkini" aria-labelledby="terkini-tab"> 
                  <?php 
                    $terkini = $this->db->query("SELECT * FROM berita ORDER BY id_berita DESC LIMIT 5");
                    echo "<table class='table table-hovered table-condensed table-striped'>";
                    foreach ($terkini->result_array() as $row){
                      $tanggaldetail = tgl_indo($row['tanggal']);
                      if ($row['gambar'] == ''){ $fotodetail = 'small_no-image.jpg'; }else{ $fotodetail = $row['gambar']; }
                        echo "<tr>
                                <td><img class='img-thumbnail pull-left' width='80px' style='margin-right:6px; height:60px' src='".base_url()."asset/foto_berita/".$fotodetail."'>
                                    <a href='".base_url()."berita/detail/$row[judul_seo]'>".$row['judul']."</a> 
                                    <span class='btn btn-danger btn-xs'><small>$row[dibaca] View</small></span><br>
                                    <small class='date text-danger'><span class='glyphicon glyphicon-time'></span> $row[hari], $tanggaldetail, $row[jam] WIB</small></td>
                              </tr>";
                      }
                  echo "</table>";
                  ?>
                </div>

                <div class="tab-pane fade" role="tabpanel" id="terkomentar" aria-labelledby="terkomentar-tab"> 
                  <?php 
                    $terkomentar = $this->db->query("SELECT * FROM berita,komentar 
                                         WHERE komentar.id_berita=berita.id_berita  
                                         ORDER BY id_komentar DESC LIMIT 5");
                    echo "<table class='table table-hovered table-condensed table-striped'>";
                    foreach ($terkomentar->result_array() as $row){
                      $tanggaldetail = tgl_indo($row['tanggal']);
                      if ($row['gambar'] == ''){ $fotodetail = 'small_no-image.jpg'; }else{ $fotodetail = $row['gambar']; }
                        echo "<tr>
                                <td><img class='img-thumbnail pull-left' width='80px' style='margin-right:6px; height:60px' src='".base_url()."asset/foto_berita/".$fotodetail."'>
                                    <a href='".base_url()."berita/detail/$row[judul_seo]'><b>$row[nama_komentar]</b></a>  pada 
                                    <a href='".base_url()."berita/detail/$row[judul_seo]'>".$row['judul']."</a> 
                                    <span class='btn btn-danger btn-xs'><small>$row[dibaca] View</small></span><br>
                                    <small class='date text-danger'><span class='glyphicon glyphicon-time'></span> $row[hari], $tanggaldetail, $row[jam] WIB</small></td>
                              </tr>";
                      }
                  echo "</table>";
                  ?>
                </div>
              </div> 
            </div>

            <hr>
             <div class="single-sidebar-widget">
            <h6 style='background-color:#dff0d8'  class="widget-title">Sekilas Info</h6>	
            <div id='sidebar-box'>
            <!--<p class='sidebar-title'><span class='glyphicon glyphicon-list-alt'></span> &nbsp; Sekilas Info</p>-->
            <marquee style="height:150px;" scrollamount="2" scrolldelay="90" direction="down" onmouseover="this.stop()" onmouseout="this.start()">
              <?php
                $pengumuman = $this->model_utama->pengumuman(0, 5); 
                foreach ($pengumuman->result_array() as $rows){
                  if ($rows['gambar'] == ''){ $fotoinfo = 'small_no-image.jpg'; }else{ $fotoinfo = $rows['gambar']; }
                  echo "<img class='img-thumbnail pull-left' width='80px' style='margin-right:6px; height:70px' src='".base_url()."asset/foto_info/".$fotoinfo."'>
                        $rows[info]<hr><div style='clear:both'></div>";
                }
              ?>
            </marquee>
            </div>
             </div>
                <div class="single-sidebar-widget">
            <h6 style='background-color:#dff0d8'  class="widget-title">&nbsp; Statistik User</h6>
            <div id='sidebar-box'>
            <!--<p class='sidebar-title'><span class='glyphicon glyphicon-paperclip'></span> &nbsp; Statistik User</p>-->
            <ul class="list-group">
              <?php 
                  $pengunjung       = $this->model_utama->pengunjung()->num_rows();
                  $totalpengunjung  = $this->model_utama->totalpengunjung()->row_array();
                  $hits             = $this->model_utama->hits()->row_array();
                  $totalhits        = $this->model_utama->totalhits()->row_array();
                  $pengunjungonline = $this->model_utama->pengunjungonline()->num_rows();
                  echo "<li class='list-group-item'>User Online <span class='badge'>$pengunjungonline</span></li>
                        <li class='list-group-item'>Today Visitor <span class='badge'>$pengunjung</span></li>
                        <li class='list-group-item'>Hits hari ini  <span class='badge'>$hits[total]</span></li>
                        <li class='list-group-item'>Total Hits <span class='badge'>$totalhits[total]</span></li>
                        <li style='background-color:#dff0d8' class='list-group-item alert'>Total pengunjung <span class='badge'>$totalpengunjung[total]</span></li>";
              ?>
            </ul>
            </div>
 <div class="single-sidebar-widget">
            <h6 style='background-color:#dff0d8'  class="widget-title">&nbsp; Polling</h6>
            <div id='sidebar-box'>
            <?php
              $qpoling = $this->model_utama->cek_poling()->num_rows();
              if ($qpoling > 0){
                // echo "<p class='sidebar-title'><span class='glyphicon glyphicon-list'></span> &nbsp; Polling</p>";
                $row = $this->model_utama->pertanyaan()->row_array();
                echo form_open('polling/index'); 
                echo "<div class='panel panel-default'>
                        <div  style='background-color:#e3e3e3' class='panel-body'>
                          <b>$row[pilihan]</b>
                        </div>";

                  echo "<table class='table table-condensed'>";
                          $jawaban = $this->model_utama->jawaban();
                          foreach ($jawaban->result_array() as $rows){
                            echo "<tr><td><input type=radio name=pilihan value='$rows[id_poling]'/> $rows[pilihan]</td></tr>";
                          }
                  echo "</table>
                      </div>
                        <input class='btn btn-warning btn-xs btn-block' type=submit value='Kirimkan Pilihan'>";
                      echo form_close();
                      echo "<a class='btn btn-danger btn-xs btn-block' style='margin-top:2px' href='".base_url()."polling/hasil'>Lihat Hasil Poling</a></p>";
              }
            ?>
            </div>
                </div>
                </div>
            <div class="single-sidebar-widget">
            <h6 style='background-color:#dff0d8'  class="widget-title">Link Terkait</h6>					
            <div id='sidebar-box'>
            <?php
              //  echo "<p style='background-color:#dff0d8' class='sidebar-title' > &nbsp; Link Terkait </p>";
                $banner = $this->model_utama->banner(0,5); 
                foreach ($banner->result_array() as $rows){
                  if ($rows['gambar']==''){
                    if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $rows['url'], $match)) {
                      echo "<iframe id='ytplayer' type='text/html'
                          src='https://www.youtube.com/embed/".$match[1]."?rel=0&showinfo=1&color=white&iv_load_policy=3'
                          frameborder='0' allowfullscreen></iframe>";
                    }
                  }else{
                      echo "<ul  >"; 
                 echo "<li class='list-group-item' align='left' >
                    <a target='_blank' rel='noopener noreferrer'  href='$rows[url]'><img sclass='img-thumbnail'  src='".base_url()."asset/foto_banner/$rows[gambar]'><small>&nbsp;  $rows[url]</small></a></li>";
                      echo "</ul>"; 
                  }
                }
            ?>
            </div>
            </div>