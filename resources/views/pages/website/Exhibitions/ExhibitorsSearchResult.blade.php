@extends('layouts.website')
@section('title','Exhibitions')
@section('content')
@php
$months = ['01'=>'January','02'=>'February','03'=>'March','04'=>'April','05'=>'May','06'=>'June','07'=>'July','08'=>'August','09'=>'September','10'=>'October','11'=>'November','12'=>'December'];
@endphp
<link href="{{asset('website/css/expo.css')}}" media="all" rel="stylesheet" type="text/css"/>

<script src="{{asset('website/js/modernizr.js')}}"></script>

<div class="header-expo" style="background-image:url({{url('/website/images/slider-12.jpg')}}">
<style>

@media (max-width:500px){
  .overflow-hidden {

      min-height: 250px;
  }



}


.title_line{
 height: 2px; 
 background-color: #e60000;
 width: 100px;
 margin: 0 auto;

}
</style>

<!--...........................page...................-->
<div class="arrow-left-expo"></div>

<div class="overflow-hidden">
<div class="col-12">
<div class="container div-expo-header">
  {{--
<h1 class="h1-profile">Sponser By</h1>
<div class="line-account back-red"></div>


        
        <div class="str3 str_wrap">
            <a href="#">
                <img src="images/cus1.jpg">
            </a>
            <a href="#">
                <img src="images/cus2.jpg">
            </a><a href="#">
                <img src="images/cus3.jpg">
            </a><a href="#">
                <img src="images/cus4.jpg">
            </a><a href="#">
                <img src="images/cus5.jpg">
            </a><a href="#">
                <img src="images/cus6.jpg">
            </a>
            
             <a href="#">
                <img src="images/cus1.jpg">
            </a>
            <a href="#">
                <img src="images/cus2.jpg">
            </a><a href="#">
                <img src="images/cus3.jpg">
            </a><a href="#">
                <img src="images/cus4.jpg">
            </a><a href="#">
                <img src="images/cus5.jpg">
            </a><a href="#">
                <img src="images/cus6.jpg">
            </a>
            
            
            
            <a href="#">
                <img src="images/cus2.jpg">
            </a><a href="#">
                <img src="images/cus3.jpg">
            </a><a href="#">
                <img src="images/cus4.jpg">
            </a><a href="#">
                <img src="images/cus5.jpg">
            </a><a href="#">
                <img src="images/cus6.jpg">
            </a>
            
            
            <a href="#">
                <img src="images/cus2.jpg">
            </a><a href="#">
                <img src="images/cus3.jpg">
            </a><a href="#">
                <img src="images/cus4.jpg">
            </a><a href="#">
                <img src="images/cus5.jpg">
            </a><a href="#">
                <img src="images/cus6.jpg">
            </a>
        </div>
        --}}

</div>
</div>

<div class="bubble-bg"></div>

</div>

</div>

<section class="enter-expo-sec">
<div class="container">
<div class="row">



<div class="col-lg-12">

   <!--...........................inner-search...................-->
   
   <div class="inner-search">
   <div class="container">
   <div class="row">
   
   <div class="col-12">
   
   <!-- <h1 class="h1-co">@lang('website.search_by'): <strong>@lang('website.name')</strong> </h1> -->
   </div>
   
  <div class="col-lg-6 col-md-6 col-sm-12">
    <form method="get" action="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibition/VisitExhibition/{{$exh_slug}}">
    <input class="form-control input-search" placeholder="{{trans('website.search')}}" name="q" value="{{$q}}">
  </div>

  <div class="col-lg-6 col-md-6 col-sm-12">
    <div class="header-search-select-item back-gray-sec">
       <select data-placeholder="{{trans('website.countries')}}" class="chosen-select" name="country_id">
        <option value="">@lang('website.all_countries')</option>
        @foreach($countries as $country)
        @if($country->id == $country_id)
        <option selected value="{{$country->id}}">{{$country->name}}</option>
        @else
        <option value="{{$country->id}}">{{$country->name}}</option>
        @endif
        @endforeach
      </select>
    </div>
  </div>

                        
        <div class="col-12"><button class="btn back-red btn-search-result"><i class="fas fa-search"></i> @lang('website.search')</button></div>               
  </form>
  
  </div>
  </div>

  </div>
