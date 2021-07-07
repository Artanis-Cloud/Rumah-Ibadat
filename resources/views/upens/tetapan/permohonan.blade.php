@extends('layouts.layout-upen')

@section('content')


<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->

<div class="container-fluid">
  
  <div class="row">
      {{-- <div class="col-2"></div> --}}
      <div class="col-12">
          <div class="card">
              <div class="card-body border border-dark">

                <div class="row" style="padding-bottom: 10px;">
                  <div class="col-md-2"></div>
                  <div class="col-md"><h3 style="text-align: center;">Permohonan</h3></div>
                  <div class="col-md-2"></div>
                </div>

                <div class="row" style="padding-bottom: 10px;">
                  <div class="col-md-3"></div>
                  <div class="col-md-3">
                    <label>Status Permohonan</label>
                    @if($batch->allow_permohonan == 1)
                    <div class="mb-3 input-group">
                      <input class="form-control text-uppercase border-dark bg-success text-light" id="status_permohonan_buka" name="status_permohonan_buka" type="text" value="Permohonan Dibuka" disabled>
                    </div>
                    @elseif($batch->allow_permohonan == 0)
                    <div class="mb-3 input-group">
                      <input class="form-control text-uppercase border-dark bg-danger text-light" id="status_permohonan_tutup" name="status_permohonan_tutup" type="text" value="Permohonan Ditutup" disabled>
                    </div>
                    @endif
                  </div>
                  <div class="col-md-3">
                    <label>Permohonan Dibuka Oleh</label>
                    @if($batch->allowed_user_id == null)
                    <div class="mb-3 input-group">
                      <input class="form-control text-uppercase border-dark" id="upen_staff" name="upen_staff" type="text" value="Sistem" disabled>
                    </div>
                    @else
                    <div class="mb-3 input-group">
                      <input class="form-control text-uppercase border-dark" id="upen_staff" name="upen_staff" type="text" value="{{ $user->name }}" disabled>
                    </div>
                    @endif
                  </div>
                  <div class="col-md-3"></div>
                </div>

                <div class="row">
                  <div class="col-md-3"></div>
                  <div class="col-md-3">
                    @if($batch->allow_permohonan == 1)
                    <label>Tarikh Permohonan Dibuka</label>
                    @elseif($batch->allow_permohonan == 0)
                    <label>Tarikh Permohonan Ditutup</label>
                    @endif
                    <div class="mb-3 input-group">
                      <input class="form-control text-uppercase border-dark" id="date_allow" name="date_allow" type="text" value="{{ Carbon\Carbon::parse($batch->created_at)->format('d-m-Y') }}" disabled>
                    </div>
                  </div>
                  <div class="col-md-3">
                    @if($batch->allow_permohonan == 1)
                    <label>Waktu Permohonan Dibuka</label>
                    @elseif($batch->allow_permohonan == 0)
                    <label>Waktu Permohonan Ditutup</label>
                    @endif
                    <div class="mb-3 input-group">
                      <input class="form-control text-uppercase border-dark" id="time_allow" name="time_allow" type="text" value="{{ Carbon\Carbon::parse($batch->created_at)->format('g:i a') }}" disabled>
                    </div>
                  </div>
                  <div class="col-md-3"></div>
                </div>

                <div class="row" style="padding-top: 10px;">
                  <div class="col-md-3"></div>
                  <div class="col-md-6">
                    @if($batch->allow_permohonan == 1)
                    <button class="btn waves-effect waves-light btn-danger btn-block" data-toggle="modal" data-target="#allow_permohonan">Tutup Permohonan</button>
                    @elseif($batch->allow_permohonan == 0)
                    <button class="btn waves-effect waves-light btn-success btn-block" data-toggle="modal" data-target="#allow_permohonan">Buka Permohonan</button>
                    @endif
                    
                  </div>
                  <div class="col-md-3"></div>
                </div>

                <hr>

                <div class="row" style="padding-bottom: 10px;">
                  <div class="col-md-2"></div>
                  <div class="col-md"><h3 style="text-align: center;">Status Batch</h3></div>
                  <div class="col-md-2"></div>
                </div>

                <div class="row">
                  <div class="col-md-3"></div>
                  <div class="col-md">
                    <div class="table-responsive">
                        <table style="width: 100%; table-layout: fixed;">
                          <thead style="text-align: center; border: 1px solid black;">
                            <tr>
                              <th>#</th>
                              <th class="text-left">Rumah Ibadat</th>
                              <th>Batch Terkini</th>
                              <th>Index Batch</th>
                            </tr>
                          </thead>

                          <tbody style="text-align: center; border: 1px solid black;">

                            <tr>
                              <td>1</td>
                              <td class="text-left">Tokong</td>
                              <td>{{ $batch->tokong }}</td>
                              <td>{{ $batch->tokong_counter }}</td>
                            </tr>

                            <tr>
                              <td>2</td>
                              <td class="text-left">Kuil</td>
                              <td>{{ $batch->kuil }}</td>
                              <td>{{ $batch->kuil_counter }}</td>
                            </tr>

                            <tr>
                              <td>3</td>
                              <td class="text-left">Gurdwara</td>
                              <td>{{ $batch->gurdwara }}</td>
                              <td>{{ $batch->gurdwara_counter }}</td>
                            </tr>

                            <tr>
                              <td>4</td>
                              <td class="text-left">Gereja</td>
                              <td>{{ $batch->gereja }}</td>
                              <td>{{ $batch->gereja_counter }}</td>
                            </tr>

                          </tbody>
                        </table>
                      </div>
                  </div>
                  <div class="col-md-3"></div>
                </div>

                <div class="row" style="padding-top: 20px;">
                  <div class="col-md-3"></div>
                  <div class="col-md">
                    <button class="btn waves-effect waves-light btn-info btn-block" data-toggle="modal" data-target="#reset_batch">Tetapan Semula Batch</button>
                  </div>
                  <div class="col-md-3"></div>
                </div>

                
                <!-- Modal Enable-Disable Permohonan -->
                <div class="modal fade" id="allow_permohonan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbspPengesahan!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="{{ route('upens.tetapan.permohonan.allow') }}">
                      <div class="modal-body">
                        @if($batch->allow_permohonan == 1)
                        Anda pasti mahu menutup permohonan baru?
                        @elseif($batch->allow_permohonan == 0)
                        Anda pasti mahu membuka permohonan baru?
                        @endif
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        @if($batch->allow_permohonan == 1)
                        <button type="submit" class="btn btn-success">Tutup Permohonan</button>
                        @elseif($batch->allow_permohonan == 0)
                        <button type="submit" class="btn btn-success">Buka Permohonan</button>
                        @endif
                      </div>
                      </form>
                    </div>
                  </div>
                </div>

                <!-- Modal Enable-Disable Permohonan -->
                <div class="modal fade" id="reset_batch" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbspPengesahan!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="{{ route('upens.tetapan.permohonan.reset-batch') }}">
                      <div class="modal-body">
                        Permohonan akan automatik ditutup sekiranya anda melakukan tetapan semula batch. Anda pasti mahu melakukan tetapan semula batch?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Tetapan Semula Batch</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>


              </div>
          </div>
      </div>
      {{-- <div class="col-2"></div> --}}
  </div>

</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
@endsection