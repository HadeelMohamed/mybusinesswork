@php 
$lang = LaravelLocalization::getCurrentLocale()
@endphp
@extends('layouts.website')
@section('title','Profile')
@section('content')
@php
$subscribed = DB::table('exh_exhibitors_subscribes')->where('exh_id',$exhibitor_details->exh_id)->where('exhibitor_id',$exhibitor_details->exhibitor_id)->where('paid',1)->count();
$exhibitor_profile = DB::table('exhibitor_details')->where('exh_id',$exhibitor_details->exh_id)->where('user_id',$exhibitor_details->exhibitor_id)->count();
@endphp

<style type="text/css">
  #dd{
    border: 1px solid red;
  }
</style>
<!--...........................profile-head...................-->
<div class="big-dash">
  <div class="container">
    @include('partials.member.admin_panel_exhibitor')
    <div class="row">
    @include('partials.member.exhibition_side_bar')

<!--   ....................article....................-->
<article class="col-md-9">
  <div class="container-dashborad">
    @include('partials.member.main_title_exhibitor')
    @if(isset($AllReadyExist))
      @if($AllReadyExist == 0)
        <div class="back-red active-acc"><i class="fas fa-exclamation-triangle"></i>
           @lang('website.you_must_complete_your_information_to_start_using_your_account')
        </div>
      @endif
    @endif

    @if(isset($AllReadyExist))
    @if(Auth::user()->wallet < 10 && $AllReadyExist == 0)
      <!-- <div class="back-red active-acc"><i class="fas fa-exclamation-triangle"></i> @lang('website.payment_required') You Must pay to active your Account  -->
      <a href="{{route('Authed_Member_Wallet_charge')}}" class="btn  btn-dark btn-pay">@lang('website.pay_now')</a>
      </div>
    @endif
    @endif
   @if(Session::has('created_success'))
   <div class="back-green active-acc"><i class="fas fa-exclamation-triangle"></i> @lang('website.creaetd_success')</div>
   @endif
   <form id="update_member_form" action="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibition/join_exhibitorPost" method="post" enctype="multipart/form-data">
    @csrf
    @if(isset($exhibitor_details))
    <input hidden="" name="exh_id" value="{{$exhibitor_details->exh_id}}">
    <input hidden="" name="exh_slug" value="{{$exh_slug}}">
    @endif
   <div class="container-fluid">
   <div class="row">
     <div class="col-md-8">

<style type="text/css">
  .a-tabs{
 margin-right: -12px;
    color: #000;
    border-radius: 10px;
    padding: 5px 15px;
    margin-bottom: 10px;
    display: inline-block;
    background-color: #333;
    color: #fff !important;
    font-size: 20px;
    display: inline-block;
  }
  .a-tabs:lang(ar){
     margin-left: -12px;
          margin-right: 0px;


  }

  .a-tabs-active{
   background-color: #e60000 !important;
    border-bottom: none;
    box-shadow: 0px 0px 3px #000;
    border-radius: 10px;
    z-index: 3;
    position: relative;

    
  }

