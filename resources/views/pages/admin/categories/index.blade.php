@extends('layouts.admin')
@section('title','Categories | View')
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

<!-- error message of add modal -->
@if(!empty(Session::get('addmsg')))
<script>
    $(document).ready(function(){   

    $('#AddModal').modal('show');

    $('#AddModal').find('.modal-body').append('<p id="dangermsgadd"><span class="text-danger"><b>Category is already existed</b></span></p>');


 $('#AddModal').on('hide.bs.modal', function (event) {
   document.getElementById("dangermsgadd").innerHTML = "";

   $('#AddName', this).val('');
      $('#AddCode', this).val('');




});


});
</script>
@endif




<!-- error message of edit modal -->
@if(!empty(Session::get('msg')))
<script>
    $(document).ready(function(){   

    $('#EditModal').modal('show');

    $('#EditModal').find('.modal-body').append('<p id="dangermsg"><span class="text"><b>Nothing To Update</b></span></p>');

   

 $('#EditModal').on('hide.bs.modal', function(){

document.getElementById("dangermsg").innerHTML = "";

});
});
</script>
@endif



<!-- error message of edit modal -->
@if(!empty(Session::get('Alreadymsg')))
{{Session::get('Alreadymsg')}}
<script>
    $(document).ready(function(){   

    $('#EditModal').modal('show');

    $('#EditModal').find('.modal-body').append('<p id="dangermsg"><span class="text"><b>Recored Already Existed</b></span></p>');

     $('#edit_id').val();

 $('#EditModal').on('hide.bs.modal', function(){

document.getElementById("dangermsg").innerHTML = "";

});
});
</script>
@endif


