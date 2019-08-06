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
<h1>nedir MyBusiness?</h1>
<p class="p-about">MyBusiness, birçok yenilikçi özellik ve hizmet aracılığıyla, 
faaliyetiniz için bir Web sayfasının oluşturulması ile başlayarak, 
çeşitli (iş sektörlerinde) kendi ürün, hizmet ve difüzyon sağlamak için 
(bireyler ve şirketler) yardım amaçlı bir Avrupa referansı ile Orta Doğu 
ve Afrika 'daki ilk elektronik platformdur. Olsun (bireysel veya şirket) 
ve olup olmadığını (bir emtia veya hizmet) daha sonra Mybusines iş 
dizininde iş listeleme böylece yeni ve yenilikçi özellikler ve hizmetler 
aracılığıyla tüm dünyadan iş ziyaretçileriniz ve potansiyel müşterileri 
getiriyor.

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
          MyBusiness üyelik ücreti ne kadardır?
           <div class="icon-accordion"><i class="fas fa-minus"></i></div>
      </h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        MyBusiness üyeliği yıllık bir üyeliktir ve üyeliğinizi yenilemek için 
her 365 günde bir ödeme gerektirir.


      </div>
      <table class="table table-bordered">

      <tr>
          <th class="">Annual Membership</th>
          <th class=""><span class="title_table">10$</span><span class="free_style"> Free NOW</span></th>
      </tr>
      </table>
    </div>
  </div>
  
  <div class="card border-card">
    <div class="card-header back-accordion" id="headingTwo">
      <h2 class="head-accordion" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          ؟MyBusiness üyeliği için ne alabilirim?
          
          <div class="icon-accordion"><i class="fas fa-plus"></i></div>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample2">
      MyBusiness üyeliği size birçok özellik sunar:-

      <div class="card-body">
      <ul class="ul-accodion">
      <li>Eğer (bir birey veya şirket) bir ticaret hesabı alacak, iş, 24 saat, 
haftanın 7 günü, böylece potansiyel ziyaretçi ve müşterileri iş için 
yerel ve uluslararası sağlamak kullanılabilir hale gelir.

</li>
            <li>İş zincirinizi profesyonelce ve en üst düzeyde tamamlamak için yerel ve 
uluslararası farklı alanlarda birçok şirket ile çevrili olmak için 
uluslararası bir iş dizininde şirket & iş adını, veri ve logosu dahil.

</li>
      <li>Bültenler (farklı iş alanları için son haberleri almak için) abone 
olun.
</li>
      <li>Mevcut müşterilerinizle kolayca iletişim kurun ve doğrudan onlarla 
iletişim kurarak yeni müşterileri anında destekle.
</li>
      <li>İşletmeniz ile ilgilenen müşterilerin en büyük sayısına ulaşmak için 
tüm sosyal medya kanallarında MyBusiness Web sitesi içinde ticaret 
hesabınızı paylaşmak mümkün olacak.
</li>
<li>MyBusiness dizininde listelenen tüm şirketleri ile iletişim, böylece 
kolaylıkla yerel ve uluslararası düzeyde işletmenizin boyutunu artırmak 
ve sizin yerinizde.
</li>
<li>Sen (para ve iş Forumu) içinde etkileşim ve böylece profesyonel ve 
kişisel düzeyde becerilerini artırmak mümkün olacak.
</li>
<li>MyBusiness iş yerel ve uluslararası, böylece marka daha fazla 
farkındalık sağlamak yaymak yapmak için yaptığı dünya çapında 
profesyonel pazarlama ve tanıtım kampanyaları yararlanın.
</li>
      </ul>
      
      </div>
    </div>
  </div>
  
  
  
  
  
  
 <div class="card border-card">
    <div class="card-header back-accordion" id="headingThree">
      <h2 class="head-accordion" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
         MyBusiness Business Directory nedir?
          <div class="icon-accordion"><i class="fas fa-plus"></i></div>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample3">
      <div class="card-body">
    <div class="row">
    <div class="col-lg-12">MyBusiness 's Business Directory, işletmenizin iş alanınıza göre 
listelendiği ve sosyal medya kanalları da dahil olmak üzere iş 
verilerinizi ve medyasını gösteren, işletmeniz için özellikle sunulan en 
etkili özelliktir ( Facebook-Instagram...) ve bu iş müşterilerinizin en 
çok sayıda görünür sağlayacaktır ürün ve hizmetleriniz Ile 
Ilgileniyorsanız, işletmeniz yeni pazarlar açmaya ilgilenen tüm 
potansiyel iş ortakları için kolayca görülebilir ve sizinle iletişim 
kurmak kolay olacak .


