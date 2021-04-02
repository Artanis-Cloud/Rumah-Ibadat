<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Halaman Utama</title>
    @livewireStyles
    {{-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> --}}

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />



    <!-- VENDOR CSS -->
	{{-- <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}"> --}}
	{{-- <link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}"> --}}
	{{-- <link rel="stylesheet" href="{{asset('assets/vendor/linearicons/style.css')}}"> --}}
	{{-- <link rel="stylesheet" href="{{asset('assets/vendor/chartist/css/chartist-custom.css')}}"> --}}
    <link href="{{asset('assets-creativetim/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets-creativetim/css/now-ui-dashboard.css?v=1.2.0')}}" rel="stylesheet" />
    <link href="{{asset('assets-creativetim/demo/demo.css')}}" rel="stylesheet" />

    {{-- {{asset('assets-creativetim/demo/demo.css')}} --}}
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets-creativetim/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('assets-creativetim/img/favicon.png')}}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- MAIN CSS -->
	{{-- <link rel="stylesheet" href="{{asset('assets/css/main.css')}}"> --}}


	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	{{-- <link rel="stylesheet" href="{{asset('assets/css/demo.css')}}"> --}}

    <!-- GOOGLE FONTS -->
	{{-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet"> --}}
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />


	<!-- ICONS -->
	{{-- <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.pn')}}"> --}}
	{{-- <link rel="icon" type="image/png" sizes="96x96" href="{{asset('assets/img/favicon.png')}}"> --}}
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

    {{-- <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <!-- Template Klorin -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/@coreui/coreui@2.1.16/dist/css/coreui.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" /> --}}

</head>
<body class="">
	<div class="wrapper">

		{{-- SIDE BAR --}}
        <div class="sidebar" data-color="green">


            {{-- Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow" --}}

            <div class="logo">
                <center>
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/90/Coat_of_arms_of_Selangor.svg/1200px-Coat_of_arms_of_Selangor.svg.png" style="height: 120px;" alt="Kerajaan Selangor">

                </center>
                <span style="font-size: 18px;">Sistem Bantuan Kewangan Rumah Ibadat</span>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="{{ Request::is('pengguna/halaman-utama') ? 'active' : '' }}">
                        <a href="{{ route('user.halaman-utama') }}">
                        <i class="now-ui-icons shopping_shop"></i>
                        <p>Halaman Utama</p>
                        </a>
                    </li>
                    <li class="{{ Request::is('pengguna/permohonan/baru') ? 'active' : '' }}">
                        <a href="{{ route('users.permohonan.baru') }}">
                        <i class="now-ui-icons education_paper"></i>
                        <p>Permohonan Baru</p>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        {{-- END SIDE BAR --}}
        <div class="main-panel">

            {{-- NAVIGATION BAR --}}
            <nav class="navbar navbar-expand-lg fixed-top navbar-transparent bg-primary navbar-absolute">
                <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-toggle">
                    <button type="button" class="navbar-toggler">
                        <span class="navbar-toggler-bar bar1"></span>
                        <span class="navbar-toggler-bar bar2"></span>
                        <span class="navbar-toggler-bar bar3"></span>
                    </button>
                    </div>
                    <a class="navbar-brand" href="#pablo">Dashboard</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    {{-- <form>
                    <div class="input-group no-border">
                        <input type="text" value="" class="form-control" placeholder="Search...">
                        <div class="input-group-append">
                        <div class="input-group-text">
                            <i class="now-ui-icons ui-1_zoom-bold"></i>
                        </div>
                        </div>
                    </div>
                    </form> --}}
                    <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#pablo">
                        <i class="now-ui-icons media-2_sound-wave"></i>
                        <p>
                            <span class="d-lg-none d-md-block">Stats</span>
                        </p>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="now-ui-icons users_single-02"></i>
                        <p>
                            <span class="d-lg-none d-md-block">Pengguna</span>
                        </p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#"><i class="p-1 fa fa-user" aria-hidden="true"></i>Kemaskini Profil</a>
                        <a class="dropdown-item" href="{{ route('tukar-kata-laluan') }}"><i class="p-1 fa fa-lock" aria-hidden="true"></i>Tukar Kata Laluan</a>
                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();"><i class="p-1 fa fa-power-off" aria-hidden="true"></i>Log Keluar</a>
                        </div>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#pablo">
                        <i class="now-ui-icons users_single-02"></i>
                        <p>
                            <span class="d-lg-none d-md-block">Account</span>
                        </p>
                        </a>
                    </li> --}}
                    </ul>

                    {{-- LOGOUT FORM --}}
                    <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>

                </div>
                </div>
            </nav>
            {{-- END OF NAVIGATION BAR --}}


            @yield('content')
            @livewireScripts




            {{-- FOOTER --}}
            <footer class="footer">
                <div class="container">
                <nav>
                    <ul>
                    <li>
                        <a href="https://www.creative-tim.com">
                        Creative Tim
                        </a>
                    </li>
                    <li>
                        <a href="http://presentation.creative-tim.com">
                        About Us
                        </a>
                    </li>
                    <li>
                        <a href="http://blog.creative-tim.com">
                        Blog
                        </a>
                    </li>
                    </ul>
                </nav>
                <div class="copyright" id="copyright">
                    &copy;
                    <script>
                    document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                    </script>, Designed by
                    <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by
                    <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
                </div>
                </div>
            </footer>
            {{-- END OF FOOTER --}}
        </div>

	</div>

    {{-- SCRIPT --}}
    <!--   Core JS Files   -->
    <script src="{{asset('assets-creativetim/js/core/jquery.min.js')}}"></script>
    <script src="{{asset('assets-creativetim/js/core/popper.min.js')}}"></script>
    <script src="{{asset('assets-creativetim/js/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets-creativetim/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
    <!--  Google Maps Plugin    -->
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
    <!-- Chart JS -->
    <script src="{{asset('assets-creativetim/js/plugins/chartjs.min.js')}}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{asset('assets-creativetim/js/plugins/bootstrap-notify.js')}}"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{asset('assets-creativetim/js/now-ui-dashboard.min.js?v=1.2.0')}}" type="text/javascript"></script>
    <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{asset('assets-creativetim/demo/demo.js')}}"></script>
    <script>
        $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        });
    </script>
</body>
</html>
