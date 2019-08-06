@extends('layouts.website')
@section('title','Home')
@section('content')
<br><br><br><br>
<!--...........................five sec...................-->
<section class="sec-services">
   <div class="container">


<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
          <h2 class="collapsed h2-faq"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseTwo">
     
          كيف سيفيدني موقع My Business ؟

     
      </h2>

    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">


      <ul class="ul-faq">
        <li>
          يقوم MyBusiness بتحفيز التبادل التجاري و الصناعي في منطقة الشرق الاوسط و 
شمال أفريقيا في جميع قطاعات الاعمال. بتقديم العديد من الخدمات التي 
تساعدك الي الوصول للعالمية بأعمالك.

    </li>
        

      </ul>

        <!-- <ul class="ul-faq2">
        <li>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.</li>
        <li>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.</li>
        <li>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.</li>
        <li>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.</li>

      </ul> -->
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
           <h2 class="collapsed h2-faq"  data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseThree">
     
كم مره يجب أن ادفع الي الموقع؟
     
      </h2>

    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        العضوية علي My Business هي عضوية سنوية، فا يتطلب الدفع كل سنة إذا كنت 
تريد تجديد عضويتك.


      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="collapsed h2-faq"  data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseFour">
     
ماذا تمنحني عضوية MyBusiness ؟
     
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        
          أن تكون عضوا علي My Business يمنحك العديد من الخصائص:
          <ul class="ul-faq2">
            <li>ناء شركة تكون متواجده علي مدار 24/7 طوال ايام الاسبوع و زيارات دولية لموقعك.</li>
        <li>- إدراج شركتك في دليل التجاري الخاص بنا.</li>
        <li>- الاشتراك في النشرات الاخبارية ( للنصائح التجارية)</li>
        <li>- دعم عملائك دائما عن طريق التواصل المباشر</li>
        <li>- استخدام خدماتنا</li>
      </ul>
      </div>
    </div>
  </div>


  <div class="card">
    <div class="card-header" id="headingFour">
      <h2 class="collapsed h2-faq"  data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFive">
     
ما هو دليل الشركات؟
     
      </h2>
    </div>
    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
      <div class="card-body">
        يعد دليل الأعمال الخاص بنا هو الميزة الأكثر فاعلية يمكن تقديمها لنشاطك 
التجاري. حيث سيمكن الدليل يتم إدراج نشاطك التجاري و فقا لقطاع الاعمال 
الخاص بك و كل و سائل التواصل بك ستكون أمام عملائك.



      </div>
    </div>
  </div>



  <div class="card">
    <div class="card-header" id="headingFive">
      <h2 class="collapsed h2-faq"  data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseSix">
     
كيف يساعد My Business في انشاء شركتي؟

     
      </h2>
    </div>
    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
      <div class="card-body">
       سيساعدك My Business في جميع الخطوات حيث انة يعطيك الفرصة لجمع جميع 
المعلومات اللازمة و الخاصة بمشروعك و بعد ذلك يمكنك الإنتشار عالمياً



      </div>
    </div>
  </div>


  <div class="card">
    <div class="card-header" id="headingSix">
      <h2 class="collapsed h2-faq"  data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSeven">
     
ماذا أستفاد عند إنشاء حسابي؟

     
      </h2>
    </div>
    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
      <div class="card-body">
       سوف تقوم بأنشاء صفحة للشركة الخاصة بك، ثم يمكنك التحكم في جميع أعمالك من 
خلال لوحة التحكم الخاصة بصفحة شركتك. أيضا ستحصل علي الخصائص التي تقدمها 
My Business و هي :
<ul class="ul-faq2">
        <li> عملك ظاهر 24 ساعة طوال ايام الاسبوع</li>
        <li>زائرين لعملك من كافة أنحاء العالم</li>
        <li>تقديم منتجاتك الجديدة عالمياً</li>
        <li>احصل على عملاء جدد وتواصل مع الحاليين</li>
        <li>زيادة الوعي بعلامتك التجاري</li>
        <li>التعرف على احتياجات عملائك عن قرب</li>
        <li>المزيد من الصفقات والاتفاقيات التجارية</li>
        <li>التأثير على قرارات عملائك</li>
        <li>زيادة الوعي بمنتجاتك</li>
        <li>تبادل وجمع المعلومات حول السوق</li>
      </ul>


      </div>
    </div>
  </div>



  <div class="card">
    <div class="card-header" id="headingSeven">
      <h2 class="collapsed h2-faq"  data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseEight">
     
