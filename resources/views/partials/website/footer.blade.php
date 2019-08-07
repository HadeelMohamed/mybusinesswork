<!--my-business-project-footer-page start-->
<footer class="my-business-project-footer-page width-percent-100">
  <div class="container">
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <ul class="footer-ul">
          <li>
            <a href="#">privacy Policy</a>
          </li>
          <li>
            <a href="#">Termes And Conditions</a>
          </li>
          <li>
            <a href="#">Contact Us</a>
          </li>
          <li>
            <a href="#">FAQS</a>
          </li>
          <li>
            <a href="#">Help And Support</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="row">
      <!--footer div item start-->
      <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
        <div class="mony-pay-div">
           <span><img  src="{{asset('mybusinessnewwebsite/img/mastercard2.png')}}"  alt="my business images" ></span>
              <span><img  src="{{asset('mybusinessnewwebsite/img/visa_PNG30.png')}}"  alt="my business images" ></span>
                <span><img  src="{{asset('mybusinessnewwebsite/img/pay-pal.png')}}"  alt="my business images" ></span>
   </div>
      </div>
      <!--/footer div item end-->
      <!--footer div item start-->
      <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
        <p class="copy-rights-p" >
          <span class="copy-rights-icon"><i class="fas fa-copyright"></i></span>
          <span class="copy-rights-span-text" > 2019 Copy Rights to mybusinessme.com </span>
        </p>
      </div>
      <!--/footer div item end-->
      <!--footer div item start-->
      <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
        <div class="social-media-div">
          <span class="facebook-span" ><a href="#"><i class="fab fa-facebook-f"></i></a></span>
          <span class="twitter-span" ><a href="#"><i class="fab fa-twitter"></i></a></span>
          <span class="instgram-span" ><a href="#"><i class="fab fa-instagram"></i></a></span>
        </div>
      </div>
      <!--/footer div item end-->
    </div>
  </div>
</footer>
<!--/my-business-project-footer-page end-->
<!-- modals start-->
<!--login modal start-->
<div class="modal fade login-modal-class" id="login-modal-id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <img class="modal-title" id="" src="{{asset('mybusinessnewwebsite/img/Trans5.png')}}" width="150px" height="auto" />
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="social-media-buttons">
          <p class="modal-p">For faster login or register use your social account.</p>
          <a href="/redirect/facebook" class="facebook-button face-book-background-color">
          <span class="social-media-icon"><i class="fab fa-facebook-square"></i></span>
          <span class="social-media-text" > Log in with Facebook</span>
          </a>
          <a href="/redirect/google" class="google-button google-background-color">
          <span class="social-media-icon"><i class="fab fa-google"></i> </span>
          <span class="social-media-text"> Log in with Google</span>
          </a>
        </div>
        <div class="login-register-tab">
          <h5 class="or-login-register-word">or</h5>
          <!--tab start-->
          <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active" id="login-modal-tab" data-toggle="tab" href="#login-modal" role="tab" aria-controls="login-modal" aria-selected="true">Login</a>
              <a class="nav-item nav-link" id="Registe-modal-tab" data-toggle="tab" href="#Registe-modal" role="tab" aria-controls="Registe-modal" aria-selected="false">Register</a>
            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active login-modal-active-class" id="login-modal" role="tabpanel" aria-labelledby="login-modal-tab">
              <form class="padding-vertical-30"  id="loginformodal" method="POST" action="{{route('login')}}">
