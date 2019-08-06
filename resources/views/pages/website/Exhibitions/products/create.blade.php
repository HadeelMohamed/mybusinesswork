@extends('layouts.website')
@section('title','Product | Create')
@section('content')

<style type="text/css">
  #dd{
    border: 1px solid red;
  }
</style>
<!--...........................profile-head...................-->
<div class="big-dash">
  <div class="container">
    @include('partials.member.admin_panel')
    <div class="row">   
		@include('partials.member.exhibition_side_bar')
		<!--   ....................article....................-->
			<article class="col-md-9">
				<div class="container-dashborad">
					@include('partials.member.main_title_exhibitor')
					<style type="text/css">
  .a-tabs{
 margin-right: -12px;
    color: #000;
    border-radius: 10px;
    padding: 5px 15px;
    margin-bottom: 10px;
    display: inline-block;
    background-color: #333;
    color: #fff !important;
    font-size: 20px;
    display: inline-block;
  }
  .a-tabs:lang(ar){
     margin-left: -12px;
          margin-right: 0px;


  }

  .a-tabs-active{
   background-color: #e60000 !important;
    border-bottom: none;
    box-shadow: 0px 0px 3px #000;
    border-radius: 10px;
    z-index: 3;
    position: relative;

    
  }

.form-control, .nice-select{
      border: 1px solid #333 !important;
    box-shadow: 1px 1px 5px #b5adad;
}

</style>

      <div>
        <a class="a-tabs" href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibition/join_exhibitor/{{$exh_slug}}">@lang('website.exhibitor_information')</a>  <a class="a-tabs a-tabs-active" href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibition/join_exhibitor_products/{{$exh_slug}}">@lang('website.products')</a>
      </div>
					
					<!-- <a id="GoToNewProductTranslation" href="{{route('Authed_Member_Product_Translations')}}" class="btn btn-secondary btn-sm btn-cus"><i class="fas fa-plus"></i> @lang('website.new_translations')</a>
					<a id="GoToNewProductGalleries" href="{{route('Authed_Member_Product_Galleries')}}" class="btn btn-secondary btn-sm btn-cus"><i class="fas fa-plus"></i> @lang('website.new_gallery')</a> -->
					<form id="CreateProFormOne" method="post" action="" enctype="multipart/form-data">
						
					<div class="form-group">
				    <!-- <label for="pro_lang_id">@lang('website.language')</label> -->
				    <div class="header-search-select-item select-admin">
				      <select data-placeholder="All languages" class="chosen-select" name="pro_lang_id" id="pro_lang_id" required="" hidden="">
				        <option selected disabled="" value="1">All Languages</option>
				        {{--
				        @if(isset($member_details))
				          @foreach($languages as $language)
				           
				            <option value="{{$language->id}}">{{$language->name}}</option>
				            
				          @endforeach
				        @else
				           @foreach($languages as $language)
				            <option value="{{$language->id}}">{{$language->name}}</option>
				          @endforeach
				        @endif
				        --}}
				      </select>
				    </div>
				  </div>
				  
				  <!-- <div class="form-group">
				    <label for="pro_lang_id">@lang('website.show_product_in')</label>
				    <div class="header-search-select-item select-admin">
				      <select data-placeholder="All languages" class="chosen-select" name="show_in" id="show_in" required="">
		            <option selected value="1">@lang('website.show_in_profile')</option>
		            <option value="2">@lang('website.show_in_exhibitions')</option>
		            <option value="3">@lang('website.show_in_both')</option>
				      </select>
				    </div>
				  </div> -->
					<div class="form-group">
			    	<label for="pro_name">@lang('website.product_name') </label>
			    	<input type="text" class="form-control" id="pro_name" name="pro_name" aria-describedby="textHelp" placeholder="" required="">
			  	</div>
				  <div class="form-group">
				    <label for="pro_description">@lang('website.product_description')</label>
				    <textarea type="text" class="form-control" id="pro_description" name="pro_description" aria-describedby="textHelp" placeholder=""></textarea>
				  </div>
					<div class="text-left button-save">
					  <button type="button" id="CreateProFormOneBtn" class="btn btn-danger">@lang('website.add_photo')</button>

				    <a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibition/join_exhibitor_products/{{$exh_slug}}" id="back_btn_id" class="btn btn-dark">@lang('website.back')</a>
				  </div>
					</form>




