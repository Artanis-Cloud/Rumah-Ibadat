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
                                <th class="all">BIL</th>
                                <th class="all">KATEGORI</th>
                                <th class="all">NAMA RUMAH IBADAT</th>
                                <th class="all">DAERAH</th>
                                <th class="all">WAKIL RUMAH IBADAT</th>
                                <th class="all">TINDAKAN</th>
                              </tr>
                          </thead>

                          <tbody>

                            @foreach($rumah_ibadat as $data)
                            <tr>
                              <td></td>
                              <td>{{ $data->category }}</td>
                              <td>{{ $data->name_association  }}</td>
                              <td>{{ $data->district }}</td>
                              <td>
                                @if($data->user->name != null)
                                {{ $data->user->name }}
                                @else 
                                Tiada 
                                @endif
                              </td>

                              <td class="p-3">
                                <div class="d-flex flex-row justify-content-around align-items-center">
                                  <form action="{{ route('admins.rumah-ibadat.senarai.papar') }}">
                                    <input type="hidden" name="rumah_ibadat_id" value="{{ $data->id }}">
                                    <button class="btn btn-info" ><i class="fas fa-eye"></i></button>
                                  </form>
                                </div>
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
function disable_user(user_id){
    $( "#user_id_disable" ).val(user_id);
    $("#disable_user_modal").modal();
}

function enable_user(user_id){
    $( "#user_id_enable" ).val(user_id);
    $("#enable_user_modal").modal();
}

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
          title: 'Senarai Pengguna Dalaman',
      },
      {
          extend: 'print',
          text: 'Cetak',
          pageSize: 'LEGAL',
          title: 'Senarai Pengguna Dalaman',
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