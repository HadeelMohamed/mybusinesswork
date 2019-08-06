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
    @lang('website.messages')
  </div>
  <div class="card-body">
  
    <div class="table-scroll">
<table id="table_id" class="display table-first table table-bordered" >
	<thead>
		<tr>
			<th>@lang('website.messages')</th>
			<!-- <th></th> -->
		</tr>
	</thead>
	<tbody>
		@foreach($messages as $message)
		@if($message->status == 1)
		<tr>
			<td><a href="{{route('MemberMessageDetails')}}" onclick="event.preventDefault();
                                                     document.getElementById('{{$message->created_at}}-form').submit();" class="message-mail"><i class="far fa-envelope"></i>  <strong>{{$message->created_at}} | {{$message->sender_name}} : </strong>{{$message->subject}} ->  {{$message->message}} 
			</a>
					<form id="{{$message->created_at}}-form" action="{{ route('MemberMessageDetails') }}" method="POST" style="display: none;">
						@csrf
						<input hidden="" name="created_at" value="{{$message->created_at}}">
					</form>
					<!-- <td><button class="btn-delete-message " data-toggle="modal" data-target=".delete-pop{{$message->created_at}}"><i class="fas fa-trash-alt"></i></button></td> -->
			<!-- delete -->

					<!-- <div class="modal fade delete-pop{{$message->created_at}}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
													<input hidden="" name="sender_id" value="{{$message->sender_id}}">
													<input hidden="" name="receiver_id" value="{{$message->receiver_id}}">
													<input hidden="" name="created_at" value="{{$message->created_at}}">
												
												<button type="submit" class="btn btn-outline-light">Yes</button>  
												<button class="btn btn-outline-light"  data-dismiss="modal">No</button>
												</form>
											</div>
										</div>   
									</div>
								</div>
							</div>
						</div>
					</div> -->
			</td>
			
			
		</tr>
		@else
		<tr>
		<td><a href="{{route('MemberMessageDetails')}}" onclick="event.preventDefault();
                                                     document.getElementById('{{$message->created_at}}-form').submit();" class="message-mail"><i class="far fa-envelope text-danger"></i>  <strong>{{$message->created_at}} | {{$message->sender_name}} : </strong>{{$message->subject}} ->  {{$message->message}} 
			</a>
		<form id="{{$message->created_at}}-form" action="{{ route('MemberMessageDetails') }}" method="POST" style="display: none;">
						@csrf
						<input hidden="" name="created_at" value="{{$message->created_at}}">
					</form></td>
			<!-- <td><button class="btn-delete-message " data-toggle="modal" data-target=".delete-pop{{$message->created_at}}"><i class="fas fa-trash-alt"></i></button></td> -->

					<!-- delete -->

					<!-- <div class="modal fade delete-pop{{$message->created_at}}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
													<input hidden="" name="sender_id" value="{{$message->sender_id}}">
													<input hidden="" name="receiver_id" value="{{$message->receiver_id}}">
													<input hidden="" name="created_at" value="{{$message->created_at}}">
												
												<button type="submit" class="btn btn-outline-light">Yes</button>  
												<button class="btn btn-outline-light"  data-dismiss="modal">No</button>
												</form>
											</div>
										</div>   
									</div>
								</div>
							</div>
						</div>
					</div> -->
		</tr>
		@endif
		@endforeach
	</tbody>
</table>



  
  </div>

 
  </div>
</div>   
   
   
   </div>

				</div>
			</article>
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