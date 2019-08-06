@extends('layouts.admin')
@section('title','Exhibition | Edit')
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

<style type="text/css">
    body {
    font-family: 'Varela Round', sans-serif;
  }
  .modal-confirm {    
    color: #434e65;
    width: 525px;
  }
  .modal-confirm .modal-content {
    padding: 20px;
    font-size: 16px;
    border-radius: 5px;
    border: none;
  }
  .modal-confirm .modal-header {
    background: #47c9a2;
    border-bottom: none;   
        position: relative;
    text-align: center;
    margin: -20px -20px 0;
    border-radius: 5px 5px 0 0;
    padding: 35px;
  }
  .modal-confirm h4 {
    text-align: center;
    font-size: 36px;
    margin: 10px 0;
  }
  .modal-confirm .form-control, .modal-confirm .btn {
    min-height: 40px;
    border-radius: 3px; 
  }
  .modal-confirm .close {
        position: absolute;
    top: 15px;
    right: 15px;
    color: #fff;
    text-shadow: none;
    opacity: 0.5;
  }
  .modal-confirm .close:hover {
    opacity: 0.8;
  }
  .modal-confirm .icon-box {
    color: #fff;    
    width: 95px;
    height: 95px;
    display: inline-block;
    border-radius: 50%;
    z-index: 9;
    border: 5px solid #fff;
    padding: 15px;
    text-align: center;
  }
  .modal-confirm .icon-box i {
    font-size: 64px;
    margin: -4px 0 0 -4px;
  }
  .modal-confirm.modal-dialog {
    margin-top: 80px;
  }
    .modal-confirm .btn {
        color: #fff;
        border-radius: 4px;
    background: #eeb711;
    text-decoration: none;
    transition: all 0.4s;
        line-height: normal;
    border-radius: 30px;
    margin-top: 10px;
    padding: 6px 20px;
        border: none;
    }
  .modal-confirm .btn:hover, .modal-confirm .btn:focus {
    background: #eda645;
    outline: none;
  }
  .modal-confirm .btn span {
    margin: 1px 3px 0;
    float: left;
  }
  .modal-confirm .btn i {
    margin-left: 1px;
    font-size: 20px;
    float: right;
  }
  .trigger-btn {
    display: inline-block;
    margin: 100px auto;
  }
</style>
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



<div id="myModal" class="modal fade">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header">
        <div class="icon-box">
          <i class="material-icons">&#xE876;</i>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body text-center">
        <h4>Great!</h4> 
        <p>Exhibition  Successfully Update!.</p>
        </button>
      </div>
    </div>
  </div>
</div> 


<!-- Page body start -->
            <div class="page-body">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Bootstrap tab card start -->
                        <div class="card">
                            <div class="card-block">
                                  <nav class="navbar navbar-expand-lg navbar-light bg-light">
                                    <a class="navbar-brand">Exhibitions Section Edit</a>
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
                            
                                


                            
                       
                            <!-- Default Navbar card end -->
                        
 <fieldset style="    padding: .35em .625em .75em; margin: 0 2px; border: 1px solid silver;">
        
  <legend style="width: fit-content;border: 0px;">Edit Exhibition Data:</legend>

    <form  id="firstform" enctype="multipart/form-data">
                                @csrf
                                    {{ method_field('PUT') }}

                              <input type="hidden" name="exhibition_id" value="{{$exhibition_data->id}}">
                              <input type="hidden" name="curr_lang" value="{{$exhibition_data->lang_id}}">
                                <!-- Row start -->
                                <div class="row">
                                    
                                    <div class="col-sm-12 col-xl-6 m-b-30">
                                        <select class="selectsingle col-sm-12" name="category_id">
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

                                    <div class="col-sm-12 col-xl-6 m-b-30">
                                        <select class="selectsingle col-sm-12" name="country_id">
                                             <?php $all_countries= DB::table('countries')->get();?>
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
                                    
                              
                                  


                                </div>

                                <div class="form-group row">
                                    
                                    <div class="col-sm-3">
                                        <label for="start_date">Start Date</label>
                                  <input id="start_date" type="date" class="form-control form-control-info" placeholder="Start Date" name="start_date" value="{{date('Y-m-d',strtotime( $exhibition_data->start))}}">
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="end_date">Finish Date</label>
                                        <input id="End_date" type="date" class="form-control form-control-info" placeholder="End Date" name="end_date" value="{{date('Y-m-d',strtotime( $exhibition_data->end))}}">
                                    </div>


                                     <div class="col-sm-6">
                                        <label for="video_url">Video Url</label>
                                        <input id="video_url" name="video" type="text" name="video-url" class="form-control form-control-info" value="{{$exhibition_data->video}}">
                                    </div>
                                 
                                    
                                </div>

                                  <div class="form-group row">
                                    
                                   
                                    <div class="col-sm-2">
                                        <label for="company_total">Exhibitors</label>
                                        <input id="company_total" type="number" class="form-control form-control-info" name="subscribe_exhibitors" value="{{$exhibition_data->subscribe_exhibitors_limit}}">
                                    </div>

                                     <div class="col-sm-2">
                                        <label for="video_url"> Sponsors</label>
                                        <input id="subscribe_sponsors" name="subscribe_sponsors" type="text" name="subscribe_sponsors" class="form-control form-control-info" value="{{$exhibition_data->subscribe_sponsors_limit}}">
                                    </div>

                                          <div class="col-sm-2">
                                            <label for="viewers">Viewers</label>
                                        
                                        <input id="viewers" value="{{$exhibition_data->viewers}}" name="viewers" type="number" class="form-control thresold-i form-control-info" placeholder="viewers" maxlength="255">
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="cost">Cost</label>
                                        <input id="cost" type="number" class="form-control form-control-info" name="cost" value="{{$exhibition_data->cost}}">
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="active">Active</label><br>
                                      
                                            <select class="selectsingle col-sm-12" name="active" required id="active">
                                        @if($exhibition_data->shown == 1)
                                            <option selected value="1">Active</option>
                                            <option  value="0">Deactive</option>
                                          @else
                                          <option  value="1">Active</option>
                                            <option  selected value="0">Deactive</option>
                                          
                                   @endif
                                        </select>
                                    </div>
                                    
                                </div>
