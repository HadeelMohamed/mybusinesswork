@extends('layouts.website')
@section('title','Exhibitions')
@section('content')
@php
$months = ['01'=>'January','02'=>'February','03'=>'March','04'=>'April','05'=>'May','06'=>'June','07'=>'July','08'=>'August','09'=>'September','10'=>'October','11'=>'November','12'=>'December'];
@endphp
<!--...........................page...................-->
<link href="{{asset('website/css/expo.css')}}" media="all" rel="stylesheet" type="text/css"/>
<link href="{{asset('website/css/all.css')}}" media="all" rel="stylesheet" type="text/css"/>
 
 <!--...........................header-div...................-->
<div class="profile-company expo-pic position-relative" style="background-image:url({{asset('website/images/construction.jpg')}}">
	<!-- <div class="overlay-profile"></div> -->
	<div class="bubble-bg"></div>
</div>

<h1 class="h1-page">@lang('website.exhibitions')</h1>

<!--...........................inner-search...................-->


		

			<div class="inner-search">
         <div class="container">
            <div class="row">


            	<div class="col-lg-9 position-relative">




            		@if(isset($expo_instructions))
               	<div class="accordion" id="accordionExample">
                  <div class="">
                	@foreach($expo_instructions as $expo_instruction)
                	@if($expo_instruction->title != Null or $expo_instruction->content != Null)
                  <div class="" id="headingOne_{{$expo_instruction->id}}">
	                  <div class="position-relative big-div-title" data-toggle="collapse" data-target="#collapseOne_{{$expo_instruction->id}}" aria-expanded="true" aria-controls="collapseOne" >

		                  <div class="h3-expo-div" >
												<img src="{{asset('website/images/logo-expo.png')}}" class="logo-expo">
		                    <h3 class="h3-expo">{!! $expo_instruction->title !!}</h3>
		                  </div>
	                  </div>

                  </div>

                  <div id="collapseOne_{{$expo_instruction->id}}" class="collapse" aria-labelledby="headingOne_{{$expo_instruction->id}}" data-parent="#accordionExample">
                  <div class="card-body">
                  <div class="h3-expo-div">

                  <p class="p-about-expo">{!! $expo_instruction->content !!}</p>

                  </div>
                  </div>
                  </div>
                  @endif
                  @endforeach

							@endif
              <br>






               	@if(isset($exhibitions))
               		@foreach($exhibitions as $exh)
               		@php
               			$date = date('Y-m-d H:i:s');
	               		$date_start = date_create($exh->start);
                    $date_end = date_create($exh->end);
										$start_month = date_format($date_start,"m");
										$start_day = date_format($date_start,"d");
										$start_year = date_format($date_start,"Y");
										$end_month_full = date_format($date_end,"Y-m-d H:i:s");
                    $start_month_full = date_format($date_start,"Y-m-d H:i:s");
										$nameOfDay = date('D', strtotime($start_month_full));
									@endphp
                  @if($exh->end <= $date)
                  
                  
                  <!-- expired exhibitions -->
      
                      <div class="big-result-expo ">
                        
                       <img src="{{asset('website/images/BARCODE.png')}}" class="barcode">
                       <div class="left-div-item " style="z-index: 8">
                          {{-- <div class="rotate-div">@lang('website.views') : {{$exh->exh_viewers}} </div> --}}
                          <div class="rotate-div">@lang('website.finished') </div>
                       </div>
                       <a class="container-fluid padding-big" href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibition_statics/{{$exh->exh_slug}}">
                          <div class="row">
                             <div class="col-lg-9 big-expo-1 finished-expo padding-bottom-105-in-responsive  padding-bottom-65 "
                               style="background-image:url(../images/back-expo.png);z-index: 7" >
                               <div class="finished-overlaye" style="background-color: #858585;position: absolute;z-index: -1;top:0px;bottom: 0px;left:0px;right:0px;"></div>
                                <div class="position-relative offline-div" style="z-index: 5">
                                    <h3 class="h3-online">@lang('website.finished')</h3>
                                    <br>
                                </div>
                                
                                <h2 class="h2-expo-item" style="z-index: 5" ><strong> {{$exh->name}}</strong></h2>
                                <h3 class="h3-expo-type" style="z-index: 5"> {{$exh->cat_name}}</h3>
                                @php
                                  $exh_end = date_create($exh->end);
                                  $exh_end = date_format($exh_end,"Y-m-d");
                                @endphp
                                <h3 class="h3-expo-type campaign-state-finished-date " style="z-index: 5"> @lang('website.end_date'): <strong> {{$exh_end}}</strong></h3>
                                <h3 class="h3-expo-type campaign-state-finished " style="color:yellow;z-index: 5">( @lang('website.international') )</h3>
                                <div style="height:10px;"></div>
                                <div style="height:10px;"></div>
                                <div class="row cd100">
                                  <div class="col-md-12 timer-padding" >
                                <div class="row">
                                   <div class="col-4 timer-expo border-action">
                                      <p class="l2-txt1 p-b-9 days">0</p>
                                      <h6>@lang('website.day')</h6>
                                   </div>
                                   <div class="col-4 timer-expo border-action">
                                      <p class="l2-txt1 p-b-9 hours">0</p>
                                      <h6>@lang('website.hour')</h6>
                                   </div>
                                   <!-- <div class="col-3 timer-expo border-action">
                                      <p class="l2-txt1 p-b-9 minutes"></p>
                                               <h6>minutes</h6>
                                                   </div>-->
                                   <div class="col-4 timer-expo">
                                      <p class="l2-txt1 p-b-9 minutes">0</p>
                                      <h6>@lang('website.minute')</h6>
                                   </div>
                                </div>
                                </div>
                                </div>
                                <div href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibition_statics/{{$exh->exh_slug}}" class="btn btn-sm btn-enter-expo-mobile center-text">@lang('website.exhibition_statics')</div>
                                {{-- <div class="div-enter-expo"><div class="btn btn-sm btn-danger" style="min-width: 230px;">@lang('website.exhibition_statics')</div></div> --}}
                                @if($start_month_full <= $date &&  $end_month_full >= $date)
                                
                                
                                @endif
                                <div class="str3 str_wrap">
                                  @if(isset($exh_sponsors))
                                  @foreach($exh_sponsors as $sponsor)
                                  @if($sponsor->exh_id == $exh->exh_id)
                                    <img src="{{asset('website/images/')}}/{{$sponsor->photo}}">
                                   @endif
                                   @endforeach
                                   @endif
                                </div>
                                {{--
                                <div class="rotate-date">{{$months[$start_month]}}</div>
                                <div class="date-start">
                                   <h3>{{$start_day}}</h3>
                                    <h5>{{$nameOfDay}}day</h5>
                                   <p>{{$start_year}}</p>
                                </div>
                                --}}
                             </div>
                             @if(LaravelLocalization::getCurrentLocale() == 'ar')
                             <div class="col-lg-3 position-relative img-expo">
                              @else
                              <div class="col-lg-3 position-relative img-expo">
                              @endif
                                <div  class="ticked-img"></div>
                                <div  class="finished-ticket-img-div">
                                <div class=" finished-div-icon" ><i class="fas fa-lock"></i></div>
                                <div class=" finished-div-p" >Check <br>Insights <br>  Now</div>
                                </div>
                                {{--
                                  <div class="shape-ex">@lang('website.views') <br>
                                   {{$exh->exh_viewers}}
                                </div>
                                --}}
                                <div class="div-enter-expo"><div class="btn btn-sm btn-danger" style="min-width: 230px;">@lang('website.exhibition_statics')</div></div>

                             </div>
                             
                          </div>
                          
                          
                       </a>
                       <div  class="ticked-img-mobile"></div>
                    </div>
                  @else
                      <div class="big-result-expo">
                       <img src="{{asset('website/images/BARCODE.png')}}" class="barcode">
                       <div class="left-div-item">
                          <div class="rotate-div">@lang('website.views') : {{$exh->exh_viewers}} </div>
                       </div>
                       @if($start_month_full <= $date &&  $end_month_full >= $date)
                       <a class="container-fluid padding-big" href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibition/VisitExhibition/{{$exh->exh_slug}}?q=&country_id=">
                       @else
                       <a class="container-fluid padding-big" href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibitions/{{$exh->exh_slug}}">
                       @endif
                          <div class="row">
                             <div class="col-lg-9 big-expo-1 padding-bottom-105-in-responsive  padding-bottom-65 " 
                             style="background-image:url(../images/back-expo.png); ">

                                <div class="position-relative online-div-expo">
                                  @if($start_month_full <= $date && $date <= $end_month_full)
                                    <div class="online-div"></div>
                                    <h3 class="h3-online">@lang('website.now_open')</h3>
                                  @elseif($start_month_full > $date && $date < $end_month_full)
                                  <div class="online-div-soon"></div>
                                  <h3 class="h3-online">@lang('website.start_soon')</h3>
                                  @endif
                                  <!-- <div href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibitions/{{$exh->exh_slug}}" class="btn btn-sm btn-enter-expo-mobile">@lang('website.enter_now')</div> -->
                                </div>
                                
                                <h2 class="h2-expo-item"><strong> {{$exh->name}}</strong></h2>
                                <h3 class="h3-expo-type"> {{$exh->cat_name}}</h3>
                                @php
                                  $exh_end = date_create($exh->end);
                                  $exh_end = date_format($exh_end,"Y-m-d");
                                @endphp
                                <h3 class="h3-expo-type end-date-event ">@lang('website.end_date'): <strong> {{$exh_end}}</strong></h3>
                                @if($start_month_full <= $date && $date <= $end_month_full)
                                <h3 class="h3-expo-type campaign-state" style="color:yellow">( @lang('website.international') )  <span class="">@lang('website.end_remaining') : </span> </h3>
                                @else
                                <h3 class="h3-expo-type campaign-state" style="color:yellow">( @lang('website.international') ) <span class="">@lang('website.start_remaining') : </span> </h3>
                                @endif
                                <style>
                                   .str3 img {
                                   width:80px;
                                   height:60px;
                                   }
                                </style>
                                <div style="height:10px;"></div>
                                <div href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibition_statics/{{$exh->exh_slug}}" class="btn btn-sm btn-enter-expo-mobile center-text">@lang('website.book_now')</div>
                                <div style="height:10px;"></div>
                                <br>
                                @if($start_month_full <= $date &&  $end_month_full >= $date)
                                @php
                                  $exh_end  = new DateTime($exh->end);
                                  $curr = new DateTime(date('Y-m-d H:i'));
                                  $interval = $curr->diff($exh_end);

                                  // %a will output the total number of days.
                                  //echo $interval->format('%a total days')."\n";

                                  // While %d will only output the number of days not already covered by the
                                  // month.
                                  //echo $interval->format('%a Days, %h Hours, %i Minutes');
                                @endphp

                                <div class="row cd100">
                                <div class="col-md-12 timer-padding" >
                                <div class="row">
                                   <div class="col-4 timer-expo border-action">
                                      <p class="l2-txt1 p-b-9 days">{{$interval->format('%a')}}</p>
                                      <h6>@lang('website.day')</h6>
                                   </div>
                                   <div class="col-4 timer-expo border-action">
                                      <p class="l2-txt1 p-b-9 hours">{{$interval->format('%h')}}</p>
                                      <h6>@lang('website.hour')</h6>
                                   </div>
                                   <!-- <div class="col-3 timer-expo border-action">
                                      <p class="l2-txt1 p-b-9 minutes"></p>
                                               <h6>minutes</h6>
                                                   </div>-->
                                   <div class="col-4 timer-expo">
                                      <p class="l2-txt1 p-b-9 minutes">{{$interval->format('%i')}}</p>
                                      <h6>@lang('website.minute')</h6>
                                   </div>
                                </div>
                                </div>
                           </div>
                                @else
                                 @php
                                  $exh_begin  = new DateTime($exh->start);
                                  $curr = new DateTime(date('Y-m-d H:i'));
                                  $interval = $curr->diff($exh_begin);

                                  // %a will output the total number of days.
                                  //echo $interval->format('%a total days')."\n";

                                  // While %d will only output the number of days not already covered by the
                                  // month.
                                  //echo $interval->format('%a Days, %h Hours, %i Minutes');
                                @endphp
                                <div class="row cd100">
                                  <div class="col-md-12 timer-padding">
                                <div class="row">
                                   <div class="col-4 timer-expo border-action">
                                      <p class="l2-txt1 p-b-9 days">{{$interval->format('%a')}}</p>
                                      <h6>@lang('website.day')</h6>
                                   </div>
                                   <div class="col-4 timer-expo border-action">
                                      <p class="l2-txt1 p-b-9 hours">{{$interval->format('%h')}}</p>
                                      <h6>@lang('website.hour')</h6>
                                   </div>
                                   <!-- <div class="col-3 timer-expo border-action">
                                      <p class="l2-txt1 p-b-9 minutes"></p>
                                               <h6>minutes</h6>
                                                   </div>-->
                                   <div class="col-4 timer-expo">
                                      <p class="l2-txt1 p-b-9 minutes">{{$interval->format('%i')}}</p>
                                      <h6>@lang('website.minute')</h6>
                                   </div>
                                </div>
                                </div>
                                </div>
                                @endif
                                <div class="str3 str_wrap">
                                  @if(isset($exh_sponsors))
                                  @foreach($exh_sponsors as $sponsor)
                                  @if($sponsor->exh_id == $exh->exh_id)
                                    <img src="{{asset('website/images/')}}/{{$sponsor->photo}}">
                                   @endif
                                   @endforeach
                                   @endif
                                </div>
                                <div class="rotate-date">{{$months[$start_month]}}</div>
                                <div class="date-start">
                                   <h3>{{$start_day}}</h3>
                                   {{-- <h5>{{$nameOfDay}}day</h5> --}}
                                   <p>{{$start_year}}</p>
                                </div>
                             </div>
                             @if(LaravelLocalization::getCurrentLocale() == 'ar')
                             <div class="col-lg-3 position-relative img-expo">
                              @else
                              <div class="col-lg-3 position-relative img-expo">
                              @endif
                                <div  class="ticked-img"></div>
                                <div class="shape-ex">@lang('website.views') 
                                   {{$exh->exh_viewers}}
                                </div>
                                @if($start_month_full <= $date &&  $end_month_full >= $date)
                                <div class="div-enter-expo"><div class="btn btn-sm btn-danger" style="min-width: 230px;">@lang('website.enter_now')</div></div>
                                @else
                                <div class="div-enter-expo"><div class="btn btn-sm btn-danger" style="min-width: 230px;">@lang('website.subscribe_now')</div></div>
                                @endif
                             </div>
                             
                          </div>
                          </div>
                       </a>
                       <div  class="ticked-img-mobile"></div>
                  @endif
                  
                	@endforeach
             		@endif
               </div>
            </div>
