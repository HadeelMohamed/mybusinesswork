@extends('layouts.website')
@section('title','Product | Create')
@section('content')
<!--...........................for only page...................-->
<!--...........................links effect...................-->
<link rel="stylesheet" href="{{asset('website/css/btn-effect.css')}}" >
<!--...........................social...................-->
<link rel="stylesheet" href="{{asset('website/css/social.css')}}" >
<!--...........................slider...................-->
<link rel="stylesheet" href="{{asset('website/css/menu.css')}}" >
<!--...........................select...................-->
<link href="{{asset('website/css/select.css')}}" media="all" rel="stylesheet" type="text/css"/>
<!--...........................for only page...................-->
<link href="{{asset('website/css/dashboard.css')}}" media="all" rel="stylesheet" type="text/css"/>
<link href="{{asset('website/css/jquery.dataTables.css')}}" media="all" rel="stylesheet" type="text/css"/>
<style type="text/css">
  #dd{
    border: 1px solid red;
  }
  .pro_img_preview{
    height: 150px;
    width: 100%;
  }
</style>
<!--...........................profile-head...................-->
<div class="big-dash">
  <div class="container">
    @include('partials.member.admin_panel')
    <div class="row">   
    @include('partials.member.side_bar')
    <!--   ....................article....................-->
      <article class="col-md-9">
        <div class="container-dashborad">
          @include('partials.member.main_title')
          <!-- <a id="GoToNewProduct" href="{{route('Authed_Member_Products_Create')}}" class="btn btn-secondary btn-sm btn-cus"><i class="fas fa-plus"></i> @lang('website.new_product')</a>

          
          <a id="GoToNewProductGalleries" href="{{route('Authed_Member_Product_Galleries')}}" class="btn btn-secondary btn-sm btn-cus"><i class="fas fa-plus"></i> @lang('website.new_gallery')</a> -->
        
        	
          <form id="CreateProFormOne"  enctype="multipart/form-data">
          	<div class="form-group">
				    <label for="pro_lang_id">@lang('website.show_product_in')</label>
				    <div class="header-search-select-item select-admin">
				      <select data-placeholder="All languages" class="chosen-select" name="show_in" id="show_in" required="">
		            <option selected value="1">@lang('website.show_in_profile')</option>
		            <option value="2">@lang('website.show_in_exhibitions')</option>
		            <option value="3">@lang('website.show_in_both')</option>
				      </select>
				    </div>
				  </div>
          @if(isset($product_details))
          <div class="form-group">
            <label for="pro_name">@lang('website.name') </label>
            <input type="text" class="form-control" id="pro_name" name="pro_name" aria-describedby="textHelp" placeholder="" required="" value="{{$product_details->name}}">
          </div>
          <div class="form-group">
            <label for="pro_description">@lang('website.description')</label>
            <textarea type="text" class="form-control" id="pro_description" name="pro_description" aria-describedby="textHelp" placeholder="">{{$product_details->description}}</textarea>
          </div>
          @endif
          </form>
          <!-- end list read onlyt fields only -->

          <div class="accordion" id="accordionExample">
            {{--
            <div class="card margin-top-ac">
              <div class="card-header  header-accordion" id="headingOne">
                <h2 class="mb-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  <div class="div-icon"><i class="fas fa-info"></i></div> @lang('website.specifications')
                </h2>
              </div>
              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                  <table class="table table-bordered table-striped" style="margin-top:10px;" id="pro_specification_tables">
                    <tr><th>@lang('website.specification')</th><th>@lang('website.description')</th><th>@lang('website.delete')</th></tr>
                    @foreach($specifications as $specification)
                    <tr>
                      <td>{{$specification->specification}}</td>
                      <td>{{$specification->description}}</td>
                      <td><a class="btn btn-danger">X</a></td>
                    </tr>
                    @endforeach
                  </table>
                </div>
              </div>
            </div>
            --}}





            <div class="accordion" id="accordionExample">
            <div class="card margin-top-ac">
              <div class="card-header  header-accordion" id="headingTwo">
                <h2 class="mb-0" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                  <div class="div-icon"><i class="fas fa-info"></i></div> @lang('website.gallery')
                </h2>
              </div>
              <!-- <button id="add_new_photo_ajax" style="margin-top: 10px; display: none;" class="btn btn-danger">Add Photo</button> -->
              <div class="col-3">
							<a class="btn btn-danger" id="add_photo_after_add_product" href="javascript:changeProfile()">
							<i id="loading" class="fa fa-spinner fa-spin fa-3x fa-fw text-danger" style="position: absolute;left: 40%;top: 40%;display: none"></i>
							<i class="glyphicon glyphicon-edit"></i> @lang('website.choose_photo')</a>
						</div>
							<!-- <input type="file" name="" id="add_new_photo_ajax" style="margin-top: 10px; display: none;" > -->
							<form id="ProImagesForm" method="post" action="" enctype="multipart/form-data">
							<input type="file" id="pro_image_file" hidden="" />
							<input id="pro_image_file_name" hidden="" />
							<div class="form-group row">
							<input hidden="" name="pro_id" value="">
							<input hidden="" name="image" value="" type="file">

							</div>
							</form>
							


              <div id="collapseTwo" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                  <div class="container-fluid">
                    <div class="row" id="photos_viewers">
                      @if(isset($galleries))
                      @foreach($galleries as $gallery)
                      <div class="col-lg-3 col-md-4 col-6">
                        <center><a class="btn btn-danger" onclick="get_file_name('{{$gallery->image}}')" data-toggle="modal" data-target=".delete-pop" style="cursor:pointer; color:#FFF;" ><i class="fas fa-trash-alt"></i></a></center>

                        <img id="{{$gallery->created_at}}" class="pro_img_preview" src="{{url('/')}}/images/en/products_gallery/med/{{$gallery->image}}">
                      </div>
                      @endforeach
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="text-center button-save">
          	<button id="CreateProFormOneBtn" class="btn btn-danger">@lang('website.update')</button>
            <a href="{{route('Authed_Member_Products')}}" id="back_btn_id" class="btn btn-dark">@lang('website.back')</a>
          </div>
          
        </div>
      </article>

    </div>
  </div>
