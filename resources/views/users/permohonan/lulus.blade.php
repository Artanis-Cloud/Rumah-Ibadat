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

              <div class="border card-body border-dark">

                  {{-- Flash Message --}}
                  @if ($message = Session::get('success'))
                    <div class="border alert alert-success border-success" style="text-align: center;">{{$message}}</div>
                  @elseif ($message = Session::get('error'))
                    <div class="border alert alert-danger border-danger" style="text-align: center;">{{$message}}</div>
                  @else
                    {{-- Hidden Gap - Just Ignore --}}
                    <div class="alert alert-white" style="text-align: center;"></div>
                    {{-- <div style="padding: 23px;"></div> --}}
                  @endif

                  <table id="example" class="display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID PENGGUNA</th>
                            <th>RUMAH IBADAT</th>
                            <th>TARIKH PERMOHONAN</th>
                            <th>AKAUN PENYATA</th>
                            <th>JUMLAH BAYARAN</th>
                            <th>STATUS PEMBAYARAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>TOKONG BUDDHA & TAO</td>
                            <td>TOKONG DEWA QI XUAN NU</td>
                            <td>25/2/2020</td>
                            <td>PDF</td>
                            <td>rm5000.00</td>
                            <td><span class="label label-success label-rounded">DIBAYAR</span></td>
                        </tr>
                        <tr>
                            <td>TOKONG BUDDHA & TAO</td>
                            <td>TOKONG DEWA QI XUAN NU</td>
                            <td>25/2/2020</td>
                            <td>PDF</td>
                            <td>rm5000.00</td>
                            <td><span class="label label-success label-rounded">DIBAYAR</span></td>
                        </tr>
                        <tr>
                            <td>TOKONG BUDDHA & TAO</td>
                            <td>TOKONG DEWA QI XUAN NU</td>
                            <td>25/2/2020</td>
                            <td>PDF</td>
                            <td>rm5000.00</td>
                            <td><span class="label label-success label-rounded">DIBAYAR</span></td>
                        </tr>
                        <tr>
                            <td>TOKONG BUDDHA & TAO</td>
                            <td>TOKONG DEWA QI XUAN NU</td>
                            <td>25/2/2020</td>
                            <td>PDF</td>
                            <td>rm5000.00</td>
                            <td><span class="label label-success label-rounded">DIBAYAR</span></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID PENGGUNA</th>
                            <th>RUMAH IBADAT</th>
                            <th>TARIKH PERMOHONAN</th>
                            <th>AKAUN PENYATA</th>
                            <th>JUMLAH BAYARAN</th>
                            <th>STATUS PEMBAYARAN</th>
                        </tr>
                    </tfoot>
                </table>

              </div>



          </div>
      </div>
  </div>

</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<script>
$(document).ready(function() {
    var table = $('#example').DataTable( {
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true
    } );
} );
</script>
@endsection
