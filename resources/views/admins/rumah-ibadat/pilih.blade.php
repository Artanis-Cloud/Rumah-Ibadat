@extends('layouts.layout-admin')

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
                      <div class="border card border-info h-100">
                        <div class="card-body">
                            <h4 class="card-title" style="font-weight: bold;">Senarai Rumah Ibadat</h4>
                            <p class="card-text">Senarai rumah ibadat yang telah berdaftar dalam <b>"Sistem Permohonan Rumah Ibadat"</b>.</p>
                        </div>
                        <div class="card-footer">
                          <a href="{{ route('admins.rumah-ibadat.senarai') }}" class="btn btn-info">Senarai Rumah Ibadat</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-md" style="padding-top: 20px;">
                      <div class="border card border-info h-100">
                        <div class="card-body">
                            <h4 class="card-title" style="font-weight: bold;">Permohonan Menukar Wakil Rumah Ibadat</h4>
                            <p class="card-text">
                              Senarai permohonan untuk menukar wakil rumah ibadat yang telah berdaftar dalam <b>"Sistem Permohonan Rumah Ibadat"</b>
                            </p>
                        </div>
                        <div class="card-footer">
                          <a href="{{ route('admins.pengguna.pengguna-dalaman') }}" class="btn btn-info">Permohonan Menukar Wakil Rumah Ibadat</a>
                        </div>
                      </div>
                    </div>
                    {{-- <div class="col-md-1"></div> --}}
                  </div>


      </div>
  </div>

</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
@endsection
