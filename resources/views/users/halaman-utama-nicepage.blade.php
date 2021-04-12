@extends('layouts.layout-user-nicepage')

@section('content')
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">

<!-- ============================================================== -->
<!-- Sales chart -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="card bg-info">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div class="text-white">
                        <h2>120</h2>
                        <h6>Permohonan <br>Baru</h6>
                    </div>
                    <div class="ml-auto">
                        <span class="text-white display-6"><i class="fas fa-clipboard"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card bg-warning">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div class="text-white">
                        <h2>150</h2>
                        <h6>Permohonan <br>Sedang Diproses</h6>
                    </div>
                    <div class="ml-auto">
                        <span class="text-white display-6"><i class="fas fa-sync-alt"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card bg-success">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div class="text-white">
                        <h2>450</h2>
                        <h6>Permohonan <br>Lulus</h6>
                    </div>
                    <div class="ml-auto">
                        <span class="text-white display-6"><i class="fas fa-clipboard-check"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card bg-danger">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div class="text-white">
                        <h2>100</h2>
                        <h6>Permohonan <br>Tidak Lulus</h6>
                    </div>
                    <div class="ml-auto">
                        <span class="text-white display-6"><i class="fas fa-times-circle"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Sales chart -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Email campaign chart -->
<!-- ============================================================== -->
{{-- Graph --}}
{{-- <div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Campaign</h4>
                <div id="campaign" style="height: 168px; width: 100%;" class="m-t-10"></div>
                <!-- row -->
                <div class="text-center row text-lg-left">
                    <!-- column -->
                    <div class="col-4">
                        <h4 class="font-medium m-b-0">60%</h4>
                        <span class="text-muted">Open</span>
                    </div>
                    <!-- column -->
                    <div class="col-4">
                        <h4 class="font-medium m-b-0">26%</h4>
                        <span class="text-muted">Click</span>
                    </div>
                    <!-- column -->
                    <div class="col-4">
                        <h4 class="font-medium m-b-0">18%</h4>
                        <span class="text-muted">Bounce</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title m-b-5">Referral Earnings</h5>
                <h3 class="font-light">$769.08</h3>
                <div class="text-center m-t-20">
                    <div id="earnings"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-12 order-lg-2 order-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h4 class="card-title">Sales Ratio</h4>
                    </div>
                    <div class="ml-auto">
                        <div class="dl m-b-10">
                            <select class="border-0 custom-select text-muted">
                                <option value="0" selected="">August 2018</option>
                                <option value="1">May 2018</option>
                                <option value="2">March 2018</option>
                                <option value="3">June 2018</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center no-block">
                    <div>
                        <span class="text-muted">This Week</span>
                        <h3 class="mb-0 font-light text-info">$23.5K <span class="text-muted font-12"><i class="mdi mdi-arrow-up text-success"></i>18.6</span></h3>
                    </div>
                    <div class="ml-4">
                        <span class="text-muted">Last Week</span>
                        <h3 class="mb-0 font-light text-muted">$945 <span class="text-muted font-12"><i class="mdi mdi-arrow-down text-danger"></i>46.3</span></h3>
                    </div>
                </div>
                <div class="mt-5 sales ct-charts"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 order-lg-3 order-md-2">
        <div class="card">
            <div class="card-body m-b-0">
                <h4 class="card-title">Thursday <span class="font-normal font-14 text-muted">12th April, 2018</span></h4>
                    <div class="flex-row d-flex align-items-center m-t-30">
                    <h1 class="font-light"><i class="wi wi-day-sleet"></i> <span>35<sup>°</sup></span></h1>
                </div>
            </div>
            <div class="weather-report" style="height:120px; width:100%;"></div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title m-b-0">Users</h4>
                <h2 class="font-light">35,658 <span class="font-medium font-16 text-success">+23%</span></h2>
                <div class="m-t-30">
                    <div class="text-center row">
                        <div class="col-6 border-right">
                            <h4 class="m-b-0">58%</h4>
                            <span class="font-14 text-muted">New Users</span>
                        </div>
                        <div class="col-6">
                            <h4 class="m-b-0">42%</h4>
                            <span class="font-14 text-muted">Repeat Users</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- ============================================================== -->
<!-- Email campaign chart -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Ravenue - page-view-bounce rate -->
<!-- ============================================================== -->
<div class="row">
    <!-- column -->
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h4 class="mb-0 card-title">Laporan Rumah Ibadat</h4>
                    </div>
                    <div class="ml-auto">
                        <select class="border-0 custom-select text-muted">
                            <option value="0" selected="">August 2018</option>
                            <option value="1">May 2018</option>
                            <option value="2">March 2018</option>
                            <option value="3">June 2018</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-body bg-light">
                <div class="row align-items-center">
                    <div class="col-xs-12 col-md-6">
                        <h3 class="font-light m-b-0">August 2018</h3>
                        <span class="font-14 text-muted">Sales Report</span>
                    </div>
                    <div class="text-right col-xs-12 col-md-6 align-self-center display-6 text-info">$3,690</div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="border-top-0">NAME</th>
                            <th class="border-top-0">STATUS</th>
                            <th class="border-top-0">DATE</th>
                            <th class="border-top-0">PRICE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            <td class="txt-oflo">Elite admin</td>
                            <td><span class="label label-success label-rounded">SALE</span> </td>
                            <td class="txt-oflo">April 18, 2017</td>
                            <td><span class="font-medium">$24</span></td>
                        </tr>
                        <tr>

                            <td class="txt-oflo">Real Homes WP Theme</td>
                            <td><span class="label label-info label-rounded">EXTENDED</span></td>
                            <td class="txt-oflo">April 19, 2017</td>
                            <td><span class="font-medium">$1250</span></td>
                        </tr>
                        <tr>

                            <td class="txt-oflo">Ample Admin</td>
                            <td><span class="label label-purple label-rounded">Tax</span></td>
                            <td class="txt-oflo">April 19, 2017</td>
                            <td><span class="font-medium">$1250</span></td>
                        </tr>
                        <tr>

                            <td class="txt-oflo">Medical Pro WP Theme</td>
                            <td><span class="label label-success label-rounded">Sale</span></td>
                            <td class="txt-oflo">April 20, 2017</td>
                            <td><span class="font-medium">-$24</span></td>
                        </tr>
                        <tr>

                            <td class="txt-oflo">Hosting press html</td>
                            <td><span class="label label-success label-rounded">SALE</span></td>
                            <td class="txt-oflo">April 21, 2017</td>
                            <td><span class="font-medium">$24</span></td>
                        </tr>
                        <tr>

                            <td class="txt-oflo">Digital Agency PSD</td>
                            <td><span class="label label-danger label-rounded">Tax</span> </td>
                            <td class="txt-oflo">April 23, 2017</td>
                            <td><span class="font-medium">-$14</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Recent Comments</h4>
            </div>
            <div class="comment-widgets scrollable" style="height:490px;">
                <!-- Comment Row -->
                <div class="flex-row d-flex comment-row m-t-0">
                    <div class="p-2">
                        <img src="{{asset('nice-admin/assets/images/users/1.jpg')}}" alt="user" width="50" class="rounded-circle">
                    </div>
                    <div class="comment-text w-100">
                        <h6 class="font-medium">James Anderson</h6>
                        <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry. </span>
                        <div class="comment-footer">
                            <span class="float-right text-muted">April 14, 2016</span>
                            <span class="label label-rounded label-primary">Pending</span>
                            <span class="action-icons">
                                <a href="javascript:void(0)">
                                    <i class="ti-pencil-alt"></i>
                                </a>
                                <a href="javascript:void(0)">
                                    <i class="ti-check"></i>
                                </a>
                                <a href="javascript:void(0)">
                                    <i class="ti-heart"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- Comment Row -->
                <div class="flex-row d-flex comment-row">
                    <div class="p-2">
                        <img src="{{asset('nice-admin/assets/images/users/4.jpg')}}" alt="user" width="50" class="rounded-circle">
                    </div>
                    <div class="comment-text active w-100">
                        <h6 class="font-medium">Michael Jorden</h6>
                        <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry. </span>
                        <div class="comment-footer ">
                            <span class="float-right text-muted">April 14, 2016</span>
                            <span class="label label-success label-rounded">Approved</span>
                            <span class="action-icons active">
                                <a href="javascript:void(0)">
                                    <i class="ti-pencil-alt"></i>
                                </a>
                                <a href="javascript:void(0)">
                                    <i class="icon-close"></i>
                                </a>
                                <a href="javascript:void(0)">
                                    <i class="ti-heart text-danger"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- Comment Row -->
                <div class="flex-row d-flex comment-row">
                    <div class="p-2">
                        <img src="{{asset('nice-admin/assets/images/users/5.jpg')}}" alt="user" width="50" class="rounded-circle">
                    </div>
                    <div class="comment-text w-100">
                        <h6 class="font-medium">Johnathan Doeting</h6>
                        <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry. </span>
                        <div class="comment-footer">
                            <span class="float-right text-muted">April 14, 2016</span>
                            <span class="label label-rounded label-danger">Rejected</span>
                            <span class="action-icons">
                                <a href="javascript:void(0)">
                                    <i class="ti-pencil-alt"></i>
                                </a>
                                <a href="javascript:void(0)">
                                    <i class="ti-check"></i>
                                </a>
                                <a href="javascript:void(0)">
                                    <i class="ti-heart"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- Comment Row -->
                <div class="flex-row d-flex comment-row m-t-0">
                    <div class="p-2">
                        <img src="{{asset('nice-admin/assets/images/users/2.jpg')}}" alt="user" width="50" class="rounded-circle">
                    </div>
                    <div class="comment-text w-100">
                        <h6 class="font-medium">Steve Jobs</h6>
                        <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry. </span>
                        <div class="comment-footer">
                            <span class="float-right text-muted">April 14, 2016</span>
                            <span class="label label-rounded label-primary">Pending</span>
                            <span class="action-icons">
                                <a href="javascript:void(0)">
                                    <i class="ti-pencil-alt"></i>
                                </a>
                                <a href="javascript:void(0)">
                                    <i class="ti-check"></i>
                                </a>
                                <a href="javascript:void(0)">
                                    <i class="ti-heart"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Ravenue - page-view-bounce rate -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Recent comment and chats -->
<!-- ============================================================== -->
<div class="row">
    <!-- column -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Recent Comments</h4>
            </div>
            <div class="comment-widgets scrollable" style="height:430px;">
                <!-- Comment Row -->
                <div class="flex-row d-flex comment-row m-t-0">
                    <div class="p-2">
                        <img src="{{asset('nice-admin/assets/images/users/1.jpg')}}" alt="user" width="50" class="rounded-circle">
                    </div>
                    <div class="comment-text w-100">
                        <h6 class="font-medium">James Anderson</h6>
                        <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry. </span>
                        <div class="comment-footer">
                            <span class="float-right text-muted">April 14, 2016</span>
                            <span class="label label-rounded label-primary">Pending</span>
                            <span class="action-icons">
                                <a href="javascript:void(0)">
                                    <i class="ti-pencil-alt"></i>
                                </a>
                                <a href="javascript:void(0)">
                                    <i class="ti-check"></i>
                                </a>
                                <a href="javascript:void(0)">
                                    <i class="ti-heart"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- Comment Row -->
                <div class="flex-row d-flex comment-row">
                    <div class="p-2">
                        <img src="{{asset('nice-admin/assets/images/users/4.jpg')}}" alt="user" width="50" class="rounded-circle">
                    </div>
                    <div class="comment-text active w-100">
                        <h6 class="font-medium">Michael Jorden</h6>
                        <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry. </span>
                        <div class="comment-footer ">
                            <span class="float-right text-muted">April 14, 2016</span>
                            <span class="label label-success label-rounded">Approved</span>
                            <span class="action-icons active">
                                <a href="javascript:void(0)">
                                    <i class="ti-pencil-alt"></i>
                                </a>
                                <a href="javascript:void(0)">
                                    <i class="icon-close"></i>
                                </a>
                                <a href="javascript:void(0)">
                                    <i class="ti-heart text-danger"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- Comment Row -->
                <div class="flex-row d-flex comment-row">
                    <div class="p-2">
                        <img src="{{asset('nice-admin/assets/images/users/5.jpg')}}" alt="user" width="50" class="rounded-circle">
                    </div>
                    <div class="comment-text w-100">
                        <h6 class="font-medium">Johnathan Doeting</h6>
                        <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry. </span>
                        <div class="comment-footer">
                            <span class="float-right text-muted">April 14, 2016</span>
                            <span class="label label-rounded label-danger">Rejected</span>
                            <span class="action-icons">
                                <a href="javascript:void(0)">
                                    <i class="ti-pencil-alt"></i>
                                </a>
                                <a href="javascript:void(0)">
                                    <i class="ti-check"></i>
                                </a>
                                <a href="javascript:void(0)">
                                    <i class="ti-heart"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- Comment Row -->
                <div class="flex-row d-flex comment-row m-t-0">
                    <div class="p-2">
                        <img src="{{asset('nice-admin/assets/images/users/2.jpg')}}" alt="user" width="50" class="rounded-circle">
                    </div>
                    <div class="comment-text w-100">
                        <h6 class="font-medium">Steve Jobs</h6>
                        <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry. </span>
                        <div class="comment-footer">
                            <span class="float-right text-muted">April 14, 2016</span>
                            <span class="label label-rounded label-primary">Pending</span>
                            <span class="action-icons">
                                <a href="javascript:void(0)">
                                    <i class="ti-pencil-alt"></i>
                                </a>
                                <a href="javascript:void(0)">
                                    <i class="ti-check"></i>
                                </a>
                                <a href="javascript:void(0)">
                                    <i class="ti-heart"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- column -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center p-b-15">
                    <div>
                        <h4 class="card-title m-b-0">To Do List</h4>
                    </div>
                    <div class="ml-auto">
                        <div class="dl">
                            <select class="border-0 custom-select text-muted">
                                <option value="0" selected="">August 2018</option>
                                <option value="1">May 2018</option>
                                <option value="2">March 2018</option>
                                <option value="3">June 2018</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="todo-widget scrollable" style="height:422px;">
                    <ul class="list-task todo-list list-group m-b-0" data-role="tasklist">
                        <li class="list-group-item todo-item" data-role="task">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                <label class="custom-control-label todo-label" for="customCheck">
                                    <span class="todo-desc">Simply dummy text of the printing and typesetting</span> <span class="float-right badge badge-pill badge-success">Project</span>
                                </label>
                            </div>
                        </li>
                        <li class="list-group-item todo-item" data-role="task">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label todo-label" for="customCheck1">
                                    <span class="todo-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been.</span><span class="float-right badge badge-pill badge-danger">Project</span>
                                </label>
                            </div>

                        </li>
                        <li class="list-group-item todo-item" data-role="task">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck2">
                                <label class="custom-control-label todo-label" for="customCheck2">
                                    <span class="todo-desc">Ipsum is simply dummy text of the printing</span> <span class="float-right badge badge-pill badge-info">Project</span>
                                </label>
                            </div>

                        </li>
                        <li class="list-group-item todo-item" data-role="task">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck3">
                                <label class="custom-control-label todo-label" for="customCheck3">
                                    <span class="todo-desc">Simply dummy text of the printing and typesetting</span> <span class="float-right badge badge-pill badge-info">Project</span>
                                </label>
                            </div>
                        </li>
                        <li class="list-group-item todo-item" data-role="task">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck4">
                                <label class="custom-control-label todo-label" for="customCheck4">
                                    <span class="todo-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been.</span> <span class="float-right badge badge-pill badge-purple">Project</span>
                                </label>
                            </div>
                        </li>
                        <li class="list-group-item todo-item" data-role="task">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck5">
                                <label class="custom-control-label todo-label" for="customCheck5">
                                    <span class="todo-desc">Ipsum is simply dummy text of the printing</span> <span class="float-right badge badge-pill badge-success">Project</span>
                                </label>
                            </div>
                        </li>
                        <li class="list-group-item todo-item" data-role="task">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck6">
                                <label class="custom-control-label todo-label" for="customCheck6">
                                    <span class="todo-desc">Simply dummy text of the printing and typesetting</span> <span class="float-right badge badge-pill badge-primary">Project</span>
                                </label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Recent comment and chats -->
<!-- ============================================================== -->

</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
@endsection
