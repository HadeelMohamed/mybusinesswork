<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta name="google-site-verification" content="yMB0IghcLClVWm5GnkVY5i6LM0HCVc1gBGnA0QGAn-M" />
@yield('social')
<link rel="icon" href="{{asset('website/images/five.png')}}" >
<link rel="stylesheet" href="{{asset('website/css/bootstrap.min.css')}}" >
@if(LaravelLocalization::getCurrentLocale() == 'ar')
<link rel="stylesheet" href="{{asset('website/css/bootstrap-rtl.css')}}" >
@endif
<link rel="stylesheet" type="text/css" href="{{asset('website/css/fontawesome-all.css')}}">
<link rel="stylesheet" href="{{asset('website/css/main.css')}}">
<!-- <link href="{{asset('website/css/square_menu.css')}}" rel='stylesheet' type='text/css'> -->
<link rel="stylesheet" href="{{asset('website/css/btn-effect.css')}}">
<link rel="stylesheet" href="{{asset('website/css/social.css')}}">
<link rel="stylesheet" href="{{asset('website/css/menu.css')}}">
<link href="{{asset('website/css/resCarousel.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('website/css/star-rating.css')}}" media="all" rel="stylesheet" type="text/css"/>
<link href="{{asset('website/css/select.css')}}" media="all" rel="stylesheet" type="text/css"/>
<link href="{{asset('website/css/share.css')}}" media="all" rel="stylesheet" type="text/css"/>
<link href="{{asset('website/css/box-hover.css')}}" media="all" rel="stylesheet" type="text/css"/>
<link href="{{asset('website/css/dashboard.css')}}" media="all" rel="stylesheet" type="text/css"/>
<link href="{{asset('website/css/feature.css')}}" rel='stylesheet' type='text/css'>
<link href="{{asset('website/css/liMarquee.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('website/css/animate.css')}}" rel="stylesheet">
<link href="{{asset('website/css/rotator.css')}}" rel="stylesheet">
<link href="{{asset('website/css/slider-blog.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('website/css/demo.css?ver=3.4.0')}}">
<link href="{{asset('website/css/jquery.dataTables.css')}}" media="all" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="{{asset('website/css/zoom.css')}}">
<link rel="stylesheet" href="{{asset('website/css/push-menu.css')}}">
<link rel="stylesheet" href="{{asset('website/css/register.css')}}">
<link rel="stylesheet" href="{{asset('website/css/media.css')}}">
<link rel="stylesheet" href="{{asset('website/css/all.css')}}">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-130187758-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-130187758-3');
</script>



<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1791708710974315'); 
fbq('track', 'PageView');
</script>
<noscript>
<img height="1" width="1" 
src="https://www.facebook.com/tr?id=1791708710974315&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async 
src="https://www.googletagmanager.com/gtag/js?id=UA-139834049-1"></script>
<script>
   window.dataLayer = window.dataLayer || [];
   function gtag(){dataLayer.push(arguments);}
   gtag('js', new Date());

   gtag('config', 'UA-139834049-1');
</script>


<style>
	
header{
	display: none;
}

</style> 
<title>MyBussinessme</title>
</head>

