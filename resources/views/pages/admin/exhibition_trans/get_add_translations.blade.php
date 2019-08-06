@extends('layouts.admin')
@section('title','Exhibition | Details')
@section('content')
<!-- Data Table Css -->
<link rel="stylesheet" type="text/css" href="{{asset('admin/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/assets/pages/data-table/css/buttons.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/bower_components/datatables.net-responsive-bs4/cs')}}s/responsive.bootstrap4.min.css">
<!-- sweet alert framework -->
<link rel="stylesheet" type="text/css" href="{{asset('admin/bower_components/sweetalert/css/sweetalert.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/assets/pages/data-table/extensions/autofill/css/autoFill.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/assets/pages/data-table/extensions/autofill/css/select.dataTables.min.css')}}">
<!-- Select 2 css -->
<link rel="stylesheet" href="{{asset('admin/bower_components/select2/css/select2.min.css')}}"/>
<!-- Switch component css -->
<link rel="stylesheet" type="text/css" href="{{asset('admin/bower_components/switchery/css/switchery.min.css')}}">
<!-- Tags css -->
<link rel="stylesheet" type="text/css" href="{{asset('admin/bower_components/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}" />
<!-- flag icon framework css -->
<link rel="stylesheet" type="text/css" href="{{asset('admin/assets/pages/flag-icon/flag-icon.min.css')}}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="{{asset('admin/assets/js/sweetalert.min.js')}}"></script>
<script src="{{asset('admin/assets/js/sweetalert2@8.js')}}"></script>


@if(session('no_language'))
<script type="text/javascript">
    $(document).ready(function(){
        Swal.fire({
          type: 'info',
          title: 'Information',
          text: 'All Translations Completed',
          confirmButtonText: 'Finish',
        })

    });
</script>
@endif


@if (session('active'))
<script type="text/javascript">
    $(document).ready(function(){
        Swal.fire({
          type: 'success',
          title: 'Success',
          text: 'Exhibition Translation Now Is Active!',
          confirmButtonText: 'Finish',
        })

    });
</script>
@endif
@if (session('deactive'))
<script type="text/javascript">
    $(document).ready(function(){
        Swal.fire({
          type: 'success',
          title: 'Success',
          text: 'Exhibition Translation Now Is Not Active!',
          confirmButtonText: 'Finish',
        })

    });
</script>
@endif



@if (session('success'))
<script type="text/javascript">
    $(document).ready(function(){
    	
        var url = "{{url('/')}}";
        swal("Success", "Exhibition Was Added Successfully", "success");
        // Swal.fire({
        // title: '<strong>Success</strong>',
        // type: 'success',
        // html:
        // 'Exhibition Was Added Successfully, ' +
        // '<a href="{{url('/')}}">Add New Translation For This Exhibition?</a>',
        // showCloseButton: true,
        // showCancelButton: true,
        // focusConfirm: false,
        // // confirmButtonText:
        // // '<i class="fa fa-thumbs-up"></i> Add New Translate?',
        // // confirmButtonAriaLabel: 'Thumbs up, great!',
        // cancelButtonText:
        // 'Finish',
        // cancelButtonAriaLabel: 'Thumbs down',
        // })

        // Swal.fire({
        //   type: 'success',
        //   title: 'Success',
        //   text: 'Exhibition Was Added Successfully!',
        //   html:'<h3 style="color: red;"><a href="{{route('Exhibition_add')}}">Add Translation For This Exhibition</a></h3>',
        //   confirmButtonText: 'Finish',
        // })

    });
</script>
@endif



