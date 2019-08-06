<!doctype html>
@php
  use App\Helpers\Helper;
  $OurSocialMediaLinks = Helper::OurSocialMediaLinks();
  $languages = DB::table('languages')->where('shown',1)->whereIn('id',[1,2])->get();
@endphp
<html lang="{{LaravelLocalization::getCurrentLocale()}}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{asset('commingsoon/images/five.png')}}" >
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    @if(LaravelLocalization::getCurrentLocale() == 'ar')
    <link rel="stylesheet" href="{{asset('commingsoon/css/bootstrap-rtl.css')}}" >
    @endif
    <link rel="stylesheet" type="text/css" href="{{asset('commingsoon/css/fontawesome-all.css')}}">
    <link rel="stylesheet" href="{{asset('commingsoon/css/main.css')}}" >
    <link rel="stylesheet" href="{{asset('commingsoon/css/menu.css')}}" >
    <link rel="stylesheet" href="{{asset('commingsoon/css/btn-effect.css')}}" >
    <link href="{{asset('commingsoon/css/feature.css')}}" rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('commingsoon/css/media.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{asset('commingsoon/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('commingsoon/css/main-coming.css')}}">
    <title>MyBussinessme</title>
  </head>
  <body>
    <!-- Main  -->
    <div class="small-items">
      <div class="nav-holder float-right language-menu">
    <nav>
      <ul>
        <li>
          @foreach($languages as $lang)
            @if($lang->lang == LaravelLocalization::getCurrentLocale())
            <a href="#">
              <img src="{{asset('website/images/')}}/{{$lang->image}}">
              {{strtoupper(LaravelLocalization::getCurrentLocale())}}
              <i class="fa fa-caret-down"></i>
            </a>
            @endif
          @endforeach
            <ul>
              @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
              <li>
                @foreach($languages as $language)
                  @if($language->lang == $localeCode)
                    <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                      <img src="{{asset('website/images')}}/{{$language->image}}"> {{ $properties['native'] }} 
                    </a>
                  @endif
                @endforeach
              </li>
              @endforeach
            </ul>  
        </li>
      </ul>
    </nav>
  </div>
      @if(isset($OurSocialMediaLinks))
        <ul class="header-social float-right">
          @foreach($OurSocialMediaLinks as $link)
          <li><a href="{{$link->link}}" target="_blank"><i class="{{$link->icon}}"></i></a></li>
          @endforeach
        </ul>
      @endif
    </div>
<!--...........................menu...................-->
  <div class="big-menu">
    <a href="#" class="a-head float-left"><img src="{{asset('commingsoon/images/logo.png')}}" class="logo-en"> <img src="{{asset('commingsoon/images/logo-ar.png')}}" class="logo-ar"></a>
    <a  class="search-item"><div class="search-inner"><i class="fas fa-search"></i> Search</div></a>
    <!--...........................menu item...................-->
    <div class="text-right btn-resposive">
      @if(isset($OurSocialMediaLinks))
          @foreach($OurSocialMediaLinks as $link)
          <!-- <a href="{{$link->link}}" target="_blank"><i class="{{$link->icon}}"></i></a> -->
          <a class="btn-res" href="{{$link->link}}"><i class="{{$link->icon}}"></i></a>
          @endforeach
      @endif
          @if(LaravelLocalization::getCurrentLocale() == 'ar')
          <a class="btn-res" href="{{url('/')}}/en"><img src="{{asset('website/images/')}}/UK_icon.png" width="25"></a>
          @else
          <a class="btn-res" href="{{url('/')}}/ar"><img src="{{asset('website/images/')}}/arabic_icon.png" width="25"></a>
          @endif
    </div>
    <!--  navigation --> 
    <div class="nav-holder big-menu-items" style="visibility:hidden">
      <nav>
        <ul>
          <!--      <li><a href="http://mybusinessme.com/home">Home</a></li>-->
                <li><a href="http://mybusinessme.com/tenders">Our Services <i class="fa fa-caret-down"></i></a>
                 <ul>
                  <li><a href="http://mybusinessme.com/exhibitions">Exhibitions</a></li>
                 <li><a href="#">Recruitment</a></li>
                 <li><a href="http://mybusinessme.com/auctions">Auctions</a></li>
                 <li><a href="http://mybusinessme.com/tenders">Tenders</a></li>
            </ul>
                </li>
                
                 <li><a href="http://mybusinessme.com/companies">Companies</a>
                
                 
                  <li><a href="#">Blog <i class="fa fa-caret-down"></i></a>
                   <ul>
                       <li><a href="#">Recruitment</a></li>
                        <li><a href="#">Marketing</a></li> 
                        <li><a href="#">Enterepreneurship</a></li>  
                        <li><a href="#">E Magazine</a></li>
                   </ul>
                  </li>
                  
               
                 
     <li><a href="#">News <i class="fa fa-caret-down"></i></a>
                   <ul>
                       <li><a href="#">Mybusiness News</a></li>
                       <li><a href="#">Press Coverage & Award</a></li>
                        <li><a href="#">Events</a></li> 
                     
                       
                   </ul>
                  </li>
                
                
                
                
                
                
                
                 <li><a href="#">About <i class="fa fa-caret-down"></i></a>
                   <ul>
                       <li><a href="#">About Us</a></li>
                       <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Our Location</a></li> 
                        <li><a href="#">Careers</a></li> 
                       
                   </ul>
                  </li>
                  
                  
                  
                                                           <li><a href="#" style="font-size:25px;" data-toggle="modal" data-target=".search-login"><i class="fas fa-search" style="transform:none;"></i></a></li>

                  
                
    
                
                
                
                
              
            
                
                                     
                        
            </ul>
          </nav>
      </div>
      <!-- navigation  end -->



