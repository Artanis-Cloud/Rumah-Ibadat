@extends('layouts.layout-yb')

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
                            <h4 class="card-title" style="font-weight: bold;">Permohonan Baru</h4>
                            <p class="card-text">Senarai permohonan yang baru dihantar oleh pemohon.</p>
                        </div>
                        <div class="card-footer">
                          <a href="{{ route('ybs.permohonan.baru') }}" class="btn btn-info">Senarai Permohonan Baru</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-md" style="padding-top: 20px;">
                      <div class="border card border-info h-100">
                        <div class="card-body">
                            <h4 class="card-title" style="font-weight: bold;">Permohonan Sedang Diproses</h4>
                            <p class="card-text">
                              Senarai permohonan yang telah diambil tindakan.
                            </p>
                        </div>
                        <div class="card-footer">
                          <a href="#" class="btn btn-info">Senarai Sedang Diproses</a>
                        </div>
                      </div>
                    </div>
                    {{-- <div class="col-md-1"></div> --}}
                  </div>

                  <div class="row">
                    {{-- <div class="col-md-1"></div> --}}
                    <div class="col-md" style="padding-top: 20px;">
                      <div class="border card border-info h-100">
                        <div class="card-body">
                            <h4 class="card-title" style="font-weight: bold;">Permohonan Lulus</h4>
                            <p class="card-text">Senarai permohonan yang telah diluluskan oleh YB dan Kakitangan UPEN.</p>
                        </div>
                        <div class="card-footer">
                          <a href="#" class="btn btn-info">Senarai Permohonan Lulus</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-md" style="padding-top: 20px;">
                      <div class="border card border-info h-100">
                        <div class="card-body">
                            <h4 class="card-title" style="font-weight: bold;">Permohonan Tidak Lulus</h4>
                            <p class="card-text">
                              Senarai permohonan yang tidak diluluskan oleh YB dan Kakitangan UPEN.
                            </p>
                        </div>
                        <div class="card-footer">
                          <a href="#" class="btn btn-info">Senarai Permohonan Tidak Lulus</a>
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
