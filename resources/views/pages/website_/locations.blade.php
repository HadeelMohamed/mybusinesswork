@extends('layouts.website')
@section('title','Home')
@section('content')
<script src="{{asset('website/js/modernizr.js')}}" ></script>
<!-- <style type="text/css">
  .more {
    float: left;
  }
  .less {
    float: left;
  }

.head-menu{
  height: 0px;
}

</style> -->
<style type="text/css">
.static_height{
  height: 70px;
}

  .h1-location{
    /* margin-top: 50px; */
    color: #fff;
    font-size: 25px;
    text-shadow: 0px 0px 5px #000;
    margin: 50px auto 20px auto;
    max-width: 500px;
    text-align: center;
}

    .overlay-profile {
      display: block;
    }



.profile-company{
  background-size: 100% 100%;
  background-attachment: local;
}
.h1-about {
  font-size: 40px;
  }

.div-h1{
  position: relative;
  top: 160px;
  z-index:2;
}

  .h1-location{
    margin-top: 50px;
  color: #fff;
  font-size: 25x;
  text-shadow: 0px 0px 5px #000;
}

  @media (max-width:1024px){
  .static_height{
  height: 10px;
}

.profile-company{
  background-size: auto 100%;
}
.div-h1{
  position: relative;
  top: 110px;
  z-index:2;
}
}



</style>

 <!--...........................header-div...................-->
<div class="profile-company position-relative"  style="background-image:url({{asset('website/images/locations.jpg')}}">
<div class="container div-h1">  <h1 class="h1-location">@lang('website.location_title')</h1></div>
  <!-- <div class="overlay-profile"></div> -->
  <div class="bubble-bg"></div>
</div>
<style>
   .da-thumbs li{
   margin-top:10px;
   }
   .logo-company-profile{
   visibility:hidden;
   }
   
</style>
<div class="container">
<!--...........................section location...................-->
<!-- <div class="section-location">
 -->   
<!--       <h2 class="text-center color-red">Global research requirements? We've got the world covered</h2>
       <p class="text-center p-location">@lang('website.emplacements')</p>-->
   <!-- </div> -->
</div>
<div class="container">
   <!-- <hr> -->
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
