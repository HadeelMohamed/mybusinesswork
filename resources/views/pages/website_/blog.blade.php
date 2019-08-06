@extends('layouts.website')
@section('title','Home')
@section('content')

<style type="text/css">
	.more {
		float: left;
	}
	.less {
		float: left;
	}
	.slide-sec {
    max-height: 300px;
    min-height: auto;
}
</style>

 <!--...........................header-div...................-->
<!-- <div class="profile-company position-relative"  style="background-image:url({{asset('website/images/construction.jpg')}}">
	<div class="overlay-profile"></div> 
	<div class="bubble-bg"></div>
	
</div> -->

<!-- <h1 class="h1-page">@lang('website.business_tips')</h1>
 -->
  <div class="static_height"></div>
<style type="text/css">
.static_height{
  height: 170px;
}
@media (max-width:1024px){
  .static_height{
  height: 80px;
}
}


    .overlay-profile {
      display: block;
    }



.profile-company{
  background-size: auto 100%;
}
</style>



<div class="clear"></div>
<div class="container">
	<div class="col-lg-12 col-md-12">
  	<div class="parent-post">
      
      <img src="{{asset('website/images/')}}/{{$blog[0]->image}}" width="100%">
      <div class="pro-absolute"> 
      </div>
      <center><h3 class="h3-blog-inner">{{$blog[0]->title}}</h3></center>
			{{--<center><div class=" blogs-p-inner"><i class="fas fa-clock "></i>{{$blog[0]->created_at}} | <i class="fas fa-eye"></i> </div></center>--}}
      
    



      <p class="p-padding text-justify p-blog-inner">{{$blog[0]->content}}</p>
      {{--
     <div class="text-right padding-button"><button class="btn-like"><i class="far fa-heart color-red"></i> 447</button> <button class="btn-like btn-comment-action"><i class="fas fa-comment color-red"></i> Comment</button></div>
     
     


<!-- enter comment -->

<div class="child-comment">
<div class="main-comment main-posts-div" style="margin-top:20px;">
<div class="img-comment"><img src="images/logo-company2.jpg" width="100%" height="100%" alt=""></div>

<textarea class="text-area-comment form-control" ></textarea>


<div class="text-right"><button class="btn btn-register post-button back-red">Add Comment</button></div>


</div>



<!-- comment -->
	<div class="comments-container" style="margin-top:10px;">

		<ul id="comments-list" class="comments-list">
			<li>
				<div class="comment-main-level">
					<!-- Avatar -->
					<div class="comment-avatar"><img src="images/logo-company.jpg" alt=""></div>
					<!-- Contenedor del Comentario -->
					<div class="comment-box">
						<div class="comment-head">
							<h6 class="comment-name by-author"><a href="#">Agustin Ortiz</a></h6>
						<button class="btn btn-del" data-toggle="modal" data-target=".delete-pop"> <i class="fas fa-times"></i></button>

						</div>
						<div class="comment-content">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
						</div>
                       <div class="icons-commment">
                        <div class="container-fluid">
                        <div class="row">
                        <div class="col-sm-4"><i class="fas fa-calendar-alt"></i> 1/8/2019</div>
                        <div class="col-sm-8 icons-dir">
                        
                       <button class="btn btn-comment"> <i class="far fa-heart"></i> 1245</button>
                            <button class="btn btn-comment"> <i class="fas fa-reply"></i></button>
                  <button class="btn btn-comment"> <i class="fas fa-edit"></i></button>


                        </div>

                        </div>
                        </div>
                        
                        </div>
					</div>
				</div>
				<!-- Respuestas de los comentarios -->
				<ul class="comments-list reply-list">
					<li>
						<!-- Avatar -->
						<div class="comment-avatar"><img src="images/logo-company2.jpg" alt=""></div>
						<!-- Contenedor del Comentario -->
						<div class="comment-box">
							<div class="comment-head">
								<h6 class="comment-name"><a href="http://creaticode.com/blog">Lorena Rojero</a></h6>
													                                    <button class="btn btn-del" data-toggle="modal" data-target=".delete-pop"> <i class="fas fa-times"></i></button>

							</div>
							<div class="comment-content">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
							</div>
                            
                    <div class="icons-commment">
                        <div class="container-fluid">
                        <div class="row">
                        <div class="col-sm-4"><i class="fas fa-calendar-alt"></i> 1/8/2019</div>
                        <div class="col-sm-8 icons-dir">
                        
                       <button class="btn btn-comment"> <i class="far fa-heart"></i> 1245</button>
                            <button class="btn btn-comment"> <i class="fas fa-reply"></i></button>
                  <button class="btn btn-comment"> <i class="fas fa-edit"></i></button>


                        </div>

                        </div>
                        </div>
                        
                        </div>
						</div>
					</li>

					<li>
						<!-- Avatar -->
						<div class="comment-avatar"><img src="images/logo-company.jpg" alt=""></div>
						<!-- Contenedor del Comentario -->
						<div class="comment-box">
							<div class="comment-head">
								<h6 class="comment-name by-author"><a href="#">Agustin Ortiz</a></h6>
							 <button class="btn btn-del" data-toggle="modal" data-target=".delete-pop"> <i class="fas fa-times"></i></button>

							</div>
							<div class="comment-content">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
							</div>
                            
                    <div class="icons-commment">
                        <div class="container-fluid">
                        <div class="row">
                        <div class="col-sm-4"><i class="fas fa-calendar-alt"></i> 1/8/2019</div>
                        <div class="col-sm-8 icons-dir">
                        
                       <button class="btn btn-comment"> <i class="far fa-heart"></i> 1245</button>
                            <button class="btn btn-comment"> <i class="fas fa-reply"></i></button>
                  <button class="btn btn-comment"> <i class="fas fa-edit"></i></button>


                        </div>

                        </div>
                        </div>
                        
                        </div>
                            
						</div>
					</li>
                    
                    
                 	<li>
						<!-- Avatar -->
						<div class="comment-avatar"><img src="images/logo-company.jpg" alt=""></div>
						<!-- Contenedor del Comentario -->
						<div class="comment-box">
							<div class="comment-head">
								<h6 class="comment-name by-author"><a href="#">Agustin Ortiz</a></h6>
							
							</div>
							<div class="comment-content">
								<textarea class="form-control"></textarea>
                                
                                <div class="text-right"><button class="btn btn-replay post-button back-red">Reply</button></div>
							</div>
                            
                    
                            
						</div>
					</li>   
                    
                    
				</ul>
			</li>

			<li>
				<div class="comment-main-level">
					<!-- Avatar -->
					<div class="comment-avatar"><img src="images/logo-company2.jpg" alt=""></div>
					<!-- Contenedor del Comentario -->
					<div class="comment-box">
						<div class="comment-head">
							<h6 class="comment-name"><a href="#">Lorena Rojero</a></h6>
													                                    <button class="btn btn-del" data-toggle="modal" data-target=".delete-pop"> <i class="fas fa-times"></i></button>

						</div>
						<div class="comment-content">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
						</div>
                       <div class="icons-commment">
                        <div class="container-fluid">
                        <div class="row">
                        <div class="col-sm-4"><i class="fas fa-calendar-alt"></i> 1/8/2019</div>
                        <div class="col-sm-8 icons-dir">
                        
                       <button class="btn btn-comment"> <i class="far fa-heart"></i> 1245</button>
                            <button class="btn btn-comment"> <i class="fas fa-reply"></i></button>
                  <button class="btn btn-comment"> <i class="fas fa-edit"></i></button>

--}}
                        </div>

                        </div>
                        </div>
                        
                        </div>
					</div>
				</div>
			</li>
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
<script src="{{asset('website/js/paginga.jquery.js')}}" ></script>
<script src="{{asset('website/js/star-rating.js')}}" type="text/javascript"></script>
<script src="{{asset('website/js/plugins.js')}}" ></script>
<script src="{{asset('website/js/script.js')}}" ></script>

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






<!-- paging -->






@endsection