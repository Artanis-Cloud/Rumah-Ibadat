@extends('layouts.layout-upen')

@section('content')


<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->

<div class="container-fluid">
  
  <div class="row" style="padding-bottom: 15px;">
    <div class="col-md-3">
    <button type="button" class="btn waves-effect waves-light btn-info btn-block" id="print"><i class="fas fa-print"></i> &nbsp&nbsp Cetak Permohonan</button>
    </div>
    <div class="col-md-3"></div>
    <div class="col-md-3"></div>
    <div class="col-md-3"></div>
  </div>

  <div class="printableArea">
    <div class="row">
        <div class="col-12">
            <div class="card">
              
                <div class="card-body border border-dark">
                  
                  <h6 class="pull-right text-right text-muted">Tarikh cetakan : {{ Carbon\Carbon::parse(date('Y-m-d H:i:s'))->format('d-m-Y') }}</h6>
                  <h6 class="pull-right text-right text-muted">Waktu cetakan : {{ Carbon\Carbon::parse(date('Y-m-d H:i:s'))->format('g:i a') }}</h6>
                  <h3><b>Permohonan</b> <span class="pull-right ">{{ $permohonan->getPermohonanID() }}</span></h3>

                  <hr>

                  <div class="row" style="padding-top: 15px;">
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
                                        @if($permohonan->status == 0)
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
                                        <td> {{ ucfirst(strtolower($permohonan->rumah_ibadat->category))}} </td>
                                    </tr>
                                    @if($permohonan->yb_id != null)
                                    <tr>
                                        <td>Nombor Batch</td>
                                        <td>Batch {{ $permohonan->batch }} </td>
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
                              
                              @foreach ($permohonan->tujuan as  $key => $tujuan)
                                    
                                

                                @if($tujuan->tujuan == "AKTIVITI KEAGAMAAN")
                                  <tr>
                                      <td class="text-center">{{ ($key + 1) }}</td>
                                      <td>{{ ucfirst(strtolower($tujuan->tujuan))}}</td>
                                      <td class="text-right">RM {{ number_format($tujuan->peruntukan, 2) }}</td>
                                  </tr>
                                @endif

                                @if($tujuan->tujuan == "PENDIDIKAN KEAGAMAAN")
                                  <tr>
                                      <td class="text-center">{{ ($key + 1) }}</td>
                                      <td>{{ ucfirst(strtolower($tujuan->tujuan))}}</td>
                                      <td class="text-right">RM {{ number_format($tujuan->peruntukan, 2) }}</td>
                                  </tr>
                                @endif

                                @if($tujuan->tujuan == "PEMBELIAN PERALATAN UNTUK KELAS KEAGAMAAN")
                                  <tr>
                                      <td class="text-center">{{ ($key + 1) }}</td>
                                      <td>{{ ucfirst(strtolower($tujuan->tujuan))}}</td>
                                      <td class="text-right">RM {{ number_format($tujuan->peruntukan, 2) }}</td>
                                  </tr>
                                @endif

                                @if($tujuan->tujuan == "BAIK PULIH/PENYELENGGARAAN BANGUNAN")
                                  <tr>
                                      <td class="text-center">{{ ($key + 1) }}</td>
                                      <td>{{ ucfirst(strtolower($tujuan->tujuan))}}</td>
                                      <td class="text-right">RM {{ number_format($tujuan->peruntukan, 2) }}</td>
                                  </tr>
                                @endif

                                @if($tujuan->tujuan == "PEMINDAHAN/PEMBINAAN BARU RUMAH IBADAT")
                                  <tr>
                                      <td class="text-center">{{ ($key + 1) }}</td>
                                      <td>{{ ucfirst(strtolower($tujuan->tujuan))}}</td>
                                      <td class="text-right">RM {{ number_format($tujuan->peruntukan, 2) }}</td>
                                  </tr>
                                @endif

                                @endforeach

                                <tr class="bg-light">
                                  <th colspan="2" class="text-right">Jumlah Peruntukan Yang Diluluskan</th>
                                  <th class="text-right">RM {{ number_format($permohonan->total_fund, 2) }}</th>
                                </tr>
                          </tbody>
                      </table>
                      </div>
                    </div>
                  </div>

                  <div class="row" style="padding-top: 15px;">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h3 class="box-title m-t-40 text-center">Maklumat Rumah Ibadat</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td width="390">Kategori Rumah Ibadat</td>
                                        <td> {{ ucfirst(strtolower($permohonan->rumah_ibadat->category))}} </td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Nama Penuh Persatuan Rumah Ibadat Mengikut Sijil</td>
                                        <td>{{ ucfirst(strtolower($permohonan->rumah_ibadat->name_association ))}}</td>
                                    </tr>

                                    <tr>
                                        <td>Nombor Telefon Wakil Rumah Ibadat</td>
                                        <td>{{ $permohonan->rumah_ibadat->office_phone }}</td>
                                    </tr>

                                    @if($permohonan->rumah_ibadat->registration_type == "SENDIRI")

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
                                        <td>{{ $permohonan->rumah_ibadat->registration_type == "INDUK" ? explode("%", $permohonan->rumah_ibadat->registration_number, 2)[0] : '' }}</td>
                                    </tr>

                                    <tr>
                                        <td>Nombor Pendaftaran Cawangan</td>
                                        <td>{{ $permohonan->rumah_ibadat->registration_type == "INDUK" ? explode("%", $permohonan->rumah_ibadat->registration_number, 2)[1] : '' }}</td>
                                    </tr>

                                    @endif

                                    <tr>
                                        <td>Alamat Rumah Ibadat</td>
                                        <td> {{ ucfirst(strtolower($permohonan->rumah_ibadat->address))}} </td>
                                    </tr>

                                    <tr>
                                        <td>Poskod</td>
                                        <td>{{ $permohonan->rumah_ibadat->postcode }}</td>
                                    </tr>

                                    <tr>
                                        <td>Daerah</td>
                                        <td> {{ ucfirst(strtolower($permohonan->rumah_ibadat->district))}} </td>

                                    </tr>

                                    <tr>
                                        <td>Negeri</td>
                                        <td> {{ ucfirst(strtolower($permohonan->rumah_ibadat->state))}} </td>

                                    </tr>

                                    <tr>
                                        <td>Kawasan PBT</td>
                                        <td>{{ $permohonan->rumah_ibadat->pbt_area }}</td>
                                    </tr>

                                    <tr>
                                        <td>Nama Penuh Persatuan Rumah Ibadat Mengikut Pendaftaran Bank</td>
                                        <td> {{ ucfirst(strtolower($permohonan->rumah_ibadat->name_association_bank))}} </td>

                                    </tr>

                                    <tr>
                                        <td>Nama Bank</td>
                                        <td>{{ $permohonan->rumah_ibadat->bank_name }}</td>
                                    </tr>

                                    <tr>
                                        <td>Nombor Akaun</td>
                                        <td>{{ $permohonan->rumah_ibadat->bank_account  }}</td>
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

    {{-- <p style="page-break-after: always;"> </p> --}}

  </div>

</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
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