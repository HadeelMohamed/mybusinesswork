@extends('layouts.website')
@section('title','Exhibitions')
@section('content')
@php
$currDateTime = date('Y-m-d H:i:s');
@endphp


<!--...........................for page only...................-->
<link href="{{asset('website/css/expo.css')}}" media="all" rel="stylesheet" type="text/css"/>
<script src="{{asset('website/js/modernizr.js')}}"></script>
<!--<div class="head-padding"></div>-->
<div class="header-expo">
   <div class="arrow-left-expo"></div>
   <div class="overflow-hidden">
      <div class="expo-title-div">
         <div class="container main-timer">
            <div class="counter-side">
            @php
              $exh_begin  = new DateTime($exhibition_details->start);
              $exh_end  = new DateTime($exhibition_details->end);
              $curr = new DateTime(date('Y-m-d H:i'));
              $intervalToStart = $curr->diff($exh_begin);
              $intervalToEnd = $curr->diff($exh_end);
            @endphp
                @if($exh_begin > $curr)
               <div class="row cd100">
                  <div class="col-4 timer-expo border-action">
                     <p class="l2-txt1 p-b-9 days">{{ $intervalToStart->format('%a') }}</p>
                     <h6>@lang('website.day')</h6>
                  </div>
                  <div class="col-4 timer-expo border-action">
                     <p class="l2-txt1 p-b-9 hours">{{ $intervalToStart->format('%H') }}</p>
                     <h6>@lang('website.hour')</h6>
                  </div>
                  <!-- <div class="col-3 timer-expo border-action">
                     <p class="l2-txt1 p-b-9 minutes"></p>
                           <h6>minutes</h6>
                               </div>-->
                  <div class="col-4 timer-expo">
                     <p class="l2-txt1 p-b-9 minutes">{{ $intervalToStart->format('%i') }}</p>
                     <h6>@lang('website.minute')</h6>
                  </div>
               </div>
               @else
             
                
               <div class="row cd100">
                  <div class="col-4 timer-expo border-action">
                     <p class="l2-txt1 p-b-9 days">{{ $intervalToEnd->format('%a') }}</p>
                     <h6>@lang('website.day')</h6>
                  </div>
                  <div class="col-4 timer-expo border-action">
                     <p class="l2-txt1 p-b-9 hours">{{ $intervalToEnd->format('%H') }}</p>
                     <h6>@lang('website.hour')</h6>
                  </div>
                  <!-- <div class="col-3 timer-expo border-action">
                     <p class="l2-txt1 p-b-9 minutes"></p>
                           <h6>minutes</h6>
                               </div>-->
                  <div class="col-4 timer-expo">
                     <p class="l2-txt1 p-b-9 minutes">{{ $intervalToEnd->format('%i') }}</p>
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
               <div class="col-6 color-white">@lang('website.start_at'): {{date('Y-m-d', strtotime($exhibition_details->start))}}</div>
               <div class="col-6 color-white">@lang('website.finish_at'): {{date('Y-m-d', strtotime($exhibition_details->end))}}</div>
            </div>
         </div>
         <div class="retangle"></div>
      </div>
      <div class="triangle-topleft">
         <ul class="links-expo">
            <li><a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibitions/{{$exhibition_details->exh_slug}}" class="hvr-underline-from-left">@lang('website.about_exhibition')</a></li>
            {{--
            <li><a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibitions/{{$exhibition_details->exh_slug}}" class="hvr-underline-from-left"><i class="fas fa-chevron-right color-red"></i> @lang('website.exhibitors')</a></li>
            <li><a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibitions/{{$exhibition_details->exh_slug}}" class="hvr-underline-from-left"><i class="fas fa-chevron-right color-red"></i> @lang('website.sponsors')</a></li>
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
                  <h3 class="h3-expo">@lang('website.why_online_expo')</h3>
               </div>
            </div>
            <div class="h3-expo-div">
               <p class="p-about-expo"></p>
               <p>&nbsp;</p>
<p>Now&hellip;&nbsp; The first service of it&rsquo;s kind, whether you 
are an <strong>Individual </strong>or a <strong>Company</strong>, Book a 
booth online for your business at the first online exhibition service 
(<strong>Locally</strong> and <strong>Internationally</strong>) now you 
can present your products or services to the entire world while you are 
staying home!</p>
<p>MyBusiness gives you the opportunity of participating in local and 
international Exhibitions while you are in your place, whether you are 
exhibitor or a visitor with only one click, So now if you seek to cut 
off the expenses of (Hiring employees, transportation fees, booth 
renting fees, cost of decorating your booth) and also ensuring that your 
products are not damaged or lost by being shipped to the exhibition then 
shipped back. So that the service of the online exhibition offered by 
MyBusiness is the most innovative and effective solution presented for 
you and your business.</p>
<p>As well as it&rsquo;s easy to participate in online exhibitions, Now 
there&rsquo;s no need for (travel permits, accommodations, and also 
shipping goods, creating of billboards and expenses of building your 
booth inside the exhibition without any hassle only through MyBusiness 
save TIME, MONEY &amp; EFFORT.</p>
<p>You can participate as an exhibitor and present your work, products 
or services online from anywhere at any time, (your bedroom is 
counted!). additional to this, we guarantee that all kinds of 
communication between exhibitors &amp; visitors are smooth and easy.</p>
<p>Whether you are a company owner or a decision maker, or you might be 
an individual who thinks to work freelancer. &nbsp;</p>
<strong>Participating in online exhibitions will allow you 
to:</strong>
<ul>
<li>Present your work, products or services to the whole world to ensure 
your business appears 24/7 locally and internationally throughout the 
online exhibition date.</li>
<li>Displaying goods and services among the largest segment of your 
target audience.</li>
<li>Get the most Benefit of professional marketing and promotion 
performed by MyBusiness for the exhibition.</li>
<li>Identify a large base of suppliers.</li>
<li>Identify new market trends.</li>
<li>Promote your Brand locally &amp; Globally.</li>
<li>Identify new technologies in the market.</li>
<li>Know your competitors.</li>
<li>Create a database for your customers and those who are interested in 
your business.</li>
<li>Exhibitions are considered as a favorable environment for investment 
opportunities, marketing and conducting successful business deals.</li>
<li>Enter &amp; Penetrate new markets.</li>
</ul>

               <!-- <div class="text-right">
                  <button class="btn btn-pdf"><i class="far fa-file-pdf"></i> Download PDF</button>
               </div> -->
               <hr>
            </div>
            <div class="text-center">
      @if($exh_begin > $curr)
      <center>
      <a class="btn btn-danger btn-lg" href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibition/join_exhibitor/{{$exhibition_details->exh_slug}}">
        @lang('website.join_as_exhibitor')
      </a>
      </center>
      @endif
                  <br>
            </div>
            <div class="text-center">
              @if($exh_begin <= $curr)
                <a class="btn btn-expo text-white" href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibition/VisitExhibition/{{$exhibition_details->exh_slug}}?q=&country_id=">
                  <div class="icon-btn-expo"><i class="fas fa-sign-in-alt"></i></div>
                  @lang('website.enter_to_exhibition')
                </a>
              @endif

            </div>
         </div>
       
         <div class="col-lg-4">
             @if($exh_begin > $curr)
               
              <div class="counter-side counter-blog">
                 <div class="row cd100">
                    <div class="col-4 timer-expo border-action">
                       <p class="l2-txt1 p-b-9 days">{{ $intervalToStart->format('%a') }}</p>
                       <h6>@lang('website.day')</h6>
                    </div>
                    <div class="col-4 timer-expo border-action">
                       <p class="l2-txt1 p-b-9 hours">{{ $intervalToStart->format('%h') }}</p>
                       <h6>@lang('website.hour')</h6>
                    </div>
                    <!-- <div class="col-3 timer-expo border-action">
                       <p class="l2-txt1 p-b-9 minutes"></p>
                             <h6>minutes</h6>
                                 </div>-->
                    <div class="col-4 timer-expo">
                       <p class="l2-txt1 p-b-9 minutes">{{ $intervalToStart->format('%i') }}</p>
                       <h6>@lang('website.minute')</h6>
                    </div>
                 </div>
              </div>
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
                                   <div class="num" data-content="{{$exh_subscribed_count}}" data-num="{{$exh_subscribed_count}}">{{$exh_subscribed_count + 10 }}</div>
                                </div>
                             </div>
                             <h6 class="text-center">@lang('website.exhibitors')</h6>
                          </div>
                       </div>
                    </div>
                  

                 </div>
              </div>
              @else
              <div class="counter-side counter-blog">
                 <div class="row cd100">
                    <div class="col-4 timer-expo border-action">
                       <p class="l2-txt1 p-b-9 days">{{ $intervalToEnd->format('%a') }}</p>
                       <h6>@lang('website.day')</h6>
                    </div>
                    <div class="col-4 timer-expo border-action">
                       <p class="l2-txt1 p-b-9 hours">{{ $intervalToEnd->format('%h') }}</p>
                       <h6>@lang('website.hour')</h6>
                    </div>
                    <!-- <div class="col-3 timer-expo border-action">
                       <p class="l2-txt1 p-b-9 minutes"></p>
                             <h6>minutes</h6>
                                 </div>-->
                    <div class="col-4 timer-expo">
                       <p class="l2-txt1 p-b-9 minutes">{{ $intervalToEnd->format('%i') }}</p>
                       <h6>@lang('website.minute')</h6>
                    </div>
                 </div>
              </div>
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
                                   <div class="num" data-content="{{$exh_subscribed_count}}" data-num="{{$exh_subscribed_count}}">{{$exh_subscribed_count + 10 }}</div>
                                </div>
                             </div>
                             <h6 class="text-center">@lang('website.exhibitors')</h6>
                          </div>
                       </div>
                    </div>
                  

                 </div>
              </div>
              @endif
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
   
     $(' #da-thumbs > li ').each( function() { $(this).hoverdir(); } );
   
   });
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