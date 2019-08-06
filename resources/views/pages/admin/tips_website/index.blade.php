@extends('layouts.admin')
@section('title','Business Tips | View')
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
<style type="text/css">/*** CUSTOM FILE INPUT STYE ***/
.wrap-custom-file{
  position: relative;
  display: inline-block;
  width: 150px;
  height: 150px;
  margin: 0 0.5rem 1rem;
  text-align: center;
  input[type="file"]{
    position: absolute;
    top: 0;
    left: 0;
    width: 2px;
    height: 2px;
    overflow: hidden;
    opacity:0;
  }
  label{
    z-index: 1;
    position: absolute;
    left:0; top: 0; bottom: 0; right: 0;
    width: 100%;
    overflow: hidden;
    padding: 0 0.5rem;
    cursor: pointer;
    background-color: #fff;
    border-radius: 4px;
    -webkit-transition: -webkit-transform 0.4s;
    -moz-transition: -moz-transform 0.4s;
    -ms-transition: -ms-transform 0.4s;
    -o-transition: -o-transform 0.4s;
    transition: transform 0.4s;
    span{ 
      display: block;
      margin-top: 2rem;
      font-size: 1.4rem;
      color: #777;
      -webkit-transition: color 0.4s;
      -moz-transition: color 0.4s;
      -ms-transition: color 0.4s;
      -o-transition: color 0.4s;
      transition: color 0.4s;
    }
    .fa{
      position: absolute;
      bottom: 1rem;
      left: 50%;
      -webkit-transform: translatex(-50%);
      -moz-transform: translatex(-50%);
      -ms-transform: translatex(-50%);
      -o-transform: translatex(-50%);
      transform: translatex(-50%);
      font-size: 1.5rem;
      color: lightcoral;
      -webkit-transition: color 0.4s;
      -moz-transition: color 0.4s;
      -ms-transition: color 0.4s;
      -o-transition: color 0.4s;
      transition: color 0.4s;
    }
    &:hover{
      -webkit-transform: translateY(-1rem);
      -moz-transform: translateY(-1rem);
      -ms-transform: translateY(-1rem);
      -o-transform: translateY(-1rem);
      transform: translateY(-1rem);
      span, .fa{
        color: #333;
      }
    }
    &.file-ok{
      //Styles img background
      background-size: cover;
      background-position: center;
      span{
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        padding: 0.3rem;
        font-size: 1.1rem;
        color: #000;
        background-color: rgba(255,255,255,.7);
      }
      .fa{
        display: none;
      }
    }
  }
}</style>
<!-- error message of add modal -->
@if(!empty(Session::get('addmsg')))
<script>
    $(document).ready(function(){   

    $('#AddModal').modal('show');

    $('#AddModal').find('.modal-body').append('<p id="dangermsgadd"><span class="text-danger"><b>There is somtheing wrong in name or code</b></span></p>');


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


    $('#EditModal_{{Session::get('countryid')}}').modal('show');

    $('#EditModal_{{Session::get('countryid')}}').find('.modal-body').append('<p id="dangermsg"><span class="text-danger"><b>There is something wrong in name or code</b></span></p>');

   

 $('#EditModal_{{Session::get('countryid')}}').on('hide.bs.modal', function(){

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
          text: 'Country Added Success!',
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
          text: 'Country Now Is Active!',
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
          text: 'Tip Deleted Success!',
          confirmButtonText: 'Finish',
        })

    });
</script>
@endif

