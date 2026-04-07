<ul>
    <?php 
    $botm = $this->model_utama->mainmenu();
    foreach ($botm->result_array() as $main) { // Menggunakan $main agar tidak tertukar
        $dropdown = $this->model_utama->submenu($main['id_main'])->num_rows();
        
        if ($dropdown == 0) {
            echo "<li><a href='".base_url()."$main[link]'>$main[nama_menu]</a></li>";
        } else {
            echo "<li class='dropdown'>
                    <a href='".base_url()."$main[link]'> 
                        <span>$main[nama_menu]</span> <i class='bi bi-chevron-down toggle-dropdown'></i>
                    </a>
                    <ul class='dropdown-menu'>";

            $dropmenu = $this->model_utama->submenu($main['id_main']);
            foreach ($dropmenu->result_array() as $sub1) {
                
                // --- LOGIKA KHUSUS: PERATURAN PERUNDANG-UNDANGAN ---
                if ($sub1['nama_sub'] == "Peraturan Perundang-Undangan") {
                    echo "<li class='dropdown'>
                            <a href='#'>
                                <span class='toggle-dropdown'>$sub1[nama_sub]</span> 
                                <i class='bi bi-chevron-down toggle-dropdown'></i>
                            </a>
                            <ul class='dropdown-menu'>
                                <li><a href='".base_url('dokumen/kategori/Peraturan-Daerah')."'>Peraturan Daerah</a></li>
                                <li><a href='".base_url('dokumen/kategori/Peraturan-Bupati')."'>Peraturan Bupati</a></li>
                                <li><a href='".base_url('dokumen/kategori/Keputusan-Bupati')."'>Keputusan Bupati</a></li>
								<li><a href='".base_url('dokumen/kategori/Peraturan-Desa')."'>Peraturan Desa</a></li>
                            </ul>
                          </li>";
                } 
                
                // --- LOGIKA KHUSUS: DOKUMEN HUKUM LAINNYA ---
                elseif ($sub1['nama_sub'] == "Dokumen Hukum Lainnya") {
                    echo "<li class='dropdown'>
                            <a href='#'>
                                <span class='toggle-dropdown'>$sub1[nama_sub]</span> 
                                <i class='bi bi-chevron-down toggle-dropdown'></i>
                            </a>
                            <ul class='dropdown-menu'>
                                <li><a href='".base_url('dokumen/kategori/Yurisprudensi')."'>Yurisprudensi</a></li>
                                <li><a href='".base_url('dokumen/kategori/Putusan-Pengadilan')."'>Putusan Pengadilan</a></li>
                                <li><a href='".base_url('dokumen/kategori/Monografi')."'>Monografi</a></li>
                                <li><a href='".base_url('dokumen/kategori/Artikel-Hukum')."'>Buku Hukum</a></li>
                                <li><a href='".base_url('dokumen/kategori/Artikel-Hukum')."'>Artikel Hukum</a></li>
                                <li><a href='".base_url('dokumen/kategori/Dokumen-Langka')."'>Dokumen Langka </a></li>
                          
                      </ul>
                          </li>";
                } 
                
                // --- LOGIKA MENU STANDAR (DARI DATABASE) ---
                else {
                    $dropdown1 = $this->model_utama->submenu1($sub1['id_sub']);
                    if ($dropdown1->num_rows() == 0) {
                        $link = preg_match("/^http/", $sub1['link_sub']) ? $sub1['link_sub'] : base_url().$sub1['link_sub'];
                        echo "<li><a href='$link'>$sub1[nama_sub]</a></li>";
                    } else {
                        echo "<li class='dropdown'>
                                <a href='#'>
                                    <span class='toggle-dropdown'>$sub1[nama_sub]</span> 
                                    <i class='bi bi-chevron-down toggle-dropdown'></i>
                                </a>
                                <ul class='dropdown-menu'>";
                                foreach ($dropdown1->result_array() as $sub2) {
                                    $link2 = preg_match("/^http/", $sub2['link_sub']) ? $sub2['link_sub'] : base_url().$sub2['link_sub'];
                                    echo "<li><a href='$link2'>$sub2[nama_sub]</a></li>";
                                }
                        echo "</ul></li>";
                    }
                }
            }
            echo "</ul></li>";
        }
    }
    ?>
</ul>
