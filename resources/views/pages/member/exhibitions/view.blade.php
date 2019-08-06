@extends('layouts.website')
@section('title','Exhibitions')
@section('content')
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
<!--...........................for only page...................-->
<link href="{{asset('website/css/dashboard.css')}}" media="all" rel="stylesheet" type="text/css"/>
<link href="{{asset('website/css/jquery.dataTables.css')}}" media="all" rel="stylesheet" type="text/css"/>
<style type="text/css">
  #dd{
    border: 1px solid red;
  }
</style>
<!--...........................profile-head...................-->
<div class="big-dash">
  <div class="container">
    @include('partials.member.admin_panel_empty')
    <div class="row">
		@include('partials.member.side_bar')
    	<!--   ....................article....................-->
			<article class="col-md-9">
				<div class="container-dashborad">
					@include('partials.member.main_title')
	   				<div style="height:20px;"></div>
	   				<div class="clear"></div>
					<div class="card">
	   				<div class="card-header">
   						@lang('website.exhibition')
  					</div>
					  <div class="card-body">
					  	<div class="form-group">
							<label for="name">@lang('website.exhibition_name')</label> : <span>{{$exhibition->name}}</span>
						</div>	

						<div class="form-group">
							<label for="name">@lang('website.start_at')</label> : <span>{{$exhibition->start}}</span>
						</div>

						<div class="form-group">
							<label for="name">@lang('website.finish_at')</label> : <span>{{$exhibition->end}}</span>
						</div>

						<div class="form-group">
							<label for="name">@lang('website.business_type')</label> : <span>{{$exhibition->cat_name}}</span>
						</div>

						<div class="form-group">
							<label for="name">@lang('website.views')</label> : <span>{{$exhibition->viewers}}</span>
						</div>

						</div>

				</div>

<br>
<div class="text-center"><a href="{{url('/')}}/Account/MemberExhibitions" class="btn btn-dark">@lang('website.back')</a></div>

				<!-- <div class="clear"></div>
					<div class="card">
	   				<div class="card-header">
   						@lang('website.exhibition')
  					</div>
					  <div class="card-body">
					  	<div class="form-group">
							<label for="name">@lang('website.exhibition_name')</label> : <span>{{$exhibition->name}}</span>
						</div>	

						<div class="form-group">
							<label for="name">@lang('website.start_at')</label> : <span>{{$exhibition->start}}</span>
						</div>

						<div class="form-group">
							<label for="name">@lang('website.finish_at')</label> : <span>{{$exhibition->end}}</span>
						</div>

						<div class="form-group">
							<label for="name">@lang('website.business_type')</label> : <span>{{$exhibition->cat_name}}</span>
						</div>

						</div> -->

				</div>



		</div>  

	   				


				
			</article>
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
              <button id="confirmDelete" class="btn btn-outline-light" data-dismiss="modal">Yes</button>  
	            <button class="btn btn-outline-light"  data-dismiss="modal">No</button>  
		        </div>
	        </div>   
	      </div>
      </div>
    </div>
  </div>
</div>


<input hidden="" id="member_product_id">

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('website/js/jquery-2.1.1.js')}}" ></script>
<script src="{{asset('website/js/popper.min.js')}}" ></script>
<script src="{{asset('website/js/bootstrap.min.js')}}" ></script>

<!-- social -->
<script src="{{asset('website/js/plugins.js')}}" type="text/javascript"></script>
<script src="{{asset('website/js/script.js')}}" ></script>
<script src="{{asset('website/js/social.js')}}" ></script>
<script src="{{asset('website/js/my-js.js')}}" ></script>
<script src="{{asset('website/js/sweetalert.min.js')}}" ></script>
<script type="text/javascript" src="{{asset('website/js/jquery.dataTables.js')}}"></script>
<script>
$(document).ready( function () {

  $('#GoToNewProduct').click(function(){
  	sessionStorage.clear();
  });

  $('#dropdownMenuButton').click(function(){
  	console.log(this.value);
  });

  $('#confirmDelete').click(function(){
  	// rquest ajax delete
  	var pro_id = $('#member_product_id').val();
  	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  	var url = "{{route('Member_Product_Delete')}}";
  	//submit ajax
		$.ajax({
			/* the route pointing to the post function */
			url: url,
			type: 'POST',
			/* send the csrf-token and the input to the controller */
			data: {
							_token: CSRF_TOKEN,
							pro_id:pro_id,
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
				console.log(pro_id);
				$('#tr_'+pro_id).remove();
				swal("Success", data.message, "success");
			}
			
			},
			error: function(data){
				console.log('error');
			}
		});

  });
});

function get_id(id){
	console.log('on click: '+id);
	$('#member_product_id').val(id);
}
</script>

@endsection