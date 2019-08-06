@extends('layouts.admin')
@section('title','Exhibition | Details')
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
.buttonadd {background-color: #e7e7e7; color: black;}

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

@if (session('Update_Sucess'))
<script type="text/javascript">
    $(document).ready(function(){
        Swal.fire({
          type: 'success',
          title: 'Success',
          text: 'Exhibition Update Success!',
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

@if (session('add_success'))
<script type="text/javascript">
    $(document).ready(function(){
        Swal.fire({
          type: 'success',
          title: 'Success',
          text: 'Exhibition Added Success!',
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
                                           
                                           <!--  <li class="nav-item">
                                              <a class="nav-link" href="{{route('Exhibition_list_translation')}}">Translations <span class="sr-only"></span></a>
                                            </li> -->
                                           <!--  <li class="nav-item">
                                                <a class="nav-link" href="{{route('Exhibition_companies')}}">Exhibition Companies</a>
                                            </li> -->
                                           <!--  <li class="nav-item">
                                                <a class="nav-link " href="{{route('Exhibition_setting_update')}}">Setting</a> 
                                            </li> -->
                                           <!--  <li class="nav-item">
                                                <a class="nav-link " href="{{route('Exhibition_categories')}}">Categories</a> 
                                            </li> -->
                                        </ul>
                                        
                                    </div>
                                </nav>
                          </br>
                        <!-- Default Navbar card end -->
               <a  class="btn buttonadd"  href="{{route('Exhibition_addpaage')}}">Add Exhibition</a>
               <input type="hidden" name="lang" id="lang" value="{{ Config::get('app.locale') }}">
                                <!-- Row start -->
                                <div class="row">
                                    <div class="col-lg-12 col-xl-12">
                                        
                                                    <div class="card-block">
                                                        <div class="dt-responsive table-responsive">

                                                              <table class="table table-striped table-bordered nowrap Exhibition">


                                                                <thead>
                                                                    <tr>
                                                                        <th>Exhibition Name</th>
                                                                        <th>Start Date</th>
                                                                        <th>End Date</th>
                                                                        <th>Active</th>
                                                                        <th>Status</th>
                                                                        <th>Options</th>
                                                                    </tr>
                                                                </thead>
                                           

                                                                <tfoot>
                                                                    <tr>
                                                                     <th>Exhibition Name</th>
                                                                        <th>Start Date</th>
                                                                        <th>End Date</th>
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
  <input type="hidden" style="diplay:none;" id="exhibition_lang" name="exhibition_lang" value="">
</form>

<form id="delete_form_id" action="{{route('Exhibition_delete')}}" method="post">
  @csrf
  <input type="hidden" style="diplay:none;" id="exhibition_id" name="exhibition_id" value="">
  <input type="hidden" style="diplay:none;" id="exhibition_langdel" name="exhibition_lang" value="">
 
</form>

<form id="view_form_id" action="{{route('Exhibition_view')}}" method="post">
  @csrf
  <input type="hidden" style="diplay:none;" id="view_id" name="exhibition_id" value="">
  <input type="hidden" style="diplay:none;" id="exhibition_langview" name="exhibition_lang" value="">
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

  function get_id(id,langid){
    
    $('#exhibition_id').val(id);
    $('#exhibition_langdel').val(langid);
    
  }

  function edit_id(id,langid){
    $('#edit_id').val(id);
    $('#exhibition_lang').val(langid);
    $('#edit_form_id').submit();
  }

  function view_id(id,langid){

    $('#view_id').val(id);
    $('#exhibition_langview').val(langid);
    $('#view_form_id').submit();
  }




  //   function addtrans_id(id,langid){
  //   $('#addtrans_id').val(id);
  //   $('#exhibition_langtrans').val(langid);
  //   $('#trans_form_id').submit();
  // }

</script>
<script type="text/javascript"> $(document).ready(function() {
  $(".selectsingle").select2({
    dropdownParent: $("#AddModal"),

  })

  $("#countries").select2({
    dropdownParent: $("#AddModal"),

  });


});
</script>


 <script>
      CKEDITOR.config.extraPlugins = 'justify';

  CKEDITOR.replace( 'editor' );
   CKEDITOR.replace( 'editor1' );
  </script>

                  <script>
    $(document).ready(function () {

    

     
        $('.Exhibition').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
              "processing": true,
        "serverSide": true,
                     "url": "{{ url('Exhibition_list') }}",
                     "dataType": "json",
                     "type": "POST",
                     "data":{ _token: "{{csrf_token()}}",lang:$('#lang').val()}
                   },
            "columns": [
                { "data": "Exhibition Name" },
                { "data": "Start Date" },
                { "data": "End Date" },
                { "data": "Active" },
                { "data": "Status" },
                { "data": "Options" }
            ]

        });
    });
</script>

<script type="text/javascript">
  function readURL(input, imgControlName) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $(imgControlName).attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}

$("#imag").change(function() {
  // add your logic to decide which image control you'll use
  var imgControlName = "#ImgPreview";
  readURL(this, imgControlName);
  $('.preview1').addClass('it');
  $('.btn-rmv1').addClass('rmv');
});


$("#removeImage1").click(function(e) {
  e.preventDefault();
  $("#imag").val("");
  $("#ImgPreview").attr("src", "");
  $('.preview1').removeClass('it');
  $('.btn-rmv1').removeClass('rmv');
});


</script>


<script type="text/javascript">
  $(function () {
  $(".datepicker").datepicker({ 
        autoclose: true, 
        todayHighlight: true,
  }).datepicker('update', new Date());


   $(".datepickerend").datepicker({ 
        autoclose: true, 
        todayHighlight: true,
  }).datepicker('update', new Date());
});
</script>

<script type="text/javascript">
function getId(url) {

    var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
    var match = url.match(regExp);

    if (match && match[2].length == 11) {
        return match[2];
    } else {
        return 'error';
    }
}

  $(document).ready(function(){
    var inputBox = document.getElementById('myUrl');
   inputBox.onkeyup = function(){
    var url =document.getElementById('urldiv').innerHTML = inputBox.value;
     myId = getId(url);
     $("#urldiv").empty();

     $('#myCode').html('<iframe width="560" height="315" src="//www.youtube.com/embed/' + myId + '" frameborder="0" allowfullscreen></iframe>');


}



  });
</script>
<!-- Custom js -->
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