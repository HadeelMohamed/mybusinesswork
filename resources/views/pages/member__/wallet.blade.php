@extends('layouts.website')
@section('title','Profile')
@section('content')

<style type="text/css">
  #dd{
    border: 1px solid red;
  }
  .wallet-sec{
  	margin-left: 20px;
  	width: 160px;
  }
    .wallet-sec:lang(ar){
    	  	margin-left: 0px;
  	margin-right: 20px;


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
						You Must pay to active your Account	 -->
						{{-- <a href="{{route('Authed_Member_Wallet_charge')}}" class="btn  btn-dark btn-pay">@lang('website.pay_now')</a> --}}
					</div>
					@endif
					<div class="back-red active-acc">

						@lang('website.wallet_message_title_1')
						<br>
						@lang('website.wallet_message_title_2')
					</div>
					<div class="container-fluid">
			  		<div class="inline-facts-wrap back-red wallet-sec row" >
						  <div class="col-12 text-center">
						  	<span class="num"><i class="fas fa-dollar-sign"></i> {{Auth::user()->wallet}}<h5 class="">@lang('website.balance')</h5></span>
							</div>
						</div>



<a href="{{route('Authed_Member_Wallet_charge')}}" class="inline-facts-wrap back-red wallet-sec row" >
						  <div class="col-12 text-center">
						  	<span class="num"><i class="fas fa-money-bill"></i> <h5 class="">@lang('website.charge_my_wallet')</h5></span>
							</div>
						</a>

					
					</div>
					<div class="clear"></div>
					<div class="card">
  <div class="card-header">
    @lang('website.transaction_history')
  </div>
  <div class="card-body">
  
    <div class="table-scroll">


<table id="table_id" class="display table-first table table-bordered" >
	<thead>
		<tr>
			<th><center>#</center></th>
			<th>@lang('website.transaction_name')</th>
			<th>@lang('website.cost')</th>
			<th>@lang('website.date')</th>
		</tr>
	</thead>
	<tbody>
		@if(isset($wallet_data))
		@foreach($wallet_data as $index => $wallet)
		<tr>
			<td><center>{{++$index}}</center></td>
			<td>{{$wallet->trans_name}}</td>
			<td>{{$wallet->cost}} $</td>
			<td>{{$wallet->created_at}}</td>
		</tr>
		@endforeach
		@endif
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
@include('partials.member.alerts')
<script>
 

$(document).ready( function () {
    $('#table_id').DataTable( {
  } );
} );
</script>

@endsection