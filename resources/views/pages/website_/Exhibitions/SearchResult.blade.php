@extends('layouts.website')
@section('title','Exhibitions')
@section('content')

<style type="text/css">
	.more {
		float: left;
	}
	.less {
		float: left;
	}
</style>
 <!--...........................header-div...................-->
<div class="profile-company position-relative"  style="background-image:url({{asset('website/images/construction.jpg')}}">
	<!-- <div class="overlay-profile"></div> -->
	<div class="bubble-bg"></div>
</div>

<h1 class="h1-page">@lang('website.exhibitions')</h1>

<!--...........................inner-search...................-->
<div class="inner-search">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<form method="get" action="{{route('SearchResultExhibitions')}}">
					<div class="exhibtion-div">
	 					<input class="form-control input-search" placeholder="{{trans('website.search...')}}" name="q" value="{{$q}}">
	 				</div>
					<div class="exhibtion-div">
						<div class="header-search-select-item back-gray-sec">
							<select data-placeholder="{{trans('website.all_categories')}}" class="chosen-select" name="cat">
	              <option value="0">@lang('website.all_categories')</option>
	              @foreach($exhibitionCategories as $category)
	              @if($cat_id == $category->exh_cat_id)
		              <option selected="" value="{{$category->exh_cat_id}}">{{$category->cat_name}}</option>
	              @else
	              <option value="{{$category->exh_cat_id}}">{{$category->cat_name}}</option>
	              @endif
	              @endforeach
	          	</select>
	          </div>
	        </div>
	    		<!-- <div class="exhibtion-div">
						<div class="header-search-select-item back-gray-sec">
							<select data-placeholder="{{trans('website.all_countries')}}" class="chosen-select" name="country">
	              <option value="0">@lang('website.all_countries')</option>
	              @foreach($countries as $country)
	              @if($country_id == $country->id)
		              <option selected="" value="{{$country->id}}">{{$country->name}}</option>
	              @else
	              <option value="{{$country->id}}">{{$country->name}}</option>
	              @endif
	              @endforeach
	          	</select>
	          </div>
	        </div> -->
					<button class="btn back-red btn-search-result"><i class="fas fa-search"></i> @lang('website.search')</button>         
				</form>
			</div>
			<div class="col-md-9">
				<div class="" id="paging_container8">
					<ul class=" content">
						@if(isset($exhibitions))
						@foreach($exhibitions as $exhibition)
						<li class="li-exbhibtion hvr-bob">
							<div class="item-exhibtion">
								<a href="{{url('/Exhibitions')}}/{{$exhibition->slug}}" class="display-block" >
								<div class="container-fluid">
									<div class="row">
										<div class="col-md-4">
											<div class="row">
												<div class="position-relative">
													<!-- <div class="view-exhbition">
														<i class="fas fa-eye color-red"></i> 4545
													</div> -->
	  											<img src="{{asset('website/images/ser1.jpg')}}" class="img-exbition"  alt="">
	  										</div>
  										</div>
   									</div>
										<div class="col-md-8">
											<div class="padding-exhbtion-item">
												<h3>{{$exhibition->name}}</h3>
												<p class="p-ex">
													{{$exhibition->summary}}
												</p>
												<div class="border-item">
													<div class="container-fluid">
														<div class="row">
															<div class="col-sm-6">
																<p class="p-exhbition">
																	<i class="fas fa-calendar-alt"></i>
																		@lang('website.start_at') : {{$exhibition->start}}
 																</p>
															</div>
															<div class="col-sm-6">
																<p class="p-exhbition">
																	<i class="fas fa-calendar"></i>
																	@lang('website.finish_at') : {{$exhibition->end}}
																</p>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</a>
						</div>
					</li>
					@endforeach
					@endif



</ul>

				<div class="page_navigation"></div>

<div class="clear"></div>

</div>
  
  
  </div>
  
  
  </div>
  </div>
  

  </div>
  
  
       <!--...........................inner-result...................-->


@include('partials.website.footer')
<script src="{{asset('website/js/plugins.js')}}" type="text/javascript"></script>
<script src="{{asset('website/js/script.js')}}" ></script>
<script src="{{asset('website/js/social.js')}}" ></script>
<script src="{{asset('website/js/paginga.jquery.js')}}" ></script>
<script src="{{asset('website/js/star-rating.js')}}" ></script>
<script src="{{asset('website/js/jquery.dataTables.js')}}" ></script>
</script><script src="{{asset('website/js/jquery.hoverdir.js')}}" ></script>
<script src="{{asset('website/js/my-js.js')}}" ></script>

        <script>
		$(document).ready(function(){
				$('#paging_container8').pajinate({
					num_page_links_to_display : 10,
					items_per_page : 10	
				});
			});     
		</script>
<!-- ........................for only page.................-->

<script>
$('.rb-rating').rating({
												'showCaption': true,
												'stars': '5',
												'min': '0',
												'max': '3',
												'step': '1',
												'size': 'xs',
											});
</script>






<!-- paging -->






@endsection