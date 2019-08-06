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
          <div class="main-three">
            {{--
            <div class="star-float">
              <input class="rb-rating" value="{{$member->rate}}" type="text" data-min=0 data-max=5 data-step=1 disabled  />
            </div>
            --}}
            <!-- <p class="review-profile">7 Review</p> -->
            <!-- <div class="favourite">4 <i class="fas fa-bookmark color-red"></i></div> -->
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
        {{--
        <h3 class="h3-comment text-left">@lang('website.comments')</h3>
        <div class="line-sec-pro back-red"></div>

        <!-- comment -->
        <div class="main-comment">
          <div class="img-comment">
            @if(isset($member->profile_pic))
          <img src="{{asset('images/en/med')}}/{{$member->profile_pic}}" width="100%" height="100%" alt="">
          @else
          <img src="{{asset('website/images/')}}/logo-company-stantard-{{LaravelLocalization::getCurrentLocale()}}.jpg" class="logo-contact-main">
          @endif
          </div>
          <form action="{{route('MemberProductCommentPost')}}" method="get">
          <textarea required="" name="comment" class="text-area-comment form-control" ></textarea>
          @csrf
          <input hidden="" name="commenter_id" value="{{Auth::user()->id}}">
          <input hidden="" name="pro_id" value="{{$pro_details->id}}">
          <input hidden="" name="member_id" value="{{$member->user_id}}">
          <div class="text-right"><button class="btn btn-register post-button back-red">@lang('website.send')</button></div>
          </form>
        </div>
        <!-- comment -->
        @if(isset($comments))
        @if(count($comments) > 0)
        <div class="comments-container">
          <ul id="comments-list" class="comments-list">
            @foreach($comments as $comment)
            <li>
              @if($comment->parent_created == NULL)
              <div class="comment-main-level">
                <!-- Avatar -->
                <div class="comment-avatar"><img src="{{asset('images/en/med')}}/{{$comment->profile_pic}}" alt=""></div>
                <!-- Contenedor del Comentario -->
                <div class="comment-box">
                  <div class="comment-head">
                    <h6 class="comment-name by-author"><a href="#">{{$comment->name}}</a></h6>
                    <button class="btn btn-del"> <i class="fas fa-times"></i></button>
                  </div>
                  <div class="comment-content">
                    {{$comment->comment}}
                  </div>
                  <div class="icons-commment">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-sm-4"><i class="fas fa-calendar-alt"></i>{{$comment->created_at}} </div>
                        <div class="col-sm-12 icons-dir">
                          <!-- <button class="btn btn-comment"> <i class="far fa-heart"></i> 1245</button> -->
                          @if(Auth::user()->id == $member->user_id)
                          <button class="btn btn-comment"> <i class="fas fa-reply"></i></button>
                          <!-- comment -->
                            
                            <form action="{{route('MemberProductCommentPost')}}" method="post">
                            <textarea required="" name="comment" class="text-area-comment form-control" ></textarea>
                            @csrf
                            <input hidden="" name="commenter_id" value="{{Auth::user()->id}}">
                            <input hidden="" name="pro_id" value="{{$pro_details->id}}">
                            <input hidden="" name="member_id" value="{{$member->user_id}}">
                            <input hidden="" name="commenter_id" value="{{Auth::user()->id}}">
                            <input hidden="" name="parent_created" value="{{$comment->created_at}}">
                            <div class="text-right"><button class="btn btn-register post-button back-red">@lang('website.reply')</button></div>
                            </form>
                            @endif
                          <!-- comment -->
                          <button class="btn btn-comment"> </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              @foreach($comments as $reply)
              @if($reply->parent_created == $comment->created_at)
              <!-- Respuestas de los comentarios -->
              <ul class="comments-list reply-list">
                <li>
                  <!-- Avatar -->
                  <div class="comment-avatar"><img src="{{asset('images/en/med')}}/{{$reply->profile_pic}}" alt=""></div>
                  <!-- Contenedor del Comentario -->
                  <div class="comment-box">
                    <div class="comment-head">
                      <h6 class="comment-name"><a href="http://creaticode.com/blog">{{$reply->name}}</a></h6>
                      <button class="btn btn-del"> <i class="fas fa-times"></i></button>
                    </div>
                    <div class="comment-content">
                      {{$reply->comment}}
                    </div>
                    <div class="icons-commment">
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-sm-4"><i class="fas fa-calendar-alt"></i>{{$reply->created_at}} </div>
                          <div class="col-sm-8 icons-dir">
                            <!-- <button class="btn btn-comment"> <i class="far fa-heart"></i> 1245</button> -->
                            <!-- <button class="btn btn-comment"> <i class="fas fa-reply"></i></button> -->
                            <button class="btn btn-comment"> </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
              @endif
              @endforeach

              @endif
            </li>
            @endforeach
          </ul>
        </div>
        @endif
        @endif
        --}}
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





@include('partials.website.footer')
<script src="{{asset('website/js/paginga.jquery.js')}}" ></script>
{{-- <script src="{{asset('website/js/star-rating.js')}}" type="text/javascript"></script> --}}
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

<!-- <script>
$('.rb-rating').rating({
                'showCaption': true,
                'stars': '5',
                'min': '0',
                'max': '3',
                'step': '1',
                'size': 'xs',
            });
</script> -->
@include('partials.member.alerts')
<script>
 

$(document).ready( function () {
    $('#table_id').DataTable( {
  });

} );
</script>

@endsection