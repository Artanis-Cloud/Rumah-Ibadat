@extends('layouts.layout-upen')

@section('content')


    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">

        <div class="row">
            {{-- <div class="col-2"></div> --}}
            <div class="col-12">
                <div class="card">
                    <form method="POST" action="{{ route('upens.permohonan-khas.hantar') }}"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="card-body border border-dark">

                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="mr-sm-2 required" for="inlineFormCustomSelect">Kategori Rumah
                                            Ibadat</label>
                                        <select
                                            class="custom-select mr-sm-2 @error('category') is-invalid @else border-dark @enderror"
                                            id="category" name="category" value="{{ old('category') }}">
                                            <option selected disabled hidden>PILIH KATEGORI RUMAH IBADAT</option>
                                            <option selected disabled hidden>PILIH KATEGORI RUMAH IBADAT</option>
                                            <option value="TOKONG" {{ old('category') == 'TOKONG' ? 'selected' : '' }}>
                                                TOKONG (BUDDHA & TAO)</option>
                                            <option value="KUIL" {{ old('category') == 'KUIL' ? 'selected' : '' }}>
                                                KUIL (HINDU)</option>
                                            <option value="GURDWARA"
                                                {{ old('category') == 'GURDWARA' ? 'selected' : '' }}>GURDWARA (SIKH)
                                            </option>
                                            <option value="GEREJA" {{ old('category') == 'GEREJA' ? 'selected' : '' }}>
                                                GEREJA (KRISTIAN)</option>
                                        </select>
                                        @error('category')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6"></div>
                            </div>

                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md">
                                    <label class="required">Tujuan Permohonan</label>
                                    <div class="form-group">
                                        <textarea
                                            class="form-control text-uppercase @error('purpose') is-invalid @else border-dark @enderror"
                                            id="purpose" name="purpose" rows="3"
                                            oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);">{{ old('address') }}</textarea>
                                        @error('purpose')
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
                                    <label class="required">Dokumen Sokongan 1</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="lampiran_1" name="lampiran_1">
                                        <label class="custom-file-label border-dark" for="lampiran_1">Muat Naik Fail</label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <label class="required">Dokumen Sokongan 2</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="lampiran_2" name="lampiran_2">
                                        <label class="custom-file-label border-dark" for="lampiran_2">Muat Naik Fail</label>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </div>

                            <div class="row" style="padding-top: 10px;">
                                <div class="col-md-2"></div>
                                <div class="col-md">
                                    <label class="required">Jumlah Peruntukan (RM)</label>
                                    <div class="form-group mb-3">
                                        <input
                                            class="form-control text-uppercase @error('requested_amount') is-invalid @else border-dark @enderror"
                                            id="requested_amount" name="requested_amount" type="text"
                                            value="{{ old('requested_amount') }}"
                                            onkeypress="return fun_AllowOnlyAmountAndDot(this.id);">
                                        @error('request_amount')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </div>


                            {{-- Submit Button --}}
                            <div class="row" style="padding-top: 25px;">
                                <div class="col-md-3"></div>
                                <div class="col-md-6" style="text-align: center;">
                                    <button type="button" class="btn waves-effect waves-light btn-info btn-block"
                                        id="validation_button">Hantar Permohonan Khas</button>
                                </div>
                                <div class="col-md-3"></div>
                            </div>

                        </div>

                        <!-- Modal Confirmation -->
                        <div class="modal fade" id="submit_form_khas" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle"><i
                                                class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbspPengesahan!
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Anda pasti mahu menghantar permohonan ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-success"
                                            onclick="return loading_modal();">Hantar Permohonan Khas</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Modal Validation --}}
                        <div class="modal fade" id="validation_submit_permohonan" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle"><i
                                                class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbspPeringatan!
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
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
                                                <h4>Permohonan anda sedang diproses.</h4>
                                                <h5 style="color: red;">(Sila kekal di halaman ini sehingga selesai)</h5>
                                            </div>
                                            <div class="col-md-1"></div>
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
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <script>
        //will open a model that warn user to not close the browser
        function loading_modal() {
            $('#submit_form_khas').modal('hide');
            $("#loading_upload").modal({
                backdrop: 'static',
                keyboard: false
            });
        }
        // ================= UPLOAD INPUT FILE CHECKER =================

        $(".custom-file-input").on("change", function() {
            //---------- FILE TYPE CHECKER ----------
            var filePath = $(this).val();
            var allowedExtensions =
            /(\.pdf|\.jpeg|\.jpg|\.png)$/i; // \.pdf|\.doc|\.docx|\.xls|\.xlsx|\.jpeg|\.jpg|\.png|\.zip|\.rar
            if (!allowedExtensions.exec(filePath)) {
                //change border color to black
                $(this).next('.custom-file-label').removeClass("border-success").addClass("border-dark");
                $(this).removeClass("is-valid");

                //alert message
                // alert('Sila muatnaik file dalam format .pdf, .jpeg , .jpg dan .png sahaja.');
                $('#note_message').html(
                    'Sila muatnaik file dalam format <b>.pdf</b> , <b>.jpeg</b> , <b>.jpg</b> dan <b>.png</b> sahaja.'
                    );
                $("#validation_submit_permohonan").modal();

                //reset file value
                $(this).val(null);

                //reset file name
                var fileName = "Muat Naik Fail";
                $(this).next('.custom-file-label').html(fileName);

                return false;
            }

            //---------- FILE SIZE CHECKER ----------
            var numb = $(this)[0].files[0].size / 1024 / 1024;
            numb = numb.toFixed(2);

            if (numb > 5.0) { //change file limit HERE!!! (MB)
                //change border color to black
                $(this).next('.custom-file-label').removeClass("border-success").addClass("border-dark");
                $(this).removeClass("is-valid");

                //alert message
                // alert('Ralat! Fail anda melebihi 1mb. Saiz fail anda adalah: ' + numb +' MB');
                $('#note_message').html('Ralat! Fail anda melebihi <b>5mb</b>. Saiz fail anda adalah: <b>' + numb +
                    ' MB</b>');
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
            $(this).siblings(".custom-file-label").removeClass("border-dark").addClass("border-success").addClass(
                "selected").html(fileName);
            $(this).addClass("is-valid");
        });

        // ================= END OF UPLOAD FILE INPUT CHECKER =================
    </script>

    {{-- ALERT!!! - THIS SCRIPT FOR INPUT NUMBER AND DOTS ONLY --}}

    <script type="text/javascript">
        function fun_AllowOnlyAmountAndDot(txt) {

            if (event.keyCode > 47 && event.keyCode < 58 || event.keyCode == 46) {
                var txtbx = document.getElementById(txt);
                var amount = document.getElementById(txt).value;
                var present = 0;
                var count = 0;



                if (amount.indexOf(".", present) || amount.indexOf(".", present + 1)); {
                    // alert('0');
                }

                /*if(amount.length==2)
                {
                  if(event.keyCode != 46)
                  return false;
                }*/
                do {
                    present = amount.indexOf(".", present);
                    if (present != -1) {
                        count++;
                        present++;
                    }
                }
                while (present != -1);
                if (present == -1 && amount.length == 0 && event.keyCode == 46) {
                    event.keyCode = 0;
                    //alert("Wrong position of decimal point not  allowed !!");
                    return false;
                }

                if (count >= 1 && event.keyCode == 46) {

                    event.keyCode = 0;
                    //alert("Only one decimal point is allowed !!");
                    return false;
                }
                if (count == 1) {
                    var lastdigits = amount.substring(amount.indexOf(".") + 1, amount.length);
                    if (lastdigits.length >= 2) {
                        //alert("Two decimal places only allowed");
                        event.keyCode = 0;
                        return false;
                    }
                }
                return true;
            } else {
                event.keyCode = 0;
                //alert("Only Numbers with dot allowed !!");
                return false;
            }

        }
    </script>

    <script>
        $("#validation_button").click(function() {
            var category = $('#category').val();
            var purpose = $('#purpose').val();
            var lampiran_1 = $('#lampiran_1').val();
            var lampiran_2 = $('#lampiran_2').val();
            var request_amount = $('#request_amount').val();

            if (category == null) {
                $('#note_message').html('Sila pilih <b>Kategori Rumah Ibadat</b>');
                $("#validation_submit_permohonan").modal();
                return false;
            }

            if (purpose == "") {
                $('#note_message').html('Sila isi <b>Tujuan Permohonan</b>');
                $("#validation_submit_permohonan").modal();
                return false;
            }

            if (lampiran_1 == "" && lampiran_2 == "") {
                $('#note_message').html('Sila muat naik sekurang-kurangnya 1 <b>Dokumen Sokongan</b>');
                $("#validation_submit_permohonan").modal();
                return false;
            }

            if (request_amount == "") {
                $('#note_message').html('Sila isi <b>Jumlah Peruntukan</b>');
                $("#validation_submit_permohonan").modal();
                return false;
            }

            $("#submit_form_khas").modal();
        });
    </script>
@endsection
