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
<h1>What is My Business?</h1>
<p class="p-about">MyBusiness is the first electronic platform in the MENA region with a 
European reference aims to help (individuals and companies) in different 
(business sectors) to provide their products, services and spread 
internationally, through many innovative features and services, starting 
with the creation of a Web page for your activity. Whether (individual 
or company) and whether you are offering (a product or a service) then 
listing your business in the Mybusiness business directory so it will 
bring visitors and target customers to your business from all over the 
world through new and innovative features and services.
</p>
</div>
</div>
<div class="col-lg-6">
  <img src="{{asset('website/images/ser2.jpg')}}" width="100%"  alt=""> </div>

</div>

<div class="text-center">
<h3 class="h3-about-2">@lang('website.faqs')</h3>
<div class="line-sec back-red"></div>
<br>
</div>
<div class="accordion" id="accordionExample">
  <div class="card border-card" >
    <div class="card-header back-accordion" id="headingOne">
      <h2 class="head-accordion"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          How much is MyBusiness Membership fee?
           <div class="icon-accordion"><i class="fas fa-minus"></i></div>
      </h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        Membership on MyBusiness is an annual membership and requires payment 
every 365 days to renew your membership.

      </div>
      <table class="table table-bordered">

      <tr>
          <th class="">Annual Membership</th>
          <th class=""><span class="title_table">10$</span><span class="free_style"> Free NOW</span></th>
      </tr>
      </table>
    </div>
  </div>
  
  <div class="card border-card">
    <div class="card-header back-accordion" id="headingTwo">
      <h2 class="head-accordion" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          What do I get for MyBusiness membership?
          
          <div class="icon-accordion"><i class="fas fa-plus"></i></div>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample2">
      MyBusiness membership gives you plenty of features:-

      <div class="card-body">
      <ul class="ul-accodion">
      <li>If you (an individual or company) will get a trading account, your 
business becomes available 24 hours a day, 7 days a week, thus ensuring 
potential visitors and customers locally and internationally for your 
business.
</li>
            <li>Include the name, data and logo of your company & business in an 
international business directory to be surrounded by many companies in 
different fields locally and internationally to complement your business 
chain professionally and at the highest level.
</li>
      <li>Subscribe to Newsletters (to receive the latest news for different 
business areas).
</li>
      <li>Communicate easily with your current customers and support new 
customers instantly by communicating directly with them.
</li>
      <li>You will be able to share your trading account within MyBusiness 
website on all social media channels to reach the largest number of 
customers interested in your business.
</li>
<li>Communicate with all companies listed in MyBusiness directory, thus 
increasing the size of your business at the local and international 
level with ease and you are in your place.
</li>
<li>You will be able to interact within (Money and business forum) and thus 
increase your skills at the professional and personal level.
</li>
<li>Take advantage of the world-wide professional marketing and publicity 
campaigns that MyBusiness is doing to make your business spread locally 
and internationally, thereby ensuring greater awareness of your brand.
</li>
<li>You will be able to show and publish your products and services at the 
local and international level to make it easy to reach the largest 
number of customers interested in your business and thus increase your 
sales volume.
</li>
<li>Use our Services (online exhibitions – Auctions online – Tenders 
online....).
</li>


      </ul>
      
      </div>
    </div>
  </div>
  
  
  
  
  
  
 <div class="card border-card">
    <div class="card-header back-accordion" id="headingThree">
      <h2 class="head-accordion" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          What’s MyBusiness Business’s Directoy?
          <div class="icon-accordion"><i class="fas fa-plus"></i></div>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample3">
      <div class="card-body">
    <div class="row">
    <div class="col-lg-12">MyBusiness's Business Directory is the most effective feature that is 
especially offered to your business, where your business is listed 
according to your business field and showing your business data and 
media, including social media channels (Facebook-Instagram...) and this 
will ensure your business appears to the largest number of customers 
Interested in your products and services, your business will be easily 
visible to all potential business partners interested in opening new 
markets, and communicating with you will be easy.

