@extends('layouts.admin')
@section('title','Exhibition | Analytics')
@section('content')
<!-- including css js front -->
<link rel="stylesheet" type="text/css" href="{{asset('/admin/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/admin/assets/pages/data-table/css/buttons.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/admin/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/assets/pages/data-table/extensions/autofill/css/autoFill.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/assets/pages/data-table/extensions/autofill/css/select.dataTables.min.css')}}">




<!-- Page body start -->
            <div class="page-body">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Bootstrap tab card start -->
                        <div class="card">
                            <div class="card-header">
                                <h5>Exhibiotion Options Details</h5>
                                <div class="card-header-right">
                                    <i class="icofont icofont-rounded-down"></i>
                                    <!-- <i class="icofont icofont-refresh"></i> -->
                                    <i class="icofont icofont-close-circled"></i>
                                </div>
                            </div>
                            <div class="card-block">
                                <!-- Row start -->
                                <div class="row">
                                    <div class="col-lg-12 col-xl-12">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs  tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#exhibitions" role="tab">All Exhibition</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#add_ex" role="tab">Add Exhibition</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="{{route('Exhibition_companies')}}" role="tab">Exhibition Companies</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Settings</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link " href="{{route('Exhibition_categories')}}">Categories</a> 
                                            </li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content tabs card-block">
                                            <div class="tab-pane active" id="exhibitions" role="tabpanel">
                                                <p class="m-0">
                                                    <div class="card-block">
                                                        <div class="dt-responsive table-responsive">
                                                            <table id="key-intergration" class="table table-striped table-bordered nowrap">

                                                                <thead>
                                                                    <tr>
                                                                        <th>Company Name</th>
                                                                        <th>Start</th>
                                                                        <th>End</th>
                                                                        <th>Total</th>
                                                                        <th>Status</th>
                                                                        <th>Options</th>
                                                                    </tr>
                                                                </thead>

                                                                @foreach($all_exhibitions as $exhibition)
                                                                <tr>
                                                                    <td>{{$exhibition->name}}</td>
                                                                    <td>{{$exhibition->start}}</td>
                                                                    <td>{{$exhibition->end}}</td>
                                                                    <td>{{$exhibition->sub_scribe_limit}}</td>
                                                                    @if($exhibition->shown == 1)
                                                                    <td class="text-info">Active</td>
                                                                    @else
                                                                    <td class="text-danger">Deactive</td>
                                                                    @endif
                                                                    <td>
                                                                        <div class="dropdown-info dropdown open">
                                                                            <button class="btn btn-info dropdown-toggle waves-effect waves-light " type="button" id="dropdown-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">options</button>
                                                                            <div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                                                <a class="dropdown-item waves-light waves-effect" href="#">View</a>
                                                                                <a class="dropdown-item waves-light waves-effect" href="#">Edit</a>
                                                                                <a class="dropdown-item waves-light waves-effect" href="#">Delete</a>
                                                                                @if($exhibition->shown == 1)
                                                                                    <a class="dropdown-item waves-light waves-effect text-danger" href="#">Deactivate</a>
                                                                                @else
                                                                                    <a class="dropdown-item waves-light waves-effect text-info" href="#">Activate</a>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                @endforeach

                                                                <tfoot>
                                                                    <tr>
                                                                        <th>Company Name</th>
                                                                        <th>Start</th>
                                                                        <th>End</th>
                                                                        <th>Total</th>
                                                                        <th>Status</th>
                                                                        <th>Options</th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </p>
                                            </div>
                                            <div class="tab-pane" id="add_ex" role="tabpanel">
                                                <p class="m-0">2.Cras consequat in enim ut efficitur. Nulla posuere elit quis auctor interdum praesent sit amet nulla vel enim amet. Donec convallis tellus neque, et imperdiet felis amet.</p>
                                            </div>
                                            <div class="tab-pane" id="companies" role="tabpanel">
                                                <p class="m-0">3. This is Photoshop's version of Lorem IpThis is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean mas Cum sociis natoque penatibus et magnis dis.....</p>
                                            </div>
                                            <div class="tab-pane" id="settings" role="tabpanel">
                                                <p class="m-0">4.Cras consequat in enim ut efficitur. Nulla posuere elit quis auctor interdum praesent sit amet nulla vel enim amet. Donec convallis tellus neque, et imperdiet felis amet.</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <!-- Row end -->
                            </div>
                        </div>
                        <!-- Bootstrap tab card end -->
                    </div>
                </div>
                
            </div>

<!-- /////////////////////////////////////////////////////////////////////////////// -->
<!-- Required Jquery -->
    <script type="text/javascript" src="{{asset('admin/bower_components/jquery/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/bower_components/jquery-ui/js/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/bower_components/popper.js/js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/bower_components/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{asset('admin/bower_components/jquery-slimscroll/js/jquery.slimscroll.js')}}"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{asset('admin/bower_components/modernizr/js/modernizr.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/bower_components/modernizr/js/css-scrollbars.js')}}"></script>
    <!-- classie js -->
    <script type="text/javascript" src="{{asset('admin/bower_components/classie/js/classie.js')}}"></script>
    <!-- data-table js -->
    <script src="{{asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin/assets/pages/data-table/js/jszip.min.js')}}"></script>
    <script src="{{asset('admin/assets/pages/data-table/js/pdfmake.min.js')}}"></script>
    <script src="{{asset('admin/assets/pages/data-table/js/vfs_fonts.js')}}"></script>
    <script src="{{asset('admin/assets/pages/data-table/extensions/autofill/js/dataTables.autoFill.min.js')}}"></script>
    <script src="{{asset('admin/assets/pages/data-table/extensions/autofill/js/dataTables.select.min.js')}}"></script>
    <script src="{{asset('admin/bower_components/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('admin/bower_components/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
    <!-- i18next.min.js -->
    <script type="text/javascript" src="{{asset('admin/bower_components/i18next/js/i18next.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/bower_components/jquery-i18next/js/jquery-i18next.min.js')}}"></script>
    <!-- Custom js -->
    <script src="{{asset('admin/assets/pages/data-table/extensions/autofill/js/extensions-custom.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/assets/js/script.js')}}"></script>

    <script src="{{asset('admin/assets/js/pcoded.min.js')}}"></script>
<script src="{{asset('admin/assets/js/demo-12.js')}}"></script>
<script src="{{asset('admin/assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('admin/assets/js/jquery.mousewheel.min.js')}}"></script>


@endsection