</div>








<!--...........................social...................-->




<!-- Modal -->
<div class="modal fade login-btn"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-width modal-dialog-centered" role="document">
<div class="modal-content">

<div class="container-fluid">
<div class="row">
<div class="col-sm-4">
<div class="row"><div><img src="images/banner-login.jpg" width="100%" class="banner-login" ></div></div></div>
<div class="col-sm-8">

<h3 class="h3-login">Login With My bussines</h3>
<div class="line-sec back-red"></div>



<form style="margin-top:20px;">
<div class="form-group">
<label for="exampleInputEmail1">Email address</label>
<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
</div>
<div class="form-group">
<label for="exampleInputPassword1">Password</label>
<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
</div>

<div class="container-fluid">
<div class="row">
<div class="col-6">
<div class="custom-control custom-checkbox my-1 mr-sm-2">
<input type="checkbox" class="custom-control-input" id="customControlInline">
<label class="custom-control-label" for="customControlInline">Remember Me</label>
</div>
</div>
<div class="col-6 text-right">
<a href="#" class="forget-pass"> Forget Your Passowrd ?!</a>
</div>
</div>
</div>

<div class="text-right">
<button type="submit" class="btn btn-dark btn-login-su">login</button>
</div>
</form>

<div class="register">Do not have Account yet <a href="#" class="register-link">Register now</a></div>


</div>






</div>

</div>


<button class="btn-close-pop" data-dismiss="modal"><i class="fas fa-times"></i></button>  

</div>
</div>
</div>

<!-- message -->

<div class="modal fade message-pop"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-width modal-dialog-centered" role="document">
<div class="modal-content">

<div class="container-fluid">
<div class="row">
<div class="col-sm-4">
<div class="row"><div><img src="images/banner-login.jpg" width="100%" class="banner-login" ></div></div></div>
<div class="col-sm-8">

<h3 class="h3-login">Welcome ., Sent your Message</h3>
<div class="line-sec back-red"></div>



<form style="margin-top:20px;">
<div class="form-group">
<label for="exampleInputEmail1">Title message</label>
<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
</div>
<div class="form-group">
<label for="exampleInputPassword1">Message</label>
<textarea type="" class="form-control" id="exampleInputPassword1" ></textarea>
</div>



<div class="text-right">
<button type="submit" class="btn btn-dark btn-login-su">Send</button>
</div>
</form>



</div>






</div>

</div>


<button class="btn-close-pop" data-dismiss="modal"><i class="fas fa-times"></i></button>  

</div>
</div>
</div>











<div class="modal fade delete-pop"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content back-delete-pop">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 text-center">
            <div class="padding-pop">
              <div class="icon-pop"><i class="fas fa-trash-alt"></i></div>
              <h3 class="h3-delete-pop">Are You Sure</h3>
              <button id="confirmDelete" class="btn btn-outline-light" data-dismiss="modal">Yes</button>  
              <button class="btn btn-outline-light"  data-dismiss="modal">No</button>  
            </div>
          </div>   
        </div>
      </div>
    </div>
  </div>
</div>



<input  hidden="" name="" id="file_name_input">




@include('partials.website.footer')

