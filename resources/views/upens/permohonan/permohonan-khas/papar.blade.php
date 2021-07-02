@extends('layouts.layout-upen')

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
                                  <label>Tujuan Permohonan</label>
                                  <div class="form-group">
                                      <textarea class="form-control text-uppercase  border-dark " id="purpose" name="purpose" rows="3" disabled>{{ $special_application->purpose }}</textarea>
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-1"></div>

                                @if($special_application->supported_document_1 != null)
                                <div class="col-md-4" style="padding-top: 5px;">
                                  <a href="{{ asset( $image_path = str_replace('public', 'storage',  $special_application->supported_document_1)) }}" class="btn waves-effect waves-light btn-info btn-block" target="_blank"><i class="fas fa-eye"></i> Papar Dokumen Sokongan 1</a>
                                </div>
                                <div class="col-md-2"></div>
                                @endif
                                @if($special_application->supported_document_2 != null)
                                <div class="col-md-4" style="padding-top: 5px;">
                                  <a href="{{ asset( $image_path = str_replace('public', 'storage',  $special_application->supported_document_2)) }}" class="btn waves-effect waves-light btn-info btn-block" target="_blank"><i class="fas fa-eye"></i> @if($special_application->supported_document_1 == null) Papar Dokumen Sokongan 1 @else Papar Dokumen Sokongan 2 @endif</a>
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

                              <div class="row">
                                <div class="col-md-6">
                                  <label>Status Permohonan</label>
                                  <div class="mb-3 input-group">
                                    <input class="form-control text-uppercase @error('status') is-invalid @else border-dark @enderror" id="status" name="status" type="text" value="{{ $special_application->status == 0 ? "Tidak Lulus" : ($special_application->status == 1 ? "Sedang Diproses" : ($special_application->status == 2 ? "Lulus" : "") ) }}" disabled>
                                  </div>
                                </div>
                                @if($special_application->yb_id != null )
                                <div class="col-md-6">
                                  <label>
                                    @if($special_application->status == 0) 
                                    Tidak Diluluskan Oleh
                                    @elseif($special_application->status == 2)
                                    Diluluskan Oleh
                                    @endif
                                    
                                  </label>
                                  <div class="mb-3 input-group">
                                    <input class="form-control text-uppercase @error('yb_name') is-invalid @else border-dark @enderror" id="yb_name" name="yb_name" type="text" value="{{ $yb->name }}" disabled>
                                  </div>
                                </div>
                                @endif
                              </div>

                              @if($special_application->yb_id != null )

                              <div class="row">
                                
                                <div class="col-md-6">
                                  <label>
                                    @if($special_application->status == 0) 
                                    Tarikh Tidak Diluluskan
                                    @elseif($special_application->status == 2)
                                    Tarikh Diluluskan
                                    @endif
                                    
                                  </label>
                                  <div class="mb-3 input-group">
                                    <input class="form-control text-uppercase @error('yb_date') is-invalid @else border-dark @enderror" id="yb_date" name="yb_date" type="text" value="{{ Carbon\Carbon::parse($special_application->yb_date_time)->format('d-m-Y') }}" disabled>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <label>
                                    @if($special_application->status == 0) 
                                    Waktu Tidak Diluluskan
                                    @elseif($special_application->status == 2)
                                    Waktu Diluluskan
                                    @endif
                                    
                                  </label>
                                  <div class="mb-3 input-group">
                                    <input class="form-control text-uppercase @error('yb_time') is-invalid @else border-dark @enderror" id="yb_time" name="yb_time" type="text" value="{{ Carbon\Carbon::parse($special_application->yb_date_time)->format('g:i a') }}" disabled>
                                  </div>
                                </div>
                                
                              </div>

                              @endif

                              <div class="row" style="padding-bottom: 25px; padding-top: 25px;">
                                <div class="col-md-4"></div>
                                <div class="col-md">
                                  <a href="{{ route('upens.permohonan-khas.senarai') }}" class="btn waves-effect waves-light btn-info btn-block">Kembali</a>
                                </div>
                                <div class="col-md-4"></div>
                              </div>

                            </div>
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