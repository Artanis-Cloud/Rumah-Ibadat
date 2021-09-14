<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div style="position: absolute; top: 0px; width: 100%;background-color: #0d6efd;">
        <marquee direction="right" scrollamount="10" style="padding-top: 5px; color: white;">
            | Sistem Bantuan Kewangan Rumah Ibadat Selain Islam |
            Sistem Bantuan Kewangan Rumah Ibadat Selain Islam |
            Sistem Bantuan Kewangan Rumah Ibadat Selain Islam |
            Sistem Bantuan Kewangan Rumah Ibadat Selain Islam |
            Sistem Bantuan Kewangan Rumah Ibadat Selain Islam |
            Sistem Bantuan Kewangan Rumah Ibadat Selain Islam |
            Sistem Bantuan Kewangan Rumah Ibadat Selain Islam |
            Sistem Bantuan Kewangan Rumah Ibadat Selain Islam |
            Sistem Bantuan Kewangan Rumah Ibadat Selain Islam |
            Sistem Bantuan Kewangan Rumah Ibadat Selain Islam |
        </marquee>
    </div>

    <div class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
        <lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop"
            colors="primary:#000000,secondary:#3080e8" style="width:250px;height:250px;">
        </lord-icon>
        <span class="text-bold" style="font-size: 60pt; margin: 0px !important; padding 0px !important;">Ralat @yield('code', __('Oh no'))</span>
        <span style="font-size: 30pt; color: rgb(116, 113, 113);">@yield('message')</span>

        <button class="btn btn-primary btn-block"
            onclick="window.location='{{ route('welcome') }}'">Halaman&nbspUtama</button>

    </div>
    <div style="position: absolute; bottom: 0px; width: 100%;background-color: #0d6efd;">
        <marquee direction="left" scrollamount="10" style="padding-top: 5px; color: white;">
            | Sistem Bantuan Kewangan Rumah Ibadat Selain Islam |
            Sistem Bantuan Kewangan Rumah Ibadat Selain Islam |
            Sistem Bantuan Kewangan Rumah Ibadat Selain Islam |
            Sistem Bantuan Kewangan Rumah Ibadat Selain Islam |
            Sistem Bantuan Kewangan Rumah Ibadat Selain Islam |
            Sistem Bantuan Kewangan Rumah Ibadat Selain Islam |
            Sistem Bantuan Kewangan Rumah Ibadat Selain Islam |
            Sistem Bantuan Kewangan Rumah Ibadat Selain Islam |
            Sistem Bantuan Kewangan Rumah Ibadat Selain Islam |
            Sistem Bantuan Kewangan Rumah Ibadat Selain Islam |
        </marquee>
    </div>


</body>
<script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>

</html>
