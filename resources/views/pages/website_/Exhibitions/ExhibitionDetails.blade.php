@extends('layouts.website')
@section('title','Exhibitions')
@section('content')
<style type="text/css">
  .more {
    float: left;
  }
  .less {
    float: left;
  }
</style>
<!--...........................profile-head...................-->
   
<div class="profile-company"  style="background-image:url({{asset('website/images/construction.jpg')}}">





<div class="inner-sec">

<div class="container">
<div class="row">
<div class="col-md-6">
<img src="{{asset('website/images/logo-company.jpg')}}" class="logo-company-profile">
<!--<div class="pin-div back-red"><i class="fas fa-map-marker-alt"></i> Germany</div>
-->
<!--<div class="line-profile"></div>
-->
<div class="clear"></div>
@if(isset($exhibition_details->exh_name))<h1 class="h1-profile">{{$exhibition_details->exh_name}}</h1>@endif
<h5 class="h5-profil">@lang('website.exhibition_type') <strong class="strong-type">@if(isset($exhibition_details->cat_name)){{$exhibition_details->cat_name}}@endif</strong></h5>
<div class="line-account back-red"></div>


                        <!--<div class="main-three"> <div class="star-float"><input class="rb-rating" value="2" type="text" data-min=0 data-max=5 data-step=1 disabled  /> </div><p class="review-profile">7 Review</p>
                         <div class="favourite">4 <i class="fas fa-bookmark color-red"></i></div></div>-->
<div class="clear"></div>
<div class="margin-timeline"></div>
       <p class="contact"><i class="fas fa-calendar-alt color-red"></i>@lang('website.start_at') : {{$exhibition_details->start}}  </p>                      

                <p class="contact"><i class="fas fa-calendar color-red"></i> @lang('website.finish_at') : {{$exhibition_details->end}} </p>                      
<!--       <p class="contact"><i class="fas fa-envelope color-red"></i> construction@dowmain name.com</p>                      
-->
<div class="clear"></div>

</div>

<div class="col-md-6 three-div-big">
<div class="position-relative big-item">


<div class="share-div">

<div class="share-holder hid-share">
                                                    <div class="showshare"><span>@lang('website.share') </span><i class="fa fa-share"></i></div>
                                                    <div class="share-container  isShare"></div>
                                            </div>
                                            
                        <button class="btn-messgae" data-toggle="modal" data-target=".message-pop"><i class="fas fa-envelope"></i> @lang('website.messages')</button> 
                   
   <div class="clear"></div>                                         

<!--<a class="btn-profile"><i class="fas fa-star color-red"></i> Add Review </a>
<a class="btn-profile"><i class="fas fa-bell color-red"></i>  Notfication -  156  </a>
<a class="btn-profile"><i class="fas fa-eye color-red"></i>  Viewed -  156  </a>-->




                                                
 </div>   
</div>

</div>

</div>

</div>

</div>
    
<div class="overlay-profile"></div>
                        <div class="bubble-bg"></div>
</div>
			


    <div class="container">
    <div class="row">
    <div class="head-menu-company">
    <div class="text-center">
    <!-- <div class="btn-menu-com" ><i class="fas fa-bars"></i></div></div> -->
    
 <!--    <ul class="nav-details nav-co">
    <li><a  class="color-active">@lang('website.exhibition')</a></li>
    <li><a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibitions/{{$exhibition_details->exh_slug}}"> @lang('website.sponsors') </a></li>
    <li><a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibitions/{{$exhibition_details->exh_slug}}"> @lang('website.companies') </a></li>
    </ul> -->
    
    <!-- </div> -->
        </div>

    </div>
    
    </div>
   
      <!--...........................details company...................-->
      
      <div class="padding-details">
      
      <div class="container">
      <div class="row">
      <div class="col-lg-8">
      <div class="main-details" id="sec-1">
      <div class="div-title">
      <div class="shape"><i class="fas fa-building"></i> </div>
      <h3 class="h3-about">@lang('website.about_exhibition')</h3>
      </div>
      
      <div class="content-company">
      <p class="text-justify">{{$exhibition_details->summary}}</p>
      
      <!-- <button class="btn btn-pdf"><i class="far fa-file-pdf"></i> Download PDF</button> -->
      </div>
      
      
      
      
      </div>
      
            <div class="text-center">
            @if(date('Y-m-d') >= $exhibition_details->start)
              <a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibition/{{$exhibition_details->exh_slug}}" class="btn btn-danger "><i class="fas fa-sign-in-alt"></i> @lang('website.enter_to_exhibition')</a>
            @else
              @if($members_available > 0)
                <a href="{{url('/')}}/Exhibition/join/{{$exhibition_details->exh_slug}}" class="btn btn-danger "><i class="fas fa-clipboard"></i> @lang('website.join_as_exhibitor')</a>
              @endif

              @if($sponsors_available > 0)
                <button class="btn btn-danger "><i class="fas fa-clipboard"></i> @lang('website.join_as_sponsor')</button>
              @endif
            @endif
            
            
            </div>

      
      
      </div>
      
          <!--..........................aside...................-->
  
      <div class="col-lg-4">
      
      
    <!--   
      <div class="counter-side"  >
      <div class="row"> -->
      
                
                
                <!-- <div class="col-6 border-action" >
                                            <div class="inline-facts-wrap">
                                                <div class="inline-facts text-center">
                                                
                                                
                                                     <i class="fas fa-eye"></i>
                                                     
                                                     <div class="milestone-counter text-center margin-view">
                                                        <div class="stats animaper">
                                                            <div class="num" data-content="0" data-num="12168">0</div>
                                                        </div>
                                                    </div>

                                                    
                                                    <h6 class="text-center">Visitor</h6>
                                                </div>
                                            </div>
                </div> -->
                
                
                <!-- <div class="col-6 ">
                                            <div class="inline-facts-wrap">
                                                <div class="inline-facts text-center">
                                                
                                                
                                                     <i class="fas fa-building"></i>

                                                    <div class="milestone-counter text-center margin-view">
                                                        <div class="stats animaper">
                                                            <div class="num" data-content="0" data-num="12168">0</div>
                                                        </div>
                                                    </div>
                                                    <h6 class="text-center">Companies</h6>

                                                </div>
                                            </div>
                </div> -->
                
                
                               
                

                
       <!--          </div>                           
      
      </div> -->
      
      <!-- <div class="padding-div-aside"></div> -->
      
      
      <div class="counter-side">
      <div class="row">
      
      
      <div class="col-4 border-action">
                                            <div class="inline-facts-wrap">
                                                <div class="inline-facts text-center">
                                                
