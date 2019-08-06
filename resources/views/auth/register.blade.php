@extends('layouts.website')
@section('title','Register')
@section('content')
 <style type="text/css">
.static_height{
  height: 120px;
}
@media (max-width:1024px){
  .static_height{
  height: 40px;
}

}
.h1-register{
  color: #fff;
}
</style>
<link rel="stylesheet" href="{{asset('website/css/register-page.css')}}">
<!--...........................profile-head...................-->
  <div class="big-dash">
    <div class="container">
      <div class="static_height"></div>
      <div class="head-dash margin-regitser">
<!--         <h1>@lang('website.register_now')</h1>
 -->      
<div class="main-text-register">
<h2 class="h1-register">@lang('website.register_title_1')</h2>
<h2 class="h1-register2"><strong>@lang('website.register_title_2')</strong></h2>
</div>
 
      <div class="row">   
        <!--...........................aside menu...................-->
        <aside class="col-md-3">
          <img src="{{asset('website/images/banner-login.jpg')}}" width="100%" class="register-img">
        </aside>
        <!--   ....................article....................-->

        <article class="col-md-9">
           <!-- Nav tabs -->
        <ul class="nav nav-tabs tab-login" role="tablist">
          <li>
              <a href="{{route('login')}}" class="radus-1">
                  @lang('website.login')
              </a>
          </li>
          <li class="active"><a href="{{route('register')}}" class="radus-2">
              @lang('website.register')
              </a>
          </li>
         
        </ul>

          <div class="container-dashborad">



            <h2 class="h3-dash">@lang('website.welcome_to'), <strong>MYBUSINESS</strong></h2>
              <form method="POST" action="{{ route('register') }}" id="register_form">
              @csrf
              <input hidden="" id="exh_slug_session" type="text" name="exh_slug_session" value="">
              <input hidden="" name="name" value="">
                <div class="container-fluid">


                
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="email">@lang('website.email')</label>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus aria-describedby="emailHelp" placeholder="">
                        @if ($errors->has('email'))
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                          </span>
                        @endif
                      </div>

                      <div class="form-group">
                        <label for="emailConfirm">@lang('website.email_confirm')</label>
                        <input id="emailConfirm" type="email" class="form-control" name="emailConfirm" required autofocus aria-describedby="emailHelp" placeholder="">
                        <p style="display: none; color: red;" id="errorConfirmEmail">Email Not Matched</p>
                      </div>


                      <div class="form-group">
                        <label for="password">@lang('website.password')</label>
                        <input name="password" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" aria-describedby="emailHelp" placeholder="" required>
                        @if ($errors->has('password'))
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                          </span>
                        @endif
                      </div>
                      <label for="password-confirm">@lang('website.confirm_password')</label>

                        <input name="password_confirmation" id="password_confirmation" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" aria-describedby="emailHelp" placeholder="" required>
      
      
     
   
   <div class="text-center button-save">

  
  <button type="submit" class="btn btn-register back-red">@lang('website.register')</button>
  
  <a href="{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}" class="btn btn-register back-black">@lang('website.back')</a>

  </div>
   
  </form>
  
  
  
  </div>
  
  
  
  </div>
  
  </div>
  
<!--  .........................accordion.......................--> 




 
  
  
  <!--  .........................save.......................--> 
  
  

  
  
   
   
   </div>
   </article>

</div>
</div>
            </div>







{{--

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
--}}


<div class="clear"></div>

@include('partials.website.footer')
<script type="text/javascript">
  $(document).ready(function(){
    var exh_slug_session = sessionStorage.getItem("exh_slug_session");
    console.log(exh_slug_session);
    $('#exh_slug_session').val(exh_slug_session);
    if (typeof exh_slug_session === 'undefined' || exh_slug_session === null) {
      // variable is undefined or null
      
    }else{
      $('#exh_slug_session').val(exh_slug_session);
      // sessionStorage.clear();
      // window.setTimeout(function(){

      //     // Move to a new location or you can do something else
      //     // window.location.href = "https://www.google.co.in";
      //     sessionStorage.clear();
      //     var url = "{{url('/')}}/{{LaravelLocalization::getCurrentLocale()}}/Exhibition/join_exhibitor/"+exh_slug_session;
          
      //     window.location.href = url;
      // }, 5000);
    }
  });

  $('#register_form').submit(function(){
    var em = $('#email').val();
    var emconfirm = $('#emailConfirm').val();
    if(em === emconfirm){
      $('#errorConfirmEmail').hide();
    }else{
      $('#errorConfirmEmail').show();
      $('#errorConfirmEmail').val('Email Not Matched!');
      return false;
    }
   
  });
</script>
@endsection
