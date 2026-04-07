<section id="service-details" class="service-details section">


  <div id="list" class="text-start px-3 px-sm-4 px-xl-5">
    <div class="wrapall pt-3 pt-sm-4 pb-4 pb-sm-5">
      <div class="row gy-4 gx-4 gx-xl-5">
        <!-- kolom group pencarian hukum -->
        <div class="col col-12 col-lg-8">
          <!-- <div class="text-135 fs-4 fw-600 fst-italic text-uppercase oswald m-0 p-0 lh-1 mb-3 mb-lg-4">Pencarian Produk Hukum</div> -->
          <div class="d-flex flex-column gap-1 gap-lg-2">
            <?PHP echo "<p class='sidebar-title'><span class='glyphicon glyphicon-list'></span> Relaas&nbsp;</p>";

            $no = $this->uri->segment(3) + 1;
            foreach ($relaas->result_array() as $r) {
              if (($no % 2) == 0) {
                $warna = "#ffffff";
              } else {
                $warna = "#dcfbe2";
              }
              $tgl = tgl_indo($r['tgl_pengumuman']);

              echo "<a class='d-flex border rounded bg-white align-items-center link-dark lh-1 gap-1 gap-lg-2 gap-xl-3 p-2 p-lg-3' href='" . base_url() . "download/detail_download/$r[id_relaas]' title='Klik untuk detail'>
          
                    <span class='bi bi-award fs-1 text-135'>
                 
                    </span>
                    <span class='d-flex flex-column gap-1 gap-xl-2'>
                    <table  class='small text-secondary' >
                            <tbody class='small text-secondary'>
                             <tr>
                                    <td >Relaas</td>
                                    <td >:<a href='" . base_url() . "download/detail_download/$r[id_relaas]'>$r[no_perkara]</a></td>
                                </tr>
                               
                                <tr>
                                    <td >Pengadilan</td>
                                    <td >: $r[pengadilan]</td>
                                </tr>
                                <tr>
                                    <td>Penggugat</td>
                                    <td >:$r[penggugat]</td>
                                </tr>
                                 <tr>
                                    <td>Tergugat</td>
                                    <td >:$r[tergugat]</td>
                                </tr>
                                <tr>
                                    <td >Dokumen Pendukung</td>
                                    <td>

                                        <a class='btn btn-outline-success btn-sm' href='" . base_url() . "asset/relaas/$r[berkas]'><span class='glyphicon glyphicon-download-alt'></span> Download</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                     
                      <span class='small'>
                     
                      </span>
                    </span>
                  </a>";

              $no++;
            }
            ?>

<nav aria-label="Page navigation example">
  <ul class="pagination">
  <?php echo $this->pagination->create_links(); ?>
  </ul>
</nav>


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
                  $pengunjung       = $this->model_utama->pengunjung()->num_rows();
                  $totalpengunjung  = $this->model_utama->totalpengunjung()->row_array();
                  $hits             = $this->model_utama->hits()->row_array();
                  $totalhits        = $this->model_utama->totalhits()->row_array();
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