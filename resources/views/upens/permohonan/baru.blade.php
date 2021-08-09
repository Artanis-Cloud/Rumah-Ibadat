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

                <div class="row" style="padding-bottom: 10px;">
                  <div class="col-md-2"></div>
                  <div class="col-md"><h3 style="text-align: center;">Status Batch</h3></div>
                  <div class="col-md-2"></div>
                </div>

                <div class="row">
                  <div class="col-md-3"></div>
                  <div class="col-md">
                    <div class="table-responsive">
                        <table style="width: 100%; table-layout: fixed;">
                          <thead style="text-align: center; border: 1px solid black;">
                            <tr>
                              <th>#</th>
                              <th class="text-left">Rumah Ibadat</th>
                              <th>Batch Terkini</th>
                              <th>Index Batch</th>
                            </tr>
                          </thead>

                          <tbody style="text-align: center; border: 1px solid black;">

                            <tr>
                              <td>1</td>
                              <td class="text-left">Tokong</td>
                              <td>{{ $batch->tokong }}</td>
                              <td>{{ $batch->tokong_counter }}</td>
                            </tr>

                            <tr>
                              <td>2</td>
                              <td class="text-left">Kuil</td>
                              <td>{{ $batch->kuil }}</td>
                              <td>{{ $batch->kuil_counter }}</td>
                            </tr>

                            <tr>
                              <td>3</td>
                              <td class="text-left">Gurdwara</td>
                              <td>{{ $batch->gurdwara }}</td>
                              <td>{{ $batch->gurdwara_counter }}</td>
                            </tr>

                            <tr>
                              <td>4</td>
                              <td class="text-left">Gereja</td>
                              <td>{{ $batch->gereja }}</td>
                              <td>{{ $batch->gereja_counter }}</td>
                            </tr>

                            <tr class="bg-light">
                              <td>5</td>
                              <td class="text-left"><b>Batch seterusnya</b></td>
                              <td><b>{{ $batch->main_batch }}</b></td>
                              <td>-</td>
                            </tr>

                          </tbody>
                        </table>
                      </div>
                  </div>
                  <div class="col-md-3"></div>
                </div>

                <div class="row" style="padding-top: 15px;">
                  <div class="col-md-3">
                    <button type="button" class="btn waves-effect waves-light btn-info btn-block" id="batch_tokong" data-toggle="modal" data-target="#confirmation_increment_batch">Batch Tokong</button>
                  </div>
                  <div class="col-md-3">
                    <button type="button" class="btn waves-effect waves-light btn-info btn-block" id="batch_kuil" data-toggle="modal" data-target="#confirmation_increment_batch">Batch Kuil</button>
                  </div>
                  <div class="col-md-3">
                    <button type="button" class="btn waves-effect waves-light btn-info btn-block" id="batch_gurdwara" data-toggle="modal" data-target="#confirmation_increment_batch">Batch Gurdwara</button>
                  </div>
                  <div class="col-md-3">
                    <button type="button" class="btn waves-effect waves-light btn-info btn-block" id="batch_gereja" data-toggle="modal" data-target="#confirmation_increment_batch">Batch Gereja</button>
                  </div>
                </div>

                <div class="modal fade" id="confirmation_increment_batch" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbspPengesahan!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      <form action="{{ route('upens.tetapan.permohonan.batch-baru') }}">

                      <div class="modal-body">
                        <span id="message_batch"></span>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <input type="hidden" name="batch" id="batch">
                        <button type="submit" class="btn btn-success">Buka Batch Baru</button>
                      </div>

                      </form>

                    </div>
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
                                <th class="all">PERMOHONAN ID</th>
                                <th class="all">KATEGORI</th>
                                <th class="all">BATCH</th>
                                <th class="all">TARIKH PERMOHONAN DIBUAT</th>
                                <th class="all">NAMA RUMAH IBADAT</th>
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

                                  {{-- KATEGORI--}}
                                  <td>
                                    @if($data->rumah_ibadat->category == "TOKONG")

                                    <span class="badge badge-info" style="font-size: 13px;">Tokong</span>

                                    @elseif($data->rumah_ibadat->category == "KUIL")

                                    <span class="badge badge-info" style="font-size: 13px;">Kuil</span>

                                    @elseif($data->rumah_ibadat->category == "GURDWARA")

                                    <span class="badge badge-info" style="font-size: 13px;">Gurdwara</span>

                                    @elseif($data->rumah_ibadat->category == "GEREJA")

                                    <span class="badge badge-info" style="font-size: 13px;">Gereja</span>

                                    @endif
                                  </td>

                                  {{-- BATCH --}}
                                  <td><span class="badge badge-primary" style="font-size: 13px;">Batch {{ $data->batch }} | {{ $data->rumah_ibadat->category }}</span></td>

                                  {{-- TARIKH PERMOHONAN DIBUAT--}}
                                  <td>{{ Carbon\Carbon::parse($data->created_at)->format('d-m-Y') }}</td>

                                  {{-- NAMA RUMAH IBADAT --}}
                                  <td>{{ $data->rumah_ibadat->name_association }}</td>

                                  {{-- TINDAKAN --}}
                                  <td>
                                    <div class="row">
                                      <div class="col-md">
                                        <form action="{{ route('upens.permohonan.papar') }}" target="_blank">
                                          <input type="hidden" name="permohonan_id" value="{{ $data->id }}" readonly>
                                          <button type="submit" class="btn btn-info"><i class="far fa-eye"></i></button>
                                        </form>
                                      </div>
                                      <div class="col-md">
                                        <form action="{{ route('upens.permohonan.print') }}" target="_blank">
                                          <input type="hidden" name="permohonan_id" value="{{ $data->id }}" readonly>
                                          <button type="submit" class="btn waves-effect waves-light btn-info"><i class="fas fa-print"></i></button>
                                        </form>
                                      </div>
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
//id batch
$('#batch_tokong').click(function(){
    $('#message_batch').html('Anda pasti mahu membuka batch baru untuk kategori <b>Tokong</b> ?');  
    $('#batch').val("tokong");
    
});

$('#batch_kuil').click(function(){
    $('#message_batch').html('Anda pasti mahu membuka batch baru untuk kategori <b>Kuil</b> ?');  
    $('#batch').val("kuil");
});

$('#batch_gurdwara').click(function(){
    $('#message_batch').html('Anda pasti mahu membuka batch baru untuk kategori <b>Gurdwara</b> ?');  
    $('#batch').val("gurdwara");
});

$('#batch_gereja').click(function(){
    $('#message_batch').html('Anda pasti mahu membuka batch baru untuk kategori <b>Gereja</b> ?');  
    $('#batch').val("gereja");
});

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
          title: 'Senarai Permohonan Baru Diterima',
      },
      {
          extend: 'print',
          text: 'Cetak',
          pageSize: 'LEGAL',
          title: 'Senarai Permohonan Baru Diterima',
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