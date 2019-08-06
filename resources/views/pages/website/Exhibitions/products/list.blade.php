@extends('layouts.website')
@section('title','Products')
@section('content')
@php
$subscribed = DB::table('exh_exhibitors_subscribes')->where('exh_id',$exhibitor_details->exh_id)->where('exhibitor_id',$exhibitor_details->exhibitor_id)->where('paid',1)->count();
$exhibitor_profile = DB::table('exhibitor_details')->where('exh_id',$exhibitor_details->exh_id)->where('user_id',$exhibitor_details->exhibitor_id)->count();
@endphp
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
    @include('partials.member.admin_panel')
    <div class="row">
		@include('partials.member.exhibition_side_bar')
    	<!--....................article....................-->
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
        <a class="a-tabs" href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibition/join_exhibitor/{{$exh_slug}},2">@lang('website.exhibitor_information')</a>  <a class="a-tabs a-tabs-active" href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibition/join_exhibitor_products/{{$exh_slug}}">@lang('website.products')</a>
      </div>
				<a id="GoToNewProduct" href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibitor/join_exhibitorProductsCreate/{{$exh_slug}}" class="btn btn-secondary btn-sm btn-cus"><i class="fas fa-plus"></i> @lang('website.new_product')</a>
				@if(count($member_products) > 0)
				
				<!-- <a id="GoToNewProduct" href="{{route('Authed_Member_Product_Galleries')}}" class="btn btn-secondary btn-sm btn-cus"><i class="fas fa-plus"></i> @lang('website.new_gallery')</a> -->
				@endif
   			<div style="height:20px;"></div>
				<div class="table-scroll">
					<table id="table_id" class=" table table-bordered" >
				    <thead>
			        <tr>
			        	<!-- <th><center>@lang('website.order')</center></th> -->
		            <th><center>@lang('website.product_name')</center></th>
		            <th><center>@lang('website.status')</center></th>
		            <th><center>@lang('website.options')</center></th>
		            <!-- <th><center>@lang('website.options')</center></th> -->
			        </tr>
				    </thead>
				    <tbody>
	          	@if(isset($member_products))
	          	@foreach($member_products as $member_product)
	          	<tr id="tr_{{$member_product->id}}">
          		<!-- <td><center>{{$member_product->pro_order}}</center></td> -->
			        <td>{{$member_product->name}}</td>
			        @if($member_product->active == 1)
			        <td><center>@lang('website.active')</center></td>
			        @else
			        <td class="text-danger"><center><i class="fas fa-eye-slash text-danger"> @lang('website.deactive')</center></td>
			        @endif
			        <td>
			        	<center><a class="dropdown-item" onclick="get_id({{$member_product->id}})" data-toggle="modal" data-target=".delete-pop" style="cursor:pointer" ><i class="fas fa-trash-alt"></i> @lang('website.delete')</a></center>
			        </td>
			        <!-- <td> -->
								<!-- <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" onclick="get_id({{$member_product->id}})" value="{{$member_product->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							    @lang('website.options')
							  </button> -->
							  <!-- <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"> -->
							    <!-- <a class="dropdown-item" href="{{url('/')}}/Account/MemberProductView/{{$member_product->id}}"><i class="fas fa-eye"></i> @lang('website.view')</a> -->
							  <!--   <a class="dropdown-item" href="{{url('/')}}/Account/Member_Product_Edit/{{$member_product->id}}">
                                        <i class="fas fa-edit"></i>{{ __('edit') }}
                                    </a> -->

                                    
							    <!-- <a class="dropdown-item" href="#"><i class="fas fa-check"></i> Gallery</a> -->
							    <!-- <a class="dropdown-item" href="{{ route('ProductSpecificationActive') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('activations-form{{$member_product->id}}').submit();">
                                        @if($member_product->active != 1)<i class="fas fa-eye"></i> @lang('website.active') @else <i class="fas fa-eye-slash text-danger"></i>@lang('website.deactive') @endif
                                    </a> -->

                                    <!-- <form id="activations-form{{$member_product->id}}" action="{{ route('ProductSpecificationActive') }}" method="POST" style="display: none;">
                                        @csrf -->
                                        <!-- <input hidden="" name="lang" value="{{LaravelLocalization::getCurrentLocale()}}"> -->
                                        <!-- <input hidden="" name="pro_id" value="{{$member_product->id}}">
                                    </form> -->
					        <!-- <a class="dropdown-item" data-toggle="modal" data-target=".delete-pop" style="cursor:pointer" ><i class="fas fa-trash-alt"></i> @lang('website.delete')</a> -->

							  <!-- </div> -->
							<!-- </td> -->
							</tr>
							@endforeach
							@endif
							    
						</tbody>
					</table>
					@if($subscribed < 1)
					<div class="text-center">
						<center><a  id="subscribe_btn" class="btn btn-danger text-white btn-lg">@lang('website.subscribe')</a></center>
					</div>
					@else
					@if($subscribed > 0)
<div class="col-md-4">
  <div class="text-center-center">
  <a class="btn btn-danger text-white" href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/ExhibitorPreview/{{$exh_slug}}/{{$exhibitor_details->slug}}">@lang('website.preview')</a>
</div>

</div>
@endif
					@endif
				</div>	
			</article>
		</div>
	</div>
</div>

<input hidden="" name="" id="member_product_id">

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
	            <button class="btn btn-outline-light" data-dismiss="modal">No</button>  
		        </div>
	        </div>   
	      </div>
      </div>
    </div>
  </div>
</div>

<form id="ConfirmExhibitionSubscribeForm" method="post" action="{{route('ConfirmExhibitionSubscribe')}}">
  @csrf
  <input hidden="" name="exhibitor_id" value="{{Auth::user()->id}}">
  <input hidden="" name="exh_id" value="{{$exhibitor_details->exh_id}}">
  <input hidden="" name="wallet" value="{{Auth::user()->wallet}}">
  <input hidden="" name="exh_slug" value="{{$exh_slug}}">
  <input hidden="" name="flag" value="1">
</form>


@include('partials.website.footer')
<script>
$(document).ready( function () {

  $('#GoToNewProduct').click(function(){
  	sessionStorage.clear();
  });

  $('#dropdownMenuButton').click(function(){
  	console.log(this.value);
  });

   $('#subscribe_btn').click(function(){
    $('#ConfirmExhibitionSubscribeForm').submit();
  });

  $('#confirmDelete').click(function(){
  	// rquest ajax delete
  	var pro_id = $('#member_product_id').val();
  	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  	var url = "{{route('DeleteExhibitionProduct')}}";
  	var exh_id = "{{$exhibitor_details->exh_id}}";
  	//submit ajax
		$.ajax({
			/* the route pointing to the post function */
			url: url,
			type: 'POST',
			/* send the csrf-token and the input to the controller */
			data: {
							_token: CSRF_TOKEN,
							pro_id:pro_id,
							exh_id:exh_id,
						},
			dataType: 'JSON',
			/* remind that 'data' is the response of the AjaxController */
			success: function (data) {
				console.log(data);
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
				location.reload();
			}
			
			},
			error: function(data){
				console.log(data);
				console.log('error');
			}
		});

  });
});

function get_id(id){
	$('#member_product_id').val(id);
}
</script>

@endsection