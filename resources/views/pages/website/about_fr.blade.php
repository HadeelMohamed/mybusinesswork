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
<h1>quel est MyBusiness?</h1>
<p class="p-about">MyBusiness est la première plate-forme électronique au Moyen-Orient et 
en Afrique avec une référence européenne visant à aider (individus et 
entreprises) dans divers (secteurs d’activité) à fournir leurs produits, 
services et diffusion à l’international, à travers de nombreuses 
fonctionnalités et services innovants, en commençant par la création 
d’une page Web pour votre activité. Que ce soit (individu ou entreprise) 
et si vous offrez (une marchandise ou un service), puis la liste de 
votre entreprise dans le répertoire des entreprises Mybusines, ce qui 
amène les visiteurs et les clients potentiels à votre entreprise de 
partout dans le monde grâce à des fonctionnalités nouvelles et 
innovantes et des services.

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
          Quel est le montant des frais d’adhésion à MyBusiness?
           <div class="icon-accordion"><i class="fas fa-minus"></i></div>
      </h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        L’adhésion à MyBusiness est un abonnement annuel et nécessite un 
paiement tous les 365 jours pour renouveler votre adhésion


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
          ؟Qu’est-ce que je reçois pour mon abonnement MyBusiness?
          
          <div class="icon-accordion"><i class="fas fa-plus"></i></div>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample2">
     MyBusiness Membership vous offre de nombreuses fonctionnalités:-

      <div class="card-body">
      <ul class="ul-accodion">
      <li>Si vous (une personne ou une entreprise) obtiendrez un compte de 
trading, votre entreprise devient disponible 24 heures par jour, 7 jours 
par semaine, assurant ainsi aux visiteurs potentiels et aux clients 
locaux et internationaux pour votre entreprise.

</li>
  <li>Inclure le nom, les données et le logo de votre entreprise Auamelk dans 
un répertoire d’affaires international pour être entouré par de 
nombreuses entreprises dans différents domaines localement et 
internationalement pour compléter votre série d’affaires 
professionnellement et au plus haut niveau.
</li>
      <li>Abonnez-vous aux newsletters (pour recevoir les dernières nouvelles 
pour différents domaines d’activité).
</li>
      <li>Communiquez facilement avec vos clients actuels et soutenez 
instantanément de nouveaux clients en communiquant directement avec eux.
</li>
      <li>Vous serez en mesure de partager votre compte de trading dans le site 
Web MyBusiness sur tous les canaux de médias sociaux pour atteindre le 
plus grand nombre de clients intéressés par votre entreprise.
</li>
<li>Communiquez avec toutes les entreprises répertoriées dans le répertoire 
MyBusiness, augmentant ainsi la taille de votre entreprise au niveau 
local et international avec aisance et vous êtes à votre place.
</li>
<li>Vous serez en mesure d’interagir au sein (Money et Forum d’affaires) et 
ainsi augmenter vos compétences au niveau professionnel et personnel.
</li>
<li>Profitez des campagnes de marketing et de publicité professionnelles à 
l’échelle mondiale que MyBusiness fait pour que votre entreprise se 
propage localement et internationalement, ce qui vous assurera une plus 
grande sensibilisation de votre marque.
</li>
<li>Vous serez en mesure de montrer et de publier vos produits et services 
au niveau local et international pour le rendre facile d’atteindre le 
plus grand nombre de clients intéressés par votre entreprise et ainsi 
augmenter votre volume de ventes.
</li>
<li>Utiliser nos services (expositions en ligne – enchères en ligne – 
appels d’offres en ligne....).
</li>


      </ul>
      
      </div>
    </div>
  </div>
  
  
  
  
  
  
 <div class="card border-card">
    <div class="card-header back-accordion" id="headingThree">
      <h2 class="head-accordion" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Qu’est-ce que MyBusiness Business Guide?
          <div class="icon-accordion"><i class="fas fa-plus"></i></div>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample3">
      <div class="card-body">
    <div class="row">
    <div class="col-lg-12">Le répertoire d’affaires de MyBusiness est la fonctionnalité la plus 
efficace qui est particulièrement offerte à votre entreprise, où votre 
entreprise est répertoriée en fonction de votre domaine d’activité et 
montrant vos données d’entreprise et les médias, y compris les canaux de 
médias sociaux ( Facebook-Instagram...) et cela assurera votre 
entreprise apparaît au plus grand nombre de clients intéressés par vos 
produits et services, votre entreprise sera facilement visible pour tous 
les partenaires commerciaux potentiels intéressés par l’ouverture de 
nouveaux marchés, et la communication avec vous sera facile .

