@extends('layouts.website')
@section('title','Home')
@section('content')
@php 
	$pages = $members->total() / 20 ;
	$pages = round($pages,0);
	$currentPage = $members->currentPage();
@endphp
<script type="text/javascript">
	
</script>
	<script type="text/javascript">
	function send_url_pagination_up(page){
		var url_up = window.location.href;
		var url_up = url_up.split('&page=')[0];
		// console.log(url,pure_url,pure_url+'&page='+page);
		window.location.href = url_up+"&page="+page;

	}

	function send_url_pagination_down(page){
		var url_down = window.location.href;
		var url_down = url_down.split('&page=')[0];
		// console.log(url,pure_url,pure_url+'&page='+page);
		window.location.href = url_down+"&page="+page;

	}


	function nextFunction_up(page){

		var new_page = page + 1 ;
		var url_down = window.location.href;
		var url_down = url_down.split('&page=')[0];
		// console.log(url,pure_url,pure_url+'&page='+page);
		window.location.href = url_down+"&page="+new_page;
	}

	function prevFunction_up(page){
		var new_page = page - 1 ;
		var url_down = window.location.href;
		var url_down = url_down.split('&page=')[0];
		// console.log(url,pure_url,pure_url+'&page='+page);
		window.location.href = url_down+"&page="+new_page;
	}

	function nextFunction_down(){
		console.log('next_down');
	}

	function prevFunction_down(page){
		var page = page--;
		var url_down = window.location.href;
		var url_down = url_down.split('&page=')[0];
		// console.log(url,pure_url,pure_url+'&page='+page);
		window.location.href = url_down+"&page="+page;
	}
</script>
<style>
.paging-page{
	margin-top:20px;
}
.paging-page li a{


border: none;
margin:0px !important;
border-bottom: 1px solid #b3b1b1;
	
}
.page-item.active .page-link {
	background:#e60000 !important;
	position:relative;
}

.last-next{
border-right: 1px solid #e9ecef !important;
}

.last-prev{
border-left: 1px solid #e9ecef !important;
}

</style>

<style type="text/css">
	.more {
		float: left;
	}
	.less {
		float: left;
	}
	.slide-sec {
    max-height: 300px;
    min-height: auto;
}
</style>
 <!--...........................header-div...................-->
<div class="profile-company position-relative"  style="background-image:url({{asset('website/images/construction.jpg')}}">
	<!-- <div class="overlay-profile"></div> -->
	<div class="bubble-bg"></div>
	
</div>
<h1 class="h1-page">@lang('website.companies')</h1>
<!--...........................inner-search...................-->
<div class="inner-search">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-6 col-sm-12">
				<input class="form-control input-search" placeholder="{{trans('website.search...')}}" value="{{$search_value}}" name="search" id="searchDemo">
				
			</div>
			<div class="col-lg-2 col-md-6 col-sm-12">
				<div class="header-search-select-item back-gray-sec">
					<select data-placeholder="{{trans('website.account_type')}}" class="chosen-select" name="account_type_id" required="" id="AccountTypeIdDemo">
            <option value="0" selected="">{{trans('website.account_type')}}</option>
            @if(isset($account_type_id))
    	        @foreach($account_types as $account_type)
	  	          @if($account_type->gener_id == $account_type_id)
		  	          <option selected value="{{$account_type->gener_id}}">{{$account_type->name}}</option>
		            @else
	            		<option value="{{$account_type->gener_id}}">{{$account_type->name}}</option>
	            	@endif
	            @endforeach

            @else
            	@foreach($account_types as $account_type)
	            	<option value="{{$account_type->gener_id}}">{{$account_type->name}}</option>
	            @endforeach
            @endif
          </select>
	    	</div>
	  	</div>

			<div class="col-lg-3 col-md-6 col-sm-12">
				<div class="header-search-select-item back-gray-sec">
					<select data-placeholder="All Categories" class="chosen-select" name="category_id" required="" id="CategoryIdDemo">
            <option value="0" selected="">{{trans('website.all_categories')}}</option>
            @foreach($categories as $category)
	            @if($category->id == $category_id)
	            <option selected value="{{$category->id}}">{{$category->name}}</option>
	            @else
	            <option value="{{$category->id}}">{{$category->name}}</option>
	            @endif
            @endforeach
          </select>
	    	</div>
	  	</div>
	    <div class="col-lg-3 col-md-6 col-sm-12">
	    	<div class="header-search-select-item back-gray-sec">
		      <select data-placeholder="All Countries" class="chosen-select" name="country_id" required="" id="CountryIdDemo">
            <option value="0" selected="">{{trans('website.all_countries')}}</option>

            @foreach($countries as $country)
            @if($country->id == $country_id)
            <option selected value="{{$country->id}}">{{$country->name}}</option>
            @else
            <option value="{{$country->id}}">{{$country->name}}</option>
            @endif
            @endforeach
          </select>
	  		</div>
	  	</div>
			<!-- <div class="col-lg-3 col-md-6 col-sm-12">
				<div class="header-search-select-item back-gray-sec">
	        <select data-placeholder="All Categories" class="chosen-select">
	          <option>All Categories</option>
	          <option>Shops</option>
	          <option>Hotels</option>
	          <option>Restaurants</option>
	          <option>Fitness</option>
	          <option>Events</option>
	        </select>
	    	</div>
	    </div> -->
	   
	     <input hidden="" name="page" value="1">
			<div class="col-12">
				<button class="btn back-red btn-search-result" onclick="SendSearchRequest()">
					<i class="fas fa-search"></i>
					@lang('website.search')
				</button>
			</div>               
		</div>
	</div>
