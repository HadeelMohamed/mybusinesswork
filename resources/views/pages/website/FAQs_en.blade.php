@extends('layouts.website')
@section('title','Home')
@section('content')
<!doctype html>
<link href="css/about-us.css" media="all" rel="stylesheet" type="text/css"/>



  <!--...........................menu...................-->
  
  
  

  <!--...........................menu...................-->
  
  <div class="small-items">

    
      
    <ul class="header-social float-right">
        <li><a href="https://www.facebook.com/mybusinessme.int"><i class="fab fa-facebook-f"></i></a></li>
        <li><a href="https://www.instagram.com/mybusinessme"><i class="fab fa-instagram"></i></a></li>
      </ul>
  </div>
  
<div class="big-menu">
  <a href="#" class="a-head"><img src="images/logo.png" class="logo-en"> <img src="images/logo-ar.png" class="logo-ar"></a>
 
<!--...........................menu item...................-->
  <div class="btn-resposive">
    <button class="toggle btn-res open-menu hc-nav-trigger hc-nav-1"> <i class="fas fa-bars"></i>  </button>
    <!-- <a class="btn-res" href="http://mybusinessme.com/ar/login"><i class="fas fa-user"></i></a> -->
    <!-- <button class="btn-res"  data-toggle="modal" data-target=".search-login"><i class="fas fa-search"></i></button> -->
  </div>
  <!--  navigation --> 
  <div class="nav-holder big-menu-items float-right-menu">
    <!--  -->
    <nav>
       <nav>
      <ul>
        <li><a href="#">Home</a></li>
        <!-- <li><a href="">Exhibitions</a></li> -->
        <li>
          <a href="#"><i class="ti-layout-sidebar-left"></i> Companies          </a>
          <form id="MemberProductForm" action="http://mybusinessme.com/en/Search/Companies" method="GET" style="display: none;">
            <input hidden="" name="account_type_id" value="0">
            <input hidden="" name="country_id" value="0">
            <input hidden="" name="category_id" value="0">
            <input hidden="" name="search">
          </form>
        </li>
        <li><a href="#">About</a></li>
        <li><a href="#">Locations</a></li>
        <li><a href="#" class="hvr-underline-from-center ">FAQ</a></li>
       
      </ul>
    </nav>
    </nav>
    <!--  -->
    
  </div>

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

   <div class="nav-holder big-menu-items float-left-menu">
    <nav>
      <ul>
                  <li><a class="hvr-underline-from-center" href="#">Login</a></li>
        <li><a class="hvr-underline-from-center" href="#">Reqister</a></li>
                       
        <li>
                                                        <a href="#">
              <img src="images/arabic_icon.png" width="20" height="20">
                AR
              <i class="fa fa-caret-down"></i>
            </a>
                   <ul>
                            <li>
                    <a rel="alternate" hreflang="en" href="#">
                      <img src="images/UK_icon.png" width="20" height="20"> EN
                    </a>
                   </li>
                            <li>
                   <a rel="alternate" hreflang="ar" href="#">
                      <img src="images/arabic_icon.png" width="20" height="20"> AR
                    </a>
                                                                                                                    </li>
                            <li>
                     <a rel="alternate" hreflang="fr" href="#">
                      <img src="images/france_icon.png" width="20" height="20"> FR
                    </a>
                                                                                  </li>
                            <li>
                      <a rel="alternate" hreflang="tr" href="#">
                      <img src="images/turkey_icon.png" width="20" height="20"> TR

                    </a>
                   </li>
                          </ul>  
       </li>
     </ul>
</nav>
</div>
                        <!-- navigation  end -->
</div>

<div class="padding-div-menu" ></div>


<div class="padding-for-page">
<div class="container">
<div class="row">
<div class="col-lg-6">
<div class="about-business">
<h1>My Business</h1>
<p class="p-about"> MyBusiness is the first and biggest website in MENA aims to help Individuals and Companies in all business sectors to present their products & services into the whole world beside giving them a huge chance to spread into the world with their BRAND, through many features and benefits by providing Innovative online services. Freelancer Or Company – Individual Or Corporate, Either you provide (Item or Service).

</p>
</div>
</div>
<div class="col-lg-6">
  <img src="images/ser2.jpg" width="100%"  alt=""> </div>

</div>

