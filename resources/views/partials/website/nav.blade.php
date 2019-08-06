@php
  $languages = DB::table('languages')->get();
  use App\Helpers\Helper;
  $OurSocialMediaLinks = Helper::OurSocialMediaLinks();
  $curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
  
@endphp


<div class="small-items">

    
  @guest
  @else
    @php
      $member_details = Helper::get_member_details(Auth::user()->id,$curr_lang->id);
      $NewMessages = DB::table('members_messages')->where('status',0)->where('receiver_id',Auth::user()->id)->count();
    @endphp
    
  @endguest
  
  @if(isset($OurSocialMediaLinks))
  <ul class="header-social float-right">
    @foreach($OurSocialMediaLinks as $link)
    <li><a href="{{$link->link}}"><i class="{{$link->icon}}"></i></a></li>
    @endforeach
  </ul>
  @endif
</div>
<!--...........................menu...................-->
<div class="big-menu">
  <a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}" class="a-head"><img src="{{asset('website/images/logo.png')}}" class="logo-en"> <img src="{{asset('website/images/logo-ar.png')}}" class="logo-ar"></a>
 
<!--...........................menu item...................-->
  <div class="btn-resposive">
    <button class="toggle btn-res open-menu hc-nav-trigger hc-nav-1"> <i class="fas fa-bars"></i>  </button>
    <!-- <a class="btn-res" href="{{route('login')}}"><i class="fas fa-user"></i></a> -->
    <!-- <button class="btn-res"  data-toggle="modal" data-target=".search-login"><i class="fas fa-search"></i></button> -->
  </div>
  <!--  navigation --> 
  <div class="nav-holder big-menu-items float-right-menu">
    <!--  -->
    <nav>
      <ul>
        <li><a href="{{route('home_page')}}">@lang('website.home')</a></li>
        <li>
          <a class="position-relative" href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exh/Exhibitions?q=&cat=&country=">@lang('website.exhibitions')<div class="new-menu-alert">@lang('website.new')</div></a>
        </li>
        <li>
          <a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Search/Companies" onclick="event.preventDefault();
                      document.getElementById('MemberProductForm').submit();"><i class="ti-layout-sidebar-left"></i> @lang('website.companies')
          </a>
          
          <form id="MemberProductForm" action="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Search/Companies" method="GET" style="display: none;">
            <input hidden="" name="account_type_id" value="0">
            <input hidden="" name="category_id" value="0">
            <input hidden="" name="country_id" value="0">
            <input hidden="" name="search">
            <!-- <input hidden="" name="page" value="1"> -->
          </form>
        </li>
        {{-- <!-- <li><a href="{{route('About')}}">@lang('website.about')</a></li> --> --}}
        <li><a href="{{route('Locations')}}">@lang('website.our_location')</a></li>
        <li><a href="{{route('all_blogs')}}">@lang('website.tips')</a></li>
        <li><a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/FAQs/FAQs" class="hvr-underline-from-center ">@lang('website.what_mybusiness')</a></li>
        {{--
        @auth
          @if(isset($NewMessages))
            @if($NewMessages > 0)
            <li><a href="{{route('AuthedMemberMessages')}}" class="hvr-underline-from-center "><i class="far fa-envelope"></i></a></li><span class="text-white">{{$NewMessages}}</span>
            @endif
          @endif
        @endauth
        --}}
      </ul>
    </nav>
    <!--  -->
    
  </div>

 <style type="text/css">
    .float-right-menu{
      float: left;
    }
    .float-right-menu:lang(ar){
      /* float: right; */
    }
     .float-left-menu{
      float: right;
    }
     .float-left-menu:lang(ar){
      /* float: left; */
    }
 .float-left-menu2{
      float: right;
    }
     .float-left-menu2:lang(ar){
      /* float: left; */
    }

    .float-left-menu nav ul li ul{
      min-width: 40px;
    }
     .float-left-menu nav ul li ul li {
      margin-right: 0px  !important;
      margin-left: 0px  !important;
    }

    .float-left-menu nav ul li ul li a{
      text-align: center !important;
    }


     

            
  </style>



   <div class="nav-holder big-menu-items float-left-menu">
    <nav>
      <ul>
        @guest
          <li><a class="hvr-underline-from-center" href="{{route('login')}}">@lang('website.login')</a></li>
          <li><a class="hvr-underline-from-center" href="{{route('register')}}">@lang('website.register')</a></li>
        @endguest
        <li>
          @foreach($languages as $lang)
            @if($lang->lang == LaravelLocalization::getCurrentLocale())
            <a href="#">
              <img src="{{asset('website/images/')}}/{{$lang->image}}" width="20" height="20">
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
                      <img src="{{asset('website/images')}}/{{$language->image}}" width="20" height="20"> {{strtoupper($localeCode)}}
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







