@extends('layouts.website')
@section('title','Home')
@section('content')

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
.blog_height{
	height: 180px !important;
}
</style>

 <!--...........................header-div...................-->
<div class="profile-company position-relative"  style="background-image:url({{asset('website/images/construction.jpg')}}">
	<!-- <div class="overlay-profile"></div> -->
	<div class="bubble-bg"></div>
	
</div>
<!--  -->
<!--  -->
<!--  -->
 <!--...........................profile-head...................-->

<!--...........................section location...................-->
<div class="section-location" >
  <div class="container">
    <div class="row">
      <!-- <div class="col-lg-3">
        <div class="exhibtion-div">
					<input class="form-control input-search" placeholder="search...">
 				</div> -->
				<!-- <div class="exhibtion-div">
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
	    	<!-- <div class="exhibtion-div">
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
		<!-- 		<button class="btn back-red btn-search-result"><i class="fas fa-search"></i> Search</button>
        <h3 class="h3-blog">adv</h3>
				<img src="{{asset('website/images/adv.jpg')}}" width="100%" class="adv" alt=""> 
        <h3 class="h3-blog">Social</h3>
				<ul class="social-media">
					<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
					<li><a href="#"><i class="fab fa-twitter"></i></a></li>
					<li><a href="#"><i class="fab fa-google-plus"></i></a></li>
					<li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
					<li><a href="#"><i class="fab fa-snapchat"></i></a></li>
					<li><a href="#"><i class="fab fa-youtube"></i></a></li>
				</ul>
      </div> -->
      
			<div class="col-lg-12">
				<div  id="paging_container8">
					<ul class="row blogs-ul content">
						@foreach($blogs as $blog)
						<li class="col-md-3 li-blogs">
							<a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Blog/{{$blog->slug}}">
								<div class="position-relative">
									<img src="{{asset('website/images/')}}/{{$blog->image}}" class="img-blog blog_height">
									<div class="absolute-blogs container-fluid">
										
										<div class="row">
											@if(isset($likes))
											<div class="col-6">
												<i class="fas fa-thumbs-up"></i>
													555
											</div>
											@endif
											@if(isset($comments))
											<div class="col-6 text-right">
												<i class="fas fa-comment-alt"></i>
												 555
											</div>
											@endif
										</div>

									</div>
								</div>
							</a>
							<h4>{{$blog->title}}</h4>
							<div class="row">
								{{--<div class="col-6 blogs-p"><i class="fas fa-clock "></i>{{date('d-m-Y', strtotime($blog->created_at))}}</div>--}}
								@if(isset($blog->views))
								<!-- <div class="col-6 blogs-p text-right"><i class="fas fa-eye"></i>{{$blog->views}}</div> -->
								@endif
							</div>
							<hr>
							<p class="p-blogs">{{$blog->content}}</p>
							@if(isset($blog->slug))
							<div>
								<a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Blog/{{$blog->slug}}" class="read-more-blog color-red">@lang('website.read_more') >></a>
							</div>
							@endif
						</li>
						@endforeach
					</ul>
					<div class="page_navigation"></div>
				</div>
    	</div>
    	
    </div>
	</div>
</div>
      
     @include('partials.website.footer')

        <script>
		$(document).ready(function(){
				$('#paging_container8').pajinate({
					num_page_links_to_display : 3,
					items_per_page : 16	
				});
			});     
		</script>




@endsection