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
                        <form method="get" action="{{ route('forget.password.email') }}">
                            {{ csrf_field() }}
                            <h1>
                                <div class="login-logo">
                                    Tetapan Semula Kata Laluan
                                </div>
                            </h1>
                            <div>
                                {{ csrf_field() }}


                                <div class="form-group has-feedback" style="padding-top: 40px;">
                                    <input type="email" name="email" class="form-control" required="autofocus"
                                        placeholder="Emel">
                                    @if ($errors->has('email'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </em>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <button type="submit" class="btn btn-primary px-4" style="width: 50%;" onclick="return loading_modal();">
                                        Tetapan Semula Kata Laluan
                                    </button>
                                    {{-- <button type="button" onclick="return loading_modal();">test modal</button> --}}
                                </div>
                            </div>
                        </form>

                        <div class="modal fade" id="loading_upload" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="text-center col-md">
                                                <lord-icon src="https://cdn.lordicon.com/xjovhxra.json" trigger="loop"
                                                    colors="primary:#3080e8,secondary:#08a88a"
                                                    style="width:250px;height:250px">
                                                </lord-icon>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md text-center">
                                                <h4>Sila tunggu sebentar.</h4>
                                                <h5 style="color: red;">(Sila kekal di halaman ini sehingga selesai)</h5>
                                            </div>
                                            <div class="col-md-1"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script type="text/javascript">

        function loading_modal() {
            $("#loading_upload").modal({
                backdrop: 'static',
                keyboard: false
            });
        }

        $("document").ready(function() {
            setTimeout(function() {
                $("div.alert").remove();
            }, 5000); // 5 secs

        });
    </script>
@endsection