<!-- <button id="add_new_photo_ajax" style="margin-top: 10px; display: none;" class="btn btn-danger">Add Photo</button> -->
<a class="btn btn-danger" id="add_photo_after_add_product" href="javascript:changeProfile()" style="display: none;">
	<i id="loading" class="fa fa-spinner fa-spin fa-3x fa-fw text-danger" style="position: absolute;left: 40%;top: 40%;display: none"></i>
												<i class="glyphicon glyphicon-edit"></i> @lang('website.choose_photo')</a>
<!-- <input type="file" name="" id="add_new_photo_ajax" style="margin-top: 10px; display: none;" > -->
<form id="ProImagesForm" method="post" action="" enctype="multipart/form-data">
										<input type="file" id="pro_image_file" hidden="" />
    								<input id="pro_image_file_name" hidden="" />
										<div class="form-group row">
											<input hidden="" name="pro_id" value="">
											<input hidden="" name="image" value="" type="file">
								
								  	</div>
									</form>
<div class="card-body">
                  <div class="container-fluid">
                    <div class="row" id="photos_viewers">
                     
                      

                      
                     
                    </div>
                  </div>
                </div>

	<!-- <table class="table table-bordered table-striped" style="margin-top:10px;" id="pro_images_list">
										<tr>
											<th>@lang('website.product_photos')</th>
											<th>@lang('website.options')</th>
										</tr>
									</table> -->


					<!-- end list read onlyt fields only -->
				<!-- 	<div class="accordion" id="accordionExample" style="display: none;">
						<div class="card margin-top-ac">
							<div class="card-header  header-accordion" id="headingOne">
								<h2 class="mb-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									<div class="div-icon"><i class="fas fa-info"></i></div> @lang('website.more_information')
								</h2>
							</div> 
							 <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
								<div class="card-body">
									<form id="SpecificationProForm" method="post" action="" enctype="multipart/form-data">
									<div class="form-group row">
										<input hidden="" name="pro_id" value="">
										<input hidden="" name="lang_id" value="">
								    <label for="attrib" class="col-sm-2 col-form-label">@lang('website.attribute')</label>
								    <div class="col-sm-4">
								      <input type="text" class="form-control" id="attrib" placeholder="@lang('website.attribute')" required="">
								    </div>
								      <label for="" class="col-sm-2 col-form-label">@lang('website.description')</label>
								    <div class="col-sm-4">
								      <input type="text"  class="form-control" id="description" placeholder="@lang('website.description')" required="">
								    </div>
								  </div>
								  <div class="text-center">
								  	<button type="button" class="btn btn-danger" id="SpecificationProFormBtn" >@lang('website.create')</button>
								  </div>
								</form>
									<table class="table table-bordered table-striped" style="margin-top:10px;" id="pro_specification_tables">
										<tr>
											<th>@lang('website.attribute')</th>
											<th>@lang('website.description')</th>
											<th></th>
										</tr>
									</table>
								</div>
							</div> 

						<div class="card-header  header-accordion" id="headingTwo">
								<h2 class="mb-0" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
									<div class="div-icon"><i class="fas fa-info"></i></div> @lang('website.product_photos')
								</h2>
							</div> 
							<div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
								
								<div class="card-body">
									<form id="ProImagesForm" method="post" action="" enctype="multipart/form-data">
										<input type="file" id="pro_image_file" hidden="" />
    								<input id="pro_image_file_name" hidden="" />
										<div class="form-group row">
											<input hidden="" name="pro_id" value="">
											<input hidden="" name="image" value="" type="file">
								
								  	</div>
									</form>
									<center>
										<div style="width:100px;height: 100px; border: 1px solid whitesmoke ;text-align: center;position: relative" id="image">
											<img width="100%" height="100%" id="preview_image" />
											<i id="loading" class="fa fa-spinner fa-spin fa-3x fa-fw" style="position: absolute;left: 40%;top: 40%;display: none"></i>
										</div>
										<p>
											<a href="javascript:changeProfile()" style="text-decoration: none;">
												<i class="glyphicon glyphicon-edit"></i> @lang('website.add_photo')
										
										</p>
										<input type="file" id="file" style="display: none"/>
										<input type="hidden" id="file_name"/>
									</center>
								
								</div>
							</div>
						</div>
					</div> -->

				</div>
				<div class="row">
					<div class="col-12">
						<center>
							<a id="all_products_list_btn" style="display:none;" class="btn btn-secondary btn-danger btn-sm btn-cus" href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibition/join_exhibitor_products/{{$exh_slug}}">@lang('website.save')</a>
							<a style="display:none;" id="GoToNewProduct" href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibition/join_exhibitor_products/{{$exh_slug}}" class="btn btn-secondary btn-sm btn-cus"><i class="fas fa-plus"></i> @lang('website.add_new_product')</a>
						</center>
					</div>
				</div>
			</article>
		</div>
	</div>
