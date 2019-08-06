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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('admin/bower_components/modernizr/js/modernizr.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/bower_components/modernizr/js/css-scrollbars.js')}}"></script>
{{--
@if(isset($member->profile_cover))
<div class="profile-company" style="background-image:url({{asset('images/en/larg')}}/{{$member->profile_cover}}">
@else
<div class="profile-company" style="background-image:url({{asset('website/images/construction.jpg')}}">
@endif
--}}
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
          <h1 class="h1-profile">{{$member->member_name}}</h1>
          <h5 class="h5-profil">@lang('website.business_type') <strong class="strong-type">{{$member->category}}</strong></h5>
          <div class="line-account back-red"></div> 
                    <!--rate div start-->
                    <div class="main-three">
            @auth
             <div class='rating-stars' style="display: inline-block;">
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
             <div class='rating-stars' style="display: inline-block;">
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
            <button type="button " class="btn btn-warning rating-button" data-toggle="modal"  data-target="#rate-model" title="Rate This Business" style="display: inline-block;" >
              <span style="color: #fff"><i class="fa fa-star fa-fw"></i></span>
                @lang('website.rate_me')
            </button>
            @endauth
            <!-- /rate button end -->
          </div>
          <div class="clear"></div>
          
          {{--
            @if(isset($CheckMemberExistDb))
        
            @if(isset($member->member_address))
            <p class="contact"><i class="fas fa-map-marker-alt color-red"></i> {{$member->member_address}}  </p>
              @if($CheckMemberExistDb > 0)
                <p class="contact"><i class="fas fa-map-marker-alt color-red"></i> {{$member->member_address}}  </p>
              @endif
             
            @endif --}}

            @if(isset($member->phone))
            <p class="contact"><i class="fas fa-phone color-red"></i><span style="direction: ltr; display: inline-table;"> {{$member->phone}}</span> </p>
            {{--
              @if($CheckMemberExistDb > 0)
                <p class="contact"><i class="fas fa-phone color-red"></i> <span style="direction: ltr; display: inline-table;">  {{$member->phone}} </span></p>
              @else
                <p class="contact"><i class="fas fa-phone color-red"></i> <a href="{{route('login')}}" class="btn btn-danger">@lang('website.show_contact')</a> </p>
              @endif    
              --}}
            @endif

            @if(isset($member->ceo))
            <p class="contact"><i class="fas fa-envelope color-red"></i> {{$member->ceo}}</p>
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

          <div class="clear"></div>
        </div>
        <div class="col-md-6 three-div-big">
          <div class="position-relative big-item">





            
            <div class="share-div">

<style type="text/css">
@media(max-width:768px){

     .share-face{
      text-align: center;
      margin-top: 20px;
    
  }
  .btn-messgae {
          margin-top: 20px;


  }
  }
  .share-face{
       display: inline-block;
    padding: 5px 10px;
    position: relative;

  }
 .share-face-button{
  position: absolute;
  top: -10px;
 }
 @media(max-width:500px){
    .share-face{
       display: block;


     }
     .share-face-button{
      position: static;
     }


 }
