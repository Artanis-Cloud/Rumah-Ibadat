@extends('layouts.layout-user-nicepage')

@section('content')


<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
  
  <div class="row">
      {{-- <div class="col-2"></div> --}}
      <div class="col-12">
          <div class="card">
            <form method="POST" action="#">
            {{ csrf_field() }}

              <div class="card-body border border-dark">

                  {{-- Flash Message --}}
                  @if ($message = Session::get('success'))
                    <div class="alert alert-success border border-success" style="text-align: center;">{{$message}}</div>
                  @elseif ($message = Session::get('error'))
                    <div class="alert alert-danger border border-danger" style="text-align: center;">{{$message}}</div>
                  @else
                    {{-- Hidden Gap - Just Ignore --}}
                    <div class="alert alert-white" style="text-align: center;"></div>
                    {{-- <div style="padding: 23px;"></div> --}}
                  @endif

                  <div class="row"> 
                    <div class="col-md-2"></div>
                    <div class="col-md">
                      <label>ID Rumah Ibadat</label>
                      <div class="input-group mb-3">
                          <input class="form-control text-uppercase @error('id_rumah_ibadat') is-invalid @else border-dark @enderror" id="id_rumah_ibadat" name="id_rumah_ibadat" type="text" readonly>
                          @error('id_rumah_ibadat')
                          <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-2"></div>
                  </div>

                  <div class="row"> 
                    <div class="col-md-2"></div>
                    <div class="col-md">
                      <div class="form-group">
                          <label class="mr-sm-2" for="inlineFormCustomSelect">Kategori Rumah Ibadat</label>
                          <select class="custom-select mr-sm-2 @error('category') is-invalid @else border-dark @enderror" id="category" name="category">
                              <option selected disabled hidden>PILIH KATEGORI RUMAH IBADAT</option>
                              <option value="BUDDHA"    {{ old('category') == "BUDDHA"    ? 'selected' : '' }} >BUDDHA</option>
                              <option value="HINDU"     {{ old('category') == "HINDU"     ? 'selected' : '' }} >HINDU</option>
                              <option value="KRISTIAN"  {{ old('category') == "KRISTIAN"  ? 'selected' : '' }} >KRISTIAN</option>
                          </select>
                          @error('category')
                          <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md">
                      <label>Nama Rumah Ibadat</label>
                      <div class="input-group mb-3">
                          <input class="form-control text-uppercase @error('name') is-invalid @else border-dark @enderror" id="name" name="name" type="text">
                          @error('name')
                          <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-2"></div>
                  </div>

                  <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md">
                      <label>Nombor ROS</label>
                      <div class="input-group mb-3">
                          <input class="form-control text-uppercase @error('ros_number') is-invalid @else border-dark @enderror" id="ros_number" name="ros_number" type="text">
                          @error('ros_number')
                          <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md">
                      <label>Nombor Telefon Pejabat</label>
                      <div class="input-group mb-3">
                          <input class="form-control text-uppercase @error('office_phone') is-invalid @else border-dark @enderror" id="office_phone" name="office_phone" type="text" placeholder="Contoh: 0312345678" minlength="10" maxlength="11" onkeypress="return onlyNumberKey(event)">
                          @error('office_phone')
                          <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-2"></div>
                  </div>

                  <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md">
                      <label>Alamat Rumah Ibadat</label>
                      <div class="form-group">
                          <textarea class="form-control text-uppercase @error('office_phone') is-invalid @else border-dark @enderror" id="address" name="address" rows="2"></textarea>
                      </div>
                    </div>
                    <div class="col-md-2"></div>
                  </div>

                  <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md">
                      <label>Poskod</label>
                      <div class="input-group mb-3">
                          <input class="form-control text-uppercase @error('postcode') is-invalid @else border-dark @enderror" id="postcode" name="postcode" type="text" minlength="5" maxlength="5" onkeypress="return onlyNumberKey(event)">
                          @error('ros_number')
                          <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md">
                      <div class="form-group">
                          <label class="mr-sm-2" for="inlineFormCustomSelect">Daerah</label>
                          <select class="custom-select mr-sm-2 @error('district') is-invalid @else border-dark @enderror" id="district" name="district">
                              <option selected disabled hidden>PILIH DAERAH</option>
                              <option value="GOMBAK"          {{ old('district') == "GOMBAK"          ? 'selected' : '' }} >GOMBAK</option>
                              <option value="HULU LANGAT"     {{ old('district') == "HULU LANGAT"     ? 'selected' : '' }} >HULU LANGAT</option>
                              <option value="HULU SELANGOR"   {{ old('district') == "HULU SELANGOR"   ? 'selected' : '' }} >HULU SELANGOR</option>
                              <option value="KLANG"           {{ old('district') == "KLANG"           ? 'selected' : '' }} >KLANG</option>
                              <option value="KUALA SELANGOR"  {{ old('district') == "KUALA SELANGOR"  ? 'selected' : '' }} >KUALA SELANGOR</option>
                              <option value="PETALING"        {{ old('district') == "PETALING"        ? 'selected' : '' }} >PETALING</option>
                              <option value="SABAK BERNAM"    {{ old('district') == "SABAK BERNAM"    ? 'selected' : '' }} >SABAK BERNAM</option>
                              <option value="SEPANG"          {{ old('district') == "SEPANG"          ? 'selected' : '' }} >SEPANG</option>
                          </select>
                          @error('category')
                          <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-2"></div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md">
                      <div class="form-group">
                          <label class="mr-sm-2" for="inlineFormCustomSelect">Daerah</label>
                          <select class="custom-select mr-sm-2 @error('state') is-invalid @else border-dark @enderror" id="state" name="state">
                              <option selected disabled hidden>PILIH NEGERI</option>
                              <option value="Johor"           {{ old('state') == "Johor"            ? 'selected' : '' }}>Johor</option>
                              <option value="Kedah"           {{ old('state') == "Kedah"            ? 'selected' : '' }}>Kedah</option>
                              <option value="Kelantan"        {{ old('state') == "Kelantan"         ? 'selected' : '' }}>Kelantan</option>
                              <option value="Melaka"          {{ old('state') == "Melaka"           ? 'selected' : '' }}>Melaka</option>
                              <option value="Negeri Sembilan" {{ old('state') == "Negeri Sembilan"  ? 'selected' : '' }}>Negeri Sembilan</option>
                              <option value="Pahang"          {{ old('state') == "Pahang"           ? 'selected' : '' }}>Pahang</option>
                              <option value="Pulau Pinang"    {{ old('state') == "Pulau Pinang"     ? 'selected' : '' }}>Pulau Pinang</option>
                              <option value="Perak"           {{ old('state') == "Perak"            ? 'selected' : '' }}>Perak</option>
                              <option value="Perlis"          {{ old('state') == "Perlis"           ? 'selected' : '' }}>Perlis</option>
                              <option value="Sabah"           {{ old('state') == "Sabah"            ? 'selected' : '' }}>Sabah</option>
                              <option value="Sarawak"         {{ old('state') == "Sarawak"          ? 'selected' : '' }}>Sarawak</option>
                              <option value="Selangor"        {{ old('state') == "Selangor"         ? 'selected' : '' }}>Selangor</option>
                              <option value="Terengganu"      {{ old('state') == "Terengganu"       ? 'selected' : '' }}>Terengganu</option>
                              <option value="WP Kuala Lumpur" {{ old('state') == "WP Kuala Lumpur"  ? 'selected' : '' }}>WP Kuala Lumpur</option>
                              <option value="WP Putrajaya"    {{ old('state') == "WP Putrajaya"     ? 'selected' : '' }}>WP Putrajaya</option>
                              <option value="WP Labuan"       {{ old('state') == "WP Labuan"        ? 'selected' : '' }}>WP Labuan</option>
                          </select>
                          @error('state')
                          <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-2"></div>
                  </div>

                  <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md">
                      <div class="form-group">
                          <label class="mr-sm-2" for="inlineFormCustomSelect">Nama Bank</label>
                          <select class="custom-select mr-sm-2 @error('bank_name') is-invalid @else border-dark @enderror" id="bank_name" name="bank_name">
                              <option selected disabled hidden>PILIH BANK</option>
                              <option value="Affin Bank" >Affin Bank</option>
                              <option value="Agrobank" >Agrobank</option>
                              <option value="Alliance Bank Malaysia">Alliance Bank Malaysia</option>
                              <option value="AmBank">AmBank</option>
                              <option value="Bank Islam Malaysia" >Bank Islam Malaysia</option>
                              <option value="Bank Muamalat Malaysia Berhad" >Bank Muamalat Malaysia Berhad</option>
                              <option value="Bank Rakyat" >Bank Rakyat</option>
                              <option value="Bank Simpanan Nasional (BSN)" >Bank Simpanan Nasional (BSN)</option>
                              <option value="CIMB Bank">CIMB Bank</option>
                              <option value="Citibank" >Citibank</option>
                              <option value="HSBC Bank" >HSBC Bank</option>
                              <option value="Hong Leong Bank" >Hong Leong Bank</option>
                              <option value="Maybank" >Maybank</option>
                              <option value="Public Bank" >Public Bank</option>
                              <option value="RHB Bank">RHB Bank</option>
                          </select>
                          @error('bank_name')
                          <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md">
                      <label>Nombor Akaun</label>
                      <div class="input-group mb-3">
                          <input class="form-control text-uppercase @error('bank_account') is-invalid @else border-dark @enderror" id="bank_account" name="bank_account" type="text" onkeypress="return onlyNumberKey(event)">
                          @error('bank_account')
                          <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-2"></div>
                  </div>

                  {{-- Submit Button --}}
                  <div class="row" style="padding-top: 15px;"> 
                    <div class="col-md-2"></div>
                    <div class="col-md" style="text-align: center;">
                      <button type="button" class="btn waves-effect waves-light btn-info btn-block" data-toggle="modal" data-target="#confirmation">Kemaskini Profil Rumah Ibadat</button>
                    </div>
                    <div class="col-md-2"></div>
                  </div>

                  {{-- Hidden Gap - Just Ignore --}}
                  <div class="alert alert-white" style="text-align: center;"></div>
                  {{-- <div style="padding: 25px;"></div> --}}
              </div>

              <!-- Modal Confirmation -->
              <div class="modal fade" id="confirmation" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbspPengesahan!</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Anda pasti mahu mengemaskini profil rumah ibadat?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-success">Kemaskini Profil Rumah Ibadat</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
      </div>
  </div>

</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<script>
  function onlyNumberKey(evt) {

        // Only ASCII charactar in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
  }
</script>
@endsection