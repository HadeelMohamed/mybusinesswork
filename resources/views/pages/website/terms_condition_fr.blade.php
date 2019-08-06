@extends('layouts.website')
@section('title','Home')
@section('content')
<br><br><br><br>
<!--...........................five sec...................-->
<section class="sec-services">
  <div class="container" style="    padding-top: 30px;
">
    <h4>Termes et conditions</h4>
    <h5>L'UTILISATEUR ACCEPTE QUE L'UTILISATION DE CE SITE WEB (<a href="{{url('/')}}">www.mybusinessme.com</a>) EST SOUMISE AUX TERMES ET CONDITIONS ÉNONCÉS CI-APRÈS. EN UTILISANT CE SITE, L'UTILISATEUR ACCEPTE DE RESPECTER TOUS LES TERMES ET CONDITIONS GÉNÉRALES D'UTILISATION.</h5>
<br>
    <h4>Définitions</h4>
    <h5>"Propriétaire du site Web" et / ou "mybusiness","ce site" désigne <a href="{{url('/')}}"> https: // www.mybusinessme.com </a> et toutes ses sous-pages, à l'exclusion des liens vers des sites externes "utilisateur" signifie toute personne accédant à une partie quelconque de ce site Web ou recevant nos notifications par courrier électronique pour être informée des appels d'offres quotidiennes</h5>
<br>
    <h4>Utilisation du site</h4>
    <h5>MyBusiness se réserve le droit de modifier les présents termes et conditions à tout moment. Les utilisateurs restent en tout temps responsables de s'assurer qu'ils sont au courant des termes et conditions d'utilisation modifiés et que l’utilisation de ce site Web est considérée comme un consentement de leur part. </h5>
<br>
    <!-- <h4>Terms And Conditions</h4> -->
    <h5>Les informations incluses dans ce site sont uniquement destinées à fournir et gérer des expositions en ligne, des enchères en ligne, des services de notification d'appels d'offres en ligne pour l'usage personnel de l'utilisateur ou de l'entreprise, qui accepte d’assumer l'entière responsabilité de leur utilisation.</h5>
<br>
    <!-- <h4>Terms And Conditions</h4> -->
    <h5>L'abonnement au site Web Mybusiness (<a href="{{url('/')}}">www.Mybusinessme.com</a>) constituerait une licence pour utilisateur. Cela signifie qu'un seul utilisateur a accès à un seul service par abonnement acheté. L'accès aux détails de l'appel d'offres est fourni au moyen d'un nom d'utilisateur et d'un mot de passe, qui ne peuvent pas être divulgués à des tiers. Les utilisateurs sont autorisés à accéder au site Web pour afficher, copier et télécharger les informations et les documents à partir du site.
</h5>
<br>
    <!-- <h4>Terms And Conditions</h4> -->
    <h5>Toutes les informations fournies par Mybusiness sont soumises au droit d'auteur et ne doivent pas être reproduites, copiées, divulguées, fournies ou revendues sous leur forme originale ou remixées à une personne autre que l'utilisateur.</h5>

    <!-- <h4>Terms And Conditions</h4> -->
    <!-- <h5>THE USER AGREES THAT THE USE OF THIS WEBSITE (<a href="{{url('/')}}">www.mybusinessme.com</a>) IS SUBJECT TO THE TERMS AND CONDITIONS OF USE SET OUT BELOW. BY USING THIS SITE THE USER HAS AGREED TO OBSERVE ALL TERMS & CONDITIONS OF USE.</h5> -->
<br>
    <!-- <h4>Terms And Conditions</h4> -->
    <h5>Tous les abonnements sont payables par le souscripteur conformément aux conditions indiquées ci-dessous. Les paiements d’abonnement ne sont pas remboursables.</h5>
<br>
    <h5>L'utilisateur est tenu de payer des frais d'abonnement mensuels ou annuels à l'avance, lesquels doivent être payés à compter de la date de confirmation.</h5>
<br>
 <h5>Mybusiness se réserve le droit de résilier le présent contrat et d'annuler sans préavis tout abonnement dont le paiement ou la transaction n'a pas été reçu à la date d'échéance.</h5>
<br>
 <h5>Mybusiness se réserve le droit de retirer sans préavis ce service.</h5>
<br>
<h5>L'utilisateur doit s'abonner à Mybusiness pour la période indiquée et par la suite il doit continuer de l’utiliser pour une durée indéterminée, sauf en cas de résiliation par le truchement d'un préavis écrit de 15 jours envoyé par l'abonné.</h5>
<br>
<h5>Mybusiness n'est pas responsable des erreurs ou des inexactitudes de publicité, des liens incorrects ou du matériel de commande publicitaire.</h5><br>
<h5>Mybusiness n’assume  aucune responsabilité ayant rapport avec toute communication ou transaction entre l’acheteur et le vendeur.</h5>

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