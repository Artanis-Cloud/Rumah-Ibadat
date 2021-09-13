@extends('layouts.layout-upen')

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
          <div class="col-md-6" style="padding-top: 20px;">
            <div class="border card card-hover border-info h-100">
              <div class="card-body">
                  <h4 class="card-title" style="font-weight: bold;">Permohonan Menukar Wakil Rumah Ibadat</h4>
                  <p class="card-text">Senarai permohonan untuk pengguna yang ingin menukar wakil rumah ibadat yang telah berdaftar.</p>
              </div>
              <div class="card-footer">
                <a href="{{ route('upens.rumah-ibadat.permohonan') }}" class="btn btn-info">Permohonan Menukar Wakil Rumah Ibadat</a>
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
@endsection