</div>  




  <!--...........................slider...................-->


<div class="slide-sec" style="background-image:url({{asset('commingsoon/images/construction.jpg')}}" >




  
<div class="contianer-itrms">


  <div class="back-white">
    <div class="text-center">
      <h3 class="l1-txt1 txt-center p-b-25">
        @lang('website.comming_soon_question')
      </h3>

      <p class="m2-txt1 txt-center p-b-48">
        <strong>@lang('website.soon')</strong> 
      </p>

      <div class="flex-w flex-c-m cd100 p-b-33">
        <div class="flex-col-c-m size2 bor1 m-l-15 m-r-15 m-b-20">
          <span class="l2-txt1 p-b-9 days">00</span>
          <span class="s2-txt1">@lang('website.day')</span>
        </div>

        <div class="flex-col-c-m size2 bor1 m-l-15 m-r-15 m-b-20">
          <span class="l2-txt1 p-b-9 hours">00</span>
          <span class="s2-txt1">@lang('website.hour')</span>
        </div>

        <div class="flex-col-c-m size2 bor1 m-l-15 m-r-15 m-b-20">
          <span class="l2-txt1 p-b-9 minutes">00</span>
          <span class="s2-txt1">@lang('website.minute')</span>
        </div>

        <div class="flex-col-c-m size2 bor1 m-l-15 m-r-15 m-b-20">
          <span class="l2-txt1 p-b-9 seconds">00</span>
          <span class="s2-txt1">@lang('website.second')</span>
        </div>
      </div>
            
            
                         
             <div>
            <!--<h3 class="h3-item" style="width:100%"><span class="yes-no">هل تملك عمل خاص بك؟</span> <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
  <label class="form-check-label" for="inlineRadio1">نعم</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
  <label class="form-check-label" for="inlineRadio2">لا</label>
</div></h3>-->
</div>


<div class="back-black">
  <h3 class="h3-item " style="width:100%">
    @lang('website.get') <strong style="color:#e60000">80$</strong> @lang('website.free_credit')
    <br>
    @lang('website.book_free_membership')

  </h3>



<div class="w-full flex-w flex-c-m validate-form">
            <style>
           
      .form-check{
        color:#fff;
      }
                  .form-check input{
              width:20px;
              height:20px;
              margin:0 20px;
              
            }
            .h3-item-ask{
              margin:0 auto;
              color:#fff;
              width:100%;
            }
            
            .form-check-label {
    padding-right: 3.25rem;
            }
            .dont-worry{
              position: absolute;
    bottom: -35px;
    right: 30px;
    color: #fff;
    padding: 10px 0px;
            }
            
            
            
            
            @media (max-width:576px){
            .back-black{
            width:100%;
            }
            }
            </style>
            
 

        <div class="wrap-input100 validate-input where1 pos-relative" data-validate = "Valid email is required: ex@abc.xyz">
          <div id="requiredSubscribe" class="alert alert-danger alert-dismissible fade show" style="display: none;" role="alert">
            @lang('website.email_required')
          </div>
          <div id="invalidSubscribe" class="alert alert-danger alert-dismissible fade show" style="display: none;" role="alert">
            @lang('website.email_not_valid')
          </div>
          <input class="input100 placeholder0 s2-txt2" type="text" id="CampaginSubscribeEmail" name="CampaginCampaginSubscribeEmail" placeholder="{{trans('website.email')}}">
          <span class="focus-input100"></span>
<!--                    <span class="dont-worry">.</span>
-->       </div>
        
                            

        <button class="flex-c-m size3 s2-txt3 how-btn1 trans-04 where1" onclick="subscribeNow()">
          @lang('website.book_now')
        </button>
      </div>
</div>
                        

                       

      
    </div>
        </div>
  </div>
  



