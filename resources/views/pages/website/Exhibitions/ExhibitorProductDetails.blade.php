@extends('layouts.website')
@section('title','Exhibitions')
@section('content')
<link href="{{asset('website/css/expo.css')}}" media="all" rel="stylesheet" type="text/css"/>
<link href="{{asset('website/css/liMarquee.css')}}" rel="stylesheet" type="text/css">
<!--...........................rating...................-->
<link href="{{asset('website/css/select.css')}}" media="all" rel="stylesheet" type="text/css"/>
<script src="{{asset('website/js/modernizr.js')}}"></script>
<link rel="stylesheet" href="{{asset('website/css/zoom.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('website/css/slick.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('website/css/slick-theme.css')}}">

 <!--<div class="head-padding"></div>-->


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
  <div class="icon-btn-expo"><i class="fas fa-map-marker-alt"></i></div> {{$exhibitor->country}}</div>

<!--<button class="btn btn-expo  btn-pop-items btn-inner-expo display-table-1"><div class="icon-btn-expo"><i class="fas fa-share-alt"></i></div>  Share</button>
-->

</div>
</div>
<div class="col-lg-6 text-right">
<div class="item-expo-pop">
<div class="btn btn-expo  btn-pop-items btn-inner-expo " style="direction:ltr; min-width:200px;"><div class="icon-btn-expo"><i class="fas fa-map-marker-alt"></i></div> {{$exhibitor->phone}}</div><br class="br-hidden">


<div class="btn btn-expo  btn-pop-items btn-inner-expo " style="direction:ltr; min-width:200px;"><div class="icon-btn-expo"><i class="fas fa-envelope"></i></div> {{$exhibitor->email}}</div>

<br class="br-hidden">

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


<div class="div-message-share"><button class="btn btn-expo  btn-pop-items none-desktop"><div class="icon-btn-expo"><i class="fas fa-map-marker-alt"></i></div> {{$exhibitor->country}}</button>
<!-- <button class="btn btn-expo  btn-pop-items "><div class="icon-btn-expo"><i class="fas fa-share-alt"></i></div> @lang('website.share')</button>  -->
@if(isset(Auth::user()->id))
    @if($exhibitor->exhibitor_id != Auth::user()->id)
    <button class="btn btn-expo  btn-pop-items " data-toggle="modal" data-target=".message-pop"><div class="icon-btn-expo"><i class="fas fa-envelope"></i></div> @lang('website.send_message')</button>
    @endif
    @endif
<button class="btn btn-expo  btn-pop-items "><div class="icon-btn-expo"><i class="fas fa-eye"></i></div> @lang('website.views') {{$exhibitor->viewed}}</button></div>
</div>

<section class="enter-expo-sec-product">
<div class="container">
<div class="row">

<div class="col-lg-12">
<h1 class="h1-product-title">{{$pro_details->name}}</h1>
<div class="float-left">
  <div class="main-three">
         

             
            
            <!-- Rating Stars Box -->
           
            <!-- <div class="star-float" onclick="test();">
              <input class="rb-rating" value="{{$exhibitor->rate}}" type="text" data-min=0 data-max=5 data-step=0.1 />
            </div> -->
          
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
           
            
            <!-- <p class="review-profile">7 Review</p> -->
            <!-- <div class="favourite">4 <i class="fas fa-bookmark color-red"></i></div> -->
                      <!-- rate button start -->
          
            <!-- /rate button end -->
          </div>
        <!-- / rate div end--></div> <div class="float-left view-div"> @lang('website.visits') {{$exhibitor->viewed}}</div>
<div class="clear"></div>
</div>

<div style="height:20px;" class="col-12"></div>
<div class="col-lg-5">
<div class="position-relative">
@if(isset($exhibitor->offer))
<div class="shape-offer2">Offer<br>
 25%</div>
@endif
<div class="slider-zoom">
  @foreach($pro_images as $index => $pro_image)
    @if($index == 0)
      <div class="show show-item" href="{{asset('/images/en/exhibitors/products_gallery/med')}}/{{$pro_image->image}}">
        <img src="{{asset('/images/en/exhibitors/products_gallery/med')}}/{{$pro_image->image}}" id="show-img">
      </div>
    @endif
  @endforeach
<div class="small-img">
    <div class="icon-left btn-zoom" alt="" id="prev-img"><i class="fas fa-chevron-right"></i></div>
    <div class="small-container">
      <div id="small-img-roll">
        @if(isset($pro_images))
          @foreach($pro_images as $pro_image)
            <img src="{{asset('/images/en/exhibitors/products_gallery/med')}}/{{$pro_image->image}}" class="show-small-img" alt="">
          @endforeach
        @endif
      </div>
    </div>
    <div  class="icon-right btn-zoom" alt="" id="next-img"><i class="fas fa-chevron-right"></i></div>
  </div>  
  
  <div class="clear"></div>
  </div>
  </div>
</div>

<div class="col-lg-7">
<button class="btn btn-product"><div class="icon-btn-expo-2"><i class="fas fa-list"></i></div> @lang('website.description')</button>
<p class="p-product-expo">{{$pro_details->description}}</p>

