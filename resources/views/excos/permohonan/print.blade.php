@extends('layouts.layout-exco')

@section('content')


    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->

    <div class="container-fluid">

        <div class="row" style="padding-bottom: 15px;">

            <div class="col-md-12">
                <div class="card border border-info">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <fieldset class="checkbox">
                                    <label>
                                        <input type="checkbox" id="maklumat_permohonan_checkbox" checked> Maklumat
                                        Permohonan
                                    </label>
                                </fieldset>
                                <fieldset class="checkbox">
                                    <label>
                                        <input type="checkbox" id="rumah_ibadat_checkbox" checked> Maklumat Rumah Ibadat
                                    </label>
                                </fieldset>
                                <fieldset class="checkbox">
                                    <label>
                                        <input type="checkbox" id="lampiran_tujuan_checkbox" checked> Lampiran Tujuan
                                    </label>
                                </fieldset>
                            </div>
                            <div class="col-md-4">
                                <fieldset class="checkbox">
                                    <label>
                                        <input type="checkbox" id="tujuan_permohonan_checkbox" checked> Tujuan Permohonan
                                    </label>
                                </fieldset>
                                <fieldset class="checkbox">
                                    <label>
                                        <input type="checkbox" id="maklumat_pemohon_checkbox" checked> Maklumat Pemohon
                                    </label>
                                </fieldset>
                            </div>
                            <div class="col-md-4">
                                <fieldset class="checkbox">
                                    <label>
                                        <input type="checkbox" id="keputusan_ulasan_checkbox" checked> Keputusan dan Ulasan
                                    </label>
                                </fieldset>
                                <fieldset class="checkbox">
                                    <label>
                                        <input type="checkbox" id="lampiran_permohonan_checkbox" checked> Lampiran
                                        Permohonan
                                    </label>
                                </fieldset>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4"></div>
                            <div class="col-md-3">
                                <button type="button" class="btn waves-effect waves-light btn-info btn-block" id="print"><i
                                        class="fas fa-print"></i> &nbsp&nbsp Cetak Permohonan</button>
                            </div>
                            {{-- <div class="col-md-3"></div> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="printableArea">

            <div class="card" id="maklumat_permohonan" style="display:block; page-break-after: auto;">
                <div class="card-body border border-dark">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h3 class="box-title m-t-40 text-center">Maklumat Permohonan</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td width="390">Nombor Rujukan</td>
                                            <td> {{ $permohonan->getPermohonanID() }} </td>
                                        </tr>
                                        <tr>
                                            <td>Status Permohonan</td>
                                            <td>
                                                @if ($permohonan->status == 0)
                                                    Semak Semula
                                                @elseif($permohonan->status == 1)
                                                    Sedang Diproses
                                                @elseif($permohonan->status == 2)
                                                    Lulus
                                                @elseif($permohonan->status == 3)
                                                    Tidak Lulus
                                                @elseif($permohonan->status == 4)
                                                    Batal
                                                @endif
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Kategori Permohonan</td>
                                            <td> {{ ucfirst(strtolower($permohonan->rumah_ibadat->category)) }} </td>
                                        </tr>
                                        @if ($permohonan->yb_id != null)
                                            <tr>
                                                <td>Nombor Batch</td>
                                                <td>Batch {{ $permohonan->batch }} -
                                                    {{ $permohonan->rumah_ibadat->category }} </td>
                                            </tr>

                                            <tr>
                                                <td>Jenis Pembayaran</td>
                                                <td>{{ $permohonan->payment_method == 1 ? 'Check' : 'EFT' }} </td>
                                            </tr>
                                        @endif

                                        <tr>
                                            <td>Tarikh Permohonan Dibuat</td>
                                            <td>{{ Carbon\Carbon::parse($permohonan->created_at)->format('d-m-Y') }}</td>
                                        </tr>

                                        <tr>
                                            <td>Waktu Permohonan Dibuat</td>
                                            <td>{{ Carbon\Carbon::parse($permohonan->created_at)->format('g:i a') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>{{-- end card of maklumat_permohonan --}}

            <div class="card" id="tujuan_permohonan" style="display:auto;">
                <div class="card-body border border-dark">
                    <div class="row">
                        <div class="col-md">
                            <div class="table-responsive m-t-40" style="clear: both;">
                                <h3 class="box-title m-t-40 text-center">Tujuan Permohonan</h3>
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="100">#</th>
                                            <th>Tujuan Permohonan</th>
                                            <th class="text-right" width="180">Peruntukan</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($permohonan->tujuan as $key => $tujuan)



                                            @if ($tujuan->tujuan == 'AKTIVITI KEAGAMAAN')
                                                <tr>
                                                    <td class="text-center">{{ $key + 1 }}</td>
                                                    <td>{{ ucfirst(strtolower($tujuan->tujuan)) }}</td>
                                                    <td class="text-right">RM
                                                        {{ number_format($tujuan->peruntukan, 2) }}</td>
                                                </tr>
                                            @endif

                                            @if ($tujuan->tujuan == 'PENDIDIKAN KEAGAMAAN')
                                                <tr>
                                                    <td class="text-center">{{ $key + 1 }}</td>
                                                    <td>{{ ucfirst(strtolower($tujuan->tujuan)) }}</td>
                                                    <td class="text-right">RM
                                                        {{ number_format($tujuan->peruntukan, 2) }}</td>
                                                </tr>
                                            @endif

                                            @if ($tujuan->tujuan == 'PEMBELIAN PERALATAN UNTUK KELAS KEAGAMAAN')
                                                <tr>
                                                    <td class="text-center">{{ $key + 1 }}</td>
                                                    <td>{{ ucfirst(strtolower($tujuan->tujuan)) }}</td>
                                                    <td class="text-right">RM
                                                        {{ number_format($tujuan->peruntukan, 2) }}</td>
                                                </tr>
                                            @endif

                                            @if ($tujuan->tujuan == 'BAIK PULIH/PENYELENGGARAAN BANGUNAN')
                                                <tr>
                                                    <td class="text-center">{{ $key + 1 }}</td>
                                                    <td>{{ ucfirst(strtolower($tujuan->tujuan)) }}</td>
                                                    <td class="text-right">RM
                                                        {{ number_format($tujuan->peruntukan, 2) }}</td>
                                                </tr>
                                            @endif

                                            @if ($tujuan->tujuan == 'PEMINDAHAN/PEMBINAAN BARU RUMAH IBADAT')
                                                <tr>
                                                    <td class="text-center">{{ $key + 1 }}</td>
                                                    <td>{{ ucfirst(strtolower($tujuan->tujuan)) }}</td>
                                                    <td class="text-right">RM
                                                        {{ number_format($tujuan->peruntukan, 2) }}</td>
                                                </tr>
                                            @endif

                                        @endforeach

                                        <tr class="bg-light">
                                            <th colspan="2" class="text-right">Jumlah Peruntukan Yang Diluluskan</th>
                                            <th class="text-right">RM {{ number_format($permohonan->total_fund, 2) }}
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>{{-- end card of tujuan_permohonan --}}

            <div class="card" id="keputusan_ulasan" style="display:block; page-break-before: always;">
                <div class="card-body border border-dark">
                    <div class="row" style="padding-top: 15px;">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h3 class="box-title m-t-40 text-center">Keputusan Dan Ulasan</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        @if ($permohonan->exco_id != null)
                                            <tr class="bg-light">
                                                <td colspan="2"><b>Pejabat Exco</b></td>
                                            </tr>
                                            <tr>
                                                <td width="390">Permohonan Disahkan Oleh</td>
                                                <td>{{ $exco->name }} </td>
                                            </tr>
                                            <tr>
                                                <td>Tarikh Pengesahan</td>
                                                <td>{{ Carbon\Carbon::parse($permohonan->exco_date_time)->format('d-m-Y') }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Waktu Pengesahan</td>
                                                <td>{{ Carbon\Carbon::parse($permohonan->exco_date_time)->format('g:i a') }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Ulasan Pejabat Exco</td>
                                                <td>{{ $permohonan->review_exco }} </td>
                                            </tr>
                                        @endif

                                        @if ($permohonan->yb_id != null)
                                            <tr class="bg-light">
                                                <td colspan="2"><b>YB Pengerusi</b></td>
                                            </tr>
                                            <tr>
                                                <td width="390">Permohonan Disokong Oleh</td>
                                                <td>{{ $yb->name }} </td>
                                            </tr>
                                            <tr>
                                                <td>Tarikh Disokong</td>
                                                <td>{{ Carbon\Carbon::parse($permohonan->yb_date_time)->format('d-m-Y') }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Waktu Disokong</td>
                                                <td>{{ Carbon\Carbon::parse($permohonan->yb_date_time)->format('g:i a') }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Ulasan Pejabat Exco</td>
                                                <td>{{ $permohonan->review_yb }} </td>
                                            </tr>
                                        @endif

                                        @if ($permohonan->upen_id != null)
                                            <tr class="bg-light">
                                                <td colspan="2"><b>Pejabat UPEN</b></td>
                                            </tr>
                                            <tr>
                                                <td width="390">Permohonan Diluluskan Oleh</td>
                                                <td>{{ $upen->name }} </td>
                                            </tr>
                                            <tr>
                                                <td>Tarikh Diluluskan</td>
                                                <td>{{ Carbon\Carbon::parse($permohonan->upen_date_time)->format('d-m-Y') }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Waktu Diluluskan</td>
                                                <td>{{ Carbon\Carbon::parse($permohonan->upen_date_time)->format('g:i a') }}
                                                </td>
                                            </tr>
                                        @endif

                                        @if ($permohonan->review_to_applicant_id != null && $permohonan->status == 0)
                                            <tr class="bg-light">
                                                <td colspan="2"><b>Semakan Semula</b></td>
                                            </tr>
                                            <tr>
                                                <td width="390">Status disahkan oleh</td>
                                                <td>{{ $review_to_applicant_id->name }} </td>
                                            </tr>
                                            <tr>
                                                <td>Tarikh Status Semakan Semula</td>
                                                <td>{{ Carbon\Carbon::parse($permohonan->updated_at)->format('d-m-Y') }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Waktu Status Semakan Semula</td>
                                                <td>{{ Carbon\Carbon::parse($permohonan->updated_at)->format('g:i a') }}
                                                </td>
                                            </tr>
                                        @endif

                                        @if ($permohonan->not_approved_id != null && $permohonan->status == 3)
                                            <tr class="bg-light">
                                                <td colspan="2"><b>Tidak Lulus</b></td>
                                            </tr>
                                            <tr>
                                                <td width="390">Status disahkan oleh</td>
                                                <td>{{ $not_approved_id->name }} </td>
                                            </tr>
                                            <tr>
                                                <td>Tarikh Status Tidak Lulus</td>
                                                <td>{{ Carbon\Carbon::parse($permohonan->updated_at)->format('d-m-Y') }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Waktu Status Tidak Lulus</td>
                                                <td>{{ Carbon\Carbon::parse($permohonan->updated_at)->format('g:i a') }}
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>{{-- end card of keputusan_ulasan --}}

            {{-- <p style="page-break-after: always;"> </p> --}}

            <div class="card" id="rumah_ibadat" style="display:block; page-break-before: always;">
                <div class="card-body border border-dark">
                    <div class="row" style="padding-top: 15px;">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h3 class="box-title m-t-40 text-center">Maklumat Rumah Ibadat</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td width="390">Kategori Rumah Ibadat</td>
                                            <td> {{ ucfirst(strtolower($permohonan->rumah_ibadat->category)) }} </td>
                                        </tr>

                                        <tr>
                                            <td width="390">Nama Penuh Persatuan Rumah Ibadat Mengikut Sijil</td>
                                            <td>{{ ucfirst(strtolower($permohonan->rumah_ibadat->name_association)) }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Nombor Telefon Wakil Rumah Ibadat</td>
                                            <td>{{ $permohonan->rumah_ibadat->office_phone }}</td>
                                        </tr>

                                        @if ($permohonan->rumah_ibadat->registration_type == 'SENDIRI')

                                            <tr>
                                                <td>Nombor Sijil Pendaftaran / Nombor ROS</td>
                                                <td>{{ $permohonan->rumah_ibadat->registration_number }}</td>
                                            </tr>

                                        @elseif($permohonan->rumah_ibadat->registration_type == "INDUK")

                                            <tr>
                                                <td>Nama Persatuan Rumah Ibadat Induk</td>
                                                <td>{{ $permohonan->rumah_ibadat->name_association_main }}</td>
                                            </tr>

                                            <tr>
                                                <td>Nombor Pendaftaran Induk</td>
                                                <td>{{ $permohonan->rumah_ibadat->registration_type == 'INDUK' ? explode('%', $permohonan->rumah_ibadat->registration_number, 2)[0] : '' }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Nombor Pendaftaran Cawangan</td>
                                                <td>{{ $permohonan->rumah_ibadat->registration_type == 'INDUK' ? explode('%', $permohonan->rumah_ibadat->registration_number, 2)[1] : '' }}
                                                </td>
                                            </tr>

                                        @endif

                                        <tr>
                                            <td>Alamat Rumah Ibadat</td>
                                            <td> {{ $permohonan->rumah_ibadat->address }} </td>
                                        </tr>

                                        <tr>
                                            <td>Poskod</td>
                                            <td>{{ $permohonan->rumah_ibadat->postcode }}</td>
                                        </tr>

                                        <tr>
                                            <td>Daerah</td>
                                            <td> {{ ucfirst(strtolower($permohonan->rumah_ibadat->district)) }} </td>

                                        </tr>

                                        <tr>
                                            <td>Negeri</td>
                                            <td> {{ ucfirst(strtolower($permohonan->rumah_ibadat->state)) }} </td>

                                        </tr>

                                        <tr>
                                            <td>Kawasan PBT</td>
                                            <td>{{ $permohonan->rumah_ibadat->pbt_area }}</td>
                                        </tr>

                                        <tr>
                                            <td width="390">Nama Penuh Persatuan Rumah Ibadat Mengikut Pendaftaran Bank</td>
                                            <td> {{ ucfirst(strtolower($permohonan->rumah_ibadat->name_association_bank)) }}
                                            </td>

                                        </tr>

                                        <tr>
                                            <td>Nama Bank</td>
                                            <td>{{ $permohonan->rumah_ibadat->bank_name }}</td>
                                        </tr>

                                        <tr>
                                            <td>Nombor Akaun</td>
                                            <td>{{ $permohonan->rumah_ibadat->bank_account }}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>{{-- end card of rumah_ibadat --}}

            <div class="card" id="maklumat_pemohon" style="display:block;">
                <div class="card-body border border-dark">

                    <div class="row" style="padding-top: 15px;">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h3 class="box-title m-t-40 text-center">Maklumat Pemohon</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td width="390">Nama Pemohon</td>
                                            <td> {{ ucfirst(strtolower($permohonan->user->name)) }} </td>
                                        </tr>

                                        <tr>
                                            <td>Kad Pengenalan</td>
                                            <td>{{ sprintf('%s-%s-%s', substr($permohonan->user->ic_number, 0, 6), substr($permohonan->user->ic_number, 6, 2), substr($permohonan->user->ic_number, 8)) }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Nombor Telefon</td>
                                            <td>{{ $permohonan->user->mobile_phone }}</td>
                                        </tr>

                                        <tr>
                                            <td>Email</td>
                                            <td>{{ $permohonan->user->email }}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>{{-- end card of maklumat_pemohon --}}

            {{-- <p style="page-break-after: always;"> </p> --}}

            <div class="card" id="lampiran_permohonan" style="display:block; page-break-before: always;">
                <div class="card-body border border-dark">

                    <div class="row" style="padding-top: 15px;">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h3 class="box-title m-t-40 text-center">Lampiran Permohonan</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        @if (pathinfo($permohonan->application_letter, PATHINFO_EXTENSION) == 'jpg' || pathinfo($permohonan->application_letter, PATHINFO_EXTENSION) == 'jpeg' || pathinfo($permohonan->application_letter, PATHINFO_EXTENSION) == 'png')
                                            <tr>
                                                <td width="390">
                                                    @if ($permohonan->rumah_ibadat->category == 'KUIL' || $permohonan->rumah_ibadat->category == 'GURDWARA')
                                                        Kertas Kerja Permohonan Peruntukan Bagi Tahun Semasa Dan Sebut Harga
                                                    @else
                                                        Surat Permohonan Kepada Pengerusi Limas
                                                    @endif
                                                </td>
                                                <td> <img
                                                        src="{{ asset($image_path = str_replace('public', 'storage', $permohonan->application_letter)) }}"
                                                        style="max-width: 750px; padding-bottom: 10px;"> </td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td width="390">
                                                    @if ($permohonan->rumah_ibadat->category == 'KUIL' || $permohonan->rumah_ibadat->category == 'GURDWARA')
                                                        Kertas Kerja Permohonan Peruntukan Bagi Tahun Semasa Dan Sebut Harga
                                                    @else
                                                        Surat Permohonan Kepada Pengerusi Limas
                                                    @endif
                                                </td>
                                                <td><a href="{{ asset($image_path = str_replace('public', 'storage', $permohonan->application_letter)) }}"
                                                        target="_blank">[ FORMAT FAIL DALAM BENTUK PDF ]</a></td>
                                            </tr>
                                        @endif


                                        @if (pathinfo($permohonan->registration_certificate, PATHINFO_EXTENSION) == 'jpg' || pathinfo($permohonan->registration_certificate, PATHINFO_EXTENSION) == 'jpeg' || pathinfo($permohonan->registration_certificate, PATHINFO_EXTENSION) == 'png')
                                            <tr>
                                                <td width="390">
                                                    @if ($permohonan->rumah_ibadat->category == 'KUIL' || $permohonan->rumah_ibadat->category == 'GURDWARA')
                                                        Sijil Pendaftaran (Akta Pertubuhan 1966)
                                                    @else
                                                        Sijil Pendaftaran ROS
                                                    @endif
                                                </td>
                                                <td> <img
                                                        src="{{ asset($image_path = str_replace('public', 'storage', $permohonan->registration_certificate)) }}"
                                                        style="max-width: 750px; padding-bottom: 10px;"> </td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td width="390">
                                                    @if ($permohonan->rumah_ibadat->category == 'KUIL' || $permohonan->rumah_ibadat->category == 'GURDWARA')
                                                        Sijil Pendaftaran (Akta Pertubuhan 1966)
                                                    @else
                                                        Sijil Pendaftaran ROS
                                                    @endif
                                                </td>
                                                <td><a href="{{ asset($image_path = str_replace('public', 'storage', $permohonan->registration_certificate)) }}"
                                                        target="_blank">[ FORMAT FAIL DALAM BENTUK PDF ]</a></td>
                                            </tr>
                                        @endif

                                        @if (pathinfo($permohonan->account_statement, PATHINFO_EXTENSION) == 'jpg' || pathinfo($permohonan->account_statement, PATHINFO_EXTENSION) == 'jpeg' || pathinfo($permohonan->account_statement, PATHINFO_EXTENSION) == 'png')
                                            <tr>
                                                <td width="390">
                                                    Penyata Bank
                                                </td>
                                                <td> <img
                                                        src="{{ asset($image_path = str_replace('public', 'storage', $permohonan->account_statement)) }}"
                                                        style="max-width: 750px; padding-bottom: 10px;"> </td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td width="390">
                                                    Penyata Bank
                                                </td>
                                                <td><a href="{{ asset($image_path = str_replace('public', 'storage', $permohonan->account_statement)) }}"
                                                        target="_blank">[ FORMAT FAIL DALAM BENTUK PDF ]</a></td>

                                            </tr>
                                        @endif

                                        @if ($permohonan->spending_statement != null)

                                            @if (pathinfo($permohonan->spending_statement, PATHINFO_EXTENSION) == 'jpg' || pathinfo($permohonan->spending_statement, PATHINFO_EXTENSION) == 'jpeg' || pathinfo($permohonan->application_letter, PATHINFO_EXTENSION) == 'png')
                                                <tr>
                                                    <td width="390">
                                                        Penyata Perbelanjaan
                                                    </td>
                                                    <td> <img
                                                            src="{{ asset($image_path = str_replace('public', 'storage', $permohonan->spending_statement)) }}"
                                                            style="max-width: 750px; padding-bottom: 10px;"> </td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td width="390">
                                                        Penyata Perbelanjaan
                                                    </td>
                                                    <td><a href="{{ asset($image_path = str_replace('public', 'storage', $permohonan->spending_statement)) }}"
                                                            target="_blank">[ FORMAT FAIL DALAM BENTUK PDF ]</a></td>

                                                </tr>
                                            @endif

                                        @endif

                                        @if ($permohonan->support_letter != null)

                                            @if (pathinfo($permohonan->support_letter, PATHINFO_EXTENSION) == 'jpg' || pathinfo($permohonan->support_letter, PATHINFO_EXTENSION) == 'jpeg' || pathinfo($permohonan->support_letter, PATHINFO_EXTENSION) == 'png')
                                                <tr>
                                                    <td width="390">
                                                        Surat Sokongan Daripada Adun Kawasan / Ahli Parlimen / Penyelaras
                                                        Dun / Ahli Majlis / Ketua Komuniti India
                                                    </td>
                                                    <td> <img
                                                            src="{{ asset($image_path = str_replace('public', 'storage', $permohonan->support_letter)) }}"
                                                            style="max-width: 750px; padding-bottom: 10px;"> </td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td width="390">
                                                        Surat Sokongan Daripada Adun Kawasan / Ahli Parlimen / Penyelaras
                                                        Dun / Ahli Majlis / Ketua Komuniti India
                                                    </td>
                                                    <td><a href="{{ asset($image_path = str_replace('public', 'storage', $permohonan->support_letter)) }}"
                                                            target="_blank">[ FORMAT FAIL DALAM BENTUK PDF ]</a></td>
                                                </tr>
                                            @endif

                                        @endif

                                        @if ($permohonan->committee_member != null)

                                            @if (pathinfo($permohonan->committee_member, PATHINFO_EXTENSION) == 'jpg' || pathinfo($permohonan->committee_member, PATHINFO_EXTENSION) == 'jpeg' || pathinfo($permohonan->committee_member, PATHINFO_EXTENSION) == 'png')
                                                <tr>
                                                    <td width="390">
                                                        Senarai Ahli Jawatan Kuasa Rumah Ibadat
                                                    </td>
                                                    <td> <img
                                                            src="{{ asset($image_path = str_replace('public', 'storage', $permohonan->committee_member)) }}"
                                                            style="max-width: 750px; padding-bottom: 10px;"> </td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td width="390">
                                                        Senarai Ahli Jawatan Kuasa Rumah Ibadat
                                                    </td>
                                                    <td><a href="{{ asset($image_path = str_replace('public', 'storage', $permohonan->committee_member)) }}"
                                                            target="_blank">[ FORMAT FAIL DALAM BENTUK PDF ]</a></td>


                                                </tr>
                                            @endif

                                        @endif

                                        @if ($permohonan->certificate_or_letter_temple != null)

                                            @if (pathinfo($permohonan->certificate_or_letter_temple, PATHINFO_EXTENSION) == 'jpg' || pathinfo($permohonan->certificate_or_letter_temple, PATHINFO_EXTENSION) == 'jpeg' || pathinfo($permohonan->certificate_or_letter_temple, PATHINFO_EXTENSION) == 'png')
                                                <tr>
                                                    <td width="390">
                                                        Sijil Malaysia Hindu Sangam / Malaysia Hindudharma Mahmandram
                                                    </td>
                                                    <td> <img
                                                            src="{{ asset($image_path = str_replace('public', 'storage', $permohonan->certificate_or_letter_temple)) }}"
                                                            style="max-width: 750px; padding-bottom: 10px;"> </td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td width="390">
                                                        Sijil Malaysia Hindu Sangam / Malaysia Hindudharma Mahmandram
                                                    </td>
                                                    <td><a href="{{ asset($image_path = str_replace('public', 'storage', $permohonan->certificate_or_letter_temple)) }}"
                                                            target="_blank">[ FORMAT FAIL DALAM BENTUK PDF ]</a></td>
                                                </tr>
                                            @endif

                                        @endif

                                        @if ($permohonan->invitation_letter != null)

                                            @if (pathinfo($permohonan->invitation_letter, PATHINFO_EXTENSION) == 'jpg' || pathinfo($permohonan->invitation_letter, PATHINFO_EXTENSION) == 'jpeg' || pathinfo($permohonan->invitation_letter, PATHINFO_EXTENSION) == 'png')
                                                <tr>
                                                    <td width="390">
                                                        Surat Jemputan
                                                    </td>
                                                    <td> <img
                                                            src="{{ asset($image_path = str_replace('public', 'storage', $permohonan->invitation_letter)) }}"
                                                            style="max-width: 750px; padding-bottom: 10px;"> </td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td width="390">
                                                        Surat Jemputan
                                                    </td>
                                                    <td><a href="{{ asset($image_path = str_replace('public', 'storage', $permohonan->invitation_letter)) }}"
                                                            target="_blank">[ FORMAT FAIL DALAM BENTUK PDF ]</a></td>
                                                </tr>
                                            @endif

                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>{{-- end card of lampiran_permohonan --}}

            {{-- <p style="page-break-after: always;"> </p> --}}

            <div class="card" id="lampiran_tujuan" style="display:block; page-break-before: always;">
                <div class="card-body border border-dark">

                    <div class="row" style="padding-top: 15px;">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h3 class="box-title m-t-40 text-center">Lampiran Tujuan</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        {{-- @if (pathinfo($permohonan->application_letter, PATHINFO_EXTENSION) == 'jpg' || pathinfo($permohonan->application_letter, PATHINFO_EXTENSION) == 'jpeg' || pathinfo($permohonan->application_letter, PATHINFO_EXTENSION) == 'png')
                                    <tr>
                                        <td width="390">
                                            @if ($permohonan->rumah_ibadat->category == 'KUIL' || $permohonan->rumah_ibadat->category == 'GURDWARA')
                                            Kertas Kerja Permohonan Peruntukan Bagi Tahun Semasa Dan Sebut Harga
                                            @else
                                            Surat Permohonan Kepada Pengerusi Limas
                                            @endif
                                        </td>
                                        <td> <img src="{{ asset( $image_path = str_replace('public', 'storage',  $permohonan->application_letter)) }}" style="max-width: 750px; padding-bottom: 10px;"> </td>
                                    </tr>
                                    @endif --}}
                                        @foreach ($permohonan->tujuan as $key => $data)

                                            @if ($data->tujuan == 'AKTIVITI KEAGAMAAN')

                                                <tr class="bg-light text-center">
                                                    <td colspan="2"><b>Aktiviti Keagamaan</b></td>
                                                </tr>

                                                <tr>
                                                    <td width="390">
                                                        Foto Bangunan atau Aktiviti Persatuan Agama
                                                    </td>
                                                    <td>
                                                        @foreach ($data->lampiran as $key => $data2)
                                                            <img src="{{ asset($image_path = str_replace('public', 'storage', $data2->url)) }}"
                                                                style="max-width: 750px; padding-bottom: 10px;"> <br>
                                                        @endforeach
                                                    </td>
                                                </tr>

                                            @endif

                                            @if ($data->tujuan == 'PENDIDIKAN KEAGAMAAN')

                                                <tr class="bg-light text-center">
                                                    <td colspan="2"><b>Pendidikan Keagamaan</b></td>
                                                </tr>


                                                @foreach ($data->lampiran as $key => $data2)

                                                    @if (pathinfo($data2->url, PATHINFO_EXTENSION) == 'jpg' || pathinfo($data2->url, PATHINFO_EXTENSION) == 'jpeg' || pathinfo($data2->url, PATHINFO_EXTENSION) == 'png')

                                                        <tr>
                                                            <td width="390">
                                                                Senarai Nama Murid, Kad Pengenalan, Jantina dan Umur Murid
                                                            </td>
                                                            <td> <img
                                                                    src="{{ asset($image_path = str_replace('public', 'storage', $data2->url)) }}"
                                                                    style="max-width: 750px; padding-bottom: 10px;"> </td>
                                                        </tr>

                                                    @else

                                                        <tr>
                                                            <td width="390">
                                                                Senarai Nama Murid, Kad Pengenalan, Jantina dan Umur Murid
                                                            </td>
                                                            <td><a href="{{ asset($image_path = str_replace('public', 'storage', $data2->url)) }}"
                                                                    target="_blank">[ FORMAT FAIL DALAM BENTUK PDF ]</a>
                                                            </td>


                                                        </tr>

                                                    @endif

                                                @endforeach


                                            @endif

                                            @if ($data->tujuan == 'PEMBELIAN PERALATAN UNTUK KELAS KEAGAMAAN')

                                                <tr class="bg-light text-center">
                                                    <td colspan="2"><b>Pembelian Peralatan Untuk Kelas Keagamaan</b></td>
                                                </tr>

                                                @foreach ($data->lampiran as $key => $data2)

                                                    @if ($data2->description == 'opt_3_file_1')

                                                        @if (pathinfo($data2->url, PATHINFO_EXTENSION) == 'jpg' || pathinfo($data2->url, PATHINFO_EXTENSION) == 'jpeg' || pathinfo($data2->url, PATHINFO_EXTENSION) == 'png')
                                                            <tr>
                                                                <td width="390">
                                                                    Salinan Sebutharga Daripada Pembekal
                                                                </td>
                                                                <td> <img
                                                                        src="{{ asset($image_path = str_replace('public', 'storage', $data2->url)) }}"
                                                                        style="max-width: 750px; padding-bottom: 10px;">
                                                                </td>
                                                            </tr>
                                                        @else
                                                            <tr>
                                                                <td width="390">
                                                                    Salinan Sebutharga Daripada Pembekal
                                                                </td>
                                                                <td><a href="{{ asset($image_path = str_replace('public', 'storage', $data2->url)) }}"
                                                                        target="_blank">[ FORMAT FAIL DALAM BENTUK PDF ]</a>
                                                                </td>

                                                            </tr>
                                                        @endif

                                                    @endif

                                                @endforeach

                                                <tr>
                                                    <td width="390">
                                                        Foto Lampiran
                                                    </td>
                                                    <td>
                                                        @foreach ($data->lampiran as $key => $data2)

                                                            @if ($data2->description == 'opt_3_file_1')
                                                                @continue
                                                            @endif

                                                            <img src="{{ asset($image_path = str_replace('public', 'storage', $data2->url)) }}"
                                                                style="max-width: 750px; padding-bottom: 10px;">

                                                        @endforeach
                                                    </td>
                                                </tr>

                                            @endif

                                            @if ($data->tujuan == 'BAIK PULIH/PENYELENGGARAAN BANGUNAN')

                                                <tr class="bg-light text-center">
                                                    <td colspan="2"><b>Baik Pulih/Penyelenggaraan Bangunan</b></td>
                                                </tr>

                                                <tr>
                                                    <td width="390">
                                                        Salinan Sebutharga Daripada Pembekal
                                                    </td>
                                                    <td>
                                                        @foreach ($data->lampiran as $key => $data2)

                                                            @if ($data2->description == 'opt_4_file_1')

                                                                @if (pathinfo($data2->url, PATHINFO_EXTENSION) == 'jpg' || pathinfo($data2->url, PATHINFO_EXTENSION) == 'jpeg' || pathinfo($data2->url, PATHINFO_EXTENSION) == 'png')
                                                                    <img src="{{ asset($image_path = str_replace('public', 'storage', $data2->url)) }}"
                                                                        style="max-width: 750px; padding-bottom: 10px;">
                                                                @else
                                                                    <td><a href="{{ asset( $image_path = str_replace('public', 'storage',  $data2->url)) }}" target="_blank">[ FORMAT FAIL DALAM BENTUK PDF ]</a></td>
                                                                @endif

                                                            @endif

                                                        @endforeach
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td width="390">
                                                        Foto Keseluruhan Rumah Ibadat
                                                    </td>
                                                    <td>
                                                        @foreach ($data->lampiran as $key => $data2)

                                                            @if ($data2->description != 'opt_4_photo')
                                                                @continue
                                                            @endif

                                                            <img src="{{ asset($image_path = str_replace('public', 'storage', $data2->url)) }}"
                                                                style="max-width: 750px; padding-bottom: 10px;">

                                                        @endforeach
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td width="390">
                                                        Foto Pembaikan dan Penyelenggaraan
                                                    </td>
                                                    <td>
                                                        @foreach ($data->lampiran as $key => $data2)

                                                            @if ($data2->description != 'opt_4_2_photo')
                                                                @continue
                                                            @endif

                                                            <img src="{{ asset($image_path = str_replace('public', 'storage', $data2->url)) }}"
                                                                style="max-width: 750px; padding-bottom: 10px;">

                                                        @endforeach
                                                    </td>
                                                </tr>


                                            @endif

                                            @if ($data->tujuan == 'PEMINDAHAN/PEMBINAAN BARU RUMAH IBADAT')

                                                <tr class="bg-light text-center">
                                                    <td colspan="2"><b>Pemindahan/Pembinaan Baru Rumah Ibadat</b></td>
                                                </tr>

                                                @foreach ($data->lampiran as $key => $data2)

                                                    @if ($data2->description == 'opt_5_file_1')

                                                        <tr>
                                                            <td width="390">
                                                                Sebutharga Pembekal
                                                            </td>
                                                            <td>

                                                                @if (pathinfo($data2->url, PATHINFO_EXTENSION) == 'jpg' || pathinfo($data2->url, PATHINFO_EXTENSION) == 'jpeg' || pathinfo($data2->url, PATHINFO_EXTENSION) == 'png')
                                                                    <img src="{{ asset($image_path = str_replace('public', 'storage', $data2->url)) }}"
                                                                        style="max-width: 750px; padding-bottom: 10px;">
                                                                @else
                                                                    <td><a href="{{ asset( $image_path = str_replace('public', 'storage',  $data2->url)) }}" target="_blank">[ FORMAT FAIL DALAM BENTUK PDF ]</a></td>
                                                                @endif

                                                            </td>
                                                        </tr>

                                                    @elseif($data2->description == "opt_5_file_2")

                                                        <tr>
                                                            <td width="390">
                                                                Salinan Kebenaran Merancang daripada PBT
                                                            </td>
                                                            <td>

                                                                @if (pathinfo($data2->url, PATHINFO_EXTENSION) == 'jpg' || pathinfo($data2->url, PATHINFO_EXTENSION) == 'jpeg' || pathinfo($data2->url, PATHINFO_EXTENSION) == 'png')
                                                                    <img src="{{ asset($image_path = str_replace('public', 'storage', $data2->url)) }}"
                                                                        style="max-width: 750px; padding-bottom: 10px;">
                                                                @else
                                                                    <td><a href="{{ asset( $image_path = str_replace('public', 'storage',  $data2->url)) }}" target="_blank">[ FORMAT FAIL DALAM BENTUK PDF ]</a></td>
                                                                @endif

                                                            </td>
                                                        </tr>

                                                    @elseif($data2->description == "opt_5_file_3")

                                                        <tr>
                                                            <td width="390">
                                                                Foto Semasa Tapak Rumah Ibadat
                                                            </td>
                                                            <td>

                                                                @if (pathinfo($data2->url, PATHINFO_EXTENSION) == 'jpg' || pathinfo($data2->url, PATHINFO_EXTENSION) == 'jpeg' || pathinfo($data2->url, PATHINFO_EXTENSION) == 'png')
                                                                    <img src="{{ asset($image_path = str_replace('public', 'storage', $data2->url)) }}"
                                                                        style="max-width: 750px; padding-bottom: 10px;">
                                                                @else
                                                                    <td><a href="{{ asset( $image_path = str_replace('public', 'storage',  $data2->url)) }}" target="_blank">[ FORMAT FAIL DALAM BENTUK PDF ]</a></td>
                                                                @endif

                                                            </td>
                                                        </tr>

                                                    @endif

                                                @endforeach

                                                <tr>
                                                    <td width="390">
                                                        Foto Semasa Tapak Rumah Ibadat
                                                    </td>
                                                    <td>
                                                        @foreach ($data->lampiran as $key => $data2)

                                                            @if ($data2->description != 'opt_5_photo')
                                                                @continue
                                                            @endif

                                                            <img src="{{ asset($image_path = str_replace('public', 'storage', $data2->url)) }}"
                                                                style="max-width: 750px; padding-bottom: 10px;">

                                                        @endforeach
                                                    </td>
                                                </tr>


                                            @endif

                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>{{-- end card of lampiran_tujuan --}}


        </div>{{-- end of printablearea --}}

    </div>{{-- end of container-fluid --}}
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <script>
        $("#maklumat_permohonan_checkbox").on('change', function() {

            if ($(this).is(':checked')) {
                //display form
                document.getElementById('maklumat_permohonan').style.display = "block";
            } else {
                //hide form
                document.getElementById('maklumat_permohonan').style.display = "none";
            }
        });

        $("#tujuan_permohonan_checkbox").on('change', function() {

            if ($(this).is(':checked')) {
                //display form
                document.getElementById('tujuan_permohonan').style.display = "block";
            } else {
                //hide form
                document.getElementById('tujuan_permohonan').style.display = "none";
            }
        });

        $("#keputusan_ulasan_checkbox").on('change', function() {

            if ($(this).is(':checked')) {
                //display form
                document.getElementById('keputusan_ulasan').style.display = "block";
            } else {
                //hide form
                document.getElementById('keputusan_ulasan').style.display = "none";
            }
        });

        $("#rumah_ibadat_checkbox").on('change', function() {

            if ($(this).is(':checked')) {
                //display form
                document.getElementById('rumah_ibadat').style.display = "block";
            } else {
                //hide form
                document.getElementById('rumah_ibadat').style.display = "none";
            }
        });

        $("#maklumat_pemohon_checkbox").on('change', function() {

            if ($(this).is(':checked')) {
                //display form
                document.getElementById('maklumat_pemohon').style.display = "block";
            } else {
                //hide form
                document.getElementById('maklumat_pemohon').style.display = "none";
            }
        });

        $("#lampiran_permohonan_checkbox").on('change', function() {

            if ($(this).is(':checked')) {
                //display form
                document.getElementById('lampiran_permohonan').style.display = "block";
            } else {
                //hide form
                document.getElementById('lampiran_permohonan').style.display = "none";
            }
        });

        $("#lampiran_tujuan_checkbox").on('change', function() {

            if ($(this).is(':checked')) {
                //display form
                document.getElementById('lampiran_tujuan').style.display = "block";
            } else {
                //hide form
                document.getElementById('lampiran_tujuan').style.display = "none";
            }
        });
    </script>
    <script>
        $(function() {
            $("#print").click(function() {
                var mode = 'iframe'; //popup
                var close = mode == "popup";
                var options = {
                    mode: mode,
                    popClose: close
                };
                $("div.printableArea").printArea(options);
            });
        });
    </script>

@endsection
