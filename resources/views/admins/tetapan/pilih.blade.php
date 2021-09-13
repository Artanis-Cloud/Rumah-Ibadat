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
                    <div class="col-md-6" style="padding-top: 20px;">
                        <div class="border card border-info h-100">
                            <div class="card-body">
                                <h4 class="card-title" style="font-weight: bold;">Tetapan Halaman Utama</h4>
                                <p class="card-text">Tetapan untuk mengemaskini maklumat di ruangan <i>'Landing
                                        Page'</i> <b>Sistem Permohonan Dana Rumah Ibadat</b>.</p>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('admins.tetapan.halaman-utama') }}" class="btn btn-info">Tetapan
                                    Halaman Utama</a>
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
