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

            <div class="row" style="padding-top: 20px;">
              <div class="col-md-2"></div>
              <div class="col-md">

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
                      <div class="card-body border border-info">
                        
                        <div class="row">
                          <div class="col-md">

                            <label>Kategori Rumah Ibadat</label>
                            <div class="mb-3 input-group">
                              <input class="form-control text-uppercase @error('category') is-invalid @else border-dark @enderror" id="category" name="category" type="text" value="{{ $permohonan->rumah_ibadat->category == "TOKONG" ? "TOKONG (BUDDHA & TAO)" : ( $permohonan->rumah_ibadat->category == "KUIL_H" ? "KUIL (HINDU)" : ( $permohonan->rumah_ibadat->category == "KUIL_G" ? "KUIL (GURDWARA)" : ( $permohonan->rumah_ibadat->category == "GEREJA" ? "GEREJA (KRISTIAN)" : "ERROR DATA" ) ) ) }}" disabled>
                            </div>

                          </div>

                          <div class="col-md">

                            <label>Nama Persatuan Rumah Ibadat</label>
                            <div class="mb-3 input-group">
                              <input class="form-control text-uppercase @error('name_association') is-invalid @else border-dark @enderror" id="name_association" name="name_association" type="text" value="{{ $permohonan->rumah_ibadat->name_association  }}" disabled>
                            </div>

                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">

                            <label>Nombor Telefon Pejabat</label>
                            <div class="mb-3 input-group">
                              <input class="form-control text-uppercase @error('office_phone') is-invalid @else border-dark @enderror" id="office_phone" name="office_phone" type="text" value="{{ $permohonan->rumah_ibadat->office_phone != null ? $permohonan->rumah_ibadat->office_phone : "TIADA" }}" disabled>
                            </div>

                          </div>
                          
                        </div>

                        <hr>

                        @if($permohonan->rumah_ibadat->registration_type == "SENDIRI")
                        <div class="row">
                          
                          <div class="col-md">
                            <label>Nombor Sijil Pendaftaran / Nombor ROS</label>
                            <div class="mb-3 input-group">
                              <input class="form-control text-uppercase @error('registration_number ') is-invalid @else border-dark @enderror" id="registration_number " name="registration_number " type="text" value="{{ $permohonan->rumah_ibadat->registration_number  }}" disabled>
                            </div>
                          </div>
                        </div>
                        @elseif($permohonan->rumah_ibadat->registration_type == "INDUK")
                        <div class="row">
                          
                          <div class="col-md">
                            <label>Nama Persatuan Rumah Ibadat Induk</label>
                            <div class="mb-3 input-group">
                              <input class="form-control text-uppercase @error('name_association_main') is-invalid @else border-dark @enderror" id="name_association_main" name="name_association_main" type="text" value="{{ $permohonan->rumah_ibadat->name_association_main  }}" disabled>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          
                          <div class="col-md">
                            <label>Nombor Pendaftaran Induk</label>
                            <div class="mb-3 input-group">
                              <input class="form-control text-uppercase @error('registration_number_main') is-invalid @else border-dark @enderror" id="registration_number_main" name="registration_number_main" type="text" value="{{ $permohonan->rumah_ibadat->registration_type == "INDUK" ? explode("%", $permohonan->rumah_ibadat->registration_number, 2)[0] : '' }}" disabled>
                            </div>
                          </div>

                          <div class="col-md">
                            <label>Nombor Pendaftaran Cawangan</label>
                            <div class="mb-3 input-group">
                              <input class="form-control text-uppercase @error('registration_number_branch') is-invalid @else border-dark @enderror" id="registration_number_branch" name="registration_number_branch" type="text" value="{{ $permohonan->rumah_ibadat->registration_type == "INDUK" ? explode("%", $permohonan->rumah_ibadat->registration_number, 2)[1] : '' }}" disabled>
                            </div>
                          </div>

                        </div>
                        @endif

                        <hr>

                        <div class="row">
                          <div class="col-md">
                            <label class="required">Alamat Rumah Ibadat</label>
                            <div class="form-group">
                                <textarea class="form-control text-uppercase  border-dark " id="address" name="address" rows="2" disabled>{{ $permohonan->rumah_ibadat->address }}</textarea>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md">

                            <label>Poskod</label>
                            <div class="mb-3 input-group">
                              <input class="form-control text-uppercase @error('postcode') is-invalid @else border-dark @enderror" id="postcode" name="postcode" type="text" value="{{ $permohonan->rumah_ibadat->postcode }}" disabled>
                            </div>

                          </div>
                          <div class="col-md">

                            <label>Daerah</label>
                            <div class="mb-3 input-group">
                              <input class="form-control text-uppercase @error('district') is-invalid @else border-dark @enderror" id="district" name="district" type="text" value="{{ $permohonan->rumah_ibadat->district }}" disabled>
                            </div>

                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md">

                            <label>Negeri</label>
                            <div class="mb-3 input-group">
                              <input class="form-control text-uppercase @error('state') is-invalid @else border-dark @enderror" id="state" name="state" type="text" value="{{ $permohonan->rumah_ibadat->state }}" disabled>
                            </div>

                          </div>
                          <div class="col-md">

                            <label>Kawasan PBT</label>
                            <div class="mb-3 input-group">
                              <input class="form-control text-uppercase @error('pbt_area') is-invalid @else border-dark @enderror" id="pbt_area" name="pbt_area" type="text" value="{{ $permohonan->rumah_ibadat->pbt_area }}" disabled>
                            </div>

                          </div>
                        </div>

                        <hr>

                        <div class="row">
                          <div class="col-md">

                            <label>Nama Penuh Persatuan Rumah Ibadat Mengikut Pendaftaran Bank</label>
                            <div class="mb-3 input-group">
                              <input class="form-control text-uppercase @error('name_association_bank') is-invalid @else border-dark @enderror" id="name_association_bank" name="name_association_bank" type="text" value="{{ $permohonan->rumah_ibadat->name_association_bank }}" disabled>
                            </div>

                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md">

                            <label>Nama Bank</label>
                            <div class="mb-3 input-group">
                              <input class="form-control text-uppercase @error('bank_name') is-invalid @else border-dark @enderror" id="bank_name" name="bank_name" type="text" value="{{ $permohonan->rumah_ibadat->bank_name }}" disabled>
                            </div>

                          </div>
                          <div class="col-md">

                            <label>Nombor Akaun</label>
                            <div class="mb-3 input-group">
                              <input class="form-control text-uppercase @error('bank_account ') is-invalid @else border-dark @enderror" id="bank_account " name="bank_account " type="text" value="{{ $permohonan->rumah_ibadat->bank_account  }}" disabled>
                            </div>

                          </div>
                        </div>

                      </div>
                    </div>
                  </div>

                </div>

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
                              <input class="form-control text-uppercase @error('name') is-invalid @else border-dark @enderror" id="name" name="name" type="text" value="{{ $permohonan->user->name  }}" disabled>
                            </div>

                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md">

                            <label>Kad Pengenalan</label>
                            <div class="mb-3 input-group">
                              <input class="form-control text-uppercase @error('ic_number') is-invalid @else border-dark @enderror" id="ic_number" name="ic_number" type="text" value="{{ $permohonan->user->ic_number  }}" disabled>
                            </div>

                          </div>
                          <div class="col-md">

                            <label>Nombor telefon</label>
                            <div class="mb-3 input-group">
                              <input class="form-control text-uppercase @error('mobile_phone') is-invalid @else border-dark @enderror" id="mobile_phone" name="mobile_phone" type="text" value="{{ $permohonan->user->mobile_phone  }}" disabled>
                            </div>

                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md">

                            <label>Email</label>
                            <div class="mb-3 input-group">
                              <input class="form-control  @error('email') is-invalid @else border-dark @enderror" id="email" name="email" type="text" value="{{ $permohonan->user->email  }}" disabled>
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
                        <h4 class="mb-0">&nbsp<i class="fas fa-file"></i>&nbsp&nbsp&nbsp&nbspMaklumat Permohonan (Nombor Rujukan : {{ $permohonan->getPermohonanID() }})</h4>
                      </div>
                    </a>

                    <div id="collapseThree" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionThree">
                      <div class="card-body  border border-info">
                        
                        <h3 style="text-align: center; padding-bottom: 15px;">Dokumen-dokumen lampiran</h3>

                        <div class="row">
                          <div class="col-md-3"></div>
                          <div class="col-md">
                            <ul class="list-group">
                                <li class="list-group-item border border-dark" style="text-align: center;">
                                  <form action="{{ route('muat-turun.permohonan') }}">
                                    <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}" readonly>
                                    <input type="hidden" name="file_type" value="application_letter" readonly>
                                    <button type="submit" class="btn btn-white bg-white text-info border-0" data-toggle="tooltip" data-placement="bottom" data-original-title="Klik sini untuk muat-turun dokumen">
                                      @if($permohonan->rumah_ibadat->category == "KUIL_H" || $permohonan->rumah_ibadat->category == "KUIL_G")
                                      Kertas Kerja Permohonan Peruntukan Bagi Tahun Semasa Dan Sebut Harga
                                      @else 
                                      Surat Permohonan Kepada Pengurusi Limas
                                      @endif
                                    </button>
                                  </form>
                                </li>

                                <li class="list-group-item border border-dark" style="text-align: center;">
                                  <form action="{{ route('muat-turun.permohonan') }}">
                                    <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}" readonly>
                                    <input type="hidden" name="file_type" value="registration_certificate" readonly>
                                    <button type="submit" class="btn btn-white bg-white text-info border-0" data-toggle="tooltip" data-placement="bottom" data-original-title="Klik sini untuk muat-turun dokumen">
                                      @if($permohonan->rumah_ibadat->category == "KUIL_H" || $permohonan->rumah_ibadat->category == "KUIL_G")
                                      Sijil Pendaftaran (Akta Pertubuhan 1966)
                                      @else 
                                      Sijil Pendaftaran ROS
                                      @endif
                                    </button>
                                  </form>
                                </li>

                                <li class="list-group-item border border-dark" style="text-align: center;">
                                  <form action="{{ route('muat-turun.permohonan') }}">
                                    <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}" readonly>
                                    <input type="hidden" name="file_type" value="account_statement" readonly>
                                    <button type="submit" class="btn btn-white bg-white text-info border-0" data-toggle="tooltip" data-placement="bottom" data-original-title="Klik sini untuk muat-turun dokumen">
                                      Penyata Bank
                                    </button>
                                  </form>
                                </li>

                                @if($permohonan->spending_statement != null)

                                <li class="list-group-item border border-dark" style="text-align: center;">
                                  <form action="{{ route('muat-turun.permohonan') }}">
                                    <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}" readonly>
                                    <input type="hidden" name="file_type" value="spending_statement" readonly>
                                    <button type="submit" class="btn btn-white bg-white text-info border-0" data-toggle="tooltip" data-placement="bottom" data-original-title="Klik sini untuk muat-turun dokumen">
                                      Penyata Perbelanjaan
                                    </button>
                                  </form>
                                </li>
                                
                                @endif 

                                @if($permohonan->support_letter != null)

                                <li class="list-group-item border border-dark" style="text-align: center;">
                                  <form action="{{ route('muat-turun.permohonan') }}">
                                    <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}" readonly>
                                    <input type="hidden" name="file_type" value="support_letter" readonly>
                                    <button type="submit" class="btn btn-white bg-white text-info border-0" data-toggle="tooltip" data-placement="bottom" data-original-title="Klik sini untuk muat-turun dokumen">
                                      Surat Sokongan Daripada Adun Kawasan / Ahli Parlimen <br> / Penyelaras Dun / Ahli Majlis / Ketua Komuniti India
                                    </button>
                                  </form>
                                </li>
                                
                                @endif 

                                @if($permohonan->committee_member != null)

                                <li class="list-group-item border border-dark" style="text-align: center;">
                                  <form action="{{ route('muat-turun.permohonan') }}">
                                    <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}" readonly>
                                    <input type="hidden" name="file_type" value="committee_member" readonly>
                                    <button type="submit" class="btn btn-white bg-white text-info border-0" data-toggle="tooltip" data-placement="bottom" data-original-title="Klik sini untuk muat-turun dokumen">
                                      Senarai Ahli Jawatan Kuasa Rumah Ibadat
                                    </button>
                                  </form>
                                </li>
                                
                                @endif

                                @if($permohonan->certificate_or_letter_temple != null)

                                <li class="list-group-item border border-dark" style="text-align: center;">
                                  <form action="{{ route('muat-turun.permohonan') }}">
                                    <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}" readonly>
                                    <input type="hidden" name="file_type" value="certificate_or_letter_temple" readonly>
                                    <button type="submit" class="btn btn-white bg-white text-info border-0" data-toggle="tooltip" data-placement="bottom" data-original-title="Klik sini untuk muat-turun dokumen">
                                      @if($permohonan->rumah_ibadat->category == "KUIL_H")
                                      Sijil Malaysia Hindu Sangam / Malaysia Hindudharma Mahmandram
                                      @elseIf($permohonan->rumah_ibadat->category == "KUIL_G")
                                      Sijil/Surat Sokongan Majlis Gudwara Malaysia
                                      @endif
                                    </button>
                                  </form>
                                </li>
                                
                                @endif

                                @if($permohonan->invitation_letter != null)

                                <li class="list-group-item border border-dark" style="text-align: center;">
                                  <form action="{{ route('muat-turun.permohonan') }}">
                                    <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}" readonly>
                                    <input type="hidden" name="file_type" value="invitation_letter" readonly>
                                    <button type="submit" class="btn btn-white bg-white text-info border-0" data-toggle="tooltip" data-placement="bottom" data-original-title="Klik sini untuk muat-turun dokumen">
                                      Surat Jemputan
                                    </button>
                                  </form>
                                </li>
                                
                                @endif

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