</div>

               <div class="col-lg-3">
               	
                  <div class="border-serach">
                     <!--<h1 class="h1-co">@lang('website.search'): </h1>-->
                     <!--<hr>-->
                     <form method="get" action="{{route('SearchResultExhibitions')}}">
                     <div class="exhibtion-div">
                        <input class="form-control input-search" placeholder="{{trans('website.search...')}}" name="q" value="{{$q}}">
                     </div>
                     
                     <div class="exhibtion-div">
                        <div class="header-search-select-item back-gray-sec">
                           <select data-placeholder="{{trans('website.all_categories')}}" class="chosen-select" name="cat">
							              <option value="">@lang('website.all_categories')</option>
							              @foreach($exhibitionCategories as $exh_category)
							              @if($cat_id == $exh_category->exh_cat_id)
								              <option selected="" value="{{$exh_category->exh_cat_id}}">{{$exh_category->cat_name}}</option>
							              @else
							              	<option value="{{$exh_category->exh_cat_id}}">{{$exh_category->cat_name}}</option>
							              @endif
							              @endforeach
							          	</select>
                        </div>
                     </div>

                     <div class="exhibtion-div">
                        <div class="header-search-select-item back-gray-sec">
                          <select data-placeholder="{{trans('website.all_countries')}}" class="chosen-select" name="country">
							              <option value="">@lang('website.all_countries')</option>
							              
							              @foreach($countries as $country)
							              @if($country_id == $country->id)
								              <option selected="" value="{{$country->id}}">{{$country->name}}</option>
							              @else
							              	<option value="{{$country->id}}">{{$country->name}}</option>
							              @endif
							              @endforeach
							          	</select>
                        </div>
                     </div>

                     <button class="btn back-red btn-search-result-expo"><i class="fas fa-search"></i> @lang('website.search')</button>         
                  </form>
                  </div>
                   
               </div>

               
         </div>
      </div>


			
  </div>
