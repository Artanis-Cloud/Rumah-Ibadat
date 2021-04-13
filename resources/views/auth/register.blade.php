
@extends('layouts.app')

@section('content')


<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">

  <div class="row">
      {{-- <div class="col-2"></div> --}}
      <div class="col-12">

          <div class="card">
            <h2 style="text-align: center">Daftar Masuk Rumah Ibadat</h2>
            <form method="POST" action="{{ route('register') }}">
            @csrf

              <div class="border card-body">

                  {{-- Flash Message --}}
                  @if ($message = Session::get('success'))
                    <div class="border alert alert-success border-success" style="text-align: center;">{{$message}}</div>
                  @elseif ($message = Session::get('error'))
                    <div class="border alert alert-danger border-danger" style="text-align: center;">{{$message}}</div>
                  @else
                    {{-- Hidden Gap - Just Ignore --}}
                    <div class="alert alert-white" style="text-align: center;"></div>
                    {{-- <div style="padding: 23px;"></div> --}}
                  @endif

                  <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md">
                      <label>Nama</label>
                      <div class="mb-3 input-group">
                        <input name="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required autofocus placeholder="Nama" value="{{ old('name') }}" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);">
                                    @if($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{ strtoupper($errors->first('name')) }}
                                        </div>
                                    @endif
                    </div>
                    </div>
                    <div class="col-md-2"></div>
                  </div>

                  <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md">
                        <label>Emel</label>
                        <div class="mb-3 input-group">
                            <input name="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autofocus placeholder="Emel" value="{{ old('email') }}">
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ strtoupper($errors->first('email')) }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-2"></div>
                  </div>

                  <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md">
                        <label>Kad Pengenalan</label>
                        <div class="mb-3 input-group">
                            <input name="ic_number" type="text" class="form-control{{ $errors->has('ic_number') ? ' is-invalid' : '' }}" required autofocus placeholder="Kad Pengenalan" value="{{ old('ic_number') }}" minlength="12" maxlength="12" onkeypress="return onlyNumberKey(event)">
                            @if($errors->has('ic_number'))
                                <div class="invalid-feedback">
                                    {{ strtoupper($errors->first('ic_number')) }}
                                </div>
                            @endif
                        </div>
                      </div>

                    <div class="col-md-2"></div>
                  </div>




                  <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md">
                      <label>Telefon Bimbit</label>
                      <div class="mb-3 input-group">
                        <div class="mb-3 input-group">
                            <input name="mobile_phone" type="text" class="form-control{{ $errors->has('mobile_phone') ? ' is-invalid' : '' }}" required autofocus placeholder="Nombor Telefon Bimbit" value="{{ old('mobile_phone') }}">
                            @if($errors->has('address'))
                                <div class="invalid-feedback">
                                    {{ strtoupper($errors->first('address')) }}
                                </div>
                            @endif
                        </div>
                    </div>
                    </div>

                    <div class="col-md-2"></div>
                  </div>

                  <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                      <label>Kata Laluan</label>
                      <div class="mb-3 input-group">
                        <div class="mb-3 input-group">
                            <input name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="Kata Laluan">
                            @if($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ strtoupper($errors->first('password')) }}
                                </div>
                            @endif
                        </div>
                    </div>
                    </div>
                    <div class="col-md-4">
                        <label>Sahkan Kata Laluan</label>
                        <div class="mb-3 input-group">
                          <div class="mb-3 input-group">
                              <input name="password_confirmation" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="Sahkan Kata Laluan">
                                      @if($errors->has('password'))
                                          <div class="invalid-feedback">
                                              {{ strtoupper($errors->first('password')) }}
                                          </div>
                                      @endif
                          </div>
                      </div>
                      </div>

                    <div class="col-md-2"></div>
                  </div>

                  {{-- Submit Button --}}
                  <div class="row" style="padding-top: 15px;">
                    <div class="col-md-2"></div>
                    <div class="col-md" style="text-align: center;">
                        <div class="form-group">
                            <button type="submit" class="px-3 form-control btn btn-primary submit">Daftar</button>
                        </div>
                        <div class="form-group d-md-flex">
                            <div class="w-100 text-md-center">
                                <a href="{{ route('login') }}"> Sudah mempunyai akaun? Log Masuk Disini.</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                  </div>

                  {{-- Hidden Gap - Just Ignore --}}
                  <div class="alert alert-white" style="text-align: center;"></div>
                  {{-- <div style="padding: 25px;"></div> --}}
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