<!-- Page body start -->
            <div class="page-body">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Bootstrap tab card start -->
                        <div class="card">
                            <div class="card-block">
                                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                                    <a class="navbar-brand">Exhibitions Section Details</a>
                                    <button class="navbar-toggler" type="button"
                                            data-toggle="collapse"
                                            data-target="#navbarSupportedContent"
                                            aria-controls="navbarSupportedContent"
                                            aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>

                                    <div class="collapse navbar-collapse"
                                         id="navbarSupportedContent">
                                        <ul class="navbar-nav mr-auto">
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{route('Exhibition_list')}}">All Exhibitions </a>
                                            </li>
                                            <li class="nav-item">
                                              <a class="nav-link" href="{{route('Exhibition_add')}}">Add Exhibition </a>
                                            </li>
                                            <li class="nav-item active">
                                              <a class="nav-link">Translations </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{route('Exhibition_companies')}}">Exhibition Companies</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link " href="#">Setting</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link " href="{{route('Exhibition_categories')}}">Categories</a> 
                                            </li>
                                        </ul>
                                        
                                    </div>
                                </nav>
                        <br>
                            @if ($errors->any())
                              <div class="alert alert-danger">
                                <ul>
                                  @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                  @endforeach
                                </ul>
                              </div>
                            @endif

                          <div class="row">
                          	<dir class="col-xl-3">
                          		<!-- <label for="exhibition_id">Exhibition</label> -->
                          		<form id="list_exhibitions_form" method="post" action="{{route('Exhibition_list_translation')}}">
                          			@csrf
                          		<div class="col-sm-12 col-xl-12 m-b-30">
                                  <select class="js-example-basic-single col-sm-12" name="exhibition_id">
                                    <option selected="" value="">Select Exhibition</option>
                                    @foreach($all_exhibitions as $exhibition)
                                    <option value="{{$exhibition->id}}">{{$exhibition->name}}</option>
                                    @endforeach
                                  </select>
                              </div>
                          	</dir>

                          	<dir class="col-xl-3">
                          		<!-- <label for="exhibition_id">Exhibition</label> -->
                          		<div class="col-sm-12 col-xl-12 m-b-30">
                                 <button class="btn btn-info">List</button>
                              </div>
                          	</dir>
                          </form>

                          </div>
                           <hr>
                            
                                
                          </div>
                                <!-- Row end -->

                                
                            </div>
                        </div>
                        <!-- Bootstrap tab card end -->

                    </div>



                    <!-- sub section -->
               
        </div>
</div>


<script type="text/javascript">

    function photo_preview(input) {

      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#photo_preview').attr('src', e.target.result);
          $('#photo_preview').attr('width', 150);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#photo_target").change(function() {
      photo_preview(this);
    });


    function file_preview(input) {

      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#file_preview').attr('src', e.target.result);
          $('#file_preview').attr('width', 150);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }


    

    $("#file_target").change(function() {
      file_preview(this);
    });

</script>
<!-- Custom js -->
<script type="text/javascript" src="{{asset('admin/bower_components/jquery/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/bower_components/jquery-ui/js/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/bower_components/popper.js/js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/bower_components/bootstrap/js/bootstrap.min.js')}}"></script>
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
<!-- data-table js -->
<!-- <script src="{{asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
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
<script src="{{asset('admin/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script> -->
<!-- Custom js -->
<!-- <script src="{{asset('admin/assets/pages/data-table/extensions/autofill/js/extensions-custom.js')}}"></script> -->
<!-- <script type="text/javascript" src="{{asset('admin/assets/js/script.js')}}"></script> -->
<!-- classie js -->
<script type="text/javascript" src="{{asset('admin/bower_components/classie/js/classie.js')}}"></script>
<!-- modernizr js -->
<script type="text/javascript" src="{{asset('admin/bower_components/modernizr/js/modernizr.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/bower_components/modernizr/js/css-scrollbars.js')}}"></script>
<!-- Select 2 js -->
<script type="text/javascript" src="{{asset('admin/bower_components/select2/js/select2.full.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/assets/pages/advance-elements/select2-custom.js')}}"></script>
<!-- Switch component js -->
<script type="text/javascript" src="{{asset('admin/bower_components/switchery/js/switchery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/assets/pages/advance-elements/swithces.js')}}"></script>
<!-- sweet alert js -->
<script type="text/javascript" src="{{asset('admin/bower_components/sweetalert/js/sweetalert.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/assets/js/modal.js')}}"></script>
<!-- sweet alert modal.js intialize js -->

<!-- Tags js -->
<script type="text/javascript" src="{{asset('admin/bower_components/bootstrap-tagsinput/js/bootstrap-tagsinput.js')}}"></script>
<!-- Max-length js -->
<!-- <script type="text/javascript" src="{{asset('admin/bower_components/bootstrap-maxlength/js/bootstrap-maxlength.js')}}"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.10.4/typeahead.bundle.min.js"></script> -->






@endsection