</div>


  



<!-- Modal -->
<div id="advModale_ar" class="modal fade pop-adv"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" style="display:none">
  <div class="modal-dialog modal-width modal-dialog-centered" role="document" >
    <div class="modal-content div-inner-expo" >
    <div class="row">
    
    <div class="col-md-8 ">
    <div class="inner-expo">
       <h3 class="h3-pop-expo">أول معرض <strong class="color-red">أونلاين</strong> !</h3>
<img src="{{asset('website/images/logo-pop-img.png')}}" class="img-pop-mobile">
      <p class="p-div-exppo">(مجاناً) لفترة محدودة بدلاً من <strong style="text-decoration:line-through">100$ دولار</strong> </p>
      
      <div class="text-center">
      <!-- <a href="#" class="btn btn-danger btn-expo-link color-white  ">how I can sign up</a>
            <a href="#" class="btn btn-danger btn-expo-link  color-white ">What is online show</a> -->
<div style="height:20px"></div>
      </div>
      
      </div>
      
      </div>
          <div class="col-md-4 position-relative display-none-pop" style="background-image:url({{asset('/website/images/popup_exhibition.png')}})">
          <div class="div-pop-item">
            <img src="{{asset('website/images/pop-logo.png')}}" class="pop-logo"  alt=""> 
          <!-- <span class="btn-online-services">معارض أونلاين</span> -->
          
