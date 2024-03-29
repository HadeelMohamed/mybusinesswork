@extends('layouts.admin')
@section('title','Business Tips | Add Trans')
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


@if (session('Update_Sucess'))
<script type="text/javascript">
    $(document).ready(function(){
        Swal.fire({
          type: 'success',
          title: 'Success',
          text: 'Language Added Successfully!',
          confirmButtonText: 'Finish',
        })
         {{session()->forget('Update_Sucess')}}
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
                                    <a class="navbar-brand">Add Translation to Tips</a>
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
                                                <a class="nav-link" href="{{route('Tips_list')}}">All Business Tips </a>
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
        
  <legend style="width: fit-content;border: 0px;">Add Translation Data:</legend>

                               <form id="exhibition_form_add_main" action="{{route('Tips_addtrnsaltion')}}" method="post" enctype="multipart/form-data">
                                          {{ csrf_field() }}


                              <input type="hidden" name="blog_id" value="{{$blog_data->id}}">
                            
                                <!-- Row start -->
                                <div class="form-group row">
                                
                                    <div class="col-sm-4">
                                        <label for="title"> Title</label>
                                        <input id="title" name="title" type="text" value="" class="form-control thresold-i form-control-info" placeholder="Title" maxlength="100" value="{{old('title')}}" style="height: 50%;"required>
                                    </div>
                                    <div class="col-sm-12 col-xl-8 m-b-30">
<label for="title"> Content</label>
                                         <textarea type="text" id ="AddContent" class="form-control" id="inputAddContent" placeholder="Add Content" name="content" required ></textarea>
                                    </div>
                                    
                                </div>

                            
                                        <div class="form-group row">
                                
                                    <div class="col-sm-6">
                                       <?php $all_languages=DB::table('languages')->get();?>
                                        <label for="title">Language</label>
                                        <select class="selectsinglelang col-sm-12" name="language_id" required>
              
                                            <option selected="" value="">Select Language</option>
                                            @foreach($all_languages as $language)
                                          
                                            <option selected value="{{$language->id}}">{{$language->lang}}</option>
                                           @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-xl-6 m-b-30">
<label for="title"> Active</label>
<select  name="active"  style="width: 100%" required >

                          <option value="1"  {{ old('active') == 1 ? 'selected' : '' }}>
                          Active </option>
                          <option value="0" {{ old('active') == 0 ? 'selected' : '' }}>
                          Deactive </option>

                          </select>
                                         
                                    </div>
                                    
                                </div>

                               

                               

                                
                                <center><button class="btn btn-info btn-round">Add Transalted Blog</button></center>
                                </form>
                        
                        </fieldset>
                                
                                </div>
                                <!-- Row end -->
                             <fieldset style="    padding: .35em .625em .75em; margin: 0 2px; border: 1px solid silver;">
        
  <legend style="width: fit-content;border: 0px;">Translation:</legend>

<?php   $blogs =DB::table('blogs')->join('blog_trans','blog_id','=','blogs.id')->join('languages','languages.id','=','blog_trans.lang_id')
                     ->where('blogs.id',$blog_data->id)
                     ->select('languages.lang','blog_trans.title')
                    ->get();
                     ?>

 <table id="key-intergration" class="table table-striped table-bordered nowrap">


                                                                <thead>
                                                                    <tr>
                                                                        <th> Name</th>
                                                                        <th>language</th>
                                                                       
                                                                    </tr>
                                                                </thead>
                                                                @foreach($blogs as $blog)
                                                                <tr>
                                                                    <td>{{$blog->title}}</td>
                                                                    <td>{{$blog->lang}}</td>
                                                                   
                                                                       
                                                                              
                                                                              





                                                      

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