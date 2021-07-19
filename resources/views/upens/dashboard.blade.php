@extends('layouts.layout-upen')

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
        <a class="card bg-info" href="{{ route('upens.permohonan.baru') }}">
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
        <a class="card bg-warning" href="{{ route('upens.permohonan.semak-semula') }}">
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
        <a class="card bg-success" href="{{ route('upens.permohonan.lulus') }}">
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
        <a class="card bg-danger" href="{{ route('upens.permohonan.tidak-lulus') }}">
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
<!-- ============================================================== -->
<!-- Sales chart -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Email campaign chart -->
<!-- ============================================================== -->
{{-- Graph --}}
{{-- <div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Campaign</h4>
                <div id="campaign" style="height: 168px; width: 100%;" class="m-t-10"></div>
                <!-- row -->
                <div class="text-center row text-lg-left">
                    <!-- column -->
                    <div class="col-4">
                        <h4 class="font-medium m-b-0">60%</h4>
                        <span class="text-muted">Open</span>
                    </div>
                    <!-- column -->
                    <div class="col-4">
                        <h4 class="font-medium m-b-0">26%</h4>
                        <span class="text-muted">Click</span>
                    </div>
                    <!-- column -->
                    <div class="col-4">
                        <h4 class="font-medium m-b-0">18%</h4>
                        <span class="text-muted">Bounce</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title m-b-5">Referral Earnings</h5>
                <h3 class="font-light">$769.08</h3>
                <div class="text-center m-t-20">
                    <div id="earnings"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-12 order-lg-2 order-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h4 class="card-title">Sales Ratio</h4>
                    </div>
                    <div class="ml-auto">
                        <div class="dl m-b-10">
                            <select class="border-0 custom-select text-muted">
                                <option value="0" selected="">August 2018</option>
                                <option value="1">May 2018</option>
                                <option value="2">March 2018</option>
                                <option value="3">June 2018</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center no-block">
                    <div>
                        <span class="text-muted">This Week</span>
                        <h3 class="mb-0 font-light text-info">$23.5K <span class="text-muted font-12"><i class="mdi mdi-arrow-up text-success"></i>18.6</span></h3>
                    </div>
                    <div class="ml-4">
                        <span class="text-muted">Last Week</span>
                        <h3 class="mb-0 font-light text-muted">$945 <span class="text-muted font-12"><i class="mdi mdi-arrow-down text-danger"></i>46.3</span></h3>
                    </div>
                </div>
                <div class="mt-5 sales ct-charts"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 order-lg-3 order-md-2">
        <div class="card">
            <div class="card-body m-b-0">
                <h4 class="card-title">Thursday <span class="font-normal font-14 text-muted">12th April, 2018</span></h4>
                    <div class="flex-row d-flex align-items-center m-t-30">
                    <h1 class="font-light"><i class="wi wi-day-sleet"></i> <span>35<sup>°</sup></span></h1>
                </div>
            </div>
            <div class="weather-report" style="height:120px; width:100%;"></div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title m-b-0">Users</h4>
                <h2 class="font-light">35,658 <span class="font-medium font-16 text-success">+23%</span></h2>
                <div class="m-t-30">
                    <div class="text-center row">
                        <div class="col-6 border-right">
                            <h4 class="m-b-0">58%</h4>
                            <span class="font-14 text-muted">New Users</span>
                        </div>
                        <div class="col-6">
                            <h4 class="m-b-0">42%</h4>
                            <span class="font-14 text-muted">Repeat Users</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- ============================================================== -->
<!-- Email campaign chart -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Ravenue - page-view-bounce rate -->
<!-- ============================================================== -->
<div class="row">
    <!-- column -->
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="modal fade" id="update_fund" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-coins"></i> &nbsp Kemaskini Peruntukan</h5>
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
                                                <th width="150">Rumah Ibadat</th>
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
                                                        <input type="text" class="form-control" id="tokong" name="tokong" oninput="sum_fund()" value="{{ $annual_report->total_tokong }}" required>
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
                                                        <input type="text" class="form-control" id="kuil" name="kuil" value="{{ $annual_report->total_kuil }}" required>
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
                                                        <input type="text" class="form-control" id="gurdwara" name="gurdwara" value="{{ $annual_report->total_gurdwara }}" required>
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
                                                        <input type="text" class="form-control" id="gereja" name="gereja" value="{{ $annual_report->total_gereja }}" required>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Jumlah Peruntukan</th>
                                                <th>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">RM</span>
                                                        </div>
                                                        <input type="text" class="form-control" id="jumlah_peruntukan" name="jumlah_peruntukan" value="{{ $annual_report->total_fund }}" readonly>
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

            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h4 class="mb-0 card-title">Laporan Peruntukan Rumah Ibadat</h4>
                    </div>
                    <div class="ml-auto">
                        {{-- <select class="border-0 custom-select text-muted">
                            <option value="0" selected="">Mei 2021</option>
                            
                        </select> --}}
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#update_fund"><i class="fas fa-coins"></i> Kemaskini Peruntukan</button>

                    </div>
                </div>
            </div>
            <div class="card-body bg-light">
                <div class="row align-items-center">
                    <div class="col-xs-12 col-md-6">
                        <h3 class="font-light m-b-0">Jumlah Peruntukan</h3>
                        {{-- <span class="font-14 text-muted">Laporan</span> --}}
                    </div>
                    <div class="text-right col-xs-12 col-md-6 align-self-center display-6 text-info">RM {{ number_format($annual_report->total_fund,2) }}</div>
                </div>
            </div>
            <div class="card-body"> 
                <div class="row align-items-center">
                    <div class="col-xs-12 col-md-6">
                        <h3 class="font-light m-b-0">Peruntukan Yang Telah Diluluskan</h3>
                        {{-- <span class="font-14 text-muted">Laporan</span> --}}
                    </div>
                    <div class="text-right col-xs-12 col-md-6 align-self-center display-6 text-info">RM {{ number_format($annual_report->current_fund,2) }}</div>
                </div>
            </div>
            {{-- <div class="table-responsive" style="overflow-y: scroll;height: 395px;">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="border-top-0">NAMA RUMAH IBADAT</th>
                            <th class="border-top-0">TARIKH</th>
                            <th class="border-top-0">JUMLAH</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            <td class="txt-oflo">Persatuan Pendidikan Buddha Jing Xin</td>
                            <td class="txt-oflo">April 10, 2021</td>
                            <td><span class="font-medium">RM 20000</span></td>
                        </tr>
                        <tr>

                            <td class="txt-oflo">Persatuan Penganut Na Du Gong Kwan Tong</td>
                            <td class="txt-oflo">Mac 15, 2021</td>
                            <td><span class="font-medium">RM 10000</span></td>
                        </tr>
                        <tr>

                            <td class="txt-oflo">Persatuan Penganut Dewa Fatt Goon Ten</td>
                            <td class="txt-oflo">Februari 22, 2021</td>
                            <td><span class="font-medium">RM 20000</span></td>
                        </tr>
                    </tbody>
                </table>
            </div> --}}
        </div>
    </div>
    <div class="col-lg-6 col-md-12">
        <div class="card border border-dark">
            <div class="card-body">
                <h4 class="card-title">Permohonan Terkini</h4>
            </div>
            <div class="comment-widgets scrollable" style="height:490px;">
                @foreach($new_application as $data)
                    <form action="{{ route('upens.permohonan.papar') }}" onclick="javascript:$(this).submit();">
                        <div class="flex-row d-flex comment-row">   
                            <div class="comment-text active w-100">
                                <h6 class="font-medium">{{ $data->rumah_ibadat->name_association }}</h6>
                                <span class="m-b-15 d-block">{{ $data->user->name }}</span>
                                <span class="m-b-15 d-block">{{ $data->getPermohonanID() }}</span>
                                {{-- <span class="m-b-15 d-block">
                                    @if($data->rumah_ibadat->category == "TOKONG")
                                    <span class="label label-success label-primary" style="font-size: 13px;">Tokong</span>
                                    @elseif($data->rumah_ibadat->category == "KUIL")
                                    <span class="label label-success label-primary" style="font-size: 13px;">Kuil</span>
                                    @elseif($data->rumah_ibadat->category == "GURDWARA")
                                    <span class="label label-success label-primary" style="font-size: 13px;">Gurdwara</span>
                                    @elseif($data->rumah_ibadat->category == "GEREJA")
                                    <span class="label label-success label-primary" style="font-size: 13px;">Gereja</span>
                                    @endif
                                </span> --}}
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
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Ravenue - page-view-bounce rate -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<script>
    window.addEventListener('load', sum_fund);

    function sum_fund(){
        var tokong =  Number(document.getElementById("tokong").value);
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
</script>
@endsection