@csrf
                <div class="form-group padding-vertical-10 ">
                  <label for="exampleInputEmail1">Username or Email Address
                  <span class="my-business-red-font-color">*</span> </label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="emaillogin" placeholder="Enter Your email or user">
                </div>
                <div class="form-group padding-vertical-10">
                  <label for="exampleInputPassword1">Password
                  <span class="my-business-red-font-color">*</span></label>
                  <input type="password" class="form-control" id="exampleInputPassword1" name ="passwordlogin" placeholder="Password">
                </div>

                <div>
                   <span class='errormodal'id='dangermsgadd' ></span>
              </div>
                <div class="form-group form-check padding-vertical-10  form-check-label ">
                  <input type="checkbox" class="form-check-input option-input margin-left-5 margin-right-5" id="exampleCheck1" name="remember">
                  <label class="form-check-label padding-left-0" for="exampleCheck1">Remember Me</label>
            <span class="padding-horizontal-15  padding-horizontal-0-inresponsive  display-block-in-responsive">
                  <a href="#">Forget Your Password ?</a>
                  </span>
                </div>


                <button type="submit" class="btn my-business-red-background-color white-color  margin-vertical-20  padding-vertical-10  padding-horizontal-30 hvr-shadow" id="loginmodalbutton">Login</button>
              </form>
            </div>
            <div class="tab-pane fade registe-modal-class" id="Registe-modal" role="tabpanel" aria-labelledby="Registe-modal-tab">
              <form class="padding-vertical-30" id="registerformodal" method="POST" action="{{route('registermodal')}}" >
                <meta name="csrf-token" content="{{ csrf_token() }}" />
@csrf
              <input hidden="" id="exh_slug_session" type="text" name="exh_slug_session" value="">


                <div class="form-group padding-vertical-10 ">
                  <label for="exampleInputEmail1">First Name
                  <span class="my-business-red-font-color">*</span> </label>
                  <input type="text" class="form-control"  placeholder=" First Name" name="firstname">
                   <span class="span_error"></span>
                </div>
                <div class="form-group padding-vertical-10 ">
                  <label for="exampleInputEmail1">Last Name
                  <span class="my-business-red-font-color">*</span> </label>
                  <input type="text" class="form-control"  placeholder=" Last Name" name='lastname'>
                   <span class="span_error"></span>
                </div>
                <div class="form-group padding-vertical-10 ">
                  <label for="exampleInputEmail1"> Email
                  <span class="my-business-red-font-color">*</span> </label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" Email" name="email" id="email">
                   <span class="span_error"></span>
                </div>

                <div class="form-group padding-vertical-10">
                  <label for="exampleInputPassword1">Password
                  <span class="my-business-red-font-color">*</span></label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" id="password">
                   <span class="span_error"></span>
                </div>
              <div class="form-group padding-vertical-10">
                  <label for="exampleInputPassword2">Confirme Password
                  <span class="my-business-red-font-color">*</span></label>
                  <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Confirme Password" name="password_confirm" id="password_confirm">
                   <span class="span_error"></span>
                </div>
                <button type="submit" class="btn my-business-red-background-color white-color  margin-vertical-20  padding-vertical-10  padding-horizontal-30 hvr-shadow">Register</button>
              </form>
            </div>
          </div>


          <!-- / tab end-->
        </div>
      </div>
    </div>
  </div>
</div>
<!-- / login modal end-->
<!--/ modals end-->
<!-- my-business-project project Libraries -->
<!-- JQuery Library -->
<script src="{{asset('mybusinessnewwebsite/js/jquery.js')}}" ></script>
<!-- popper Library -->
<script src="{{asset('mybusinessnewwebsite/js/popper.js')}}"></script>
<!-- bootstrap Library -->
<script src="{{asset('mybusinessnewwebsite/js/bootstrap.js')}}"></script>
<!-- owl carousel Library -->
<script src="{{asset('mybusinessnewwebsite/js/owl.carousel.min.js')}}"></script>
<!-- font awesome Library -->
<script src="{{asset('mybusinessnewwebsite/js/font-awesome.min.js')}}"></script>
<!--select2 library-->
<script src="{{asset('mybusinessnewwebsite/js/select2.full.min.js')}}" ></script>
<!--flat picker library-->
<script src="{{asset('mybusinessnewwebsite/js/flat-picker.js')}}" ></script>

<!-- /my-business-project project Libraries -->
<script src="{{asset('mybusinessnewwebsite/js/jquery.validate.js')}}"></script>
<script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
<script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
<!-- /jquery validation-->
<!-- custome js file  -->
<script src="{{asset('mybusinessnewwebsite/js/min.js')}}"></script>
</body>
</html>
