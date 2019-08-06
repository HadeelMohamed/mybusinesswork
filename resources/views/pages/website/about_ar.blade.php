@extends('layouts.website')
@section('title','Home')
@section('content')

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
<br><br><br><br><br><br><br><br>

                        <!-- navigation  end -->
</div>

<div class="padding-div-menu" ></div>


<div class="padding-for-page">
<div class="container">
<div class="row">
<div class="col-lg-6">
<div class="about-business">
<h1>ما هو MyBusiness ؟</h1>
<p class="p-about">  MyBusiness أول منصة الكترونية في الشرق الأوسط وأفريقيا ذات مرجعية 
أوروبية تهدف إلى مساعدة (الأفراد والشركات) في مختلف (قطاعات الأعمال) 
لتقديم منتجاتهم وخدماتهم والإنتشار دولياً، عن طريق العديد من الخصائص 
والخدمات المبتكرة بداية من إنشاء صفحة الكترونية خاصة بنشاطك التجاري سواء 
(فرد أو شركة) وسواء كنت تقدم (سلعة أو خدمة) ثم إدراج عملك أو شركتك في 
دليل أعمال MyBusines وبالتالي جلب زائرين وعملاء محتملين لنشاطك التجاري 
من كل أنحاء العالم عن طريق مميزات وخدمات جديدة ومبتكرة.

</p>
</div>
</div>
<div class="col-lg-6">
  <img src="{{asset('website/images/ser2.jpg')}}" width="100%"  alt=""> </div>

</div>

<div class="text-center">
<h3 class="h3-about-2">@lang('website.faqs')</h3>
<div class="line-sec back-red"></div>
<br>
</div>
<div class="accordion" id="accordionExample">
  <div class="card border-card" >
    <div class="card-header back-accordion" id="headingOne">
      <h2 class="head-accordion"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          ما هي تكلفة العضوية؟
           <div class="icon-accordion"><i class="fas fa-plus"></i></div>
      </h2>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        العضوية علي MyBusiness هي عضوية سنوية، فيتطلب الدفع كل 365 يوم لتجديد 
عضويتك.


      </div>
        <table class="table table-bordered">

      <tr>
          <th class="">عضوية سنوية</th>
          <th class=""><span class="title_table">10$</span><span class="free_style"> مجانا الأن</span></th>
      </tr>
      </table>
    </div>
  </div>
  
  <div class="card border-card">
    <div class="card-header back-accordion" id="headingTwo">
      <h2 class="head-accordion" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
           ماذا تمنحني عضوية  MyBusiness؟
          
          <div class="icon-accordion"><i class="fas fa-plus"></i></div>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample2">
      تتمنحك عضوية My Business العديد من الخصائص:

      <div class="card-body">
      <ul class="ul-accodion">
      <li>إذا كنت (فرد أو شركة) ستحصل على حساب تجاري، ليصبح عملك متاح 24 ساعة 
طوال ايام الاسبوع وبالتالي ضمان زائرين وعملاء محتملين محلياً ودولياً 
لنشاطك التجاري.

</li>
            <li>إدراج إسم وبيانات وشعار شركتك أوعملك الخاص في دليل أعمال تجاري دولي 
لتصبح محاطاً بالعديد من الشركات في مجالات مختلفة محلياً ودولياً لتكمل 
سلسلة أعمالك بإحتراف وعلى أعلى مستوى.
</li>
      <li>الاشتراك في النشرات الاخبارية  ( لتصلك أخر الأخبار الخاصة بمجالات 
الأعمال المختلفة ).
</li>
      <li>التواصل بكل سهولة ويسر مع عملائك الحاليين ودعم العملاء الجدد لحظياً عن 
طريق التواصل مباشرة معهم.
</li>
<li>ستكون قادراً على مشاركة الحساب التجاري الخاص بك داخل موقع MyBusiness  
على جميع قنوات التواصل الإجتماعي للوصول لأكبر عدد من العملاء المهتمين 
بمجال عملك.
</li>
<li> التواصل مع جميع الشركات المدرجة في دليل أعمال   MyBusiness و  بالتالي    
زيادة حجم أعمالك على المستوى المحلي والدولي بكل سهولة وأنت في مكانك.
</li>


