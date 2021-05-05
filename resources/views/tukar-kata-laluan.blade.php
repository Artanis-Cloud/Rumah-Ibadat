{{-- Extends temporary --}}
{{-- @extends(($user->role == '0') ? 'layouts.layout-user-nicepage' : (($user->role == '4') ? 'layouts.layout-admin' : '')) --}}

{{-- Extends permanent --}}
@extends(($user->role == '0') ? 'layouts.layout-user-nicepage' : (($user->role == '1') ? 'layouts.layout-exco' : (($user->role == '2') ? 'layouts.layout-yb' : (($user->role == '3') ? 'layouts.layout-upen' : (($user->role == '4') ? 'layouts.layout-admin' : '')))))


@section('content')


<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
  
  <div class="row">
      {{-- <div class="col-2"></div> --}}
      <div class="col-12">
          <div class="card">
            <form method="POST" action="{{ route('tukar-kata-laluan.kemaskini') }}">
            {{ csrf_field() }}

              <div class="card-body border border-dark">

                  {{-- Flash Message --}}
                  @if ($message = Session::get('success'))
                    <div class="alert alert-success border border-success" style="text-align: center;">{{$message}}</div>
                  @elseif ($message = Session::get('error'))
                    <div class="alert alert-danger border border-danger" style="text-align: center;">{{$message}}</div>
                  @else
                    {{-- Hidden Gap - Just Ignore --}}
                    <div class="alert alert-white" style="text-align: center;"></div>
                    {{-- <div style="padding: 23px;"></div> --}}
                  @endif
                  <div class="row"> 
                    <div class="col-md-3"></div>
                    <div class="col-md">
                      <label>Kata Laluan Terdahulu</label>
                      <div class="input-group mb-3">
                          <input class="form-control @error('old_password') is-invalid @else border-dark @enderror" id="old_password" name="old_password" type="password">
                          <div class="input-group-append">
                              <button class="btn btn-secondary" type="button" id="old_password_button" onclick="visiblePassword('old_password')"><i id="old_password_icon" class="fa fa-eye-slash" aria-hidden="true"></i></button>
                          </div>
                          @error('old_password')
                          <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-3"></div>
                  </div>

                  <div class="row"> 
                    <div class="col-md-3"></div>
                    <div class="col-md">
                      <label>Kata Laluan Baru</label>
                      <div class="input-group mb-3">
                          <input class="form-control @error('password') is-invalid @else border-dark @enderror" id="password" name="password" type="password">
                          <div class="input-group-append">
                              <button class="btn btn-secondary" type="button" id="password_button" onclick="visiblePassword('password')"><i id="password_icon" class="fa fa-eye-slash" aria-hidden="true"></i></button>
                          </div>
                          @error('password')
                          <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md">
                      <label>Sahkan Kata Laluan Baru</label>
                      <div class="input-group mb-3">
                          <input class="form-control @error('password') is-invalid @else border-dark @enderror" id="password_confirmation" name="password_confirmation" type="password">
                          <div class="input-group-append">
                              <button class="btn btn-secondary" type="button" id="password_confirmation_button" onclick="visiblePassword('password_confirmation')"><i id="password_confirmation_icon" class="fa fa-eye-slash" aria-hidden="true"></i></button>
                          </div>
                          @error('password')
                          <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-3"></div>
                  </div>

                  {{-- Submit Button --}}
                  <div class="row"> 
                    <div class="col-md-3"></div>
                    <div class="col-md-6" style="text-align: center;">
                      <button type="button" class="btn waves-effect waves-light btn-info btn-block" data-toggle="modal" data-target="#confirmation">Tukar Kata laluan</button>
                    </div>
                    <div class="col-md-3"></div>
                  </div>

                  {{-- Hidden Gap - Just Ignore --}}
                  <div class="alert alert-white" style="text-align: center;"></div>
                  {{-- <div style="padding: 25px;"></div> --}}
              </div>

              <!-- Modal Confirmation -->
              <div class="modal fade" id="confirmation" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbspPengesahan!</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Anda pasti mahu menukar kata laluan baru?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-success">Tukar Kata Laluan</button>
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
  function visiblePassword(id) {

    var x = document.getElementById(id); //fetch input id
    var y = id.concat("_button");        //fetch button id
    var z = id.concat("_icon");          // icon id

    if (x.type === "password") {
      x.type = "text";                                            //change input type
      document.getElementById(y).className = "btn btn-success";   //change button color
      document.getElementById(z).className = "fa fa-eye";         //change icon
    } else {
      x.type = "password";                                        //change input type to default
      document.getElementById(y).className = "btn btn-secondary"; //change button color to default
      document.getElementById(z).className = "fa fa-eye-slash";   //change icon to default
    }
  }
</script>
@endsection