</div>

    </div>
      
      </div>
    </div>
  </div> 


   <div class="card border-card">
    <div class="card-header back-accordion" id="headingFour">
      <h2 class="head-accordion" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
         What are online exhibitions?
          <div class="icon-accordion"><i class="fas fa-plus"></i></div>
      </h2>
    </div>
    <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample3">
      <div class="card-body">
    <div class="row">
    <div class="col-lg-12">If you are an individual or company – sell a product or offer a service
Exclusive and for the first time you can participate and book a booth 
for your business or company at a local or international trade 
Exhibition, where you are in your place just using the internet, and get 
the experience of exhibitions and benefit from it gives you a much lower 
cost, you can take advantage of all the following benefits and 
features:-


  </div>
  <div class="card-body">
      <ul class="ul-accodion">
      <li>Offering goods and services to the largest segment of the target 
customers.
</li>
      <li>Benefit from the professional marketing and promotion performed by 
MyBusiness for the exhibition.
</li>
      <li>Identify a large base of suppliers.</li>
      <li>Identify new and market trends.</li>
      <li>Promotion and promotion of the trademark.</li>
      <li>Identify new technology in the market.</li>
      <li>Study of competitors.</li>
      <li>Make a database for customers and those interested in the market.</li>
      <li>International exhibitions are a favorable environment for investment 
opportunities, marketing and successful transactions.
</li>
      <li>Access to new markets.</li>

      </ul>
      
      </div> 

    </div>
      
      </div>
    </div>
  </div> 


  <div class="card border-card">
    <div class="card-header back-accordion" id="headingFive">
      <h2 class="head-accordion" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFour">
          What are the steps to participate in the exhibition?
          <div class="icon-accordion"><i class="fas fa-plus"></i></div>
      </h2>
    </div>
    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample3">
      <div class="card-body">
    <div class="row">
    <div class="col-lg-12">You can subscribe to one of the local or national exhibitions and choose 
to be (exhibitor or sponsor) according to the nature and scope of your 
work and services with the following steps:-

</div>
    <br>
    <div class="col-lg-12">Access the Exhibitions page and find available exhibitions according to 
your business sector or any other business field.
</div>
<br>
  <div class="col-lg-12">Once you enter the Exhibition page, you will see the full exhibition 
details:-

</div>
<br>
<div class="col-lg-12">(Exhibition name – Exhibition area – Start date – Expiry date – 
exhibition information – companies and exhibitors who have already 
booked a suite – sponsors – Number of products and services added to the 
show).
</div>
<br>




    </div>
      
      </div>
    </div>
  </div> 



  <div class="card border-card">
    <div class="card-header back-accordion" id="headingSix">
      <h2 class="head-accordion" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseFour">
What is the cost of MyBusiness services?
          <div class="icon-accordion"><i class="fas fa-plus"></i></div>
      </h2>
    </div>
    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample3">
      <div class="card-body">
    <div class="row">
    <style type="text/css">
      .title_table {
  
} 

.title_table { 
    text-decoration-line: line-through;
    color: red;
}
.free_style {
  color: green;
}
   </style>
      <table class="table table-bordered">
        <tr>
          <th class="">Service</th>
          <th class="">Cost</th>
      </tr>
        <tr>
          <th class="">Online exhibition</th>
          <th class=""><span class="title_table">100$</span><span class="free_style"> FREE NOW</span></th>
      </tr>
      <tr>
          <th class="">Online auction</th>
          <th class=""><span class="title_table">20$</span><span class="free_style">FREE NOW</span></th>
      </tr>
      </table>


    </div>
      
      </div>
    </div>
  </div> 



  <div class="card border-card">
    <div class="card-header back-accordion" id="headingSeven">
      <h2 class="head-accordion" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSix">
What are the features of the online exhibitions?
          <div class="icon-accordion"><i class="fas fa-plus"></i></div>
      </h2>
    </div>
    <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample3">
      <div class="card-body">
    <h6><b>Whether you are an individual or a company – whether you are offering a 
