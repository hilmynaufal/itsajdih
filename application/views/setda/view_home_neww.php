<section id="more-features" class="more-features section">
      <div class="container my-4">
        <div class="row g-4">

          <!-- CARD KIRI -->
          <div class="col-12 col-md-6">
            <div class="jdih-box bg-white border rounded h-100">

              <!-- HEADER -->
              <div class="d-flex align-items-center fw-bold px-3 py-2 bg-secondary-subtle border-bottom rounded-top">
                <i class="bi bi-megaphone me-2"></i>
                PRODUK HUKUM TERBARU
              </div>

              <!-- BODY -->
              <div class="d-flex flex-column gap-2 p-3">
                <?php 
                  $hk_kategori = $this->model_utama->hukum_kategori(0, 2);
                    foreach ($hk_kategori->result_array() as $rows) {
                          $n1 = 1;
                          echo "
                            <a
                              href='".base_url()."hukum/detail_hukum/$rows[id]' title='Klik untuk detail'
                              class='jdih-item d-flex align-items-start gap-3 p-3 rounded border link-dark text-decoration-none' style='background-color: #c7e3cd91'
                            >
                              <span class='bi bi-award fs-3'></span>

                              <span class='d-flex flex-column gap-1'>
                                <span class='fw-400 fs-5 pb-1 fw-semibold'>"
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

                                <span class='small text-secondary mt-3'>
                                    Status: Berlaku |
                                    Dilihat: $rows[dibaca] |
                                    Diunduh: $rows[didownload]
                                </span>
                              </span>
                            </a>";
                      }
                    $n1++;
                  ?>
              </div>

            </div>
          </div>

          <!-- CARD KANAN -->
          <div class="col-12 col-md-6">
            <div class="jdih-box bg-white border rounded h-100">

              <!-- HEADER -->
              <div class="d-flex align-items-center fw-bold px-3 py-2 bg-secondary-subtle border-bottom rounded-top">
                <i class="bi bi-megaphone me-2"></i>
                PRODUK HUKUM TERPOPULER
              </div>

              <!-- BODY -->
              <div class="d-flex flex-column gap-2 p-3">
              <?php 
                  $hk_kategori = $this->model_utama->hukum_populer(0, 2);
                      foreach ($hk_kategori->result_array() as $rows) {
                          $n1 = 1;
                          echo "
                            <a
                              href='".base_url()."hukum/detail_hukum/$rows[id]' title='Klik untuk detail'
                              class='jdih-item d-flex align-items-start gap-3 p-3 rounded border link-dark text-decoration-none' style='background-color: #c7e3cd91'
                            >
                              <span class='bi bi-award fs-3'></span>

                              <span class='d-flex flex-column gap-1'>
                                <span class='fw-400 fs-5 pb-1 fw-semibold'>"
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

                                <span class='small text-secondary mt-3'>
                                    Status: Berlaku |
                                    Dilihat: $rows[dibaca] |
                                    Diunduh: $rows[didownload]
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