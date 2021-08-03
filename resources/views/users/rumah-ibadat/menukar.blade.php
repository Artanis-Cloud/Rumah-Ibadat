@extends('layouts.layout-user-disabled')

@section('content')

<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">

  <div class="row">
      {{-- <div class="col-2"></div> --}}
      <div class="col-12">
          <div class="card">
            <form method="POST" action="{{ route('users.rumah-ibadat.menukar.submit') }}" enctype="multipart/form-data">
            {{ csrf_field() }}

              <div class="border card-body border-dark">

                <input type="hidden" name="rumah_ibadat_id" id="rumah_ibadat_id" value="{{ $rumah_ibadat->id }}" readonly>

                  <div class="row"> 
                    <div class="col-md-2"></div>
                    <div class="col-md">
                      <div class="form-group">
                          <label class="mr-sm-2" for="inlineFormCustomSelect">Kategori Rumah Ibadat</label>
                          <input class="form-control text-uppercase @error('category') is-invalid @else border-dark @enderror" id="category" name="category" type="text" value="{{ $rumah_ibadat->category }}" readonly>
                          {{-- <select class="custom-select mr-sm-2 @error('category') is-invalid @else border-dark @enderror" id="category" name="category" value="{{ $rumah_ibadat->category }}">
                              <option selected disabled hidden>PILIH KATEGORI RUMAH IBADAT</option>
                              <option value="TOKONG"    {{ $rumah_ibadat->category == "TOKONG"    ? 'selected' : '' }} >TOKONG (BUDDHA & TAO)</option>
                              <option value="KUIL"      {{ $rumah_ibadat->category == "KUIL"      ? 'selected' : '' }} >KUIL (HINDU)</option>
                              <option value="GURDWARA"  {{ $rumah_ibadat->category == "GURDWARA"  ? 'selected' : '' }} >GURDWARA (SIKH)</option>
                              <option value="GEREJA"    {{ $rumah_ibadat->category == "GEREJA"    ? 'selected' : '' }} >GEREJA (KRISTIAN)</option>
                          </select> --}}
                          @error('category')
                          <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md">
                      <label>Nama Penuh Persatuan Rumah Ibadat Mengikut Sijil</label>
                      <div class="form-group mb-3">
                          <input class="form-control text-uppercase @error('name_association') is-invalid @else border-dark @enderror" id="name_association" name="name_association" type="text" value="{{ $rumah_ibadat->name_association }}" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" disabled>
                          @error('name_association')
                          <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-2"></div>
                  </div>

                  <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md">
                      <div class="form-group">
                          <label class="mr-sm-2" for="inlineFormCustomSelect">Jenis Pendaftaran</label>
                          <input class="form-control text-uppercase @error('name_asregistration_typesociation') is-invalid @else border-dark @enderror" id="registration_type" name="registration_type" type="text" value="{{ $rumah_ibadat->registration_type == "SENDIRI" ? "MEMPUNYAI PENDAFTARAN SENDIRI" : "MEMPUNYAI PENDAFTARAN DI BAWAH PERSATUAN INDUK/CAWANGAN"}}" disabled>

                          {{-- <select class="custom-select mr-sm-2 @error('registration_type') is-invalid @else border-dark @enderror" id="registration_type" name="registration_type" value="{{ $rumah_ibadat->registration_type }}" onchange="changeRegistration()" disabled>
                              <option selected disabled hidden>PILIH JENIS PENDAFTARAN</option>
                              <option value="SENDIRI"    {{ $rumah_ibadat->registration_type == "SENDIRI"     ? 'selected' : '' }} >MEMPUNYAI PENDAFTARAN SENDIRI</option>
                              <option value="INDUK"      {{ $rumah_ibadat->registration_type == "INDUK"       ? 'selected' : '' }} >MEMPUNYAI PENDAFTARAN DI BAWAH PERSATUAN INDUK/CAWANGAN</option>
                          </select> --}}
                          @error('category')
                          <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md">
                      @if($rumah_ibadat->registration_type == "SENDIRI")
                      <label class="mr-sm-2" for="inlineFormCustomSelect">Nombor Sijil Pendaftaran / Nombor ROS</label>
                      @else 
                      <label class="mr-sm-2" for="inlineFormCustomSelect">Nombor Pendaftaran Cawangan</label>
                      @endif
                      <input class="form-control text-uppercase @error('name_asregistration_typesociation') is-invalid @else border-dark @enderror" id="registration_type" name="registration_type" type="text" value="{{ $rumah_ibadat->registration_type == "SENDIRI" ? $rumah_ibadat->registration_number : explode("%", $rumah_ibadat->registration_number, 2)[1]}}" disabled>
                    </div>
                    <div class="col-md-2"></div>
                  </div>

                  <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md">
                      <hr>
                    </div>
                    <div class="col-md-2"></div>
                  </div>

                  <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                      <label class="required">Dokumen Sokongan</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="supported_document" name="supported_document">
                        <label class="custom-file-label" for="attachment1">Muat Naik Fail</label>
                      </div>
                    </div>
                    <div class="col-md-2"></div>
                  </div>

                  <div class="row" style="padding-top: 15px;">
                    <div class="col-md-2"></div>
                    <div class="col-md">
                      <label class="required">Ulasan</label> 
                      <div class="form-group">
                          <textarea class="form-control text-uppercase  border-dark " id="comment" name="comment" rows="4" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);"></textarea>
                                                  </div>
                    </div>
                    <div class="col-md-2"></div>
                  </div>

                  {{-- Submit Button --}}
                  <div class="row" style="padding-top: 15px;">
                    <div class="col-md-2"></div>
                    <div class="col-md" style="text-align: center;">
                      <button type="button" class="btn waves-effect waves-light btn-info btn-block" id="validation_button">Tukar Hak Milik Rumah Ibadat</button>
                    </div>
                    <div class="col-md-2"></div>
                  </div>

                  {{-- Hidden Gap - Just Ignore --}}
                  <div class="alert alert-white" style="text-align: center;"></div>
                  {{-- <div style="padding: 25px;"></div> --}}
              </div>

              <!-- Modal Confirmation -->
              <div class="modal fade" id="submit_form_tukar_rumah_ibadat" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbspPengesahan!</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Anda pasti maklumat ini sah?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                      <button type="submit" class="btn btn-success">Hantar Permohonan</button>
                    </div>
                  </div>
                </div>
              </div>

            </form>

            {{-- Modal Validation --}}
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
      </div>
  </div>

