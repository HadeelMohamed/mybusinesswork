
@extends('layouts.website')
@section('title','Exhibitions')
@section('content')
<!--...........................for page only...................-->
<link href="{{asset('website/css/expo.css')}}" media="all" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="{{asset('website/css/zoom.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('website/css/slick.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('website/css/slick-theme.css')}}">

<style>
.overflow-hidden {
    min-height:auto;
}
</style>
<div class="header-expo" style="background-image:url({{asset('website/images/slider-12.jpg')}})">
<style>
.overflow-hidden {
  min-height:auto;
}
</style>
<div class="arrow-left-expo"></div>


<div class="overflow-hidden">
<div class="container div-expo-header">
<div class="row">
<div class="col-lg-6">
<div class="left-div">

@if($exhibitor->profile_pic)

  <img src="{{asset('/images/en/exhibitors/med/')}}/{{$exhibitor->profile_pic}}" class="img-company-profile">
@else
  <img src="{{url('/website/images')}}/logo-company-stantard-en.jpg" class="img-expo-item float-left">
@endif
</div>
<div class="left-div item-expo-pop div-pin">

<div class="btn btn-expo  btn-pop-items btn-inner-expo2 display-table-1"><div class="icon-btn-expo"><i class="fas fa-map-marker-alt"></i></div> {{$exhibitor->country}}</div>

<!--<button class="btn btn-expo  btn-pop-items btn-inner-expo display-table-1"><div class="icon-btn-expo"><i class="fas fa-share-alt"></i></div>  Share</button>
-->

</div>
</div>
<div class="col-lg-6 text-right">
<div class="item-expo-pop">
<div class="btn btn-expo  btn-pop-items btn-inner-expo " style="direction:ltr; min-width:200px;"><div class="icon-btn-expo"><i class="fas fa-map-marker-alt"></i></div> {{$exhibitor->phone}}</div><br class="br-hidden">


<div class="btn btn-expo  btn-pop-items btn-inner-expo " style="direction:ltr; min-width:200px;"><div class="icon-btn-expo"><i class="fas fa-envelope"></i></div> {{$exhibitor->email}}</div>
</div>
</div>

</div>
</div>
<div class="clear"></div>

<div class="bubble-bg"></div>




<div class="div-title-company">

<img src="{{asset('website/images/shape-profile.png')}}" class="img-shape">
<img src="{{asset('website/images/shape-profile-ar.png')}}" class="img-shape-ar">

<h1>{{$exhibitor->exhibitor_name}}</h1>
<h2>{{$exhibitor->cat_name}}</h2>
<ul class="links-profile-company">
<li><a href="#" class="hvr-underline-from-left"><i class="fas fa-chevron-right color-red"></i> @lang('website.about')</a></li>
<li><a href="#" class="hvr-underline-from-left"><i class="fas fa-chevron-right color-red"></i> @lang('website.products')</a></li>

</ul>
</div>

</div>
<div class="div-message-share"><button class="btn btn-expo  btn-pop-items none-desktop"><div class="icon-btn-expo"><i class="fas fa-map-marker-alt"></i></div> {{$exhibitor->country}}</button><button class="btn btn-expo  btn-pop-items "><div class="icon-btn-expo"><i class="fas fa-share-alt"></i></div> @lang('website.share')</button> <button class="btn btn-expo  btn-pop-items "><div class="icon-btn-expo"><i class="fas fa-envelope"></i></div> @lang('website.message')</button><!--  <button class="btn btn-expo  btn-pop-items "><div class="icon-btn-expo"><i class="fas fa-eye"></i></div> @lang('website.views') {{$exhibitor->viewed}}</button> --></div>
</div>

<section class="main-expo-div">
<div class="container">
<div class="row">



<div class="col-lg-8">

<div class="title-div col-12">
<h2>{{$exhibitor->exhibitor_name}}</h2>
<p>{{$exhibitor->cat_name}}</p>

</div>

{{--
<div class="text-center display-menu-expo">
<button class="btn btn-expo"><div class="icon-btn-expo"><i class="fas fa-chevron-right"></i></div>  @lang('about_exhibition')</button>
<button class="btn btn-expo"><div class="icon-btn-expo"><i class="fas fa-chevron-right"></i></div>   @lang('website.sponsors')</button>
<button class="btn btn-expo"><div class="icon-btn-expo"><i class="fas fa-chevron-right"></i></div>   @lang('website.subscribers')</button>


</div>
--}}

