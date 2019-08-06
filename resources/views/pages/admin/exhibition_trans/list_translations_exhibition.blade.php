@extends('layouts.admin')
@section('title','Exhibition | Translations List')
@section('content')
<!-- Data Table Css -->
<link rel="stylesheet" type="text/css" href="{{asset('admin/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/assets/pages/data-table/css/buttons.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/bower_components/datatables.net-responsive-bs4/cs')}}s/responsive.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('admin/assets/pages/data-table/extensions/autofill/css/autoFill.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/assets/pages/data-table/extensions/autofill/css/select.dataTables.min.css')}}">

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
          text: 'Exhibition Now Is Active!',
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
          text: 'Exhibition Now Is Not Active!',
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
                                    <a class="navbar-brand">Exhibitions Section Translations</a>
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
                                                <a class="nav-link" href="{{route('Exhibition_add')}}">Add Exhibition</a>
                                            </li>
                                            <li class="nav-item active">
                                              <a class="nav-link">Translations <span
                                                        class="sr-only">(current)</span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{route('Exhibition_companies')}}">Exhibition Companies</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link " href="{{route('Exhibition_setting_update')}}">Setting</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link " href="{{route('Exhibition_categories')}}">Categories</a> 
                                            </li>
                                        </ul>
                                        
                                    </div>
                                </nav>
                        <!-- Default Navbar card end -->
                        <form id="list_exhibitions_form" method="post" action="{{route('Exhibition_list_translation')}}">
                        <div class="row">
                            <dir class="col-xl-3">
                                <!-- <label for="exhibition_id">Exhibition</label> -->
                                @csrf
                                <div class="col-sm-12 col-xl-12 m-b-30">
                                  <select class="js-example-basic-single col-sm-12" name="exhibition_id">
                                    <option selected="" value="">Select Exhibition</option>
                                      @foreach($all_exhibitions as $exhibition)
                                        @if($exhibition->id == $selected)
                                          <option selected="" value="{{$exhibition->id}}">{{$exhibition->name}}</option>
                                        @else
                                          <option value="{{$exhibition->id}}">{{$exhibition->name}}</option>
                                        @endif
                                      @endforeach
                                  </select>
                                </div>
                            </dir>

                            <dir class="col-xl-3">
                                <!-- <label for="exhibition_id">Exhibition</label> -->
                                <div class="col-sm-12 col-xl-12 m-b-30">
                                 <button id="list_btn" onclick="list_exhibition_function" class="btn btn-info">List</button>
                                </div>
                            </dir>
                          </form>

                      </div>
                           <hr>

                                <!-- Row start -->
                                <div class="row">
                                    <div class="col-lg-12 col-xl-12">
                                        
                                      <div class="card-block">
                                        <div class="dt-responsive table-responsive">
                                          <table id="key-intergration" class="table table-striped table-bordered nowrap">


                                            <thead>
                                                <tr>
                                                    <th>Exhibition Name</th>
                                                    <th>Summary</th>
                                                    <th>Content</th>
                                                    <th>Language</th>
                                                    <th>Status</th>
                                                    <th>Options</th>
                                                </tr>
                                            </thead>
                                            @foreach($all_exhibitions_trans as $exhibition_trans)
                                            <tr>
                                                <th>{{$exhibition_trans->exhibition_name}}</th>
                                                <th>{{$exhibition_trans->summary}}</th>
                                                <th>{{$exhibition_trans->content}}</th>
                                                <th>{{$exhibition_trans->name}}</th>
                                                @if($exhibition_trans->active == 1)
                                                <th class="text-info">Active</th>
                                                @else
                                                <th class="text-danger">Deactive</th>
                                                @endif
                                                <th>
                                                    <div class="dropdown-info dropdown open">
                                                        <button class="btn btn-info dropdown-toggle waves-effect waves-light " type="button" id="dropdown-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">options</button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                          
                                                          <a class="dropdown-item waves-light waves-effect" onclick="add_id('{{$exhibition_trans->exhibition_id}}')"  href="#">Add Translation</a>
                                                          
                                                          <a class="dropdown-item waves-light waves-effect btn" onclick="view_id('{{$exhibition_trans->exhibition_id}}','{{$exhibition_trans->lang_id}}')" href="#">View</a>

                                                          <!-- <a class="dropdown-item waves-light waves-effect" href="#">Translations</a> -->
                                                          <a class="dropdown-item waves-light waves-effect btn" onclick="edit_id('{{$exhibition_trans->exhibition_id}}')" href="#">Edit</a>
                                                          
                                                          @if($exhibition_trans->active == 1)
                                                            <!-- <a class="dropdown-item waves-light waves-effect text-danger" href="#">Deactivate</a> -->
                                                            <a class="dropdown-item waves-light waves-effect btn" onclick="active_id('{{$exhibition_trans->exhibition_id}}','{{$exhibition_trans->lang_id}}')" href="#">Deactive</a>
                                                          @else
                                                            <!-- <a class="dropdown-item waves-light waves-effect text-info" href="#">Activate</a> -->
                                                            <a class="dropdown-item waves-light waves-effect btn" onclick="active_id('{{$exhibition_trans->exhibition_id}}','{{$exhibition_trans->lang_id}}')" href="#">Active</a>
                                                          @endif
                                                          <!-- <a class="dropdown-item waves-light waves-effect" href="#">Delete</a> -->
                                                          <!-- Button trigger modal -->
                                                          <a onclick="get_id('{{$exhibition_trans->exhibition_id}},{{$exhibition_trans->lang_id}}')" class="dropdown-item waves-light waves-effect btn text-danger" data-toggle="modal" data-target="#exampleModal">
                                                            Delete Exhibition
                                                          </a>
                                                        </div>
                                                    </div>
                                                </th>
                                            </tr>
                                            @endforeach

                                            <tfoot>
                                                <tr>
                                                    <th>Exhibition Name</th>
                                                    <th>Summary</th>
                                                    <th>Content</th>
                                                    <th>Language</th>
                                                    <th>Status</th>
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

