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
   .a-tabs{
   border: 1px solid #333;
   color: #000;
   padding: 5px;
   margin-bottom: 10px;
   display: inline-block;
   background-color: #333;
   color: #fff;
   font-size: 20px;
   }
   .a-tabs-active{
   color: #e60000 !important;
   border-bottom: none;
   }
   .form-control, .nice-select{
   border: 1px solid #333 !important;
   box-shadow: 1px 1px 5px #b5adad;
   }
</style>
<!--...........................profile-head...................-->
<div class="big-dash">
   <div class="container">
      @include('partials.member.admin_panel_empty')
      <div class="row">
         @include('partials.member.side_bar')
         <!--   ....................article....................-->
         <article class="col-md-8">
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
            <div class="container-dashborad">
               @include('partials.member.main_title')
               
               
               <!-- <div class="back-red active-acc"><i class="fas fa-exclamation-triangle"></i> @lang('website.payment_required') You Must pay to active your Account  -->
            </div>
           
           
            
            <form id="update_member_form" action="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibition/join_exhibitorPost" method="post" enctype="multipart/form-data">
               <input hidden="" name="flag" value="1">
               @csrf
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-md-8">
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
                     </div>
                     <div class="col-md-4">
                        <h4 class="h4-upload">@lang('website.upload_logo')</h4>
                        <div class="position-relative item-upload-expo">
                           <!-- <label for="logo-btn" class="upload-btn-expo"><i class="fas fa-edit"></i></label> -->
                           <!-- <input id="logo-btn" type="file" style="display:none;" name="logo"> -->
                           @if(isset($exhibitor_details->profile_pic))
                           <img id="logo_preview" src="{{url('/images')}}/en/exhibitors/med/{{$exhibitor_details->profile_pic}}" width="100%">
                           @else
                           <img id="logo_preview" src="" width="100%">
                           @endif
                           
                        </div>
                        <!-- <h4 class="h4-upload">@lang('website.upload_cover')</h4>
                        <div class="position-relative item-upload-expo">
                           <label for="cover-btn" class="upload-btn-expo"><i class="fas fa-edit"></i></label>
                           <input id="cover-btn" type="file" style="display:none;" name="cover">
                           {{--
                           @if(isset($exhibitor_details->profile_cover))
                           <img id="cover_preview" src="{{url('/images')}}/en/med/{{$exhibitor_details->profile_cover}}" width="100%">
                           @else
                           <img id="cover_preview" src="" width="100%">
                           @endif
                           --}}
                           <img id="cover_preview" src="" width="100%">
                        </div> -->
                     </div>
                  </div>
               </div>
               <!--  .........................accordion.......................--> 
               <div class="accordion" id="accordionExample">
                  <div class="card margin-top-ac">
                     <div class="card-header  header-accordion" id="headingOne">
                        <h2 id="contact_section_id" class="mb-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                           <div class="div-icon"><i class="fas fa-phone"></i></div>
                           @lang('website.contact_info')
                        </h2>
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
                              <input type="number" class="form-control" id="profile_phone" onkeypress="return onlyNumbers();" aria-describedby="emailHelp" placeholder="" name="phone" required="" value="{{$exhibitor_details->phone}}">
                              @else
                              <input type="number" class="form-control" id="profile_phone" onkeypress="return onlyNumbers();" aria-describedby="emailHelp" placeholder="" name="phone" required="">
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
                           <div class="div-icon"><i class="fas fa-share-square"></i></div>
                           @lang('website.social_media_links')
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
            </style>
            <div class="row">
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
                  <div class="row">
                     <div><img src="images/banner-login.jpg" width="100%" class="banner-login" ></div>
                  </div>
               </div>
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
                  <div class="row">
                     <div><img src="images/banner-login.jpg" width="100%" class="banner-login" ></div>
                  </div>
               </div>
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
@include('partials.website.footer')
<!-- social -->
<script src="{{asset('website/js/plugins.js')}}" type="text/javascript"></script>
<script src="{{asset('website/js/script.js')}}" ></script>
<script src="{{asset('website/js/social.js')}}" ></script>
<script src="{{asset('website/js/my-js.js')}}" ></script>
@include('partials.member.alerts')



   

@endsection