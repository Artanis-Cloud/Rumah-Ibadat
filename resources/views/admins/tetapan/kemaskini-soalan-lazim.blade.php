@extends('layouts.layout-admin')

@section('content')


    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">



        <div class="row">
            {{-- <div class="col-2"></div> --}}
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md">
                                <button class="btn btn-info" data-toggle="modal" data-target="#soalan_baru_modal">Soalan
                                    Baru</button>
                            </div>
                        </div>

                        <div class="row" style="padding-top: 15px;">
                            <div class="col-md">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" id="table-laporan"
                                        style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th class="all">BIL</th>
                                                <th class="all">SOALAN</th>
                                                <th class="all">JAWAPAN</th>
                                                {{-- <th class="all">STATUS</th> --}}
                                                <th class="all">TINDAKAN</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            @foreach ($soalan as $data)
                                                <tr>
                                                    <td></td>
                                                    <td>{{ $data->soalan }}</td>
                                                    <td>{{ $data->jawapan }}</td>
                                                    {{-- <td>{{ $data->status }}</td> --}}



                                                    <td class="p-3">
                                                        <div
                                                            class="d-flex flex-row justify-content-around align-items-center">
                                                            <button class="btn btn-danger"><i class="fas fa-trash"
                                                                    onclick="return padam_soalan('{{ $data->id }}')"></i></button>
                                                            {{-- <button class="btn btn-info"><i class="fas fa-user-edit"></i></button> --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        {{-- Modal Soalan Baru --}}
                        <div class="modal fade" id="soalan_baru_modal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">
                                            Soalan Baru
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('admins.tetapan.soalan-lazim.submit') }}">
                                        @csrf
                                        <div class="modal-body">

                                            <div class="row">
                                                <div class="col-md">
                                                    <label class="required">Soalan</label>
                                                    <div class="mb-3 form-group">
                                                        <textarea class="form-control border-dark " id="soalan"
                                                            name="soalan" rows="2"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md">
                                                    <label class="required">Jawapan</label>
                                                    <div class="mb-3 form-group">
                                                        <textarea class="form-control border-dark " id="jawapan"
                                                            name="jawapan" rows="5"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Kembali</button>
                                            <button type="Submit" class="btn btn-success">Tambah Soalan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        {{-- Modal Soalan Baru --}}
                        <div class="modal fade" id="pengesahan_padam_soalan" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">
                                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbspPengesahan!
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Anda pasti mahu memadam soalan ini?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('admins.tetapan.soalan-lazim.padam') }}">
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Kembali</button>
                                            <input type="hidden" name="soalan_id" id="soalan_id">
                                            <button type="submit" class="btn btn-success">Padam Soalan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        function padam_soalan(e) {

            $("#soalan_id").val(e);
            $("#pengesahan_padam_soalan").modal();
        }
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
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
@endsection
