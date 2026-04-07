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
    echo "<a class='d-flex border rounded bg-white align-items-center link-dark lh-1 gap-1 gap-lg-2 gap-xl-3 p-2 p-lg-3' href='".base_url() ."hukum/detail_hukum/$rows[id]' title='Klik untuk detail'>
                    <span class='bi bi-award fs-1 text-135'></span>
                    <span class='d-flex flex-column gap-1 gap-xl-2'>
                      <span class='fw-400 fs-5 pb-1'>".ucfirst($rows["nama"])."</span>
                      <span class='small lh-sm'>".ucfirst($rows["nama"])."</span>
                      <span class='small'>Status: Berlaku</span>
                      <span class='small'>
                        <span class='small text-secondary'>Dilihat: 1 | Diunduh: 9</span>
                      </span>
                    </span>
                  </a>";
        echo " <form action=".base_url()."/hukum/detail_hukum/ method='post'><button name='id'  title='Preview'  value=".$rows['id']." class='btn btn-primary btn-xs' >
        Baca</button></form>";
       

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
$hk_kategori = $this->model_utama->hukum_kategori(0, 2);
          foreach ($hk_kategori->result_array() as $rows) {
          
   // $hukum2 = $this->model_utama->hukum_perkategori($rows['jenis_id'], 0, 1);

    $n1 = 1;
   // foreach ($hk_kategori->result_array() as $rows) {
        echo " <a class='d-flex border rounded bg-white align-items-center link-dark lh-1 gap-1 gap-lg-2 gap-xl-3 p-2 p-lg-3' href='".base_url() ."hukum/detail_hukum/$rows[id]' >
        <span class='bi bi-award fs-1 text-135'></span>
        <span class='d-flex flex-column gap-1 gap-xl-2'>
        <span class='fw-400 fs-5 pb-1'>".ucfirst($rows["jenis_nama"])."</span>
        <span class='small lh-sm'>".ucfirst($rows["nama"])."</span>
        <span class='small'>Status: Berlaku</span>
        <span class='small'>
          <span class='small text-secondary'>Dilihat: 3 | Diunduh: 0</span>
        </span>   
        </span>
      </a>";
       

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