<!--    <i class="fas fa-calendar-day"></i>-->

                                                    <div class="milestone-counter text-center">
                                                        <div class="stats animaper">
                                                            <div class="num" data-content="0" data-num="0">0</div>
                                                        </div>
                                                    </div>
                                                    <h6 class="text-center">@lang('website.day')</h6>
                                                </div>
                                            </div>
                </div>
      
      <div class="col-4 border-action">
                                            <div class="inline-facts-wrap">
                                                <div class="inline-facts text-center">
                                                
<!--                                                  <i class="fas fa-hourglass-half"></i>-->

                                                    <div class="milestone-counter text-center">
                                                        <div class="stats animaper">
                                                            <div class="num" data-content="0" data-num="0">0</div>
                                                        </div>
                                                    </div>
                                                    <h6 class="text-center">@lang('website.hour')</h6>
                                                </div>
                                            </div>
                </div>  

 <div class="col-4 ">
                                            <div class="inline-facts-wrap">
                                                <div class="inline-facts text-center">
                                                
                                              
<!--                                                     <i class="fas fa-calendar-minus"></i>  -->

                                                    <div class="milestone-counter text-center">
                                                        <div class="stats animaper">
                                                            <div class="num" data-content="0" data-num="0">0</div>
                                                        </div>
                                                    </div>
                                                    <h6 class="text-center">@lang('website.minute')</h6>
                                                </div>
                                            </div>
                </div>
                
                
                               
                
               
     
                
                
                </div>                           
      
      </div>
      
      
      
      <div class="container-contact">
        <h3 class="h3-contact">@lang('website.contact_details')</h3>
        <h6 class="h6-title"><i class="fas fa-envelope color-red"></i>  @lang('website.email')    :</h6>
          <p class="p-contact"> info@dowmain.com</p>
        <div class="list-widget-social">
          <ul>
            <li><a href="" target="_blank" class="face-book"><i class="fab fa-facebook"></i></a></li>
            <li><a href="" target="_blank" class="instagram"><i class="fab fa-instagram"></i></a></li>
            <li><a href="" target="_blank" class="linkedin"><i class="fab fa-linkedin"></i></a></li>
            <li><a href="" target="_blank" class="twitter"><i class="fab fa-twitter"></i></a></li>
            <li><a href="" target="_blank" class="youtube"><i class="fab fa-youtube"></i></a></li>
            <li><a href="" target="_blank" class="snapchat-ghost"><i class="fab fa-snapchat-ghost"></i></a></li>
            <li><a href="" target="_blank" class="pinterest"><i class="fab fa-pinterest-p"></i></a></li>
          </ul>
        </div>



      </div>
      
      
    
      
      </div>

</div>
</div>

</div>

</div>
</div>





@include('partials.website.footer')
        <script>
    $(document).ready(function(){
        $('#paging_container8').pajinate({
          num_page_links_to_display : 10,
          items_per_page : 10 
        });
      });     
    </script>
<!-- ........................for only page.................-->
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
    
    

    });
    
</script>



@endsection