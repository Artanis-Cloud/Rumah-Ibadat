<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
{{--
  {{-- <title>Rumah Ibadat</title> --}}
  <meta content="" name="description">
  <meta content="" name="keywords">

  {{-- w3school --}}
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <!-- Favicons -->
  <link href="{{ asset('Regna/assets/img/selangor-icon.png') }}" rel="icon">
  <link href="{{ asset('Regna/assets/img/selangor-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('Regna/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('Regna/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('Regna/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('Regna/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('Regna/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('Regna/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

  <!-- Template Main CSS File -->
  <link href="{{ asset('Regna/assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Regna - v4.1.0
  * Template URL: https://bootstrapmade.com/regna-bootstrap-onepage-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
    section {
      /* margin-top: 50px; */
    }

    .pieID {
      display: inline-block;
      vertical-align: top;
    }

    .pie {
      height: 200px;
      width: 200px;
      position: relative;
      margin: 0 0px 30px 0;
    }

    .pie::before {
      content: "";
      display: block;
      position: absolute;
      z-index: 1;
      width: 100px;
      height: 100px;
      background: #EEE;
      border-radius: 50%;
      top: 50px;
      left: 50px;
    }

    .pie::after {
      content: "";
      display: block;
      width: 120px;
      height: 2px;
      background: rgba(0, 0, 0, 0.1);
      border-radius: 50%;
      box-shadow: 0 0 3px 4px rgba(0, 0, 0, 0.1);
      margin: 220px auto;
    }

    .slice {
      position: absolute;
      width: 200px;
      height: 200px;
      clip: rect(0px, 200px, 200px, 100px);
      animation: bake-pie 1s;
    }

    .slice span {
      display: block;
      position: absolute;
      top: 0;
      left: 0;
      background-color: black;
      width: 200px;
      height: 200px;
      border-radius: 50%;
      clip: rect(0px, 200px, 200px, 100px);
    }

    .legend {
      list-style-type: none;
      padding: 0;
      margin: 0;
      background: #FFF;
      padding: 15px;
      font-size: 13px;
      box-shadow: 1px 1px 0 #DDD, 2px 2px 0 #BBB;
    }

    .legend li {
      width: 110px;
      height: 1.25em;
      margin-bottom: 0.7em;
      padding-left: 0.5em;
      border-left: 1.25em solid black;
    }

    .legend em {
      font-style: normal;
    }

    .legend span {
      float: right;
    }
  </style>

  <style media="screen">

    .skills-bar-container {
    position: relative;
    width: 80%;
    min-width: 300px;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    list-style: none;
    }
    .skills-bar-container li {
    position: relative;
    width: 100%;
    padding: 5px;
    margin-bottom: 10px;
    }
    .skills-bar-container li .progressbar-title {
    color: #000000;
    }
    .skills-bar-container li .progressbar-title h3 {
    display: inline-block;
    }
    .skills-bar-container li .progressbar-title .percent {
    position: absolute;
    right: 5px;
    font-size: 15px;
    }
    .skills-bar-container li .bar-container {
    background: #555;
    position: relative;
    width: 100%;
    height: 10px;
    margin-top: 5px;
    display: block;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    -ms-border-radius: 5px;
    border-radius: 5px;
    }
    .skills-bar-container li .bar-container .progressbar {
    position: absolute;
    width: 0%;
    height: 100%;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    -ms-border-radius: 5px;
    border-radius: 5px;
    -webkit-animation-duration: 2s;
    animation-duration: 2s;
    -webkit-animation-timing-function: ease-out;
    animation-timing-function: ease-out;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;
    }
    .skills-bar-container li .bar-container #progress-html {
    -webkit-animation-name: progress-html;
    animation-name: progress-html;
    -webkit-animation-delay: 0.7s;
    animation-delay: 0.7s;
    }
    .skills-bar-container li .bar-container #progress-css {
    -webkit-animation-name: progress-css;
    animation-name: progress-css;
    -webkit-animation-delay: 1.4s;
    animation-delay: 1.4s;
    }
    .skills-bar-container li .bar-container #progress-javascript {
    -webkit-animation-name: progress-javascript;
    animation-name: progress-javascript;
    -webkit-animation-delay: 2.1s;
    animation-delay: 2.1s;
    }
    .skills-bar-container li .bar-container #progress-php {
    -webkit-animation-name: progress-php;
    animation-name: progress-php;
    -webkit-animation-delay: 2.8s;
    animation-delay: 2.8s;
    }
    .skills-bar-container li .bar-container #progress-angular {
    -webkit-animation-name: progress-angular;
    animation-name: progress-angular;
    -webkit-animation-delay: 3.5s;
    animation-delay: 3.5s;
    }

    .progressred {
    background-color: #c0392b;
    }

    .progressblue {
    background-color: #1199ff;
    }

    .progresspurple {
    background-color: #9b59b6;
    }

    .progressorange {
    background-color: #ffa500;
    }

    .progressgreen {
    background-color: #27ae60;
    }

    @-webkit-keyframes progress-html {
    0% {
      width: 0%;
    }
    100% {
      width: 100%;
    }
    }
    @-webkit-keyframes progress-css {
    0% {
      width: 0%;
    }
    100% {
      width: 90%;
    }
    }
    @-webkit-keyframes progress-javascript {
    0% {
      width: 0%;
    }
    100% {
      width: 70%;
    }
    }
    @-webkit-keyframes progress-php {
    0% {
      width: 0%;
    }
    100% {
      width: 55%;
    }
    }
    @-webkit-keyframes progress-angular {
    0% {
      width: 0%;
    }
    100% {
      width: 65%;
    }
    }
    @-moz-keyframes progress-html {
    0% {
      width: 0%;
    }
    100% {
      width: 100%;
    }
    }
    @-moz-keyframes progress-css {
    0% {
      width: 0%;
    }
    100% {
      width: 90%;
    }
    }
    @-moz-keyframes progress-javascript {
    0% {
      width: 0%;
    }
    100% {
      width: 70%;
    }
    }
    @-moz-keyframes progress-php {
    0% {
      width: 0%;
    }
    100% {
      width: 55%;
    }
    }
    @-moz-keyframes progress-angular {
    0% {
      width: 0%;
    }
    100% {
      width: 65%;
    }
    }
    @keyframes progress-html {
    0% {
      width: 0%;
    }
    100% {
      width: 100%;
    }
    }
    @keyframes progress-css {
    0% {
      width: 0%;
    }
    100% {
      width: 90%;
    }
    }
    @keyframes progress-javascript {
    0% {
      width: 0%;
    }
    100% {
      width: 70%;
    }
    }
    @keyframes progress-php {
    0% {
      width: 0%;
    }
    100% {
      width: 55%;
    }
    }
    @keyframes progress-angular {
    0% {
      width: 0%;
    }
    100% {
      width: 65%;
    }
    }
  </style>

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex justify-content-between align-items-center">

      <div id="logo">
        <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/90/Coat_of_arms_of_Selangor.svg/1200px-Coat_of_arms_of_Selangor.svg.png" style="width: auto; height: 60px; margin-top: -50%;" alt="Kerajaan Selangor"></a>
      </div>
        <span style="color: #fff;">
            <h4 style="color: #fff;">Sistem Bantuan Kewangan <br> Rumah Ibadat Selain Islam</h4>
        </span>
    <br>
      <div>

      </div>



      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Laman Utama</a></li>
          <li><a class="nav-link scrollto" href="#about">Pengenalan Sistem</a></li>
          <li><a class="nav-link scrollto" href="#services">Statistik</a></li>
          <li><a class="nav-link scrollto" href="#contact">Hubungi Kami</a></li>





          {{-- <li><a class="nav-link scrollto" href="#services">Services</a></li> --}}
          {{-- <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li> --}}
          {{-- <li><a class="nav-link scrollto" href="#team">Team</a></li> --}}
          {{-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>header
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> --}}
          {{-- <li>
            @auth
            <a href="#" class="nav-link scrollto" onclick="event.preventDefault(); document.getElementById('logoutform').submit();"> LOG KELUAR </a>
            <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            @endauth
            @guest
                <a href="{{ route('login') }}" class="nav-link scrollto"> LOG MASUK </a>
            @endguest
          </li> --}}
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>

  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="10">
      <h2>Selamat Datang ke</h2>
      <h1>Sistem Bantuan Kewangan Rumah Ibadat <br>Selain Islam (RISI)</h1>
      @auth
        <a href="#" class="btn-get-started" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">Log Keluar</a>
        <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
      @endauth
      @guest
          <div class="row">
            <div class="col-md-6">
              <a href="{{ route('login') }}" class="btn-get-started btn-block">Log&nbspMasuk</a>
            </div>
            <div class="col-md-6">
              <a href="{{ route('register') }}" class="btn-get-started btn-block">Daftar&nbspMasuk</a>
            </div>
          </div>
      @endguest
    </div>
    <div style="position: absolute; bottom: 0px; width: 100%;background-color: #d5fc00;" >
      <marquee direction="left" scrollamount="10" style="padding-top: 5px; color: black;">
      @foreach ($pengumuman as $data)
          <span style="font-size: 15pt;"><b>[</b>  <b>{{ $data->title }} &nbsp&nbsp&nbsp&nbsp-&nbsp&nbsp&nbsp&nbsp</b>{{ $data->content }} <b>]</b> &nbsp&nbsp&nbsp&nbsp</span>
      @endforeach
      </marquee>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about">
      {{-- <div class="section-header">
        <h3 class="section-title" style="padding-bottom: 15px;">Pengenalan Sistem</h3>
      </div> --}}
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-md">
            <h2 class="title">{{ $csm->intro_title }}</h2>
            <p style="text-align: justify;">
              {{ $csm->intro_content }}
            </p>

          </div>
          <div class="col-md-8">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                @foreach ( $banner as $key => $data2)
                  @if ($loop->first)
                  <li data-target="#myCarousel" data-slide-to="{{ $key }}" class="active"></li>
                  @else
                <li data-target="#myCarousel" data-slide-to="{{ $key }}"></li>
                  @endif
                @endforeach
              </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner">
              
                @foreach ($banner as $key => $data2)
                    @if ($loop->first)
                    <div class="item active">
                      <img src="{{ asset( $image_path = str_replace('public', 'storage',  $data2->url)) }}" style="width:100%; height: 300px !important;">
                    </div>
                    @else 
                    <div class="item">
                      <img src="{{ asset( $image_path = str_replace('public', 'storage',  $data2->url)) }}" alt="New york" style="width:100%; height: 300px !important;">
                    </div>
                    @endif
                @endforeach
              </div>

              

              <!-- Left and right controls -->
              <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>

          </div>

        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Facts Section ======= -->
    {{-- <section id="facts">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h3 class="section-title">Perutusan Dewan Negeri Selangor</h3>
          <p class="section-description">Y.B. Dato’ Teng Chang Khim</p>
        </div>
        <div class="row counters">

          <div class="text-center col-lg-3 col-6">
            <img src="http://dewan.selangor.gov.my/wp-content/uploads/2019/01/N45-YB-BANDAR-BARU-KLANG-200x300.jpg" alt="New york" style="width:100%;">
          </div>

          <div class="text-center col-lg-9 col-6">
            <p>"Alamat: Pusat Khidmat Dun Bandar Baru Klang LG-4, 1E Jalan Pekan Baru 34, 41010 Klang, Selangor

                Portfolio: Pengerusi Jawatankuasa Tetap Pelaburan, Perdagangan & Perindustrian dan Industri Kecil Dan Sederhana (IKS)

                Tempat: N45 Bandar Baru Klang

                Tel: 03-3341 4982

                E-mel: khim@selangor.gov.my"</p>
                <p class="">(Y.B. Dato’ Teng Chang Khim, 2021)</p>
          </div>

        </div>

      </div>
    </section><!-- End Facts Section --> --}}

    <!-- ======= Services Section ======= -->
    <section id="services" style=" background-image: url('/img/bg-statistik.png');background-blend-mode: luminosity;">
      <div class="section-header">
        <h3 class="section-title">Statistik</h3>
      </div>
      {{-- <section class="charts_orb">
        <article class="orb">
          <div class="orb_graphic">
            <svg>
              <circle class="fill"></circle>
              <circle class="progress"></circle>
            </svg>
            <div class="orb_value count">{{ $count_pemohon }}</div>
          </div>
          <div class="orb_label">
             Pengguna
          </div>
        </article>

        <article class="orb">
          <div class="orb_graphic">
            <svg>
              <circle class="fill"></circle>
              <circle class="progress"></circle>
            </svg>
            <div class="orb_value count">{{ $count_rumah_ibadat }}</div>
          </div>
          <div class="orb_label">
            Rumah Ibadat
          </div>
        </article>

        <article class="orb">
          <div class="orb_graphic">
            <svg>
              <circle class="fill"></circle>
              <circle class="progress"></circle>
            </svg>
            <div class="orb_value count">{{ $count_permohonan }}</div>
          </div>
          <div class="orb_label">
            Permohonan
          </div>
        </article>

      </section> --}}
      {{-- <table>
        <tr>
          <td rowspan="2">
            <div id="donutchart" style=" width: 900px; height: 500px;"></div>
          </td>
          <td>
            <div class="col">
              <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
              </div>
            </div>
          </td>
          <td>
            <div class="progress">
              <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
            </div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="progress">
              <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
            </div>
          </td>
          <td>
            <div class="progress">
              <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
            </div>
          </td>
        </tr>
        <tr>
          <td></td>
          <td></td>
        </tr>
      </table> --}}

      <div class="row">
        <div class="col-md" style="text-align: center; padding-top: 30px;">
          <section>
            <div class="pieID pie">

            </div>
            <ul class="pieID legend">
              <li>
                <em>Humans</em>
                <span>9000</span>
              </li>
              <li>
                <em>Dogs</em>
                <span>531</span>
              </li>
              <li>
                <em>Cats</em>
                <span>868</span>
              </li>
              <li>
                <em>Slugs</em>
                <span>344</span>
              </li>
              <li>
                <em>Aliens</em>
                <span>1145</span>
              </li>
            </ul>
          </section>

        </div>
        <div class="col-md-5">


          <ul class="skills-bar-container">

          <li>
            <div class="progressbar-title">
              <h3>HTML5</h3>
              <span class="percent" id="html-pourcent"></span>
            </div>
            <div class="bar-container">
              <span class="progressbar progressred" id="progress-html"></span>

            </div>
          </li>
          <li>
            <div class="progressbar-title">
              <h3>CSS / SASS</h3>
              <span class="percent" id="css-pourcent"></span>
            </div>
            <div class="bar-container">
              <span class="progressbar progressblue" id="progress-css"></span>
            </div>
          </li>


          <li>
            <div class="progressbar-title">
              <h3>JavaScript / jQuery</h3>
              <span class="percent" id="javascript-pourcent"></span>
            </div>
            <div class="bar-container">
              <span class="progressbar progresspurple" id="progress-javascript"></span>
            </div>
          </li>

          <li>
            <div class="progressbar-title">
              <h3>PHP</h3>
              <span class="percent" id="php-pourcent"></span>
            </div>
            <div class="bar-container">
              <span class="progressbar progressorange" id="progress-php"></span>

            </div>
          </li>

        </ul>


        </div>


      </div>

    </section><!-- End Services Section -->

    <!-- ======= Call To Action Section ======= -->
    {{-- <section id="call-to-action">
      <div class="container">
        <div class="row" data-aos="zoom-in">
          <div class="text-center col-lg-9 text-lg-start">
            <h3 class="cta-title">Call To Action</h3>
            <p class="cta-text"> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          <div class="text-center col-lg-3 cta-btn-container">
            <a class="align-middle cta-btn" href="#">Call To Action</a>
          </div>
        </div>

      </div>
    </section><!-- End Call To Action Section --> --}}

    <!-- ======= Portfolio Section ======= -->
    {{-- <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h3 class="section-title">Portfolio</h3>
          <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>App 1</h4>
              <p>App</p>
              <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Web 3</h4>
              <p>Web</p>
              <a href="assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>App 2</h4>
              <p>App</p>
              <a href="assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 2"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Card 2</h4>
              <p>Card</p>
              <a href="assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 2"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Web 2</h4>
              <p>Web</p>
              <a href="assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 2"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>App 3</h4>
              <p>App</p>
              <a href="assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 3"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Card 1</h4>
              <p>Card</p>
              <a href="assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 1"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Card 3</h4>
              <p>Card</p>
              <a href="assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 3"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Web 3</h4>
              <p>Web</p>
              <a href="assets/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Section --> --}}

    <!-- ======= Team Section ======= -->
    {{-- <section id="team">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h3 class="section-title">Team</h3>
          <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="pic"><img src="assets/img/team-1.jpg" alt=""></div>
              <h4>Walter White</h4>
              <span>Chief Executive Officer</span>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="fade-up" data-aos-delay="200">
              <div class="pic"><img src="assets/img/team-2.jpg" alt=""></div>
              <h4>Sarah Jhinson</h4>
              <span>Product Manager</span>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="fade-up" data-aos-delay="300">
              <div class="pic"><img src="assets/img/team-3.jpg" alt=""></div>
              <h4>William Anderson</h4>
              <span>CTO</span>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="fade-up" data-aos-delay="400">
              <div class="pic"><img src="assets/img/team-4.jpg" alt=""></div>
              <h4>Amanda Jepson</h4>
              <span>Accountant</span>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Team Section --> --}}

    <!-- ======= Contact Section ======= -->
    <section id="contact">
      <div class="container">
        <div class="section-header">
          <h3 class="section-title">HUBUNGI KAMI</h3>
          {{-- <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>SS --}}
        </div>
      </div>

      <!-- Uncomment below if you wan to use dynamic maps -->
      {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22864.11283411948!2d-73.96468908098944!3d40.630720240038435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbg!4v1540447494452" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe> --}}
      {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1408.5708968627134!2d101.51493494527995!3d3.083964365674007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc527b95eee3a1%3A0x24e4c8f62b39ec0f!2sSUK%20Selangor!5e0!3m2!1sms!2smy!4v1616987474576!5m2!1sms!2smy" width="100%" height="380" frameborder="0" style="border:0;" allowfullscreen="" loading="lazy"></iframe> --}}

      <div class="container mt-5">
        <div class="row justify-content-center">

          <div class="col-lg-3 col-md-6">

            <div class="info">
              <div>
                <i class="bi bi-geo-alt"></i>
                <p>
                  @php
                      $address = explode(',', $csm->address);
                  @endphp
                  @foreach ($address as $key => $data)
                    @if($loop->last)
                    {{ $data }}
                    @else
                    {{ $data }},<br>
                    @endif
                  @endforeach
                </p>
              </div>

              {{-- <div>
                <i class="bi bi-envelope"></i>
                <p>info@example.com</p>
              </div>

              <div>
                <i class="bi bi-phone"></i>
                <p>(6)03-55447000
                </p>
              </div> --}}
            </div>



          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info">
              {{-- <div>
                <i class="bi bi-geo-alt"></i>
                <p>Pejabat Setiausaha Kerajaan Negeri Selangor,
                    Bangunan Sultan Salahuddin Abdul Aziz Shah,
                    40503 Shah Alam,
                    Selangor Darul Ehsan.</p>
              </div> --}}

              <div>
                <i class="bi bi-envelope"></i>
                <p>{{ $csm->email }}</p>
              </div>

              <div>
                <i class="bi bi-phone"></i>
                <p>{{ $csm->contact }}
                </p>
              </div>
            </div>
          </div>

          {{-- <div class="col-lg-5 col-md-8">
            <div class="form">
              <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Nama" required>
                </div>
                <div class="mt-3 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                </div>
                <div class="mt-3 form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subjek" required>
                </div>
                <div class="mt-3 form-group">
                  <textarea class="form-control" name="message" rows="5" placeholder="Mesej" required></textarea>
                </div>
                <div class="my-3">
                  <div class="loading">Memuat...</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Mesej anda telah dihantar. Terima Kasih!</div>
                </div>
                <div class="text-center"><button type="submit">Hantar</button></div>
              </form>
            </div>
          </div> --}}

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        {{-- &copy; --}}
         Hakcipta Terpelihara 2021 © Unit Perancang Ekonomi Negeri Selangor.
      </div>
      <div class="credits">
        <!--
        All the links in the footer should remain intact.
        You can delete the links only if you purchased the pro version.
        Licensing information: https://bootstrapmade.com/license/
        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Regna
      -->
        {{-- Designed by <a href="https://bootstrapmade.com/">Arghhdann</a> --}}
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('Regna/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('Regna/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('Regna/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('Regna/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('Regna/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('Regna/assets/vendor/purecounter/purecounter.js') }}"></script>
  <script src="{{ asset('Regna/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('Regna/assets/js/main.js') }}"></script>

</body>
<script>
  $('.count').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 1500,
        easing: 'linear',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});
</script>

<script>
  $(document).ready(function () {
    $(window).resize(function(){
        drawChart();
    });
});
</script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Peruntukan', 'Peratus'],
      ['Telah Digunakan',     9],
      ['Belum Digunakan',      1],
    ]);

    var options = {
      title: 'Peruntukan Tahun 2021',
      pieHole: 0.4,
      backgroundColor: { fill:'transparent' }
    };

    var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
    chart.draw(data, options);
  }
</script>

<script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Peruntukan', 'Peratus'],
      ['Telah Digunakan',     9],
      ['Belum Digunakan',      1],
    ]);

    var options = {
      title: 'Peruntukan Kategori Tokong Tahun 2021',
      pieHole: 0.4,
      backgroundColor: { fill:'transparent' }
    };

    var chart = new google.visualization.PieChart(document.getElementById('donutchart2'));
    chart.draw(data, options);
  }
