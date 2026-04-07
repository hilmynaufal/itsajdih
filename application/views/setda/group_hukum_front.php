		  <!-- <div class="circle-card red">Red</div>
  <div class="circle-card orange">Orange</div>
  <div class="circle-card yellow">Yellow</div>
  <div class="circle-card green">Green</div>
  <div class="circle-card blue">Blue</div>
  <div class="circle-card red">Red</div>
  <div class="circle-card orange">Orange</div>
  <div class="circle-card yellow">Yellow</div>
  <div class="circle-card green">Green</div>
  <div class="circle-card red">Blue</div> -->			
  
<?php
$group_hukum = $this->model_utama->group_hukum();

$colors = ['red', 'yellow', 'green', 'blue', 'orange'];
$i = 0;

foreach ($group_hukum->result_array() as $row) {

  $slug  = strtolower(str_replace(' ', '-', $row['jenis_nama']));
  $color = $colors[$i % count($colors)];
?>
  <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-2 px-1">
    <a href="<?= base_url('dokumen/kategori/'.$slug) ?>" style="text-decoration:none;">
      <div class="circle-card <?= $color ?>">
        <div>
          <?= strtoupper($row['jenis_nama']) ?><br>
          <span>(<?= $row['jml'] ?>)</span>
        </div>
      </div>
    </a>
  </div>
<?php
  $i++;
}
?>
 			

