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

            <div class="row" style="padding-top: 20px;">
              <div class="col-md-2"></div>
              <div class="col-md">

                <div id="accordionTwo">
                  
                  <div class="card">
                    <a href="" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="headingTwo" style="color: white;">
                    {{-- <button data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> --}}
                      <div class="card-header bg-primary" id="headingTwo">
                        <h4 class="mb-0"><i class="fas fa-place-of-worship"></i>&nbsp&nbsp&nbspMaklumat Rumah Ibadat</h4>
                      </div>
                    {{-- </button> --}}
                    </a>


                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionTwo">
                      <div class="card-body border border-primary">
                        
                        <div class="row">
                          <div class="col-md">

                            <label>Kategori Rumah Ibadat</label>
                            <div class="mb-3 input-group">
                              <input class="form-control text-uppercase @error('category') is-invalid @else border-dark @enderror" id="category" name="category" type="text" value="{{ $permohonan->rumah_ibadat->category == "TOKONG" ? "TOKONG (BUDDHA & TAO)" : ( $permohonan->rumah_ibadat->category == "KUIL" ? "KUIL (HINDU)" : ( $permohonan->rumah_ibadat->category == "GURDWARA" ? "KUIL (GURDWARA)" : ( $permohonan->rumah_ibadat->category == "GEREJA" ? "GEREJA (KRISTIAN)" : "ERROR DATA" ) ) ) }}" disabled>
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
                      <div class="card-header text-dark bg-warning" id="headingOne">
                        <h4 class="mb-0">&nbsp<i class="fas fa-user"></i>&nbsp&nbsp&nbspMaklumat Pemohon</h4>
                      </div>
                    </a>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body border border-warning">
                        
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
                      <div class="card-header bg-success" id="headingOne">
                        <h4 class="mb-0">&nbsp<i class="fas fa-file"></i>&nbsp&nbsp&nbsp&nbspMaklumat Permohonan</h4>
                      </div>
                    </a>

                    <div id="collapseThree" class="collapse" aria-labelledby="headingOne" data-parent="#accordionThree">
                      <div class="card-body  border border-success">

                         <div class="row">
                          <div class="col-md-1"></div>
                          <div class="col-md">

                            <label>No. Rujukan / Permohonan ID</label>
                            <div class="mb-3 input-group">
                              <input class="form-control  @error('reference_number') is-invalid @else border-dark @enderror" id="reference_number" name="reference_number" type="text" value="{{ $permohonan->getPermohonanID() }}" disabled>
                            </div>

                          </div>
                          <div class="col-md-1"></div>
                        </div>

                        <div class="row">
                          <div class="col-md-1"></div>
                          <div class="col-md">

                            <label>Tarikh Permohonan</label>
                            <div class="mb-3 input-group">
                              <input class="form-control  @error('date') is-invalid @else border-dark @enderror" id="date" name="date" type="text" value="{{ Carbon\Carbon::parse($permohonan->created_at)->format('d-m-Y') }}" disabled>
                            </div>

                          </div>
                          <div class="col-md">

                            <label>Waktu Permohonan</label>
                            <div class="mb-3 input-group">
                              <input class="form-control  @error('time') is-invalid @else border-dark @enderror" id="time" name="time" type="text" value="{{ Carbon\Carbon::parse($permohonan->created_at)->format('g:i a') }}" disabled>
                            </div>

                          </div>
                          <div class="col-md-1"></div>
                        </div>

                        <div class="row">
                          <div class="col-md-1"></div>
                          <div class="col-md">

                            <label>Status Permohonan</label>
                            <div class="mb-3 input-group">
                              <input class="form-control  @error('status') is-invalid @else border-dark @enderror" id="status" name="status" type="text" value="Sedang Diproses" disabled>
                            </div>

                          </div>
                          <div class="col-md-1"></div>
                        </div>
                        
                        <h3 style="text-align: center; padding-bottom: 15px;">Dokumen-dokumen lampiran</h3>

                          {{-- <div class="row">
                            <div class="col-md">
                              <a href="{{ asset( $image_path = str_replace('public', 'storage',  $permohonan->registration_certificate)) }}" target="_blank">Open the pdf!</a>
                              <img src="{{ asset( $image_path = str_replace('public', 'storage',  $permohonan->application_letter)) }}" alt="test" style="height: 100px;">
                            </div>
                          </div> --}}

                        <div class="row">
                          <div class="col-md-1"></div>
                          <div class="col-md">
                            <ul class="list-group">
                                <li class="list-group-item border border-dark" style="text-align: center;">
                                    {{-- <form action="{{ route('muat-turun.permohonan') }}">
                                      <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}" readonly>
                                      <input type="hidden" name="file_type" value="application_letter" readonly>
                                      <button type="submit" class="btn btn-white bg-white text-info border-0" data-toggle="tooltip" data-placement="bottom" data-original-title="Klik sini untuk muat-turun dokumen">
                                        @if($permohonan->rumah_ibadat->category == "KUIL" || $permohonan->rumah_ibadat->category == "GURDWARA")
                                        Kertas Kerja Permohonan Peruntukan Bagi Tahun Semasa Dan Sebut Harga
                                        @else 
                                        Surat Permohonan Kepada Pengurusi Limas
                                        @endif
                                      </button>
                                      
                                    </form> --}}
                                  <a href="{{ asset( $image_path = str_replace('public', 'storage',  $permohonan->application_letter)) }}" target="_blank">
                                      @if($permohonan->rumah_ibadat->category == "KUIL" || $permohonan->rumah_ibadat->category == "GURDWARA")
                                      Kertas Kerja Permohonan Peruntukan Bagi Tahun Semasa Dan Sebut Harga
                                      @else 
                                      Surat Permohonan Kepada Pengurusi Limas
                                      @endif
                                  </a>
                                </li>

                                <li class="list-group-item border border-dark" style="text-align: center;">
                                  {{-- <form action="{{ route('muat-turun.permohonan') }}">
                                    <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}" readonly>
                                    <input type="hidden" name="file_type" value="registration_certificate" readonly>
                                    <button type="submit" class="btn btn-white bg-white text-info border-0" data-toggle="tooltip" data-placement="bottom" data-original-title="Klik sini untuk muat-turun dokumen">
                                      @if($permohonan->rumah_ibadat->category == "KUIL" || $permohonan->rumah_ibadat->category == "GURDWARA")
                                      Sijil Pendaftaran (Akta Pertubuhan 1966)
                                      @else 
                                      Sijil Pendaftaran ROS
                                      @endif
                                    </button>
                                  </form> --}}
                                  <a href="{{ asset( $image_path = str_replace('public', 'storage',  $permohonan->registration_certificate)) }}" target="_blank">
                                      @if($permohonan->rumah_ibadat->category == "KUIL" || $permohonan->rumah_ibadat->category == "GURDWARA")
                                      Sijil Pendaftaran (Akta Pertubuhan 1966)
                                      @else 
                                      Sijil Pendaftaran ROS
                                      @endif
                                  </a>
                                </li>

                                <li class="list-group-item border border-dark" style="text-align: center;">
                                  {{-- <form action="{{ route('muat-turun.permohonan') }}">
                                    <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}" readonly>
                                    <input type="hidden" name="file_type" value="account_statement" readonly>
                                    <button type="submit" class="btn btn-white bg-white text-info border-0" data-toggle="tooltip" data-placement="bottom" data-original-title="Klik sini untuk muat-turun dokumen">
                                      Penyata Bank
                                    </button>
                                  </form> --}}
                                  <a href="{{ asset( $image_path = str_replace('public', 'storage',  $permohonan->account_statement)) }}" target="_blank">
                                      Penyata Bank
                                  </a>
                                </li>

                                @if($permohonan->spending_statement != null)

                                <li class="list-group-item border border-dark" style="text-align: center;">
                                  {{-- <form action="{{ route('muat-turun.permohonan') }}">
                                    <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}" readonly>
                                    <input type="hidden" name="file_type" value="spending_statement" readonly>
                                    <button type="submit" class="btn btn-white bg-white text-info border-0" data-toggle="tooltip" data-placement="bottom" data-original-title="Klik sini untuk muat-turun dokumen">
                                      Penyata Perbelanjaan
                                    </button>
                                  </form> --}}

                                  <a href="{{ asset( $image_path = str_replace('public', 'storage',  $permohonan->spending_statement)) }}" target="_blank">
                                      Penyata Perbelanjaan
                                  </a>
                                </li>
                                
                                @endif 

                                @if($permohonan->support_letter != null)

                                <li class="list-group-item border border-dark" style="text-align: center;">
                                  {{-- <form action="{{ route('muat-turun.permohonan') }}">
                                    <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}" readonly>
                                    <input type="hidden" name="file_type" value="support_letter" readonly>
                                    <button type="submit" class="btn btn-white bg-white text-info border-0" data-toggle="tooltip" data-placement="bottom" data-original-title="Klik sini untuk muat-turun dokumen">
                                      Surat Sokongan Daripada Adun Kawasan / Ahli Parlimen <br> / Penyelaras Dun / Ahli Majlis / Ketua Komuniti India
                                    </button>
                                  </form> --}}

                                  <a href="{{ asset( $image_path = str_replace('public', 'storage',  $permohonan->support_letter)) }}" target="_blank">
                                      Surat Sokongan Daripada Adun Kawasan / Ahli Parlimen <br> / Penyelaras Dun / Ahli Majlis / Ketua Komuniti India
                                  </a>
                                </li>
                                
                                @endif 

                                @if($permohonan->committee_member != null)

                                <li class="list-group-item border border-dark" style="text-align: center;">
                                  {{-- <form action="{{ route('muat-turun.permohonan') }}">
                                    <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}" readonly>
                                    <input type="hidden" name="file_type" value="committee_member" readonly>
                                    <button type="submit" class="btn btn-white bg-white text-info border-0" data-toggle="tooltip" data-placement="bottom" data-original-title="Klik sini untuk muat-turun dokumen">
                                      Senarai Ahli Jawatan Kuasa Rumah Ibadat
                                    </button>
                                  </form> --}}

                                  <a href="{{ asset( $image_path = str_replace('public', 'storage',  $permohonan->committee_member)) }}" target="_blank">
                                      Senarai Ahli Jawatan Kuasa Rumah Ibadat
                                  </a>
                                </li>
                                
                                @endif

                                @if($permohonan->certificate_or_letter_temple != null)

                                <li class="list-group-item border border-dark" style="text-align: center;">
                                  {{-- <form action="{{ route('muat-turun.permohonan') }}">
                                    <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}" readonly>
                                    <input type="hidden" name="file_type" value="certificate_or_letter_temple" readonly>
                                    <button type="submit" class="btn btn-white bg-white text-info border-0" data-toggle="tooltip" data-placement="bottom" data-original-title="Klik sini untuk muat-turun dokumen">
                                      @if($permohonan->rumah_ibadat->category == "KUIL")
                                      Sijil Malaysia Hindu Sangam / Malaysia Hindudharma Mahmandram
                                      @elseIf($permohonan->rumah_ibadat->category == "GURDWARA")
                                      Sijil/Surat Sokongan Majlis Gudwara Malaysia
                                      @endif
                                    </button>
                                  </form> --}}

                                  <a href="{{ asset( $image_path = str_replace('public', 'storage',  $permohonan->certificate_or_letter_temple)) }}" target="_blank">
                                      @if($permohonan->rumah_ibadat->category == "KUIL")
                                      Sijil Malaysia Hindu Sangam / Malaysia Hindudharma Mahmandram
                                      @elseIf($permohonan->rumah_ibadat->category == "GURDWARA")
                                      Sijil/Surat Sokongan Majlis Gudwara Malaysia
                                      @endif
                                  </a>
                                </li>
                                
                                @endif

                                @if($permohonan->invitation_letter != null)

                                <li class="list-group-item border border-dark" style="text-align: center;">
                                  {{-- <form action="{{ route('muat-turun.permohonan') }}">
                                    <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}" readonly>
                                    <input type="hidden" name="file_type" value="invitation_letter" readonly>
                                    <button type="submit" class="btn btn-white bg-white text-info border-0" data-toggle="tooltip" data-placement="bottom" data-original-title="Klik sini untuk muat-turun dokumen">
                                      Surat Jemputan
                                    </button>
                                  </form> --}}

                                  <a href="{{ asset( $image_path = str_replace('public', 'storage',  $permohonan->invitation_letter)) }}" target="_blank">
                                      Surat Jemputan
                                  </a>
                                </li>
                                
                                @endif

                            </ul>
                          </div>
                          <div class="col-md-1"></div>
                        </div>

                        {{-- <span>{{ $permohonan->tujuan }}</span> --}}

                        @foreach ( $permohonan->tujuan as $key => $data)

                        <hr>

                        <h3 style="text-align: center; padding-bottom: 15px; ">Tujuan {{ ($key + 1) }} : {{ ucfirst(trans($data->tujuan)) }}</h3>

                        {{-- ================================== AKTIVITI KEAGAMAAN ==================================--}}

                        @if($data->tujuan == "AKTIVITI KEAGAMAAN")

                        <div class="row">
                          <div class="col-md-1"></div>

                          <div class="col-md">
                              <label>Foto bangunan atau aktiviti persatuan agama</label><br>

                              <div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel">
                                  <ol class="carousel-indicators">
                                      @foreach ( $data->lampiran as $key => $data2)
                                        @if ($loop->first)
                                        <li data-target="#carouselExampleIndicators1" data-slide-to="{{ $key }}" class="active"></li>
                                        @else
                                        <li data-target="#carouselExampleIndicators1" data-slide-to="{{ $key }}"></li>
                                        @endif
                                      @endforeach
                                  </ol>
                                  <div class="carousel-inner" role="listbox">

                                    @foreach ($data->lampiran as $key => $data2)

                                        @if ($loop->first)
                                        <div class="carousel-item active">
                                          <img class="img-fluid" src="{{ asset( $image_path = str_replace('public', 'storage',  $data2->url)) }}">
                                        </div>
                                        @else 
                                        <div class="carousel-item">
                                          <img class="img-fluid" src="{{ asset( $image_path = str_replace('public', 'storage',  $data2->url)) }}">
                                      </div>
                                        @endif

                                    @endforeach

                                  </div>
                                  <a class="carousel-control-prev" href="#carouselExampleIndicators1" role="button" data-slide="prev">
                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                      <span class="sr-only">Previous</span>
                                  </a>
                                  <a class="carousel-control-next" href="#carouselExampleIndicators1" role="button" data-slide="next">
                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                      <span class="sr-only">Next</span>
                                  </a>
                              </div>
                            
                          </div>
                          <div class="col-md-1"></div>
                        </div>

                        @endif
                        {{-- ================================== END OF AKTIVITI KEAGAMAAN ==================================--}}




                        {{-- ================================== PENDIDIKAN KEAGAMAAN ==================================--}}

                        @if($data->tujuan == "PENDIDIKAN KEAGAMAAN")

                        <div class="row">
                          <div class="col-md-1"></div>
                          <div class="col-md">
                            <ul class="list-group">
                                @foreach ( $data->lampiran as $key => $data2)
                                  <li class="list-group-item border border-dark" style="text-align: center;">
                                      <a href="{{ asset( $image_path = str_replace('public', 'storage',  $data2->url)) }}" target="_blank">
                                          Senarai nama murid, kad pengenalan, jantina dan umur murid
                                      </a>
                                  </li>
                                @endforeach
                            </ul>
                          </div>
                          <div class="col-md-1"></div>
                        </div>

                        @endif

                        {{-- ================================== END OF PENDIDIKAN KEAGAMAAN ==================================--}}




                        {{-- ================================== PEMBELIAN PERALATAN UNTUK KELAS KEAGAMAAN ==================================--}}

                        @if($data->tujuan == "PEMBELIAN PERALATAN UNTUK KELAS KEAGAMAAN")

                        <div class="row">
                          <div class="col-md-1"></div>
                          <div class="col-md">
                            <ul class="list-group">
                              @foreach ( $data->lampiran as $key => $data2)

                                @if($data2->description == "opt_3_file_1")
                                <li class="list-group-item border border-dark" style="text-align: center;">
                                      <a href="{{ asset( $image_path = str_replace('public', 'storage',  $data2->url)) }}" target="_blank">
                                          Salinan sebutharga daripada pembekal 
                                      </a>
                                </li>
                                @endif

                              @endforeach
                            </ul>
                          </div>
                          <div class="col-md-1"></div>
                        </div>

                        <div class="row">
                          <div class="col-md-1"></div>

                          <div class="col-md">
                              <label>Foto lampiran</label><br>

                              <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                                  <ol class="carousel-indicators">

                                      <?php $flag_A = 0; ?>
                                      <?php $counter_A = 1; ?>
                                      @foreach ( $data->lampiran as $key => $data2)
                                        @if($data2->description == "opt_3_file_1")
                                          @continue
                                        @endif

                                        @if ($flag_A == 0)
                                        <li data-target="#carouselExampleIndicators2" data-slide-to="{{ $counter_A }}" class="active"></li>
                                        <?php $flag_A++; ?>
                                        <?php $counter_A++; ?>
                                        @else
                                        <li data-target="#carouselExampleIndicators2" data-slide-to="{{ $counter_A }}"></li>
                                        <?php $counter_A++; ?>
                                        @endif
                                      @endforeach
                                  </ol>
                                  <div class="carousel-inner" role="listbox">

                                    <?php $flag_B = 0; ?>
                                    @foreach ( $data->lampiran as $key => $data2)

                                        @if($data2->description == "opt_3_file_1")
                                          @continue
                                        @endif

                                        @if ($flag_B == 0)
                                        <div class="carousel-item active">
                                          <img class="img-fluid" src="{{ asset( $image_path = str_replace('public', 'storage',  $data2->url)) }}">
                                        </div>
                                        <?php $flag_B++; ?>
                                        @else
                                        <div class="carousel-item">
                                          <img class="img-fluid" src="{{ asset( $image_path = str_replace('public', 'storage',  $data2->url)) }}">
                                        </div>
                                        @endif

                                    @endforeach

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

                            
                        @endif

                        {{-- ================================== END OF PEMBELIAN PERALATAN UNTUK KELAS KEAGAMAAN ==================================--}}




                        {{-- ================================== BAIK PULIH/PENYELENGGARAAN BANGUNAN ==================================--}}

                        @if($data->tujuan == "BAIK PULIH/PENYELENGGARAAN BANGUNAN")

                        <div class="row">
                          <div class="col-md-1"></div>
                          <div class="col-md">
                            <ul class="list-group">
                              
                              @foreach ( $data->lampiran as $key => $data2)

                                @if($data2->description == "opt_4_file_1")
                                <li class="list-group-item border border-dark" style="text-align: center;">
                                      <a href="{{ asset( $image_path = str_replace('public', 'storage',  $data2->url)) }}" target="_blank">
                                          Salinan sebutharga daripada pembekal 
                                      </a>
                                </li>
                                @endif

                              @endforeach
                            </ul>
                          </div>
                          <div class="col-md-1"></div>
                        </div>

                        <div class="row">
                          <div class="col-md-1"></div>

                          <div class="col-md">
                              <label>Foto bahagian bangunan</label><br>

                              <div id="carouselExampleIndicators3" class="carousel slide" data-ride="carousel">
                                  <ol class="carousel-indicators">

                                      <?php $flag_C = 0; ?> 
                                      <?php $counter_C = 1; ?> 
                                      @foreach ( $data->lampiran as $key => $data2)
                                        @if($data2->description != "opt_4_photo")
                                          @continue
                                        @endif

                                        @if($flag_C == 0)
                                        <li data-target="#carouselExampleIndicators3" data-slide-to="{{ $counter_C }}" class="active"></li>
                                        <?php $flag_C++; ?> 
                                        <?php $counter_C++; ?> 
                                        @else
                                        <li data-target="#carouselExampleIndicators3" data-slide-to="{{ $counter_C }}"></li>
                                        <?php $counter_C++; ?> 
                                        @endif
                                      @endforeach
                                  </ol>
                                  <div class="carousel-inner" role="listbox">

                                    <?php $flag_D = 0; ?> 
                                    @foreach ( $data->lampiran as $key => $data2)

                                        @if($data2->description != "opt_4_photo")
                                          @continue
                                        @endif

                                        @if($flag_D == 0)
                                        <div class="carousel-item active">
                                          <img class="img-fluid" src="{{ asset( $image_path = str_replace('public', 'storage',  $data2->url)) }}">
                                        </div>
                                        <?php $flag_D++; ?> 
                                        @else
                                        <div class="carousel-item">
                                          <img class="img-fluid" src="{{ asset( $image_path = str_replace('public', 'storage',  $data2->url)) }}">
                                        </div>
                                        @endif

                                    @endforeach

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

                        <div class="row">
                          <div class="col-md-1"></div>

                          <div class="col-md">
                              <label>Foto pembaikan dan penyelenggaraan</label><br>

                              <div id="carouselExampleIndicators4" class="carousel slide" data-ride="carousel">
                                  <ol class="carousel-indicators">

                                      <?php $flag_E = 0; ?>
                                      <?php $counter_E = 1; ?> 
                                      @foreach ( $data->lampiran as $key => $data2)
                                        @if($data2->description != "opt_4_2_photo")
                                          @continue
                                        @endif

                                        @if($flag_E == 0)
                                        <li data-target="#carouselExampleIndicators4" data-slide-to="{{ $counter_E }}" class="active"></li>
                                        <?php $flag_E++; ?> 
                                        <?php $counter_E++; ?> 
                                        @else
                                        <li data-target="#carouselExampleIndicators4" data-slide-to="{{ $counter_E }}"></li>
                                        <?php $counter_E++; ?> 
                                        @endif
                                      @endforeach
                                  </ol>
                                  <div class="carousel-inner" role="listbox">

                                    <?php $flag_F = 0; ?> 
                                    @foreach ( $data->lampiran as $key => $data2)

                                        @if($data2->description != "opt_4_2_photo")
                                          @continue
                                        @endif

                                        @if($flag_F == 0)
                                        <div class="carousel-item active">
                                          <img class="img-fluid" src="{{ asset( $image_path = str_replace('public', 'storage',  $data2->url)) }}">
                                        </div>
                                        <?php $flag_F++; ?> 
                                        @else
                                        <div class="carousel-item">
                                          <img class="img-fluid" src="{{ asset( $image_path = str_replace('public', 'storage',  $data2->url)) }}">
                                        </div>
                                        @endif

                                    @endforeach

                                  </div>
                                  <a class="carousel-control-prev" href="#carouselExampleIndicators4" role="button" data-slide="prev">
                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                      <span class="sr-only">Previous</span>
                                  </a>
                                  <a class="carousel-control-next" href="#carouselExampleIndicators4" role="button" data-slide="next">
                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                      <span class="sr-only">Next</span>
                                  </a>
                              </div>
                            
                          </div>
                          <div class="col-md-1"></div>
                        </div>

                        @endif

                        {{-- ================================== END OF BAIK PULIH/PENYELENGGARAAN BANGUNAN ==================================--}}




                        {{-- ================================== PEMINDAHAN/PEMBINAAN BARU RUMAH IBADAT ==================================--}}

                        @if($data->tujuan == "PEMINDAHAN/PEMBINAAN BARU RUMAH IBADAT")

                        <div class="row">
                          <div class="col-md-1"></div>
                          <div class="col-md">
                            <ul class="list-group">
                              
                              @foreach ( $data->lampiran as $key => $data2)

                                @if($data2->description == "opt_5_file_1")
                                <li class="list-group-item border border-dark" style="text-align: center;">
                                      <a href="{{ asset( $image_path = str_replace('public', 'storage',  $data2->url)) }}" target="_blank">
                                          Sebutharga pembekal
                                      </a>
                                </li>
                                @elseif($data2->description == "opt_5_file_2")
                                <li class="list-group-item border border-dark" style="text-align: center;">
                                      <a href="{{ asset( $image_path = str_replace('public', 'storage',  $data2->url)) }}" target="_blank">
                                          Salinan Kebenaran Merancang
                                      </a>
                                </li>
                                @elseif($data2->description == "opt_5_file_3")
                                <li class="list-group-item border border-dark" style="text-align: center;">
                                      <a href="{{ asset( $image_path = str_replace('public', 'storage',  $data2->url)) }}" target="_blank">
                                          Salinan Pelan Bangunan
                                      </a>
                                </li>
                                @endif

                              @endforeach
                            </ul>
                          </div>
                          <div class="col-md-1"></div>
                        </div>

                        <div class="row">
                          <div class="col-md-1"></div>

                          <div class="col-md">
                              <label>Foto bangunan</label><br>

                              <div id="carouselExampleIndicators5" class="carousel slide" data-ride="carousel">
                                  <ol class="carousel-indicators">

                                      <?php $flag_G = 0; ?> 
                                      <?php $counter_G = 1; ?> 
                                      @foreach ( $data->lampiran as $key => $data2)
                                        @if($data2->description != "opt_5_photo")
                                          @continue
                                        @endif

                                        @if($flag_G == 0)
                                        <li data-target="#carouselExampleIndicators5" data-slide-to="{{ $counter_G }}" class="active"></li>
                                        <?php $flag_G++; ?> 
                                        <?php $counter_G++; ?> 
                                        @else
                                        <li data-target="#carouselExampleIndicators5" data-slide-to="{{ $counter_G }}"></li>
                                        <?php $counter_G++; ?> 
                                        @endif
                                      @endforeach
                                  </ol>
                                  <div class="carousel-inner" role="listbox">

                                    <?php $flag_H = 0; ?> 
                                    @foreach ( $data->lampiran as $key => $data2)

                                        @if($data2->description != "opt_5_photo")
                                          @continue
                                        @endif

                                        @if($flag_H == 0)
                                        <div class="carousel-item active">
                                          <img class="img-fluid" src="{{ asset( $image_path = str_replace('public', 'storage',  $data2->url)) }}">
                                        </div>
                                        <?php $flag_H++; ?> 
                                        @else
                                        <div class="carousel-item">
                                          <img class="img-fluid" src="{{ asset( $image_path = str_replace('public', 'storage',  $data2->url)) }}">
                                        </div>
                                        @endif

                                    @endforeach

                                  </div>
                                  <a class="carousel-control-prev" href="#carouselExampleIndicators5" role="button" data-slide="prev">
                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                      <span class="sr-only">Previous</span>
                                  </a>
                                  <a class="carousel-control-next" href="#carouselExampleIndicators5" role="button" data-slide="next">
                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                      <span class="sr-only">Next</span>
                                  </a>
                              </div>
                            
                          </div>
                          <div class="col-md-1"></div>
                        </div>

                        @endif

                        {{-- ================================== END OF PEMINDAHAN/PEMBINAAN BARU RUMAH IBADAT ==================================--}}


                          {{-- @foreach ( $data->lampiran as $key => $data2)
                              <h4>{{ $data2->description }}</h4>
                          @endforeach --}}

                        @endforeach



                      </div>
                    </div>
                  </div>

                </div>

                <div id="accordionFour">

                  <div class="card">
                    <a href="" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseOne" style="color: white;">
                      <div class="card-header bg-dark" id="headingOne">
                        <h4 class="mb-0">&nbsp<i class="fas fa-history"></i>&nbsp&nbsp&nbspSejarah Permohonan</h4>
                      </div>
                    </a>

                    <div id="collapseFour" class="collapse" aria-labelledby="headingOne" data-parent="#accordionFour">
                      <div class="card-body  border border-dark">

                        <div class="row" style="padding-top: 15px;">
                    <div class="col-md">
                      <div class="table-responsive">
                        <table class="table table-bordered">
                          <thead style="text-align: center;">
                            <tr>
                              {{-- <th scope="col">BIL</th> --}}
                              <th scope="col">PERMOHONAN MELALUI SISTEM</th>
                              <th scope="col">TAHUN</th>
                              <th scope="col">NAMA RUMAH IBADAT</th>
                              <th scope="col">JUMLAH KELULUSAN</th>
                            </tr>
                          </thead>
                          <tbody style="text-align: center;">

                            @foreach (  $sejarah_permohonan as $key => $data)
                            
                            <tr>
                              <td><i class="far fa-times-circle" style="color: red;"></i></td>
                              <td>{{ $data->tahun }}</td>
                              <td>{{ $data->rumah_ibadat }}</td>
                              <td>RM {{ $data->jumlah_kelulusan }}</td>

                            </tr>
                                
                            @endforeach

                            @foreach (  $history_application_system as $key => $data)
                            
                            <tr>
                              <td><i class="far fa-check-circle" style="color: green;"></i></td>
                              <td>{{ Carbon\Carbon::parse($data->created_at)->format('Y') }}</td>
                              <td>{{ $data->rumah_ibadat->name_association }}</td>
                              <td>RM {{ number_format( $data->total_fund, 2) }}</td>
                            </tr>
                                
                            @endforeach

                            @if($history_application_system->isEmpty() && $sejarah_permohonan == null)

                            <tr>
                              <td colspan="4" class="text-center">
                                <img src="https://image.flaticon.com/icons/png/128/1376/1376786.png" alt="" width="100px">
                                <br>
                                <b>Maaf, rumah ibadat ini tiada sejarah permohonan</b>
                              </td>
                            </tr>

                            @endif 
                            
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

                    <div id="collapseFive" class="collapse show" aria-labelledby="headingFive" data-parent="#accordionFive">
                      <div class="card-body border border-info">

                        <h3 style="text-align: center; padding-bottom: 15px;">Bahagian Ulasan</h3>

                        <div class="row">
                          <div class="col-md-1"></div>
                          <div class="col-md">
                            <label>Disahkan oleh</label>
                            <div class="mb-3 input-group">
                              <input class="form-control text-uppercase @error('exco_name') is-invalid @else border-dark @enderror" id="exco_name" name="exco_name" type="text" value="{{ $exco->name }}" disabled>
                            </div>
                          </div>
                          <div class="col-md-1"></div>
                        </div>

                        <div class="row">
                          <div class="col-md-1"></div>
                          <div class="col-md">
                            <label>Tarikh pengesahan</label>
                            <div class="mb-3 input-group">
                              <input class="form-control text-uppercase @error('exco_date') is-invalid @else border-dark @enderror" id="exco_date" name="exco_date" type="text" value="{{ Carbon\Carbon::parse($permohonan->exco_date_time)->format('d-m-Y') }}" disabled>
                            </div>
                          </div>

                          <div class="col-md">
                            <label>Waktu pengesahan</label>
                            <div class="mb-3 input-group">
                              <input class="form-control text-uppercase @error('exco_time') is-invalid @else border-dark @enderror" id="exco_time" name="exco_time" type="text" value="{{ Carbon\Carbon::parse($permohonan->exco_date_time)->format('g:i a') }}" disabled>
                            </div>
                          </div>
                          <div class="col-md-1"></div>
                        </div>

                        <div class="row">
                          <div class="col-md-1"></div>
                          <div class="col-md">
                            <div class="card text-white">
                                <div class="card-header bg-dark">
                                    <h4 class="m-b-0 text-white" style="text-align: center;">Ulasan Pejabat Exco</h4></div>
                                <div class="card-body border border-dark">
                                    <textarea class="form-control text-uppercase  border-dark " id="address" name="address" rows="6" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" disabled>{{ $permohonan->review_exco }}</textarea>
                                </div>
                            </div>
                          </div>
                          <div class="col-md-1"></div>
                        </div>

                        <hr>

                        <div class="row">
                          <div class="col-md-1"></div>
                          <div class="col-md">
                            <label>Disokong oleh</label>
                            <div class="mb-3 input-group">
                              <input class="form-control text-uppercase @error('yb_name') is-invalid @else border-dark @enderror" id="yb_name" name="yb_name" type="text" value="{{ $yb->name }}" disabled>
                            </div>
                          </div>
                          <div class="col-md-1"></div>
                        </div>

                        <div class="row">
                          <div class="col-md-1"></div>
                          <div class="col-md">
                            <label>Tarikh disokong</label>
                            <div class="mb-3 input-group">
                              <input class="form-control text-uppercase @error('yb_date') is-invalid @else border-dark @enderror" id="yb_date" name="yb_date" type="text" value="{{ Carbon\Carbon::parse($permohonan->yb_date_time)->format('d-m-Y') }}" disabled>
                            </div>
                          </div>

                          <div class="col-md">
                            <label>Waktu disokong</label>
                            <div class="mb-3 input-group">
                              <input class="form-control text-uppercase @error('yb_time') is-invalid @else border-dark @enderror" id="yb_time" name="yb_time" type="text" value="{{ Carbon\Carbon::parse($permohonan->yb_date_time)->format('g:i a') }}" disabled>
                            </div>
                          </div>
                          <div class="col-md-1"></div>
                        </div>

                        <div class="row">
                          <div class="col-md-1"></div>
                          <div class="col-md">
                            <div class="card text-white">
                                <div class="card-header bg-dark">
                                    <h4 class="m-b-0 text-white" style="text-align: center;">Ulasan Pejabat Exco</h4></div>
                                <div class="card-body border border-dark">
                                    <textarea class="form-control text-uppercase  border-dark " id="review_yb" name="review_yb" rows="6" disabled>{{ $permohonan->review_yb }}</textarea>
                                </div>
                            </div>
                          </div>
                          <div class="col-md-1"></div>
                        </div>

                        <hr>

                        <h3 style="text-align: center; padding-bottom: 15px;">Bahagian Peruntukan</h3>

                        <div class="row">
                          <div class="col-md-1"></div>
                          <div class="col-md">
                            <div class="table-responsive m-t-20">
                              <table class="table table-bordered table-responsive-lg">

                                    <thead style="text-align: center;">
                                      <tr>
                                        <th>Bil</th>
                                        <th>Tujuan Permohonan</th>
                                        <th>Peruntukan Yang Diluluskan</th>
                                      </tr>
                                    </thead>

                                    <tbody>

                                        @foreach ($permohonan->tujuan as  $key => $tujuan)
                                            
                                        

                                        @if($tujuan->tujuan == "AKTIVITI KEAGAMAAN")
                                          <tr>
                                              <td>{{ ($key + 1) }}</td>
                                              <td>AKTIVITI KEAGAMAAN</td>
                                              <td><input type="text" id="peruntukan_1" name="peruntukan_1" class="form-control form-control"  value="RM {{ number_format($tujuan->peruntukan, 2) }}"  disabled></td>
                                          </tr>
                                        @endif

                                        @if($tujuan->tujuan == "PENDIDIKAN KEAGAMAAN")
                                          <tr>
                                              <td>{{ ($key + 1) }}</td>
                                              <td>PENDIDIKAN KEAGAMAAN</td>
                                              <td><input type="text" id="peruntukan_2" name="peruntukan_2" class="form-control form-control"  value="RM {{ number_format($tujuan->peruntukan, 2) }}"  disabled></td>
                                          </tr>
                                        @endif

                                        @if($tujuan->tujuan == "PEMBELIAN PERALATAN UNTUK KELAS KEAGAMAAN")
                                          <tr>
                                              <td>{{ ($key + 1) }}</td>
                                              <td>PEMBELIAN PERALATAN UNTUK KELAS KEAGAMAAN</td>
                                              <td><input type="text" id="peruntukan_3" name="peruntukan_3" class="form-control form-control"  value="RM {{ number_format($tujuan->peruntukan, 2) }}"  disabled></td>
                                          </tr>
                                        @endif

                                        @if($tujuan->tujuan == "BAIK PULIH/PENYELENGGARAAN BANGUNAN")
                                          <tr>
                                              <td>{{ ($key + 1) }}</td>
                                              <td>BAIK PULIH/PENYELENGGARAAN BANGUNAN</td>
                                              <td><input type="text" id="peruntukan_4" name="peruntukan_4" class="form-control form-control"  value="RM {{ number_format($tujuan->peruntukan, 2) }}"  disabled></td>
                                          </tr>
                                        @endif

                                        @if($tujuan->tujuan == "PEMINDAHAN/PEMBINAAN BARU RUMAH IBADAT")
                                          <tr>
                                              <td>{{ ($key + 1) }}</td>
                                              <td>PEMINDAHAN/PEMBINAAN BARU RUMAH IBADAT</td>
                                              <td><input type="text" id="peruntukan_5" name="peruntukan_5" class="form-control form-control"  value="RM {{ number_format($tujuan->peruntukan, 2) }}"   disabled></td>
                                          </tr>
                                        @endif

                                        @endforeach
                                        
                                        <tr style="background-color: #137eff !important;">
                                          <td></td>
                                          <th style="text-align: center; color: white;">Jumlah Peruntukan Yang Diluluskan</th>
                                          <th><input type="text" id="total_fund" name="total_fund" class="form-control font-weight-bold"  value="RM {{ number_format($permohonan->total_fund, 2) }}"   disabled></th>
                                        </tr>   
                                        
                                    </tbody>
                                </table>
                            </div>
                          </div>
                          <div class="col-md-1"></div>
                        </div>

                        <div class="row">
                          <div class="col-md-1"></div>
                          <div class="ml-auto">
                            <button type="button" class="btn waves-effect waves-light btn-info" id="sahkan_button" data-toggle="modal" data-target="#kemaskini_peruntukan_modal">Kemaskini Peruntukan</button>
                          </div>
                          <div class="col-md-1"></div>
                        </div>

                        <div class="row" style="padding-top: 15px;">
                          <div class="col-md-1"></div>
                          <div class="col-md-5">
                            <label>Kaedah Pembayaran</label>
                            <div class="mb-3 input-group">
                              <input class="form-control text-uppercase @error('payment_method') is-invalid @else border-dark @enderror" id="payment_method" name="payment_method" type="text" value="{{ $permohonan->payment_method == 1 ? "Cek" : ($permohonan->payment_method == 2 ? "EFT" : "") }}" disabled>
                            </div>
                          </div>
                          <div class="col-md-1"></div>
                        </div>

                        <hr>

                        <h3 style="text-align: center; padding-bottom: 15px;">Keputusan Permohonan</h3> 

                        {{-- <div class="row">
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
                        </div> --}}

                        <div class="row">
                          <div class="col-md-2"></div>
                          <div class="col-md">
                            <form action="{{ route('upens.permohonan.print') }}">
                            <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}" readonly>
                            <button type="submit" class="btn waves-effect waves-light btn-info btn-block"><i class="fas fa-print"></i> &nbsp&nbsp Cetak Permohonan</button>
                            </form>
                          </div>
                          <div class="col-md-2"></div>
                        </div>

                        <div class="row">
                          <div class="col-md-2"></div>
                          <div class="col-md-4" style="padding-top: 15px;">
                            <button type="button" class="btn waves-effect waves-light btn-warning text-dark btn-block" id="semak_semula_button" data-toggle="modal" data-target="#confirmation_review_application">Semak Semula</button>
                          </div>
                          <div class="col-md-4" style="padding-top: 15px;">
                            <button type="button" class="btn waves-effect waves-light btn-danger btn-block" id="batal_button" data-toggle="modal" data-target="#confirmation_batal_permohonan">Permohonan Tidak Lulus</button>
                          </div>
                          <div class="col-md-2"></div>
                        </div>
                        
                        <div class="row" style="padding-top: 10px;">
                          <div class="col-md-2"></div>
                          <div class="col-md" style="padding-top: 5px;">
                            <button type="button" class="btn waves-effect waves-light btn-success btn-block" id="sahkan_button" data-toggle="modal" data-target="#confirmation_luluskan_permohonan">Permohonan Lulus</button>
                          </div>
                          <div class="col-md-2"></div>
                        </div>

                      </div>
                    </div>
                  </div>

                </div>

                {{-- ========================================================= MODAL ========================================================= --}} 
                  <!-- Modal Confirmation -->
              <div class="modal fade" id="kemaskini_peruntukan_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbspPengesahan!</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                  <form action="{{ route('upens.permohonan.kemaskini-peruntukan') }}">

                    <div class="modal-body">
                      
                      <h4>Peruntukan Dana</h4>

                      @if($permohonan->rumah_ibadat->category == "TOKONG")

                      <div class="row">
                        <div class="col-md-12">
                          <label>Baki Peruntukan Kategori Rumah Ibadat - Tokong</label>
                          <div class="mb-3 input-group">
                            <input class="form-control text-uppercase  border-dark " type="text" value="RM {{ number_format(($current_fund->balance_tokong - $yb_approved_fund[0]->peruntukan) , 2) }}" disabled>
                          </div>
                        </div>
                      </div>

                      @elseIf($permohonan->rumah_ibadat->category == "KUIL")

                      <div class="row">
                        <div class="col-md-12">
                          <label>Baki Peruntukan Kategori Rumah Ibadat - Kuil</label>
                          <div class="mb-3 input-group">
                            <input class="form-control text-uppercase  border-dark " type="text" value="RM {{ number_format(($current_fund->balance_kuil - $yb_approved_fund[0]->peruntukan) , 2) }}" disabled>
                          </div>
                        </div>
                      </div>

                      @elseIf($permohonan->rumah_ibadat->category == "GURDWARA")

                      <div class="row">
                        <div class="col-md-12">
                          <label>Baki Peruntukan Kategori Rumah Ibadat - Gurdwara</label>
                          <div class="mb-3 input-group">
                            <input class="form-control text-uppercase  border-dark " type="text" value="RM {{ number_format(($current_fund->balance_kuil - $yb_approved_fund[0]->peruntukan) , 2) }}" disabled>
                          </div>
                        </div>
                      </div>

                      @elseIf($permohonan->rumah_ibadat->category == "GEREJA")

                      <div class="row">
                        <div class="col-md-12">
                          <label>Baki Peruntukan Kategori Rumah Ibadat - Gereja</label>
                          <div class="mb-3 input-group">
                            <input class="form-control text-uppercase  border-dark " type="text" value="RM {{ number_format(($current_fund->balance_gereja - $yb_approved_fund[0]->peruntukan) , 2) }}" disabled>
                          </div>
                        </div>
                      </div>


                      @endif
                          

                      <div class="table-responsive m-t-20">
                        <table class="table table-bordered table-responsive-lg">

                              <thead style="text-align: center;">
                                <tr>
                                  <th>Tujuan Permohonan</th>
                                  <th>Sumbangan Dana (RM)</th>
                                </tr>
                              </thead>

                              <tbody>

                                  @foreach ($permohonan->tujuan as  $key => $tujuan)



                                  @if($tujuan->tujuan == "AKTIVITI KEAGAMAAN")
                                    <tr>
                                        <td>AKTIVITI KEAGAMAAN</td>
                                        <td><input type="text" id="peruntukan_1" name="peruntukan_1" class="form-control form-control-sm" placeholder="Masukkan Nilai" value="{{ $tujuan->peruntukan }}" onkeypress="return fun_AllowOnlyAmountAndDot(this.id);" required></td>
                                    </tr>
                                  @endif

                                  @if($tujuan->tujuan == "PENDIDIKAN KEAGAMAAN")
                                    <tr>
                                        <td>PENDIDIKAN KEAGAMAAN</td>
                                        <td><input type="text" id="peruntukan_2" name="peruntukan_2" class="form-control form-control-sm" placeholder="Masukkan Nilai" value="{{ $tujuan->peruntukan }}" onkeypress="return fun_AllowOnlyAmountAndDot(this.id);" required></td>
                                    </tr>
                                  @endif

                                  @if($tujuan->tujuan == "PEMBELIAN PERALATAN UNTUK KELAS KEAGAMAAN")
                                    <tr>
                                        <td>PEMBELIAN PERALATAN UNTUK KELAS KEAGAMAAN</td>
                                        <td><input type="text" id="peruntukan_3" name="peruntukan_3" class="form-control form-control-sm" placeholder="Masukkan Nilai" value="{{ $tujuan->peruntukan }}" onkeypress="return fun_AllowOnlyAmountAndDot(this.id);" required></td>
                                    </tr>
                                  @endif

                                  @if($tujuan->tujuan == "BAIK PULIH/PENYELENGGARAAN BANGUNAN")
                                    <tr>
                                        <td>BAIK PULIH/PENYELENGGARAAN BANGUNAN</td>
                                        <td><input type="text" id="peruntukan_4" name="peruntukan_4" class="form-control form-control-sm" placeholder="Masukkan Nilai" value="{{ $tujuan->peruntukan }}" onkeypress="return fun_AllowOnlyAmountAndDot(this.id);" required></td>
                                    </tr>
                                  @endif

                                  @if($tujuan->tujuan == "PEMINDAHAN/PEMBINAAN BARU RUMAH IBADAT")
                                    <tr>
                                        <td>PEMINDAHAN/PEMBINAAN BARU RUMAH IBADAT</td>
                                        <td><input type="text" id="peruntukan_5" name="peruntukan_5" class="form-control form-control-sm" placeholder="Masukkan Nilai" value="{{ $tujuan->peruntukan }}" onkeypress="return fun_AllowOnlyAmountAndDot(this.id);" required></td>
                                    </tr>
                                  @endif

                                  @endforeach



                              </tbody>
                          </table>
                      </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                      <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}">
                      <button type="submit" class="btn btn-success">Kemaskini Peruntukan</button>
                    </div>

                  </form>

                  </div>
                </div>
              </div>

                <!-- Modal Confirmation -->
              <div class="modal fade" id="confirmation_luluskan_permohonan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbspPengesahan!</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <form action="{{ route('upens.permohonan.papar.sahkan') }}">

                    <div class="modal-body">
                      Anda pasti mahu meluluskan permohonan ini?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                      <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}">
                      <button type="submit" class="btn btn-success">Permohonan Diluluskan</button>
                    </div>

                    </form>

                  </div>
                </div>
              </div>


                <!-- Modal Rejection -->
              <div class="modal fade" id="confirmation_batal_permohonan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbspPengesahan!</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <form action="{{ route('upens.permohonan.papar.batalkan') }}">

                    <div class="modal-body">
                      Anda pasti tidak meluluskan permohonan ini?

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                      <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}">
                      <button type="submit" class="btn btn-success">Permohonan Tidak Lulus</button>
                    </div>

                    </form>

                  </div>
                </div>
              </div>

                {{-- Modal Semak Semula --}}
                <div class="modal fade" id="confirmation_review_application" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbspPengesahan!</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <form action="{{ route('upens.permohonan.papar.semak-semula') }}">

                    <div class="modal-body">


                      <div class="row">
                        <div class="col-md">Sila pilih <b>(Minimum 1)</b> bahagian yang perlu disemak semula oleh pemohon?</div>
                      </div>

                      <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}">

                      {{-- <hr>

                      <div class="row" style="padding-top: 10px;">
                        <div class="col-md">
                          <label style="padding-bottom: 10px;">Rumah ibadat</label>
                          <fieldset class="checkbox">
                              <label>
                                  <input type="checkbox" value="rumah_ibadat" id="review_1" name="review[]" onclick="semak_semula_validation()"> 
                                  Maklumat Rumah Ibadat Tidak Sah
                              </label>
                          </fieldset>
                        </div>
                      </div> --}}

                      <hr>

                      <div class="row">
                        <div class="col-md">
                          <label style="padding-bottom: 10px;">Dokumen-dokumen lampiran</label>
                          <fieldset class="checkbox">
                              <label>
                                  <input type="checkbox" value="application_letter" id="review_2" name="review[]" onclick="semak_semula_validation()"> 
                                  @if($permohonan->rumah_ibadat->category == "KUIL" || $permohonan->rumah_ibadat->category == "GURDWARA")
                                  Kertas Kerja Permohonan Peruntukan Bagi Tahun Semasa Dan Sebut Harga
                                  @else
                                  Surat Permohonan Kepada Pengurusi Limas
                                  @endif 
                              </label>
                          </fieldset>

                          <fieldset class="checkbox">
                              <label>
                                  <input type="checkbox" value="registration_certificate" id="review_3" name="review[]" onclick="semak_semula_validation()"> 
                                  @if($permohonan->rumah_ibadat->category == "KUIL" || $permohonan->rumah_ibadat->category == "GURDWARA")
                                  Sijil Pendaftaran (Akta Pertubuhan 1966)
                                  @else
                                  Sijil Pendaftaran ROS
                                  @endif 
                              </label>
                          </fieldset>

                          <fieldset class="checkbox">
                              <label>
                                  <input type="checkbox" value="account_statement" id="review_4" name="review[]" onclick="semak_semula_validation()"> 
                                  Penyata Bank
                              </label>
                          </fieldset>

                          @if($permohonan->rumah_ibadat->category == "KUIL" || $permohonan->rumah_ibadat->category == "GURDWARA")
                            <fieldset class="checkbox">
                                <label>
                                    <input type="checkbox" value="spending_statement" id="review_5" name="review[]" onclick="semak_semula_validation()"> 
                                    Penyata Perbelanjaan
                                </label>
                            </fieldset>

                            <fieldset class="checkbox">
                                <label>
                                    <input type="checkbox" value="support_letter" id="review_6" name="review[]" onclick="semak_semula_validation()"> 
                                    Surat Sokongan Daripada Adun Kawasan / Ahli Parlimen / Penyelaras Dun / Ahli Majlis / Ketua Komuniti India
                                </label>
                            </fieldset>
                          @endif
                        </div>
                      </div>

                      <hr>

                      <div class="row">
                        <div class="col-md">
                          <label style="padding-bottom: 10px;">Tujuan Permohonan</label>

                          @foreach ( $permohonan->tujuan as  $key => $tujuan)
                          
                          @if($tujuan->tujuan == "AKTIVITI KEAGAMAAN")
                          <fieldset class="checkbox">
                              <label>
                                  <input type="checkbox" value="{{ $tujuan->tujuan }}" id="review_7" name="review[]" onclick="semak_semula_validation()"> 
                                  {{ $tujuan->tujuan }}
                              </label>
                          </fieldset>
                          @endif

                          @if($tujuan->tujuan == "PENDIDIKAN KEAGAMAAN")
                          <fieldset class="checkbox">
                              <label>
                                  <input type="checkbox" value="{{ $tujuan->tujuan }}" id="review_8" name="review[]" onclick="semak_semula_validation()"> 
                                  {{ $tujuan->tujuan }}
                              </label>
                          </fieldset>
                          @endif

                          @if($tujuan->tujuan == "PEMBELIAN PERALATAN UNTUK KELAS KEAGAMAAN")
                          <fieldset class="checkbox">
                              <label>
                                  <input type="checkbox" value="{{ $tujuan->tujuan }}" id="review_9" name="review[]" onclick="semak_semula_validation()"> 
                                  {{ $tujuan->tujuan }}
                              </label>
                          </fieldset>
                          @endif

                          @if($tujuan->tujuan == "BAIK PULIH/PENYELENGGARAAN BANGUNAN")
                          <fieldset class="checkbox">
                              <label>
                                  <input type="checkbox" value="{{ $tujuan->tujuan }}" id="review_10" name="review[]" onclick="semak_semula_validation()"> 
                                  {{ $tujuan->tujuan }}
                              </label>
                          </fieldset>
                          @endif

                          @if($tujuan->tujuan == "PEMINDAHAN/PEMBINAAN BARU RUMAH IBADAT")
                          <fieldset class="checkbox">
                              <label>
                                  <input type="checkbox" value="{{ $tujuan->tujuan }}" id="review_11" name="review[]" onclick="semak_semula_validation()"> 
                                  {{ $tujuan->tujuan }}
                              </label>
                          </fieldset>
                          @endif


                              
                          @endforeach

                        </div>
                      </div>

                      <hr>

                      <div class="row">
                        <div class="col-md">
                          <div class="card text-white">
                                <div class="card-header bg-dark">
                                    <h4 class="m-b-0 text-white" style="text-align: center;">Ulasan Kepada Pemohon</h4></div>
                                <div class="card-body border border-dark">
                                    <textarea class="form-control text-uppercase  border-dark " id="review_to_applicant" name="review_to_applicant" rows="6" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);"></textarea>
                                </div>
                            </div>
                        </div>
                      </div>

                      

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-success" id="semak_semula_enable" style="display: none">Semak Semula</button>
                      <button type="button" class="btn btn-dark" id="semak_semula_disable" style="display: block" data-toggle="tooltip" data-placement="top" title="Sila tandakan bahagian yang perlu disemak">Semak Semula</button>
                    </div>

                    </form>

                  </div>
                </div>
              </div>

                {{-- ========================================================= END OF MODAL ========================================================= --}}


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
  function semak_semula_validation() {
    // var checkBox1 = document.getElementById("review_1");  
    var checkBox2 = document.getElementById("review_2");
    var checkBox3 = document.getElementById("review_3");
    var checkBox4 = document.getElementById("review_4");
    var checkBox5 = document.getElementById("review_5");
    var checkBox6 = document.getElementById("review_6");
    var checkBox7 = document.getElementById("review_7");
    var checkBox8 = document.getElementById("review_8");
    var checkBox9 = document.getElementById("review_9");
    var checkBox10 = document.getElementById("review_10");
    var checkBox11 = document.getElementById("review_11");

    var counter_checkbox_true = 0;

    if(checkBox2){
      if(checkBox2.checked == true){
        counter_checkbox_true++;
      }
    }

    if(checkBox3){
      if(checkBox3.checked == true){
        counter_checkbox_true++;
      }
    }

    if(checkBox4){
      if(checkBox4.checked == true){
        counter_checkbox_true++;
      }
    }

    if(checkBox5){
      if(checkBox5.checked == true){
        counter_checkbox_true++;
      }
    }

    if(checkBox6){
      if(checkBox6.checked == true){
        counter_checkbox_true++;
      }
    }

    if(checkBox7){
      if(checkBox7.checked == true){
        counter_checkbox_true++;
      }
    }

    if(checkBox8){
      if(checkBox8.checked == true){
        counter_checkbox_true++;
      }
    }

    if(checkBox9){
      if(checkBox9.checked == true){
        counter_checkbox_true++;
      }
    }

    if(checkBox10){
      if(checkBox10.checked == true){
        counter_checkbox_true++;
      }
    }

    if(checkBox11){
      if(checkBox11.checked == true){
        counter_checkbox_true++;
      }
    }

    if(counter_checkbox_true != 0){
      document.getElementById("semak_semula_enable").style.display = "block";
      document.getElementById("semak_semula_disable").style.display = "none";

    } else{
      document.getElementById("semak_semula_enable").style.display = "none";
      document.getElementById("semak_semula_disable").style.display = "block";
    }
  }
</script>

{{-- <script>
  //show or hide payment method
  function showPaymentMethod(){
    if(document.getElementById('LULUS').checked){
      document.getElementById('payment_div').style.display = "block";
    }else{
      document.getElementById('payment_div').style.display = "none";
    }
  }
</script> --}}
@endsection