</div>

    </div>
      
      </div>
    </div>
  </div> 


   <div class="card border-card">
    <div class="card-header back-accordion" id="headingFour">
      <h2 class="head-accordion" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
          Online sergiler nelerdir?
          <div class="icon-accordion"><i class="fas fa-plus"></i></div>
      </h2>
    </div>
    <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample3">
      <div class="card-body">
    <div class="row">
    <div class="col-lg-12">Bir kişi veya şirket iseniz-bir ürün satmak veya bir hizmet sunmak
Özel ve ilk kez katılabilir ve iş veya şirket için bir kabin kitap 
sadece internet kullanarak yerinde olan bir yerel veya uluslararası 
ticaret fuarında, ve sergiler ve yarar deneyimi elde size çok daha düşük 
cos verir t, tüm aşağıdaki özellikleri ve özellikleri 
yararlanabilirsiniz:-



  </div>
  <div class="card-body">
      <ul class="ul-accodion">
      <li>Hedef müşterilerin en büyük segmentine mal ve hizmet sunan.</li>
      <li>Fuar için MyBusiness tarafından gerçekleştirilen profesyonel pazarlama 
ve promosyondan yararlanın.

</li>
      <li>Tedarikçiler büyük bir baz belirleyin</li>
      <li>Yeni ve piyasa eğilimlerini belirleyin.</li>
      <li>Promosyon ve ticari marka tanıtımı</li>
      <li>Piyasada yeni teknoloji belirleyin.</li>
      <li>Rakiplerin çalışması.</li>
      <li>Müşteriler için bir veritabanı ve piyasada ilgilenen olun.</li>
      <li>Uluslararası Sergiler yatırım fırsatları, pazarlama ve başarılı 
işlemler için elverişli bir ortamdır.

</li>
      <li>eni piyasalara erişim.</li>

      </ul>
      
      </div> 

    </div>
      
      </div>
    </div>
  </div> 


  <div class="card border-card">
    <div class="card-header back-accordion" id="headingFive">
      <h2 class="head-accordion" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFour">
          Sergiye katılmak için gereken adımlar nelerdir?
          <div class="icon-accordion"><i class="fas fa-plus"></i></div>
      </h2>
    </div>
    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample3">
      <div class="card-body">
    <div class="row">
    <div class="col-lg-12">Yerel veya ulusal sergilerden birine abone olabilir ve aşağıdaki 
adımlarla çalışma ve hizmetlerin doğası ve kapsamına göre (katılımcı 
veya sponsor) olmayı seçebilirsiniz:-


</div>
    <br>
    <div class="col-lg-12">Sergiler sayfasına erişin ve iş sektörüne veya başka bir iş alanına göre 
mevcut sergiler bulun.

</div>
<br>
  <div class="col-lg-12">Sergi sayfasına girdikten sonra, tam sergi ayrıntılarını görürsünüz:-
</div>
<br>
<div class="col-lg-12">(Sergi adı – fuar alanı – başlangıç tarihi – son kullanma tarihi – Fuar 
bilgileri – zaten bir süit ayırttım olan şirketler ve katılımcılar – 
sponsorlar – gösteriye eklenen ürün ve hizmetlerin sayısı).

</div>
<br>




    </div>
      
      </div>
    </div>
  </div> 



  <div class="card border-card">
    <div class="card-header back-accordion" id="headingSix">
      <h2 class="head-accordion" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseFour">
MyBusiness hizmetlerinin maliyeti nedir?
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
          <th class="">Maliyet  </th>
          <th class="">Hizmet</th>
      </tr>
        <tr>
          <th class="">Wayne 's showroom</th>
          <th class=""><span class="title_table">100$</span><span class="free_style"> ÜCRETSIZ ŞIMDI</span></th>
      </tr>
      <tr>
          <th class="">Online açık artırma</th>
          <th class=""><span class="title_table">20$</span><span class="free_style">ÜCRETSIZ ŞIMDI</span></th>
      </tr>
      </table>


    </div>
      
      </div>
    </div>
  </div> 



  <div class="card border-card">
    <div class="card-header back-accordion" id="headingSeven">
      <h2 class="head-accordion" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSix">
Online sergilerin özellikleri nelerdir?
          <div class="icon-accordion"><i class="fas fa-plus"></i></div>
      </h2>
    </div>
    <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample3">
      <div class="card-body">
    <h6><b>İster bir kişi ister bir şirket olsun, bir hizmet sunarak veya bir ürün 
satıyorsanız, şimdi sizin bulunduğunuz yerden ve böylece en büyük yerel 
ve uluslararası sergilerde hizmet ve ürünlerinizi sunabilirsiniz:

</b></h6>
      <div class="card-body">
      <ul class="ul-accodion">
      <li>Katılımcılar için istihdam ve giderler, ulaşım, arazi alanı ve Fuar 
