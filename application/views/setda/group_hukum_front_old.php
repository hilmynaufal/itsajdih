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
 foreach ($group_hukum->result_array() as $rows){
  

  $no_path = 1;
  $array = [];
  $color[1]='circle-card red';
  $color[2]='circle-card yellow';
  $color[3]='circle-card green';
  $color[4]='circle-card blue';
  $color[5]='circle-card red';
  $color[6]='circle-card orange';
  $color[7]='circle-card red';
  $color[8]='circle-card yellow';
  $color[9]='circle-card green';
  $color[10]='circle-card blue';
  $color[11]='circle-card red';
  $color[12]='circle-card orange';

  $color[13]='circle-card green';
  $color[14]='circle-card yellow';
  $color[15]='circle-card green';
  $color[16]='circle-card blue';
  $color[17]='circle-card red';
  $color[18]='circle-card orange';

  
  $color[19]='circle-card green';
  $color[20]='circle-card yellow';
  $color[21]='circle-card green';
  $color[22]='circle-card blue';
  $color[23]='circle-card red';
  $color[24]='circle-card orange';


foreach ($group_hukum->result_array() as $path){

  // $filePath = './' . $data_hukum->path_peraturan; // Path file lokalstr_replace(' ', '-', $string)
  // $viewabstrak = file_exists($filePath)

               $array[] = print '<div class="'.$color[$no_path].'"><p style="color:white;" > <a  style="color:white;" href='.base_url()."dokumen/kategori/".str_replace(' ', '-',$path["jenis_nama"]).'>'.strtoupper($path["jenis_nama"]).'<br><span style="color: white;">('.$path["jml"].')</p></a></div>';

              $no_path++;
            }
 
          }
