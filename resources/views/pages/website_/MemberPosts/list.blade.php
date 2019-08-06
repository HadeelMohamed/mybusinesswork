@extends('layouts.website')
@section('title','Member')
@section('content')
<!--...........................profile-head...................-->
<div class="profile-company" style="background-image:url({{asset('website/images/construction.jpg')}}">
  <div class="inner-sec">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="{{asset('images/en/med')}}/{{$member->profile_pic}}" class="logo-company-profile">
          <div class="pin-div back-red"><i class="fas fa-map-marker-alt"></i> {{$member->country}}</div>
          <div class="clear"></div>
          <h1 class="h1-profile">{{$member->name}}</h1>
          <h5 class="h5-profil">Business Type <strong class="strong-type">{{$member->category}}</strong></h5>
          <div class="line-account back-red"></div>
          <div class="main-three">
            <div class="star-float">
              <input class="rb-rating" value="{{$member->rate}}" type="text" data-min=0 data-max=5 data-step=1 disabled  />
            </div>
            <!-- <p class="review-profile">7 Review</p> -->
            <div class="favourite">4 <i class="fas fa-bookmark color-red"></i></div>
          </div>
          <div class="clear"></div>
          <p class="contact"><i class="fas fa-map-marker-alt color-red"></i> {{$member->address}}  </p>                      
          <p class="contact"><i class="fas fa-phone color-red"></i> {{$member->phone}} </p>                      
          <p class="contact"><i class="fas fa-envelope color-red"></i> {{$member->email}}</p>                      
          <div class="clear"></div>
        </div>

        <div class="col-md-6 three-div-big">
          <div class="position-relative big-item">
            <div class="share-div">
              <div class="share-holder hid-share">
                <div class="showshare"><span>@lang('website.share') </span><i class="fa fa-share"></i></div>
                <div class="share-container  isShare"></div>
              </div>
              @if(isset(Auth::user()->id))
              @if($member->user_id != Auth::user()->id)
              <button class="btn-messgae" data-toggle="modal" data-target=".message-pop"><i class="fas fa-envelope"></i> @lang('website.messages')</button>@endif                    
              @endif
              <div class="clear"></div>                                         
              <br><br>
              <a class="btn-profile"><i class="fas fa-star color-red"></i> Add Review </a>
              <!-- <a class="btn-profile"><i class="fas fa-bell color-red"></i>  Notfication -  156  </a> -->
              @if($member->viewed != 0)
              <a class="btn-profile"><i class="fas fa-eye color-red"></i>  @lang('website.viewed')   {{$member->viewed}}  </a>
              @endif
            </div>   
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="overlay-profile"></div>
  <div class="bubble-bg"></div>
</div>
@include('partials.member.member_tabs')

</div>





  
  
   <!--...........................profile-head...................-->
   
   
  
  





      

   
      <!--...........................details company...................-->
      
      <div class="padding-details">
      
      <div class="container">
      <div class="row">
      <div class="col-lg-8">
      
      <!-- comment -->
<style>
.main-comment{
  margin-top:0px;
}
</style>      
<div class="main-comment main-posts-div">
<div class="img-comment"><img src="images/logo-company2.jpg" width="100%" height="100%" alt=""></div>

<textarea class="text-area-comment form-control" ></textarea>

<div class="row">

<div class="col-sm-12 share-video display-none">
<input class="form-control input-video margin-top" placeholder="Enter your Link Video">
</div>

<div class="col-sm-7">
<input type="file" class="display-none" id="photoupload-post">
<label for="photoupload-post" class="label-upload-video"><i class="fas fa-image"></i> Upload your Photo</label>
<label  class="label-upload-video label-upload-video-action"> / <i class="fas fa-video"></i> Share Your video</label>

</div>

<div class="col-sm-5">
<div class="text-right"><button class="btn btn-register post-button back-red">Post</button></div>
</div>

</div>
</div>



<!--.......................post start.................-->

     <div class="container-fluid" id="paging_container8">

<ul class="content">
<li class="parent-post">
      