</div>

<script>
  // ================= UPLOAD INPUT FILE CHECKER =================

  $(".custom-file-input").on("change", function() {
    //---------- FILE TYPE CHECKER ----------
    var filePath = $(this).val();
    var allowedExtensions = /(\.pdf|\.jpeg|\.jpg|\.png)$/i; // \.pdf|\.doc|\.docx|\.xls|\.xlsx|\.jpeg|\.jpg|\.png|\.zip|\.rar
    if(!allowedExtensions.exec(filePath)){
    //change border color to black
    $(this).next('.custom-file-label').removeClass( "border-success" ).addClass("border-dark");
    $(this).removeClass("is-valid");

    //alert message
    // alert('Sila muatnaik file dalam format .pdf, .jpeg , .jpg dan .png sahaja.');
    $('#note_message').html('Sila muatnaik file dalam format <b>.pdf</b> , <b>.jpeg</b> , <b>.jpg</b> dan <b>.png</b> sahaja.');
    $("#validation_submit_permohonan").modal();

    //reset file value
    $(this).val(null);

    //reset file name
    var fileName = "Muat Naik Fail";
    $(this).next('.custom-file-label').html(fileName);

    return false;
    }

    //---------- FILE SIZE CHECKER ----------
    var numb = $(this)[0].files[0].size/1024 /1024 ;
    numb = numb.toFixed(2);
    
    if(numb > 1.0){  //change file limit HERE!!! (MB)
    //change border color to black
    $(this).next('.custom-file-label').removeClass( "border-success" ).addClass("border-dark");
    $(this).removeClass("is-valid");

    //alert message
    // alert('Ralat! Fail anda melebihi 1mb. Saiz fail anda adalah: ' + numb +' MB');
    $('#note_message').html('Ralat! Fail anda melebihi <b>1mb</b>. Saiz fail anda adalah: <b>' + numb +' MB</b>');
    $("#validation_submit_permohonan").modal();

    //reset file value
    $(this).val(null);

    //reset file name
    var fileName = "Muat Naik Fail";
    $(this).next('.custom-file-label').html(fileName);

    return false;
    }

    //file name display
    var fileName = $(this).val().split("\\").pop();

    //change border color to green
    $(this).siblings(".custom-file-label").removeClass( "border-dark" ).addClass("border-success").addClass("selected").html(fileName);
    $(this).addClass("is-valid");
  });

  // ================= END OF UPLOAD FILE INPUT CHECKER =================
</script>

{{-- ALERT!!! - THIS SCRIPT FOR INPUT NUMBER AND DOTS ONLY --}}

<script type="text/javascript">
 function fun_AllowOnlyAmountAndDot(txt)
{ 
  
    if(event.keyCode > 47 && event.keyCode < 58 || event.keyCode == 46)
    {
        var txtbx=document.getElementById(txt);
        var amount = document.getElementById(txt).value;
        var present=0;
        var count=0;

        

        if(amount.indexOf(".",present)||amount.indexOf(".",present+1));
        {
      // alert('0');
        }

      /*if(amount.length==2)
      {
        if(event.keyCode != 46)
        return false;
      }*/
        do
        {
        present=amount.indexOf(".",present);
        if(present!=-1)
        {
          count++;
          present++;
          }
        }
        while(present!=-1);
        if(present==-1 && amount.length==0 && event.keyCode == 46)
        {
            event.keyCode=0;
            //alert("Wrong position of decimal point not  allowed !!");
            return false;
        }

        if(count>=1 && event.keyCode == 46)
        {

            event.keyCode=0;
            //alert("Only one decimal point is allowed !!");
            return false;
        }
        if(count==1)
        {
        var lastdigits=amount.substring(amount.indexOf(".")+1,amount.length);
        if(lastdigits.length>=2)
                    {
                      //alert("Two decimal places only allowed");
                      event.keyCode=0;
                      return false;
                      }
        }
            return true;
    }
    else
    {
            event.keyCode=0;
            //alert("Only Numbers with dot allowed !!");
            return false;
    }

}
</script>
<script>
  $("#validation_button").click(function(){
    var comment = $('#comment').val();
    var supported_document = $('#supported_document').val();

    

    if(supported_document == ""){
      $('#note_message').html('Sila muat naik <b>Dokumen Sokongan</b>');
      $("#validation_submit_permohonan").modal();
      return false;
    }

    if(comment == ""){
      $('#note_message').html('Sila isi <b>Ulasan</b>');
      $("#validation_submit_permohonan").modal();
      return false;
    }

    $("#submit_form_tukar_rumah_ibadat").modal();
  });
</script>
@endsection
