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
                              <input type="checkbox" value="PENDIDIKAN KEAGAMAAN" id="tujuan_1" name="tujuan_1"> Pendidikan Keagamaan
                          </label>
                      </fieldset>
                      <fieldset class="checkbox">
                          <label>
                              <input type="checkbox" value="AKTIVITI KEAGAMAAN" id="tujuan_2" name="tujuan_2"> Aktiviti Keagamaan
                          </label>
                      </fieldset>
                      <fieldset class="checkbox">
                          <label>
                              <input type="checkbox" value="PEMBELIAN PERALATAN UNTUK KELAS KEAGAMAAN" id="tujuan_3" name="tujuan_3"> Pembelian Peralatan untuk kelas keagamaan
                          </label>
                      </fieldset>
                      
                    </div>
                    <div class="col-md-4">
                      <label style="padding-bottom: 10px;">&nbsp</label>
                      <fieldset class="checkbox">
                          <label>
                              <input type="checkbox" value="BAIK PULIH/PENYELENGGARAAN BANGUNAN" id="tujuan_4" name="tujuan_4"> Baik Pulih/Penyelenggaraan Bangunan
                          </label>
                      </fieldset>
                      <fieldset class="checkbox">
                          <label>
                              <input type="checkbox" value="PEMINDAHAN/PEMBINAAN BARU RUMAH IBADAT" id="tujuan_5" name="tujuan_5"> Pemindahan/Pembinaan Baru Rumah Ibadat
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
                        <h3>Pendidikan Keagamaan</h3>
                      </div>
                      <div class="col-md-2"></div>
                    </div>

                    <div class="row">
                      <div class="col-md-2"></div>
                      <div class="col-md">
                        <label class="required">Foto bangunan atau aktiviti persatuan agama</label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="opt_1_photo_1" name="opt_1_photo_1">
                          <label class="custom-file-label border-dark" for="opt_1_photo_1">Gambar 1</label>
                        </div>
                      </div>
                      <div class="col-md">
                        <label>&nbsp</label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="opt_1_photo_2" name="opt_1_photo_2">
                          <label class="custom-file-label border-dark" for="opt_1_photo_2">Gambar 2</label>
                        </div>
                      </div>
                      <div class="col-md-2"></div>
                    </div>

                    <div class="row">
                      <div class="col-md-2"></div>
                      <div class="col-md">
                        <label>&nbsp</label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="opt_1_photo_3" name="opt_1_photo_3">
                          <label class="custom-file-label border-dark" for="opt_1_photo_3">Gambar 3</label>
                        </div>
                      </div>
                      <div class="col-md">
                        <label>&nbsp</label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="opt_1_photo_4" name="opt_1_photo_4">
                          <label class="custom-file-label border-dark" for="opt_1_photo_4">Gambar 4</label>
                        </div>
                      </div>
                      <div class="col-md-2"></div>
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
                        <h3>Aktiviti Keagamaan</h3>
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
                        <label class="required">Salinan sebutharga alat perkakas kontraktor</label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="opt_2_file_1" name="opt_2_file_1">
                          <label class="custom-file-label border-dark" for="opt_2_file_1">Muat Naik Fail</label>
                        </div>
                      </div>
                      <div class="col-md-2"></div>
                    </div>

                    <div class="row">
                      <div class="col-md-2"></div>
                      <div class="col-md">
                        <label class="required">Foto alat perkakas</label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="opt_3_photo_1" name="opt_3_photo_1">
                          <label class="custom-file-label border-dark" for="opt_3_photo_1">Gambar 1</label>
                        </div>
                      </div>
                      <div class="col-md">
                        <label>&nbsp</label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="opt_3_photo_2" name="opt_3_photo_2">
                          <label class="custom-file-label border-dark" for="opt_3_photo_2">Gambar 2</label>
                        </div>
                      </div>
                      <div class="col-md-2"></div>
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

                    <div class="row">
                      <div class="col-md-2"></div>
                      <div class="col-md">
                        <label class="required">Foto bahagian tokong</label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="opt_4_photo_1" name="opt_4_photo_1">
                          <label class="custom-file-label border-dark" for="opt_4_photo_1">Gambar 1</label>
                        </div>
                      </div>
                      <div class="col-md">
                        <label>&nbsp</label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="opt_4_photo_2" name="opt_4_photo_2">
                          <label class="custom-file-label border-dark" for="opt_4_photo_2">Gambar 2</label>
                        </div>
                      </div>
                      <div class="col-md-2"></div>
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
                      <label class="required">Salinan Kebenaran Merancang</label>
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

                  <div class="row">
                      <div class="col-md-2"></div>
                      <div class="col-md">
                        <label class="required">Foto bangunan</label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="opt_5_photo_1" name="opt_5_photo_1">
                          <label class="custom-file-label border-dark" for="opt_5_photo_1">Gambar 1</label>
                        </div>
                      </div>
                      <div class="col-md">
                        <label>&nbsp</label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="opt_5_photo_2" name="opt_5_photo_2">
                          <label class="custom-file-label border-dark" for="opt_5_photo_2">Gambar 2</label>
                        </div>
                      </div>
                      <div class="col-md-2"></div>
                    </div>

                  </div>
                  
                  {{-- Submit Button --}}
                  <div class="row" style="padding-top: 25px;"> 
                    <div class="col-md-3"></div>
                    <div class="col-md-6" style="text-align: center;">
                      <button type="button" class="btn waves-effect waves-light btn-info btn-block" data-toggle="modal" data-target="#confirmation">Hantar Permohonan</button>
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
                      Anda pasti mahu menghantar permohonan ini?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-success">Hantar Permohonan</button>
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
  // Display file name in input upload
  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });

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
        document.getElementById('tujuan_4_div').style.display = "block";
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
</script>
@endsection