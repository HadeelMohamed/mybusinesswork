@extends('layouts.website')
@section('title','Home')
@section('content')
  
<div class="profile-company  blogs" style="background-image:url({{asset('website/images/slider-1.jpg')}}">


@include('partials.member.alerts')

<div class="about-details">
<div class="container">
<h5 class="h5-profil-2">Welcome to our Business</h5>

<h1 class="h1-about">World <strong>bussiness</strong></h1>
<h5 class="h5-profil">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris dapibus ex sed eros molestie blandit. Fusce sem enim, commodo sit amet diam pharetr.</h5>
</div>
</div>
    
<div class="overlay-profile"></div>
<div class="bubble-bg"></div>
</div>
      


     

      <!--...........................section location...................-->
      <div class="section-location" >
      
      <div class="container">
      <div class="row">
      <div class="col-lg-6">
      <h2 class="e-mail">Contact Us</h2>
      <p class="big-size-p">We would love to hear from you. Whether you want more information on our classes or want to attend any events that we hold, just give us a quick call.</p>

</div>
<div class="col-lg-3 col-sm-6">
<div class="position-relative">
<i class="fas fa-envelope icon-contact"></i>
<div class="div-e-mail">
<h4 >E-mail</h4>
<p class="big-size-p p-email">hello@website.com</p>

<p class="big-size-p p-email">support@website.com</p>
</div>
</div>
</div>




<div class="col-lg-3 col-sm-6">
<div class="position-relative">
<i class="fas fa-link icon-contact"></i>
<div class="div-e-mail">
<h4>Social</h4>
<ul class="social-media">
       
       <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
       <li><a href="#"><i class="fab fa-twitter"></i></a></li>
       <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
       <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
       <li><a href="#"><i class="fab fa-snapchat"></i></a></li>
       <li><a href="#"><i class="fab fa-youtube"></i></a></li>

       </ul>
</div>
</div>
</div>


<div class="main-contact">
<div class="container-fluid">
<h4 class="h2-contact">@lang('website.Send_Message')</h4>
<form class="form" method="post" action="{{route('ContactUsPost')}}">
  @csrf
<div class="form-group row">

<div class="col-lg-12">
<p>@lang('website.name')</p>
<input class="input-contact" placeholder="" required="" name="name"></div>

</div>


<div class="form-group row">
<div class="col-lg-6">
<p>@lang('website.email')</p>

<input class="input-contact" placeholder="" required="" type="email" name="email"></div>

<div class="col-lg-6">
<p>@lang('website.phone')</p>

<input class="input-contact" placeholder="" required="" name="phone"></div>

</div>

<div class="form-group row">

<div class="col-lg-12">
<p>@lang('website.message')</p>

<textarea class="input-contact textarea-contact" placeholder="" required="" name="message"></textarea></div>

</div>

<div class="text-center">
<button class="btn btn-message">Send</button>
</form>

</div>

</div>

</div>




</div>
</div>

      
      </div>

      
      
      @include('partials.website.footer')

		<script type="text/javascript">
			$(function() {
			
				$(' #da-thumbs > li ').each( function() { $(this).hoverdir(); } );

			});

		</script>


@endsection