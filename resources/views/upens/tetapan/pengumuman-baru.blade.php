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
            
              <div class="card-body border border-dark">

                <form action="{{ route('upens.tetapan.pengumuman.baru.submit') }}">

                  <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md">
                      <label class="required">Tajuk Pengumuman</label>
                      <div class="form-group mb-3">
                          <input class="form-control text-uppercase  border-dark " id="title" name="title" type="text" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);">
                      </div>
                    </div>
                    <div class="col-md-2"></div>
                  </div>

                  <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md">
                      <label class="required">Isi kandungan</label>
                      <div class="form-group">
                          <textarea class="form-control text-uppercase  border-dark " id="content" name="content" rows="5" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);"></textarea>
                      </div>
                    </div>
                    <div class="col-md-2"></div>
                  </div>

                  <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                      <label class="required" style="padding-bottom: 10px;">Peranan</label>
                      <fieldset class="checkbox">
                          <label>
                              <input type="checkbox" value="pemohon" id="peranan1" name="peranan[]"> Pemohon
                          </label>
                      </fieldset>
                      <fieldset class="checkbox">
                          <label>
                              <input type="checkbox" value="exco" id="peranan2" name="peranan[]"> Exco
                          </label>
                      </fieldset>
                      {{-- <fieldset class="checkbox">
                          <label>
                              <input type="checkbox" value="admin" id="peranan3" name="peranan[]"> Admin Sistem
                          </label>
                      </fieldset> --}}
                      
                    </div>
                    <div class="col-md-4">
                      <label style="padding-bottom: 10px;">&nbsp</label>
                      <fieldset class="checkbox">
                          <label>
                              <input type="checkbox" value="yb" id="peranan4" name="peranan[]"> Pejabat YB
                          </label>
                      </fieldset>
                      <fieldset class="checkbox">
                          <label>
                              <input type="checkbox" value="upen" id="peranan5" name="peranan[]"> Pejabat UPEN
                          </label>
                      </fieldset>
                      
                    </div>
                    <div class="col-md-2"></div>
                  </div>

                  <div class="row" style="padding-top: 15px;">
                    <div class="col-md-2"></div>
                    <div class="col-md">
                      <button type="button" class="btn waves-effect waves-light btn-info btn-block" id="validation_button">Papar Pengumuman</button>
                    </div>
                    <div class="col-md-2"></div>
                  </div>

                <!-- Modal Confirmation Submit Pengumuman -->
                <div class="modal fade" id="submit_pengumuman" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbspPengesahan!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="#">
                      <div class="modal-body">
                        Anda pasti mahu memaparkan pengumuman ini?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-success">Papar Pengumuman</button>
                      </div>
                      </form>
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

</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<script>
  $("#validation_button").click(function(){
    var title = $('#title').val();
    var content = $('#content').val();

    console.log(title);

    if(title == ""){
      $('#note_message').html('Sila isi <b>Tajuk Pengumuman</b>');
      $("#validation_submit_permohonan").modal();
      return false;
    }

    if(content == ""){
      $('#note_message').html('Sila isi <b>Isi Kandungan</b>');
      $("#validation_submit_permohonan").modal();
      return false;
    }

    if(!$('#peranan1').is(':checked') && !$('#peranan2').is(':checked') && !$('#peranan3').is(':checked') && !$('#peranan4').is(':checked') && !$('#peranan5').is(':checked')){
    $('#note_message').html('Sila pilih sekurang-kurangnya <b>1 Peranan</b>.');
      $("#validation_submit_permohonan").modal();
      return false;
    }

    //display c5nfirmartion input
    $("#submit_pengumuman").modal();
  });
</script>
@endsection