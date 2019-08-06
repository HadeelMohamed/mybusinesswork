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
</style>
<link rel="stylesheet" href="{{asset('website/css/register-page.css')}}">
<!--...........................profile-head...................-->
  <div class="big-dash">
    <div class="container">
      <div class="static_height"></div>
<!--         <h1>@lang('website.register_now')</h1>
 -->      



<div class="main-text-register">
<h1 class="h1-register">عرض لفترة محدودة </h1>
<h2 class="h1-register2">(عضوية مجانية + 80$ فى حسابك)</h2>
</div>
<a id ="createBtnScrol" class="btn btn-register-btn btn-scroll" style="color: #fff;">إنشى حسابك</a>

<p class="p-head-register">هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام "هنا يوجد محتوى نصي، هنا يوجد محتوى نصي" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال "lorem ipsum" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.

</p>


<div class="sec-register">

<div class="container">
<div class="row">


<div class="col-md-5">

<div class="back-gray">
<h5 class="h5-title-register">من يمكنة ان ينضم ويستفيد ؟</h5>
<ul class="ul-register">
<li>كل من يعمل بمفردة (عامل حر او مستقل) </li>
<li>اصحاب الحرف والمهن اليدوية </li>
<li>المبدعين فى كل المجالات</li>
<li>الشركات بمختلف أنواعها </li>

</ul>

</div>


<div class="back-gray">
<h5 class="h5-title-register">ماهى مجالات العمل المتاحة</h5>
<ul class="ul-register">
<li>كل من يعمل بمفردة (عامل حر او مستقل) </li>
<li>اصحاب الحرف والمهن اليدوية </li>
<li>المبدعين فى كل المجالات</li>
<li>الشركات بمختلف أنواعها </li>

</ul>

</div>


</div>

<div  class="col-md-7" id="sec-scroll">

<h2 class="h2-register">إحجز حسابك الاليكترونى الان !!</h2>
<form method="POST" action="{{ route('register') }}">
@csrf
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
  <label for="password-confirm">@lang('website.confirm_password')</label>

                        <input name="password_confirmation" id="password_confirmation" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" aria-describedby="emailHelp" placeholder="" required>

<button class="btn btn-register-btn" type="submit">إنشى حسابك</button>
</form>

</div>



<div class="container-fluid">
<div class="back-gray col-12">
<h5 class="h5-title-register">اى من الدول التى يمكن الاستفادة بها</h5>
<p id="register_form">هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. </p>

</div>
</div>

<!--  -->
@if(isset($our_features))
<div class="container-fluid benfit">
  <div class="row">
    @foreach($our_features as $feature)
    <div class="col-lg-4 col-sm-6">
      <div class="div-feature-2">
        <img src="{{asset('website/images')}}/{{$feature->icon}}" alt=""> 
        <h6 class="h6-feature">
          {{$feature->title}}<br>
          {{$feature->short_desc}}
        </h6>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endif


</div>
</div>
</div>
</div>
</div>


<!--................three section...............-->



</div>











<div class="clear"></div>

@include('partials.website.footer')
<script type="text/javascript">

  $('#createBtnScrol').click(function(e) {
    e.preventDefault();

    $('html, body').animate({
      scrollTop: $('#register_form').offset().top
    }, 500);
  });
</script>

@endsection
