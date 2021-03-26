@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card-group">
            <div class="card text-center p-3">
                <a href="{{ route('welcome') }}" style="text-align: right;">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
                <div class="card-body p-2">
                    @if(\Session::has('message'))
                        <p class="alert alert-info">
                            {{ \Session::get('message') }}
                        </p>
                    @endif
                    <form method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        {{-- <h1>{{ env('APP_NAME', 'Permissions Manager') }}</h1> --}}
                        <h1>Daftar</h1>
                        <p class="text-muted">Sila isi bahagian ini</p>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-user"></i>
                                </span>
                            </div>
                            <input name="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required autofocus placeholder="Name" value="{{ old('name', null) }}" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);">
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ strtoupper($errors->first('name')) }}
                                </div>
                            @endif
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text p-2">
                                    <i class="fa fa-envelope"></i>
                                </span>
                            </div>
                            <input name="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autofocus placeholder="Email" value="{{ old('email', null) }}">
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ strtoupper($errors->first('email')) }}
                                </div>
                            @endif
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text p-2">
                                    <i class="fa fa-id-card"></i>
                                </span>
                            </div>
                            <input name="ic_number" type="text" class="form-control{{ $errors->has('ic_number') ? ' is-invalid' : '' }}" required autofocus placeholder="Kad Pengenalan" value="{{ old('ic_number', null) }}" minlength="12" maxlength="12" onkeypress="return onlyNumberKey(event)">
                            @if($errors->has('ic_number'))
                                <div class="invalid-feedback">
                                    {{ strtoupper($errors->first('ic_number')) }}
                                </div>
                            @endif
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            </div>
                            <input name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="Password">
                            @if($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ strtoupper($errors->first('password')) }}
                                </div>
                            @endif
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            </div>
                            <input name="password_confirmation" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="Password Confirmation">
                            @if($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ strtoupper($errors->first('password')) }}
                                </div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-md">
                                <button type="submit" class="btn btn-primary px-4" style="width: 100%;">
                                    Daftar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

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