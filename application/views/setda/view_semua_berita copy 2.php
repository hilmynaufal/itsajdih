<section id="service-details" class="service-details section">

  <div class="container">

    <div class="row gy-5">

      <div class="col-lg-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">

        <div class="service-box">
          <h4>Kategori Produk Hukum</h4>

          <?php include "group_hukum.php"; ?>

        </div><!-- End Services List -->

        <div class="service-box">
          <h4>STATISTIK</h4>
          <div class="download-catalog">
            <!-- <a href="#"><i class="bi bi-filetype-pdf"></i><span>Catalog PDF</span></a>
    <a href="#"><i class="bi bi-file-earmark-word"></i><span>Catalog DOC</span></a> -->
            <ul>
              <?php
              $pengunjung = $this->model_utama->pengunjung()->num_rows();
              $totalpengunjung = $this->model_utama->totalpengunjung()->row_array();
              $hits = $this->model_utama->hits()->row_array();
              $totalhits = $this->model_utama->totalhits()->row_array();
              $pengunjungonline = $this->model_utama->pengunjungonline()->num_rows();

              echo "<li class='download-catalog'>User Online &nbsp<span>$pengunjungonline</span></li>
                        <li class='download-catalog'>Today Visitor &nbsp<span>$pengunjung</span></li>
                     
                        <li class='download-catalog'>Total pengunjung  &nbsp<span>$totalpengunjung[total]</span></li>";
              ?>
            </ul>
          </div>
        </div>

        <div class="help-box d-flex flex-column justify-content-center align-items-center">
          <i class="bi bi-headset help-icon"></i>
          <a href="https://tawk.to/chat/6641c6c607f59932ab3edaa5/1htof0ufb" target="_blank">
            <h4>Pertanyaan Bisa langsung Chat ?</h4>
          </a>
          <!-- <p class="d-flex align-items-center mt-2 mb-0"><i class="bi bi-telephone me-2"></i> <span>+1 5589 55488 55</span></p>
  <p class="d-flex align-items-center mt-1 mb-0"><i class="bi bi-envelope me-2"></i> <a href="https://tawk.to/chat/6641c6c607f59932ab3edaa5/1htof0ufb">Bertanya Disini</a></p> -->
        </div>

      </div>

      <div class="col-lg-8 ps-lg-5 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
        <img src="assets/img/services.jpg" alt="" class="img-fluid services-img">
        <h3>Temporibus et in vero dicta aut eius lidero plastis trand lined voluptas dolorem ut voluptas</h3>
        <p>
          Blanditiis voluptate odit ex error ea sed officiis deserunt. Cupiditate non consequatur et doloremque
          consequuntur. Accusantium labore reprehenderit error temporibus saepe perferendis fuga doloribus vero. Qui
          omnis quo sit. Dolorem architecto eum et quos deleniti officia qui.
        </p>
        <!-- <figure class="snip1527">
          <div class="image"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/pr-sample23.jpg"
              alt="pr-sample23" /></div>
          <figcaption>
            <div class="date"><span class="day">28</span><span class="month">Oct</span></div>
            <h3>The World Ended Yesterday</h3>
            <p>

              You know what we need, Hobbes? We need an attitude. Yeah, you can't be cool if you don't have an attitude.
            </p>
          </figcaption>
          <a href="#"></a>
        </figure> -->

        


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script
          src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>




      </div>

    </div>

  </div>

</section>
<style>
  .snip1527 {
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
    color: #fff;
    float: left;
    font-family: Lato, Arial, sans-serif;
    font-size: 16px;
    margin: 10px 1%;
    max-width: 310px;
    min-width: 250px;
    overflow: hidden;
    position: relative;
    text-align: left;
    width: 100%;
  }

  .snip1527 * {
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    -webkit-transition: all 0.25s ease;
    transition: all 0.25s ease;
  }

  .snip1527 img {
    max-width: 100%;
    vertical-align: top;
    position: relative;
  }

  .snip1527 figcaption {
    padding: 25px 20px;
    position: absolute;
    bottom: 0;
    z-index: 1;
  }

  .snip1527 figcaption:before {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    content: "";
    background: -moz-linear-gradient(90deg,
        #700877 0,
        #ff2759 100%,
        #ff2759 100%);
    background: -webkit-linear-gradient(90deg,
        #700877 0,
        #ff2759 100%,
        #ff2759 100%);
    background: linear-gradient(90deg, #700877 0, #ff2759 100%, #ff2759 100%);
    opacity: 0.8;
    z-index: -1;
  }

  .snip1527 .date {
    background-color: #fff;
    border-radius: 50%;
    color: #700877;
    font-size: 18px;
    font-weight: 700;
    min-height: 48px;
    min-width: 48px;
    padding: 10px 0;
    position: absolute;
    right: 15px;
    text-align: center;
    text-transform: uppercase;
    top: -25px;
  }

  .snip1527 .date span {
    display: block;
    line-height: 14px;
  }

  .snip1527 .date .month {
    font-size: 11px;
  }

  .snip1527 h3,
  .snip1527 p {
    margin: 0;
    padding: 0;
  }

  .snip1527 h3 {
    display: inline-block;
    font-weight: 700;
    letter-spacing: -0.4px;
    margin-bottom: 5px;
  }

  .snip1527 p {
    font-size: 0.8em;
    line-height: 1.6em;
    margin-bottom: 0;
  }

  .snip1527 a {
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    position: absolute;
    z-index: 1;
  }

  .snip1527.hover img,
  .snip1527:hover img {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
  }

  img {
    border-radius: 5px;
  }
</style>