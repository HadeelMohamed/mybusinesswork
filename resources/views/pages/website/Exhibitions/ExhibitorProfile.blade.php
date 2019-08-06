@extends('layouts.website')
@section('title','Exhibitions')
@section('content')
<!--...........................for page only...................-->
<link href="{{asset('website/css/expo.css')}}" media="all" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="{{asset('website/css/zoom.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('website/css/slick.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('website/css/slick-theme.css')}}">
<script src="{{asset('website/js/modernizr.js')}}"></script>
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
      <div class="container  div-expo-header">
         <div class="row">
            <div class="col-lg-6">
               <div class="left-div">

                  @if(isset($exhibitor->profile_pic))
                     <img src="{{asset('/images/en/exhibitors/med/')}}/{{$exhibitor->profile_pic}}" class="img-company-profile">
                  @else
                     <img src="{{asset('website/images/logo-co.jpg')}}" class="img-company-profile">
                  @endif
               </div>
               <div class="left-div item-expo-pop div-pin">
                  <div class="btn btn-expo  btn-pop-items btn-inner-expo2 display-table-1">
                     <div class="icon-btn-expo"><i class="fas fa-map-marker-alt"></i></div>
                     {{$exhibitor->country}}
                  </div>
                  <!--<button class="btn btn-expo  btn-pop-items btn-inner-expo display-table-1"><div class="icon-btn-expo"><i class="fas fa-share-alt"></i></div>  Share</button>
                     -->
               </div>
            </div>
            <div class="col-lg-6 text-right">
               <div class="item-expo-pop">
                  <div class="btn btn-expo  btn-pop-items btn-inner-expo " style="direction:ltr; min-width:200px;">
                     <div class="icon-btn-expo"><i class="fas fa-map-marker-alt"></i></div>
                     {{$exhibitor->phone}}
                  </div>
                  <br class="br-hidden">
                  <div class="btn btn-expo  btn-pop-items btn-inner-expo " style="direction:ltr; min-width:200px;">
                     <div class="icon-btn-expo"><i class="fas fa-envelope"></i></div>
                     {{$exhibitor->email}}
                  </div>
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
            <!--rate div start-->
         
         <h2>{{$exhibitor->cat_name}}</h2>
         <div class="main-three">
         @auth

             <div class='rating-stars'>
                 <ul style="display:inline-block">
                @for($i = 1; $i <= 5; $i++)
                @if($exhibitor->rate >= $i)
                  <li class='star selected' data-value={{$i}} >
                    <i class='fa fa-star fa-fw'></i>
                  </li>
                @else
                  <li class='star' data-value={{$i}}>
                    <i class='fa fa-star fa-fw'></i>
                  </li>
                @endif
                @endfor
                <!-- <li class='star' data-value='1'>
                  <i class='fa fa-star fa-fw'></i>
                </li>
                <li class='star' title='Fair' data-value='2'>
                  <i class='fa fa-star fa-fw'></i>
                </li>
                <li class='star' title='Good' data-value='3'>
                  <i class='fa fa-star fa-fw'></i>
                </li>
                <li class='star' title='Excellent' data-value='4'>
                  <i class='fa fa-star fa-fw'></i>
                </li>
                <li class='star' title='WOW!!!' data-value='5'>
                  <i class='fa fa-star fa-fw'></i>
                </li> -->
              </ul>
            </div>
            
            <!-- Rating Stars Box -->
           
            <!-- <div class="star-float" onclick="test();">
              <input class="rb-rating" value="{{$exhibitor->rate}}" type="text" data-min=0 data-max=5 data-step=0.1 />
            </div> -->
            @else
             <div class='rating-stars'>
              <ul id='stars'>
                @for($i = 1; $i <= 5; $i++)
                @if($exhibitor->rate >= $i)
                  <li class='star selected' data-value={{$i}} >
                    <i class='fa fa-star fa-fw'></i>
                  </li>
                @else
                  <li class='star' data-value={{$i}}>
                    <i class='fa fa-star fa-fw'></i>
                  </li>
                @endif
                @endfor
              </ul>
            </div>
            <!-- <div class="star-float" onclick="test();">
              <input class="rb-rating" value="{{$exhibitor->rate}}" type="text" data-min=0 data-max=5 data-step=0.1 disabled />
            </div> -->
            @endauth
            
            <!-- <p class="review-profile">7 Review</p> -->
            <!-- <div class="favourite">4 <i class="fas fa-bookmark color-red"></i></div> -->
                      <!-- rate button start -->
            @auth
            <button type="button " class="btn btn-warning rating-button" data-toggle="modal"  data-target="#rate-model" title="Rate This Business" style="display: inline-block;">
              <span style="color: #fff"><i class="fa fa-star fa-fw"></i></span>
                @lang('website.rate_me')
            </button>
            @endauth
            <!-- /rate button end -->
          </div>
        <!-- / rate div end-->
         <ul class="links-profile-company">
            <li><a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibition/Exhibitor/{{$exh_slug}},{{$exhibitor->slug}}" class="hvr-underline-from-left"><i class="fas fa-chevron-right color-red"></i> @lang('website.about')</a></li>
            <li><a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibition/ExhibitorProductsServices/{{$exh_slug}},{{$exhibitor->slug}}" class="hvr-underline-from-left"><i class="fas fa-chevron-right color-red"></i> @lang('website.products')</a></li>
         </ul>
      </div>
   </div>
   <div class="div-message-share">
      <button class="btn btn-expo  btn-pop-items none-desktop">
         <div class="icon-btn-expo"><i class="fas fa-map-marker-alt"></i></div>
         {{$exhibitor->country}}
      </button>
      <!-- <button class="btn btn-expo  btn-pop-items ">
         <div class="icon-btn-expo"><i class="fas fa-share-alt"></i></div>
         @lang('website.share')
      </button> -->
    @if(isset(Auth::user()->id))
      @if($exhibitor->exhibitor_id != Auth::user()->id)
        <button class="btn btn-expo  btn-pop-items " data-toggle="modal" data-target=".message-pop"><div class="icon-btn-expo"><i class="fas fa-envelope"></i></div> @lang('website.send_message')</button>
      @endif 
    @endif
   </div>
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
               <button class="btn btn-expo">
                  <div class="icon-btn-expo"><i class="fas fa-chevron-right"></i></div>
                  @lang('about_exhibition')
               </button>
               <button class="btn btn-expo">
                  <div class="icon-btn-expo"><i class="fas fa-chevron-right"></i></div>
                  @lang('website.sponsors')
               </button>
               <button class="btn btn-expo">
                  <div class="icon-btn-expo"><i class="fas fa-chevron-right"></i></div>
                  @lang('website.subscribers')
               </button>
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
                           @if($pro_image->image)
                              <img src="{{asset('images/en/exhibitors/products_gallery/med/')}}/{{$pro_image->image}}" class="img-slick-item">
                           @else
                              <img src="{{asset('website/images')}}/logo-company-stantard-{{LaravelLocalization::getCurrentLocale()}}.jpg" class="img-slick-item">
                           @endif
                        </div>
                      @endif
                    @endforeach
                  @endforeach
                @endif

              </section>

            </div>

            <div class="text-center">
            <a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibition/ExhibitorProductsServices/{{$exh_slug}},{{$exhibitor->slug}}" class="btn btn-danger">@lang('website.view_all')</a>
            </div>
            <br>


            {{--
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
                     @if($pro_image->pro_id)
                        <img src="{{asset('images/en/exhibitors/products_gallery/med/')}}/{{$pro_image->image}}" class="img-slick-item">
                     @else
                        <img src="{{asset('website/images')}}/logo-company-stantard-{{LaravelLocalization::getCurrentLocale()}}.jpg" class="img-slick-item">
                     @endif
                  </div>
                  @endif
                  @endforeach
                  @endforeach
                  @endif
               </section>
            </div>
            --}}
            <div class="position-relative big-div-title">
               <img src="{{asset('website/images/logo-expo.png')}}" class="logo-expo">
               <div class="h3-expo-div">
                  <h3 class="h3-expo">@lang('website.about')</h3>
               </div>
            </div>
            <div class="h3-expo-div">
               <p class="p-about-expo">{{$exhibitor->about}}</p>
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
               <p class="p-about-expo">{{$exhibitor->services}}</p>
               <!--<div class="text-right">-->
               <!--<button class="btn btn-pdf"><i class="far fa-file-pdf"></i> Download PDF</button>-->
               <!--</div>-->
               <hr>
            </div>
         </div>
         <div class="col-lg-4">
            <div class="counter-side">
               <div class="row">
                  <div class="col-6 border-action">
                     <div class="inline-facts-wrap">
                        <div class="inline-facts text-center">
                           <i class="fas fa-eye"></i>
                           <div class="milestone-counter text-center">
                              <div class="stats animaper">
                                 <div class="num" data-content="{{$exhibitor->viewed}}" data-num="{{$exhibitor->viewed}}">{{$exhibitor->viewed}}</div>
                              </div>
                           </div>
                           <h6 class="text-center">@lang('website.visits')</h6>
                        </div>
                     </div>
                  </div>
                  <div class="col-6">
                     <div class="inline-facts-wrap">
                        <div class="inline-facts text-center">
                           <i class="fas fa-building"></i>
                           <div class="milestone-counter text-center">
                              <div class="stats animaper">
                                 <div class="num" data-content="{{$exhibitor->viewed}}" data-num="{{$exhibitor->viewed}}">{{$exhibitor->viewed}}</div>
                              </div>
                           </div>
                           <h6 class="text-center">@lang('website.products_views')</h6>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            
                      <style type="text/css">
                        .line-contact{
                             width: 40px;
    height: 2px;
    display: block;
    background-color: #e60000;
                        }
                      </style>
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
               <div class="back-contact">
                  <div class="container-fluid">
                     @if(isset($exhibitor->address))
                     <div class="form-group-contact row">

                        <p class="col-md-3">@lang('website.address') <span class="line-contact"></span></p>
                        <p class="col-md-9">{{$exhibitor->address}}</p>
                     </div>
                     @endif
                     @if(isset($exhibitor->phone))
                     <div class="form-group-contact row">
                        <p class="col-md-3">@lang('website.phone') <span class="line-contact"></span></p>
                        <p class="col-md-9">{{$exhibitor->phone}} </p>
                     </div>
                     @endif
                     @if(isset($exhibitor->email))
                     <div class="form-group-contact row">
                        <p class="col-md-3">@lang('website.email') <span class="line-contact"></span> </p>
                        <p class="col-md-9" style="word-break: break-all">{{$exhibitor->email}} </p>
                     </div>
                     @endif
                     @if(isset($exhibitor->marketing))
                     <div class="form-group-contact row">
                        <p class="col-md-3">@lang('website.marketing') <span class="line-contact"></span> </p>
                        <p class="col-md-9">{{$exhibitor->marketing}} </p>
                     </div>
                     @endif
                     @if(isset($exhibitor->sales))
                     <div class="form-group-contact row">
                        <p class="col-md-3">@lang('website.sales')<span class="line-contact"></span></p>
                        <p class="col-md-9">{{$exhibitor->sales}} </p>
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
                              <li><a class='ins' href="{{$exhibitor->instagram}}" target="_blank" ></a></li>
                              @endif
                              @if(isset($exhibitor->linkedin))
                              <li><a class='link-in' href="{{$exhibitor->linkedin}}" target="_blank" ></a></li>
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
   </div>
   </div>
