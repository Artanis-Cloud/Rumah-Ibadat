@extends('layouts.app')
@section('content')
<div class="row justify-content-center" style="padding: 5%;">
    <div class="col-md-8">
        <div class="card-group" style="padding-top: 10%">
            <div class="card p-3">
                <div class="card-body">
                <center>
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/90/Coat_of_arms_of_Selangor.svg/1200px-Coat_of_arms_of_Selangor.svg.png" >
                </center>
                <h1 style="padding-top: 20px; text-align: center;">Sistem Bantuan Kewangan Rumah Ibadat</h1>
                <h3 style="text-align: center;">Pejabat Setiausaha Kerajaan Negeri Selangor Darul Ehsan</h3>





                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-4" style="padding-top: 3%;">
                    <a href="{{ route('register') }}">
                        <button type="button" class="btn btn-primary px-2" style="font-size: 15px !important; width: 100%;">
                                Daftar
                        </button>
                    </a>
                    </div>
                    <div class="col-md-4" style="padding-top: 3%;">
                        <a href="{{ route('login') }}">
                        <button type="button" class="btn btn-primary px-2" style="font-size: 15px !important; width: 100%;">
                                Log Masuk
                        </button>
                    </a>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