<div class="main-comment-div">
      <img src="images/slider.png" width="100%">
      <div class="pro-absolute"> 
      </div>
      
    
    
      <p class="p-padding">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</p>
      
     <div class="text-right padding-button"><button class="btn-like"><i class="far fa-heart color-red"></i> 447</button> <button class="btn-like btn-comment-action"><i class="fas fa-comment color-red"></i> Comment</button></div>
     
</div>
     


<!-- enter comment -->

</li>

<li class="parent-post">
      
<div class="main-comment-div">
      <img src="images/slider.png" width="100%">
      <div class="pro-absolute"> 
      </div>
      
    
    
      <p class="p-padding">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</p>
      
     <div class="text-right padding-button"><button class="btn-like"><i class="far fa-heart color-red"></i> 447</button> <button class="btn-like btn-comment-action"><i class="fas fa-comment color-red"></i> Comment</button></div>
     
</div>
     


<!-- enter comment -->

</li><li class="parent-post">
      
<div class="main-comment-div">
      <img src="images/slider.png" width="100%">
      <div class="pro-absolute"> 
      </div>
      
    
    
      <p class="p-padding">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</p>
      
     <div class="text-right padding-button"><button class="btn-like"><i class="far fa-heart color-red"></i> 447</button> <button class="btn-like btn-comment-action"><i class="fas fa-comment color-red"></i> Comment</button></div>
     
</div>
     


<!-- enter comment -->

</li><li class="parent-post">
      
<div class="main-comment-div">
      <img src="images/slider.png" width="100%">
      <div class="pro-absolute"> 
      </div>
      
    
    
      <p class="p-padding">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</p>
      
     <div class="text-right padding-button"><button class="btn-like"><i class="far fa-heart color-red"></i> 447</button> <button class="btn-like btn-comment-action"><i class="fas fa-comment color-red"></i> Comment</button></div>
     
</div>
     


<!-- enter comment -->

</li><li class="parent-post">
      
<div class="main-comment-div">
      <img src="images/slider.png" width="100%">
      <div class="pro-absolute"> 
      </div>
      
    
    
      <p class="p-padding">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</p>
      
     <div class="text-right padding-button"><button class="btn-like"><i class="far fa-heart color-red"></i> 447</button> <button class="btn-like btn-comment-action"><i class="fas fa-comment color-red"></i> Comment</button></div>
     
</div>
     


<!-- enter comment -->

</li><li class="parent-post">
      
<div class="main-comment-div">
      <img src="images/slider.png" width="100%">
      <div class="pro-absolute"> 
      </div>
      
    
    
      <p class="p-padding">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</p>
      
     <div class="text-right padding-button"><button class="btn-like"><i class="far fa-heart color-red"></i> 447</button> <button class="btn-like btn-comment-action"><i class="fas fa-comment color-red"></i> Comment</button></div>
     
</div>
     


<!-- enter comment -->

</li><li class="parent-post">
      
<div class="main-comment-div">
      <img src="images/slider.png" width="100%">
      <div class="pro-absolute"> 
      </div>
      
    
    
      <p class="p-padding">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</p>
      
     <div class="text-right padding-button"><button class="btn-like"><i class="far fa-heart color-red"></i> 447</button> <button class="btn-like btn-comment-action"><i class="fas fa-comment color-red"></i> Comment</button></div>
     
</div>
     


<!-- enter comment -->

</li><li class="parent-post">
      
<div class="main-comment-div">
      <img src="images/slider.png" width="100%">
      <div class="pro-absolute"> 
      </div>
      
    
    
      <p class="p-padding">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</p>
      
     <div class="text-right padding-button"><button class="btn-like"><i class="far fa-heart color-red"></i> 447</button> <button class="btn-like btn-comment-action"><i class="fas fa-comment color-red"></i> Comment</button></div>
     
</div>
     


<!-- enter comment -->

</li>

</ul>
        <div class="page_navigation"></div>

