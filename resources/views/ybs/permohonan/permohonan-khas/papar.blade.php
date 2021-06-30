@extends('layouts.layout-yb')

@section('content')


<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
  
  <div class="row">
      {{-- <div class="col-2"></div> --}}
      <div class="col-12">
          {{-- <div class="card"> --}}
            
              {{-- <div class="card-body border border-dark"> --}}

                  <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md">
                      <div id="accordionTwo">
                  
                        <div class="card">
                          {{-- <a href="" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="headingTwo" style="color: white;"> --}}
                          {{-- <button data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> --}}
                            <div class="card-header bg-dark" id="headingTwo">
                              <h4 class="mb-0" style="color: white;"><i class="fas fa-file"></i>&nbsp&nbsp&nbspPermohonan Khas</h4>
                            </div>
                          {{-- </button> --}}
                          {{-- </a> --}}


                          <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionTwo">
                            <div class="card-body border border-dark">
                              
                              <div class="row">
                                <div class="col-md">

                                  <label>Permohonan ID</label>
                                  <div class="mb-3 input-group">
                                    <input class="form-control text-uppercase @error('reference_number') is-invalid @else border-dark @enderror" id="reference_number" name="reference_number" type="text" value="{{ $special_application->getPermohonanID() }}" disabled>
                                  </div>

                                </div>

                                <div class="col-md">

                                  <label>Kategori Rumah Ibadat</label>
                                  <div class="mb-3 input-group">
                                    <input class="form-control text-uppercase @error('category') is-invalid @else border-dark @enderror" id="category" name="category" type="text" value="{{ $special_application->category }}" disabled>
                                  </div>

                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md">

                                  <label>Tarikh Permohonan Dibuat</label>
                                  <div class="mb-3 input-group">
                                    <input class="form-control text-uppercase @error('date_special_application') is-invalid @else border-dark @enderror" id="date_special_application" name="date_special_application" type="text" value="{{ Carbon\Carbon::parse($special_application->created_at)->format('d-m-Y') }}" disabled>
                                  </div>

                                </div>

                                <div class="col-md">

                                  <label>Waktu Permohonan Dibuat</label>
                                  <div class="mb-3 input-group">
                                    <input class="form-control text-uppercase @error('time_special_application') is-invalid @else border-dark @enderror" id="time_special_application" name="time_special_application" type="text" value="{{ Carbon\Carbon::parse($special_application->created_at)->format('g:i a') }}" disabled>
                                  </div>

                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md">
                                  <label class="required">Tujuan Permohonan</label>
                                  <div class="form-group">
                                      <textarea class="form-control text-uppercase  border-dark " id="purpose" name="purpose" rows="3" disabled>{{ $special_application->purpose }}</textarea>
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-1"></div>

                                @if($special_application->supported_document_1 != null)
                                <div class="col-md-4" style="padding-top: 5px;">
                                  <a href="{{ asset( $image_path = str_replace('public', 'storage',  $special_application->supported_document_1)) }}" class="btn waves-effect waves-light btn-info btn-block" target="_blank"><i class="fas fa-eye"></i> Papar Dokumen Sokongan</a>
                                </div>
                                <div class="col-md-2"></div>
                                @endif
                                @if($special_application->supported_document_2 != null)
                                <div class="col-md-4" style="padding-top: 5px;">
                                  <a href="{{ asset( $image_path = str_replace('public', 'storage',  $special_application->supported_document_2)) }}" class="btn waves-effect waves-light btn-info btn-block" target="_blank"><i class="fas fa-eye"></i> Papar Dokumen Sokongan</a>
                                </div>
                                @endif

                                <div class="col-md-1"></div>
                              </div>

                              <div class="row" style="padding-top: 15px;">
                                <div class="col-md-6">

                                  <label>Nama pemohon</label>
                                  <div class="mb-3 input-group">
                                    <input class="form-control text-uppercase @error('name') is-invalid @else border-dark @enderror" id="name" name="name" type="text" value="{{ $special_application->user->name }}" disabled>
                                  </div>

                                </div>
                                <div class="col-md-6">

                                  <label>Jumlah Peruntukan</label>
                                  <div class="mb-3 input-group">
                                    <input class="form-control text-uppercase @error('requested_amount') is-invalid @else border-dark @enderror" id="requested_amount" name="requested_amount" type="text" value="RM {{ number_format($special_application->requested_amount, 2) }}" disabled>
                                  </div>

                                </div>
                              </div>

                              <hr>

                              <h3 style="text-align: center; padding-bottom: 15px;">Keputusan Permohonan</h3> 

                              <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-4" style="padding-top: 15px;">
                                  <button type="button" class="btn waves-effect waves-light btn-danger btn-block" id="batal_button" data-toggle="modal" data-target="#confirmation_batal_permohonan">Tidak Lulus</button>
                                </div>
                                <div class="col-md-4" style="padding-top: 15px;">
                                  <button type="button" class="btn waves-effect waves-light btn-success btn-block" id="sahkan_button" data-toggle="modal" data-target="#confirmation_lulus_permohonan">Lulus</button>
                                </div>
                                <div class="col-md-2"></div>
                              </div>

                              <div class="row" style="padding-bottom: 25px; padding-top: 25px;">
                                <div class="col-md-3"></div>
                                <div class="col-md">
                                  <a href="{{ route('ybs.permohonan.khas') }}" class="btn waves-effect waves-light btn-info btn-block">Kembali</a>
                                </div>
                                <div class="col-md-3"></div>
                              </div>

                            </div>
                          </div>
                        </div>

                      </div>

                      <!-- Modal Acceptance -->
                      <div class="modal fade" id="confirmation_lulus_permohonan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbspPengesahan!</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>

                            <form action="{{ route('ybs.permohonan.khas.lulus') }}">

                            <div class="modal-body">
                              Anda pasti mahu meluluskan permohonan ini?

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                              <input type="hidden" name="permohonan_id" value="{{ $special_application->id }}">
                              <button type="submit" class="btn btn-success">Permohonan Lulus</button>
                            </div>

                            </form>

                          </div>
                        </div>
                      </div>

                      <!-- Modal Rejection -->
                      <div class="modal fade" id="confirmation_batal_permohonan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbspPengesahan!</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>

                            <form action="{{ route('ybs.permohonan.khas.tidak-lulus') }}">

                            <div class="modal-body">
                              Anda pasti tidak meluluskan permohonan ini?

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                              <input type="hidden" name="permohonan_id" value="{{ $special_application->id }}">
                              <button type="submit" class="btn btn-success">Permohonan Tidak Lulus</button>
                            </div>

                            </form>

                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2"></div>
                  </div>
                  
              {{-- </div> --}}

          {{-- </div> --}}
      </div>
  </div>

</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
@endsection