<div class="card-block">
                                
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
        <p>All Exhibition Translations Will Be <span class="text-danger"><b>Deleted</b></span> Also</p>
        <p>Confirm Exhibition <span class="text-danger"><b>Deleting</b></span> ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        <a id="delete_submit" class="waves-light waves-effect btn btn-info" data-dismiss="modal" href="#">Yes</a>
      </div>
    </div>
  </div>
</div>

<form id="add_form_id" action="{{route('Exhibition_add_translation')}}" method="post">
  @csrf
  <input type="hidden" style="diplay:none;" id="add_id" name="exhibition_id" value="">
</form>

<form id="edit_form_id" action="{{route('Exhibition_edit')}}" method="post">
  @csrf
  <input type="hidden" style="diplay:none;" id="edit_id" name="exhibition_id" value="">
</form>

<form id="delete_form_id" action="{{route('Exhibition_delete')}}" method="post">
  @csrf
  <input type="hidden" style="diplay:none;" id="exhibition_id" name="exhibition_id" value="">
</form>

<form id="view_form_id" action="{{route('Exhibition_view_translations')}}" method="post">
  @csrf
  <input type="hidden" style="diplay:none;" id="view_id" name="exhibition_id" value="">
  <input type="hidden" style="diplay:none;" id="view_lang_id" name="language_id" value="">
</form>

<form id="active_form_id" action="{{route('Exhibition_trans_active')}}" method="post">
  @csrf
  <input type="hidden" style="diplay:none;" id="active_id" name="exhibition_id" value="">
  <input type="hidden" style="diplay:none;" id="lang_id" name="lang_id" value="">
</form>


<script type="text/javascript">
  $(document).ready(function(){
    $('#delete_submit').click(function(){
      $('#delete_form_id').submit();
    });
  });

  function add_id(id){
    $('#add_id').val(id);
    $('#add_form_id').submit();
  }

  function active_id(id,lang){
    $('#active_id').val(id);
    $('#lang_id').val(lang);
    $('#active_form_id').submit();
  }

  function edit_id(id){
    $('#edit_id').val(id);
    $('#edit_form_id').submit();
  }

  function view_id(id,lang){
    $('#view_id').val(id);
    $('#view_lang_id').val(lang);
    $('#view_form_id').submit();
  }

</script>

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










<!-- **************************************************************************************** -->

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