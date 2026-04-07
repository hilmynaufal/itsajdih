


<div class="row">
<div class="col-md-12">
<div class="single-review">
<div class="post-img">
   <a href="#" class="post-tag">Cari Produk Hukum</a>
   <div class="post-info">
   </div>
</div>
<div class="post-content" style="margin: -20px 0 30px;">
<div class="port-content container-fluid">
<form class="form-horizontal" role="form" method="GET" action="<?=base_url('hukum/search/')?>">
<div class="form-group">
     
    
   <label class="col-sm-3 control-label required" style="text-align:left;" for="nama_barang">Jenis</label>
   <div class="col-sm-9">
      <select class="form-control" style="max-width: 100%;" id="kategori" name="kategori">
         <option value="all">Semua Peraturan</option>
         <optgroup label="Peraturan Pusat">
            <option value="1">Undang Undang</option>
            <option value="5">Peraturan Presiden</option>
            <option value="3">Peraturan Pengganti Undang Undang</option>
            <option value="4">Peraturan Pemerintah</option>
            <option value="8">Peraturan Menteri</option>
            <option value="2">Ketetapan MPR</option>
            <option value="6">Keputusan Presiden</option>
            <option value="9">Keputusan Menteri</option>
            <option value="7">Instruksi Presiden</option>
            <option value="10">Instruksi Menteri</option>
         </optgroup>
         <optgroup label="Peraturan Propinsi">
            <option value="12">Peraturan Gubernur</option>
            <option value="11">Peraturan Daerah Provinsi</option>
            <option value="13">Keputusan Gubernur</option>
            <option value="14">Instruksi Gubernur</option>
         </optgroup>
         <optgroup label="Peraturan Kabupaten" class="">
            <option value="15">Peraturan Daerah Kabupaten Kota</option>
            <option value="16">Peraturan Bupati</option>
            <option value="17">Keputusan Bupati</option>
         </optgroup>
      </select>
   </div>
</div>
<div class="form-group">
   <label class="col-sm-3 control-label required" style="text-align:left;" for="nama_barang">Nomor</label>
   <div class="col-sm-4">
      <input type="text" class="form-control" id="search-descr" name="nomor" value="" placeholder="...">
   </div>
</div>
<div class="form-group">
   <label class="col-sm-3 control-label required" style="text-align:left;" for="nama_barang">Tahun</label>
   <div class="col-sm-4">
      <select name="tahun" id="tahun" class="form-control" required>
         <option value="1">Semua Tahun</option>
         <?php for($i=date("Y");$i>=1980;$i--) {
            echo "<option value='".$i."'>".$i."</option>";
            }?>
      </select>
   </div>
</div>
<div class="form-group">
   <label class="col-sm-3 control-label required" style="text-align:left;" for="nama_barang">Tentang</label>
   <div class="col-sm-9">
      <input maxlength="50" class="form-control" name="tentang" value="" id="tentang" type="text">
   </div>
</div>

                    <!-- <div class="form-group">
                      <label class="col-sm-3 control-label required" style="text-align:left;" for="nama_barang">Status Akhir</label>
                      <div class="col-sm-9">
                        <input maxlength="50" class="form-control" name="status_akhir" id="status_akhir" type="text">
                      </div>
                    </div> -->
                    <div class="pull-right">
                      <button type="submit" id="submit" name="submit" class="btn btn-primary"> Cari</button>
                    </div>
                  </form>
                </div>
              </div>
						</div><!-- /.single-review -->
					</div>
				</div>

<script type="text/javascript">

var table;

$(document).ready(function() {
       $('.sidebar').hide();
                    $(".col-md-8").addClass("col-md-12");
                    $(".col-md-12").removeClass("col-md-8");
    //datatables
    table = $('#table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('hukum/ajax_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },],    });


});

</script>
<table id="table" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>act</th>
                    <th>Nama</th>
                    <th>Jenis Peraturan</th>
                    <th>No</th>
                    <th>Tahun</th>
                    <th>Tanggal</th>
                    <th>Status Hukum</th>
                </tr>
            </thead>
            <tbody>
            </tbody>

            <tfoot>
                <tr>
                    <th>No</th>
                    <th>act</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Country</th>
                </tr>
            </tfoot>
        </table>