</section>


<!-- message -->

<div class="modal fade message-pop"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-width modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-4">
            <div class="row"><div>
              <img src="{{asset('website/images/banner-login.jpg')}}" width="100%" class="banner-login" ></div>
            </div>
          </div>
          <div class="col-sm-8">
            <h3 class="h3-login">@lang('website.welcome'), @lang('website.send_your_message')</h3>
            <div class="line-sec back-red"></div>
            <form style="margin-top:20px;" action="{{route('SendMessageMember')}}" method="post">
              <div class="form-group">
                <label for="exampleInputEmail1">@lang('website.title')</label>
                @csrf
                @auth
                <input type="text" name="member_id" value="{{$exhibitor->exhibitor_id}}" hidden="">
                @endauth
                <input type="text" name="subject" class="form-control" id="subject" placeholder="" required="">
              </div>
              <div class="form-group">
                <label for="message">@lang('website.message')</label>
                <textarea name="message" required="" class="form-control" id="message" ></textarea>
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-dark btn-login-su">@lang('website.send')</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <button class="btn-close-pop" data-dismiss="modal"><i class="fas fa-times"></i></button>  
    </div>
  </div>
</div>




<!--rate modal start-->
<div class="modal fade  rate-modal" id="rate-model" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle ">@lang('website.rate_me')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                                <!--rate div start-->
                    <div class="main-three">
            @auth
             <div class='rating-stars'>
                    <!-- <h2 class="rate-this-title" >
                    <span style="font-size:17px ;margin-right: 4px"><i class="fas fa-circle"></i></span>
                    Rate This 
                     </h2> -->
                 <ul id="stars">
                @for($i = 1; $i <= 5; $i++)
                @if($exhibitor->rate >= $i)
                  <li class='star selected' data-value={{$i}} >
                    <i class='fa fa-star fa-fw'></i>
                  </li>
                @else
                  <li class='star' data-value={{$i}}>
                    <i class='fa fa-star fa-fw'></i>
                  </li>
                @endif
                @endfor
                <!-- <li class='star' data-value='1'>
                  <i class='fa fa-star fa-fw'></i>
                </li>
                <li class='star' title='Fair' data-value='2'>
                  <i class='fa fa-star fa-fw'></i>
                </li>
                <li class='star' title='Good' data-value='3'>
                  <i class='fa fa-star fa-fw'></i>
                </li>
                <li class='star' title='Excellent' data-value='4'>
                  <i class='fa fa-star fa-fw'></i>
                </li>
                <li class='star' title='WOW!!!' data-value='5'>
                  <i class='fa fa-star fa-fw'></i>
                </li> -->
              </ul>
            </div>
            <div style="display: none;" id="success_div" class="text-success text-center">@lang('website.rated_success')</div>
            <!-- Rating Stars Box -->
           
            <!-- <div class="star-float" onclick="test();">
              <input class="rb-rating" value="{{$exhibitor->rate}}" type="text" data-min=0 data-max=5 data-step=0.1 />
            </div> -->
            
            @endauth
            
            <!-- <p class="review-profile">7 Review</p> -->
            <!-- <div class="favourite">4 <i class="fas fa-bookmark color-red"></i></div> -->
          </div>
        <!-- / rate div end-->
      </div>
      <div class="modal-footer">
         <!-- <button type="button" class="btn btn-success">@lang('web')</button> -->
        <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
      </div>
    </div>
  </div>
