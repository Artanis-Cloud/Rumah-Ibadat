<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Sistem Bantuan Dana Rumah Ibadat Selain Islam</title>
    @livewireStyles
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('nice-admin/assets/images/favicon.png')}}">

    <!-- font-awesome icon -->
    <link rel="stylesheet" href="{{asset('nice-admin/icon/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('nice-admin/icon/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('nice-admin/icon/css/brands.css')}}">
    <link rel="stylesheet" href="{{asset('nice-admin/icon/css/solid.css')}}">

    <!-- Toaster CSS -->
    <link href="{{asset('nice-admin/assets/libs/toastr/build/toastr.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('nice-admin/assets/libs/chartist/dist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{asset('nice-admin/assets/extra-libs/c3/c3.min.css')}}" rel="stylesheet">
    <link href="{{asset('nice-admin/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />

    <!-- Custom CSS -->
    <link href="{{asset('nice-admin/dist/css/style.min.css')}}" rel="stylesheet">

    <script src="{{asset('nice-admin/assets/libs/jquery/dist/jquery.min.js')}}"></script>

    {{-- Datatables --}}
    <link href="{{asset('nice-admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet" />

    {{-- Datatables --}}
    <script src="{{asset('nice-admin/assets/extra-libs/DataTables/datatables.min.js')}}"></script>
    <script src="{{asset('nice-admin/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>

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
    content:" *";
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
                <div class="navbar-header">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <a href="#" class="logo">
                            <!-- Logo icon -->
                            <span class="logo-icon">
                                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                                <!-- Dark Logo icon -->
                                {{-- <img src="https://upload.wikimedia.org/wikipedia/ms/archive/9/93/20090423144020%21Coat_of_arms_of_Malaysia.png" style="height: 50px;" alt="homepage" class="dark-logo" /> --}}
                                <!-- Light Logo text -->
                                <img src="{{asset('nice-admin/assets/images/logo-light-text.png')}}" class="light-logo" alt="homepage" />

                            </span>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span class="logo-text">
                                <!-- dark Logo text -->
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/90/Coat_of_arms_of_Selangor.svg/1200px-Coat_of_arms_of_Selangor.svg.png" style="height: 50px; padding-left: 20%;" alt="homepage" class="dark-logo" />
                                <!-- Light Logo icon -->
                                <img src="{{asset('nice-admin/assets/images/logo-light-icon.png')}}" alt="homepage" class="light-logo" />
                            </span>
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        {{-- <i class="ti-more"></i> --}}
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
                        <!-- <li class="nav-item d-none d-md-block">
                            <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                                <i class="mdi mdi-menu font-24"></i>
                            </a>
                        </li> -->
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <h1 class="font-20 m-b-5" style="text-align: center;color: #000">Sistem Bantuan Kewangan Rumah Ibadat Selain Islam</h1>
                        {{-- <li class="nav-item search-box">



                        </li> --}}

                    </ul>

                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="float-right navbar-nav">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->

                        <li class="nav-item dropdown">
                            <span data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                <a class="btn btn-light" href="#" style="border: solid black 1px;" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Tetapan">
                                    {{-- <img src="{{asset('nice-admin/assets/images/users/2.jpg')}}" alt="user" class="rounded-circle" width="40"> --}}
                                    {{-- <span class="font-medium m-l-5 d-none d-sm-inline-block">{{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i></span> --}}
                                    <i class="fas fa-user-cog fa-2x" style="color: black;"></i>
                                </a>
                            </span>
                            <span data-toggle="modal" data-target="#confirmation">
                                <a class="btn btn-danger" href="#" style="border: solid black 1px;" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Log Keluar">
                                    <i class="fas fa-power-off fa-2x"></i>
                                </a>
                            </span>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow">
                                    <span class="bg-primary"></span>
                                </span>
                                <div class="text-white d-flex no-block align-items-center p-15 bg-dark m-b-10" style="padding: 15px;">
                                    <div class="m-l-10">
                                        <h5 style="margin-bottom: 0px !important;">{{ Auth::user()->name }}</h5>
                                        <p style="margin-bottom: 0px !important;"><i class="fas fa-envelope"></i>&nbsp&nbsp&nbsp{{ Auth::user()->email }}</p>
                                        <p style="margin-bottom: 0px !important;"><i class="fas fa-certificate"></i>&nbsp&nbsp&nbspPemohon</p>
                                    </div>
                                </div>
                                <a class="dropdown-item" href="#" style="color: grey;">
                                    <i class="ti-user m-r-5 m-l-5"></i> Kemaskini Profil</a>

                                {{-- <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="ti-wallet m-r-5 m-l-5"></i> My Balance</a> --}}

                                {{-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-torii-gate"></i> Kemaskini Profil Rumah Ibadat</a> --}}


                                <div class="dropdown-divider"></div>


                                <a class="dropdown-item" href="#" style="color: grey;">
                                    <i class="fas fa-unlock-alt"></i> Tukar Kata Laluan</a>


                                {{-- <div class="dropdown-divider"></div>


                                <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                                    <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a> --}}
                                {{-- <div class="dropdown-divider"></div> --}}
                                {{-- <div class="p-10 p-l-30" style="padding: 10px;">
                                    <a href="javascript:void(0)" class="btn btn-sm btn-success btn-rounded">View Profile</a>
                                </div> --}}
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

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="#" aria-expanded="false"><i class="icon-home"></i><span class="hide-menu">Halaman Utama </span></a></li>


                        {{-- <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Rumah Ibadat</span></li> --}}
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-place-of-worship"></i><span class="hide-menu" style="padding-left: 10px;">Rumah Ibadat</span></a>
                            {{-- <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="{{ route('users.rumah-ibadat.daftar') }}" aria-expanded="false"><span class="hide-menu">Pendaftaran</span></a>

                                </li>
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="{{ route('users.rumah-ibadat.kemaskini') }}" aria-expanded="false"><span class="hide-menu">Kemaskini Rumah Ibadat</span></a>

                                </li>
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="{{ route('users.rumah-ibadat.menukar') }}" aria-expanded="false"><span class="hide-menu">Menukar Hak Milik</span></a>

                                </li>

                            </ul> --}}
                        </li>

                        {{-- <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Permohonan</span></li> --}}
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-clipboard-list"></i><span class="hide-menu" style="padding-left: 10px;">Permohonan</span></a>

                        </li>

                        {{-- <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Sample Pages</span></li>
                        <li class="sidebar-item mega-dropdown"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">Pages </span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item"><a href="authentication-login1.html" class="sidebar-link"><i class="mdi mdi-account-key"></i><span class="hide-menu"> Login </span></a></li>
                                <li class="sidebar-item"><a href="starter-kit.html" class="sidebar-link"><i class="mdi mdi-crop-free"></i> <span class="hide-menu">Starter Kit</span></a></li>
                                <li class="sidebar-item"><a href="pages-animation.html" class="sidebar-link"><i class="mdi mdi-debug-step-over"></i> <span class="hide-menu">Animation</span></a></li>
                                <li class="sidebar-item"><a href="pages-search-result.html" class="sidebar-link"><i class="mdi mdi-search-web"></i> <span class="hide-menu">Search Result</span></a></li>
                                <li class="sidebar-item"><a href="authentication-login2.html" class="sidebar-link"><i class="mdi mdi-account-key"></i><span class="hide-menu"> Login 2 </span></a></li>
                                <li class="sidebar-item"><a href="pages-gallery.html" class="sidebar-link"><i class="mdi mdi-camera-iris"></i> <span class="hide-menu">Gallery</span></a></li>
                                <li class="sidebar-item"><a href="pages-treeview.html" class="sidebar-link"><i class="mdi mdi-file-tree"></i> <span class="hide-menu">Treeview</span></a></li>
                                <li class="sidebar-item"><a href="pages-block-ui.html" class="sidebar-link"><i class="mdi mdi-codepen"></i> <span class="hide-menu">Block UI</span></a></li>
                                <li class="sidebar-item"><a href="authentication-register1.html" class="sidebar-link"><i class="mdi mdi-account-plus"></i><span class="hide-menu"> Register</span></a></li>
                                <li class="sidebar-item"><a href="pages-session-timeout.html" class="sidebar-link"><i class="mdi mdi-timer-off"></i> <span class="hide-menu">Session Timeout</span></a></li>
                                <li class="sidebar-item"><a href="pages-session-idle-timeout.html" class="sidebar-link"><i class="mdi mdi-timer-sand-empty"></i> <span class="hide-menu">Session Idle Timeout</span></a></li>
                                <li class="sidebar-item"><a href="pages-utility-classes.html" class="sidebar-link"><i class="mdi mdi-tune"></i> <span class="hide-menu">Helper Classes</span></a></li>
                                <li class="sidebar-item"><a href="authentication-register2.html" class="sidebar-link"><i class="mdi mdi-account-plus"></i><span class="hide-menu"> Register 2</span></a></li>
                                <li class="sidebar-item"><a href="pages-maintenance.html" class="sidebar-link"><i class="mdi mdi-camera-iris"></i> <span class="hide-menu">Maintenance Page</span></a></li>
                                <li class="sidebar-item"><a href="ui-user-card.html" class="sidebar-link"><i class="mdi mdi-account-box"></i> <span class="hide-menu"> User Card </span></a></li>
                                <li class="sidebar-item"><a href="pages-profile.html" class="sidebar-link"><i class="mdi mdi-account-network"></i><span class="hide-menu"> User Profile</span></a></li>
                                <li class="sidebar-item"><a href="authentication-lockscreen.html" class="sidebar-link"><i class="mdi mdi-account-off"></i><span class="hide-menu"> Lockscreen</span></a></li>
                                <li class="sidebar-item"><a href="ui-user-contacts.html" class="sidebar-link"><i class="mdi mdi-account-star-variant"></i><span class="hide-menu"> User Contact</span></a></li>
                                <li class="sidebar-item"><a href="pages-invoice.html" class="sidebar-link"><i class="mdi mdi-vector-triangle"></i><span class="hide-menu"> Invoice Layout </span></a></li>
                                <li class="sidebar-item"><a href="pages-invoice-list.html" class="sidebar-link"><i class="mdi mdi-vector-rectangle"></i><span class="hide-menu"> Invoice List</span></a></li>
                                <li class="sidebar-item"><a href="authentication-recover-password.html" class="sidebar-link"><i class="mdi mdi-account-convert"></i><span class="hide-menu"> Recover password</span></a></li>
                                <li class="sidebar-item"><a href="map-google.html" class="sidebar-link"><i class="mdi mdi-google-maps"></i><span class="hide-menu"> Google Map </span></a></li>
                                <li class="sidebar-item"><a href="map-vector.html" class="sidebar-link"><i class="mdi mdi-map-marker-radius"></i><span class="hide-menu"> Vector Map</span></a></li>
                                <li class="sidebar-item"><a href="icon-material.html" class="sidebar-link"><i class="mdi mdi-emoticon"></i> <span class="hide-menu"> Material Icons </span></a></li>
                                <li class="sidebar-item"><a href="eco-products.html" class="sidebar-link"><i class="mdi mdi-cards-variant"></i> <span class="hide-menu">Eco - Products</span></a></li>
                                <li class="sidebar-item"><a href="icon-fontawesome.html" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> Fontawesome Icons</span></a></li>
                                <li class="sidebar-item"><a href="icon-themify.html" class="sidebar-link"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu"> Themify Icons</span></a></li>
                                <li class="sidebar-item"><a href="icon-weather.html" class="sidebar-link"><i class="mdi mdi-weather-cloudy"></i><span class="hide-menu"> Weather Icons</span></a></li>
                                <li class="sidebar-item"><a href="eco-products-cart.html" class="sidebar-link"><i class="mdi mdi-cart"></i> <span class="hide-menu">Eco- Products Cart</span></a></li>
                                <li class="sidebar-item"><a href="icon-simple-lineicon.html" class="sidebar-link"><i class="mdi mdi-image-broken-variant"></i> <span class="hide-menu"> Simple Line icons</span></a></li>
                                <li class="sidebar-item"><a href="icon-flag.html" class="sidebar-link"><i class="mdi mdi-flag-triangle"></i><span class="hide-menu"> Flag Icons</span></a></li>
                                <li class="sidebar-item"><a href="timeline-center.html" class="sidebar-link"><i class="mdi mdi-clock-fast"></i> <span class="hide-menu"> Center Timeline </span></a></li>
                                <li class="sidebar-item"><a href="eco-products-edit.html" class="sidebar-link"><i class="mdi mdi-cart-plus"></i> <span class="hide-menu">Eco- Products Edit</span></a></li>
                                <li class="sidebar-item"><a href="timeline-horizontal.html" class="sidebar-link"><i class="mdi mdi-clock-end"></i><span class="hide-menu"> Horizontal Timeline</span></a></li>
                                <li class="sidebar-item"><a href="timeline-left.html" class="sidebar-link"><i class="mdi mdi-clock-in"></i><span class="hide-menu"> Left Timeline</span></a></li>
                                <li class="sidebar-item"><a href="timeline-right.html" class="sidebar-link"><i class="mdi mdi-clock-start"></i><span class="hide-menu"> Right Timeline</span></a></li>
                                <li class="sidebar-item"><a href="eco-products-detail.html" class="sidebar-link"><i class="mdi mdi-camera-burst"></i> <span class="hide-menu">Eco- Product Details</span></a></li>
                                <li class="sidebar-item"><a href="error-400.html" class="sidebar-link"><i class="mdi mdi-alert-outline"></i> <span class="hide-menu"> Error 400 </span></a></li>
                                <li class="sidebar-item"><a href="error-403.html" class="sidebar-link"><i class="mdi mdi-alert-outline"></i><span class="hide-menu"> Error 403</span></a></li>
                                <li class="sidebar-item"><a href="error-404.html" class="sidebar-link"><i class="mdi mdi-alert-outline"></i><span class="hide-menu"> Error 404</span></a></li>
                                <li class="sidebar-item"><a href="eco-products-orders.html" class="sidebar-link"><i class="mdi mdi-chart-pie"></i> <span class="hide-menu">Eco- Product Orders</span></a></li>
                                <li class="sidebar-item"><a href="error-500.html" class="sidebar-link"><i class="mdi mdi-alert-outline"></i><span class="hide-menu"> Error 500</span></a></li>
                                <li class="sidebar-item"><a href="error-503.html" class="sidebar-link"><i class="mdi mdi-alert-outline"></i><span class="hide-menu"> Error 503</span></a></li>
                                <li class="sidebar-item"><a href="eco-products-checkout.html" class="sidebar-link"><i class="mdi mdi-clipboard-check"></i> <span class="hide-menu">Eco- Products Checkout</span></a></li>
                            </ul>
                        </li> --}}

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
                        {{-- <h4 class="page-title">Tukar Kata Laluan</h4> --}}
                        @for($i = 1; $i <= count(Request::segments()); $i++)
                            @if(!($i < count(Request::segments()) & $i > 0))
                            <h4 class="page-title">{{ucwords(str_replace('-',' ',Request::segment($i)))}}</h4>
                            @endif
                        @endfor
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">

                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">

                                    @if(Request::is('halaman-utama/rumah-ibadat'))

                                    @else
                                        <?php $link = "" ?>
                                        @for($i = 1; $i <= count(Request::segments()); $i++)
                                            @if($i < count(Request::segments()) & $i > 0)
                                            <?php $link .= "/" . Request::segment($i); ?>
                                                @if($i!=1)
                                                <a href="<?= $link ?>">&nbsp{{ ucwords(str_replace('-',' ',Request::segment($i)))}}</a> &nbsp>
                                                @endif
                                            @else
                                                @if($i == 1)
                                                    {{-- {{ucwords(str_replace('-',' ',Request::segment($i)))}} >&nbsp --}}
                                                @else
                                                    {{ucwords(str_replace('-',' ',Request::segment($i)))}}
                                                @endif
                                            @endif
                                        @endfor

                                    @endif
                                </ol>
                            </nav>

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
            <div class="modal fade" id="confirmation" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbspPengesahan!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    Anda pasti mahu log keluar sistem?
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">Log Keluar</button>
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
                Hakcipta Terpelihara 2021 © Pejabat Setiausaha Kerajaan Negeri Selangor. Designed and Developed by
                <a href="https://www.artaniscloud.com/">Artanis Cloud Sdn. Bhd.</a>
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
    <script src="{{asset('nice-admin/assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('nice-admin/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- apps -->
    <script src="{{asset('nice-admin/dist/js/app.min.js')}}"></script>
    <script src="{{asset('nice-admin/dist/js/app.init.horizontal.js')}}"></script>
    <script src="{{asset('nice-admin/dist/js/app-style-switcher.horizontal.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('nice-admin/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{asset('nice-admin/assets/extra-libs/sparkline/sparkline.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('nice-admin/dist/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('nice-admin/dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('nice-admin/dist/js/custom.js')}}"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="{{asset('nice-admin/assets/libs/chartist/dist/chartist.min.js')}}"></script>
    <script src="{{asset('nice-admin/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}"></script>
    <!--c3 charts -->
    <script src="{{asset('nice-admin/assets/extra-libs/c3/d3.min.js')}}"></script>
    <script src="{{asset('nice-admin/assets/extra-libs/c3/c3.min.js')}}"></script>
    <script src="{{asset('nice-admin/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('nice-admin/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('nice-admin/dist/js/pages/dashboards/dashboard1.js')}}"></script>
    {{-- font-awesome icon --}}
    <script src="{{asset('nice-admin/icon/js/all.js')}}"></script>
    <script src="{{asset('nice-admin/icon/js/brands.js')}}"></script>
    <script src="{{asset('nice-admin/icon/js/solid.js')}}"></script>
    <script src="{{asset('nice-admin/icon/js/fontawesome.js')}}"></script>

    {{-- toaster --}}
    <script src="{{asset('nice-admin/assets/libs/toastr/build/toastr.min.js')}}"></script>
    <script src="{{asset('nice-admin/assets/extra-libs/toastr/toastr-init.js')}}"></script>

    <script>
        @if (Session::get('success'))
            toastr.success('{{ session('success') }}', 'Berjaya', { "progressBar": true });
        @elseif ($message = Session::get('error'))
            toastr.error('{{ session('error') }}', 'Ralat', { "progressBar": true });
        @endif
    </script>

    {{-- <script type="text/javascript">
        $("document").ready(function(){
            setTimeout(function(){
                // $("div.alert").remove();
                $("div.alert").removeClass("alert-success border border-success");
                $("div.alert").removeClass("alert-danger border border-danger");
                // $("div.alert").empty();
                $("div.alert").css({ 'color': 'white'});
                $("div.alert").addClass("alert-white");
            }, 5000 ); // 5 secs  (1 sec = 1000)
        });
    </script> --}}
    <!-- ============================================================== -->
    <!-- END Jquery NICE PAGE -->
    <!-- ============================================================== -->
</body>
</html>
