@extends('layouts.website')
@section('title','News')
@section('content')

<div class="profile-company  blogs" style="background-image:url({{asset('website/images/slider-1.jpg')}}">

	<div class="about-details">
		<div class="container">
			<h5 class="h5-profil-2">Welcome to our Business</h5>
			<h1 class="h1-about">World <strong>bussiness</strong></h1>
			<h5 class="h5-profil">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris dapibus ex sed eros molestie blandit. Fusce sem enim, commodo sit amet diam pharetr.</h5>
		</div>
	</div>
	    
	<div class="overlay-profile"></div>
	<div class="bubble-bg"></div>
</div>
			
<style>
.profile-company{
	min-height:500px;
}
</style>

     

<!--...........................section location...................-->
<div class="section-news" >
	<div class="container">
		<div  id="paging_container8">
	    <ul class="row news-ul content">
	    	@if(isset($new_details))
		    <li class="main-news">
			    <!-- <a href="" class="hvr-wobble-top"> -->
			    	@if(isset($new_details->image))
			    	<img src="{{asset('website/images')}}/{{$new_details->image}}" class="img-news">
			    	@endif
			    <!-- </a> -->
		      <h2 class="h2-news">{{$new_details->title}}</h2>
					<p class="p-date">{{$new_details->created_at}}</p>
	      	<p class="news-p">{{$new_details->short_desc}}</p>
	      	<p class="news-p">{{$new_details->content}}</p>
					<!-- <a href="{{url('/')}}/News/{{$new_details->slug}}" class="hvr-underline-from-left read-more">Read More</a> -->
	      </li>
	      @else
	      	<center><h3 class="text-danger">@lang('website.no_content')</h3></center>
	      @endif
	    </ul>
			<div class="paging">
      	<div class="page_navigation"></div>
      </div>
		</div>
	</div>
</div>
      




<div class="clear"></div>


 
                  <!-- for page only -->

                  <!-- paging -->

 
@include('partials.website.footer')
<script src="js/paginga.jquery.js" ></script>
<script>
$(document).ready(function(){
	$('#paging_container8').pajinate({
		num_page_links_to_display : 3,
		items_per_page : 16	
	});
});     
</script>







@endsection