</div></div>
      
      </div>
      
    <button class="btn-pop-expo" ><i class="fas fa-times"></i></button>  
     
    </div>
  </div>
</div>





<!-- Modal -->
<div id="advModale_en" class="modal fade pop-adv"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" style="display:none">
  <div class="modal-dialog modal-width modal-dialog-centered" role="document" >
    <div class="modal-content div-inner-expo" >
    <div class="row">
    
    <div class="col-md-8 ">
    <div class="inner-expo">
       <h3 class="h3-pop-expo">First Time <strong class="color-red">Online</strong> Exhibtion</h3>
       <br>
<img src="{{asset('website/images/logo-pop-img.png')}}" class="img-pop-mobile">
      <p class="p-div-exppo">(Free) instead of <strong style="text-decoration:line-through">100$</strong> </p>
      
      <div class="text-center">
      <!-- <a href="#" class="btn btn-danger btn-expo-link color-white  ">how I can sign up</a>
            <a href="#" class="btn btn-danger btn-expo-link  color-white ">What is online show</a> -->
<div style="height:20px"></div>
      </div>
      
      </div>
      
      </div>
          <div class="col-md-4 position-relative display-none-pop" style="background-image:url({{asset('/website/images/banner-login-2.png')}})">
          <div class="div-pop-item">
            <img src="images/pop-logo.png" class="pop-logo"  alt=""> 
          <!-- <span class="btn-online-services">Online Services</span> -->
          <div class="text-center"><img src="images/hand.png" width="20"  alt=""></div>