<li> ستكون قادراً على التفاعل داخل (منتدى المال والأعمال) وبالتالي زيادة 
مهاراتك على المستوى المهني والشخصي.
</li>
<li> الإستفادة من حملات التسويق والدعاية المحترفة والموجهة عالمياً التي 
يقوم بها MyBusiness  ليصبح نشاطك التجاري منتشراً محلياً ودولياً ومن ثم 
ضمان زيادة الوعي بعلامتك التجارية.
</li>
<li> ستتمكن من إظهار ونشر منتجاتك وخدماتك على المستوى المحلي والدولي ليصبح 
الوصول إلى أكبر عدد من العملاء المهتمين بمجال أعمالك أمراً سهلاً 
وبالتالي زيادة حجم مبيعاتك.
</li>
<li>استخدام خدماتنا ( معارض على الإنترنت – مزادات أونلاين – مناقصات أونلاين ....).
</li>

      </ul>
      
      </div>
    </div>
  </div>
  
  
  
  
  
  
 <div class="card border-card">
    <div class="card-header back-accordion" id="headingThree">
      <h2 class="head-accordion" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          ما هو دليل أعمال MyBusiness؟
          <div class="icon-accordion"><i class="fas fa-plus"></i></div>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample3">
      <div class="card-body">
    <div class="row">
    <div class="col-lg-12">يعد دليل أعمال MyBusiness هو الميزة الأكثر فاعلية والتي يتم تقديمها 
لعملك، حيث يتم إدراج نشاطك التجاري طبقاً لمجال أعمالك وإظهار بيانات 
ووسائل التواصل بنشاطك التجاري وذلك يتضمن قنوات التواصل الإجتماعي ( 
فيسبوك – إنستجرام ...) وسيضمن ذلك ظهور عملك لأكبر عدد من العملاء 
المهتمين بمنتجاتك وخدماتك، كما أن عملك سيصبح ظاهراً بكل سهولة لكل شركاء 
الأعمال المحتملين والمهتمين بفتح أسواق جديدة ومن ثم سيصبح التواصل بينكم 
أمراً سهلاً.
</div>

    </div>
      
      </div>
    </div>
  </div> 


   <div class="card border-card">
    <div class="card-header back-accordion" id="headingFour">
      <h2 class="head-accordion" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
          ما هي المعارض على الإنترنت (معارض أونلاين)؟
          <div class="icon-accordion"><i class="fas fa-plus"></i></div>
      </h2>
    </div>
    <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample3">
      <div class="card-body">
    <div class="row">
    <div class="col-lg-12">إذا كنت فرد أو شركة – تبيع منتج أو تقدم خدمة</div>
  <div class="col-lg-12">حصرياً ولأول مرة يمكنك المشاركة وحجز جناح لعملك أو شركتك في معرض تجاري 
(أونلاين) محلي أو دولي وأنت في مكانك، وتجربة المعارض الأونلاين 
والإستفادة منها بتكلفة أقل بكثير، فيمكنك الإستفادة بكافة الخصائص 
والمميزات التالية :-

  </div>
  <div class="card-body">
      <ul class="ul-accodion">
      <li>عرض السلع والخدمات أمام أكبر شريحة من العملاء المستهدفين</li>
      <li>  الاستفادة من التسويق والترويج الإحترافى الذى يقوم به MyBusiness 
للمعرض .
</li>
      <li>التعرف على قاعدة كبيرة من الموردين </li>
      <li>التعرف على الجديد واتجاهات السوق </li>
      <li>  ترويج العلامة التجارية وتعزيزها </li>
      <li>التعرف على التكنولوجيا الجديدة فى السوق </li>
      <li>دراسة المنافسين </li>
      <li>عمل قاعدة بيانات للمتعاملين والمهتمين بالسوق </li>
      <li>تعتبر المعارض الدولية مناخ مناسب لفرص الاستثمار والتسويق وعقد الصفقات 
الناجحة
</li>
      <li>الدخول إلى أسواق جديدة</li>

      </ul>
      
      </div> 

    </div>
      
      </div>
    </div>
  </div> 


  <div class="card border-card">
    <div class="card-header back-accordion" id="headingFive">
      <h2 class="head-accordion" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFour">
          ما هي خطوات المشاركة في المعرض؟
          <div class="icon-accordion"><i class="fas fa-plus"></i></div>
      </h2>
    </div>
    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample3">
      <div class="card-body">
    <div class="row">
    <div class="col-lg-12">يمكنك الإشتراك في أحد المعارض المحلية أو الدولية والإختيار بين أن تكون 
(عارض أو راعي) طبقاً لطبيعة ومجال عملك وخدماتك بالخطوات الأتية:-
</div>

    <br>
    <div class="col-lg-12">الدخول إلى صفحة المعارض والبحث عن المعارض المتاحة الخاصة بمجال نشاطك 
التجاري أو أي مجال أخر.
</div>
<br>
  <div class="col-lg-12">بمجرد دخولك إلى صفحة المعرض سيظهر لك بيانات المعرض كاملة
</div>
<br>
<div class="col-lg-12">  (إسم المعرض – مجال المعرض – تاريخ البدأ – تاريخ الإنتهاء – معلومات عن 
المعرض – الشركات والعارضين الذين قاموا بحجز جناح بالفعل – الرعاه – عدد 
المنتجات والخدمات التي تم إضافتها للعرض)


