@extends('layouts.layout-exco')

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
                              <h4 class="mb-0" style="color: white;"><i class="fas fa-place-of-worship"></i>&nbsp&nbsp&nbspMaklumat Rumah Ibadat</h4>
                            </div>
                          {{-- </button> --}}
                          {{-- </a> --}}


                          <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionTwo">
                            <div class="card-body border border-dark">
                              
                              <div class="row">
                                <div class="col-md">

                                  <label>Kategori Rumah Ibadat</label>
                                  <div class="mb-3 input-group">
                                    <input class="form-control text-uppercase @error('category') is-invalid @else border-dark @enderror" id="category" name="category" type="text" value="{{ $rumah_ibadat->category }}" disabled>
                                  </div>

                                </div>

                                <div class="col-md">

                                  <label>Nama Persatuan Rumah Ibadat</label>
                                  <div class="mb-3 input-group">
                                    <input class="form-control text-uppercase @error('name_association') is-invalid @else border-dark @enderror" id="name_association" name="name_association" type="text" value="{{ $rumah_ibadat->name_association  }}" disabled>
                                  </div>

                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-6">

                                  <label>Nombor Telefon Pejabat</label>
                                  <div class="mb-3 input-group">
                                    <input class="form-control text-uppercase @error('office_phone') is-invalid @else border-dark @enderror" id="office_phone" name="office_phone" type="text" value="{{ $rumah_ibadat->office_phone != null ? $rumah_ibadat->office_phone : "TIADA" }}" disabled>
                                  </div>

                                </div>
                                
                              </div>

                              <hr>

                              @if($rumah_ibadat->registration_type == "SENDIRI")
                              <div class="row">
                                
                                <div class="col-md">
                                  <label>Nombor Sijil Pendaftaran / Nombor ROS</label>
                                  <div class="mb-3 input-group">
                                    <input class="form-control text-uppercase @error('registration_number ') is-invalid @else border-dark @enderror" id="registration_number " name="registration_number " type="text" value="{{ $rumah_ibadat->registration_number  }}" disabled>
                                  </div>
                                </div>
                              </div>
                              @elseif($rumah_ibadat->registration_type == "INDUK")
                              <div class="row">
                                
                                <div class="col-md">
                                  <label>Nama Persatuan Rumah Ibadat Induk</label>
                                  <div class="mb-3 input-group">
                                    <input class="form-control text-uppercase @error('name_association_main') is-invalid @else border-dark @enderror" id="name_association_main" name="name_association_main" type="text" value="{{ $rumah_ibadat->name_association_main  }}" disabled>
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                
                                <div class="col-md">
                                  <label>Nombor Pendaftaran Induk</label>
                                  <div class="mb-3 input-group">
                                    <input class="form-control text-uppercase @error('registration_number_main') is-invalid @else border-dark @enderror" id="registration_number_main" name="registration_number_main" type="text" value="{{ $rumah_ibadat->registration_type == "INDUK" ? explode("%", $rumah_ibadat->registration_number, 2)[0] : '' }}" disabled>
                                  </div>
                                </div>

                                <div class="col-md">
                                  <label>Nombor Pendaftaran Cawangan</label>
                                  <div class="mb-3 input-group">
                                    <input class="form-control text-uppercase @error('registration_number_branch') is-invalid @else border-dark @enderror" id="registration_number_branch" name="registration_number_branch" type="text" value="{{ $rumah_ibadat->registration_type == "INDUK" ? explode("%", $rumah_ibadat->registration_number, 2)[1] : '' }}" disabled>
                                  </div>
                                </div>

                              </div>
                              @endif

                              <hr>

                              <div class="row">
                                <div class="col-md">
                                  <label class="required">Alamat Rumah Ibadat</label>
                                  <div class="form-group">
                                      <textarea class="form-control text-uppercase  border-dark " id="address" name="address" rows="2" disabled>{{ $rumah_ibadat->address }}</textarea>
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md">

                                  <label>Poskod</label>
                                  <div class="mb-3 input-group">
                                    <input class="form-control text-uppercase @error('postcode') is-invalid @else border-dark @enderror" id="postcode" name="postcode" type="text" value="{{ $rumah_ibadat->postcode }}" disabled>
                                  </div>

                                </div>
                                <div class="col-md">

                                  <label>Daerah</label>
                                  <div class="mb-3 input-group">
                                    <input class="form-control text-uppercase @error('district') is-invalid @else border-dark @enderror" id="district" name="district" type="text" value="{{ $rumah_ibadat->district }}" disabled>
                                  </div>

                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md">

                                  <label>Negeri</label>
                                  <div class="mb-3 input-group">
                                    <input class="form-control text-uppercase @error('state') is-invalid @else border-dark @enderror" id="state" name="state" type="text" value="{{ $rumah_ibadat->state }}" disabled>
                                  </div>

                                </div>
                                <div class="col-md">

                                  <label>Kawasan PBT</label>
                                  <div class="mb-3 input-group">
                                    <input class="form-control text-uppercase @error('pbt_area') is-invalid @else border-dark @enderror" id="pbt_area" name="pbt_area" type="text" value="{{ $rumah_ibadat->pbt_area }}" disabled>
                                  </div>

                                </div>
                              </div>

                              <hr>

                              <div class="row">
                                <div class="col-md">

                                  <label>Nama Penuh Persatuan Rumah Ibadat Mengikut Pendaftaran Bank</label>
                                  <div class="mb-3 input-group">
                                    <input class="form-control text-uppercase @error('name_association_bank') is-invalid @else border-dark @enderror" id="name_association_bank" name="name_association_bank" type="text" value="{{ $rumah_ibadat->name_association_bank }}" disabled>
                                  </div>

                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md">

                                  <label>Nama Bank</label>
                                  <div class="mb-3 input-group">
                                    <input class="form-control text-uppercase @error('bank_name') is-invalid @else border-dark @enderror" id="bank_name" name="bank_name" type="text" value="{{ $rumah_ibadat->bank_name }}" disabled>
                                  </div>

                                </div>
                                <div class="col-md">

                                  <label>Nombor Akaun</label>
                                  <div class="mb-3 input-group">
                                    <input class="form-control text-uppercase @error('bank_account ') is-invalid @else border-dark @enderror" id="bank_account " name="bank_account " type="text" value="{{ $rumah_ibadat->bank_account  }}" disabled>
                                  </div>

                                </div>
                              </div>

                              <div class="row" style="padding-bottom: 25px; padding-top: 25px;">
                                <div class="col-md-3"></div>
                                <div class="col-md">
                                  <a href="{{ route('excos.rumah-ibadat.senarai') }}" class="btn waves-effect waves-light btn-info btn-block">Kembali</a>
                                </div>
                                <div class="col-md-3"></div>
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