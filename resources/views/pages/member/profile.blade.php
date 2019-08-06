@php 
$lang = LaravelLocalization::getCurrentLocale()
@endphp
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

		@if($AllReadyExist == 0)
      <div class="back-red active-acc"><i class="fas fa-exclamation-triangle"></i>
         @lang('website.you_must_complete_your_information_to_start_using_your_account')
      </div>
    @endif

		@if(Auth::user()->wallet < 10 && $AllReadyExist == 0)
			<!-- <div class="back-red active-acc"><i class="fas fa-exclamation-triangle"></i> @lang('website.payment_required') You Must pay to active your Account  -->
			<a href="{{route('Authed_Member_Wallet_charge')}}" class="btn  btn-dark btn-pay">@lang('website.pay_now')</a>
			</div>
		@endif
   @if(Session::has('created_success'))
   <div class="back-green active-acc"><i class="fas fa-exclamation-triangle"></i> @lang('website.creaetd_success')</div>
   @endif
   <form id="update_member_form" action="{{route('Authed_Member_Profile_post')}}" method="post" enctype="multipart/form-data">
   	@csrf
    <input hidden="" id="exh_slug_session" name="exh_slug_session" value="{{Auth::user()->exh_slug_session}}">
   <div class="container-fluid">
    @if (count($errors) > 0)

            <div class="alert alert-danger">

                <strong>Whoops!</strong> There were some problems with your input.

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif
   <div class="row">

     <div class="col-md-8">
      <div class="form-group">
      <label for="exampleInputEmail1">@lang('website.account_type')</label>
      <br>
      <!-- <div class="header-search-select-item select-admin"> -->
        <select data-placeholder="{{trans('website.account_type')}}"  name="account_type_id" id="account_type_id" required="">
          <!-- <option selected disabled="" value="">@lang('website.account_type')</option> -->
          @if(isset($member_details))

            @foreach($account_types as $account_type)
              @if($account_type->account_type_id == $member_details->account_type_id)
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
      @if(isset($member_details))
      <input type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="{{trans('website.business_name_or_company_name')}}" name="name" required="" value="{{$member_details->member_name}}">
      @else
      <input type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="{{trans('website.business_name_or_company_name')}}" name="name" required="" value="{{Auth::user()->name}}">
      @endif
    </div>
  <div class="form-group">
    <label for="exampleInputEmail1">@lang('website.country')</label>
    <div class="header-search-select-item select-admin">
      <select data-placeholder="All Categories" class="chosen-select" name="country_id" id="country_id" required="">
        <option selected disabled="" value="">All Countries</option>
        @if(isset($member_details))
          @foreach($countries as $country)
            @if($country->id == $member_details->country_id)
            <option selected value="{{$country->id}}">{{$country->name}}</option>
            @else
            <option value="{{$country->id}}">{{$country->name}}</option>
            @endif
          @endforeach
        @else
           @foreach($countries as $country)
            <option value="{{$country->id}}">{{$country->name}}</option>
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
        @if(isset($member_details))
          @foreach($main_categories as $main_category)
            @if($main_category->id == $member_details->category_id)
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

        @if(isset($member_details))
          @foreach($main_categories as $main_category)
          @if($main_category->parent_id != "null" and $main_category->id == $member_details->sub_category_id)
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
    <label for="exampleInputEmail1">@lang('website.business_information')</label>
    @if(isset($member_details->about))
    <textarea class="form-control" id="about" aria-describedby="aboutHelp" placeholder="" name="about">{{$member_details->about}}</textarea>
    @else
    <textarea class="form-control" id="about" aria-describedby="aboutHelp" placeholder="" name="about"></textarea>
    @endif
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">@lang('website.services')</label>
    @if(isset($member_details->services))
    <textarea class="form-control" id="services" aria-describedby="servicesHelp" placeholder="" name="services">{{$member_details->services}}</textarea>
    @else
    <textarea class="form-control" id="services" aria-describedby="servicesHelp" placeholder="" name="services"></textarea>
    @endif
  </div>
  
  </div>
  
  
  <div class="col-md-4">
  
  
  
<h4 class="h4-upload">@lang('website.upload_logo')</h4>
<div class="position-relative item-upload">
  <label for="logo-btn" class="upload-btn"><i class="fas fa-edit"></i></label>
  <input id="logo-btn" type="file" style="display:none;" name="logo" onchange="GetFileSize()">
  @if(isset($member_details->profile_pic))
  <img id="logo_preview" src="{{url('/images')}}/en/med/{{$member_details->profile_pic}}" width="100%">
  @else
  <img id="logo_preview" src="" width="100%">
  @endif
