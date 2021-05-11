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

                  <div class="row"> 
                    <div class="col-md-2"></div>
                    <div class="col-md">
                      <div class="form-group">
                          <label class="mr-sm-2 required" for="inlineFormCustomSelect">Kategori Rumah Ibadat</label>
                          <select class="custom-select mr-sm-2 @error('category') is-invalid @else border-dark @enderror" id="category" name="category" value="{{ old('category') }}">
                              <option selected disabled hidden>PILIH KATEGORI RUMAH IBADAT</option>
                              <option value="TOKONG" {{ $rumah_ibadat->category == "TOKONG"    ? 'selected' : '' }} >TOKONG (BUDDHA & TAO)</option>
                              <option value="KUIL_H" {{ $rumah_ibadat->category == "KUIL_H"    ? 'selected' : '' }} >KUIL (HINDU)</option>
                              <option value="KUIL_G" {{ $rumah_ibadat->category == "KUIL_G"    ? 'selected' : '' }} >KUIL (GURDWARA)</option>
                              <option value="GEREJA" {{ $rumah_ibadat->category == "GEREJA"    ? 'selected' : '' }} >GEREJA (KRISTIAN)</option>
                          </select>
                          @error('category')
                          <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md">
                      <label class="required">Nama Persatuan Rumah Ibadat</label>
                      <div class="form-group mb-3">
                          <input class="form-control text-uppercase @error('name_association') is-invalid @else border-dark @enderror" id="name_association" name="name_association" type="text" value="{{ $rumah_ibadat->name_association }}" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);">
                          @error('name_association')
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
                          <input class="form-control text-uppercase @error('office_phone') is-invalid @else border-dark @enderror" id="office_phone" name="office_phone" type="text" value="{{ $rumah_ibadat->office_phone }}" maxlength="11" onkeypress="return onlyNumberKey(event)">
                          <small class="form-text text-muted">Contoh: 0312345678</small>
                          @error('office_phone')
                          <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md">
                      <label class="required">Nama Persatuan Rumah Ibadat Mengikut Bank</label>
                      <div class="form-group mb-3">
                          <input class="form-control text-uppercase @error('name_association_bank') is-invalid @else border-dark @enderror" id="name_association_bank" name="name_association_bank" type="text" value="{{ $rumah_ibadat->name_association_bank }}" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);">
                          @error('name_association_bank')
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
                      <hr>
                    </div>
                    <div class="col-md-2"></div>
                  </div>

                  <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md">
                      <div class="form-group">
                          <label class="mr-sm-2 required" for="inlineFormCustomSelect">Jenis Pendaftaran</label>
                          <select class="custom-select mr-sm-2 @error('registration_type') is-invalid @else border-dark @enderror" id="registration_type" name="registration_type" value="{{ $rumah_ibadat->registration_type }}" onchange="changeRegistration()" disabled>
                              <option selected disabled hidden>PILIH JENIS PENDAFTARAN</option>
                              <option value="SENDIRI"    {{ $rumah_ibadat->registration_type == "SENDIRI"     ? 'selected' : '' }} >MEMPUNYAI PENDAFTARAN SENDIRI</option>
                              <option value="INDUK"      {{ $rumah_ibadat->registration_type == "INDUK"       ? 'selected' : '' }} >MEMPUNYAI PENDAFTARAN DI BAWAH PERSATUAN INDUK/CAWANGAN</option>
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
                    <div class="col-md" id="main_div">
                      <label class="required">Nombor Sijil Pendaftaran / Nombor ROS</label>
                      <div class="form-group mb-3">
                          <input class="form-control  @error('registration_number') is-invalid @else border-dark @enderror" id="registration_number_single" name="registration_number_single" type="text" value="{{ $rumah_ibadat->registration_number }}" onkeypress="return event.charCode != 32" oninput="registration_number.value = registration_number_single.value">
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
                    <div class="col-md" id="branch_div_0" style="display: none;">
                      <label class="required">Nama Persatuan Rumah Ibadat Induk</label>
                      <div class="form-group mb-3">
                          <input class="form-control text-uppercase @error('name_association_main') is-invalid @else border-dark @enderror" id="name_association_main" name="name_association_main" type="text" value="{{ $rumah_ibadat->name_association_main }}" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);">
                          @error('name_association_main')
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
                      <label class="required" id="registration_number_label">Nombor Pendaftaran Induk</label>
                      <div class="form-group mb-3">
                          <input class="form-control text-uppercase @error('registration_number') is-invalid @else border-dark @enderror" id="registration_number_main" name="registration_number_main" type="text" value="{{ $rumah_ibadat->registration_type == "INDUK" ? explode("%", $rumah_ibadat->registration_number, 2)[0] : '' }}" onkeypress="return event.charCode != 32" oninput="registration_number.value = registration_number_main.value + '%' + registration_number_branch.value">
                          @error('registration_number')
                          <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-4" id="branch_div_2" style="display: none;">
                      <label class="required">Nombor Pendaftaran Cawangan</label>
                      <div class="form-group mb-3">
                          <input class="form-control text-uppercase @error('registration_number') is-invalid @else border-dark @enderror" id="registration_number_branch" name="registration_number_branch" type="text" value="{{ $rumah_ibadat->registration_type == "INDUK" ? explode("%", $rumah_ibadat->registration_number, 2)[1] : '' }}" onkeypress="return event.charCode != 32" oninput="registration_number.value = registration_number_main.value + '%' + registration_number_branch.value">
                          @error('registration_number')
                          <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-2"></div>
                  </div>

                  {{-- <div class="row"> --}}
                  <div class="row" style="display: none;">
                    <div class="col-md-2"></div>
                    <div class="col-md">
                      <label class="required">Nombor Pendaftaran Checker</label>
                      <div class="form-group mb-3">
                          <input class="form-control text-uppercase @error('registration_number') is-invalid @else border-dark @enderror" id="registration_number" name="registration_number" type="text" value="{{ $rumah_ibadat->registration_number }}" readonly>
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
                    <div class="col-md">
                      <hr>
                    </div>
                    <div class="col-md-2"></div>
                  </div>

                  <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md">
                      <label class="required">Alamat Rumah Ibadat</label>
                      <div class="form-group">
                          <textarea class="form-control text-uppercase @error('address') is-invalid @else border-dark @enderror" id="address" name="address" rows="2" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);">{{ $rumah_ibadat->address }}</textarea>
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
                          <input class="form-control text-uppercase @error('postcode') is-invalid @else border-dark @enderror" id="postcode" name="postcode" type="text" value="{{ $rumah_ibadat->postcode }}" minlength="5" maxlength="5" onkeypress="return onlyNumberKey(event)">
                          @error('postcode')
                          <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md">
                      <div class="form-group">
                          <label class="mr-sm-2 required" for="inlineFormCustomSelect">Daerah</label>
                          <select class="custom-select mr-sm-2 @error('district') is-invalid @else border-dark @enderror" id="district" name="district" value="{{ $rumah_ibadat->district }}">
                              <option selected disabled hidden>PILIH DAERAH</option>
                              <option value="GOMBAK"          {{ $rumah_ibadat->district == "GOMBAK"          ? 'selected' : '' }} >GOMBAK</option>
                              <option value="HULU LANGAT"     {{ $rumah_ibadat->district == "HULU LANGAT"     ? 'selected' : '' }} >HULU LANGAT</option>
                              <option value="HULU SELANGOR"   {{ $rumah_ibadat->district == "HULU SELANGOR"   ? 'selected' : '' }} >HULU SELANGOR</option>
                              <option value="KLANG"           {{ $rumah_ibadat->district == "KLANG"           ? 'selected' : '' }} >KLANG</option>
                              <option value="KUALA SELANGOR"  {{ $rumah_ibadat->district == "KUALA SELANGOR"  ? 'selected' : '' }} >KUALA SELANGOR</option>
                              <option value="KUALA LANGAT"    {{ $rumah_ibadat->district == "KUALA LANGAT"    ? 'selected' : '' }} >KUALA LANGAT</option>
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
                          <label class="mr-sm-2" for="inlineFormCustomSelect">Negeri</label>
                          <input class="form-control text-uppercase @error('state') is-invalid @else border-dark @enderror" id="state" name="state" type="text" value="SELANGOR" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" readonly>
                          @error('state')
                          <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md">
                      <div class="form-group">
                          <label class="mr-sm-2 required" for="inlineFormCustomSelect">Kawasan PBT</label>
                          <select class="custom-select mr-sm-2 @error('pbt_area') is-invalid @else border-dark @enderror" id="pbt_area" name="pbt_area" value="{{ $rumah_ibadat->pbt_area }}">
                              <option selected disabled hidden>PILIH DAERAH</option>
                              <option value="GOMBAK"          {{ $rumah_ibadat->pbt_area == "GOMBAK"          ? 'selected' : '' }} >KAWASAN GOMBAK</option>
                              <option value="HULU LANGAT"     {{ $rumah_ibadat->pbt_area == "HULU LANGAT"     ? 'selected' : '' }} >KAWASAN HULU LANGAT</option>
                              <option value="HULU SELANGOR"   {{ $rumah_ibadat->pbt_area == "HULU SELANGOR"   ? 'selected' : '' }} >KAWASAN HULU SELANGOR</option>
                              <option value="KLANG"           {{ $rumah_ibadat->pbt_area == "KLANG"           ? 'selected' : '' }} >KAWASAN KLANG</option>
                              <option value="KUALA SELANGOR"  {{ $rumah_ibadat->pbt_area == "KUALA SELANGOR"  ? 'selected' : '' }} >KAWASAN KUALA SELANGOR</option>
                              <option value="KUALA LANGAT"    {{ $rumah_ibadat->pbt_area == "KUALA LANGAT"    ? 'selected' : '' }} >KAWASAN KUALA LANGAT</option>
                              <option value="PETALING"        {{ $rumah_ibadat->pbt_area == "PETALING"        ? 'selected' : '' }} >KAWASAN PETALING</option>
                              <option value="SABAK BERNAM"    {{ $rumah_ibadat->pbt_area == "SABAK BERNAM"    ? 'selected' : '' }} >KAWASAN SABAK BERNAM</option>
                              <option value="SEPANG"          {{ $rumah_ibadat->pbt_area == "SEPANG"          ? 'selected' : '' }} >KAWASAN SEPANG</option>
                          </select>
                          @error('pbt_area')
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
                      <hr>
                    </div>
                    <div class="col-md-2"></div>
                  </div>

                  <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md">
                      <div class="form-group">
                          <label class="mr-sm-2 required" for="inlineFormCustomSelect">Nama Bank</label>
                          <select class="custom-select mr-sm-2 @error('bank_name') is-invalid @else border-dark @enderror" id="bank_name" name="bank_name" value="{{ $rumah_ibadat->bank_name }}">
                              <option selected disabled hidden>PILIH BANK</option>
                              <option value="AFFIN BANK"                            {{ $rumah_ibadat->bank_name == "AFFIN BANK"                             ? 'selected' : '' }}>AFFIN BANK</option>
                              <option value="AGROBANK"                              {{ $rumah_ibadat->bank_name == "AGROBANK"                               ? 'selected' : '' }}>AGROBANK</option>
                              <option value="AL-RAJHI BANK"                         {{ $rumah_ibadat->bank_name == "AL-RAJHI BANK"                          ? 'selected' : '' }}>AL-RAJHI BANK</option>
                              <option value="ALLIANCE BANK MALAYSIA"                {{ $rumah_ibadat->bank_name == "ALLIANCE BANK MALAYSIA"                 ? 'selected' : '' }}>ALLIANCE BANK MALAYSIA</option>
                              <option value="AMBANK"                                {{ $rumah_ibadat->bank_name == "AMBANK"                                 ? 'selected' : '' }}>AMBANK</option>
                              <option value="BANK ISLAM MALAYSIA"                   {{ $rumah_ibadat->bank_name == "BANK ISLAM MALAYSIA"                    ? 'selected' : '' }}>BANK ISLAM MALAYSIA</option>
                              <option value="BANK MUAMALAT MALAYSIA BERHAD"         {{ $rumah_ibadat->bank_name == "BANK MUAMALAT MALAYSIA BERHAD"          ? 'selected' : '' }}>BANK MUAMALAT MALAYSIA BERHAD</option>
                              <option value="BANK RAKYAT"                           {{ $rumah_ibadat->bank_name == "BANK RAKYAT"                            ? 'selected' : '' }}>BANK RAKYAT</option>
                              <option value="BANK SIMPANAN NASIONAL (BSN)"          {{ $rumah_ibadat->bank_name == "BANK SIMPANAN NASIONAL (BSN)"           ? 'selected' : '' }}>BANK SIMPANAN NASIONAL (BSN)</option>
                              <option value="BANK OF AMERICA"                       {{ $rumah_ibadat->bank_name == "BANK OF AMERICA"                        ? 'selected' : '' }}>BANK OF AMERICA</option>
                              <option value="BANK OF CHINE (MALAYSIA) BERHAD"       {{ $rumah_ibadat->bank_name == "BANK OF CHINE (MALAYSIA) BERHAD"        ? 'selected' : '' }}>BANK OF CHINE (MALAYSIA) BERHAD</option>
                              <option value="BNP PARIBAS MALAYSIA"                  {{ $rumah_ibadat->bank_name == "BNP PARIBAS MALAYSIA"                   ? 'selected' : '' }}>BNP PARIBAS MALAYSIA</option>
                              <option value="CHINA CONST BK (M) BERHAD"             {{ $rumah_ibadat->bank_name == "CHINA CONST BK (M) BERHAD"              ? 'selected' : '' }}>CHINA CONST BK (M) BERHAD</option>
                              <option value="CIMB BANK"                             {{ $rumah_ibadat->bank_name == "CIMB BANK"                              ? 'selected' : '' }}>CIMB BANK</option>
                              <option value="CITIBANK"                              {{ $rumah_ibadat->bank_name == "CITIBANK"                               ? 'selected' : '' }}>CITIBANK</option>
                              <option value="CO-OP BANK PERTAMA"                    {{ $rumah_ibadat->bank_name == "CO-OP BANK PERTAMA"                     ? 'selected' : '' }}>CO-OP BANK PERTAMA</option>
                              <option value="DEUTSCHE BANK (MALAYSIA) BERHAD"       {{ $rumah_ibadat->bank_name == "DEUTSCHE BANK (MALAYSIA) BERHAD"        ? 'selected' : '' }}>DEUTSCHE BANK (MALAYSIA) BERHAD</option>
                              <option value="HSBC BANK"                             {{ $rumah_ibadat->bank_name == "HSBC BANK"                              ? 'selected' : '' }}>HSBC BANK</option>
                              <option value="HONG LEONG BANK"                       {{ $rumah_ibadat->bank_name == "HONG LEONG BANK"                        ? 'selected' : '' }}>HONG LEONG BANK</option>
                              <option value="INDUSTRIAL & COMMERCIAL BANK OF CHINA" {{ $rumah_ibadat->bank_name == "INDUSTRIAL & COMMERCIAL BANK OF CHINA"  ? 'selected' : '' }}>INDUSTRIAL & COMMERCIAL BANK OF CHINA</option>
                              <option value="J.P. MORGAN CHASE BANK BERHAD"         {{ $rumah_ibadat->bank_name == "J.P. MORGAN CHASE BANK BERHAD"          ? 'selected' : '' }}>J.P. MORGAN CHASE BANK BERHAD</option>
                              <option value="KUWAIT FINANCE HOUSE (MALAYSIA) BHD"   {{ $rumah_ibadat->bank_name == "KUWAIT FINANCE HOUSE (MALAYSIA) BHD"    ? 'selected' : '' }}>KUWAIT FINANCE HOUSE (MALAYSIA) BHD</option>
                              <option value="MAYBANK"                               {{ $rumah_ibadat->bank_name == "MAYBANK"                                ? 'selected' : '' }}>MAYBANK</option>
                              <option value="MBSB BANK BERHAD"                      {{ $rumah_ibadat->bank_name == "MBSB BANK BERHAD"                       ? 'selected' : '' }}>MBSB BANK BERHAD</option>
                              <option value="MIZUHO BANK (MALAYSIA) BERHAD"         {{ $rumah_ibadat->bank_name == "MIZUHO BANK (MALAYSIA) BERHAD"          ? 'selected' : '' }}>MIZUHO BANK (MALAYSIA) BERHAD</option>
                              <option value="MUFG BANK (MALAYSIA) BERHAD"           {{ $rumah_ibadat->bank_name == "MUFG BANK (MALAYSIA) BERHAD"            ? 'selected' : '' }}>MUFG BANK (MALAYSIA) BERHAD</option>
                              <option value="OCBC MALAYSIA BANK"                    {{ $rumah_ibadat->bank_name == "OCBC MALAYSIA BANK"                     ? 'selected' : '' }}>OCBC MALAYSIA BANK</option>
                              <option value="PUBLIC BANK"                           {{ $rumah_ibadat->bank_name == "PUBLIC BANK"                            ? 'selected' : '' }}>PUBLIC BANK</option>
                              <option value="RHB BANK"                              {{ $rumah_ibadat->bank_name == "RHB BANK"                               ? 'selected' : '' }}>RHB BANK</option>
                              <option value="STANDARD CHARTERED BANK MALAYSIA"      {{ $rumah_ibadat->bank_name == "STANDARD CHARTERED BANK MALAYSIA"       ? 'selected' : '' }}>STANDARD CHARTERED BANK MALAYSIA</option>
                              <option value="SUMITOMO MITSUI BANKING CORPORATION"   {{ $rumah_ibadat->bank_name == "SUMITOMO MITSUI BANKING CORPORATION"    ? 'selected' : '' }}>SUMITOMO MITSUI BANKING CORPORATION</option>
                              <option value="THE ROYAL BANK OF SCOTLAND BERHAD"     {{ $rumah_ibadat->bank_name == "THE ROYAL BANK OF SCOTLAND BERHAD"      ? 'selected' : '' }}>THE ROYAL BANK OF SCOTLAND BERHAD</option>
                              <option value="UOB MALAYSIA BANK"                     {{ $rumah_ibadat->bank_name == "UOB MALAYSIA BANK"                      ? 'selected' : '' }}>UOB MALAYSIA BANK</option>
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
                      <button type="button" class="btn waves-effect waves-light btn-info btn-block" data-toggle="modal" data-target="#confirmation_submit">Kemaskini Profil Rumah Ibadat</button>
                    </div>
                    <div class="col-md-2"></div>
                  </div>

                  {{-- Hidden Gap - Just Ignore --}}
                  <div class="alert alert-white" style="text-align: center;"></div>
                  {{-- <div style="padding: 25px;"></div> --}}
              </div>

              <!-- Modal Confirmation -->
              <div class="modal fade" id="confirmation_submit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
  //run function when page reload
  window.addEventListener('load', changeRegistrationReload);
  window.addEventListener('load', enableRegistrationTypeReload);

  //function change input on registration during reload (will not clear old input)
  function changeRegistrationReload(){
    //fetch data
    var category = $('#category').val();
    var registration_type = $('#registration_type').val();

    //display or hide the input
    if(registration_type == 'SENDIRI'){
      document.getElementById('main_div').style.display = "block";
      document.getElementById('branch_div_0').style.display = "none";
      document.getElementById('branch_div_1').style.display = "none";
      document.getElementById('branch_div_2').style.display = "none";

      //change input condition
      document.getElementById("registration_number_single").disabled = false;
      document.getElementById("name_association_main").disabled = true;
      document.getElementById("registration_number_main").disabled = true;
      document.getElementById("registration_number_branch").disabled = true;
    }else if(registration_type == 'INDUK'){
      document.getElementById('main_div').style.display = "none";
      document.getElementById('branch_div_0').style.display = "block";
      document.getElementById('branch_div_1').style.display = "block";
      document.getElementById('branch_div_2').style.display = "block";

      //change input condition
      document.getElementById("registration_number_single").disabled = true;
      document.getElementById("name_association_main").disabled = false;
      document.getElementById("registration_number_main").disabled = false;
      document.getElementById("registration_number_branch").disabled = false;

      //required icon display
      if(category == 'GEREJA'){
        document.getElementById("registration_number_label").className = "";
      }else if(category == 'TOKONG'){
        document.getElementById("registration_number_label").className = "required";
      }else{
        document.getElementById("registration_number_label").className = "required";
      }
    }
  }

  function enableRegistrationTypeReload(){
      var category = $('#category').val();

      if(category != null){
        document.getElementById("registration_type").disabled = false;
      }
  }

  //enable 'Jenis Pendaftaran' if user choose 'Kategori Rumah Ibadat'
  $('#category').on('change', function() {
      //reset 'Jenis Pendaftaran'
      $('#registration_type').prop('selectedIndex',0);

      //enable
      document.getElementById("registration_type").disabled = false;
  });

  //function change input on registration type
  function changeRegistration(){
    //fetch data from dropdown
    var category = $('#category').val();
    var registration_type = $('#registration_type').val();

    //display or hide the input
    if(registration_type == 'SENDIRI'){
      document.getElementById('main_div').style.display = "block";
      document.getElementById('branch_div_0').style.display = "none";
      document.getElementById('branch_div_1').style.display = "none";
      document.getElementById('branch_div_2').style.display = "none";

      //change input condition
      document.getElementById("registration_number_single").disabled = false;
      document.getElementById("registration_number_main").disabled = true;
      document.getElementById("registration_number_branch").disabled = true;

      //clear input condition
      document.getElementById("registration_number_single").value = "";
      document.getElementById("registration_number_main").value = "";
      document.getElementById("registration_number_branch").value = "";
      document.getElementById("registration_number").value = "";
    }else if(registration_type == 'INDUK'){
      document.getElementById('main_div').style.display = "none";
      document.getElementById('branch_div_0').style.display = "block";
      document.getElementById('branch_div_1').style.display = "block";
      document.getElementById('branch_div_2').style.display = "block";

      //change input condition
      document.getElementById("registration_number_single").disabled = true;
      document.getElementById("registration_number_main").disabled = false;
      document.getElementById("registration_number_branch").disabled = false;

      //clear input condition
      document.getElementById("registration_number_single").value = "";
      document.getElementById("registration_number_main").value = "";
      document.getElementById("registration_number_branch").value = "";
      document.getElementById("registration_number").value = "";

      //required icon display
      if(category == 'GEREJA'){
        document.getElementById("registration_number_label").className = "";
      }else if(category == 'TOKONG'){
        document.getElementById("registration_number_label").className = "required";
      }else{
        document.getElementById("registration_number_label").className = "required";
      }
    }
  }

  //jquery clear value in nombor pendaftaran checker
  $('#registration_number_main').on('input', function() {
      var registration_number_main_value = $('#registration_number_main').val();

      if(registration_number_main_value == ""){
      document.getElementById("registration_number").value = "";
      }
  });

  $('#registration_number_branch').on('input', function() {
      var registration_number_branch_value = $('#registration_number_branch').val();

      if(registration_number_branch_value == ""){
      document.getElementById("registration_number").value = "";
      }
  });

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