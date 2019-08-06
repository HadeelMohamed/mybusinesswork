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
<p style="text-align: right; direction: rtl; unicode-bidi: embed;"><span 
style="font-size: 12.0pt; line-height: 107%; font-family: 
'Arial',sans-serif;">الأن ولأول مرة في العالم،</span> <span 
style="font-size: 12.0pt; line-height: 107%; font-family: 
'Arial',sans-serif;">سواء كنت (<strong>فرد أو شركة</strong>) إحجز جناح 
خاص بعملك أو شركتك في معرض تجاري (<strong>محلي ودولي</strong>) أونلاين 
لتظهر خدماتك ومنتجاتك إلى العالم كله وأنت من مكانك.</span></p>
<p style="text-align: right; direction: rtl; unicode-bidi: embed;"><span 
style="font-size: 12.0pt; line-height: 107%; font-family: 
'Arial',sans-serif;">يمنحك</span> <span style="font-size: 12.0pt; 
line-height: 107%; font-family: 'Arial',sans-serif;">&nbsp;</span><span 
style="font-size: 12.0pt; line-height: 107%;">MyBusiness</span><span 
style="font-size: 12.0pt; line-height: 107%; font-family: 
'Arial',sans-serif;"> فرصة المشاركة في المعارض المحلية والدولية وأنت في 
مكانك سواء كنت عارض أو زائر فقط بضغطة واحدة، فإذا كنت تسعى إلى توفير 
العمالة ومصروفات النقل وإيجار المساحة الأرضية والديكور الخاص بالمعرض 
التقليدي وأيضاً ضمان عدم تلف المنتجات والتي تتطلب الكثير والكثير من 
الوقت والجهد والمال، نقدم لك خدمة المعارض الأونلاين المقدمة من خلال 
</span><span style="font-size: 12.0pt; line-height: 
107%;">MyBusiness</span><span style="font-size: 12.0pt; line-height: 
107%; font-family: 'Arial',sans-serif;"> والتي تعد الإختيار والحل الأمثل  
 لك ولعملك.</span><span style="font-size: 12.0pt; line-height: 107%;"><br 
