@extends('layouts.layout-upen')

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
                                <th class="all">BATCH / KATEGORI</th>
                                <th class="all">TARIKH PERMOHONAN DIBUAT</th>
                                <th class="all">PEJABAT EXCO</th>
                                <th class="all">PEJABAT YB PENGERUSI</th>
                                <th class="all">PEJABAT UPEN</th>
                                <th class="all">STATUS PERMOHONAN</th>
                                <th class="all">TINDAKAN</th>
                              </tr>
                          </thead>

                          <tbody>

                            @foreach( $permohonan as $data)
                              <tr>
                                  {{-- BIL --}}
                                  <td></td>

                                  {{-- PERMOHONAN ID --}}
                                  <td>{{ $data->getPermohonanID() }}</td>

                                  <td>
                                    @if($data->yb_id != null)
                                    Batch {{ $data->batch }} - {{ $data->rumah_ibadat->category }}
                                    @else 
                                    
                                    @endif
                                  </td>

                                  {{-- TARIKH PERMOHONAN DIBUAT--}}
                                  <td>{{ Carbon\Carbon::parse($data->created_at)->format('d-m-Y') }}</td>

                                  <td>
                                    @if($data->exco_id != null)
                                    <b style="color: rgb(3, 202, 3); font-size: 18px;"> &#10003 </b>
                                    @else 
                                    -
                                    @endif
                                  </td>

                                  <td>
                                    @if($data->yb_id != null)
                                    <b style="color: rgb(3, 202, 3); font-size: 18px;"> &#10003 </b>
                                    @else 
                                    -
                                    @endif
                                  </td>

                                  <td>
                                    @if($data->upen_id != null)
                                    <b style="color: rgb(3, 202, 3); font-size: 18px;"> &#10003 </b>
                                    @else 
                                    -
                                    @endif
                                  </td>

                                  <td>
                                    @if($data->status == 0)
                                    <span class="badge badge-warning" style="font-size: 13px;">Dibatalkan</span>
                                    @elseIf($data->status == 1)
                                    <span class="badge badge-info" style="font-size: 13px;">Sedang Diproses</span>
                                    @elseIf($data->status == 2)
                                    <span class="badge badge-success" style="font-size: 13px;">Lulus</span>
                                    @elseIf($data->status == 3)
                                    <span class="badge badge-danger" style="font-size: 13px;">Tidak Lulus</span>
                                    @elseIf($data->status == 4)
                                    <span class="badge badge-danger" style="font-size: 13px;">Batal</span>
                                    @endif
                                  </td>

                                  <td>
                                    {{-- @if($data->status == 3 || $data->status == 4)
                                    <form action="{{ route('upens.permohonan.tidak-lulus.papar') }}">
                                      <input type="hidden" name="permohonan_id" value="{{ $data->id }}" readonly>
                                      <button type="submit" class="btn btn-info"><i class="far fa-eye"></i></button>
                                    </form>
                                    @else 
                                    -
                                    @endif --}}
                                    <form action="{{ route('upens.permohonan.print') }}" target="_blank">
                                      <input type="hidden" name="permohonan_id" value="{{ $data->id }}" readonly>
                                      <button type="submit" class="btn waves-effect waves-light btn-info"><i class="fas fa-print"></i></button>
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
      </div>
  </div>

</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

<script type="text/javascript">
// Responsive Data Table
let tablelaporan = $("#table-laporan")
var t = $(tablelaporan).DataTable({
  "responsive" : true,
  "dom": 'Bfrtip',
  "buttons": [
      'excel',
      {
          extend: 'pdfHtml5',
          orientation: 'landscape',
          pageSize: 'A4',
          title: 'Status Permohonan Keseluruhan',
      },
      {
          extend: 'print',
          text: 'Cetak',
          pageSize: 'LEGAL',
          title: 'Status Permohonan Keseluruhan',
          customize: function(win)
          {

              var last = null;
              var current = null;
              var bod = [];

              var css = '@page { size: landscape; }',
                  head = win.document.head || win.document.getElementsByTagName('head')[0],
                  style = win.document.createElement('style');

              style.type = 'text/css';
              style.media = 'print';

              if (style.styleSheet)
              {
                style.styleSheet.cssText = css;
              }
              else
              {
                style.appendChild(win.document.createTextNode(css));
              }

              head.appendChild(style);
        },
      },
  ],
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