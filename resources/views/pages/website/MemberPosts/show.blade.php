@extends('layouts.website')
@section('title','Member')
@section('content')

<!--...........................profile-head...................-->
<div class="profile-company" style="background-image:url({{asset('website/images/construction.jpg')}}">
  <div class="inner-sec">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="{{asset('images/en/med')}}/{{$member->profile_pic}}" class="logo-company-profile">
          <div class="pin-div back-red"><i class="fas fa-map-marker-alt"></i> {{$member->country}}</div>
          <div class="clear"></div>
          <h1 class="h1-profile">{{$member->name}}</h1>
          <h5 class="h5-profil">Business Type <strong class="strong-type">{{$member->category}}</strong></h5>
          <div class="line-account back-red"></div>
          <div class="main-three">
            <div class="star-float">
              <input class="rb-rating" value="{{$member->rate}}" type="text" data-min=0 data-max=5 data-step=1 disabled  />
            </div>
            <!-- <p class="review-profile">7 Review</p> -->
            <div class="favourite">4 <i class="fas fa-bookmark color-red"></i></div>
          </div>
          <div class="clear"></div>
          <p class="contact"><i class="fas fa-map-marker-alt color-red"></i> {{$member->address}}  </p>                      
          <p class="contact"><i class="fas fa-phone color-red"></i> {{$member->phone}} </p>                      
          <p class="contact"><i class="fas fa-envelope color-red"></i> {{$member->email}}</p>                      
          <div class="clear"></div>
        </div>

        <div class="col-md-6 three-div-big">
          <div class="position-relative big-item">
            <div class="share-div">
              <div class="share-holder hid-share">
                <div class="showshare"><span>@lang('website.share') </span><i class="fa fa-share"></i></div>
                <div class="share-container  isShare"></div>
              </div>
              @if($member->user_id != Auth::user()->id)
              <button class="btn-messgae" data-toggle="modal" data-target=".message-pop"><i class="fas fa-envelope"></i> @lang('website.messages')</button>@endif                    
              <div class="clear"></div>                                         
              <br><br>
              <a class="btn-profile"><i class="fas fa-star color-red"></i> Add Review </a>
              <!-- <a class="btn-profile"><i class="fas fa-bell color-red"></i>  Notfication -  156  </a> -->
              @if($member->viewed != 0)
              <a class="btn-profile"><i class="fas fa-eye color-red"></i>  @lang('website.viewed')   {{$member->viewed}}  </a>
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
@include('partials.member.member_tabs')

<!--...........................details company...................-->
      
<div class="padding-details">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
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
                @foreach($all_product_images_slider as $index => $pro_image)
                @if($index == 0)
                <img src="{{asset('website/images/online_icon_right@2x.png')}}" class="icon-left" alt="" id="prev-img">
                @endif
                @endforeach
                <div class="small-container">
                  <div id="small-img-roll">
                    @foreach($all_product_images_slider as $pro_image)
                    <img src="{{asset('images/en/products_gallery/med')}}/{{$pro_image->image}}" class="show-small-img" alt="">
                    @endforeach
                    </div>
                  </div>
                  @if($index == 0)
                    <img src="{{asset('website/images/online_icon_right@2x.png')}}" class="icon-right" alt="" id="next-img">
                  @endif  
                </div>  
                <div class="clear"></div>
              </div>
            </div>
            <div class="col-lg-5">
              <h2 class="pro-name">{{$pro_details->name}}</h2>
              <input class="rb-rating" value="2" type="text" data-min=0 data-max=5 data-step=1 />
              <div class="details-div">
                <h5>@lang('website.specifications')</h5>
                <ul>
                  @foreach($pro_specifications as $pro_spec)
                  <li>{{$pro_spec->specification}} : {{$pro_spec->description}}</li>
                  @endforeach
                </ul>
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
        <h3 class="h3-comment text-left">@lang('website.comments')</h3>
        <div class="line-sec-pro back-red"></div>

        <!-- comment -->
        <div class="main-comment">
          <div class="img-comment">
            <img src="{{asset('images/en/med')}}/{{$member->profile_pic}}" width="100%" height="100%" alt="">
          </div>
          <form action="{{route('MemberProductCommentPost')}}" method="post">
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
        @if(isset($other_products))
        @if(count($other_products) > 0)
        <div style="height:40px"></div>
        <h3 class="h3-comment text-left">@lang('website.more_prodcuts')</h3>
        <div class="line-sec-pro back-red"></div>
          <div class="">
            <div class="container">
              <div class="resCarousel" data-items="2-3-4-5" data-slide="4" data-speed="900" data-interval="4000" data-load="0" data-animator="lazy">
                <div class="resCarousel-inner" id="eventLoad">
                  @foreach($other_products as $pro)
                  <a href="{{route('MemberProductDetails')}}" onclick="event.preventDefault();
                                                     document.getElementById('MemberProductDetailsFormID{{$pro->id}}').submit();">
                    <form id="MemberProductDetailsFormID{{$pro->id}}" action="{{ route('MemberProductDetails') }}" method="POST" style="display: none;">
                      @csrf
                      <input hidden="" name="pro_id" value="{{$pro->id}}">
                      <input hidden="" name="member_id" value="{{$member->user_id}}">
                    </form>
                    @foreach($pro_images as $index => $all_product_image)
                    @if($pro->id == $all_product_image->pro_id)
                    <div class="item">
                      <div class="tile">
                        <img src="{{asset('/images/en/products_gallery/med')}}/{{$all_product_image->image}}" class="img-client" >
                      </div>
                    </div>
                    @endif
                    @endforeach
                  </a>
                  @endforeach
                <button class='btn btn-default leftRs'><</button>
                <button class='btn btn-default rightRs'>></button>
              </div>
            </div>
          </div>
        </div>
        @endif
        @endif
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
@include('partials.member.alerts')
<script>
 

$(document).ready( function () {
    $('#table_id').DataTable( {
  });

} );
</script>

@endsection