@extends('layouts.website')
@section('title','Member')
@section('content')
@section('social')
<meta property="og:url"           content="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/{{$member->member_slug}}" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="My Business" />
<meta property="og:description"   content="{{$member->member_about}}" />
<meta property="og:image"         content="{{asset('images/en/larg')}}/{{$member->profile_pic}}" />
@endsection
{{--
@if(isset($member->profile_cover))
<div class="profile-company" style="background-image:url({{asset('images/en/larg')}}/{{$member->profile_cover}}">
@else
<div class="profile-company" style="background-image:url({{asset('website/images/construction.jpg')}}">
@endif
--}}








<!--member-blade-page start-->
   <div class=" member-blade-page" >
   <div class="profile-company" style="background-image:url({{asset('website/images/construction.jpg')}}">
  <div class="inner-sec">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          @if(isset($member->profile_pic))
          <img src="{{asset('images/en/med')}}/{{$member->profile_pic}}" class="logo-company-profile">
          @else
          <img src="{{asset('website/images/')}}/logo-company-stantard-{{LaravelLocalization::getCurrentLocale()}}.jpg" class="logo-company-profile">
          @endif


          <div class="float-left">
          @if(isset($member->country))<div class="pin-div back-red"><i class="fas fa-map-marker-alt"></i> {{$member->country}}</div>@endif

 
           
</div>

          <div class="clear"></div>
          <h1 class="h1-profile display-inline-block ">{{$member->member_name}}</h1>
          <h5 class="h5-profil margin-vertical-10">@lang('website.business_type') <strong class="strong-type">{{$member->category}}</strong></h5>
          <div class="line-account back-red"></div> 
                    <!--rate div start-->
                    <div class="main-three">
            @auth
             <div class='rating-stars'>
                 <ul style="display:inline-block">
                @for($i = 1; $i <= 5; $i++)
                @if($member->rate >= $i)
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
              <input class="rb-rating" value="{{$member->rate}}" type="text" data-min=0 data-max=5 data-step=0.1 />
            </div> -->
            @else
             <div class='rating-stars'>
              <ul id='stars'>
                @for($i = 1; $i <= 5; $i++)
                @if($member->rate >= $i)
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
              <input class="rb-rating" value="{{$member->rate}}" type="text" data-min=0 data-max=5 data-step=0.1 disabled />
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
        <!-- member email start-->
            @if(isset($member->ceo))
            <p class="contact margin-top-10"><i class="fas fa-envelope color-red"></i> {{$member->ceo}}</p>
            {{--
              @if($CheckMemberExistDb > 0)
              <p class="contact"><i class="fas fa-envelope color-red"></i> {{$member->ceo}}</p>
              @endif
              --}}
            @endif
            {{--
          @else
          <a href="{{route('login')}}" class="btn btn-danger">@lang('website.show_contact')</a>
          @endif
         --}}
      <!-- / member email end-->
        <!-- member phone start-->
          {{--
            @if(isset($CheckMemberExistDb))
        
            @if(isset($member->member_address))
            <p class="contact"><i class="fas fa-map-marker-alt color-red"></i> {{$member->member_address}}  </p>
              @if($CheckMemberExistDb > 0)
                <p class="contact"><i class="fas fa-map-marker-alt color-red"></i> {{$member->member_address}}  </p>
              @endif
             
            @endif --}}

            @if(isset($member->phone))
            <p class="contact" style="margin-bottom: 25px;margin-top: 10px" ><i class="fas fa-phone color-red"></i><span style="direction: ltr; display: inline-table;"> {{$member->phone}}</span> </p>
            {{--
              @if($CheckMemberExistDb > 0)
                <p class="contact"><i class="fas fa-phone color-red"></i> <span style="direction: ltr; display: inline-table;">  {{$member->phone}} </span></p>
              @else
                <p class="contact"><i class="fas fa-phone color-red"></i> <a href="{{route('login')}}" class="btn btn-danger">@lang('website.show_contact')</a> </p>
              @endif    
              --}}
            @endif

      <!-- / member phone end-->


          <div class="clear"></div>
          
          
          
          


          <div class="clear"></div>
        </div>
        <div class="col-md-6 three-div-big">
          <div class="position-relative big-item">  
            <div class="share-div">
           @auth
                @if($CheckMemberExistDb > 0)
                  @if($member->user_id != Auth::user()->id)
                    <button class="btn-messgae" data-toggle="modal" data-target=".message-pop"><i class="fas fa-envelope"></i> @lang('website.messages')</button>@endif 
                @endif
              @endauth
                              
             

               @if(isset($viewersCount))
              <button class="btn-messgae"> <i class="fas fa-eye "></i> @lang('website.views') {{$viewersCount}}</button> 
              @endif                                        
             

               <div class="share-face">
