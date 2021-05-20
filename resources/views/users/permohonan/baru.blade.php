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
            <form method="POST" action="{{ route('users.permohonan.baru.hantar') }}">
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
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                      <label class="required" style="padding-bottom: 10px;">Pilih Tujuan Permohonan</label>
                      <fieldset class="checkbox">
                          <label>
                              <input type="checkbox" value="AKTIVITI KEAGAMAAN" id="tujuan_1" name="tujuan[]"> Aktiviti Keagamaan
                          </label>
                      </fieldset>
                      <fieldset class="checkbox">
                          <label>
                              <input type="checkbox" value="PENDIDIKAN KEAGAMAAN" id="tujuan_2" name="tujuan[]"> Pendidikan Keagamaan
                          </label>
                      </fieldset>
                      <fieldset class="checkbox">
                          <label>
                              <input type="checkbox" value="PEMBELIAN PERALATAN UNTUK KELAS KEAGAMAAN" id="tujuan_3" name="tujuan[]"> Pembelian Peralatan untuk kelas keagamaan
                          </label>
                      </fieldset>
                      
                    </div>
                    <div class="col-md-4">
                      <label style="padding-bottom: 10px;">&nbsp</label>
                      <fieldset class="checkbox">
                          <label>
                              <input type="checkbox" value="BAIK PULIH/PENYELENGGARAAN BANGUNAN" id="tujuan_4" name="tujuan[]"> Baik Pulih/Penyelenggaraan Bangunan
                          </label>
                      </fieldset>
                      <fieldset class="checkbox">
                          <label>
                              <input type="checkbox" value="PEMINDAHAN/PEMBINAAN BARU RUMAH IBADAT" id="tujuan_5" name="tujuan[]"> Pemindahan/Pembinaan Baru Rumah Ibadat
                          </label>
                      </fieldset>
                    </div>
                    <div class="col-md-2"></div>
                  </div>

                  <div class="row" style="padding-top: 20px; padding-bottom: 20px;">
                    <div class="col-md-2"></div>
                    <div class="col-md">
                      <hr>
                    </div>
                    <div class="col-md-2"></div>
                  </div>

                  <div class="row">
                      <div class="col-md-2"></div>
                      <div class="col-md">
                        <h3>Dokumen-Dokumen Lampiran</h3>
                      </div>
                      <div class="col-md-2"></div>
                    </div>

                  <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md">
                      <label class="required">Surat Permohonan</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="application_letter" name="application_letter">
                        <label class="custom-file-label border-dark" for="application_letter">Muat Naik Fail</label>
                      </div>
                    </div>
                    <div class="col-md">
                      <label class="required">Surat Sokongan</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="support_letter" name="support_letter">
                        <label class="custom-file-label border-dark" for="support_letter">Muat Naik Fail</label>
                      </div>
                    </div>
                    <div class="col-md-2"></div>
                  </div>

                  <div class="row" style="padding-top: 15px;">
                    <div class="col-md-2"></div>
                    <div class="col-md">
                      <label class="required">Penyata Bank Terkini</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="account_statement" name="account_statement">
                        <label class="custom-file-label border-dark" for="account_statement">Muat Naik Fail</label>
                      </div>
                    </div>
                    <div class="col-md">
                      <label class="required">Penyata Perbelanjaan Terkini</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="spending_statement" name="spending_statement">
                        <label class="custom-file-label border-dark" for="spending_statement">Muat Naik Fail</label>
                      </div>
                    </div>
                    <div class="col-md-2"></div>
                  </div>

                  <div class="row" style="padding-top: 15px;">
                    <div class="col-md-2"></div>
                    <div class="col-md">
                      <label>Senarai Ahli Jawatan Kuasa Rumah Ibadat</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="committee_member" name="committee_member">
                        <label class="custom-file-label border-dark" for="committee_member">Muat Naik Fail</label>
                      </div>
                    </div>
                    <div class="col-md-2"></div>
                  </div>

                  {{-- TUJUAN FORM --}}
                  <div id="tujuan_1_div" style="display: none;">

                    <div class="row" style="padding-top: 20px; padding-bottom: 20px;">
                    <div class="col-md-2"></div>
                    <div class="col-md">
                      <hr>
                    </div>
                    <div class="col-md-2"></div>
                  </div>

                    <div class="row">
                      <div class="col-md-2"></div>
                      <div class="col-md">
                        <h3>Aktiviti Keagamaan</h3>
                      </div>
                      <div class="col-md-2"></div>
                    </div>

                    <div class="field_wrapper_option_1">
                      <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                          <label class="required">Foto bangunan atau aktiviti persatuan agama</label>
                          <div class="input-group-prepend">
                              <div class="input-group-prepend">
                                <button class="btn btn-success border-dark" id="add_input_opt_1" type="button" data-toggle="tooltip" data-placement="left" title="" data-original-title="Tambah Gambar"><i class="fas fa-plus"></i></button>
                              </div>
                              <div class="custom-file">
                                  <input type="file" class="custom-file-input-image" id="opt_1_photo1" name="opt_1_photo[]" disabled>
                                  <label class="custom-file-label border-dark" for="opt_1_photo1">Muat Naik Gambar</label>
                              </div>
                          </div>
                          
                          {{-- display upload image --}}
                          {{-- <br><img id="output" style="width: 400px; margin-left: auto; margin-right: auto; display: block;"/> --}}
                        </div>
                        <div class="col-md-2"></div>
                      </div>
                    </div>

                  </div>

                  <div id="tujuan_2_div" style="display: none;">

                    <div class="row" style="padding-top: 20px; padding-bottom: 20px;">
                      <div class="col-md-2"></div>
                      <div class="col-md">
                        <hr>
                      </div>
                      <div class="col-md-2"></div>
                    </div>

                    <div class="row">
                      <div class="col-md-2"></div>
                      <div class="col-md">
                        <h3>Pendidikan Keagamaan</h3>
                      </div>
                      <div class="col-md-2"></div>
                    </div>

                    <div class="row">
                      <div class="col-md-2"></div>
                      <div class="col-md">
                        <label class="required">Senarai nama murid, kad pengenalan, jantina dan umur murid</label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="opt_2_file_1" name="opt_2_file_1">
                          <label class="custom-file-label border-dark" for="opt_2_file_1">Muat Naik Fail</label>
                        </div>
                      </div>
                      <div class="col-md-2"></div>
                    </div>

                  </div>

                  <div id="tujuan_3_div" style="display: none;">

                    <div class="row" style="padding-top: 20px; padding-bottom: 20px;">
                      <div class="col-md-2"></div>
                      <div class="col-md">
                        <hr>
                      </div>
                      <div class="col-md-2"></div>
                    </div>

                    <div class="row">
                      <div class="col-md-2"></div>
                      <div class="col-md">
                        <h3>Pembelian Peralatan untuk kelas keagamaan</h3>
                      </div>
                      <div class="col-md-2"></div>
                    </div>

                    <div class="row">
                      <div class="col-md-2"></div>
                      <div class="col-md">
                        <label class="required">Salinan sebutharga daripada kontraktor</label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="opt_2_file_1" name="opt_2_file_1">
                          <label class="custom-file-label border-dark" for="opt_2_file_1">Muat Naik Fail</label>
                        </div>
                      </div>
                      <div class="col-md-2"></div>
                    </div>

                    <div class="field_wrapper_option_3" style="padding-top: 10px;">
                      <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md">
                          <label class="required">Foto lampiran</label>
                          <div class="input-group-prepend">
                              <div class="input-group-prepend">
                                <button class="btn btn-success border-dark" id="add_input_opt_3" type="button" data-toggle="tooltip" data-placement="left" title="" data-original-title="Tambah Gambar"><i class="fas fa-plus"></i></button>
                              </div>
                              <div class="custom-file">
                                  <input type="file" class="custom-file-input-image" id="opt_3_photo1" name="opt_3_photo[]">
                                  <label class="custom-file-label border-dark" for="opt_3_photo1">Muat Naik Gambar</label>
                              </div>
                          </div>
                        </div>
                        <div class="col-md-2"></div>
                      </div>
                    </div>

                  </div>

                  <div id="tujuan_4_div" style="display: none;">

                    <div class="row" style="padding-top: 20px; padding-bottom: 20px;">
                      <div class="col-md-2"></div>
                      <div class="col-md">
                        <hr>
                      </div>
                      <div class="col-md-2"></div>
                    </div>

                    <div class="row">
                      <div class="col-md-2"></div>
                      <div class="col-md">
                        <h3>Baik Pulih/Penyelenggaraan Bangunan</h3>
                      </div>
                      <div class="col-md-2"></div>
                    </div>

                    <div class="row">
                      <div class="col-md-2"></div>
                      <div class="col-md">
                        <label class="required">Salinan sebutharga daripada kontraktor</label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="opt_4_file_1" name="opt_4_file_1">
                          <label class="custom-file-label border-dark" for="opt_4_file_1">Muat Naik Fail</label>
                        </div>
                      </div>
                      <div class="col-md-2"></div>
                    </div>

                    <div class="field_wrapper_option_4" style="padding-top: 10px;">
                      <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md">
                          <label class="required">Foto bahagian bangunan</label>
                          <div class="input-group-prepend">
                              <div class="input-group-prepend">
                                <button class="btn btn-success border-dark" id="add_input_opt_4" type="button" data-toggle="tooltip" data-placement="left" title="" data-original-title="Tambah Gambar"><i class="fas fa-plus"></i></button>
                              </div>
                              <div class="custom-file">
                                  <input type="file" class="custom-file-input-image" id="opt_4_photo1" name="opt_4_photo[]">
                                  <label class="custom-file-label border-dark" for="opt_4_photo1">Muat Naik Gambar</label>
                              </div>
                          </div>
                        </div>
                        <div class="col-md-2"></div>
                      </div>
                    </div>

                  </div>

                  

                  <div id="tujuan_5_div" style="display: none;">

                    <div class="row" style="padding-top: 20px; padding-bottom: 20px;">
                      <div class="col-md-2"></div>
                      <div class="col-md">
                        <hr>
                      </div>
                      <div class="col-md-2"></div>
                    </div>

                    <div class="row">
                      <div class="col-md-2"></div>
                      <div class="col-md">
                        <h3>Pemindahan/Pembinaan Baru Rumah Ibadat</h3>
                      </div>
                      <div class="col-md-2"></div>
                    </div>

                    <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md">
                      <label class="required">Sebutharga kontraktor</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="opt_5_file_1" name="opt_5_file_1">
                        <label class="custom-file-label border-dark" for="opt_5_file_1">Muat Naik Fail</label>
                      </div>
                    </div>
                    <div class="col-md">
                      <label>Salinan Kebenaran Merancang</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="opt_5_file_2" name="opt_5_file_2">
                        <label class="custom-file-label border-dark" for="opt_5_file_2">Muat Naik Fail</label>
                      </div>
                    </div>
                    <div class="col-md-2"></div>
                  </div>

                  <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md">
                      <label class="required">Salinan Pelan Bangunan</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="opt_5_file_3" name="opt_5_file_3">
                        <label class="custom-file-label border-dark" for="opt_5_file_3">Muat Naik Fail</label>
                      </div>
                    </div>
                    <div class="col-md-2"></div>
                  </div>

                  <div class="field_wrapper_option_5" style="padding-top: 10px;">
                      <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md">
                          <label class="required">Foto bangunan</label>
                          <div class="input-group-prepend">
                              <div class="input-group-prepend">
                                <button class="btn btn-success border-dark" id="add_input_opt_5" type="button" data-toggle="tooltip" data-placement="left" title="" data-original-title="Tambah Gambar"><i class="fas fa-plus"></i></button>
                              </div>
                              <div class="custom-file">
                                  <input type="file" class="custom-file-input-image" id="opt_5_photo1" name="opt_5_photo[]">
                                  <label class="custom-file-label border-dark" for="opt_5_photo1">Muat Naik Gambar</label>
                              </div>
                          </div>
                        </div>
                        <div class="col-md-2"></div>
                      </div>
                    </div>

                  </div>
                  
                  {{-- Submit Button --}}
                  <div class="row" style="padding-top: 25px;"> 
                    <div class="col-md-3"></div>
                    <div class="col-md-6" style="text-align: center;">
                      <button type="button" id="validation_button" class="btn waves-effect waves-light btn-info btn-block">Hantar Permohonan</button>
                    </div>
                    <div class="col-md-3"></div>
                  </div>

                  {{-- Hidden Gap - Just Ignore --}}
                  <div class="alert alert-white" style="text-align: center;"></div>
                  {{-- <div style="padding: 25px;"></div> --}}
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
                      Anda pasti mahu menghantar permohonan ini?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-success">Hantar Permohonan</button>
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
            </form>
          </div>
      </div>
  </div>

