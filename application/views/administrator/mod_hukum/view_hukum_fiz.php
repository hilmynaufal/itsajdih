            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Manajemen Produk Hukum</h3>
                  <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>administrator/tambah_hukum'>Tambahkan Data</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                 <script type="text/javascript">

var table;

$(document).ready(function() {
//       $('.sidebar').hide();
//                    $(".dataTables_paginate paging_simple_numbers").addClass("col-md-12");
//                    $(".col-md-12").removeClass("col-md-8");
    //datatables
    table = $('#example1').DataTable({ 
     
      "ordering" : true,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [7, 'desc'], //Initial no order.
        "paging": true,
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('administrator/ajax_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },],
     "lengthMenu": [ [2, 4, 8, -1], [2, 4, 8, "All"] ],
     "pageLength": 15,
      "dom": 'Bfrtip',
      "buttons": ['excelHtml5']
    },
  );
    
    
});

</script>


  <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                  
                    <th>No</th>
                    
                    <th>Abstrak</th>
                    <th>File Indo</th>
                  
                    <th>Judul Indonesia</th>
                    <th>Judul English</th>
                    <th>File Inggris</th>
                    <th>Jenis Peraturan</th>
                    <th>No Peraturan</th>
                    
                    <th>Tahun</th>
                    <th>Tanggal Ditetapkan</th>
                    <th>Status Hukum</th>
                    <th>Id Dokumen</th>
                     <th>Aksi</th>
                     
                </tr>
            </thead>
            <tbody>
            </tbody>

            
        </table>
              </div>
                


              <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
          <script src="https://cdn.datatables.net/2.1.6/js/dataTables.js"></script>
          <script src="https://cdn.datatables.net/2.1.6/js/dataTables.bootstrap.js"></script>
          <script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script>
          <script src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.bootstrap.js"></script>


          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <link rel="stylesheet" href="https://cdn.datatables.net/2.1.6/css/dataTables.bootstrap.css">
          <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.bootstrap.css">

