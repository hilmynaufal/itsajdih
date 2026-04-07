<section id="clients" class="clients section">

  <div class="container">

    <div class="container text-center">
      <div class="d-flex flex-column justify-content-center align-items-center">
        <h5 data-aos="fade-up" class="">Tema Peraturan Kumpulan peraturan yang saling berkaitan</>
        </h5>

        <div class="col col-12 col-lg-8">
          <!-- <div class="text-135 fs-4 fw-600 fst-italic text-uppercase oswald m-0 p-0 lh-1 mb-3 mb-lg-4">Pencarian Produk Hukum</div> -->


          <!-- Collapsible Search Form -->

          <div class="card card-body">
            <form id="search-form">
              <div class="row">
                <div class="col-md-3 mb-3">
                  <label for="name" class="form-label">Nama</label>
                  <select name="sel_gender" class="form-control" id="sel_gender"
                    data-placeholder="Pilih Jenis Produk Hukum">

                    <option value=''>-- Filter Kategori Peraturan --</option>
                    <option value="3">Undang Undang</option>
                    <option value="4">Perpu</option>
                    <option value="6">Perpres</option>

                    <option value="9">Pergub</option>
                    <option value="10">Peraturan Daerah</option>
                    <option value="11">Peraturan Bupati</option>
                    <option value="13">Keputusan Bupati</option>
                    <option value="14">Peraturan Desa</option>

                    <option value="23"> Naskah Akademik Raperda Inisiatif NASKAH</option>
                  </select>
                </div>

                <div class="col-md-5 mb-3">
                  <label for="email" class="form-label">Tentang</label>

                  <input type="hidden" id="jenis_dok" class="form-control" value="" placeholder="Cari Tipe Dokumen ">
                  <input type="hidden" id="jenis_dok" class="form-control" value="" placeholder="Cari Tipe Dokumen ">

                  <input type="text" id="searchName" class="form-control" value="" placeholder="Cari Judul ">
                </div>
                <div class="col-md-2 mb-3">
                  <label for="date" class="form-label">Nomor</label>
                  <input type="text" name="searchNomor" id="searchNomor" class="form-control" value=""
                    placeholder="No ">
                </div>
                <div class="col-md-2 mb-3">
                  <label for="date" class="form-label">Tahun</label>
                  <input type="text" name="sel_city" class="form-control" value="" id="sel_city" placeholder="Tahun">
                </div>
              </div>
              <div class="text-end">
                <button type="button" id="search-button" class="btn btn-success btn-sm">Cari</button>
                <button type="reset" class="btn btn-info btn-sm">Reset</button>
              </div>
            </form>
          </div>








        </div>





      </div>
    </div>
  </div>



</section><!-- /Clients Section -->


<section id="featured-services" class="featured-services section">
  <!-- /Hero Section -->


</section>
<div class="container">

  <div class="row gy-4">

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.6/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.6/js/dataTables.bootstrap.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.bootstrap.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.bootstrap5.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.6/css/dataTables.bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.bootstrap5.css">




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



<!-- Script -->
<script type="text/javascript">


  function uwords(str) {
    return str.replace(/\w\S*/g, function (txt) {
      return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
    });
  }


  $(document).ready(function () {
    var userDataTable = $('#example').DataTable({
      'responsive': true,
      'processing': true,
      'serverSide': true,
      "ordering": true, // Set true agar bisa di sorting
      "order": [[2, 'desc']], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
      "searching": false,
      'serverMethod': 'post',
      //'searching': false, // Remove default Search Control
      'ajax': {
        'url': '<?= base_url() ?>/hukum/userList',
        'data': function (data) {
          data.searchCity = $('#sel_city').val();
          data.searchGender = $('#sel_gender').val();
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
            return uwords('<a style="font-weight: normal;font-size:11pt;" href="<?= base_url() ?>hukum/detail_hukum/' + row.id + '",>' + data + '</a>');
          }
          , className: "text-left"
        },
        { data: 'status_nama', className: "text-center" },
        { data: 'tanggal_ditetapkan', className: "text-center" },
        { data: 'aksi', className: "text-left" },
        { data: 'baca', className: "text-left" },

      ],


    });

    $('#sel_city,#sel_gender').change(function () {
      userDataTable.draw();
    });
    $('#searchName,#searchNomor').keyup(function () {
      userDataTable.draw();
    });
    $('#searchPendidikan').click(function () {
      userDataTable.draw();
    });
    $('#jenis_dok').keyup(function () {
      userDataTable.draw();
    });

  });

  function toTitleCase(str) {
    return str.replace(/\w\S*/g, function (txt) {
      return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
    });
  }
</script>

<style>
  tr.child ul {
    white-space: normal;
  }
</style>