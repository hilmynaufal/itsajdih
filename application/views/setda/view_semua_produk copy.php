
<div id="list" class="text-start px-3 px-sm-4 px-xl-5">
  <div class="wrapall pt-3 pt-sm-4 pb-4 pb-sm-5">
    <div class="row gy-4 gx-4 gx-xl-5">
          <!-- kolom group pencarian hukum -->
      <div class="col col-12 col-lg-8">
        <!-- <div class="text-135 fs-4 fw-600 fst-italic text-uppercase oswald m-0 p-0 lh-1 mb-3 mb-lg-4">Pencarian Produk Hukum</div> -->
        <div class="d-flex flex-column gap-1 gap-lg-2">
      <?PHP  echo "<p class='sidebar-title'><span class='glyphicon glyphicon-list'></span> &nbsp; $title</p><hr>";
                $no = 1;
                // var_dump($produk_dprd) or die();
                foreach ($produk->result_array() as $row){

                 
                    $isi_berita = strip_tags($row['id']);
                    // $isi = substr($isi_berita,0,100);
                    // $isi = substr($isi_berita,0,strrpos($isi," "));
                    $tanggal = tgl_indo($row['tanggal_ditetapkan']);
                    // if ($row['gambar'] == ''){ $foto = 'small_no-image.jpg'; }else{ $foto = $row['gambar']; }
                    echo "<a class='d-flex border rounded bg-white align-items-center link-dark lh-1 gap-1 gap-lg-2 gap-xl-3 p-2 p-lg-3' href='".base_url() ."hukum/detail_hukum/$row[id]' title='Klik untuk detail'>
                    <span class='bi bi-award fs-1 text-135'></span>
                    <span class='d-flex flex-column gap-1 gap-xl-2'>
                      <span class='fw-400 fs-5 pb-1'>".ucfirst($row["jenis_keterangan"])."</span>
                      <span class='small lh-sm'>".ucfirst($row["nama"])."</span>
                      <span class='small'>Status: Berlaku</span>
                      <span class='small'>
                        <span class='small text-secondary'>Dilihat: 1 | Diunduh: 9</span>
                      </span>
                    </span>
                  </a>";
                        if ($no % 3 == 0){
                           
                        }
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
      <div class="col col-12 col-lg-4">
        <div class="row gy-4">
          <div class="col col-12 col-sm-6 col-lg-12">
            <div id="mod_tahun">
              <div class="text-135 fs-5 fw-500 fst-italic text-uppercase oswald mb-2 mb-md-3">Kategori Produk Hukum</div>
              <div class="d-flex flex-column gap-1">
              <?php include "group_hukum.php"; ?>
                
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>