<div class="row">
@if(isset($exhibitors))
@foreach($exhibitors as $exhibitor)
<div class="col-lg-4 col-md-6">
  <div class="big-div-expo position-relative">

    <a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibition/Exhibitor/{{$exh_slug}},{{$exhibitor->slug}}">
    <!--............head.........-->
    <div class="div-expo-header-block position-relative" style="background-image:url({{url('/website/images/fantasy-2543658.jpg')}});">

    @if(isset($exhibitor->offer))<div class="shape-offer">@lang('website.offer')<br>
    25%</div>
    @endif
    @if(isset($exhibitor->profile_pic))
      <img src="{{url('/images/en/exhibitors/med')}}/{{$exhibitor->profile_pic}}" class="img-expo-item float-left">
    @else
      <img src="{{url('/website/images')}}/logo-company-stantard-en.jpg" class="img-expo-item float-left">
    @endif
    <div class="div-two-button float-right">
    <div class="btn btn-danger btn-expo-co"><i class="fas fa-map-marker-alt"></i> {{$exhibitor->country}}</div>
    <br>

    <div class="btn btn-danger btn-expo-co"><i class="fas fa-eye"></i> {{$exhibitor->viewed}}</div>

    </div>

    <div class="clear"></div>


    </div>
    <!--............two line.........-->

    <div class="two-line position-relative">
    <div class="line-1-expo line-expo"></div>
    <div class="line-2-expo line-expo"></div>

    </div>
    <!--............details.........-->
    <div class="div-details-expo">
    <h3>{{$exhibitor->name}}</h3>
    <div class="title_line"></div>
    <p>{{$exhibitor->about}}</p>
    <div class="main-three">
           
          
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
           
           
            <!-- /rate button end -->
          </div>

    </div>

    </a>

<button class="btn btn-quick-preview" data-toggle="modal" data-target=".company-pop-{{$exhibitor->exhibitor_id}}">@lang('website.quick_preview')</button>
</div>
</div>

      <!-- modal -->
      <!-- pop -company -->
      <div class="modal fade company-pop-{{$exhibitor->exhibitor_id}}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-width-company modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="padding-pop">
              <div class="container-fluid">
                @if(isset($exhibitor->profile_pic))
                  <img src="{{asset('/images/en/exhibitors/med')}}/{{$exhibitor->profile_pic}}" class="pop-company left-div">
                @else
                  <img src="{{asset('website/images/logo-company.jpg')}}" class="pop-company left-div">
                @endif
                <div class="left-div item-expo-pop">
                  <h2>{{$exhibitor->name}}</h2>
                  <h3>@lang('website.business_type') <strong>{{$exhibitor->cat_name}}</strong></h3>
                  <div class="main-three">
           
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
                 
                 
                  <!-- /rate button end -->
                </div>

                  <div class="btn btn-danger btn-sm btn-expo-co"><i class="fas fa-eye"></i> {{$exhibitor->viewed}}</div>
                </div>
                <div class="clear"></div>
                <div class="row">
                  @if(isset($ExhibitorsProducts))
                  @php
                  $counter = 0;
                  @endphp
                    @foreach($ExhibitorsProducts as $index => $exhibitorPro)
                      @if($exhibitorPro->exhibitor_pro_id == $exhibitor->exhibitor_id)
                        @if($counter <= 2)
                          <div class="col-lg-4">
                            <div class="product-item-expo-pop position-relative">
                              @if(isset($exhibitorPro->viewed))
                              <div class="btn btn-danger btn-sm btn-expo-co btn-view-item"><i class="fas fa-eye"></i> {{$exhibitorPro->viewed}}</div>
                              @endif
                              @if(isset($exhibitorPro->image))
                                <img src="{{asset('images/en/exhibitors/products_gallery/med')}}/{{$exhibitorPro->image}}" class="img-item-expo">
                              @else
                                <img src="{{url('/website/images')}}/logo-company-stantard-{{LaravelLocalization::getCurrentLocale()}}.jpg" class="img-expo-item float-left">
                              @endif
                              <div class="div-float-pop">
                                <h3 class="h3-product-item-expo">{{$exhibitorPro->name}}</h3>
                                <p class="p-product-item">{{$exhibitorPro->description}}
                                </p>
                                <div class="row">
                                  <div class="col-md-6">
                                    @if(isset($exhibitorPro->offer))
                                    <button class="btn btn-expo btn-sm btn-pop-items">
                                      <div class="icon-btn-expo"><i class="fas fa-dollar-sign"></i></div>
                                      25% offer
                                    </button>
                                    @endif
                                  </div>
                                  <div class="col-md-6">
                                    @if(isset($exhibitorPro->exhibitor_viewed))
                                    <button class="btn btn-expo btn-sm btn-pop-items">
                                      <div class="icon-btn-expo"><i class="fas fa-eye"></i></div>
                                      {{$exhibitor->viewed}}
                                    </button>
                                    @endif
                                  </div>
                                </div>
                              </div>
                              <div class="clear"></div>
                            </div>
                          </div>
                          @php $counter++ @endphp
                        @endif
                        
                      @endif
                    @endforeach
                  @endif
                  <div class="text-center col-12">
                    <a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibition/ExhibitorProductsServices/{{$exh_slug}},{{$exhibitor->slug}}" class="btn btn-danger" style="margin-top:40px;">@lang('website.view_more')</a>
                    <button class="btn btn-dark" style="margin-top:40px;" data-dismiss="modal">@lang('website.back')</button>
                  </div>
                </div>
              </div>
            </div>
            <button class="btn-close-pop-expo" data-dismiss="modal"><i class="fas fa-times"></i></button>  
          </div>
        </div>
      </div>

      <!-- end modal -->


