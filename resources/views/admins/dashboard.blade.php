@extends('layouts.layout-admin')

@section('content')
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">

<div class="row">
    <div class="col-lg-3 col-md-6">
        <a class="card shadow card-hover bg-info" href="{{ route('admins.pengguna.pemohon') }}">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div class="text-white">
                        <h2>{{ $counter_pemohon }}</h2>
                        <h6>Pemohon <br>Berdaftar</h6> 
                    </div>
                    <div class="ml-auto">
                        <span class="text-white display-6"><i class="fas fa-clipboard"></i></span>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6">
        <a class="card shadow card-hover bg-warning" href="{{ route('admins.pengguna.pengguna-dalaman') }}">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div class="text-white">
                        <h2>{{ $counter_pengguna }}</h2>
                        <h6>Pengguna <br>Dalaman</h6> 
                    </div>
                    <div class="ml-auto">
                        <span class="text-white display-6"><i class="fas fa-undo"></i></span>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6">
        <a class="card shadow card-hover bg-success" href="{{ route('admins.rumah-ibadat.senarai') }}">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div class="text-white">
                        <h2>{{ $counter_rumah_ibadat }}</h2>
                        <h6>Rumah Ibadat <br>Berdaftar</h6>
                    </div>
                    <div class="ml-auto">
                        <span class="text-white display-6"><i class="fas fa-clipboard-check"></i></span>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6">
        <a class="card shadow card-hover bg-danger" href="{{ route('admins.audit-trail.log-user') }}">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div class="text-white">
                        <h2>{{ $counter_audit_log_access }}</h2>
                        <h6>Akses <br>Sistem</h6>
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
    <div class="col-md">

        <div class="card border shadow">
            <div class="card-header border-purple" style="border-left: solid 8px; border-bottom: solid 1px;">
                <div class="row">
                    <div class="col-md">
                        <h3 class="card-title"><i class="fas fa-chart-bar"></i> &nbsp&nbsp Laporan Perbelanjaan Rumah Ibadat - Keseluruhan</h3>
                    </div>
                    {{-- <div class="ml-auto">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#update_fund"><i class="fas fa-coins"></i> Kemaskini Peruntukan</button>
                    </div> --}}
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-xs-12 col-md-6">
                            <h2 class="font-light m-b-0">Tahun {{ $current_year }}</h2>
                            <span class="font-14 text-muted">Jumlah Peruntukan Tahunan</span>
                        </div>
                        <div class="text-right col-xs-12 col-md-6 align-self-center display-4 text-purple">RM {{ number_format($annual_report->total_fund, 2) }}</div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-12">
                            <h3><b>RM {{ number_format($annual_report->balance_fund, 2) }}</b> / RM {{ number_format($annual_report->total_fund, 2) }}</h3>
                            <h6 class="text-muted">Baki Peruntukan Rumah Ibadat Tokong</h6>
                        </div>

                        <div class="col-12" >
                            <div class="progress">
                                <?php 
                                $percentage_semua = 100;
                                if( $annual_report->total_tokong != 0){
                                    $percentage_semua = ($annual_report->balance_tokong / $annual_report->total_tokong) * 100;
                                    $percentage_semua = number_format($percentage_semua);
                                    if($percentage_semua > 100){
                                        $percentage_semua = 100;
                                    }
                                }
                                ?>
                                <div class="progress-bar bg-purple" role="progressbar" style="width: {{ $percentage_semua }}%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($laporan_semua != null || $khas_semua != null)
                    <div class="table-responsive m-t-40" style="clear: both; padding-top: 20px;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Tujuan Permohonan</th>
                                    <th width="100" class="text-center">Permohonan</th>
                                    <th width="180" class="text-right">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td class="text-center">1</td>
                                    <td>PERMOHONAN KHAS</td>
                                    <td class="text-center">{{ $count_khas_semua }}</td>
                                    <td class="text-right">RM {{ number_format($khas_semua, 2) }}</td>
                                </tr>

                                @foreach($laporan_semua as $key => $semua)
                                <tr>
                                    <td class="text-center">{{ ($key + 2) }}</td>
                                    <td>{{ $semua->tujuan }}</td>
                                    <td class="text-center"> {{ $semua->bilangan }} </td>
                                    <td class="text-right"> RM {{ number_format($semua->peruntukan, 2) }} </td>
                                </tr>
                                @endforeach

                                
                                
                                <tr>
                                    <th colspan="3" class="text-right font-18">Jumlah Peruntukan Yang Telah Diluluskan</th>
                                    <th class="text-right font-13">RM {{ number_format($annual_report->current_fund, 2) }}</th>
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

<div class="row">
    <div class="col-md-6">

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
                        <div class="text-right col-xs-12 col-md-6 align-self-center display-7 text-purple">RM {{ number_format($annual_report->total_tokong, 2) }}</div>
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

    <div class="col-md-6">

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
                        <div class="text-right col-xs-12 col-md-6 align-self-center display-7 text-purple">RM {{ number_format($annual_report->total_kuil, 2) }}</div>
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

    <div class="col-md-6">

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
                        <div class="text-right col-xs-12 col-md-6 align-self-center display-7 text-purple">RM {{ number_format($annual_report->total_gurdwara, 2) }}</div>
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

    <div class="col-md-6">

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
                        <div class="text-right col-xs-12 col-md-6 align-self-center display-7 text-purple">RM {{ number_format($annual_report->total_gereja, 2) }}</div>
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

</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<script>
    $(document).ready( function () {
    $('#tablestatus').DataTable({
        "language": {
            "lengthMenu": "Memaparkan _MENU_ rekod per halaman",
            "zeroRecords": "Maaf, tiada rekod.",
            "info": "Memaparkan halaman _PAGE_ dari _PAGES_",
            "infoEmpty": "Tidak ada rekod yang tersedia",
            "infoFiltered": "(Ditapis dari _MAX_ jumlah rekod)",
            "search": "Carian",
            "previous": "Sebelum",
            "paginate": {
                "first":      "Pertama",
                "last":       "Terakhir",
                "next":       "Seterusnya",
                "previous":   "Sebelumnya"
            },
        },
    });
}
);
</script>
@endsection
