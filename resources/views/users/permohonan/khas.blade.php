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
            <form method="POST" action="#">
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
                    <div class="col-md">
                      <div class="form-group">
                          <label class="mr-sm-2 required" for="inlineFormCustomSelect">Kategori Rumah Ibadat</label>
                          <select class="custom-select mr-sm-2 @error('category') is-invalid @else border-dark @enderror" id="category" name="category" value="{{ old('category') }}">
                              <option selected disabled hidden>PILIH KATEGORI RUMAH IBADAT</option>
                              <option value="TOKONG"    {{ old('category') == "TOKONG"  ? 'selected' : '' }} >TOKONG (BUDDHA & TAO)</option>
                              <option value="KUIL"      {{ old('category') == "KUIL"    ? 'selected' : '' }} >KUIL (HINDU & GURDWARA)</option>
                              <option value="GEREJA"    {{ old('category') == "GEREJA"  ? 'selected' : '' }} >GEREJA (KRISTIAN)</option>
                          </select>
                          @error('category')
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
                      <label class="required">Tujuan Permohonan</label>
                      <div class="form-group">
                          <textarea class="form-control text-uppercase @error('purpose') is-invalid @else border-dark @enderror" id="purpose" name="purpose" rows="2" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);">{{ old('address') }}</textarea>
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
                          <input class="form-control text-uppercase @error('request_amount') is-invalid @else border-dark @enderror" id="request_amount" name="request_amount" type="currency" value="{{ old('request_amount') }}" onkeypress="return fun_AllowOnlyAmountAndDot(this.id);">
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
                      <button type="button" class="btn waves-effect waves-light btn-info btn-block" data-toggle="modal" data-target="#confirmation">Hantar Permohonan Khas</button>
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
                      <button type="submit" class="btn btn-success">Hantar Permohonan Khas</button>
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

{{-- ALERT!!! - THIS SCRIPT FOR INPUT CURRENCY ONLY --}}
<script>
  var currencyInput = document.querySelector('input[type="currency"]')
  var currency = 'MYR' // https://www.currency-iso.org/dam/downloads/lists/list_one.xml

  // format inital value
  onBlur({target:currencyInput})

  // bind event listeners
  currencyInput.addEventListener('focus', onFocus)
  currencyInput.addEventListener('blur', onBlur)


  function localStringToNumber( s ){
    return Number(String(s).replace(/[^0-9.-]+/g,""))
  }

  function onFocus(e){
    var value = e.target.value;
    e.target.value = value ? localStringToNumber(value) : ''
  }

  function onBlur(e){
    var value = e.target.value

    var options = {
        maximumFractionDigits : 2,
        currency              : currency,
        style                 : "currency",
        currencyDisplay       : "symbol"
    }
    
    e.target.value = (value || value === 0) 
      ? localStringToNumber(value).toLocaleString(undefined, options)
      : ''
  }
</script>
@endsection