<script type="text/javascript">
  $(document).ready(function(){
    $('#file_name_input').val('');
  });
  $('#CreateProFormOneBtn').click(function(){
    
    var pro_name = $('#pro_name').val();
    var pro_description = $('#pro_description').val();
    // var pro_lang = $('#pro_lang_id').val();
    var pro_id = "{{$pro_id}}";
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var url = "{{Route('Authed_Member_Products_Update_Post')}}";
    var show_in = $('#show_in').val();
    
    if(pro_name == ''){
      $('#pro_name').focus();
      $('#pro_name').css("border", "1px solid #f90606");
    // }else if(pro_lang_id == ''){
    //   $('#pro_name').css("border", "1px solid #ced4da");
    //   $('#pro_lang_id').css("border", "1px solid #f90606");
    //   $('#pro_lang_id').focus();
    }else{
      $('#pro_name').css("border", "1px solid #ced4da");
      // $('#pro_lang_id').css("border", "1px solid #ced4da");
      //submit ajax
      $.ajax({
        /* the route pointing to the post function */
        url: url,
        type: 'POST',
        /* send the csrf-token and the input to the controller */
        data: {
                _token: CSRF_TOKEN,
                pro_name:pro_name,
                pro_description:pro_description,
                visibility: show_in,
                pro_id:pro_id
                // pro_lang:pro_lang
              },
        dataType: 'JSON',
        /* remind that 'data' is the response of the AjaxController */
        success: function (data) {
        if(data.status == 'exist')
        {
          swal("Already Exist", data.message, "info");
          return false;
        }else if(data.status == 'no_updated'){
        	swal("Nothing to updating", data.message, "info");
          return false;
        }else if(data.status == ''){
          swal("Error", data.message, "error");
          return false;
        }else if(data.status == 'success'){
          // set session 
          sessionStorage.setItem("pro_id", data.pro_id);
          sessionStorage.setItem("lang_id", data.lang_id);
          var saved_pro_id = sessionStorage.getItem("pro_id");
          sessionStorage.setItem("lang_id", data.lang_id);
          var saved_lang_id = sessionStorage.getItem("lang_id");
          // $('#pro_lang_id').prop('disabled',true);
          // $('#pro_name').prop('disabled',true);
          // $('#pro_description').prop('disabled',true);
          $('#back_btn_id').remove();
          $('#accordionExample').show();
          $('#pro_id_value').val(data.pro_id);
          $('#attrib').focus();
          $('#new_new_gallery_link').show();
          swal("Success", data.message, "success");
          $('#GoToNewProductGalleries').show();
          $('#GoToNewProductTranslation').show();
        }
        
        },
        error: function(data){
          console.log('error');
        }
      }); 

    }
  });


  $('#confirmDelete').click(function(){
    // rquest ajax delete
    var pro_id = "{{$pro_id}}";
    var pro_img = $('#file_name_input').val();
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var url = "{{url('/')}}/en/Account/ProImageDeleteGet/"+{{Auth::user()->id}}+"-"+pro_id+"-"+pro_img+"";

    //submit ajax
    $.ajax({
      /* the route pointing to the post function */
      url: url,
      type: 'GET',
      /* send the csrf-token and the input to the controller */
      data: {
              _token: CSRF_TOKEN,
              pro_id:pro_id,
              pro_img:pro_img
            },
      dataType: 'JSON',
      /* remind that 'data' is the response of the AjaxController */
      success: function (data) {


      if(data.status == 'exist')
      {
        swal("Already Exist", data.message, "info");
        return false;
      }else if(data.status == ''){
        swal("Error", data.message, "error");
        return false;
      }else if(data.status == 'success'){
        $('#file_name_input').val('');
        $('#photos_viewers').empty();
        location.reload();
          // if(data[1].length > 0){}
          //   $.each(data[1], function(k, v) {
          //     $('#photos_viewers').append('<div class="col-lg-3 col-md-4 col-6"><center><a class="btn btn-danger" onclick="get_file_name("'+v.image+'");" data-toggle="modal" data-target=".delete-pop" style="cursor:pointer; color:#FFF;" ><i class="fas fa-trash-alt"></i></a></center><img class="pro_img_preview" src="{{url('/')}}/images/en/products_gallery/med/'+v.image+'"></div>');

               

          //   });
          // }else{
          //   $('#photos_viewers').empty();
          // }
        
        $('#loading').css('display', 'none');
        swal("Success", data.message, "success");
      }
      
      },
      error: function(data){
        console.log('error');
      }
    });

  });



  // update modal ajax
  $('#EditSpecificationBtn').click(function(){
    // get values
    var specificationValue = $('$EditSpecificationInput').val();
    var DescriptionValue = $('$EditDescriptionInput').val();
  }); 


  // $('#SpecificationProFormBtn').click(function(){
  //   // get value 
  //   var specification = $('#attrib').val();
  //   var description = $('#description').val();
  //   var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  //   var pro_id_value = $('#pro_id_value').val();
  //   // var lang_id = $('#pro_lang_id').val();
  //   var url = "{{route('MemberProductSpecPost')}}";
  //   if(specification == '')
  //   {
  //     $('#attrib').css("border", "1px solid #f90606");
  //     $('#attrib').focus();
  //     return false;
  //   }else if(description == ''){
  //     $('#attrib').css("border", "1px solid #ced4da");
  //     $('#description').focus();
  //     $('#description').css("border", "1px solid #f90606");
  //     return false;
  //   }else{
  //     $('#attrib').css("border", "1px solid #ced4da");
  //     $('#description').css("border", "1px solid #ced4da");
  //     //$('#SpecificationProForm').submit();
  //     // submit ajax
  //     $.ajax({
  //       /* the route pointing to the post function */
  //       url: url,
  //       type: 'POST',
  //       /* send the csrf-token and the input to the controller */
  //       data: {
  //               _token: CSRF_TOKEN,
  //               specification: specification,
  //               description: description,
  //               pro_id: pro_id_value,
  //               lang_id: lang_id
  //             },
  //       dataType: 'JSON',
  //       /* remind that 'data' is the response of the AjaxController */
  //       success: function (data) {
  //         if(data.status == 'exist')
  //         {
  //           swal("Already Exist", data.message, "info");
  //           return false;
  //         }else if(data.status == ''){
  //           swal("Error", data.message, "error");
  //           return false;
  //         }else if(data.status == 'success'){
  //           swal("Success", data.message, "success");
  //           if(data.specifications.length > 0){
  //             $('#pro_specification_tables').empty();
  //             // load all specification of current product
  //             $.each(data.specifications, function(k, v) {
  //                 $('#pro_specification_tables').append('<tr><td>'+v.specification+'</td><td>'+v.description+'</td><td><button class="btn-delete-message "data-toggle="modal" data-target=".delete-pop"><i class="fas fa-trash-alt"></i></button> <button class="btn-delete-message " data-toggle="modal" data-target=".delete-edit"><i class="fas fa-edit"></i></button></td></tr>');
  //             });
  //             //clear inputs
  //             $('#attrib').val('');
  //             $('#description').val('');
  //           }
            

  //         }
  //       },
  //       error: function(data){
          
  //       }
  //     });
  //   }
    
  // });

  $('#new_new_gallery_link').click(function(){
    var saved_pro_id = sessionStorage.getItem("pro_id");
    // var pro_lang = $('#pro_lang_id').val();
    // $('#pro_lang_id_value').val(pro_lang);
    $('#productGalleryForm').submit();
  });


  $('#update_btn_id').click(function(){
  	console.log('clicked to submit');
  	$('#CreateProFormOne').submit();
  });