</div>
<br>




    </div>
      
      </div>
    </div>
  </div> 



  <div class="card border-card">
    <div class="card-header back-accordion" id="headingSix">
      <h2 class="head-accordion" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseFour">
ما هي تكلفه خدمات MyBusiness؟
          <div class="icon-accordion"><i class="fas fa-plus"></i></div>
      </h2>
    </div>
    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample3">
      <div class="card-body">
    <div class="row">
    <style type="text/css">
      .title_table {
  
} 

.title_table { 
    text-decoration-line: line-through;
    color: red;
}
.free_style {
  color: green;
}
   </style>
      <table class="table table-bordered">
        <tr>
          <th class="">الخدمة</th>
          <th class="">التكلفة</th>
      </tr>
        <tr>
          <th class="">معرض أونلاين </th>
          <th class=""><span class="title_table">100$</span><span class="free_style"> مجانا الأن</span></th>
      </tr>
      <tr>
          <th class="">مزاد أونلاين</th>
          <th class=""><span class="title_table">20$</span><span class="free_style"> مجانا الأن</span></th>
      </tr>
      </table>


    </div>
      
      </div>
    </div>
  </div> 



  <div class="card border-card">
    <div class="card-header back-accordion" id="headingSeven">
      <h2 class="head-accordion" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSix">
مميزات المعارض الأونلاين؟ 
          <div class="icon-accordion"><i class="fas fa-plus"></i></div>
      </h2>
    </div>
    <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample3">
      <div class="card-body">
    <h6><b>سواء كنت فرد أو شركة – وسواء كنت تقدم خدمة أو تبيع سلعة، الأن يمكنك عرض 
خدماتك ومنتجاتك في أكبر المعارض المحلية والدولية وأنت في مكانك 
وبالتالي:-

</b></h6>
      <div class="card-body">
      <ul class="ul-accodion">
      <li>توفير العمالة والمصروفات الخاصة بالعارضين وكذلك النقل وإيجار المساحة 
الأرضية والديكور الخاص بالمعرض والحفاظ على المنتجات بدلا من تعرضها 
للإتلاف لأي سبب من الأسباب.

</li>
            <li>سهولة الاشتراك في المعرض دون عناء التصاريح والاقامات والتزامات السفر 
وشحن البضائع وعمل اللوحات الاعلانية.

</li>
      <li>يستطيع العارض أن يصل بمنتجه إلى أكثر من دولة وإلى عدد أكبر من الزائرين 
ويتيح له فرصة الدخول إلى أسواق جديدة.
</li>
      <li> التواصل بكل سهولة ويسر مع عملائك الحاليين ودعم العملاء الجدد لحظياً عن 
طريق التواصل مباشرة معهم.

</li>
<li> ستكون قادراً على مشاركة الجناح الخاص بك داخل المعرض على جميع قنوات 
التواصل الإجتماعي للوصول لأكبر عدد من العملاء المهتمين بمجال عملك.
</li>
<li>عند إختيار المشاركة كأحد العارضين أو الرعاة ستظهر لك صفحة لتسجيل وحجز 
جناح عملك أو شركتك داخل المعرض، داخل صفحة التسجيل ستتمكن من وضع إسم 
العمل الخاص بك وجميع بيانات وتفاصيل شركتك أو عملك التجاري الذي سيظهر 
لجميع الزائرين داخل المعرض.
</li>
<li> ستتمكن من إظهار ونشر منتجاتك وخدماتك على المستوى المحلي والدولي داخل 
المعرض ليصبح الوصول إلى أكبر عدد من العملاء المهتمين بمجال أعمالك أمراً 
سهلاً  وأنت في مكانك وبالتالي زيادة حجم مبيعاتك.
</li>
<li> إدراج إسم وبيانات وشعار شركتك أوعملك الخاص داخل المعرض لتصبح محاطاً 
بالعديد من الشركات في مجالات مختلفة محلياً ودولياً لتكمل سلسلة أعمالك 
بإحتراف وعلى أعلى مستوى.
</li>
<li>  ستتمكن من التعرف على قاعدة كبيرة من الموردين والجديد في مجالك 
واتجاهات السوق
</li>
<li>ترويج العلامة التجارية وتعزيزها</li>
<li>التعرف على التكنولوجيا الجديدة فى السوق </li>
<li>دراسة المنافسين </li>
<li>عمل قاعدة بيانات للمتعاملين والمهتمين بالسوق </li>
<li>  تعتبر المعارض الدولية مناخ مناسب لفرص الاستثمار والتسويق وعقد الصفقات 
الناجحة
</li>
<li> الدخول إلى أسواق جديدة.</li>


      </ul>
      
      </div>
  


      </div>
    </div>
  </div>



   <div class="card border-card">
    <div class="card-header back-accordion" id="headingEight">
      <h2 class="head-accordion" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseSeven">
