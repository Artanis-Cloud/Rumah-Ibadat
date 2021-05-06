@extends('layouts.layout-user-nicepage')

@section('content')


<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
  
  <div class="row">
    {{-- <div class="col-2"></div> --}}
    <div class="col-12">

      <div class="row">

        <div class="col-md-4">
          <a href="{{ route('users.permohonan.baru') }}">
            <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
                <div class="card-body bg-info text-white border border-dark">
                    <div class="row">
                      <div class="col-4" style="text-align: center;">
                        <i class="fas fa-file fa-5x"></i>
                      </div>
                      <div class="col-8">
                        <h3>Permohonan<br> Baru</h3>
                      </div>
                    </div>
                </div>
            </div>
          </a>
        </div>

        <div class="col-md-4">
          <a href="{{ route('users.rumah-ibadat.pilih') }}">
            <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
              <div class="card-body bg-info text-white border border-dark">
                  <div class="row">
                    <div class="col-4" style="text-align: center;">
                      <i class="fas fa-place-of-worship fa-5x"></i>
                    </div>
                    <div class="col-8">
                      <h3>Rumah<br> Ibadat</h3>
                    </div>
                  </div>
              </div>
            </div>
          </a>
        </div>

        <div class="col-md-4">
            <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
              <div class="card-body bg-info text-white border border-dark">
                  <div class="row">
                    <div class="col-4" style="text-align: center;">
                      <i class="fas fa-clipboard-list fa-5x"></i>
                    </div>
                    <div class="col-8">
                      <h3>Senarai Permohonan</h3>
                    </div>
                  </div>
              </div>
          </div>
        </div>

      </div>

      <div class="row">

        <div class="col-md-4">
          <div class="border card">
            <div class="card-header bg-info border border-dark">
              <h4 class="m-b-0 text-white" style="text-align: center;">Pengumuman</h4>
            </div>
            <div class="card-body border border-dark h-200">
                <div class="list-group" style="overflow:auto;height:300px;width:100%;border:1px solid #ccc">
                        <!-- <a href="#" class="list-group-item list-group-item-action flex-column align-items-start"> -->
                        <div class="list-group-item list-group-item-action flex-column align-items-start">
                          <div class="d-flex w-100 justify-content-between">
                          <h6 class="card-title mb-1" style="font-size: 20px; font-weight: bold;">Amaran!</h6>
                          <small class="text-muted" style="font-size: 110%;">26-01-2021</small>
                          </div>
                          <p class="my-1" style="font-size: 15px; text-align:justify;">Sekiranya ada percubaan untuk membuat permohonan palsu akan didakwa!</p>
                        </div>

                        <div class="list-group-item list-group-item-action flex-column align-items-start">
                          <div class="d-flex w-100 justify-content-between">
                          <h6 class="card-title mb-1" style="font-size: 20px; font-weight: bold;">Permohonan Ditutup</h6>
                          <small class="text-muted" style="font-size: 110%;">26-01-2021</small>
                          </div>
                          <p class="my-1" style="font-size: 15px; text-align:justify;">Permohonan dana rumah ibadat akan ditutup buat sementara waktu sehingga minggu hadapan untuk naik taraf sistem.</p>
                        </div>

                        <div class="list-group-item list-group-item-action flex-column align-items-start">
                          <div class="d-flex w-100 justify-content-between">
                          <h6 class="card-title mb-1" style="font-size: 20px; font-weight: bold;">Permohonan Baru</h6>
                          <small class="text-muted" style="font-size: 110%;">05-01-2021</small>
                          </div>
                          <p class="my-1" style="font-size: 15px; text-align:justify;">Pengguna hendaklah mendaftarkan rumah ibadat untuk membuat permohonan baru.</p>
                        </div>

                        <div class="list-group-item list-group-item-action flex-column align-items-start">
                          <div class="d-flex w-100 justify-content-between">
                          <h6 class="card-title mb-1" style="font-size: 20px; font-weight: bold;">Selamat Datang</h6>
                          <small class="text-muted" style="font-size: 110%;">01-01-2021</small>
                          </div>
                          <p class="my-1" style="font-size: 15px; text-align:justify;">Selamat Datang ke Sistem Permohonan Dana Rumah Ibadat.</p>
                        </div>

                        <!-- </a> -->

                    </div>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card">
            <div class="card-header bg-info border border-dark">
              <h4 class="m-b-0 text-white" style="text-align: center;">Jumlah Dana Yang Diterima</h4>
            </div>
            <div class="card-body border border-dark">
              {{-- <h5 class="card-title m-b-5">Jumlah Dana Yang Diterima</h5> --}}
              <h3 class="font-light" style="text-align: center;">RM 5200.00</h3>
              {{-- <div class="m-t-20 text-center">
                  <div id="earnings"><canvas width="196" height="40" style="display: inline-block; width: 196px; height: 40px; vertical-align: top;"></canvas></div>
              </div> --}}
           </div>
          </div>

          <div class="card">
            <div class="card-header bg-info border border-dark">
                <h4 class="m-b-0 text-white" style="text-align: center;">Jumlah Dana Yang Telah Diluluskan</h4>
            </div>
            <div class="card-body border border-dark">
              {{-- <h5 class="card-title m-b-5">Permohonan Sedang Diproses</h5> --}}
              <h3 class="font-light" style="text-align: center;">RM 1,207,323.98</h3>
              {{-- <div class="m-t-20 text-center">
                  <div id="earnings"><canvas width="196" height="40" style="display: inline-block; width: 196px; height: 40px; vertical-align: top;"></canvas></div>
              </div> --}}
           </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card h-75">
              <div class="card-header bg-info border border-dark">
                <h4 class="m-b-0 text-white" style="text-align: center;">Rumah Ibadat Yang Telah Berdaftar</h4>
              </div>
              <div class="card-body border border-dark">
                  {{-- <h4 class="card-title">Rumah Ibadat Yang Telah Berdaftar</h4> --}}
                  <div id="campaign" style="height: 168px; width: 100%; max-height: 168px; position: relative;" class="m-t-10 c3"><svg width="295.20001220703125" height="168" style="overflow: hidden;"><defs><clipPath id="c3-1619420300670-clip"><rect width="295.20001220703125" height="144"></rect></clipPath><clipPath id="c3-1619420300670-clip-xaxis"><rect x="-31" y="-20" width="357.20001220703125" height="40"></rect></clipPath><clipPath id="c3-1619420300670-clip-yaxis"><rect x="-29" y="-4" width="20" height="168"></rect></clipPath><clipPath id="c3-1619420300670-clip-grid"><rect width="295.20001220703125" height="144"></rect></clipPath><clipPath id="c3-1619420300670-clip-subchart"><rect width="295.20001220703125"></rect></clipPath></defs><g transform="translate(0.5,4.5)"><text class="c3-text c3-empty" text-anchor="middle" dominant-baseline="middle" x="147.60000610351562" y="72" style="opacity: 0;"></text><rect class="c3-zoom-rect" width="295.20001220703125" height="144" style="opacity: 0;"></rect><g clip-path="url(http://nice-admin-master.test/html/horizontal/index.html#c3-1619420300670-clip)" class="c3-regions" style="visibility: hidden;"></g><g clip-path="url(http://nice-admin-master.test/html/horizontal/index.html#c3-1619420300670-clip-grid)" class="c3-grid" style="visibility: hidden;"><g class="c3-xgrid-focus"><line class="c3-xgrid-focus" x1="-10" x2="-10" y1="0" y2="144" style="visibility: hidden;"></line></g></g><g clip-path="url(http://nice-admin-master.test/html/horizontal/index.html#c3-1619420300670-clip)" class="c3-chart"><g class="c3-event-rects c3-event-rects-single" style="fill-opacity: 0;"><rect class=" c3-event-rect c3-event-rect-0" x="0.399993896484375" y="0" width="295.20001220703125" height="144"></rect></g><g class="c3-chart-bars"><g class="c3-chart-bar c3-target c3-target-Un-opened" style="pointer-events: none;"><g class=" c3-shapes c3-shapes-Un-opened c3-bars c3-bars-Un-opened" style="cursor: pointer;"></g></g><g class="c3-chart-bar c3-target c3-target-Clicked" style="pointer-events: none;"><g class=" c3-shapes c3-shapes-Clicked c3-bars c3-bars-Clicked" style="cursor: pointer;"></g></g><g class="c3-chart-bar c3-target c3-target-Open" style="pointer-events: none;"><g class=" c3-shapes c3-shapes-Open c3-bars c3-bars-Open" style="cursor: pointer;"></g></g><g class="c3-chart-bar c3-target c3-target-Bounced" style="pointer-events: none;"><g class=" c3-shapes c3-shapes-Bounced c3-bars c3-bars-Bounced" style="cursor: pointer;"></g></g></g><g class="c3-chart-lines"><g class="c3-chart-line c3-target c3-target-Un-opened" style="opacity: 1; pointer-events: none;"><g class=" c3-shapes c3-shapes-Un-opened c3-lines c3-lines-Un-opened"></g><g class=" c3-shapes c3-shapes-Un-opened c3-areas c3-areas-Un-opened"></g><g class=" c3-selected-circles c3-selected-circles-Un-opened"></g><g class=" c3-shapes c3-shapes-Un-opened c3-circles c3-circles-Un-opened" style="cursor: pointer;"></g></g><g class="c3-chart-line c3-target c3-target-Clicked" style="opacity: 1; pointer-events: none;"><g class=" c3-shapes c3-shapes-Clicked c3-lines c3-lines-Clicked"></g><g class=" c3-shapes c3-shapes-Clicked c3-areas c3-areas-Clicked"></g><g class=" c3-selected-circles c3-selected-circles-Clicked"></g><g class=" c3-shapes c3-shapes-Clicked c3-circles c3-circles-Clicked" style="cursor: pointer;"></g></g><g class="c3-chart-line c3-target c3-target-Open" style="opacity: 1; pointer-events: none;"><g class=" c3-shapes c3-shapes-Open c3-lines c3-lines-Open"></g><g class=" c3-shapes c3-shapes-Open c3-areas c3-areas-Open"></g><g class=" c3-selected-circles c3-selected-circles-Open"></g><g class=" c3-shapes c3-shapes-Open c3-circles c3-circles-Open" style="cursor: pointer;"></g></g><g class="c3-chart-line c3-target c3-target-Bounced" style="opacity: 1; pointer-events: none;"><g class=" c3-shapes c3-shapes-Bounced c3-lines c3-lines-Bounced"></g><g class=" c3-shapes c3-shapes-Bounced c3-areas c3-areas-Bounced"></g><g class=" c3-selected-circles c3-selected-circles-Bounced"></g><g class=" c3-shapes c3-shapes-Bounced c3-circles c3-circles-Bounced" style="cursor: pointer;"></g></g></g><g class="c3-chart-arcs" transform="translate(147.60000610351562,67)"><text class="c3-chart-arcs-title" style="text-anchor: middle; opacity: 1;"></text><g class="c3-chart-arc c3-target c3-target-Un-opened"><g class=" c3-shapes c3-shapes-Un-opened c3-arcs c3-arcs-Un-opened"><path class=" c3-shape c3-shape c3-arc c3-arc-Un-opened" transform="" style="fill: rgb(19, 126, 255); cursor: pointer;" d="M3.897438438286451e-15,-63.65A63.65,63.65 0 0,1 20.155917805463748,60.374344529935804L15.405897898441655,46.14629790072862A48.65,48.65 0 0,0 2.9789533389259365e-15,-48.65Z"></path></g><text dy=".35em" class="" transform="translate(38.286445874896344,-6.222153070371454)" style="opacity: 1; text-anchor: middle; pointer-events: none;"></text></g><g class="c3-chart-arc c3-target c3-target-Clicked"><g class=" c3-shapes c3-shapes-Clicked c3-arcs c3-arcs-Clicked"><path class=" c3-shape c3-shape c3-arc c3-arc-Clicked" transform="" style="fill: rgb(139, 94, 221); cursor: pointer;" d="M-57.504620162950815,27.286281533304443A63.65,63.65 0 0,1 -45.904535773433835,-44.09190510088596L-35.08649906327661,-33.70103979824198A48.65,48.65 0 0,0 -43.952863643795084,20.85589311225862Z"></path></g><text dy=".35em" class="" transform="translate(-38.28644587489635,-6.222153070371416)" style="opacity: 1; text-anchor: middle; pointer-events: none;"></text></g><g class="c3-chart-arc c3-target c3-target-Open"><g class=" c3-shapes c3-shapes-Open c3-arcs c3-arcs-Open"><path class=" c3-shape c3-shape c3-arc c3-arc-Open" transform="" style="fill: rgb(90, 193, 70); cursor: pointer;" d="M-45.904535773433835,-44.09190510088596A63.65,63.65 0 0,1 -6.822487172877232e-14,-63.65L-5.2146740135188896e-14,-48.65A48.65,48.65 0 0,0 -35.08649906327661,-33.70103979824198Z"></path></g><text dy=".35em" class="" transform="translate(-15.203894838210024,-35.684852645221206)" style="opacity: 1; text-anchor: middle; pointer-events: none;"></text></g><g class="c3-chart-arc c3-target c3-target-Bounced"><g class=" c3-shapes c3-shapes-Bounced c3-arcs c3-arcs-Bounced"><path class=" c3-shape c3-shape c3-arc c3-arc-Bounced" transform="" style="fill: rgb(236, 239, 241); cursor: pointer;" d="M20.155917805463748,60.374344529935804A63.65,63.65 0 0,1 -57.504620162950815,27.286281533304443L-43.952863643795084,20.85589311225862A48.65,48.65 0 0,0 15.405897898441655,46.14629790072862Z"></path></g><text dy=".35em" class="" transform="translate(-15.203894838209965,35.68485264522123)" style="opacity: 1; text-anchor: middle; pointer-events: none;"></text></g></g><g class="c3-chart-texts"><g class="c3-chart-text c3-target c3-target-Un-opened" style="opacity: 1; pointer-events: none;"><g class=" c3-texts c3-texts-Un-opened"></g></g><g class="c3-chart-text c3-target c3-target-Clicked" style="opacity: 1; pointer-events: none;"><g class=" c3-texts c3-texts-Clicked"></g></g><g class="c3-chart-text c3-target c3-target-Open" style="opacity: 1; pointer-events: none;"><g class=" c3-texts c3-texts-Open"></g></g><g class="c3-chart-text c3-target c3-target-Bounced" style="opacity: 1; pointer-events: none;"><g class=" c3-texts c3-texts-Bounced"></g></g></g></g><g clip-path="url(http://nice-admin-master.test/html/horizontal/index.html#c3-1619420300670-clip-grid)" class="c3-grid c3-grid-lines"><g class="c3-xgrid-lines"></g><g class="c3-ygrid-lines"></g></g><g class="c3-axis c3-axis-x" clip-path="url(http://nice-admin-master.test/html/horizontal/index.html#c3-1619420300670-clip-xaxis)" transform="translate(0,144)" style="visibility: visible; opacity: 0;"><text class="c3-axis-x-label" transform="" style="text-anchor: end;" x="295.20001220703125" dx="-0.5em" dy="-0.5em"></text><g class="tick" transform="translate(148, 0)" style="opacity: 1;"><line x1="0" x2="0" y2="6"></line><text x="0" y="9" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">0</tspan></text></g><path class="domain" d="M0,6V0H295.20001220703125V6"></path></g><g class="c3-axis c3-axis-y" clip-path="url(http://nice-admin-master.test/html/horizontal/index.html#c3-1619420300670-clip-yaxis)" transform="translate(0,0)" style="visibility: visible; opacity: 0;"><text class="c3-axis-y-label" transform="rotate(-90)" style="text-anchor: end;" x="0" dx="-0.5em" dy="1.2em"></text><g class="tick" transform="translate(0,133)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">10</tspan></text></g><g class="tick" transform="translate(0,109)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">15</tspan></text></g><g class="tick" transform="translate(0,85)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">20</tspan></text></g><g class="tick" transform="translate(0,61)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">25</tspan></text></g><g class="tick" transform="translate(0,37)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">30</tspan></text></g><g class="tick" transform="translate(0,13)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">35</tspan></text></g><path class="domain" d="M-6,1H0V144H-6"></path></g><g class="c3-axis c3-axis-y2" transform="translate(295.20001220703125,0)" style="visibility: hidden; opacity: 0;"><text class="c3-axis-y2-label" transform="rotate(-90)" style="text-anchor: end;" x="0" dx="-0.5em" dy="-0.5em"></text><g class="tick" transform="translate(0,144)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0</tspan></text></g><g class="tick" transform="translate(0,130)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.1</tspan></text></g><g class="tick" transform="translate(0,116)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.2</tspan></text></g><g class="tick" transform="translate(0,102)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.3</tspan></text></g><g class="tick" transform="translate(0,87)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.4</tspan></text></g><g class="tick" transform="translate(0,73)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.5</tspan></text></g><g class="tick" transform="translate(0,59)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.6</tspan></text></g><g class="tick" transform="translate(0,44)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.7</tspan></text></g><g class="tick" transform="translate(0,30)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.8</tspan></text></g><g class="tick" transform="translate(0,16)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.9</tspan></text></g><g class="tick" transform="translate(0,1)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">1</tspan></text></g><path class="domain" d="M6,1H0V144H6"></path></g></g><g transform="translate(0.5,168.5)" style="visibility: hidden;"><g clip-path="url(http://nice-admin-master.test/html/horizontal/index.html#c3-1619420300670-clip-subchart)" class="c3-chart"><g class="c3-chart-bars"></g><g class="c3-chart-lines"></g></g><g clip-path="url(http://nice-admin-master.test/html/horizontal/index.html#c3-1619420300670-clip)" class="c3-brush" style="pointer-events: all; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><rect class="background" x="0" width="235" style="visibility: hidden; cursor: crosshair;"></rect><rect class="extent" x="0" width="0" style="cursor: move;"></rect><g class="resize e" transform="translate(0,0)" style="cursor: ew-resize; display: none;"><rect x="-3" width="6" height="6" style="visibility: hidden;"></rect></g><g class="resize w" transform="translate(0,0)" style="cursor: ew-resize; display: none;"><rect x="-3" width="6" height="6" style="visibility: hidden;"></rect></g></g><g class="c3-axis-x" transform="translate(0,0)" clip-path="url(http://nice-admin-master.test/html/horizontal/index.html#c3-1619420300670-clip-xaxis)" style="visibility: hidden; opacity: 0;"><g class="tick" transform="translate(148, 0)" style="opacity: 1;"><line x1="0" x2="0" y2="6"></line><text x="0" y="9" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">0</tspan></text></g><path class="domain" d="M0,6V0H295.20001220703125V6"></path></g></g><g transform="translate(0,148)"><g class="c3-legend-item c3-legend-item-Un-opened" style="visibility: hidden; cursor: pointer; opacity: 1;"><text x="14" y="9" style="pointer-events: none;">Un-opened</text><rect class="c3-legend-item-event" x="0" y="-5" width="0" height="0" style="fill-opacity: 0;"></rect><line class="c3-legend-item-tile" x1="-2" y1="4" x2="8" y2="4" stroke-width="10" style="stroke: rgb(19, 126, 255); pointer-events: none;"></line></g><g class="c3-legend-item c3-legend-item-Clicked" style="visibility: hidden; cursor: pointer; opacity: 1;"><text x="14" y="9" style="pointer-events: none;">Clicked</text><rect class="c3-legend-item-event" x="0" y="-5" width="0" height="0" style="fill-opacity: 0;"></rect><line class="c3-legend-item-tile" x1="-2" y1="4" x2="8" y2="4" stroke-width="10" style="stroke: rgb(139, 94, 221); pointer-events: none;"></line></g><g class="c3-legend-item c3-legend-item-Open" style="visibility: hidden; cursor: pointer; opacity: 1;"><text x="14" y="9" style="pointer-events: none;">Open</text><rect class="c3-legend-item-event" x="0" y="-5" width="0" height="0" style="fill-opacity: 0;"></rect><line class="c3-legend-item-tile" x1="-2" y1="4" x2="8" y2="4" stroke-width="10" style="stroke: rgb(90, 193, 70); pointer-events: none;"></line></g><g class="c3-legend-item c3-legend-item-Bounced" style="visibility: hidden; cursor: pointer; opacity: 1;"><text x="14" y="9" style="pointer-events: none;">Bounced</text><rect class="c3-legend-item-event" x="0" y="-5" width="0" height="0" style="fill-opacity: 0;"></rect><line class="c3-legend-item-tile" x1="-2" y1="4" x2="8" y2="4" stroke-width="10" style="stroke: rgb(236, 239, 241); pointer-events: none;"></line></g></g><text class="c3-title" x="147.60000610351562" y="0"></text></svg><div class="c3-tooltip-container" style="position: absolute; pointer-events: none; display: none; top: 130.7px; left: 155.9px;"><table class="c3-tooltip"><tbody><tr class="c3-tooltip-name--Un-opened"><td class="name"><span style="background-color:#137eff"></span>Un-opened</td><td class="value">44.9%</td></tr></tbody></table></div></div>
                  <!-- row -->
                  <div class="row text-center text-lg-center">
                      <!-- column -->
                      <div class="col-4">
                          <h4 class="m-b-0 font-medium">60%</h4>
                          <span class="text-muted">Tokong</span>
                      </div>
                      <!-- column -->
                      <div class="col-4">
                          <h4 class="m-b-0 font-medium">26%</h4>
                          <span class="text-muted">Kuil</span>
                      </div>
                      <!-- column -->
                      <div class="col-4">
                          <h4 class="m-b-0 font-medium">18%</h4>
                          <span class="text-muted">Gereja</span>
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