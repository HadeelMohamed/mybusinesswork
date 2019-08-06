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
<h2 class="h1-register2">(عضوية مجانية + 70$ فى حسابك)</h2>
</div>


<p class="p-head-register">MyBusiness أول وأكبر موقع الكتروني في الشرق الأوسط وأفريقيا يهدف إلى مساعدة الأفراد والشركات في مختلف قطاعات الأعمال لتقديم منتجاتهم وخدماتهم والإنتشار دولياً، عن طريق العديد من الخصائص والخدمات المبتكرة بداية من إنشاء صفحة الكترونية خاصة بنشاطك التجاري سواء (فرد أو شركة) وسواء كنت تقدم (سلعة أو خدمة) ثم إدراج نشاطك التجاري في دليل أعمال MyBusines وبالتالي جلب زائرين وعملاء محتملين لنشاطك التجاري من كل أنحاء العالم عن طريق مميزات وخدمات جديدة ومبتكرة.


</p>

<a id ="createBtnScrol" class="btn btn-register-btn btn-scroll" style="color: #fff;"><b>سجل نشاطك التجاري الأن</b></a>
<div class="sec-register">

<div class="container">
<div class="row">


<div class="col-md-5">

<div class="back-gray">
<h5 class="h5-title-register">من يمكنه أن ينضم ويستفيد من MyBusiness؟
يعمل MyBusiness  على خلق عالم تجاري على الإنترنت يحافظ على تكافؤ الفرص 
بين الشركات والأفراد أياً كانت مهنة ذلك الفرد أو حرفته وفي أي مجال، كذلك 
الشركات فإن كل الشركات بمختلف أحجامها متواجدة داخل MyBusiness بداية من 
الشركات الناشئة والصغيرة إلى المؤسسات الكبرى وفي مختلف مجالات الأعمال.
</h5>
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

<h2 class="h2-register">إظهر عملك الخاص أو شركتك للعالم
</h2>
<form method="POST" action="{{ route('register') }}">
@csrf
<input hidden="" id="exh_slug_session" type="text" name="exh_slug_session" value="">
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
<h5 class="h5-title-register">
لماذا تنضم للمعرض الأونلاين ؟

</h5>

<p >
    الأن يمكنك المشاركة في المعارض المحلية والدولية أونلاين وأنت في مكانك سواء
    كنت عارض أو زائر

    فقط بضغطة واحدة.
</p>
<p >
    سواء كنت تملك 
    (
    شركة
    )
    
        أو أحد صناع القرار أو (فرداً) تقدم خدمة محترفة بمفردك يمكنك الأن
    

    <b> من خلال المعارض أونلاين:-</b>
</p>
<p >
    - إظهار عملك ومنتجاتك أو خدماتك للعالم كله لضمان ظهور عملك 24/7 محلياً
    ودولياً طوال فترة المعرض.
<br>
    - عرض السلع والخدمات أمام أكبر شريحة من العملاء المستهدفين .
<br>
    - الاستفادة من التسويق والترويج الاحترافى الذى يقوم به MyBusiness للمعرض.

    <br>
    - التعرف على قاعدة كبيرة من الموردين .
    <br>
    - التعرف على الجديد واتجاهات السوق .
    <br>
    - ترويج العلامة التجارية وتعزيزها .
    <br>
    - التعرف على التكنولوجيا الجديدة فى السوق .
    <br>
    - دراسة المنافسين .
    <br>
    - عمل قاعدة بيانات للمتعاملين والمهتمين بالسوق .
    <br>
    - تعتبر المعارض الدولية مناخ مناسب لفرص الاستثمار والتسويق وعقد الصفقات
    الناجحة على الإنترنت.
<br>
    - الدخول إلى أسواق جديدة .
</p>
<p >
    <b>
        وفر وقـــــــتك وجهــــــــــدك ومالــــــــك الأن وأشترك في معرض
        أونلاين وأنت في مكانك
    </b>
</p>

<div class="text-center">
    <a href="{{url('/')}}/Exh/Exhibitions?q=&cat=&country=" style="max-width:280px; margin: 0 auto;" class="btn btn-register-btn" >تصفح المعارض المتاحة الأن
    </a>
  </div>





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



  var finddiv = $("#sec-scroll").offset().top;
   $(".btn-scroll").click(function() {
$("html, body").animate({
scrollTop: finddiv-60
}, "slow")
})
})
</script>

@endsection
