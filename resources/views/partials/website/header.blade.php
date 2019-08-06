@php
  $languages = DB::table('languages')->get();
  use App\Helpers\Helper;
  $OurSocialMediaLinks = Helper::OurSocialMediaLinks();
  $curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();

@endphp

<!DOCTYPE html>
<html>
  <head>
    <!-- My Business project Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="robots" content="noindex, nofollow">
    <meta name="title" content="My Business project">
    <meta name="description" content="My Business project" />
    <meta name="keywords" content="My Business project " />
    <link rel="canonical" href="" />
    <meta name="author" content="my business">
    <!-- /My Business project Meta Tags -->
    <!-- My Business project Style Sheet -->
    <link rel="stylesheet" href="{{asset('mybusinessnewwebsite/css/my-business-styles.css')}}" />

    <link rel="stylesheet" href="{{asset('mybusinessnewwebsite/css/english-style.css')}}" />
			@if(LaravelLocalization::getCurrentLocale() == 'ar')
			<link rel="stylesheet" href="{{asset('mybusinessnewwebsite/css/arabic-style.css')}}" />
			@endif

    <!-- /My Business project Style Sheet -->
    <title>My Business project</title>
  </head>
  <body>
    <!--header start-->
    <header class="my-business-project-header-page width-percent-100 position-relative ">
      <nav class="navbar navbar-expand-lg navbar-light  my-business-header-white-background-color my-business-big-menu width-percent-100 ">
        <a class="navbar-brand logo-nav-div" href="#">
        <span class="logo-img-in-big-size"><img src="{{asset('mybusinessnewwebsite/img/Trans5.png')}}" alt="My Business logo"></span>
        <span class="logo-img-in-small-size"><img src="{{asset('mybusinessnewwebsite/img/TransIcon2.png')}}" alt="My Business logo"></span>
        </a>
        <!--search-form start-->
        <a class="btn  my-2 my-sm-0 mobile-header-search-icon" href="#" id="show-mobile-search-form-button" ><i class="fas fa-search"></i></a>
        <form class="form-inline my-2 my-lg-0 search-menu-form" id="search-menu-mobile-open-div" >
          <input class="form-control mr-sm-2 searsh-input-type-header" type="search" placeholder="Search" aria-label="Search">
          <a class="btn  my-2 my-sm-0 header-search-icon" href="#"><i class="fas fa-search"></i></a>
        </form>
        <!-- / search-form end-->
        <div class="menu-with-out-logo">
          <div class="collapse navbar-collapse home-nav-ul-text" id="navbarSupportedContent">
            <!--menu start-->
            <ul class="navbar-nav ">
              <li class="nav-item active">
                <a class="nav-link " href="#">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                SERVICES
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#"> EXHIBITIONS</a>
                  <a class="dropdown-item" href="#">COPMPANIES</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="#">BUSINESS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="#">TIPS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="#">WHAT'S MY BUSINESS</a>
              </li>

             @guest
                 <!--if person not login start-->
               <li class="nav-item login-li" >
                <a class="nav-link " href="{{route('login')}}">
                <span class="header-link-icon"><i class="fas fa-sign-in-alt"></i></span>
                <span class="header-link-text">@lang('website.login')</span></a>
              </li>
              <!--/ if person not login end-->
              <!--if person login start-->
             <!--      <li class="nav-item login-li login-li-your-name">
                <a class="nav-link " href="#">
                <span>Hello , </span>
                <span class="header-link-text">First Name</span>
                </a>
              </li> -->
               <!-- /if person login end-->
                <!-- add business button if person not login start-->
              <li class="nav-item" >
               <!--  <span class="or-word-class">or</span> -->
                <a class="btn my-business-red-background-color white-color header-login-button hvr-shadow" href="#login-modal-id" role="button" data-toggle="modal" data-target="#login-modal-id">
                <span class="header-link-text"> @lang('website.ADD BUSINESS ') </span>
                <span class="header-link-icon">  <i class="fas fa-plus"></i></span>
                </a>
              </li>
           <!--/add business button if person not login end-->

            </ul>
            <div>
            </div>
            <!--/menu end-->
          </div>

           @endguest
           @auth



                                        <!--add business button if person login start-->


                    <div class="nav-item dropdown profile-info">

        <a class="nav-link  dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <span class="profile-img">
                     	  @if(isset($member_details[0]->profile_pic))
                     	<img src="{{asset('images/en/thumb')}}/{{$member_details[0]->profile_pic}}" height="30px" width="30px"  style="border-radius: 50%;"/>
                     	@else
                     	<img src="{{asset('mybusinessnewwebsite/img/profil-img.jpg')}}" height="30px" width="30px"   style="border-radius: 50%;"/>


                     	@endif
                     </span>

                      @if(isset($member_details[0]->member_name))
        @php
                $myvalue = $member_details[0]->member_name;
                $arr = explode(' ',trim($myvalue));
            @endphp

               <span class="profile-name padding-horizontal-5"> {{$arr[0]}} </span>
        @else

          @auth
           <span class="profile-name padding-horizontal-5"> {{auth::user()->email}}</span>

          @endauth
        @endif

        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

        	<a  class="dropdown-item" href="{{route('Authed_Member_Profile')}}">@lang('website.my_account')</a>
 @if(isset($member_details[0]->slug))
          <a  class="dropdown-item" href="{{url('/')}}/{{$member_details[0]->slug}}">@lang('website.my_profile')</a>
          	@endif
          <a  class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
             <span class="profile-img">
             	@if(isset($member_details[0]->profile_pic))
             	<img src="{{asset('images/en/thumb')}}/{{$member_details[0]->profile_pic}}" height="30px" width="30px"   style="border-radius: 50%;"/>
         @else
                     	<img src="{{asset('mybusinessnewwebsite/img/profil-img.jpg')}}" height="30px" width="30px"  style="border-radius: 50%;"/>

                   @endif
         </span>


          	<span>@lang('website.logout')</span>


          	                @if(isset($member_details[0]->member_name))
        @php
                $myvalue = $member_details[0]->member_name;
                $arr = explode(' ',trim($myvalue));
            @endphp

               <span> {{$arr[0]}} </span>
        @else

          @auth
           <span> {{auth::user()->email}}</span>

          @endauth
        @endif

          	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
          </a>
        </div>
      </div>

           @endauth

           <!--/ add business button if person login end-->
          <!--country-language dropdown start-->
          <div class="nav-item dropdown country-dropdown">

          	@foreach($languages as $lang)
            @if($lang->lang == LaravelLocalization::getCurrentLocale())
            <a class="nav-link dropdown-toggle country-dropdown-link" href="#" id="country-dropdown-open" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="country-img"><img src="{{asset('mybusinessnewwebsite/img/')}}/{{$lang->image}}" height="30px" width="30px" alt="country name" /></span>
            <span class="country-name">{{strtoupper(LaravelLocalization::getCurrentLocale())}}</span>
            </a>

              @endif
          @endforeach
            <div class="dropdown-menu" aria-labelledby="country-dropdown-open" id="country-dropdown-slid-div">
           @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

            	@foreach($languages as $language)
                  @if($language->lang == $localeCode)
              <a class="dropdown-item "  href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
              <span class="country-img">
              	<img src="{{asset('mybusinessnewwebsite/img')}}/{{$language->image}}" height="25px" width="25px" alt="{{$language->lang}}" /></span>
              <span class="country-name">{{strtoupper($localeCode)}}</span>
              </a>



                @endif
                @endforeach


  @endforeach
            </div>




          </div>
          <!-- /country-language dropdown end-->
        </div>
        <!--mobile button start-->
        <button class="navbar-toggler mobile-menu-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class=""> <i class="fas fa-bars"></i></span>
        </button>
        <!-- /mobile button end-->
      </nav>
    </header>
    <!--/header end-->
