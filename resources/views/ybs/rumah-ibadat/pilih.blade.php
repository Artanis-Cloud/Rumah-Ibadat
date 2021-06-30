@extends('layouts.layout-yb')

@section('content')


<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">

  <div class="row">
      {{-- <div class="col-2"></div> --}}
      <div class="col-12">

        <div class="row">

          <div class="col-md-6" style="padding-top: 20px;">
            <div class="border card border-info h-100">
              <div class="card-body">
                  <h4 class="card-title" style="font-weight: bold;">Senarai Rumah Ibadat</h4>
                  <p class="card-text">Senarai rumah ibadat yang berdaftar.</p>
              </div>
              <div class="card-footer">
                <a href="{{ route('ybs.rumah-ibadat.senarai') }}" class="btn btn-info">Senarai Rumah Ibadat</a>
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
