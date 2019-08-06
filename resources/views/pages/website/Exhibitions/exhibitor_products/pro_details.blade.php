@extends('layouts.website')
@section('title','Member')
@section('content')

<style>
  .h3-about {
      padding: 10px 0px 5px 10px;
  }

  .more {
    float: left;
  }
  .less {
    float: left;
  }
</style>

  



<!--...........................profile-head...................-->
<div class="profile-company" style="background-image:url({{asset('website/images/construction.jpg')}}">
  <div class="inner-sec">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/{{$exhibitor->slug}}"> <img src="{{asset('images/en/med')}}/{{$exhibitor->profile_pic}}" class="logo-company-profile"></a>
          <!-- <div class="pin-div back-red"><i class="fas fa-map-marker-alt"></i> {{$exhibitor->country}}</div> -->
          <div class="clear"></div>
          <a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/{{$exhibitor->slug}}"><h1 class="h1-profile">{{$exhibitor->name}}</h1></a>
          <h5 class="h5-profil">@lang('website.business_type') <strong class="strong-type">{{$exhibitor->category}}</strong></h5>
          <div class="line-account back-red"></div>
          <div class="main-three">
            <div class="star-float">
              <input class="rb-rating" value="{{$exhibitor->rate}}" type="text" data-min=0 data-max=5 data-step=1 disabled  />
            </div>
            <!-- <p class="review-profile">7 Review</p> -->
            <div class="favourite">4 <i class="fas fa-bookmark color-red"></i></div>
          </div>
          <div class="clear"></div>
          <p class="contact"><i class="fas fa-map-marker-alt color-red"></i> {{$exhibitor->address}}  </p>                      
          <p class="contact"><i class="fas fa-phone color-red"></i> {{$exhibitor->phone}} </p>                      
          <p class="contact"><i class="fas fa-envelope color-red"></i> {{$exhibitor->email}}</p>                      
          <div class="clear"></div>
        </div>

        <div class="col-md-6 three-div-big">
          <div class="position-relative big-item">
            <div class="share-div">
              <div class="share-holder hid-share">
                <div class="showshare"><span>@lang('website.share') </span><i class="fa fa-share"></i></div>
                <div class="share-container  isShare"></div>
              </div>
              {{--
              @if(isset(Auth::user()->id))
              @if($exhibitor->user_id != Auth::user()->id)
              <button class="btn-messgae" data-toggle="modal" data-target=".message-pop"><i class="fas fa-envelope"></i> @lang('website.messages')</button>@endif                    
              @endif
              --}}
              <div class="clear"></div>                                         
              <br><br>
              {{--
              <a class="btn-profile"><i class="fas fa-star color-red"></i> Add Review </a>
              <!-- <a class="btn-profile"><i class="fas fa-bell color-red"></i>  Notfication -  156  </a> -->
              @if($exhibitor->viewed != 0)
              <a class="btn-profile"><i class="fas fa-eye color-red"></i>  @lang('website.viewed')   {{$exhibitor->viewed}}  </a>
              @endif
              --}}
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
          <li><a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibition/Member/{{$exhibition_slug}},{{$exhibitor_slug}}">@lang('website.about_exhibitor')</a></li>
          <li><a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibition/Member/Products/{{$exhibition_slug}},{{$exhibitor_slug}}">@lang('website.exhibitor_products')</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
   
<!--...........................details company...................-->

<div class="padding-details">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          @if(isset($galleries))
          <div class="col-lg-7">
            <div class="slider-zoom">
              @foreach($galleries as $index=>$image)
              @if($index == 0)
              <div class="show show-item" href="{{asset('/images/en/products_gallery/med')}}/{{$image->image}}">
              @endif
              @endforeach
                @foreach($galleries as $index=>$image)
                @if($index == 0)
                <img src="{{asset('/images/en/products_gallery/med')}}/{{$image->image}}" id="show-img">
                @endif
                @endforeach
              </div>
              <div class="small-img">
                <img src="images/online_icon_right@2x.png" class="icon-left" alt="" id="prev-img">
                <div class="small-container">
                  <div id="small-img-roll">
                    @foreach($galleries as $index=>$image)
                    <img src="{{asset('/images/en/products_gallery/med')}}/{{$image->image}}" class="show-small-img" alt="">
                    @endforeach
                  </div>
                </div>
                <img src="images/online_icon_right@2x.png" class="icon-right" alt="" id="next-img">
              </div>  
              <div class="clear"></div>
            </div>
          </div>
          @endif
          @if(isset($specifications))
          <div class="col-lg-5">
            <h2 class="pro-name">@lang('website.product_name')</h2>
            <input class="rb-rating" value="2" type="text" data-min=0 data-max=5 data-step=1/>
            <div class="details-div">
              <h5>@lang('website.description')</h5>
              <ul>
                @foreach($specifications as $spec)
                <li><apan class="text-danger">{{$spec->specification}}</apan> : {{$spec->description}}</li>
                @endforeach
                
              </ul>
            </div>
          </div>
          @endif
        </div>
        <div class="row">
          <div class="col-sm-8"></div>
          <div class="col-sm-4">
            <div class="pro-rat"> </div>
          </div>
        </div>
        <div class="main-details" id="sec-1">
          <div class="div-title">
            <h3 class="h3-about">@lang('website.product_details')</h3>
          </div>
          <div class="content-company">
            <p class="text-justify">{{$product_details->description}}</p>
          </div>
        </div>
        <div style="height:40px"></div>
        {{--
        <h3 class="h3-comment text-left">@lang('website')</h3>
        <div class="line-sec-pro back-red"></div>
        <div class="">
          <div class="container">
            <div class="resCarousel" data-items="2-3-4-5" data-slide="5" data-speed="900" data-interval="4000" data-load="0" data-animator="lazy">
            <div class="resCarousel-inner" id="eventLoad">
              <div class="item">
                <div class="tile">
                  <img src="images/news-footer.jpg" class="img-client" >
                </div>
              </div>
              <div class="item">
                <div class="tile">
                  <img src="images/news-footer.jpg" class="img-client" >
                </div>
              </div>
              <div class="item">
                <div class="tile">
                  <img src="images/news-footer.jpg" class="img-client" >
                </div>
                </div>
                <div class="item">
                  <div class="tile">
                    <img src="images/news-footer.jpg" class="img-client" >
                  </div>
                </div>
                <div class="item">
                  <div class="tile">
                    <img src="images/news-footer.jpg" class="img-client" >
                  </div>
                </div>
                <div class="item">
                  <div class="tile">
                    <img src="images/news-footer.jpg" class="img-client" >
                  </div>
                </div>
              </div>
              <button class='btn btn-default leftRs'><</button>
              <button class='btn btn-default rightRs'>></button>
            </div>
            --}}
          </div>
        </div>
      </div>
      <!--..........................aside...................-->
  </div>
</div>
</div>







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





@endsection