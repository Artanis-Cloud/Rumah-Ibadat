@extends('layouts.layout-upen')

@section('content')
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-3 col-md-6">
                <a class="card shadow card-hover bg-info" href="{{ route('upens.permohonan.baru') }}">
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
                <a class="card shadow card-hover bg-warning" href="{{ route('upens.permohonan.semak-semula') }}">
                    <div class="card-body">
                        <div class="d-flex no-block align-items-center">
                            <div class="text-white">
                                <h2>{{ $count_review_application }}</h2>
                                <h6>Permohonan <br>Semak Semula</h6>
                            </div>
                            <div class="ml-auto">
                                <span class="text-white display-6"><i class="fas fa-undo"></i></span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a class="card shadow card-hover bg-success" href="{{ route('upens.permohonan.lulus') }}">
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
                <a class="card shadow card-hover bg-danger" href="{{ route('upens.permohonan.tidak-lulus') }}">
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
            <div class="col-md-6">
                <div class="card border shadow">
                    <div class="card-header border-cyan" style="border-left: solid 8px; border-bottom: solid 1px;">
                        <h4 class="card-title"><i class="fas fa-bell"></i> &nbsp&nbsp Permohonan Terkini</h4>
                    </div>
                    <div class="comment-widgets scrollable" style="height:350px;">


                        @foreach ($new_application as $data)
                            <form action="{{ route('upens.permohonan.papar') }}" onclick="javascript:$(this).submit();">
                                <div class="flex-row d-flex comment-row">
                                    <div class="comment-text active w-100">
                                        <h6 class="font-medium">{{ $data->rumah_ibadat->name_association }}</h6>
                                        <span class="m-b-15 d-block">{{ $data->user->name }}</span>
                                        <span class="m-b-15 d-block">{{ $data->getPermohonanID() }}</span>
                                        <input type="hidden" name="permohonan_id" value="{{ $data->id }}" readonly>
                                        <div class="comment-footer ">
                                            <span
                                                class="float-right text-muted">{{ Carbon\Carbon::parse($data->created_at)->format('g:i a') }}
                                                | {{ Carbon\Carbon::parse($data->created_at)->format('d M Y') }}</span>
                                            @if ($data->rumah_ibadat->category == 'TOKONG')
                                                <span class="label label-primary" style="font-size: 13px;">Tokong</span>
                                            @elseif($data->rumah_ibadat->category == "KUIL")
                                                <span class="label label-primary" style="font-size: 13px;">Kuil</span>
                                            @elseif($data->rumah_ibadat->category == "GURDWARA")
                                                <span class="label label-primary" style="font-size: 13px;">Gurdwara</span>
                                            @elseif($data->rumah_ibadat->category == "GEREJA")
                                                <span class="label label-primary" style="font-size: 13px;">Gereja</span>
                                            @endif
                                            <span class="label label-success label-info" style="font-size: 13px;">Sedang
                                                Diproses</span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endforeach


                        @if ($new_application->isEmpty())
                            <div style="padding-bottom: 15%;"></div>
                            <div style="width:100%; text-align:center">
                                <img src="{{ asset('assets/img/warning.gif') }}" alt="Empty Box"
                                    style="width: 150px;">
                                {{-- <lord-icon
                        src="https://cdn.lordicon.com/nlzvfogq.json"
                        trigger="loop"
                        delay="15"
                        colors="primary:#121331,secondary:#3080e8"
                        style="width:200px;height:auto">
                    </lord-icon> --}}
                                <h6 class="font-medium text-center" style="padding-top: 25px;">Tiada Permohonan Baru</h6>
                            </div>
                        @endif

                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border shadow">
                    <div class="card-header border-cyan" style="border-left: solid 8px; border-bottom: solid 1px;">
                        <h4 class="card-title"><i class="fas fa-bullhorn"></i> &nbsp&nbsp Pengumuman</h4>
                    </div>
                    <div class="comment-widgets scrollable" style="height:350px;">

                        @if ($pengumuman->isEmpty())

                            <div style="padding-bottom: 15%;"></div>
                            <div style="width:100%; text-align:center">
                                <img src="{{ asset('assets/img/warning.gif') }}" alt="Empty Box"
                                    style="width: 150px;">
                                {{-- <lord-icon
                                    src="https://cdn.lordicon.com/cnbtojmk.json"
                                    trigger="loop"
                                    delay="15"
                                    colors="primary:#121331,secondary:#3080e8"
                                    stroke="41"
                                    style="width:200px;height:auto"
                                    >
                                </lord-icon> --}}
                                <h6 class="font-medium text-center" style="padding-top: 25px;">Tiada Pengumuman Baru</h6>
                            </div>
                        @else

                            @foreach ($pengumuman as $data)
                                <div class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-1 card-title" style="font-size: 14px; font-weight: bold;">
                                            {{ $data->title }}</h6>
                                        <small class="text-muted"
                                            style="font-size: 110%;">{{ Carbon\Carbon::parse($data->created_at)->format('d-m-Y') }}</small>
                                    </div>
                                    <p class="my-1" style="font-size: 15px; text-align:justify;">
                                        {{ $data->content }}</p>
                                </div>
                            @endforeach

                        @endif

                    </div>
                </div>
            </div>

        </div>

        <hr>

        <div class="row">
            <div class="col-md">


                <div class="modal fade" id="update_fund" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-coins"></i> &nbsp
                                    Kemaskini Peruntukan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('upens.peruntukan.update') }}">
                                <div class="modal-body">

                                    <div class="row">
                                        <div class="col-md">

                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th width="180">Rumah Ibadat</th>
                                                            <th>Peruntukan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Tokong</td>
                                                            <td>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">RM</span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="tokong"
                                                                        name="tokong" oninput="sum_fund()"
                                                                        value="{{ $annual_report->total_tokong }}"
                                                                        onkeypress="return fun_AllowOnlyAmountAndDot(this.id);"
                                                                        required>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kuil</td>
                                                            <td>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">RM</span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="kuil"
                                                                        name="kuil" oninput="sum_fund()"
                                                                        value="{{ $annual_report->total_kuil }}"
                                                                        onkeypress="return fun_AllowOnlyAmountAndDot(this.id);"
                                                                        required>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gurdwara</td>
                                                            <td>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">RM</span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="gurdwara"
                                                                        name="gurdwara" oninput="sum_fund()"
                                                                        value="{{ $annual_report->total_gurdwara }}"
                                                                        onkeypress="return fun_AllowOnlyAmountAndDot(this.id);"
                                                                        required>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gereja</td>
                                                            <td>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">RM</span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="gereja"
                                                                        name="gereja" oninput="sum_fund()"
                                                                        value="{{ $annual_report->total_gereja }}"
                                                                        onkeypress="return fun_AllowOnlyAmountAndDot(this.id);"
                                                                        required>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr class="bg-light">
                                                            <th>Jumlah Peruntukan</th>
                                                            <th>
                                                                <div class="input-group mb-3 border border-dark">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">RM</span>
                                                                    </div>
                                                                    <input type="text" class="form-control"
                                                                        id="jumlah_peruntukan" name="jumlah_peruntukan"
                                                                        value="{{ $annual_report->total_fund }}"
                                                                        readonly>
                                                                </div>
                                                            </th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>




                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                                    <button type="submit" class="btn btn-success">Kemaskini Peruntukan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card border shadow">
                <div class="card-header border-purple" style="border-left: solid 8px; border-bottom: solid 1px;">
                    <div class="row">
                        <div class="col-md">
                            <h3 class="card-title"><i class="fas fa-chart-bar"></i> &nbsp&nbsp Laporan Perbelanjaan
                                Rumah Ibadat - Keseluruhan</h3>
                        </div>
                        <div class="ml-auto">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#update_fund"><i
                                    class="fas fa-coins"></i> Kemaskini Peruntukan</button>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-xs-12 col-md-6">
                                <h2 class="font-light m-b-0">Tahun {{ $current_year }}</h2>
                                <span class="font-14 text-muted">Jumlah Peruntukan Tahunan</span>
                            </div>
                            <div class="text-right col-xs-12 col-md-6 align-self-center display-4 text-purple">RM
                                {{ number_format($annual_report->total_fund, 2) }}</div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-12">
                                <h3><b>RM {{ number_format($annual_report->balance_fund, 2) }}</b> / RM
                                    {{ number_format($annual_report->total_fund, 2) }}</h3>
                                <h6 class="text-muted">Baki Peruntukan Rumah Ibadat Keseluruhan</h6>
                            </div>

                            <div class="col-12">
                                <div class="progress">
                                    <?php
                                    $percentage_semua = 100;
                                    if ($annual_report->total_tokong != 0) {
                                        $percentage_semua = ($annual_report->balance_tokong / $annual_report->total_tokong) * 100;
                                        $percentage_semua = number_format($percentage_semua);
                                        if ($percentage_semua > 100) {
                                            $percentage_semua = 100;
                                        }
                                    }
                                    ?>
                                    <div class="progress-bar bg-purple" role="progressbar"
                                        style="width: {{ $percentage_semua }}%; height: 6px;" aria-valuenow="25"
                                        aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        @php
                            $yb_approved_fund_keseluruhan = DB::select(DB::raw("SELECT SUM(p.total_fund) as peruntukan FROM permohonans p, rumah_ibadats r WHERE r.id = p.rumah_ibadat_id AND p.status = '1' AND p.yb_id IS NOT NULL"));
                        @endphp

                        <div class="row">
                            <div class="col-12">
                                <h3><b>RM
                                        {{ number_format($annual_report->balance_fund - ($yb_approved_fund_keseluruhan[0]->peruntukan ?? 0), 2) }}</b>
                                        {{-- {{ number_format( ($yb_approved_fund_keseluruhan[0]->peruntukan ?? 0), 2) }}</b>
                                        {{ number_format( ($annual_report->balance_fund ?? 0), 2) }}</b> --}}

                                    / RM
                                    {{ number_format($annual_report->total_fund, 2) }}</h3>
                                <h6 class="text-muted">Baki Peruntukan Rumah Ibadat Keseluruhan Termasuk Komitmen</h6>
                            </div>

                            <div class="col-12">
                                <div class="progress">
                                    <?php
                                    $percentage_semua = 100;
                                    if ($annual_report->total_tokong != 0) {
                                        $percentage_semua = (($annual_report->balance_fund - ($yb_approved_fund_keseluruhan[0]->peruntukan ?? 0)) / $annual_report->total_fund) * 100;
                                        $percentage_semua = number_format($percentage_semua);
                                        if ($percentage_semua > 100) {
                                            $percentage_semua = 100;
                                        }
                                    }
                                    ?>
                                    <div class="progress-bar bg-purple" role="progressbar"
                                        style="width: {{ $percentage_semua }}%; height: 6px;" aria-valuenow="25"
                                        aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if ($laporan_semua != null || $khas_semua != null)
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

                                        @foreach ($laporan_semua as $key => $semua)
                                            <tr>
                                                <td class="text-center">{{ $key + 2 }}</td>
                                                <td>{{ $semua->tujuan }}</td>
                                                <td class="text-center"> {{ $semua->bilangan }} </td>
                                                <td class="text-right"> RM
                                                    {{ number_format($semua->peruntukan, 2) }} </td>
                                            </tr>
                                        @endforeach



                                        <tr>
                                            <th colspan="3" class="text-right font-18">Jumlah Peruntukan Yang Telah
                                                Diluluskan</th>
                                            <th class="text-right font-13">RM
                                                {{ number_format($annual_report->current_fund, 2) }}</th>
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
                    <h4 class="card-title"><i class="fas fa-chart-bar"></i> &nbsp&nbsp Laporan Perbelanjaan Rumah
                        Ibadat - Tokong</h4>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-xs-12 col-md-6">
                                <h3 class="font-light m-b-0">Tahun {{ $current_year }}</h3>
                                <span class="font-14 text-muted">Jumlah Peruntukan Tahunan</span>
                            </div>
                            <div class="text-right col-xs-12 col-md-6 align-self-center display-7 text-purple">RM
                                {{ number_format($annual_report->total_tokong, 2) }}</div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-12">
                                <h3><b>RM {{ number_format($annual_report->balance_tokong, 2) }}</b> / RM
                                    {{ number_format($annual_report->total_tokong, 2) }}</h3>
                                <h6 class="text-muted">Baki Peruntukan Rumah Ibadat Tokong</h6>
                            </div>

                            <div class="col-12">
                                <div class="progress">
                                    <?php
                                    $percentage_tokong = 100;
                                    if ($annual_report->total_tokong != 0) {
                                        $percentage_tokong = ($annual_report->balance_tokong / $annual_report->total_tokong) * 100;
                                        $percentage_tokong = number_format($percentage_tokong);
                                        if ($percentage_tokong > 100) {
                                            $percentage_tokong = 100;
                                        }
                                    }
                                    ?>
                                    <div class="progress-bar bg-purple" role="progressbar"
                                        style="width: {{ $percentage_tokong }}%; height: 6px;" aria-valuenow="25"
                                        aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        @php
                            $yb_approved_fund_tokong = DB::select(DB::raw("SELECT SUM(p.total_fund) as peruntukan FROM permohonans p, rumah_ibadats r WHERE r.id = p.rumah_ibadat_id AND p.status = '1' AND r.category = 'TOKONG' AND p.yb_id IS NOT NULL"));
                        @endphp

                        <div class="row">
                            <div class="col-12">
                                <small class="text-muted">RM
                                    {{ number_format($annual_report->balance_tokong, 2) }} - {{ number_format(($yb_approved_fund_tokong[0]->peruntukan ?? 0), 2) }}
                                / RM {{ number_format($annual_report->total_tokong, 2) }}</small>
                                <h3><b>RM
                                        {{ number_format($annual_report->balance_tokong - ($yb_approved_fund_tokong[0]->peruntukan ?? 0), 2) }}</b>
                                    / RM {{ number_format($annual_report->total_tokong, 2) }}</h3>
                                <h6 class="text-muted">Baki Peruntukan Rumah Ibadat Tokong Termasuk Komitmen
                                </h6>
                            </div>

                            <div class="col-12">
                                <div class="progress">
                                    <?php
                                    $percentage_tokong = 100;
                                    if ($annual_report->total_tokong != 0) {
                                        $percentage_tokong = (($annual_report->balance_tokong - ($yb_approved_fund_tokong[0]->peruntukan ?? 0)) / $annual_report->total_tokong) * 100;
                                        $percentage_tokong = number_format($percentage_tokong);
                                        if ($percentage_tokong > 100) {
                                            $percentage_tokong = 100;
                                        }
                                    }
                                    ?>
                                    <div class="progress-bar bg-purple" role="progressbar"
                                        style="width: {{ $percentage_tokong }}%; height: 6px;" aria-valuenow="25"
                                        aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if ($laporan_tokong != null || $khas_tokong != null)
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

                                        @foreach ($laporan_tokong as $key => $tokong)
                                            <tr>
                                                <td class="text-center">{{ $key + 2 }}</td>
                                                <td>{{ $tokong->tujuan }}</td>
                                                <td class="text-center"> {{ $tokong->bilangan }} </td>
                                                <td class="text-right"> RM
                                                    {{ number_format($tokong->peruntukan, 2) }} </td>
                                            </tr>
                                        @endforeach



                                        <tr>
                                            <th colspan="3" class="text-right font-18">Jumlah Peruntukan Yang Telah
                                                Diluluskan</th>
                                            <th class="text-right font-13">RM
                                                {{ number_format($annual_report->current_tokong, 2) }}</th>
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
                    <h4 class="card-title"><i class="fas fa-chart-bar"></i> &nbsp&nbsp Laporan Perbelanjaan Rumah
                        Ibadat - Kuil</h4>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-xs-12 col-md-6">
                                <h3 class="font-light m-b-0">Tahun {{ $current_year }}</h3>
                                <span class="font-14 text-muted">Jumlah Peruntukan Tahunan</span>
                            </div>
                            <div class="text-right col-xs-12 col-md-6 align-self-center display-7 text-purple">RM
                                {{ number_format($annual_report->total_kuil, 2) }}</div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-12">
                                {{-- <h3><b>RM {{ number_format($annual_report->balance_kuil, 2) }}</b> / RM --}}
                                    <h3><b>RM {{ number_format($balance_kuil, 2) }}</b> / RM
                                    {{ number_format($annual_report->total_kuil, 2) }}</h3>
                                <h6 class="text-muted">Baki Peruntukan Rumah Ibadat Kuil</h6>
                            </div>

                            <div class="col-12">
                                <div class="progress">
                                    <?php
                                    $percentage_kuil = 100;
                                    if ($annual_report->total_kuil != 0) {
                                        $percentage_kuil = ($balance_kuil / $annual_report->total_kuil) * 100;
                                        // $percentage_kuil = ($annual_report->balance_kuil / $annual_report->total_kuil) * 100;
                                        $percentage_kuil = number_format($percentage_kuil);
                                        if ($percentage_kuil > 100) {
                                            $percentage_kuil = 100;
                                        }
                                    }
                                    ?>
                                    <div class="progress-bar bg-purple" role="progressbar"
                                        style="width: {{ $percentage_kuil }}%; height: 6px;" aria-valuenow="25"
                                        aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        @php
                            $yb_approved_fund_kuil = DB::select(DB::raw("SELECT SUM(p.total_fund) as peruntukan FROM permohonans p, rumah_ibadats r WHERE r.id = p.rumah_ibadat_id AND p.status = '1' AND r.category = 'KUIL' AND p.yb_id IS NOT NULL"));
                        @endphp

                        <div class="row">
                            <div class="col-12">
                                <h3><b>RM
                                        {{ number_format($balance_kuil - ($yb_approved_fund_kuil[0]->peruntukan ?? 0), 2) }}</b>
                                    / RM {{ number_format($annual_report->total_kuil, 2) }}</h3>
                                <h6 class="text-muted">Baki Peruntukan Rumah Ibadat Kuil Termasuk Komitmen</h6>
                            </div>

                            <div class="col-12">
                                <div class="progress">
                                    <?php
                                    $percentage_kuil = 100;
                                    if ($annual_report->total_kuil != 0) {
                                        $percentage_kuil = (($balance_kuil - ($yb_approved_fund_kuil[0]->peruntukan ?? 0)) / $annual_report->total_kuil) * 100;
                                        $percentage_kuil = number_format($percentage_kuil);
                                        if ($percentage_kuil > 100) {
                                            $percentage_kuil = 100;
                                        }
                                    }
                                    ?>
                                    <div class="progress-bar bg-purple" role="progressbar"
                                        style="width: {{ $percentage_kuil }}%; height: 6px;" aria-valuenow="25"
                                        aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if ($laporan_kuil != null || $khas_kuil != null)
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

                                        @foreach ($laporan_kuil as $key => $kuil)
                                            <tr>
                                                <td class="text-center">{{ $key + 2 }}</td>
                                                <td>{{ $kuil->tujuan }}</td>
                                                <td class="text-center"> {{ $kuil->bilangan }} </td>
                                                <td class="text-right"> RM {{ number_format($kuil->peruntukan, 2) }}
                                                </td>
                                            </tr>
                                        @endforeach


                                        <tr>
                                            <th colspan="3" class="text-right font-18">Jumlah Peruntukan Yang Telah
                                                Diluluskan</th>
                                            <th class="text-right font-13">RM
                                                {{ number_format($total_peruntukan, 2) }}</th>
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
                    <h4 class="card-title"><i class="fas fa-chart-bar"></i> &nbsp&nbsp Laporan Perbelanjaan Rumah
                        Ibadat - Gurdwara</h4>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-xs-12 col-md-6">
                                <h3 class="font-light m-b-0">Tahun {{ $current_year }}</h3>
                                <span class="font-14 text-muted">Jumlah Peruntukan Tahunan</span>
                            </div>
                            <div class="text-right col-xs-12 col-md-6 align-self-center display-7 text-purple">RM
                                {{ number_format($annual_report->total_gurdwara, 2) }}</div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-12">
                                <h3><b>RM {{ number_format($annual_report->balance_gurdwara, 2) }}</b> / RM
                                    {{ number_format($annual_report->total_gurdwara, 2) }}</h3>
                                <h6 class="text-muted">Baki Peruntukan Rumah Ibadat Gurdwara</h6>
                            </div>

                            <div class="col-12">
                                <div class="progress">
                                    <?php
                                    $percentage_gurdwara = 100;
                                    if ($annual_report->total_gurdwara != 0) {
                                        $percentage_gurdwara = ($annual_report->balance_gurdwara / $annual_report->total_gurdwara) * 100;
                                        $percentage_gurdwara = number_format($percentage_gurdwara);
                                        if ($percentage_gurdwara > 100) {
                                            $percentage_gurdwara = 100;
                                        }
                                    }
                                    ?>
                                    <div class="progress-bar bg-purple" role="progressbar"
                                        style="width: {{ $percentage_gurdwara }}%; height: 6px;" aria-valuenow="25"
                                        aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        @php
                            $yb_approved_fund_gurdwara = DB::select(DB::raw("SELECT SUM(p.total_fund) as peruntukan FROM permohonans p, rumah_ibadats r WHERE r.id = p.rumah_ibadat_id AND p.status = '1' AND r.category = 'GURDWARA' AND p.yb_id IS NOT NULL"));
                        @endphp

                        <div class="row">
                            <div class="col-12">
                                <h3><b>RM
                                        {{ number_format($annual_report->balance_gurdwara - ($yb_approved_fund_gurdwara[0]->peruntukan ?? 0), 2) }}</b>
                                    / RM {{ number_format($annual_report->total_gurdwara, 2) }}</h3>
                                <h6 class="text-muted">Baki Peruntukan Rumah Ibadat Gurdwara Termasuk Komitmen
                                </h6>
                            </div>

                            <div class="col-12">
                                <div class="progress">
                                    <?php
                                    $percentage_gurdwara = 100;
                                    if ($annual_report->total_gurdwara != 0) {
                                        $percentage_gurdwara = (($annual_report->balance_gurdwara - ($yb_approved_fund_gurdwara[0]->peruntukan ?? 0)) / $annual_report->total_gurdwara) * 100;
                                        $percentage_gurdwara = number_format($percentage_gurdwara);
                                        if ($percentage_gurdwara > 100) {
                                            $percentage_gurdwara = 100;
                                        }
                                    }
                                    ?>
                                    <div class="progress-bar bg-purple" role="progressbar"
                                        style="width: {{ $percentage_gurdwara }}%; height: 6px;" aria-valuenow="25"
                                        aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if ($laporan_gurdwara != null || $khas_gurdwara != null)
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

                                        @foreach ($laporan_gurdwara as $key => $gurdwara)
                                            <tr>
                                                <td class="text-center">{{ $key + 2 }}</td>
                                                <td>{{ $gurdwara->tujuan }}</td>
                                                <td class="text-center"> {{ $gurdwara->bilangan }} </td>
                                                <td class="text-right"> RM
                                                    {{ number_format($gurdwara->peruntukan, 2) }} </td>
                                            </tr>
                                        @endforeach


                                        <tr>
                                            <th colspan="3" class="text-right font-18">Jumlah Peruntukan Yang Telah
                                                Diluluskan</th>
                                            <th class="text-right font-13">RM
                                                {{ number_format($annual_report->current_gurdwara, 2) }}</th>
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
                    <h4 class="card-title"><i class="fas fa-chart-bar"></i> &nbsp&nbsp Laporan Perbelanjaan Rumah
                        Ibadat - Gereja</h4>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-xs-12 col-md-6">
                                <h3 class="font-light m-b-0">Tahun {{ $current_year }}</h3>
                                <span class="font-14 text-muted">Jumlah Peruntukan Tahunan</span>
                            </div>
                            <div class="text-right col-xs-12 col-md-6 align-self-center display-7 text-purple">RM
                                {{ number_format($annual_report->total_gereja, 2) }}</div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-12">
                                <h3><b>RM {{ number_format($annual_report->balance_gereja, 2) }}</b> / RM
                                    {{ number_format($annual_report->total_gereja, 2) }}</h3>
                                <h6 class="text-muted">Baki Peruntukan Rumah Ibadat Gereja</h6>
                            </div>

                            <div class="col-12">
                                <div class="progress">
                                    <?php
                                    $percentage_gereja = 100;
                                    if ($annual_report->total_gereja != 0) {
                                        $percentage_gereja = ($annual_report->balance_gereja / $annual_report->total_gereja) * 100;
                                        $percentage_gereja = number_format($percentage_gereja);
                                        if ($percentage_gereja > 100) {
                                            $percentage_gereja = 100;
                                        }
                                    }
                                    ?>
                                    <div class="progress-bar bg-purple" role="progressbar"
                                        style="width: {{ $percentage_gereja }}%; height: 6px;" aria-valuenow="25"
                                        aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        @php
                            $yb_approved_fund_gereja = DB::select(DB::raw("SELECT SUM(p.total_fund) as peruntukan FROM permohonans p, rumah_ibadats r WHERE r.id = p.rumah_ibadat_id AND p.status = '1' AND r.category = 'GEREJA' AND p.yb_id IS NOT NULL"));
                        @endphp

                        <div class="row">
                            <div class="col-12">
                                <h3><b>RM
                                        {{ number_format($annual_report->balance_gereja - ($yb_approved_fund_gereja[0]->peruntukan ?? 0), 2) }}</b>
                                    / RM
                                    {{ number_format($annual_report->total_gereja, 2) }}</h3>
                                <h6 class="text-muted">Baki Peruntukan Rumah Ibadat Gereja Termasuk Komitmen
                                </h6>
                            </div>

                            <div class="col-12">
                                <div class="progress">
                                    <?php
                                    $percentage_gereja = 100;
                                    if ($annual_report->total_gereja != 0) {
                                        $percentage_gereja = (($annual_report->total_gereja - ($yb_approved_fund_gereja[0]->peruntukan ?? 0)) / $annual_report->total_gereja) * 100;
                                        $percentage_gereja = number_format($percentage_gereja);
                                        if ($percentage_gereja > 100) {
                                            $percentage_gereja = 100;
                                        }
                                    }
                                    ?>
                                    <div class="progress-bar bg-purple" role="progressbar"
                                        style="width: {{ $percentage_gereja }}%; height: 6px;" aria-valuenow="25"
                                        aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if ($laporan_gereja != null || $khas_gereja != null)
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

                                        @foreach ($laporan_gereja as $key => $gereja)
                                            <tr>
                                                <td class="text-center">{{ $key + 2 }}</td>
                                                <td>{{ $gereja->tujuan }}</td>
                                                <td class="text-center"> {{ $gereja->bilangan }} </td>
                                                <td class="text-right"> RM
                                                    {{ number_format($gereja->peruntukan, 2) }} </td>
                                            </tr>
                                        @endforeach


                                        <tr>
                                            <th colspan="3" class="text-right font-18">Jumlah Peruntukan Yang Telah
                                                Diluluskan</th>
                                            <th class="text-right font-13">RM
                                                {{ number_format($annual_report->current_gereja, 2) }}</th>
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
        window.addEventListener('load', sum_fund);

        function sum_fund() {
            var tokong = Number(document.getElementById("tokong").value);
            var kuil = Number(document.getElementById("kuil").value);
            var gurdwara = Number(document.getElementById("gurdwara").value);
            var gereja = Number(document.getElementById("gereja").value);

            var sum = tokong + kuil + gurdwara + gereja;

            // tokong = tokong.toFixed(2);
            // kuil = kuil.toFixed(2);
            // gurdwara = gurdwara.toFixed(2);
            // gereja = gereja.toFixed(2);

            sum = sum.toFixed(2);




            var jumlah_peruntukan = $('#jumlah_peruntukan').val(sum);

            // tokong = $('#tokong').val(tokong);
            // kuil = $('#kuil').val(kuil);
            // gurdwara = $('#gurdwara').val(gurdwara);
            // gereja = $('#gereja').val(gereja);

            return false;
        }

        //================================== INPUT NUMBER AND DOTS ONLY ==================================

        function fun_AllowOnlyAmountAndDot(txt) {
            if (event.keyCode > 47 && event.keyCode < 58 || event.keyCode == 46) {
                var txtbx = document.getElementById(txt);
                var amount = document.getElementById(txt).value;
                var present = 0;
                var count = 0;

                if (amount.indexOf(".", present) || amount.indexOf(".", present + 1)); {
                    // alert('0');
                }

                /*if(amount.length==2)
                {
                  if(event.keyCode != 46)
                  return false;
                }*/
                do {
                    present = amount.indexOf(".", present);
                    if (present != -1) {
                        count++;
                        present++;
                    }
                }
                while (present != -1);
                if (present == -1 && amount.length == 0 && event.keyCode == 46) {
                    event.keyCode = 0;
                    //alert("Wrong position of decimal point not  allowed !!");
                    return false;
                }

                if (count >= 1 && event.keyCode == 46) {

                    event.keyCode = 0;
                    //alert("Only one decimal point is allowed !!");
                    return false;
                }
                if (count == 1) {
                    var lastdigits = amount.substring(amount.indexOf(".") + 1, amount.length);
                    if (lastdigits.length >= 2) {
                        //alert("Two decimal places only allowed");
                        event.keyCode = 0;
                        return false;
                    }
                }
                return true;
            } else {
                event.keyCode = 0;
                //alert("Only Numbers with dot allowed !!");
                return false;
            }
        }
    </script>
@endsection
