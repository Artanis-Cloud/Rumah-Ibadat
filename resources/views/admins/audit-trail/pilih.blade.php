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
                            <h4 class="card-title" style="font-weight: bold;">Audit Trail Proses</h4>
                            <p class="card-text">Senarai urusniaga terperinci yang berkaitan dengan rekod proses <b>Sistem Permohonan Dana Rumah Ibadat</b></p>
                        </div>
                        <div class="card-footer">
                          <a href="{{ route('admins.audit-trail.proses') }}" class="btn btn-info">Audit Trail Proses</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-md" style="padding-top: 20px;">
                      <div class="border card border-info h-100">
                        <div class="card-body">
                            <h4 class="card-title" style="font-weight: bold;">Audit Trail Log Akses</h4>
                            <p class="card-text">
                              Senarai rekod akses Log Masuk dan Log Keluar pengguna terhadap <b>Sistem Permohonan Dana Rumah Ibadat</b>
                            </p>
                        </div>
                        <div class="card-footer">
                          <a href="{{ route('admins.audit-trail.log-user') }}" class="btn btn-info">Audit Trail Log Akses</a>
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