<div class="brush"></div>
</div>



  <!--...........................slider...................-->







  
  
  
  
  
  
  
  
  
    <!--...........................fearture...................-->

@if(isset($our_features))
<section class="feature-sec position-relative">
   <div class="container">
      <!-- <h3 class="h3-ser">@lang('website.stay_tuned')</h3> -->
      <!-- <div class="line-sec back-red"></div> -->
      <!-- <p class="p-ser-main">@lang('website.innovative_business_solution_especially_for_you')</p> -->
      @if(count($our_features) > 0)
      <div class="row">
        <ul class="items-feature">
         @foreach($our_features as $feature)
          <li>
            <div class="div-feature">
              <img src="{{asset('website/images')}}/{{$feature->icon}}" alt=""> 
                <h6 class="h6-feature">
                  {{$feature->title}}<br>
                  {{$feature->short_desc}}
                </h6>
             </div>
          </li>
         @endforeach
         </ul>
      </div>
      @endif
   </div>
</section>
@endif 
  
    
    





   
   
   
   

























<!--.......................menu......................-->






















 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('commingsoon/js/jquery-2.1.1.js')}}" ></script>
    <script src="{{asset('commingsoon/js/popper.min.js')}}" ></script>
    <script src="{{asset('commingsoon/js/bootstrap.min.js')}}" ></script>

    <!-- social -->
  <script src="{{asset('commingsoon/js/plugins.js')}}" ></script>
  <script src="{{asset('commingsoon/js/script.js')}}" ></script>
<!-- <script src="js/social.js" ></script>-->
 <script src="{{asset('commingsoon/js/my-js.js')}}" ></script>
 
 
<script type="text/javascript">
   function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!regex.test(email)) {
      return false;
    }else{
      return true;
    }
  }
  function subscribeNow(){

    var CampaginEmail = $('#CampaginSubscribeEmail').val();
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var url = "{{Route('CampaginSubscribe')}}";

    if(CampaginEmail== ''){
      $('#CampaginSubscribeEmail').next().show();
      $('#CampaginSubscribeEmail').focus();
      $('#requiredSubscribe').show();
      $('#invalidSubscribe').hide();
      return false;
    }

    if(IsEmail(CampaginEmail) == false){
      $('#invalid_email').show();
      $('#requiredSubscribe').hide();
      $('#invalidSubscribe').show();
      return false;
    }

    // valid 
    $('#invalid_email').hide();
    $('#requiredSubscribe').hide();
    $('#invalidSubscribe').hide();
    //submit ajax
    $.ajax({
      /* the route pointing to the post function */
      url: url,
      type: 'POST',
      /* send the csrf-token and the input to the controller */
      data: {
              _token: CSRF_TOKEN,
              campagin_email:CampaginEmail,
            },
      dataType: 'JSON',
      /* remind that 'data' is the response of the AjaxController */
      success: function (data) {
        if(data.status == 'success'){
          // alert(data.message);
          swal("{{trans('website.congratulations')}}", "{{trans('website.congratulations_details')}}", "success");
          $('#CampaginSubscribeEmail').val('');
          return false;
        }

        if(data.status == 'exist'){
          // alert(data.message);
          swal("{{trans('website.already_subscribed!')}}", data.message, "info");
          $('#CampaginSubscribeEmail').val('');
          $('#CampaginSubscribeEmail').focus();
          return false;
        }

        if(data.status == 'error'){
          swal("Error", data.message, "error");
          $('#CampaginSubscribeEmail').val('');
          $('#CampaginSubscribeEmail').focus();
          return false;
        }
      },
      error: function(data){
        console.log('error');
      }
    }); 
  }
</script>

  
    
    
    
    
    <!--===============================================================================================-->
  <script src="{{asset('commingsoon/vendor/countdowntime/moment.min.js')}}"></script>
  <script src="{{asset('commingsoon/vendor/countdowntime/moment-timezone.min.js')}}"></script>
  <script src="{{asset('commingsoon/vendor/countdowntime/moment-timezone-with-data.min.js')}}"></script>
  <script src="{{asset('commingsoon/vendor/countdowntime/countdowntime.js')}}"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>
    $('.cd100').countdown100({
      /*Set Endtime here*/
      /*Endtime must be > current time*/
      endtimeYear: 2019,
      endtimeMonth: 05,
      endtimeDate: 02,
      endtimeHours: 0,
      endtimeMinutes: 0,
      endtimeSeconds: 0,
      timeZone: "" 
      // ex:  timeZone: "America/New_York"
      //go to " http://momentjs.com/timezone/ " to get timezone
    });
  </script>
<!--===============================================================================================-->
  <script src="{{asset('commingsoon/vendor/tilt/tilt.jquery.min.js')}}"></script>
  <script >
    $('.js-tilt').tilt({
      scale: 1.1
    })
  </script>


    

  </body>
</html>