.form-control, .nice-select{
      border: 1px solid #333 !important;
    box-shadow: 1px 1px 5px #b5adad;
}
</style>

      <div>
        <a class="a-tabs a-tabs-active" href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibition/join_exhibitor/{{$exh_slug}},2">@lang('website.exhibitor_information')</a>  <a class="a-tabs " href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibition/join_exhibitor_products/{{$exh_slug}}">@lang('website.exhibitor_products')</a>
      </div>


      <div class="form-group">
      <label for="exampleInputEmail1">@lang('website.account_type')</label>
      <br>
      <!-- <div class="header-search-select-item select-admin"> -->
        <select data-placeholder="{{trans('website.account_type')}}"  name="account_type_id" id="account_type_id" required="" class="form-control" style="height: 40px;">
          <!-- <option selected disabled="" value="">@lang('website.account_type')</option> -->
          @if(isset($exhibitor_details))

            @foreach($account_types as $account_type)
              @if($account_type->account_type_id == $exhibitor_details->account_type_id)
              <option selected value="{{$account_type->account_type_id}}">{{$account_type->account_type_name}}</option>
              @else
              <option value="{{$account_type->account_type_id}}">{{$account_type->account_type_name}}</option>
              @endif
            @endforeach
          @else
            @foreach($account_types as $account_type)
              <option value="{{$account_type->account_type_id}}">{{$account_type->account_type_name}}</option>
            @endforeach
          @endif
        </select>
      <!-- </div> -->
    </div>

    <div class="form-group">
      <label for="name">@lang('website.name')</label>
      @if(isset($exhibitor_details))
      <input type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="{{trans('website.business_name_or_company_name')}}" name="name" required="" value="{{$exhibitor_details->exhibitor_name}}">
      @else
      <input type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="{{trans('website.business_name_or_company_name')}}" name="name" required="" value="{{Auth::user()->name}}">
      @endif
    </div>
  <div class="form-group">
    <label for="exampleInputEmail1">@lang('website.country')</label>
    <div class="header-search-select-item select-admin">
      <select data-placeholder="All Categories" class="chosen-select" name="country_id" id="country_id" required="">
        <option selected disabled="" value="">All Countries</option>
        @if(isset($exhibitor_details))
          @foreach($countries as $country)
            @if($country->id == $exhibitor_details->country_id)
            <option selected value="{{$country->id}}">{{$country->country}}</option>
            @else
            <option value="{{$country->id}}">{{$country->country}}</option>
            @endif
          @endforeach
        @else
           @foreach($countries as $country)
            <option value="{{$country->id}}">{{$country->country}}</option>
          @endforeach
        @endif
      </select>
    </div>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">@lang('website.business_category')</label>
    <div class="header-search-select-item select-admin">
      <select data-placeholder="All Categories" class="chosen-select" name="category_id" id="category_id" required="">
        <option selected disabled="" value="">All Categories</option>
        @if(isset($exhibitor_details))
          @foreach($main_categories as $main_category)
            @if($main_category->id == $exhibitor_details->category_id)
            <option selected value="{{$main_category->id}}">{{$main_category->name}}</option>
            @else
            <option value="{{$main_category->id}}">{{$main_category->name}}</option>
            @endif
          @endforeach
        @else
          @foreach($main_categories as $main_category)
            <option value="{{$main_category->id}}">{{$main_category->name}}</option>
          @endforeach
        @endif
      </select>
    </div>
  </div>
      
{{--
   <!-- <div class="form-group">
    <label for="exampleInputEmail1">business sub Category</label>
    <div class="header-search-select-item select-admin">
      <select data-placeholder="All Categories" class="form-control" id="sub_category_id" name="sub_category_id" required="">
        <option selected disabled="" value="">All Sub Categories</option>

        @if(isset($exhibitor_details))
          @foreach($main_categories as $main_category)
          @if($main_category->parent_id != "null" and $main_category->id == $exhibitor_details->sub_category_id)
          <option selected value="{{$main_category->id}}">{{$main_category->name}}</option>
          @endif
          @endforeach
        @else
          @foreach($main_categories as $main_category)
          <option selected value="{{$main_category->id}}">{{$main_category->name}}</option>
          @endforeach
        @endif
      </select>
    </div>
  </div> -->
  --}}
  <div class="form-group">
    <label for="exampleInputEmail1">@lang('website.about')</label>
    @if(isset($exhibitor_details->about))
    <textarea class="form-control" id="about" aria-describedby="aboutHelp" placeholder="" name="about">{{$exhibitor_details->about}}</textarea>
    @else
    <textarea class="form-control" id="about" aria-describedby="aboutHelp" placeholder="" name="about"></textarea>
    @endif
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">@lang('website.services')</label>
    @if(isset($exhibitor_details->services))
    <textarea class="form-control" id="services" aria-describedby="servicesHelp" placeholder="" name="services">{{$exhibitor_details->services}}</textarea>
    @else
    <textarea class="form-control" id="services" aria-describedby="servicesHelp" placeholder="" name="services"></textarea>
    @endif
  </div>






<div class="accordion" id="accordionExample">
  <div class="card margin-top-ac">
    <div class="card-header  header-accordion" id="headingOne">
      <h2 id="contact_section_id" class="mb-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
       <div class="div-icon"><i class="fas fa-phone"></i></div>  @lang('website.contact_info')
