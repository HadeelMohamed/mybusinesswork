@extends('layouts.admin')
@section('title','Exhibition | Add')
@section('content')
<!-- Data Table Css -->
<link rel="stylesheet" type="text/css" href="{{asset('admin/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/assets/pages/data-table/css/buttons.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/bower_components/datatables.net-responsive-bs4/cs')}}s/responsive.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('admin/assets/pages/data-table/extensions/autofill/css/autoFill.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/assets/pages/data-table/extensions/autofill/css/select.dataTables.min.css')}}">



<link rel="stylesheet" type="text/css" href="{{asset('admin/bower_components/select2/css/select2.min.css')}}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />


<style type="text/css"> 




.select2-container--default .select2-selection--single .select2-selection__rendered {
    background-color: #FFFF !important;

    display: contents !important;
    }





.btn_upload {
  cursor: pointer;
  display: inline-block;
  overflow: hidden;
  position: relative;
  color: #fff;
  background-color: #2a72d4;
  border: 1px solid #166b8a;
  padding: 5px 10px;
}

.btn_upload:hover,
.btn_upload:focus {
  background-color: #7ca9e6;
}

.yes {
  display: flex;
  align-items: flex-start;
  margin-top: 10px !important;
}

.btn_upload input {
  cursor: pointer;
  height: 100%;
  position: absolute;
  filter: alpha(opacity=1);
  -moz-opacity: 0;
  opacity: 0;
}

.it {
  height: 100px;
  margin-left: 10px;
}

.btn-rmv1,
.btn-rmv2,
.btn-rmv3,
.btn-rmv4,
.btn-rmv5 {
  display: none;
}

.rmv {
  cursor: pointer;
  color: #fff;
  border-radius: 30px;
  border: 1px solid #fff;
  display: inline-block;
  background: rgba(255, 0, 0, 1);
  margin: -5px -10px;
}

.rmv:hover {
  background: rgba(255, 0, 0, 0.5);
}

.input-group-addon {
    background-color: #f2fbf9;
    color: #fff;
}





</style>


<script src="{{asset('admin/bower_components/jquery/jquery.min.js')}}"></script>


<script src="{{asset('admin/assets/js/sweetalert.min.js')}}"></script>
<script src="{{asset('admin/assets/js/sweetalert2@8.js')}}"></script>
<!-- ckeditor .js link -->

 <script src="{{asset('admin/bower_components/ckeditor/ckeditor.js')}}"></script>

@if (session('success'))
<script type="text/javascript">
    $(document).ready(function(){
        Swal.fire({
          type: 'success',
          title: 'Success',
          text: 'Exhibition Was Added Successfully!',
          confirmButtonText: 'Finish',
        })
         
    });
</script>
@endif


@if (session('updated_success'))
<script type="text/javascript">
    $(document).ready(function(){
        Swal.fire({
          type: 'success',
          title: 'Success',
          text: 'Exhibition Updated Successfully!',
          confirmButtonText: 'Finish',
        })
         {{session()->forget('updated_success')}}
    });
</script>
@endif

