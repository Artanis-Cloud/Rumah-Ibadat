@extends('layouts.layout-yb')

@section('content')
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">

<!-- ============================================================== -->
<!-- Sales chart -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-lg-3 col-md-6">
        <a class="card shadow card-hover bg-info" href="{{ route('ybs.permohonan.baru') }}">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div class="text-white">
                        <h2>{{ $count_new_application }}</h2>
                        <h6>Permohonan <br>Baru</h6> 
                    </div>
                    <div class="ml-auto">
                        <span class="text-white display-6"><i class="fas fa-clipboard"></i></span>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6">
        <a class="card shadow card-hover bg-warning" href="{{ route('ybs.permohonan.sedang-diproses') }}">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div class="text-white">
                        <h2>{{ $count_processing_application }}</h2>
                        <h6>Permohonan <br>Sedang Diproses</h6>
                    </div>
                    <div class="ml-auto">
                        <span class="text-white display-6"><i class="fas fa-sync-alt"></i></span>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6">
        <a class="card shadow card-hover bg-success" href="{{ route('ybs.permohonan.lulus') }}">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div class="text-white">
                        <h2>{{ $count_passed_application }}</h2>
                        <h6>Permohonan <br>Lulus</h6>
                    </div>
                    <div class="ml-auto">
                        <span class="text-white display-6"><i class="fas fa-clipboard-check"></i></span>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6">
        <a class="card shadow card-hover bg-danger" href="{{ route('ybs.permohonan.tidak-lulus') }}">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div class="text-white">
                        <h2>{{ $count_failed_application }}</h2>
                        <h6>Permohonan <br>Tidak Lulus</h6>
                    </div>
                    <div class="ml-auto">
                        <span class="text-white display-6"><i class="fas fa-times-circle"></i></span>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-md-5">
        <div class="card border shadow">
            <div class="card-header border-cyan" style="border-left: solid 8px; border-bottom: solid 1px;">
                <h4 class="card-title"><i class="fas fa-bell"></i> &nbsp&nbsp Permohonan Terkini</h4>
            </div>
            <div class="comment-widgets scrollable" style="height:350px;">
        

                @foreach($new_application as $data)
                <form action="{{ route('ybs.permohonan.papar') }}" onclick="javascript:$(this).submit();">
                    <div class="flex-row d-flex comment-row">   
                        <div class="comment-text active w-100">
                            <h6 class="font-medium">{{ $data->rumah_ibadat->name_association }}</h6>
                            <span class="m-b-15 d-block">{{ $data->user->name }}</span>
                            <span class="m-b-15 d-block">{{ $data->getPermohonanID() }}</span>
                            <input type="hidden" name="permohonan_id" value="{{ $data->id }}" readonly>
                            <div class="comment-footer ">
                                <span class="float-right text-muted">{{ Carbon\Carbon::parse($data->created_at)->format('g:i a') }} | {{ Carbon\Carbon::parse($data->created_at)->format('d M Y') }}</span>
                                @if($data->rumah_ibadat->category == "TOKONG")
                                <span class="label label-primary" style="font-size: 13px;">Tokong</span>
                                @elseif($data->rumah_ibadat->category == "KUIL")
                                <span class="label label-primary" style="font-size: 13px;">Kuil</span>
                                @elseif($data->rumah_ibadat->category == "GURDWARA")
                                <span class="label label-primary" style="font-size: 13px;">Gurdwara</span>
                                @elseif($data->rumah_ibadat->category == "GEREJA")
                                <span class="label label-primary" style="font-size: 13px;">Gereja</span>
                                @endif
                                <span class="label label-success label-info" style="font-size: 13px;">Sedang Diproses</span>
                            </div>
                        </div>
                    </div>
                </form>
                @endforeach 
                
                @foreach($special_application as $data)
                    <form action="{{ route('ybs.permohonan.khas.papar') }}" onclick="javascript:$(this).submit();">
                        <div class="flex-row d-flex comment-row">   
                            <div class="comment-text active w-100">
                                <h6 class="font-medium">Permohonan Khas</h6>
                                <span class="m-b-15 d-block">{{ $data->user->name }}</span>
                                <span class="m-b-15 d-block">{{ $data->getPermohonanID() }}</span>
                                <input type="hidden" name="permohonan_khas_id" value="{{ $data->id }}" readonly>
                                <div class="comment-footer ">
                                    <span class="float-right text-muted">{{ Carbon\Carbon::parse($data->created_at)->format('g:i a') }} | {{ Carbon\Carbon::parse($data->created_at)->format('d M Y') }}</span>
                                    @if($data->category == "TOKONG")
                                    <span class="label label-primary" style="font-size: 13px;">Tokong</span>
                                    @elseif($data->category == "KUIL")
                                    <span class="label label-primary" style="font-size: 13px;">Kuil</span>
                                    @elseif($data->category == "GURDWARA")
                                    <span class="label label-primary" style="font-size: 13px;">Gurdwara</span>
                                    @elseif($data->category == "GEREJA")
                                    <span class="label label-primary" style="font-size: 13px;">Gereja</span>
                                    @endif
                                    <span class="label label-success label-info" style="font-size: 13px;">Sedang Diproses</span>
                                    <span class="label label-success label-warning text-dark" style="font-size: 13px;">Khas</span>
                                </div>
                            </div>
                        </div>
                    </form>
                @endforeach


                @if($new_application->isEmpty() && $special_application->isEmpty())
                <div style="padding-bottom: 5%;"></div>
                <div class="flex-row d-flex comment-row">   
                    <div class="comment-text active w-100">
                        <div style="width:100%; text-align:center">
                            {{-- <img src="https://image.flaticon.com/icons/png/512/1380/1380641.png" alt="Empty Box" style="width: 100px;"> --}}
                            <lord-icon
                                src="https://cdn.lordicon.com/nlzvfogq.json"
                                trigger="loop"
                                delay="30"
                                colors="primary:#121331,secondary:#3080e8"
                                style="width:200px;height:auto">
                            </lord-icon>
                        </div>
                        <h6 class="font-medium text-center" style="padding-top: 25px;">Tiada Permohonan Baru</h6>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>

    <div class="col-md-5">
        <div class="card border shadow">
            <div class="card-header border-cyan" style="border-left: solid 8px; border-bottom: solid 1px;">
                <h4 class="card-title"><i class="fas fa-bullhorn"></i> &nbsp&nbsp Pengumuman</h4>
            </div>
            <div class="comment-widgets scrollable" style="height:350px;">

                <div style="padding-bottom: 5%;"></div>
                <div class="flex-row d-flex comment-row">   
                    <div class="comment-text active w-100 text-center">
                        <lord-icon
                            src="https://cdn.lordicon.com/cnbtojmk.json"
                            trigger="loop"
                            delay="15"
                            colors="primary:#121331,secondary:#3080e8"
                            stroke="41"
                            style="width:200px;height:auto"
                            >
                        </lord-icon>
                        <h6 class="font-medium text-center" style="padding-top: 25px;">Tiada Pengumuman</h6>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