</div>
<!--...........................inner-result...................-->


<!--...........................inner-result...................-->
{{--
{{dd($members->links(),$members->currentPage(),$members->firstItem(),$members->count(),$members->getOptions(),$members->hasMorePages(),$members->lastItem(),$members->lastPage(),$members->nextPageUrl(),$members->onFirstPage(),$members->perPage(),$members->perPage(),$members->previousPageUrl(),$members->total())}}
--}}
{{-- {{ $members->onEachSide(1)->links() }} --}}


<!-- <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul> -->

<div class="section-co">
	<div class="container" id="paging_container8">
		<ul class="pagination paging-page">

			@if($currentPage >=1 && $currentPage <= 5)
			<li class="page-item disabled">
				<a class="page-link last-next">
					@if(LaravelLocalization::getCurrentLocale() == 'en')
						<i class="fas fa-angle-left"></i>
					@else
						<i class="fas fa-angle-right"></i>
					@endif
					</a>
			</li>
			@else
			<li class="page-item" onclick="prevFunction_up({{$currentPage}});">
				<a class="page-link last-next">
					@if(LaravelLocalization::getCurrentLocale() == 'en')
						<i class="fas fa-angle-left"></i>
					@else
						<i class="fas fa-angle-right"></i>
					@endif
					</a>
			</li>
			@endif

			<!-- pages -->
			<!-- first 5 pages -->
			@if($currentPage >=1 && $currentPage <= 5)

			@php 
				$start = 1;
				$end = 5;
			@endphp
				@for($i = 1 ; $i < 6; $i++)
					@if($currentPage == $i)
		  			<li class="page-item active"><a class="page-link" onclick="send_url_pagination_up({{$i}});">{{$i}}</a></li> 
					@else
						<li class="page-item"><a class="page-link" onclick="send_url_pagination_up({{$i}});">{{$i}}</a></li> 
					@endif
				@endfor

			@else

			@php 
				$start = $currentPage - 3;
				$end = $currentPage + 1; 
			@endphp
			@if($end == $pages) <!-- no more pages -->
				@php
					$start = $currentPage - 3;
					$end = $currentPage + 1;
				@endphp
			@else
				@php
					$start = $currentPage - 3;
					$end = $currentPage + 1;
				@endphp
			@endif
				@for($i = $start ; $i < $end; $i++)
					@if($currentPage == $i)
		  			<li class="page-item active"><a class="page-link" onclick="send_url_pagination_up({{$i}});">{{$i}}</a></li> 
					@else
						<li class="page-item"><a class="page-link" onclick="send_url_pagination_up({{$i}});">{{$i}}</a></li> 
					@endif
				@endfor

			@endif
			<!-- end pages -->

			@if($currentPage == $pages)
				<li class="page-item disabled">
					<a class="page-link last-prev">
						@if(LaravelLocalization::getCurrentLocale() == 'en')
							<i class="fas fa-angle-right"></i>
						@else
							<i class="fas fa-angle-left"></i>
						@endif
					</a>
				</li>
			@else
				<li class="page-item" onclick="nextFunction_up({{$currentPage}});">
					<a class="page-link last-prev">
						@if(LaravelLocalization::getCurrentLocale() == 'en')
							<i class="fas fa-angle-right"></i>
						@else
							<i class="fas fa-angle-left"></i>
						@endif
					</a>
				</li>
			@endif


		</ul>

		
