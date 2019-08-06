@extends('layouts.website')
@section('title','Profile')
@section('content')

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
            <div class="card">
               <div class="card-header">
                  @lang('website.wallet_charge') 
               </div>
               <div class="card-body">
                  <p></p>
                  
                  <!-- <div class="col-auto my-1">
                     <div class="custom-control custom-checkbox mr-sm-2">
                        <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                        <label class="custom-control-label" for="customControlAutosizing">i Agree terms & Condition</label>
                     </div>
                  </div> -->
                  <h5 class="payment-h5">@lang('website.by')</h5>
                  <div class="clear"></div>
                  <div class="payment-div">
                     <!-- <input type="radio" name="payment"><br>
                        -->
                     <a  href="https://mybusinessme.com/knet/knet">
                     <img src="{{asset('website/images/paypall.jpg')}}" class="img-payball">
                     </a>
                  </div>
                  {{--
                  <div class="payment-div">
                     <!-- <input type="radio" name="payment"><br>
                        -->
                     <a  href="#" data-toggle="modal" data-target=".pay-pop">
                     <img src="{{asset('website/images/master.png')}}" class="img-payball">
                     </a>
                  </div>
                  <div class="payment-div">
                     <!-- <input type="radio" name="payment"><br>
                        -->
                     <a  href="#" data-toggle="modal" data-target=".pay-pop">
                     <img src="{{asset('website/images/visa.png')}}" class="img-payball">
                     </a>
                  </div>
                  --}}
               </div>
            </div>
         </div>
      </article>
   </div>
</div>





@include('partials.member.alerts')
@include('partials.website.footer')
<!-- social -->
<script src="{{asset('website/js/plugins.js')}}" type="text/javascript"></script>
<script src="{{asset('website/js/script.js')}}" ></script>
<script src="{{asset('website/js/social.js')}}" ></script>
<script src="{{asset('website/js/my-js.js')}}" ></script>
@endsection