@extends('layouts.website')
@section('title','Home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('website/css/slick.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('website/css/slick-theme.css')}}">

<!--...........................five sec...................-->
<section class="sec-services">
   <div class="container">
      <!-- <h3 class="h3-ser">@lang('website.Enhance_your_business_global_presence_and_Join_the_most_effective_events')</h3>
      <div class="line-sec back-red"></div> -->
      <p class="p-ser-main">@lang('website.specific_title_content')</p>
      <div class="row">
         <!--...........................blog...................-->
         <div class="col-lg-7 col-md-6">
            <div class="position-relative position-slider">
               <div class="slider-container">
                  <div class="slider-control left inactive"></div>
                  <div class="slider-control right"></div>
                  <ul class="slider-pagi"></ul>
                  <div class="slider">
                     <div class="slide slide-0 active">
                        <div class="slide__bg" style="background-image:url({{asset('website/images/slides/1.jpg')}}"></div>
                        <div class="slide__content">
                           <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
                              <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
                           </svg>
                           <div class="slide__text">
                              <!-- <h2 class="slide__text-heading">@lang('website.home_label_title_1')</h2> -->
                              <p class="slide__text-desc">@lang('website.home_label_content_1')</p>
                              <!-- <a class="slide__text-link" href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibitions/All">@lang('website.list_exhibitions')</a> -->
                           </div>
                        </div>
                     </div>
                     <div class="slide slide-1 ">
                        <div class="slide__bg" style="background-image:url({{asset('website/images/slides/2.jpg')}}"></div>
                        <div class="slide__content">
                           <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
                              <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
                           </svg>
                           <div class="slide__text">
                              <!-- <h2 class="slide__text-heading">@lang('website.home_label_title_2')</h2> -->
                              <p class="slide__text-desc">@lang('website.home_label_content_2')</p>
                              <!-- <a class="slide__text-link" href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibitions/All">@lang('website.list_exhibitions')</a> -->
                           </div>
                        </div>
                     </div>
                     <div class="slide slide-2">
                        <div class="slide__bg" style="background-image:url({{asset('website/images/slides/3.jpg')}}"></div>
                        <div class="slide__content">
                           <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
                              <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
                           </svg>
                           <div class="slide__text">
                              <!-- <h2 class="slide__text-heading">@lang('website.home_label_title_3')</h2> -->
                              <p class="slide__text-desc">@lang('website.home_label_content_3')</p>
                              <!-- <a class="slide__text-link" href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibitions/All">@lang('website.list_exhibitions')</a> -->
                           </div>
                        </div>
                     </div>
                     <div class="slide slide-3">
                        <div class="slide__bg" style="background-image:url({{asset('website/images/slides/4.jpg')}}"></div>
                        <div class="slide__content">
                           <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
                              <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
                           </svg>
                           <div class="slide__text">
                              <!-- <h2 class="slide__text-heading">@lang('website.home_label_title_4')</h2> -->
                              <p class="slide__text-desc">@lang('website.home_label_content_4')</p>
                              <!-- <a class="slide__text-link" href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibitions/All">@lang('website.list_exhibitions')</a> -->
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-5 col-md-6">
            <a class="big-services position-relative">
               <div class="content-ex-title">
                  <h3>@lang('website.stay_tuned')</h3>
               </div>
               <div class="content-ex">
                  <p>@lang('website.increase_your_business_global_presence_and_Join_the_most_effective_events')</p>
               </div>
               <!--<div class="overlay-services"></div>
                  --><img src="{{asset('website/images/Section_2_photos/stay_tuned.jpg')}}" class="ser-img">
            </a>
         </div>
      </div>
   </div>
</section>
<!--...........................fearture...................-->
@if(isset($our_features))
<section class="feature-sec position-relative">
   <div class="container">
      <!-- <h3 class="h3-ser">@lang('website.stay_tuned')</h3> -->
      <!-- <div class="line-sec back-red"></div> -->
      <p class="p-ser-main">@lang('website.innovative_business_solution_especially_for_you')</p>
      @if(count($our_features) > 0)
      <div class="row">
      	<ul class="items-feature">
         @foreach($our_features as $feature)
          <li>
            <div class="div-feature">
        	    <img src="{{asset('website/images')}}/{{$feature->icon}}" alt=""> 
                <h6 class="h6-feature">
        	        {{$feature->title}}<br>
                  {{$feature->short_desc}}
                </h6>
             </div>
          </li>
         @endforeach
         </ul>
      </div>
      @endif
   </div>