</div>
  
  
<h4 class="h4-upload">@lang('website.upload_cover')</h4>
<div class="position-relative item-upload">
  <label for="cover-btn" class="upload-btn"><i class="fas fa-edit"></i></label>
  <input id="cover-btn" type="file" style="display:none;" name="cover">
  @if(isset($member_details->profile_cover))
  <img id="cover_preview" src="{{url('/images')}}/en/med/{{$member_details->profile_cover}}" width="100%">
  @else
  <img id="cover_preview" src="" width="100%">
  @endif
</div>
  
  </div>
  </div>
  
  </div>
  
<!--  .........................accordion.......................--> 



<div class="accordion" id="accordionExample">
  <div class="card margin-top-ac">
    <div class="card-header  header-accordion" id="headingOne">
      <h2 id="contact_section_id" class="mb-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
       <div class="div-icon"><i class="fas fa-phone"></i></div>  @lang('website.contact_info')
      </h2>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
       <div class="form-group">
    <label for="exampleInputEmail1">@lang('website.address') </label>
    @if(isset($member_details->address))
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="address" value="{{$member_details->address}}">
    @else
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="address">
    @endif
  </div>
      
      
      
      
  <div class="form-group">
    <label for="phone">@lang('website.phone')  </label>
    @if(isset($member_details->phone))
    <input type="number" class="form-control" id="profile_phone" onkeypress="return onlyNumbers();" aria-describedby="emailHelp" placeholder="" name="phone" required="" value="{{$member_details->phone}}">
    @else
    <input type="number" class="form-control" id="profile_phone" onkeypress="return onlyNumbers();" aria-describedby="emailHelp" placeholder="" name="phone" required="">
    @endif
  </div>
  
  
  
  <div class="form-group">
    <label for="emailCeo">@lang('website.email')  </label>
    @if(isset($member_details->ceo))
    <input type="text" class="form-control" id="emailCeo" aria-describedby="emailHelp" placeholder="" name="ceo" value="{{$member_details->ceo}}">
    @else
    <input type="text" class="form-control" id="emailCeo" aria-describedby="emailHelp" placeholder="" name="ceo">
    @endif
  </div>
  
  
  <div class="form-group">
    <label for="exampleInputEmail1">@lang('website.marketing')  </label>
    @if(isset($member_details->marketing))
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{trans('website.email_or_phone')}}" name="marketing" value="{{$member_details->marketing}}">
    @else
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{trans('website.email_or_phone')}}" name="marketing">
    @endif
  </div>
  
   <div class="form-group">
    <label for="exampleInputEmail1">@lang('website.sales')  </label>
    @if(isset($member_details->sales))
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{trans('website.email_or_phone')}}" name="sales" value="{{$member_details->sales}}">
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
    @if(isset($member_details->website))
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="website" value="{{$member_details->website}}">
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
      </h2>
    </div>

    <div id="collapseheadingTwo" class="collapse" aria-labelledby="headingheadingTwo" data-parent="#accordionExample">
      <div class="card-body">
      
         <div class="form-group">
    <label for="exampleInputEmail1">Facebook </label>
    @if(isset($member_details->facebook))
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="https://www.facebook.com/your-profile" name="facebook" value="{{$member_details->facebook}}">
    @else
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="https://www.facebook.com/your-profile" name="facebook">
    @endif
  </div>
      
      
      
      <div class="form-group">
    <label for="exampleInputEmail1">Instagram  </label>
    @if(isset($member_details->instagram))
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="instagram" value="{{$member_details->instagram}}">
    @else
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="instagram">
    @endif
  </div>
  
  
  
  <div class="form-group">
    <label for="exampleInputEmail1">Linkedin  </label>
    @if(isset($member_details->linkedin))
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="linkedin" value="{{$member_details->linkedin}}">
    @else
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="linkedin">
    @endif
  </div>
  
  
  <div class="form-group">
    <label for="exampleInputEmail1">Twitter  </label>
    @if(isset($member_details->twitter))
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="twitter" value="{{$member_details->twitter}}">
    @else
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="twitter">
    @endif
  </div>
  
   <div class="form-group">
    <label for="exampleInputEmail1">Youtube  </label>
    @if(isset($member_details->youtube))
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="youtube" value="{{$member_details->youtube}}">
    @else
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="youtube">
    @endif
  </div>
  
   <div class="form-group">
    <label for="exampleInputEmail1">Snapchat   </label>
    @if(isset($member_details->snapchat))
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="snapchat" value="{{$member_details->snapchat}}">
    @else
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="snapchat">
    @endif
  </div>
  
  
      
      
      </div>
    </div>
  </div>


  <div class="card margin-top-ac">
    <div class="card-header  header-accordion" id="headingThree">
      <h2 class="mb-0" data-toggle="collapse" data-target="#collapseheadingThree" aria-expanded="false" aria-controls="collapseheadingThree">
       <div class="div-icon"><i class="fas fa-lock"></i></div>   @lang('website.change_password')
      </h2>
    </div>

    <div id="collapseheadingThree" class="collapse" aria-labelledby="headingheadingThree" data-parent="#accordionExample">
      <div class="card-body">
      
      <div class="form-group">
        <label for="PasswordInput">@lang('website.password') </label>
        <input type="password" class="form-control allownumericwithoutdecimal" id="PasswordInput"  aria-describedby="emailHelp">
      </div>
      
      
      
      <div class="form-group">
        <label for="ConfirmPasswordInput">@lang('website.confirm_password') </label>
        <input type="password" class="form-control allownumericwithoutdecimal" id="ConfirmPasswordInput"  aria-describedby="emailHelp">
      </div>

      <div class="form-group">
       <a id="SavePasswordChangesBtn" class="btn btn-danger text-white">@lang('website.save_changes')</a>
      </div>
  
  
  
  
  
  
      
      
      </div>
    </div>
  </div>


