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
                    <div class="col-md" style="padding-top: 10px;">
                      <div class="border card border-info h-100">
                        <div class="card-body">
                            <h4 class="card-title" style="font-weight: bold;">Senarai Pemohon</h4>
                            <p class="card-text">Senarai pengguna yang berdaftar dan layak membuat permohonan dalam <b>"Sistem Permohonan Rumah Ibadat"</b>.</p>
                        </div>
                        <div class="card-footer">
                          <a href="{{ route('admins.pengguna.pemohon') }}" class="btn btn-info">Senarai Permohon</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-md" style="padding-top: 10px;">
                      <div class="border card border-info h-100">
                        <div class="card-body">
                            <h4 class="card-title" style="font-weight: bold;">Senarai Pengguna Dalaman</h4>
                            <p class="card-text">
                              Senarai pengguna yang berdaftar dalam <b>"Sistem Permohonan Rumah Ibadat"</b> dan mempunyai peranan seperti
                              <b>Exco</b>,
                              <b>YB</b>,
                              <b>Kakitangan UPEN</b> dan
                              <b>Admin Sistem</b>.
                            </p>
                        </div>
                        <div class="card-footer">
                          <a href="{{ route('admins.pengguna.pengguna-dalaman') }}" class="btn btn-info">Senarai Pengguna Dalaman</a>
                        </div>
                      </div>
                    </div>
                    {{-- <div class="col-md-1"></div> --}}
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