/></span><span style="font-size: 12.0pt; line-height: 107%; font-family: 
'Arial',sans-serif;">فبجانب سهولة الإشتراك في المعارض دون عناء إستخراج 
تصاريح والتزامات السفر والإقامات وأيضاً شحن البضائع وعمل اللوحات 
الاعلانية، فقط من خلال </span><span style="font-size: 12.0pt; 
line-height: 107%;">MyBusiness </span><span style="font-size: 12.0pt; 
line-height: 107%; font-family: 'Arial',sans-serif;">&nbsp;يمكنك 
الإشتراك كأحد العارضين وإظهار عملك ومنتجاتك أو خدماتك أونلاين من أي مكان 
، كذلك نضمن لك التواصل بين العارضين والزائرين 
بسهولة ويسر من خلال طرق عدة.</span></p>
</p>
<span style="margin-bottom: .0001pt; text-align: right; direction: rtl; 
unicode-bidi: embed;"><strong><span style="font-size: 12.0pt; 
line-height: 107%; font-family: 'Arial',sans-serif;">المشاركة في المعارض 
أونلاين تساعدك على:</span></strong>
<p style="margin-bottom: .0001pt; text-align: right; direction: rtl; 
unicode-bidi: embed;"><strong><span style="font-size: 12.0pt; 
line-height: 107%; font-family: 
'Arial',sans-serif;">&nbsp;</span></strong></p>
<p style="margin-bottom: .0001pt; text-align: right; line-height: 
normal; direction: rtl; unicode-bidi: embed;"><span style="font-size: 
12.0pt; font-family: 'Arial',sans-serif;">- إظهار عملك ومنتجاتك أو 
خدماتك 24/7 محلياً ودولياً طوال فترة المعرض.</span></p>
<p style="margin-bottom: .0001pt; text-align: right; line-height: 
normal; direction: rtl; unicode-bidi: embed;"><span style="font-size: 
12.0pt; font-family: 'Arial',sans-serif;">- عرض السلع والخدمات أمام أكبر 
شريحة من العملاء المستهدفين. (الاف العملاء المهتمين بخدماتك 
ومنتجاتك)</span></p>
<p style="margin-bottom: .0001pt; text-align: right; line-height: 
normal; direction: rtl; unicode-bidi: embed;"><span style="font-size: 
12.0pt; font-family: 'Arial',sans-serif;"><span style="font-size: 12pt; 
font-family: Arial, sans-serif; line-height: 10pt;">- الإعلان عن أحدث 
المنتجات والخدمات التي تقدمها</span></span></p>
<p style="margin-bottom: .0001pt; text-align: right; line-height: 
normal; direction: rtl; unicode-bidi: embed;"><span style="line-height: 
10pt;"><span style="font-size: 12.0pt; font-family: 
'Arial',sans-serif;">- الاستفادة من التسويق والترويج الاحترافى الذى يقوم 
به </span><span style="font-size: 12.0pt;">MyBusiness</span><span 
style="font-size: 12.0pt; font-family: 'Arial',sans-serif;"> 
للمعرض.</span></span></p>
<p style="margin-bottom: .0001pt; text-align: right; line-height: 
normal; direction: rtl; unicode-bidi: embed;"><span style="font-size: 
12.0pt;">-</span><span style="font-size: 12.0pt; font-family: 
'Arial',sans-serif;"> التعرف على قاعدة كبيرة من الموردين</span><span 
style="font-size: 12.0pt;">.</span></p>
<p style="margin-bottom: .0001pt; text-align: right; line-height: 
normal; direction: rtl; unicode-bidi: embed;"><span style="font-size: 
12.0pt;">-</span><span style="font-size: 12.0pt; font-family: 
'Arial',sans-serif;"> التعرف على الجديد واتجاهات السوق</span><span 
style="font-size: 12.0pt;">.</span></p>
<p style="margin-bottom: .0001pt; text-align: right; line-height: 
normal; direction: rtl; unicode-bidi: embed;"><span style="font-size: 
12.0pt;">-</span><span style="font-size: 12.0pt; font-family: 
'Arial',sans-serif;"> ترويج العلامة التجارية وتعزيزها</span><span 
style="font-size: 12.0pt;">.</span></p>
<p style="margin-bottom: .0001pt; text-align: right; line-height: 
normal; direction: rtl; unicode-bidi: embed;"><span style="font-size: 
12.0pt;">-</span><span style="font-size: 12.0pt; font-family: 
'Arial',sans-serif;"> التعرف على أحدث الأخبار والتكنولوجيا الجديدة فى 
السوق</span><span style="font-size: 12.0pt;">.</span></p>
<p style="margin-bottom: .0001pt; text-align: right; line-height: 
normal; direction: rtl; unicode-bidi: embed;"><span style="font-size: 
12.0pt;">-</span><span style="font-size: 12.0pt; font-family: 
'Arial',sans-serif;"> مشاهدة منافسيك في المجال والتعرف عليهم بشكل 
أكبر</span><span style="font-size: 12.0pt;">.</span></p>
<p style="margin-bottom: .0001pt; text-align: right; line-height: 
normal; direction: rtl; unicode-bidi: embed;"><span style="font-size: 
12.0pt;">-</span><span style="font-size: 12.0pt; font-family: 
'Arial',sans-serif;"> عمل قاعدة بيانات للمتعاملين والمهتمين 
بالسوق</span><span style="font-size: 12.0pt;"> .</span></p>
<p style="margin-bottom: .0001pt; text-align: right; line-height: 
normal; direction: rtl; unicode-bidi: embed;"><span style="font-size: 
12.0pt; font-family: 'Arial',sans-serif;">- عقد العديد من الصفقات 
والعقود وكسب مزيد من العملاء وشركاء الأعمال</span><span 
style="font-size: 12.0pt;">.</span></p>
<p style="margin-bottom: .0001pt; text-align: right; line-height: 
normal; direction: rtl; unicode-bidi: embed;"><span style="font-size: 
12.0pt; font-family: 'Arial',sans-serif;">- الدخول إلى أسواق 
جديدة</span><span style="font-size: 12.0pt;"> .</span></p>
 

               <!-- <div class="text-right">
                  <button class="btn btn-pdf"><i class="far fa-file-pdf"></i> Download PDF</button>
               </div> -->
               <hr>



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