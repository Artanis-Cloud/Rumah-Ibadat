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
                        <span>Sila tekan butang <span class="badge badge-info" style="font-size: 13px;"><i class="far fa-edit"></i></span> dibawah kolum Tindakan sekiranya Status Permohonan anda <span class="badge badge-warning" style="font-size: 13px;">Semak Semula</span></span><br>

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
                                <th class="all">STATUS PERMOHONAN</th>
                                <th class="all">TINDAKAN</th>
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
                                        <button type="button" class="btn btn-dark" data-toggle="tooltip" data-placement="right" title="Status Sedang Diproses"><i class="far fa-edit"></i></button>
                                      @else 
                                        {{-- enable edit button if semak permohonan --}}
                                        <form action="{{ route("users.permohonan.semak-semula") }}">
                                          <input type="hidden" name="permohonan_id" value="{{ $data->id }}" readonly>
                                          <button type="submit" class="btn btn-info" data-toggle="tooltip" data-placement="right" title="Kemaskini Permohonan"><i class="far fa-edit"></i></button>
                                        </form>
                                      @endif
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
      </div>
  </div>

</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->



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