</div>
 
  
  
  <!--  .........................save.......................--> 
  
  
  
  </form>
<div class="text-center btn-lg button-save">
<a  id="update_btn" class="btn btn-danger text-white">@lang('website.update')</a>
  
    <!-- <button class="btn btn-dark">Cancel</button> -->

  </div>
   
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
<input id="session_data" hidden="" name="" value="{{Auth::user()->exh_slug_session}}">

<div id="success_redirect_modal" class="modal fade pop-adv" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle">
  <div class="modal-dialog modal-width-dashboard modal-dialog-centered" role="document" >
    <div class="modal-content div-inner-expo-dashboard" >
    
      <div class="bg-danger-pop"><i class="fas fa-check-circle"></i></div>
    <!-- <button class="btn-pop-expo-dashboard" ><i class="fas fa-times"></i></button>   -->
    <div class="inner-pop-dashborad">
   <div class="text-center">
  @lang('website.complete_exhibitor_profile')
<div class="text-center">
<object type="image/svg+xml" data="{{url('/website/images')}}/loader.svg" width="50">
</object>

</div>
<div class="text-center">@lang('website.preparing_to_redirect_to_exhibitor_profile')</div>
   </div>
    <!-- <div class="text-center"><button class="btn-red-pop close-pop-item">Close</button></div> -->
     </div>
    </div>
  </div>
</div>
<div id="shaddow_background" class="modal-backdrop fade" style="display: none;"></div>



<!-- describtion pop with scroll   1--> 
<!-- <div class="modal fade pop-adv show"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" style="display:block">
  <div class="modal-dialog modal-width-dashboard modal-dialog-centered" role="document" >
    <div class="modal-content div-inner-expo-dashboard" >
    
      <div class="bg-danger-pop"><i class="fas fa-check-circle"></i></div>
    <button class="btn-pop-expo-dashboard" ><i class="fas fa-times"></i></button>  
    <div class="inner-pop-dashborad">
   <div class="p-max-height">
  تهانينا، لقد أكملت بيانات حسابك التجاري بنجاح.<br>
في الخطوة التالية، ستبدأ في إنشاء بيانات جناحك داخل المعرض<br>
من فضلك تأكد من إدخال بياناتك وبيانات منتجاتك وخدماتك بشكل صحيح.<br>
<div class="text-center">
<object type="image/svg+xml" data="{{url('/website/images')}}/loader.svg" width="50">
</object>

</div>
<div class="text-center">جارى تحويلك لاستكمال بياناتك بالمعرض ...</div>
   </div>
     <div class="text-center"><button class="btn-red-pop close-pop-item">Close</button></div> -->
<!--      </div>
    </div>
  </div>
</div> -->



