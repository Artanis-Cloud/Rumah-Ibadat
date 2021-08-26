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
            <form action="{{ route('admins.tetapan.halaman-utama.submit') }}">
              <div class="card-body border border-dark">
                
                <div class="row">
                  <div class="col-md">
                    <h3 class="text-center">Pengenalan Sistem</h3>
                  </div>
                </div>

                <div class="row" style="padding-top: 15px;">
                  <div class="col-md-2"></div>
                  <div class="col-md">
                    <label class="required">Tajuk Pengenalan</label>
                    <div class="form-group mb-3">
                        <input class="form-control border-dark " id="intro_title" name="intro_title" type="text" value="{{ $csm->intro_title }}">
                    </div>
                  </div>
                  <div class="col-md-2"></div>
                </div>

                <div class="row" style="padding-top: 15px;">
                  <div class="col-md-2"></div>
                  <div class="col-md">
                    <label class="required">Kandungan Pengenalan</label>
                    <div class="form-group mb-3">
                        <textarea class="form-control border-dark " id="intro_content" name="intro_content" rows="5">{{ $csm->intro_content }}</textarea>
                    </div>
                  </div>
                  <div class="col-md-2"></div>
                </div>

                <div class="row" style="padding-top: 15px;">
                  <div class="col-md-2"></div>
                  <div class="col-md">
                    <hr>
                  </div>
                  <div class="col-md-2"></div>
                </div>

                <div class="row">
                  <div class="col-md">
                    <h3 class="text-center">Gambar Banner</h3>
                  </div>
                </div>

                <div class="row" style="padding-top: 15px;">
                  <div class="col-md-2"></div>
                  <div class="col-md">
                    <hr>
                  </div>
                  <div class="col-md-2"></div>
                </div>

                <div class="row">
                  <div class="col-md">
                    <h3 class="text-center">Hubungi Kami</h3>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md">
                    <label class="required">Emel</label>
                    <div class="form-group mb-3">
                        <input class="form-control  border-dark " id="email" name="email" type="email" value="{{ $csm->email }}">
                    </div>
                  </div>
                  <div class="col-md">
                    <label class="required">Nombor Telefon</label>
                    <div class="form-group mb-3">
                        <input class="form-control  border-dark " id="contact" name="contact" type="text" value="{{ $csm->contact }}">
                    </div>
                  </div>
                  <div class="col-md-2"></div>
                </div>

                <div class="row" style="padding-top: 15px;">
                  <div class="col-md-2"></div>
                  <div class="col-md">
                    <label class="required">Alamat</label>
                    <div class="form-group mb-3">
                        <textarea class="form-control  border-dark " id="address" name="address" rows="5">{{ $csm->address }}</textarea>
                    </div>
                  </div>
                  <div class="col-md-2"></div>
                </div>


                <div class="row"  style="padding-top: 20px;">
                  <div class="col-md-2"></div>
                  <div class="col-md">
                    <button type="button" class="btn waves-effect waves-light btn-info btn-block" id="validation_button">Simpan Tetapan</button>
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
                        Anda pasti menyimpan tetapan ini?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-success">Simpan Tetapan</button>
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

    var intro_title = $('#intro_title').val();
    var intro_content = $('#intro_content').val();
    var email = $('#email').val();
    var contact = $('#contact').val();
    var address = $('#address').val();

    if(intro_title == ""){
        $('#note_message').html('Sila isi <b>Tajuk Pengenalan</b>.');
        $("#validation_submit_permohonan").modal();
        return false;
    }

    if(intro_content == ""){
        $('#note_message').html('Sila isi <b>Kandungan Pengenalan</b>.');
        $("#validation_submit_permohonan").modal();
        return false;
    }

    if(email == ""){
        $('#note_message').html('Sila isi <b>Emel</b>.');
        $("#validation_submit_permohonan").modal();
        return false;
    }

    if(contact == ""){
        $('#note_message').html('Sila isi <b>Nombor Telefon</b>.');
        $("#validation_submit_permohonan").modal();
        return false;
    }

    if(address == ""){
      $('#note_message').html('Sila pilih <b>Alamat</b>.');
      $("#validation_submit_permohonan").modal();
      return false;
    }
    
    $("#confirmation_submit_permohonan").modal();
    });
  });
</script>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
@endsection