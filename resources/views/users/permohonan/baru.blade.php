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
                    <form method="POST" action="{{ route('users.permohonan.baru.hantar') }}"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="border card-body border-dark">

                            <div class="row" style="padding-bottom: 35px;">
                                <div class="col-md-2">

                                </div>
                                <div class="col-md">
                                    <div class="card-header"
                                        style="text-align: justify; text-justify: inter-word; border: 2px solid black;">
                                        <h5>Arahan:</h5>
                                        <span>1. Bahagian yang bertanda (<label class="required"></label>) wajib di isi
                                            oleh pemohon.</span><br>
                                        <span>2. Format fail untuk <b>'Muat Naik Fail'</b> adalah <b>.pdf</b>, <b>.jpg</b>,
                                            <b>.jpeg</b> dan <b>.png</b> sahaja dan tidak melebihi <b>5mb</b>.</span><br>
                                        <span>3. Format fail untuk <b>'Muat Naik Gambar'</b> adalah <b>.jpg</b>,
                                            <b>.jpeg</b> dan <b>.png</b> sahaja dan tidak melebihi <b>5mb</b>.</span><br>
                                        <span>4. Dokumen yang dimuatnaik haruslah jelas dan boleh dibaca.</span><br>
                                    </div>
                                </div>
                                <div class="col-md-2">

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md" style="display: none;">
                                    <label>Kategori Rumah Ibadat</label>
                                    <div class="mb-3 form-group">
                                        <input class="text-white form-control text-uppercase border-dark bg-danger"
                                            id="category" name="category" type="text"
                                            value="{{ $rumah_ibadat->category }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </div>

                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-4">
                                    <label class="required" style="padding-bottom: 10px;">Pilih Tujuan
                                        Permohonan</label>
                                    <fieldset class="checkbox">
                                        <label>
                                            <input type="checkbox" value="AKTIVITI KEAGAMAAN" id="tujuan_1" name="tujuan[]">
                                            Aktiviti Keagamaan
                                        </label>
                                    </fieldset>
                                    <fieldset class="checkbox">
                                        <label>
                                            <input type="checkbox" value="PENDIDIKAN KEAGAMAAN" id="tujuan_2"
                                                name="tujuan[]"> Pendidikan Keagamaan
                                        </label>
                                    </fieldset>
                                    <fieldset class="checkbox">
                                        <label>
                                            <input type="checkbox" value="PEMBELIAN PERALATAN UNTUK KELAS KEAGAMAAN"
                                                id="tujuan_3" name="tujuan[]"> Pembelian Peralatan Untuk Kelas Keagamaan
                                        </label>
                                    </fieldset>

                                </div>
                                <div class="col-md-4">
                                    <label style="padding-bottom: 10px;">&nbsp</label>
                                    <fieldset class="checkbox">
                                        <label>
                                            <input type="checkbox" value="BAIK PULIH/PENYELENGGARAAN BANGUNAN" id="tujuan_4"
                                                name="tujuan[]"> Baik Pulih/Penyelenggaraan Bangunan
                                        </label>
                                    </fieldset>
                                    <fieldset class="checkbox">
                                        <label>
                                            <input type="checkbox" value="PEMINDAHAN/PEMBINAAN BARU RUMAH IBADAT"
                                                id="tujuan_5" name="tujuan[]"> Pemindahan/Pembinaan Baru Rumah Ibadat
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
                                    @if ($rumah_ibadat->category == 'KUIL' || $rumah_ibadat->category == 'GURDWARA')
                                        <label class="required">Kertas Kerja Permohonan Peruntukan Bagi Tahun Semasa
                                            Dan Sebut Harga</label>
                                    @else
                                        <label class="required">Surat Permohonan Kepada Pengerusi LIMAS</label>
                                    @endif

                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="application_letter"
                                            name="application_letter">
                                        <label class="custom-file-label border-dark" for="application_letter">Muat Naik
                                            Fail</label>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </div>

                            <div class="row" style="padding-top: 15px;">
                                <div class="col-md-2"></div>
                                <div class="col-md">
                                    @if ($rumah_ibadat->category == 'KUIL' || $rumah_ibadat->category == 'GURDWARA')
                                        <label class="required">Sijil Pendaftaran (Akta Pertubuhan 1966)</label>
                                    @else
                                        <label class="required">Sijil Pendaftaran JABATAN PENDAFTARAN PERTUBUHAN
                                            MALAYSIA (ROS)</label>
                                    @endif

                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="registration_certificate"
                                            name="registration_certificate">
                                        <label class="custom-file-label border-dark" for="registration_certificate">Muat
                                            Naik Fail</label>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </div>

                            <div class="row" style="padding-top: 15px;">
                                <div class="col-md-2"></div>
                                <div class="col-md">
                                    <label class="required">Penyata Bank (Muka depan penyata bank)</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="account_statement"
                                            name="account_statement">
                                        <label class="custom-file-label border-dark" for="account_statement">Muat Naik
                                            Fail</label>
                                    </div>
                                </div>

                                @if ($rumah_ibadat->category == 'KUIL' || $rumah_ibadat->category == 'GURDWARA')
                                    <div class="col-md">
                                        <label class="required">Penyata Perbelanjaan</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="spending_statement"
                                                name="spending_statement">
                                            <label class="custom-file-label border-dark" for="spending_statement">Muat Naik
                                                Fail</label>
                                        </div>
                                    </div>
                                @endif

                                <div class="col-md-2"></div>
                            </div>

                            @if ($rumah_ibadat->category == 'KUIL' || $rumah_ibadat->category == 'GURDWARA')

                                <div class="row" style="padding-top: 15px;">
                                    <div class="col-md-2"></div>
                                    <div class="col-md">
                                        <label class="required">Surat Sokongan Daripada Adun Kawasan / Ahli Parlimen /
                                            Penyelaras Dun / Ahli Majlis / Ketua Komuniti India</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="support_letter"
                                                name="support_letter">
                                            <label class="custom-file-label border-dark" for="support_letter">Muat Naik
                                                Fail</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>

                                <div class="row" style="padding-top: 15px;">
                                    <div class="col-md-2"></div>
                                    <div class="col-md">
                                        <label>Senarai Ahli Jawatan Kuasa Rumah Ibadat</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="committee_member"
                                                name="committee_member">
                                            <label class="custom-file-label border-dark" for="committee_member">Muat Naik
                                                Fail</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>

                                <div class="row" style="padding-top: 15px;">
                                    <div class="col-md-2"></div>
                                    <div class="col-md">
                                        @if ($rumah_ibadat->category == 'KUIL')
                                            <label>Sijil Malaysia Hindu Sangam / Malaysia Hindudharma Mahmandram</label>
                                        @else
                                            <label>Sijil/Surat Sokongan Majlis Gudwara Malaysia</label>
                                        @endif
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="certificate_or_letter_temple"
                                                name="certificate_or_letter_temple">
                                            <label class="custom-file-label border-dark"
                                                for="certificate_or_letter_temple">Muat Naik Fail</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>

                                <div class="row" style="padding-top: 15px;">
                                    <div class="col-md-2"></div>
                                    <div class="col-md">
                                        <label>Surat Jemputan</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="invitation_letter"
                                                name="invitation_letter">
                                            <label class="custom-file-label border-dark" for="invitation_letter">Muat Naik
                                                Fail</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>

                            @endif

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

                                <div class="row" style="display: none;">
                                    <div class="col-md-2"></div>
                                    <div class="col-md">
                                        <label>Jumlah Gambar Aktiviti Keagamaan</label>
                                        <div class="mb-3 form-group">
                                            <input class="text-white form-control text-uppercase border-dark bg-danger"
                                                id="total_opt_1_photo" name="total_opt_1_photo" type="text" value="1"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>

                                <div class="field_wrapper_option_1">
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <label class="required">Foto Bangunan dan Aktiviti Persatuan Agama
                                                (Maksimum 5 gambar)</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-success border-dark" id="add_input_opt_1"
                                                        type="button" data-toggle="tooltip" data-placement="left" title=""
                                                        data-original-title="Tambah Gambar"><i
                                                            class="fas fa-plus"></i></button>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input-image" id="opt_1_photo1"
                                                        name="opt_1_photo[]">
                                                    <label class="custom-file-label border-dark" for="opt_1_photo1">Muat
                                                        Naik Gambar</label>
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
                                        <label class="required">Senarai Nama Murid, Kad Pengenalan, Jantina dan Umur
                                            Murid</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="opt_2_file_1"
                                                name="opt_2_file_1">
                                            <label class="custom-file-label border-dark" for="opt_2_file_1">Muat Naik
                                                Fail</label>
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
                                        <label class="required">Salinan Sebutharga Daripada Pembekal</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="opt_3_file_1"
                                                name="opt_3_file_1">
                                            <label class="custom-file-label border-dark" for="opt_3_file_1">Muat Naik
                                                Fail</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>

                                <div class="row" style="display: none;">
                                    <div class="col-md-2"></div>
                                    <div class="col-md">
                                        <label>Jumlah Gambar Salinan Sebutharga Daripada Pembekal</label>
                                        <div class="mb-3 form-group">
                                            <input class="text-white form-control text-uppercase border-dark bg-danger"
                                                id="total_opt_3_photo" name="total_opt_3_photo" type="text" value="1"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>

                                <div class="field_wrapper_option_3" style="padding-top: 10px;">
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md">
                                            <label class="required">Foto Lampiran (Maksimum 5 gambar)</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-success border-dark" id="add_input_opt_3"
                                                        type="button" data-toggle="tooltip" data-placement="left" title=""
                                                        data-original-title="Tambah Gambar"><i
                                                            class="fas fa-plus"></i></button>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input-image" id="opt_3_photo1"
                                                        name="opt_3_photo[]">
                                                    <label class="custom-file-label border-dark" for="opt_3_photo1">Muat
                                                        Naik Gambar</label>
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
                                        <label class="required">Salinan Sebutharga Daripada Pembekal</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="opt_4_file_1"
                                                name="opt_4_file_1">
                                            <label class="custom-file-label border-dark" for="opt_4_file_1">Muat Naik
                                                Fail</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>

                                <div class="row" style="display: none;">
                                    <div class="col-md-2"></div>
                                    <div class="col-md">
                                        <label>Jumlah Gambar Bahagian Bangunan</label>
                                        <div class="mb-3 form-group">
                                            <input class="text-white form-control text-uppercase border-dark bg-danger"
                                                id="total_opt_4_photo" name="total_opt_4_photo" type="text" value="1"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>

                                <div class="field_wrapper_option_4" style="padding-top: 10px;">
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md">
                                            <label class="required">Foto Keseluruhan Rumah Ibadat (Maksimum 5
                                                gambar)</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-success border-dark" id="add_input_opt_4"
                                                        type="button" data-toggle="tooltip" data-placement="left" title=""
                                                        data-original-title="Tambah Gambar"><i
                                                            class="fas fa-plus"></i></button>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input-image" id="opt_4_photo1"
                                                        name="opt_4_photo[]">
                                                    <label class="custom-file-label border-dark" for="opt_4_photo1">Muat
                                                        Naik Gambar</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                </div>

                                <div class="row" style="display: none;">
                                    <div class="col-md-2"></div>
                                    <div class="col-md">
                                        <label>Jumlah Foto Pembaikan dan Penyelenggaraan</label>
                                        <div class="mb-3 form-group">
                                            <input class="text-white form-control text-uppercase border-dark bg-danger"
                                                id="total_opt_4_2_photo" name="total_opt_4_2_photo" type="text" value="1"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>

                                <div class="field_wrapper_option_4_2" style="padding-top: 10px;">
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md">
                                            <label class="required">Foto Pembaikan dan Penyelenggaraan (Maksimum 5
                                                gambar)</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-success border-dark" id="add_input_opt_4_2"
                                                        type="button" data-toggle="tooltip" data-placement="left" title=""
                                                        data-original-title="Tambah Gambar"><i
                                                            class="fas fa-plus"></i></button>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input-image" id="opt_4_2_photo1"
                                                        name="opt_4_2_photo[]">
                                                    <label class="custom-file-label border-dark" for="opt_4_2_photo1">Muat
                                                        Naik Gambar</label>
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
                                        <label class="required">Sebutharga Pembekal</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="opt_5_file_1"
                                                name="opt_5_file_1">
                                            <label class="custom-file-label border-dark" for="opt_5_file_1">Muat Naik
                                                Fail</label>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <label>Salinan Kebenaran Merancang daripada PBT</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="opt_5_file_2"
                                                name="opt_5_file_2">
                                            <label class="custom-file-label border-dark" for="opt_5_file_2">Muat Naik
                                                Fail</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md">
                                        <label class="required">Salinan Pelan Bangunan</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="opt_5_file_3"
                                                name="opt_5_file_3">
                                            <label class="custom-file-label border-dark" for="opt_5_file_3">Muat Naik
                                                Fail</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>

                                <div class="row" style="display: none;">
                                    <div class="col-md-2"></div>
                                    <div class="col-md">
                                        <label>Jumlah Foto Semasa Tapak Rumah Ibadat</label>
                                        <div class="mb-3 form-group">
                                            <input class="text-white form-control text-uppercase border-dark bg-danger"
                                                id="total_opt_5_photo" name="total_opt_5_photo" type="text" value="1"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>

                                <div class="field_wrapper_option_5" style="padding-top: 10px;">
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md">
                                            <label class="required">Foto Semasa Tapak Rumah Ibadat (Maksimum 5
                                                gambar)</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-success border-dark" id="add_input_opt_5"
                                                        type="button" data-toggle="tooltip" data-placement="left" title=""
                                                        data-original-title="Tambah Gambar"><i
                                                            class="fas fa-plus"></i></button>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input-image" id="opt_5_photo1"
                                                        name="opt_5_photo[]">
                                                    <label class="custom-file-label border-dark" for="opt_5_photo1">Muat
                                                        Naik Gambar</label>
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
                                    <button type="button" id="validation_button"
                                        class="btn waves-effect waves-light btn-info btn-block">Hantar Permohonan</button>
                                    {{-- <button type="button" onclick="return loading_modal();">test modal</button> --}}
                                </div>
                                <div class="col-md-3"></div>
                            </div>

                        </div>

                        <!-- Modal Confirmation -->
                        <div class="modal fade" id="confirmation_submit_permohonan" tabindex="-1" role="dialog"
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
                                            onclick="return loading_modal();">Hantar Permohonan</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Validation -->
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
            $('#confirmation_submit_permohonan').modal('hide');
            $("#loading_upload").modal({
                backdrop: 'static',
                keyboard: false
            });
        }

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




        // ================= UPLOAD IMAGE INPUT CHECKER =================


        // $(".custom-file-input-image").on("change", function() {
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
        //   if(numb > 1.0){ //change file limit here (MB)
        //   //change border color to black
        //   $(this).next('.custom-file-label').removeClass( "border-success" ).addClass("border-dark");
        //   $(this).removeClass("is-valid");

        //   //alert message
        //   alert('Ralat! Fail anda melebihi 1mb. Saiz fail anda adalah: ' + numb +' MB');

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
        // ================= DYNAMIC IMAGE UPLOAD =================

        $(document).ready(function() {
            var number_of_image = 5 //Input fields increment limitation

            var maxField_option1 = number_of_image;
            var maxField_option3 = number_of_image;
            var maxField_option4 = number_of_image;
            var maxField_option4_2 = number_of_image;
            var maxField_option5 = number_of_image;

            //Add button selector
            var addButton_option1 = $("#add_input_opt_1");
            var addButton_option3 = $("#add_input_opt_3");
            var addButton_option4 = $("#add_input_opt_4");
            var addButton_option4_2 = $("#add_input_opt_4_2");
            var addButton_option5 = $("#add_input_opt_5");

            //Input field wrapper
            var wrapper_option1 = $('.field_wrapper_option_1');
            var wrapper_option3 = $('.field_wrapper_option_3');
            var wrapper_option4 = $('.field_wrapper_option_4');
            var wrapper_option4_2 = $('.field_wrapper_option_4_2');
            var wrapper_option5 = $('.field_wrapper_option_5');
            var wrapper_general = $(
                '.field_wrapper_option_1, .field_wrapper_option_3, .field_wrapper_option_4, .field_wrapper_option_4_2, .field_wrapper_option_5'
            );

            //increment
            var x_opt1 = 1;
            var x_opt3 = 1;
            var x_opt4 = 1;
            var x_opt4_2 = 1;
            var x_opt5 = 1;

            //Initial field counter is 1
            var y_opt1 = 1;
            var y_opt3 = 1;
            var y_opt4 = 1;
            var y_opt4_2 = 1;
            var y_opt5 = 1;

            //***************************************** OPTION 1 *****************************************

            //Once add button is clicked
            $(addButton_option1).click(function() {
                //Check maximum number of input fields
                if (y_opt1 < maxField_option1) {
                    x_opt1++;
                    y_opt1++; //Increment field counter
                    $('#total_opt_1_photo').val(x_opt1); //display counter
                    $(wrapper_option1).append(
                        '<div class="row"><div class="col-md-2"></div><div class="col-md"><label>&nbsp</label><div class="input-group-prepend"><div class="input-group-prepend"><button class="btn btn-danger border-dark" id="remove_input_opt_1" type="button" data-toggle="tooltip" data-placement="left" title="" data-original-title="Buang Gambar"><i class="fas fa-times"></i></button></div><div class="custom-file"><input type="file" class="custom-file-input-image" id="opt_1_photo' +
                        x_opt1 +
                        '" name="opt_1_photo[]"><label class="custom-file-label border-dark" for="opt_1_photo' +
                        x_opt1 +
                        '">Muat Naik Gambar</label></div></div></div><div class="col-md-2"></div></div>'
                    ); //Add field html
                } else {
                    // alert('Muat naik gambar terhad kepada 5 gambar sahaja untuk satu bahagian.');
                    $('#note_message').html(
                        'Muat naik gambar terhad kepada 5 gambar sahaja untuk satu bahagian.');
                    $("#validation_submit_permohonan").modal();
                }
            });

            //Once remove button is clicked
            $(wrapper_option1).on('click', '#remove_input_opt_1', function(e) {
                e.preventDefault();
                $(this).parent('div').parent('div').parent('div').remove(); //Remove field html
                y_opt1--; //Decrement field counter
            });

            //***************************************** END OF OPTION 1 *****************************************

            //***************************************** OPTION 3 *****************************************

            //Once add button is clicked
            $(addButton_option3).click(function() {
                //Check maximum number of input fields
                if (y_opt3 < maxField_option3) {
                    x_opt3++;
                    y_opt3++; //Increment field counter
                    $('#total_opt_3_photo').val(x_opt3); //display counter
                    $(wrapper_option3).append(
                        '<div class="row"><div class="col-md-2"></div><div class="col-md"><label>&nbsp</label><div class="input-group-prepend"><div class="input-group-prepend"><button class="btn btn-danger border-dark" id="remove_input_opt_3" type="button" data-toggle="tooltip" data-placement="left" title="" data-original-title="Buang Gambar"><i class="fas fa-times"></i></button></div><div class="custom-file"><input type="file" class="custom-file-input-image" id="opt_3_photo' +
                        y_opt3 +
                        '" name="opt_3_photo[]"><label class="custom-file-label border-dark" for="opt_3_photo' +
                        y_opt3 +
                        '">Muat Naik Gambar</label></div></div></div><div class="col-md-2"></div></div>'
                    ); //Add field html
                } else {
                    // alert('Muat naik gambar terhad kepada 5 gambar sahaja untuk satu bahagian.');
                    $('#note_message').html(
                        'Muat naik gambar terhad kepada 5 gambar sahaja untuk satu bahagian.');
                    $("#validation_submit_permohonan").modal();
                }
            });

            //Once remove button is clicked
            $(wrapper_option3).on('click', '#remove_input_opt_3', function(e) {
                e.preventDefault();
                $(this).parent('div').parent('div').parent('div').remove(); //Remove field html
                y_opt3--; //Decrement field counter
            });

            //***************************************** END OF OPTION 3 *****************************************

            //***************************************** OPTION 4 *****************************************

            //Once add button is clicked
            $(addButton_option4).click(function() {
                //Check maximum number of input fields
                if (y_opt4 < maxField_option4) {
                    x_opt4++;
                    y_opt4++; //Increment field counter
                    $('#total_opt_4_photo').val(x_opt4); //display counter
                    $(wrapper_option4).append(
                        '<div class="row"><div class="col-md-2"></div><div class="col-md"><label>&nbsp</label><div class="input-group-prepend"><div class="input-group-prepend"><button class="btn btn-danger border-dark" id="remove_input_opt_4" type="button" data-toggle="tooltip" data-placement="left" title="" data-original-title="Buang Gambar"><i class="fas fa-times"></i></button></div><div class="custom-file"><input type="file" class="custom-file-input-image" id="opt_4_photo' +
                        y_opt4 +
                        '" name="opt_4_photo[]"><label class="custom-file-label border-dark" for="opt_4_photo' +
                        y_opt4 +
                        '">Muat Naik Gambar</label></div></div></div><div class="col-md-2"></div></div>'
                    ); //Add field html
                } else {
                    // alert('Muat naik gambar terhad kepada 5 gambar sahaja untuk satu bahagian.');
                    $('#note_message').html(
                        'Muat naik gambar terhad kepada 5 gambar sahaja untuk satu bahagian.');
                    $("#validation_submit_permohonan").modal();
                }
            });

            //Once remove button is clicked
            $(wrapper_option4).on('click', '#remove_input_opt_4', function(e) {
                e.preventDefault();
                $(this).parent('div').parent('div').parent('div').remove(); //Remove field html
                y_opt4--; //Decrement field counter
            });

            //***************************************** OPTION 4 - PART 2 *****************************************

            //Once add button is clicked
            $(addButton_option4_2).click(function() {
                //Check maximum number of input fields
                if (y_opt4_2 < maxField_option4_2) {
                    x_opt4_2++;
                    y_opt4_2++; //Increment field counter
                    $('#total_opt_4_2_photo').val(x_opt4_2); //display counter
                    $(wrapper_option4_2).append(
                        '<div class="row"><div class="col-md-2"></div><div class="col-md"><label>&nbsp</label><div class="input-group-prepend"><div class="input-group-prepend"><button class="btn btn-danger border-dark" id="remove_input_opt_4_2" type="button" data-toggle="tooltip" data-placement="left" title="" data-original-title="Buang Gambar"><i class="fas fa-times"></i></button></div><div class="custom-file"><input type="file" class="custom-file-input-image" id="opt_4_2_photo' +
                        y_opt4_2 +
                        '" name="opt_4_2_photo[]"><label class="custom-file-label border-dark" for="opt_4_2_photo' +
                        y_opt4_2 +
                        '">Muat Naik Gambar</label></div></div></div><div class="col-md-2"></div></div>'
                    ); //Add field html
                } else {
                    // alert('Muat naik gambar terhad kepada 5 gambar sahaja untuk satu bahagian.');
                    $('#note_message').html(
                        'Muat naik gambar terhad kepada 5 gambar sahaja untuk satu bahagian.');
                    $("#validation_submit_permohonan").modal();
                }
            });

            //Once remove button is clicked
            $(wrapper_option4_2).on('click', '#remove_input_opt_4_2', function(e) {
                e.preventDefault();
                $(this).parent('div').parent('div').parent('div').remove(); //Remove field html
                y_opt4_2--; //Decrement field counter
            });

            //***************************************** END OF OPTION 4 *****************************************

            //***************************************** OPTION 5 *****************************************

            //Once add button is clicked
            $(addButton_option5).click(function() {
                //Check maximum number of input fields
                if (y_opt5 < maxField_option5) {
                    x_opt5++;
                    y_opt5++; //Increment field counter
                    $('#total_opt_5_photo').val(x_opt5); //display counter
                    $(wrapper_option5).append(
                        '<div class="row"><div class="col-md-2"></div><div class="col-md"><label>&nbsp</label><div class="input-group-prepend"><div class="input-group-prepend"><button class="btn btn-danger border-dark" id="remove_input_opt_5" type="button" data-toggle="tooltip" data-placement="left" title="" data-original-title="Buang Gambar"><i class="fas fa-times"></i></button></div><div class="custom-file"><input type="file" class="custom-file-input-image" id="opt_5_photo' +
                        y_opt5 +
                        '" name="opt_5_photo[]"><label class="custom-file-label border-dark" for="opt_5_photo' +
                        y_opt5 +
                        '">Muat Naik Gambar</label></div></div></div><div class="col-md-2"></div></div>'
                    ); //Add field html
                } else {
                    // alert('Muat naik gambar terhad kepada 5 gambar sahaja untuk satu bahagian.');
                    $('#note_message').html(
                        'Muat naik gambar terhad kepada 5 gambar sahaja untuk satu bahagian.');
                    $("#validation_submit_permohonan").modal();
                }
            });

            //Once remove button is clicked
            $(wrapper_option5).on('click', '#remove_input_opt_5', function(e) {
                e.preventDefault();
                $(this).parent('div').parent('div').parent('div').remove(); //Remove field html
                y_opt5--; //Decrement field counter
            });

            //***************************************** END OF OPTION 4 *****************************************

            //Image Upload Checker
            $(wrapper_general).on('change', '.custom-file-input-image', function(e) {
                //---------- FILE TYPE CHECKER ----------
                var filePath = $(this).val();
                var allowedExtensions =
                    /(\.jpeg|\.jpg|\.png)$/i; // \.pdf|\.doc|\.docx|\.xls|\.xlsx|\.jpeg|\.jpg|\.png|\.zip|\.rar
                if (!allowedExtensions.exec(filePath)) {
                    //change border color to black
                    $(this).next('.custom-file-label').removeClass("border-success").addClass(
                        "border-dark");
                    $(this).removeClass("is-valid");

                    //alert message
                    // alert('Sila muatnaik file dalam format .jpeg , .jpg dan .png sahaja.');
                    $('#note_message').html(
                        'Sila muatnaik file dalam format <b>.jpeg</b> , <b>.jpg</b> dan <b>.png</b> sahaja.'
                    );
                    $("#validation_submit_permohonan").modal();

                    //reset file value
                    $(this).val(null);

                    //reset file name
                    var fileName = "Muat Naik Gambar";
                    $(this).next('.custom-file-label').html(fileName);

                    return false;
                }

                //---------- FILE SIZE CHECKER ----------
                var numb = $(this)[0].files[0].size / 1024 / 1024;
                numb = numb.toFixed(2);
                if (numb > 5.0) { //change file limit here (MB)
                    //change border color to black
                    $(this).next('.custom-file-label').removeClass("border-success").addClass(
                        "border-dark");
                    $(this).removeClass("is-valid");

                    //alert message
                    // alert('Ralat! Fail anda melebihi 1mb. Saiz fail anda adalah: ' + numb +' MB');
                    $('#note_message').html(
                        'Ralat! Fail anda melebihi <b>5mb</b>. Saiz fail anda adalah: <b>' + numb +
                        ' MB</b>');
                    $("#validation_submit_permohonan").modal();

                    //reset file value
                    $(this).val(null);

                    //reset file name
                    var fileName = "Muat Naik Gambar";
                    $(this).next('.custom-file-label').html(fileName);

                    return false;
                }

                //display upload image
                // var output = document.getElementById('output');
                // output.src = URL.createObjectURL(event.target.files[0]);
                // output.onload = function() {
                //   URL.revokeObjectURL(output.src) // free memory
                // }


                //file name display
                var fileName = $(this).val().split("\\").pop();

                //change border color to green
                $(this).siblings(".custom-file-label").removeClass("border-dark").addClass("border-success")
                    .addClass("selected").html(fileName);
                $(this).addClass("is-valid");
            });
        });

        // ================= END OF DYNAMIC IMAGE UPLOAD  =================

        // ================= Validation form before submit =================

        $(document).ready(function() {
            $("#validation_button").click(function() {

                //fetch data - GENERAL
                var category = $('#category').val();
                var application_letter = $('#application_letter').val();
                var registration_certificate = $('#registration_certificate').val();
                var account_statement = $('#account_statement').val();

                //KUIL Category ONLY!!!
                var spending_statement = $('#spending_statement').val();
                var support_letter = $('#support_letter').val();
                var committee_member = $('#committee_member').val(); // not required
                var certificate_or_letter_temple = $('#certificate_or_letter_temple').val(); //not required
                var invitation_letter = $('#invitation_letter').val(); // not required



                //fetch data - TUJUAN 1
                var total_opt_1_photo = $('#total_opt_1_photo').val(); //image

                //fetch data - TUJUAN 2
                var opt_2_file_1 = $('#opt_2_file_1').val(); //file

                //fetch data - TUJUAN 3
                var opt_3_file_1 = $('#opt_3_file_1').val(); //file
                var total_opt_3_photo = $('#total_opt_3_photo').val(); //image

                //fetch data - TUJUAN 4
                var opt_4_file_1 = $('#opt_4_file_1').val(); //file
                var total_opt_4_photo = $('#total_opt_4_photo').val(); //image
                var total_opt_4_2_photo = $('#total_opt_4_2_photo').val(); //image

                //fetch data - TUJUAN 5
                var opt_5_file_1 = $('#opt_5_file_1').val(); //file
                var opt_5_file_3 = $('#opt_5_file_3').val(); //file
                var total_opt_5_photo = $('#total_opt_5_photo').val(); //image


                // var application_letter = $('#application_letter').val();
                // var application_letter = $('#application_letter').val();
                // var application_letter = $('#application_letter').val();
                // var application_letter = $('#application_letter').val();





                //validation tujuan
                if (!$('#tujuan_1').is(':checked') && !$('#tujuan_2').is(':checked') && !$('#tujuan_3').is(
                        ':checked') && !$('#tujuan_4').is(':checked') && !$('#tujuan_5').is(':checked')) {
                    $('#note_message').html('Sila pilih sekurang-kurangnya <b>1 Tujuan Permohonan</b>.');
                    $("#validation_submit_permohonan").modal();
                    return false;
                }

                //validation surat permohonan
                if (application_letter == "") {

                    if (category == "TOKONG" || category == "GEREJA") {
                        $('#note_message').html(
                            'Sila muat naik <b>Surat Permohonan Kepada Pengerusi LIMAS</b>');
                    } else {
                        $('#note_message').html(
                            'Sila muat naik <b>Kertas Kerja Permohonan Peruntukan Bagi Tahun Semasa Dan Sebut Harga</b>'
                        );
                    }
                    $("#validation_submit_permohonan").modal();
                    return false;
                }

                //validation surat sokongan
                if (registration_certificate == "") {

                    if (category == "TOKONG" || category == "GEREJA") {
                        $('#note_message').html(
                            'Sila muat naik <b>Sijil Pendaftaran JABATAN PENDAFTARAN PERTUBUHAN MALAYSIA (ROS)</b>'
                        );
                    } else {
                        $('#note_message').html(
                            'Sila muat naik <b>Sijil Pendaftaran (Akta Pertubuhan 1966)</b>');
                    }

                    $("#validation_submit_permohonan").modal();
                    return false;
                }

                //validation penyata bank  terkini
                if (account_statement == "") {
                    $('#note_message').html('Sila muat naik <b>Penyata Bank (Muka depan penyata bank)</b>');
                    $("#validation_submit_permohonan").modal();
                    return false;
                }

                //validation penyata perbelanjaan terkini
                if (spending_statement == "" && (category == "KUIL" || category == "GURDWARA")) {
                    $('#note_message').html('Sila muat naik <b>Penyata Perbelanjaan</b>');
                    $("#validation_submit_permohonan").modal();
                    return false;
                }

                //validation surat sokongan
                if (support_letter == "" && (category == "KUIL" || category == "GURDWARA")) {
                    $('#note_message').html(
                        'Sila muat naik <b>Surat Sokongan Daripada Adun Kawasan / Ahli Parlimen / Penyelaras Dun / Ahli Majlis / Ketua Komuniti India</b>'
                    );
                    $("#validation_submit_permohonan").modal();
                    return false;
                }

                //TUJUAN 1 VALIDATION
                if ($('#tujuan_1').is(':checked')) {
                    var total_opt1_uploaded = 0;

                    for (var i = 1; i <= total_opt_1_photo; i++) {
                        if ($('#opt_1_photo' + i).length) { //check id exist or not

                            if ($('#opt_1_photo' + i).val() != "") { // check the image is null or not
                                total_opt1_uploaded++ //increment total uploaded file
                            }

                        }
                    }

                    if (total_opt1_uploaded == 0) { //display alert modal if there is no image uploaded
                        $('#note_message').html(
                            'Sila muat naik <b>Foto Bangunan dan Aktiviti Persatuan Agama</b>');
                        $("#validation_submit_permohonan").modal();
                        return false;
                    }
                }

                //TUJUAN 2 VALIDATION
                if ($('#tujuan_2').is(':checked')) {
                    if (opt_2_file_1 == "") {
                        $('#note_message').html(
                            'Sila muat naik <b>Senarai Nama Murid, Kad Pengenalan, Jantina dan Umur Murid</b>'
                        );
                        $("#validation_submit_permohonan").modal();
                        return false;
                    }
                }

                //TUJUAN 3 VALIDATION
                if ($('#tujuan_3').is(':checked')) {
                    if (opt_3_file_1 == "") {
                        $('#note_message').html(
                            'Sila muat naik <b>Salinan Sebutharga Daripada Pembekal</b>');
                        $("#validation_submit_permohonan").modal();
                        return false;
                    }

                    var total_opt3_uploaded = 0;

                    for (var i = 1; i <= total_opt_3_photo; i++) {
                        if ($('#opt_3_photo' + i).length) { //check id exist or not

                            if ($('#opt_3_photo' + i).val() != "") { // check the image is null or not
                                total_opt3_uploaded++ //increment total uploaded file
                            }

                        }
                    }

                    if (total_opt3_uploaded == 0) { //display alert modal if there is no image uploaded
                        $('#note_message').html('Sila muat naik <b>Foto Lampiran</b>');
                        $("#validation_submit_permohonan").modal();
                        return false;
                    }

                }

                //TUJUAN 4 VALIDATION
                if ($('#tujuan_4').is(':checked')) {
                    if (opt_4_file_1 == "") {
                        $('#note_message').html(
                            'Sila muat naik <b>Salinan Sebutharga Daripada Pembekal</b>');
                        $("#validation_submit_permohonan").modal();
                        return false;
                    }

                    var total_opt4_uploaded = 0;
                    var total_opt4_2_uploaded = 0;


                    for (var i = 1; i <= total_opt_4_photo; i++) {
                        if ($('#opt_4_photo' + i).length) { //check id exist or not

                            if ($('#opt_4_photo' + i).val() != "") { // check the image is null or not
                                total_opt4_uploaded++ //increment total uploaded file
                            }

                        }
                    }

                    for (var i = 1; i <= total_opt_4_2_photo; i++) {
                        if ($('#opt_4_2_photo' + i).length) { //check id exist or not

                            if ($('#opt_4_2_photo' + i).val() != "") { // check the image is null or not
                                total_opt4_2_uploaded++ //increment total uploaded file
                            }

                        }
                    }

                    if (total_opt4_uploaded == 0) { //display alert modal if there is no image uploaded
                        $('#note_message').html('Sila muat naik <b>Foto Keseluruhan Rumah Ibadat</b>');
                        $("#validation_submit_permohonan").modal();
                        return false;
                    }

                    if (total_opt4_2_uploaded == 0) { //display alert modal if there is no image uploaded
                        $('#note_message').html('Sila muat naik <b>Foto Pembaikan dan Penyelenggaraan</b>');
                        $("#validation_submit_permohonan").modal();
                        return false;
                    }
                }

                //TUJUAN 5 VALIDATION
                if ($('#tujuan_5').is(':checked')) {
                    if (opt_5_file_1 == "") {
                        $('#note_message').html('Sila muat naik <b>Sebutharga Pembekal</b>');
                        $("#validation_submit_permohonan").modal();
                        return false;
                    }

                    if (opt_5_file_3 == "") {
                        $('#note_message').html('Sila muat naik <b>Salinan Pelan Bangunan</b>');
                        $("#validation_submit_permohonan").modal();
                        return false;
                    }

                    var total_opt5_uploaded = 0;

                    for (var i = 1; i <= total_opt_5_photo; i++) {
                        if ($('#opt_5_photo' + i).length) { //check id exist or not

                            if ($('#opt_5_photo' + i).val() != "") { // check the image is null or not
                                total_opt5_uploaded++ //increment total uploaded file
                            }

                        }
                    }

                    if (total_opt5_uploaded == 0 && category !=
                        "GEREJA") { //display alert modal if there is no image uploaded
                        $('#note_message').html('Sila muat naik <b>Foto Semasa Tapak Rumah Ibadat</b>');
                        $("#validation_submit_permohonan").modal();
                        return false;
                    }


                }

                //display c5nfirmartion input
                $("#confirmation_submit_permohonan").modal();
            });
        });
    </script>
@endsection