<!-- terms & condition      2 -->
<!-- <div class="modal fade pop-adv show"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" style="display:block">
  <div class="modal-dialog modal-width-dashboard modal-dialog-centered" role="document" >
    <div class="modal-content div-inner-expo-dashboard" >
    
      <div class="bg-danger-pop">
      <h3 class="h3-pop-dashborad"> 
      Before completing the registration, please read the terms and conditions of use
      </h3>
      </div>
    <button class="btn-pop-expo-dashboard" ><i class="fas fa-times"></i></button>  
    <div class="inner-pop-dashborad">
   <div class="p-max-height">
   Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autemLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem  
   </div> 
    
      <div class="custom-control custom-checkbox my-1 mr-sm-2">
    <input type="checkbox" class="custom-control-input" id="customControlInline15">
    <label class="custom-control-label" for="customControlInline15">Read all terms of use and terms</label>
  </div>
    <div class="row">
    <div class="col-6"><div class="text-center"><button class="btn-red-pop close-pop-item">I AGree, Continue</button> </div></div>
        <div class="col-6"><div class="text-center"><button class="btn-just-text">Dont Agree</button> </div></div>

    
    </div>
    
    
     </div>
    </div>
  </div>
</div> -->


 <!-- offer  3 -->

<!-- <div class="modal fade pop-adv show"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" style="display:block">
  <div class="modal-dialog modal-width-dashboard modal-dialog-centered" role="document" >
    <div class="modal-content div-inner-expo-dashboard" >
    
      
    <button class="btn-pop-expo-dashboard" ><i class="fas fa-times"></i></button>  
    <div class="inner-pop-dashborad">
   <img src="images/cover.jpg" width="100%" alt="">

    
    
    <div class="text-center">
    
    <button class="btn-red-pop-full ">I AGree, Continue</button>
    <button class="btn-red-pop-full2 close-pop-item">Disagree, continue browsing</button> 
 
    
    </div>
     </div>
    </div>
  </div>
</div> -->



<!-- mistake pop    4-->

<!-- <div class="modal fade pop-adv show"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" style="display:block">
  <div class="modal-dialog modal-width-dashboard modal-dialog-centered" role="document" >
    <div class="modal-content div-inner-expo-dashboard" >
    
      <div class="bg-danger-pop"><i class="fas fa-times-circle"></i></div>
    <button class="btn-pop-expo-dashboard" ><i class="fas fa-times"></i></button>  
    <div class="inner-pop-dashborad">
    <p class="p-circle-dashboard">Mistake Register</p>
    
    <div class="text-center"><button class="btn-red-pop close-pop-item">Close</button></div>
     </div>
    </div>
  </div>
</div> -->

<!-- describtion pop  5 -->
<!-- <div class="modal fade pop-adv show"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" style="display:block">
  <div class="modal-dialog modal-width-dashboard modal-dialog-centered" role="document" >
    <div class="modal-content div-inner-expo-dashboard" >
    
      <div class="bg-danger-pop"><i class="fas fa-check-circle"></i></div>
    <button class="btn-pop-expo-dashboard" ><i class="fas fa-times"></i></button>  
    <div class="inner-pop-dashborad">
   <div class="p-max-height">
   Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autemLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem  
   </div>
    
    <div class="text-center"><button class="btn-red-pop close-pop-item">Close</button></div>
     </div>
    </div>
  </div>
</div> -->



<!-- Sucsses pop    6 -->
<!-- <div class="modal fade pop-adv show"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" style="display:block">
  <div class="modal-dialog modal-width-dashboard modal-dialog-centered" role="document" >
    <div class="modal-content div-inner-expo-dashboard" >
    
      <div class="bg-danger-pop"><i class="fas fa-check-circle"></i></div>
    <button class="btn-pop-expo-dashboard" ><i class="fas fa-times"></i></button>  
    <div class="inner-pop-dashborad">
    <p class="p-circle-dashboard">Successfully Registered</p>
    
    <div class="text-center"><button class="btn-red-pop close-pop-item">Close</button></div>
     </div>
    </div>
  </div>
</div> -->



<!-- <div class="modal-backdrop fade show"></div> -->



@include('partials.website.footer')
<!-- social -->
<script src="{{asset('website/js/plugins.js')}}" type="text/javascript"></script>
<script src="{{asset('website/js/script.js')}}" ></script>
<script src="{{asset('website/js/social.js')}}" ></script>
<script src="{{asset('website/js/my-js.js')}}" ></script>



<script>
    function GetFileSize() {
      console.log('changed');
        var fi = document.getElementById('logo-btn'); // GET THE FILE INPUT.

        // VALIDATE OR CHECK IF ANY FILE IS SELECTED.
        if (fi.files.length > 0) {
            // RUN A LOOP TO CHECK EACH SELECTED FILE.
            for (var i = 0; i <= fi.files.length - 1; i++) {

                var fsize = fi.files.item(i).size;      // THE SIZE OF THE FILE.
                // console.log(fsize);
                if(fsize > 2097152){
                  // console.log('image > 2M Not Accepted');
                  alert('image size > 2M');
                  $('#logo_preview').empty();
                  $('#logo-btn').val('');
                }
                // document.getElementById('fp').innerHTML =
                //     document.getElementById('fp').innerHTML + '<br /> ' +
                //         '<b>' + Math.round((fsize / 1024)) + '</b> KB';
            }
        }
    }