@if (session('add_success'))
<script type="text/javascript">
    $(document).ready(function(){
        Swal.fire({
          type: 'success',
          title: 'Success',
          text: 'Category Added Success!',
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
          text: 'Category Now Is Active!',
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
          text: 'Category Deleted Success!',
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
          text: 'Category Updated Success!',
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
                                    <a class="navbar-brand">Categories Section  View</a>
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
                                                <a class="nav-link">All Categories <span
                                                        class="sr-only">(current)</span></a>
                                            </li>
                                       
                                        </ul>
                                        
                                    </div>
                                </nav>
                        </br>
                        <!-- Default Navbar card end -->
<a  class="btn buttonadd " data-toggle="modal" data-target="#AddModal">Add Categories</a>
                                <!-- Row start -->
                                <div class="row">
                                    <div class="col-lg-12 col-xl-12">
                                        
                                                    <div class="card-block">
                                                        <div class="dt-responsive table-responsive">
                                                            <table class="table table-striped table-bordered nowrap Category">


                                                                <thead>
                                                                    <tr>
                                                                        <th>Categories Name</th>
                                                                        <th>Language</th>
                                                                        <th>Active</th>
                                                                        <th>Options</th>
                                                                    </tr>
                                                                </thead>
                                           

                                                                <tfoot>
                                                                    <tr>
                                                                       <th>Categories Name</th>
                                                                        <th>Language</th>
                                                                        <th>Active</th>
                                                                        <th>Options</th>
                                                                    </tr>
                                                                </tfoot>

                                                            </table>

                                                            <!-- Modal -->
<div class="modal fade"  id="EditModal" tabindex="-1" role="dialog" aria-labelledby="EditModal" aria-hidden="true" class="EditModal">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Edit Category</h4>
                <button type="button" class="close " data-dismiss="modal" id ="custom-close" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
            

               <form  action="{{route('Category_edit')}}" method="post" id="Editmodal-form">

                <input type="hidden" name="catid">
                 @csrf
                <div class="modal-body mx-3">
                
                  <div class="form-group row">
                  <label for="inputCategoryName" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control"  placeholder="Category Name" value="{{ old('activityname') }}" name="activityname" >
                  </div>
                  </div>

                       <div class="form-group row">
                  <label for="inputCodeName" class="col-sm-2 col-form-label">Languages</label>
                  <div class="col-sm-10">
                    <select   style="width: 100%" id="languages" name="languageedit">
                    <?php $languages=DB::table('languages')->get();?>
            @foreach( $languages as $language)
                             <option id="{{$language->id}}" name='languageeditop' {{ old('languageedit') ==$language->name ? 'selected' : '' }}>{{ $language->name }}</option>

              @endforeach
          </select>
                  </div>
                  </div>

                        <div class="form-group row">
                  <label for="inputActive" class="col-sm-2 col-form-label">Active</label>
                  <div class="col-sm-10">
                  <select  name="activeedit"  style="width: 100%" >
                  <option  value='1'{{ old('activeedit') == 1 ? 'selected' : '' }} id="acop" > Active </option>
                  <option    value='0' {{ old('activeedit') == 0 ? 'selected' : '' }} id=deacop> Deactive </option>
                  
                </select>
                  </div>
                  </div>
              

                </div>
               
                <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-indigo">Update <i class="fas fa-paper-plane-o ml-1"></i></button>
                </div>
                </form>
              

                </div>
                  </div> 

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

            <!--  add category modal -->


    <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="AddModal" aria-hidden="true" class="AddModal">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Add Category</h4>
                <button type="button" class="close " data-dismiss="modal" id ="custom-close" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>


                <form  action="{{route('Category_add')}}" method="post" id="modal-form">
                  @csrf
                <div class="modal-body mx-3">
                
                  <div class="form-group row">
                  <label for="inputCategoryName" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                  <input type="text" id ="AddName" class="form-control" id="inputCategoryName" placeholder="Category Name" name="name" value="{{ old('name') }}">
                  </div>
                  </div>
                  <div class="form-group row">
                  <label for="inputCodeName" class="col-sm-2 col-form-label">Languages</label>
                  <div class="col-sm-10">
                  	<select  name="languages"  style="width: 100%" id="languages">
                  	<?php $languages=DB::table('languages')->get();?>
            @foreach( $languages as $language)
                             <option value="{{$language->id}}" >{{ $language->name }}</option>

              @endforeach
          </select>
                  </div>
                  </div>

                  <div class="form-group row">
                  <label for="inputActive" class="col-sm-2 col-form-label">Active</label>
                  <div class="col-sm-10">
                  <select  name="active"  style="width: 100%" id="active">
                 
              <option value="1"  {{ old('active') == 1 ? 'selected' : '' }}>
    Active </option>
<option value="0" {{ old('active') == 0? 'selected' : '' }}>
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
        <p>Confirm Category <span class="text-danger"><b>Deleting</b></span> ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        <a id="delete_submit" class="waves-light waves-effect btn btn-info" data-dismiss="modal" href="#">Yes</a>
      </div>
    </div>
  </div>
</div>


                <!-- Modal HTML -->




<form id="delete_form_id" action="{{route('Category_delete')}}" method="post">
  @csrf
  <input type="hidden" style="diplay:none;" id="category_id" name="category_id" value="">
 <input type="hidden" style="diplay:none;" id="langcategory_id" name="langcategory_id" value="">
</form>



<form id="active_form_id" action="{{route('Category_active')}}" method="post">
  @csrf
 <input type="hidden" style="diplay:none;" id="activecategory_id" name="category_id" value="">
 <input type="hidden" style="diplay:none;" id="activelangcategory_id" name="langcategory_id" value="">
</form>





                  <script>
    $(document).ready(function () {
        $('.Category').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
                     "url": "{{ url('Categories_all') }}",
                     "dataType": "json",
                     "type": "POST",
                     "data":{ _token: "{{csrf_token()}}"}
                   },
            "columns": [
                { "data": "Category Name" },
                { "data": "Language" },
                { "data": "Active" },
                { "data": "Options" }
            ]

        });
    });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#key-intergration thead tr').clone(true).appendTo( '#key-intergration thead' );
    $('#key-intergration thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();

        
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );
 
    
} );
                    
                  </script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#delete_submit').click(function(){
      $('#delete_form_id').submit();
    });

    $('#EditModal').on('show.bs.modal', function (e) {
  // get information to update quickly to modal view as loading begins
  var opener=e.relatedTarget;//this holds the element who called the modal
   
   //we get details from attributes
  var activityname=$(opener).attr('activity-name');
 var lang=$(opener).attr('lang-id');
 var active=$(opener).attr('active-id');
 var catid=$(opener).attr('catid');

//set what we got to our form
  $('#Editmodal-form').find('[name="activityname"]').val(activityname);
  $('#Editmodal-form').find('[name="lang"]').val(lang);
   $('#Editmodal-form').find('[name="activeedit"]').val(active);
   $('#Editmodal-form').find('[name="catid"]').val(catid);


     document.getElementById(lang).selected=true;



   
});
  });

  function get_id(id,langid){
  
    $('#category_id').val(id);
    $('#langcategory_id').val(langid);
  }

  function edit_id(id){
    $('#edit_id').val(id);
    //$('#edit_form_id').submit();
  }

  // function view_id(id){
  //   $('#view_id').val(id);
  //   $('#view_form_id').submit();
  // }

  function active_id(id,langid){
     $('#activecategory_id').val(id);
    $('#activelangcategory_id').val(langid);
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