</style>


            

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
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-5">
              <h2 class="pro-name">@lang('website.product_name') : {{$pro_details->name}}</h2>
              <!-- <input class="rb-rating" value="2" type="text" data-min=0 data-max=5 data-step=1 /> -->
              @if(isset($pro_specifications))
              <div class="details-div">
                <h5>@lang('website.specifications')</h5>
                <ul>
                  @foreach($pro_specifications as $pro_spec)
                  <li>{{$pro_spec->specification}} : {{$pro_spec->description}}</li>
                  @endforeach
                </ul>
              </div>
              @endif
            </div>
          <div class="col-lg-7">
            <div class="slider-zoom">
              @foreach($all_product_images_slider as $index => $pro_image)
                @if($index == 0)
                <div class="show show-item" href="{{asset('images/en/products_gallery/med')}}/{{$pro_image->image}}">
                  <img src="{{asset('images/en/products_gallery/med')}}/{{$pro_image->image}}" id="show-img">
                </div>
                @endif
              @endforeach
              
              <div class="small-img">

                <img src="{{asset('website/images/online_icon_right@2x.png')}}" class="icon-left" alt="" id="prev-img">

                <div class="small-container">
                  <div id="small-img-roll">
                    @foreach($all_product_images_slider as $pro_image)
                    <img src="{{asset('images/en/products_gallery/med')}}/{{$pro_image->image}}" class="show-small-img" alt="">
                    @endforeach
                    </div>
                  </div>
                
                    <img src="{{asset('website/images/online_icon_right@2x.png')}}" class="icon-right" alt="" id="next-img">
       
                </div>  
                <div class="clear"></div>
              </div>
            </div>
            
          </div>
          <div class="row">
            <div class="col-sm-8">
          </div>
          <div class="col-sm-4">
            <div class="pro-rat"> </div>
          </div>
        </div>
        <div class="main-details" id="sec-1">
          <div class="div-title">
            <style>
            .h3-about {
            padding: 10px 0px 5px 10px;
            }
            </style>
            <h3 class="h3-about">@lang('website.product_details')</h3>
          </div>
          <div class="content-company">
            <p class="text-justify">{{$pro_details->description}}</p>
          </div>
        </div>



