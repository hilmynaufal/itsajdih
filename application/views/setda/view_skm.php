<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SKM KAB BANDUNG</title>

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

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

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
<body>

    <style>
        body {
        margin: 0;
        min-height: 100vh;
        background: 
        linear-gradient(rgba(240, 240, 240, 0.6), rgba(240,240,240,0.6)),
        /* url("../Code/hero-bg-light.webp") path gambar */
        url("template/setda/img/hero-bg-light.webp");
        background-size: cover;        /* penuhi layar */
        background-position: center;   /* fokus tengah */
        background-repeat: no-repeat;
        }

        .main-wrapper {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        }

        .main-card {
        background: #eaffff;
        border-radius: 16px;
        padding: 20px;
        max-width: 840px; /* ⬅️ BESAR */
        width: 100%;
        }

        .glass {
        background: rgba(255, 255, 255, 0.25); /* transparan */
        backdrop-filter: blur(14px);
        -webkit-backdrop-filter: blur(14px);
        border: 1px solid rgba(255, 255, 255, 0.4);
        }
    </style>

    <div class="main-wrapper">
        <div class="main-card glass shadow">
            <!-- <img src="../Code/skm.png" class="img-fluid w-100 rounded" alt="E-SKM"> -->
            <img src="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/skm.png" class="img-fluid w-100 rounded" alt="E-SKM">
        </div>
    </div>

</body>
</html>