<br>
		<ul class="row content">

			@foreach($members as $member)
      <li class="col-lg-3 col-sm-6 item-co">
        <a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/{{$member->slug}}" class="hvr-grow">
					<div class="item-company">
	          <div>
  		        <div class="position-relative">
        				@if(isset($member->profile_cover))
		            		<img src="{{asset('images')}}/en/med/{{$member->profile_cover}}" class="img-company">
		                @else
							<img src="{{asset('website/images/construction.jpg')}}" class="img-company">
		                @endif
                <div class="row">
                	 @if(isset($member->profile_pic))
                          <img src="{{asset('images')}}/en/med/{{$member->profile_pic}}" class="logo-company"></div>
                        @else
                            <img src="{{asset('website/images/')}}/logo-company-stantard-{{LaravelLocalization::getCurrentLocale()}}.jpg" class="logo-company"></div>
                    @endif
	                
                </div>
              </div>
              <div class="padding-div">
                <h3>{{$member->member_name}}</h3>
                <p>{{$member->category_name}}</p>
                <!-- <div class="row"> -->
	                <!-- <div class="col-12"> -->
	                	<!-- <div class="star-float"> -->
	                		<!-- <input class="rb-rating" value="{{$member->rate}}" type="text" data-min=0 data-max=5 data-step=1 disabled  /> -->
	                	<!-- </div> -->
	                
	                <!-- </div> -->
  	            <!-- </div> -->
  	            
    	          <div class="address-co">
    	          	<div class="row">
    	          		<div class="col-6">
      	          <p>
        	        	<i class="fas fa-map-marker-alt color-red"></i>
        	        	@if(isset($member->country))
										{{$member->country}}
										@endif
									</p>
									</div>
									{{--
										@if($member->online == 1)
											<!-- <p style="font-size: 70px; color:green;">Online</p> -->
										@else
											<!-- <p style="font-size: 70px; color:red;">Offline</p> -->
										@endif
										--}}
	    	          		<div class="col-6 text-right">
	  	          			  <p>	<i class="fas fa-eye color-red"></i>  @if(isset($member->viewed)) {{$member->viewed}} @endif</p>
										</div>

									</div>
           	    </div>
           	    
            	</div>
          	</div>
					</a> 
			</li>
			@endforeach
		</ul>
		
		
