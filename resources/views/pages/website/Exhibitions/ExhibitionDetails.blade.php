

@extends('layouts.website')
@section('title','Exhibitions')
@section('content')
@php
$currDateTime = date('Y-m-d H:i:s');
@endphp
@php
  $exh_begin  = new DateTime($exhibition_details->start);
  $exh_end  = new DateTime($exhibition_details->end);
  $curr = new DateTime(date('Y-m-d H:i:s'));
  $interval = $curr->diff($exh_end);
@endphp

<!--...........................for page only...................-->
<link href="{{asset('website/css/expo.css')}}" media="all" rel="stylesheet" type="text/css"/>
<script src="{{asset('website/js/modernizr.js')}}"></script>

<style type="text/css">
              .btn-expo-btn{
              background-color: #e60000;
              color: #fff !important;
              border:1px solid #e60000;
              box-shadow: 1px 1px 5px #000;
              }

            </style>

<!--<div class="head-padding"></div>-->
<div class="header-expo">
   <div class="arrow-left-expo"></div>
   <div class="overflow-hidden">
      <div class="expo-title-div">
         <div class="container main-timer">
           
            <div class="counter-side">
            @if($exh_begin <= $curr)
            @php
              $exh_begin  = new DateTime($exhibition_details->start);
              $exh_end  = new DateTime($exhibition_details->end);
              $curr = new DateTime(date('Y-m-d H:i:s'));
              $interval = $curr->diff($exh_end);

              // %a will output the total number of days.
              //echo $interval->format('%a total days')."\n";

              // While %d will only output the number of days not already covered by the
              // month.
              //echo $interval->format('%a Days, %h Hours, %i Minutes');
            @endphp
               <div class="row cd100">
                  <div class="col-4 timer-expo border-action">
                     <p class="l2-txt1 p-b-9 days">{{ $interval->format('%a') }}</p>
                     <h6>@lang('website.day')</h6>
                  </div>
                  <div class="col-4 timer-expo border-action">
                     <p class="l2-txt1 p-b-9 hours">{{ $interval->format('%H') }}</p>
                     <h6>@lang('website.hour')</h6>
                  </div>
                  <!-- <div class="col-3 timer-expo border-action">
                     <p class="l2-txt1 p-b-9 minutes"></p>
                           <h6>minutes</h6>
                               </div>-->
                  <div class="col-4 timer-expo">
                     <p class="l2-txt1 p-b-9 minutes">{{ $interval->format('%i') }}</p>
                     <h6>@lang('website.minute')</h6>
                  </div>
               </div>
            @else

              @php
              $exh_begin  = new DateTime($exhibition_details->start);
              $exh_end  = new DateTime($exhibition_details->end);
              $curr = new DateTime(date('Y-m-d H:i:s'));
              $interval = $curr->diff($exh_begin);

              // %a will output the total number of days.
              //echo $interval->format('%a total days')."\n";

              // While %d will only output the number of days not already covered by the
              // month.
              //echo $interval->format('%a Days, %h Hours, %i Minutes');
            @endphp
               <div class="row cd100">
                  <div class="col-4 timer-expo border-action">
                     <p class="l2-txt1 p-b-9 days">{{ $interval->format('%a') }}</p>
                     <h6>@lang('website.day')</h6>
                  </div>
                  <div class="col-4 timer-expo border-action">
                     <p class="l2-txt1 p-b-9 hours">{{ $interval->format('%H') }}</p>
                     <h6>@lang('website.hour')</h6>
                  </div>
                  <!-- <div class="col-3 timer-expo border-action">
                     <p class="l2-txt1 p-b-9 minutes"></p>
                           <h6>minutes</h6>
                               </div>-->
                  <div class="col-4 timer-expo">
                     <p class="l2-txt1 p-b-9 minutes">{{ $interval->format('%i') }}</p>
                     <h6>@lang('website.minute')</h6>
                  </div>
               </div>
            @endif
            </div>
         </div>
         
         <div class="padding-expo">
            <h1>{{$exhibition_details->exh_name}}</h1>
            <h2><span class="color-yellow">{{$exhibition_details->cat_name}}</span></h2>
         </div>
         <div class="shape-dark-red">
            <div class="row">
               <div class="col-md-6 color-white">@lang('website.start_at'): {{date('Y-m-d', strtotime($exhibition_details->start))}}</div>
               <div class="col-md-6 color-white">@lang('website.finish_at'): {{date('Y-m-d', strtotime($exhibition_details->end))}}</div>
            </div>
         </div>
         <div class="retangle"></div>
      </div>
      <div class="triangle-topleft">
         <ul class="links-expo">
            <li><a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/WhyOnlineExpo/WhyOnlineExpo/{{$exhibition_details->exh_slug}}" class="hvr-underline-from-left">@lang('website.why_online_expo')</a></li>
            {{--
            <li><a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibitions/{{$exhibition_details->exh_slug}}" class="hvr-underline-from-left"> - @lang('website.about_exhibition')</a></li>
            <li><a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibitions/{{$exhibition_details->exh_slug}}" class="hvr-underline-from-left"> - @lang('website.exhibitors')</a></li>
            <li><a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibitions/{{$exhibition_details->exh_slug}}" class="hvr-underline-from-left"> - @lang('website.sponsors')</a></li>
            --}}
         </ul>
      </div>
      <div class="bubble-bg"></div>
   </div>