@auth

 <div class="nav-holder big-menu-items float-left-menu2">
      <nav>
      <ul>
      <li>
      
      <a href="#">
        @if(isset($member_details[0]->profile_pic))
        <img src="{{asset('images/en/thumb')}}/{{$member_details[0]->profile_pic}}" class="menu-avatar-logged">
        @endif
         <i class="fa fa-caret-down"></i> 
      
        @if(isset($member_details[0]->member_name))  
        @php
                $myvalue = $member_details[0]->member_name;
                $arr = explode(' ',trim($myvalue));
            @endphp
              {{$arr[0]}} 
        @else
          @auth
            {{auth::user()->email}}
          @endauth
        @endif
      </a>
      <ul>
      <li class="my_account_menu"><a href="{{route('Authed_Member_Profile')}}"> @lang('website.my_account')</a></li>
      
        @if(isset($member_details[0]->slug))
        <li class="my_profile_menu">
        <a href="{{url('/')}}/{{$member_details[0]->slug}}">@lang('website.my_profile')</a>
        </li>
        @endif
          
           
        
      
      <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> @lang('website.logout')</a></li>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>


      </ul>  


      </li>
      </ul>
      </nav>
      </div>
@endauth



                        <!-- navigation  end -->
</div>  
<!--...........................slider...................-->

  @if(\Request::route()->getName() == 'home_page')
  @guest
  <div class="slide-sec" >
  @else
  <div class="slide-sec height_slide" >
  @endguest
 
<div class="main-text-slide">

    <h1 class="main-text-h1">
      @lang('website.home_line_1')
      <br>
      @lang('website.home_line_2')

    </h1>  
    <div class="text-center">    
