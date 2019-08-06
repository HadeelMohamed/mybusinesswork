@extends('layouts.website')
@section('title','Home')
@section('content')

<div class="profile-company sec-co" >


<video autoplay muted="" poster="" id="bgvid" loop>
        <source src="{{asset('website/images/finance-background.mp4')}}" type="video/mp4">
      </video>

<div class="about-details">
<div class="container">

      <div class="static_height"></div>

          <style type="text/css">
.static_height{
  height: 70px;
}
@media (max-width:1024px){
  .static_height{
  height: 20px;
}
}
</style>
<!-- <h5 class="h5-profil-2">Welcome to our Business</h5>

<h1 class="h1-about">World <strong>bussiness</strong></h1>
<h5 class="h5-profil">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris dapibus ex sed eros molestie blandit. Fusce sem enim, commodo sit amet diam pharetr.</h5> -->
</div>
</div>
    
<div class="overlay-profile"></div>
<div class="bubble-bg"></div>
</div>
			


     

      <!--...........................section location...................-->
      <div class="section-location">
      <div class="container">
      <div class="row">
      <div class="col-md-6">
      <!-- <h3 class="h2-about">Welcome to <strong>Finance Business</strong></h3> -->
      @foreach($about_page_details as $content)
      <h3 class="h2-about">{{$content->title}}</h3>
      <p class="text-justify p-about">{{$content->content}}</p>
      @endforeach
      </div>

<div class="col-sm-6">
<div class="about-img">
<img src="{{asset('website/images/about.jpg')}}" >
<div class="border-about"></div>
</div>
</div>

</div>
</div>


      
      </div>
      
      <!-- <div class="container">
      <hr>
      
      </div> -->
      
      @include('partials.website.footer')

		<script type="text/javascript">
			$(function() {
			
				$(' #da-thumbs > li ').each( function() { $(this).hoverdir(); } );

			});
		</script>


@endsection