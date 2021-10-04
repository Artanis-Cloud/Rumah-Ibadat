@extends('layouts.layout-yb')

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

                        <div class="row" style="padding-top: 15px;">
                            <div class="col-md">
                                <div> </div>
                                <div class="row">
                                    <div class="col-md">
                                        {{-- <div class="table-responsive"> --}}
                                            <table class="table table-striped table-bordered display" id="sejarah_permohonan">
                                                <thead>
                                                    <tr>
                                                        <th>BIL</th>
                                                        <th>TAHUN</th>
                                                        <th>RUMAH IBADAT</th>
                                                        <th>NOMBOR PENDAFTARAN</th>
                                                        <th>SEBAB PERMOHONAN</th>
                                                        <th>JUMLAH KELULUSAN</th>
                                                        {{-- <th>Action</th> --}}
                                                    </tr>
                                                </thead>
                                            </table>
                                        {{-- </div> --}}
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
    <!--This page plugins -->
    <script src="{{ asset('assets/extra-libs/DataTables/datatables.min.js') }}"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <script src="{{ asset('dist/js/pages/datatable/datatable-advanced.init.js') }}"></script>

    <script>
        $('#sejarah_permohonan').DataTable({
            processing: false,
            serverSide: true,
            responsive: true,

            ajax: "{{ route('ybs.permohonan.sejarah-permohonan.ajax') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'id'
                },
                {
                    data: 'tahun',
                    name: 'tahun'
                },
                {
                    data: 'rumah_ibadat',
                    name: 'rumah_ibadat'
                },
                {
                    data: 'no_pendaftaran',
                    name: 'no_pendaftaran'
                },
                {
                    data: 'sebab_permohonan',
                    name: 'sebab_permohonan'
                },
                {
                    data: 'jumlah_kelulusan',
                    name: 'jumlah_kelulusan'
                },
                // {
                //     data: 'action',
                //     name: 'action',
                //     orderable: false,
                //     searchable: false
                // },
            ]
        });
    </script>
@endsection
