<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .pagination li {
            display: inline;
            margin: 0 5px;
        }
        .pagination li.active a {
            font-weight: bold;
            text-decoration: underline;
        }
    </style>
<section id="service-details" class="service-details section">

  <div id="list" class="text-start px-3 px-sm-4 px-xl-5">
    <div class="wrapall pt-3 pt-sm-4 pb-4 pb-sm-5">
      <div class="row gy-4 gx-4 gx-xl-5">
        <!-- kolom group pencarian hukum -->
        <div class="col col-12 col-lg-8">
          <!-- <div class="text-135 fs-4 fw-600 fst-italic text-uppercase oswald m-0 p-0 lh-1 mb-3 mb-lg-4">Pencarian Produk Hukum</div> -->
          <div class="mb-3">
                        <label for="keyword" class="form-label">Kata Kunci</label>
                        <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Masukkan kata kunci...">
                    </div>

                   
        <!-- <div class="text-center">
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#searchForm" aria-expanded="false" aria-controls="searchForm">
                Tampilkan / Sembunyikan Pencarian
            </button>
        </div> -->
        
        <!-- Form Pencarian -->
        <!-- <div class="collapse mt-4" id="searchForm">
            <div class="card card-body">
                <form id="search-form">
                    <div class="mb-3">
                        <label for="keyword" class="form-label">Kata Kunci</label>
                        <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Masukkan kata kunci...">
                    </div>
                    <button type="button" class="btn btn-success" id="search-btn">Cari</button>
                </form>
            </div>
        </div> -->
        <button class="btn btn-primary mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#searchForm" aria-expanded="false" aria-controls="searchForm">
            Toggle Pencarian
        </button>

        <!-- Collapsible Search Form -->
        <div class="collapse" id="searchForm">
            <div class="card card-body">
                <form id="search-form">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Masukkan Nama">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan Email">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="date" class="form-label">Tanggal</label>
                            <input type="date" id="date" name="date" class="form-control">
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="button" id="search-button" class="btn btn-success">Cari</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
            </div>
        </div>

        
        <div class="container">
        <h2>Pencarian dengan Pagination AJAX</h2>
        <input type="text" id="search-input" value="MENYEMAI " style="width: 100%; padding: 10px;">
        <input type="text" id="search-kategori" value="aaa" style="width: 100%; padding: 10px;">
        <br><br>
        <div id="search-results">
        <div class="container table-responsive "> 
            <!-- Konten data akan dimuat di sini -->
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            load_data(1);

            $('#search-input').on('keyup', function() {
                load_data(1);
            });

            $(document).on('click', '.pagination li a', function(e) {
                e.preventDefault();
                const page = $(this).data('ci-pagination-page');
                load_data(page);
            });

            function load_data(page) {
                const keyword = $('#search-input').val();
                $.ajax({
                    url: '<?= base_url('Dokumen/fetch_data') ?>',
                    type: 'POST',
                    data: { keyword: keyword, page: page },
                    dataType: 'json',
                    success: function(response) {
                        let rows = '';
                        if (response.data.length > 0) {
                            response.data.forEach(function(item,index) {
                                rows += `
                                    <tr>
                                     <td>${index + 1}</td>
                                        <td >${item.nama}</td>
                                        <td >${item.tahun}</td>
                                          <td >${item.jenis_nama}</td>
                                    </tr>
                                `;
                            });
                        } else {
                            rows = '<tr><td colspan="2">Tidak ada data ditemukan.</td></tr>';
                        }

                        const table = `
                            <table class="table  table-hover">
                                <thead class="thead-light">
                                    <tr>
                                      <th  >No</th>

                                        <th  >Peraturan</th>
                                        <th  >Nama</th>
                                        <th  >Jenis document</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>${rows}</tbody>
                            </table>
                        `;

                        $('#search-results').html(table + response.pagination);
                    },
                    error: function() {
                        $('#search-results').html('<p>Terjadi kesalahan.</p>');
                    }
                });
            }
        });
    </script>
          <!-- Bootstrap JS -->
        

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
                $pengunjung = $this->model_utama->pengunjung()->num_rows();
                $totalpengunjung = $this->model_utama->totalpengunjung()->row_array();
                $hits = $this->model_utama->hits()->row_array();
                $totalhits = $this->model_utama->totalhits()->row_array();
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
