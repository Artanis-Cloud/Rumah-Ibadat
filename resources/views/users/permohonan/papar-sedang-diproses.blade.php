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

                    <div class="row" style="padding-top: 20px;">
                        <div class="col-md-2"></div>
                        <div class="col-md">

                            <div id="accordionTwo">

                                <div class="card">
                                    <a href="" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="headingTwo" style="color: white;">
                                        {{-- <button data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> --}}
                                        <div class="card-header bg-primary" id="headingTwo">
                                            <h4 class="mb-0"><i
                                                    class="fas fa-place-of-worship"></i>&nbsp&nbsp&nbspMaklumat Rumah Ibadat
                                            </h4>
                                        </div>
                                        {{-- </button> --}}
                                    </a>


                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                        data-parent="#accordionTwo">
                                        <div class="card-body border border-primary">

                                            <div class="row">
                                                <div class="col-md">
                                                    <label class="required">Nama Persatuan Rumah Ibadat Mengikut Sijil</label>
                                                    <div class="form-group">
                                                        <textarea class="form-control text-uppercase  border-dark "
                                                            id="name_association" name="name_association" rows="3"
                                                            disabled>{{ $permohonan->rumah_ibadat->name_association }}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md">

                                                    <label>Kategori Rumah Ibadat</label>
                                                    <div class="mb-3 input-group">
                                                        <input
                                                            class="form-control text-uppercase @error('category') is-invalid @else border-dark @enderror"
                                                            id="category" name="category" type="text"
                                                            value="{{ $permohonan->rumah_ibadat->category }}" disabled>
                                                    </div>

                                                </div>
                                                <div class="col-md">

                                                    <label>Nombor Telefon Pejabat</label>
                                                    <div class="mb-3 input-group">
                                                        <input
                                                            class="form-control text-uppercase @error('office_phone') is-invalid @else border-dark @enderror"
                                                            id="office_phone" name="office_phone" type="text"
                                                            value="{{ $permohonan->rumah_ibadat->office_phone != null ? $permohonan->rumah_ibadat->office_phone : 'TIADA' }}"
                                                            disabled>
                                                    </div>

                                                </div>

                                            </div>

                                            <hr>

                                            @if ($permohonan->rumah_ibadat->registration_type == 'SENDIRI')
                                                <div class="row">

                                                    <div class="col-md">
                                                        <label>Nombor Sijil Pendaftaran / Nombor ROS</label>
                                                        <div class="mb-3 input-group">
                                                            <input
                                                                class="form-control text-uppercase @error('registration_number ') is-invalid @else border-dark @enderror"
                                                                id="registration_number " name="registration_number "
                                                                type="text"
                                                                value="{{ $permohonan->rumah_ibadat->registration_number }}"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif($permohonan->rumah_ibadat->registration_type == "INDUK")

                                                <div class="row">
                                                    <div class="col-md">
                                                        <label class="required">Nama Persatuan Rumah Ibadat
                                                            Induk</label>
                                                        <div class="form-group">
                                                            <textarea class="form-control text-uppercase  border-dark "
                                                                id="name_association_main" name="name_association_main"
                                                                rows="3"
                                                                disabled>{{ $permohonan->rumah_ibadat->name_association_main }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">

                                                    <div class="col-md">
                                                        <label>Nombor Pendaftaran Induk</label>
                                                        <div class="mb-3 input-group">
                                                            <input
                                                                class="form-control text-uppercase @error('registration_number_main') is-invalid @else border-dark @enderror"
                                                                id="registration_number_main"
                                                                name="registration_number_main" type="text"
                                                                value="{{ $permohonan->rumah_ibadat->registration_type == 'INDUK' ? explode('%', $permohonan->rumah_ibadat->registration_number, 2)[0] : '' }}"
                                                                disabled>
                                                        </div>
                                                    </div>

                                                    <div class="col-md">
                                                        <label>Nombor Pendaftaran Cawangan</label>
                                                        <div class="mb-3 input-group">
                                                            <input
                                                                class="form-control text-uppercase @error('registration_number_branch') is-invalid @else border-dark @enderror"
                                                                id="registration_number_branch"
                                                                name="registration_number_branch" type="text"
                                                                value="{{ $permohonan->rumah_ibadat->registration_type == 'INDUK' ? explode('%', $permohonan->rumah_ibadat->registration_number, 2)[1] : '' }}"
                                                                disabled>
                                                        </div>
                                                    </div>

                                                </div>
                                            @endif

                                            <hr>

                                            <div class="row">
                                                <div class="col-md">
                                                    <label class="required">Alamat Rumah Ibadat</label>
                                                    <div class="form-group">
                                                        <textarea class="form-control text-uppercase  border-dark "
                                                            id="address" name="address" rows="4"
                                                            disabled>{{ $permohonan->rumah_ibadat->address }}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md">

                                                    <label>Poskod</label>
                                                    <div class="mb-3 input-group">
                                                        <input
                                                            class="form-control text-uppercase @error('postcode') is-invalid @else border-dark @enderror"
                                                            id="postcode" name="postcode" type="text"
                                                            value="{{ $permohonan->rumah_ibadat->postcode }}" disabled>
                                                    </div>

                                                </div>
                                                <div class="col-md">

                                                    <label>Daerah</label>
                                                    <div class="mb-3 input-group">
                                                        <input
                                                            class="form-control text-uppercase @error('district') is-invalid @else border-dark @enderror"
                                                            id="district" name="district" type="text"
                                                            value="{{ $permohonan->rumah_ibadat->district }}" disabled>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md">

                                                    <label>Negeri</label>
                                                    <div class="mb-3 input-group">
                                                        <input
                                                            class="form-control text-uppercase @error('state') is-invalid @else border-dark @enderror"
                                                            id="state" name="state" type="text"
                                                            value="{{ $permohonan->rumah_ibadat->state }}" disabled>
                                                    </div>

                                                </div>
                                                <div class="col-md">

                                                    <label>Kawasan PBT</label>
                                                    <div class="mb-3 input-group">
                                                        <input
                                                            class="form-control text-uppercase @error('pbt_area') is-invalid @else border-dark @enderror"
                                                            id="pbt_area" name="pbt_area" type="text"
                                                            value="{{ $permohonan->rumah_ibadat->pbt_area }}" disabled>
                                                    </div>

                                                </div>
                                            </div>

                                            <hr>

                                            <div class="row">
                                                <div class="col-md">
                                                    <label class="required">Nama Penuh Persatuan Rumah Ibadat Mengikut Pendaftaran Bank</label>
                                                    <div class="form-group">
                                                        <textarea class="form-control text-uppercase  border-dark "
                                                            id="name_association_bank" name="name_association_bank" rows="3"
                                                            disabled>{{ $permohonan->rumah_ibadat->name_association_bank }}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md">

                                                    <label>Nama Bank</label>
                                                    <div class="mb-3 input-group">
                                                        <input
                                                            class="form-control text-uppercase @error('bank_name') is-invalid @else border-dark @enderror"
                                                            id="bank_name" name="bank_name" type="text"
                                                            value="{{ $permohonan->rumah_ibadat->bank_name }}" disabled>
                                                    </div>

                                                </div>
                                                <div class="col-md">

                                                    <label>Nombor Akaun</label>
                                                    <div class="mb-3 input-group">
                                                        <input
                                                            class="form-control text-uppercase @error('bank_account ') is-invalid @else border-dark @enderror"
                                                            id="bank_account " name="bank_account " type="text"
                                                            value="{{ $permohonan->rumah_ibadat->bank_account }}"
                                                            disabled>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div id="accordion">

                                <div class="card">
                                    <a href="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false"
                                        aria-controls="collapseOne" style="color: white;">
                                        <div class="card-header text-dark bg-warning" id="headingOne">
                                            <h4 class="mb-0">&nbsp<i
                                                    class="fas fa-user"></i>&nbsp&nbsp&nbspMaklumat Pemohon</h4>
                                        </div>
                                    </a>

                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                        data-parent="#accordion">
                                        <div class="card-body border border-warning">

                                            <div class="row">
                                                <div class="col-md">

                                                    <label>Nama</label>
                                                    <div class="mb-3 input-group">
                                                        <input
                                                            class="form-control text-uppercase @error('name') is-invalid @else border-dark @enderror"
                                                            id="name" name="name" type="text"
                                                            value="{{ $permohonan->user->name }}" disabled>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md">

                                                    <label>Kad Pengenalan</label>
                                                    <div class="mb-3 input-group">
                                                        <input
                                                            class="form-control text-uppercase @error('ic_number') is-invalid @else border-dark @enderror"
                                                            id="ic_number" name="ic_number" type="text"
                                                            value="{{ $permohonan->user->ic_number }}" disabled>
                                                    </div>

                                                </div>
                                                <div class="col-md">

                                                    <label>Nombor telefon</label>
                                                    <div class="mb-3 input-group">
                                                        <input
                                                            class="form-control text-uppercase @error('mobile_phone') is-invalid @else border-dark @enderror"
                                                            id="mobile_phone" name="mobile_phone" type="text"
                                                            value="{{ $permohonan->user->mobile_phone }}" disabled>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md">

                                                    <label>Email</label>
                                                    <div class="mb-3 input-group">
                                                        <input
                                                            class="form-control  @error('email') is-invalid @else border-dark @enderror"
                                                            id="email" name="email" type="text"
                                                            value="{{ $permohonan->user->email }}" disabled>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div id="accordionThree">

                                <div class="card">
                                    <a href="" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree" style="color: white;">
                                        <div class="card-header bg-success" id="headingOne">
                                            <h4 class="mb-0">&nbsp<i
                                                    class="fas fa-file"></i>&nbsp&nbsp&nbsp&nbspMaklumat Permohonan</h4>
                                        </div>
                                    </a>

                                    <div id="collapseThree" class="collapse" aria-labelledby="headingOne"
                                        data-parent="#accordionThree">
                                        <div class="card-body  border border-success">

                                            <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md">

                                                    <label>No. Rujukan / Permohonan ID</label>
                                                    <div class="mb-3 input-group">
                                                        <input
                                                            class="form-control  @error('reference_number') is-invalid @else border-dark @enderror"
                                                            id="reference_number" name="reference_number" type="text"
                                                            value="{{ $permohonan->getPermohonanID() }}" disabled>
                                                    </div>

                                                </div>
                                                <div class="col-md-1"></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md">

                                                    <label>Tarikh Permohonan</label>
                                                    <div class="mb-3 input-group">
                                                        <input
                                                            class="form-control  @error('date') is-invalid @else border-dark @enderror"
                                                            id="date" name="date" type="text"
                                                            value="{{ Carbon\Carbon::parse($permohonan->created_at)->format('d-m-Y') }}"
                                                            disabled>
                                                    </div>

                                                </div>
                                                <div class="col-md">

                                                    <label>Waktu Permohonan</label>
                                                    <div class="mb-3 input-group">
                                                        <input
                                                            class="form-control  @error('time') is-invalid @else border-dark @enderror"
                                                            id="time" name="time" type="text"
                                                            value="{{ Carbon\Carbon::parse($permohonan->created_at)->format('g:i a') }}"
                                                            disabled>
                                                    </div>

                                                </div>
                                                <div class="col-md-1"></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md">

                                                    <label>Status Permohonan</label>
                                                    <div class="mb-3 input-group">
                                                        <input
                                                            class="form-control  @error('status') is-invalid @else border-dark @enderror"
                                                            id="status" name="status" type="text" value="Sedang Diproses"
                                                            disabled>
                                                    </div>

                                                </div>
                                                <div class="col-md-1"></div>
                                            </div>

                                            <h3 style="text-align: center; padding-bottom: 15px;">Dokumen-dokumen lampiran
                                            </h3>

                                            <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md">
                                                    <ul class="list-group">
                                                        <li class="list-group-item border border-dark"
                                                            style="text-align: center;">
                                                            {{-- <form action="{{ route('muat-turun.permohonan') }}">
                                      <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}" readonly>
                                      <input type="hidden" name="file_type" value="application_letter" readonly>
                                      <button type="submit" class="btn btn-white bg-white text-info border-0" data-toggle="tooltip" data-placement="bottom" data-original-title="Klik sini untuk muat-turun dokumen">
                                        @if ($permohonan->rumah_ibadat->category == 'KUIL' || $permohonan->rumah_ibadat->category == 'GURDWARA')
                                        Kertas Kerja Permohonan Peruntukan Bagi Tahun Semasa Dan Sebut Harga
                                        @else
                                        Surat Permohonan Kepada Pengerusi Limas
                                        @endif
                                      </button>

                                    </form> --}}
                                                            <a href="{{ asset($image_path = str_replace('public', 'storage', $permohonan->application_letter)) }}"
                                                                target="_blank">
                                                                @if ($permohonan->rumah_ibadat->category == 'KUIL' || $permohonan->rumah_ibadat->category == 'GURDWARA')
                                                                    Kertas Kerja Permohonan Peruntukan Bagi Tahun Semasa Dan
                                                                    Sebut Harga
                                                                @else
                                                                    Surat Permohonan Kepada Pengerusi Limas
                                                                @endif
                                                            </a>
                                                        </li>

                                                        <li class="list-group-item border border-dark"
                                                            style="text-align: center;">
                                                            {{-- <form action="{{ route('muat-turun.permohonan') }}">
                                    <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}" readonly>
                                    <input type="hidden" name="file_type" value="registration_certificate" readonly>
                                    <button type="submit" class="btn btn-white bg-white text-info border-0" data-toggle="tooltip" data-placement="bottom" data-original-title="Klik sini untuk muat-turun dokumen">
                                      @if ($permohonan->rumah_ibadat->category == 'KUIL' || $permohonan->rumah_ibadat->category == 'GURDWARA')
                                      Sijil Pendaftaran (Akta Pertubuhan 1966)
                                      @else
                                      Sijil Pendaftaran ROS
                                      @endif
                                    </button>
                                  </form> --}}
                                                            <a href="{{ asset($image_path = str_replace('public', 'storage', $permohonan->registration_certificate)) }}"
                                                                target="_blank">
                                                                @if ($permohonan->rumah_ibadat->category == 'KUIL' || $permohonan->rumah_ibadat->category == 'GURDWARA')
                                                                    Sijil Pendaftaran (Akta Pertubuhan 1966)
                                                                @else
                                                                    Sijil Pendaftaran ROS
                                                                @endif
                                                            </a>
                                                        </li>

                                                        <li class="list-group-item border border-dark"
                                                            style="text-align: center;">
                                                            {{-- <form action="{{ route('muat-turun.permohonan') }}">
                                    <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}" readonly>
                                    <input type="hidden" name="file_type" value="account_statement" readonly>
                                    <button type="submit" class="btn btn-white bg-white text-info border-0" data-toggle="tooltip" data-placement="bottom" data-original-title="Klik sini untuk muat-turun dokumen">
                                      Penyata Bank
                                    </button>
                                  </form> --}}
                                                            <a href="{{ asset($image_path = str_replace('public', 'storage', $permohonan->account_statement)) }}"
                                                                target="_blank">
                                                                Penyata Bank
                                                            </a>
                                                        </li>

                                                        @if ($permohonan->spending_statement != null)

                                                            <li class="list-group-item border border-dark"
                                                                style="text-align: center;">
                                                                {{-- <form action="{{ route('muat-turun.permohonan') }}">
                                    <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}" readonly>
                                    <input type="hidden" name="file_type" value="spending_statement" readonly>
                                    <button type="submit" class="btn btn-white bg-white text-info border-0" data-toggle="tooltip" data-placement="bottom" data-original-title="Klik sini untuk muat-turun dokumen">
                                      Penyata Perbelanjaan
                                    </button>
                                  </form> --}}

                                                                <a href="{{ asset($image_path = str_replace('public', 'storage', $permohonan->spending_statement)) }}"
                                                                    target="_blank">
                                                                    Penyata Perbelanjaan
                                                                </a>
                                                            </li>

                                                        @endif

                                                        @if ($permohonan->support_letter != null)

                                                            <li class="list-group-item border border-dark"
                                                                style="text-align: center;">
                                                                {{-- <form action="{{ route('muat-turun.permohonan') }}">
                                    <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}" readonly>
                                    <input type="hidden" name="file_type" value="support_letter" readonly>
                                    <button type="submit" class="btn btn-white bg-white text-info border-0" data-toggle="tooltip" data-placement="bottom" data-original-title="Klik sini untuk muat-turun dokumen">
                                      Surat Sokongan Daripada Adun Kawasan / Ahli Parlimen <br> / Penyelaras Dun / Ahli Majlis / Ketua Komuniti India
                                    </button>
                                  </form> --}}

                                                                <a href="{{ asset($image_path = str_replace('public', 'storage', $permohonan->support_letter)) }}"
                                                                    target="_blank">
                                                                    Surat Sokongan Daripada Adun Kawasan / Ahli Parlimen
                                                                    <br> / Penyelaras Dun / Ahli Majlis / Ketua Komuniti
                                                                    India
                                                                </a>
                                                            </li>

                                                        @endif

                                                        @if ($permohonan->committee_member != null)

                                                            <li class="list-group-item border border-dark"
                                                                style="text-align: center;">
                                                                {{-- <form action="{{ route('muat-turun.permohonan') }}">
                                    <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}" readonly>
                                    <input type="hidden" name="file_type" value="committee_member" readonly>
                                    <button type="submit" class="btn btn-white bg-white text-info border-0" data-toggle="tooltip" data-placement="bottom" data-original-title="Klik sini untuk muat-turun dokumen">
                                      Senarai Ahli Jawatan Kuasa Rumah Ibadat
                                    </button>
                                  </form> --}}

                                                                <a href="{{ asset($image_path = str_replace('public', 'storage', $permohonan->committee_member)) }}"
                                                                    target="_blank">
                                                                    Senarai Ahli Jawatan Kuasa Rumah Ibadat
                                                                </a>
                                                            </li>

                                                        @endif

                                                        @if ($permohonan->certificate_or_letter_temple != null)

                                                            <li class="list-group-item border border-dark"
                                                                style="text-align: center;">
                                                                {{-- <form action="{{ route('muat-turun.permohonan') }}">
                                    <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}" readonly>
                                    <input type="hidden" name="file_type" value="certificate_or_letter_temple" readonly>
                                    <button type="submit" class="btn btn-white bg-white text-info border-0" data-toggle="tooltip" data-placement="bottom" data-original-title="Klik sini untuk muat-turun dokumen">
                                      @if ($permohonan->rumah_ibadat->category == 'KUIL')
                                      Sijil Malaysia Hindu Sangam / Malaysia Hindudharma Mahmandram
                                      @elseIf($permohonan->rumah_ibadat->category == "GURDWARA")
                                      Sijil/Surat Sokongan Majlis Gudwara Malaysia
                                      @endif
                                    </button>
                                  </form> --}}

                                                                <a href="{{ asset($image_path = str_replace('public', 'storage', $permohonan->certificate_or_letter_temple)) }}"
                                                                    target="_blank">
                                                                    @if ($permohonan->rumah_ibadat->category == 'KUIL')
                                                                        Sijil Malaysia Hindu Sangam / Malaysia Hindudharma
                                                                        Mahmandram
                                                                    @elseIf($permohonan->rumah_ibadat->category ==
                                                                        "GURDWARA")
                                                                        Sijil/Surat Sokongan Majlis Gudwara Malaysia
                                                                    @endif
                                                                </a>
                                                            </li>

                                                        @endif

                                                        @if ($permohonan->invitation_letter != null)

                                                            <li class="list-group-item border border-dark"
                                                                style="text-align: center;">
                                                                {{-- <form action="{{ route('muat-turun.permohonan') }}">
                                    <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}" readonly>
                                    <input type="hidden" name="file_type" value="invitation_letter" readonly>
                                    <button type="submit" class="btn btn-white bg-white text-info border-0" data-toggle="tooltip" data-placement="bottom" data-original-title="Klik sini untuk muat-turun dokumen">
                                      Surat Jemputan
                                    </button>
                                  </form> --}}

                                                                <a href="{{ asset($image_path = str_replace('public', 'storage', $permohonan->invitation_letter)) }}"
                                                                    target="_blank">
                                                                    Surat Jemputan
                                                                </a>
                                                            </li>

                                                        @endif

                                                    </ul>
                                                </div>
                                                <div class="col-md-1"></div>
                                            </div>

                                            {{-- <span>{{ $permohonan->tujuan }}</span> --}}

                                            @foreach ($permohonan->tujuan as $key => $data)

                                                <hr>

                                                <h3 style="text-align: center; padding-bottom: 15px; ">Tujuan
                                                    {{ $key + 1 }} : {{ ucfirst(trans($data->tujuan)) }}</h3>

                                                {{-- ================================== AKTIVITI KEAGAMAAN ================================== --}}

                                                @if ($data->tujuan == 'AKTIVITI KEAGAMAAN')

                                                    <div class="row">
                                                        <div class="col-md-1"></div>

                                                        <div class="col-md">
                                                            <label>Foto bangunan atau aktiviti persatuan agama</label><br>

                                                            <div id="carouselExampleIndicators1" class="carousel slide"
                                                                data-ride="carousel">
                                                                <ol class="carousel-indicators">
                                                                    @foreach ($data->lampiran as $key => $data2)
                                                                        @if ($loop->first)
                                                                            <li data-target="#carouselExampleIndicators1"
                                                                                data-slide-to="{{ $key }}"
                                                                                class="active"></li>
                                                                        @else
                                                                            <li data-target="#carouselExampleIndicators1"
                                                                                data-slide-to="{{ $key }}"></li>
                                                                        @endif
                                                                    @endforeach
                                                                </ol>
                                                                <div class="carousel-inner" role="listbox">

                                                                    @foreach ($data->lampiran as $key => $data2)

                                                                        @if ($loop->first)
                                                                            <div class="carousel-item active">
                                                                                <img class="img-fluid"
                                                                                    src="{{ asset($image_path = str_replace('public', 'storage', $data2->url)) }}">
                                                                            </div>
                                                                        @else
                                                                            <div class="carousel-item">
                                                                                <img class="img-fluid"
                                                                                    src="{{ asset($image_path = str_replace('public', 'storage', $data2->url)) }}">
                                                                            </div>
                                                                        @endif

                                                                    @endforeach

                                                                </div>
                                                                <a class="carousel-control-prev"
                                                                    href="#carouselExampleIndicators1" role="button"
                                                                    data-slide="prev">
                                                                    <span class="carousel-control-prev-icon"
                                                                        aria-hidden="true"></span>
                                                                    <span class="sr-only">Previous</span>
                                                                </a>
                                                                <a class="carousel-control-next"
                                                                    href="#carouselExampleIndicators1" role="button"
                                                                    data-slide="next">
                                                                    <span class="carousel-control-next-icon"
                                                                        aria-hidden="true"></span>
                                                                    <span class="sr-only">Next</span>
                                                                </a>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-1"></div>
                                                    </div>

                                                @endif
                                                {{-- ================================== END OF AKTIVITI KEAGAMAAN ================================== --}}




                                                {{-- ================================== PENDIDIKAN KEAGAMAAN ================================== --}}

                                                @if ($data->tujuan == 'PENDIDIKAN KEAGAMAAN')

                                                    <div class="row">
                                                        <div class="col-md-1"></div>
                                                        <div class="col-md">
                                                            <ul class="list-group">
                                                                @foreach ($data->lampiran as $key => $data2)
                                                                    <li class="list-group-item border border-dark"
                                                                        style="text-align: center;">
                                                                        <a href="{{ asset($image_path = str_replace('public', 'storage', $data2->url)) }}"
                                                                            target="_blank">
                                                                            Senarai nama murid, kad pengenalan, jantina dan
                                                                            umur murid
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-1"></div>
                                                    </div>

                                                @endif

                                                {{-- ================================== END OF PENDIDIKAN KEAGAMAAN ================================== --}}




                                                {{-- ================================== PEMBELIAN PERALATAN UNTUK KELAS KEAGAMAAN ================================== --}}

                                                @if ($data->tujuan == 'PEMBELIAN PERALATAN UNTUK KELAS KEAGAMAAN')

                                                    <div class="row">
                                                        <div class="col-md-1"></div>
                                                        <div class="col-md">
                                                            <ul class="list-group">
                                                                @foreach ($data->lampiran as $key => $data2)

                                                                    @if ($data2->description == 'opt_3_file_1')
                                                                        <li class="list-group-item border border-dark"
                                                                            style="text-align: center;">
                                                                            <a href="{{ asset($image_path = str_replace('public', 'storage', $data2->url)) }}"
                                                                                target="_blank">
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

                                                            <div id="carouselExampleIndicators2" class="carousel slide"
                                                                data-ride="carousel">
                                                                <ol class="carousel-indicators">

                                                                    <?php $flag_A = 0; ?>
                                                                    <?php $counter_A = 1; ?>
                                                                    @foreach ($data->lampiran as $key => $data2)
                                                                        @if ($data2->description == 'opt_3_file_1')
                                                                            @continue
                                                                        @endif

                                                                        @if ($flag_A == 0)
                                                                            <li data-target="#carouselExampleIndicators2"
                                                                                data-slide-to="{{ $counter_A }}"
                                                                                class="active"></li>
                                                                            <?php $flag_A++; ?>
                                                                            <?php $counter_A++; ?>
                                                                        @else
                                                                            <li data-target="#carouselExampleIndicators2"
                                                                                data-slide-to="{{ $counter_A }}"></li>
                                                                            <?php $counter_A++; ?>
                                                                        @endif
                                                                    @endforeach
                                                                </ol>
                                                                <div class="carousel-inner" role="listbox">

                                                                    <?php $flag_B = 0; ?>
                                                                    @foreach ($data->lampiran as $key => $data2)

                                                                        @if ($data2->description == 'opt_3_file_1')
                                                                            @continue
                                                                        @endif

                                                                        @if ($flag_B == 0)
                                                                            <div class="carousel-item active">
                                                                                <img class="img-fluid"
                                                                                    src="{{ asset($image_path = str_replace('public', 'storage', $data2->url)) }}">
                                                                            </div>
                                                                            <?php $flag_B++; ?>
                                                                        @else
                                                                            <div class="carousel-item">
                                                                                <img class="img-fluid"
                                                                                    src="{{ asset($image_path = str_replace('public', 'storage', $data2->url)) }}">
                                                                            </div>
                                                                        @endif

                                                                    @endforeach

                                                                </div>
                                                                <a class="carousel-control-prev"
                                                                    href="#carouselExampleIndicators2" role="button"
                                                                    data-slide="prev">
                                                                    <span class="carousel-control-prev-icon"
                                                                        aria-hidden="true"></span>
                                                                    <span class="sr-only">Previous</span>
                                                                </a>
                                                                <a class="carousel-control-next"
                                                                    href="#carouselExampleIndicators2" role="button"
                                                                    data-slide="next">
                                                                    <span class="carousel-control-next-icon"
                                                                        aria-hidden="true"></span>
                                                                    <span class="sr-only">Next</span>
                                                                </a>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-1"></div>
                                                    </div>


                                                @endif

                                                {{-- ================================== END OF PEMBELIAN PERALATAN UNTUK KELAS KEAGAMAAN ================================== --}}




                                                {{-- ================================== BAIK PULIH/PENYELENGGARAAN BANGUNAN ================================== --}}

                                                @if ($data->tujuan == 'BAIK PULIH/PENYELENGGARAAN BANGUNAN')

                                                    <div class="row">
                                                        <div class="col-md-1"></div>
                                                        <div class="col-md">
                                                            <ul class="list-group">

                                                                @foreach ($data->lampiran as $key => $data2)

                                                                    @if ($data2->description == 'opt_4_file_1')
                                                                        <li class="list-group-item border border-dark"
                                                                            style="text-align: center;">
                                                                            <a href="{{ asset($image_path = str_replace('public', 'storage', $data2->url)) }}"
                                                                                target="_blank">
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

                                                            <div id="carouselExampleIndicators3" class="carousel slide"
                                                                data-ride="carousel">
                                                                <ol class="carousel-indicators">

                                                                    <?php $flag_C = 0; ?>
                                                                    <?php $counter_C = 1; ?>
                                                                    @foreach ($data->lampiran as $key => $data2)
                                                                        @if ($data2->description != 'opt_4_photo')
                                                                            @continue
                                                                        @endif

                                                                        @if ($flag_C == 0)
                                                                            <li data-target="#carouselExampleIndicators3"
                                                                                data-slide-to="{{ $counter_C }}"
                                                                                class="active"></li>
                                                                            <?php $flag_C++; ?>
                                                                            <?php $counter_C++; ?>
                                                                        @else
                                                                            <li data-target="#carouselExampleIndicators3"
                                                                                data-slide-to="{{ $counter_C }}"></li>
                                                                            <?php $counter_C++; ?>
                                                                        @endif
                                                                    @endforeach
                                                                </ol>
                                                                <div class="carousel-inner" role="listbox">

                                                                    <?php $flag_D = 0; ?>
                                                                    @foreach ($data->lampiran as $key => $data2)

                                                                        @if ($data2->description != 'opt_4_photo')
                                                                            @continue
                                                                        @endif

                                                                        @if ($flag_D == 0)
                                                                            <div class="carousel-item active">
                                                                                <img class="img-fluid"
                                                                                    src="{{ asset($image_path = str_replace('public', 'storage', $data2->url)) }}">
                                                                            </div>
                                                                            <?php $flag_D++; ?>
                                                                        @else
                                                                            <div class="carousel-item">
                                                                                <img class="img-fluid"
                                                                                    src="{{ asset($image_path = str_replace('public', 'storage', $data2->url)) }}">
                                                                            </div>
                                                                        @endif

                                                                    @endforeach

                                                                </div>
                                                                <a class="carousel-control-prev"
                                                                    href="#carouselExampleIndicators3" role="button"
                                                                    data-slide="prev">
                                                                    <span class="carousel-control-prev-icon"
                                                                        aria-hidden="true"></span>
                                                                    <span class="sr-only">Previous</span>
                                                                </a>
                                                                <a class="carousel-control-next"
                                                                    href="#carouselExampleIndicators3" role="button"
                                                                    data-slide="next">
                                                                    <span class="carousel-control-next-icon"
                                                                        aria-hidden="true"></span>
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

                                                            <div id="carouselExampleIndicators4" class="carousel slide"
                                                                data-ride="carousel">
                                                                <ol class="carousel-indicators">

                                                                    <?php $flag_E = 0; ?>
                                                                    <?php $counter_E = 1; ?>
                                                                    @foreach ($data->lampiran as $key => $data2)
                                                                        @if ($data2->description != 'opt_4_2_photo')
                                                                            @continue
                                                                        @endif

                                                                        @if ($flag_E == 0)
                                                                            <li data-target="#carouselExampleIndicators4"
                                                                                data-slide-to="{{ $counter_E }}"
                                                                                class="active"></li>
                                                                            <?php $flag_E++; ?>
                                                                            <?php $counter_E++; ?>
                                                                        @else
                                                                            <li data-target="#carouselExampleIndicators4"
                                                                                data-slide-to="{{ $counter_E }}"></li>
                                                                            <?php $counter_E++; ?>
                                                                        @endif
                                                                    @endforeach
                                                                </ol>
                                                                <div class="carousel-inner" role="listbox">

                                                                    <?php $flag_F = 0; ?>
                                                                    @foreach ($data->lampiran as $key => $data2)

                                                                        @if ($data2->description != 'opt_4_2_photo')
                                                                            @continue
                                                                        @endif

                                                                        @if ($flag_F == 0)
                                                                            <div class="carousel-item active">
                                                                                <img class="img-fluid"
                                                                                    src="{{ asset($image_path = str_replace('public', 'storage', $data2->url)) }}">
                                                                            </div>
                                                                            <?php $flag_F++; ?>
                                                                        @else
                                                                            <div class="carousel-item">
                                                                                <img class="img-fluid"
                                                                                    src="{{ asset($image_path = str_replace('public', 'storage', $data2->url)) }}">
                                                                            </div>
                                                                        @endif

                                                                    @endforeach

                                                                </div>
                                                                <a class="carousel-control-prev"
                                                                    href="#carouselExampleIndicators4" role="button"
                                                                    data-slide="prev">
                                                                    <span class="carousel-control-prev-icon"
                                                                        aria-hidden="true"></span>
                                                                    <span class="sr-only">Previous</span>
                                                                </a>
                                                                <a class="carousel-control-next"
                                                                    href="#carouselExampleIndicators4" role="button"
                                                                    data-slide="next">
                                                                    <span class="carousel-control-next-icon"
                                                                        aria-hidden="true"></span>
                                                                    <span class="sr-only">Next</span>
                                                                </a>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-1"></div>
                                                    </div>

                                                @endif

                                                {{-- ================================== END OF BAIK PULIH/PENYELENGGARAAN BANGUNAN ================================== --}}




                                                {{-- ================================== PEMINDAHAN/PEMBINAAN BARU RUMAH IBADAT ================================== --}}

                                                @if ($data->tujuan == 'PEMINDAHAN/PEMBINAAN BARU RUMAH IBADAT')

                                                    <div class="row">
                                                        <div class="col-md-1"></div>
                                                        <div class="col-md">
                                                            <ul class="list-group">

                                                                @foreach ($data->lampiran as $key => $data2)

                                                                    @if ($data2->description == 'opt_5_file_1')
                                                                        <li class="list-group-item border border-dark"
                                                                            style="text-align: center;">
                                                                            <a href="{{ asset($image_path = str_replace('public', 'storage', $data2->url)) }}"
                                                                                target="_blank">
                                                                                Sebutharga pembekal
                                                                            </a>
                                                                        </li>
                                                                    @elseif($data2->description == "opt_5_file_2")
                                                                        <li class="list-group-item border border-dark"
                                                                            style="text-align: center;">
                                                                            <a href="{{ asset($image_path = str_replace('public', 'storage', $data2->url)) }}"
                                                                                target="_blank">
                                                                                Salinan Kebenaran Merancang
                                                                            </a>
                                                                        </li>
                                                                    @elseif($data2->description == "opt_5_file_3")
                                                                        <li class="list-group-item border border-dark"
                                                                            style="text-align: center;">
                                                                            <a href="{{ asset($image_path = str_replace('public', 'storage', $data2->url)) }}"
                                                                                target="_blank">
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

                                                            <div id="carouselExampleIndicators5" class="carousel slide"
                                                                data-ride="carousel">
                                                                <ol class="carousel-indicators">

                                                                    <?php $flag_G = 0; ?>
                                                                    <?php $counter_G = 1; ?>
                                                                    @foreach ($data->lampiran as $key => $data2)
                                                                        @if ($data2->description != 'opt_5_photo')
                                                                            @continue
                                                                        @endif

                                                                        @if ($flag_G == 0)
                                                                            <li data-target="#carouselExampleIndicators5"
                                                                                data-slide-to="{{ $counter_G }}"
                                                                                class="active"></li>
                                                                            <?php $flag_G++; ?>
                                                                            <?php $counter_G++; ?>
                                                                        @else
                                                                            <li data-target="#carouselExampleIndicators5"
                                                                                data-slide-to="{{ $counter_G }}"></li>
                                                                            <?php $counter_G++; ?>
                                                                        @endif
                                                                    @endforeach
                                                                </ol>
                                                                <div class="carousel-inner" role="listbox">

                                                                    <?php $flag_H = 0; ?>
                                                                    @foreach ($data->lampiran as $key => $data2)

                                                                        @if ($data2->description != 'opt_5_photo')
                                                                            @continue
                                                                        @endif

                                                                        @if ($flag_H == 0)
                                                                            <div class="carousel-item active">
                                                                                <img class="img-fluid"
                                                                                    src="{{ asset($image_path = str_replace('public', 'storage', $data2->url)) }}">
                                                                            </div>
                                                                            <?php $flag_H++; ?>
                                                                        @else
                                                                            <div class="carousel-item">
                                                                                <img class="img-fluid"
                                                                                    src="{{ asset($image_path = str_replace('public', 'storage', $data2->url)) }}">
                                                                            </div>
                                                                        @endif

                                                                    @endforeach

                                                                </div>
                                                                <a class="carousel-control-prev"
                                                                    href="#carouselExampleIndicators5" role="button"
                                                                    data-slide="prev">
                                                                    <span class="carousel-control-prev-icon"
                                                                        aria-hidden="true"></span>
                                                                    <span class="sr-only">Previous</span>
                                                                </a>
                                                                <a class="carousel-control-next"
                                                                    href="#carouselExampleIndicators5" role="button"
                                                                    data-slide="next">
                                                                    <span class="carousel-control-next-icon"
                                                                        aria-hidden="true"></span>
                                                                    <span class="sr-only">Next</span>
                                                                </a>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-1"></div>
                                                    </div>

                                                @endif

                                                {{-- ================================== END OF PEMINDAHAN/PEMBINAAN BARU RUMAH IBADAT ================================== --}}


                                                {{-- @foreach ($data->lampiran as $key => $data2)
                              <h4>{{ $data2->description }}</h4>
                          @endforeach --}}

                                            @endforeach



                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="col-md-2"></div>
                    </div>

                    <div class="row" style="padding-bottom: 25px; padding-top: 25px;">
                        <div class="col-md-4"></div>
                        <div class="col-md">
                            <a href="{{ route('users.permohonan.sedang-diproses') }}"
                                class="btn waves-effect waves-light btn-info btn-block">Kembali</a>
                        </div>
                        <div class="col-md-4"></div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
@endsection
