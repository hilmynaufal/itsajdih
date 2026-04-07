								
<?php //target='_blank' rel="noopener noreferrer"?kategori=15&nomor=&tahun=1&tentang=&submit=
echo " <div class='services-list'>";
 $group_hukum = $this->model_utama->group_hukum();
 foreach ($group_hukum->result_array() as $rows){

  echo "<ul>
     <form action='".base_url()."dokumen/kategori' method='post'>
     <input type='text' name='kategori' value='$rows[jenis_id]' hidden>
     <button  type='submit' name='jenis_produk'value='$rows[jenis_nama]'' class='btn btn-light'><i class='bi bi-arrow-right-circle'></i><span>$rows[jenis_nama]</span><span class='number'>($rows[jml])</span></button>
</form></ul>";
 }
 
 echo "</div>";
 


//  <div class='services-list'>
// <a href='#' class='active'><i class='bi bi-arrow-right-circle'></i><span>Web Design</span></a>
// <a href='#'><i class='bi bi-arrow-right-circle'></i><span>Web Design</span></a>
// <a href='#'><i class='bi bi-arrow-right-circle'></i><span>Product Management</span></a>
// <a href='#'><i class='bi bi-arrow-right-circle'></i><span>Graphic Design</span></a>
// <a href='#'><i class='bi bi-arrow-right-circle'></i><span>Marketing</span></a>
// </div>



