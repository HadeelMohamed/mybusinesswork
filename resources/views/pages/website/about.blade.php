@extends('layouts.website')
@section('title','Home')
@section('content')

<link href="{{asset('website/css/about-us.css')}}" media="all" rel="stylesheet" type="text/css"/>

  <style type="text/css">
    .float-right-menu{
      float: left;
    }
    .float-right-menu:lang(ar){
      float: right;
    }
     .float-left-menu{
      float: right;
    }
     .float-left-menu:lang(ar){
      float: left;
    }
    .float-left-menu nav ul li ul{
      min-width: 40px;
    }
     .float-left-menu nav ul li ul li {
      margin-right: 0px  !important;
      margin-left: 0px  !important;
    }

    .float-left-menu nav ul li ul li a{
      text-align: center !important;
    }
  </style>
<br><br><br><br><br><br><br><br>

                        <!-- navigation  end -->
</div>

<div class="padding-div-menu" ></div>


<div class="padding-for-page">
<div class="container">
<div class="row">
<div class="col-lg-6">
<div class="about-business">
<h1>{{$all_faqs->title}}</h1>
<p class="p-about">  
{!!$all_faqs->content!!}
</p>
</div>
</div>
<div class="col-lg-6">
  <img src="{{asset('images/en/faqs')}}/{{$all_faqs->image}}" width="100%"  alt=""> </div>

</div>

<div class="text-center">
<h3 class="h3-about-2">@lang('website.faqs')</h3>
<div class="line-sec back-red"></div>
<br>
</div>
<div class="accordion" id="accordionExample">
@foreach($all_faqs->question as $question)

  <div class="card border-card" >
    <div class="card-header back-accordion" id="heading{{$question->id}}">
      <h2 class="head-accordion"  data-toggle="collapse" data-target="#collapse{{$question->id}}" aria-expanded="true" aria-controls="collapse{{$question->id}}">
          {{$question->title}}
           <div class="icon-accordion"><i class="fas fa-plus"></i></div>
      </h2>
    </div>

    <div id="collapse{{$question->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
   {!!str_limit($question->content,50) !!}

      </div>

    </div>
  </div>

  @endforeach
  

  
  
  
  
  
  




















  </div>
  
  <!-- <div class="card-body">
      <ul class="ul-accodion">
      <li>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute,</li>
            <li>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute,</li>
      <li>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute,</li>
      <li>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute,</li>

      </ul>
      
      </div> -->
  
 <!-- <div class="col-lg-6">

   <iframe width="100%" height="315" src="{{asset('videos/BuildAcc.mp4')}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 

</div>-->

  
  





<form action="{{route('our_messages_post')}}" method="post">
  @csrf
 <div class="text-center">
<h3 class="h3-about-2">@lang('website.do_you_have_question')</h3>
<div class="line-sec back-red"></div>
</div>

<div class="form-group row">

<div class="col-lg-12">
<p class="p-ticked">@lang('website.name')</p>
<input class="input-contact" placeholder="" required="" name="name"></div>

</div>


<div class="form-group row">
<div class="col-lg-6">
<p class="p-ticked">@lang('website.email')</p>

<input class="input-contact" placeholder="" required="" type="email" name="email"></div>

<div class="col-lg-6">
<p class="p-ticked">@lang('website.phone')</p>

<input class="input-contact" placeholder="" name="tel"></div>

</div>

<div class="form-group row">
<div class="col-lg-12">
<p class="p-ticked">@lang('website.subject')</p>
<input class="input-contact" placeholder="" required="" name="subject">
</div>
</div>

<div class="form-group row">

<div class="col-lg-12">
<p class="p-ticked">@lang('website.message')</p>

<textarea class="input-contact textarea-contact" placeholder="" required="" name="message"></textarea></div>

</div>

<div class="text-center">
<button class="btn btn-message">@lang('website.send')</button>


</div>




</div>

</div>      
</form>

      
  
      
      
      
     
   
      
      
      
      
      
      
      
      









<!--...........................social...................-->




<!-- Modal -->
<div class="modal fade login-btn"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-width modal-dialog-centered" role="document">
    <div class="modal-content">
      
      <div class="container-fluid">
      <div class="row">
      <div class="col-sm-4">
        <div class="row"><div><img src="images/banner-login.jpg" width="100%" class="banner-login" ></div></div></div>
           <div class="col-sm-8">
           
           <h3 class="h3-login">Login With My bussines</h3>
           <div class="line-sec back-red"></div>
           
           
           
           <form style="margin-top:20px;">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  
  <div class="container-fluid">
  <div class="row">
  <div class="col-6">
  <div class="custom-control custom-checkbox my-1 mr-sm-2">
    <input type="checkbox" class="custom-control-input" id="customControlInline">
    <label class="custom-control-label" for="customControlInline">Remember Me</label>
  </div>
  </div>
    <div class="col-6 text-right">
   <a href="#" class="forget-pass"> Forget Your Passowrd ?!</a>
</div>
  </div>
  </div>
  
  <div class="text-right">
  <button type="submit" class="btn btn-dark btn-login-su">login</button>
  </div>
</form>

<div class="register">Do not have Account yet <a href="#" class="register-link">Register now</a></div>
           
           
           </div>
           
           
           
           
 
      
      </div>
      
      </div>
      
      
    <button class="btn-close-pop" data-dismiss="modal"><i class="fas fa-times"></i></button>  
     
    </div>
  </div>
</div>

<!-- message -->

<div class="modal fade message-pop"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-width modal-dialog-centered" role="document">
    <div class="modal-content">
      
      <div class="container-fluid">
      <div class="row">
      <div class="col-sm-4">
        <div class="row"><div><img src="images/banner-login.jpg" width="100%" class="banner-login" ></div></div></div>
           <div class="col-sm-8">
           
           <h3 class="h3-login">Welcome ., Sent your Message</h3>
           <div class="line-sec back-red"></div>
           
           
           
           <form style="margin-top:20px;">
   <div class="form-group">
    <label for="exampleInputEmail1">Title message</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Message</label>
    <textarea type="" class="form-control" id="exampleInputPassword1" ></textarea>
  </div>
  
  
  
  <div class="text-right">
  <button type="submit" class="btn btn-dark btn-login-su">Send</button>
  </div>
</form>

           
           
           </div>
           
           
           
           
 
      
      </div>
      
      </div>
      
      
    <button class="btn-close-pop" data-dismiss="modal"><i class="fas fa-times"></i></button>  
     
    </div>
  </div>
</div>




@include('partials.website.footer')
<script src="{{asset('website/js/paginga.jquery.js')}}" ></script>
<script src="{{asset('website/js/plugins.js')}}" ></script>
<script src="{{asset('website/js/script.js')}}" ></script>
<script src="{{asset('website/js/popper.min.js')}}" ></script>
<script src="{{asset('website/js/bootstrap.min.js')}}" ></script>
<!-- social -->
<script src="{{asset('website/js/myjs.js')}}" ></script>
 



@endsection