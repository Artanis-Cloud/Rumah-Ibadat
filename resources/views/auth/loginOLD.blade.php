@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card-group">
            <div class="p-3 text-center card">
                <a href="{{ route('welcome') }}" style="text-align: right;">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
                <div class="card-body">
                    {{-- @if(\Session::has('message'))
                        <p class="alert alert-info">
                            {{ \Session::get('message') }}
                        </p>
                    @endif --}}
                    @if (count($errors) > 0)
                    <div id="alert">
                        <div class="alert alert-card alert-danger" role="alert">
                            <strong>Ralat! </strong>
                            Kad pengenalan / Passport atau Kata Laluan tidak tepat
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            {{-- <span aria-hidden="true">&times;</span> --}}
                            </button>
                        </div>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <h1>Log Masuk</h1>
                        {{-- <p class="text-muted">Log Masuk disini</p> --}}

                        <div class="mb-3 input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-envelope"></i>
                                </span>
                            </div>
                            <input name="email" type="text" class="form-control" required autofocus placeholder="Email" value="{{ old('email', null) }}">

                            {{-- <input name="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autofocus placeholder="Email" value="{{ old('email', null) }}"> --}}
                            {{-- @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif --}}
                        </div>

                        <div class="mb-3 input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            </div>
                            <input name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="Kata Laluan">
                            @if($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </div>

                        {{-- <div class="mb-4 input-group">
                            <div class="form-check checkbox">
                                <input class="form-check-input" name="remember" type="checkbox" id="remember" style="vertical-align: middle;" />
                                <label class="form-check-label" for="remember" style="vertical-align: middle;">
                                    Remember me
                                </label>
                            </div>
                        </div> --}}

                        <div class="row">
                            <div class="col-md">
                                <button type="submit" class="px-4 btn btn-primary" style="width: 50%;">
                                    Log Masuk
                                </button>
                            </div>
                        </div>

                        <div class="row" style="padding-top: 10px;">
                            <div class="text-right col-md">
                                <a class="px-0 btn btn-link" href="{{ route('password.request') }}">
                                    Lupa Kata Laluan?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script type="text/javascript">
$("document").ready(function(){
  setTimeout(function(){
     $("div.alert").remove();
  }, 5000 ); // 5 secs

});
</script>
@endsection