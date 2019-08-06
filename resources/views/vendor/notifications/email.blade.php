@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
 {{ $greeting }}
@else
@if ($level === 'error')
 @lang('Whoops!')
@else
 @lang('website.hey') : @if(isset(auth::user()->id)) {{auth::user()->email}} @endif
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
{{--@lang('website.regards'),--}}<br>{{ config('app.name') }}<br> @lang('website.email_sent_by_mybusiness')
@endif

{{-- Subcopy --}}
@isset($actionText)
{{--
@component('mail::subcopy')
@lang(
    "website.if_you_received_this_email_by_mistake".
    ': [:actionURL](:actionURL)',
    [
        'actionText' => $actionText,
        'actionURL' => $actionUrl,
    ]
)
@endcomponent
--}}
@endisset
@endcomponent