</script>

<script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Peruntukan', 'Peratus'],
      ['Telah Digunakan',     9],
      ['Belum Digunakan',      1],
    ]);

    var options = {
      title: 'Peruntukan Kategori Kuil Tahun 2021',
      pieHole: 0.4,
      backgroundColor: { fill:'transparent' }
    };

    var chart = new google.visualization.PieChart(document.getElementById('donutchart3'));
    chart.draw(data, options);
  }
</script>

<script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Peruntukan', 'Peratus'],
      ['Telah Digunakan',     9],
      ['Belum Digunakan',      1],
    ]);

    var options = {
      title: 'Peruntukan Kategori Gurdwara Tahun 2021',
      pieHole: 0.4,
      backgroundColor: { fill:'transparent' }
    };

    var chart = new google.visualization.PieChart(document.getElementById('donutchart4'));
    chart.draw(data, options);
  }
</script>

<script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Peruntukan', 'Peratus'],
      ['Telah Digunakan',     9],
      ['Belum Digunakan',      1],
    ]);

    var options = {
      title: 'Peruntukan Kategori Gereja Tahun 2021',
      pieHole: 0.4,
      backgroundColor: { fill:'transparent' },
      width: '100%',
    };

    var chart = new google.visualization.PieChart(document.getElementById('donutchart5'));
    chart.draw(data, options);
  }