<div class="position-relative big-div-title">
<img src="{{asset('website/images/logo-expo.png')}}" class="logo-expo">
<div class="h3-expo-div">
<h3 class="h3-expo">@lang('website.products')</h3>
</div>
</div>

<div class="padding-slider-expo">

    
<section class="variable product-slider" style="direction:ltr;">
    
    @if(isset($exhibitor_products))
    @foreach($exhibitor_products as $exh_pro)
    @foreach($product_images as $index => $pro_image)
    @if($exh_pro->id == $pro_image->pro_id)
    <div>
        <img src="{{asset('images/en/exhibitors/products_gallery/med/')}}/{{$pro_image->image}}" class="img-slick-item">
    </div>
    @endif
    @endforeach
    @endforeach
    @endif
    
    
  
    </section>
    
        
</div>



<div class="position-relative big-div-title">
<img src="{{asset('website/images/logo-expo.png')}}" class="logo-expo">
<div class="h3-expo-div">
<h3 class="h3-expo">@lang('website.about')</h3>
</div>
</div>
<div class="h3-expo-div">

<p class="p-about-expo">{{$exhibitor->about}}
</p>


<!--<div class="text-right">-->
<!--<button class="btn btn-pdf"><i class="far fa-file-pdf"></i> Download PDF</button>-->
<!--</div>-->
<hr>
</div>



<div class="position-relative big-div-title">
<img src="{{asset('website/images/logo-expo.png')}}" class="logo-expo">
<div class="h3-expo-div">
<h3 class="h3-expo">@lang('website.services')</h3>
</div>
</div>
<div class="h3-expo-div">

<p class="p-about-expo">{{$exhibitor->services}}
</p>


<!--<div class="text-right">-->
<!--<button class="btn btn-pdf"><i class="far fa-file-pdf"></i> Download PDF</button>-->
<!--</div>-->
<hr>
</div>

<div class="text-center">
<a href="{{url('')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibition/join_exhibitor/the-international-furniture-exhibition,2" class="btn btn-danger">@lang('website.edit_your_booth')</a>
<a href="{{route('Authed_Member_Profile')}}" class="btn btn-danger">@lang('website.my_account')</a>
</div>
</div>



<div class="col-lg-4">


{{--
  <div class="counter-side">
      <div class="row">
      
      
      <div class="col-6 border-action">
                                            <div class="inline-facts-wrap">
                                                <div class="inline-facts text-center">
                                                
                                                   <i class="fas fa-eye"></i>

                                                    <div class="milestone-counter text-center">
                                                        <div class="stats animaper">
                                                            <div class="num" data-content="0" data-num="0">0</div>
                                                        </div>
                                                    </div>
                                                    <h6 class="text-center">@lang('website.views')</h6>
                                                </div>
                                            </div>
                </div>
      
      <div class="col-6">
                                            <div class="inline-facts-wrap">
                                                <div class="inline-facts text-center">
                                                
                                                  <i class="fas fa-building"></i>

                                                    <div class="milestone-counter text-center">
                                                        <div class="stats animaper">
                                                            <div class="num" data-content="0" data-num="0">0</div>
                                                        </div>
                                                    </div>
                                                    <h6 class="text-center">@lang('website.exhibitors')</h6>
                                                </div>
                                            </div>
                </div>  
 
                
                </div>                           
   
      </div>    
       
 --}}

  <div class="big-contact">
    
 <div class="div-contact-expo position-relative">
   <div class="arrow-left-expo-contact"></div>

 <div class="title-expo">@lang('website.contact_us')</div>
 @if(isset($exhibitor->profile_pic))
 <img src="{{asset('/images/en/exhibitors/med/')}}/{{$exhibitor->profile_pic}}" class="img-logo-contact">
 @else
 <img src="{{asset('website/images/logo-co.jpg')}}" class="img-logo-contact">
 @endif
 

 </div>
  
  </div>
      
       <div class="back-contact">
 <div class="container-fluid">
