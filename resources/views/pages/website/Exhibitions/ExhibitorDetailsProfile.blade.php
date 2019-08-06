@extends('layouts.website')
@section('title','Member')
@section('content')

<!--...........................profile-head...................-->
<div class="profile-company" style="background-image:url({{asset('website/images/construction.jpg')}}">
  <div class="inner-sec">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/{{$exhibitor_slug}}">
            @if($exhibitor_details->profile_pic)
            <img src="{{asset('images/en/med')}}/{{$exhibitor_details->profile_pic}}" class="logo-company-profile">
            @else
            <img src="{{url('/website/images')}}/logo-company-stantard-en.jpg" class="img-expo-item float-left">
            @endif
          </a>
          @if(isset($exhibitor_details->country))<div class="pin-div back-red"><i class="fas fa-map-marker-alt"></i> {{$exhibitor_details->country}}</div>@endif
          <div class="clear"></div>
          <a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/{{$exhibitor_slug}}"><h1 class="h1-profile">{{$exhibitor_details->exhibitor_name}}</h1></a>
          <h5 class="h5-profil">@lang('website.business_type') <strong class="strong-type">{{$exhibitor_details->cat_name}}</strong></h5>
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
          <div class="line-account back-red"></div>
          <div class="main-three">
            <div class="star-float">
              <input class="rb-rating" value="{{$exhibitor_details->rate}}" type="text" data-min=0 data-max=5 data-step=1 disabled  />
            </div>
            <!-- <p class="review-profile">7 Review</p> -->
            <div class="favourite">4 <i class="fas fa-bookmark color-red"></i></div>
          </div>
          <div class="clear"></div>
          @if(isset($exhibitor_details->address))
          <p class="contact"><i class="fas fa-map-marker-alt color-red"></i> {{$exhibitor_details->address}}  </p>
          @endif
          @if(isset($exhibitor_details->phone))
          <p class="contact"><i class="fas fa-phone color-red"></i> {{$exhibitor_details->phone}} </p>                      
          @endif
          @if(isset($exhibitor_details->email))
          <p class="contact"><i class="fas fa-envelope color-red"></i> {{$exhibitor_details->email}}</p>                      
          @endif
          <div class="clear"></div>
        </div>

        <div class="col-md-6 three-div-big">
          <div class="position-relative big-item">
            <div class="share-div">
              <div class="share-holder hid-share">
                <div class="showshare"><span>@lang('website.share') </span><i class="fa fa-share"></i></div>
                <div class="share-container  isShare"></div>
              </div>
              {{dd($exhibitor)}}
              @if(isset(Auth::user()->id))
                @if($exhibitor->exhibitor_id != Auth::user()->id)
                <button class="btn btn-expo  btn-pop-items " data-toggle="modal" data-target=".message-pop"><div class="icon-btn-expo"><i class="fas fa-envelope"></i></div> @lang('website.send_message')</button>
                <!-- <button class="btn-messgae" data-toggle="modal" data-target=".message-pop"><i class="fas fa-envelope"></i> @lang('website.messages')</button>@endif  -->
                @endif
                            
              <div class="clear"></div>                                         
              <br><br>
              <!-- <a class="btn-profile"><i class="fas fa-star color-red"></i> Add Review </a> -->
              <!-- <a class="btn-profile"><i class="fas fa-bell color-red"></i>  Notfication -  156  </a> -->
              @if($exhibitor_details->viewed != 0)
              <a class="btn-profile"><i class="fas fa-eye color-red"></i>  @lang('website.viewed')   {{$exhibitor_details->viewed}}  </a>
              @endif
            </div>   
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="overlay-profile"></div>
  <div class="bubble-bg"></div>
</div>


<div  class="sec-details">
  <div class="container">
    <div class="row">
      <div class="head-menu-company">
        <div class="text-center">
          <div class="btn-menu-com" ><i class="fas fa-bars"></i></div>
        </div>
        <ul class="nav-details nav-co">
          <li><a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibition/Member/{{$exhibitor_details->exh_slug}},{{$exhibitor_slug}}">@lang('website.about_exhibitor')</a></li>
          <li><a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibition/Member/Products/{{$exhibitor_details->exh_slug}},{{$exhibitor_slug}}">@lang('website.exhibitor_products')</a></li>
      
        </ul>
      </div>
    </div>
  </div>
</div>
   
<!--...........................details company...................-->
<div class="padding-details">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="main-details" id="sec-1">
          <div class="div-title">
            <div class="shape"><i class="fas fa-building"></i> </div>
            <h3 class="h3-about">@lang('website.about_exhibition') {{$exhibitor_details->exhibitor_name}}</h3>
          </div>
          <div class="content-company">
            <p class="text-justify">{{$exhibitor_data->about}} </p>
            @if(isset($exhibitor_details->file))
            <button class="btn btn-pdf"><i class="far fa-file-pdf"></i> Download PDF</button>
            @endif
          </div>
        </div>
        
      </div>
