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

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
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
   "pageLength": 20,
      dom: 'Bfrtip',
        buttons: [
//            'copyHtml5',
            'excelHtml5',
//            'csvHtml5',
//            'pdfHtml5'
        ]
    });
    
    


});

</script>
  <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Abstrak</th>
                    <th>File</th>
                    <th>Tentang</th>
                    <th>Jenis Peraturan</th>
                    <th>No Peraturan</th>
                    <th>Tahun</th>
                    <th>Tanggal Diundangkan</th>
                    <th>Status Hukum</th>
                     <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>

            
        </table>
              </div>
                