</ul>
<ul class="pagination paging-page">

			@if($currentPage >=1 && $currentPage <= 5)
			<li class="page-item disabled">
				<a class="page-link last-next">
					@if(LaravelLocalization::getCurrentLocale() == 'en')
						<i class="fas fa-angle-left"></i>
					@else
						<i class="fas fa-angle-right"></i>
					@endif
					</a>
			</li>
			@else
			<li class="page-item" onclick="prevFunction_up({{$currentPage}});">
				<a class="page-link last-next">
					@if(LaravelLocalization::getCurrentLocale() == 'en')
						<i class="fas fa-angle-left"></i>
					@else
						<i class="fas fa-angle-right"></i>
					@endif
					</a>
			</li>
			@endif

			<!-- pages -->
			<!-- first 5 pages -->
			@if($currentPage >=1 && $currentPage <= 5)

			@php 
				$start = 1;
				$end = 5;
			@endphp
				@for($i = 1 ; $i < 6; $i++)
					@if($currentPage == $i)
		  			<li class="page-item active"><a class="page-link" onclick="send_url_pagination_up({{$i}});">{{$i}}</a></li> 
					@else
						<li class="page-item"><a class="page-link" onclick="send_url_pagination_up({{$i}});">{{$i}}</a></li> 
					@endif
				@endfor

			@else

			@php 
				$start = $currentPage - 3;
				$end = $currentPage + 1; 
			@endphp
			@if($end == $pages) <!-- no more pages -->
				@php
					$start = $currentPage - 3;
					$end = $currentPage + 1;
				@endphp
			@else
				@php
					$start = $currentPage - 3;
					$end = $currentPage + 1;
				@endphp
			@endif
				@for($i = $start ; $i < $end; $i++)
					@if($currentPage == $i)
		  			<li class="page-item active"><a class="page-link" onclick="send_url_pagination_up({{$i}});">{{$i}}</a></li> 
					@else
						<li class="page-item"><a class="page-link" onclick="send_url_pagination_up({{$i}});">{{$i}}</a></li> 
					@endif
				@endfor

			@endif
			<!-- end pages -->

			@if($currentPage == $pages)
				<li class="page-item disabled">
					<a class="page-link last-prev">
						@if(LaravelLocalization::getCurrentLocale() == 'en')
							<i class="fas fa-angle-right"></i>
						@else
							<i class="fas fa-angle-left"></i>
						@endif
					</a>
				</li>
			@else
				<li class="page-item" onclick="nextFunction_up({{$currentPage}});">
					<a class="page-link last-prev">
						@if(LaravelLocalization::getCurrentLocale() == 'en')
							<i class="fas fa-angle-right"></i>
						@else
							<i class="fas fa-angle-left"></i>
						@endif
					</a>
				</li>
			@endif


		</ul>

<br>
	</div>
</div>


<div class="clear"></div>

<form method="GET" action="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Search/Companies" id="SearchRequestForm">
	<input hidden="" name="account_type_id" value="0" id="AccountTypeIdValue">
  <input hidden="" name="category_id" value="0" id="CategoryIdValue">
  <input hidden="" name="country_id" value="0" id="CountryIdValue">
  <input hidden="" name="search" id="SearchValue">
  <input hidden="" name="url" id="request_url">
  <!-- <input hidden="" name="page" value="{{$page}}" id="PageValue"> -->
</form>
@include('partials.website.footer')
<script src="{{asset('website/js/paginga.jquery.js')}}" ></script>
<script src="{{asset('website/js/star-rating.js')}}" type="text/javascript"></script>
<script src="{{asset('website/js/plugins.js')}}" ></script>
<script src="{{asset('website/js/script.js')}}" ></script>

<script>

	// function send_url_pagination_up(page){
	// 	console.log(page);
	// 	return false;
	// 	// sessionStorage.setItem("currentPageNo", page);
	// 	// var url = "{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Search/Companies?account_type_id=0&category_id=0&country_id=0&search=";
	// 	// var page_path =  url+'&page='+page;
	// 	// window.location.href = 	page_path;
	// }  


	$(document).ready(function(){

		var url = window.location.href;

		var pure_url = url.substring(0, url.indexOf("&page="));

});
	$('#prevBtn').click(function(){
		console.log('prev');
		return false;
	});

	$('#nextBtn').click(function(){
		console.log('next');
		return false;
	});

	

	$('#searchDemo').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
    	$('#SearchValue').val($('#searchDemo').val());
			$('#AccountTypeIdValue').val($('#AccountTypeIdDemo').val());
			$('#CategoryIdValue').val($('#CategoryIdDemo').val());
			$('#CountryIdValue').val($('#CountryIdDemo').val());
			// $('#PageValue').val('1');
			$('#request_url').val(sessionStorage.getItem("raw_url"));
      $('#SearchRequestForm').submit();
    }
	});
	function SendSearchRequest(){
		$('#SearchValue').val($('#searchDemo').val());
		$('#AccountTypeIdValue').val($('#AccountTypeIdDemo').val());
		$('#CategoryIdValue').val($('#CategoryIdDemo').val());
		$('#CountryIdValue').val($('#CountryIdDemo').val());
		// $('#PageValue').val('1');
		$('#request_url').val(sessionStorage.getItem("raw_url"));
		$('#SearchRequestForm').submit();
	}
</script>

	

@endsection