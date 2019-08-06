@extends('layouts.website')
@section('title','Profile')
@section('content')
@section('social')
<meta http-equiv="pragma" content="no-cache">
@endsection

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
                  <table class="table table-bordered table-striped">
                     <tr>
                        <td>@lang('website.min')</td>
                        <td>@lang('website.max')</td>
                     </tr>
                     <tr>
                        <td>10$</td>
                        <td>100$</td>
                     </tr>
                  </table>
                   
               </div>
            </div>
         </div>
      </article>
   </div>
</div>

   

   <form action="{{asset('/')}}knet/PHP/SendPerformREQuest.php" method="post">
      @csrf
      <input type="hidden" name="product" value="Camera">
      <input type="hidden" name="price" value="1">
      <input type="hidden" name="qty" value="1">
      <input type="hidden" name="total" value="1">
      <table width="70%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
        <tr>
          <td width="20%" class="tdfixed"><strong>Name:</strong></td>
          <td width="80%" class="tdwhite"><input type="text" name="name" length="30"></td>
        </tr>
        <tr>
          <td class="tdfixed"><strong>Address:</strong></td>
          <td class="tdwhite"><input type="text" name="address" length="30"></td>
        </tr>
        <tr>
          <td class="tdfixed"><strong>Postal Code:</strong></td>
          <td class="tdwhite"><input type="text" name="postal" length="30"></td>
        </tr>
        <tr>
          <td class="tdwhite"></td>
          <td class="tdwhite"><input type="submit" value="Buy"></td>
        </tr>
      </table>
    </form>

</div>


@include('partials.website.footer')
@include('partials.member.alerts')
<!-- social -->
<script src="{{asset('website/js/plugins.js')}}" type="text/javascript"></script>
<script src="{{asset('website/js/script.js')}}" ></script>
<script src="{{asset('website/js/social.js')}}" ></script>
<script src="{{asset('website/js/my-js.js')}}" ></script>


@endsection