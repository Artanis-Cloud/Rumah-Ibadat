@extends('layouts.layout-user-nicepage')

@section('content')


<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">

  <div class="row">
    {{-- <div class="col-2"></div> --}}
    <div class="col-12">

      <div class="row">

        <div class="col-md-4">
          <a class="card card-hover bg-light border-info shadow rounded-right" style="border-left: solid 5px;" href="{{ route('users.permohonan.baru') }}">
                <div class="card-body">
                    <div class="d-flex no-block align-items-center">
                        <div class="row">
                          <div class="col-4" style="text-align: center;">
                            {{-- <i class="far fa-file fa-5x text-info"></i> --}}
                            <lord-icon
                                src="https://cdn.lordicon.com/nocovwne.json"
                                trigger="loop"
                                colors="primary:#121331,secondary:#137eff"
                                scale="66"
                                style="width:auto;height:70px">
                            </lord-icon>

                          </div>
                          <div class="col-8">
                            <h3 class="text-info">Permohonan Baru Tahun {{ $current_year }}</h3>
                          </div>
                        </div>
                    </div>
                </div>
          </a>
        </div>

        <div class="col-md-4">
          <a class="card card-hover bg-light border-orange shadow rounded-right" style="border-left: solid 5px;" href="{{ route('users.rumah-ibadat.pilih') }}">
                <div class="card-body">
                    <div class="d-flex no-block align-items-center">
                        <div class="row">
                          <div class="col-4" style="text-align: center;">
                            <i class="fas fa-place-of-worship fa-5x text-orange"></i>
                          </div>
                          <div class="col-8">
                            <h3 class="text-orange text-left ">Rumah Ibadat</h3>
                          </div>
                        </div>
                    </div>
                </div>
          </a>
        </div>

        <div class="col-md-4">
          <a class="card card-hover bg-light border-purple  shadow rounded-right" style="border-left: solid 5px;" href="{{ route('users.permohonan.pilih') }}">
                <div class="card-body">
                    <div class="d-flex no-block align-items-center">
                        <div class="row">
                          <div class="col-4" style="text-align: center;">
                            <i class="fas fa-clipboard-list fa-5x text-purple"></i>
                          </div>
                          <div class="col-8">
                            <h3 class="text-purple">Senarai Permohonan</h3>
                          </div>
                        </div>
                    </div>
                </div>
          </a>
        </div>

      </div>

      <hr>

      {{-- <div class="row">
        <div class="col-md-5">
          <h4>
            <i class="fas fa-user-friends"></i>  
            Statistik Pengguna
          </h4>
        </div>
        <div class="col-md-5">
          <h4>
            <i class="fas fa-bullhorn"></i>  
            Pengumuman
          </h4>
        </div>
        <div class="col-md-2">
          <h4>
            <i class="fas fa-chart-bar"></i> 
            Statistik Sistem
          </h4>
        </div>
      </div> --}}

      <div class="row">

        <div class="col-md-5">
          <h4>
            <i class="fas fa-user-friends"></i>  
            Statistik Pengguna
          </h4>

          <div class="row">
            <div class="col-md-12">
              <div class="card bg-cyan shadow">
                  <div class="card-body text-white">
                      <div class="d-flex flex-row">
                          <div class="display-6 align-self-center"><i class="fas fa-clipboard-list"></i></div>
                          <div class="align-self-center" style="padding-left: 10px;">
                              <span class="m-b-0">Jumlah</span>
                              <h4 >Permohonan Dihantar</h4>
                          </div>
                          <div class="ml-auto align-self-center">
                              <h2 class="font-medium m-b-0 text-center">{{ $count_permohonan_current }}</h2>
                              <span class="m-t-0">Permohonan</span>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="card bg-success shadow">
                  <div class="card-body text-white">
                      <div class="d-flex flex-row">
                          <div class="display-6 align-self-center"><i class="fas fa-clipboard-check"></i></div>
                          <div class="align-self-center" style="padding-left: 10px;">
                              <span class="m-b-0">Jumlah</span>
                              <h4 >Permohonan Diluluskan</h4>
                          </div>
                          <div class="ml-auto align-self-center">
                              <h2 class="font-medium m-b-0 text-center">{{ $count_permohonan_lulus }}</h2>
                              <span class="m-t-0">Permohonan</span>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="card bg-info shadow">
                  <div class="card-body text-white">
                      <div class="d-flex flex-row">
                          <div class="display-6 align-self-center"><i class="fas fa-hand-holding-usd"></i></div>
                          <div class="align-self-center" style="padding-left: 10px;">
                              <span class="m-b-0">Jumlah Peruntukan</span>
                              <h4>Diterima</h4>
                          </div>
                          <div class="ml-auto align-self-center">
                              <h2 class="font-medium m-b-0">RM {{ number_format($count_total_fund,2) }}</h2>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
          </div>

        </div>

        <div class="col-md-5">
          <h4>
            <i class="fas fa-bullhorn"></i>  
            Pengumuman
          </h4>
          <div class="card shadow-sm">
              {{-- <div class="card-header bg-primary">
                  <h4 class="m-b-0 text-center text-white"><i class="fas fa-bullhorn"></i> &nbsp&nbsp Pengumuman</h4>
              </div> --}}
              <div class="card-body border border-primary border-bottom">
                  <div class="list-group" style="overflow:auto;height:305px;width:100%;border:1px solid #ccc">

                      @foreach ($pengumuman as $data)
                          <div class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1 card-title" style="font-size: 20px; font-weight: bold;">{{ $data->title }}</h6>
                            <small class="text-muted" style="font-size: 110%;">{{ Carbon\Carbon::parse($data->created_at)->format('d-m-Y') }}</small>
                            </div>
                            <p class="my-1" style="font-size: 15px; text-align:justify;">{{ $data->content }}</p>
                          </div>
                      @endforeach
                      

                      @if($pengumuman->isEmpty())

                          <div style="padding-bottom: 5%;"></div>
                          <div style="width:100%; text-align:center">
                              {{-- <img src="https://image.flaticon.com/icons/png/512/2487/2487449.png" alt="Empty Box" style="width: 150px;"> --}}
                              <lord-icon
                                      src="https://cdn.lordicon.com/cnbtojmk.json"
                                      trigger="loop"
                                      delay="15"
                                      colors="primary:#121331,secondary:#3080e8"
                                      stroke="41"
                                      style="width:200px;height:auto"
                                      >
                                  </lord-icon>
                              <h6 class="font-medium text-center" style="padding-top: 25px;">Tiada Pengumuman Baru</h6>
                          </div>

                      @endif
                  </div>
              </div>
          </div>
        </div>

        <div class="col-md-2">
          <h4>
            <i class="fas fa-chart-bar"></i> 
            Statistik Sistem
          </h4>
          
          <div class="card">
              <div class="card-body border border-info">
                  <div class="d-flex flex-row" data-toggle="tooltip" data-placement="bottom" title="Jumlah Pengguna Berdaftar">
                      <div class="round align-self-center round-info"><i class="ti-user"></i></div>
                      <div class="align-self-center" style="padding-left: 10px; text-align: center;">
                          <h3 class="text-center">{{ $count_user }}</h3>
                          <span class="text-dark">Pengguna</span>
                      </div>
                  </div>
              </div>
          </div>

          <div class="card">
              <div class="card-body border border-warning">
                  <div class="d-flex flex-row" data-toggle="tooltip" data-placement="bottom" title="Jumlah Persatuan Berdaftar">
                      <div class="round align-self-center round-warning"><i class="fas fa-place-of-worship"></i></div>
                      <div class="align-self-center" style="padding-left: 10px; text-align: center;">
                          <h3 class="text-center">{{ $count_persatuan }}</h3>
                          <span class="text-dark">Persatuan</span>
                      </div>
                  </div>
              </div>
          </div>

          <div class="card">
              <div class="card-body border border-danger">
                  <div class="d-flex flex-row" data-toggle="tooltip" data-placement="bottom" title="Jumlah Permohonan Dihantar">
                      <div class="round align-self-center round-danger"><i class="fas fa-clipboard-list"></i></div>
                      <div class="align-self-center" style="padding-left: 10px; text-align: center;">
                          <h3 class="text-center">{{ $count_permohonan }}</h3>
                          <span class="text-dark font-12">Permohonan</span>
                      </div>
                  </div>
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
