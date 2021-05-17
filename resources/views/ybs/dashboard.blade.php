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
        <div class="card bg-info">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div class="text-white">
                        <h2>120</h2>
                        <h6>Permohonan <br>Baru</h6>
                    </div>
                    <div class="ml-auto">
                        <span class="text-white display-6"><i class="fas fa-clipboard"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card bg-warning">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div class="text-white">
                        <h2>150</h2>
                        <h6>Permohonan <br>Sedang Diproses</h6>
                    </div>
                    <div class="ml-auto">
                        <span class="text-white display-6"><i class="fas fa-sync-alt"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card bg-success">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div class="text-white">
                        <h2>450</h2>
                        <h6>Permohonan <br>Lulus</h6>
                    </div>
                    <div class="ml-auto">
                        <span class="text-white display-6"><i class="fas fa-clipboard-check"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card bg-danger">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div class="text-white">
                        <h2>100</h2>
                        <h6>Permohonan <br>Tidak Lulus</h6>
                    </div>
                    <div class="ml-auto">
                        <span class="text-white display-6"><i class="fas fa-times-circle"></i></span>
                    </div>
                </div>
            </div>
        </div>
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
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h4 class="mb-0 card-title">Laporan Perbelanjaan Rumah Ibadat</h4>
                    </div>
                    <div class="ml-auto">
                        <select class="border-0 custom-select text-muted">
                            <option value="0" selected="">Mei 2021</option>
                            {{-- <option value="1">May 2018</option>
                            <option value="2">March 2018</option>
                            <option value="3">June 2018</option> --}}
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-body bg-light">
                <div class="row align-items-center">
                    <div class="col-xs-12 col-md-6">
                        <h3 class="font-light m-b-0">Mei 2021</h3>
                        <span class="font-14 text-muted">Laporan</span>
                    </div>
                    <div class="text-right col-xs-12 col-md-6 align-self-center display-6 text-info">RM 50000</div>
                </div>
            </div>
            <div class="table-responsive" style="overflow-y: scroll;height: 395px;">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="border-top-0">NAMA RUMAH IBADAT</th>
                            {{-- <th class="border-top-0">STATUS</th> --}}
                            <th class="border-top-0">TARIKH</th>
                            <th class="border-top-0">JUMLAH</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            <td class="txt-oflo">Persatuan Pendidikan Buddha Jing Xin</td>
                            {{-- <td><span class="label label-success label-rounded">SALE</span> </td> --}}
                            <td class="txt-oflo">April 10, 2021</td>
                            <td><span class="font-medium">RM 20000</span></td>
                        </tr>
                        <tr>

                            <td class="txt-oflo">Persatuan Penganut Na Du Gong Kwan Tong</td>
                            {{-- <td><span class="label label-success label-rounded">SALE</span> </td> --}}
                            <td class="txt-oflo">Mac 15, 2021</td>
                            <td><span class="font-medium">RM 10000</span></td>
                        </tr>
                        <tr>

                            <td class="txt-oflo">Persatuan Penganut Dewa Fatt Goon Ten</td>
                            {{-- <td><span class="label label-success label-rounded">SALE</span> </td> --}}
                            <td class="txt-oflo">Februari 22, 2021</td>
                            <td><span class="font-medium">RM 20000</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Permohonan Terkini</h4>
            </div>
            <div class="comment-widgets scrollable" style="height:490px;">
                <!-- Comment Row -->
                <div class="flex-row d-flex comment-row">
                    <div class="comment-text active w-100">
                        <h6 class="font-medium">Mr Choo</h6>
                        <span class="m-b-15 d-block">Permohonan Rumah Ibadat Irsan</span>
                        <div class="comment-footer ">
                            <span class="float-right text-muted">April 13, 2021</span>
                            <span class="label label-success label-primary">Sedang Diproses</span>
                        </div>
                    </div>
                </div>
                <!-- Comment Row -->
                <div class="flex-row d-flex comment-row m-t-0">
                    {{-- <div class="p-2">
                        <img src="{{asset('nice-admin/assets/images/users/1.jpg')}}" alt="user" width="50" class="rounded-circle">
                    </div> --}}
                    <div class="comment-text w-100">
                        <h6 class="font-medium">Toh Khim Hwa</h6>
                        <span class="m-b-15 d-block">Permohonan Bantuan Kewangan Persatuan Rumah Ibadat Kaum Tionghoa</span>
                        <div class="comment-footer">
                            <span class="float-right text-muted">April 10, 2021</span>
                            <span class="label label-success label-rounded">Diluluskan</span>
                        </div>
                    </div>
                </div>
                <!-- Comment Row -->
                <div class="flex-row d-flex comment-row">
                    <div class="comment-text active w-100">
                        <h6 class="font-medium">Lim Thian Ser</h6>
                        <span class="m-b-15 d-block">Permohonan Rumah Ibadat Tin Hong See</span>
                        <div class="comment-footer ">
                            <span class="float-right text-muted">Mac 15, 2021</span>
                            <span class="label label-success label-rounded">Diluluskan</span>
                        </div>
                    </div>
                </div>
                 <!-- Comment Row -->
                 <div class="flex-row d-flex comment-row">
                    <div class="comment-text active w-100">
                        <h6 class="font-medium">Kiang Chew Choy</h6>
                        <span class="m-b-15 d-block">Permohonan Naiktaraf Temple Dewa Kuan Yin Ting</span>
                        <div class="comment-footer ">
                            <span class="float-right text-muted">Februari 22, 2021</span>
                            <span class="label label-success label-rounded">Diluluskan</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Ravenue - page-view-bounce rate -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Recent comment and chats -->
<!-- ============================================================== -->
<div class="row">
    <!-- column -->
    <div class="col-lg">
      <div class="card">
        <div class="table-responsive" style="padding: 1%;">
            <table id="tablestatus" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Sijil ROS</th>
                        <th>Tokong</th>
                        <th>Nama Pemohon</th>
                        <th>Tarikh</th>
                        <th>Tujuan Permohonan</th>
                        <th>Kelulusan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>1862-04-5</th>
                        <th>Persatuan Pendidikan Buddha Jing XinPersatuan Pendidikan Buddha Jing Xin</th>
                        <th>Toh Khim Hwa</th>
                        <th>25.10.18</th>
                        <th>Pembaikan</th>
                        <th>RM 5000</th>
                        <th>Diluluskan</th>
                    </tr>
                    <tr>
                        <th>PPM-018-10-06062017</th>
                        <th>Persatuan Penganut Na Du Gong Kwan Tong</th>
                        <th>Liam Thian Ser</th>
                        <th>01.10.18</th>
                        <th>Aktiviti Keagamaan</th>
                        <th>RM 3000</th>
                        <th>Diluluskan</th>
                    </tr>
                </tbody>
            </table>
        </div>
      </div>
    </div>

</div>
<!-- ============================================================== -->
<!-- Recent comment and chats -->
<!-- ============================================================== -->

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
