@extends('layouts.website')
@section('title','Home')
@section('content')
<br><br><br><br>
<!--...........................five sec...................-->
<section class="sec-services">
  <div class="container">
    <h4>Status and Amendments</h4>
    <h5>1-This Privacy Policy forms part of the Terms and Conditions of Use of this website. If you do not agree with this Policy, then you may not use this website.</h5>
    <h5>2-Mybusiness may at its sole discretion, amend this policy from time to time at which time the amended policy will immediately come into effect in respect of continued usage of this website.</h5>
<br>
    <h4>Collection of personal data</h4>
    <h5>3.  The My business website is strongly committed to protecting the privacy of it’s users.</h5>
    <h5>4.  Information collected about users through their use of this website is the property of My business.</h5>
    <h5>5.  My business does not use or disclose information about your individual visits or information that you may give us such as your name, address, email address or telephone number, to any outside companies.</h5>
<br>
    <h4>Links to other web sites</h4>
    <h5>6.  We have no control over and accept no responsibility for the privacy practices of any third party sites to which hyperlinks may have been provided and we strongly recommend that you review the privacy policy of any site you visit before using it further.</h5>
    <h5>7.  While reasonable measures are taken to ensure the security and integrity of information submitted to this site, this website can not under any circumstances be held liable for any loss or other damage sustained by a user or users as a result of the intentional or accidental release of information by an employee of My business or any third party.</h5>
    <h5>8.  Users and/or subscribers are prohibited from releasing their username and/or password to any other person.</h5>
<br>
    <h4>Cookies </h4>
    <h5>By continuing your navigation on our website, you accept the data privacy policy of the website as well as the use of cookies to secure your connection, facilitate your navigation, offer services and offers adapted and make visits statistic.</h5>



  </div>
</section>

<style type="text/css">

	.card-header{
		padding: 7x;
		cursor: pointer;
	}
	.h2-faq{
		font-size: 20px;
		margin-bottom: 0px;
	}
	.ul-faq, .ul-faq2{
		padding: 10px;
	}
.ul-faq li{
	list-style: circle;

}

.ul-faq2 li{
	list-style: decimal;

}
</style>






   







     <!--  -->
   </div>
</section>





<!-- scripts -->
<!-- Optional JavaScript -->
<!-- Optional JavaScript -->
<!-- social -->
<!-- search and count and bubbles pages -->
<!-- <script src="{{asset('website/js/plugins.js')}}" ></script>
   <script src="{{asset('website/js/script.js')}}" ></script> -->
@include('partials.website.footer')
<script src="{{asset('website/js/slider-blog.js')}}"></script>
<script src="{{asset('website/js/star-rating.js')}}" type="text/javascript"></script>
<script src="{{asset('website/js/jquery.liMarquee.js')}}"></script>
<script src="{{asset('website/js/jquery.rotator.js')}}"></script>
<script>
   $('.rb-rating').rating({
   'showCaption': true,
   'stars': '5',
   'min': '0',
   'max': '3',
   'step': '1',
   'size': 'xs',
   });
</script>
<script>
   $(window).load(function() { 
   
   /* basic - default settings */
   $('.str1').liMarquee();
   $('.str3').liMarquee({
	   direction: 'left',  
	   loop:-1,      
	   scrolldelay: 0,   
	   scrollamount:50,  
	   circular: true,   
	   drag: true      
   });
   
	$('.str4').liMarquee({
		direction: 'left',  
		loop:-1,      
		scrolldelay: 0,   
		scrollamount:50,  
		circular: true,   
		drag: true      
	});
   });
   
</script>
<script>
   jQuery(document).ready(function() {
   	jQuery(".rotate").rotator();
   });
</script>
@endsection