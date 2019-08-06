@extends('layouts.website')
@section('title','Home')
@section('content')
<br><br><br><br>
<!--...........................five sec...................-->
<section class="sec-services">
  <div class="container">
    <h4>Durumu ve Düzeltmeler</h4>
    <h5>1-Bu Gizlilik Politikası, bu internet sitesinin Kullanım Hükümlerinin ve Koşullarının bir bölümünü oluşturur. Bu Politikayı kabul etmiyorsanız bu internet sitesini kullanmayabilirsiniz.</h5>
    <h5>2-My Business, kendi takdirine göre bu politikayı zaman zaman değiştirebilir. Değiştirilen politika, bu internet sitesi devamlı kullanıldığı için hemen geçerlilik kazanacaktır.</h5>
<br>
    <h4>Kişisel verilerin toplanması</h4>
    <h5>3.  My Business internet sitesi, kullanıcılarının gizliliğini korumayı taahhüt eder.</h5>
    <h5>4.  Kullanıcıların bu internet sitesini kullanmaları sonucunda toplanan bilgiler My Business'ın mülkiyetindedir.</h5>
    <h5>5.  My Business internet sitesine yaptığınız ziyaretleri veya isim, adres, e-posta adresi veya telefon numarası gibi bilgilerinizi kullanmaz veya başka şirketlere vermez.</h5>
<br>
    <h4>Diğer internet sitelerine olan bağlantılar</h4>
    <h5>6.  Köprülerin verilebileceği üçüncü taraf sitelerinin gizlilik uygulamalarında kontrolümüz bulunmamaktadır ve bu uygulamalarla ilgili herhangi bir sorumluluk kabul etmemekteyiz. Bu nedenle tüm siteleri kullanmadan önce gizlilik politikalarını incelemenizi öneririz.</h5>
    <h5>7.  Bu sitede sunulan bilgilerin güvenliğini ve bütünlüğünü sağlamaya yönelik uygun önlemler alındığı halde bu internet sitesi, My Business çalışanının veya üçüncü bir tarafın sitedeki bilgileri planlı veya yanlışlıkla ifşa etmesi sonucu doğabilecek kayıplardan veya diğer zararlardan asla sorumlu tutulamaz.</h5>
    <h5>8.  Kullanıcıların ve/veya abonelerin kullanıcı adlarını ve/veya şifrelerini başka taraflara bildirmeleri yasaktır.</h5>
<br>
    <h4>Çerezler </h4>
    <h5>İnternet sitemizde gezintiye devam ederek bu internet sitesinin veri gizliliği politikasının yanı sıra bağlantınızı korumayı, gezintinizi kolaylaştırmayı, uyarlanmış hizmetler ve teklifler sunmayı ve ziyaretlerden istatistiksel veriler çıkarmayı amaçlayan çerezlerin kullanımını kabul ediyorsunuz.</h5>



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