</section>
@endif 
<!--...........................company...................-->
<section class="company-sec">
  <div class="container p8">
    <h3 class="h3-ser">@lang('website.latest_join_us')</h3>
    <div class="line-sec back-red"></div>
    <p class="p-ser-main">@lang('website.join_us_description')</p>
      <section class="variable home-slider" style="direction:ltr;">
     @foreach($latest_members as $member)
      
    <div>
       <a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/{{$member->slug}}">
          <div class="item">
             <div class="tile">
                <div>
                   <div class="position-relative">
                    @if(isset($member->profile_cover))
                    <img src="{{asset('images')}}/en/med/{{$member->profile_cover}}" class="img-company">
                    @else
              <img src="{{asset('website/images/construction.jpg')}}" class="img-company">
                    @endif
                      <div class="row">
                        @if(isset($member->profile_pic))
                         <img src="{{asset('images')}}/en/med/{{$member->profile_pic}}" class="logo-company">
                         @else
                         <img src="{{asset('website/images/')}}/logo-company-stantard-{{LaravelLocalization::getCurrentLocale()}}.jpg" class="logo-company">
                         @endif
                      </div>
                   </div>
                </div>
                <div class="padding-div">
                   <h3>{{$member->name}}</h3>
                   <p>{{$member->cat_name}}</p>
                   <div class="row">
                      <div class="col-12">
                         <!-- <div class="star-float">
                            <input class="rb-rating" value="2" type="text" data-min=0 data-max=5 data-step=1 disabled  />
                         </div> -->
                         @if(isset($memebr->viewed))
                        <a class="btn-profile"><i class="fas fa-eye color-red"></i>{{$member->viewed}}</a>
                        @endif
                      </div>
                   </div>
                   <div class="address-co">
                      <p>
                         <i class="fas fa-map-marker-alt color-red"></i>
                         @if(isset($member->country_name))
                         {{$member->country_name}}
                         @endif
                      </p>
                   </div>
                </div>
             </div>
          </div>
       </a>
     </div>
       @endforeach
   </section>
  </div>
  <div class="text-center">
      <a href="{{(url('/'))}}/Search/Companies?account_type_id=0&category_id=0&country_id=0&search=&page=1" class="view-more">
      @lang('website.view_more')
      <i class="fas fa-eye"></i>
      </a>
   </div>
</section>

@if(isset($latest_blogs))
<!--...........................blog...................-->
<section class="blog-sec">
   <div class="container">
      <h3 class="h3-ser">@lang('website.business_tips')</h3>
      <div class="line-sec back-red"></div>
      <!-- <p class="p-ser-main">Explore some of the best tips from around the city from our partners and friends.</p> -->
      <div class="row">
         @foreach($latest_blogs as $blog)
         <div class="col-md-3">
            <div class="big-block">
              <a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Blog/{{$blog->slug}}">
               <img src="{{asset('website/images/')}}/{{$blog->image}}" class="img-block"></a>
               <div class="padding-block">
                  
                     <h3 class="color-red">{{$blog->title}}</h3>
                  <p>{{$blog->content}}</p>
                  <div class="line-last-blog">
                     <div class="row">
                        {{--<div class="col-6 blog-last"><i class="fas fa-clock "></i>{{date('Y-m-d', strtotime($blog->created_at))}}</div>--}}
                        <!-- <div class="col-6 blog-last text-right"><i class="fas fa-eye"></i> </div> -->
                     </div>
                  </div>
               </div>
            </div>
         </div>
         @endforeach
      </div>
   </div>
   <div class="text-center">
      <a href="{{route('all_blogs')}}" class="view-more">
      @lang('website.view_more')
      <i class="fas fa-eye"></i>
      </a>
   </div>
</section>
@endif