@if(auth()->user()->user_role->tokong == 1)
<div class="row">
    <div class="col-md-8">

        <div class="card border shadow">
            <div class="card-header border-purple" style="border-left: solid 8px; border-bottom: solid 1px;">
                <h4 class="card-title"><i class="fas fa-chart-bar"></i> &nbsp&nbsp Laporan Perbelanjaan Rumah Ibadat - Tokong</h4>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-xs-12 col-md-6">
                            <h3 class="font-light m-b-0">Tahun {{ $current_year }}</h3>
                            <span class="font-14 text-muted">Jumlah Peruntukan Tahunan</span>
                        </div>
                        <div class="text-right col-xs-12 col-md-6 align-self-center display-6 text-purple">RM {{ number_format($annual_report->total_tokong, 2) }}</div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-12">
                            <h3><b>RM {{ number_format($annual_report->balance_tokong, 2) }}</b> / RM {{ number_format($annual_report->total_tokong, 2) }}</h3>
                            <h6 class="text-muted">Baki Peruntukan Rumah Ibadat Tokong</h6>
                        </div>

                        <div class="col-12" >
                            <div class="progress">
                                <?php 
                                $percentage_tokong = 100;
                                if( $annual_report->total_tokong != 0){
                                    $percentage_tokong = ($annual_report->balance_tokong / $annual_report->total_tokong) * 100;
                                    $percentage_tokong = number_format($percentage_tokong);
                                    if($percentage_tokong > 100){
                                        $percentage_tokong = 100;
                                    }
                                }
                                ?>
                                <div class="progress-bar bg-purple" role="progressbar" style="width: {{ $percentage_tokong }}%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($laporan_tokong != null || $khas_tokong != null)
                    <div class="table-responsive m-t-40" style="clear: both; padding-top: 20px;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Tujuan Permohonan</th>
                                    <th class="text-center">Permohonan</th>
                                    <th class="text-right">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td class="text-center">1</td>
                                    <td>PERMOHONAN KHAS</td>
                                    <td class="text-center">{{ $count_khas_tokong }}</td>
                                    <td class="text-right">RM {{ number_format($khas_tokong, 2) }}</td>
                                </tr>

                                @foreach($laporan_tokong as $key => $tokong)
                                <tr>
                                    <td class="text-center">{{ ($key + 2) }}</td>
                                    <td>{{ $tokong->tujuan }}</td>
                                    <td class="text-center"> {{ $tokong->bilangan }} </td>
                                    <td class="text-right"> RM {{ number_format($tokong->peruntukan, 2) }} </td>
                                </tr>
                                @endforeach

                                
                                
                                <tr>
                                    <th colspan="3" class="text-right font-18">Jumlah Peruntukan Yang Telah Diluluskan</th>
                                    <th class="text-right font-13">RM {{ number_format($annual_report->current_tokong, 2) }}</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>

        </div>

    </div>
