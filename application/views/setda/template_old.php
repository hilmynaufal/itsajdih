<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>JDIH KAB BANDUNG</title>
    <meta name="author" content="jdih.bandungkab.go.id">
    <meta http-equiv="imagetoolbar" content="no">
    <meta name="language" content="Indonesia">
    <meta name="revisit-after" content="7">
    <meta name="webcrawlers" content="all">
    <meta name="rating" content="general">
    <meta name="spiders" content="all">

  <link href="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/favicon.ico" rel="icon">
  <link href="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/favicon.ico" rel="apple-touch-icon">
  

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url(); ?>template/<?php echo template(); ?>/vendor/bootstrap/css/bootstrap.min.css"
    rel="stylesheet">
  <link href="<?php echo base_url(); ?>template/<?php echo template(); ?>/vendor/bootstrap-icons/bootstrap-icons.css"
    rel="stylesheet">
  <link href="<?php echo base_url(); ?>template/<?php echo template(); ?>/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>template/<?php echo template(); ?>/vendor/glightbox/css/glightbox.min.css"
    rel="stylesheet">
  <link href="<?php echo base_url(); ?>template/<?php echo template(); ?>/vendor/swiper/swiper-bundle.min.css"
    rel="stylesheet">

  <!-- Main CSS File -->
  <link href="<?php echo base_url(); ?>template/<?php echo template(); ?>/css/main.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>template/<?php echo template(); ?>/css/style.css" rel="stylesheet">
  <!-- =======================================================
  * Template Name: QuickStart
  * Template URL: https://bootstrapmade.com/quickstart-bootstrap-startup-website-template/
  * Updated: May 01 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    <!-- jqueri ai  -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="<?php echo base_url(); ?>" class="logo d-flex align-items-center me-auto">
        <img src="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/logo.png" alt="">
      </a>

      <nav id="navmenu" class="navmenu">
        <?php include "main-menu-quick.php"; ?>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
    <!-- mobile-menu-area start -->

  </header>



  <main class="main">
    <!-- Hero Section -->

    <?php if ($this->uri->segment(1) == '') { ?>
      <section id="hero" class="hero section">

        <div class="hero-bg">
          <img src="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/hero-bg-light.webp" alt="">
        </div>
        <div class="container text-center">
          <div class="d-flex flex-column justify-content-center align-items-center">
            <h3 data-aos="fade-up" class="">JDIH (Jaringan Dokumentasi dan Informasi Hukum) <span> <br> Kabupaten Bandung</span></h3>
            <!-- kolom group pencarian hukum -->
            <div class="col col-12 col-lg-8">
              <!-- <div class="text-135 fs-4 fw-600 fst-italic text-uppercase oswald m-0 p-0 lh-1 mb-3 mb-lg-4">Pencarian Produk Hukum</div> -->
              <div class="mb-3">
                <form action="<?PHP echo site_url() ?>dokumen/tag" method="POST" class="d-flex justify-content-center">
                  <input type="text" name="searchName" id="searchName" class="form-control me-2"
                    placeholder="Cari sesuatu..." aria-label="Search">
                  <button type="submit" class="btn btn-success">Cari</button>
                </form>
              </div>


              <button class="btn btn-success btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#searchForm"
                aria-expanded="false" aria-controls="searchForm">
                Detail Pencarian
              </button>

                <button class="btn btn-warning btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#modalCariAI">
                <i class="bi bi-robot"></i> Cari dengan AI
              </button>

              <!-- Collapsible Search Form -->
              <div class="collapse" id="searchForm">
                <div class="card card-body">
                  <form id="search-form" action="<?PHP echo site_url() ?>dokumen/cari" method="POST"
                    class="d-flex justify-content-center">
                    <div class="row">
                      <div class="col-md-3 mb-2">
                        <label for="name" class="form-label">Pilih Produk</label>
                        <select name="search_jenis_produk" class="form-control" id="search_jenis_produk"
                          data-placeholder="Pilih Jenis Produk Hukum">

                          <option value=''>Tampil Semua</option>
                          <?php
                          foreach ($jenis_produk->result_array() as $tag) {
                            echo "<option value='$tag[jenis_nama]'>$tag[jenis_nama]</option>";
                          } ?>
                        </select>
                      </div>
                      <div class="col-md-3 mb-2">
                        <label for="email" class="form-label">Status Peraturan</label>


                        <select name="jenis_dok" id="jenis_dok" class="form-control">

                          <option value=''>Tampilkan Semua</option>
                          <?php foreach ($record as $k): ?>

                            <option value="<?= $k['status_id']; ?>"><?= $k['status_nama']; ?></option>
                          <?php endforeach; ?>

                        </select>
                      </div>
                      <div class="col-md-2 mb-3">
                        <label for="date" class="form-label">Nomor</label>
                        <input type="text" name="searchNomor" id="searchNomor" class="form-control" value=""
                          placeholder="No ">
                      </div>
                      <div class="col-md-2 mb-3">
                        <label for="date" class="form-label">Tahun</label>
                        <input type="text" name="searchtahun" class="form-control" value="" id="searchtahun"
                          placeholder="Tahun">
                      </div>
                    </div>
                    <div class="text-end">
                      <button type="submit" id="search-button" class="btn btn-success btn-sm">Cari</button>
                      
                    </div>
                  </form>
                </div>
              </div>








            </div>

          </div>
        </div>

        <style>
        /* Custom CSS untuk modal lebih kecil */
        .compact-modal .modal-dialog {
            max-width: 300px; /* Lebar modal */
            margin: 1.75rem auto;
        }
        .compact-modal .modal-content {
            border-radius: 10px;
        }
    </style>
    
        <div class="modal fade" id="welcomeModal" tabindex="-1" aria-labelledby="welcomeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="welcomeModalLabel">Selamat Datang!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               
                <img src="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/votingsetda.png" style="width:500px; text-align: center;"  alt="Gambar Welcome" class="img-fluid mb-3">
            </div>
            <div class="modal-footer">
            <input type="button" 
           value="voting" 
           onclick="window.open('https://birohukum.jabarprov.go.id/review.php/login', '_blank')"
           class="btn btn-primary" data-bs-dismiss="modal">
              
            </div>
        </div>
    </div>
</div>


      </section><!-- /Hero Section -->
    <?PHP } ?>

    <?php if ($this->uri->segment(1) == '') { ?>
      <section id="clients" class="clients section">

        <div class="container aos-init aos-animate">

          <div class="row">

            <div class="card-track">
              <div class="d-flex">
                <?php include "group_hukum_front.php"; ?>
              </div>

            </div>

          </div>

        </div>

      </section>
    <?PHP } ?>

    <section class="featured-services section">


    </section>

    <style>
      .card-scroller {
        overflow: hidden;
        white-space: nowrap;
        width: 100%;
        position: relative;
        background-color: #2e6a4ecf;
      }

      .card-track {
        display: inline-flex;
        animation: scroll 35s linear infinite;
      }

      .circle-card {
        font-size: 12px;
        font-weight: lighter;
        width: 100px;
        height: 100px;
        border-radius: 25%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: bold;
        text-align: center;
        margin: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);

      }

      .circle-card span {
        font-size: 12px;
        font-weight: lighter;
        color: white;

      }

      .circle-card.red {
        background-color: #f94144;
      }

      .circle-card.orange {
        background-color: #f3722c;
      }

      .circle-card.yellow {
        background-color: #f9c74f;
      }

      .circle-card.green {
        background-color: #90be6d;
      }

      .circle-card.blue {
        background-color: #577590;
      }
    </style>
    <style>
      .card {
        transition: transform 0.3s ease, opacity 0.3s ease;
        opacity: 1;
      }

      .card:hover {
        transform: scale(1.10);
        opacity: 0.8;
      }
    </style>



    <?php echo $contents; ?>

    <section id="features-details" class="features-details section">
    <div class="container section-title aos-init aos-animate" data-aos="fade-up">