</div>

    </div>
      
      </div>
    </div>
  </div> 


   <div class="card border-card">
    <div class="card-header back-accordion" id="headingFour">
      <h2 class="head-accordion" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
          Que sont les expositions en ligne?
          <div class="icon-accordion"><i class="fas fa-plus"></i></div>
      </h2>
    </div>
    <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample3">
      <div class="card-body">
    <div class="row">
    <div class="col-lg-12">Si vous êtes un particulier ou une entreprise – vendez un produit ou 
offrez un service

</div>
  <div class="col-lg-12">Exclusif et pour la première fois vous pouvez participer et réserver un 
stand pour votre entreprise ou entreprise à une foire commerciale locale 
ou internationale où vous êtes à votre place juste en utilisant 
l’Internet, et obtenir l’expérience des expositions et de bénéficier de 
celui-ci vous donne un cos beaucoup plus bas t, vous pouvez profiter de 
toutes les caractéristiques et caractéristiques suivantes:-



  </div>
  <div class="card-body">
      <ul class="ul-accodion">
      <li>Offrir des biens et des services au plus grand segment des clients 
ciblés.
</li>
      <li>Bénéficiez du marketing et de la promotion professionnels réalisés par 
MyBusiness et de l’intérêt des médias spécialisés dans l’exposition.
</li>
      <li>Bénéficiez du marketing et de la promotion professionnels réalisés par 
MyBusiness pour l’exposition.
</li>
      <li>Identifier une grande base de fournisseurs.</li>
      <li>Identifier les nouvelles tendances du marché.</li>
      <li>Promotion et promotion de la marque.</li>
      <li>Identifier les nouvelles technologies sur le marché.</li>
      <li>Etude des compétiteurs.</li>
      <li>Créer une base de données pour les clients et ceux qui s’intéressent au 
marché.

</li>
      <li>Les expositions internationales sont un environnement favorable pour 
les opportunités d’investissement, le marketing et les transactions 
réussies.
</li>
<li>Accès à de nouveaux marchés.</li>

      </ul>
      
      </div> 

    </div>
      
      </div>
    </div>
  </div> 


  <div class="card border-card">
    <div class="card-header back-accordion" id="headingFive">
      <h2 class="head-accordion" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFour">
          Quelles sont les étapes à suivre pour participer à l’exposition?
          <div class="icon-accordion"><i class="fas fa-plus"></i></div>
      </h2>
    </div>
    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample3">
      <div class="card-body">
    <div class="row">
    <div class="col-lg-12">Vous pouvez vous abonner à l’une des expositions locales ou nationales 
et choisir d’être (exposant ou sponsor) en fonction de la nature et de 
la portée de votre travail et de vos services avec les étapes 
suivantes:-


</div>
    <br>
    <div class="col-lg-12">Accédez à la page expositions et trouvez des expositions disponibles en 
fonction de votre secteur d’activité ou de tout autre domaine 
d’activité.

</div>
<br>
  <div class="col-lg-12">Une fois que vous avez entré la page exposition, vous verrez les détails 
complets de l’exposition:-


</div>
<br>
<div class="col-lg-12">(Nom de l’exposition – espace d’exposition – date de début – Date 
d’expiration – informations sur l’exposition – entreprises et exposants 
ayant déjà réservé une suite – sponsors – nombre de produits et services 
ajoutés au salon).

</div>




    </div>
      
      </div>
    </div>
  </div> 



  <div class="card border-card">
    <div class="card-header back-accordion" id="headingSix">
      <h2 class="head-accordion" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseFour">
Est-ce que le coût des services MyBusiness?
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
          <th class="">coût</th>
          <th class="">Cost</th>
      </tr>
        <tr>
          <th class="">Salle de montre de Wayne</th>
          <th class=""><span class="title_table">100$</span><span class="free_style"> GRATUIT MAINTENANT </span></th>
      </tr>
      <tr>
          <th class="">Enchères en ligne</th>
          <th class=""><span class="title_table">20$</span><span class="free_style">GRATUIT MAINTENANT </span></th>
      </tr>
      </table>


    </div>
      
      </div>
    </div>
  </div> 



  <div class="card border-card">
    <div class="card-header back-accordion" id="headingSeven">
      <h2 class="head-accordion" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSix">
Quelles sont les caractéristiques des expositions en ligne?


          <div class="icon-accordion"><i class="fas fa-plus"></i></div>
      </h2>
    </div>
    <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample3">
      <div class="card-body">
    <h6><b>Que vous soyez un particulier ou une entreprise-que vous offrez un 
service ou la vente d’un produit, vous pouvez maintenant présenter vos 
services et produits dans les plus grandes expositions locales et 
internationales de votre lieu et donc:

