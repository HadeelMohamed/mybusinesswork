
{{--
@php
  $languages = DB::table('languages')->get();
@endphp
<div class="big-menu">
  <div class="container">
    <div class="row">
      <div class="col-lg-2 col-sm-7 col-6">
        <a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}" class="a-head"><img src="{{asset('website/images/logo.png')}}"></a>
        <a  class="search-item">
          <div class="search-inner"><i class="fas fa-search"></i> @lang('website.search')</div>
        </a>
        <div class="main-search-item2 hidden-search">
          <div class="item-search-big2">
            <div class="container-fluid">
              <div class="row">
                <div class="col-6 border-search2">
                  <div class="row">
                    <input class="search-input2" placeholder="{{trans('website.search...')}}">
                  </div>
                </div>
                <div class="col-6 border-search">
                  <div class="row">
                    <div class="header-search-select-item">
                      <select data-placeholder="All Categories" class="chosen-select">
                        <option>@lang('website.all_categories')</option>
                        <option>Shops</option>
                        <option>Hotels</option>
                        <option>Restaurants</option>
                        <option>Fitness</option>
                        <option>Events</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <button class="btn-search2"><i class="fas fa-search"></i></button>
          </div>
        </div>
      </div>
      <div class="col-lg-10 col-sm-5 col-6">
        <div class="nav-holder languge">
        <nav>
          <ul>
            <li>
              <a href="#"> {{strtoupper(LaravelLocalization::getCurrentLocale())}} <i class="fa fa-caret-down"></i></a>
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
@guest
  <button class="btn btn-login" data-toggle="modal" data-target=".login-btn">@lang('website.login')</button>
  <!-- <a href="{{route('register')}}" class="btn btn-login" >@lang('website.create_your_company')</a> -->
  <!-- <button class="btn btn-login" data-toggle="modal" data-target=".login-btn">@lang('website.create_company')</button> -->
  <a href="{{route('register')}}" class="btn btn-login" >@lang('website.signup')</a>
@else
  @php
    $member_details = Helper::get_member_details(Auth::user()->id,LaravelLocalization::getCurrentLocale());
  @endphp
  <div class="dropdown logined-div">
    <button class="btn-logined dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <span><img src="images/logo-co.jpg" class="hello-pic" alt=""></span> @if(isset($member_details[0]->member_name)){{$member_details[0]->member_name}} @else @lang('website.user_name') @endif
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Account/Member_Profile"><i class="fas fa-cogs"></i> @lang('website.my_account')</a>
    @if(isset($member_details[0]->slug))<a class="dropdown-item" href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/{{$member_details[0]->slug}}"><i class="fas fa-cogs"></i> @lang('website.my_profile')</a>@endif
    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> @lang('website.logout')</a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
  </div>
</div>
@endguest
<!--...........................menu item...................-->
<div class="text-right">
<button class="btn-res open-menu"><i class="fas fa-bars"></i></button>
<button class="btn-res" data-toggle="modal" data-target=".login-btn"><i class="fas fa-user"></i></button>
<div class="btn-res language-btn position-relative"><i class="fas fa-flag"></i>
  <div class="child-lang" >
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
      @foreach($languages as $language)
        @if($language->lang == $localeCode)
          <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
            <img src="{{asset('website/images')}}/{{$language->image}}">
          </a>
        @endif
      @endforeach
      
    @endforeach
  </div>
</div>
</div>
--}}