service or selling a product, now you can present your services and 
products in the largest local and international exhibitions from your 
place and thus:
</b></h6>
      <div class="card-body">
      <ul class="ul-accodion">
      <li>Provide employment and expenses for exhibitors as well as transport, 
rent the land area and decoration of the exhibition and preserve the 
products instead of being destroyed for any reason.
Easy to participate in the exhibition without the hassle of permits, 
stays, travel obligations, shipping of goods and the work of billboards.
The exhibitor can reach more than one country and more visitors and give 
him access to new markets.
</li>
            <li>Communicate easily with your current customers and support new 
customers instantly by communicating directly with them.
</li>
      <li>You will be able to share your booth within the exhibition on all 
social media channels to reach the largest number of customers 
interested in your field.
</li>
      <li>When choosing to participate as an exhibitor or sponsor you will see a 
page to register and book your booth inside the exhibition, within the 
registration page you will be able to place your business name and all 
details of your company or business that will be shown to all visitors 
within the exhibition.
</li>
<li>You will be able to show and publish your products and services at the 
local and international level within the exhibition so that reaching the 
largest number of customers interested in your business is easy and you 
are in your place and thus increase your sales volume.
</li>
<li>Include the name, data and logo of your company or your own business in 
the exhibition to become surrounded by many companies in different 
fields locally and internationally to complement your business series 
professionally and at the highest level.
</li>
<li>You will be able to identify a large base of suppliers and new in your 
field and market trends.
</li>
<li>Promotion and promotion of the trademark</li>
<li>Identify new technology in the market.</li>
<li>Study of competitors.</li>
<li>Make a database for customers and those interested in the market.</li>
<li>International exhibitions are a favorable environment for investment 
opportunities, marketing and successful transactions.
</li>
<li>Access to new markets.</li>


      </ul>
      
      </div>
  


      </div>
    </div>
  </div>



   <div class="card border-card">
    <div class="card-header back-accordion" id="headingEight">
      <h2 class="head-accordion" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseSeven">
How to register?
          <div class="icon-accordion"><i class="fas fa-plus"></i></div>
      </h2>
    </div>
    <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample3">
      <div class="card-body">
    <h6><b>How to register?</b></h6>
      <div class="card-body">
      <ul class="ul-accodion">
      <li>Login to my Business website www.mybusinessme.com</li>
            <li>Enter your email address.</li>
      <li>Enter your password.</li>
      You will receive a message confirming your account, click on the 
confirmation link


      </ul>
        <div class="col-6">
         <iframe width="100%" height="315" src="{{asset('website/videos/REG.mp4')}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 
        </div>  
        
      </div>
  


      </div>
    </div>
  </div>


  <div class="card border-card">
    <div class="card-header back-accordion" id="headingNine">
      <h2 class="head-accordion" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseEight">
How to create a business account for your company?
          <div class="icon-accordion"><i class="fas fa-plus"></i></div>
      </h2>
    </div>
    <div id="collapseNine" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample3">
      <div class="card-body">
      <ul class="ul-accodion">
      <li>Login to your account</li>
      <li>Select account Type</li>
      <li>Enter your business name/company</li>
      <li>Select Country</li>
      <li>Choose your business sector</li>
      <li>Enter your company or business information</li>
      <li>Enter information about your services</li>
      <li>Add your Logo</li>
      <li>add a background</li>
      <li>Click on Contact us to enter:</li>
      <li>Address</li>
      <li>Phone</li>
      <li>Email</li>
      <li>Click on the social media links and then add your links or your work on social networking sites</li>
      <li>Then click on Update.</li>
      </ul>
      
      </div>
      
      <div class="col-6">
          <iframe width="100%" height="315" src="{{asset('website/videos/BuildAcc.mp4')}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 
        </div>

      </div>
    </div>
  </div>
  
 
  
  





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