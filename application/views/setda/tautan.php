<style>
    .clients-carousel .carousel-item {
      display: flex;
      justify-content: center;
      gap: 10px; /* Mengatur jarak antar box */
    }
    .client-box {
      background-color: #f8f9fa;
      border: 1px solid #dee2e6;
      border-radius: 5px;
      padding: 20px;
      text-align: center;
      min-width: 150px;
    }
    .client-box img {
      max-width: 60%;
      height: auto;
    }
  </style>

<div class="container my-5">
  <h2 class="text-center mb-4">Tautan</h2>
  <div id="clientsCarousel" class="carousel slide clients-carousel" data-bs-ride="carousel">
    <div class="carousel-inner">
      <!-- Slide 1 -->
      <div class="carousel-item active">
        <div class="client-box">
       <a href="https://jdihn.go.id/"> <img src="https://jdih.menpan.go.id/assets/logo/jdih.svg" alt="Client 1"></a>  
         
        </div>
        <div class="client-box">
        <a href="https://jdih.jabarprov.go.id/">  <img src="https://jdih.jabarprov.go.id//assets/uploads/files/galeri/pemprov-jabar.png" alt="Client 2"></a> 
      
        </div>
        <div class="client-box">
        <a href="https://jdih.menpan.go.id">  <img src="https://jdih.menpan.go.id/assets/logo/jdih-panrb.svg" alt="Client 3"></a> 
      
        </div>
        <div class="client-box">
       <a href="https://www.lapor.go.id/">
    <img src="<?php echo base_url('asset/img_galeri/lapor.png'); ?>" alt="Client 4">
</a>
      
        </div>
  </div>
      <!-- Slide 2 -->
      <!-- <div class="carousel-item">
        <div class="client-box">
          <img src="https://via.placeholder.com/100x50" alt="Client 4">
          <p>Client 4</p>
        </div>
        <div class="client-box">
          <img src="https://via.placeholder.com/100x50" alt="Client 5">
          <p>Client 5</p>
        </div>
        <div class="client-box">
          <img src="https://via.placeholder.com/100x50" alt="Client 6">
          <p>Client 6</p>
        </div>
        <div class="client-box">
          <img src="https://via.placeholder.com/100x50" alt="Client 5">
          <p>Client 5</p>
        </div>
        <div class="client-box">
          <img src="https://via.placeholder.com/100x50" alt="Client 6">
          <p>Client 6</p>
        </div>
      </div> -->
    </div>
    <!-- Carousel Controls -->
    <button class="carousel-control-prev btn-primary" type="button" data-bs-target="#clientsCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next btn-primary" type="button" data-bs-target="#clientsCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>



   
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.6/css/dataTables.bootstrap.css">
