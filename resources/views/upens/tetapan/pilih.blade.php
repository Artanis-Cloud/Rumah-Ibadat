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
                  <h4 class="card-title" style="font-weight: bold;">Tetapan Permohonan</h4>
                  <p class="card-text">Tetapan permohonan seperti buka/tutup permohonan, tetapan semula batch dan lain-lain.</p>
              </div>
              <div class="card-footer">
                <a href="{{ route('upens.tetapan.permohonan') }}" class="btn btn-info">Tetapan Permohonan</a>
              </div>
            </div>
          </div>

          <div class="col-md-6" style="padding-top: 20px;">
            <div class="border card card-hover border-info h-100">
              <div class="card-body">
                  <h4 class="card-title" style="font-weight: bold;">Tetapan Pengumuman</h4>
                  <p class="card-text">Tetapan pengumuman untuk pengguna sistem.</p>
              </div>
              <div class="card-footer">
                <a href="{{ route('upens.tetapan.pengumuman') }}" class="btn btn-info">Tetapan Pengumuman</a>
              </div>
            </div>
          </div>
          {{-- <div class="col-md" style="padding-top: 20px;">
            <div class="border card border-info h-100">
              <div class="card-body">
                  <h4 class="card-title" style="font-weight: bold;">Permohonan Semakan Semula</h4>
                  <p class="card-text">
                    Senarai permohonan yang memerlukan semakan semula daripada pemohon.
                  </p>
              </div>
              <div class="card-footer">
                <a href="#" class="btn btn-info">Senarai Permohonan Semakan Semula</a>
              </div>
            </div>
          </div> --}}
          {{-- <div class="col-md-1"></div> --}}
        </div>

      </div>
  </div>

</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
@endsection