<!--...........................client...................-->
{{--
<section class="client-sec">
   <div class="container">
      <!-- <h3 class="h3-ser text-left">@lang('website.sponsors')</h3> -->
      <!-- <div class="line-sec2 back-red"></div> -->
      <!-- <p class="p-ser-main text-left">Explore some of the best tips from around the city from our partners and friends.</p> -->
      <div class="container-fluid">
         <div class="str3 str_wrap">
            <a href="#">
            <img src="{{asset('website/images/cus1.jpg')}}">
            </a>
            <a href="#">
            <img src="{{asset('website/images/cus2.jpg')}}">
            </a>
            <a href="#">
            <img src="{{asset('website/images/cus3.jpg')}}">
            </a>
            <a href="#">
            <img src="{{asset('website/images/cus4.jpg')}}">
            </a>
            <a href="#">
            <img src="{{asset('website/images/cus5.jpg')}}">
            </a>
            <a href="#">
            <img src="{{asset('website/images/cus6.jpg')}}">
            </a>
         </div>
      </div>
   </div>
</section>
--}}
{{--

<!-- Modal -->
<div id="advModale_ar" class="modal fade pop-adv"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" style="display:none">
  <div class="modal-dialog modal-width modal-dialog-centered" role="document" >
    <div class="modal-content div-inner-expo" >
    <div class="row">
    
    <div class="col-md-8 ">
    <div class="inner-expo">
       <h3 class="h3-pop-expo">أول معرض <strong class="color-red">أونلاين</strong> !</h3>
<img src="images/logo-pop-img.jpg" class="img-pop-mobile">
      <p class="p-div-exppo">(مجاناً) لفترة محدودة بدلاً من <strong style="text-decoration:line-through">100$ دولار</strong> </p>
      
      <div class="text-center">
      <!-- <a href="#" class="btn btn-danger btn-expo-link color-white  ">how I can sign up</a>
            <a href="#" class="btn btn-danger btn-expo-link  color-white ">What is online show</a> -->
<div style="height:20px"></div>
      </div>
      
      </div>
      
      </div>
          <div class="col-md-4 position-relative display-none-pop" style="background-image:url({{asset('/website/images/popup_exhibition.png')}})">
          <div class="div-pop-item">
            <img src="images/pop-logo.png" class="pop-logo"  alt=""> 
          <!-- <span class="btn-online-services">معارض أونلاين</span> -->
          <div class="text-center"><img src="images/hand.png" width="20"  alt=""></div>
</div></div>
      
      </div>
      
    <button class="btn-pop-expo" ><i class="fas fa-times"></i></button>  
     
    </div>
  </div>
</div>





<!-- Modal -->
<div id="advModale_en" class="modal fade pop-adv"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" style="display:none">
  <div class="modal-dialog modal-width modal-dialog-centered" role="document" >
    <div class="modal-content div-inner-expo" >
    <div class="row">
    
    <div class="col-md-8 ">
    <div class="inner-expo">
       <h3 class="h3-pop-expo">First Time <strong class="color-red">Online</strong> Exhibtion</h3>
<img src="images/logo-pop-img.jpg" class="img-pop-mobile">
      <p class="p-div-exppo">(Free) instead of <strong style="text-decoration:line-through">155$</strong> </p>
      
      <div class="text-center">
      <a href="#" class="btn btn-danger btn-expo-link color-white  ">how I can sign up</a>
            <a href="#" class="btn btn-danger btn-expo-link  color-white ">What is online show</a>
<div style="height:20px"></div>
      </div>
      
      </div>
      
      </div>
          <div class="col-md-4 position-relative display-none-pop" style="background-image:url({{asset('/website/images/banner-login-2.jpg')}})">
          <div class="div-pop-item">
            <img src="images/pop-logo.png" class="pop-logo"  alt=""> 
          <span class="btn-online-services">Online Services</span>
          <div class="text-center"><img src="images/hand.png" width="20"  alt=""></div>
</div></div>
      
      </div>
      
    <button class="btn-pop-expo" ><i class="fas fa-times"></i></button>  
     
    </div>
  </div>
</div>




<!-- Modal -->
<div id="advModale_tr" class="modal fade pop-adv"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" style="display:none">
  <div class="modal-dialog modal-width modal-dialog-centered" role="document" >
    <div class="modal-content div-inner-expo" >
    <div class="row">
    
    <div class="col-md-8 ">
    <div class="inner-expo">
       <h3 class="h3-pop-expo">First Time <strong class="color-red">Online</strong> Exhibtion</h3>
<img src="images/logo-pop-img.jpg" class="img-pop-mobile">
      <p class="p-div-exppo">(Free) instead of <strong style="text-decoration:line-through">155$</strong> </p>
      
      <div class="text-center">
      <a href="#" class="btn btn-danger btn-expo-link color-white  ">how I can sign up</a>
            <a href="#" class="btn btn-danger btn-expo-link  color-white ">What is online show</a>
<div style="height:20px"></div>
      </div>
      
      </div>
      
      </div>
          <div class="col-md-4 position-relative display-none-pop" style="background-image:url({{asset('/website/images/banner-login-2.jpg')}})">
          <div class="div-pop-item">
            <img src="images/pop-logo.png" class="pop-logo"  alt=""> 
          <span class="btn-online-services">Online Services</span>
          <div class="text-center"><img src="images/hand.png" width="20"  alt=""></div>
</div></div>
      
      </div>
      
    <button class="btn-pop-expo" ><i class="fas fa-times"></i></button>  
     
    </div>
  </div>
</div>



<!-- Modal -->
<div id="advModale_fr" class="modal fade pop-adv"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" style="display:none">
  <div class="modal-dialog modal-width modal-dialog-centered" role="document" >
    <div class="modal-content div-inner-expo" >
    <div class="row">
    
    <div class="col-md-8 ">
    <div class="inner-expo">
       <h3 class="h3-pop-expo">First Time <strong class="color-red">Online</strong> Exhibtion</h3>
<img src="images/logo-pop-img.jpg" class="img-pop-mobile">
      <p class="p-div-exppo">(Free) instead of <strong style="text-decoration:line-through">155$</strong> </p>
      
      <div class="text-center">
      <a href="#" class="btn btn-danger btn-expo-link color-white  ">how I can sign up</a>
            <a href="#" class="btn btn-danger btn-expo-link  color-white ">What is online show</a>
<div style="height:20px"></div>
      </div>
      
      </div>
      
      </div>
          <div class="col-md-4 position-relative display-none-pop" style="background-image:url({{asset('/website/images/banner-login-2.jpg')}})">
          <div class="div-pop-item">
            <img src="images/pop-logo.png" class="pop-logo"  alt=""> 
          <span class="btn-online-services">Online Services</span>
          <div class="text-center"><img src="images/hand.png" width="20"  alt=""></div>
</div></div>
      
      </div>
      
    <button class="btn-pop-expo" ><i class="fas fa-times"></i></button>  
     
    </div>
  </div>
</div>




<div id="advBackground" class="modal-backdrop fade"></div>

--}}
<!-- scripts -->
<!-- Optional JavaScript -->
<!-- Optional JavaScript -->
<!-- social -->
<!-- search and count and bubbles pages -->
<!-- <script src="{{asset('website/js/plugins.js')}}" ></script>
   <script src="{{asset('website/js/script.js')}}" ></script> -->
@include('partials.website.footer')
{{--
<script type="text/javascript">
  $(document).ready(function(){
    
    
    window.setTimeout(function(){

      // show div to redirect after moments
      // Move to a new location or you can do something else    Exhibition/join_exhibitor
      $('#advModale_{{LaravelLocalization::getCurrentLocale()}}').css("display", "block").addClass("show");
    $('#advBackground_{{LaravelLocalization::getCurrentLocale()}}').css("display", "block");
    }, 1000);
  });

</script>
--}}
<script src="{{asset('website/js/slider-blog.js')}}"></script>
<script src="{{asset('website/js/star-rating.js')}}" type="text/javascript"></script>

<script src="{{asset('website/js/slick.min.js')}}" type="text/javascript" charset="utf-8"></script>
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


   
  <script type="text/javascript">
    $(document).on('ready', function() {

    
    
    
     $('.variable').slick({
   dots: true,
        infinite: true,
          slidesToShow: 4,
        slidesToScroll: 4,
    autoplaySpeed: 3000,
    autoplay: true,
     arrows: false,
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