@extends('layouts.layout-exco')
@section('content')


<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
  
  <div class="row">
      {{-- <div class="col-2"></div> --}}
      <div class="col-12">
          <div class="card">
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

                <div id="accordion">

                  <div class="card">
                    <a href="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" style="color: white;">
                      <div class="card-header bg-info" id="headingOne">
                        <h4 class="mb-0">&nbsp<i class="fas fa-user"></i>&nbsp&nbsp&nbspMaklumat Pemohon</h4>
                      </div>
                    </a>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body border border-info">
                        
                        <div class="row">
                          <div class="col-md">

                            <label>Nama</label>
                            <div class="mb-3 input-group">
                              <input class="form-control text-uppercase @error('name') is-invalid @else border-dark @enderror" id="name" name="name" type="text" value="AMIRUL AMSYAR BIN AZHAR" disabled>
                            </div>

                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md">

                            <label>Kad Pengenalan</label>
                            <div class="mb-3 input-group">
                              <input class="form-control text-uppercase @error('ic_number') is-invalid @else border-dark @enderror" id="ic_number" name="ic_number" type="text" value="970128565287" disabled>
                            </div>

                          </div>
                          <div class="col-md">

                            <label>Nombor telefon</label>
                            <div class="mb-3 input-group">
                              <input class="form-control text-uppercase @error('mobile_phone') is-invalid @else border-dark @enderror" id="mobile_phone" name="mobile_phone" type="text" value="0182605565" disabled>
                            </div>

                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md">

                            <label>Email</label>
                            <div class="mb-3 input-group">
                              <input class="form-control  @error('email') is-invalid @else border-dark @enderror" id="email" name="email" type="text" value="amirul@artaniscloud.com" disabled>
                            </div>

                          </div>
                        </div>

                      </div>
                    </div>
                  </div>

                </div>

                <div id="accordionTwo">
                  
                  <div class="card">
                    <a href="" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="headingTwo" style="color: white;">
                    {{-- <button data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> --}}
                      <div class="card-header bg-info" id="headingTwo">
                        <h4 class="mb-0"><i class="fas fa-place-of-worship"></i>&nbsp&nbsp&nbspMaklumat Rumah Ibadat</h4>
                      </div>
                    {{-- </button> --}}
                    </a>


                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionTwo">
                      <div class="card-body  border border-info">
                        
                        <div class="row">
                          <div class="col-md">

                            <label>Kategori Rumah Ibadat</label>
                            <div class="mb-3 input-group">
                              <input class="form-control text-uppercase @error('category') is-invalid @else border-dark @enderror" id="category" name="category" type="text" value="TOKONG (BUDDHA & TAO)" disabled>
                            </div>

                          </div>

                          <div class="col-md">

                            <label>Nama Persatuan Rumah Ibadat</label>
                            <div class="mb-3 input-group">
                              <input class="form-control text-uppercase @error('category') is-invalid @else border-dark @enderror" id="category" name="category" type="text" value="PERSATUAN A" disabled>
                            </div>

                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md">

                            <label>Nombor Telefon Pejabat</label>
                            <div class="mb-3 input-group">
                              <input class="form-control text-uppercase @error('office_phone') is-invalid @else border-dark @enderror" id="office_phone" name="office_phone" type="text" value="03123456789" disabled>
                            </div>

                          </div>
                          <div class="col-md">

                            <label>Nama Persatuan Rumah Ibadat Mengikut Bank</label>
                            <div class="mb-3 input-group">
                              <input class="form-control text-uppercase @error('name_bank') is-invalid @else border-dark @enderror" id="name_bank" name="name_bank" type="text" value="PERSATUAN A" disabled>
                            </div>

                          </div>
                        </div>

                        <hr>

                        <div class="row">
                          <div class="col-md">

                            <label>Nombor Sijil Pendaftaran / Nombor ROS</label>
                            <div class="mb-3 input-group">
                              <input class="form-control text-uppercase @error('office_phone') is-invalid @else border-dark @enderror" id="office_phone" name="office_phone" type="text" value="ABC12345" disabled>
                            </div>

                          </div>
                        </div>

                        <hr>

                        <div class="row">
                          <div class="col-md">
                            <label class="required">Alamat Rumah Ibadat</label>
                            <div class="form-group">
                                <textarea class="form-control text-uppercase  border-dark " id="address" name="address" rows="2" disabled>B2-8-2, SPACE U8 ECO MALL, BUKIT JELUTONG</textarea>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md">

                            <label>Poskod</label>
                            <div class="mb-3 input-group">
                              <input class="form-control text-uppercase @error('office_phone') is-invalid @else border-dark @enderror" id="office_phone" name="office_phone" type="text" value="40150" disabled>
                            </div>

                          </div>
                          <div class="col-md">

                            <label>Daerah</label>
                            <div class="mb-3 input-group">
                              <input class="form-control text-uppercase @error('name_bank') is-invalid @else border-dark @enderror" id="name_bank" name="name_bank" type="text" value="PETALING" disabled>
                            </div>

                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md">

                            <label>Negeri</label>
                            <div class="mb-3 input-group">
                              <input class="form-control text-uppercase @error('office_phone') is-invalid @else border-dark @enderror" id="office_phone" name="office_phone" type="text" value="SELANGOR" disabled>
                            </div>

                          </div>
                          <div class="col-md">

                            <label>Kawasan PBT</label>
                            <div class="mb-3 input-group">
                              <input class="form-control text-uppercase @error('name_bank') is-invalid @else border-dark @enderror" id="name_bank" name="name_bank" type="text" value="KAWASAN PETALING" disabled>
                            </div>

                          </div>
                        </div>

                        <hr>

                        <div class="row">
                          <div class="col-md">

                            <label>Nama Bank</label>
                            <div class="mb-3 input-group">
                              <input class="form-control text-uppercase @error('office_phone') is-invalid @else border-dark @enderror" id="office_phone" name="office_phone" type="text" value="MAYBANK" disabled>
                            </div>

                          </div>
                          <div class="col-md">

                            <label>Nombor Akaun</label>
                            <div class="mb-3 input-group">
                              <input class="form-control text-uppercase @error('name_bank') is-invalid @else border-dark @enderror" id="name_bank" name="name_bank" type="text" value="423442342423" disabled>
                            </div>

                          </div>
                        </div>

                      </div>
                    </div>
                  </div>

                </div>

                <div id="accordionFour">

                  <div class="card">
                    <a href="" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseOne" style="color: white;">
                      <div class="card-header bg-info" id="headingOne">
                        <h4 class="mb-0">&nbsp<i class="fas fa-history"></i>&nbsp&nbsp&nbspSejarah Permohonan</h4>
                      </div>
                    </a>

                    <div id="collapseFour" class="collapse" aria-labelledby="headingOne" data-parent="#accordionFour">
                      <div class="card-body  border border-info">

                        <div class="row" style="padding-top: 15px;">
                    <div class="col-md">
                      <div class="table-responsive">
                        <table class="table table-bordered">
                          <thead style="text-align: center;">
                            <tr>
                              <th scope="col">BIL</th>
                              <th scope="col">TAHUN</th>
                              <th scope="col">NAMA RUMAH IBADAT</th>
                              <th scope="col">TUJUAN</th>
                              <th scope="col">JUMLAH KELULUSAN (RM)</th>
                            </tr>
                          </thead>
                          <tbody style="text-align: center;">

                            <tr>
                              <th scope="row">1</th>
                              <td>2020</td>
                              <td>Persatuan A</td>
                              <td>Aktiviti Keagamaan</td>
                              <td>5,000.00</td>
                            </tr>

                            <tr>
                              <th scope="row">2</th>
                              <td>2019</td>
                              <td>Persatuan A</td>
                              <td>Baik Pulih dan Aktivi Keagamaan</td>
                              <td>25,000.00</td>
                            </tr>

                            <tr>
                              <th scope="row">3</th>
                              <td>2018</td>
                              <td>Persatuan A</td>
                              <td>Aktiviti Keagamaan</td>
                              <td>3,500.00</td>
                            </tr>

                            <tr>
                              <th scope="row">4</th>
                              <td>2017</td>
                              <td>Persatuan A</td>
                              <td>Aktiviti Keagamaan</td>
                              <td>2,000.00</td>
                            </tr>
                            
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                        
                      </div>
                    </div>
                  </div>

                </div>

                <div id="accordionThree">

                  <div class="card">
                    <a href="" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="color: white;">
                      <div class="card-header bg-info" id="headingOne">
                        <h4 class="mb-0">&nbsp<i class="fas fa-file"></i>&nbsp&nbsp&nbsp&nbspMaklumat Permohonan</h4>
                      </div>
                    </a>

                    <div id="collapseThree" class="collapse" aria-labelledby="headingOne" data-parent="#accordionThree">
                      <div class="card-body  border border-info">
                        
                        <h3 style="text-align: center; padding-bottom: 15px;">Dokumen-dokumen lampiran</h3>

                        <div class="row">
                          <div class="col-md-3"></div>
                          <div class="col-md">
                            <ul class="list-group">
                                <li class="list-group-item border border-dark"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Klik sini untuk papar dokumen">Surat Permohonan</a></li>
                                <li class="list-group-item border border-dark"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Klik sini untuk papar dokumen">Surat Sokongan</a></li>
                                <li class="list-group-item border border-dark"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Klik sini untuk papar dokumen">Penyata Bank Terkini</a></li>
                                <li class="list-group-item border border-dark"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Klik sini untuk papar dokumen">Penyata Perbelanjaan Terkini</a></li>
                            </ul>
                          </div>
                          <div class="col-md-3"></div>
                        </div>

                        <hr>

                        <h3 style="text-align: center; padding-bottom: 15px;">Aktiviti Keagamaan</h3>

                        <div class="row">
                          <div class="col-md-1"></div>

                          <div class="col-md">
                              <label>Foto bangunan atau aktiviti persatuan agama</label><br>

                              <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                                  <ol class="carousel-indicators">
                                      <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                                      <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
                                      <li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
                                  </ol>
                                  <div class="carousel-inner" role="listbox">
                                      <div class="carousel-item active">
                                          <img class="img-fluid" src="https://images.pexels.com/photos/918778/pexels-photo-918778.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="First slide">
                                      </div>
                                      <div class="carousel-item">
                                          <img class="img-fluid" src="https://images.pexels.com/photos/236148/pexels-photo-236148.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="Second slide">
                                      </div>
                                      <div class="carousel-item">
                                          <img class="img-fluid" src="https://images.pexels.com/photos/460376/pexels-photo-460376.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="Third slide">
                                      </div>
                                  </div>
                                  <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                      <span class="sr-only">Previous</span>
                                  </a>
                                  <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                      <span class="sr-only">Next</span>
                                  </a>
                              </div>
                            
                          </div>
                          <div class="col-md-1"></div>
                        </div>

                        <hr>

                        <h3 style="text-align: center; padding-bottom: 15px;">Pendidikan Keagamaan</h3>

                        <div class="row">
                          <div class="col-md-2"></div>
                          <div class="col-md">
                            <ul class="list-group">
                                <li class="list-group-item border border-dark"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Klik sini untuk papar dokumen">Senarai nama murid, kad pengenalan, jantina dan umur murid</a></li>
                            </ul>
                          </div>
                          <div class="col-md-2"></div>
                        </div>

                        <hr>

                        <h3 style="text-align: center; padding-bottom: 15px;">Pembelian Peralatan untuk kelas keagamaan</h3>

                        <div class="row">
                          <div class="col-md-2"></div>
                          <div class="col-md">
                            <ul class="list-group">
                                <li class="list-group-item border border-dark"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Klik sini untuk papar dokumen">Salinan sebutharga daripada kontraktor</a></li>
                            </ul>
                          </div>
                          <div class="col-md-2"></div>
                        </div>

                        <div class="row" style="padding-top: 15px;">
                          <div class="col-md-1"></div>

                          <div class="col-md">
                              <label>Foto alat peralatan</label><br>

                              <div id="carouselExampleIndicators3" class="carousel slide" data-ride="carousel">
                                  <ol class="carousel-indicators">
                                      <li data-target="#carouselExampleIndicators3" data-slide-to="0" class="active"></li>
                                      <li data-target="#carouselExampleIndicators3" data-slide-to="1"></li>
                                      <li data-target="#carouselExampleIndicators3" data-slide-to="2"></li>
                                  </ol>
                                  <div class="carousel-inner" role="listbox">
                                      <div class="carousel-item active">
                                          <img class="img-fluid" src="https://images.pexels.com/photos/1152665/pexels-photo-1152665.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="First slide">
                                      </div>
                                      <div class="carousel-item">
                                          <img class="img-fluid" src="https://images.pexels.com/photos/159519/back-to-school-paper-colored-paper-stationery-159519.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="Second slide">
                                      </div>
                                      <div class="carousel-item">
                                          <img class="img-fluid" src="https://images.pexels.com/photos/459799/pexels-photo-459799.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="Third slide">
                                      </div>
                                  </div>
                                  <a class="carousel-control-prev" href="#carouselExampleIndicators3" role="button" data-slide="prev">
                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                      <span class="sr-only">Previous</span>
                                  </a>
                                  <a class="carousel-control-next" href="#carouselExampleIndicators3" role="button" data-slide="next">
                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                      <span class="sr-only">Next</span>
                                  </a>
                              </div>
                            
                          </div>
                          <div class="col-md-1"></div>
                        </div>

                      </div>
                    </div>
                  </div>

                </div>

                <div id="accordionFive">

                  <div class="card">
                    <a href="" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive" style="color: white;">
                      <div class="card-header bg-info" id="headingFive">
                        <h4 class="mb-0">&nbsp<i class="fas fa-gavel"></i>&nbsp&nbsp&nbspUlasan & Keputusan</h4>
                      </div>
                    </a>

                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionFive">
                      <div class="card-body border border-info">

                        <h3 style="text-align: center; padding-bottom: 15px;">Ulasan</h3>
                        
                        <div class="row">
                          <div class="col-md-6">
                            <div class="card text-white">
                                <div class="card-header bg-dark">
                                    <h4 class="m-b-0 text-white" style="text-align: center;">Ulasan Exco</h4></div>
                                <div class="card-body border border-dark">
                                    <textarea class="form-control text-uppercase  border-dark " id="address" name="address" rows="6" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);"></textarea>
                                </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="card text-white">
                                <div class="card-header bg-dark">
                                    <h4 class="m-b-0 text-white" style="text-align: center;">Ulasan YB</h4></div>
                                <div class="card-body border border-dark">
                                    <textarea class="form-control text-uppercase  border-dark " id="address" name="address" rows="6" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);"></textarea>
                                </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md">
                            <div class="card text-white">
                                <div class="card-header bg-dark">
                                    <h4 class="m-b-0 text-white" style="text-align: center;">Ulasan UPEN</h4></div>
                                <div class="card-body border border-dark">
                                    <textarea class="form-control text-uppercase  border-dark " id="address" name="address" rows="6" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);"></textarea>
                                </div>
                            </div>
                          </div>
                        </div>

                        <hr>

                        <h3 style="text-align: center; padding-bottom: 15px;">Keputusan</h3>

                        <div class="row">
                          <div class="col-md-2"></div>
                          <div class="col-md">
                            <label>Status Permohonan</label><br>
                            <fieldset class="radio">
                                <label>
                                    <input type="radio" id="LULUS" name="status" value="LULUS" onclick="showPaymentMethod();"> Lulus
                                </label>
                            </fieldset>
                            <fieldset class="radio">
                                <label>
                                    <input type="radio" id="TIDAK LULUS" name="status" value="TIDAK LULUS" onclick="showPaymentMethod();"> Tidak Lulus
                                </label>
                            </fieldset>
                          </div>
                          <div class="col-md" id="payment_div" style="display: none;">
                            <label>Kaedah Pembayaran</label><br>
                            <fieldset class="radio">
                                <label>
                                    <input type="radio" name="payment" value="CEK" checked> Cek
                                </label>
                            </fieldset>
                            <fieldset class="radio">
                                <label>
                                    <input type="radio" name="payment" value="EFT"> EFT
                                </label>
                            </fieldset>
                          </div>
                          <div class="col-md-2"></div>
                        </div>

                        <div class="row" style="padding-top: 40px;">
                          <div class="col-md-2"></div>
                          <div class="col-md">
                            <button type="button" class="btn waves-effect waves-light btn-info btn-block">Sahkan Permohonan</button>
                          </div>
                          <div class="col-md-2"></div>
                        </div>

                      </div>
                    </div>
                  </div>

                </div>

              </div>
              <div class="col-md-2"></div>
            </div>
            
          </div>
      </div>
  </div>

</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<script>
  //show or hide payment method
  function showPaymentMethod(){
    if(document.getElementById('LULUS').checked){
      document.getElementById('payment_div').style.display = "block";
    }else{
      document.getElementById('payment_div').style.display = "none";
    }
  }
</script>
@endsection