<div class="share-face-button">
              <iframe src="https://www.facebook.com/plugins/share_button.php?href=https://www.mybusinessme.com/{{LaravelLocalization::getCurrentLocale()}}/{{$member->member_slug}}&layout=button_count&size=large&appId=660907277672312&width=108&height=28" width="83" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/ar_AR/sdk.js#xfbml=1&version=v3.2&appId=660907277672312&autoLogAppEvents=1"></script>
</div>
              </div>



              <!-- <a class="btn-profile"><i class="fas fa-star color-red"></i> Add Review </a> -->
              <!-- <a class="btn-profile"><i class="fas fa-bell color-red"></i>  Notfication -  156  </a> -->
            
              
            </div>    
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- <div class="overlay-profile"></div> -->
  <div class="bubble-bg"></div>
  <!-- <div class="brush"></div> -->
</div>

@include('partials.member.member_tabs')
<!--...........................details company...................-->
<div class="padding-details">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="main-details" id="sec-1">
          <div class="div-title">
            <div class="shape"><i class="fas fa-building"></i> </div>
            <h3 class="h3-about">@lang('website.about_me') {{$member->member_name}}</h3>
          </div>
          <div class="content-company">
            <p class="text-justify">{{$member->member_about}} </p>
            @if(isset($member->file))
            <button class="btn btn-pdf"><i class="far fa-file-pdf"></i> Download PDF</button>
            @endif
          </div>
        </div>
        @if(isset($member->services))
        <div class="main-details" id="sec-1">
          <div class="div-title">
            <div class="shape"><i class="fas fa-tasks"></i> </div>
            <h3 class="h3-about">@lang('website.services')</h3>
          </div>
          <div class="content-company">
            <p class="text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, </p>
          </div>
        </div>  
        @endif
    
