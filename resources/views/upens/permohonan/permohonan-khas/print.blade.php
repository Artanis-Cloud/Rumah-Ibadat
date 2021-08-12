@extends('layouts.layout-upen')

@section('content')


<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->

<div class="container-fluid">

    <div class="row" style="padding-bottom: 15px;">
        {{-- <div class="col-md-3">
            <button type="button" class="btn waves-effect waves-light btn-info btn-block" id="print"><i class="fas fa-print"></i> &nbsp&nbsp Cetak Permohonan</button>
        </div>
        <div class="col-md-3">
            <fieldset class="checkbox">
                <label>
                    <input type="checkbox" id="maklumat_permohonan_checkbox" checked> Maklumat Permohonan
                </label>
            </fieldset>
        </div>
        <div class="col-md-3"></div> --}}

        
        <div class="col-md-12">
            <div class="card border border-info">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <fieldset class="checkbox">
                                <label>
                                    <input type="checkbox" id="maklumat_permohonan_checkbox" checked> Maklumat Permohonan
                                </label>
                            </fieldset>
                        </div>
                        <div class="col-md-4">
                            <fieldset class="checkbox">
                                <label>
                                    <input type="checkbox" id="maklumat_pemohon_checkbox" checked> Maklumat Pemohon
                                </label>
                            </fieldset>
                        </div>

                        @if($permohonan->exco_id != null)
                        <div class="col-md-4">
                            <fieldset class="checkbox">
                                <label>
                                    <input type="checkbox" id="keputusan_ulasan_checkbox" checked> Keputusan dan Ulasan
                                </label>
                            </fieldset>
                        </div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4"></div>
                        <div class="col-md-3">
                            <button type="button" class="btn waves-effect waves-light btn-info btn-block" id="print"><i class="fas fa-print"></i> &nbsp&nbsp Cetak Permohonan</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="printableArea">

        <div class="card" id="maklumat_permohonan" style="display:block; page-break-after: auto;">
            <div class="card-body border border-dark">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h3 class="box-title m-t-40 text-center">Maklumat Permohonan</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td width="390">Nombor Rujukan</td>
                                        <td> {{ $permohonan->getPermohonanID() }} </td>
                                    </tr>
                                    <tr>
                                        <td>Status Permohonan</td>
                                        <td> 
                                        @if($permohonan->status == 0)
                                        Tidak Lulus
                                        @elseif($permohonan->status == 1)
                                        Sedang Diproses
                                        @elseif($permohonan->status == 2)
                                        Lulus
                                        @endif
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Kategori Permohonan</td>
                                        <td> {{ ucfirst(strtolower($permohonan->category))}} </td>
                                    </tr>

                                    <tr>
                                        <td>Tujuan Permohonan</td>
                                        <td> {{ $permohonan->purpose}} </td>
                                    </tr>

                                    <tr>
                                        <td>Jumlah Peruntukan</td>
                                        <td>RM {{ number_format($permohonan->requested_amount, 2) }} </td>
                                    </tr>

                                    @if($permohonan->supported_document_1 != null)
                                    <tr>
                                        <td>Dokumen Lampiran</td>

                                        @if(pathinfo($permohonan->supported_document_1, PATHINFO_EXTENSION) == "jpg" || pathinfo($permohonan->supported_document_1, PATHINFO_EXTENSION) == "jpeg" || pathinfo($permohonan->supported_document_1, PATHINFO_EXTENSION) == "png")
                                        <td>
                                            <img src="{{ asset( $image_path = str_replace('public', 'storage',  $permohonan->supported_document_1)) }}" style="max-width: 750px; padding-bottom: 10px;">
                                        </td>
                                        @else 
                                        <td>
                                            <a href="{{ asset( $image_path = str_replace('public', 'storage',  $permohonan->supported_document_1)) }}" target="_blank">[ FORMAT FAIL DALAM BENTUK PDF ]</a>
                                        </td>
                                        @endif
                                    </tr>
                                    @endif

                                    @if($permohonan->supported_document_2 != null)
                                    <tr>
                                        <td>Dokumen Lampiran</td>

                                        @if(pathinfo($permohonan->supported_document_2, PATHINFO_EXTENSION) == "jpg" || pathinfo($permohonan->supported_document_2, PATHINFO_EXTENSION) == "jpeg" || pathinfo($permohonan->supported_document_2, PATHINFO_EXTENSION) == "png")
                                        <td>
                                            <img src="{{ asset( $image_path = str_replace('public', 'storage',  $permohonan->supported_document_2)) }}" style="max-width: 750px; padding-bottom: 10px;">
                                        </td>
                                        @else 
                                        <td>
                                            <a href="{{ asset( $image_path = str_replace('public', 'storage',  $permohonan->supported_document_2)) }}" target="_blank">[ FORMAT FAIL DALAM BENTUK PDF ]</a>
                                        </td>
                                        @endif
                                    </tr>
                                    @endif

                                    <tr>
                                        <td>Tarikh Permohonan Dibuat</td>
                                        <td>{{ Carbon\Carbon::parse($permohonan->created_at)->format('d-m-Y') }}</td>
                                    </tr>

                                    <tr>
                                        <td>Waktu Permohonan Dibuat</td>
                                        <td>{{ Carbon\Carbon::parse($permohonan->created_at)->format('g:i a') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>{{-- end card of maklumat_permohonan --}}

        @if($permohonan->exco_id != null)
        <div class="card" id="keputusan_ulasan" style="display:block; page-break-before: always;">
            <div class="card-body border border-dark">
                <div class="row" style="padding-top: 15px;">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h3 class="box-title m-t-40 text-center">Keputusan Dan Ulasan</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    @if($permohonan->exco_id != null)
                                    <tr class="bg-light">
                                        <td colspan="2" ><b>Pejabat Exco</b></td>
                                    </tr>
                                    <tr>
                                        <td width="390">Permohonan Disahkan Oleh</td>
                                        <td>{{ $exco->name }} </td>
                                    </tr>
                                    <tr>
                                        <td>Tarikh Pengesahan</td>
                                        <td>{{ Carbon\Carbon::parse($permohonan->exco_date_time)->format('d-m-Y') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Waktu Pengesahan</td>
                                        <td>{{ Carbon\Carbon::parse($permohonan->exco_date_time)->format('g:i a') }}</td>
                                    </tr>
                                    @endif
                                    
                                    @if($permohonan->yb_id != null)
                                    <tr class="bg-light">
                                        <td colspan="2"><b>Pejabat YB Pengerusi</b></td>
                                    </tr>
                                    <tr>
                                        <td width="390">Permohonan Disokong Oleh</td>
                                        <td>{{ $yb->name }} </td>
                                    </tr>
                                    <tr>
                                        <td>Tarikh Disokong</td>
                                        <td>{{ Carbon\Carbon::parse($permohonan->yb_date_time)->format('d-m-Y') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Waktu Disokong</td>
                                        <td>{{ Carbon\Carbon::parse($permohonan->yb_date_time)->format('g:i a') }}</td>
                                    </tr>
                                    @endif


                                    @if($permohonan->status == 0)
                                    <tr class="bg-light">
                                        <td colspan="2"><b>Tidak Lulus</b></td>
                                    </tr>
                                    <tr>
                                        <td width="390">Status disahkan oleh</td>
                                        <td>{{ $not_approved_by->name }} </td>
                                    </tr>
                                    <tr>
                                        <td>Tarikh Status Tidak Lulus</td>
                                        <td>{{ Carbon\Carbon::parse($permohonan->updated_at)->format('d-m-Y') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Waktu Status Tidak Lulus</td>
                                        <td>{{ Carbon\Carbon::parse($permohonan->updated_at)->format('g:i a') }}</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>{{-- end card of keputusan_ulasan --}}
        @endif

        <div class="card" id="maklumat_pemohon" style="display:block;">
            <div class="card-body border border-dark">

                <div class="row" style="padding-top: 15px;">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h3 class="box-title m-t-40 text-center">Maklumat Pemohon</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td width="390">Nama Pemohon</td>
                                        <td> {{ ucfirst(strtolower($permohonan->user->name))}} </td>
                                    </tr>

                                    <tr>
                                        <td>Kad Pengenalan</td>
                                        <td>{{ 
                                        sprintf("%s-%s-%s",
                                        substr($permohonan->user->ic_number, 0, 6),
                                        substr($permohonan->user->ic_number, 6, 2),
                                        substr($permohonan->user->ic_number, 8))
                                        }}</td>
                                    </tr>

                                    <tr>
                                        <td>Nombor Telefon</td>
                                        <td>{{ $permohonan->user->mobile_phone}}</td>
                                    </tr>

                                    <tr>
                                        <td>Email</td>
                                        <td>{{ $permohonan->user->email}}</td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>{{-- end card of maklumat_pemohon --}}

    </div>{{-- end of printablearea --}}
  
</div>{{-- end of container-fluid --}}  
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<script>
    $("#maklumat_permohonan_checkbox").on('change', function() {

    if ($(this).is(':checked')) {
        //display form
        document.getElementById('maklumat_permohonan').style.display = "block";
    } else {
        //hide form
        document.getElementById('maklumat_permohonan').style.display = "none";
    }
  });

  $("#keputusan_ulasan_checkbox").on('change', function() {

    if ($(this).is(':checked')) {
        //display form
        document.getElementById('keputusan_ulasan').style.display = "block";
    } else {
        //hide form
        document.getElementById('keputusan_ulasan').style.display = "none";
    }
  });

  $("#maklumat_pemohon_checkbox").on('change', function() {

    if ($(this).is(':checked')) {
        //display form
        document.getElementById('maklumat_pemohon').style.display = "block";
    } else {
        //hide form
        document.getElementById('maklumat_pemohon').style.display = "none";
    }
  });

</script>

<script>
$(function() {
    $("#print").click(function() {
        var mode = 'iframe'; //popup
        var close = mode == "popup";
        var options = {
            mode: mode,
            popClose: close
        };
        $("div.printableArea").printArea(options);
    });
});
</script>

@endsection