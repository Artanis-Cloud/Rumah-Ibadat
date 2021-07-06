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
        <a class="card card-hover bg-info" href="{{ route('excos.permohonan.baru') }}">
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
        <a class="card card-hover bg-warning" href="{{ route('excos.permohonan.sedang-diproses') }}">
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
        <a class="card card-hover bg-success" href="{{ route('excos.permohonan.lulus') }}">
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
        <a class="card card-hover bg-danger" href="{{ route('excos.permohonan.tidak-lulus') }}">
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
<!-- Ravenue - page-view-bounce rate -->
<!-- ============================================================== -->
<div class="row">
    <!-- column -->
    <div class="col-lg-6 col-md-12">
        <div class="card border border-dark rounded">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h4 class="mb-0 card-title">Laporan Perbelanjaan Rumah Ibadat</h4>
                    </div>
                    {{-- <div class="ml-auto">
                        <select class="border-0 custom-select text-muted">
                            <option value="0" selected="">Mei 2021</option>
                        </select>
                    </div> --}}
                </div>
            </div>
            <div class="card-body bg-light">
                <div class="row align-items-center">
                    <div class="col-xs-12 col-md-6">
                        <h3 class="font-light m-b-0">Tahun 2021</h3>
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
        <div class="card border border-dark">
            <div class="card-body">
                <h4 class="card-title">Permohonan Terkini [{{ $count_new_application }}]</h4>
            </div>
            <div class="comment-widgets scrollable" style="height:490px;">
                
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
