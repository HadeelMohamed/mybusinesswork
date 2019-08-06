@if(isset($member_details))
	<h2 class="h3-dash">@lang('website.hello'), <strong>{{$member_details->member_name}}</strong></h2>
@else
	<h2 class="h3-dash">@lang('website.hello'), <strong>{{Auth::user()->email}}</strong></h2>
@endif