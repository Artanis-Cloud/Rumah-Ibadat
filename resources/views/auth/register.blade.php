
@extends('layouts.app')

@section('content')


<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="mb-5 text-center col-md-6">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="wrap d-md-flex">
                    <div class="p-4 text-center text-wrap p-lg-5 d-flex align-items-center order-md-last" style="background: linear-gradient(135deg, #5cfcff 0%, #4da5e8 100%);">
                        <div class="text w-100">
                            <h2>Selamat Datang Ke Sistem Bantuan Kewangan Rumah Ibadat</h2>
                        </div>
              </div>
                <div class="p-4 login-wrap p-lg-5">
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

                    {{-- <div class="d-flex">
                        <div class="w-100">
                            <h3 class="mb-4">Log Masuk</h3>
                        </div>
                    </div> --}}
                    <form method="POST" id="register_form" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <label class="label" for="name">Nama</label>
                        <div class="mb-3 input-group">
                            <input name="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required autofocus placeholder="Nama" value="{{ old('name') }}" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);">
                                        @if($errors->has('name'))
                                            <div class="invalid-feedback">
                                                {{ strtoupper($errors->first('name')) }}
                                            </div>
                                        @endif
                        </div>

                        <label class="label" for="name">Emel</label>
                        <div class="mb-3 input-group">
                            <input name="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autofocus placeholder="Emel" value="{{ old('email') }}">
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ strtoupper($errors->first('email')) }}
                                </div>
                            @endif
                        </div>

                        <label class="label" for="name">Kad Pengenalan</label>
                        <div class="mb-3 input-group">
                            <input name="ic_number" type="text" class="form-control{{ $errors->has('ic_number') ? ' is-invalid' : '' }}" required autofocus placeholder="Kad Pengenalan" value="{{ old('ic_number') }}" minlength="12" maxlength="12" onkeypress="return onlyNumberKey(event)">
                            @if($errors->has('ic_number'))
                                <div class="invalid-feedback">
                                    {{ strtoupper($errors->first('ic_number')) }}
                                </div>
                            @endif
                        </div>

                        <label class="label" for="name">Telefon Bimbit</label>
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

                        <label class="label" for="name">Kata Laluan</label>
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

                        <label class="label" for="name">Sahkan Kata Laluan</label>
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

                      <div class="col-md" style="text-align: center;">
                        <div class="form-group">
                            <button type="submit" class="px-3 form-control btn btn-primary submit" id="roll_submit">Daftar</button>
                        </div>
                        <div class="form-group d-md-flex">
                            <div class="w-100 text-md-center">
                                <a href="{{ route('login') }}"> Sudah mempunyai akaun? Log Masuk Disini.</a>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
          </div>
            </div>
        </div>
    </div>
</section>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('submit', '#register_form', function() {
            $('#roll_submit').html('<i class="fa fa-spinner fa-spin"></i>');
            $('#roll_submit').attr('disabled', 'disabled');
        });
    });
</script>
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

