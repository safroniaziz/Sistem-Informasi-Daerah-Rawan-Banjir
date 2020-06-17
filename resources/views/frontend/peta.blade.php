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
          <li><a href="{{ route('front') }}">Home</a></li>
          <li class="active"><a href="{{ route('peta_saw') }}">Peta SAW</a></li>
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
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
            <div class="col-lg-12 col-md-12 portfolio-item filter-app">
                <form action="{{ route('peta_saw') }}" method="GET">
                    {{ csrf_field() }}
                   <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Pilih Tahun</label>
                            <select name="tahun" id="tahun" class="form-control" required>
                                <option value="" selected disabled>-- pilih tahun --</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                            </select>
                        </div>
            
                        <div class="form-group col-md-6">
                            <label for="">Pilih Bulans</label>
                            <select name="bulan" id="bulan" class="form-control" required>
                                <option value="" selected disabled>-- pilih bulan --</option> 
                                <option value="januari">januari</option>
                                <option value="februari">februari</option>
                                <option value="maret">maret</option>
                                <option value="april">April</option>
                                <option value="mei">Mei</option>
                                <option value="juni">Juni</option>
                                <option value="juli">Juli</option>
                                <option value="agustus">Agustus</option>
                                <option value="september">September</option>
                                <option value="oktober">Oktober</option>
                                <option value="november">November</option>
                                <option value="desember">Desember</option>
                            </select>
                        </div>
                        <div class="col-md-12" style="margin-bottom:10px; text-align:center;">
                          <a onclick="keterangan_daerah()" id="tombol_keterangan_daerah" class="btn btn-info btn-sm" style="color: white; cursor:pointer;"><i class="fa fa-info-circle"></i>&nbsp; Lihat Keterangan Daerah</a>
                          <a onclick="sembunyikan_daerah()" id="tombol_sembunyikan_daerah" class="btn btn-success btn-sm" style="color: white; cursor:pointer; display:none;"><i class="fa fa-info-circle"></i>&nbsp; Sembunyikan Keterangan Daerah</a>

                          <a onclick="keterangan()" id="tombol_keterangan" class="btn btn-success btn-sm" style="color: white; cursor:pointer;"><i class="fa fa-info-circle"></i>&nbsp; Lihat Keterangan</a>
                          <a onclick="sembunyikan()" id="tombol_sembunyikan" class="btn btn-success btn-sm" style="color: white; cursor:pointer; display:none;"><i class="fa fa-info-circle"></i>&nbsp; Sembunyikan Keterangan</a>
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-searach"></i>&nbsp; Tampilkan Peta</button>
                        </div>
                        <div class="col-md-12" style="margin-bottom:10px; text-align:center; display:none;" id="keterangan_daerah">
                          <h5>Keterangan Legenda</h5>
                          <table style="margin:0 auto !important; width:50% !important;" class="">
                              <tr>
                                  <th>Warna Poligon</th>
                                  <th>Nama Kecamatan</th>
                              </tr>
                              <tr>
                                  <td>
                                      <div style="padding:5px; background:#8a1652;"></div>
                                  </td>
                                  <td>RawaMakmur</td>
                              </tr>
                              <tr>
                                  <td>
                                      <div style="padding:5px; background:#b099a5;"></div>
                                  </td>
                                  <td>Bentiring</td>
                              </tr>
                              <tr>
                                  <td>
                                      <div style="padding:5px; background:#6d9ff2;"></div>
                                  </td>
                                  <td>Bentiring Permai</td>
                              </tr>
                              <tr>
                                  <td>
                                      <div style="padding:5px; background:#0fa1e0;"></div>
                                  </td>
                                  <td>Beringin Raya</td>
                              </tr>
                              <tr>
                                  <td>
                                      <div style="padding:5px; background:#ebba34;"></div>
                                  </td>
                                  <td>Kandang Limun</td>
                              </tr>
                              <tr>
                                  <td>
                                      <div style="padding:5px; background:#2de349;"></div>
                                  </td>
                                  <td>Pematang Gubernur</td>
                              </tr>
                              <tr>
                                  <td>
                                      <div style="padding:5px; background:#00ffff;"></div>
                                  </td>
                                  <td>Pasar Bengkulu</td>
                              </tr>
                              <tr>
                                  <td>
                                      <div style="padding:5px; background:#ff00ff;"></div>
                                  </td>
                                  <td>Kampung Kelawi</td>
                              </tr>
                              <tr>
                                  <td>
                                      <div style="padding:5px; background:#ff8000;"></div>
                                  </td>
                                  <td>Sukamerindu</td>
                              </tr>
                              <tr>
                                  <td>
                                      <div style="padding:5px; background:#e60000;"></div>
                                  </td>
                                  <td>Tanjung Agung</td>
                              </tr>
                              <tr>
                                  <td>
                                      <div style="padding:5px; background:#4287f5;"></div>
                                  </td>
                                  <td>Tanjung Jaya</td>
                              </tr>
                              <tr>
                                  <td>
                                      <div style="padding:5px; background:#bf73eb;"></div>
                                  </td>
                                  <td>Semarang</td>
                              </tr>
                              <tr>
                                  <td>
                                      <div style="padding:5px; background:#eb73d3;"></div>
                                  </td>
                                  <td>Surabaya</td>
                              </tr>
                          </table>
                      </div>
                        <div class="col-md-12" style="margin-bottom:10px; text-align:center; display:none;" id="keterangan">
                          <h5>Keterangan Legenda</h5>
                          <table style="margin:0 auto !important; width:50% !important;" class="">
                              <tr>
                                  <th>Keterangan Warna</th>
                                  <th>Warna Poligon</th>
                                  <th>Keterangan</th>
                              </tr>
                              <tr>
                                  <td>Hijau Tua</td>
                                  <td>
                                      <div style="padding:5px; background:#3c7d4d;"></div>
                                  </td>
                                  <td>Sangat Rendah</td>
                              </tr>
                              <tr>
                                  <td>Hijau</td>
                                  <td>
                                      <div style="padding:5px; background:#0ff24b;"></div>
                                  </td>
                                  <td>Rendah</td>
                              </tr>
                              <tr>
                                <td>Kuning</td>
                                <td>
                                    <div style="padding:5px; background:#f9fc14;"></div>
                                </td>
                                <td>Sedang</td>
                            </tr>
                            <tr>
                              <td>Orange</td>
                              <td>
                                  <div style="padding:5px; background:#ed891f;"></div>
                              </td>
                              <td>Tinggi</td>
                          </tr>
                          <tr>
                            <td>Merah</td>
                            <td>
                                <div style="padding:5px; background:#f52c11;"></div>
                            </td>
                            <td>Sangat Tinggi</td>
                        </tr>

                          </table>
                      </div>
                      
                   </div>
                </form>
                <div>
                  <p style="text-align: center">
                    @if (!isset($_GET['tahun']))
                      Silahkan pilih tahun dan bulan terlebih dahulu    
                      @else
                      Menampilkan Peta Pada Tahun {{ $_GET['tahun'] }} dan Bulan {{ $_GET['bulan'] }} di Setiap Kelurahan
                    @endif
                </p>
                </div>
                <div id="maps" style="width: 100%; height:600px;">
                </div> 
            </div>
        </div>

      </div>
    </section><!-- End Portfolio Section -->
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
<script>
  function keterangan(){
      $('#keterangan').show(300);
      $('#tombol_sembunyikan').show(300);
      $('#tombol_keterangan').hide(300);
      $('#keterangan_daerah').hide(300);
      $('#tombol_sembunyikan_daerah').hide(300);
  }

  function sembunyikan(){
      $('#keterangan').hide(300);
      $('#tombol_sembunyikan').hide(300);
      $('#tombol_keterangan').show(300);
      $('#keterangan_daerah').hide(300);
      $('#tombol_sembunyikan_daerah').hide(300);  
  }

  function keterangan_daerah(){
      $('#keterangan').hide(300);
      $('#tombol_sembunyikan').hide(300);
      $('#keterangan_daerah').show(300);
      $('#tombol_sembunyikan_daerah').show(300);
      $('#tombol_keterangan_daerah').hide(300);
  }

  function sembunyikan_daerah(){
      $('#keterangan').hide(300);
      $('#tombol_sembunyikan').hide(300);
      $('#tombol_keterangan').show(300);
      $('#keterangan_daerah').hide(300);
      $('#tombol_sembunyikan_daerah').hide(300);
      $('#tombol_keterangan_daerah').show(300);
  }