</div>
<section class="main-expo-div">
   <div class="container">
      <div class="row">
         <div class="col-lg-8">
            <div class="title-div col-12">
               <h2>{{$exhibition_details->exh_name}}</h2>
               <p>{{$exhibition_details->cat_name}}</p>
            </div>
            <div class="text-center display-menu-expo">
                <button class="btn btn-expo">
                  <div class="icon-btn-expo"><i class="fas fa-chevron-right"></i></div>
                  <a style="color:#FFF;" href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/WhyOnlineExpo/WhyOnlineExpo/{{$exhibition_details->exh_slug}}">@lang('website.why_online_expo')</a>
               </button>
               <a class="btn btn-expo" href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibitions/{{$exhibition_details->exh_slug}}">
                  <div class="icon-btn-expo"><i class="fas fa-chevron-right"></i></div>
                  @lang('website.about_exhibition')
               </a>
               {{--
               <button class="btn btn-expo">
                  <div class="icon-btn-expo"><i class="fas fa-chevron-right"></i></div>
                  @lang('website.sponsors')
               </button>
               <button class="btn btn-expo">
                  <div class="icon-btn-expo"><i class="fas fa-chevron-right"></i></div>
                  @lang('website.exhibitors')
               </button>
               --}}
            </div>
            <div class="position-relative big-div-title">
               <img src="{{asset('website/images/logo-expo.png')}}" class="logo-expo">
               <div class="h3-expo-div">
                  <h3 class="h3-expo">{{$exhibition_details->exh_name}}</h3>
               </div>
            </div>
            <div class="h3-expo-div">
               <p class="p-about-expo">{!! html_entity_decode($exhibition_details->summary) !!} </p>
               <!-- <div class="text-right">
                  <button class="btn btn-pdf"><i class="far fa-file-pdf"></i> Download PDF</button>
               </div> -->
               <hr>
            </div>

            <div class="text-center">
              @if($exh_begin > $curr)
                @if($exhibitors_available <= $exhibition_details->subscribe_exhibitors_limit)
                  <a onclick="take_exh_join('{{$exhibition_details->exh_slug}}')" class="btn btn-expo-btn btn-lg">
                    @lang('website.join_as_exhibitor')
                  </a>
                @endif
              @elseif($exh_begin <= $curr && $exh_end >= $curr)
                <a onclick="take_exh_enter('{{$exhibition_details->exh_slug}}')" class="btn btn-expo-btn btn-lg">
                  @lang('website.enter_the_exhibition')
                </a>
              @endif

  
            
            <div style="height: 20px"></div>

              @if($sponsors_available <= $exhibition_details->subscribe_sponsors_limit)
              {{-- {{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibition/join_sponsor/{{$exhibition_details->exh_slug}}
                  <a href="">
                    <button class="btn btn-expo">
                      <div class="icon-btn-expo"><i class="fas fa-money-bill-alt"></i></div>
                      @lang('website.join_as_sponsor')
                    </button>
                  </a>
                --}}
              @endif
            </div>
         </div>
        
         <div class="col-lg-4">

          @if($exh_begin <= $curr)
           @php
            $exh_start  = new DateTime($exhibition_details->start);
            $exh_end  = new DateTime($exhibition_details->end);
            $curr = new DateTime(date('Y-m-d H:i'));
            $interval = $curr->diff($exh_end);

            // %a will output the total number of days.
            //echo $interval->format('%a total days')."\n";

            // While %d will only output the number of days not already covered by the
            // month.
            //echo $interval->format('%a Days, %h Hours, %i Minutes');
          @endphp
            <div class="counter-side counter-blog">
               <div class="row cd100">
                  <div class="col-4 timer-expo border-action">
                     <p class="l2-txt1 p-b-9 days">{{ $interval->format('%a') }}</p>
                     <h6>@lang('website.day')</h6>
                  </div>
                  <div class="col-4 timer-expo border-action">
                     <p class="l2-txt1 p-b-9 hours">{{ $interval->format('%h') }}</p>
                     <h6>@lang('website.hour')</h6>
                  </div>
                  <!-- <div class="col-3 timer-expo border-action">
                     <p class="l2-txt1 p-b-9 minutes"></p>
                           <h6>minutes</h6>
                               </div>-->
                  <div class="col-4 timer-expo">
                     <p class="l2-txt1 p-b-9 minutes">{{ $interval->format('%i') }}</p>
                     <h6>@lang('website.minute')</h6>
                  </div>
               </div>
            </div>

            @else

              @php
              $exh_start  = new DateTime($exhibition_details->start);
              $exh_end  = new DateTime($exhibition_details->end);
              $curr = new DateTime(date('Y-m-d H:i'));
              $interval = $curr->diff($exh_begin);

              // %a will output the total number of days.
              //echo $interval->format('%a total days')."\n";

              // While %d will only output the number of days not already covered by the
              // month.
              //echo $interval->format('%a Days, %h Hours, %i Minutes');
            @endphp
              <div class="counter-side counter-blog">
                 <div class="row cd100">
                    <div class="col-4 timer-expo border-action">
                       <p class="l2-txt1 p-b-9 days">{{ $interval->format('%a') }}</p>
                       <h6>@lang('website.day')</h6>
                    </div>
                    <div class="col-4 timer-expo border-action">
                       <p class="l2-txt1 p-b-9 hours">{{ $interval->format('%h') }}</p>
                       <h6>@lang('website.hour')</h6>
                    </div>
                    <!-- <div class="col-3 timer-expo border-action">
                       <p class="l2-txt1 p-b-9 minutes"></p>
                             <h6>minutes</h6>
                                 </div>-->
                    <div class="col-4 timer-expo">
                       <p class="l2-txt1 p-b-9 minutes">{{ $interval->format('%i') }}</p>
                       <h6>@lang('website.minute')</h6>
                    </div>
                 </div>
              </div>

            @endif

            <div class="col-12" style="height:20px"></div>
            <div class="counter-side">
               <div class="row">
                  <div class="col-6 border-action">
                     <div class="inline-facts-wrap">
                        <div class="inline-facts text-center">
                           <i class="fas fa-eye"></i>
                           <div class="milestone-counter text-center">
                              <div class="stats animaper">
                                 <div class="num" data-content="0" data-num="60">{{$exhibition_details->viewers}}</div>
                              </div>
                           </div>
                           <h6 class="text-center">@lang('website.views')</h6>
                        </div>
                     </div>
                  </div>
                  <div class="col-6">
                     <div class="inline-facts-wrap">
                        <div class="inline-facts text-center">
                           <i class="fas fa-building"></i>
                           <div class="milestone-counter text-center">
                              <div class="stats animaper">
                                 <div class="num" data-content="{{$exh_subscribed_count}}" data-num="{{$exh_subscribed_count}}">{{$exh_subscribed_count + 10}}</div>
                              </div>
                           </div>
                           <h6 class="text-center">@lang('website.exhibitors')</h6>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@include('partials.website.footer')
<!-- for page only -->
<!-- paging -->
<!--.........................hover box.................................-->
<script type="text/javascript" src="{{asset('website/js/jquery.hoverdir.js')}}"></script>  
<script type="text/javascript">
   $(function() {
   
     
   
   });
   $(' #da-thumbs > li ').each( function() { $(this).hoverdir(); } );
     function take_exh_join(exh_slug){
      console.log(exh_slug);
      // set session
      sessionStorage.setItem("exh_slug_session", exh_slug);
      //redirect to url 
      window.location.href= "{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibition/join_exhibitor/"+exh_slug+',2';
      
    }

    function take_exh_enter(exh_slug){
      console.log('go to exhibitors page : '+exh_slug);
      // set session
      //sessionStorage.setItem("exh_slug_session", exh_slug);
      //redirect to url 
      window.location.href= "{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibition/VisitExhibition/"+exh_slug+"?q=&country_id=";
      
    }
</script>
<!--===============================================================================================-->
<script src="{{asset('website/js/countdowntime/moment.min.js')}}"></script>
<script src="{{asset('website/js/countdowntime/moment-timezone.min.js')}}"></script>
<script src="{{asset('website/js/countdowntime/moment-timezone-with-data.min.js')}}"></script>
<script src="{{asset('website/js/countdowntime/countdowntime.js')}}"></script>

<!-- <script>
   $('.cd100').countdown100({
     /*Set Endtime here*/
     /*Endtime must be > current time*/
     endtimeYear: 0,
     endtimeMonth: 0,
     endtimeDate: 0,
     endtimeHours: 0,
     endtimeMinutes: 0,
     endtimeSeconds: 0,
     timeZone: "" 
     // ex:  timeZone: "America/New_York"
     //go to " http://momentjs.com/timezone/ " to get timezone
   });
</script> -->



@endsection