@extends('layouts.website')
@section('title','Home')
@section('content')
<br><br><br><br>
<!--...........................five sec...................-->
<section class="sec-services">
  <div class="container">
    <h4>Terimler ve koşullar</h4>
    <h5>KULLANICI, BU İNTERNET SİTESİNİN (<a href="{{url('/')}}">www.mybusinessme.com</a>) KULLANIMINDA AŞAĞIDA BELİRTİLEN HÜKÜMLERİN VE KOŞULLARIN GEÇERLİ OLDUĞUNU KABUL EDER.KULLANICI, BU SİTEYİ KULLANARAK TÜM KULLANIM HÜKÜMLERİNE VE KOŞULLARINA UYMAYI KABUL EDER.</h5>
<br>
    <h4>Tanımlar</h4>
    <h5>"İnternet sitesi sahibi" ve/veya "mybusiness" ve/veya "bu internet sitesi", <a href="{{url('/')}}" >https://www.mybusinessme.com</a>'u ve www.mybusinessme.com'un, diğer sitelere giden harici bağlantıların bulunduğu alt sayfaları ifade eder. "Kullanıcı" bu internet sitesinin herhangi bir bölümüne erişen veya ihalelerle ilgili günlük e-posta bildirimi alan kişileri ifade eder.</h5>
<br>
    <h4>Sitenin kullanımı</h4>
    <h5>My Business, bu hüküm ve koşulları istediği zaman değiştirme hakkını saklı tutar. Kullanıcılar daima, internet sitesinin değiştirilen kullanım hükümleri ve koşulları hakkında bilgi sahibi olmakla sorumludur. İnternet sitesinin sürekli kullanımı kullanıcının bu hüküm ve koşulları kabul ettiği anlamına gelir.
Bu internet sitesinde yer alan bilgilerin amacı sitenin kullanımına ilişkin eksiksiz sorumluluk kabul eden kullanıcı veya işletme için Online teşhirler, Online müzayedeler ve Online İhaleler hakkında bildirim hizmetleri sunmak ve gerçekleştirmektir.</h5>
<br>
    <!-- <h4>Terms And Conditions</h4> -->
    <h5>My Business internet sitesine (www.Mybusinessme.com) abone olmak tek kullanıcıya yetki verir.Bu da, yalnızca bir kullanıcının satın alınan abonelik için tek hizmete erişmesi anlamına gelir.Kullanıcı, kullanıcı adı ve şifre üzerinden ihaleyle ilgili ayrıntılı bilgilere erişebilir. Bu kullanıcı adı ve şifre başkalarına verilmemelidir. Kullanıcılar, internet sitesindeki bilgileri ve belgeleri görüntülemek, kopyalamak ve indirmek amacıyla internet sitesine erişebilir.
My Business tarafından sağlanan tüm bilgiler telif hakkına tabi olup asıl hali veya yeniden düzenlenmiş hali kullanıcı dışında herhangi bir kişi için çoğaltılamaz, kopyalanamaz veya yeniden satışı yapılamaz.</h5>
<br>
    <!-- <h4>Terms And Conditions</h4> -->
    <h5>Tüm abonelikler Abone tarafından, bu belgede belirtilen hükümlere uygun olarak ödenecektir. Abonelik ödemeleri iade edilemez.</h5>
<br>
    <!-- <h4>Terms And Conditions</h4> -->
    <h5>Kullanıcı, önceden ödenen aylık veya yıllık abonelik ücretinden sorumludur. Abonelik ücretleri onaylanma tarihinden itibaren kesilecektir.</h5>
<br>
    <!-- <h4>Terms And Conditions</h4> -->
    <!-- <h5>THE USER AGREES THAT THE USE OF THIS WEBSITE (<a href="{{url('/')}}">www.mybusinessme.com</a>) IS SUBJECT TO THE TERMS AND CONDITIONS OF USE SET OUT BELOW. BY USING THIS SITE THE USER HAS AGREED TO OBSERVE ALL TERMS & CONDITIONS OF USE.</h5> -->

    <!-- <h4>Terms And Conditions</h4> -->
    <h5>My Business, ödeme veya alışveriş vade tarihinde gerçekleşmezse bu anlaşmayı herhangi bir bildirim yapmadan feshetme ve iptal etme hakkını saklı tutar.</h5>
<br>
    <h5>My Business, bu hizmeti herhangi bir bildirim yapmadan geri çekme hakkını saklı tutar.</h5>
<br>
 <h5>Kullanıcı'nın My Business aboneliği belirtilen dönem içindir. Bu abonelik, Abonenin 15 günlük yazılı bildirimiyle feshedilmezse süresiz olarak devam edecektir.</h5>
<br>
 <h5>My Business reklamlarda, bağlantılarda veya sponsorluk materyallerinde yer alabilecek hatalardan veya yanlışlıklardan sorumlu değildir.</h5>
<br>
<h5>My Business, alıcı ile satıcı arasındaki ilişki veya ticari faaliyet konusunda hiçbir sorumluluk almaz.</h5>

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