<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SIBANJIR - Halaman Depan</title>
  <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}">
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/front/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/front/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/front/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/front/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/front/vendor/venobox/venobox.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/front/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/front/vendor/aos/aos.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/front/css/style.css') }}" rel="stylesheet">
  <!-- =======================================================
  * Template Name: Arsha - v2.0.0
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.html" style="font-size: 16px !important;">
        <img src="{{ asset('assets/images/bmkg.png') }}" style="width: "> Sistem Informasi Daerah Rawan Banjir
      </a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="#hero">Home</a></li>
          <li><a href="{{ route('peta_saw') }}">Peta SAW</a></li>
          <li><a href="{{ route('grafik_saw') }}">Grafik SAW</a></li>
          <li><a href="{{ route('grafik_linear') }}">Grafik Linear</a></li>
          {{-- <li>
            <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox btn-watch-video" data-vbtype="video" data-autoplay="true"> Video <i class="icofont-play-alt-2"></i></a>
          </li> --}}

        </ul>
      </nav><!-- .nav-menu -->

      <a href="{{ route('login') }}" target="_blank" class="get-started-btn scrollto">Login</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" style="height:30vh !important;" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-12 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200" style="text-align:center;">
          <h5 style="color: white;">Sepanjang Daerah Yang DIlewati SUB DAS(Daerah Aliran Sungai) <br> Bengkulu Hilir</h5>
          
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <div class="d-lg-flex">
          </div>
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>PETA HASIL METODE SAW PERBULAN  <br> (TAHUN 2014-2018)</h2>
          <p>Ditampilkan menggunakan google maps API</p>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
            @yield('maps')
        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Grafik Urutan Cluster SAW Cluster Tinggi Terbanyak  <br> (TAHUN 2014-2018)</h2>
          <p>Grafik dibawah hanya menampilkan hasil cluster SAW terbanyak setiap tahunnya, jika ingin melihat lebih detail, silagkan klik menu Grafik SAW di Navigasi Menu</p>
        </div>

        <div class="row">
          <div class="col-lg-12 col-md-12">
            @yield('grafik-saw')
          </div>
        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>GRAFIK NILAI TREN NON LINIER TERTINGGI SETIAP TAHUN</h2>
          <p>Ditempilkan menggunakan amcharts</p>
        </div>

        <div class="row">

          <div class="col-lg-12 col-md-12" data-aos="fade-up" data-aos-delay="100">
            @yield('grafik-linear')
          </div>

        </div>

      </div>
    </section><!-- End Pricing Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">


    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>Arsha</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/front/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/front/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/front/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('assets/front/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/front/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('assets/front/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/front/vendor/venobox/venobox.min.js') }}"></script>
  <script src="{{ asset('assets/front/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('assets/front/vendor/aos/aos.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/front/js/main.js') }}"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNUmHx3Et1_3SI2gQOe23vG0olB5cAmkk"></script>
  @stack('scripts')
</body>

</html>