<p>Daftar Kelompok Bidang Sesuai Keterkaitan Dengan Produk Hukum </p>

</div>
      <div class="container my-6">

      
      <div class="row justify-content-center">

<div class="col-md-2">
  <a href="#" class="card text-center shadow-sm" onclick='tag_pendidikan()'>
    <img src="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/slider/anaksd.png"
      class="card-img-top" alt="Example Image">
    <div class="card-body">
      <p>Pendidikan</p>

    </div>
  </a>
</div>

<div class="col-md-2">
  <a href="#" class="card text-center shadow-sm" onclick='tag_tenagakerja()'>
    <img src="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/slider/pegawai.png"
      class="card-img-top" alt="Example Image">
    <div class="card-body">
      <p>Ketenaga Kerjaan</p>

    </div>
  </a>
</div>

<div class="col-md-2">
  <a href="#" class="card text-center shadow-sm" onclick='tag_desa()'>
    <img src="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/slider/desa.png"
      class="card-img-top" alt="Example Image">
    <div class="card-body">
      <p>Desa</p>

    </div>
  </a>
</div>

<div class="col-md-2">
<a href="#" class="card text-center shadow-sm" onclick='tag_infrastruktur()'>
    <img src="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/slider/infrastruktur.png"
      class="card-img-top" alt="Example Image">
    <div class="card-body">
      <p>Infrastruktur</p>

    </div>
  </a>
