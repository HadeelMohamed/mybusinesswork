@extends('layouts.website')
@section('title','Profile')
@section('content')

<style type="text/css">
  #dd{
    border: 1px solid red;
  }
</style>
<style>
.inline-facts-wrap{
										border-radius:10px;
										padding:10px;
										margin-top:10px;
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
					<div class="back-red active-acc">
						<!-- <i class="fas fa-exclamation-triangle"></i>
						@lang('website.payment_required')
						You Must pay to active your Account	
						<button class="btn  btn-dark btn-pay">@lang('website.pay_now')</button> -->
					</div>
					@endif
					<div class="counter-side-dash">
	    			<div class="row">
					  	<div class="col-md-3  col-6 ">
								<div class="inline-facts-wrap back-red">
									<div class="inline-facts text-center">
										<i class="fas fa-dollar-sign"></i>
										<div class="milestone-counter text-center">
											<div class="stats animaper">
												<div class="num" data-content="0" data-num="{{Auth::user()->wallet}}">0</div>
											</div>
										</div>
										<h6 class="text-center">@lang('website.wallet')</h6>
									</div>
								</div>
							</div>
							<div class="col-md-3  col-6 ">
								<div class="inline-facts-wrap back-red">
									<div class="inline-facts text-center">
										<i class="fas fa-bullhorn"></i>
										<div class="milestone-counter text-center">
											<div class="stats animaper">
												<div class="num" data-content="0" data-num="{{$exhibitionCount}}">0</div>
											</div>
										</div>
										<h6 class="text-center">@lang('website.exhibitions')</h6>
									</div>
								</div>
							</div>  
							<!-- <div class="col-md-3  col-6">
								<div class="inline-facts-wrap back-red">
									<div class="inline-facts text-center">
										<i class="fas fa-gavel"></i>
										<div class="milestone-counter text-center">
											<div class="stats animaper">
												<div class="num" data-content="0" data-num="12168">0</div>
											</div>
										</div>
										<h6 class="text-center">@lang('website.auctions')</h6>
									</div>
								</div>
							</div> -->
							<!-- <div class="col-md-3  col-6">
								<div class="inline-facts-wrap back-red">
									<div class="inline-facts text-center">
										<i class="fas fa-envelope"></i>
										<div class="milestone-counter text-center">
											<div class="stats animaper">
												<div class="num" data-content="0" data-num="12168">0</div>
											</div>
										</div>
										<h6 class="text-center">@lang('website.tenders')</h6>
									</div>
								</div>
							</div> -->
						</div>
						<div style="height:30px;"></div>
					  <div class="card">
  						<div class="card-header">Recent Activities</div>
  						<div class="card-body">
  							<div class="item-activity">
									<p class="card-text">With supporting text below as a natural lead-in to additional content. With supporting text below as a natural lead-in to additional content.With supporting text below as a natural lead-in to additional content.</p>
    							<button class="btn  btn-activity btn-sm "  data-toggle="modal" data-target=".delete-pop"><i class="fas fa-trash-alt"></i></button>
    						</div>
							</div>
						</div>   
					</div>
				</article>
			</div>
		</div>
	</div>


@include('partials.website.footer')
@include('partials.member.alerts');
<script>
 

$(document).ready( function () {
    $('#table_id').DataTable( {
  } );
} );
</script>

@endsection