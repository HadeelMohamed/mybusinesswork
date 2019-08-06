@extends('layouts.website')
@section('title','Products')
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
    @include('partials.member.admin_panel')
    <div class="row">
		@include('partials.member.side_bar')
    	<!--   ....................article....................-->
			<article class="col-md-9">
				<div class="container-dashborad">
				@include('partials.member.main_title')
				<form action="{{Route('ProductGalleryPagePost')}}" method="post" enctype="multipart/form-data" id="addGalleryImages_form">
					@csrf
					<div class="form-group">
				    <label for="pro_lang_id" id="lbl">@lang('website.language')</label>
				    <div class="header-search-select-item select-admin">
				      <select data-placeholder="All languages" class="chosen-select" name="pro_lang_id" id="pro_lang_id" required="">
				        <option selected disabled="" value="">All Languages</option>
				        @if(isset($member_details))
				          @foreach($languages as $language)
				            @if($language->id == $member_details->lang_id)
				            <option selected value="{{$language->id}}">{{$language->name}}</option>
				            
				            @endif
				          @endforeach
				        
				        @endif
				      </select>
				    </div>
				  </div>
					<input type="file" name="pro_image" required="">
					<input hidden="" name="lang_id" id="lang_id" value="">
					<input hidden="" name="pro_id" id="pro_id" value="">
					<button type="submit" class="btn btn-success btn-sm btn-cus"><i class="fas fa-edit"></i> Add Image</button>

				</form>
				
   			<div style="height:20px;"></div>
				<div class="table-scroll">
					<table id="table_id" class=" table table-bordered" >
				    <thead>
			        <tr>
			        	<!-- <th><center>@lang('website.order')</center></th> -->
		            <th><center>@lang('website.product_image')</center></th>
		            <th><center>@lang('website.status')</center></th>
		            <th><center>@lang('website.options')</center></th>
			        </tr>
				    </thead>
				    <tbody>
	          	@if(isset($pro_images))
	          	@foreach($pro_images as $pro_image)
	          	<tr>
			        <td><img src="{{url('/')}}/images/{{LaravelLocalization::getCurrentLocale()}}/products_gallery/thumb/{{$pro_image->image}}">{{$pro_image->image}}</td>
			        @if($pro_image->active == 1)
			        <td><center>@lang('website.active')</center></td>
			        @else
			        <td class="text-danger">@lang('website.deactive')</td>
			        @endif
			        <td>
								<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							    @lang('website.options')
							  </button>
							  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							    <a class="dropdown-item" href="#"><i class="fas fa-eye"></i> View</a>
							    <a class="dropdown-item" href="#"><i class="fas fa-edit"></i> Edit</a>
							    <a class="dropdown-item" href="#"><i class="fas fa-check"></i> Translations</a>
							    <a class="dropdown-item" href="#"><i class="fas fa-check"></i> Gallery</a>
							    <a class="dropdown-item" href="#"><i class="fas fa-check"></i> Active</a>
					        <a class="dropdown-item" data-toggle="modal" data-target=".delete-pop" style="cursor:pointer" ><i class="fas fa-trash-alt"></i> Delete</a>

							  </div>
							</td>
							</tr>
							@endforeach
							@endif
							    
						</tbody>
					</table>
				</div>	
			</article>
		</div>
	</div>
</div>




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
	$('#pro_lang_id').hide();
	$('.nice-select').hide();
	$('#lbl').hide();
    $('#addGalleryImages_form').submit(function(){
    	var saved_pro_id = sessionStorage.getItem("pro_id");
    	var saved_lang_id = sessionStorage.getItem("lang_id");
    	$('#pro_id').val(saved_pro_id);
    	$('#lang_id').val(saved_lang_id);
    });
} );
</script>

@endsection