</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<script>

  //checkbox display - option 1
  $("#tujuan_1").on('change', function() {

    if ($(this).is(':checked')) {
        //display form
        document.getElementById('tujuan_1_div').style.display = "block";
    } else {
        //hide form
        document.getElementById('tujuan_1_div').style.display = "none";
    }
  });

  //checkbox display - option 2
  $("#tujuan_2").on('change', function() {

    if ($(this).is(':checked')) {
        //display form
        document.getElementById('tujuan_2_div').style.display = "block";
    } else {
        //hide form
        document.getElementById('tujuan_2_div').style.display = "none";
    }
  });

  //checkbox display - option 3
  $("#tujuan_3").on('change', function() {

    if ($(this).is(':checked')) {
        //display form
        document.getElementById('tujuan_3_div').style.display = "block";
    } else {
        //hide form
        document.getElementById('tujuan_3_div').style.display = "none";
    }
  });

  //checkbox display - option 4
  $("#tujuan_4").on('change', function() {

    if ($(this).is(':checked')) {
        //display form
        document.getElementById('tujuan_4_div').style.display = " ";
    } else {
        //hide form
        document.getElementById('tujuan_4_div').style.display = "none";
    }
  });

  //checkbox display - option 5
  $("#tujuan_5").on('change', function() {

    if ($(this).is(':checked')) {
        //display form
        document.getElementById('tujuan_5_div').style.display = "block";
    } else {
        //hide form
        document.getElementById('tujuan_5_div').style.display = "none";
    }
  });


    // ================= UPLOAD INPUT FILE CHECKER =================

  $(".custom-file-input").on("change", function() {
    //---------- FILE TYPE CHECKER ----------
    var filePath = $(this).val();
    var allowedExtensions = /(\.pdf)$/i; // \.pdf|\.doc|\.docx|\.xls|\.xlsx|\.jpeg|\.jpg|\.png|\.zip|\.rar
    if(!allowedExtensions.exec(filePath)){
    //change border color to black
    $(this).next('.custom-file-label').removeClass( "border-success" ).addClass("border-dark");
    $(this).removeClass("is-valid");

    //alert message
    alert('Sila muatnaik file dalam format .pdf sahaja.');

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
    
    if(numb > 10.0){  //change file limit here (MB)
    //change border color to black
    $(this).next('.custom-file-label').removeClass( "border-success" ).addClass("border-dark");
    $(this).removeClass("is-valid");

    //alert message
    alert('Ralat! Fail anda melebihi 10MB. Saiz fail anda adalah: ' + numb +' MB');

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




  // ================= UPLOAD IMAGE INPUT CHECKER =================


  // $(".custom-file-input-image").on("change", function() {
  //   console.log("checker general");
  //   //---------- FILE TYPE CHECKER ----------
  //   var filePath = $(this).val();
  //   var allowedExtensions = /(\.jpeg|\.jpg|\.png)$/i; // \.pdf|\.doc|\.docx|\.xls|\.xlsx|\.jpeg|\.jpg|\.png|\.zip|\.rar
  //   if(!allowedExtensions.exec(filePath)){
  //   //change border color to black
  //   $(this).next('.custom-file-label').removeClass( "border-success" ).addClass("border-dark");
  //   $(this).removeClass("is-valid");

  //   //alert message
  //   alert('Sila muatnaik file dalam format .jpeg , .jpg dan .png sahaja.');

  //   //reset file value
  //   $(this).val(null);

  //   //reset file name
  //   var fileName = "Muat Naik Gambar";
  //   $(this).next('.custom-file-label').html(fileName);

  //   return false;
  //   }
    
  //   //---------- FILE SIZE CHECKER ----------
  //   var numb = $(this)[0].files[0].size/1024 /1024 ;
  //   numb = numb.toFixed(2);
  //   if(numb > 10.0){ //change file limit here (MB)
  //   //change border color to black
  //   $(this).next('.custom-file-label').removeClass( "border-success" ).addClass("border-dark");
  //   $(this).removeClass("is-valid");

  //   //alert message
  //   alert('Ralat! Fail anda melebihi 10MB. Saiz fail anda adalah: ' + numb +' MB');

  //   //reset file value
  //   $(this).val(null);

  //   //reset file name
  //   var fileName = "Muat Naik Gambar";
  //   $(this).next('.custom-file-label').html(fileName);

  //   return false;
  //   }
    
  //   //file name display
  //   var fileName = $(this).val().split("\\").pop();

  //   //change border color to green
  //   $(this).siblings(".custom-file-label").removeClass( "border-dark" ).addClass("border-success").addClass("selected").html(fileName);
  //   $(this).addClass("is-valid");
  // });

  // ================= END OF UPLOAD IMAGE INPUT CHECKER =================
</script>


<script type="text/javascript">
// ================= DYNAMIC IMAGE UPLOAD FOR OPTION 1 =================

$(document).ready(function(){
    var number_of_image = 5 //Input fields increment limitation

    var maxField_option1 = number_of_image;
    var maxField_option3 = number_of_image; 
    var maxField_option4 = number_of_image;  
    var maxField_option5 = number_of_image; 

    //Add button selector
    var addButton_option1 = $("#add_input_opt_1");
    var addButton_option3 = $("#add_input_opt_3"); 
    var addButton_option4 = $("#add_input_opt_4"); 
    var addButton_option5 = $("#add_input_opt_5"); 

    //Input field wrapper
    var wrapper_option1 = $('.field_wrapper_option_1');
    var wrapper_option3 = $('.field_wrapper_option_3'); 
    var wrapper_option4 = $('.field_wrapper_option_4'); 
    var wrapper_option5 = $('.field_wrapper_option_5'); 
    var wrapper_general = $('.field_wrapper_option_1, .field_wrapper_option_3, .field_wrapper_option_4, .field_wrapper_option_5');

    //increment
    var x_opt1 = 1;
    var x_opt3 = 1; 
    var x_opt4 = 1; 
    var x_opt5 = 1; 

    //Initial field counter is 1
    var y_opt1 = 1; 
    var y_opt3 = 1; 
    var y_opt4 = 1; 
    var y_opt5 = 1; 

    //***************************************** OPTION 1 *****************************************
    
    //Once add button is clicked
    $(addButton_option1).click(function(){
        //Check maximum number of input fields
        if(y_opt1 < maxField_option1){ 
            x_opt1++;
            y_opt1++; //Increment field counter
            $(wrapper_option1).append('<div class="row"><div class="col-md-2"></div><div class="col-md"><label>&nbsp</label><div class="input-group-prepend"><div class="input-group-prepend"><button class="btn btn-danger border-dark" id="remove_input_opt_1" type="button" data-toggle="tooltip" data-placement="left" title="" data-original-title="Buang Gambar"><i class="fas fa-times"></i></button></div><div class="custom-file"><input type="file" class="custom-file-input-image" id="opt_1_photo' + x_opt1 + '" name="opt_1_photo[]"><label class="custom-file-label border-dark" for="opt_1_photo' + x_opt1 + '">Muat Naik Gambar</label></div></div></div><div class="col-md-2"></div></div>'); //Add field html
        }else{
          alert('Muat naik gambar terhad kepada 5 gambar sahaja untuk satu bahagian.');
        }
    });

    //Once remove button is clicked
    $(wrapper_option1).on('click', '#remove_input_opt_1', function(e){
        e.preventDefault();
        $(this).parent('div').parent('div').parent('div').remove(); //Remove field html
        y_opt1--; //Decrement field counter
    });

    //***************************************** END OF OPTION 1 *****************************************

    //***************************************** OPTION 3 *****************************************
    
    //Once add button is clicked
    $(addButton_option3).click(function(){
        //Check maximum number of input fields
        if(y_opt3 < maxField_option3){ 
            x_opt3++;
            y_opt3++; //Increment field counter
            $(wrapper_option3).append('<div class="row"><div class="col-md-2"></div><div class="col-md"><label>&nbsp</label><div class="input-group-prepend"><div class="input-group-prepend"><button class="btn btn-danger border-dark" id="remove_input_opt_3" type="button" data-toggle="tooltip" data-placement="left" title="" data-original-title="Buang Gambar"><i class="fas fa-times"></i></button></div><div class="custom-file"><input type="file" class="custom-file-input-image" id="opt_3_photo' + y_opt3 + '" name="opt_3_photo[]"><label class="custom-file-label border-dark" for="opt_3_photo' + y_opt3 + '">Muat Naik Gambar</label></div></div></div><div class="col-md-2"></div></div>'); //Add field html
        }else{
          alert('Muat naik gambar terhad kepada 5 gambar sahaja untuk satu bahagian.');
        }
    });

    //Once remove button is clicked
    $(wrapper_option3).on('click', '#remove_input_opt_3', function(e){
        e.preventDefault();
        $(this).parent('div').parent('div').parent('div').remove(); //Remove field html
        y_opt3--; //Decrement field counter
    });

    //***************************************** END OF OPTION 3 *****************************************

    //***************************************** OPTION 4 *****************************************
    
    //Once add button is clicked
    $(addButton_option4).click(function(){
        //Check maximum number of input fields
        if(y_opt4 < maxField_option4){ 
            x_opt4++;
            y_opt4++; //Increment field counter
            $(wrapper_option4).append('<div class="row"><div class="col-md-2"></div><div class="col-md"><label>&nbsp</label><div class="input-group-prepend"><div class="input-group-prepend"><button class="btn btn-danger border-dark" id="remove_input_opt_4" type="button" data-toggle="tooltip" data-placement="left" title="" data-original-title="Buang Gambar"><i class="fas fa-times"></i></button></div><div class="custom-file"><input type="file" class="custom-file-input-image" id="opt_4_photo' + y_opt4 + '" name="opt_4_photo[]"><label class="custom-file-label border-dark" for="opt_4_photo' + y_opt4 + '">Muat Naik Gambar</label></div></div></div><div class="col-md-2"></div></div>'); //Add field html
        }else{
          alert('Muat naik gambar terhad kepada 5 gambar sahaja untuk satu bahagian.');
        }
    });

    //Once remove button is clicked
    $(wrapper_option4).on('click', '#remove_input_opt_4', function(e){
        e.preventDefault();
        $(this).parent('div').parent('div').parent('div').remove(); //Remove field html
        y_opt4--; //Decrement field counter
    });

    //***************************************** END OF OPTION 4 *****************************************

    //***************************************** OPTION 5 *****************************************
    
    //Once add button is clicked
    $(addButton_option5).click(function(){
        //Check maximum number of input fields
        if(y_opt5 < maxField_option5){ 
            x_opt5++;
            y_opt5++; //Increment field counter
            $(wrapper_option5).append('<div class="row"><div class="col-md-2"></div><div class="col-md"><label>&nbsp</label><div class="input-group-prepend"><div class="input-group-prepend"><button class="btn btn-danger border-dark" id="remove_input_opt_5" type="button" data-toggle="tooltip" data-placement="left" title="" data-original-title="Buang Gambar"><i class="fas fa-times"></i></button></div><div class="custom-file"><input type="file" class="custom-file-input-image" id="opt_5_photo' + y_opt5 + '" name="opt_5_photo[]"><label class="custom-file-label border-dark" for="opt_5_photo' + y_opt5 + '">Muat Naik Gambar</label></div></div></div><div class="col-md-2"></div></div>'); //Add field html
        }else{
          alert('Muat naik gambar terhad kepada 5 gambar sahaja untuk satu bahagian.');
        }
    });

    //Once remove button is clicked
    $(wrapper_option5).on('click', '#remove_input_opt_5', function(e){
        e.preventDefault();
        $(this).parent('div').parent('div').parent('div').remove(); //Remove field html
        y_opt5--; //Decrement field counter
    });

    //***************************************** END OF OPTION 4 *****************************************

    //Image Upload Checker
    $(wrapper_general).on('change', '.custom-file-input-image', function(e){
        console.log('wrapper image checker');
        //---------- FILE TYPE CHECKER ----------
        var filePath = $(this).val();
        var allowedExtensions = /(\.jpeg|\.jpg|\.png)$/i; // \.pdf|\.doc|\.docx|\.xls|\.xlsx|\.jpeg|\.jpg|\.png|\.zip|\.rar
        if(!allowedExtensions.exec(filePath)){
        //change border color to black
        $(this).next('.custom-file-label').removeClass( "border-success" ).addClass("border-dark");
        $(this).removeClass("is-valid");

        //alert message
        alert('Sila muatnaik file dalam format .jpeg , .jpg dan .png sahaja.');

        //reset file value
        $(this).val(null);

        //reset file name
        var fileName = "Muat Naik Gambar";
        $(this).next('.custom-file-label').html(fileName);

        return false;
        }

        //---------- FILE SIZE CHECKER ----------
        var numb = $(this)[0].files[0].size/1024 /1024 ;
        numb = numb.toFixed(2);
        if(numb > 10.0){ //change file limit here (MB)
        //change border color to black
        $(this).next('.custom-file-label').removeClass( "border-success" ).addClass("border-dark");
        $(this).removeClass("is-valid");

        //alert message
        alert('Ralat! Fail anda melebihi 10MB. Saiz fail anda adalah: ' + numb +' MB');

        //reset file value
        $(this).val(null);

        //reset file name
        var fileName = "Muat Naik Gambar";
        $(this).next('.custom-file-label').html(fileName);

        return false;
        }

        //display upload image
        // console.log("shit here is entered");
        // var output = document.getElementById('output');
        // output.src = URL.createObjectURL(event.target.files[0]);
        // output.onload = function() {
        //   URL.revokeObjectURL(output.src) // free memory
        // }
        

        //file name display
        var fileName = $(this).val().split("\\").pop();

        //change border color to green
        $(this).siblings(".custom-file-label").removeClass( "border-dark" ).addClass("border-success").addClass("selected").html(fileName);
        $(this).addClass("is-valid");
    });
});

// ================= END OF DYNAMIC IMAGE UPLOAD FOR OPTION 1 =================

// ================= Validation form before submit =================

$(document).ready(function(){
  $("#validation_button").click(function(){
    
    //fetch data
    var application_letter = $('#application_letter').val();



    //validation tujuan
    if(!$('#tujuan_1').is(':checked') && !$('#tujuan_2').is(':checked') && !$('#tujuan_3').is(':checked') && !$('#tujuan_4').is(':checked') && !$('#tujuan_5').is(':checked')){
      $('#note_message').html('Sila pilih sekurang-kurangnya 1 tujuan.');
      $("#validation_submit_permohonan").modal();
      return false;
    }
    
    //validation surat permohonan
    if(application_letter == ""){
      $('#note_message').html('Sila muat naik surat permohonan');
      $("#validation_submit_permohonan").modal();
      return false;
    }


    //display confirmartion input
    $("#confirmation_submit_permohonan").modal();
  });
});
</script>
@endsection