</div>
<!--rate modal end-->


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
<!-- for page only -->
<script src="{{asset('website/js/jquery.liMarquee.js')}}"></script>
<script src="{{asset('website/js/zoom-image.js')}}"></script>
<script src="{{asset('website/js/main.js')}}"></script>
<script src="{{asset('website/js/slick.min.js')}}" type="text/javascript" charset="utf-8"></script>
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


@auth
<script type="text/javascript">
$(document).ready(function(){
  
  /* 1. Visualizing things on Hover - See next part for action on click */
  $('#stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
   
    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });
    
  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover');
    });
  });
  
  
  /* 2. Action to perform on click */
  $('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
    
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
    
    // JUST RESPONSE (Not needed)
    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
    var msg = "";
    if (ratingValue > 1) {
        msg = "Thanks! You rated this " + ratingValue + " stars.";
    }
    else {
        msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
    }
    // rate ajax
    // alert(msg);
    var url = "{{route('rateExhibitorAjax')}}";
    var exhibitor = "{{$exhibitor->slug}}";
      var csrf_token = "{{ csrf_token() }}";
      $.ajax({
      /* the route pointing to the post function */
      url: url,
      type: 'POST',
      /* send the csrf-token and the input to the controller */
      data: {
              _token: csrf_token,
              rate:ratingValue,
              exhibitor_slug:exhibitor
            },
      dataType: 'JSON',
      /* remind that 'data' is the response of the AjaxController */
      success: function (data) {
        console.log(data);
        if(data.status == 'success'){
         
          // alert(data.message);
          $('#success_div').show();
          // $('#rate-model').modal('hide');
          return false;
        }

        if(data.status == 'error'){
          alert(data.message);
          return false;
        }

      }
    }); 
    responseMessage(msg);
    
  });
  
  
});


function responseMessage(msg) {
// ajax rate

  $('.success-box').fadeIn(200);  
  $('.success-box div.text-message').html("<span>" + msg + "</span>");
}
</script>
<!--/ jjs scripts  end-->
@else

@endauth
<!--===============================================================================================-->
@endsection