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

                    <div class="card-body border border-dark">

                        <div class="row" style="padding-top: 15px;">
                            <div class="col-md">
                                <div> </div>
                                <div class="row">
                                    <div class="col-md">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered display"
                                                id="sejarah_permohonan">
                                                <thead>
                                                    <tr>
                                                        <th>BIL</th>
                                                        <th>PERMOHONAN SISTEM</th>
                                                        <th>TAHUN</th>
                                                        <th>RUMAH IBADAT</th>
                                                        <th>ALAMAT</th>
                                                        <th>NOMBOR PENDAFTARAN</th>
                                                        <th>SEBAB PERMOHONAN</th>
                                                        <th>NO AKAUN</th>
                                                        <th>BANK</th>
                                                        <th>JUMLAH KELULUSAN</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
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

            columnDefs: [{
                "targets": "_all", // your case first column
                "className": "text-center",
            }, ],

            "dom": 'Bfrtip',
            "buttons": [
                'excel',
                {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'A4',
                    title: 'Sejarah Permohonan',
                },
                {
                    extend: 'print',
                    text: 'Cetak',
                    pageSize: 'LEGAL',
                    title: 'Sejarah Permohonan',
                    customize: function(win) {

                        var last = null;
                        var current = null;
                        var bod = [];

                        var css = '@page { size: landscape; }',
                            head = win.document.head || win.document.getElementsByTagName('head')[0],
                            style = win.document.createElement('style');

                        style.type = 'text/css';
                        style.media = 'print';

                        if (style.styleSheet) {
                            style.styleSheet.cssText = css;
                        } else {
                            style.appendChild(win.document.createTextNode(css));
                        }

                        head.appendChild(style);
                    },
                },
            ],

            ajax: "{{ route('excos.permohonan.sejarah-permohonan.ajax') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'id'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
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
                    data: 'alamat',
                    name: 'alamat'
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
                    data: 'no_akaun',
                    name: 'no_akaun'
                },
                {
                    data: 'bank',
                    name: 'bank'
                },
                {
                    data: 'jumlah_kelulusan',
                    name: 'jumlah_kelulusan'
                },

            ]
        });
    </script>
@endsection
