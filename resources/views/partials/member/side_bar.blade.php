 <?php
 use App\Helpers\Helper;
 $curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
 $check = Helper::CheckMemberExistDb(Auth::user()->id);
 $member_details = Helper::get_member_details(Auth::user()->id,$curr_lang->id);
 
 ?>
 <!--...........................aside menu...................-->
<aside class="col-md-3">
  <div class="big-aside">
    <i class="fas fa-cog i-show big-i"></i><i class="fas fa-cog i-show small-i"></i>
    {{--
    <h3>@lang('website.personal_account')</h3>
    --}}
    <ul class="menu-dashboard">
    @if($check > 0)
      <li>
        <a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/{{$member_details[0]->slug}}"><i class="fas fa-user-alt"></i> @lang('website.profile')</a>
        </a>
      </li>
      {{--
      @if(\Request::route()->getName() == 'Authed_Member_Dashboard')
      <li>
        <a href="{{ route('Authed_Member_Dashboard') }}" class="active-dash"><i class="fas fa-chart-line"></i> @lang('website.statistics')</a>
        </a>
      </li>
      @else
      <li>
        <a href="{{ route('Authed_Member_Dashboard') }}"><i class="fas fa-chart-line"></i> @lang('website.statistics')</a>
        </a>
      </li>
      @endif
      --}}
      @if(\Request::route()->getName() == 'Authed_Member_Profile')
      <li>
        <a href="{{ route('Authed_Member_Profile') }}" class="active-dash"><i class="fas fa-user-cog"></i> @lang('website.account')</a>
        </a>
      </li>
      @else
      <li>
        <a href="{{ route('Authed_Member_Profile') }}"><i class="fas fa-user-cog"></i> @lang('website.account')</a>
        </a>
      </li>
      @endif
      
      @if(\Request::route()->getName() == 'Authed_Member_Products')
      <li>
        <a href="{{Route('Authed_Member_Products')}}" class="active-dash"><i class="fas fa-box-open"></i> @lang('website.products')</a>
      </li>
      @else
      <li>
        <a href="{{Route('Authed_Member_Products')}}"><i class="fas fa-box-open"></i> @lang('website.products')</a>
      </li>
      @endif
      {{--
      @if(\Request::route()->getName() == 'MemberExhibitionsList')
      <li>
        <a href="{{Route('MemberExhibitionsList')}}" class="active-dash"><i class="fas fa-th-list"></i> @lang('website.exhibitions')</a>
      </li>
      @else
      <li>
        <a href="{{Route('MemberExhibitionsList')}}"><i class="fas fa-th-list"></i> @lang('website.exhibitions')</a>
      </li>
      @endif
      --}}
      <li class="position-relative">
        <a href="{{route('ListMyExhibition')}}"><i class="fas fa-th-list"></i> @lang('website.my_exhibitions') <span class="badge badge-success">@lang('website.new')</span></a>
      </li>
      <li class="position-relative">
        <a><i class="fas fa-gavel"></i> @lang('website.auctions') <span class="badge badge-danger">@lang('website.soon')</span></a>
      </li>
      <li class="position-relative">
        <a><i class="far fa-envelope-open"></i> @lang('website.tenders') <span class="badge badge-danger">@lang('website.soon')</span></a>
      </li>
      <!-- <li>
        <a href="#"><i class="fas fa-align-left"></i> Services</a>
      </li> -->
        <li class="position-relative">
        @if(\Request::route()->getName() == 'AuthedMemberMessages')
          @if($NewMessagesCount > 0)
          <a href="{{ route('AuthedMemberMessages') }}"><i class="fas fa-envelope"></i> <span class="text-danger">@lang('website.messages')</span> </a> <div class="alert-dash">{{$NewMessagesCount}}</div>
          @else
          <a href="{{ route('AuthedMemberMessages') }}"><i class="fas fa-envelope"></i> <span class="text-danger">@lang('website.messages')</span> </a> 
          @endif
        @else
          @if($NewMessagesCount > 0)
          <a href="{{ route('AuthedMemberMessages') }}"><i class="fas fa-envelope"></i> @lang('website.messages') </a> <div class="alert-dash">{{$NewMessagesCount}}</div>
          @else
          <a href="{{ route('AuthedMemberMessages') }}"><i class="fas fa-envelope"></i> @lang('website.messages') </a> 
          @endif
        @endif
        </li>
         
        <li class="position-relative">
        @if(\Request::route()->getName() == 'Authed_Member_Wallet')
          @if(Auth::user()->wallet > 0)
          <a href="{{ route('Authed_Member_Wallet') }}"><i class="fas fa-dollar-sign"></i> <span class="text-danger">@lang('website.wallet')</span> </a> <div class="alert-dash">{{Auth::user()->wallet}}</div>
          @else
          <a href="{{ route('Authed_Member_Wallet') }}"><i class="fas fa-dollar-sign"></i> <span class="text-danger">@lang('website.wallet')</span> </a> 
          @endif
        @else
          @if(Auth::user()->wallet > 0)
          <a href="{{ route('Authed_Member_Wallet') }}"><i class="fas fa-dollar-sign"></i> @lang('website.wallet') </a> <div class="alert-dash">{{Auth::user()->wallet}}</div>
          @else
          <a href="{{ route('Authed_Member_Wallet') }}"><i class="fas fa-dollar-sign"></i> @lang('website.wallet') </a> 
          @endif
        @endif
        </li>



        



    @else



     @if(\Request::route()->getName() == 'Authed_Member_Profile')
      <li>
        <a href="{{ route('Authed_Member_Profile') }}" class="active-dash"><i class="fas fa-user-alt"></i> @lang('website.profile')</a>
        </a>
      </li>
      @else
      <li>
        <a href="{{ route('Authed_Member_Profile') }}"><i class="fas fa-user-alt"></i> @lang('website.profile')</a>
        </a>
      </li>
      @endif
      {{--
      <li class="position-relative">
      @if(\Request::route()->getName() == 'Authed_Member_Wallet')
        @if(Auth::user()->wallet > 0)
        <a href="{{ route('Authed_Member_Wallet') }}"><i class="fas fa-dollar-sign"></i> <span class="text-danger">@lang('website.wallet')</span> </a> <div class="alert-dash">{{Auth::user()->wallet}}</div>
        @else
        <a href="{{ route('Authed_Member_Wallet') }}"><i class="fas fa-dollar-sign"></i> <span class="text-danger">@lang('website.wallet')</span> </a> 
        @endif
      @else
        @if(Auth::user()->wallet > 0)
        <a href="{{ route('Authed_Member_Wallet') }}"><i class="fas fa-dollar-sign"></i> @lang('website.wallet') </a> <div class="alert-dash">{{Auth::user()->wallet}}</div>
        @else
        <a href="{{ route('Authed_Member_Wallet') }}"><i class="fas fa-dollar-sign"></i> @lang('website.wallet') </a> 
        @endif
      @endif
      </li>
      --}}
    @endif
    </ul>
  </div>
</aside>
   