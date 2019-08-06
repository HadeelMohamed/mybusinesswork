@extends('layouts.website')
@section('title','Messages')
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
					@if(Auth::user()->wallet < 10 )
					<!-- <div class="back-red active-acc">
						<i class="fas fa-exclamation-triangle"></i>
						@lang('website.payment_required')
						You Must pay to active your Account	
						<button class="btn  btn-dark btn-pay">@lang('website.pay_now')</button>
					</div> -->
					@endif
					
					<div class="clear"></div>
					<div class="card">
						<div class="card-header">
						<a href="{{url('/')}}/{{$messages->slug}}" >{{$messages->sender_name}} </a>
						</div>
						<div class="card-body">
							<p><i class="fas fa-calendar-alt"></i> Date: <strong> {{$messages->created_at}}</strong></p>
							<p class="text-justify"> {{$messages->message}}
							</p>
							<div class="text-right">
								<a href="{{route('AuthedMemberMessages')}}" class="btn-back-message" ><i class="fas fa-backward"></i> @lang('website.back')</a>
								<button class="btn-delete-message" data-toggle="modal" data-target=".delete-pop"><i class="fas fa-trash-alt"></i> @lang('website.delete')</button> 
							</div>
						</div>
					</div>   
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
							<form action="{{route('MemberMessageDelete')}}" method="post">
								@csrf
								<input hidden="" name="sender_id" value="{{$messages->sender_id}}">
								<input hidden="" name="receiver_id" value="{{$messages->receiver_id}}">
								<input hidden="" name="created_at" value="{{$messages->created_at}}">
							
							<button type="submit" class="btn btn-outline-light">Yes</button>  
							<button class="btn btn-outline-light"  data-dismiss="modal">No</button>
							</form>
						</div>
					</div>   
				</div>
			</div>
		</div>
	</div>
</div>



@include('partials.website.footer')
<script type="text/javascript" src="{{asset('website/js/jquery.dataTables.js')}}"></script>
@include('partials.member.alerts');
<script>
 

$(document).ready( function () {
    $('#table_id').DataTable( {
  } );
} );
</script>

@endsection