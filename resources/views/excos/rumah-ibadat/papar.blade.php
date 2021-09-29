@extends('layouts.layout-exco')

@section('content')


    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">

        <div class="row">
            {{-- <div class="col-2"></div> --}}
            <div class="col-12">
                {{-- <div class="card"> --}}

                {{-- <div class="card-body border border-dark"> --}}

                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md">
                        <div id="accordionTwo">

                            <div class="card">
                                {{-- <a href="" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="headingTwo" style="color: white;"> --}}
                                {{-- <button data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> --}}
                                <div class="card-header bg-dark" id="headingTwo">
                                    <h4 class="mb-0" style="color: white;"><i
                                            class="fas fa-place-of-worship"></i>&nbsp&nbsp&nbspMaklumat Rumah Ibadat</h4>
                                </div>
                                {{-- </button> --}}
                                {{-- </a> --}}


                                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo"
                                    data-parent="#accordionTwo">
                                    <div class="card-body border border-dark">

                                        <div class="row">
                                            <div class="col-md">
                                                <label>Nama Persatuan Rumah Ibadat Mengikut Sijil</label>
                                                <div class="form-group">
                                                    <textarea class="form-control text-uppercase  border-dark "
                                                        id="name_association" name="name_association" rows="3"
                                                        disabled>{{ $rumah_ibadat->name_association }}</textarea>
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
                                                        value="{{ $rumah_ibadat->category }}" disabled>
                                                </div>

                                            </div>

                                            <div class="col-md">

                                                <label>Nombor Telefon Pejabat</label>
                                                <div class="mb-3 input-group">
                                                    <input
                                                        class="form-control text-uppercase @error('office_phone') is-invalid @else border-dark @enderror"
                                                        id="office_phone" name="office_phone" type="text"
                                                        value="{{ $rumah_ibadat->office_phone != null ? $rumah_ibadat->office_phone : 'TIADA' }}"
                                                        disabled>
                                                </div>

                                            </div>
                                        </div>

                                        <hr>

                                        @if ($rumah_ibadat->registration_type == 'SENDIRI')
                                            <div class="row">

                                                <div class="col-md">
                                                    <label>Nombor Sijil Pendaftaran / Nombor ROS</label>
                                                    <div class="mb-3 input-group">
                                                        <input
                                                            class="form-control text-uppercase @error('registration_number ') is-invalid @else border-dark @enderror"
                                                            id="registration_number " name="registration_number "
                                                            type="text" value="{{ $rumah_ibadat->registration_number }}"
                                                            disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif($rumah_ibadat->registration_type == "INDUK")
                                            <div class="row">
                                                <div class="col-md">
                                                    <label>Nama Persatuan Rumah Ibadat Induk</label>
                                                    <div class="form-group">
                                                        <textarea class="form-control text-uppercase  border-dark "
                                                            id="name_association_main" name="name_association_main" rows="3"
                                                            disabled>{{ $rumah_ibadat->name_association_main }}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">

                                                <div class="col-md">
                                                    <label>Nombor Pendaftaran Induk</label>
                                                    <div class="mb-3 input-group">
                                                        <input
                                                            class="form-control text-uppercase @error('registration_number_main') is-invalid @else border-dark @enderror"
                                                            id="registration_number_main" name="registration_number_main"
                                                            type="text"
                                                            value="{{ $rumah_ibadat->registration_type == 'INDUK' ? explode('%', $rumah_ibadat->registration_number, 2)[0] : '' }}"
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
                                                            value="{{ $rumah_ibadat->registration_type == 'INDUK' ? explode('%', $rumah_ibadat->registration_number, 2)[1] : '' }}"
                                                            disabled>
                                                    </div>
                                                </div>

                                            </div>
                                        @endif

                                        <hr>

                                        <div class="row">
                                            <div class="col-md">
                                                <label>Alamat Rumah Ibadat</label>
                                                <div class="form-group">
                                                    <textarea class="form-control text-uppercase  border-dark " id="address"
                                                        name="address" rows="4"
                                                        disabled>{{ $rumah_ibadat->address }}</textarea>
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
                                                        value="{{ $rumah_ibadat->postcode }}" disabled>
                                                </div>

                                            </div>
                                            <div class="col-md">

                                                <label>Daerah</label>
                                                <div class="mb-3 input-group">
                                                    <input
                                                        class="form-control text-uppercase @error('district') is-invalid @else border-dark @enderror"
                                                        id="district" name="district" type="text"
                                                        value="{{ $rumah_ibadat->district }}" disabled>
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
                                                        value="{{ $rumah_ibadat->state }}" disabled>
                                                </div>

                                            </div>
                                            <div class="col-md">

                                                <label>Kawasan PBT</label>
                                                <div class="mb-3 input-group">
                                                    <input
                                                        class="form-control text-uppercase @error('pbt_area') is-invalid @else border-dark @enderror"
                                                        id="pbt_area" name="pbt_area" type="text"
                                                        value="{{ $rumah_ibadat->pbt_area }}" disabled>
                                                </div>

                                            </div>
                                        </div>

                                        <hr>

                                        <div class="row">
                                            <div class="col-md">
                                                <label>Nama Penuh Persatuan Rumah Ibadat Mengikut Pendaftaran Bank</label>
                                                <div class="form-group">
                                                    <textarea class="form-control text-uppercase  border-dark "
                                                        id="name_association_bank" name="name_association_bank" rows="3"
                                                        disabled>{{ $rumah_ibadat->name_association_bank }}</textarea>
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
                                                        value="{{ $rumah_ibadat->bank_name }}" disabled>
                                                </div>

                                            </div>
                                            <div class="col-md">

                                                <label>Nombor Akaun</label>
                                                <div class="mb-3 input-group">
                                                    <input
                                                        class="form-control text-uppercase @error('bank_account ') is-invalid @else border-dark @enderror"
                                                        id="bank_account " name="bank_account " type="text"
                                                        value="{{ $rumah_ibadat->bank_account }}" disabled>
                                                </div>

                                            </div>
                                        </div>

                                        <hr>

                                        <h3 class="text-center">Senarai Permohonan</h3>

                                        <div class="row">
                                            <div class="col-md">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered" id="table-laporan"
                                                        style="width: 100%;">
                                                        <thead>
                                                            <tr>
                                                                <th class="all">BIL</th>
                                                                <th class="all">PERMOHONAN ID</th>
                                                                {{-- <th class="all">BATCH</th> --}}
                                                                <th class="all">TARIKH PERMOHONAN DIBUAT</th>
                                                                <th class="all">PEJABAT EXCO</th>
                                                                <th class="all">YB PENGERUSI</th>
                                                                <th class="all">PEJABAT UPEN</th>
                                                                <th class="all">STATUS PERMOHONAN</th>
                                                                <th class="all">TINDAKAN</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>

                                                            @foreach ($permohonan as $data)
                                                                <tr>
                                                                    {{-- BIL --}}
                                                                    <td></td>

                                                                    {{-- PERMOHONAN ID --}}
                                                                    <td>{{ $data->getPermohonanID() }}</td>

                                                                    {{-- TARIKH PERMOHONAN DIBUAT --}}
                                                                    <td>{{ Carbon\Carbon::parse($data->created_at)->format('d-m-Y') }}
                                                                    </td>

                                                                    <td>
                                                                        @if ($data->exco_id != null)
                                                                            <b
                                                                                style="color: rgb(3, 202, 3); font-size: 18px;">
                                                                                &#10003 </b>
                                                                        @else
                                                                            -
                                                                        @endif
                                                                    </td>

                                                                    <td>
                                                                        @if ($data->yb_id != null)
                                                                            <b
                                                                                style="color: rgb(3, 202, 3); font-size: 18px;">
                                                                                &#10003 </b>
                                                                        @else
                                                                            -
                                                                        @endif
                                                                    </td>

                                                                    <td>
                                                                        @if ($data->upen_id != null)
                                                                            <b
                                                                                style="color: rgb(3, 202, 3); font-size: 18px;">
                                                                                &#10003 </b>
                                                                        @else
                                                                            -
                                                                        @endif
                                                                    </td>

                                                                    <td>
                                                                        @if ($data->status == 0)
                                                                            <span class="badge badge-warning"
                                                                                style="font-size: 13px;">Semak
                                                                                Semula</span>
                                                                        @elseIf($data->status == 1)
                                                                            <span class="badge badge-info"
                                                                                style="font-size: 13px;">Sedang
                                                                                Diproses</span>
                                                                        @elseIf($data->status == 2)
                                                                            <span class="badge badge-success"
                                                                                style="font-size: 13px;">Lulus</span>
                                                                        @elseIf($data->status == 3)
                                                                            <span class="badge badge-danger"
                                                                                style="font-size: 13px;">Tidak
                                                                                Lulus</span>
                                                                        @elseIf($data->status == 4)
                                                                            <span class="badge badge-danger"
                                                                                style="font-size: 13px;">Batal</span>
                                                                        @endif
                                                                    </td>

                                                                    <td>
                                                                        <div class="row">
                                                                            <div class="col-md"
                                                                                style="padding: 5px;">
                                                                                @if ($data->status == 0)
                                                                                    <form
                                                                                        action="{{ route('excos.permohonan.semakan-semula.papar') }}"
                                                                                        target="_blank">
                                                                                        <input type="hidden"
                                                                                            name="permohonan_id"
                                                                                            value="{{ $data->id }}"
                                                                                            readonly>
                                                                                        <button type="submit"
                                                                                            class="btn btn-info"><i
                                                                                                class="far fa-eye"></i></button>
                                                                                    </form>
                                                                                @elseif ($data->status == 1 &&
                                                                                    $data->exco_id == null)
                                                                                    <form
                                                                                        action="{{ route('excos.permohonan.papar') }}"
                                                                                        target="_blank">
                                                                                        <input type="hidden"
                                                                                            name="permohonan_id"
                                                                                            value="{{ $data->id }}"
                                                                                            readonly>
                                                                                        <button type="submit"
                                                                                            class="btn btn-info"><i
                                                                                                class="far fa-eye"></i></button>
                                                                                    </form>
                                                                                @elseif ($data->status == 1 &&
                                                                                    $data->exco_id != null)
                                                                                    <form
                                                                                        action="{{ route('excos.permohonan.sedang-diproses.papar') }}"
                                                                                        target="_blank">
                                                                                        <input type="hidden"
                                                                                            name="permohonan_id"
                                                                                            value="{{ $data->id }}"
                                                                                            readonly>
                                                                                        <button type="submit"
                                                                                            class="btn btn-info"><i
                                                                                                class="far fa-eye"></i></button>
                                                                                    </form>
                                                                                @elseif ($data->status == 2)
                                                                                    <form
                                                                                        action="{{ route('excos.permohonan.lulus.papar') }}"
                                                                                        target="_blank">
                                                                                        <input type="hidden"
                                                                                            name="permohonan_id"
                                                                                            value="{{ $data->id }}"
                                                                                            readonly>
                                                                                        <button type="submit"
                                                                                            class="btn btn-info"><i
                                                                                                class="far fa-eye"></i></button>
                                                                                    </form>

                                                                                @elseif($data->status == 3 ||
                                                                                    $data->status == 4)
                                                                                    <form
                                                                                        action="{{ route('excos.permohonan.tidak-lulus.papar') }}"
                                                                                        target="_blank">
                                                                                        <input type="hidden"
                                                                                            name="permohonan_id"
                                                                                            value="{{ $data->id }}"
                                                                                            readonly>
                                                                                        <button type="submit"
                                                                                            class="btn btn-info"><i
                                                                                                class="far fa-eye"></i></button>
                                                                                    </form>
                                                                                @else
                                                                                    -
                                                                                @endif
                                                                            </div>
                                                                            <div class="col-md"
                                                                                style="padding: 5px;">
                                                                                <form
                                                                                    action="{{ route('excos.permohonan.print') }}"
                                                                                    target="_blank">
                                                                                    <input type="hidden"
                                                                                        name="permohonan_id"
                                                                                        value="{{ $data->id }}"
                                                                                        readonly>
                                                                                    <button type="submit"
                                                                                        class="btn waves-effect waves-light btn-info"><i
                                                                                            class="fas fa-print"></i></button>
                                                                                </form>
                                                                            </div>
                                                                        </div>



                                                                    </td>

                                                                </tr>
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row" style="padding-bottom: 25px; padding-top: 25px;">
                                            <div class="col-md-3"></div>
                                            <div class="col-md">
                                                <a href="{{ route('excos.rumah-ibadat.senarai') }}"
                                                    class="btn waves-effect waves-light btn-info btn-block">Kembali</a>
                                            </div>
                                            <div class="col-md-3"></div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>

                {{-- </div> --}}

                {{-- </div> --}}
            </div>
        </div>

    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

    <script type="text/javascript">
        // Responsive Data Table
        let tablelaporan = $("#table-laporan")
        var t = $(tablelaporan).DataTable({
            "responsive": true,
            "scrollX": true,
            "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": 0
            }],
            "order": [
                [1, 'asc']
            ],
            "language": {
                "lengthMenu": "Memaparkan _MENU_ rekod per halaman",
                "zeroRecords": "Maaf, tiada rekod.",
                "info": "Memaparkan halaman _PAGE_ dari _PAGES_",
                "infoEmpty": "Tidak ada rekod yang tersedia",
                "infoFiltered": "(Ditapis dari _MAX_ jumlah rekod)",
                "search": "Carian",
                "previous": "Sebelum",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "Seterusnya",
                    "previous": "Sebelumnya"
                },
            },
            responsive: true,
            columnDefs: [{
                "targets": "_all", // your case first column
                "className": "text-center",
            }, ],
        });

        t.on('order.dt search.dt', function() {
            t.column(0, {
                search: 'applied',
                order: 'applied'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1;
                t.cell(cell).invalidate('dom');
            });
        }).draw();
    </script>
@endsection