</div>




<!--...........................social...................-->
<!-- <div id='ss_menu'>
<div><a href="https://www.facebook.com/gulf.erp.12" target="new" class="fab fa-facebook social_link"></a></div>
<div><a href="https://www.facebook.com/gulf.erp.12" target="new" class="fab fa-twitter social_link"></a></div>
<div><a href="https://www.facebook.com/gulf.erp.12" target="new" class="fab fa-instagram social_link"></a></div>
<div><a href="https://www.instagram.com/gulfcloud/" target="new" class="fab fa-pinterest social_link"></a></div>
<div class='menu'>
<div class='share' id='ss_toggle' data-rot='180'>
<div class='circle'></div>
<div class='bar'></div>
</div>
</div>
</div> -->



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











<!-- edit -->

<div class="modal fade delete-edit"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content back-delete-pop">

<div class="container-fluid">
<div class="row">

<div class="col-12">
<div class="padding-pop">

<div class="icon-pop" style="background-color:#09F"><i class="fas fa-edit"></i></div>

<div class="form-group row" style="margin-top:20px;">
<label for="staticEmail" class="col-sm-4 col-form-label" style="color:#fff;">Title</label>
<div class="col-sm-8">
<input type="text"  class="form-control" id="EditSpecificationInput" value="">
</div>
</div>



<div class="form-group row" >
<label for="staticEmail" class="col-sm-4 col-form-label" style="color:#fff;">Describtion</label>
<div class="col-sm-8">
<input type="text"  class="form-control" id="EditDescriptionInput" value="">
</div>
</div>

<div class="text-center">
<button id="EditSpecificationBtn" class="btn btn-outline-light" >Yes</button>  
<button class="btn btn-outline-light"  data-dismiss="modal">No</button>  
</div>
</div>




</div>   






</div>

</div>



</div>
</div>
</div>



<!-- delete -->

<div class="modal fade delete-pop"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content back-delete-pop">

<div class="container-fluid">
<div class="row">

<div class="col-12 text-center">
<div class="padding-pop">

<div class="icon-pop"><i class="fas fa-trash-alt"></i></div>

<h3 class="h3-delete-pop">Are You Sure</h3>


<button class="btn btn-outline-light" >Yes</button>  
<button class="btn btn-outline-light"  data-dismiss="modal">No</button>  

</div>




</div>   






</div>

</div>



</div>
</div>
</div>




<input hidden="" name="" id="pro_id_value">
<input id="exh_slug" hidden="" name="" value="{{$exh_slug}}">


@include('partials.website.footer')
<script type="text/javascript">
	var NotAllwedCharacters = [33,35,36,37,38,39,47];
 
	$(document).ready(function(){
		// hide other setion
		$('#new_new_gallery_link').hide();
		$('#accordionExample').hide();
		$('#all_products_list_btn').hide();
		$('#GoToNewProductGalleries').hide();
		$('#GoToNewProductTranslation').hide();
		$('#add_new_photo_ajax').hide();

	});

	function show_confirm(image_id){
		console.log(image_id);
	}
</script>

