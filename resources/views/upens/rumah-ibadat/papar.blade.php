@extends('layouts.layout-upen')

@section('content')


<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">

  <div class="row">
      <div class="col-12">

        <div class="printableArea">
          <div class="row">
            <div class="col-md">

              <div class="border card border-dark h-100" style="display:block; page-break-after: auto;">
                <div class="card-body">

                  <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">

                  <div class="table-responsive ">
                      <table class="table">
                          <tbody>
                              <tr class="bg-light text-center">
                                <th colspan="2">Maklumat Permohonan</th>
                              </tr>

                              <tr>
                                  <td width="390">Nombor Rujukan</td>
                                  <td><b>{{ $permohonan->getPermohonanID() }}</b></td>
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
                                  <td>Kategori Rumah Ibadat</td>
                                  <td> {{ ucfirst(strtolower($permohonan->category))}} </td>
                              </tr>

                              <tr>
                                  <td>Ulasan Pemohon</td>
                                  <td> {{ $permohonan->comment }} </td>
                              </tr>

                              <tr>
                                  <td>Dokumen Lampiran</td>
                                  <td> 
                                    <a href="{{ asset( $image_path = str_replace('public', 'storage',  $permohonan->supported_document)) }}" target="_blank">
                                     [ Papar Dokumen ]
                                    </a>
                                  </td>
                              </tr>

                              <tr>
                                  <td>Tarikh Permohonan Dibuat</td>
                                  <td>{{ Carbon\Carbon::parse($permohonan->created_at)->format('d-m-Y') }}</td>
                              </tr>

                              <tr>
                                  <td>Waktu Permohonan Dibuat</td>
                                  <td>{{ Carbon\Carbon::parse($permohonan->created_at)->format('g:i a') }}</td>
                              </tr>

                              <tr class="bg-light text-center">
                                <th colspan="2">Maklumat Pemohon</th>
                              </tr>

                              <tr>
                                  <td>Nama Pemohon</td>
                                  <td> {{ ucfirst(strtolower($permohonan->user->name))}} </td>
                              </tr>

                              <tr>
                                  <td>Kad Pengenalan</td>
                                  <td> {{ $permohonan->user->ic_number }} </td>
                              </tr>

                              <tr>
                                  <td>Email</td>
                                  <td> {{ $permohonan->user->email }} </td>
                              </tr>

                              <tr>
                                  <td>Nombor telefon</td>
                                  <td> {{ $permohonan->user->mobile_phone }} </td>
                              </tr>

                              <tr class="bg-light text-center">
                                <th colspan="2">Maklumat Rumah Ibadat</th>
                              </tr>

                              <tr>
                                  <td>Nama Rumah Ibadat Yang Dipohon</td>
                                  <td>{{ $rumah_ibadat->name_association }}</td>
                              </tr>

                              <tr>
                                  <td>Jenis Pendaftaran</td>
                                  <td>
                                    @if($rumah_ibadat->registration_type == "SENDIRI")
                                    Nombor Sijil Pendaftaran / Nombor ROS
                                    @else 
                                    Nombor Pendaftaran Cawangan
                                    @endif
                                  </td>
                              </tr>

                              <tr>
                                  <td>Nombor Pendaftaran</td>
                                  <td>
                                    {{ $rumah_ibadat->registration_type == "SENDIRI" ? $rumah_ibadat->registration_number : explode("%", $rumah_ibadat->registration_number, 2)[1]}}
                                  </td>
                              </tr>

                              @if($permohonan->status != "2")

                              <tr class="bg-light text-center">
                                <th colspan="2">Maklumat Wakil Rumah Ibadat Terkini</th>
                              </tr>

                              <tr>
                                  <td>Nama Pemohon</td>
                                  <td> {{ ucfirst(strtolower($rumah_ibadat->user->name))}} </td>
                              </tr>

                              <tr>
                                  <td>Kad Pengenalan</td>
                                  <td> {{ $rumah_ibadat->user->ic_number }} </td>
                              </tr>

                              <tr>
                                  <td>Email</td>
                                  <td> {{ $rumah_ibadat->user->email }} </td>
                              </tr>

                              <tr>
                                  <td>Nombor telefon</td>
                                  <td> {{ $rumah_ibadat->user->mobile_phone }} </td>
                              </tr>
                              @endif
                          </tbody>
                      </table>
                  </div>

                  </div>
                  </div>

                </div>
              </div>

            </div> {{-- END PRINTABLE AREA --}}
          </div>
        </div>

        <!-- Modal Cancellation -->
        <div class="modal fade" id="confirmation_tidak_lulus_permohonan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbspPengesahan!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <form action="{{ route('upens.rumah-ibadat.permohonan.tidak-lulus') }}">

              <div class="modal-body">
                Anda pasti tidak meluluskan permohonan ini?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}">
                <button type="submit" class="btn btn-success">Permohonan Tidak Diluluskan</button>
              </div>

              </form>

            </div>
          </div>
        </div>

        <!-- Modal Cancellation -->
        <div class="modal fade" id="confirmation_lulus_permohonan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbspPengesahan!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <form action="{{ route('upens.rumah-ibadat.permohonan.lulus') }}">

              <div class="modal-body">
                Anda pasti mahu meluluskan permohonan ini?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}">
                <button type="submit" class="btn btn-success">Permohonan Diluluskan</button>
              </div>

              </form>

            </div>
          </div>
        </div>

        <div class="row" style="padding-top: 25px;">
          <div class="col-md-4">
            <button type="button" class="btn waves-effect waves-light btn-info btn-block" id="print"><i class="fas fa-print"></i> &nbsp&nbsp Cetak Permohonan</button>
          </div>
          <div class="col-md-4">
            @if($permohonan->status == "1")
            <button type="button" class="btn waves-effect waves-light btn-danger btn-block" id="print" data-toggle="modal" data-target="#confirmation_tidak_lulus_permohonan">Tidak Diluluskan</button>
            @else
            <a href="{{ URL::previous() }}" class="btn waves-effect waves-light btn-info btn-block">Kembali</a>
            @endif
          </div>
          <div class="col-md-4">
            @if($permohonan->status == "1")
            <button type="button" class="btn waves-effect waves-light btn-success btn-block" id="print" data-toggle="modal" data-target="#confirmation_lulus_permohonan">Diluluskan</button>
            @endif
          </div>
        </div>

      </div>
  </div>

</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
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
