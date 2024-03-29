<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Dashboard Admin</title>
    @livewireStyles
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('nice-admin/assets/images/favicon.png') }}">

    <!-- font-awesome icon -->
    <link rel="stylesheet" href="{{ asset('nice-admin/icon/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('nice-admin/icon/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('nice-admin/icon/css/brands.css') }}">
    <link rel="stylesheet" href="{{ asset('nice-admin/icon/css/solid.css') }}">

    {{-- lord icon --}}
    <script src="https://cdn.lordicon.com/libs/frhvbuzj/lord-icon-2.0.2.js"></script>

    <!-- Toaster CSS -->
    <link href="{{ asset('nice-admin/assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('nice-admin/assets/extra-libs/c3/c3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('nice-admin/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />

    <!-- Custom CSS -->
    <link href="{{ asset('nice-admin/dist/css/style.min.css') }}" rel="stylesheet">

    <script src="{{ asset('nice-admin/assets/libs/jquery/dist/jquery.min.js') }}"></script>

    {{-- Datatables --}}
    <link href="{{ asset('nice-admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}"
        rel="stylesheet" />

    {{-- Datatables --}}
    <script src="{{ asset('nice-admin/assets/extra-libs/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('nice-admin/dist/js/pages/datatable/datatable-basic.init.js') }}"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- NICE PAGE DEVELOPMENT END HERE!!! --}}

    <style>
        /* width */
        ::-webkit-scrollbar {
            width: 5px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px grey;
            border-radius: 10px;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: rgb(90, 90, 90);
            border-radius: 10px;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #4b4b4b;
        }

        .required:after {
            content: " *";
            color: red;
        }

    </style>