</div>




     
      
      
      
      </div>
      
          <!--..........................aside...................-->
  
         <div class="col-lg-4">
      <div class="counter-side">
      <div class="row">
      
      
      <div class="col-4 border-action">
                                            <div class="inline-facts-wrap">
                                                <div class="inline-facts text-center">
                                                
                                                                                                    <i class="fas fa-dollar-sign"></i>

                                                    <div class="milestone-counter text-center">
                                                        <div class="stats animaper">
                                                            <div class="num" data-content="0" data-num="12168">0</div>
                                                        </div>
                                                    </div>
                                                    <h6 class="text-center">wallet</h6>
                                                </div>
                                            </div>
                </div>
      
      <div class="col-4 border-action">
                                            <div class="inline-facts-wrap">
                                                <div class="inline-facts text-center">
                                                
                                                  <i class="fas fa-bullhorn"></i>

                                                    <div class="milestone-counter text-center">
                                                        <div class="stats animaper">
                                                            <div class="num" data-content="0" data-num="12168">0</div>
                                                        </div>
                                                    </div>
                                                    <h6 class="text-center">Exhibitions</h6>
                                                </div>
                                            </div>
                </div>  
                
                
                
                
                
                <div class="col-4 ">
                                            <div class="inline-facts-wrap">
                                                <div class="inline-facts text-center">
                                                
                                                
                                                     <i class="fas fa-gavel"></i>

                                                    <div class="milestone-counter text-center">
                                                        <div class="stats animaper">
                                                            <div class="num" data-content="0" data-num="12168">0</div>
                                                        </div>
                                                    </div>
                                                    <h6 class="text-center">Auctions</h6>
                                                </div>
                                            </div>
                </div>
                
                
                               
                
               <div class="col-12" style="height:20px"></div> 
               
               
               <div class="col-4 border-action">
                                            <div class="inline-facts-wrap">
                                                <div class="inline-facts text-center">
                                                                                                                                                     <i class="fas fa-envelope"></i>


                                                    <div class="milestone-counter text-center">
                                                        <div class="stats animaper">
                                                            <div class="num" data-content="0" data-num="12168">0</div>
                                                        </div>
                                                    </div>
                                                    <h6 class="text-center">Tenders

</h6>
                                                </div>
                                            </div>
                </div>
                
                  
      <div class="col-4 border-action">
                                            <div class="inline-facts-wrap">
                                                <div class="inline-facts text-center">
                                                
                                                                                                     <i class="fas fa-box-open"></i>

                                                    <div class="milestone-counter text-center">
                                                        <div class="stats animaper">
                                                            <div class="num" data-content="0" data-num="12168">0</div>
                                                        </div>
                                                    </div>
                                                    <h6 class="text-center">Products</h6>
                                                </div>
                                            </div>
                </div>  
                
                
                
                
                
                <div class="col-4 ">
                                            <div class="inline-facts-wrap">
                                                <div class="inline-facts text-center">
                                                                                                     <i class="fas fa-edit"></i>

                                                    <div class="milestone-counter text-center">
                                                        <div class="stats animaper">
                                                            <div class="num" data-content="0" data-num="12168">0</div>
                                                        </div>
                                                    </div>
                                                    <h6 class="text-center">Posts</h6>
                                                </div>
                                            </div>
                </div>  
                
                
                </div>                           
      
      </div>
      
      <h3 class="h3-contact">Contact Details</h3>
      
      <div class="container-contact-main">
      
      
      <div class="contact-back-red"></div>
      <div class="text-center">
      <img src="images/logo-company.jpg" class="logo-contact-main">
      </div>
      <div class="padding-contact">
      
      <h6 class="h6-title"><i class="fas fa-map-marker color-red"></i> Adress :</h6>
      <p class="p-contact">Villa 15 - Area F - North 90 - New Cairo - Egypt</p>
      
      
            <h6 class="h6-title"><i class="fas fa-phone color-red"></i>  Phone :</h6>
      <p class="p-contact"> 01002347577</p>
      
      
        <h6 class="h6-title"><i class="fas fa-street-view color-red"></i>  CEO  :</h6>
      <p class="p-contact"> 01002347577</p>
      
              <h6 class="h6-title"><i class="fas fa-user-circle color-red"></i>  Marketing   :</h6>
      <p class="p-contact"> 01002347577</p>
      
                    <h6 class="h6-title"><i class="fas fa-address-book color-red"></i>  Sales    :</h6>
      <p class="p-contact"> 01002347577</p>

                    <h6 class="h6-title"><i class="fas fa-envelope color-red"></i>  Mail    :</h6>
      <p class="p-contact"> 01002347577</p>
      
      
         <h6 class="h6-title"><i class="fas fa-globe color-red"></i>  Website     :</h6>
      <p class="p-contact"> <a href="#">Open Site</a></p>
      
      
      
      <div class="list-widget-social">
                    <ul>
                 
                        <li><a href="" target="_blank" ><i class="fab fa-facebook"></i></a></li>
                        <li><a href="" target="_blank" ><i class="fab fa-instagram"></i></a></li>
                        <li><a href="" target="_blank" ><i class="fab fa-linkedin"></i></a></li>
                        <li><a href="" target="_blank" ><i class="fab fa-twitter"></i></a></li>
                        <li><a href="" target="_blank" ><i class="fab fa-youtube"></i></a></li>
                        <li><a href="" target="_blank" ><i class="fab fa-snapchat-ghost"></i></a></li>
                       <li><a href="" target="_blank" ><i class="fab fa-pinterest-p"></i></a></li>

                    </ul>
                </div>

