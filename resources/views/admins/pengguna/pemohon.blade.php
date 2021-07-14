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
                                <th class="all">NAMA PENGGUNA</th>
                                <th class="all">KAD PENGENALAN</th>
                                <th class="all">DAFTAR RUMAH IBADAT</th>
                                <th class="all">STATUS AKAUN</th>
                                <th class="all">TINDAKAN</th>
                              </tr>
                          </thead>

                          <tbody>

                            @foreach($pengguna as $data)
                            <tr>
                              <td></td>
                              <td>{{ $data->name }}</td>
                              <td>{{ $data->ic_number }}</td>

                              <td>
                                @if($data->is_rumah_ibadat == '0')
                                  <span class="label label-success label-warning" style="font-size: 13px;"> Tidak Berdaftar</span>
                                @elseif($data->is_rumah_ibadat == '1')
                                  <span class="label label-success label-success" style="font-size: 13px;">Berdaftar</span>
                                @endif
                              </td>

                              <td>
                                @if($data->status == '0')
                                  <span class="label label-success label-danger" style="font-size: 13px;"> Tidak Aktif</span>
                                @elseif($data->status == '1')
                                  <span class="label label-success label-success" style="font-size: 13px;">Aktif</span>
                                @endif
                              </td>

                              <td class="p-3">
                                <div class="d-flex flex-row justify-content-around align-items-center">
                                    @if($data->status == '0')
                                    <button class="btn btn-success" onclick="enable_user({{ $data->id }})"><i class="fa fa-check-circle"></i></button>
                                    @elseif($data->status == '1')
                                    <button class="btn btn-danger" onclick="disable_user({{ $data->id }})"><i class="far fa-times-circle"></i></button>
                                    @endif

                                    <form action="{{ route('admins.pengguna.pemohon.papar') }}">
                                      <input type="hidden" name="user_id" value="{{ $data->id }}">
                                      <button class="btn btn-info"><i class="fas fa-user-edit"></i></button>
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
                  

                  <!-- Modal Disable Permohonan -->
                  <div class="modal fade" id="disable_user_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbspPengesahan!</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Anda pasti mahu nyahaktif pengguna ini?
                        </div>
                        <div class="modal-footer">
                          <form action="{{ route('admins.pengguna.pemohon.tukar-status') }}">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                            <input type="hidden" name="user_id_disable" id="user_id_disable" readonly>
                            <button type="submit" class="btn btn-success">Nyahaktif Pengguna</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div> 

                  <!-- Modal Enable Permohonan -->
                  <div class="modal fade" id="enable_user_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbspPengesahan!</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Anda pasti mahu aktifkan pengguna ini?
                        </div>
                        <div class="modal-footer">
                          <form action="{{ route('admins.pengguna.pemohon.tukar-status') }}">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                            <input type="hidden" name="user_id_enable" id="user_id_enable" readonly>
                            <button type="submit" class="btn btn-success">Aktifkan Pengguna</button>
                          </form>
                        </div>
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