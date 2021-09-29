@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align: center;"><b>{{ __('Tetapan Semula Kata Laluan') }}</b></div>

                <div class="card-body">
                    @if (session()->has('success'))
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

                    <form method="POST" action="{{ route('forget.password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Kad Pengenalan') }}</label>

                            <div class="col-md-6">
                                <input id="ic_number" type="ic_number" class="form-control @error('ic_number') is-invalid @enderror" name="ic_number" value="{{ $ic_number ?? old('ic_number') }}" required readonly autocomplete="ic_number" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Kata Laluan Baru') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Sahkan Kata Laluan Baru') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Simpan Kata Laluan') }}
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
        $("document").ready(function() {
            setTimeout(function() {
                $("div.alert").remove();
            }, 5000); // 5 secs

        });
    </script>
@endsection
