								
<style>
    .custom-list li {
      border-bottom: 1px solid #ddd; /* Underline style */
      padding: 5px 0; /* Add spacing */
    }
  </style>
<?php //target='_blank' rel="noopener noreferrer"?kategori=15&nomor=&tahun=1&tentang=&submit=
 $group_hukum = $this->model_utama->group_hukum();
 foreach ($group_hukum->result_array() as $rows){
  
     echo "<ul class='list-unstyled custom-list'><li><a  href=".base_url()."dokumen/kategori/".str_replace(' ', '-',$rows['jenis_nama'])."><span class='category'>$rows[jenis_nama]</span>  <span style=' font-size: 13px;
        font-weight:bold; color: white;' class='btn btn-success btn-xs'><small>($rows[jml])</span></small></a></li></ul>";
 };
 
?>
<br>
<style>
        .list-group-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
 <div class="container mt-5">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <a href="#item1" class="text-decoration-none">Item 1</a>
                <span>1</span>
            </li>
            <li class="list-group-item">
                <a href="#item2" class="text-decoration-none">Item 2</a>
                <span>2</span>
            </li>
            <li class="list-group-item">
                <a href="#item3" class="text-decoration-none">Item 3</a>
                <span>3</span>
            </li>
            <li class="list-group-item">
                <a href="#item4" class="text-decoration-none">Item 4</a>
                <span>4</span>
            </li>
        </ul>
    </div>

