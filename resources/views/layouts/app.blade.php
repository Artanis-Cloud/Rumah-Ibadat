<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sistem Bantuan Kewangan Lima Agama (Buddha, Kristian, Hindu, Sikh, dan Tao) Selangor</title>
    <link rel="icon"
        href="https://www.selangor.gov.my/selangor/modules_resources/settings/e026c76b5b3efce816eb5f1d0dfe1cc1.png"
        type="image/x-icon">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <!-- Template Klorin -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/@coreui/coreui@2.1.16/dist/css/coreui.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"
        rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />

    <!-- font-awesome icon -->
    <link rel="stylesheet" href="{{ asset('nice-admin/icon/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('nice-admin/icon/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('nice-admin/icon/css/brands.css') }}">
    <link rel="stylesheet" href="{{ asset('nice-admin/icon/css/solid.css') }}">

</head>
<style>
    html,
    body {
        /* background-color: #000; */
        /* background-image: url({{ url('https://www.selangor.gov.my/index/resources/tempfile%2029082017/kota-darul-ehsan-selangor-malaysia.jpg') }}); */
        background-image: url('https://headtopics.com/images/2021/4/23/fmtoday/buku-pendedahan-agenda-kristian-kerajaan-selangor-serah-pada-mais-untuk-jawab-1385526943995482115.webp');
        /* background-image: linear-gradient(to right top, #fa1c2d, #ff660f, #ff9900, #ffc700, #f6f234); */
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
        background-color: rgba(0, 0, 0, 0.7);
        background-blend-mode: darken;
        /* opacity: 0.7; */
        /* color: #fff; */
        /* font-family: 'Heebo', sans-serif; */
        /* font-weight: 400;s */
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: center;
        bottom: 8rem;
        right: 750px;

    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
        font-family: 'Yeseva One', cursive;
    }

    .links>a {
        color: #fff;
        padding: 15px 25px;
        font-size: 15px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }

</style>

<body class="header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden login-page">
    <div class="flex-row app align-items-center">
        <div class="container">
            @yield("content")
        </div>
    </div>
    @yield('scripts')
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $("document").ready(function() {
        setTimeout(function() {
            // $("div.alert").remove();
            $("div.alert").removeClass("alert-success border border-success");
            $("div.alert").removeClass("alert-danger border border-danger");
            // $("div.alert").empty();
            $("div.alert").css({
                'color': 'white'
            });
            $("div.alert").addClass("alert-white");
        }, 5000); // 5 secs  (1 sec = 1000)
    });
</script>

</html>