<!-- services -->
      <div class="col-lg-8">
        @if(isset($exhibitor_data))
        <div class="main-details" id="sec-1">
          <div class="div-title">
            <div class="shape"><i class="fas fa-tasks"></i> </div>
            <h3 class="h3-about">{{$exhibitor_details->exhibitor_name}} @lang('website.services')</h3>
          </div>
          <div class="content-company">
            <p class="text-justify">{{$exhibitor_data->services}}</p>
          </div>
        </div>  
        @endif
      </div>
      <!-- end services -->
          <!--..........................aside...................-->
  
      <div class="col-lg-4">
        <div class="counter-side">
          <div class="row">
          	{{--
            <div class="col-4 border-action">
              <div class="inline-facts-wrap">
                <div class="inline-facts text-center">
                  <i class="fas fa-dollar-sign"></i>
                  <div class="milestone-counter text-center">
                    <div class="stats animaper">
                      @if(isset(Auth::user()->id))
                      <div class="num" data-content="0" data-num="{{Auth::user()->wallet}}">0</div>
                      @endif
                    </div>
                  </div>
                  <h6 class="text-center">@lang('website.wallet')</h6>
                </div>
              </div>
            </div>
            --}}
            <div class="col-4 border-action">
              <div class="inline-facts-wrap">
                <div class="inline-facts text-center">
                  <i class="fas fa-bullhorn"></i>
                  <div class="milestone-counter text-center">
                    <div class="stats animaper">
                      <div class="num" data-content="0" data-num="">0</div>
                    </div>
                  </div>
                  <h6 class="text-center">@lang('website.exhibitions')</h6>
                </div>
              </div>
            </div>  
            <div class="col-4 ">
              <div class="inline-facts-wrap">
                <div class="inline-facts text-center">
                  <i class="fas fa-gavel"></i>
                  <div class="milestone-counter text-center">
                    <div class="stats animaper">
                      <div class="num" data-content="0" data-num="12168">0</div>
                    </div>
                  </div>
                <h6 class="text-center">@lang('website.auctions')</h6>
              </div>
            </div>
          </div>
          <div class="col-12" style="height:20px"></div> 
          <div class="col-4 border-action">
            <div class="inline-facts-wrap">
              <div class="inline-facts text-center">
                <i class="fas fa-envelope"></i>
                <div class="milestone-counter text-center">
                  <div class="stats animaper">
                    <div class="num" data-content="0" data-num="12168">0</div>
                  </div>
                </div>
                <h6 class="text-center">@lang('website.tenders')</h6>
              </div>
            </div>
          </div>
          <div class="col-4 border-action">
            <div class="inline-facts-wrap">
              <div class="inline-facts text-center">
                <i class="fas fa-box-open"></i>
                <div class="milestone-counter text-center">
                  <div class="stats animaper">
                    <div class="num" data-content="0" data-num="12168">0</div>
                  </div>
                </div>
                <h6 class="text-center">@lang('website.products')</h6>
              </div>
            </div>
          </div>  
          <div class="col-4 ">
            <div class="inline-facts-wrap">
              <div class="inline-facts text-center">
                <i class="fas fa-edit"></i>
                <div class="milestone-counter text-center">
                  <div class="stats animaper">
                    <div class="num" data-content="0" data-num="12168">0</div>
                  </div>
                </div>
                <h6 class="text-center">@lang('website.posts')</h6>
              </div>
            </div>
          </div>  
        </div>                           
      </div>
      <h3 class="h3-contact">@lang('website.contact_details')</h3>
      <div class="container-contact-main">
        <div class="contact-back-red"></div>
        <div class="text-center">
          @if($exhibitor_details->profile_pic)
          <img src="{{asset('images/en/med')}}/{{$exhibitor_details->profile_pic}}" class="logo-contact-main">
          @else
          <img src="{{url('/website/images')}}/logo-company-stantard-en.jpg" class="img-expo-item float-left">
          @endif
        </div>
        <div class="padding-contact">
        @if(isset($exhibitor_details->address))
        <h6 class="h6-title"><i class="fas fa-map-marker color-red"></i> @lang('website.address') :</h6>
        <p class="p-contact">{{$exhibitor_details->address}}</p>
        @endif
        @if(isset($exhibitor_details->phone))
        <h6 class="h6-title"><i class="fas fa-phone color-red"></i>  @lang('website.phone') :</h6>
        <p class="p-contact"> {{$exhibitor_details->phone}}</p>
        @endif
        @if(isset($exhibitor_details->ceo))
        <h6 class="h6-title"><i class="fas fa-street-view color-red"></i>  @lang('website.ceo') :</h6>
        <p class="p-contact"> {{$exhibitor_details->ceo}}</p>
        @endif
        @if(isset($exhibitor_details->marketing))
        <h6 class="h6-title"><i class="fas fa-user-circle color-red"></i>  @lang('website.marketing') :</h6>
        <p class="p-contact"> {{$exhibitor_details->marketing}}</p>
        @endif
        @if(isset($exhibitor_details->sales))
        <h6 class="h6-title"><i class="fas fa-address-book color-red"></i>  @lang('website.sales') :</h6>
        <p class="p-contact"> {{$exhibitor_details->sales}}</p>
        @endif
        @if(isset($exhibitor_details->email))
        <h6 class="h6-title"><i class="fas fa-envelope color-red"></i>  @lang('website.email') :</h6>
        <p class="p-contact"> {{$exhibitor_details->email}}</p>
        @endif
        @if(isset($exhibitor_details->website))
        <h6 class="h6-title"><i class="fas fa-globe color-red"></i>  @lang('website.website') :</h6>
        <p class="p-contact"> <a href="{{$exhibitor_details->website}}">@lang('website.open_site')</a></p>
        @endif
        <div class="list-widget-social">
          <ul>
            @if(isset($exhibitor_details->facebook))
              <li><a href="{{$exhibitor_details->facebook}}" target="_blank" ><i class="fab fa-facebook"></i></a></li>
            @endif
            @if(isset($exhibitor_details->inestagram))
              <li><a href="{{$exhibitor_details->inestagram}}" target="_blank" ><i class="fab fa-instagram"></i></a></li>
            @endif
            @if(isset($exhibitor_details->linkedin))
              <li><a href="{{$exhibitor_details->linkedin}}" target="_blank" ><i class="fab fa-linkedin"></i></a></li>
            @endif
            @if(isset($exhibitor_details->twitter))
              <li><a href="{{$exhibitor_details->twitter}}" target="_blank" ><i class="fab fa-twitter"></i></a></li>
            @endif
            @if(isset($exhibitor_details->youtube))
              <li><a href="{{$exhibitor_details->youtube}}" target="_blank" ><i class="fab fa-youtube"></i></a></li>
            @endif
            @if(isset($exhibitor_details->snapchat))
              <li><a href="{{$exhibitor_details->snapchat}}" target="_blank" ><i class="fab fa-snapchat-ghost"></i></a></li>
            @endif
          </ul>
        </div>
      </div>
    </div>
    <h3 class="h3-contact">@lang('website.related_companies')</h3>
    <div class="container-contact">
      <div class="position-relative main-auctions">
        <img src="{{asset('website/images/ser3.jpg')}}" class="img-auction">
        <div class="div-describtion2"><h6>Name Of company</h6>
      </div>
      <div class="clear"></div>
    </div>
    <div class="position-relative main-auctions">
      <img src="{{asset('website/images/ser3.jpg')}}" class="img-auction">
      <div class="div-describtion2"><h6>Name Of company</h6>
    </div>
    <div class="clear"></div>
  </div>
  <div class="position-relative main-auctions">
    <img src="{{asset('website/images/ser3.jpg')}}" class="img-auction">
    <div class="div-describtion2">
      <h6>Name Of company</h6>
    </div>
    <div class="clear"></div>
  </div>
