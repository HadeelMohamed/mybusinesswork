@extends('layouts.website')
@section('title','Login')
@section('content')
<!--...........................profile-head...................-->
    <style type="text/css">
.static_height{
  height: 120px;
}
@media (max-width:1024px){
  .static_height{
  height: 40px;
}
}
</style>
  <div class="big-dash">
    <div class="container">
      <div class="static_height"></div>
      <div class="head-dash margin-regitser">
        <h1>@lang('website.login_now')</h1>
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
          <li class="active">
              <a href="{{route('login')}}" class="radus-1">
                  @lang('website.login')
              </a>
          </li>
          <li><a href="{{route('register')}}" class="radus-2">
              @lang('website.register')
              </a>
          </li>
         
        </ul>

          <div class="container-dashborad">
            <h2 class="h3-dash">@lang('website.welcome_to'), <strong>MYBUSINESS</strong></h2>
              <form method="POST" action="{{ route('login') }}">
              @csrf
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
                        <label for="password">@lang('website.password')</label>
                        <input name="password" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" aria-describedby="emailHelp" placeholder="" required>
                        @if ($errors->has('password'))
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                          </span>
                        @endif
                      </div>
      
      
<!--       <div class="form-group">
    <label for="exampleInputEmail1">Confirm Password</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
  </div> -->
      
      <style type="text/css">
        .btn-register-item{
              color: #333;
    display: contents;
        }

      </style>
     
   
   <div class="text-center button-save">
<div class="container-fluid">
<div class="row">
  <div class="col-sm-6">
  @if (Route::has('password.request'))
    <a class="btn btn-register-item" href="{{ route('password.request') }}">
      @lang('website.forgot_password')
    </a>
  @endif
</div>
  <div class="col-sm-6">

  @lang('website.do_not_have_account_yet')
  <a href="{{url('/register')}}" class="register-link text-danger">@lang('website.register_now')</a><br>
  </div>
</div>
</div>
  <button type="submit" class="btn btn-register back-red">@lang('website.login')</button>
  
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
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                          <label for="email" class="col-md-4 col-form-label text-md-right">@lang('website.email')</label>
                          <div class="col-md-6">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                              </span>
                            @endif
                          </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">@lang('website.password')</label>

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
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        @lang('website.remember_me')
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    @lang('website.login')
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        @lang('website.forgot_password')
                                    </a>
                                @endif
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
@endsection
