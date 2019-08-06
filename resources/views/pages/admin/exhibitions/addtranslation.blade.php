@extends('layouts.admin')
@section('title','Exhibition | Add Trans')
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

                              <?php    $query = DB::table('exhibition_langs')->select('languages.id')
                    ->join('languages','languages.id','=','exhibition_langs.lang_id')
                     ->where('exhibition_langs.exhibition_id',$exhibition_data->id)
                     ->pluck('languages.id');
            
         $all_languages  = DB::table('languages')->whereNotIn('id', $query)->get();
                


    
                     ?>

@if ($all_languages->count()==0)
<div class="alert alert-danger   alert-block">
  <button type="button" class="close" data-dismiss="alert">×</button> 
  <strong>All Translations to Exhibitions
 are Completed</strong>
</div>
@endif


<!-- Page body start -->
            <div class="page-body">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Bootstrap tab card start -->
                        <div class="card">
                            <div class="card-block">
                                  <nav class="navbar navbar-expand-lg navbar-light bg-light">
                                    <a class="navbar-brand">Add Translation to Exhibitions</a>
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
                                                <a class="nav-link" href="{{route('Exhibition_show')}}">All Exhibitions </a>
                                            </li>
                                           
                                            
                                        </ul>
                                        
                                    </div>
                                </nav>
                        <br>
                            
                                
                          @if (session('error'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('error') }}</p>