</div>
@endif

@if(auth()->user()->user_role->kuil == 1)
<div class="row">
    <div class="col-md-8">

        <div class="card border shadow">
            <div class="card-header border-purple" style="border-left: solid 8px; border-bottom: solid 1px;">
                <h4 class="card-title"><i class="fas fa-chart-bar"></i> &nbsp&nbsp Laporan Perbelanjaan Rumah Ibadat - Kuil</h4>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-xs-12 col-md-6">
                            <h3 class="font-light m-b-0">Tahun {{ $current_year }}</h3>
                            <span class="font-14 text-muted">Jumlah Peruntukan Tahunan</span>
                        </div>
                        <div class="text-right col-xs-12 col-md-6 align-self-center display-6 text-purple">RM {{ number_format($annual_report->total_kuil, 2) }}</div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-12">
                            <h3><b>RM {{ number_format($annual_report->balance_kuil, 2) }}</b> / RM {{ number_format($annual_report->total_kuil, 2) }}</h3>
                            <h6 class="text-muted">Baki Peruntukan Rumah Ibadat Tokong</h6>
                        </div>

                        <div class="col-12" >
                            <div class="progress">
                                <?php 
                                $percentage_kuil = 100;
                                if( $annual_report->total_kuil != 0){
                                    $percentage_kuil = ($annual_report->balance_kuil / $annual_report->total_kuil) * 100;
                                    $percentage_kuil = number_format($percentage_kuil);
                                    if($percentage_kuil > 100){
                                        $percentage_kuil = 100;
                                    }
                                }
                                ?>
                                <div class="progress-bar bg-purple" role="progressbar" style="width: {{ $percentage_kuil }}%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($laporan_kuil != null || $khas_kuil != null)
                    <div class="table-responsive m-t-40" style="clear: both; padding-top: 20px;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Tujuan Permohonan</th>
                                    <th class="text-center">Permohonan</th>
                                    <th class="text-right">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td class="text-center">1</td>
                                    <td>PERMOHONAN KHAS</td>
                                    <td class="text-center">{{ $count_khas_kuil }}</td>
                                    <td class="text-right">RM {{ number_format($khas_kuil, 2) }}</td>
                                </tr>

                                @foreach($laporan_kuil as $key => $kuil)
                                <tr>
                                    <td class="text-center">{{ ($key + 2) }}</td>
                                    <td>{{ $kuil->tujuan }}</td>
                                    <td class="text-center"> {{ $kuil->bilangan }} </td>
                                    <td class="text-right"> RM {{ number_format($kuil->peruntukan, 2) }} </td>
                                </tr>
                                @endforeach
                                
                                
                                <tr>
                                    <th colspan="3" class="text-right font-18">Jumlah Peruntukan Yang Telah Diluluskan</th>
                                    <th class="text-right font-13">RM {{ number_format($annual_report->current_kuil, 2) }}</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>

        </div>

    </div>
</div>
@endif

