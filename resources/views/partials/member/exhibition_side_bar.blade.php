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
   