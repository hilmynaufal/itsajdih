<section id="more-features" class="more-features section">
  <div class="container">
    <div class="row gy-4 gx-4 gx-xl-5">
      <div class="col col-12 col-md-6">
        <div id="jdih-baru" class="d-flex flex-column">
          <div class="text-135 fs-4 fw-600 fst-italic text-uppercase oswald m-0 p-0 lh-1 mb-3 mb-lg-4">Produk Hukum Terbaru</div>
          <div class="d-flex flex-column gap-1 gap-lg-2">

<?PHP
$hk_kategori = $this->model_utama->hukum_kategori(0, 2);
          foreach ($hk_kategori->result_array() as $rows) {
          
   // $hukum2 = $this->model_utama->hukum_perkategori($rows['jenis_id'], 0, 1);


    $n1 = 1;
   // foreach ($hk_kategori->result_array() as $rows) {
    // echo "<a class='d-flex border rounded bg-white align-items-center link-dark lh-1 gap-1 gap-lg-2 gap-xl-3 p-2 p-lg-3' href='".base_url() ."hukum/detail_hukum/$rows[id]' title='Klik untuk detail'>
    //                 <span class='bi bi-award fs-1 text-135'></span>
    //                 <span class='d-flex flex-column gap-1 gap-xl-2'>
    //                   <span class='fw-400 fs-5 pb-1'>".toUpperCase($rows["jenis_nama"])." NOMOR ".toUpperCase($rows["no"])." TAHUN ".toUpperCase($rows["tahun"])."</span>
    //                   <span class='small lh-sm'>".toUpperCase($rows["jenis_nama"].' NOMOR '.$rows["no"].' Tahun '.$rows["tahun"].' TENTANG '.$rows["nama"])."</span>
    //                   <span class='small'>Status: Berlaku</span>
                     
    //                 </span>
    //                 </a>
    //                 <span class='small'>
    //                 <span class='small text-secondary'>Dilihat: <small>$rows[dibaca]</small> | Diunduh: <a href='".base_url()."hukum/download/$rows[id]' class='link-secondary'><small>$rows[didownload]</small> </a></span>
    //               </span>";
  
    echo "<a class='d-flex border rounded bg-white align-items-center link-dark lh-1 gap-1 gap-lg-2 gap-xl-3 p-2 p-lg-3' 
        href='".base_url()."hukum/detail_hukum/$rows[id]' 
        title='Klik untuk detail'>

        <span class='bi bi-award fs-1 text-135'></span>

        <span class='d-flex flex-column gap-1 gap-xl-2'>
          <span class='fw-400 fs-5 pb-1'>"
            .ucwords(strtolower($rows["jenis_nama"]))." Nomor "
            .$rows["no"]." Tahun "
            .$rows["tahun"]."
          </span>

          <span class='small lh-sm'>"
            .ucwords(strtolower($rows["jenis_nama"]))." Nomor "
            .$rows["no"]." Tahun "
            .$rows["tahun"]." Tentang "
            .ucwords(strtolower($rows["nama"]))."
          </span>

          <span class='small'>Status: Berlaku</span>
        </span>
      </a>

      <span class='small'>
        <span class='small text-secondary'>
          Dilihat: <small>$rows[dibaca]</small> | 
          Diunduh: <a href='".base_url()."hukum/download/$rows[id]' class='link-secondary'>
            <small>$rows[didownload]</small>
          </a>
        </span>
      </span>";


       

    }

    $n1++;

?>

         
            
          </div>
        </div>
      </div>
      <div class="col col-12 col-md-6">
        <div id="jdih-populer" class="d-flex flex-column">
          <div class="text-135 fs-4 fw-600 fst-italic text-uppercase oswald m-0 p-0 lh-1 mb-3 mb-lg-4">Produk Hukum Terpopuler</div>
          <div class="d-flex flex-column gap-1 gap-lg-2">
          <?PHP
$hk_kategori = $this->model_utama->hukum_populer(0, 2);
          foreach ($hk_kategori->result_array() as $rows) {
          
   // $hukum2 = $this->model_utama->hukum_perkategori($rows['jenis_id'], 0, 1);

    $n1 = 1;
   // foreach ($hk_kategori->result_array() as $rows) {
    //     echo " <a class='d-flex border rounded bg-white align-items-center link-dark lh-1 gap-1 gap-lg-2 gap-xl-3 p-2 p-lg-3' href='".base_url() ."hukum/detail_hukum/$rows[id]' >
    //     <span class='bi bi-award fs-1 text-135'></span>
    //     <span class='d-flex flex-column gap-1 gap-xl-2'>
    //    <span class='fw-400 fs-5 pb-1'>".toUpperCase($rows["jenis_nama"])." NOMOR ".ucfirst($rows["no"])." TAHUN ".toUpperCase($rows["tahun"])."</span>
    //      <span class='small lh-sm'>".toUpperCase($rows["jenis_nama"].' NOMOR '.$rows["no"].' TAHUN '.$rows["tahun"].' TENTANG '.$rows["nama"])."</span>
                    
    //     <span class='small'>Status: Berlaku</span>
          
    //     </span>
    //   </a>
    //   <span class='small'>
    //   <span class='small text-secondary'>Dilihat: <small>$rows[dibaca]</small> | Diunduh: <small>$rows[didownload]</small></span>
    // </span>";

    echo " <a class='d-flex border rounded bg-white align-items-center link-dark lh-1 gap-1 gap-lg-2 gap-xl-3 p-2 p-lg-3' 
        href='".base_url() ."hukum/detail_hukum/$rows[id]' >
        <span class='bi bi-award fs-1 text-135'></span>
        <span class='d-flex flex-column gap-1 gap-xl-2'>

          <span class='fw-400 fs-5 pb-1'>"
            .ucwords(strtolower($rows["jenis_nama"]))." Nomor "
            .$rows["no"]." Tahun "
            .$rows["tahun"]."
          </span>

          <span class='small lh-sm'>"
            .ucwords(strtolower($rows["jenis_nama"]))." Nomor "
            .$rows["no"]." Tahun "
            .$rows["tahun"]." Tentang "
            .ucwords(strtolower($rows["nama"]))."
          </span>

          <span class='small'>Status: Berlaku</span>

        </span>
      </a>

      <span class='small'>
        <span class='small text-secondary'>
          Dilihat: <small>$rows[dibaca]</small> | 
          Diunduh: <small>$rows[didownload]</small>
        </span>
      </span>";

       

    }

    $n1++;

?>
          
          
          </div>
        </div>
      </div>
     
    
    </div>
  </div>
</section>
<!-- /More Features Section -->