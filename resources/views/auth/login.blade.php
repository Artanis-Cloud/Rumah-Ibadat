@extends('layouts.app')
@section('content')

    <body>
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="mb-5 text-center col-md-6">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-12 col-lg-10">

                        <div class="wrap d-md-flex">
                            <div class="p-4 text-center text-wrap p-lg-5 d-flex align-items-center order-md-last"
                                style="background: linear-gradient(135deg, #5cfcff 0%, #4da5e8 100%);">
                                <div class="text w-100">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/90/Coat_of_arms_of_Selangor.svg/1200px-Coat_of_arms_of_Selangor.svg.png"
                                            style="width: auto; height: 90px;" alt="Kerajaan Selangor">
                                    <h2 style="padding-top: 15px !important;">Selamat Datang <br> Ke <br> Sistem Bantuan Kewangan <br> Lima Agama <br> Selangor</h2>
                                    <a href="{{ route('register') }}" class="btn btn-white btn-outline-white">Daftar
                                        Masuk</a>

                                    <a href="{{ asset('Regna/assets/img/user_manual.pdf') }}" target="_blank" class="btn btn-white btn-outline-white"><i class="fas fa-book"></i>&nbspManual
                            Pengguna</button></a>
                                </div>
                            </div>
                            <div class="p-4 login-wrap p-lg-5">
                                {{-- Flash Message --}}
                                @if ($message = Session::get('success'))
                                    <div class="border alert alert-success border-success" style="text-align: center;">
                                        {{ $message }}</div>
                                @elseif ($message = Session::get('error'))
                                    <div class="border alert alert-danger border-danger" style="text-align: center;">
                                        {{ $message }}</div>
                                @else
                                    {{-- Hidden Gap - Just Ignore --}}
                                    <div class="alert alert-white" style="text-align: center;"></div>
                                    {{-- <div style="padding: 23px;"></div> --}}
                                @endif

                                <div class="d-flex">
                                    <div class="w-100">
                                        <h3 class="mb-4 text-center">Log Masuk</h3>
                                    </div>
                                </div>
                                <form method="POST" action="{{ route('login') }}">
                                    {{ csrf_field() }}
                                    <div class="mb-3 form-group">
                                        <label class="label" for="name">Emel / Kad Pengenalan</label>
                                        <input type="text" name="email" class="form-control"
                                            placeholder="Emel / Kad Pengenalan" required>
                                    </div>
                                    <div class="mb-3 form-group">
                                        <label class="label" for="password">Kata Laluan</label>
                                        <input type="password" name="password" class="form-control"
                                            placeholder="Kata Laluan" required>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="px-3 form-control btn btn-primary submit">Log
                                            Masuk</button>
                                    </div>
                                    <div class="form-group d-md-flex">
                                        <div class="text-left w-50">
                                            <a href="{{ route('welcome') }}">Halaman Utama</a>
                                        </div>
                                        {{-- <div class="w-50 text-md-right">
                                            <a href="{{ route('password.request') }}">Terlupa Kata Laluan?</a>
                                        </div> --}}
                                        <div class="w-50 text-md-right">
                                            <a href="{{ route('forget.password') }}">Terlupa Kata Laluan?</a>
                                        </div>
                                        {{-- Hidden Gap - Just Ignore --}}
                                        <div class="alert alert-white" style="text-align: center;"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </body>
@endsection