<a href="{{route('register')}}" class="btn btn-slide-enter" style="color:#FFF;">@lang('website.home_line_btn')</a>
  </div>
  </div>


  <img src="{{asset('website/images/slider-1.jpg')}}" class="slide_img img-1">
  <img src="{{asset('website/images/slider-2.jpg')}}" class="slide_img img-2">
  <div class="brush"></div>
  @endif

  @guest
  @if(\Request::route()->getName() == 'home_page')
  <div class="register-div">
    <div class="inner-register">
      <h1>@lang('website.welcome_to') <strong>MY BUSINESS <div class="line-strong"></div></strong></h1>
      <!-- <p class="p-reqister">
        @lang('website.login_description')
      </p> -->
      <form method="POST" action="{{ route('login') }}">
      @csrf
     <!--  <div class="position-relative">
        <input class="form-control input-register" placeholder="User Name">
        <i class="fas fa-user i-register"></i>
      </div> -->
      <div class="position-relative">
        <input id="email" type="email" class="form-control input-register{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus aria-describedby="emailHelp" placeholder="{{trans('website.email')}}"><i class="fas fa-user i-register"></i>
        @if ($errors->has('email'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
        @endif
      </div>
      <!-- <div class="position-relative">
        <input class="form-control input-register" placeholder="Password">
        <i class="fas fa-lock i-register"></i>
      </div> -->
      <div class="position-relative">
        <input name="password" id="password" type="password" class="form-control input-register{{ $errors->has('password') ? ' is-invalid' : '' }}" aria-describedby="emailHelp" placeholder="{{trans('website.password')}}" required><i class="fas fa-lock i-register"></i>
        @if ($errors->has('password'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('password') }}</strong>
          </span>
        @endif
      </div>
 
      
      <div class="row">
        <div class="col-6">
          <div class="custom-control custom-checkbox my-1 mr-sm-2">
            <input type="checkbox" class="custom-control-input" id="customControlInline">
            <label class="custom-control-label color-white" for="customControlInline">@lang('website.remember_me')</label>
          </div>
        </div>
        @if (Route::has('password.request'))
        <div class="col-6 text-right"><a href="{{ route('password.request') }}" class="color-white link-forget">@lang('website.forgot_password')</a></div>
        @endif
      </div>
      <div class="text-center">
        <button class="btn login-btn-slide" style="background-color: #000;" type="submit">@lang('website.login')</button>   <a href="{{route('register')}}" class="btn login-btn-slide" style="min-width: 120px;">@lang('website.register_now')</a>
      </div>
    </form>
      {{--<p class="color-white p-register"> @lang('website.do_not_have_account_yet') <a href="{{route('register')}}" >@lang('website.register_now')</a></p>--}}
    </div>
  </div>
  <!-- <img src="{{asset('website/images/slider-1.jpg')}}" class="slide_img"> -->
  <div class="brush"></div>
  </div>
  @endif
  @endguest
  

<!--  -->


<header>
  <div class="wrapper cf">
    <nav id="main-nav">
    <!--   <ul class="first-nav">
       
       
      </ul> -->
      <ul class="second-nav">
  
        @guest
        
        @else
        @php
          $member_details = Helper::get_member_details(Auth::user()->id,$curr_lang->id);
        @endphp
        <li class="cryptocurrency">

          <a target="_blank">
            @if(isset($member_details[0]->profile_pic))
            <img src="{{asset('images/en/thumb')}}/{{$member_details[0]->profile_pic}}" class="img-menu-left">
            @else
            <!-- <img src="" class="img-menu-left">  -->
            @endif
            @if(isset($member_details[0]->member_name))
            @php
                $myvalue = $member_details[0]->member_name;
                $arr = explode(' ',trim($myvalue));
            @endphp
              {{$arr[0]}} 
            @else
              {{auth::user()->email}}
            @endif
        </a> </li>
            @if(isset($member_details[0]->slug))
              <li class="my_profile_menu">
               
                <a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/{{$member_details[0]->slug}}"> @lang('website.my_profile')</a>
               
              </li>
               @endif  
              <li class="my_account_menu">
                @if(isset($member_details[0]->slug))
                  <a href="{{route('Authed_Member_Profile')}}">  @lang('website.my_account')</a>
                @else
                  <a href="{{route('Authed_Member_Profile')}}"> @lang('website.my_account')</a>
                @endif
            </li>
              
           
         
          @endguest
         
              <li><a class="hvr-underline-from-center" href="{{route('home_page')}}">@lang('website.home')</a></li>

              <li class="collections"><a  href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exh/Exhibitions?q=&cat=&country=">@lang('website.exhibitions') <span class="badge badge-danger">@lang('website.new')</span></a> </li>
              <li class="credits"><a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Search/Companies" onclick="event.preventDefault();
                      document.getElementById('MemberProductForm').submit();"><i class="ti-layout-sidebar-left"></i> @lang('website.companies')
          </a>
          <form id="MemberProductForm" action="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Search/Companies" method="GET" style="display: none;">
           <input hidden="" name="account_type_id" value="0">
            <input hidden="" name="category_id" value="0">
            <input hidden="" name="country_id" value="0">
            <input hidden="" name="search">
            <!-- <input hidden="" name="page" value="1"> -->
          </form>
              </li>
              {{-- <li class="credits hvr-underline-from-center"><a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/About/About">@lang('website.about')</a></li> --}}
              <li class="credits hvr-underline-from-center"><a href="{{route('Locations')}}">@lang('website.our_location')</a></li>
              <li class="credits hvr-underline-from-center"><a href="{{route('all_blogs')}}">@lang('website.tips')</a></li>
              <li><a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/FAQs/FAQs" class="hvr-underline-from-center" style="border-right:0px; border-left:0px;">@lang('website.what_mybusiness')</a></li>
              @auth()
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> @lang('website.logout')</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              @endauth
              @guest
              <li><i class="fas fa-user i-register"></i><a href="{{route('login')}}" class="hvr-underline-from-center" style="border-right:0px; border-left:0px;">@lang('website.login')</a></li>
              <li><a href="{{route('register')}}" class="hvr-underline-from-center" style="border-right:0px; border-left:0px; background-color:#e60000;">@lang('website.register')</a></li>
              @endguest
              <li class="credits text-center">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                  @foreach($languages as $language)
                    @if($language->lang == $localeCode)
                        <a rel="alternate" class="links-laguage nav-item" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        <img src="{{asset('website/images')}}/{{$language->image}}" width="20" height="20"> 
                      </a>
                    @endif
                  @endforeach
                @endforeach
              </li>
            </ul>

            <ul class="bottom-nav">
       
      
      @if(isset($OurSocialMediaLinks))
      
        @foreach($OurSocialMediaLinks as $link)
        <li><a href="{{$link->link}}"><i class="{{$link->icon}}"></i></a></li>
        @endforeach
      @endif

             
            </ul>

          </nav>

         

          

        </div>

      </header>
