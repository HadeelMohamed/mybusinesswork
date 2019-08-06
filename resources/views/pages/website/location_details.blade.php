@extends('layouts.website')
@section('title','Home')
@section('content')
<script src="{{asset('website/js/modernizr.js')}}" ></script>
<style type="text/css">
  .more {
    float: left;
  }
  .less {
    float: left;
  }

.head-menu{
  height: 0px;
}

</style>
<div class="profile-company sec-co" >


<video autoplay muted="" poster="" id="bgvid" loop>
  <source src="{{asset('website/videos')}}/{{$slug}}.mp4" type="video/mp4">
</video>

<!--<div class="about-details">
<div class="container">
<h5 class="h5-profil-2">Welcome to our Business</h5>

<h1 class="h1-about">World <strong>bussiness</strong></h1>
<h5 class="h5-profil">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris dapibus ex sed eros molestie blandit. Fusce sem enim, commodo sit amet diam pharetr.</h5>
</div>
</div>-->
    
<!--<div class="overlay-profile"></div>
--><div class="bubble-bg"></div>
</div>

 <!--...........................header-div...................-->
<style>
   .da-thumbs li{
   margin-top:10px;
   }
   .logo-company-profile{
   visibility:hidden;
   }
</style>
<!--...........................section location...................-->
<div class="section-location">
   <div class="container">
      <!-- <h2 class="text-center color-red">Global research requirements? We've got the world covered</h2> -->
      <p class="text-center p-location">{{$location_details->content}}</p>
   </div>
</div>
<div class="container">
   <hr>
</div>
<div class="section-location">
   <div class="container">
      <!-- <h2 class="text-center color-red">Our international offices</h2>
      <p class="text-center p-location">
         Our experience in international market research is unparalleled. In fact, the majority of the studies we carry out involve multiple territories or regions. Whether you want to focus on a single territory or require a complex multi-country study, our team of expert researchers in seven offices across three continents can help.
      </p> -->
      @if(isset($our_locations))
      <ul class="row  da-thumbs" id="da-thumbs">
        @foreach($our_locations as $location)
        <li class="col-lg-4 col-sm-6">
          <a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Locations/Locations/{{$location->slug}}">
             <img src="{{asset('website/images/')}}/{{$location->image}}" />
             <div><span>{{$location->country}}</span></div>
          </a>
        </li>
        @endforeach
      </ul>
      @endif
      <div class="page_navigation"></div>
      <div class="clear"></div>
   </div>
</div>
@include('partials.website.footer')
<script src="{{asset('website/js/jquery.hoverdir.js')}}" ></script>
<script type="text/javascript">
      $(function() {
      
        $(' #da-thumbs > li ').each( function() { $(this).hoverdir(); } );

      });
    </script>
@endsection