</div></div>
      
      </div>
      
    <button class="btn-pop-expo" ><i class="fas fa-times"></i></button>  
     
    </div>
  </div>
</div>

<div id="advBackground_{{LaravelLocalization::getCurrentLocale()}}" class="modal-backdrop fade" style="display: none;"></div>

{{--
  <!-- Modal -->
<div id="advModale_tr" class="modal fade pop-adv"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" style="display:none">
  <div class="modal-dialog modal-width modal-dialog-centered" role="document" >
    <div class="modal-content div-inner-expo" >
    <div class="row">
    
    <div class="col-md-8 ">
    <div class="inner-expo">
       <h3 class="h3-pop-expo">First Time <strong class="color-red">Online</strong> Exhibtion</h3>
<img src="{{asset('website/images/logo-pop-img.png')}}" class="img-pop-mobile">
      <p class="p-div-exppo">(Free) instead of <strong style="text-decoration:line-through">100$</strong> </p>
      
      <div class="text-center">
      <a href="#" class="btn btn-danger btn-expo-link color-white  ">how I can sign up</a>
            <a href="#" class="btn btn-danger btn-expo-link  color-white ">What is online show</a>
<div style="height:20px"></div>
      </div>
      
      </div>
      
      </div>
          <div class="col-md-4 position-relative display-none-pop" style="background-image:url({{asset('/website/images/banner-login-2.png')}})">
          <div class="div-pop-item">
            <img src="images/pop-logo.png" class="pop-logo"  alt=""> 
          <!-- <span class="btn-online-services">Online Services</span> -->
          <div class="text-center"><img src="images/hand.png" width="20"  alt=""></div>
</div></div>
      
      </div>
      
    <button class="btn-pop-expo" ><i class="fas fa-times"></i></button>  
     
    </div>
  </div>
</div>



<!-- Modal -->
<div id="advModale_fr" class="modal fade pop-adv"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" style="display:none">
  <div class="modal-dialog modal-width modal-dialog-centered" role="document" >
    <div class="modal-content div-inner-expo" >
    <div class="row">
    
    <div class="col-md-8 ">
    <div class="inner-expo">
       <h3 class="h3-pop-expo">First Time <strong class="color-red">Online</strong> Exhibtion</h3>
<img src="{{asset('website/images/logo-pop-img.png')}}" class="img-pop-mobile">
      <p class="p-div-exppo">(Free) instead of <strong style="text-decoration:line-through">100$</strong> </p>
      
      <div class="text-center">
      <a href="#" class="btn btn-danger btn-expo-link color-white  ">how I can sign up</a>
            <a href="#" class="btn btn-danger btn-expo-link  color-white ">What is online show</a>
<div style="height:20px"></div>
      </div>
      
      </div>
      
      </div>
          <div class="col-md-4 position-relative display-none-pop" style="background-image:url({{asset('/website/images/banner-login-2.png')}})">
          <div class="div-pop-item">
            <img src="{{asset('website/images/pop-logo.png')}}" class="pop-logo"  alt=""> 
          <!-- <span class="btn-online-services">Online Services</span> -->
          
</div></div>
      
      </div>
      
    <button class="btn-pop-expo" ><i class="fas fa-times"></i></button>  
     
    </div>
  </div>
</div>
--}}







  
  
       <!--...........................inner-result...................-->


@include('partials.website.footer')
<script src="{{asset('website/js/plugins.js')}}" type="text/javascript"></script>
<script src="{{asset('website/js/script.js')}}" ></script>
<script src="{{asset('website/js/social.js')}}" ></script>
<script src="{{asset('website/js/paginga.jquery.js')}}" ></script>
<script src="{{asset('website/js/star-rating.js')}}" ></script>
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
$('.rb-rating').rating({
												'showCaption': true,
												'stars': '5',
												'min': '0',
												'max': '3',
												'step': '1',
												'size': 'xs',
											});
</script>



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



@if(LaravelLocalization::getCurrentLocale() == 'en' || LaravelLocalization::getCurrentLocale() == 'ar')
<script type="text/javascript">
  $(document).ready(function(){
    
    
    window.setTimeout(function(){

      // show div to redirect after moments
      // Move to a new location or you can do something else    Exhibition/join_exhibitor
      $('#advModale_{{LaravelLocalization::getCurrentLocale()}}').css("display", "block").addClass("show");
    //   $('#advBackground_{{LaravelLocalization::getCurrentLocale()}}').css("display", "block").addClass("show");
    // }, 1000);
  });

</script>
@endif





@endsection