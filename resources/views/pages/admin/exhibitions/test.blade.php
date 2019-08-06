@extends('layouts.admin')
@section('title','Exhibition | Details')
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

@if (session('deleted_success'))
<script type="text/javascript">
    $(document).ready(function(){
        Swal.fire({
          type: 'success',
          title: 'Success',
          text: 'Exhibition Deleted Success!',
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
                                    <a class="navbar-brand">Exhibitions Section Details</a>
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
                                                <a class="nav-link">All Exhibitions <span
                                                        class="sr-only">(current)</span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{route('Exhibition_add')}}">Add Exhibition</a>
                                            </li>
                                            <li class="nav-item">
                                              <a class="nav-link" href="{{route('Exhibition_list_translation')}}">Translations <span class="sr-only"></span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{route('Exhibition_companies')}}">Exhibition Companies</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link " href="{{route('Exhibition_setting_update')}}">Setting</a> <!-- disabled -->
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link " href="{{route('Exhibition_categories')}}">Categories</a> 
                                            </li>
                                        </ul>
                                        
                                    </div>
                                </nav>
                        
                        <!-- Default Navbar card end -->

                                <!-- Row start -->
                                <div class="row">
                                    <div class="col-lg-12 col-xl-12">
                                        
                                                    <div class="card-block">
                                                        <div class="dt-responsive table-responsive">
                                                            <table id="key-intergration" class="table table-striped table-bordered nowrap">


                                                                <thead>
                                                                    <tr>
                                                                        <th>Company Name</th>
                                                                        <th>Start</th>
                                                                        <th>End</th>
                                                                        <th>Total</th>
                                                                        <th>Status</th>
                                                                        <th>Options</th>
                                                                    </tr>
                                                                </thead>
                                                                @foreach($all_exhibitions as $exhibition)
                                                                <tr>
                                                                    <td>{{$exhibition->name}}</td>
                                                                    <td>{{$exhibition->start}}</td>
                                                                    <td>{{$exhibition->end}}</td>
                                                                    <td>{{$exhibition->sub_scribe_limit}}</td>
                                                                    @if($exhibition->shown == 1)
                                                                    <td class="text-info">Active</td>
                                                                    @else
                                                                    <td class="text-danger">Deactive</td>
                                                                    @endif
                                                                    <td>
                                                                        <div class="dropdown-info dropdown open">
                                                                            <button class="btn btn-info dropdown-toggle waves-effect waves-light " type="button" id="dropdown-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">options</button>
                                                                            <div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                                              
                                                                                <a class="dropdown-item waves-light waves-effect" onclick="view_id('{{$exhibition->id}}')"  href="#">View</a>
                                                                                <form id="view_{{$exhibition->id}}" action="{{route('Exhibition_view')}}" method="post">
                                                                                @csrf
                                                                                <input type="hidden" name="exhibition_id" value="{{$exhibition->id}}">
                                                                                </form>
                                                                                <script type="text/javascript">
                                                                                  function view(view){
                                                                                    $('#view_{{$exhibition->id}}').submit();
                                                                                    // location.href = "{{url('/')}}/Admin/Exhibition_view";
                                                                                  }
                                                                                </script>
                                                                                <!-- <a class="dropdown-item waves-light waves-effect" href="#">Translations</a> -->
                                                                                <a class="dropdown-item waves-light waves-effect btn" onclick="edit_id('{{$exhibition->id}}')" href="#">Edit</a>
                                                                                
                                                                                @if($exhibition->shown == 1)
                                                                                  <!-- <a class="dropdown-item waves-light waves-effect text-danger" href="#">Deactivate</a> -->
                                                                                  <a class="dropdown-item waves-light waves-effect btn" onclick="active_id('{{$exhibition->id}}')" href="#">Deactive</a>
                                                                                @else
                                                                                  <!-- <a class="dropdown-item waves-light waves-effect text-info" href="#">Activate</a> -->
                                                                                  <a class="dropdown-item waves-light waves-effect btn" onclick="active_id('{{$exhibition->id}}')" href="#">Active</a>
                                                                                @endif
                                                                                <!-- <a class="dropdown-item waves-light waves-effect" href="#">Delete</a> -->
                                                                                <!-- Button trigger modal -->
                                                                                <a onclick="get_id('{{$exhibition->id}}')" class="dropdown-item waves-light waves-effect btn text-danger" data-toggle="modal" data-target="#exampleModal">
                                                                                  Delete Exhibition
                                                                                </a>

                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                @endforeach

                                                                <tfoot>
                                                                    <tr>
                                                                        <th>Company Name</th>
                                                                        <th>Start</th>
                                                                        <th>End</th>
                                                                        <th>Total</th>
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

<form id="edit_form_id" action="{{route('Exhibition_edit')}}" method="post">
  @csrf
  <input type="hidden" style="diplay:none;" id="edit_id" name="exhibition_id" value="">
</form>

<form id="delete_form_id" action="{{route('Exhibition_delete')}}" method="post">
  @csrf
  <input type="hidden" style="diplay:none;" id="exhibition_id" name="exhibition_id" value="">
</form>

<form id="view_form_id" action="{{route('Exhibition_view')}}" method="post">
  @csrf
  <input type="hidden" style="diplay:none;" id="view_id" name="exhibition_id" value="">
</form>

<form id="active_form_id" action="{{route('Exhibition_active')}}" method="post">
  @csrf
  <input type="hidden" style="diplay:none;" id="active_id" name="exhibition_id" value="">
</form>


<script type="text/javascript">
  $(document).ready(function(){
    $('#delete_submit').click(function(){
      $('#delete_form_id').submit();
    });
  });

  function get_id(id){
    $('#exhibition_id').val(id);
  }

  function edit_id(id){
    $('#edit_id').val(id);
    $('#edit_form_id').submit();
  }

  function view_id(id){
    $('#view_id').val(id);
    $('#view_form_id').submit();
  }

  function active_id(id){
    $('#active_id').val(id);
    $('#active_form_id').submit();
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


@endsection