</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                {{-- <div class="navbar-header">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <a href="{{ route('admins.dashboard') }}" class="logo">
                            <!-- Logo icon -->
                            <span class="logo-icon">
                                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                                <!-- Dark Logo icon -->
                                <img src="https://upload.wikimedia.org/wikipedia/ms/archive/9/93/20090423144020%21Coat_of_arms_of_Malaysia.png"
                                    style="height: 50px;" alt="homepage" class="dark-logo" />
                                <!-- Light Logo text -->
                                <img src="{{ asset('nice-admin/assets/images/logo-light-text.png') }}"
                                    class="light-logo" alt="homepage" />

                            </span>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span class="logo-text">
                                <!-- dark Logo text -->
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/90/Coat_of_arms_of_Selangor.svg/1200px-Coat_of_arms_of_Selangor.svg.png"
                                    style="height: 50px; padding-left: 20%;" alt="homepage" class="dark-logo" />
                                <!-- Light Logo icon -->
                                <img src="{{ asset('nice-admin/assets/images/logo-light-icon.png') }}" alt="homepage"
                                    class="light-logo" />
                            </span>
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="btn btn-light d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                        style="border: solid black 1px;">
                        <i class="fas fa-cogs fa-2x" style="color: black;"></i>
                    </a>
                </div> --}}

                <div class="navbar-header">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <a href="{{ route('admins.dashboard') }}" class="logo">
                            <span class="logo-icon" style="padding-left: 10%;">

                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/90/Coat_of_arms_of_Selangor.svg/1200px-Coat_of_arms_of_Selangor.svg.png"
                                    style="height: 50px; padding-left: 20%;" alt="homepage" class="dark-logo" />

                            </span>
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-cogs"></i>

                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="mr-auto navbar-nav" style="padding-left: 5%;">

                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <h1 class="font-20 m-b-5" style="text-align: center;color: #000"> Sistem Bantuan Kewangan Lima
                            Agama Selangor </h1>

                    </ul>

                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="float-right navbar-nav">

                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="p-2 nav-item dropdown">
                            <span data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <a class="btn btn-light" href="#" style="border: solid black 1px;"
                                    data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Profil">
                                    <i class="fas fa-user-cog fa-2x" style="color: black;"></i>
                                </a>
                            </span>
                            <span data-toggle="modal" data-target="#confirmation">
                                <a class="btn btn-danger" href="#" style="border: solid black 1px;"
                                    data-toggle="tooltip" data-placement="bottom" title=""
                                    data-original-title="Log Keluar">
                                    <i class="fas fa-power-off fa-2x"></i>
                                </a>
                            </span>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow">
                                    <span class="bg-primary"></span>
                                </span>
                                <div class="text-white d-flex no-block align-items-center p-15 bg-dark m-b-10"
                                    style="padding: 15px;">

                                    <div class="m-l-10">
                                        <h5 style="margin-bottom: 0px !important;">{{ Auth::user()->name }}</h5>
                                        <p style="margin-bottom: 0px !important;"><i
                                                class="fas fa-envelope"></i>&nbsp&nbsp&nbsp&nbsp{{ Auth::user()->email }}
                                        </p>
                                        <p style="margin-bottom: 0px !important;"><i
                                                class="fas fa-crown"></i>&nbsp&nbsp&nbspAdmin Sistem</p>
                                    </div>
                                </div>

                                <div class="dropdown-divider"></div>


                                <a class="dropdown-item" href="{{ route('tukar-kata-laluan') }}">
                                    <i class="fas fa-unlock-alt"></i> Tukar Kata Laluan</a>

                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>

                    <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </nav>
        </header>

        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark"
                                href="{{ route('admins.dashboard') }}" aria-expanded="false"><i
                                    class="fas fa-tachometer-alt"></i><span class="hide-menu"
                                    style="padding-left: 10px;">Dashboard </span></a></li>


                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i class="fas fa-users"></i><span
                                    class="hide-menu" style="padding-left: 10px;">Pengguna</span></a>
                            <ul aria-expanded="false" class="collapse first-level">

                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark"
                                        href="{{ route('admins.pengguna.pemohon') }}" aria-expanded="false"><span
                                            class="hide-menu">Senarai Pemohon</span></a>

                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark"
                                        href="{{ route('admins.pengguna.pengguna-dalaman') }}"
                                        aria-expanded="false"><span class="hide-menu">Senarai Pengguna
                                            Dalaman</span></a>

                            </ul>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i
                                    class="fas fa-place-of-worship"></i><span class="hide-menu"
                                    style="padding-left: 10px;">Rumah Ibadat</span></a>
                            <ul aria-expanded="false" class="collapse first-level">

                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark"
                                        href="{{ route('admins.rumah-ibadat.senarai') }}" aria-expanded="false"><span
                                            class="hide-menu">Senarai Rumah Ibadat</span></a>

                            </ul>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i class="fas fa-cogs"></i><span
                                    class="hide-menu" style="padding-left: 10px;">Tetapan</span></a>
                            <ul aria-expanded="false" class="collapse first-level">

                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark"
                                        href="{{ route('admins.tetapan.halaman-utama') }}"
                                        aria-expanded="false"><span class="hide-menu">Tetapan Halaman
                                            Utama</span></a></li>

                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark"
                                        href="{{ route('admins.tetapan.soalan-lazim') }}" aria-expanded="false"><span
                                            class="hide-menu">Tetapan Soalan Lazim</span></a></li>

                            </ul>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i class="fas fa-book"></i><span
                                    class="hide-menu" style="padding-left: 10px;">Manual Sistem</span></a>
                            <ul aria-expanded="false" class="collapse first-level">

                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" target="_blank"
                                        href="{{ asset('Regna/assets/img/user_manual.pdf') }}"
                                        aria-expanded="false"><span class="hide-menu">Manual Pemohon</span></a>
                                </li>

                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" target="_blank"
                                        href="{{ asset('Regna/assets/img/exco_manual.pdf') }}" aria-expanded="false"><span
                                            class="hide-menu">Manual Pejabat Exco</span></a>
                                </li>

                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" target="_blank"
                                        href="{{ asset('Regna/assets/img/yb_manual.pdf') }}" aria-expanded="false"><span
                                            class="hide-menu">Manual YB Pengerusi</span></a>
                                </li>

                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" target="_blank"
                                        href="{{ asset('Regna/assets/img/upen_manual.pdf') }}" aria-expanded="false"><span
                                            class="hide-menu">Manual Pejabat UPEN</span></a>
                                </li>

                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" target="_blank"
                                        href="{{ asset('Regna/assets/img/admin_manual.pdf') }}" aria-expanded="false"><span
                                            class="hide-menu">Manual Admin Sistem</span></a>
                                </li>

                            </ul>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i class="fas fa-database"></i><span
                                    class="hide-menu" style="padding-left: 10px;">Audit Trail</span></a>
                            <ul aria-expanded="false" class="collapse first-level">

                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark"
                                        href="{{ route('admins.audit-trail.proses') }}" aria-expanded="false"><span
                                            class="hide-menu">Audit Trail Proses</span></a>

                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark"
                                        href="{{ route('admins.audit-trail.log-user') }}" aria-expanded="false"><span
                                            class="hide-menu">Audit Trail Log Akses</span></a>

                            </ul>
                        </li>

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        @for ($i = 1; $i <= count(Request::segments()); $i++)
                            @if(!($i < count(Request::segments()) & $i> 0))
                                <h4 class="page-title">
                                    {{ ucwords(str_replace('-', ' ', Request::segment($i))) }}
                                </h4>
                        @endif
                        @endfor
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            @if (Request::is('dashboard-admin') || Request::is('tukar-kata-laluan'))

                            @else
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">

                                        <?php $link = ''; ?>
                                        @for ($i = 1; $i <= count(Request::segments()); $i++)
                                            @if (($i < count(Request::segments())) & ($i> 0))
                                                <?php $link .= '/' . Request::segment($i); ?>
                                                <a href="<?= $link ?>">&nbsp
                                                    {{ ucwords(str_replace('-', ' ', Request::segment($i))) }}</a>
                                                &nbsp>
                                            @else {{ ucwords(str_replace('-', ' ', Request::segment($i))) }}
                                        @endif
                            @endfor

                            </ol>
                            </nav>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- Log Out Confimation Modal -->
            <!-- ============================================================== -->
            <div class="modal fade" id="confirmation" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle"><i
                                    class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbspPengesahan!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Anda pasti mahu log keluar sistem?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success"
                                onclick="event.preventDefault(); document.getElementById('logoutform').submit();">Log
                                Keluar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Log Out Confimation Modal -->
            <!-- ============================================================== -->
            @yield('content')
            @livewireScripts



            {{-- BODY CONTENT IS HERE!!!!!!! --}}




            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="text-center footer">
                Hakcipta Terpelihara 2021 © Unit Perancang Ekonomi Negeri Selangor.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->

        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>

    <!-- ============================================================== -->
    <!-- All Jquery NICE PAGE -->
    <!-- ============================================================== -->

    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('nice-admin/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('nice-admin/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- apps -->
    <script src="{{ asset('nice-admin/dist/js/app.min.js') }}"></script>
    <script src="{{ asset('nice-admin/dist/js/app.init.horizontal.js') }}"></script>
    <script src="{{ asset('nice-admin/dist/js/app-style-switcher.horizontal.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('nice-admin/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('nice-admin/assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('nice-admin/dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('nice-admin/dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('nice-admin/dist/js/custom.js') }}"></script>
    {{-- font-awesome icon --}}
    <script src="{{ asset('nice-admin/icon/js/all.js') }}"></script>
    <script src="{{ asset('nice-admin/icon/js/brands.js') }}"></script>
    <script src="{{ asset('nice-admin/icon/js/solid.js') }}"></script>
    <script src="{{ asset('nice-admin/icon/js/fontawesome.js') }}"></script>

    {{-- toaster --}}
    <script src="{{ asset('nice-admin/assets/libs/toastr/build/toastr.min.js') }}"></script>
    <script src="{{ asset('nice-admin/assets/extra-libs/toastr/toastr-init.js') }}"></script>

    {{-- print --}}
    <script src="{{ asset('nice-admin/dist/js/pages/samplepages/jquery.PrintArea.js') }}"></script>

    {{-- toaster display --}}
    <script>
        @if (Session::get('success'))
            toastr.success('{{ session('success') }}', 'Berjaya', { "progressBar": true });
        @elseif ($message = Session::get('error'))
            toastr.error('{{ session('error') }}', 'Ralat', { "progressBar": true });
        @endif
    </script>
    <!-- ============================================================== -->
    <!-- END Jquery NICE PAGE -->
    <!-- ============================================================== -->
</body>

</html>