</form>
                              </fieldset>

                               <fieldset style="    padding: .35em .625em .75em; margin: 0 2px; border: 1px solid silver;">
        
  <legend style="width: fit-content;border: 0px;">Edit Translation Data:</legend>

  <form id="secondform" a method="post" enctype="multipart/form-data">
                                @csrf
                                    {{ method_field('PUT') }}

                              <input type="hidden" name="exhibition_id" value="{{$exhibition_data->id}}" id='exhibition_id'>

                              <input type="hidden" name="curr_lang" value="{{$exhibition_data->lang_id}}">


             <div class="form-group row">
                                
                                    <div class="col-sm-6">
                                        <label for="title">Exhibition Name</label>
                                        <input id="title" name="title" type="text" value="{{$exhibition_data->name}}" class="form-control thresold-i form-control-info" placeholder="Exhibition Name" maxlength="100" value="{{old('title')}}" >
                                    </div>
                                    <div class="col-sm-12 col-xl-6 m-b-30">

                                        <label for="title">Language</label>
                                        <select class="selectsingle col-sm-12" name="language_id" id="language_id">
                                             <?php $all_languages=DB::table('languages')->get();?>
                                            <option selected="" value="">Select Language</option>
                                            @foreach($all_languages as $language)
                                            @if($language->id == $exhibition_data->lang_id)
                                            <option selected value="{{$language->id}}">{{$language->lang}}</option>
                                            @else
                                            <option value="{{$language->id}}">{{$language->name}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                </div>
                                
                                <div class="form-group row">

                                   <div class="col-sm-4">
                                        <label for="meta-keywords">Meta Key Words</label>
                                        <input  value="{{$exhibition_data->key_words}}" name="meta_keywords" type="text" class="form-control thresold-i form-control-info" placeholder="Exhibition Meta Key Words" maxlength="255" id='key'>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="fileinput-new thumbnail">Exhibition Photo

                                            <img id="photo_preview" src="{{url('/')}}/images/en/exhibitions/med/{{$exhibition_data->photo}}" alt="" width="200" />
                                          <input type="hidden" name="photoinput" value="{{$exhibition_data->photo}}" id="photoinput">

                                            <input id="photo_target" name="photo" type="file" name="file"  >
                                        </div>
                                        <br>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="fileinput-new thumbnail">Exhibition File

                                            <img id="file_preview" src="" alt="" width="200" />
                                            <input type="hidden" name="fileinput" value="{{$exhibition_data->file}}" id="fileinput">
                                            <input id="file_target" name="file" type="file" name="file" >
                                        </div>
                                        <br>
                                    </div>
                                   

                                   

                                </div>
                                <!-- Row start -->
                     

                               

                                <div class="form-group row">
                                
                                    <div class="col-sm-12">
                                        <label for="meta-keywords"> Exhibition Summary </label>
                                       
                                        <textarea id="editor" name="summary" class="form-control thresold-i form-control-info" placeholder="Exhibition Summary" rows="3" maxlength="255">{{$exhibition_data->summary}}</textarea>
                                    </div>
                                    
                                </div>

                                <div class="form-group row">
                                
                                    <div class="col-sm-12">
                                        <label for="meta-keywords">Exhibition content</label>
                                    
                                        <textarea id="editor1" name="content" class="form-control thresold-i form-control-info" placeholder="Exhibition Content Details" rows="5">{{$exhibition_data->content}}</textarea>
                                    </div>
                                    
                                </div>

                                
                                
                                </form>
                        
                        </fieldset>

<br></br>



                        <center><button class="btn btn-info btn-round" id="confirm">Update Translation Exhibition</button></center>
                                

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

  $("#language_id").prop("disabled", true);
});
</script>

 <script>
   CKEDITOR.config.extraPlugins = 'justify';
  CKEDITOR.config.extraPlugins = 'colorbutton';

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


    <script>


   $('#confirm').click(function() {
 

   formData = $('#firstform').serialize();



  $.post({

      headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    type: 'POST',
    url: 'Exhibition_editfirstform',
    data: formData,
     success: function(){

 var editor = CKEDITOR.instances['editor'].getData();
 var editor1 = CKEDITOR.instances['editor1'].getData();


     var file_data = $('#file_target').prop('files')[0];   
      var photo_data = $('#photo_target').prop('files')[0]; 
       // formsec = $('#secondform').serialize();
    var form_data = new FormData();                  
    form_data.append('file', file_data);
    form_data.append('photo', photo_data);
 form_data.append('name', $("#title").val());
  form_data.append('language_id', $("#language_id").val());
   form_data.append('meta_keywords', $("#key").val());
form_data.append('summary', editor);
form_data.append('content',editor1);
form_data.append('fileinput', $("#fileinput").val());
form_data.append('photoinput', $("#photoinput").val());
form_data.append('exhibition_id', $("#exhibition_id").val());
form_data.append('active', $("#active").val());

  $.ajax({
    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    type: 'POST',
    url: 'Exhibition_editseconendform',

    data: form_data,

          cache: false,
      contentType: false,
      processData: false,
     success: function(){
$('#myModal').modal('show'); 

      setTimeout(function(){// wait for 5 secs(2)
           location.reload(); // then reload the page.(3)
      }, 3000); 



     }

   });

    
  },
  error: function(){
   
  }
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