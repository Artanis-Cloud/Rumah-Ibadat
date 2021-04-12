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
            <form method="POST" action="{{ route('users.rumah-ibadat.kemaskini.update') }}">
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
                          <input class="form-control text-uppercase @error('id_rumah_ibadat') is-invalid @else border-dark @enderror" id="id_rumah_ibadat" name="id_rumah_ibadat" type="text" value="{{ $rumah_ibadat->getRumahIbadatID() }}" disabled>
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
                          <select class="custom-select mr-sm-2 @error('category') is-invalid @else border-dark @enderror" id="category" name="category" value="{{ $rumah_ibadat->category }}">
                              <option selected disabled hidden>PILIH KATEGORI RUMAH IBADAT</option>
                              <option value="BUDDHA"    {{ $rumah_ibadat->category == "BUDDHA"    ? 'selected' : '' }} >BUDDHA</option>
                              <option value="HINDU"     {{ $rumah_ibadat->category == "HINDU"     ? 'selected' : '' }} >HINDU</option>
                              <option value="KRISTIAN"  {{ $rumah_ibadat->category == "KRISTIAN"  ? 'selected' : '' }} >KRISTIAN</option>
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
                          <input class="form-control text-uppercase @error('name') is-invalid @else border-dark @enderror" id="name" name="name" type="text" value="{{ $rumah_ibadat->name }}" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);">
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
                          <input class="form-control text-uppercase @error('ros_number') is-invalid @else border-dark @enderror" id="ros_number" name="ros_number" type="text" value="{{ $rumah_ibadat->ros_number }}">
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
                          <input class="form-control text-uppercase @error('office_phone') is-invalid @else border-dark @enderror" id="office_phone" name="office_phone" type="text" value="{{ $rumah_ibadat->office_phone }}" placeholder="Contoh: 0312345678" minlength="10" maxlength="11" onkeypress="return onlyNumberKey(event)">
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
                          <textarea class="form-control text-uppercase @error('office_phone') is-invalid @else border-dark @enderror" id="address" name="address" rows="2" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);">{{ $rumah_ibadat->address }}</textarea>
                      </div>
                    </div>
                    <div class="col-md-2"></div>
                  </div>

                  <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md">
                      <label>Poskod</label>
                      <div class="input-group mb-3">
                          <input class="form-control text-uppercase @error('postcode') is-invalid @else border-dark @enderror" id="postcode" name="postcode" type="text" value="{{ $rumah_ibadat->postcode }}" minlength="5" maxlength="5" onkeypress="return onlyNumberKey(event)">
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
                              <option value="GOMBAK"          {{ $rumah_ibadat->district == "GOMBAK"          ? 'selected' : '' }} >GOMBAK</option>
                              <option value="HULU LANGAT"     {{ $rumah_ibadat->district == "HULU LANGAT"     ? 'selected' : '' }} >HULU LANGAT</option>
                              <option value="HULU SELANGOR"   {{ $rumah_ibadat->district == "HULU SELANGOR"   ? 'selected' : '' }} >HULU SELANGOR</option>
                              <option value="KLANG"           {{ $rumah_ibadat->district == "KLANG"           ? 'selected' : '' }} >KLANG</option>
                              <option value="KUALA SELANGOR"  {{ $rumah_ibadat->district == "KUALA SELANGOR"  ? 'selected' : '' }} >KUALA SELANGOR</option>
                              <option value="PETALING"        {{ $rumah_ibadat->district == "PETALING"        ? 'selected' : '' }} >PETALING</option>
                              <option value="SABAK BERNAM"    {{ $rumah_ibadat->district == "SABAK BERNAM"    ? 'selected' : '' }} >SABAK BERNAM</option>
                              <option value="SEPANG"          {{ $rumah_ibadat->district == "SEPANG"          ? 'selected' : '' }} >SEPANG</option>
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
                              <option value="JOHOR"           {{ $rumah_ibadat->state == "JOHOR"            ? 'selected' : '' }}>JOHOR</option>
                              <option value="KEDAH"           {{ $rumah_ibadat->state == "KEDAH"            ? 'selected' : '' }}>KEDAH</option>
                              <option value="KELANTAN"        {{ $rumah_ibadat->state == "KELANTAN"         ? 'selected' : '' }}>KELANTAN</option>
                              <option value="MELAKA"          {{ $rumah_ibadat->state == "MELAKA"           ? 'selected' : '' }}>MELAKA</option>
                              <option value="NEGERI SEMBILAN" {{ $rumah_ibadat->state == "NEGERI SEMBILAN"  ? 'selected' : '' }}>NEGERI SEMBILAN</option>
                              <option value="PAHANG"          {{ $rumah_ibadat->state == "PAHANG"           ? 'selected' : '' }}>PAHANG</option>
                              <option value="PULAU PINANG"    {{ $rumah_ibadat->state == "PULAU PINANG"     ? 'selected' : '' }}>PULAU PINANG</option>
                              <option value="PERAK"           {{ $rumah_ibadat->state == "PERAK"            ? 'selected' : '' }}>PERAK</option>
                              <option value="PERLIS"          {{ $rumah_ibadat->state == "PERLIS"           ? 'selected' : '' }}>PERLIS</option>
                              <option value="SABAH"           {{ $rumah_ibadat->state == "SABAH"            ? 'selected' : '' }}>SABAH</option>
                              <option value="SARAWAK"         {{ $rumah_ibadat->state == "SARAWAK"          ? 'selected' : '' }}>SARAWAK</option>
                              <option value="SELANGOR"        {{ $rumah_ibadat->state == "SELANGOR"         ? 'selected' : '' }}>SELANGOR</option>
                              <option value="TERENGGANU"      {{ $rumah_ibadat->state == "TERENGGANU"       ? 'selected' : '' }}>TERENGGANU</option>
                              <option value="WP KUALA LUMPUR" {{ $rumah_ibadat->state == "WP KUALA LUMPUR"  ? 'selected' : '' }}>WP KUALA LUMPUR</option>
                              <option value="WP PUTRAJAYA"    {{ $rumah_ibadat->state == "WP PUTRAJAYA"     ? 'selected' : '' }}>WP PUTRAJAYA</option>
                              <option value="WP LABUAN"       {{ $rumah_ibadat->state == "WP LABUAN"        ? 'selected' : '' }}>WP LABUAN</option>
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
                          <select class="custom-select mr-sm-2 @error('bank_name') is-invalid @else border-dark @enderror" id="bank_name" name="bank_name" value="{{ $rumah_ibadat->bank_name }}">
                              <option selected disabled hidden>PILIH BANK</option>
                              <option value="AFFIN BANK"                    {{ $rumah_ibadat->bank_name == "AFFIN BANK"                     ? 'selected' : '' }}>AFFIN BANK</option>
                              <option value="AGROBANK"                      {{ $rumah_ibadat->bank_name == "AGROBANK"                       ? 'selected' : '' }}>AGROBANK</option>
                              <option value="ALLIANCE BANK MALAYSIA"        {{ $rumah_ibadat->bank_name == "ALLIANCE BANK MALAYSIA"         ? 'selected' : '' }}>ALLIANCE BANK MALAYSIA</option>
                              <option value="AMBANK"                        {{ $rumah_ibadat->bank_name == "AMBANK"                         ? 'selected' : '' }}>AMBANK</option>
                              <option value="BANK ISLAM MALAYSIA"           {{ $rumah_ibadat->bank_name == "BANK ISLAM MALAYSIA"            ? 'selected' : '' }}>BANK ISLAM MALAYSIA</option>
                              <option value="BANK MUAMALAT MALAYSIA BERHAD" {{ $rumah_ibadat->bank_name == "BANK MUAMALAT MALAYSIA BERHAD"  ? 'selected' : '' }}>BANK MUAMALAT MALAYSIA BERHAD</option>
                              <option value="BANK RAKYAT"                   {{ $rumah_ibadat->bank_name == "BANK RAKYAT"                    ? 'selected' : '' }}>BANK RAKYAT</option>
                              <option value="BANK SIMPANAN NASIONAL (BSN)"  {{ $rumah_ibadat->bank_name == "BANK SIMPANAN NASIONAL (BSN)"   ? 'selected' : '' }}>BANK SIMPANAN NASIONAL (BSN)</option>
                              <option value="CIMB BANK"                     {{ $rumah_ibadat->bank_name == "CIMB BANK"                      ? 'selected' : '' }}>CIMB BANK</option>
                              <option value="CITIBANK"                      {{ $rumah_ibadat->bank_name == "CITIBANK"                       ? 'selected' : '' }}>CITIBANK</option>
                              <option value="HSBC BANK"                     {{ $rumah_ibadat->bank_name == "HSBC BANK"                      ? 'selected' : '' }}>HSBC BANK</option>
                              <option value="HONG LEONG BANK"               {{ $rumah_ibadat->bank_name == "HONG LEONG BANK"                ? 'selected' : '' }}>HONG LEONG BANK</option>
                              <option value="MAYBANK"                       {{ $rumah_ibadat->bank_name == "MAYBANK"                        ? 'selected' : '' }}>MAYBANK</option>
                              <option value="PUBLIC BANK"                   {{ $rumah_ibadat->bank_name == "PUBLIC BANK"                    ? 'selected' : '' }}>PUBLIC BANK</option>
                              <option value="RHB BANK"                      {{ $rumah_ibadat->bank_name == "RHB BANK"                       ? 'selected' : '' }}>RHB BANK</option>
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
                          <input class="form-control text-uppercase @error('bank_account') is-invalid @else border-dark @enderror" id="bank_account" name="bank_account" type="text" value="{{ $rumah_ibadat->bank_account }}" onkeypress="return onlyNumberKey(event)">
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