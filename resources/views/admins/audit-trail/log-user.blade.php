@extends('layouts.layout-admin')

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
                              <th class="all">Nama Pengguna</th>
                              <th class="all">Peranan</th>
                              <th class="all">Alamat IP</th>
                              <th class="all">Tarikh / Masa</th>
                              <th class="all">Pengkalan Data</th>
                              <th class="all">Acara</th>

                            </tr>
                          </thead>

                          <tbody>
                            @foreach($audit_log_user as $datas)

                              @if( $datas->user_id != NULL)
                                <tr>
                                    @if($datas->user->name == NULL)
                                    <td>Tiada</td>
                                    @else
                                    <td>{{  ucfirst($datas->user->name) }}</td>
                                    @endif

                                    @if($datas->user->role == 0)
                                    <td> <span class="badge badge-pill badge-success" style="font-size: 13px;">Pemohon</span> </td>
                                    @elseif($datas->user->role == 1)
                                    <td> <span class="badge badge-pill badge-success" style="font-size: 13px;">Pejabat Exco</span> </td>
                                    @elseif($datas->user->role == 2)
                                    <td> <span class="badge badge-pill badge-success" style="font-size: 13px;">Pejabat YB Pengerusi</span> </td>
                                    @elseif($datas->user->role == 3)
                                    <td> <span class="badge badge-pill badge-success" style="font-size: 13px;">Pejabat UPEN</span> </td>
                                    @elseif($datas->user->role == 4)
                                    <td> <span class="badge badge-pill badge-success" style="font-size: 13px;">Admin Sistem</span> </td>
                                    @endif

                                    <td>{{ $datas->ip_address }}</td>
                                    <td>{{  Carbon\Carbon::parse($datas->updated_at)->format('Y-m-d h:i:s')  }}</td>
                                    <td>{{ substr($datas->auditable_type, strpos($datas->auditable_type, "/") + 4) }}</td>

                                    @if($datas->event == "Log Masuk")
                                    <td><span class="badge m-1 badge-success" style="font-size:12px;">Log Masuk</span></td>
                                    @else
                                    <td><span class="badge m-1 badge-warning" style="font-size:12px;">Log Keluar</span></td>
                                    @endif
                                </tr>
                              @endif
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
          title: 'Audit Trail : Proses',
      },
      {
          extend: 'print',
          text: 'Cetak',
          pageSize: 'LEGAL',
          title: 'Audit Trail : Proses',
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

// t.on('order.dt search.dt', function () {
//       t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
//             cell.innerHTML = i+1;
//             t.cell(cell).invalidate('dom');
//       });
// }).draw();

</script>
@endsection