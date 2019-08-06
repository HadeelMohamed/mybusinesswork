@extends('layouts.admin')
@section('title','Faq | Edit')
@section('content')
<!-- Data Table Css -->
<link rel="stylesheet" type="text/css" href="{{asset('admin/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/assets/pages/data-table/css/buttons.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/bower_components/datatables.net-responsive-bs4/cs')}}s/responsive.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('admin/assets/pages/data-table/extensions/autofill/css/autoFill.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/assets/pages/data-table/extensions/autofill/css/select.dataTables.min.css')}}">



<link rel="stylesheet" type="text/css" href="{{asset('admin/bower_components/select2/css/select2.min.css')}}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">




<script src="{{asset('admin/bower_components/jquery/jquery.min.js')}}"></script>


<script src="{{asset('admin/assets/js/sweetalert.min.js')}}"></script>
<script src="{{asset('admin/assets/js/sweetalert2@8.js')}}"></script>
<!-- ckeditor .js link -->

 <script src="{{asset('admin/bower_components/ckeditor/ckeditor.js')}}"></script>

 <style type="text/css">
   .select2-container {
    width: 100% !important;
    height: 100% !important;
    padding: 0;
}

.select2-container--default .select2-selection--single .select2-selection__rendered {
    background-color: #FFFF !important;

    display: initial !important;
    }



.select2-container--open{
        z-index:9999999         
    }
.select2-selection {
    overflow: hidden;
}

.select2-selection__rendered[title] {
    background-color: #D9FFC7;
}
 </style>




<!-- Page body start -->
            <div class="page-body">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Bootstrap tab card start -->
                        <div class="card">
                            <div class="card-block">
                                  <nav class="navbar navbar-expand-lg navbar-light bg-light">
                                    <a class="navbar-brand">Faq Section Edit</a>
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
                                                <a class="nav-link" href="{{route('Faqs_list')}}">All faq </a>
                                            </li>
                                           
                                            
                                        </ul>
                                        
                                    </div>
                                </nav>
                        <br>
                            
                                


                            
                       
                            <!-- Default Navbar card end -->
                        
 <fieldset style="    padding: .35em .625em .75em; margin: 0 2px; border: 1px solid silver;">
        
  <legend style="width: fit-content;border: 0px;">Edit Faq Main Data:</legend>

    <form  id="firstform"action="{{route('Faq_update')}}" method="post" enctype="multipart/form-data">
                                @csrf

                              <input type="hidden" name="faq_id" id ="faq_id" value="{{$faqs_data->id}}">
                          



  <div class="form-group row">
                                
                                    <div class="col-sm-12">
                                        <label for="title"> Title</label>
                                        <input id="title" name="title" type="text" value="{{$faqs_data->title}}" class="form-control thresold-i form-control-info" placeholder="Exhibition Name" maxlength="100" value="{{old('title')}}" >
                                    </div>
                                  </div>

             <div class="form-group row">
                                    <div class="col-sm-12">

                                        <label for="title">Content</label>

                                         <textarea  id ="editor" name="content" class="form-control thresold-i form-control-info" placeholder=" Content " rows="5">{{$faqs_data->content}}</textarea>
                                     
                                    </div>
                                    
                                </div>
                          <div class="row">


                                  <div class="col-sm-12 col-xl-6 m-b-30 ">

                                  <label for="Category">Active</label>
                                  <select class="selectsingle col-sm-12" name="active"  id="active">
                                  @if($faqs_data->active == 1)
                                  <option selected value="1">Active</option>
                                  <option  value="0">Deactive</option>
                                  @else
                                  <option  value="1">Active</option>
                                  <option  selected value="0">Deactive</option>

                                  @endif
                                  </select>
                                  </div>
                           
        
        <div class="col-sm-12 col-xl-6 m-b-30">
        <label for="video_url"> Image</label>
          <input type="hidden" name="imageinput" value="{{$faqs_data->image}}" id="photoinput">
        <input type='file' id="imgInp" name="photo"  />
        <img id="blah" src="{{asset('images/en/faqs')}}/{{$faqs_data->image}}" alt="your image" width="200" />
        </div>
   

      </div>
         
                   

                        <center><button class="btn btn-info btn-round" id="confirm">Update</button></center>

                             
</form>
 </fieldset>





                               

<br></br>



                                

                                </div>
                                <!-- Row end -->
                            
                            </div>
                        </div>
                        <!-- Bootstrap tab card end -->

                    </div>



                    <!-- sub section -->
               
        </div>
</div>

 <script>
   CKEDITOR.config.extraPlugins = 'justify';
  CKEDITOR.config.extraPlugins = 'colorbutton';
CKEDITOR.replace( 'editor' );
 
  </script>
<script type="text/javascript">
  $(document).ready(function() {
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function() {
  readURL(this);
});
});
</script>




<script type="text/javascript" src="{{asset('admin/bower_components/jquery/js/jquery.min.js')}}"></script>
<script src="{{asset('admin/bower_components/jquery-ui/js/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/bower_components/popper.js/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/bower_components/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/bower_components/select2/js/select2.full.min.js')}}"></script>
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
<!-- Custom js -->
<script src="{{asset('admin/assets/pages/data-table/extensions/autofill/js/extensions-custom.js')}}"></script>
<!-- <script type="text/javascript" src="{{asset('admin/assets/js/script.js')}}"></script> -->
<!-- classie js -->
<script type="text/javascript" src="{{asset('admin/bower_components/classie/js/classie.js')}}"></script>
<!-- modernizr js -->
<script type="text/javascript" src="{{asset('admin/bower_components/modernizr/js/modernizr.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/bower_components/modernizr/js/css-scrollbars.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>


@endsection