@extends('layouts.admin')
@section('title','Message | View')
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

     $('#edit_id').val(45);

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
          text: 'Message Deleted Success!',
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
                                    <a class="navbar-brand">Message Section  View</a>
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
                                                <a class="nav-link">All Messages <span
                                                        class="sr-only">(current)</span></a>
                                            </li>
                                       
                                        </ul>
                                        
                                    </div>
                                </nav>
                        </br>
                        <!-- Default Navbar card end -->

                                <!-- Row start -->
                                <div class="row">
                                    <div class="col-lg-12 col-xl-12">
                                        
                                                    <div class="card-block">
                                                        <div class="dt-responsive table-responsive">
                                                            <table class="table table-striped table-bordered nowrap Message">


                                                                <thead>
                                                                    <tr>
                                                                        <th>Name</th>
                                                                        <th>Subject</th>
                                                                        <th>Message</th>
                                                                        <th>Date</th>
                                                                        <th>Status</th>
                                                                        <th>Options</th>

                                                                    </tr>
                                                                </thead>
                                           

                                                                <tfoot>
                                                                    <tr>
                                                                       <th>Name</th>
                                                                        <th>Subject</th>
                                                                        <th>Message</th>
                                                                        <th>Date</th>
                                                                        <th>Status</th>
                                                                        <th>Options</th>
                                                                    </tr>
                                                                </tfoot>

                                                            </table>



   


<!-- Modal -->
<div class="modal fade"  id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="DeleteModal" aria-hidden="true" class="DeleteModal">
        <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Confirm Message <span class="text-danger"><b>Deleting</b></span> ?</p>
      </div>
      <form id="delete_form_id" action="{{route('Message_delete')}}" method="post">
  @csrf
  <input type="hidden" style="diplay:none;" id="message_id" name="message_id" value="">


      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        <a id="delete_submit" class="waves-light waves-effect btn btn-info" data-dismiss="modal" href="#">Yes</a>
        </form>
      </div>
    </div>
  </div>
                
            </div>


                <!-- Modal HTML -->








<form id="view_form_id" action="{{route('Message_view')}}" method="post">
  @csrf
 <input type="hidden" style="diplay:none;" id="Message_id" name="Message_id" value="">
 
</form>





                  <script>
    $(document).ready(function () {
        $('.Message').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
                     "url": "{{ url('Messages_all') }}",
                     "dataType": "json",
                     "type": "POST",
                     "data":{ _token: "{{csrf_token()}}"}
                   },
            "columns": [
                { "data": "Name" },
                { "data": "Subject" },
                { "data": "Message" },
                { "data": "Date" },
                { "data": "Status" },
                { "data": "Options" },
            ]

        });
    });
</script>


<script type="text/javascript">
  $(document).ready(function(){
  
 $('#delete_submit').click(function(){
      $('#delete_form_id').submit();
    });  

    $('#DeleteModal').on('show.bs.modal', function (e) {
  // get information to update quickly to modal view as loading begins
  var opener=e.relatedTarget;//this holds the element who called the modal
   
   //we get details from attributes
  var message_id=$(opener).attr('message_id');


//set what we got to our form
  $('#delete_form_id').find('[name="message_id"]').val(message_id);
 






   
});
  });

  function get_id(id){
    alert(id);
    $('#messageid').val(id);
      }

  function edit_id(id){
    $('#edit_id').val(id);
    //$('#edit_form_id').submit();
  }

  function view_id(id){

    $('#Message_id').val(id);
    $('#view_form_id').submit();
  }

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