<!--        <div class="div-plus-dash"><i class="fas fa-plus"></i></div>
 -->      </h2>

  
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
       <div class="form-group">
    <label for="exampleInputEmail1">@lang('website.address') </label>
    @if(isset($exhibitor_details->address))
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="address" value="{{$exhibitor_details->address}}">
    @else
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="address">
    @endif
  </div>
      
      
      
      
  <div class="form-group">
    <label for="phone">@lang('website.phone')  </label>
    @if(isset($exhibitor_details->phone))
    <input type="text" class="form-control" id="profile_phone" onkeypress="return onlyNumbers();" aria-describedby="emailHelp" placeholder="" name="phone" required="" value="{{$exhibitor_details->phone}}">
    @else
    <input type="text" class="form-control" id="profile_phone" onkeypress="return onlyNumbers();" aria-describedby="emailHelp" placeholder="" name="phone" required="">
    @endif
  </div>
  
  
  
  <div class="form-group">
    <label for="emailCeo">@lang('website.email')  </label>
    @if(isset($exhibitor_details->ceo))
    <input type="text" class="form-control" id="emailCeo" aria-describedby="emailHelp" placeholder="" name="ceo" value="{{$exhibitor_details->ceo}}">
    @else
    <input type="text" class="form-control" id="emailCeo" aria-describedby="emailHelp" placeholder="" name="ceo">
    @endif
  </div>
  
  
  <div class="form-group">
    <label for="exampleInputEmail1">@lang('website.marketing')  </label>
    @if(isset($exhibitor_details->marketing))
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{trans('website.email_or_phone')}}" name="marketing" value="{{$exhibitor_details->marketing}}">
    @else
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{trans('website.email_or_phone')}}" name="marketing">
    @endif
  </div>
  
   <div class="form-group">
    <label for="exampleInputEmail1">@lang('website.sales')  </label>
    @if(isset($exhibitor_details->sales))
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{trans('website.email_or_phone')}}" name="sales" value="{{$exhibitor_details->sales}}">
    @else
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{trans('website.email_or_phone')}}" name="sales">
    @endif
  </div>
  
   <div class="form-group">
    <label for="exampleInputEmail1">@lang('website.email')   </label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value="{{Auth::user()->email}}" name="email" disabled="">
  </div>
  
  <div class="form-group">
    <label for="exampleInputEmail1">@lang('website.website')    </label>
    @if(isset($exhibitor_details->website))
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="website" value="{{$exhibitor_details->website}}">
    @else
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="website">
    @endif
  </div>
      
      
      </div>
    </div>
  </div>
  
  
  
  
  <div class="card margin-top-ac">
    <div class="card-header  header-accordion" id="headingTwo">
      <h2 class="mb-0" data-toggle="collapse" data-target="#collapseheadingTwo" aria-expanded="false" aria-controls="collapseheadingTwo">
       <div class="div-icon"><i class="fas fa-share-square"></i></div>   @lang('website.social_media_links')
<!--        <div class="div-plus-dash"><i class="fas fa-plus"></i></div> -->
      </h2>

    </div>

    <div id="collapseheadingTwo" class="collapse" aria-labelledby="headingheadingTwo" data-parent="#accordionExample">
      <div class="card-body">
      
         <div class="form-group">
    <label for="exampleInputEmail1">Facebook </label>
    @if(isset($exhibitor_details->facebook))
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="https://www.facebook.com/your-profile" name="facebook" value="{{$exhibitor_details->facebook}}">
    @else
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="https://www.facebook.com/your-profile" name="facebook">
    @endif
  </div>
      
      
      
      <div class="form-group">
    <label for="exampleInputEmail1">Instagram  </label>
    @if(isset($exhibitor_details->instagram))
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="instagram" value="{{$exhibitor_details->instagram}}">
    @else
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="instagram">
    @endif
  </div>
  
  
  
  <div class="form-group">
    <label for="exampleInputEmail1">Linkedin  </label>
    @if(isset($exhibitor_details->linkedin))
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="linkedin" value="{{$exhibitor_details->linkedin}}">
    @else
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="linkedin">
    @endif
  </div>
  
  
  <div class="form-group">
    <label for="exampleInputEmail1">Twitter  </label>
    @if(isset($exhibitor_details->twitter))
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="twitter" value="{{$exhibitor_details->twitter}}">
    @else
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="twitter">
    @endif
  </div>
  
   <div class="form-group">
    <label for="exampleInputEmail1">Youtube  </label>
    @if(isset($exhibitor_details->youtube))
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="youtube" value="{{$exhibitor_details->youtube}}">
    @else
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="youtube">
    @endif
  </div>
  
   <div class="form-group">
    <label for="exampleInputEmail1">Snapchat   </label>
    @if(isset($exhibitor_details->snapchat))
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="snapchat" value="{{$exhibitor_details->snapchat}}">
    @else
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="snapchat">
    @endif
  </div>
  
  
      
      
      </div>
    </div>
  </div>





