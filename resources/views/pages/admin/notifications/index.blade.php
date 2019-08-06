@extends('layouts.admin')
@section('title','Send Notification | View')
@section('content')
<!-- Data Table Css -->
<link rel="stylesheet" type="text/css" href="{{asset('admin/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/assets/pages/data-table/css/buttons.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/bower_components/datatables.net-responsive-bs4/cs')}}s/responsive.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('admin/assets/pages/data-table/extensions/autofill/css/autoFill.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/assets/pages/data-table/extensions/autofill/css/select.dataTables.min.css')}}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="{{asset('admin/assets/js/sweetalert.min.js')}}"></script>
<script src="{{asset('admin/assets/js/sweetalert2@8.js')}}"></script>
<style type="text/css"> .buttonadd {background-color: #e7e7e7; color: black;}</style>


<link rel="stylesheet" type="text/css" href="{{asset('admin/bower_components/select2/css/select2.min.css')}}">

 <script src="{{asset('admin/bower_components/ckeditor/ckeditor.js')}}"></script>

<!-- error message of add modal -->

<!-- Page body start -->

<style type="text/css">
	.select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #354052;
}
</style>



	

@if (session('message_sent'))
<script type="text/javascript">
    $(document).ready(function(){
        Swal.fire({
          type: 'success',
          title: 'Success',
          text: 'Message Sent !',
          confirmButtonText: 'Finish',
        })

    });
</script>
@endif

            <div class="page-body">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Bootstrap tab card start -->
                        <div class="card">
                            <div class="card-block">
                                  <nav class="navbar navbar-expand-lg navbar-light bg-light">
                                    <a class="navbar-brand">Send Notification Section View</a>
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
                                            
                                           
                                            
                                        </ul>
                                        
                                    </div>
                                </nav>
                        <br>
                            
                                


                            
                       
                            <!-- Default Navbar card end -->
                         
                             
                                    

              
  <form id="exhibition_form_add_main" action="{{route('Notification_send')}}" method="post" enctype="multipart/form-data">

  	                                          {{ csrf_field() }}                        <!-- Row start -->

                                <!-- Row start -->
                                <div class="row">
                                    
                                    <div class="col-sm-12 col-xl-12 m-b-30">
                                    	   <label for="start_date">Select Users</label>

                                    	   <?php  $all_users = DB::table('users')->where('deleted',0)->orderBy('email', 'desc')->get(); ?>

									<select class="js-example-basic-multiple" name="users[]" multiple="multiple" required="">


								
                                            
                                            @foreach($all_users as $user)
                                           
                                            <option value="{{$user->id}}">{{$user->email}}-{{$user->id}}</option>
                                           
                                            @endforeach
															
															</select>
                               
                                    </div>


                                                  <div class="col-sm-12 col-xl-12 m-b-30">
                                    	   <label for="start_date"> Title Message</label>
                                       <input id="Title" type="text" class="form-control form-control-info" name="title" value="" required="">

                                    	
                               
                                    </div>

                          
                                    
                              
                                                                                    <div class="col-sm-12 col-xl-12 m-b-30">
                                    	  
                                      <textarea id="editor" placeholder="Write down your message" cols="40" rows="6" style="width: 100%;" name="message" required=""></textarea>

                                    	
                               
                                    </div>


                                </div>

          
                              
            
                                <!-- Row start -->
  



              

                          


                          

                                  <center><button class="btn btn-info btn-round" id="confirm">Send</button></center>
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

    function matchStart (term, text) {
  if (text.toUpperCase().indexOf(term.toUpperCase()) == 0) {
    return true;
  }
 
  return false;
}
 
$.fn.select2.amd.require(['select2/compat/matcher'], function (oldMatcher) {
  $(".js-example-basic-multiple").select2({
    matcher: oldMatcher(matchStart)
  })
});


     
});
</script>


 <script>
   CKEDITOR.config.extraPlugins = 'justify';
  CKEDITOR.replace( 'editor' );

  </script>

   




<!-- Custom js -->

<script type="text/javascript" src="{{asset('admin/bower_components/jquery/js/jquery.min.js')}}"></script>
<script src="{{asset('admin/bower_components/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('admin/bower_components/jquery-ui/js/jquery-ui.min.js')}}"></script>
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


@endsection