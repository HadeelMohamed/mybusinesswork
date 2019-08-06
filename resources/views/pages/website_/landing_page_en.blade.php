@extends('layouts.website')
@section('title','Register')
@section('content')
 <style type="text/css">
.static_height{
  height: 120px;
}
@media (max-width:1024px){
  .static_height{
  height: 40px;
}
}
</style>
<link rel="stylesheet" href="{{asset('website/css/register-page.css')}}">
<!--...........................profile-head...................-->
  <div class="big-dash">
    <div class="container">
      <div class="static_height"></div>
<!--         <h1>@lang('website.register_now')</h1>
 -->      



<div class="main-text-register">
<h1 class="h1-register">FOR LIMITED TIME </h1>
<h2 class="h1-register2">(Free Membership + 80$ Credit)</h2>
</div>


<p class="p-head-register">MyBusiness is the first and biggest website in MENA aims to help Individuals and Companies in all business sectors to present their products & services into the whole world beside giving them a huge chance to spread into the world with their BRAND, through many features and benefits by providing Innovative online services.
Freelancer Or Company – Individual Or Corporate, Either you provide (Item or Service).
</p>

<a id ="createBtnScrol" class="btn btn-register-btn btn-scroll" style="color: #fff;"><b>Create Your Business NOW</b></a>
<div class="sec-register">

<div class="container">
<div class="row">


<div class="col-md-5">

<div class="back-gray">
<h5 class="h5-title-register">Who can get benefit?</h5>
MyBusiness woeks to create online commercial trade world based on Equal Opportunities between (Companies & Individuals).
<ul class="ul-register h5-title-register">
<li>All Kinds of SME’s.</li>
<li>All Freelancers.</li>
<li>All Companies & Corporate sizes.</li>
</ul>
</div>


<div class="back-gray">
<ul class="ul-register h5-title-register">
<li>Travel The World With Your Business</li>
<li>Increase Your Brand Awareness</li>
<li>Promote your Products & Services</li>
<li>Global Business Network</li>

</ul>

</div>


</div>

<div  class="col-md-7" id="sec-scroll">

<h2 class="h2-register">Showcase your Business to the World</h2>
<form method="POST" action="{{ route('register') }}">
@csrf
 <div class="form-group">
    <label for="email">@lang('website.email')</label>
    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus aria-describedby="emailHelp" placeholder="">
    @if ($errors->has('email'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('email') }}</strong>
      </span>
    @endif
  </div>


  <div class="form-group">
    <label for="password">@lang('website.password')</label>
    <input name="password" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" aria-describedby="emailHelp" placeholder="" required>
    @if ($errors->has('password'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('password') }}</strong>
      </span>
    @endif
  </div>
  <label for="password-confirm">@lang('website.confirm_password')</label>

                        <input name="password_confirmation" id="password_confirmation" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" aria-describedby="emailHelp" placeholder="" required>

<button class="btn btn-register-btn" type="submit"><b>START NOW</b></button>
</form>

</div>



<div class="container-fluid">
<div class="back-gray col-12">
<h5 class="h5-title-register">MyBusiness for companies & Individuals
</h5>
<p id="register_form"> 
</p>
<ul class="ul-register h5-title-register">
<li>Let The Whole World Feel Your Business.</li>
<li>Present your business Information and Speake out your Mission & Vision.</li>
<li>Showcase your products & services with complete details.</li>
<li>Show your contacts including social media channels.</li>
<li>Communicate with your customers instantly with inbox messages.</li>
<li>Use MyBusiness Services (Online Exhibition – Auction – Tenders …).</li>
<li>Listing your business in MyBusiness listing to be 24/7.</li>

</ul>

</div>
</div>

<!--  -->



</div>
</div>
</div>
</div>
</div>


<!--................three section...............-->



</div>











<div class="clear"></div>

@include('partials.website.footer')
<script>
$(document).ready(function(e) {

  var finddiv = $("#sec-scroll").offset().top;
   $(".btn-scroll").click(function() {
$("html, body").animate({
scrollTop: finddiv-60
}, "slow")
})
})
</script>

@endsection
