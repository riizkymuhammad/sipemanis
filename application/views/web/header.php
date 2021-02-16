<?php $userdata = $this->session->userdata('data_id');
$menu 		= strtolower($this->uri->segment(1)); ?>
  <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <base href="<?php echo base_url(); ?>">

  <title><?= $judul_web; ?></title>
  <meta content="<?php echo $this->Mcrud->judul_web(); ?>" name="description">
  <meta content="<?php echo $this->Mcrud->judul_web(); ?>" name="keywords">

  <!-- Favicons -->
  <link href="img/favicon.ico" rel="icon">

  <!-- Google Fonts -->
  <link href="assets/page/css/font.css" rel="stylesheet">
  <script type="text/javascript" src="assets/page/js/jquery.js"></script>
  <!-- Vendor CSS Files -->
  <link href="assets/page/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/page/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/page/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">

  <link href="assets/page/vendor/aos/aos.css" rel="stylesheet">


  <!-- Template Main CSS File -->
  <link href="assets/page/css/style5.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Appland - v2.3.0
  * Template URL: https://bootstrapmade.com/free-bootstrap-app-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-scrolled">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
     
        <h4 class="text-light"><a href="index.html"> <img src="img/logo-sipemanis.png" style="height: 100px;"> Pengaduan <b>Laporan</b></a></h4>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class=<?php if($menu == 'index'){echo 'active';} ?>><a href="index.html">Beranda</a></li>
          <li class=<?php if($menu == 'pengaduan'){echo 'active';} ?> ><a href="pengaduan">Pengaduan</a></li>
          <li><a href="https://ict.umrah.ac.id/panduan-layanan">Panduan</a></li>
          <?php if ($userdata = $userdata ){ ?>
          <li class="get-started"><a href="web/login.html"><?php echo $this->Mcrud->d_pelapor($userdata,'nama_pelapor'); ?></a></li>
          <?php }else{ ?>
          <li class="get-started"><a href="web/login.html">Login</a></li>
          <?php } ?>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->