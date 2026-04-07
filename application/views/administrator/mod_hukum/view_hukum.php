<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Manajemen Produk Hukum</h3>
      <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>administrator/tambah_hukum'>Tambahkan
        Data</a>
    </div><!-- /.box-header -->
    <div class="box-body">
      <div class="card card-body">
        <form id="search-form">
          <div class="row">

            <div class="col-md-3 mb-3">
              <label for="email" class="form-label">Nama</label>

              <input type="text" id="searchName" value="" class="form-control" placeholder="Pencarian... ">

            </div>
            <div class="col-md-3 mb-3">


              <label for="email" class="form-label">Jenis Dokumen</label>

              <select name="jenis_dok" id="jenis_dok" class="form-control">
                <?PHP if ($data_cari2 != '') { ?>
                  <option value="<?PHP echo $data_cari2 ?>"><?PHP echo $data_cari2 ?></option>
                <?PHP } ?>
                <option value=''>Tampilkan Semua</option>

                <?php foreach ($jenis_dokumen as $k): ?>

                  <option value="<?= $k['nama_dokumen']; ?>"><?= $k['nama_dokumen']; ?></option>
                <?php endforeach; ?>

              </select>

            </div>

            <div class="col-md-3 mb-3">
              <label for="name" class="form-label">Tampilkan Produk</label>
              <select name="search_jenis_produk" class="form-control" id="search_jenis_produk"
                data-placeholder="Pilih Jenis Produk Hukum">
                <option value=''>Tampil Semua</option>


                <?php
                foreach ($jenis_produk->result_array() as $tag) {
                  echo "<option value='$tag[jenis_nama]'>$tag[jenis_nama]</option>";
                } ?>
              </select>
            </div>



            <div class="col-md-1 mb-1">
              <label for="date" class="form-label">Nomor</label>
              <input type="text" name="searchNomor" id="searchNomor" class="form-control" value="" placeholder="No ">
            </div>
            <div class="col-md-1 mb-3">
              <label for="date" class="form-label">Tahun</label>
              <input type="text" name="searchtahun" class="form-control" value="" id="searchtahun" placeholder="Tahun">
            </div>
          </div>

        </form>
      </div>

      <div class="table-responsive">


      <table id="example" class="table table-striped table-bordered " style="width:100%">
        <thead>
          <tr>
            <th style="text-align: center;">NO URUT</th>
            <th style="text-align: center;">JENIS PRODUK</th>
            <th style="text-align: center;">NO PRODUK</th>
            <th style="text-align: center;">TENTANG </th>
            <th>STATUS</th>
            <th>TGL DITETAPKAN</th>
            <th width="5%" style="text-align: center;">LAMPIRAN</th>
            <th width="5%" style="text-align: center;">FILE ABSTRAK</th>
            <th width="5%" style="text-align: center;">FILE INDONESIA</th>
            <th width="5%" style="text-align: center;">FILE INGGRIS</th>
            <th width="5%" style="text-align: center;">AKSI</th>
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
          'createdRow': function (row, data, dataIndex) {
            // Menambahkan kelas 'uppercase' untuk semua kolom di baris
            $(row).find('td').addClass('uppercase');
          },
          responsive: true,
          'processing': true,
          'serverSide': true,
          "ordering": true, // Set true agar bisa di sorting
          "order": [[5, 'desc']], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
          "searching": false,
          'serverMethod': 'post',
          //'searching': false, // Remove default Search Control
          'ajax': {
            'url': '<?= base_url() ?>/hukum/list_adminhukum',
            'data': function (data) {
              data.searchtahun = $('#searchtahun').val();
              data.search_jenis_produk = $('#search_jenis_produk').val();
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
            { data: 'no', className: "text-left" },
            {
              'data': 'judul',
              'render': function (data, type, row, meta) {
                return ('<a href="<?= base_url() ?>hukum/detail_hukum/' + row.id + '",>' + data + '</a>');
              }
              , className: "text-left"
            },
            { data: 'status_nama', className: "text-center" },
            { data: 'tanggal_ditetapkan', className: "text-center" },
            { data: 'lampiran', className: "text-left" },
            { data: 'bacaabstrak', className: "text-left" },
            { data: 'baca', className: "text-left" },
            { data: 'bacainggris', className: "text-left" },
            { data: 'aksi', className: "text-left" },

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

      function toTitleCase(str) {
        return str.replace(/\w\S*/g, function (txt) {
          return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
        });
      }
    </script>

    <style>
      table.dataTable tbody td,
      table.dataTable thead th {
        text-transform: uppercase;
      }

      tr.child ul {
        white-space: normal;
      }

      /* CSS untuk mengubah teks ke huruf besar */
      .uppercase {
        text-transform: uppercase;
      }

      .uppercase {
        text-transform: uppercase;
      }

      table.dataTable {
        font-family: Arial, sans-serif;
        font-size: 12px;
      }
    </style>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
   <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
   <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
   <script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script>
   <script src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.bootstrap5.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.6/css/dataTables.bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.bootstrap5.css">

       <!-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
   <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
   <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
   <script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script>
   <script src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.bootstrap5.js"></script> -->
<!-- 
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.bootstrap5.css"> -->