</b></h6>
      <div class="card-body">
      <ul class="ul-accodion">
      <li>Fournir de l’emploi et des dépenses pour les exposants ainsi que les 
transports, louer la zone terrestre et la décoration de l’exposition et 
de préserver les produits au lieu d’être détruits pour une raison 
quelconque.

</li>
            <li>Facile à participer à l’exposition sans les tracas des permis, des 
séjours, des obligations de voyage, l’expédition des marchandises et le 
travail des panneaux d’affichage.

</li>
      <li>L’exposant peut atteindre plus d’un pays et plus de visiteurs et lui 
donner accès à de nouveaux marchés.

</li>
      <li>Communiquez facilement avec vos clients actuels et soutenez 
instantanément de nouveaux clients en communiquant directement avec eux.

</li>
<li>Vous serez en mesure de partager votre stand dans l’exposition sur tous 
les canaux de médias sociaux pour atteindre le plus grand nombre de 
clients intéressés dans votre domaine.
</li>
<li>Lorsque vous choisissez de participer en tant qu’exposant ou sponsor, 
vous verrez une page pour vous inscrire et réserver votre kiosque à 
l’intérieur de l’exposition, dans la page d’inscription, vous serez en 
mesure de placer votre nom d’entreprise et tous les détails de votre 
entreprise ou de l’entreprise qui sera montré à tous les  visiteurs au 
sein de l’exposition.
</li>
<li>Vous serez en mesure de montrer et de publier vos produits et services 
au niveau local et international au sein de l’exposition afin que 
d’atteindre le plus grand nombre de clients intéressés par votre 
entreprise est facile et vous êtes à votre place et donc augmenter votre 
volume de ventes.
</li>
<li>Inclure le nom, les données et le logo de votre entreprise ou de votre 
propre entreprise dans l’exposition pour devenir entouré par de 
nombreuses entreprises dans différents domaines localement et 
internationalement pour compléter votre série d’affaires 
professionnellement et au plus haut niveau.
</li>
<li>Vous serez en mesure d’identifier une grande base de fournisseurs et de 
nouvelles dans votre domaine et les tendances du marché.
</li>
<li>Promotion et promotion de la marque</li>
<li>Identifier les nouvelles technologies sur le marché.</li>
<li>Etude des compétiteurs</li>
<li>Créer une base de données pour les clients et ceux qui s’intéressent au 
marché.
</li>
<li>Les expositions internationales sont un environnement favorable pour 
les opportunités d’investissement, le marketing et les transactions 
réussies.
</li>
<li>Accès à de nouveaux marchés.</li>



      </ul>
      
      </div>
  


      </div>
    </div>
  </div>



   <div class="card border-card">
    <div class="card-header back-accordion" id="headingEight">
      <h2 class="head-accordion" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseSeven">
Comment s’inscrire?
          <div class="icon-accordion"><i class="fas fa-plus"></i></div>
      </h2>
    </div>
    <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample3">
      <div class="card-body">
    <h6><b>Comment s’inscrire?</b></h6>
      <div class="card-body">
      <ul class="ul-accodion">
      <li>Connectez-vous à mon site Web Business www.mybusinessme.com</li>
            <li>Entrez votre adresse e-mail</li>
      <li>Entrez votre mot de passe.</li>
      Vous recevrez un message confirmant votre compte, cliquez sur le lien de 
confirmation



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
Comment créer un compte professionnel pour votre entreprise?
          <div class="icon-accordion"><i class="fas fa-plus"></i></div>
      </h2>
    </div>
    <div id="collapseNine" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample3">
      <div class="card-body">
      <ul class="ul-accodion">
      <li>Connectez-vous à votre compte</li>
      <li>Sélectionner le type de compte</li>
      <li>Entrez votre nom d’entreprise/entreprise</li>
      <li>Sélectionnez pays</li>
      <li>Choisissez votre note d’entreprise</li>
      <li>Entrez votre entreprise ou vos informations commerciales</li>
      <li>Entrez des informations sur vos services</li>
      <li>Ajouter votre logo</li>
      <li>Créer un arrière-plan</li>
      <li>Cliquez sur Contactez-nous pour entrer:</li>
      <li>Adresse postale</li>
      <li>Téléphone portable</li>
      <li>Courriel</li>
      <li>Cliquez sur les liens des sites Web, puis ajoutez vos liens ou votre 
travail sur les sites de réseautage social
</li>
      <li>Cliquez ensuite sur mettre à jour.</li>
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

   <iframe width="100%" height="315" src="{{asset('website/videos/REG.mp4')}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 

</div> -->

  
  


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