</div>



  
  </div>
<!--   ....end... -->
  
  <div class="col-md-4">
  
  
  
<h4 class="h4-upload">@lang('website.upload_logo')</h4>
<div class="position-relative item-upload-expo">
  <label for="logo-btn" class="upload-btn-expo"><i class="fas fa-edit"></i></label>
  <input id="logo-btn" type="file" style="display:none;" name="logo">
  
  @if(isset($exhibitor_details->profile_pic))
  <img id="logo_preview" src="{{url('/images')}}/en/exhibitors/med/{{$exhibitor_details->profile_pic}}" width="100%">
  @else
  <img id="logo_preview" src="" width="100%">
  @endif
  
  <!-- <img id="logo_preview" src="" width="100%"> -->
</div>
  
  
<h4 class="h4-upload">@lang('website.upload_cover')</h4>
<div class="position-relative item-upload-expo">
  <label for="cover-btn" class="upload-btn-expo"><i class="fas fa-edit"></i></label>
  <input id="cover-btn" type="file" style="display:none;" name="cover">
  @if(isset($exhibitor_details->profile_cover))
  <img id="cover_preview" src="{{url('/images')}}/en/exhibitors/med/{{$exhibitor_details->profile_cover}}" width="100%">
  @else
  <img id="cover_preview" src="" width="100%">
  @endif
  <!-- <img id="cover_preview" src="" width="100%"> -->
</div>
  
  </div>
  </div>
  
  </div>
  
<!--  .........................accordion.......................--> 




 
  
  
  <!--  .........................save.......................--> 
  
  
  
  </form>

<style type="text/css">
  .button-save{

    margin-top: 50px;
  }

  .text-center-btn{
    text-align: center;
  }
  .text-right-btn{
    text-align: right;
  }
.text-right-btn:lang(ar){
    text-align: left;
  }
  


}
</style>

    <div class="col-md-8">

   <div class=" button-save">

<div class="container-fluid">
  <div class="row">
{{--
<div class="col-md-4 ">
  <div class="text-center-center">
<a class="div-number">1</a>
<a id="update_btn" class="btn btn-danger text-white">@lang('website.update')</a>
</div>
</div>
--}}



@if($exhibitor_profile == 0)
<div class="col-md-4 ">
<div class="text-center-center">
<a id="update_btn" class="btn btn-danger text-white">@lang('website.create')</a>
</div>
</div>
@endif
@if($subscribed > 0)
<div class="col-md-4">
  <div class="text-center-center">
  <a class="btn btn-danger text-white" href="{{url('/')}}/{{$lang}}/ExhibitorPreview/{{$exh_slug}}/{{$exhibitor_details->slug}}">@lang('website.preview')</a>
</div>

</div>
@endif

@if($subscribed == 0)
<div class="col-md-4 ">
<div class="text-center-center">
<a id="subscribe_btn" class="btn btn-danger text-white">@lang('website.subscribe')</a>
</div>
</div>
@endif

{{--
  <center><a class="btn btn-danger text-white" href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exh/Exhibitions?q=&cat=&country=">@lang('website.exhibitions')</a></center>
  --}}



  </div>


</div>

  
  
  
  

  
    <!-- <button class="btn btn-dark">Cancel</button> -->

  </div>
</div>


</article>
   
   </div>
   </article>

</div>
</div>
      </div>

      
      





<!-- Modal -->
<div class="modal fade login-btn"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-width modal-dialog-centered" role="document">
    <div class="modal-content">
      
      <div class="container-fluid">
      <div class="row">
      <div class="col-sm-4">
        <div class="row"><div><img src="images/banner-login.jpg" width="100%" class="banner-login" ></div></div></div>
           <div class="col-sm-8">
           
           <h3 class="h3-login">@lang('website.login_with_my_business')</h3>
           <div class="line-sec back-red"></div>
           
           
           
  <div class="form-group">
    <label for="exampleInputEmail1">@lang('website.email')</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{trans('website.email')}}">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">@lang('website.password')</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="{{trans('website.password')}}">
  </div>
  
  <div class="container-fluid">
  <div class="row">
  <div class="col-6">
  <div class="custom-control custom-checkbox my-1 mr-sm-2">
    <input type="checkbox" class="custom-control-input" id="customControlInline">
    <label class="custom-control-label" for="customControlInline">@lang('website.remember_me')</label>
  </div>
  </div>
    <div class="col-6 text-right">
   <a href="#" class="forget-pass">@lang('website.forgot_my_password_?')</a>
