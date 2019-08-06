<?php
  use Illuminate\Support\Arr;
?>
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
      <div class="col-lg-8">
          <div class="container-fluid" id="paging_container8">
            <ul class="row content da-thumbs" id="da-thumbs">
              @if(isset($products_images))
              @php 
                $stack = array();
              @endphp
                @foreach($products_images as $pro_image)
                  
                  <li class="col-lg-4">
                    <a href="{{route('MemberProductDetails',[$member->member_slug,$pro_image->slug])}}">
                      <img src="{{asset('images/en/products_gallery/med/')}}/{{$pro_image->image}}" height="200" />
                      <div><span>{{$pro_image->name}}</span></div>
                    </a>
                  </li>
                   @php
                    array_push($stack, $pro_image->pro_id);
                   @endphp

                @endforeach
              @endif


              @foreach($products as $product)
                @if (!in_array($product->id, $stack)) 
                    <li class="col-lg-4">
                      <a href="{{route('MemberProductDetails',[$member->member_slug,$product->slug])}}">
                        <img src="{{asset('website/images/')}}/product_default.svg" height="200" />
                        <div><span>{{$product->name}}</span></div>
                      </a>
                    </li> 
                @endif
                    
               
              @endforeach
              
            </ul>
            <div class="page_navigation"></div>
            <div class="clear"></div>
          </div>
          
          
          <!-- <img src="{{asset('website/images/')}}/logo-company-stantard-{{LaravelLocalization::getCurrentLocale()}}.jpg" height="200" /> -->
        
      </div>
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
              <div class="inline-facts text-center">
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
              <div class="inline-facts text-center">
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
              <p class="p-contact"> <a href="https://{{$member->website}}" target="_blank">{{$member->website}}</a></p>
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
            <h3 class="h3-login">Welcome ., Send your Message</h3>
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
@include('partials.member.alerts')
<script src="{{asset('website/js/paginga.jquery.js')}}" ></script>
{{-- <script src="{{asset('website/js/star-rating.js')}}" type="text/javascript"></script> --}}
<script src="{{asset('website/js/plugins.js')}}" ></script>
<script src="{{asset('website/js/script.js')}}" ></script>
<script src="{{asset('website/js/jquery.dataTables.js')}}" ></script>
</script><script src="{{asset('website/js/jquery.hoverdir.js')}}" ></script>
<script type="text/javascript">
      $(function() {
      
        $(' #da-thumbs > li ').each( function() { $(this).hoverdir(); } );

      });
    </script>



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

<script>
 



@endsection