</script>


{{--
<script type="text/javascript">
  $(document).ready(function(){
    @if (Session::has('success'))
      swal("Success", "{{session::get('success')}}", "success");
    @endif
    @if (Session::has('wallet_not_enough'))
      swal ( "Information" ,  "To Complete Your Profile Please Add Balance To Your Wallet" ,  "{{request('title')}}" );
    @endif

    @if (Session::has('no_change'))
      swal ( "Information" ,  "{{session::get('no_change')}}" ,  "info" );
    @endif

    @if (Session::has('error'))
      swal ( "Error" ,  "{{session::get('error')}}" ,  "{{request('title')}}" );
    @endif
  });
</script>

--}}
{{--
<script type="text/javascript">
  $(document).ready(function(){
     @if (request()->has('message'))
      swal ( "{{request('case')}}" ,  "{{request('message')}}" ,  "{{request('title')}}" );
      var url = window.location.href ;

      var urlSplit = url.split("?");
      console.log(urlSplit[0]);
      window.location.href = urlSplit[0];
    @endif
  });
</script>
--}}
<!-- <script type="text/javascript">
  $(document).ready(function(){
    $('#success_redirect_modal').css("display", "block").addClass("show");
    $('#shaddow_background').css("display", "block");
  });
</script> -->
@if(Auth::user()->exh_slug_session && Auth::user()->url_flag == 1)
<script type="text/javascript">
  console.log('1 redirect');
  $(document).ready(function(){
    console.log('redirect');
    $('#success_redirect_modal').css("display", "block").addClass("show");
    $('#shaddow_background').css("display", "block");
    
    window.setTimeout(function(){
      // show div to redirect after moments
      // Move to a new location or you can do something else    Exhibition/join_exhibitor
      var redirect = $('#session_data').val();
      var redirect = redirect+',2';
      console.log(redirect);
      window.location.href = "{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibition/join_exhibitor/"+redirect;
    }, 5000);
  });

</script>
@else
<script type="text/javascript">
  $(document).ready(function(){
     @if (request()->has('message'))
      swal ( "{{request('case')}}" ,  "{{request('message')}}" ,  "{{request('title')}}" );
      var url = window.location.href ;

      var urlSplit = url.split("?");
      console.log(urlSplit[0]);
      window.location.href = urlSplit[0];
    @endif
  });
</script>
@endif


{{--
@if(Auth::user()->exh_slug_session && Auth::user()->url_flag == 0)
<script type="text/javascript">
  console.log('no redirect : have url anf flag= 0');
</script>
@elseif(Auth::user()->exh_slug_session && Auth::user()->url_flag == 1)
<script type="text/javascript">
  $(document).ready(function(){
    console.log('redirect');
    
    window.setTimeout(function(){
      // show div to redirect after moments

      // Move to a new location or you can do something else    Exhibition/join_exhibitor
      var redirect = $('#session_data').val();
      window.location.href = "{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibition/join_exhibitor/"+redirect;
    }, 5000);
  });
</script>
@elseif(!(Auth::user()->exh_slug_session) && Auth::user()->url_flag == 0)
<script type="text/javascript">
  console.log('no redirect : no have url anf flag= 0');
</script>
@else
<script type="text/javascript">
  $(document).ready(function(){
    console.log('redirect');
    
    window.setTimeout(function(){
      // show div to redirect after moments

      // Move to a new location or you can do something else    Exhibition/join_exhibitor
      var redirect = $('#session_data').val();
      var redirect = redirect+',2';
      console.log(redirect);
      window.location.href = "{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibition/join_exhibitor/"+redirect;
    }, 5000);
  });
</script>
@endif
--}}




<script type="text/javascript">


  
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

var NotAllwedCharacters = [33,35,36,37,38,39,47];
 $(".allownumericwithoutdecimal").on("keypress keyup blur",function (event) { 

    return event.which !== 32; 
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });

 $("#name").on("keypress",function (event) { 
  var n = NotAllwedCharacters.includes(event.which);
  
  if(n == true){
    console.log('not allowed');
    return false;
  }else{
    return event.which;
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