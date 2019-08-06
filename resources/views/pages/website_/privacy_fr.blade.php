@extends('layouts.website')
@section('title','Home')
@section('content')
<br><br><br><br>
<!--...........................five sec...................-->
<section class="sec-services">
  <div class="container">
    <h4>Statut et amendements</h4>
    <h5>1-  Cette politique de confidentialité fait partie intégrante des conditions d'utilisation de ce site Web. Vous ne pouvez donc pas l’utiliser si vous n'êtes pas d'accord avec cette politique. </h5>
    <h5>2-  Mybusiness peut, à sa seule discrétion, modifier cette politique de temps à autre, date à laquelle la politique modifiée entrera immédiatement en vigueur concernant l'utilisation continue de ce site Web.</h5>
<br>
    <h4>Collecte de données personnelles</h4>
    <h5>3-  Le site Web Mybusiness s’engage fortement à protéger la confidentialité de ses utilisateurs.</h5>
    <h5>4-  Mybusiness dispose des informations recueillies sur les utilisateurs par leur utilisation de ce site Web. </h5>
    <h5>5-  Mybusiness n'utilise ni ne dévoile aucune information concernant vos visites individuelles ou les informations que vous pouvez nous fournir, telles que votre nom, adresse, courrier électronique ou numéro de téléphone, à des sociétés externes.</h5>
<br>
    <h4>Liens vers d'autres sites Web</h4>
    <h5>6-  Nous n'exerçons aucun contrôle sur les pratiques de confidentialité des sites tiers auxquels des liens hypertextes pourraient être fournis et nous n’assumons aucune responsabilité à leur égard. Nous vous recommandons vivement de consulter la politique de confidentialité de tout site que vous visitez avant de l'utiliser de nouveau.</h5>
    <h5>7-  Bien que des mesures raisonnables soient prises pour assurer la sécurité et l’intégrité des informations soumises sur ce site, ce dernier ne peut en aucun cas se charger des pertes ou d’autres dégâts subis par un ou des utilisateur(s) conséquemment au dévoilement d'informations intentionnel ou accidentel par un employé de Mybusiness ou un tiers.</h5>
    <h5>8-  Les utilisateurs et / ou abonnés ne sont pas autorisés à dévoiler leur nom d'utilisateur et / ou leur mot de passe à une autre personne.</h5>
<br>
    <h4>Cookies </h4>
    <h5>En poursuivant votre navigation sur notre site, vous acceptez la politique de confidentialité des données de ce site ainsi que l'utilisation de cookies pour sécuriser votre connexion, faciliter votre navigation, proposer des services et offres adaptés et réaliser des statistiques de visites.</h5>



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