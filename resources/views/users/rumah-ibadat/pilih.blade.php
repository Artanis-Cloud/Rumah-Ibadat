@extends('layouts.layout-user-nicepage')

@section('content')


<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">

  <div class="row">
      {{-- <div class="col-2"></div> --}}
      <div class="col-12">

                  {{-- Flash Message --}}
                  @if ($message = Session::get('success'))
                    <div class="border alert alert-success border-success" style="text-align: center;">{{$message}}</div>
                  @elseif ($message = Session::get('error'))
                    <div class="border alert alert-danger border-danger" style="text-align: center;">{{$message}}</div>
                  @else
                    {{-- Hidden Gap - Just Ignore --}}
                    <div class="alert alert-white" style="text-align: center;"></div>
                    {{-- <div style="padding: 23px;"></div> --}}
                  @endif

                  <div class="row">
                    {{-- <div class="col-md-1"></div> --}}
                    <div class="col-md" style="padding-top: 20px;">
                      <div class="border card border-info h-100">
                        <div class="card-body">
                            <h4 class="card-title" style="font-weight: bold;">Daftar Baharu Rumah Ibadat</h4>
                            <p class="card-text">Sekiranya rumah ibadat belum didaftar dalam <b>"Senarai Rumah Ibadat Berdaftar"</b>, sila pilih bahagian ini.</p>
                        </div>
                        <div class="card-footer">
                          <a href="{{ route('users.rumah-ibadat.daftar') }}" class="btn btn-info">Daftar Baharu</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-md" style="padding-top: 20px;">
                      <div class="border card border-info h-100">
                        <div class="card-body">
                            <h4 class="card-title" style="font-weight: bold;">Permohonan Menukar Wakil Rumah Ibadat</h4>
                            <p class="card-text">
                              Sekiranya rumah ibadat telah didaftarkan dan ingin menukar wakil, sila pilih bahagian ini.
                              Pengguna boleh membuat semakan rumah ibadat di ruangan <b>"Senarai Rumah Ibadat Berdaftar"</b>.
                            </p>
                        </div>
                        <div class="card-footer">
                          <a href="{{ route('users.rumah-ibadat.menukar') }}" class="btn btn-info">Mohon Tukar Wakil</a>
                        </div>
                      </div>
                    </div>
                    {{-- <div class="col-md-1"></div> --}}
                  </div>

                  <div class="row" style="padding-top: 20px;">
                    <div class="col-md">
                      <div class="border card border-info">
                        <div class="card-body">
                            <h4 class="card-title" style="font-weight: bold;">Senarai Rumah Ibadat Berdaftar</h4>
                        </div>
                      </div>
                    </div>
                  </div>

                  {{-- Hidden Gap - Just Ignore --}}
                  <div class="alert alert-white" style="text-align: center;"></div>
                  {{-- <div style="padding: 25px;"></div> --}}

      </div>
  </div>

</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
@endsection
