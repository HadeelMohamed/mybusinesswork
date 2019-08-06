@extends('layouts.website')
@section('title','Home')
@section('content')
<br><br><br><br>
<!--...........................five sec...................-->
<section class="sec-services">
  <div class="container" style="    padding-top: 30px;
">
    <h4>Terms And Conditions</h4>
    <h5>THE USER AGREES THAT THE USE OF THIS WEBSITE (<a href="{{url('/')}}">www.mybusinessme.com</a>) IS SUBJECT TO THE TERMS AND CONDITIONS OF USE SET OUT BELOW. BY USING THIS SITE THE USER HAS AGREED TO OBSERVE ALL TERMS & CONDITIONS OF USE.</h5>
<br>
    <h4>Definitions</h4>
    <h5>"website owner" and/or " mybusiness",this website" means <a href="{{url('/')}}"> https:// www.mybusinessme.com</a> and all subpages there of excluding links to external sites "user" means any person accessing any part of this website or receiving our daily tender email notifications</h5>
<br>
    <h4>Use of the site</h4>
    <h5>Mybusiness reserves the right to amend these terms and conditions at any time. Users remain at all times responsible for ensuring that they are aware of the amended terms & conditions of use and continued use of the website constitutes the users' acceptance.</h5>
<br>
    <!-- <h4>Terms And Conditions</h4> -->
    <h5>The information contained in this website is intended, solely to provide and hold Online exhibitions, Online auctions, Online Tenders notification services for the personal use of the user or enterprise, who accepts full responsibility for its use.</h5>
<br>
    <!-- <h4>Terms And Conditions</h4> -->
    <h5>Subscription to the Mybusiness website (www.Mybusinessme.com) shall constitute one user license. This means that only one user has access to one service per subscription purchased. Access to tender details is provided by means of a username and password, which may not be given out to others for use. Users are allowed to access the website to view, copy and download the information and documents from the website.</h5>
<br>
    <!-- <h4>Terms And Conditions</h4> -->
    <h5>All information supplied by Mybusiness is subject to copyright and shall not be reproduced, copied, disclosed, provided or resold in either its original form or in any remixed form to any person other than the user.</h5>
<br>
    <!-- <h4>Terms And Conditions</h4> -->
    <!-- <h5>THE USER AGREES THAT THE USE OF THIS WEBSITE (<a href="{{url('/')}}">www.mybusinessme.com</a>) IS SUBJECT TO THE TERMS AND CONDITIONS OF USE SET OUT BELOW. BY USING THIS SITE THE USER HAS AGREED TO OBSERVE ALL TERMS & CONDITIONS OF USE.</h5> -->

    <!-- <h4>Terms And Conditions</h4> -->
    <h5>All subscriptions are payable by the Subscriber in accordance with the terms shown here in. Subscription payments are not refundable.</h5>
<br>
    <h5>The user shall be liable for the monthly or annual subscription fee which is payable in advance. Subscription fees shall be charged from the date of confirmation.</h5>
<br>
 <h5>Mybusiness reserves the right to terminate this agreement and cancel any subscription without notice for which a payment or deal has not been received by the due date.</h5>
<br>
 <h5>Mybusiness reserves the right to withdraw this service without notice.
The user shall subscribe to Mybusiness for the period stated and shall continue there after indefinitely unless it is terminated by way of 15 days written notice by the Subscriber.</h5>
<br>
<h5>Mybusiness is not responsible for any error or inaccuracy in advertising, incorrect links or sponsorship material.</h5>
<br>
<h5>Mybusiness takes no responsibility for any communication or deal happens between buyer/seller.</h5>


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