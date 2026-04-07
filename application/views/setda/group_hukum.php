								
<style>
    .custom-list li {
      border-bottom: 1px solid #ddd; /* Underline style */
      padding: 5px 0; /* Add spacing */
    }
  </style>

<div class="container mt-5">
<ul class="list-group list-group-flush">
<?php 


 $group_hukum = $this->model_utama->group_hukum();
 foreach ($group_hukum->result_array() as $rows){
  
     echo "<li class='list-group-item'><a  class='text-decoration-none' href=".base_url()."dokumen/kategori/".str_replace(' ', '-',$rows['jenis_nama'])."><span class='category'>$rows[jenis_nama]</span>  </a><span class='badge bg-success rounded-pill'>$rows[jml]</span></li>";
 };
 
?>
        </ul>
    </div>

<style>
        .list-group-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>