<!-- big comment div start -->
<div class="row big-comment-div">
  <!-- comment-p start-->
  <div class="col-lg-12">
    <div class="  comment-p ">
      <h3 class="h3-comment text-left">@lang('website.comments')</h3>
      <div class="line-sec-pro back-red"></div>
    </div>
  </div>
  <!-- /comment-p end-->
  <!--  comment div start -->
  @auth
    @php
      $commenter = DB::select('
                                SELECT member_lang.name,
                                member_lang.slug,
                                member_details.profile_pic as commenter_logo,
                                member_lang.member_id
                                FROM mybusiu2_mybusinesme.member_lang member_lang
                                INNER JOIN mybusiu2_mybusinesme.member_details member_details
                                ON (member_lang.member_id = member_details.user_id)
                                WHERE (member_lang.member_id = '.Auth::user()->id.')
                              ');
    @endphp
    <div class="col-lg-12 col-sm-12 main-comment">
      <div class="row">
        <div class="col-sm-3 col-md-1  padding-horizontal-0">
          <div class="comment-img-div">
            @if(isset($commenter[0]->commenter_logo))
              <img src="{{asset('images/en/med')}}/{{$commenter[0]->commenter_logo}}" width="100%" height="100%" alt="">
            @else
              <img src="{{asset('website/images/')}}/logo-company-stantard-{{LaravelLocalization::getCurrentLocale()}}.jpg"  width="100%" height="100%" alt="">
            @endif
          </div>
        </div>
        
        <form class="col-sm-9 col-md-11" action="{{route('MemberProductCommentPost')}}" method="post">
          <textarea class=" form-control fi-comment-text-area" required="" name="comment"></textarea>
          @csrf
          <input hidden="" name="commenter_id" value="{{Auth::user()->id}}">
          <input hidden="" name="pro_id" value="{{$pro_details->id}}">
          <input hidden="" name="member_id" value="{{$member->user_id}}">
          <button class="btn comment-button"> @lang('website.comments')</button>
        </form>
      </div>
    </div>
  @endauth
@if(isset($comments))
@if(count($comments) > 0)
  <!-- / comment div end -->
  <!--  replay div start -->
  <div class="col-lg-12 replay-div">
    <!-- whole-one-comment-replay start -->
    @foreach($comments as $index_comment => $comment)
    <div class="col-lg-12 whole-one-comment">
      <!--main comment start-->
      @if($comment->parent_created == NULL)
      <div class="col-lg-12 comment-replay-layout">
        <div class="row">
          <div class="col-sm-3  col-md-2">
            <div class="replay-img-div">
              @if(isset($comment->member_logo))
               <img src="{{asset('images/en/med')}}/{{$comment->commenter_logo}}" width="100%" height="100%" alt="">
              @else
                <img src="{{asset('images/en/med')}}/logo-company-stantard-{{LaravelLocalization::getCurrentLocale()}}.jpg" width="100%" height="100%" alt="">
              @endif
            </div>
          </div>
          <div class="col-sm-9  col-md-10 comment-right-div">
            <h3 class="profile-name-comment website-red-color"> {{$comment->commenter_name}}</h3>
            <p class="date-div-comment padding-left-5">
              <span class="comment-date">{{$comment->created_at}}</span>
              <!-- <span class="comment-time margin-left-10">3 : 10 :50 </span> -->
            </p>
            <p class="padding-vertical-5 font-16"> {{$comment->comment}}</p>
            <div class="comment-repaly-factor">
              <a herf="#" class="display-inline-block  like-color">
              <span class="comment-icon-reaction"><i class="far fa-thumbs-up"></i></span>
              <span class="comment-reaction">@lang('website.like')</span>
              </a>
              <a class="display-inline-block replay-color" data-toggle="collapse" href="#main-comment-replay-{{$index_comment}}" role="button" aria-expanded="false" aria-controls="main-comment-replay">
              <span class="comment-icon-reaction "><i class="fas fa-reply"></i></span>
              <span class="comment-reaction">@lang('website.reply')</span>
              </a>
              <a herf="#" class="display-inline-block  edit-color ">
              <span class="comment-icon-reaction"><i class="fas fa-edit"></i></span>
              <span class="comment-reaction">@lang('website.edit')</span>
              </a>
            </div>
            @auth
            <div id="main-comment-replay-{{$index_comment}}" class="collapse multi-collapse">
                <a class="btn btn-secondary margin-top-10 replay-button-class" onclick="comment_now_{{$index_comment}}()">@lang('website.reply')</a>
                <form class="margin-top-20" id="send_comment_form_{{$index_comment}}" method="post" action="{{route('MemberProductCommentPost')}}">
                @csrf
                <textarea class="form-control fi-comment-text-area" name="comment"></textarea>
                <input hidden="" type="" name="parent_created" value="{{$comment->created_at}}">
                <input hidden="" type="" name="member_id" value="{{$member->user_id}}">
                <input hidden="" type="" name="commenter_id" value="{{Auth::user()->id}}">
                <input hidden="" type="" name="pro_id" value="{{$pro_details->id}}">
              </form>
                <script type="text/javascript">
                  function comment_now_{{$index_comment}}(){
                    $('#send_comment_form_{{$index_comment}}').submit();
                  }
                </script>
            </div>
            @endauth
          </div>
        </div>
      </div>

      @foreach($comments as $reply)
      @if($reply->parent_created == $comment->created_at)
      <div class="col-lg-12 ">
        <div class="row   margin-top-10">
          <div class="col-sm-12">
            <div class="col-sm-12 reply-comment-div-layout margin-bottom-10">
              <div class="row">
                <div class="col-sm-12 comment-right-div ">
                  <div class="width-percent-100">
                    <div class="width-percent-8 replay-img-big-div">
                      <div class="replay-img-div">
                        @if(isset($reply->member_logo))
                          <div class="comment-avatar"><img src="{{asset('images/en/med')}}/{{$reply->commenter_logo}}" alt=""></div>
                        @else
                          <div class="comment-avatar"><img src="{{asset('images/en/med')}}/logo-company-stantard-{{LaravelLocalization::getCurrentLocale()}}.jpg" width="100%" height="100%" alt=""></div>
                        @endif
                      </div>
                    </div>
                    <div class="display-inline-block width-percent-87 replay-p-big-div">
                      <h3 class="profile-name-comment website-red-color ">{{$reply->commenter_name}}</h3>
                      <p class="date-div-comment padding-left-5">
                        <span class="comment-date">{{$reply->created_at}}</span>
                        <!-- <span class="comment-time margin-left-10">3 : 10 :50 </span> -->
                      </p>
                      <p class="padding-vertical-5 font-16"> {{$reply->comment}}</p>
                      <div class="comment-repaly-factor margin-bottom-10">
                        <a herf=" #" class="display-inline-block  like-color">
                        <span class="comment-icon-reaction"><i class="far fa-thumbs-up"></i></span>
                        <span class="comment-reaction">@lang('website.like')</span>
                        </a>
                       
                        <a herf=" #" class="display-inline-block  edit-color ">
                        <span class="comment-icon-reaction"><i class="fas fa-edit"></i></span>
                        <span class="comment-reaction">@lang('website.edit')</span>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
      @endif
      @endforeach
      @endif
      <!-- /main comment end-->
      <!--main comments replay start-->
      <!--/main comments replay end-->
    </div>
    @endforeach
     
    <!-- / whole-one-comment-replay end-->
    <!-- whole-one-comment-replay start -->
    <div class="col-lg-12 whole-one-comment">
      <!--main comment start-->
     
      <!-- /main comment end-->
      <!--main comments replay start-->
   
      <!--/main comments replay end-->
    </div>
    <!-- / whole-one-comment-replay end-->
  </div>
  <!-- / replay div end -->
</div>

<div class="container" id='app'>
            <comment-list :product="{{$pro_details->id }}"></comment-list>
        </div>







<!--/ big comment div end -->
@endif
@endif






















<div style="height:40px"></div>

        
        @if(isset($other_products))
        @if(count($other_products) > 0)
        <div style="height:40px"></div>
        <h3 class="h3-comment text-left">@lang('website.other_products')</h3>
        <div class="line-sec-pro back-red"></div>
        <div class="">
        <div class="container">
        <div class="padding-slider">
          <div class="resCarousel" data-items="1-2-3-4" data-slide="1" data-speed="900" data-interval="4000" data-load="0" data-animator="lazy">
          <div class="resCarousel-inner" id="eventLoad">
            @foreach($other_products as $pro)
              <a href="{{route('MemberProductDetails',[$member->member_slug,$pro->slug])}}">
                @foreach($pro_images as $index => $all_product_image)
                @if($pro->id == $all_product_image->pro_id)
                <div class="item">
                  <div class="tile">
                    <img src="{{asset('/images/en/products_gallery/med')}}/{{$all_product_image->image}}" width="200" height="200" class="img-client" >
                  </div>
                </div>
                @endif
                @endforeach
              </a>
            @endforeach
          </div>
          <button class='btn btn-default leftRs'><</button>
          <button class='btn btn-default rightRs'>></button>
        </div>
        </div>
        @endif
        @endif
        
      
      </div>
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
            <h3 class="h3-login">Welcome ., Sent your Message</h3>
            <div class="line-sec back-red"></div>
            <form style="margin-top:20px;" action="{{route('SendMessageMember')}}" method="post">
              <div class="form-group">
                <label for="exampleInputEmail1">Title message</label>
                @csrf
                <input type="text" name="member_id" value="{{$member->user_id}}" hidden="">
                <input type="text" name="subject" class="form-control" id="subject" placeholder="" required="">
              </div>
              <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" required="" class="form-control" id="message" ></textarea>
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-dark btn-login-su">Send</button>
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


<script src="{{ mix('js/app.js') }}" type="text/javascript"></script>

@include('partials.website.footer')
<script src="{{asset('website/js/paginga.jquery.js')}}" ></script>
<script src="{{asset('website/js/plugins.js')}}" ></script>
<script src="{{asset('website/js/jquery.dataTables.js')}}" ></script>
<script src="{{asset('website/js/jquery.hoverdir.js')}}" ></script>
@if(LaravelLocalization::getCurrentLocale() == 'ar')
<script src="{{asset('website/js/zoom-image-rtl.js')}}" ></script>
@else
<script src="{{asset('website/js/zoom-image.js')}}" ></script>
@endif
<script src="{{asset('website/js/script.js')}}" ></script>
<script src="{{asset('website/js/main.js')}}"></script>
<script src="{{asset('website/js/resCarousel.js')}}"></script>


@include('partials.member.alerts')
<script>
 

$(document).ready( function () {
    $('#table_id').DataTable( {
  });

} );
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