<!-- <button class="btn btn-product"><div class="icon-btn-expo-2"><i class="fas fa-list"></i></div> More Describtion</button>

<ul class="row product-ul">
<li class="col-sm-6"><a  class="hvr-underline-from-left"><i class="fas fa-chevron-right color-red"></i> <strong>Color: </strong> red</a></li>
<li class="col-sm-6"><a  class="hvr-underline-from-left"><i class="fas fa-chevron-right color-red"></i> <strong>Deminision: </strong> 1545 X 5454</a></li>
<li class="col-sm-6"><a  class="hvr-underline-from-left"><i class="fas fa-chevron-right color-red"></i> <strong>width:</strong> 400px X 400px </a></li>
<li class="col-sm-6"><a  class="hvr-underline-from-left"><i class="fas fa-chevron-right color-red"></i> <strong>Screen:  </strong> 5inch</a></li>
<li class="col-sm-6"><a  class="hvr-underline-from-left"><i class="fas fa-chevron-right color-red"></i> <strong>Made in: </strong> France</a></li>
<li class="col-sm-6"><a  class="hvr-underline-from-left"><i class="fas fa-chevron-right color-red"></i> <strong>Ram : </strong> 2G</a></li>


</ul> -->

</div>

{{--
<div class="col-lg-2 border-product small-side">
<h5>Rate this product:</h5>
<input class="rb-rating" value="2" type="text" data-min=0 data-max=5 data-step=1    />
<button class="btn btn-danger standard-btn-product" data-toggle="modal" data-target=".message-pop">ask more</button>
<button class="btn btn-dark standard-btn-product"  data-toggle="modal" data-target=".Comment-pop">Add Comment</button>

<button class="btn btn-dark standard-btn-product" data-toggle="modal" data-target=".report-pop" >Report</button>

<p><strong>100%</strong> of users recommend this product to a friend.</p>

</div>

--}}








{{--
<div class="col-12">


<div class="btn btn-product"><div class="icon-btn-expo-2"><i class="fas fa-comments"></i></div>Add comment </div>

<div class="border-company-comment">
<div class="position-relative">
<img src="images/logo-company2.jpg" class="img-company-expo">
<div class="div-comment-expo">
<textarea class="form-control expo-textarea"></textarea>
</div>
</div>
<div class="text-right"><button class="btn btn-register post-button back-red">Post</button></div>
</div>


<div class="btn btn-product"><div class="icon-btn-expo-2"><i class="fas fa-comments"></i></div>(1)  review </div>
<div class="big-comment">
<div class="text-right"><input class="rb-rating" value="2" type="text" data-min=0 data-max=5 data-step=1  disabled   /></div>

<img src="images/10_avatar-512.jpg" class="comment-product">

<div class="item-comment-expo">
<h3>Eng . Mahamed gamal</h3>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</p>
</div>

<hr>
</div>

<div class="big-comment">
<div class="text-right"><input class="rb-rating" value="2" type="text" data-min=0 data-max=5 data-step=1  disabled   /></div>

<img src="images/10_avatar-512.jpg" class="comment-product">

<div class="item-comment-expo">
<h3>Eng . Mahamed gamal</h3>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</p>
</div>

<hr>
</div>


<div class="btn btn-product"><div class="icon-btn-expo-2"><i class="fas fa-building"></i></div>More Product From this Company</div>

<div class="padding-slider-expo">

    
<section class="variable product-slider" style="direction:ltr;">
    <div>
    <img src="images/mobile.png" class="img-slick-item">
    </div>
    
  <div>
    <img src="images/mobile.png" class="img-slick-item">
    </div><div>
    <img src="images/mobile.png" class="img-slick-item">
    </div><div>
    <img src="images/mobile.png" class="img-slick-item">
    </div><div>
    <img src="images/mobile.png" class="img-slick-item">
    </div><div>
    <img src="images/mobile.png" class="img-slick-item">
    </div><div>
    <img src="images/mobile.png" class="img-slick-item">
    </div>
    </section>
    
        
</div>


<div class="btn btn-product"><div class="icon-btn-expo-2"><i class="fas fa-building"></i></div>More Product </div>

<div class="padding-slider-expo">

    
<section class="variable product-slider" style="direction:ltr;">
    <div>
    <img src="images/mobile.png" class="img-slick-item">
    </div>
    
  <div>
    <img src="images/mobile.png" class="img-slick-item">
    </div><div>
    <img src="images/mobile.png" class="img-slick-item">
    </div><div>
    <img src="images/mobile.png" class="img-slick-item">
    </div><div>
    <img src="images/mobile.png" class="img-slick-item">
    </div><div>
    <img src="images/mobile.png" class="img-slick-item">
    </div><div>
    <img src="images/mobile.png" class="img-slick-item">
    </div>
    </section>
    
        
</div>

</div>
--}}

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
<!-- Optional JavaScript -->
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


        <!-- rate -->

            





@if(LaravelLocalization::getCurrentLocale() == 'en')
<script src="{{asset('website/js/zoom-image-rtl.js')}}" ></script>
@else
<script src="{{asset('website/js/zoom-image.js')}}" ></script>
@endif
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
