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
<p><br />Maintenant... Premier service de sa nature, si vous &ecirc;tes 
un individu ou une entreprise, R&eacute;servez un stand en ligne pour 
votre entreprise au premier service d'exposition en ligne 
<strong>(localement et internationalement)</strong> maintenant vous 
pouvez pr&eacute;senter vos produits ou services au monde entier pendant 
que vous s&eacute;journez maison!</p>
<p>MyBusiness vous donne la possibilit&eacute; de participer &agrave; 
des expositions locales et internationales pendant que vous &ecirc;tes 
&agrave; votre place, si vous &ecirc;tes exposant ou un visiteur avec un 
seul clic, Donc maintenant, si vous cherchez &agrave; couper les 
&eacute;tendues de (Employ&eacute;s de location, frais de transport, 
frais de location stand, le co&ucirc;t de la d&eacute;coration de votre 
stand) et aussi s'assurer que vos produits ne sont pas endommag&eacute;s 
ou perdus en &eacute;tant exp&eacute;di&eacute;s &agrave; l'exposition, 
puis exp&eacute;di&eacute;s. Pour que le service d'expositions en ligne 
offert par MyBusiness soit la solution la plus innovante et la plus 
efficace pr&eacute;sent&eacute;e pour vous et votre entreprise.</p>
<p>En plus de participer facilement &agrave; des expositions en ligne, 
Maintenant, il n'y a pas besoin de (permis de voyage, 
h&eacute;bergement, et aussi l'exp&eacute;dition de marchandises, la 
cr&eacute;ation de panneaux d'affichage et les d&eacute;penses de 
construction de votre stand &agrave; l'int&eacute;rieur de l'exposition 
sans aucun tracas que par MyBusiness enregistrer TIME, MONEY et 
EFFORT.</p>
<p><br />Vous pouvez participer en tant qu'exposant et pr&eacute;senter 
votre travail, produits ou services en ligne de n'importe o&ugrave; 
&agrave; tout moment, (votre chambre est compt&eacute;e!). en outre, 
nous garantissons que toutes sortes de communication entre les exposants 
- visiteurs sont lisses et faciles.<br />Que vous soyez 
propri&eacute;taire d'une entreprise ou d&eacute;cideur, ou que vous 
soyez une personne qui pense travailler comme pigiste.</p>
<p><strong>La participation &agrave; des expositions en ligne vous 
permettra de :</strong></p>
<p>- Pr&eacute;sentez votre travail, vos produits ou vos services au 
monde entier pour vous assurer que votre entreprise appara&icirc;t 24 
heures sur 24, 7 jours sur 7, localement et internationalement, tout au 
long de la date d'exposition en ligne.<br />- Affichage des biens et 
services parmi le segment le plus important de votre public cible.<br 
/>- B&eacute;n&eacute;ficiez au maximum du marketing et de la promotion 
professionnels r&eacute;alis&eacute;s par MyBusiness pour l'exposition. 
<br />- Identifier une large base de fournisseurs.<br />- Identifier les 
nouvelles tendances du march&eacute;.<br />- Promouvoir votre marque 
localement et &agrave; l'&eacute;chelle mondiale. <br />- Identifier les 
nouvelles technologies sur le march&eacute;.<br />- Conna&icirc;tre vos 
concurrents.<br />- Cr&eacute;er une base de donn&eacute;es pour vos 
clients et ceux qui sont int&eacute;ress&eacute;s par votre 
entreprise.<br />- Les expositions sont consid&eacute;r&eacute;es comme 
un environnement favorable pour les opportunit&eacute;s 
d'investissement, le marketing et la r&eacute;alisation d'affaires 
r&eacute;ussies. <br />- Entrez et p&eacute;n&eacute;traz de nouveaux 
march&eacute;s.</p>



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