</div>

      </div>
      
      
      
              <h3 class="h3-contact">Related Company</h3>
    
    
          <div class="container-contact">
          
          <div class="position-relative main-auctions">
          
          <img src="images/ser3.jpg" class="img-auction">
          
          <div class="div-describtion2"><h6>Name Of company</h6>
          
          </div>
                <div class="clear"></div>

          </div>
          
          
          <div class="position-relative main-auctions">
          
          <img src="images/ser3.jpg" class="img-auction">
          
          <div class="div-describtion2"><h6>Name Of company</h6>
          
          </div>
                <div class="clear"></div>

          </div>
          
          <div class="position-relative main-auctions">
          
          <img src="images/ser3.jpg" class="img-auction">
          
          <div class="div-describtion2"><h6>Name Of company</h6>
          
          </div>
                <div class="clear"></div>

          </div>
          
          
</div>

      
      
      
        <h3 class="h3-contact">Latest Auctions</h3>
    
    
          <div class="container-contact">
          
          <div class="position-relative main-auctions">
          
          <img src="images/ser3.jpg" class="img-auction">
          
          <div class="div-describtion"><h5>Art Work</h5>
          
         <p class="p-date-profile"><i class="fas fa-calendar-alt color-red"></i> 1 month ago </p>
          </div>
          </div>
          
      
          
          <a href="#" class="all-link">See All <i class="fas fa-arrow-circle-right i-all "></i></a>
          
</div>


  <h3 class="h3-contact">Latest Exhibitions</h3>
    
    
          <div class="container-contact">
          
          <div class="position-relative main-auctions">
          
          <img src="images/ser3.jpg" class="img-auction">
          
          <div class="div-describtion"><h5>Art Work</h5>
          
         <p class="p-date-profile"><i class="fas fa-calendar-alt color-red"></i> 1 month ago </p>
          </div>
          </div>
          
    
          
          <a href="#" class="all-link">See All <i class="fas fa-arrow-circle-right i-all "></i></a>
          
</div>



  <h3 class="h3-contact">Latest Tenders
</h3>
    
    
          <div class="container-contact">
          
          <div class="position-relative main-auctions">
          
          <img src="images/ser3.jpg" class="img-auction">
          
          <div class="div-describtion"><h5>Art Work</h5>
          
         <p class="p-date-profile"><i class="fas fa-calendar-alt color-red"></i> 1 month ago </p>
          </div>
          </div>
          
       
          
          <a href="#" class="all-link">See All <i class="fas fa-arrow-circle-right i-all "></i></a>
          
</div>

    
      
      </div>


</div>
</div>

</div>











<!-- paging -->
<script>
  $(document).ready(function(){
    $('#paging_container8').pajinate({
      num_page_links_to_display : 3,
          items_per_page : 16 
        });
      });     
    </script>






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
@include('partials.member.alerts');
<script>
 

$(document).ready( function () {
    $('#table_id').DataTable( {
  });

    $(function() {
      
        $(' #da-thumbs > li ').each( function() { $(this).hoverdir(); } );

      });
} );
</script>

@endsection