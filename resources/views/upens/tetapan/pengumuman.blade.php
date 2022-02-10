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

                  <div class="row">
                    <div class="col-md">
                      <a href="{{ route('upens.tetapan.pengumuman.baru') }}" class="btn waves-effect waves-light btn-info">Pengumuman Baru</a>
                    </div>
                  </div>

                  <hr>

                  <div class="row" style="padding-top: 15px;">
                    <div class="col-md">
                      <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="table-laporan" style="width: 100%;">
                          <thead>
                              <tr>
                                <th class="all">BIL</th>
                                <th class="all">TAJUK</th>
                                <th class="all">KANDUNGAN</th>
                                <th class="all">TARIKH PENGUMUMAN DIBUAT</th>
                                <th class="all">PERANAN</th>
                                <th class="all">DIBUAT OLEH</th>
                                <th class="all">TINDAKAN</th>
                              </tr>
                          </thead>

                          <tbody>

                            @foreach( $annoucement as $data)
                              <tr>
                                  {{-- BIL --}}
                                  <td></td>

                                  {{-- tajuk --}}
                                  <td>{{ $data->title }}</td>

                                  {{-- kandungan --}}
                                  <td>{{ $data->content }}</td>

                                  {{-- TARIKH pengumuman DIBUAT--}}
                                  <td>{{ Carbon\Carbon::parse($data->created_at)->format('d-m-Y') }}</td>

                                  {{-- Peranan --}}
                                  <td>
                                    @if($data->admin == "1")
                                      <span class="label label-success label-info border border-dark" style="font-size: 10px;">Admin</span><br>
                                    @endif

                                    @if($data->upen == "1")
                                      <span class="label label-success label-info border border-dark" style="font-size: 10px;">UPEN</span><br>
                                    @endif

                                    @if($data->yb == "1")
                                      <span class="label label-success label-info border border-dark" style="font-size: 10px;">YB</span><br>
                                    @endif

                                    @if($data->exco == "1")
                                      <span class="label label-success label-info border border-dark" style="font-size: 10px;">Exco</span><br>
                                    @endif

                                    @if($data->pemohon == "1")
                                      <span class="label label-success label-info border border-dark" style="font-size: 10px;">Pemohon</span><br>
                                    @endif
                                  </td>

                                  {{-- NAMA RUMAH PEMOHON --}}
                                  <td>{{ $data->user->name}}</td>

                                  {{-- TINDAKAN --}}
                                  <td>

                                      <input type="hidden" name="pengumuman_id" value="" readonly>
                                      <button type="submit" class="btn btn-danger" onclick="return validation_id('{{ $data->id }}')"><i class="fas fa-trash-alt"></i></button>
                                  </td>
                              </tr>
                            @endforeach

                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                {{-- Modal Validation --}}
                <div class="modal fade" id="validation_padam_pengumuman" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbspPeringatan!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <form action="{{ route('upens.tetapan.pengumuman.padam') }}">

                            <div class="modal-body">
                                Anda pasti mahu memadam pengumuman ini?
                                <input type="hidden" name="id_pengumuman" id="id_pengumuman" readonly>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Padam Pengumuman</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                            </div>

                        </form>
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
          title: 'Senarai Pengumuman',
      },
      {
          extend: 'print',
          text: 'Cetak',
          pageSize: 'LEGAL',
          title: 'Senarai Pengumuman',
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

{{-- Confirmation ID for delete annoucenment --}}
<script>
    function validation_id(pengumuman_id){
        console.log(pengumuman_id);
        $('#id_pengumuman').val(pengumuman_id);
        $("#validation_padam_pengumuman").modal();

    }
</script>
@endsection