<!-- services -->
  
        @if(isset($member->member_services))
        <div class="main-details" id="sec-1">
          <div class="div-title">
            <div class="shape"><i class="fas fa-tasks"></i> </div>
            <h3 class="h3-about">{{$member->member_name}} @lang('website.services')</h3>
          </div>
          <div class="content-company">
            <p class="text-justify">{{$member->member_services}}</p>
          </div>
        </div>  
        @endif
   
        </div>
      <!-- end services -->
          <!--..........................aside...................-->
  
      <div class="col-lg-4">
        <div class="counter-side">
          <div class="row">
            <!-- check logged  -->
            @if(isset(Auth::user()->id))
            <!-- own profile -->
            @if(Auth::user()->id == $member->user_id)
            <div class="col-4 border-action">
              <div class="inline-facts-wrap">
                <div class="inline-facts text-center">
                  <i class="fas fa-dollar-sign"></i>
                  <div class="milestone-counter text-center">
                    <div class="stats animaper">
                      <div class="num" data-content="0" data-num="{{Auth::user()->wallet}}">{{Auth::user()->wallet}}</div>
                    </div>
                  </div>
                  <h6 class="text-center">@lang('website.wallet')</h6>
                </div>
              </div>
            </div>
           
            <!-- <div class="col-4 border-action">
              <div class="inline-facts-wrap">
                <div class="inline-facts text-center">
                  <i class="fas fa-bullhorn"></i>
                  <div class="milestone-counter text-center">
                    <div class="stats animaper">
                      <div class="num" data-content="0" data-num="{{$subscribed_exhibitions}}">0</div>
                    </div>
                  </div>
                  <h6 class="text-center">@lang('website.exhibitions')</h6>
                </div>
              </div>
            </div>   -->
            <!-- <div class="col-4 ">
              <div class="inline-facts-wrap">
                <div class="inline-facts text-center">
                  <i class="fas fa-gavel"></i>
                  <div class="milestone-counter text-center">
                    <div class="stats animaper">
                      <div class="num" data-content="0" data-num="0">0</div>
                    </div>
                  </div>
                <h6 class="text-center">@lang('website.auctions')</h6>
              </div>
            </div>
          </div> -->
          <!-- <div class="col-12" style="height:20px"></div>  -->
          <!-- <div class="col-4 border-action">
            <div class="inline-facts-wrap">
              <div class="inline-facts text-center">
                <i class="fas fa-envelope"></i>
                <div class="milestone-counter text-center">
                  <div class="stats animaper">
                    <div class="num" data-content="0" data-num="0">0</div>
                  </div>
                </div>
                <h6 class="text-center">@lang('website.tenders')</h6>
              </div>
            </div>
          </div> -->
          <div class="col-4 border-action">
            <div class="inline-facts-wrap">
              <div class="inline-facts text-center">
                <a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Member/{{$member->member_slug}}/Products/">
                <i class="fas fa-box-open"></i>
                <div class="milestone-counter text-center">
                  <div class="stats animaper">
                   
                    @if(isset($products_count))
                    <div class="num" data-content="0" data-num="{{$products_count}}">{{$products_count}}</div>
                    @else
                    <div class="num" data-content="0" data-num="{{$products}}">{{$products}}</div>
                    @endif
                  </div>
                </div>
                <h6 class="text-center">@lang('website.products')</h6>
              </div>
              </a>
            </div>
          </div>  
          <div class="col-4 ">
            <div class="inline-facts-wrap">
              <div class="inline-facts text-center">
                <i class="fas fa-eye"></i>
                <div class="milestone-counter text-center">
                  <div class="stats animaper">
                    <div class="num" data-content="0" data-num="{{$products_viewers}}">0</div>
                  </div>
                </div>
                <h6 class="text-center">@lang('website.products_views')</h6>
              </div>
            </div>
          </div>  
          <!-- end own profile -->
          @else
          <!-- other profile -->

          <!-- <div class="col-4 border-action">
              <div class="inline-facts-wrap">
                <div class="inline-facts text-center">
                  <i class="fas fa-dollar-sign"></i>
                  <div class="milestone-counter text-center">
                    <div class="stats animaper">
                      <div class="num" data-content="0" data-num="{{Auth::user()->wallet}}">{{Auth::user()->wallet}}</div>
                    </div>
                  </div>
                  <h6 class="text-center">@lang('website.wallet')</h6>
                </div>
              </div>
            </div> -->
           
            <!-- <div class="col-4 border-action">
              <div class="inline-facts-wrap">
                <div class="inline-facts text-center">
                  <i class="fas fa-bullhorn"></i>
                  <div class="milestone-counter text-center">
                    <div class="stats animaper">
                      <div class="num" data-content="0" data-num="{{$subscribed_exhibitions}}">0</div>
                    </div>
                  </div>
                  <h6 class="text-center">@lang('website.exhibitions')</h6>
                </div>
              </div>
            </div>   -->
            <!-- <div class="col-4 ">
              <div class="inline-facts-wrap">
                <div class="inline-facts text-center">
                  <i class="fas fa-gavel"></i>
                  <div class="milestone-counter text-center">
                    <div class="stats animaper">
                      <div class="num" data-content="0" data-num="0">0</div>
                    </div>
                  </div>
                <h6 class="text-center">@lang('website.auctions')</h6>
              </div>
            </div>
          </div> -->
          <!-- <div class="col-12" style="height:20px"></div>  -->
          <!-- <div class="col-4 border-action">
            <div class="inline-facts-wrap">
              <div class="inline-facts text-center">
                <i class="fas fa-envelope"></i>
                <div class="milestone-counter text-center">
                  <div class="stats animaper">
                    <div class="num" data-content="0" data-num="0">0</div>
                  </div>
                </div>
                <h6 class="text-center">@lang('website.tenders')</h6>
              </div>
            </div>
          </div> -->
          <div class="col-6 border-action">
            <div class="inline-facts-wrap">
              <a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Member/{{$member->member_slug}}/Products/">
              <div class="inline-facts text-center">
                <i class="fas fa-box-open"></i>
                <div class="milestone-counter text-center">
                  <div class="stats animaper">
                    @if(isset($products_count))
                    <a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Member/{{$member->member_slug}}/Products/">
                    <div class="num" data-content="0" data-num="{{$products_count}}">{{$products_count}}</div></a>
                    @else
                    <div class="num" data-content="0" data-num="{{$products}}">{{$products}}</div>
                    @endif
                  </div>
                </div>
                <h6 class="text-center">@lang('website.products')</h6>
              </div>
            </a>
            </div>
          </div>  
          <div class="col-6 ">
            <div class="inline-facts-wrap">
              <div class="inline-facts text-center">
                <i class="fas fa-eye"></i>
                <div class="milestone-counter text-center">
                  <div class="stats animaper">
                    <div class="num" data-content="0" data-num="{{$products_viewers}}">0</div>
                  </div>
                </div>
                <h6 class="text-center">@lang('website.products_views')</h6>
              </div>
            </div>
          </div>  
          @endif
          @else
          <div class="col-6 border-action">
            <div class="inline-facts-wrap">
              <a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Member/{{$member->member_slug}}/Products/">
              <div class="inline-facts text-center">
                <i class="fas fa-box-open"></i>
                <div class="milestone-counter text-center">
                  <div class="stats animaper">
                    @if(isset($products_count))
                    <a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Member/{{$member->member_slug}}/Products/">
                    <div class="num" data-content="0" data-num="{{$products_count}}">{{$products_count}}</div></a>
                    @else
                    <div class="num" data-content="0" data-num="{{$products}}">{{$products}}</div>
                    @endif
                  </div>
                </div>
                <h6 class="text-center">@lang('website.products')</h6>
                <!-- <h6 class="text-center"> <i class="fa fa-eye"></i> @lang('website.views') {{$products_viewers}}</h6> -->
              </div>
            </a>
            </div>
          </div>  
          <div class="col-6 ">
            <div class="inline-facts-wrap">
              <div class="inline-facts text-center">
                <i class="fas fa-eye"></i>
                <div class="milestone-counter text-center">
                  <div class="stats animaper">
                    <div class="num" data-content="0" data-num="{{$products_viewers}}">0</div>
                  </div>
                </div>
                <h6 class="text-center">@lang('website.products_views')</h6>
              </div>
            </div>
          </div>
          @endif
        </div>                           
      </div>
      
      <div class="container-contact-main">
        <h3 class="h3-contact">@lang('website.contact_details')</h3>
        <div class="contact-back-red"></div>
        <div class="text-center">
          @if(isset($member->profile_pic))
          <img src="{{asset('images/en/med')}}/{{$member->profile_pic}}" class="logo-contact-main">
          @else
          <img src="{{asset('website/images/')}}/logo-company-stantard-{{LaravelLocalization::getCurrentLocale()}}.jpg" class="logo-contact-main">
          @endif
        </div>
        {{--
        @if(isset($CheckMemberExistDb))
        @if($CheckMemberExistDb > 0)
        --}}
          <div class="padding-contact">
          @if(isset($member->member_address))
          <h6 class="h6-title"><i class="fas fa-map-marker color-red"></i> @lang('website.address') :</h6>
          <p class="p-contact">{{$member->member_address}}</p>
          @endif
          @if(isset($member->phone))
          <h6 class="h6-title"><i class="fas fa-phone color-red"></i>  @lang('website.phone') :</h6>
          <p class="p-contact"> {{$member->phone}}</p>
          @endif
          @if(isset($member->ceo))
          <h6 class="h6-title"><i class="fas fa-street-view color-red"></i>  @lang('website.email') :</h6>
          <p class="p-contact"> {{$member->ceo}}</p>
          @endif
          @if(isset($member->marketing))
          <h6 class="h6-title"><i class="fas fa-user-circle color-red"></i>  @lang('website.marketing') :</h6>
          <p class="p-contact"> {{$member->marketing}}</p>
          @endif
          @if(isset($member->sales))
          <h6 class="h6-title"><i class="fas fa-address-book color-red"></i>  @lang('website.sales') :</h6>
          <p class="p-contact"> {{$member->sales}}</p>
          @endif
          @if(isset($member->email))
          <h6 class="h6-title"><i class="fas fa-envelope color-red"></i>  @lang('website.email') :</h6>
          <p class="p-contact"> {{$member->email}}</p>
          @endif
          @if(isset($member->website))
          <h6 class="h6-title"><i class="fas fa-globe color-red"></i>  @lang('website.website') :</h6>
          <p class="p-contact"> {{$member->website}}</p>
          @endif
          <div class="list-widget-social">
          <ul>
            @if(isset($member->facebook))
              <li><a href="{{$member->facebook}}" target="_blank" ><i class="fab fa-facebook"></i></a></li>
            @endif
            @if(isset($member->instagram))
              <li><a href="{{$member->instagram}}" target="_blank" ><i class="fab fa-instagram"></i></a></li>
            @endif
            @if(isset($member->linkedin))
              <li><a href="{{$member->linkedin}}" target="_blank" ><i class="fab fa-linkedin"></i></a></li>
            @endif
            @if(isset($member->twitter))
              <li><a href="{{$member->twitter}}" target="_blank" ><i class="fab fa-twitter"></i></a></li>
            @endif
            @if(isset($member->youtube))
              <li><a href="{{$member->youtube}}" target="_blank" ><i class="fab fa-youtube"></i></a></li>
            @endif
            @if(isset($member->snapchat))
              <li><a href="{{$member->snapchat}}" target="_blank" ><i class="fab fa-snapchat-ghost"></i></a></li>
            @endif
          </ul>
          {{--
          @else
          <hr>
            <a href="{{route('login')}}" class="btn btn-danger">@lang('website.show_contact')</a>
          @endif
          --}}
        </div>
        {{--
        @endif
        --}}

      </div>

    </div>
    
    <!-- <div class="container-contact">
      <h3 class="h3-contact">@lang('website.related_companies')</h3>
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
    </div> -->

  <!-- <div class="container-contact">
    <h3 class="h3-contact">@lang('website.lates_auctions')</h3>
    <div class="position-relative main-auctions">
      <img src="{{asset('website/images/ser3.jpg')}}" class="img-auction">
      <div class="div-describtion">
        <h5>Art Work</h5>
        <p class="p-date-profile"><i class="fas fa-calendar-alt color-red"></i> 1 month ago </p>
      </div>
    </div>
    <a href="#" class="all-link">See All <i class="fas fa-arrow-circle-right i-all "></i></a>
  </div> -->

  <!-- <div class="container-contact">
    <h3 class="h3-contact">@lang('website.latest_exhibitions')</h3>
    <div class="position-relative main-auctions">
      <img src="{{asset('website/images/ser3.jpg')}}" class="img-auction">
      <div class="div-describtion">
        <h5>Art Work</h5>
        <p class="p-date-profile"><i class="fas fa-calendar-alt color-red"></i> 1 month ago </p>
      </div>
    </div>
    <a href="#" class="all-link">See All <i class="fas fa-arrow-circle-right i-all "></i></a>
  </div> -->

  <!-- <div class="container-contact">
    <h3 class="h3-contact">@lang('website.latest_tenders')</h3>
    <div class="position-relative main-auctions">
      <img src="{{asset('website/images/ser3.jpg')}}" class="img-auction">
      <div class="div-describtion"><h5>Art Work</h5>
        <p class="p-date-profile"><i class="fas fa-calendar-alt color-red"></i> 1 month ago </p>
      </div>
    </div>
    <a href="#" class="all-link">See All <i class="fas fa-arrow-circle-right i-all "></i></a>
  </div> -->


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
                <label for="exampleInputEmail1">@lang('website.subject')</label>
                @csrf
                <input type="text" name="member_id" value="{{$member->user_id}}" hidden="">
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
                @if($member->rate >= $i)
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
              <input class="rb-rating" value="{{$member->rate}}" type="text" data-min=0 data-max=5 data-step=0.1 />
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