</script>

<!-- Progress Bar -->
  <script>
      var lang = {
    "html": "100%",
    "css": "90%",
    "javascript": "70%",
    "php": "55%",
    "angular": "65%"
    };

    var multiply = 4;

    $.each( lang, function( language, pourcent) {

    var delay = 700;

    setTimeout(function() {
      $('#'+language+'-pourcent').html(pourcent);
    },delay*multiply);

    multiply++;

    });
  </script>

  <!-- Chart -->
  <script>
    function sliceSize(dataNum, dataTotal) {
    return (dataNum / dataTotal) * 360;
    }
    function addSlice(sliceSize, pieElement, offset, sliceID, color) {
    $(pieElement).append("<div class='slice "+sliceID+"'><span></span></div>");
    var offset = offset - 1;
    var sizeRotation = -179 + sliceSize;
    $("."+sliceID).css({
      "transform": "rotate("+offset+"deg) translate3d(0,0,0)"
    });
    $("."+sliceID+" span").css({
      "transform"       : "rotate("+sizeRotation+"deg) translate3d(0,0,0)",
      "background-color": color
    });
    }
    function iterateSlices(sliceSize, pieElement, offset, dataCount, sliceCount, color) {
    var sliceID = "s"+dataCount+"-"+sliceCount;
    var maxSize = 179;
    if(sliceSize<=maxSize) {
      addSlice(sliceSize, pieElement, offset, sliceID, color);
    } else {
      addSlice(maxSize, pieElement, offset, sliceID, color);
      iterateSlices(sliceSize-maxSize, pieElement, offset+maxSize, dataCount, sliceCount+1, color);
    }
    }
    function createPie(dataElement, pieElement) {
    var listData = [];
    $(dataElement+" span").each(function() {
      listData.push(Number($(this).html()));
    });
    var listTotal = 0;
    for(var i=0; i<listData.length; i++) {
      listTotal += listData[i];
    }
    var offset = 0;
    var color = [
      "cornflowerblue",
      "olivedrab",
      "orange",
      "tomato",
      "crimson",
      "purple",
      "turquoise",
      "forestgreen",
      "navy",
      "gray"
    ];
    for(var i=0; i<listData.length; i++) {
      var size = sliceSize(listData[i], listTotal);
      iterateSlices(size, pieElement, offset, i, 0, color[i]);
      $(dataElement+" li:nth-child("+(i+1)+")").css("border-color", color[i]);
      offset += size;
    }
    }
    createPie(".pieID.legend", ".pieID.pie");
  </script>
</html>
