@if(isset($exhibitor_details))
	<h2 class="h3-dash">@lang('website.hello'), <strong>{{$exhibitor_details->exhibitor_name}}</strong></h2>
@else
	<h2 class="h3-dash">@lang('website.hello'), <strong>{{Auth::user()->email}}</strong></h2>
@endif