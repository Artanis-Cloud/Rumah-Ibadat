@extends('layouts.layout-user-nicepage')

@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Tukar Kata Laluan</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('user.halaman-utama') }}">Halaman Utama</a>
                        </li>
                        <li class="breadcrumb-item"> Profil </li>
                        <li class="breadcrumb-item active" aria-current="page">Tukar Kata Laluan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
  
  <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">

                  {{-- Flash Message --}}
                  <div class="alert alert-success" style="text-align: center;">Kata laluan berjaya ditukar!</div>

                  <div class="row"> 
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                      <div class="form-group has-label">
                          <label>Kata Laluan Terdahulu</label>
                          <input class="form-control" name="old_password" type="password" required="true">
                          
                      </div>
                    </div>
                    <div class="col-md-3"></div>
                  </div>

                  <div class="row"> 
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                      <div class="form-group has-label">
                          <label>Kata Laluan Baru</label>
                          <input class="form-control" name="password" type="password" required="true">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group has-label">
                          <label>Sahkan Kata Laluan Baru</label>
                          <input class="form-control" name="password_confirmation" type="password" required="true">
                      </div>
                    </div>
                    <div class="col-md-3"></div>
                  </div>

                  <div class="row"> 
                    <div class="col-md-3"></div>
                    <div class="col-md-6" style="text-align: center;">
                      <button type="button" class="btn waves-effect waves-light btn-info">Tukar Kata laluan</button>
                    </div>
                    <div class="col-md-3"></div>
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