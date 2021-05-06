@extends('layouts.layout-user-nicepage')

@section('content')


<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
  
  <div class="row">
      {{-- <div class="col-2"></div> --}}
      <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
              <div class="col-md">
                <div class="border card border-info h-100">
                  <div class="card-body">
                      <h4 class="card-title" style="font-weight: bold;"><i class="fas fa-file-alt" style="color: #137eff;"></i>&nbsp&nbsp Permohonan Baru</h4>
                      <p class="card-text">Sekiranya ingin membuat permohonan dana untuk rumah ibadat, sila pilih bahagian ini.</p>
                  </div>
                  <div class="card-footer">
                    <a href="{{ route('users.permohonan.baru') }}" class="btn btn-info">Permohonan Baru</a>
                  </div>
                </div>
              </div>

              <div class="col-md">
                <div class="border card border-info h-100">
                  <div class="card-body">
                      <h4 class="card-title" style="font-weight: bold;"><i class="fas fa-sync" style="color: yellow;"></i>&nbsp&nbsp Permohonan Sedang Diproses</h4>
                      <p class="card-text">Sekiranya permohonan anda sedang diproses, sila pilih bahagian ini.</p>
                  </div>
                  <div class="card-footer">
                    <a href="javacript:void(0)" class="btn btn-info">Permohonan Sedang Diproses</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="row" style="padding-top: 20px;">
              <div class="col-md">
                <div class="border card border-info h-100">
                  <div class="card-body">
                      <h4 class="card-title" style="font-weight: bold;"><i class="far fa-check-circle" style="color: green;"></i>&nbsp&nbsp Permohonan Lulus</h4>
                      <p class="card-text">Sekiranya permohonan anda lulus, sila pilih bahagian ini.</p>
                  </div>
                  <div class="card-footer">
                    <a href="javacript:void(0)" class="btn btn-info">Permohonan Lulus</a>
                  </div>
                </div>
              </div>

              <div class="col-md">
                <div class="border card border-info h-100">
                  <div class="card-body">
                      <h4 class="card-title" style="font-weight: bold;"><i class="far fa-times-circle" style="color: red;"></i>&nbsp&nbsp Permohonan Tidak Lulus</h4>
                      <p class="card-text">Sekiranya permohonan anda tidak lulus, sila pilih bahagian ini.</p>
                  </div>
                  <div class="card-footer">
                    <a href="javacript:void(0)" class="btn btn-info">Permohonan Tidak Lulus</a>
                  </div>
                </div>
              </div>
            </div>
            </div>
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