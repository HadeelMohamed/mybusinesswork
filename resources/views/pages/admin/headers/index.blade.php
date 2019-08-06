@extends('layouts.admin')
@section('title','Headers | View')
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





<!-- Page body start -->
            <div class="page-body">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Bootstrap tab card start -->
                        <div class="card">
                            <div class="card-block">
                                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                                    <a class="navbar-brand">Headers Section  View</a>
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
                                                <a class="nav-link">All Headers <span
                                                        class="sr-only">(current)</span></a>
                                            </li>
                                          
                                        </ul>
                                        
                                    </div>
                                </nav>
                        </br>
                        <!-- Default Navbar card end -->
<a  class="btn buttonadd " data-toggle="modal" data-target="#AddModal">Add Header</a>
                                <!-- Row start -->
                                <div class="row">
                                    <div class="col-lg-12 col-xl-12">
                                        
                                                    <div class="card-block">
                                                        <div class="dt-responsive table-responsive">
                                                            <table id="key-intergration" class="table table-striped table-bordered nowrap">


                                                                <thead>
                                                                    <tr>
                                                                        <th>Header Name</th>
                                                                        <th>language</th>
                                                                           <th>Submenu</th>
                                                                        <th>Show</th>
                                                                        <th>Options</th>
                                                                    </tr>
                                                                </thead>
                                                                @foreach($all_headers as $header)
                                                                <tr>
                                                                    <td>{{$header->name}}</td>
                                                                    <td>{{$header->lang}}</td>
<?php     $sub_headers = DB::table('menus_front')
->where('id',$header->id)
                    ->where('parentsid','!=',Null)->select('menus_front.*')
                   ->get(); 
                   var_dump( $sub_headers);
                   ?>

                   @if( count($sub_headers) > 0)
@foreach($sub_headers as $sub_header)
<td>{{$sub_header->name}}</td>

@endforeach
                   @else
                                                                     <td>No Sub menu</td>

                                                                     @endif
                                                                    @if($header->show == 1)
                                                                    <td class="text-info">Show</td>
                                                                    @else
                                                                    <td class="text-danger">Hide</td>
                                                                    @endif
                                                                    <td>
                                                                        <div class="dropdown-info dropdown open">
                                                                            <button class="btn btn-info dropdown-toggle waves-effect waves-light " type="button" id="dropdown-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">options</button>
                                                                            <div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                                              
                                                                              

                                                                               <a  class="dropdown-item waves-light waves-effect btn " data-toggle="modal" data-target="#EditModal_{{$header->id}}">
                                                                                 Edit
                                                                                </a>




                                                                                @if($header->show == 1)
                                                                                  <!-- <a class="dropdown-item waves-light waves-effect text-danger" href="#">Deactivate</a> -->
                                                                                  <a class="dropdown-item waves-light waves-effect btn" onclick="active_id('{{$header->id}}')" href="#">Deactive</a>
                                                                                @else
                                                                                  <!-- <a class="dropdown-item waves-light waves-effect text-info" href="#">Activate</a> -->
                                                                                  <a class="dropdown-item waves-light waves-effect btn" onclick="active_id('{{$header->id}}')" href="#">Active</a>
                                                                                @endif
                                                                                <!-- <a class="dropdown-item waves-light waves-effect" href="#">Delete</a> -->
                                                                                <!-- Button trigger modal -->
                                                           <a onclick="get_id('{{$header->id}}')" class="dropdown-item waves-light waves-effect btn text-danger" data-toggle="modal" data-target="#exampleModal">
                                                                                  Delete Country
                                                                                </a>

                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                       </tr>
                                                        <!--    edit modal    -->  


  

                                                                @endforeach

                                                                <tfoot>
                                                                    <tr>
                                                                           <th>Header Name</th>
                                                                        <th>language</th>
                                                                        <th>Show</th>
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
        <p>Confirm Country <span class="text-danger"><b>Deleting</b></span> ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        <a id="delete_submit" class="waves-light waves-effect btn btn-info" data-dismiss="modal" href="#">Yes</a>
      </div>
    </div>
  </div>
</div>


                <!-- Modal HTML -->




<form id="delete_form_id" action="{{route('Country_delete')}}" method="post">
  @csrf
  <input type="hidden" style="diplay:none;" id="country_id" name="country_id" value="">
</form>



<form id="active_form_id" action="{{route('Country_active')}}" method="post">
  @csrf
  <input type="hidden" style="diplay:none;" id="active_id" name="country_id" value="">
</form>
<!--  add country modal -->


    <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="AddModal" aria-hidden="true" class="AddModal">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Add Header</h4>
                <button type="button" class="close " data-dismiss="modal" id ="custom-close" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
        

                <form  action="{{route('Country_add')}}" method="post" id="modal-form">
                  @csrf
                <div class="modal-body mx-3">
                
                  <div class="form-group row">
                  <label for="inputCountryName" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                  <input type="text" id ="AddName" class="form-control" id="inputCountryName" placeholder="Country Name" name="name" value="{{ old('name') }}">
                  </div>
                  </div>
                  <div class="form-group row">
                  <label for="inputCodeName" class="col-sm-2 col-form-label">Language</label>
                  <div class="col-sm-10">
                  <input type="text" id ="AddCode" class="form-control" id="inputCodeName" placeholder="Code" name="code" value="{{ old('name') }}">
                  </div>
                  </div>

                  <div class="form-group row">
                  <label for="inputActive" class="col-sm-2 col-form-label">Show</label>
                  <div class="col-sm-10">
                  <select  name="active"  style="width: 100%" id="Country">
                 
              <option value="1"  {{ old('active') == 1 ? 'selected' : '' }}>
    Active </option>
<option value="0" {{ old('active') == 0 ? 'selected' : '' }}>
    Deactive </option>
                  
                </select>
                  </div>
                  </div>

                </div>
                <span class='error' ></span>
                <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-indigo">Add <i class="fas fa-paper-plane-o ml-1"></i></button>
                </div>
                </form>
              

                </div>
                  </div>


<script type="text/javascript">
  $(document).ready(function(){
    $('#delete_submit').click(function(){
      $('#delete_form_id').submit();
    });
  });

  function get_id(id){
    $('#country_id').val(id);
  }

  function edit_id(id){
    $('#edit_id').val(id);
    //$('#edit_form_id').submit();
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