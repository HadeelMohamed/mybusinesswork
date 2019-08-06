@extends('layouts.website')

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
<br>
<br>
<br>
<br>
<br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('website.please_verify_your_email_address')</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            @lang('website.a_fresh_verification_link_has_been_sent_to_your_email_address')
                        </div>
                    @endif

                    @lang('website.thanks_for_getting_started_with_mybusiness').
                    @lang('website.before_proceeding'), @lang('website.please_check_your_email_for_verification_link'): <a href="{{ route('verification.resend') }}">@lang('website.click_here_to_request_another_one')</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('/website/js/jquery-2.1.1.js')}}" ></script>
<script src="{{asset('/website/js/popper.min.js')}}" ></script>
<script src="{{asset('/website/js/bootstrap.min.js')}}" ></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{asset('/website/js/hc-offcanvas-nav.js')}}"></script>
<script src="{{asset('/website/js/respnsive-menu.js')}}"></script>
<script src="{{asset('/website/js/my-js.js')}}" ></script>

@endsection

