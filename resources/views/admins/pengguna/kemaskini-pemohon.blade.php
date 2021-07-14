@extends('layouts.layout-admin')

@section('content')


<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">

  <div class="row">
      {{-- <div class="col-2"></div> --}}
      <div class="col-12">
          <div class="card">
            <form action="{{ route('admins.pengguna.pemohon.papar.update') }}">

              <div class="border card-body border-dark">

                  <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md">
                      <label>ID Pengguna</label>
                      <div class="mb-3 input-group">
                          <input class="form-control text-uppercase border-dark "  type="text" id="user_id" name="user_id" value="{{ $user->id }}" readonly>
                      </div>
                    </div>

                    <div class="col-md">
                      <label>Status Pengguna</label>
                      <div class="input-group">
                        <div class="input-group">
                          <input class="form-control text-uppercase border-dark "  type="text" value="{{ $user->status == 1 ? "Aktif" : "Tidak Aktif" }}" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2"></div>
                  </div>

                  <div class="row">
                    <div class="col-md-2"></div>

                    <div class="col-md-4">
                      <label>Mempunyai Rumah Ibadat?</label>
                      <div class="input-group">
                        <div class="input-group">
                          <input class="form-control text-uppercase border-dark "  type="text" value="{{ $user->is_rumah_ibadat == 1 ? "Ya" : "Tidak" }}" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="col-md">
                      <label>Tarikh / Waktu Pendaftaran</label>
                      <div class="mb-3 input-group">
                          <input class="form-control text-uppercase border-dark "  type="text" value="{{ Carbon\Carbon::parse($user->created_at)->format('d-m-y | g:i a') }}" disabled>
                      </div>
                    </div>
                    <div class="col-md-2"></div>
                  </div>

                  <hr>

                  <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md">
                      <label class="required">Nama</label>
                      <div class="mb-3 input-group">
                        <input class="form-control text-uppercase @error('name') is-invalid @else border-dark @enderror" id="name" name="name" type="text" value="{{ $user->name }}" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);">
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
                      <label class="required">Kad Pengenalan</label>
                      <div class="mb-3 input-group">
                          <input class="form-control text-uppercase @error('ic_number') is-invalid @else border-dark @enderror" id="ic_number" name="ic_number" type="text" value="{{ $user->ic_number }}" minlength="12" maxlength="12"  onkeypress="return onlyNumberKey(event)">
                        @error('ic_number')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="col-md">
                      <label class="required">Telefon Bimbit</label>
                      <div class="input-group">
                        <div class="input-group">
                            <input class="form-control text-uppercase @error('mobile_phone') is-invalid @else border-dark @enderror" id="mobile_phone" name="mobile_phone" type="text" value="{{ $user->mobile_phone }}" minlength="10" maxlength="11" onkeypress="return onlyNumberKey(event)">
                          @error('mobile_phone')
                          <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2"></div>
                  </div>

                  <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md">
                        <label class="required">Emel</label>
                        <div class="mb-3 input-group">
                            <input class="form-control @error('email') is-invalid @else border-dark @enderror" id="email" name="email" type="email" value="{{ $user->email }}"">
                          @error('email')
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
                      <button type="button" class="btn waves-effect waves-light btn-info btn-block" data-toggle="modal" data-target="#confirmation_submit">Kemaskini Profil Pengguna</button>
                    </div>
                    <div class="col-md-2"></div>
                  </div>

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
                      Anda pasti mahu mengemaskini profil pengguna ini?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                      <button type="submit" class="btn btn-success">Kemaskini Profil Pengguna</button>
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
