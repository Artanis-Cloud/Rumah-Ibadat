@extends((Auth()->user()->is_rumah_ibadat == 0) ? 'layouts.layout-user-disabled' : ((Auth()->user()->is_rumah_ibadat ==
1) ? 'layouts.layout-user-nicepage' : ''))

@section('content')


    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">

        <div class="row">
            {{-- <div class="col-2"></div> --}}
            <div class="col-12">

                <div class="row" style="padding-bottom: 15px;">
                    <div class="col-md-3">
                        {{-- <a href="#" class="btn waves-effect waves-light btn-info"><i class="fas fa-sync"></i></a> --}}
                        <button class="btn waves-effect waves-light btn-info" onclick='window.location.reload(true);'><i class="fas fa-sync"></i> &nbsp Muat Semula Halaman</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md">
                        <div class="border card border-dark h-100">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="table-responsive ">
                                            <table class="table">
                                                <tbody>
                                                    <tr class="bg-light text-center">
                                                        <th colspan="2">Maklumat Permohonan</th>
                                                    </tr>

                                                    <tr>
                                                        <td width="390">Nombor Rujukan</td>
                                                        <td><b>{{ $permohonan->getPermohonanID() }}</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Status Permohonan</td>
                                                        <td>
                                                            @if ($permohonan->status == 0)
                                                                Tidak Lulus
                                                            @elseif($permohonan->status == 1)
                                                                Sedang Diproses
                                                            @elseif($permohonan->status == 2)
                                                                Lulus
                                                            @endif
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Kategori Rumah Ibadat</td>
                                                        <td> {{ ucfirst(strtolower($permohonan->category)) }} </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Ulasan</td>
                                                        <td> {{ $permohonan->comment }} </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Tarikh Permohonan Dibuat</td>
                                                        <td>{{ Carbon\Carbon::parse($permohonan->created_at)->format('d-m-Y') }}
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Waktu Permohonan Dibuat</td>
                                                        <td>{{ Carbon\Carbon::parse($permohonan->created_at)->format('g:i a') }}
                                                        </td>
                                                    </tr>

                                                    <tr class="bg-light text-center">
                                                        <th colspan="2">Maklumat Rumah Ibadat</th>
                                                    </tr>

                                                    <tr>
                                                        <td>Nama Rumah Ibadat Yang Dipohon</td>
                                                        <td>{{ $rumah_ibadat->name_association }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>Jenis Pendaftaran</td>
                                                        <td>
                                                            @if ($rumah_ibadat->registration_type == 'SENDIRI')
                                                                Nombor Sijil Pendaftaran / Nombor ROS
                                                            @else
                                                                Nombor Pendaftaran Cawangan
                                                            @endif
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Nombor Pendaftaran</td>
                                                        <td>
                                                            {{ $rumah_ibadat->registration_type == 'SENDIRI' ? $rumah_ibadat->registration_number : explode('%', $rumah_ibadat->registration_number, 2)[1] }}
                                                        </td>
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

            </div>
        </div>

    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
@endsection