</script>

<script>
    var map;
      var initMap = function() {
           map = new google.maps.Map(document.getElementById('maps'), {
              zoom: 13,
              center: {lat: -3.764385, lng: 102.279819},
              mapTypeId: google.maps.MapTypeId.HYBRID
          });

          <?php for($i=0;$i<count($array);$i++){?>
                  var pasanganTitikarraya = [
                      <?php 
                        for($a=0; $a<count($array[$i]['koordinat']); $a++){?>
                          {lat:parseFloat(<?php echo $array[$i]['koordinat'][$a]['lat'] ?>), lng:parseFloat(<?php echo $array[$i]['koordinat'][$a]['long']?>)},
                            
                        <?php } ?>
                  ];

                  <?php 
                        if ($array[$i]['clustering'] == "Rendah") { ?>
                            var array = new google.maps.Polygon({
                                paths: pasanganTitikarraya,
                                strokeColor: '#0ff24b',
                                strokeOpacity: 0.8,
                                strokeWeight: 3,
                                fillColor: '#0ff24b',
                                fillOpacity: 0.35
                            });
                        <?php 
                    } elseif($array[$i]['clustering'] == "Sangat Rendah") {?>
                        var array = new google.maps.Polygon({
                                paths: pasanganTitikarraya,
                                strokeColor: '#3c7d4d',
                                strokeOpacity: 0.8,
                                strokeWeight: 3,
                                fillColor: '#3c7d4d',
                                fillOpacity: 0.35
                            });
                        <?php
                    }
                    elseif($array[$i]['clustering'] == "Sedang") {?>
                        var array = new google.maps.Polygon({
                                paths: pasanganTitikarraya,
                                strokeColor: '#f9fc14',
                                strokeOpacity: 0.8,
                                strokeWeight: 3,
                                fillColor: '#f9fc14',
                                fillOpacity: 0.35
                            });
                        <?php
                    }
                    elseif($array[$i]['clustering'] == "Tinggi") {?>
                        var array = new google.maps.Polygon({
                                paths: pasanganTitikarraya,
                                strokeColor: '#ed891f',
                                strokeOpacity: 0.8,
                                strokeWeight: 3,
                                fillColor: '#ed891f',
                                fillOpacity: 0.35
                            });
                        <?php
                    }

                    elseif($array[$i]['clustering'] == "Sangat Tinggi") {?>
                        var array = new google.maps.Polygon({
                                paths: pasanganTitikarraya,
                                strokeColor: '#f52c11',
                                strokeOpacity: 0.8,
                                strokeWeight: 3,
                                fillColor: '#f52c11',
                                fillOpacity: 0.35
                            });
                        <?php
                    }
                  ?>

                  array.setMap(map);
          <?php }?>

      }
      initMap()

</script>