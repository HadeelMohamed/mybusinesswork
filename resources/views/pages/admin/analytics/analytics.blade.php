@extends('layouts.admin')
@section('title','Statics')
@section('content')
<!-- Horizontal-Timeline css -->
<link rel="stylesheet" type="text/css" href="{{asset('/admin/assets/pages/dashboard/horizontal-timeline/css/style.css')}}">

<div class="page-body">
    <div class="row">
        <div class="col-md-12 col-xl-4">
            <!-- table card start -->
            <div class="card table-card">
                <div class="">
                    <div class="row-table">
                        <div class="col-sm-6 card-block-big br">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="icofont icofont-eye-alt text-success"></i>
                                </div>
                                <div class="col-sm-8 text-center">
                                    <h5>{{$members}}</h5>
                                    <span>Members</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 card-block-big">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="icofont icofont-ui-music text-danger"></i>
                                </div>
                                <div class="col-sm-8 text-center">
                                    <h5>{{$exhibitions}}</h5>
                                    <span>Exhibitions</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="row-table">
                        <div class="col-sm-6 card-block-big br">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="icofont icofont-files text-info"></i>
                                </div>
                                <div class="col-sm-8 text-center">
                                    <h5></h5>
                                    <span>Auctions</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 card-block-big">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="icofont icofont-envelope-open text-warning"></i>
                                </div>
                                <div class="col-sm-8 text-center">
                                    <h5></h5>
                                    <span>Tenders</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- table card end -->
        </div>

        <div class="col-md-12 col-xl-4">
            <!-- table card start -->
            <div class="card table-card">
                <div class="">
                    <div class="row-table">
                        <div class="col-sm-6 card-block-big br">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div id="barchart" style="height:40px;width:40px;"></div>
                                </div>
                                <div class="col-sm-8 text-center">
                                    <h5>1000</h5>
                                    <span>Shares</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 card-block-big">
                            <div class="row ">
                                <div class="col-sm-4">
                                    <i class="icofont icofont-network text-primary"></i>
                                </div>
                                <div class="col-sm-8 text-center">
                                    <h5>600</h5>
                                    <span>Network</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="row-table">
                        <div class="col-sm-6 card-block-big br">
                            <div class="row ">
                                <div class="col-sm-4">
                                    <div id="barchart2" style="height:40px;width:40px;"></div>
                                </div>
                                <div class="col-sm-8 text-center">
                                    <h5>350</h5>
                                    <span>Returns</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 card-block-big">
                            <div class="row ">
                                <div class="col-sm-4">
                                    <i class="icofont icofont-network-tower text-primary"></i>
                                </div>
                                <div class="col-sm-8 text-center">
                                    <h5>100%</h5>
                                    <span>Connections</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- table card end -->
        </div>

        <div class="col-md-12 col-xl-4">
            <!-- widget primary card start -->
            <div class="card table-card widget-primary-card">
                <div class="">
                    <div class="row-table">
                        <div class="col-sm-3 card-block-big">
                            <i class="icofont icofont-star"></i>
                        </div>
                        <div class="col-sm-9">
                            <h4>4000 +</h4>
                            <h6>Ratings Received</h6>
                        </div>
                    </div>
                </div>
            </div>
            <!-- widget primary card end -->
            <!-- widget-success-card start -->
            <div class="card table-card widget-success-card">
                <div class="">
                    <div class="row-table">
                        <div class="col-sm-3 card-block-big">
                            <i class="icofont icofont-trophy-alt"></i>
                        </div>
                        <div class="col-sm-9">
                            <h4>17</h4>
                            <h6>Achievements</h6>
                        </div>
                    </div>
                </div>
            </div>
            <!-- widget-success-card end -->
        </div>
     <!--    <div class="col-lg-6">
            <div class="card">
                <div class="card-block">
                    <div id="chartdiv"></div>
                </div>
            </div>
        </div> -->
        
        
     
       
    </div>



<!-- Custom js -->
<script type="text/javascript" src="{{asset('admin/bower_components/jquery/js/jquery.min.js')}}"></script>
<script src="{{asset('admin/bower_components/jquery-ui/js/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/bower_components/popper.js/js/popper.min.js')}}"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="{{asset('admin/bower_components/jquery-slimscroll/js/jquery.slimscroll.js')}}"></script>

<!-- menu slide down mobile -->
<script type="text/javascript" src="{{asset('admin/assets/js/script.js')}}"></script>

<!-- pcmenu js -->
<script src="{{asset('admin/assets/js/pcoded.min.js')}}"></script>
<script src="{{asset('admin/assets/js/demo-12.js')}}"></script>
<!-- scroll -->
<script src="{{asset('admin/assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('admin/assets/js/jquery.mousewheel.min.js')}}"></script>
<!-- i18next.min.js -->
<script type="text/javascript" src="{{asset('admin/bower_components/i18next/js/i18next.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/bower_components/jquery-i18next/js/jquery-i18next.min.js')}}"></script>

@endsection