</div>
  </div>
  </div>
  
  <div class="text-right">
  <button class="btn btn-dark btn-login-su">@lang('website.login')</button>
  </div>

<div class="register">@lang('website.do_not_have_account_yet_?') <a href="#" class="register-link">@lang('website.register_now')</a></div>
           
           
           </div>
           
           
           
           
 
      
      </div>
      
      </div>
      
      
    <button class="btn-close-pop" data-dismiss="modal"><i class="fas fa-times"></i></button>  
     
    </div>
  </div>
</div>

<!-- message -->

<div class="modal fade message-pop"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-width modal-dialog-centered" role="document">
    <div class="modal-content">
      
      <div class="container-fluid">
      <div class="row">
      <div class="col-sm-4">
        <div class="row"><div><img src="images/banner-login.jpg" width="100%" class="banner-login" ></div></div></div>
           <div class="col-sm-8">
           
           <h3 class="h3-login">Welcome ., Sent your Message</h3>
           <div class="line-sec back-red"></div>
           
           
           
  <div class="form-group">
    <label for="exampleInputEmail1">Title message</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Message</label>
    <textarea type="" class="form-control" id="exampleInputPassword1" ></textarea>
  </div>
  
  
  
  <div class="text-right">
  <button type="submit" class="btn btn-dark btn-login-su">Send</button>
  </div>

           
           
           </div>
           
           
           
           
 
      
      </div>
      
      </div>
      
      
    <button class="btn-close-pop" data-dismiss="modal"><i class="fas fa-times"></i></button>  
     
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
        
        
                    <button class="btn btn-outline-light" >Yes</button>  
            <button class="btn btn-outline-light"  data-dismiss="modal">No</button>  

        </div>
        
        

        
        </div>   
           
           
           
           
 
      
      </div>
      
      </div>
      
      
     
    </div>
  </div>
</div>

<form id="ConfirmExhibitionSubscribeForm" method="post" action="{{route('ConfirmExhibitionSubscribe')}}">
  @csrf
  <input hidden="" name="exhibitor_id" value="{{Auth::user()->id}}">
  <input hidden="" name="exh_id" value="{{$exhibitor_details->exh_id}}">
  <input hidden="" name="wallet" value="{{Auth::user()->wallet}}">
  <input hidden="" name="exh_slug" value="{{$exh_slug}}">
  <input hidden="" name="flag" value="2">
</form>

@include('partials.website.footer')
<!-- social -->
<script src="{{asset('website/js/plugins.js')}}" type="text/javascript"></script>
<script src="{{asset('website/js/script.js')}}" ></script>
<script src="{{asset('website/js/social.js')}}" ></script>
<script src="{{asset('website/js/my-js.js')}}" ></script>

@include('partials.member.alerts')
<script type="text/javascript">
  var NotAllwedCharacters = [33,35,36,37,38,39];

