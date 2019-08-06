@extends('layouts.website')
@section('title','Product Translations')
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
				<a id="GoToNewProduct" href="{{route('Authed_Member_Products_Create')}}" class="btn btn-secondary btn-sm btn-cus"><i class="fas fa-plus"></i> @lang('website.new_product')</a>
				<a id="GoToNewProduct" href="{{route('Authed_Member_Product_Translations')}}" class="btn btn-secondary btn-sm btn-cus"><i class="fas fa-plus"></i> @lang('website.new_translations')</a>
				<a id="GoToNewProduct" href="{{route('Authed_Member_Product_Galleries')}}" class="btn btn-secondary btn-sm btn-cus"><i class="fas fa-plus"></i> @lang('website.new_gallery')</a>
				<div class="form-group">
			    <label for="pro_lang_id">@lang('website.language')</label>
			    <div class="header-search-select-item select-admin">
			      <select data-placeholder="All languages" class="chosen-select" name="pro_lang_id" id="pro_lang_id" required="">
			        <option selected disabled="" value="">All Languages</option>
			        @if(isset($languages))
			          @foreach($languages as $language)
			            @if($language->id)
			            <option selected value="{{$language->id}}">{{$language->name}}</option>
			            @else
			            <option value="{{$language->id}}">{{$language->name}}</option>
			            @endif
			          @endforeach
			        @else
			           @foreach($languages as $language)
			            <option value="{{$language->id}}">{{$language->name}}</option>
			          @endforeach
			        @endif
			      </select>
			    </div>
			  </div>

			  <div class="form-group">
			    <label for="pro_lang_id">@lang('website.products')</label>
			    <div class="header-search-select-item select-admin">
			      <select data-placeholder="All languages" class="chosen-select" name="pro_lang_id" id="pro_lang_id" required="">
			        <option selected disabled="" value="">@lang('website.all_products')</option>
			        @if(isset($MasterProducts))
			          @foreach($MasterProducts as $matserProduct)
			            @if($language->id)
			            <option selected value="{{$matserProduct->id}}">{{$matserProduct->name}}</option>
			            @else
			            <option value="{{$matserProduct->id}}">{{$matserProduct->name}}</option>
			            @endif
			          @endforeach
			        @else
			           @foreach($MasterProducts as $matserProduct)
			            <option value="{{$matserProduct->id}}">{{$matserProduct->name}}</option>
			          @endforeach
			        @endif
			      </select>
			    </div>
			  </div>

			  <div class="form-group">
			    <label for="pro_description">Describtion</label>
			    <textarea type="text" class="form-control" id="pro_description" name="pro_description" aria-describedby="textHelp" placeholder=""></textarea>
			  </div>

   			<div style="height:20px;"></div>
				<div class="table-scroll">
					<table id="table_id" class=" table table-bordered" >
				    <thead>
			        <tr>
			        	<!-- <th><center>@lang('website.order')</center></th> -->
		            <th><center>@lang('website.product_name')</center></th>
		            <th><center>@lang('website.status')</center></th>
		            <th><center>@lang('website.options')</center></th>
			        </tr>
				    </thead>
				    <tbody>
		          
	          	@if(isset($member_products))
	          	@foreach($member_products as $member_product)
	          	<tr>
          		<!-- <td><center>{{$member_product->pro_order}}</center></td> -->
			        <td>{{$member_product->name}}</td>
			        @if($member_product->active == 1)
			        <td><center>@lang('website.active')</center></td>
			        @else
			        <td class="text-danger">@lang('website.deactive')</td>
			        @endif
			        <td>
								<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							    @lang('website.options')
							  </button>
							  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							    <a class="dropdown-item" href="{{url('/')}}/Account/MemberProductView/{{$member_product->id}}"><i class="fas fa-eye"></i> View</a>
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
    $('#GoToNewProduct').click(function(){
    	sessionStorage.clear();
    });
} );
</script>

@endsection