dekorasyonu kiralamak ve herhangi bir nedenle yok olmak yerine ürünleri 
korumak sağlamak.

</li>
            <li>İzin, konaklamalar, seyahat yükümlülükleri, malların sevkiyatı ve reklam 
panoları çalışmaları olmadan sergiye katılmak kolay

</li>
      <li>Katılımcı birden fazla ülkeye ve daha fazla ziyaretçine ulaşabilir ve 
ona yeni pazarlara erişim imkanı verebilir.

</li>
      <li>Mevcut müşterilerinizle kolayca iletişim kurun ve doğrudan onlarla 
iletişim kurarak yeni müşterileri anında destekle

</li>
<li>Eğer alan ilgilenen müşterilerin en fazla sayıda ulaşmak için tüm 
sosyal medya kanalları sergi içinde Standınızı paylaşmak mümkün olacak
</li>
<li>Bir katılımcı veya sponsor olarak katılmak için seçerken bir sayfa kayıt 
ve sergi içinde Standınızı kitap göreceksiniz, kayıt sayfası içinde iş 
adınızı ve tüm gösterilecek şirket veya iş tüm detayları yerleştirmek 
mümkün olacak  Sergi içinde ziyaretçiler.
</li>
<li>Eğer iş ilgilenen müşterilerin en fazla sayıda ulaşan kolay ve böylece 
satış hacmini artırmak, böylece sergi içinde yerel ve uluslararası 
düzeyde ürün ve hizmetleri göstermek ve yayınlamak mümkün olacak.
</li>
<li>Profesyonel ve en üst düzeyde iş serisini tamamlamak için yerel ve 
uluslararası farklı alanlarda birçok şirket tarafından çevrili olmak 
için sergide şirket veya kendi iş adı, veri ve logo dahil.
</li>
<li>Sen tedarikçiler büyük bir baz ve saha ve pazar trendleri yeni 
belirlemek mümkün olacak.
</li>
<li>Promosyon ve ticari marka tanıtımı</li>
<li>Piyasada yeni teknoloji belirleyin</li>
<li>Rakiplerin çalışması</li>
<li>Müşteriler için bir veritabanı ve piyasada ilgilenen olun</li>
<li>Uluslararası Sergiler yatırım fırsatları, pazarlama ve başarılı 
işlemler için elverişli bir ortamdır.
</li>
<li>Yeni piyasalara erişim</li>




      </ul>
      
      </div>
  


      </div>
    </div>
  </div>



   <div class="card border-card">
    <div class="card-header back-accordion" id="headingEight">
      <h2 class="head-accordion" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseSeven">
Nasıl kayıt olunur?
          <div class="icon-accordion"><i class="fas fa-plus"></i></div>
      </h2>
    </div>
    <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample3">
      <div class="card-body">
    <h6><b>Nasıl kayıt olunur?</b></h6>
      <div class="card-body">
      <ul class="ul-accodion">
      <li>Benim Iş www.mybusinessme.com Web sitesine giriş</li>
            <li>E-posta adresinizi girin</li>
      <li>Parolanızı girin.</li>
      Hesabınızı teyit eden bir mesaj alacaksınız, onay bağlantısına tıklayın


      </ul>
       <div class="col-6">
         <iframe width="100%" height="315" src="{{asset('website/videos/REG.mp4')}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 
        </div>  
      </div>
  


      </div>
    </div>
  </div>


  <div class="card border-card">
    <div class="card-header back-accordion" id="headingNine">
      <h2 class="head-accordion" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseEight">
Şirketiniz için bir iş hesabı nasıl oluşturulur?
          <div class="icon-accordion"><i class="fas fa-plus"></i></div>
      </h2>
    </div>
    <div id="collapseNine" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample3">
      <div class="card-body">
      <ul class="ul-accodion">
      <li>Hesabınıza giriş yapın</li>
      <li>Hesap türünü seçin</li>
      <li>İşletme adınızı/şirketinizi girin</li>
      <li>Ülke Seç</li>
      <li>Şirket derecelendirmesini seçin</li>
      <li>Şirketiniz veya iş bilgilerinizi girin</li>
      <li>Hizmetleriniz hakkında bilgi girin</li>
      <li>Logonuzu ekleyin</li>
      <li>Arka plan oluşturma</li>
      <li>Girmek için bize ulaşın tıklayın:</li>
      <li>Adres</li>
      <li>Telefon</li>
      <li>E-posta adresi</li>
      <li>Web sitelerinin bağlantılarını tıklayın ve ardından sosyal ağ 
sitelerinde bağlantılarınızı veya çalışmanızı ekleyin
</li>
      <li>Ardından Güncelle 'ye tıklayın.</li>
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