$(document).ready(function(){


  $('.my_account_menu').hide();
  $('.my_profile_menu').show();

  if($('#category_id').val() == null){
    $('#sub_category_id').empty();
    $('#sub_category_id').append('<option value="0">All Sub Categories</option>');
  }


  // $(".allownumericwithdecimal").on("keypress keyup blur",function (event) {
  //           //this.value = this.value.replace(/[^0-9\.]/g,'');
  //    $(this).val($(this).val().replace(/[^0-9\.]/g,''));
  //           if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
  //               event.preventDefault();
  //           }
  //       });

 // $(".allownumericwithoutdecimal").on("keypress keyup blur",function (event) {    
 //           $(this).val($(this).val().replace(/[^\d].+/, ""));
 //            if ((event.which < 48 || event.which > 57)) {
 //                event.preventDefault();
 //            }
 //        });

$("#name").on("keypress",function (event) { 
  var n = NotAllwedCharacters.includes(event.which);
  
  if(n == true){
    console.log('not allowed');
    return false;
  }else{
    return event.which;
  }
});
 $(".allownumericwithoutdecimal").on("keypress keyup blur",function (event) { 
    return event.which !== 32; 
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });


  $('#SavePasswordChangesBtn').click(function(){
    var ConfirmPasswordInput = $('#ConfirmPasswordInput').val();
    var PasswordInput = $('#PasswordInput').val();
    // check empty
    if(PasswordInput != ''){
      
    }else{
      $('#PasswordInput').focus();
      return false;
    }

    if(ConfirmPasswordInput != ''){
      
    }else{
      $('#ConfirmPasswordInput').focus();
      return false;
    }

    if(PasswordInput === ConfirmPasswordInput){
      //ajax change password
      var url = "{{route('Authed_MemberChangePasswordPost')}}";
      var csrf_token = "{{ csrf_token() }}";
      $.ajax({
      /* the route pointing to the post function */
      url: url,
      type: 'POST',
      /* send the csrf-token and the input to the controller */
      data: {
              _token: csrf_token,
              password:PasswordInput,
              confirm_password:ConfirmPasswordInput
            },
      dataType: 'JSON',
      /* remind that 'data' is the response of the AjaxController */
      success: function (data) {
        if(data.status == 'success'){
          $('#PasswordInput').val('');
          $('#ConfirmPasswordInput').val('');
          alert(data.message);
          return false;
        }

        if(data.status == 'error'){
          alert(data.message);
          return false;
        }

      }
    }); 
    }else{
      alert('not matched');

    }
    
    // alert(ConfirmPasswordInput + '' + PasswordInput);
  });



  $('#category_id').change(function(){
    var category_value = $('#category_id').val();
    var url = '{{url('/')}}/{{$lang}}/Account/ListSubCategory/'+category_value;
    $.ajax({
              url: url,
              //dataType: '',
              type: 'get',
              contentType: 'application/x-www-form-urlencoded',
              data: [],
              success: function( data ){
                if(data.sub.length >0){
                  $('#sub_category_id').empty();
                  // $('#sub_category_id').append('<option>All Sub Categories</option>');
                  $.each(data.sub, function(k, v) {
                    $('#sub_category_id').append('<option value="' + v.id + '">' + v.category_title + '</option>');
                  });
                }else{
                  $('#sub_category_id').empty();
                  $('#sub_category_id').append('<option value="0">All Sub Categories</option>');
                }
              },
              error: function( jqXhr, textStatus, errorThrown ){
                  console.log( errorThrown );
              }
          });


  });



  $('#update_btn').click(function(){
    $('#update_member_form').submit();
  });

  $('#subscribe_btn').click(function(){
    $('#ConfirmExhibitionSubscribeForm').submit();
  });

  $('#update_member_form').submit(function() {
    // DO STUFF...
    if($('#account_type_id').val() == null){
      $('.nice-select').css("border", "1px solid #f90606");
      location.href = '#';
      return false; // return false to cancel form action

    }else if($('#name').val() == ''){

      $('#name').focus();
      return false; // return false to cancel form action

    }else if($('#category_id').val() == null){

      $('.nice-select').css("border", "1px solid #f90606");
      location.href = '#';
      return false; // return false to cancel form action

    }else if($('#emailCeo').val() == ''){

      $('.nice-select').css("border", "1px solid #ced4da");
      $('#collapseOne').addClass('show');
      $('#emailCeo').css("border", "1px solid #f90606");
      $('#emailCeo').focus();
      return false;

    }else if($('#profile_phone').val() == ''){

      $('.nice-select').css("border", "1px solid #ced4da");
      $('#collapseOne').addClass('show');
      $('#profile_phone').css("border", "1px solid #f90606");
      $('#profile_phone').focus();
      return false;

    }else{
      //$('#contact_section_id').removeClass('show');
      $('.nice-select').css("border", "1px solid #ced4da");
      $('.phone').css("border", "1px solid #ced4da");
      return true;
    }
    
  });

  function logo_preview(input) {

    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#logo_preview').attr('src', e.target.result);
        $('#logo_preview').attr('width', 150);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }


  

  $("#logo-btn").change(function() {
    logo_preview(this);
  });




  function cover_preview(input) {

    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#cover_preview').attr('src', e.target.result);
        $('#cover_preview').attr('width', 150);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }


  

  $("#cover-btn").change(function() {
    cover_preview(this);
  });

});


</script>

<script type="text/javascript">





function onlyNumbers(evt)
{
var e = event || evt; // for trans-browser compatibility
var charCode = e.which || e.keyCode;

if (charCode > 31 && (charCode < 48 || charCode > 57))
    return false;

return true;

}
</script>
@endsection