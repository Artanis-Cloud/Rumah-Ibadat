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
                    <div class="col-md" style="padding-top: 20px;">
                      <div class="border card border-info h-100">
                        <div class="card-body">
                            <h4 class="card-title" style="font-weight: bold;">Permohonan Baru</h4>
                            <p class="card-text">Senarai permohonan yang baru dihantar oleh pemohon.</p>
                        </div>
                        <div class="card-footer">
                          <a href="{{ route('upens.permohonan.baru') }}" class="btn btn-info">Senarai Permohonan Baru</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-md" style="padding-top: 20px;">
                      <div class="border card border-info h-100">
                        <div class="card-body">
                            <h4 class="card-title" style="font-weight: bold;">Permohonan Semakan Semula</h4>
                            <p class="card-text">
                              Senarai permohonan yang memerlukan semakan semula daripada pemohon.
                            </p>
                        </div>
                        <div class="card-footer">
                          <a href="{{ route('upens.permohonan.semak-semula') }}" class="btn btn-info">Senarai Permohonan Semakan Semula</a>
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
                          <a href="{{ route('upens.permohonan.lulus') }}" class="btn btn-info">Senarai Permohonan Lulus</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6" style="padding-top: 20px;">
                      <div class="border card border-info h-100">
                        <div class="card-body">
                            <h4 class="card-title" style="font-weight: bold;">Permohonan Tidak Lulus</h4>
                            <p class="card-text">
                              Senarai permohonan yang tidak diluluskan oleh YB dan Kakitangan UPEN.
                            </p>
                        </div>
                        <div class="card-footer">
                          <a href="{{ route('upens.permohonan.tidak-lulus') }}" class="btn btn-info">Senarai Permohonan Tidak Lulus</a>
                        </div>
                      </div>
                    </div>
                    {{-- <div class="col-md-1"></div> --}}
                  </div>

                  <hr>

                  <div class="row">
                    {{-- <div class="col-md-1"></div> --}}
                    <div class="col-md-6" style="padding-top: 20px;">
                      <div class="border card border-info h-100">
                        <div class="card-body">
                            <h4 class="card-title" style="font-weight: bold;">Borang Permohonan Khas</h4>
                            <p class="card-text">
                              Permohonan Khas oleh kakitangan UPEN.
                            </p>
                        </div>
                        <div class="card-footer">
                          <a href="{{ route('upens.permohonan-khas.hantar') }}" class="btn btn-info">Borang Permohonan Khas</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6" style="padding-top: 20px;">
                      <div class="border card border-info h-100">
                        <div class="card-body">
                            <h4 class="card-title" style="font-weight: bold;">Senarai Permohonan Khas</h4>
                            <p class="card-text">
                              Senarai Permohonan Khas oleh kakitangan UPEN.
                            </p>
                        </div>
                        <div class="card-footer">
                          <a href="{{ route('upens.permohonan-khas.senarai') }}" class="btn btn-info">Borang Permohonan Khas</a>
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
