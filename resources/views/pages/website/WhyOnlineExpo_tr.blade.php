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
               <button class="btn btn-expo">
                  <div class="icon-btn-expo"><i class="fas fa-chevron-right"></i></div>
                  @lang('website.sponsors')
               </button>
               <button class="btn btn-expo">
                  <div class="icon-btn-expo"><i class="fas fa-chevron-right"></i></div>
                  @lang('website.exhibitors')
               </button>
            </div>
            <div class="position-relative big-div-title">
               <img src="{{asset('website/images/logo-expo.png')}}" class="logo-expo">
               <div class="h3-expo-div">
                  <h3 class="h3-expo">@lang('website.why_online_expo')</h3>
               </div>
            </div>
            <div class="h3-expo-div">
               <p class="p-about-expo"></p>
<p><br />Nwo... Bu t&uuml;r ilk hizmet, ister bir bireysel ya da bir 
şirket, rezervasyon ilk online sergi hizmeti <strong>(yerel ve 
uluslararası)</strong> iş i&ccedil;in bir standın Online şimdi t&uuml;m 
d&uuml;nyaya &uuml;r&uuml;n veya hizmet sunabilir kaldığınız s&uuml;re 
boyunca Ev!</p>
<p>MyBusiness size yerinde iken yerel ve uluslararası sergiler katılan 
fırsat verir, ister katılımcı ya da sadece tek bir tıklama ile bir 
ziyaret&ccedil;i, bu y&uuml;zden şimdi eğer expanses kesmek i&ccedil;in 
arama (&ccedil;alışanlar Kiralama, ulaşım &uuml;cretleri, standında 
kiralama &uuml;cretleri, Standınızı dekorasyon maliyeti) ve aynı zamanda 
&uuml;r&uuml;nlerinizin zarar g&ouml;rmediğinden veya sergiye sevk 
edildikten sonra geri sevk edilerek kaybolduğunu garanti etmek. 
B&ouml;ylece MyBusiness tarafından sunulan Online sergiler hizmeti sizin 
ve işletmeniz i&ccedil;in sunulan en yenilik&ccedil;i ve etkili 
&ccedil;&ouml;z&uuml;md&uuml;r.</p>
<p>Online sergiler katılmak kolay olduğu gibi, şimdi (seyahat izinleri, 
konaklama ve aynı zamanda mal nakliye, reklam panoları ve Fuar 
i&ccedil;inde Standınızı bina giderleri oluşturma sadece MyBusiness 
aracılığıyla herhangi bir g&uuml;&ccedil;l&uuml;k olmadan. ZAMAN, para 
ve &ccedil;aba tasarrufu. <br />Katılımcı olarak katılabilir ve işinizi, 
&uuml;r&uuml;nlerinizi veya hizmetlerimizi her yerden 
&ccedil;evrimi&ccedil;i olarak sunabilir (yatak odunuz sayılır!). Buna 
ek olarak, katılımcılar ve ziyaret&ccedil;iler arasındaki her 
t&uuml;rl&uuml; iletişimin p&uuml;r&uuml;zs&uuml;z ve kolay olduğunu 
garanti ediyoruz.<br />Bir şirket sahibi ya da bir karar verme veya 
Freelancer &ccedil;alışmak i&ccedil;in d&uuml;ş&uuml;nen bir birey 
olabilir olsun.</p>
<p><strong>Online sergiler katılmak i&ccedil;in izin 
verecektir:</strong></p>
<p>&bull; İşinizi, &uuml;r&uuml;nlerinizi veya hizmetlerimizi t&uuml;m 
d&uuml;nyaya sunmak, işletmenizin &ccedil;evrimi&ccedil;i Sergi tarihi 
boyunca yerel ve uluslararası 24/7 olarak 
g&ouml;r&uuml;nt&uuml;lenmesini sağlamak.<br />&bull; Hedef kitlenizin 
en b&uuml;y&uuml;k segmenti arasında mal ve Hizmetleri 
g&ouml;r&uuml;nt&uuml;leme.<br />&bull; Fuar i&ccedil;in MyBusiness 
tarafından ger&ccedil;ekleştirilen profesyonel pazarlama ve promosyonun 
en fazla yararına olsun. <br />&bull; Tedarik&ccedil;ilerden oluşan 
b&uuml;y&uuml;k bir taban belirleyin.<br />&bull; Yeni piyasa 
eğilimlerini belirleyin.<br />&bull; Markanızı yerel ve k&uuml;resel 
olarak tanıtın. <br />&bull; Piyasada yeni teknolojiler belirleyin.<br 
/>&bull; Rakiplerinizi biliyorum.<br />&bull; M&uuml;şterileriniz ve 
işletmeniz ilgilenen olanlar i&ccedil;in bir veritabanı oluşturun.<br 
/>&bull; Sergiler yatırım fırsatları, pazarlama ve başarılı iş 
fırsatları y&uuml;r&uuml;tmek i&ccedil;in olumlu bir ortam olarak kabul 
edilir. <br />&bull; Girin ve yeni piyasalar n&uuml;fuz.</p>


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
         @php
            $exh_begin  = new DateTime($exhibition_details->start);
            $curr = new DateTime(date('Y-m-d H:i'));
            $interval = $curr->diff($exh_begin);

            // %a will output the total number of days.
            //echo $interval->format('%a total days')."\n";

            // While %d will only output the number of days not already covered by the
            // month.
            //echo $interval->format('%a Days, %h Hours, %i Minutes');
          @endphp
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