<script type="text/javascript">
$("#name").on("keypress",function (event) { 
  var n = NotAllwedCharacters.includes(event.which);
  
  if(n == true){
    console.log('not allowed');
    return false;
  }else{
    return event.which;
  }
});
	
	$('#CreateProFormOneBtn').click(function(){
		
		var pro_name = $('#pro_name').val();
		var pro_description = $('#pro_description').val();
		var pro_lang = 1; //$('#pro_lang_id').val();
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		var show_in = $('#show_in').val();
		var exh_slug = $('#exh_slug').val();
		var url = "{{Route('Authed_Exhibitor_Products_Create_Post')}}";

		if(pro_name == ''){
			$('#pro_name').focus();
			$('#pro_name').css("border", "1px solid #f90606");
		// }else if(pro_lang_id == ''){
		// 	$('#pro_name').css("border", "1px solid #ced4da");
		// 	$('#pro_lang_id').css("border", "1px solid #f90606");
		// 	$('#pro_lang_id').focus();
		}else{
			$('#pro_name').css("border", "1px solid #ced4da");
			$('#pro_lang_id').css("border", "1px solid #ced4da");
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
								pro_lang:1,
								visibility:show_in,
								exh_slug:exh_slug
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
					// set session 
					sessionStorage.setItem("pro_id", data.pro_id);
					sessionStorage.setItem("lang_id", data.lang_id);
					var saved_pro_id = sessionStorage.getItem("pro_id");
					sessionStorage.setItem("lang_id", data.lang_id);
					var saved_lang_id = sessionStorage.getItem("lang_id");
					$('#all_products_list_btn').show();
					$('#GoToNewProduct').show();
					$('#add_photo_after_add_product').show();
					$('#pro_lang_id').prop('disabled',true);
					$('#pro_name').prop('disabled',true);
					$('#pro_description').prop('disabled',true);
					$('#CreateProFormOneBtn').remove();
					$('#back_btn_id').remove();
					$('#accordionExample').show();
					$('#add_new_photo_ajax').show();
					
					$('#pro_id_value').val(data.pro_id);
					$('#attrib').focus();
					$('#new_new_gallery_link').show();
					// swal("Success", "{{trans('website.product_added_success')}}", "{{trans('website.success')}}");
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



	// update modal ajax
	$('#EditSpecificationBtn').click(function(){
		// get values
		var specificationValue = $('$EditSpecificationInput').val();
		var DescriptionValue = $('$EditDescriptionInput').val();
	});	


	$('#SpecificationProFormBtn').click(function(){
		// get value 
		var specification = $('#attrib').val();
		var description = $('#description').val();
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		// var pro_id_value = $('#pro_id_value').val();
		var pro_id_value = sessionStorage.getItem("pro_id");
		// var lang_id = $('#pro_lang_id').val();
		var url = "{{route('MemberProductSpecPost')}}";
		if(specification == '')
		{
			$('#attrib').css("border", "1px solid #f90606");
			$('#attrib').focus();
			return false;
		}else if(description == ''){
			$('#attrib').css("border", "1px solid #ced4da");
			$('#description').focus();
			$('#description').css("border", "1px solid #f90606");
			return false;
		}else{
			$('#attrib').css("border", "1px solid #ced4da");
			$('#description').css("border", "1px solid #ced4da");
			//$('#SpecificationProForm').submit();
			// submit ajax
			$.ajax({
				/* the route pointing to the post function */
				url: url,
				type: 'POST',
				/* send the csrf-token and the input to the controller */
				data: {
								_token: CSRF_TOKEN,
								specification: specification,
								description: description,
								pro_id: pro_id_value
								// lang_id: lang_id
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
						swal("Success", data.message, "success");
						if(data.specifications.length > 0){
							$('#pro_specification_tables').empty();
							// load all specification of current product
	            $.each(data.specifications, function(k, v) {
                $('#pro_specification_tables').append('<tr><td>'+v.specification+'</td><td>'+v.description+'</td><td><button class="btn-delete-message "data-toggle="modal" data-target=".delete-pop"><i class="fas fa-trash-alt"></i></button> <button class="btn-delete-message " data-toggle="modal" data-target=".delete-edit"><i class="fas fa-edit"></i></button></td></tr>');
	            });
	            //clear inputs
	            $('#attrib').val('');
	            $('#description').val('');
						}
					}
				},
				error: function(data){
					console.log('error',data);
				}
			});
		}
		
	});

	


	// pro galleries section
	// $('#new_new_gallery_link').click(function(){
	// 	// get value 
	// 	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	// 	var image_data = $('#proImage').files[0];
	// 	console.log(image_data);
	// 	return false;
	// 	// var lang_id = $('#pro_lang_id').val();
	// 	var url = "{{route('MemberProductSpecPost')}}";
	// 	if(specification == '')
	// 	{
	// 		$('#attrib').css("border", "1px solid #f90606");
	// 		$('#attrib').focus();
	// 		return false;
	// 	}else if(description == ''){
	// 		$('#attrib').css("border", "1px solid #ced4da");
	// 		$('#description').focus();
	// 		$('#description').css("border", "1px solid #f90606");
	// 		return false;
	// 	}else{
	// 		$('#attrib').css("border", "1px solid #ced4da");
	// 		$('#description').css("border", "1px solid #ced4da");
	// 		//$('#SpecificationProForm').submit();
	// 		// submit ajax
	// 		$.ajax({
	// 			/* the route pointing to the post function */
	// 			url: url,
	// 			type: 'POST',
	// 			/* send the csrf-token and the input to the controller */
	// 			data: {
	// 							_token: CSRF_TOKEN,
	// 							specification: specification,
	// 							description: description,
	// 							pro_id: pro_id_value
	// 							// lang_id: lang_id
	// 						},
	// 			dataType: 'JSON',
	// 			 remind that 'data' is the response of the AjaxController 
	// 			success: function (data) {

	// 				if(data.status == 'exist')
	// 				{
	// 					swal("Already Exist", data.message, "info");
	// 					return false;
	// 				}else if(data.status == ''){
	// 					swal("Error", data.message, "error");
	// 					return false;
	// 				}else if(data.status == 'success'){
	// 					swal("Success", data.message, "success");
	// 					if(data.specifications.length > 0){
	// 						$('#pro_specification_tables').empty();
	// 						// load all specification of current product
	//             $.each(data.specifications, function(k, v) {
	//                 $('#pro_specification_tables').append('<tr><td>'+v.specification+'</td><td>'+v.description+'</td><td><button class="btn-delete-message "data-toggle="modal" data-target=".delete-pop"><i class="fas fa-trash-alt"></i></button> <button class="btn-delete-message " data-toggle="modal" data-target=".delete-edit"><i class="fas fa-edit"></i></button></td></tr>');
	//             });
	//             //clear inputs
	//             $('#attrib').val('');
	//             $('#description').val('');
	// 					}
						

	// 				}
	// 			},
	// 			error: function(data){
	// 				console.log('error',data);
	// 			}
	// 		});
	// 	}
		
	// });
</script>


<script>
    function changeProfile() {
      $('#pro_image_file').click();
    }
    $('#pro_image_file').change(function () {
      if ($(this).val() != '') {
        upload(this);
      }
    });
    function upload(img) {
			var url = "{{route('ExhibitorProductGalleryPagePost_q')}}";
			var saved_pro_id = sessionStorage.getItem("pro_id");
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
                	var data1 = "'"+data+"'";
                	console.log(data);
                  $('#file_name').val(data);
                  $('#photos_viewers').show();
                  // <button id="'+data+'" onclick="show_confirm("'+data+'")" class="btn btn-danger">X</button>
                  //$('#preview_image').attr('src', "{{asset('uploads/')}}/" + data);
                  $('#photos_viewers').append('<div class="col-lg-3 col-md-4 col-6"><div class="position-relative"><button class"btn-delete-btn-click" onclick="delete_image_name('+data1+')" style="    position: absolute;background-color: #e60000;border: none;color: #fff; border-radius:5px;"><i class="fas fa-trash-alt" ></i></button><img class="pro_img_preview"  src="{{url('/')}}/images/en/exhibitors/products_gallery/med/'+data.file_name+'" width="150" height="150" style="border-radius:5px;margin-bottom:10px;"></div></div>');
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
    

    function delete_image_name(image_name) {
    	$('#loading').css('display', 'block');
    	console.log(image_name);
    	
    	var url = "{{route('ajaxImageDelete')}}";
      if (image_name != '')
        if (confirm('Are you sure want to remove this image?'))
        {
          $('#loading').css('display', 'block');
          var form_data = new FormData();
          form_data.append('_method', 'POST');
          form_data.append('_token', '{{csrf_token()}}');
          form_data.append('pro_image', image_name);
          $.ajax({
              url: url,
              data: form_data,
              type: 'POST',
              contentType: false,
              processData: false,
              success: function (data) {
                  $('#preview_image').attr('src', '{{asset('images/noimage.jpg')}}');
                  location.reload();
              },
              error: function (xhr, status, error) {
                  alert(xhr.responseText);
                  $('#loading').css('display', 'none');
              }
          });
        }else{
        	$('#loading').css('display', 'none');
        }
    }

    
</script>
@endsection