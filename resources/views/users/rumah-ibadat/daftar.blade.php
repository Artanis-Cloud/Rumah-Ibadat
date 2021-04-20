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
            <form method="POST" action="{{ route('users.rumah-ibadat.daftar.tambah') }}">
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
                      <div class="form-group">
                          <label class="mr-sm-2 required" for="inlineFormCustomSelect">Kategori Rumah Ibadat</label>
                          <select class="custom-select mr-sm-2 @error('category') is-invalid @else border-dark @enderror" id="category" name="category" value="{{ old('category') }}">
                              <option selected disabled hidden>PILIH KATEGORI RUMAH IBADAT</option>
                              <option value="TOKONG"    {{ old('category') == "TOKONG"  ? 'selected' : '' }} >TOKONG (BUDDHA & TAO)</option>
                              <option value="KUIL"      {{ old('category') == "KUIL"    ? 'selected' : '' }} >KUIL (HINDU & GURDWARA)</option>
                              <option value="GEREJA"    {{ old('category') == "GEREJA"  ? 'selected' : '' }} >GEREJA (KRISTIAN)</option>
                          </select>
                          @error('category')
                          <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md">
                      <label class="required">Nama Rumah Ibadat</label>
                      <div class="form-group mb-3">
                          <input class="form-control text-uppercase @error('name') is-invalid @else border-dark @enderror" id="name" name="name" type="text" value="{{ old('name') }}" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);">
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
                    <div class="col-md-4">
                      <label>Nombor Telefon Pejabat</label>
                      <div class="form-group mb-3">
                          <input class="form-control text-uppercase @error('office_phone') is-invalid @else border-dark @enderror" id="office_phone" name="office_phone" type="text" value="{{ old('office_phone') }}" minlength="10" maxlength="11" onkeypress="return onlyNumberKey(event)">
                          <small class="form-text text-muted">Contoh: 0312345678</small>
                          @error('office_phone')
                          <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-2"></div>
                  </div>

                  <hr>

                  <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                      <div class="form-group">
                          <label class="mr-sm-2 required" for="inlineFormCustomSelect">Jenis Pendaftaran</label>
                          <select class="custom-select mr-sm-2 @error('registration_type') is-invalid @else border-dark @enderror" id="registration_type" name="registration_type" value="{{ old('registration_type') }}" onchange="changeRegistration()">
                              <option selected disabled hidden>PILIH JENIS PENDAFTARAN</option>
                              <option value="INDUK"    {{ old('registration_type') == "INDUK"     ? 'selected' : '' }} >INDUK</option>
                              <option value="CAWANGAN" {{ old('registration_type') == "CAWANGAN"  ? 'selected' : '' }} >CAWANGAN</option>
                          </select>
                          @error('category')
                          <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-4" id="main_div">
                      <label class="required">Nombor Sijil Pendaftaran</label>
                      <div class="form-group mb-3">
                          <input class="form-control text-uppercase @error('registration_number') is-invalid @else border-dark @enderror" id="registration_number" name="registration_number" type="text" value="{{ old('registration_number') }}">
                          @error('registration_number')
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
                    <div class="col-md-4" id="branch_div_1" style="display: none;">
                      <label class="required">Nombor Pendaftaran Induk</label>
                      <div class="form-group mb-3">
                          <input class="form-control text-uppercase @error('registration_number_main') is-invalid @else border-dark @enderror" id="registration_number_main" name="registration_number_main" type="text" value="{{ old('registration_number_main') }}">
                          @error('registration_number_main')
                          <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-4" id="branch_div_2" style="display: none;">
                      <label class="required">Nombor Pendaftaran Cawangan</label>
                      <div class="form-group mb-3">
                          <input class="form-control text-uppercase @error('registration_number_branch') is-invalid @else border-dark @enderror" id="registration_number_branch" name="registration_number_branch" type="text" value="{{ old('registration_number_branch') }}">
                          @error('registration_number_branch')
                          <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-2"></div>
                  </div>

                  <hr>

                  <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md">
                      <label class="required">Alamat Rumah Ibadat</label>
                      <div class="form-group">
                          <textarea class="form-control text-uppercase @error('address') is-invalid @else border-dark @enderror" id="address" name="address" rows="2" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);">{{ old('address') }}</textarea>
                          @error('address')
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
                      <label class="required">Poskod</label>
                      <div class="form-group mb-3">
                          <input class="form-control text-uppercase @error('postcode') is-invalid @else border-dark @enderror" id="postcode" name="postcode" type="text" value="{{ old('postcode') }}" minlength="5" maxlength="5" onkeypress="return onlyNumberKey(event)">
                          @error('ros_number')
                          <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md">
                      <div class="form-group">
                          <label class="mr-sm-2 required" for="inlineFormCustomSelect">Daerah</label>
                          <select class="custom-select mr-sm-2 @error('district') is-invalid @else border-dark @enderror" id="district" name="district" value="{{ old('district') }}">
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
                          <label class="mr-sm-2" for="inlineFormCustomSelect">Negeri</label>
                          <input class="form-control text-uppercase @error('state') is-invalid @else border-dark @enderror" id="state" name="state" type="text" value="SELANGOR" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" readonly>
                          {{-- <select class="custom-select mr-sm-2 @error('state') is-invalid @else border-dark @enderror" id="state" name="state" value="{{ old('state') }}">
                              <option selected disabled hidden>PILIH NEGERI</option>
                              <option value="JOHOR"           {{ old('state') == "JOHOR"            ? 'selected' : '' }}>JOHOR</option>
                              <option value="KEDAH"           {{ old('state') == "KEDAH"            ? 'selected' : '' }}>KEDAH</option>
                              <option value="KELANTAN"        {{ old('state') == "KELANTAN"         ? 'selected' : '' }}>KELANTAN</option>
                              <option value="MELAKA"          {{ old('state') == "MELAKA"           ? 'selected' : '' }}>MELAKA</option>
                              <option value="NEGERI SEMBILAN" {{ old('state') == "NEGERI SEMBILAN"  ? 'selected' : '' }}>NEGERI SEMBILAN</option>
                              <option value="PAHANG"          {{ old('state') == "PAHANG"           ? 'selected' : '' }}>PAHANG</option>
                              <option value="PULAU PINANG"    {{ old('state') == "PULAU PINANG"     ? 'selected' : '' }}>PULAU PINANG</option>
                              <option value="PERAK"           {{ old('state') == "PERAK"            ? 'selected' : '' }}>PERAK</option>
                              <option value="PERLIS"          {{ old('state') == "PERLIS"           ? 'selected' : '' }}>PERLIS</option>
                              <option value="SABAH"           {{ old('state') == "SABAH"            ? 'selected' : '' }}>SABAH</option>
                              <option value="SARAWAK"         {{ old('state') == "SARAWAK"          ? 'selected' : '' }}>SARAWAK</option>
                              <option value="SELANGOR"        {{ old('state') == "SELANGOR"         ? 'selected' : '' }}>SELANGOR</option>
                              <option value="TERENGGANU"      {{ old('state') == "TERENGGANU"       ? 'selected' : '' }}>TERENGGANU</option>
                              <option value="WP KUALA LUMPUR" {{ old('state') == "WP KUALA LUMPUR"  ? 'selected' : '' }}>WP KUALA LUMPUR</option>
                              <option value="WP PUTRAJAYA"    {{ old('state') == "WP PUTRAJAYA"     ? 'selected' : '' }}>WP PUTRAJAYA</option>
                              <option value="WP LABUAN"       {{ old('state') == "WP LABUAN"        ? 'selected' : '' }}>WP LABUAN</option>
                          </select> --}}
                          @error('state')
                          <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-2"></div>
                  </div>

                  <hr>

                  <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md">
                      <div class="form-group">
                          <label class="mr-sm-2 required" for="inlineFormCustomSelect">Nama Bank</label>
                          <select class="custom-select mr-sm-2 @error('bank_name') is-invalid @else border-dark @enderror" id="bank_name" name="bank_name" value="{{ old('bank_name') }}">
                              <option selected disabled hidden>PILIH BANK</option>
                              <option value="AFFIN BANK"                    {{ old('bank_name') == "AFFIN BANK"                     ? 'selected' : '' }}>AFFIN BANK</option>
                              <option value="AGROBANK"                      {{ old('bank_name') == "AGROBANK"                       ? 'selected' : '' }}>AGROBANK</option>
                              <option value="ALLIANCE BANK MALAYSIA"        {{ old('bank_name') == "ALLIANCE BANK MALAYSIA"         ? 'selected' : '' }}>ALLIANCE BANK MALAYSIA</option>
                              <option value="AMBANK"                        {{ old('bank_name') == "AMBANK"                         ? 'selected' : '' }}>AMBANK</option>
                              <option value="BANK ISLAM MALAYSIA"           {{ old('bank_name') == "BANK ISLAM MALAYSIA"            ? 'selected' : '' }}>BANK ISLAM MALAYSIA</option>
                              <option value="BANK MUAMALAT MALAYSIA BERHAD" {{ old('bank_name') == "BANK MUAMALAT MALAYSIA BERHAD"  ? 'selected' : '' }}>BANK MUAMALAT MALAYSIA BERHAD</option>
                              <option value="BANK RAKYAT"                   {{ old('bank_name') == "BANK RAKYAT"                    ? 'selected' : '' }}>BANK RAKYAT</option>
                              <option value="BANK SIMPANAN NASIONAL (BSN)"  {{ old('bank_name') == "BANK SIMPANAN NASIONAL (BSN)"   ? 'selected' : '' }}>BANK SIMPANAN NASIONAL (BSN)</option>
                              <option value="CIMB BANK"                     {{ old('bank_name') == "CIMB BANK"                      ? 'selected' : '' }}>CIMB BANK</option>
                              <option value="CITIBANK"                      {{ old('bank_name') == "CITIBANK"                       ? 'selected' : '' }}>CITIBANK</option>
                              <option value="HSBC BANK"                     {{ old('bank_name') == "HSBC BANK"                      ? 'selected' : '' }}>HSBC BANK</option>
                              <option value="HONG LEONG BANK"               {{ old('bank_name') == "HONG LEONG BANK"                ? 'selected' : '' }}>HONG LEONG BANK</option>
                              <option value="MAYBANK"                       {{ old('bank_name') == "MAYBANK"                        ? 'selected' : '' }}>MAYBANK</option>
                              <option value="PUBLIC BANK"                   {{ old('bank_name') == "PUBLIC BANK"                    ? 'selected' : '' }}>PUBLIC BANK</option>
                              <option value="RHB BANK"                      {{ old('bank_name') == "RHB BANK"                       ? 'selected' : '' }}>RHB BANK</option>
                          </select>
                          @error('bank_name')
                          <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md">
                      <label class="required">Nombor Akaun</label>
                      <div class="form-group mb-3">
                          <input class="form-control text-uppercase @error('bank_account') is-invalid @else border-dark @enderror" id="bank_account" name="bank_account" type="text" value="{{ old('bank_account') }}" onkeypress="return onlyNumberKey(event)">
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
                      <button type="button" class="btn waves-effect waves-light btn-info btn-block" data-toggle="modal" data-target="#confirmation">Daftar Rumah Ibadat</button>
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
                      Anda pasti maklumat ini tepat?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-success">Daftar Rumah Ibadat</button>
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
  //run function when page reload
  window.addEventListener('load', changeRegistration);

  //function change input on registration type
  function changeRegistration(){
    //fetch data from dropdown
    var registration_type = $('#registration_type').val();

    //display or hide the input
    if(registration_type == 'INDUK'){
      document.getElementById('main_div').style.display = "block";
      document.getElementById('branch_div_1').style.display = "none";
      document.getElementById('branch_div_2').style.display = "none";

      //change input condition
      document.getElementById("registration_number").disabled = false;
      document.getElementById("registration_number_main").disabled = true;
      document.getElementById("registration_number_branch").disabled = true;

      //clear input condition
      document.getElementById("registration_number").value = "";
      document.getElementById("registration_number_main").value = "";
      document.getElementById("registration_number_branch").value = "";
    }else if(registration_type == 'CAWANGAN'){
      document.getElementById('main_div').style.display = "none";
      document.getElementById('branch_div_1').style.display = "block";
      document.getElementById('branch_div_2').style.display = "block";

      //change input condition
      document.getElementById("registration_number").disabled = true;
      document.getElementById("registration_number_main").disabled = false;
      document.getElementById("registration_number_branch").disabled = false;

      //clear input condition
      document.getElementById("registration_number").value = "";
      document.getElementById("registration_number_main").value = "";
      document.getElementById("registration_number_branch").value = "";
    }
  }

  //function insert number only
  function onlyNumberKey(evt) {

        // Only ASCII charactar in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
  }
</script>
@endsection