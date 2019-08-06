
<!doctype html>
<html lang="{{LaravelLocalization::getCurrentLocale()}}">
  @include('partials.website.headold')
  <body>
<!-- <div class="loader-wrap">
  <div class="pin"></div>
  <div class="pulse"></div>
</div> -->
        <!--loader end-->

<!-- <div id="ajaxLoader" style="display: none;">
    <i></i>
    <i></i>
    <i></i>
</div>     -->    
        <!-- Main  -->

  <!--...........................menu...................-->
  
@include('partials.website.menu')


@include('partials.website.nav')  








</div>





</div>
</div>
</div>  
  


         
  <script type="text/javascript">
  document.oncontextmenu = document.body.oncontextmenu = function() {return false;}

  
  </script>





<!-- <div class="head-menu"></div> -->

  
  <!--...........................five sec...................-->
  
  
  
@yield('content')









    


  </body>
</html>