<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
{{--
  {{-- <title>Rumah Ibadat</title> --}}
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('Regna/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('Regna/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

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

  <!-- Template Main CSS File -->
  <link href="{{ asset('Regna/assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Regna - v4.1.0
  * Template URL: https://bootstrapmade.com/regna-bootstrap-onepage-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
    .charts_orb {
  display: flex;
  align-items: flex-start;
  justify-content: center;
  flex-wrap: wrap;
  font-family: arial;
  color: white;
}
.charts_orb .orb {
  padding: 20px;
}
.charts_orb .orb .orb_graphic {
  position: relative;
}
.charts_orb .orb .orb_graphic .orb_value {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 2.5em;
  font-weight: bold;
}
.charts_orb .orb .orb_label {
  text-transform: uppercase;
  text-align: center;
  margin-top: 1em;
}
.charts_orb svg {
  width: 110px;
  height: 110px;
}
.charts_orb svg circle {
  transform: rotate(-90deg);
  transform-origin: 50% 50%;
  stroke-dasharray: 314.16, 314.16;
  stroke-width: 2;
  fill: transparent;
  r: 50;
  cx: 55;
  cy: 55;
}
.charts_orb svg circle.fill {
  stroke: #D3D3D3;
}
.charts_orb svg circle.progress {
  stroke: #ff0000;
  transition: stroke-dashoffset 0.35s;
  stroke-dashoffset: 214.16;
  -webkit-animation: NAME-YOUR-ANIMATION 1.5s forwards;
  -webkit-animation-timing-function: linear;
}
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex justify-content-between align-items-center">

      <div id="logo">
        <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/90/Coat_of_arms_of_Selangor.svg/1200px-Coat_of_arms_of_Selangor.svg.png" style="width: 50px; height: 50px; margin-top: -50%;" alt="Kerajaan Selangor"></a>
      </div>
        <span style="color: #fff;">Portal Rasmi
            <h5 style="color: #fff;">KERAJAAN NEGERI SELANGOR</h5>
        </span>
    <br>
      <div>

      </div>



      <nav id="navbar" class="navbar">
        <ul>
          {{-- <li><a class="nav-link scrollto active" href="#hero">Laman Utama</a></li> --}}
          <li><a class="nav-link scrollto active" href="#about">Laman Utama</a></li>
          <li><a class="nav-link scrollto" href="#services">Tentang Kami</a></li>
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
          <li><a class="nav-link scrollto" href="#contact">Hubungi</a></li>
          <li>
            @auth
            <a href="#" class="nav-link scrollto" onclick="event.preventDefault(); document.getElementById('logoutform').submit();"> LOG KELUAR </a>
            <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            @endauth
            @guest
                <a href="{{ route('login') }}" class="nav-link scrollto"> LOG MASUK </a>
            @endguest
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>

  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="10">
      <h2>Selamat Datang ke</h2>
      <h1>Sistem Bantuan Kewangan Rumah Ibadat</h1>
      <a href="#about" class="btn-get-started">Layari</a>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about">
      <div class="container" data-aos="fade-up">
            {{-- <h2>Carousel Example</h2> --}}
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
              </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                <div class="item active">
                  <img src="https://www.selangor.gov.my/index/modules_resources/images_contents/cad8d97e15d1cd95dc8bf2c04fd93ee6.png" alt="Los Angeles" style="width:100%;">
                </div>

                <div class="item">
                  <img src="https://www.selangor.gov.my/index/modules_resources/images_contents/be562e77669a5ab06f2400f583ae18fd.png" alt="Chicago" style="width:100%;">
                </div>

                <div class="item">
                  <img src="https://www.selangor.gov.my/index/modules_resources/images_contents/8a3215c30e5f33302b9bfd59a511646e.jpg" alt="New york" style="width:100%;">
                </div>
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
    </section><!-- End About Section -->

    <!-- ======= Facts Section ======= -->
    <section id="facts">
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
            {{-- <span data-purecounter-start="0" data-purecounter-end="534" data-purecounter-duration="1" class="purecounter"></span> --}}
            <p>"Alamat: Pusat Khidmat Dun Bandar Baru Klang LG-4, 1E Jalan Pekan Baru 34, 41010 Klang, Selangor

                Portfolio: Pengerusi Jawatankuasa Tetap Pelaburan, Perdagangan & Perindustrian dan Industri Kecil Dan Sederhana (IKS)

                Tempat: N45 Bandar Baru Klang

                Tel: 03-3341 4982

                E-mel: khim@selangor.gov.my"</p>
                <p class="">(Y.B. Dato’ Teng Chang Khim, 2021)</p>
          </div>

        </div>

      </div>
    </section><!-- End Facts Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" style="background: #a7a7a7;">
      <div class="section-header">
        <h3 class="section-title">Statistik</h3>
      </div>
      <section class="charts_orb">
        <article class="orb">
          <div class="orb_graphic">
            <svg>
              <circle class="fill"></circle>
              <circle class="progress"></circle>
            </svg>
            <div class="orb_value count">306</div>
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
            <div class="orb_value count">136</div>
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
            <div class="orb_value count">41</div>
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
            <div class="orb_value count">52</div>
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
            <div class="orb_value count">72</div>
          </div>
          <div class="orb_label">
            Rumah Ibadat
          </div>
        </article>
      </section>
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
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1408.5708968627134!2d101.51493494527995!3d3.083964365674007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc527b95eee3a1%3A0x24e4c8f62b39ec0f!2sSUK%20Selangor!5e0!3m2!1sms!2smy!4v1616987474576!5m2!1sms!2smy" width="100%" height="380" frameborder="0" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

      <div class="container mt-5">
        <div class="row justify-content-center">

          <div class="col-lg-3 col-md-4">

            <div class="info">
              <div>
                <i class="bi bi-geo-alt"></i>
                <p>Pejabat Setiausaha Kerajaan Negeri Selangor,
                    Bangunan Sultan Salahuddin Abdul Aziz Shah,
                    40503 Shah Alam,
                    Selangor Darul Ehsan.</p>
              </div>

              <div>
                <i class="bi bi-envelope"></i>
                <p>info@example.com</p>
              </div>

              <div>
                <i class="bi bi-phone"></i>
                <p>(6)03-55447000
                </p>
              </div>
            </div>

            <div class="social-links">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              {{-- <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a> --}}
            </div>

          </div>

          <div class="col-lg-5 col-md-8">
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
          </div>

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
        &copy; Hak Cipta Terpelihara.
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

</html>
