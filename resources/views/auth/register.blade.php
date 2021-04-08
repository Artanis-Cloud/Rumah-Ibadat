
@extends('layouts.app')
@section('content')

<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="mb-5 text-center col-md-6">
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="p-4 wrap p-lg-5" style="background: white;">
                        <div class="d-flex">
                            <div class="w-100" style="text-align-last: center;">
                                <h3 class="mb-4">Daftar Masuk</h3>
                            </div>
                        </div>
                        @if(\Session::has('message'))
                            <p class="alert alert-info">
                                {{ \Session::get('message') }}
                            </p>
                        @endif
                        <form method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col md-6">
                                <div class="mb-3 input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    </div>
                                    <input name="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required autofocus placeholder="Nama" value="{{ old('name') }}" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);">
                                    @if($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{ strtoupper($errors->first('name')) }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col md-6">
                                <div class="mb-3 input-group">
                                    <div class="input-group-prepend">
                                        <span class="p-2 input-group-text">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                    </div>
                                    <input name="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autofocus placeholder="Emel" value="{{ old('email') }}">
                                    @if($errors->has('email'))
                                        <div class="invalid-feedback">
                                            {{ strtoupper($errors->first('email')) }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col md-6">
                                <div class="mb-3 input-group">
                                    <div class="input-group-prepend">
                                        <span class="p-2 input-group-text">
                                            <i class="fa fa-id-card"></i>
                                        </span>
                                    </div>
                                    <input name="ic_number" type="text" class="form-control{{ $errors->has('ic_number') ? ' is-invalid' : '' }}" required autofocus placeholder="Kad Pengenalan" value="{{ old('ic_number') }}" minlength="12" maxlength="12" onkeypress="return onlyNumberKey(event)">
                                    @if($errors->has('ic_number'))
                                        <div class="invalid-feedback">
                                            {{ strtoupper($errors->first('ic_number')) }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col md-6">
                                <div class="mb-3 input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-mobile"></i>
                                        </span>
                                    </div>
                                    <input name="mobile_phone" type="text" class="form-control{{ $errors->has('mobile_phone') ? ' is-invalid' : '' }}" required autofocus placeholder="Nombor Telefon Bimbit" value="{{ old('mobile_phone') }}">
                                    @if($errors->has('address'))
                                        <div class="invalid-feedback">
                                            {{ strtoupper($errors->first('address')) }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col md-6">
                                <div class="mb-3 input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                    </div>
                                    <input name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="Kata Laluan">
                                    @if($errors->has('password'))
                                        <div class="invalid-feedback">
                                            {{ strtoupper($errors->first('password')) }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col md-6">
                                <div class="mb-3 input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                    </div>
                                    <input name="password_confirmation" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="Sahkan Kata Laluan">
                                    @if($errors->has('password'))
                                        <div class="invalid-feedback">
                                            {{ strtoupper($errors->first('password')) }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                            <div class="form-group">
                                <button type="submit" class="px-3 form-control btn btn-primary submit">Daftar</button>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-100 text-md-center">
                                    <a href="{{ route('login') }}"> Sudah mempunyai akaun? Log Masuk Disini.</a>
                                </div>
                            </div>

		                </form>
		            </div>
		      </div>
			</div>
		</div>
	</section>
</body>
@endsection

