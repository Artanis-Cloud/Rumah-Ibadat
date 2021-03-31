@extends('layouts.layout-user')

@section('content')
<div class="panel-header panel-header-sm">
       
</div>
<div class="content">
  <div class="row">
    {{-- <div class="col-md-2"></div> --}}
    <div class="col-md">
      <div class="card">
        {{-- @if (count($errors) > 0) --}}
        @if ($message = Session::get('success'))
          <div class="m-3 alert alert-success" style="text-align: center;">
              {{$message}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
        @elseif ($message = Session::get('error')) 
          <div class="m-3 alert alert-danger" style="text-align: center;">
              {{$message}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
        @endif

        <form method="POST" action="{{ route('tukar-kata-laluan.kemaskini') }}">
        {{ csrf_field() }}
        <div class="card-header" style="text-align: center;">
          Tukar Kata Laluan
        </div>

        <div class="card-body ">

            <div class="row"> 
              <div class="col-md-2"></div>
              <div class="col-md">
                <div class="form-group has-label">
                    <label>
                        Kata Laluan Terdahulu
                    </label>
                    <input class="form-control" name="old_password" type="password" required="true">
                </div>
              </div>
              <div class="col-md-2"></div>
            </div>


            <div class="row"> 
              <div class="col-md-2"></div>
              <div class="col-md">
                <div class="form-group has-label">
                    <label>
                        Kata Laluan Baru
                    </label>
                    <input class="form-control" name="password" type="password" required="true">
                </div>
              </div>
              <div class="col-md-2"></div>
            </div>


            <div class="row"> 
              <div class="col-md-2"></div>
              <div class="col-md">
                <div class="form-group has-label">
                    <label>
                        Sahkan Kata Laluan Baru
                    </label>
                    <input class="form-control" name="password_confirmation" type="password" required="true">
                </div>
              </div>
              <div class="col-md-2"></div>
            </div>



        </div>

        <div class="text-center card-footer">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_pengesahan">Tukar Kata Laluan</button>
        </div>

        {{-- MODAL CONFIRMATION --}}
        <div class="modal fade" id="modal_pengesahan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Pengesahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Anda pasti mahu menukar kata laluan baru?
              </div>
              <div class="modal-footer">
                {{-- <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button> --}}
                <button type="submit" class="btn btn-primary">Tukar</button>
              </div>
            </div>
          </div>
        </div>

        </form>
      </div>
      
    </div>
  </div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
$("document").ready(function(){
  setTimeout(function(){
     $("div.alert").remove();
  }, 5000 ); // 5 secs

});
</script>
@endsection
