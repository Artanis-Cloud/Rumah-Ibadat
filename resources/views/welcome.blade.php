<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    {{-- {{-- <title>Rumah Ibadat</title> --}}
    <meta content="" name="description">
    <meta content="" name="keywords">

    {{-- w3school --}}
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!-- Favicons -->
    <link href="{{ asset('Regna/assets/img/selangor-icon.png') }}" rel="icon">
    <link href="{{ asset('Regna/assets/img/selangor-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700"
        rel="stylesheet">

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
            vertical-align: middle;
        }

        .pie {
            height: 225px;
            width: 225px;
            position: relative;
            /* margin: 0 0px 30px 0; */
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
            /* margin: 0; */
            background: #f2ef96;
            padding: 30px;
            font-size: 13px;
            border: 2px solid #000;
            /* box-shadow: 1px 1px 0 #DDD, 2px 2px 0 #BBB; */
        }

        .legend li {
            /* width: 110px; */
            height: 1.25em;
            margin-bottom: 0.7em;
            padding-left: 0.5em;
            border-left: 1.25em solid black;
        }

        .legend em {
            font-style: normal;
            color: #000;
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
            color: #fff;
            font-weight: bold;
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
                width: {{ ($annual_report->balance_tokong / $annual_report->total_tokong) * 100 }}%;
            }
        }

        @keyframes progress-css {
            0% {
                width: 0%;
            }

            100% {
                width: {{ ($annual_report->balance_kuil / $annual_report->total_kuil) * 100 }}%;
            }
        }

        @keyframes progress-javascript {
            0% {
                width: 0%;
            }

            100% {
                width: {{ ($annual_report->balance_gurdwara / $annual_report->total_gurdwara) * 100 }}%;
            }
        }

        @keyframes progress-php {
            0% {
                width: 0%;
            }

            100% {
                width: {{ ($annual_report->balance_gereja / $annual_report->total_gereja) * 100 }}%;
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
                <a href="#"><img
                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/90/Coat_of_arms_of_Selangor.svg/1200px-Coat_of_arms_of_Selangor.svg.png"
                        style="width: auto; height: 60px; margin-top: -50%;" alt="Kerajaan Selangor"></a>
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

                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        </div>

    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="hero-container" data-aos="zoom-in" data-aos-delay="10">
            <h2>Selamat Datang ke</h2>
            <h1>Sistem Bantuan Kewangan Rumah Ibadat <br>Selain Islam</h1>
            @auth
                <a href="#" class="btn-get-started"
                    onclick="event.preventDefault(); document.getElementById('logoutform').submit();">Log Keluar</a>
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
        @if ($pengumuman->count() != 0)
            <div style="position: absolute; bottom: 0px; width: 100%;background-color: #FFD700;">
                <marquee direction="left" scrollamount="10" style="padding-top: 5px; color: black;">
                    @foreach ($pengumuman as $data)
                        <span style="font-size: 15pt;"><b>[</b> <b>{{ $data->title }}
                                &nbsp&nbsp&nbsp&nbsp-&nbsp&nbsp&nbsp&nbsp</b>{{ $data->content }} <b>]</b>
                            &nbsp&nbsp&nbsp&nbsp</span>
                    @endforeach
                </marquee>
            </div>
        @endif
    </section><!-- End Hero Section -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about">

            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-md-4" style="color: #000;">
                        <h2 class="title">{{ $csm->intro_title }}</h2>
                        <p style="text-align: justify;">
                            {{ $csm->intro_content }}
                        </p>

                    </div>
                    <div class="col-md-8">
                        @if ($banner->count() != 0)
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    @foreach ($banner as $key => $data2)
                                        @if ($loop->first)
                                            <li data-target="#myCarousel" data-slide-to="{{ $key }}"
                                                class="active"></li>
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
                                                <img src="{{ asset($image_path = str_replace('public', 'storage', $data2->url)) }}"
                                                    style="width:100%; height: 300px !important;">
                                            </div>
                                        @else
                                            <div class="item">
                                                <img src="{{ asset($image_path = str_replace('public', 'storage', $data2->url)) }}"
                                                    alt="New york" style="width:100%; height: 300px !important;">
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
                        @endif
                    </div>

                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Services Section ======= -->
        <section id="services"
            style=" background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/img/bg-je.png');">
            <div class="section-header">
                <h3 class="section-title" style="color: white;">Statistik</h3>
            </div>

            <div class="row" style="padding-top: 5px;">
                <div class="col-md-1"></div>
                <div class="col-md-5" style="text-align: center;">
                    <h4 style="color: white;">Peruntukan Tahun {{ date('Y') }}</h4>
                    <section>

                        <div class="row">
                            <div class="col-md">
                                <div class="pieID pie">

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md">
                                <ul class="pieID legend">
                                    <li>
                                        <em>Peruntukan yang telah diluluskan
                                            <b>[{{ ($annual_report->current_fund / $annual_report->total_fund) * 100 }}
                                                %]</b> </em>
                                        <span
                                            style="display: none;">{{ ($annual_report->current_fund / $annual_report->total_fund) * 100 }}</span>
                                    </li>
                                    <li style="text-align: left">
                                        <em>Baki peruntukan
                                            <b>[{{ ($annual_report->balance_fund / $annual_report->total_fund) * 100 }}
                                                %]</b></em>
                                        <span
                                            style="display: none;">{{ ($annual_report->balance_fund / $annual_report->total_fund) * 100 }}</span>
                                    </li>

                                </ul>
                            </div>
                        </div>


                    </section>

                </div>
                <div class="col-md-5">

                    <h4 style="color: white; text-align: center;">Baki Peruntukan Mengikut Kategori Rumah Ibadat <br>
                        Tahun {{ date('Y') }}</h4>

                    <ul class="skills-bar-container">

                        <li>
                            <div class="progressbar-title">
                                <h3 style="color: white;">Tokong</h3>
                                <input type="hidden" id="percent_tokong"
                                    value="{{ ($annual_report->balance_tokong / $annual_report->total_tokong) * 100 }}">
                                <span class="percent" id="html-pourcent"></span>
                            </div>
                            <div class="bar-container">
                                <span class="progressbar progressred" id="progress-html"></span>

                            </div>
                        </li>
                        <li>
                            <div class="progressbar-title">
                                <h3 style="color: white;">Kuil</h3>
                                <input type="hidden" id="percent_kuil"
                                    value="{{ ($annual_report->balance_kuil / $annual_report->total_kuil) * 100 }}">
                                <span class="percent" id="css-pourcent"></span>
                            </div>
                            <div class="bar-container">
                                <span class="progressbar progressblue" id="progress-css"></span>
                            </div>
                        </li>


                        <li>
                            <div class="progressbar-title">
                                <h3 style="color: white;">Gurdwara</h3>
                                <input type="hidden" id="percent_gurdwara"
                                    value="{{ ($annual_report->balance_gurdwara / $annual_report->total_gurdwara) * 100 }}">
                                <span class="percent" id="javascript-pourcent"></span>
                            </div>
                            <div class="bar-container">
                                <span class="progressbar progresspurple" id="progress-javascript"></span>
                            </div>
                        </li>

                        <li>
                            <div class="progressbar-title">
                                <h3 style="color: white;">Gereja</h3>
                                <input type="hidden" id="percent_gereja"
                                    value="{{ ($annual_report->balance_gereja / $annual_report->total_gereja) * 100 }}">
                                <span class="percent" id="php-pourcent"></span>
                            </div>
                            <div class="bar-container">
                                <span class="progressbar progressorange" id="progress-php"></span>

                            </div>
                        </li>

                    </ul>


                </div>
                <div class="col-md-1"></div>

            </div>

        </section><!-- End Services Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact">

            <div class="container">
                <div class="section-header">
                    <h3 class="section-title">HUBUNGI KAMI</h3>
                    {{-- <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>SS --}}
                </div>
            </div>

            <div class="container mt-5">
                <div class="row justify-content-center">

                    <h3 class="text-center text-dark">Pejabat UPEN</h3>

                    <div class="col-lg-3 col-md-6">
                        <div class="info">
                            <div>
                                <i class="bi bi-geo-alt"></i>
                                <p>
                                    @php
                                        $address = explode(',', $csm->upen_address);
                                    @endphp
                                    @foreach ($address as $key => $data)
                                        @if ($loop->last)
                                            {{ $data }}
                                        @else
                                            {{ $data }},<br>
                                        @endif
                                    @endforeach
                                </p>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="info">

                            <div>
                                <i class="bi bi-envelope"></i>
                                <p>{{ $csm->upen_email }}</p>
                            </div>

                            <div>
                                <i class="bi bi-phone"></i>
                                <p>{{ $csm->upen_contact }}
                                </p>
                            </div>

                        </div>
                    </div>

                </div>

            </div>

            <div class="container mt-5">
                <div class="row justify-content-center">

                    <div class="col-lg-3 col-md-6">

                        <h4 class="text-center">{{ $csm->yb1_name }}</h4>

                        <div class="info">

                            <div>
                                <i class="bi bi-envelope"></i>
                                <p>{{ $csm->yb1_email }}</p>
                            </div>

                            <div>
                                <i class="bi bi-phone"></i>
                                <p>{{ $csm->yb1_contact }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">

                        <h4 class="text-center">{{ $csm->yb2_name }}</h4>

                        <div class="info">

                            <div>
                                <i class="bi bi-envelope"></i>
                                <p>{{ $csm->yb2_email }}</p>
                            </div>

                            <div>
                                <i class="bi bi-phone"></i>
                                <p>{{ $csm->yb2_contact }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">

                        <h4 class="text-center">{{ $csm->yb3_name }}</h4>

                        <div class="info">

                            <div>
                                <i class="bi bi-envelope"></i>
                                <p>{{ $csm->yb3_email }}</p>
                            </div>

                            <div>
                                <i class="bi bi-phone"></i>
                                <p>{{ $csm->yb3_contact }}
                                </p>
                            </div>
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
                Hakcipta Terpelihara 2021 © Unit Perancang Ekonomi Negeri Selangor.
            </div>
            <div class="credits">

            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

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
    $('.count').each(function() {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 1500,
            easing: 'linear',
            step: function(now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $(window).resize(function() {
            drawChart();
        });
    });
</script>

<!-- Progress Bar -->
<script>
    var tokong = $('#percent_tokong').val() + "%";
    var kuil = $('#percent_kuil').val() + "%";
    var gurdwara = $('#percent_gurdwara').val() + "%";
    var gereja = $('#percent_gereja').val() + "%";

    var lang = {
        "html": tokong,
        "css": kuil,
        "javascript": gurdwara,
        "php": gereja,
        "angular": "65%"
    };

    var multiply = 4;

    $.each(lang, function(language, pourcent) {

        var delay = 700;

        setTimeout(function() {
            $('#' + language + '-pourcent').html(pourcent);
        }, delay * multiply);

        multiply++;

    });
</script>

<!-- Chart -->
<script>
    function sliceSize(dataNum, dataTotal) {
        return (dataNum / dataTotal) * 360;
    }

    function addSlice(sliceSize, pieElement, offset, sliceID, color) {
        $(pieElement).append("<div class='slice " + sliceID + "'><span></span></div>");
        var offset = offset - 1;
        var sizeRotation = -179 + sliceSize;
        $("." + sliceID).css({
            "transform": "rotate(" + offset + "deg) translate3d(0,0,0)"
        });
        $("." + sliceID + " span").css({
            "transform": "rotate(" + sizeRotation + "deg) translate3d(0,0,0)",
            "background-color": color
        });
    }

    function iterateSlices(sliceSize, pieElement, offset, dataCount, sliceCount, color) {
        var sliceID = "s" + dataCount + "-" + sliceCount;
        var maxSize = 179;
        if (sliceSize <= maxSize) {
            addSlice(sliceSize, pieElement, offset, sliceID, color);
        } else {
            addSlice(maxSize, pieElement, offset, sliceID, color);
            iterateSlices(sliceSize - maxSize, pieElement, offset + maxSize, dataCount, sliceCount + 1, color);
        }
    }

    function createPie(dataElement, pieElement) {
        var listData = [];
        $(dataElement + " span").each(function() {
            listData.push(Number($(this).html()));
        });
        var listTotal = 0;
        for (var i = 0; i < listData.length; i++) {
            listTotal += listData[i];
        }
        var offset = 0;
        var color = [
            // "cornflowerblue",
            // "olivedrab",
            "orange",
            "tomato",
            // "crimson",
            // "purple",
            // "turquoise",
            // "forestgreen",
            // "navy",
            // "gray"
        ];
        for (var i = 0; i < listData.length; i++) {
            var size = sliceSize(listData[i], listTotal);
            iterateSlices(size, pieElement, offset, i, 0, color[i]);
            $(dataElement + " li:nth-child(" + (i + 1) + ")").css("border-color", color[i]);
            offset += size;
        }
    }
    createPie(".pieID.legend", ".pieID.pie");
</script>

</html>
