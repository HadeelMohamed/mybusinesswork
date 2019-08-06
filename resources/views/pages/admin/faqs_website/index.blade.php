@extends('layouts.admin')
@section('title','Faqs | View')
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




@if (session('Update_Sucess'))
<script type="text/javascript">
    $(document).ready(function(){
        Swal.fire({
          type: 'success',
          title: 'Success',
          text: 'Faq Update Success!',
          confirmButtonText: 'Finish',
        })

    });
</script>
@endif


@if (session('questionupdated_success'))
<script type="text/javascript">
    $(document).ready(function(){
        Swal.fire({
          type: 'success',
          title: 'Success',
          text: 'Question Update Success!',
          confirmButtonText: 'Finish',
        })

    });
</script>
@endif



@if (session('deleted_success'))
<script type="text/javascript">
    $(document).ready(function(){
        Swal.fire({
          type: 'success',
          title: 'Success',
          text: 'Faq Delete Success!',
          confirmButtonText: 'Finish',
        })

    });
</script>
@endif


@if (session('questionadd_success'))
<script type="text/javascript">
    $(document).ready(function(){
        Swal.fire({
          type: 'success',
          title: 'Success',
          text: 'Question Added Success!',
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
                                    <a class="navbar-brand">Faqs Section  View</a>
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
                                            <li class="nav-item active">
                                                <a class="nav-link">All Faqs <span
                                                        class="sr-only">(current)</span></a>
                                            </li>
                                          
                                        </ul>
                                        
                                    </div>
                                </nav>
                        </br>
                        <!-- Default Navbar card end -->
                                <!-- Row start -->


                                         <table id="faqs" class="table table-striped table-bordered nowrap">


                                                                <thead>
                                                                    <tr>
                                                                        <th>Title</th>
                                                                        <th>Options</th>
                                                                        
                                                                    </tr>
                                                                </thead>
                                                               
                                                                <tr>

                                                                  <td>{{$all_faqs->title}}</td>
                                                                  <td>         <div class="dropdown-info dropdown open">
                                                                            <button class="btn btn-info dropdown-toggle waves-effect waves-light " type="button" id="dropdown-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">options</button>
                                                                            <div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">


                                                                               <a  class="dropdown-item waves-light waves-effect btn " onclick="edit_id('{{$all_faqs->id}}')" class="dropdown-item waves-light waves-effect btn" >
                                                                                 Edit 
                                                             
                                                                                      </a>


                                                                                
                                                          

                                                                            </div>
                                                                        </div></td>
                                                                  
                                                       </tr>
                                                        <!--    edit modal    -->  


   


                                                                

                                                            </table>

<legend>Faq Questions</legend>

<a  class="btn buttonadd " onclick="add_id('{{$all_faqs->id}}','{{$all_faqs->lang_id}}')">Add Questions</a>


                                <div class="row">
                                    <div class="col-lg-12 col-xl-12">
                                        
                                                    <div class="card-block">
                                                        <div class="dt-responsive table-responsive">
                                                            <table id="key-intergration" class="table table-striped table-bordered nowrap">


                                                                <thead>
                                                                    <tr>
                                                                        <th>Question Title</th>
                                                                        <th>Content</th>
                                                                        <th>Options</th>
                                                                    </tr>
                                                                </thead>
                                                               @foreach($all_faqs->question as $question)
                                                                <tr>

                                                                           <td>{{$question->title}}</td>

                                                                            <td> {!!str_limit($question->content,50) !!}</td>
                                                                  <td>  <div class="dropdown-info dropdown open">
                                                                            <button class="btn btn-info dropdown-toggle waves-effect waves-light " type="button" id="dropdown-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">options</button>
                                                                            <div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                                              
                                                                              

                          <a  class="dropdown-item waves-light waves-effect btn " onclick="questionedit_id('{{$question->id}}')" class="dropdown-item waves-light waves-effect btn" >
                     Edit 

                          </a>

                                                                                <a onclick="get_id('{{$question->id}}')" class="dropdown-item waves-light waves-effect btn text-danger" data-toggle="modal" data-target="#exampleModal">
                                                                                  Delete Question
                                                                                </a>




                                                                                
                                                          

                                                                            </div>
                                                                        </div></td>
                                                                  
                                                       </tr>
                                                        <!--    edit modal    -->  


   @endforeach


                                                                <tfoot>
                                                                    <tr>
                                                                         <th>Question Title</th>
                                                                        <th>Content</th>
                                                                        <th>Options</th>
                                                                    </tr>
                                                                </tfoot>

                                                            </table>

                                                        </div>
                                                    </div>
                                           
                                            
                                           
                                    </div>
                                    
                                </div>
                                <!-- Row end -->
                            </div>
                        </div>
                        <!-- Bootstrap tab card end -->
                    </div>
                </div>
                
            </div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Confirm Faq <span class="text-danger"><b>Deleting</b></span> ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        <a id="delete_submit" class="waves-light waves-effect btn btn-info" data-dismiss="modal" href="#">Yes</a>
      </div>
    </div>
  </div>
</div>


<form id="delete_form_id" action="{{route('Faq_delete')}}" method="post">
  @csrf
  <input type="hidden" style="diplay:none;" id="faq_iddelete" name="faq_iddelete" value="">
   

</form>

<form id="faq_form_id" action="{{route('Faq_edit')}}" method="post">
  @csrf
  <input type="hidden" style="diplay:none;" id="faq_id" name="faq_id" value="">
</form>

<form id="faq_idaddform" action="{{route('QuestionFaq_add')}}" method="post">
  @csrf
  <input type="hidden" style="diplay:none;" id="faq_idadd" name="faq_idadd" value="">
    <input type="hidden" style="diplay:none;" id="faq_idaddlang" name="faq_idaddlang" value="">
</form>

<form id="faq_idquestionform" action="{{route('QuestionFaq_edit')}}" method="post">
  @csrf
  <input type="hidden" style="diplay:none;" id="faq_idquestion" name="faq_idquestion" value="">
</form>

<script type="text/javascript">
   $(document).ready(function() {
   $('#faqs').dataTable({
       "bInfo" : false,
       "bPaginate": false,
   });

   });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#delete_submit').click(function(){
      $('#delete_form_id').submit();
    });
  });
</script>

  <script type="text/javascript">
  function get_id(id){
    $('#faq_iddelete').val(id);
   
  }

    function add_id(id,lang){
    
    $('#faq_idadd').val(id);
    $('#faq_idaddlang').val(lang);
      $('#faq_idaddform').submit();

   
  }


      function questionedit_id(id){
    
    $('#faq_idquestion').val(id);
      $('#faq_idquestionform').submit();

   
  }


    function edit_id(id){
    $('#faq_id').val(id);
    $('#faq_form_id').submit();
  }
</script>
                <!-- Modal HTML -->




<!-- Custom js -->
<script type="text/javascript" src="{{asset('admin/bower_components/jquery/js/jquery.min.js')}}"></script>
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