</div>
<h3 class="h3-contact">@lang('website.lates_auctions')</h3>
<div class="container-contact">
  <div class="position-relative main-auctions">
    <img src="{{asset('website/images/ser3.jpg')}}" class="img-auction">
    <div class="div-describtion">
      <h5>Art Work</h5>
      <p class="p-date-profile"><i class="fas fa-calendar-alt color-red"></i> 1 month ago </p>
    </div>
  </div>
  <a href="#" class="all-link">See All <i class="fas fa-arrow-circle-right i-all "></i></a>
</div>
<h3 class="h3-contact">@lang('website.latest_exhibitions')</h3>
<div class="container-contact">
  <div class="position-relative main-auctions">
    <img src="{{asset('website/images/ser3.jpg')}}" class="img-auction">
    <div class="div-describtion">
      <h5>Art Work</h5>
      <p class="p-date-profile"><i class="fas fa-calendar-alt color-red"></i> 1 month ago </p>
    </div>
  </div>
  <a href="#" class="all-link">See All <i class="fas fa-arrow-circle-right i-all "></i></a>
</div>
<h3 class="h3-contact">@lang('website.latest_tenders')</h3>
<div class="container-contact">
  <div class="position-relative main-auctions">
    <img src="{{asset('website/images/ser3.jpg')}}" class="img-auction">
    <div class="div-describtion"><h5>Art Work</h5>
      <p class="p-date-profile"><i class="fas fa-calendar-alt color-red"></i> 1 month ago </p>
    </div>
  </div>
  <a href="#" class="all-link">See All <i class="fas fa-arrow-circle-right i-all "></i></a>
</div>


</div>
</div>
</div>
</div>

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
                <input type="text" name="member_id" value="{{$exhibitor_details->exhibitor_id}}" hidden="">
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
@include('partials.member.alerts');
<script>
 

$(document).ready( function () {
  $('#table_id').DataTable( {
  });
});

$(function() {
  $(' #da-thumbs > li ').each( function() { $(this).hoverdir(); } );
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
@endsection