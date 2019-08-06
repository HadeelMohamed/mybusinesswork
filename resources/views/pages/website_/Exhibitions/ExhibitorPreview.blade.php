@extends('layouts.website')
@section('title','Member')
@section('content')


<!--...........................profile-head...................-->
<div class="profile-company" style="background-image:url({{asset('website/images/construction.jpg')}}">
  <div class="inner-sec">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/{{$exhibitor->slug}}"><img src="{{asset('images/en/med')}}/{{$exhibitor->profile_pic}}" class="logo-company-profile"></a>
          <div class="pin-div back-red"><i class="fas fa-map-marker-alt"></i> {{$exhibitor->country}}</div>
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
              <a class="btn-profile"><i class="fas fa-star color-red"></i> Add Review </a>
              <!-- <a class="btn-profile"><i class="fas fa-bell color-red"></i>  Notfication -  156  </a> -->
              @if($exhibitor->viewed != 0)
              <a class="btn-profile"><i class="fas fa-eye color-red"></i>  @lang('website.viewed')   {{$exhibitor->viewed}}  </a>
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
        <!-- <ul class="nav-details nav-co">
          <li><a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibition/Member/{{$exhibition_slug}},{{$exhibitor_slug}}">@lang('website.about_exhibitor')</a></li>
          <li><a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibition/Member/Products/{{$exhibition_slug}},{{$exhibitor_slug}}">@lang('website.exhibitor_products')</a></li>
        </ul> -->
      </div>
    </div>
  </div>
</div>

</div>
<!--...........................details company...................-->
<div class="padding-details">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        @if(isset($products))
        <div class="container-fluid" id="paging_container8">
          <ul class="row content da-thumbs" id="da-thumbs">
            @foreach($products as $pro_index => $pro)
            <li class="col-lg-4">
              <a >
                <img src="{{asset('/images/en/products_gallery/med')}}/{{$pro->image}}" />
                <div>
                  <span>{{$pro->name}}</span>
                </div>
              </a>
            </li>
            @Endforeach
          </ul>
          <div class="page_navigation"></div>
          <div class="clear"></div>
        </div>
        @endif
      </div>
      <!--..........................aside...................-->
  
      <div class="col-lg-4">
        <div class="counter-side">
          <div class="row">
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
            {{--
            <div class="col-4 border-action">
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
            </div>
            --}}
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
          <img src="{{asset('images/en/med')}}/{{$exhibitor->profile_pic}}" class="logo-contact-main">
        </div>
        <div class="padding-contact">
        @if(isset($exhibitor->address))
        <h6 class="h6-title"><i class="fas fa-map-marker color-red"></i> @lang('website.address') :</h6>
        <p class="p-contact">{{$exhibitor->address}}</p>
        @endif
        @if(isset($exhibitor->phone))
        <h6 class="h6-title"><i class="fas fa-phone color-red"></i>  @lang('website.phone') :</h6>
        <p class="p-contact"> {{$exhibitor->phone}}</p>
        @endif
        @if(isset($exhibitor->ceo))
        <h6 class="h6-title"><i class="fas fa-street-view color-red"></i>  @lang('website.ceo') :</h6>
        <p class="p-contact"> {{$exhibitor->ceo}}</p>
        @endif
        @if(isset($exhibitor->marketing))
        <h6 class="h6-title"><i class="fas fa-user-circle color-red"></i>  @lang('website.marketing') :</h6>
        <p class="p-contact"> {{$exhibitor->marketing}}</p>
        @endif
        @if(isset($exhibitor->sales))
        <h6 class="h6-title"><i class="fas fa-address-book color-red"></i>  @lang('website.sales') :</h6>
        <p class="p-contact"> {{$exhibitor->sales}}</p>
        @endif
        @if(isset($exhibitor->email))
        <h6 class="h6-title"><i class="fas fa-envelope color-red"></i>  @lang('website.email') :</h6>
        <p class="p-contact"> {{$exhibitor->email}}</p>
        @endif
        @if(isset($exhibitor->website))
        <h6 class="h6-title"><i class="fas fa-globe color-red"></i>  @lang('website.website') :</h6>
        <p class="p-contact"> <a href="{{$exhibitor->website}}">@lang('website.open_site')</a></p>
        @endif
        <div class="list-widget-social">
          <ul>
            @if(isset($exhibitor->facebook))
              <li><a href="{{$exhibitor->facebook}}" target="_blank" ><i class="fab fa-facebook"></i></a></li>
            @endif
            @if(isset($exhibitor->inestagram))
              <li><a href="{{$exhibitor->inestagram}}" target="_blank" ><i class="fab fa-instagram"></i></a></li>
            @endif
            @if(isset($exhibitor->linkedin))
              <li><a href="{{$exhibitor->linkedin}}" target="_blank" ><i class="fab fa-linkedin"></i></a></li>
            @endif
            @if(isset($exhibitor->twitter))
              <li><a href="{{$exhibitor->twitter}}" target="_blank" ><i class="fab fa-twitter"></i></a></li>
            @endif
            @if(isset($exhibitor->youtube))
              <li><a href="{{$exhibitor->youtube}}" target="_blank" ><i class="fab fa-youtube"></i></a></li>
            @endif
            @if(isset($exhibitor->snapchat))
              <li><a href="{{$exhibitor->snapchat}}" target="_blank" ><i class="fab fa-snapchat-ghost"></i></a></li>
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
            <h3 class="h3-login">Welcome ., Sent your Message</h3>
            <div class="line-sec back-red"></div>
            <form style="margin-top:20px;" action="{{route('SendMessageMember')}}" method="post">
              <div class="form-group">
                <label for="exampleInputEmail1">Title message</label>
                @csrf
                <input type="text" name="member_id" value="{{$exhibitor->exhibitor_id}}" hidden="">
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

    $(function() {
      
        $(' #da-thumbs > li ').each( function() { $(this).hoverdir(); } );

      });
} );
</script>

@endsection