كيف يمكن ان يساعدني My Business في تنمية عملي؟

     
      </h2>
    </div>
    <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
      <div class="card-body">
       My Business يمنحك فرصة المشاركة في المعارض المحلية و الدولية و يعطيك نفس 
التجربة التي تحصل عليها من خلال المعارض علي ارض الواقع و بتكلفة أقل 
بكثير. أيضا يمكنك المشاركة في المناقصات و المزادات و معرفة ما هي المعارض 
التجارية المختلفة القادمة في العالم كله.




      </div>
    </div>
  </div>




  <div class="card">
    <div class="card-header" id="headingEight">
      <h2 class="collapsed h2-faq"  data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseNine">
     
هل My Business شركة إعلانات؟

     
      </h2>
    </div>
    <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
      <div class="card-body">
لا، My Business هو موقع جديد مبتكر يقدم حلول أعمال وتسويق وأيضاً بيع، 
جديدة ومبتكرة عن طريق الخدمات الالكترونية لتنشيط التجارة و الاقتصاد في 
منطقة الخليج والشرق الاوسط و شمال أفريقيا.



      </div>
    </div>
  </div>


  <div class="card">
    <div class="card-header" id="headingNine">
      <h2 class="collapsed h2-faq"  data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseTen">
     
ما الفرق بين المعارض التقليدية و المعارض عبر الانترنت؟

     
      </h2>
    </div>
    <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordionExample">
      <div class="card-body">
المعارض التقليدية هي المعارض المنتشرة و المعروفة لكن هناك بعض السلبيات 
بها مثل:
      <ul class="ul-faq2">
        <li>التكلفة العالية</li>
        <li>عدم اتساع المكان اعدد اكبر من الزوار</li>
        <li>تكلفة تسوقية باهظة</li>
        <li>ابداع أقل</li>
        <li>لا يوجد قياسات واضحة لعائد المعرض علي استثمارك</li>
      </ul>
تعد المعارض عبر الانترنت أسهل كثيرا كما انها تضم بعض الايجابيات مثل:
<li>تكلفة أقل</li>
        <li>الكثير من الزوار ليس محليا فقط و إنما دوليا أيضا</li>
        <li>لا يوجد تكلفة للتسويق</li>
        <li>الكثير من الابداعات للوصول الي عملائك</li>
        <li>القدره علي معرفة قياسات المعرض و عائده علي استثمارك</li>
      </div>
    </div>
  </div>


  



</div>

<style type="text/css">

  .card-header{
    padding: 7x;
    cursor: pointer;
  }
  .h2-faq{
    font-size: 20px;
    margin-bottom: 0px;
  }
  .ul-faq, .ul-faq2{
    padding: 10px;
  }
.ul-faq li{
  list-style: circle;

}

.ul-faq2 li{
  list-style: decimal;

}
</style>






   







     <!--  -->
   </div>
</section>





<!-- scripts -->
<!-- Optional JavaScript -->
<!-- Optional JavaScript -->
<!-- social -->
<!-- search and count and bubbles pages -->
<!-- <script src="{{asset('website/js/plugins.js')}}" ></script>
   <script src="{{asset('website/js/script.js')}}" ></script> -->
@include('partials.website.footer')
<script src="{{asset('website/js/slider-blog.js')}}"></script>
<script src="{{asset('website/js/star-rating.js')}}" type="text/javascript"></script>
<script src="{{asset('website/js/jquery.liMarquee.js')}}"></script>
<script src="{{asset('website/js/jquery.rotator.js')}}"></script>
<script>
   $('.rb-rating').rating({
   'showCaption': true,
   'stars': '5',
   'min': '0',
   'max': '3',
   'step': '1',
   'size': 'xs',
   });
</script>
<script>
   $(window).load(function() { 
   
   /* basic - default settings */
   $('.str1').liMarquee();
   $('.str3').liMarquee({
     direction: 'left',  
     loop:-1,      
     scrolldelay: 0,   
     scrollamount:50,  
     circular: true,   
     drag: true      
   });
   
  $('.str4').liMarquee({
    direction: 'left',  
    loop:-1,      
    scrolldelay: 0,   
    scrollamount:50,  
    circular: true,   
    drag: true      
  });
   });
   
</script>
<script>
   jQuery(document).ready(function() {
    jQuery(".rotate").rotator();
   });
</script>
@endsection