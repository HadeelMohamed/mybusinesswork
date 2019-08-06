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


<p class="p-head-register">MyBusiness أول وأكبر موقع الكتروني في الشرق الأوسط وأفريقيا يهدف إلى مساعدة الأفراد والشركات في مختلف قطاعات الأعمال لتقديم منتجاتهم وخدماتهم والإنتشار دولياً، عن طريق العديد من الخصائص والخدمات المبتكرة بداية من إنشاء صفحة الكترونية خاصة بنشاطك التجاري سواء (فرد أو شركة) وسواء كنت تقدم (سلعة أو خدمة) ثم إدراج نشاطك التجاري في دليل أعمال MyBusines وبالتالي جلب زائرين وعملاء محتملين لنشاطك التجاري من كل أنحاء العالم عن طريق مميزات وخدمات جديدة ومبتكرة.


</p>

<a id ="createBtnScrol" class="btn btn-register-btn btn-scroll" style="color: #fff;"><b>سجل نشاطك التجاري الأن</b></a>
<div class="sec-register">

<div class="container">
<div class="row">


<div class="col-md-5">

<div class="back-gray">
<h5 class="h5-title-register">من يمكنه أن ينضم ويستفيد من MyBusiness؟</h5>
يعمل MyBusiness  على خلق عالم تجاري على الإنترنت يحافظ على تكافؤ الفرص 
بين الشركات والأفراد أياً كانت مهنة ذلك الفرد أو حرفته وفي أي مجال، كذلك 
الشركات فإن كل الشركات بمختلف أحجامها متواجدة داخل MyBusiness بداية من 
الشركات الناشئة والصغيرة إلى المؤسسات الكبرى وفي مختلف مجالات الأعمال.

</div>


<div class="back-gray">
<ul class="ul-register h5-title-register">
<li>إنتشر بعملك فى العالم كله</li>
<li>زيادة الوعى بعلامتك التجارية</li>
<li>الترويج عن منتجاتك وخدماتك للعالم</li>
<li>التواجد بين شبكة أعمال دولية</li>

</ul>

</div>


</div>

<div  class="col-md-7" id="sec-scroll">

<h2 class="h2-register">إظهر عملك الخاص أو شركتك للعالم</h2>
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

<button class="btn btn-register-btn" type="submit"><b>سجل الأن</b></button>
</form>

</div>



<div class="container-fluid">
<div class="back-gray col-12">
<h5 class="h5-title-register">كيف يساعد MyBusiness في انشاء نشاط تجاري على الإنترنت (للأفراد 
والشركات)؟
</h5>
<p id="register_form">إذا كنت تعمل بمفردك أو تحلم بالعمل حراً وسواء لديك نشاط تجاري أو شركة 
قائمة بالفعل أو ربما كنت أحد صناع القرار في مؤسستك، نقدم لك فرصة أن يكون 
عملك ظاهرا للعالم كله على الإنترنت بداية من إنشاء صفحة الكترونية (شركة  
تجارية على الإنترنت) بلوحة تحكم كاملة تغنيك تماماً عن مصاريف شراء موقع 
الكتروني يصل إلى الأف الدولارات.<br>في تلك الصفحة التجارية يمكنك:-
</p>
<ul class="ul-register h5-title-register">
  <li>إظهار المعلومات الكاملة عن نشاطك التجاري وتوضيح هدفك ورؤيتك للجمهور.</li>
  <li>عرض منتجاتك وخدماتك بكامل تفاصيل ومواصفات كل منتج.</li>
  <li>وضع وسائل الإتصال بعملك بداية من العنوان والتليفون وصولاً إلى قنوات 
التواصل الإجتماعي.</li>
  <li> التواصل في نفس الوقت مع العملاء عن طريق الرسائل.</li>
  <li> إستخدام خدمات MyBusiness مثل (المعارض على الإنترنت – المزادات – 
المناقصات .....)</li>
  <li>ظهور عملك ونشاطك التجاري في دليل أعمال  MyBusiness دولياً ليكون عملك 
ظاهراً 24/7</li>

</ul>

</div>
</div>

<!--  -->



</div>
</div>
</div>
</div>
</div>


<!--................three section...............-->



</div>











<div class="clear"></div>

@include('partials.website.footer')
<script>
$(document).ready(function(e) {

  var finddiv = $("#sec-scroll").offset().top;
   $(".btn-scroll").click(function() {
$("html, body").animate({
scrollTop: finddiv-60
}, "slow")
})
})
</script>

@endsection