@if(isset($exhibitor->address))
<div class="form-group-contact row">
 <p class="col-3">@lang('website.address')</p>
  <p class="col-9">{{$exhibitor->address}}</p>
 </div>
 @endif
 
 @if(isset($exhibitor->phone))
<div class="form-group-contact row">
 <p class="col-3">@lang('website.phone') </p>
  <p class="col-9">{{$exhibitor->phone}} </p>
 </div>
 @endif
 
 @if(isset($exhibitor->email))
<div class="form-group-contact row">
 <p class="col-3">@lang('website.email') </p>
  <p class="col-9" style="word-break: break-all">{{$exhibitor->email}} </p>
 </div>
 @endif
 
 @if(isset($exhibitor->marketing))
<div class="form-group-contact row">
 <p class="col-3">@lang('website.marketing') </p>
  <p class="col-9">{{$exhibitor->marketing}} </p>
 </div>
 @endif
 
 @if(isset($exhibitor->sales))
 <div class="form-group-contact row">
 <p class="col-3">@lang('website.sales') </p>
  <p class="col-9">{{$exhibitor->sales}} </p>
 </div>
 @endif
 
 
 <div class="text-center">
 
 <div class='social-wrap'>
<ul>
<!--    <li><a class='facebook' href='http://www.facebook.com/' target='_blank'></a></li>-->
<!-- <li><a class='twitter-social' href='http://twitter.com/' target='_blank'></a></li> -->
<!--<li><a class='google-p' href='https://plus.google.com/' target='_blank'></a></li>-->
<!--<li><a class='rss' href='https://plus.google.com/' target='_blank'></a></li>-->
<!--<li><a class='youtube-social' href='https://plus.google.com/' target='_blank'></a></li>-->

 @if(isset($exhibitor->facebook))
              <li><a class='facebook' href='{{$exhibitor->facebook}}' target='_blank'></a></li>
            @endif
            @if(isset($exhibitor->instagram))
              <li><a class='instagram-social' href="{{$exhibitor->instagram}}" target="_blank" ></a></li>
            @endif
            @if(isset($exhibitor->linkedin))
              <li><a class='linkedin-social' href="{{$exhibitor->linkedin}}" target="_blank" ><i class="fab fa-linkedin"></i></a></li>
            @endif
            @if(isset($exhibitor->twitter))
              <li><a class='twitter-social' href="{{$exhibitor->twitter}}" target="_blank" ></a></li>
            @endif
            @if(isset($exhibitor->youtube))
              <li><a class='youtube-social' href='{{$exhibitor->youtube}}' target='_blank'></a></li>
            @endif
            @if(isset($exhibitor->snapchat))
              <li><a class='rss' href="{{$exhibitor->snapchat}}" target="_blank" ></a></li>
            @endif

</ul>

</div>
 </div>
 
 
 </div>
 
 </div>
      

      

      
      

      

</div>



</div>
</div>
</section>

@include('partials.website.footer')
 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('website/js/jquery-2.1.1.js')}}" ></script>
    <script src="{{asset('website/js/popper.min.js')}}" ></script>
    <script src="{{asset('website/js/bootstrap.min.js')}}" ></script>

    <!-- social -->
  <script src="{{asset('website/js/plugins.js')}}" ></script>
  <script src="{{asset('website/js/script.js')}}" ></script>
 <script src="{{asset('website/js/social.js')}}" ></script>
 <script src="{{asset('website/js/my-js.js')}}" ></script>


<script src="{{asset('website/js/jquery.liMarquee.js')}}"></script>

<script>
$(window).load(function() { 
        
    /* basic - default settings */
	
		
	
		$('.str3').liMarquee({
			direction: 'left',	
			loop:-1,			
			scrolldelay: 0,		
			scrollamount:50,	
			circular: true,		
			drag: true			
		});
		
		

		});
		
</script>

<script src="{{asset('website/js/zoom-image.js')}}"></script>
  <script src="{{asset('website/js/main.js')}}"></script>



 <script src="{{asset('website/js/slick.min.js')}}" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript">
    $(document).on('ready', function() {

	  
	  
	  
	   $('.variable').slick({
   dots: false,
        infinite: true,
          slidesToShow: 4,
        slidesToScroll: 4,
		autoplaySpeed: 3000,
		autoplay: true,
		 arrows: true,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});
});
</script>


@endsection