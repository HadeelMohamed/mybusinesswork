<div  class="sec-details">
  <div class="container">
    <div class="row">
      <div class="head-menu-company">
        <div class="text-center">
          <div class="btn-menu-com" ><i class="fas fa-bars"></i></div>
        </div>
        <ul class="nav-details nav-co">
          <li><a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/{{$member->member_slug}}">@lang('website.about')</a></li>
          <li>
            <a class="a-product" href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Member/{{$member->member_slug}}/Products/">@lang('website.products') 
              @if(isset($products_count))
                @if($products_count > 0)
                  <div class="alert-not">{{count($products)}}</div>
                @endif
              @elseif(isset($products))
                @if($products > 0)
                  <div class="alert-not">{{$products}}</div>
                @endif
              @endif
            </a>
          </li>
          @auth
          @if(Auth::user()->id == $member->user_id)
          <li>
            <a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Account/MemberMessages">@lang('website.messages') 
              @if(isset($NewMessagesCount))
                @if($NewMessagesCount > 0)
                  <div class="alert-not">{{$NewMessagesCount}}</div>
                @endif
              @endif
            </a>
          </li>
          @endif
          @endauth
        </ul>
      </div>
    </div>
  </div>
</div>