<div class="text-center">
<h3 class="h3-about-2">Featured Categories</h3>
<div class="line-sec back-red"></div>
</div>
<div class="accordion" id="accordionExample">
  <div class="card border-card" >
    <div class="card-header back-accordion" id="headingOne">
      <h2 class="head-accordion"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Collapsible Group Item #1
           <div class="icon-accordion"><i class="fas fa-minus"></i></div>
      </h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  
  <div class="card border-card">
    <div class="card-header back-accordion" id="headingTwo">
      <h2 class="head-accordion" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Collapsible Group Item #2
          
          <div class="icon-accordion"><i class="fas fa-plus"></i></div>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample2">
      <div class="card-body">
      <ul class="ul-accodion">
      <li>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute,</li>
            <li>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute,</li>
      <li>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute,</li>
      <li>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute,</li>

      </ul>
      
      </div>
    </div>
  </div>
  
  
  
  
  
  
 <div class="card border-card">
    <div class="card-header back-accordion" id="headingThree">
      <h2 class="head-accordion" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Collapsible Group Item #3
          
          <div class="icon-accordion"><i class="fas fa-plus"></i></div>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample3">
      <div class="card-body">
    <div class="row">
    <div class="col-lg-6"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</div>
<div class="col-lg-6">


<iframe width="100%" height="315" src="https://www.youtube.com/embed/jRcfE2xxSAw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
    </div>
      
      </div>
    </div>
  </div> 
  
  
  
  
  
  
  
  
</div>





<div class="text-center">
<h3 class="h3-about-2">Featured Categories</h3>
<div class="line-sec back-red"></div>
</div>

<div class="form-group row">

<div class="col-lg-12">
<p class="p-ticked">Name</p>
<input class="input-contact" placeholder=""></div>

</div>


<div class="form-group row">
<div class="col-lg-6">
<p class="p-ticked">E-mail</p>

<input class="input-contact" placeholder=""></div>

<div class="col-lg-6">
<p class="p-ticked">Telphone</p>

<input class="input-contact" placeholder=""></div>

</div>

<div class="form-group row">

<div class="col-lg-12">
<p class="p-ticked">Describtion</p>

<textarea class="input-contact textarea-contact" placeholder=""></textarea></div>

</div>

<div class="text-center">
<button class="btn btn-message">Send</button>


</div>




</div>

</div>     


      
  
      
      
      
     
   
      
      
      
      
      
      
      
      

<!--...........................footer...................-->


<footer class="position-relative">
<div class="brush-footer"></div>

<div class="container">
<div class="row">
<!--.........footer1..........-->
<div class="col-sm-3">

<h3 class="h3-footer">About Us</h3>

<p class="color-white p-footer text-justify">In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna. Etiam suscipit commodo gravida. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam.

</p>




</div>
<!--.........footer2..........-->


<div class="col-sm-3">

<h3 class="h3-footer">Hot News & trends</h3>
<!--.........news..........-->

<div class="row">
<div class="col-5"><img src="images/news-footer.jpg" class="news-footer"></div>
<div class="col-7">
<h6 class="h6-footer">Vivamus dapibus rutrum</h6>
<p class="p-news color-red">1 day ago</p>
</div>

</div>



<!--.........news..........-->

<div class="row">
<div class="col-5"><img src="images/news-footer2.jpg" class="news-footer"></div>
<div class="col-7">
<h6 class="h6-footer">Vivamus dapibus rutrum</h6>
<p class="p-news color-red">1 day ago</p>
</div>

</div>


<!--.........news..........-->

<div class="row">
<div class="col-5"><img src="images/news-footer3.jpg" class="news-footer"></div>
<div class="col-7">
<h6 class="h6-footer">Vivamus dapibus rutrum</h6>
<p class="p-news color-red">1 day ago</p>
</div>

</div>

<!--.........news..........-->



</div>

<!--.........footer3..........-->


<div class="col-sm-3 footer-link">
<h3 class="h3-footer">Main links</h3>


<ul>

<li><a href="#" class="hvr-underline-from-left">page Name</a></li>
<li><a href="#" class="hvr-underline-from-left">page Name</a></li>
<li><a href="#" class="hvr-underline-from-left">page Name</a></li>
<li><a href="#" class="hvr-underline-from-left">page Name</a></li>
<li><a href="#" class="hvr-underline-from-left">page Name</a></li>
<li><a href="#" class="hvr-underline-from-left">page Name</a></li>
<li><a href="#" class="hvr-underline-from-left">page Name</a></li>
<li><a href="#" class="hvr-underline-from-left">page Name</a></li><li><a href="#" class="hvr-underline-from-left">page Name</a></li>
<li><a href="#" class="hvr-underline-from-left">page Name</a></li>
<li><a href="#" class="hvr-underline-from-left">page Name</a></li>
<li><a href="#" class="hvr-underline-from-left">page Name</a></li>


