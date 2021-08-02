@extends((Auth()->user()->is_rumah_ibadat == 0) ? 'layouts.layout-user-disabled' : ((Auth()->user()->is_rumah_ibadat == 1) ? 'layouts.layout-user-nicepage' : ''))

@section('content')


<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">

  <div class="row">
      {{-- <div class="col-2"></div> --}}
      <div class="col-12">


                  <div class="row">
                    {{-- <div class="col-md-1"></div> --}}
                    <div class="col-md" style="padding-top: 20px;">
                      <div class="border card card-hover border-info h-100">
                        <div class="card-body">
                            <h4 class="card-title" style="font-weight: bold;">Daftar Baharu Rumah Ibadat</h4>
                            <p class="card-text">Sekiranya rumah ibadat belum didaftar dalam <b>"Senarai Rumah Ibadat Berdaftar"</b>, sila pilih bahagian ini.</p>
                        </div>
                        <div class="card-footer">
                          @if(Auth()->user()->is_rumah_ibadat == 0)
                            <a href="{{ route('users.rumah-ibadat.daftar') }}" class="btn btn-info">Daftar Baharu</a>
                          @else 
                            <button class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="" data-original-title="Anda telah mendaftar rumah ibadat.">Daftar Baharu</button>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="col-md" style="padding-top: 20px;">
                      <div class="border card card-hover border-info h-100">
                        <div class="card-body">
                            <h4 class="card-title" style="font-weight: bold;">Permohonan Menukar Wakil Rumah Ibadat</h4>
                            <p class="card-text">
                              Sekiranya rumah ibadat telah didaftarkan dan ingin menukar wakil, sila pilih bahagian ini.
                              Pengguna boleh membuat semakan rumah ibadat di ruangan <b>"Senarai Rumah Ibadat Berdaftar"</b>.
                            </p>
                        </div>
                        <div class="card-footer">
                          @if(Auth()->user()->is_rumah_ibadat == 0)
                          <form action="{{ route('users.rumah-ibadat.menukar') }}">
                            <div class="row">
                              <div class="col-md-3">
                                <button type="submit" class="btn btn-info">Mohon Tukar Wakil</button>
                              </div>
                              <div class="ml-auto">
                                <div class="form-group mb-3" style="padding-bottom: 0px;">
                                    <input class="form-control text-uppercase  border-dark " id="rumah_ibadat_id" name="rumah_ibadat_id" type="text" placeholder="ID RUMAH IBADAT" required>
                                </div>
                              </div>
                            </div>
                          </form>
                            {{-- <a href="{{ route('users.rumah-ibadat.menukar') }}" class="btn btn-info">Mohon Tukar Wakil</a> --}}
                              
                            {{-- <a href="#" class="btn btn-dark">Mohon Tukar Wakil</a> --}}
                          @else 
                            <button class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="" data-original-title="Anda telah mendaftar rumah ibadat.">Mohon Tukar Wakil</button>
                          @endif
                        </div>
                      </div>
                    </div>

                    @if(Auth()->user()->is_rumah_ibadat == 1)
                    <div class="col-md" style="padding-top: 20px;">
                      <div class="border card card-hover border-info h-100">
                        <div class="card-body">
                            <h4 class="card-title" style="font-weight: bold;">Kemaskini Maklumat Rumah Ibadat</h4>
                            <p class="card-text">
                              Sekiranya rumah ibadat telah didaftarkan dan ingin mengemakini maklumat rumah ibadat, sila pilih bahagian ini.
                            </p>
                        </div>
                        <div class="card-footer">
                          <a href="{{ route('users.rumah-ibadat.kemaskini') }}" class="btn btn-info">Kemaskini Rumah Ibadat</a>

                        </div>
                      </div>
                    </div>
                    @endif
                    {{-- <div class="col-md-1"></div> --}}
                  </div>

                  @if(Auth()->user()->is_rumah_ibadat == 0)
                  <div class="row" style="padding-top: 20px;">
                    <div class="col-md">
                      <div class="border card border-info">
                        <div class="card-body">
                            <h4 class="card-title" style="font-weight: bold;">Senarai Rumah Ibadat Berdaftar</h4>

                            <div class="row" style="padding-top: 15px;">
                              <div class="col-md">
                                <div class="table-responsive">
                                  <table class="table table-striped table-bordered" id="table-laporan" style="width: 100%;">
                                    <thead>
                                        <tr>
                                          <th class="all">BIL</th>  
                                          <th class="all">KETEGORI</th>
                                          <th class="all">JENIS PENDAFTARAN</th>
                                          <th class="all">NOMBOR PENDAFTARAN</th>
                                          <th class="all">NAMA RUMAH IBADAT</th>
                                          <th class="all">ID RUMAH IBADAT</th>
                                          {{-- <th class="all">TARIKH PENDAFTARAN</th> --}}
                                          {{-- <th class="all">DAERAH</th> --}}
                                        </tr>
                                    </thead>

                                    <tbody>

                                      @foreach( $rumah_ibadat as $data)
                                        <tr onclick="rumah_ibadat_id({{ $data->id }})">
                                            {{-- BIL --}}
                                            <td></td>

                                            {{-- KETEGORI --}}
                                            <td><span class="label label-info" style="font-size: 13px;">{{ $data->category}}</span></td>

                                            <td>{{ $data->registration_type }}</td>

                                            <td>
                                              @if($data->registration_type == "SENDIRI")
                                                {{ $data->registration_number }}
                                              @else 
                                                {{ $data->registration_type == "INDUK" ? explode("%", $data->registration_number, 2)[1] : '' }}
                                              @endif
                                            </td>


                                            {{-- NAMA RUMAH IBADAT --}}
                                            <td>{{ $data->name_association }}</td>

                                            <td>{{ $data->id }}</td>



                                            {{-- TARIKH PENDAFTARAN --}}
                                            {{-- <td>{{ Carbon\Carbon::parse($data->created_at)->format('d-m-Y') }}</td> --}}

                                            {{-- DAERAH --}}
                                            {{-- <td>{{ $data->district}}</td> --}}

                                            
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
                  @endif

      </div>
  </div>

</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->

<script>
  function rumah_ibadat_id(id){
    $("#rumah_ibadat_id").val(id);
  }
</script>

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