كيفية التسجيل؟
          <div class="icon-accordion"><i class="fas fa-plus"></i></div>
      </h2>
    </div>
    <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample3">
      <div class="card-body">
    <h6><b>لكي تنشئ حساب على موقع MyBusiness</b></h6>
      <div class="card-body">
      <ul class="ul-accodion">
      <li>إدخل علي موقعwww.mybusinessme.com </li>
            <li>قم  بإدخال بريدك الالكتروني
</li>
      <li>ثم قم  بإدخال كلمة السر الخاصة بك</li>

      </ul>
      <h6><b>بعد ذلك ستصلك رسالة لتأكيد حسابك ، اضغط علي رابط التأكيد</b></h6>
      </div>

  
       <div class="col-6">
         <iframe width="100%" height="315" src="{{asset('website/videos/REG.mp4')}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 
        </div>  

      </div>
    </div>
  </div>


  <div class="card border-card">
    <div class="card-header back-accordion" id="headingNine">
      <h2 class="head-accordion" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseEight">
كيفية إنشاء حساب تجاري لشركتك ؟
          <div class="icon-accordion"><i class="fas fa-plus"></i></div>
      </h2>
    </div>
    <div id="collapseNine" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample3">
      <div class="card-body">
      <ul class="ul-accodion">
      <li>ادخل الي حسابك عن طريق كتابة البريد الإلكتروني وكلمة المرور</li>
      <li>الأن إختر نوع الحساب ( شخصي – شركة ) </li>
      <li>  ادخل إسم نشاطك التجارى / شركتك  </li>
      <li>  اختر البلد</li>
      <li>اختر تصنيف شركتك</li>
      <li>ادخل المعلومات الخاصة بشركتك أو عملك</li>
      <li>  ادخل المعلومات الخاصة بخدماتك</li>
      <li>قم باضفة شعارك</li>
      <li>قم باضفة خلفية</li>
      <li>قم بالضغط علي بيانات الإتصال لإدخال بيانات عملك:</li>
      <li>العنوان – الهاتف – البريد الإلكتروني</li>
      <li>بعد ذلك اضغط علي روابط مواقع التواصل ثم اضف الروابط الخاصة بك أو بعملك </li>
      <li>علي مواقع التواصل الاجتماعي</li>
      <li>وبالنهاية قم بالضغط علي تحديث.</li>

      </ul>
      
      </div>
<div class="col-6">
          <iframe width="100%" height="315" src="{{asset('website/videos/BuildAcc.mp4')}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 
        </div>


      </div>
    </div>
  </div>
  
  <!-- <div class="card-body">
      <ul class="ul-accodion">
      <li>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute,</li>
            <li>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute,</li>
      <li>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute,</li>
      <li>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute,</li>

      </ul>
      
      </div> -->
  
 <!-- <div class="col-lg-6">

   <iframe width="100%" height="315" src="{{asset('videos/BuildAcc.mp4')}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 

</div>-->

  
  





<form action="{{route('our_messages_post')}}" method="post">
  @csrf
 <div class="text-center">
<h3 class="h3-about-2">@lang('website.do_you_have_question')</h3>
<div class="line-sec back-red"></div>
</div>

<div class="form-group row">

<div class="col-lg-12">
<p class="p-ticked">@lang('website.name')</p>
<input class="input-contact" placeholder="" required="" name="name"></div>

</div>


<div class="form-group row">
<div class="col-lg-6">
<p class="p-ticked">@lang('website.email')</p>

<input class="input-contact" placeholder="" required="" type="email" name="email"></div>

<div class="col-lg-6">
<p class="p-ticked">@lang('website.phone')</p>

<input class="input-contact" placeholder="" name="tel"></div>

</div>

<div class="form-group row">
<div class="col-lg-12">
<p class="p-ticked">@lang('website.subject')</p>
<input class="input-contact" placeholder="" required="" name="subject">
</div>
</div>

<div class="form-group row">

<div class="col-lg-12">
<p class="p-ticked">@lang('website.message')</p>

<textarea class="input-contact textarea-contact" placeholder="" required="" name="message"></textarea></div>

</div>

<div class="text-center">
<button class="btn btn-message">@lang('website.send')</button>


</div>




</div>

</div>      
</form>

      
  
      
      
      
     
   
      
      
      
      
      
      
      
      









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
<!-- social -->
<script src="{{asset('website/js/myjs.js')}}" ></script>
 



@endsection
