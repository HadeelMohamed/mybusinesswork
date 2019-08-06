@extends('layouts.website')
@section('title','Posts')
@section('content')
<!--...........................links effect...................-->
<link rel="stylesheet" href="{{asset('website/css/btn-effect.css')}}" >
<!--...........................social...................-->
<link rel="stylesheet" href="{{asset('website/css/social.css')}}" >
<!--...........................slider...................-->
<link rel="stylesheet" href="{{asset('website/css/menu.css')}}" >
<!--...........................select...................-->
<link href="{{asset('website/css/select.css')}}" media="all" rel="stylesheet" type="text/css"/>
<!--...........................for only page...................-->
<link href="{{asset('website/css/dashboard.css')}}" media="all" rel="stylesheet" type="text/css"/>
<link href="{{asset('website/css/jquery.dataTables.css')}}" media="all" rel="stylesheet" type="text/css"/>
<!--...........................for only page...................-->
<link href="{{asset('website/css/dashboard.css')}}" media="all" rel="stylesheet" type="text/css"/>
<link href="{{asset('website/css/jquery.dataTables.css')}}" media="all" rel="stylesheet" type="text/css"/>
<style type="text/css">
  #dd{
    border: 1px solid red;
  }
</style>
<!--...........................profile-head...................-->
<div class="big-dash">
  <div class="container">
    @include('partials.member.admin_panel')
    <div class="row">
		@include('partials.member.side_bar')
    	<!--   ....................article....................-->
			<article class="col-md-9">
				<div class="container-dashborad">
				@include('partials.member.main_title')
				<a id="GoToNewProduct" href="{{route('MemberAllPostsCreate')}}" class="btn btn-secondary btn-sm btn-cus"><i class="fas fa-plus"></i> @lang('website.new_product')</a>
				@if(count($posts) > 0)
				<!-- <a id="GoToNewProduct" href="{{route('MemberAllPostsTranslations')}}" class="btn btn-secondary btn-sm btn-cus"><i class="fas fa-plus"></i> @lang('website.new_translations')</a> -->
				@endif
   			<div style="height:20px;"></div>
				<div class="table-scroll">
					<table id="table_id" class=" table table-bordered" >
				    <thead>
			        <tr>
			        	<!-- <th><center>@lang('website.order')</center></th> -->
		            <th><center>@lang('website.post_content')</center></th>
		            <th><center>@lang('website.post_image')</center></th>
		            <th><center>@lang('website.status')</center></th>
		            <th><center>@lang('website.options')</center></th>
			        </tr>
				    </thead>
				    <tbody>
		          
	          	@if(isset($posts))
	          	@foreach($posts as $post)
	          	<tr id="tr_{{$post->member_id}}_{{$post->created_at}}">
			        <td>{{$post->content}}</td>
			        <td>{{$post->image}}</td>
			        @if($post->active == 1)
			        <td><center>@lang('website.active')</center></td>
			        @else
			        <td class="text-danger"><center><i class="fas fa-eye-slash text-danger"> @lang('website.deactive')</center></td>
			        @endif
			        <td>
								<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" onclick="get_id({{$post->member_id}}_{{$post->created_at}})" value="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							    @lang('website.options')
							  </button>
							  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							    <a class="dropdown-item" href="{{url('/')}}/Account/MemberProductView/"><i class="fas fa-eye"></i> View</a>
							    <a class="dropdown-item" href=""
                                       onclick="event.preventDefault();
                                                     document.getElementById('producEdit-form').submit();">
                                        <i class="fas fa-edit"></i>{{ __('edit') }}
                                    </a>

                                    <form id="producEdit-form" action="" method="POST" style="display: none;">
                                        @csrf
                                        <input hidden="" name="lang" value="{{LaravelLocalization::getCurrentLocale()}}">
                                        <input hidden="" name="pro_id" value="">
                                    </form>
							    <!-- <a class="dropdown-item" href="#"><i class="fas fa-check"></i> Translations</a> -->
							    <!-- <a class="dropdown-item" href="#"><i class="fas fa-check"></i> Gallery</a> -->
							    <a class="dropdown-item" href="{{ route('PostActive') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('PostActive').submit();">
                                        @if($post->active != 1)<i class="fas fa-eye"></i> {{ __('Active') }}@else <i class="fas fa-eye-slash text-danger"></i>{{ __('deactive') }} @endif
                                    </a>

                                    <form id="activations-form" action="{{ route('ProductSpecificationActive') }}" method="POST" style="display: none;">
                                        @csrf
                                        <input hidden="" name="lang" value="{{LaravelLocalization::getCurrentLocale()}}">
                                        <input hidden="" name="pro_id" value="">
                                    </form>
					        <a class="dropdown-item" data-toggle="modal" data-target=".delete-pop" style="cursor:pointer" ><i class="fas fa-trash-alt"></i> Delete</a>

							  </div>
							</td>
							</tr>
							@endforeach
							@endif
							    
						</tbody>
					</table>
				</div>	
			</article>
		</div>
	</div>
</div>


<!-- delete -->

<div class="modal fade delete-pop"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content back-delete-pop">
      <div class="container-fluid">
	      <div class="row">
	        <div class="col-12 text-center">
  		      <div class="padding-pop">
			        <div class="icon-pop"><i class="fas fa-trash-alt"></i></div>
			        <h3 class="h3-delete-pop">Are You Sure</h3>
              <button id="confirmDelete" class="btn btn-outline-light" data-dismiss="modal">Yes</button>  
	            <button class="btn btn-outline-light"  data-dismiss="modal">No</button>  
		        </div>
	        </div>   
	      </div>
      </div>
    </div>
  </div>
</div>


<input hidden="" id="post_id">

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('website/js/jquery-2.1.1.js')}}" ></script>
<script src="{{asset('website/js/popper.min.js')}}" ></script>
<script src="{{asset('website/js/bootstrap.min.js')}}" ></script>

<!-- social -->
<script src="{{asset('website/js/plugins.js')}}" type="text/javascript"></script>
<script src="{{asset('website/js/script.js')}}" ></script>
<script src="{{asset('website/js/social.js')}}" ></script>
<script src="{{asset('website/js/my-js.js')}}" ></script>
<script src="{{asset('website/js/sweetalert.min.js')}}" ></script>
<script type="text/javascript" src="{{asset('website/js/jquery.dataTables.js')}}"></script>
<script>
$(document).ready( function () {

  $('#GoToNewProduct').click(function(){
  	sessionStorage.clear();
  });

  $('#dropdownMenuButton').click(function(){
  	console.log(this.value);
  });

  $('#confirmDelete').click(function(){
  	// rquest ajax delete
  	var pro_id = $('#post_id').val();
  	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  	var url = "";
  	//submit ajax
		$.ajax({
			/* the route pointing to the post function */
			url: url,
			type: 'POST',
			/* send the csrf-token and the input to the controller */
			data: {
							_token: CSRF_TOKEN,
							pro_id:pro_id,
						},
			dataType: 'JSON',
			/* remind that 'data' is the response of the AjaxController */
			success: function (data) {
				
			if(data.status == 'exist')
			{
				swal("Already Exist", data.message, "info");
				return false;
			}else if(data.status == ''){
				swal("Error", data.message, "error");
				return false;
			}else if(data.status == 'success'){
				console.log(pro_id);
				$('#tr_'+pro_id).remove();
				swal("Success", data.message, "success");
			}
			
			},
			error: function(data){
				console.log('error');
			}
		});

  });
});

function get_id(id){
	console.log('on click: '+id);
	$('#post_id').val(id);
}
</script>

@endsection