</div>

<div class="col-md-2" >
  <a href="#"  class="card text-center shadow-sm" onclick='tag_kearsipan()'>
    <img src="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/slider/arsip.png"
      class="card-img-top" alt="Example Image">
    <div class="card-body">
      <p>Kearsipan</p>

    </div>
  </a>
</div>

<div class="col-md-2">
  <a href="#"  class="card text-center shadow-sm" onclick='tag_kepegawaian()'>
    <img src="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/slider/pns.png"
      class="card-img-top" alt="Example Image">
    <div class="card-body">
      <p>Kepegawaian</p>

    </div>
  </a>
</div>
<!-- baris dua -->
<div class="col-md-2">
  <a href="#" class="card text-center shadow-sm" onclick='tag_kependudukan()'>
    <img src="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/slider/warga.png"
      class="card-img-top" alt="Example Image">
    <div class="card-body">
      <p>Kependudukan</p>

    </div>
  </a>
</div>

<div class="col-md-2">
  <a href="#"  class="card text-center shadow-sm" onclick='tag_kesehatan()'>
    <img src="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/slider/kesehatan.png"
      class="card-img-top" alt="Example Image">
    <div class="card-body">
      <p>Kesehatan</p>

    </div>
  </a>
</div>

<div class="col-md-2">
  <a href="#" class="card text-center shadow-sm" onclick='tag_keuangan()'>
    <img src="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/slider/uang.png"
      class="card-img-top" alt="Example Image">
    <div class="card-body">
      <p>Keuangan</p>

    </div>
  </a>
</div>

<div class="col-md-2">
  <a href="#"  class="card text-center shadow-sm" onclick='tag_pemerintahan()' >
    <img src="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/slider/pemerintahan.png"
      class="card-img-top" alt="Example Image">
    <div class="card-body">
      <p>Pemerintahan</p>

    </div>
  </a>
</div>

<div class="col-md-2">
  <a href="#" class="card text-center shadow-sm" onclick='tag_lingkungan()' >
    <img src="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/slider/lingkungan.png"
      class="card-img-top" alt="Example Image">
    <div class="card-body">
      <p>Lingkungan</p>

    </div>
  </a>
</div>

<div class="col-md-2">
  <a href="#"  class="card text-center shadow-sm"  onclick='tag_politik()' >
    <img src="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/slider/politik.png"
      class="card-img-top" alt="Example Image">
    <div class="card-body">
      <p>Politik</p>

    </div>
  </a>
</div>

