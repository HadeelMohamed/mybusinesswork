@extends('layouts.website')
@section('title','Home')
@section('content')
<br><br><br><br>
<!--...........................five sec...................-->
<section class="sec-services">
  <div class="container">
    <h4>الوضع والتعديلات</h4>
    <h5>1- تشكل سياسة الخصوصية هذه جزءًا من شروط وأحكام استخدام هذا الموقع الإلكتروني. ولا يمكنك استخدام هذا الموقع الإلكتروني ما لم توافق على هذه السياسة.</h5>
    <h5>2- يمكن لفريق My Business حسب تقديره الخاص تعديل هذه السياسة من حين إلى آخر، حيث تدخل هذه السياسة المعدلة حيز النفاذ على الفور فيما يتعلق بالاستخدام المستمر لهذا الموقع الإلكتروني.</h5>
<br>
    <h4>جمع البيانات الشخصية</h4>
    <h5>3.  يلتزم موقع My Business التزامًا تامًا بحماية خصوصية مستخدميه.</h5>
    <h5>4.  تعتبر المعلومات التي تُجمع عن المستخدمين من خلال استخدامهم لهذا الموقع الإلكتروني ملكًا لموقع My Business.</h5>
    <h5>5.  لا يستخدم My Business أو يكشف عن معلومات زياراتك الفردية أو أي معلومات نحصل عليها منك مثل اسمك أو عنوانك أو عنوان بريدك الإلكتروني أو رقم هاتفك لأي شركات خارجية.</h5>
<br>
    <h4>روابط المواقع الإلكترونية الأخرى</h4>
    <h5>6.  لا نتحكم في ممارسات الخصوصية لأي مواقع خارجية قد يحتوي موقعنا على روابط لها ولا نتحمل أي مسؤولية عنها، ونوصي بشدة بمراجعة سياسة الخصوصية بأي موقع تزوره قبل التوغل في استخدامه.</h5>
    <h5>7.  نتخذ التدابير المناسبة لضمان أمن وسلامة المعلومات المقدمة على هذا الموقع، إلا أن هذا الموقع الإلكتروني لا يتحمل أي مسؤولية تحت أي ظروف عن أي خسائر أو أضرار أخرى يحدثها أي مستخدم أو مستخدمين نتيجة نشر أي من موظفي My Business أو أي طرف ثالث للمعلومات بشكل متعمد أو غير مقصود.</h5>
    <h5>8.  يحظر على المستخدمين و/أو المشتركين إطلاع أي شخص آخر على اسم المستخدم و/أو كلمة المرور الخاصة بهم.</h5>
<br>
    <h4>ملفات تعريف الارتباط  </h4>
    <h5>تشكل مواصلة تصفح موقعنا الإلكتروني بمثابة موافقتك على سياسة خصوصية البيانات الخاصة بالموقع وكذلك استخدام ملفات تعريف الارتباط لحماية اتصالك وتيسير التصفح وتقديم الخدمات والعروض الملائمة وإجراء إحصائيات للزيارات.</h5>



  </div>
</section>

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