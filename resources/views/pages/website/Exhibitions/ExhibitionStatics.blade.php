@extends('layouts.website')
@section('title','Home')
@section('content')
{{--
{{dd($countries_subscribed)}}
{{dd($total_countries)}}
{{dd($countries_subscribed_data)}}
--}}


    <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
    
  


<!-- <script src="{{asset('website/js/anychart-base.min.js')}}"></script>
    <script src="{{asset('website/js/anychart-ui.min.js')}}"></script>
    <script src="{{asset('website/js/anychart-exports.min.js')}}"></script>
<link href="{{asset('website/css/anychart-ui.min.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('website/css/anychart-font.min.css')}}" type="text/css" rel="stylesheet">
 -->
<link href="{{asset('website/css/about-us.css')}}" media="all" rel="stylesheet" type="text/css"/>

  <style type="text/css">
    .float-right-menu{
      float: left;
    }
    .float-right-menu:lang(ar){
      float: right;
    }
     .float-left-menu{
      float: right;
    }
     .float-left-menu:lang(ar){
      float: left;
    }
    .float-left-menu nav ul li ul{
      min-width: 40px;
    }
     .float-left-menu nav ul li ul li {
      margin-right: 0px  !important;
      margin-left: 0px  !important;
    }

    .float-left-menu nav ul li ul li a{
      text-align: center !important;
    }
  </style>

  <style type="text/css">
        html,
        body,
        #container {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
        }
        
        .anychart-credits-text {
            display: none;
        }
        
        .anychart-credits-logo {
            display: none;
        }
    </style>


<br><br><br>

                        <!-- navigation  end -->
</div>

<div class="padding-div-menu" ></div>


<div class="padding-for-page">
<div class="container">
<div class="text-center">
<h3 class="h3-about-2">@lang('website.exhibition_statics')</h3>
<div class="line-sec back-red"></div>
<br>
</div>
<div class="text-center">
    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <th>@lang('website.countries_subscribed')</th>
        <th>@lang('website.all_exhibitors')</th>
        @foreach($countries_subscribed as $index_country => $country)
        <tr>
          @php
            $counter = 0;
            $total = 0;
          @endphp

          @foreach($countries_subscribed_totals as $index_subscribers => $subscribers)
            @php
              $total ++;
            @endphp
            @if($subscribers->country_id == $country->country_id)
              @php
                $counter ++;
              @endphp
            @endif
          @endforeach
          <td style="color: #e60000;">
            {{$country->name}} 
          </td>
          <td>
            {{$counter + 20}}
          </td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
    <div class="text-center">
      <h3 class="h3-about-2">@lang('website.statistics_total')</h3>
    <div class="line-sec back-red"></div>
    <div class="table-responsive">
      <br>
      <table class="table table-bordered table-striped">
       <!--  <th>@lang('website.statistics')</th>
        <th>@lang('website.numbers')</th> -->
        <tr>
          <td style="color: #e60000;">
            @lang('website.all_exhibitors')
          </td>
          <td>
            {{$total + 20 * $index_country + 20}}
          </td>
        </tr>
        <tr>
          <td style="color: #e60000;">
            @lang('website.all_visitors')
          </td>
          <td>
            {{$visitors * 4}}
          </td>
        </tr>

        <tr>
          <td style="color: #e60000;">
            @lang('website.all_products')
          </td>
          <td>
            {{$exhibitors_products * 4}}
          </td>
        </tr>

        <tr>
          <td style="color: #e60000;">
            @lang('website.all_services')
          </td>
          <td>
            {{$exhibitors_products * 2}}
          </td>
        </tr>

      </table>
    </div>
  </div>
</div>
</div>
<br>
<br>

      
  
      
      
      
     
   
      
      
      
      
      
      
      
      









<!--...........................social...................-->




<!-- Modal -->
<div class="modal fade login-btn"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-width modal-dialog-centered" role="document">
    <div class="modal-content">
      
      <div class="container-fluid">
      <div class="row">
      <div class="col-sm-4">
        <div class="row"><div><img src="images/banner-login.jpg" width="100%" class="banner-login" ></div></div></div>
           <div class="col-sm-8">
           
           <h3 class="h3-login">Login With My bussines</h3>
           <div class="line-sec back-red"></div>
           
           
           
           <form style="margin-top:20px;">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  
  <div class="container-fluid">
  <div class="row">
  <div class="col-6">
  <div class="custom-control custom-checkbox my-1 mr-sm-2">
    <input type="checkbox" class="custom-control-input" id="customControlInline">
    <label class="custom-control-label" for="customControlInline">Remember Me</label>
  </div>
  </div>
    <div class="col-6 text-right">
   <a href="#" class="forget-pass"> Forget Your Passowrd ?!</a>
</div>
  </div>
  </div>
  
  <div class="text-right">
  <button type="submit" class="btn btn-dark btn-login-su">login</button>
  </div>
</form>

<div class="register">Do not have Account yet <a href="#" class="register-link">Register now</a></div>
           
           
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
           
           
           
           <form style="margin-top:20px;">
   <div class="form-group">
    <label for="exampleInputEmail1">Title message</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Message</label>
    <textarea type="" class="form-control" id="exampleInputPassword1" ></textarea>
  </div>
  
  
  
  <div class="text-right">
  <button type="submit" class="btn btn-dark btn-login-su">Send</button>
  </div>
</form>

           
           
           </div>
           
           
           
           
 
      
      </div>
      
      </div>
      
      
    <button class="btn-close-pop" data-dismiss="modal"><i class="fas fa-times"></i></button>  
     
    </div>
  </div>
</div>




@include('partials.website.footer')
<script src="{{asset('website/js/paginga.jquery.js')}}" ></script>
<script src="{{asset('website/js/plugins.js')}}" ></script>
<script src="{{asset('website/js/script.js')}}" ></script>
<script src="{{asset('website/js/popper.min.js')}}" ></script>
<script src="{{asset('website/js/bootstrap.min.js')}}" ></script>
<script src="{{asset('website/js/myjs.js')}}" ></script>
<!-- social -->

 



@endsection