@if(auth()->user()->user_role->gurdwara == 1)
<div class="row">
    <div class="col-md-8">

        <div class="card border shadow">
            <div class="card-header border-purple" style="border-left: solid 8px; border-bottom: solid 1px;">
                <h4 class="card-title"><i class="fas fa-chart-bar"></i> &nbsp&nbsp Laporan Perbelanjaan Rumah Ibadat - Gurdwara</h4>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-xs-12 col-md-6">
                            <h3 class="font-light m-b-0">Tahun {{ $current_year }}</h3>
                            <span class="font-14 text-muted">Jumlah Peruntukan Tahunan</span>
                        </div>
                        <div class="text-right col-xs-12 col-md-6 align-self-center display-6 text-purple">RM {{ number_format($annual_report->total_gurdwara, 2) }}</div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-12">
                            <h3><b>RM {{ number_format($annual_report->balance_gurdwara, 2) }}</b> / RM {{ number_format($annual_report->total_gurdwara, 2) }}</h3>
                            <h6 class="text-muted">Baki Peruntukan Rumah Ibadat Tokong</h6>
                        </div>

                        <div class="col-12" >
                            <div class="progress">
                                <?php 
                                $percentage_gurdwara = 100;
                                if( $annual_report->total_gurdwara != 0){
                                    $percentage_gurdwara = ($annual_report->balance_gurdwara / $annual_report->total_gurdwara) * 100;
                                    $percentage_gurdwara = number_format($percentage_gurdwara);
                                    if($percentage_gurdwara > 100){
                                        $percentage_gurdwara = 100;
                                    }
                                }
                                ?>
                                <div class="progress-bar bg-purple" role="progressbar" style="width: {{ $percentage_gurdwara }}%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($laporan_gurdwara != null || $khas_gurdwara != null)
                    <div class="table-responsive m-t-40" style="clear: both; padding-top: 20px;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Tujuan Permohonan</th>
                                    <th class="text-center">Permohonan</th>
                                    <th class="text-right">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td class="text-center">1</td>
                                    <td>PERMOHONAN KHAS</td>
                                    <td class="text-center">{{ $count_khas_gurdwara }}</td>
                                    <td class="text-right">RM {{ number_format($khas_gurdwara, 2) }}</td>
                                </tr>

                                @foreach($laporan_gurdwara as $key => $gurdwara)
                                <tr>
                                    <td class="text-center">{{ ($key + 2) }}</td>
                                    <td>{{ $gurdwara->tujuan }}</td>
                                    <td class="text-center"> {{ $gurdwara->bilangan }} </td>
                                    <td class="text-right"> RM {{ number_format($gurdwara->peruntukan, 2) }} </td>
                                </tr>
                                @endforeach
                                
                                
                                <tr>
                                    <th colspan="3" class="text-right font-18">Jumlah Peruntukan Yang Telah Diluluskan</th>
                                    <th class="text-right font-13">RM {{ number_format($annual_report->current_gurdwara, 2) }}</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>

        </div>

    </div>
</div>
@endif

@if(auth()->user()->user_role->gereja == 1)
<div class="row">
    <div class="col-md-8">

        <div class="card border shadow">
            <div class="card-header border-purple" style="border-left: solid 8px; border-bottom: solid 1px;">
                <h4 class="card-title"><i class="fas fa-chart-bar"></i> &nbsp&nbsp Laporan Perbelanjaan Rumah Ibadat - Gereja</h4>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-xs-12 col-md-6">
                            <h3 class="font-light m-b-0">Tahun {{ $current_year }}</h3>
                            <span class="font-14 text-muted">Jumlah Peruntukan Tahunan</span>
                        </div>
                        <div class="text-right col-xs-12 col-md-6 align-self-center display-6 text-purple">RM {{ number_format($annual_report->total_gereja, 2) }}</div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-12">
                            <h3><b>RM {{ number_format($annual_report->balance_gereja, 2) }}</b> / RM {{ number_format($annual_report->total_gereja, 2) }}</h3>
                            <h6 class="text-muted">Baki Peruntukan Rumah Ibadat Tokong</h6>
                        </div>

                        <div class="col-12" >
                            <div class="progress">
                                <?php 
                                $percentage_gereja = 100;
                                if( $annual_report->total_gereja != 0){
                                    $percentage_gereja = ($annual_report->balance_gereja / $annual_report->total_gereja) * 100;
                                    $percentage_gereja = number_format($percentage_gereja);
                                    if($percentage_gereja > 100){
                                        $percentage_gereja = 100;
                                    }
                                }
                                ?>
                                <div class="progress-bar bg-purple" role="progressbar" style="width: {{ $percentage_gereja }}%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($laporan_gereja != null || $khas_gereja != null)
                    <div class="table-responsive m-t-40" style="clear: both; padding-top: 20px;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Tujuan Permohonan</th>
                                    <th class="text-center">Permohonan</th>
                                    <th class="text-right">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td class="text-center">1</td>
                                    <td>PERMOHONAN KHAS</td>
                                    <td class="text-center">{{ $count_khas_gereja }}</td>
                                    <td class="text-right">RM {{ number_format($khas_gereja, 2) }}</td>
                                </tr>

                                @foreach($laporan_gereja as $key => $gereja)
                                <tr>
                                    <td class="text-center">{{ ($key + 2) }}</td>
                                    <td>{{ $gereja->tujuan }}</td>
                                    <td class="text-center"> {{ $gereja->bilangan }} </td>
                                    <td class="text-right"> RM {{ number_format($gereja->peruntukan, 2) }} </td>
                                </tr>
                                @endforeach
                                
                                
                                <tr>
                                    <th colspan="3" class="text-right font-18">Jumlah Peruntukan Yang Telah Diluluskan</th>
                                    <th class="text-right font-13">RM {{ number_format($annual_report->current_gereja, 2) }}</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>

        </div>

    </div>
</div>
@endif



</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
@endsection
