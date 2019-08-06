@extends('layouts.admin')
@section('title','Message | View')
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









<!-- Page body start -->
            <div class="page-body">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Bootstrap tab card start -->
                        <div class="card">
                            <div class="card-block">
                                  <nav class="navbar navbar-expand-lg navbar-light bg-light">
                                    <a class="navbar-brand">Messages Section View</a>
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
                                                <a class="nav-link" href="{{route('Exhibition_list')}}">All Messages </a>
                                            </li>
                                           
                                            
                                        </ul>
                                        
                                    </div>
                                </nav>
                        <br>
                            
                                


                            
                       
                            <!-- Default Navbar card end -->
                         
                                @csrf
                                    

                              

                                <!-- Row start -->
                          

                                <div class="form-group row">
                                    
                                    <div class="col-sm-4">
                                        <label for="Name">Name</label>
                                        <input id="Name" type="text" class="form-control form-control-info" placeholder="Name" name="Name" value="{{$Message_view->name}}">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="phone">phone</label>
                                        <input id="phone" type="text" class="form-control form-control-info" placeholder="phone" name="phone" value="{{$Message_view->phone}}">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="Email">Email</label>
                                        <input id="Email" type="text" class="form-control form-control-info" name="email" value="{{$Message_view->email}}">
                                    </div>
                                   
                                    
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                       <label for="ip_addrerss">Ip Adrees</label>

                                          <input id="ip_addrerss" type="text" class="form-control form-control-info" name="ip_addrerss" value="{{$Message_view->ip_addrerss}}">
                                        </div>
                                        <br>
                                   
                                    <div class="col-sm-4">
                                        <label for="Date">Date</label>

                                          <input id="created_at" type="text" class="form-control form-control-info" name="created_at" value="{{$Message_view->created_at}}">
                                        </div>
                                        <br>
                                   
                                    <div class="col-sm-4">
                                        <label for="status">Status</label>

                                        @if($Message_view->status=0)
                                        <input id="status" name="status" type="text" name="status" class="form-control form-control-info" value="New">

                                        @else

                                          <input id="status" name="status" type="text" name="status" class="form-control form-control-info" value="Read">
                                        @endif
                                    </div>

                                    
                                </div>
                                <!-- Row start -->
                                <div class="form-group row">
                                
                                    <div class="col-sm-12">
                                        <label for="title">Message subject</label> 
                                        <input id="subject" name="subject" type="text" value="{{$Message_view->subject}}" class="form-control thresold-i form-control-info" placeholder="subject" maxlength="100" >
                                    </div>
                                    
                                    
                                </div>

                            


                                <div class="form-group row">
                                
                                    <div class="col-sm-12">
                                        <label for="meta-keywords"> Message Content</label>
                                       
                                        <textarea  name="content" class="form-control thresold-i form-control-info" placeholder="Message Content" rows="5">{{$Message_view->message}}</textarea>
                                    </div>
                                    
                                </div>


                          

                                <center><input action="action" onclick="window.history.go(-1); return false;"  class="btn btn-info btn-round" type="button" value="Back" /></center>
                              
                        
                        
                                
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