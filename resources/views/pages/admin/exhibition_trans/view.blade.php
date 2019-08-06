@extends('layouts.admin')
@section('title','Exhibition Translation | Details')
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

@if (session('success'))
<script type="text/javascript">
    $(document).ready(function(){
        Swal.fire({
          type: 'success',
          title: 'Success',
          text: 'Exhibition Was Added Successfully!',
          confirmButtonText: 'Finish',
        })
        $('#btn_back').click(function(){
            alert('asdasd');
        });
    });
</script>
@endif

@if (session('error'))
<script type="text/javascript">
    $(document).ready(function(){
        swal ( "Error" ,  "Exhibition Name Already Exist" ,  "error" );
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
                                    <a class="navbar-brand">Exhibitions Translations Section View</a>
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
                                              <a class="nav-link" href="{{route('Exhibition_add_translation')}}">Add Exhibition </a>
                                            </li>
                                            <li class="nav-item active">
                                              <a class="nav-link">Translations <span class="sr-only">(current)</span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{route('Exhibition_companies')}}">Exhibition Companies</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link " href="#">Setting</a> <!-- disabled -->
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

                           
                           
                            <!-- Default Navbar card end -->
                          <form id="exhibition_form_add_main" action="{{route('Exhibition_update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="exhibition_id" value="{{$exhibition_id}}">
                                <!-- Row start -->
                                <div class="row">
                                    
                                    <div class="col-sm-12 col-xl-6 m-b-30">
                                        <select class="js-example-basic-single col-sm-12" name="category_id">
                                            <option selected="" value="">Select Category</option>
                                            @foreach($all_categories as $category)
                                            @if($category->id == $exhibition_data->cat_id)
                                            <option selected value="{{$category->id}}">{{$category->name}}</option>ssss
                                            @else
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-sm-12 col-xl-6 m-b-30">
                                        <select class="js-example-basic-single col-sm-12" name="country_id">
                                            <option selected="" value="">Select Country</option>
                                            @foreach($all_countries as $country)
                                            @if($country->id == $exhibition_data->country_id)
                                            <option selected value="{{$country->id}}">{{$country->name}}</option>
                                            @else
                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                            @endif
                                            
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <!-- <div class="col-sm-12 col-xl-4 m-b-30">
                                        <select class="js-example-basic-single col-sm-12" name="city_id">
                                            <option selected="" value="">Select City</option>
                                            @foreach($all_cities as $city)
                                            <option value="{{$city->id}}">{{$city->name}}</option>
                                            @endforeach
                                        </select>
                                    </div> -->
                                  

                                </div>

                                <div class="form-group row">
                                    
                                    <div class="col-sm-3">
                                        <label for="start_date">Start Date</label>
                                        <input id="start_date" type="date" class="form-control form-control-info" placeholder="Start Date" name="start_date" value="{{$exhibition_data->start}}">
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="end_date">Finish Date</label>
                                        <input id="End_date" type="date" class="form-control form-control-info" placeholder="End Date" name="end_date" value="{{$exhibition_data->end}}">
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="company_total">Companies numbers</label>
                                        <input id="company_total" type="number" class="form-control form-control-info" name="companies_required" value="{{$exhibition_data->sub_scribe_limit}}">
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="cost">Cost</label>
                                        <input id="cost" type="number" class="form-control form-control-info" name="cost" value="{{$exhibition_data->cost}}">
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="active">Active</label><br>
                                        @if($exhibition_data->shown == 1)
                                        <input id="active" name="active" type="checkbox" class="js-single" checked />
                                        @else
                                        <input id="active" name="active" type="checkbox" class="js-single"/>
                                        @endif
                                    </div>
                                    
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <div class="fileinput-new thumbnail">Exhibition Photo
                                            <img id="photo_preview" src="{{url('/')}}/{{$curr_lang}}/images/med/{{$exhibition_trans->photo}}" alt="" width="200" />
                                            <input id="photo_target" name="photo" type="file" name="file">
                                        </div>
                                        <br>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="fileinput-new thumbnail">Exhibition File
                                            <img id="file_preview" src="" alt="" width="200" />
                                            <input id="file_target" name="file" type="file" name="file">
                                        </div>
                                        <br>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="video_url">Video Url</label>
                                        <input id="video_url" name="video" type="text" name="video-url" class="form-control form-control-info" value="{{$exhibition_data->video}}">
                                    </div>

                                </div>
                                <!-- Row start -->
                                <div class="form-group row">
                                
                                    <div class="col-sm-8">
                                        <!-- <label for="title">Exhibition Name</label> -->
                                        <input id="title" name="title" type="text" value="{{$exhibition_trans->name}}" class="form-control thresold-i form-control-info" placeholder="Exhibition Name" maxlength="100" value="{{old('title')}}">
                                    </div>
                                    <div class="col-sm-12 col-xl-4 m-b-30">
                                        <select class="js-example-basic-single col-sm-12" name="language_id">
                                            <option selected="" value="">Select Language</option>
                                            @foreach($all_languages as $language)
                                            @if($language->id == $exhibition_trans->lang_id)
                                            <option selected value="{{$language->id}}">{{$language->name}}</option>
                                            @else
                                            <option value="{{$language->id}}">{{$language->name}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                </div>

                                <div class="form-group row">
                                
                                    <div class="col-sm-12">
                                        <!-- <label for="meta-keywords">Exhibition Name</label> -->
                                        <input id="meta-keywords" value="{{$exhibition_trans->key_words}}" name="meta_keywords" type="text" class="form-control thresold-i form-control-info" placeholder="Exhibition Meta Key Words" maxlength="255">
                                    </div>
                                    
                                </div>

                                <div class="form-group row">
                                
                                    <div class="col-sm-12">
                                        <!-- <label for="meta-keywords">Exhibition Name</label> -->
                                        <!-- <input id="meta-keywords" type="text" class="form-control thresold-i form-control-info" placeholder="Exhibition Meta Key Words" maxlength="100"> -->
                                        <textarea id="" name="summary" class="form-control thresold-i form-control-info" placeholder="Exhibition Summary" rows="3" maxlength="255">{{$exhibition_trans->summary}}</textarea>
                                    </div>
                                    
                                </div>

                                <div class="form-group row">
                                
                                    <div class="col-sm-12">
                                        <!-- <label for="meta-keywords">Exhibition Name</label> -->
                                        <!-- <input id="meta-keywords" type="text" class="form-control thresold-i form-control-info" placeholder="Exhibition Meta Key Words" maxlength="100"> -->
                                        <textarea id="" name="content" class="form-control thresold-i form-control-info" placeholder="Exhibition Content Details" rows="5">{{$exhibition_trans->content}}</textarea>
                                    </div>
                                    
                                </div>

                                
                                <center>
                                    <script>
                                        document.write('<a class="btn btn-danger btn-round" href="' + document.referrer + '">Go Back</a>');
                                    </script></center>
                                </form>
                        
                        
                                
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