@if (session('update_sucess'))
<script type="text/javascript">
    $(document).ready(function(){
        Swal.fire({
          type: 'success',
          title: 'Success',
          text: 'Feature Updated Successfully!',
          confirmButtonText: 'Finish',
        })
         {{session()->forget('updated_success')}}
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
                                    <a class="navbar-brand">Business Tips Section  View</a>
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
                                                <a class="nav-link">All Business Tips <span
                                                        class="sr-only">(current)</span></a>
                                            </li>
                                          
                                        </ul>
                                        
                                    </div>
                                </nav>
                        </br>
                        <!-- Default Navbar card end -->
<a  class="btn buttonadd " href="{{route('Tips_addpaage')}}">Add Tip</a>
                                <!-- Row start -->
                                <div class="row">
                                    <div class="col-lg-12 col-xl-12">
                                        
                                                    <div class="card-block">
                                                        <div class="dt-responsive table-responsive">
                                                            <table id="key-intergration" class="table table-striped table-bordered nowrap">


                                                                <thead>
                                                                    <tr>
                                                                        <th>Title</th>
                                                                        <th>Content</th>
                                                                        <th>Image</th>
                                                                         <th>Active</th>
                                                                        <th>Options</th>
                                                                    </tr>
                                                                </thead>
                                                                @foreach($all_tips as $tip)
                                                                <tr>
                                                                    <td>{{$tip->title}}</td>
                                                                    <td>  {{ str_limit($tip->content, $limit =50, $end = '...') }}</td>
                                                                    <td>  <img style="width: 40%; "src="{{asset('website/images/')}}/{{$tip->image}}" alt=""> </td>
                                                                    @if($tip->active == 1)
                                                                    <td class="text-info">Active</td>
                                                                    @else
                                                                    <td class="text-danger">Deactive</td>
                                                                    @endif
                                                                    <td>

                                <?php     $query = DB::table('blogs')->join('blog_trans','blog_id','=','blogs.id')->join('languages','languages.id','=','blog_trans.lang_id')
                                ->where('blogs.id',$tip->id)
                                ->pluck('languages.id');

                                $all_languagesblog  = DB::table('languages')->whereNotIn('id', $query)->count();

                                 ?>
                                    <div class="dropdown-info dropdown open">
                                                                            <button class="btn btn-info dropdown-toggle waves-effect waves-light " type="button" id="dropdown-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">options</button>
                                                                            <div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                                              
                                                                              @if($all_languagesblog !=0)

                                <a href="/Admin/Tips_trans/{{$tip->id}}" class="dropdown-item waves-light waves-effect btn " >
                                        Add Translation
                                      </a> 



@endif
                                                                               <a  onclick="edit_id('{{$tip->id}}','{{$tip->lang_id}}')" class="dropdown-item waves-light waves-effect btn">
                                                                                 Edit
                                                                                </a>




                                                                           
                                                                               
                                                                                <!-- Button trigger modal -->
                                                           <a onclick="get_id('{{$tip->id}}','{{$tip->lang_id}}')" class="dropdown-item waves-light waves-effect btn text-danger" data-toggle="modal" data-target="#exampleModal">
                                                                                  Delete Buisness Tip
                                                                                </a>

                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                       </tr>
                                                        <!--    edit modal    -->  


    

                                                                @endforeach

                                                                <tfoot>
                                                                    <tr>
                                                                      <th>Title</th>
                                                                        <th>Content</th>
                                                                        <th>Image</th>
                                                                         <th>Active</th>
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
        <p>Confirm Tip <span class="text-danger"><b>Deleting</b></span> ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        <a id="delete_submit" class="waves-light waves-effect btn btn-info" data-dismiss="modal" href="#">Yes</a>
      </div>
    </div>
  </div>
</div>


                <!-- Modal HTML -->




<form id="delete_form_id" action="{{route('Tip_delete')}}" method="post">
  @csrf
  <input type="hidden" style="diplay:none;" id="tip_iddelete" name="tip_iddelete" value="">
    <input type="hidden" style="diplay:none;" id="langtip_iddelete" name="langtip_iddelete" value="">

</form>



<form id="edit_form_id" action="{{route('Tip_edit')}}" method="post">
  @csrf
  <input type="hidden" style="diplay:none;" id="tip_edit_id" name="tip_edit_id" value="">
  <input type="hidden" style="diplay:none;" id="langtip_edit_id" name="langtip_edit_id" value="">
</form>
<!--  add tips modal -->


 
<!--  -->




             

<script type="text/javascript">
  $(document).ready(function(){
    $('#delete_submit').click(function(){
      $('#delete_form_id').submit();
    });
  });

  function get_id(id,lang){
    $('#tip_iddelete').val(id);
     $('#langtip_iddelete').val(lang);
  }

  function edit_id(id,lang){
    $('#tip_edit_id').val(id);
       $('#langtip_edit_id').val(lang);
       $('#edit_form_id').submit();
  // }
   
  }

  // function view_id(id){
  //   $('#view_id').val(id);
  //   $('#view_form_id').submit();
  // }

  function active_id(id){
    $('#active_id').val(id);
    $('#active_form_id').submit();
  }

</script>

<script type="text/javascript">
  $(document).ready(function() {
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function() {
  readURL(this);
});
});
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