@endif

               


                       
                            <!-- Default Navbar card end -->
                     
                          <fieldset style="    padding: .35em .625em .75em; margin: 0 2px; border: 1px solid silver;">
        
  <legend style="width: fit-content;border: 0px;">Main Exhibition Data:</legend>
                                <!-- Row start -->
                                <div class="row">
          
                                    
                                    <div class="col-sm-12 col-xl-4 m-b-30">

                                    	 <label for="Category">Category</label>
                                        <select class="selectsingle col-sm-12" name="category_id" readonly>
                                            <?php $all_categories= DB::table('exh_cat')->join('exh_cat_trans','exh_cat_trans.exh_cat_id','=','exh_cat.id')
                    ->select('exh_cat_trans.cat_name','exh_cat.id')->get();?>
                                            <option selected="" value="">Select Category</option>
                                            @foreach($all_categories as $category)
                                            @if($category->id == $exhibition_data->cat_id)
                                            <option selected value="{{$category->id}}">{{$category->cat_name}}</option>ssss
                                            @else
                                            <option value="{{$category->id}}">{{$category->cat_name}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>

                              
                                         <div class="col-sm-12 col-xl-4 m-b-30">

                                       <label for="Category">Countries</label>
                                        <select class="selectsingle col-sm-12" name="category_id" >
                                          <?php $Countries= DB::table('countries')->get();?>
                                            <option selected="" value="">Select Category</option>
                                            @foreach($Countries as $country)
                                            @if($country->id == $exhibition_data->country_id)
                                            <option selected value="{{$country->id}}">{{$country->name}}</option>ssss
                                            @else
                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>


                                   
                                    
                              
                                  
 

                                </div>

                                <div class="form-group row">
                                    
                                    <div class="col-sm-3">
                                        <label for="start_date">Start Date</label>
                                        <input id="start_date" type="date" class="form-control form-control-info" placeholder="Start Date" name="start_date" value="{{date('Y-m-d',strtotime( $exhibition_data->start))}}" readonly>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="end_date">Finish Date</label>
                                        <input id="End_date" type="date" class="form-control form-control-info" placeholder="End Date" name="end_date" value="{{date('Y-m-d',strtotime( $exhibition_data->end))}}" readonly>
                                    </div>
                                    
                                 
                                     <div class="col-sm-6">
                                        <label for="video_url">Video Url</label>
                                        <input id="video_url" name="video" type="text" name="video-url" class="form-control form-control-info" value="{{$exhibition_data->video}}" readonly>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                  

<div class="col-sm-2">
                                        <label for="company_total">Exhibitors</label>
                                        <input id="company_total" type="number" class="form-control form-control-info" name="companies_required" value="{{$exhibition_data->subscribe_exhibitors_limit}}" readonly>
                                    </div>
                                   

                                    <div class="col-sm-2">
                                        <label for="video_url"> Sponsors</label>
                                        <input id="subscribe_sponsors" name="subscribe_sponsors" type="text" name="subscribe_sponsors" class="form-control form-control-info" value="{{$exhibition_data->subscribe_sponsors_limit}}" readonly>
                                    </div>

                               



                                            <div class="col-sm-2">
                                        <label for="meta-keywords"> Viewers</label>
                                        <input id="viewers" value="{{$exhibition_data->viewers}}" name="viewers" type="number" class="form-control thresold-i form-control-info" placeholder="viewers" maxlength="255" readonly>
                                    </div>
 <div class="col-sm-12 col-xl-2 m-b-30">
                                        <label for="cost">Cost</label>
                                        <input id="cost" type="number" class="form-control form-control-info" name="cost" value="{{$exhibition_data->cost}}" readonly>
                                    </div>

                                     <div class="col-sm-2">
                                        <label for="active">Active</label><br>
                                            <select class="selectsingle col-sm-12" name="active" required= >
                                        @if($exhibition_data->shown == 1)
                                            <option selected value="1">Active</option>
                                          @else
                                          
                                            <option  value="0">Deactive</option>ssss
                                          
                                   @endif
                                        </select>
                                    </div>

                                     </div>
</fieldset>

  <fieldset style="    padding: .35em .625em .75em; margin: 0 2px; border: 1px solid silver;">
        
  <legend style="width: fit-content;border: 0px;">Add Translation Data:</legend>

                               <form id="exhibition_form_add_main" action="{{route('Exhibition_updatetrnsaltion')}}" method="post" enctype="multipart/form-data">
                                          {{ csrf_field() }}


                              <input type="hidden" name="exhibition_id" value="{{$exhibition_data->id}}">
                             <input type="hidden" name="active" value="{{$exhibition_data->shown}}">
                                <!-- Row start -->
                                <div class="form-group row">
                                
                                    <div class="col-sm-8">
                                        <label for="title">Exhibition Name</label>
                                        <input id="title" name="title" type="text" value="" class="form-control thresold-i form-control-info" placeholder="Exhibition Name" maxlength="100" value="{{old('title')}}" required>
                                    </div>
                                    <div class="col-sm-12 col-xl-4 m-b-30">

                                        <label for="title">Language</label>
                                        <select class="selectsinglelang col-sm-12" name="language_id" required>
              
                                            <option selected="" value="">Select Language</option>
                                            @foreach($all_languages as $language)
                                          
                                            <option selected value="{{$language->id}}">{{$language->lang}}</option>
                                           @endforeach
                                        </select>
                                    </div>
                                    
                                </div>

                                <div class="form-group row">
                                
                                    <div class="col-sm-4">
                                        <label for="meta-keywords"> Meta Key Words</label>
                                        <input id="meta-keywords" value="" name="meta_keywords" type="text" class="form-control thresold-i form-control-info" placeholder="Exhibition Meta Key Words" maxlength="255">
                                    </div>

                            <div class="col-sm-4">
                                        <div class="fileinput-new thumbnail">Exhibition Photo

                                            <img id="photo_preview" src="" alt="" width="200" />
                                        

                                            <input id="photo_target" name="photo" type="file" name="file" >
                                        </div>
                                        <br>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="fileinput-new thumbnail">Exhibition File

                                            <img id="file_preview" src="" alt="" width="200" />
                                         
                                            <input id="file_target" name="file" type="file" name="file">
                                        </div>
                                        <br>
                                    </div>
                                    
                                </div>

                                <div class="form-group row">
                                
                                    <div class="col-sm-12">
                                        <label for="meta-keywords">Exhibition Summary</label>
                                        
                                        <textarea id="editor" name="summary" class="form-control thresold-i form-control-info" placeholder="Exhibition Summary" rows="3" maxlength="255"></textarea>
                                    </div>
                                    
                                </div>

                                <div class="form-group row">
                                
                                    <div class="col-sm-12">
                                      <label for="meta-keywords">Exhibition Content</label> 
                                    
                                        <textarea id="editor1" name="content" class="form-control thresold-i form-control-info" placeholder="Exhibition Content Details" rows="5"></textarea>
                                    </div>
                                    
                                </div>

                                
                                <center><button class="btn btn-info btn-round">Add Transalted Exhibition</button></center>
                                </form>
                        
                        </fieldset>
                                
                                </div>
                                <!-- Row end -->
                             <fieldset style="    padding: .35em .625em .75em; margin: 0 2px; border: 1px solid silver;">
        
  <legend style="width: fit-content;border: 0px;">Translation:</legend>

<?php   $Exhibitions = DB::table('exhibitions')
                     ->join('exhibition_langs','exhibition_langs.exhibition_id','=','exhibitions.id')->join('languages','languages.id','=','exhibition_langs.lang_id')
                     ->where('exhibitions.id',$exhibition_data->id)
                     ->select('languages.lang','exhibition_langs.name')
                    ->get();
                     ?>

 <table id="key-intergration" class="table table-striped table-bordered nowrap">


                                                                <thead>
                                                                    <tr>
                                                                        <th> Name</th>
                                                                        <th>language</th>
                                                                       
                                                                    </tr>
                                                                </thead>
                                                                @foreach($Exhibitions as $exhibition)
                                                                <tr>
                                                                    <td>{{$exhibition->name}}</td>
                                                                    <td>{{$exhibition->lang}}</td>
                                                                   
                                                                       
                                                                              
                                                                              





                                                      

                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                       </tr>
                                                     


                                                                @endforeach

                                                                <tfoot>
                                                                    <tr>
                                                                       <th> Name</th>
                                                                        <th>Language</th>
                                                                       
                                                                    </tr>
                                                                </tfoot>

                                                            </table>
  </fieldset>

                            </div>
                        </div>
                        <!-- Bootstrap tab card end -->

                    </div>



                    <!-- sub section -->
               
        </div>
</div>

<script type="text/javascript">
 $(document).ready(function() {
  $(".selectsinglelang").select2();

  $(".selectsingle").prop("disabled", true);
});
</script>

 <script>
   CKEDITOR.config.extraPlugins = 'justify';
  CKEDITOR.replace( 'editor' );
   CKEDITOR.replace( 'editor1' );
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