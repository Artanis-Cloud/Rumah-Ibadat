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

                  <div class="row" style="padding-top: 15px;">
                    <div class="col-md">
                      <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="table-laporan" style="width: 100%;">
                          <thead>
                              <tr>
                                <th class="all">BIL</th>
                                <th class="all">PERMOHONAN ID</th>
                                <th class="all">STATUS PERMOHONAN</th>
                                <th class="all">TARIKH PERMOHONAN</th>
                                <th class="all">TARIKH DILULUSKAN</th>
                                <th class="all">Peruntukan Yang Diluluskan</th>
                                <th class="all">JENIS PEMBAYARAN</th>
                              </tr>
                          </thead>

                          <tbody>

                            @foreach( $passed_application as $data)
                                <tr>
                                    <td></td>
                                    <td>{{ $data->getPermohonanID() }}</td>
                                    <td>
                                        <span class="badge badge-success" style="font-size: 13px;">Lulus</span>
                                    </td>
                                    <td>{{ Carbon\Carbon::parse($data->created_at)->format('d-m-Y') }}</td>
                                    <td>{{ Carbon\Carbon::parse($data->updated_at)->format('d-m-Y') }}</td>
                                    <td>RM {{ number_format($data->total_fund, 2) }}</td>
                                    <td>
                                      @if($data->payment_method == 1)
                                      Cek
                                      @else 
                                      EFT
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
