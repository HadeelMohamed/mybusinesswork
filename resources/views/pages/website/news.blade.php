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
	    	@foreach($news as $new)
		    <li class="main-news">
		    	@if(isset($new->image))
		    	@if(isset($new->slug))
			    <a href="{{url('/')}}/News/{{$new->slug}}" class="hvr-wobble-top">
			    	<img src="{{asset('website/images')}}/{{$new->image}}" class="img-news">
			    </a>
			    @else
			    <a class="hvr-wobble-top">
			    	<img src="{{asset('website/images')}}/{{$new->image}}" class="img-news">
			    </a>
			    @endif
			    @endif
		      <h2 class="h2-news">{{$new->title}}</h2>
					<p class="p-date">{{$new->created_at}}</p>
	      	<p class="news-p">{{$new->short_desc}}</p>
	      	@if(isset($new->slug))
					<a href="{{url('/')}}/News/{{$new->slug}}" class="hvr-underline-from-left read-more">Read More</a>
					@endif
	      </li>
	      @endforeach
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