@if (session('no_changes_updated'))
<script type="text/javascript">
    $(document).ready(function(){
        Swal.fire({
          type: 'info',
          title: 'Message',
          text: 'No Changes To Updating!',
          confirmButtonText: 'Finish',
        })
         {{session()->forget('no_changes_updated')}}
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
                                    <a class="navbar-brand">Add Main Data to Exhibitions</a>
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
                                           
                                            
                                        </ul>
                                        
                                    </div>
                                </nav>
                        <br>
                            
                                
                          @if (session('error'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('error') }}</p>

@endif

                            
                       
                            <!-- Default Navbar card end -->
                     
  <form id="exhibition_form_add_main" action="{{route('Exhibition_add')}}" method="post" enctype="multipart/form-data">
                                          {{ csrf_field() }}                        <!-- Row start -->
                                <div class="row">
                                    
                                    <div class="col-sm-12 col-xl-6 m-b-30">

                                         <label for="Category">Category</label>

                                            <?php $all_categories= DB::table('exh_cat')->join('exh_cat_trans','exh_cat_trans.exh_cat_id','=','exh_cat.id')
                    ->select('exh_cat_trans.cat_name','exh_cat.id')->get();?>
                                        <select class="selectsingle col-sm-12" name="cat_id" >
                                         
                                           
                                            @foreach($all_categories as $category)
                                           
                                            <option  value="{{$category->id}}">{{$category->cat_name}}</option>
                                         
                                            @endforeach
                                        </select>
                                    </div>

                              
                                         <div class="col-sm-12 col-xl-6 m-b-30">

                                       <label for="Category">Countries</label>
                                         <?php $Countries= DB::table('countries')->get();?>
                                        <select class="selectsingle col-sm-12" name="country_id" >
                                        
                                            
                                            @foreach($Countries as $country)
                                          
                                            <option selected value="{{$country->id}}">{{$country->name}}</option>ssss
                                          
                                            @endforeach
                                        </select>
                                    </div>


                              
                                   
                              
                                  
 

                                </div>

                                <div class="form-group row">
                                    
                                    <div class="col-sm-3">
                                        <label for="start_date">Start Date</label>
                                        <input id="start_date" type="date" class="form-control form-control-info" placeholder="Start Date" name="start_date" value="" required>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="end_date">Finish Date</label>
                                        <input id="End_date" type="date" class="form-control form-control-info" placeholder="End Date" name="end_date" value="" required>
                                    </div>
                                   




                                            <div class="col-sm-6">
                                                  <label for="video_url">Video Url</label>
                                            <div class='urldiv' id='urldiv'></div>           
                                            <div>
                                            <input id="myUrl" type="text" name="video" />
                                            </div>
                                            <div> <pre id="myCode"></pre></div>


                                            </div>
                                 
                                    
                                </div>
                                
                                <div class="form-group row">
                                  

                                       <div class="col-sm-2">
                                        <label for="company_total">Exhibitors</label>
                                        <input id="company_total" type="number" class="form-control form-control-info" name="subscribe_members" value="" required>
                                    </div>

                                    <div class="col-sm-2">
                                        <label for="video_url"> Sponsors</label>
                                        <input id="subscribe_sponsors" name="subscribe_sponsors" type="text" name="subscribe_sponsors" class="form-control form-control-info" value="" required>
                                    </div>

                               



                                            <div class="col-sm-2">
                                        <label for="meta-keywords"> Viewers</label>
                                        <input id="viewers" value="" name="viewers" type="number" class="form-control thresold-i form-control-info" placeholder="viewers" maxlength="255">
                                    </div>


                                           <div class="col-sm-2">
                                        <label for="cost">Cost</label>
                                        <input id="cost" type="number" class="form-control form-control-info" name="cost" value="" required>
                                    </div>


                                     <div class="col-sm-2">
                                        <label for="active">Active</label><br>
                                      
                                        <select class="selectsingle col-sm-12" name="active" required= >
                                       
                                            <option selected value="1">Active</option>
                                          
                                          
                                            <option  value="0">Deactive</option>
                                          
                                   
                                        </select>
                                      
                                    </div>

                                     </div>

                         <center><button class="btn btn-info btn-round">Add Main Exhibition Data</button></center>
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
 $(document).ready(function() {
  $(".selectsingle").select2();
});
</script>


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


function getId(url) {

    var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
    var match = url.match(regExp);

    if (match && match[2].length == 11) {
        return match[2];
    } else {
        return 'error';
    }
}

  $(document).ready(function(){
    var inputBox = document.getElementById('myUrl');
   inputBox.onkeyup = function(){
    var url =document.getElementById('urldiv').innerHTML = inputBox.value;
     myId = getId(url);
     $("#urldiv").empty();

     $('#myCode').html('<iframe width="150" height="150" src="//www.youtube.com/embed/' + myId + '" frameborder="0" allowfullscreen></iframe>');


}



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