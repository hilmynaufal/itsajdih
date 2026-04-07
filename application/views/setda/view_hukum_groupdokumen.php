<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<section id="service-details" class="service-details section">

  <div id="list" class="text-start px-3 px-sm-4 px-xl-5">
    <div class="wrapall pt-3 pt-sm-4 pb-4 pb-sm-5">
      <div class="row gy-4 gx-4 gx-xl-5">
        <!-- kolom group pencarian hukum -->
        <div class="col col-12 col-lg-8">
          <div class="text-135 fs-4 fw-600 fst-italic text-uppercase oswald m-0 p-0 lh-1 mb-3 mb-lg-3">Pencarian Produk
            Hukum</div>
          <div class="mb-3">

            <input type="text" id="searchName" value="" class="form-control" value="" placeholder="Pencarian... ">
          </div>


          <button class="btn btn-success btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#searchForm"
            aria-expanded="false" aria-controls="searchForm">
            Detail Pencarian
          </button>

          <!-- Collapsible Search Form -->
          <div class="collapse" id="searchForm">
            <div class="card card-body">
              <form id="search-form">
                <div class="row">

                <div class="col-md-3 mb-3">
                    <label for="email" class="form-label">Jenis Dokumen</label>
                 
                    <select name="jenis_dok" id="jenis_dok" class="form-control">
                     
                      <option value="<?php  echo $nama_dokumen?>"><?php  echo $nama_dokumen?>-</option>
                      <option value=''>Tampilkan Semua</option>
                      <?php foreach ($jenis_dokumen as $k): ?>
                        
                        <option value="<?= $k['nama_dokumen']; ?>"><?= $k['nama_dokumen']; ?></option>
                      <?php endforeach; ?>
                      
                    </select>

                  </div>

                  <div class="col-md-3 mb-3">
                    <label for="name" class="form-label">Jenis Produk</label>
                    <select name="search_jenis_produk" class="form-control" id="search_jenis_produk"
                      data-placeholder="Pilih Jenis Produk Hukum">

                      <option value=''>Tampilkan Semua</option>
                      <?php
                            foreach ($jenis_produk->result_array() as $tag) {
                                echo "<option value='$tag[jenis_nama]'>$tag[jenis_nama]</option>";
                            }?>
                    </select>
                  </div>
                 



                  <div class="col-md-2 mb-3">
                    <label for="date" class="form-label">Nomor</label>
                    <input type="text" name="searchNomor" id="searchNomor" class="form-control" value=""
                      placeholder="No ">
                  </div>
                  <div class="col-md-2 mb-3">
                    <label for="date" class="form-label">Tahun</label>
                    <input type="text" name="searchtahun" class="form-control" value="" id="searchtahun" placeholder="Tahun">
                  </div>
                </div>
                <div class="text-end">
                  <button type="button" id="search-button" class="btn btn-success btn-sm">Cari</button>
                  <button type="reset" class="btn btn-info btn-sm">Reset</button>
                </div>
              </form>
            </div>
          </div>


          <div id="search-results">
            <div class="container table-responsive ">


              <!-- Bootstrap JS -->



              <table id="example" class="table table-striped table-bordered " style="width:100%">
                <thead>
                  <tr>
                    <th style="text-align: center;">NO</th>
                    <th style="text-align: center;">PRODUK HUKUM</th>
                    <th style="text-align: center;">TENTANG </th>
                    <th>STATUS</th>
                    <th>TGL DITETAPKAN</th>
                    <th width="5%" style="text-align: center;">DOWNLOAD</th>
                    <th width="5%" style="text-align: center;">LIHAT</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>

        </div>

        <!-- kolom group produk hukum -->
        <div class="col-lg-3 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">

          <div class="service-box">
            <h4>Kategori Produk Hukum</h4>

            <?php include "group_hukum.php"; ?>

          </div><!-- End Services List -->

          <div class="service-box">
            <h4>STATISTIK</h4>
            <div class="download-catalog">

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


<!-- Script -->
<script type="text/javascript">


 


  $(document).ready(function () {
    var userDataTable = $('#example').DataTable({
      'responsive': true,
      'processing': true,
      'serverSide': true,
      "ordering": true, // Set true agar bisa di sorting
      "order": [4, 'desc'], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
      "searching": false,
      'serverMethod': 'post',
      //'searching': false, // Remove default Search Control
      'ajax': {
        'url': '<?= base_url() ?>/hukum/userList',
        'data': function (data) {
          data.searchtahun = $('#searchtahun').val();
          data.search_jenis_produk= $('#search_jenis_produk').val();
          data.searchName = $('#searchName').val();
          data.searchNomor = $('#searchNomor').val();
          data.jenis_dok = $('#jenis_dok').val();
        }
      },
      columnDefs: [
        {
          targets: -2,
          className: 'dt-body-right'
        }
      ],
      'columns': [

        {
          "data": null,
          "class": "align-top",
          "orderable": false,
          "searchable": false,
          "render": function (data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
          }
        },
        { data: 'jenis_nama', className: "text-left" },
        {
          'data': 'judul',
          'render': function (data, type, row, meta) {
            return ('<a  href="<?= base_url() ?>hukum/detail_hukum/' + row.id + '",>' + data + '</a>');
          }
          , className: "text-left"
        },
        { data: 'status_nama', className: "text-center" },
        { data: 'tanggal_ditetapkan', className: "text-center" },
        { data: 'aksi', className: "text-left" },
        { data: 'baca', className: "text-left" },

      ],


    });

    $('#search_jenis_produk,#jenis_dok').change(function () {
      userDataTable.draw();
    });
    $('#searchtahun,#sel_city,#searchName,#searchNomor').keyup(function () {
      userDataTable.draw();
    });

    $('#jenis_dok').change(function () {
      userDataTable.draw();
    });

  });

 
</script>

<style>
    /* table.dataTable tbody td, 
        table.dataTable thead th {
            text-transform: uppercase;
        }
  tr.child ul {
    white-space: normal;
  } */
  .uppercase {
            text-transform: uppercase;
        }
        table.dataTable {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
</style>


<script src="https://cdn.datatables.net/2.1.6/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.6/js/dataTables.bootstrap.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.bootstrap.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.6/css/dataTables.bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.bootstrap5.css">