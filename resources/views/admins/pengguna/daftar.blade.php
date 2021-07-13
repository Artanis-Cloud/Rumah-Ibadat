@extends('layouts.layout-admin')

@section('content')


<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
  
  <div class="row">
      {{-- <div class="col-2"></div> --}}
      <div class="col-12">
          <div class="card">
            <form action="{{ route('admins.pengguna.pengguna-dalaman.daftar.submit') }}">
              <div class="card-body border border-dark">
                <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                    <h4 class="text-center">Maklumat Pengguna</h4>
                  </div>
                  <div class="col-md-2"></div>
                </div>

                <div class="row" style="padding-top: 15px;">
                  <div class="col-md-2"></div>
                  <div class="col-md">
                    <label class="required">Nama Penuh</label>
                    <div class="form-group mb-3">
                        <input class="form-control text-uppercase  border-dark " id="name" name="name" type="text" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);">
                    </div>
                  </div>
                  <div class="col-md">
                    <label class="required">Email</label>
                    <div class="form-group mb-3">
                        <input class="form-control  border-dark " id="email" name="email" type="text">
                    </div>
                  </div>
                  <div class="col-md-2"></div>
                </div>

                <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md">
                    <label class="required">Kad Pengenalan</label>
                    <div class="form-group mb-3">
                        <input class="form-control text-uppercase  border-dark " id="ic_number" name="ic_number" type="text" minlength="12" maxlength="12" onkeypress="return onlyNumberKey(event)">
                    </div>
                  </div>
                  <div class="col-md">
                    <label class="required">Telefon Bimbit</label>
                    <div class="form-group mb-3">
                        <input class="form-control text-uppercase  border-dark " id="phone" name="phone" type="text" minlength="10" maxlength="11" onkeypress="return onlyNumberKey(event)">
                    </div>
                  </div>
                  <div class="col-md-2"></div>
                </div>

                <hr>

                <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                    <h4 class="text-center">Peranan Pengguna</h4>
                  </div>
                  <div class="col-md-2"></div>
                </div>

                <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                    <div class="form-group">
                      <label class="mr-sm-2 required" for="inlineFormCustomSelect">Peranan</label>
                      <select class="custom-select mr-sm-2  border-dark " id="role" name="role" onchange="display_rumah_ibadat()">
                          <option selected="" disabled="" hidden="">PILIH PERANAN PENGGUNA</option>
                          {{-- <option value="0">Pemohon</option> --}}
                          <option value="1">PEJABAT EXCO</option>
                          <option value="2">PEJABAT YB PENGERUSI</option>
                          <option value="3">PEJABAT UPEN</option>
                          <option value="4">ADMIN SISTEM</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2"></div>
                </div>

                

                <div class="row" >
                  <div class="col-md-2"></div>
                  <div class="col-md-4" id="div_rumah_ibadat_1" style="display: none;">
                    <label class="required" style="padding-bottom: 10px;">Pilih Rumah Ibadat</label>
                    <fieldset class="checkbox">
                        <label>
                            <input type="checkbox" value="tokong" id="tokong" name="rumah_ibadat[]"> Tokong
                        </label>
                    </fieldset>
                    <fieldset class="checkbox">
                        <label>
                            <input type="checkbox" value="kuil" id="kuil" name="rumah_ibadat[]"> Kuil
                        </label>
                    </fieldset>
                  </div>
                  <div class="col-md-4" id="div_rumah_ibadat_2" style="display: none;">
                    <label style="padding-bottom: 10px;">&nbsp</label>
                    <fieldset class="checkbox">
                        <label>
                            <input type="checkbox" value="gurdwara" id="gurdwara" name="rumah_ibadat[]"> Gurdwara
                        </label>
                    </fieldset>
                    <fieldset class="checkbox">
                        <label>
                            <input type="checkbox" value="gereja" id="gereja" name="rumah_ibadat[]"> Gereja
                        </label>
                    </fieldset>
                  </div>
                  <div class="col-md-2"></div>
                </div>

                <div class="row"  style="padding-top: 20px;">
                  <div class="col-md-2"></div>
                  <div class="col-md">
                    <button type="button" class="btn waves-effect waves-light btn-info btn-block" id="validation_button">Daftar Pengguna</button>
                  </div>
                  <div class="col-md-2"></div>
                </div>

                <!-- Modal Confirmation -->
                <div class="modal fade" id="confirmation_submit_permohonan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbspPengesahan!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Anda pasti mahu mendaftar pengguna ini?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-success">Daftar Pengguna</button>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Modal Validation -->
                <div class="modal fade" id="validation_submit_permohonan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbspPeringatan!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <span id="note_message"></span>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Okay</button>
                      </div>
                    </div>
                  </div>
                </div>
                  
              </div>
            </form>
          </div>
      </div>
  </div>

</div>
<script>
  function display_rumah_ibadat(){
    var role = $('#role').val();

    if(role == 1 || role == 2){
      document.getElementById('div_rumah_ibadat_1').style.display = "block";
      document.getElementById('div_rumah_ibadat_2').style.display = "block";

    }else{
      document.getElementById('div_rumah_ibadat_1').style.display = "none";
      document.getElementById('div_rumah_ibadat_2').style.display = "none";
    }
  }

  //function insert number only
  function onlyNumberKey(evt) {

        // Only ASCII charactar in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
  }

  $(document).ready(function(){
  $("#validation_button").click(function(){

    var name = $('#name').val();
    var email = $('#email').val();
    var ic_number = $('#ic_number').val();
    var phone = $('#phone').val();

    var role = $('#role').val();

     console.log(role);
    if(name == ""){
        $('#note_message').html('Sila isi <b>Nama Penuh</b>.');
        $("#validation_submit_permohonan").modal();
        return false;
    }

    if(email == ""){
        $('#note_message').html('Sila isi <b>Email</b>.');
        $("#validation_submit_permohonan").modal();
        return false;
    }

    if(ic_number == ""){
        $('#note_message').html('Sila isi <b>Kad Pengenalan</b>.');
        $("#validation_submit_permohonan").modal();
        return false;
    }

    if(phone == ""){
        $('#note_message').html('Sila isi <b>Telefon Bimbit</b>.');
        $("#validation_submit_permohonan").modal();
        return false;
    }

    if(role == null){
      $('#note_message').html('Sila pilih <b>Peranan</b>.');
      $("#validation_submit_permohonan").modal();
      return false;
    }

    if(role == 1 || role == 2){

      if(!$('#tokong').is(':checked') && !$('#kuil').is(':checked') && !$('#gurdwara').is(':checked') && !$('#gereja').is(':checked')){
        $('#note_message').html('Sila pilih sekurang-kurangnya <b>1 Rumah Ibadat</b>.');
        $("#validation_submit_permohonan").modal();
        return false;
      }
        
    }
    
    $("#confirmation_submit_permohonan").modal();
    });
  });
</script>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
@endsection