@endforeach
@endif






<!-- <div class="col-12">
<div class="str3 str_wrap">
            <a href="#">
                <img src="images/cus1.jpg">
            </a>
            <a href="#">
                <img src="images/cus2.jpg">
            </a><a href="#">
                <img src="images/cus3.jpg">
            </a><a href="#">
                <img src="images/cus4.jpg">
            </a><a href="#">
                <img src="images/cus5.jpg">
            </a><a href="#">
                <img src="images/cus6.jpg">
            </a>
            
             <a href="#">
                <img src="images/cus1.jpg">
            </a>
            <a href="#">
                <img src="images/cus2.jpg">
            </a><a href="#">
                <img src="images/cus3.jpg">
            </a><a href="#">
                <img src="images/cus4.jpg">
            </a><a href="#">
                <img src="images/cus5.jpg">
            </a><a href="#">
                <img src="images/cus6.jpg">
            </a>
            
            
            
            <a href="#">
                <img src="images/cus2.jpg">
            </a><a href="#">
                <img src="images/cus3.jpg">
            </a><a href="#">
                <img src="images/cus4.jpg">
            </a><a href="#">
                <img src="images/cus5.jpg">
            </a><a href="#">
                <img src="images/cus6.jpg">
            </a>
            
            
            <a href="#">
                <img src="images/cus2.jpg">
            </a><a href="#">
                <img src="images/cus3.jpg">
            </a><a href="#">
                <img src="images/cus4.jpg">
            </a><a href="#">
                <img src="images/cus5.jpg">
            </a><a href="#">
                <img src="images/cus6.jpg">
            </a>
        </div>

</div> -->

</div>





</div>
</div>

</section>



  
  
       <!--...........................inner-result...................-->

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
                <label for="exampleInputEmail1">Title message</label>
                @csrf
                @auth
                <input type="text" name="member_id" value="{{Auth::user()->id}}" hidden="">
                @endauth
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
<script src="{{asset('website/js/plugins.js')}}" type="text/javascript"></script>
<script src="{{asset('website/js/script.js')}}" ></script>
<script src="{{asset('website/js/social.js')}}" ></script>
<script src="{{asset('website/js/paginga.jquery.js')}}" ></script>

<script src="{{asset('website/js/my-js.js')}}" ></script>
<script src="{{asset('website/js/countdowntime/moment.min.js')}}"></script>
<script src="{{asset('website/js/countdowntime/moment-timezone.min.js')}}"></script>
<script src="{{asset('website/js/countdowntime/moment-timezone-with-data.min.js')}}"></script>
<script src="{{asset('website/js/countdowntime/countdowntime.js')}}"></script>
<script src="{{asset('website/js/jquery.liMarquee.js')}}"></script>
<script>
		$(document).ready(function(){
				$('#paging_container8').pajinate({
					num_page_links_to_display : 10,
					items_per_page : 10	
				});
			});     
		
</script>
<!-- ........................for only page.................-->





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
      <!--===============================================================================================-->
     
<!--       <script>
         $('.cd100').countdown100({
          /*Set Endtime here*/
          /*Endtime must be > current time*/
          endtimeYear: 0,
          endtimeMonth: 0,
          endtimeDate: 35,
          endtimeHours: 18,
          endtimeMinutes: 0,
          endtimeSeconds: 0,
          timeZone: "" 
          // ex:  timeZone: "America/New_York"
          //go to " http://momentjs.com/timezone/ " to get timezone
         });
      </script> -->









@endsection