</div>
      </div>

    </section>
	
	
	
	
		  
     <section id="features-details" class="features-details section">

    <?php include "view_semua_berita_front.php"; ?>
     
    </section>
	
		    <?php if ($this->uri->segment(1) == '') { ?>
	   <section id="features-details" class="features-details section">

    <?php include "view_mediajdih.php"; ?>
     
    </section>
		<?php }?>

    <!-- Clients Section -->
    <section id="clients" class="clients section">


      <?php include "tautan.php"; ?>

    </section><!-- /Clients Section -->

  </main>

  <footer id="footer" class="footer position-relative">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">JDIH KAB.BANDUNG</span>
          </a>
          <div class="footer-contact pt-3">
            <p> Jl. Al-Fathu, Pamekaran, Kec. Soreang, Kabupaten Bandung, </p>
            <p>Jawa Barat 40912</p>
            <p><strong>Email:</strong> <span>baghukum17@gmail.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
           <!-- <a href=""><i class="bi bi-twitter"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a> -->
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>site map Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Profil</a></li>
            <li><a href="#">Berita</a></li>
            <li><a href="#">Dokumen Hukum</a></li>
            <li><a href="#">Survey Layanan</a></li>
            <li><a href="#">Faq</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Layanan Kami</h4>
          <ul>
            <li><a href="#">Survei</a></li>
            <li><a href="#">Chat Online</a></li>

          </ul>

        </div>
 <?php $this->model_utama->kunjungan(); ?>
               <div class="col-lg-2 col-md-3 footer-links">
          <h4>Statistik Kunjungan</h4>
          <ul>
      <?php
              $pengunjung = $this->model_utama->pengunjung()->num_rows();
              $totalpengunjung = $this->model_utama->totalpengunjung()->row_array();
              $hits = $this->model_utama->hits()->row_array();
              $totalhits = $this->model_utama->totalhits()->row_array();
              $pengunjungonline = $this->model_utama->pengunjungonline()->num_rows();

              echo "<li class='download-catalog'>User Online &nbsp<span>$pengunjungonline</span></li>
                  <li class='download-catalog'>Today Visitor &nbsp<span>$pengunjung</span></li>
                  <li class='download-catalog'>Today Hit &nbsp<span>$hits[total]</span></li>
                   <li class='download-catalog'>Total pengunjung  &nbsp<span>$totalpengunjung[total]</span></li>";
              ?>
          </ul>

        </div>
<div class="col-lg-2 col-md-12 footer-newsletter">
  <h4>Aplikasi Mobile</h4>
  <p>Unduh aplikasi JDIH Kabupaten Bandung di Play Store:</p>
  <a href="https://play.google.com/store/apps/details?id=com.diskominfo.jdih_setda" target="_blank">
    <img src="https://play.google.com/intl/en_us/badges/static/images/badges/en_badge_web_generic.png" 
         alt="Get it on Google Play" 
         style="width: 160px;">
  </a>
</div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>JDIH (JARINGAN DOKUMEN DAN INFORMASI HUKUM)</span> <strong class="px-1 sitename"></strong><span>KABUPATEN BANDUNG</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->

      </div>
    </div>
   