</ul>

</div>





<!--.........footer4..........-->

<div class="col-sm-3">

<h3 class="h3-footer">Stay updated</h3>

<p class="color-white p-subc text-justify">Join over 10.500 people who receive bi-weekly
web marketing tips.
</p>



<div class="position-relative footer-margin">
<input class="form-control input-footer" placeholder="E-mail Address.......">
<button class="btn btn-subc">Supscribe</button>
</div>



<ul class="social-media">
       
       <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
       <li><a href="#"><i class="fab fa-twitter"></i></a></li>
       <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
       <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
       <li><a href="#"><i class="fab fa-snapchat"></i></a></li>
       <li><a href="#"><i class="fab fa-youtube"></i></a></li>

       </ul>

</div>



<!--.........language..........-->


</div>

<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">
<ul class="last-footer-links">
<li><a href="#" class="hvr-underline-from-center">Terms & Condition</a></li>
<li><a href="#" class="hvr-underline-from-center">Sitemap</a></li>
<li><a href="#" class="hvr-underline-from-center">Privacy Policy</a></li>
<li><a href="#" class="hvr-underline-from-center" style="border-right:0px; border-left:0px;">FAQ</a></li>

</ul>
<hr class="hr-footer">

<p class="p-coby-rights">© 2019 My Business. All rights reserved. powered by IBG</p>

<div class="text-center">
  <img src="images/logo-ibg.png" width="61" height="61" alt=""> </div>

</div>

</div>

</div>
</footer>








<!--...........................social...................-->
<div id='ss_menu'>
  <div><a href="https://www.facebook.com/gulf.erp.12" target="new" class="fab fa-facebook social_link"></a></div>
    <div><a href="https://www.facebook.com/gulf.erp.12" target="new" class="fab fa-twitter social_link"></a></div>
    <div><a href="https://www.facebook.com/gulf.erp.12" target="new" class="fab fa-instagram social_link"></a></div>
  <div><a href="https://www.instagram.com/gulfcloud/" target="new" class="fab fa-pinterest social_link"></a></div>
  <div class='menu'>
    <div class='share' id='ss_toggle' data-rot='180'>
      <div class='circle'></div>
      <div class='bar'></div>
    </div>
  </div>