</div>
<!--/member-blade-page end-->

<!--js scripts  start-->
<!-- Load Facebook SDK for JavaScript -->
@include('partials.website.footer')
<script src="{{asset('website/js/paginga.jquery.js')}}" ></script>
<script src="{{asset('website/js/star-rating.js')}}" type="text/javascript"></script>
<script src="{{asset('website/js/plugins.js')}}" ></script>
<script src="{{asset('website/js/script.js')}}" ></script>
<!-- Optional JavaScript -->

@include('partials.member.alerts')

<script async defer src="https://connect.facebook.net/es_LA/sdk.js"></script> 
<script>
 
 $(document).ready(function() {
  $.ajaxSetup({ cache: true });
  $.getScript('https://connect.facebook.net/en_US/sdk.js', function(){
    FB.init({
      appId: '660907277672312',
      version: 'v3.2' // or v2.1, v2.2, v2.3, ...
    });     
    // $('#loginbutton,#feedbutton').removeAttr('disabled');
      // FB.getLoginStatus(updateStatusCallback);
  });
});

$(document).ready( function () {
  $('.my_account_menu').show();
  $('.my_profile_menu').hide();
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
    var url = "{{route('rateAjax')}}";
    var member = "{{$member->member_slug}}";
      var csrf_token = "{{ csrf_token() }}";
      $.ajax({
      /* the route pointing to the post function */
      url: url,
      type: 'POST',
      /* send the csrf-token and the input to the controller */
      data: {
              _token: csrf_token,
              rate:ratingValue,
              member_slug:member
            },
      dataType: 'JSON',
      /* remind that 'data' is the response of the AjaxController */
      success: function (data) {
        console.log(data);
        if(data.status == 'success'){
          $('#PasswordInput').val('');
          $('#ConfirmPasswordInput').val('');
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