</script>


<script type="text/javascript">
	
    function changeProfile() {
      $('#pro_image_file').click();
    }
    $('#pro_image_file').change(function () {
      if ($(this).val() != '') {
        upload(this);
      }
    });
    function upload(img) {
				var url = "{{route('MemberProductGalleryPagePost_q')}}";
				var saved_pro_id = "{{$pro_id}}";
        var form_data = new FormData();
        form_data.append('file', img.files[0]);
        form_data.append('_token', '{{csrf_token()}}');
        form_data.append('pro_id',saved_pro_id);
        $('#loading').css('display', 'block');
        $.ajax({
            url: url,
            data: form_data,
            type: 'POST',
            contentType: false,
            processData: false,
            success: function (data) {

                if (data.fail) {
                  // $('#preview_image').attr('src', '{{asset('images/noimage.jpg')}}');
                  alert(data.errors['file']);
                }
                else {
                  $('#file_name_input').val(data.file_name);
                  $('#photos_viewers').show();
                  // <button id="'+data+'" onclick="show_confirm("'+data+'")" class="btn btn-danger">X</button>
                  //$('#preview_image').attr('src', "{{asset('uploads/')}}/" + data);
                  
                  $('#photos_viewers').append('<div class="col-lg-3 col-md-4 col-6"><center><a class="btn btn-danger" data-toggle="modal" data-target=".delete-pop" style="cursor:pointer; color:#FFF;" ><i class="fas fa-trash-alt"></i></a></center><img id="" class="pro_img_preview" src="{{url('/')}}/images/en/products_gallery/med/'+data.file_name+'"></div>');
                }
                $('#loading').css('display', 'none');
            },
            error: function (xhr, status, error, data) {
        	console.log(data);
              alert(xhr.responseText);
              // $('#preview_image').attr('src', '{{asset('images/noimage.jpg')}}');
            }
        });
    }

function get_file_name(image_name){
$('#file_name_input').val(image_name);
}
</script>

@endsection