</div>



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
<script src="{{asset('website/js/slider-blog.js')}}"></script>
<script src="{{asset('website/js/star-rating.js')}}" type="text/javascript"></script>
<script src="{{asset('website/js/jquery.liMarquee.js')}}"></script>
<script src="{{asset('website/js/jquery.rotator.js')}}"></script>
@endsection
{{--
@extends('layouts.website')
@section('title','Home')
@section('content')
<br><br><br><br>
<!--...........................five sec...................-->
<section class="sec-services">
   <div class="container">


<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
          <h2 class="collapsed h2-faq"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseTwo">
     
          What does my business do?

     
      </h2>

    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">


      <ul class="ul-faq">
      	<li>
      		We are the catalyst to refresh the commercial & manufacturer exchange in MENA region for every business sector, by presenting new & ingenuous services to reserve your business global visibility.
		</li>
      	

      </ul>

        <!-- <ul class="ul-faq2">
      	<li>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.</li>
      	<li>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.</li>
      	<li>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.</li>
      	<li>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.</li>

      </ul> -->
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
           <h2 class="collapsed h2-faq"  data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseThree">
     
          How often should I pay for the website?

     
      </h2>

    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        It’s an annual membership, you will be charged every year if only you want to renew your membership.

      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="collapsed h2-faq"  data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseFour">
     
          What will I get after being a member?

     
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
      	
      		Being a member gives you a set of benefits:
      		<ul class="ul-faq2">
      			<li>Company Profile (24/7 online presence + international visits)</li>
				<li>Listing in business directory (Brand & Product) Awareness</li>
				<li>Newsletters subscription (Business Tips & Hacks)</li>
				<li>Live chat with your customers </li>
				<li>Using our services </li>
			</ul>
      </div>
    </div>
  </div>


  <div class="card">
    <div class="card-header" id="headingFour">
      <h2 class="collapsed h2-faq"  data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFive">
     
          What is your business directory? 

     
      </h2>
    </div>
    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
      <div class="card-body">
        Our business directory is the most effective feature presented to your business, in this directory your business is being listed according to business sector and all your contacts information and products will be available for everyone in the web.


      </div>
    </div>
  </div>



  <div class="card">
    <div class="card-header" id="headingFive">
      <h2 class="collapsed h2-faq"  data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseSix">
     
         How can you help me to start a business?


     
      </h2>
    </div>
    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
      <div class="card-body">
       My Business will help you in every step in your business, from giving you the opportunity to collect all new information to start your business or by getting new ideas. then you can start your global business presence.


      </div>
    </div>
  </div>


  <div class="card">
    <div class="card-header" id="headingSix">
      <h2 class="collapsed h2-faq"  data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSeven">
     
		How you can help in growing my business? 


     
      </h2>
    </div>
    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
      <div class="card-body">
       We help you to participate in online exhibitions and give you the same experience as same as the actual exhibitions with cost effective price. Also you can participate in actions and tenders plus knowing what is upcoming next from different business events around the whole world.


      </div>
    </div>
  </div>



  <div class="card">
    <div class="card-header" id="headingSeven">
      <h2 class="collapsed h2-faq"  data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseEight">
     
Do you intend to work with existing businesses and startups? 


     
      </h2>
    </div>
    <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
      <div class="card-body">
       Yes, Either you are SME, Startups or Freelancer who is looking to start your own business, our aim is to make your business bigger and to deliver what you are doing to the whole world, as your success is our success. 



      </div>
    </div>
  </div>




  <div class="card">
    <div class="card-header" id="headingEight">
      <h2 class="collapsed h2-faq"  data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseNine">
     
Are you an advertising agency? 


     
      </h2>
    </div>
    <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
      <div class="card-body">
No, we are not even close, we are a new innovative platform that presents new advertising concept using digital services to refresh economical, commercial trade in the MENA region. 


      </div>
    </div>
  </div>


  <div class="card">
    <div class="card-header" id="headingNine">
      <h2 class="collapsed h2-faq"  data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseTen">
     
How to benefit from online expos?


     
      </h2>
    </div>
    <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordionExample">
      <div class="card-body">
To get the maximum benefit from our online expos, you need to follow these recommendations
<ul class="ul-faq2">
      	<li>Present your best products or services</li>
      	<li>Make offers and sales</li>
      	<li>Focus on your unique selling points</li>

      </ul>

      </div>
    </div>
  </div>


  <div class="card">
    <div class="card-header" id="headingTen">
      <h2 class="collapsed h2-faq"  data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseEleven">
     
How online exhibitions are more effective than the traditional exhibitions?


     
      </h2>
    </div>
    <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordionExample">
      <div class="card-body">
With our online exhibitions your BRAND is spreading in the whole world we are a very traditional and popular way, but it has a lot of negative points as it: 

	<li>Present your best products or services</li>
      	<li>Cost effective</li>
      	<li>A lot of visitors not just nationally but globally as well</li>
      	<li>No marketing budget is required</li>
      	<li>More creative and easier way to reach customers through different platforms</li>
      	<li>Easy to determine the measurements and ROI for your investment</li>
      </div>
    </div>
  </div>


  <div class="card">
    <div class="card-header" id="headingEleven">
      <h2 class="collapsed h2-faq"  data-toggle="collapse" data-target="#collapseEleven" aria-expanded="false" aria-controls="collapseTwelve">
     
How long have you been around?  


     
      </h2>
    </div>
    <div id="collapseEleven" class="collapse" aria-labelledby="headingEleven" data-parent="#accordionExample">
      <div class="card-body">
We presented My Business to the world in 2019, However behind the scene there are marketing and s-ales gurus with decades of experience.   

	
      </div>
    </div>
  </div>



  <div class="card">
    <div class="card-header" id="headingTwelve">
      <h2 class="collapsed h2-faq"  data-toggle="collapse" data-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
     
Are you an advertising agency? 


     
      </h2>
    </div>
    <div id="collapseTwelve" class="collapse" aria-labelledby="headingTweleve" data-parent="#accordionExample">
      <div class="card-body">
No, we are not even close, we are a new innovative platform that presents new advertising concept using digital services to refresh economical, commercial trade in the MENA region. 


      </div>
    </div>
  </div>



</div>

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
--}}