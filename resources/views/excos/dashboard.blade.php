@extends('layouts.layout-exco')

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
        <a class="card shadow card-hover bg-info" href="{{ route('excos.permohonan.baru') }}">
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
        <a class="card shadow card-hover bg-warning" href="{{ route('excos.permohonan.sedang-diproses') }}">
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
        <a class="card shadow card-hover bg-success" href="{{ route('excos.permohonan.lulus') }}">
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
        <a class="card shadow card-hover bg-danger" href="{{ route('excos.permohonan.tidak-lulus') }}">
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
            <div class="comment-widgets scrollable" style="height:auto; max-height: 440px !important; min-height: 290px !important;">

                @foreach($new_application as $data)
                <form action="{{ route('excos.permohonan.papar') }}" onclick="javascript:$(this).submit();">
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
                    <form action="{{ route('excos.permohonan.khas.papar') }}" onclick="javascript:$(this).submit();">
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
                <div style="padding-bottom: 10%;"></div>
                <div class="flex-row d-flex comment-row">   
                    <div class="comment-text active w-100">
                        <div style="width:100%; text-align:center">
                            <img src="https://image.flaticon.com/icons/png/512/1380/1380641.png" alt="Empty Box" style="width: 100px;">
                        </div>
                        <h6 class="font-medium text-center" style="padding-top: 25px;">Tiada Permohonan Baru</h6>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>

    <div class="col-md">

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

                    @if($laporan_tokong != null)
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
                                    <td class="text-center">{{ $khas_count }}</td>
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

</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
@endsection