<!-- Bootstrap JS + Popper -->

  </footer>
  <!--Start of Tawk.to Script-->

  <!--End of Tawk.to Script-->
  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script
    src="<?php echo base_url(); ?>template/<?php echo template(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>template/<?php echo template(); ?>/vendor/php-email-form/validate.js"></script>
  <script src="<?php echo base_url(); ?>template/<?php echo template(); ?>/vendor/aos/aos.js"></script>
  <script
    src="<?php echo base_url(); ?>template/<?php echo template(); ?>/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?php echo base_url(); ?>template/<?php echo template(); ?>/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="<?php echo base_url(); ?>template/<?php echo template(); ?>/js/main.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sienna-accessibility@latest/dist/sienna-accessibility.umd.js"
    defer></script>
 
 
 <!-- Modal Cari AI -->
   <div class="modal fade" id="modalCariAI" tabindex="-1" aria-labelledby="modalCariAILabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalCariAILabel"><i class="bi bi-stars text-warning"></i> Cari Dokumen Hukum dengan AI</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="formCariAI">
            <div class="mb-3">
              <label for="inputPertanyaanAI" class="form-label">Apa yang ingin Anda cari?</label>
              <textarea class="form-control" id="inputPertanyaanAI" rows="3" placeholder="Contoh: Ketik Kerjasama,Aplikasi, Anggaran, Bantuan Kemiskinan, Beasiswa,Perkebunan,Sampah"></textarea>
            </div>
            <div class="d-grid gap-2">
              <button type="submit" class="btn btn-primary" id="btnSubmitAI">
                <span id="btnTextAI">Tanya AI</span>
                <span id="btnLoadingAI" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
              </button>
            </div>
          </form>

          <hr>

          <div id="hasilPencarianAI" class="mt-3 d-none">
            <h6>Jawaban AI:</h6>
            <div id="jawabanAI_Content" class="alert alert-light border" style="white-space: pre-wrap;"></div>
            
            <h6 class="mt-3">Dokumen Terkait:</h6>
            <div id="dokumenAI_Content" class="list-group">
                <!-- List dokumen akan masuk sini -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  
  <script>
    $(document).ready(function() {
        $('#formCariAI').on('submit', function(e) {
            e.preventDefault();
            
            let query = $('#inputPertanyaanAI').val();
            if(!query.trim()) {
                alert("Silakan isi pertanyaan terlebih dahulu!");
                return;
            }

            // UI Loading State
            $('#btnSubmitAI').prop('disabled', true);
            $('#btnTextAI').text('Sedang Mencari...');
            $('#btnLoadingAI').removeClass('d-none');
            $('#hasilPencarianAI').addClass('d-none');
            $('#jawabanAI_Content').html('');
            $('#dokumenAI_Content').html('');

            $.ajax({
                url: "<?php echo site_url('Konsultasi/ajax_tanya'); ?>",
                type: "POST",
                dataType: "JSON",
                data: { pertanyaan: query },
                success: function(response) {
                    $('#btnSubmitAI').prop('disabled', false);
                    $('#btnTextAI').text('Tanya AI');
                    $('#btnLoadingAI').addClass('d-none');
                    $('#hasilPencarianAI').removeClass('d-none');

                    if(response.status === 'success') {
                        // Render Jawaban AI (Convert Newline to BR if needed, or stick to pre-wrap)
                        // response.answer might contain markdown, simple naive render here:
                         // Simple markdown link parser [text](url) -> <a href="url">text</a>
                         let formattedAnswer = response.answer
                            .replace(/\*\*(.*?)\*\*/g, '<b>$1</b>') // Bold
                            .replace(/\[(.*?)\]\((.*?)\)/g, '<a href="$2" target="_blank">$1</a>'); // Links

                        $('#jawabanAI_Content').html(formattedAnswer);
                        
                        // Render Dokumen
                        let docHtml = '';
                        if(response.documents && response.documents.length > 0) {
                            response.documents.forEach(function(doc, index) {
                                let downloadLink = doc.path_peraturan ? `<a href="<?php echo base_url(); ?>${doc.path_peraturan}" class="btn btn-sm btn-outline-primary ms-2" target="_blank"><i class="bi bi-download"></i> Download</a>` : '';
                                
                                // Logic for Collapse PDF Preview
                                let collapseHtml = '';
                                let titleHtml = `<div class="fw-bold">${doc.nama}</div>`;
                                
                                if(doc.path_peraturan && doc.path_peraturan.toLowerCase().endsWith('.pdf')) {
                                    let collapseId = `collapsePdf_${index}`;
                                    let pdfUrl = `<?php echo base_url(); ?>${doc.path_peraturan}`;
                                    
                                    // Make title clickable
                                    titleHtml = `
                                        <a class="fw-bold text-decoration-none text-dark" data-bs-toggle="collapse" href="#${collapseId}" role="button" aria-expanded="false" aria-controls="${collapseId}">
                                            <i class="bi bi-file-earmark-pdf text-danger"></i> ${doc.nama} <i class="bi bi-caret-down-fill small text-muted"></i>
                                        </a>
                                    `;
                                    
                                    collapseHtml = `
                                        <div class="collapse mt-2" id="${collapseId}">
                                          <div class="card card-body p-0">
                                            <iframe src="${pdfUrl}" style="width:100%; height:500px;" frameborder="0"></iframe>
                                          </div>
                                        </div>
                                    `;
                                }

                                docHtml += `
                                    <div class="list-group-item list-group-item-action">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                ${titleHtml}
                                                <small class="d-block text-muted">Nomor: ${doc.no} / Tahun: ${doc.tahun}</small>
                                            </div>
                                            ${downloadLink}
                                        </div>
                                        ${collapseHtml}
                                    </div>
                                `;
                            });
                        } else {
                            docHtml = '<div class="alert alert-warning">Tidak ada dokumen spesifik ditemukan di database lokal, namun AI memberikan jawaban berdasarkan pengetahuan umum/konteks yang ada.</div>';
                        }
                        $('#dokumenAI_Content').html(docHtml);

                    } else {
                        $('#jawabanAI_Content').text("Terjadi kesalahan: " + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    $('#btnSubmitAI').prop('disabled', false);
                     $('#btnTextAI').text('Tanya AI');
                    $('#btnLoadingAI').addClass('d-none');
                    $('#hasilPencarianAI').removeClass('d-none');
                    $('#jawabanAI_Content').text("Gagal menghubungi server: " + error);
                    console.error(xhr.responseText);
                }
            });
        });
    });
  </script>
 
 
 <script>
       function tag_pendidikan() {
      var form = document.createElement('form');
      form.method = 'POST';
      form.action = '<?php echo site_url('dokumen/tag'); ?>';

      // Tambahkan data ke dalam form jika diperlukan
      var hiddenField1 = document.createElement('input');
      hiddenField1.type = 'hidden';
      hiddenField1.name = 'searchName';
      hiddenField1.value = 'pendidikan';
      form.appendChild(hiddenField1);
      document.body.appendChild(form);
      form.submit();
    }

    function tag_tenagakerja() {
      var form = document.createElement('form');
      form.method = 'POST';
      form.action = '<?php echo site_url('dokumen/tag'); ?>';

      // Tambahkan data ke dalam form jika diperlukan
      var hiddenField1 = document.createElement('input');
      hiddenField1.type = 'hidden';
      hiddenField1.name = 'searchName';
      hiddenField1.value = 'tenaga kerja';
      form.appendChild(hiddenField1);
      document.body.appendChild(form);
      form.submit();
    }


    function tag_desa() {
      var form = document.createElement('form');
      form.method = 'POST';
      form.action = '<?php echo site_url('dokumen/tag'); ?>';

      // Tambahkan data ke dalam form jika diperlukan
      var hiddenField1 = document.createElement('input');
      hiddenField1.type = 'hidden';
      hiddenField1.name = 'searchName';
      hiddenField1.value = 'desa';
      form.appendChild(hiddenField1);
      document.body.appendChild(form);
      form.submit();
    }

    function tag_infrastruktur() {
      var form = document.createElement('form');
      form.method = 'POST';
      form.action = '<?php echo site_url('dokumen/tag'); ?>';

      // Tambahkan data ke dalam form jika diperlukan
      var hiddenField1 = document.createElement('input');
      hiddenField1.type = 'hidden';
      hiddenField1.name = 'searchName';
      hiddenField1.value = 'Infrastruktur';
      form.appendChild(hiddenField1);
      document.body.appendChild(form);
      form.submit();
    }


    function tag_kearsipan() {
      var form = document.createElement('form');
      form.method = 'POST';
      form.action = '<?php echo site_url('dokumen/tag'); ?>';

      // Tambahkan data ke dalam form jika diperlukan
      var hiddenField1 = document.createElement('input');
      hiddenField1.type = 'hidden';
      hiddenField1.name = 'searchName';
      hiddenField1.value = 'kearsipan';
      form.appendChild(hiddenField1);
      document.body.appendChild(form);
      form.submit();
    }

    function tag_kepegawaian() {
      var form = document.createElement('form');
      form.method = 'POST';
      form.action = '<?php echo site_url('dokumen/tag'); ?>';

      // Tambahkan data ke dalam form jika diperlukan
      var hiddenField1 = document.createElement('input');
      hiddenField1.type = 'hidden';
      hiddenField1.name = 'searchName';
      hiddenField1.value = 'kepegawaian';
      form.appendChild(hiddenField1);
      document.body.appendChild(form);
      form.submit();
    }


    function tag_kependudukan() {
      var form = document.createElement('form');
      form.method = 'POST';
      form.action = '<?php echo site_url('dokumen/tag'); ?>';

      // Tambahkan data ke dalam form jika diperlukan
      var hiddenField1 = document.createElement('input');
      hiddenField1.type = 'hidden';
      hiddenField1.name = 'searchName';
      hiddenField1.value = 'kependudukan';
      form.appendChild(hiddenField1);
      document.body.appendChild(form);
      form.submit();
    }

    function tag_kesehatan() {
      var form = document.createElement('form');
      form.method = 'POST';
      form.action = '<?php echo site_url('dokumen/tag'); ?>';

      // Tambahkan data ke dalam form jika diperlukan
      var hiddenField1 = document.createElement('input');
      hiddenField1.type = 'hidden';
      hiddenField1.name = 'searchName';
      hiddenField1.value = 'kesehatan';
      form.appendChild(hiddenField1);
      document.body.appendChild(form);
      form.submit();
    }


    function tag_keuangan() {
      var form = document.createElement('form');
      form.method = 'POST';
      form.action = '<?php echo site_url('dokumen/tag'); ?>';

      // Tambahkan data ke dalam form jika diperlukan
      var hiddenField1 = document.createElement('input');
      hiddenField1.type = 'hidden';
      hiddenField1.name = 'searchName';
      hiddenField1.value = 'keuangan';
      form.appendChild(hiddenField1);
      document.body.appendChild(form);
      form.submit();
    }



    function tag_pemerintahan() {
      var form = document.createElement('form');
      form.method = 'POST';
      form.action = '<?php echo site_url('dokumen/tag'); ?>';

      // Tambahkan data ke dalam form jika diperlukan
      var hiddenField1 = document.createElement('input');
      hiddenField1.type = 'hidden';
      hiddenField1.name = 'searchName';
      hiddenField1.value = 'pemerintahan';
      form.appendChild(hiddenField1);
      document.body.appendChild(form);
      form.submit();
    }

   
    function tag_lingkungan() {
      var form = document.createElement('form');
      form.method = 'POST';
      form.action = '<?php echo site_url('dokumen/tag'); ?>';

      // Tambahkan data ke dalam form jika diperlukan
      var hiddenField1 = document.createElement('input');
      hiddenField1.type = 'hidden';
      hiddenField1.name = 'searchName';
      hiddenField1.value = 'lingkungan';
      form.appendChild(hiddenField1);
      document.body.appendChild(form);
      form.submit();
    }

    function tag_politik() {
      var form = document.createElement('form');
      form.method = 'POST';
      form.action = '<?php echo site_url('dokumen/tag'); ?>';

      // Tambahkan data ke dalam form jika diperlukan
      var hiddenField1 = document.createElement('input');
      hiddenField1.type = 'hidden';
      hiddenField1.name = 'searchName';
      hiddenField1.value = 'politik';
      form.appendChild(hiddenField1);
      document.body.appendChild(form);
      form.submit();
    }




  </script>





  <style>
    .card-scroller {
      overflow: hidden;
      white-space: nowrap;
      width: 100%;
      position: relative;
      background-color: #2e6a4ecf;
    }

    .card-track {
      display: inline-flex;
      animation: scroll 50s linear infinite;
    }

    /* .card {
  min-width: 200px;
  flex-shrink: 5;
  border: 4px solid #ddd;
  border-radius: 8px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  background-color: #519575;
  color: black;
} */
    /* .card {
            width: 120px;
            height: 90px;
            background-color: purple;
            color: red;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .card h3 {
            margin: 0;
            font-size: 18px;
        }

        .card p {
            margin: 5px 0 0;
            font-size: 14px;
        } */
    /* Animation for scrolling */
    @keyframes scroll {
      0% {
        transform: translateX(0%);
      }

      100% {
        transform: translateX(-100%);
      }
    }
  </style>

  <style>
    @media (max-width: 768px) {
      .navbar-nav .nav-link {
        font-size: 14px;
        /* Adjust font size */
        padding: 10px;
        /* Adjust padding */
      }

      .navbar-brand {
        font-size: 16px;
        /* Adjust brand size */
      }
    }
  </style>
<!--Start of Tawk.to Script-->

<!--End of Tawk.to Script-->
</body>

</html>
