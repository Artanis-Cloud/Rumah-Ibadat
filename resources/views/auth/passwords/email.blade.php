@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card-group">
            <div class="card text-center p-3">
                <a href="{{ route('login') }}" style="text-align: right;">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
                <div class="card-body">
                    {{-- @if (session()->has('status'))
                    <div class="alert alert-success">{{ session()->get('status') }}</div>
                    @endif    --}}

                    @if (session()->has('status'))
                    <div id="alert">

                        <div class="alert alert-card  alert-success" role="alert">
                            <strong>Berjaya! </strong>
                            {{ session()->get('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            {{-- <span aria-hidden="true">&times;</span> --}}
                            </button>
                        </div>
                    </div>
                    @elseif (session()->has('error'))
                    <div id="alert">
                        <div class="alert alert-card  alert-danger" role="alert">
                            <strong>Ralat! </strong>
                            {{ session()->get('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            {{-- <span aria-hidden="true">&times;</span> --}}
                            </button>
                        </div>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}
                        <h1>
                            <div class="login-logo">
                                {{-- <a href="#">
                                    {{ env('APP_NAME', 'Permissions Manager') }}
                                </a> --}}
                                Set Semula Kata Laluan
                            </div>
                        </h1>
                        {{-- <p class="text-muted">Sila masukkan email yang berdaftar</p> --}}
                        <div>
                            {{ csrf_field() }}
                            {{-- <div class="form-group has-feedback">
                                <input type="text" name="ic_number" class="form-control" required="autofocus" placeholder="Kad Pengenalan">
                                @if($errors->has('ic_number'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('ic_number') }}
                                    </em>
                                @endif
                            </div> --}}

                            <div class="form-group has-feedback">
                                <input type="email" name="email" class="form-control" required="autofocus" placeholder="Email">
                                @if($errors->has('email'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </em>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <button type="submit" class="btn btn-primary px-4" style="width: 50%;">
                                    Set Semula Kata Laluan
                                </button>
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