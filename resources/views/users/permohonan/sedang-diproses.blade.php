@extends('layouts.layout-user-nicepage')

@section('content')


<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">

  <div class="row">
      {{-- <div class="col-2"></div> --}}
      <div class="col-12">
          <div class="card">
            
              <div class="card-body border border-dark">

                  <div class="row">
                    <div class="col-md">
                      <div class="card-header" style="text-align: justify; text-justify: inter-word; border: 1px solid black;">
                        <h6 >Catatan:</h6>
                        <span>Pemohon hendaklah mengemaskini permohonan <span class="badge badge-info" style="font-size: 13px;">Kemaskini</span> sekiranya status permohonan anda berstatus <span class="badge badge-warning" style="font-size: 13px;">Semak Semula</span></span>

                      </div>
                    </div>
                  </div>

                  <div class="row" style="padding-top: 15px;">
                    <div class="col-md">
                      <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="table-laporan" style="width: 100%;">
                          <thead>
                              <tr>
                                <th class="all">BIL</th>
                                <th class="all">PERMOHONAN ID</th>
                                <th class="all">TARIKH PERMOHONAN</th>
                                <th class="all">WAKTU PERMOHONAN</th>
                                <th class="all">STATUS PERMOHONAN</th>
                                <th class="all">KEMASKINI PERMOHONAN</th>
                                <th class="all">BATALKAN PERMOHONAN</th>
                                <th class="all">PAPAR PERMOHONAN</th>
                              </tr>
                          </thead>

                          <tbody>

                            @foreach( $prosessing_application as $data)
                                <tr>
                                    {{-- BIL --}}
                                    <td></td>

                                    {{-- PERMOHONAN ID --}}
                                    <td>{{ $data->getPermohonanID() }}</td>

                                    {{-- TARIKH PERMOHONAN --}}
                                    <td>{{ Carbon\Carbon::parse($data->created_at)->format('d-m-Y') }}</td>

                                    {{-- WAKTU PERMOHONAN --}}
                                    <td>{{ Carbon\Carbon::parse($data->created_at)->format('g:i a') }}</td>

                                    {{-- STATUS PERMOHONAN --}}
                                    <td>
                                      @if($data->status == 1) 
                                        <span class="badge badge-info" style="font-size: 13px;">Sedang Diproses</span>
                                      @else 
                                        <span class="badge badge-warning" style="font-size: 13px;">Semak Semula</span>
                                      @endif
                                    </td>

                                    {{-- TINDAKAN --}}
                                    <td>
                                      @if($data->status == 1) 
                                        {{-- disable edit button if sedang diproses --}}
                                        <span><b>-</b></span>
                                      @else 
                                        {{-- enable edit button if semak permohonan --}}
                                        <form action="{{ route("users.permohonan.semak-semula") }}">
                                          <input type="hidden" name="permohonan_id" value="{{ $data->id }}" readonly>
                                          <button type="submit" class="btn btn-info" data-toggle="tooltip" data-placement="right" title="Kemaskini Permohonan">Kemaskini</button>
                                        </form>
                                      @endif
                                    </td>
                                    <td>
                                        @if($data->exco_id == null)
                                        <button class="btn btn-danger" onclick="return cancel_application({{ $data->id }})"><i class="far fa-window-close"></i></button>
                                        @else 
                                        <span><b>-</b></span>
                                        @endif
                                    </td>
                                    <td>
                                      <form action="{{ route('users.permohonan.papar-sedang-diproses') }}">
                                        <input type="hidden" name="permohonan_id" value="{{ $data->id }}" readonly>
                                        <button class="btn btn-info"><i class="fas fa-eye"></i></button>
                                      </form>
                                    </td>
                                </tr>
                            @endforeach

                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  
              </div>

          </div>


        <!-- Modal Batal Permohonan -->
          <div class="modal fade" id="confirmation_batal_permohonan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbspPengesahan!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <form action="{{ route('users.permohonan.sedang-diproses.batal') }}">

                <div class="modal-body">
                  <span id="message_cancellation"></span>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                  <input type="hidden" id="permohonan_id_batal" name="permohonan_id_batal" >
                  <button type="submit" class="btn btn-success">Batal Permohonan</button>
                </div>

                </form>

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
  function cancel_application(permohonan_id){
    $('#permohonan_id_batal').val(permohonan_id);//permohonan_id

    $('#message_cancellation').html('Anda mahu membatalkan permohonan ini?');//modal message

    $("#confirmation_batal_permohonan").modal(); //display modal
  }
</script>

<script type="text/javascript">
// Responsive Data Table
let tablelaporan = $("#table-laporan")
var t = $(tablelaporan).DataTable({
  "responsive" : true,
  "scrollX": true,
  "columnDefs": [ {
      "searchable": false,
      "orderable": false,
      "targets": 0
  } ],
  "order": [[ 1, 'asc' ]],
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
    responsive : true,
    columnDefs: [
                  {
                      "targets": "_all", // your case first column
                      "className": "text-center",
                  },
                ],
});

t.on('order.dt search.dt', function () {
      t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
            t.cell(cell).invalidate('dom');
      });
}).draw();

</script>
@endsection
