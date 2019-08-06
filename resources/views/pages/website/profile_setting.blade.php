@include('partials.website.header')
<!--my-business-profile-setting-form-page start -->
<section class="my-business-profile-setting-form-page  width-percent-100  ">
   <!--setting-form-section start -->
   <div class="setting-form-section width-percent-100  ">
      <div class="container">
         <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
               <h1 class="my-business-red-font-color font-weight-bold">Welcome to my business</h1>
            </div>
         </div>
         <div class="row">
            <!--setting-page-the-firest-of-form-section start-->
            <form class="col-xl-12 col-lg-12 col-md-12 col-sm-12   setting-page-the-firest-of-form-section " id="profilesetting">
               <div class="row  margin-top-20 ">
                  <!--form item start-->
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12  margin-top-20 ">
                     <h4 class=" font-weight-bold ">Finish your profile to enjoy our free services</h4>
                  </div>
                  <!-- / form item end-->
                  <!--form item start-->
                  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 form-group padding-horizontal-0">
                     <!--form item start-->
                     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group margin-top-20 profile-setting-date-of-birth-div resetDate">
                        <label for="setting-profile-date-of-birth-id" class="setting-profile-form-label display-block">
                        <span>Date of birth</span>
                        <span class="my-business-red-font-color">*</span>
                        </label>
                        <input type="text" placeholder="DD / MM / YYYY"  data-input class="form-control my-business-input-style " name='date'>
                        <button class="input-button btn" title="clear" data-clear>clear</button>
                     </div>
                     <!-- / form item end-->
                     <!--form item start-->
                     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group margin-top-20 ">
                        <label for="setting-profile-gender-id" class="setting-profile-form-label">
                        <span>Gender</span>
                        <span class="my-business-red-font-color">*</span>
                        </label>
                        <select id="setting-profile-gender-id" class="form-control my-business-select-style my-select" name='gender'>
                           <option value='0'>Male</option>
                           <option value='1'>Female</option>
                           
                        </select>
                     </div>
                     <!-- / form item end-->
                     <!--form item start-->
                     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group margin-top-20">
                        <label for="setting-profile-nationallity-id" class="setting-profile-form-label">
                        <span>Nationallity</span>
                        <span class="my-business-red-font-color">*</span>
                        </label>
                        <select id="setting-profile-nationallity-id" class="form-control selec-two-class" name='nationallity'>
                           <option selected>Choose your nationallity</option>
                           <option>nationallity</option>
                           <option>nationallity</option>
                           <option>nationallity</option>
                        </select>
                     </div>
                     <!-- / form item end-->                     
                     <!--form item start-->
                     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group margin-top-20">
                        <label for="setting-profile-country-id" class="setting-profile-form-label">
                        <span>Country of residence</span>
                        <span class="my-business-red-font-color">*</span>
                        </label>
                        <select id="setting-profile-country-id" class="form-control selec-two-class" name='country'>
                           <option selected>Choose your country</option>
                           <option>country</option>
                           <option>country</option>
                           <option>country</option>
                        </select>
                     </div>
                     <!-- / form item end-->                     
                     <!--form item start-->
                     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group margin-top-20 profile-settingphone-number-div">
                        <label for="setting-profile-phone-id " class="setting-profile-form-label display-block">
                        <span>Telephone Number</span>
                        <span class="my-business-red-font-color">*</span>
                        </label>
                        <select id="setting-profile-phone-id" class="form-control selec-two-class" name='code'>
                           <option selected>+020</option>
                           <option>+020</option>
                           <option>+020</option>
                           <option>+020</option>
                        </select>
                        <input type="tel" class="form-control my-business-input-style " id="setting-profile-phone-id" placeholder="" name='telephone'>
                        <button class="btn  my-business-button-style hvr-pulse-shrink" id="phone-verfication-modal"  data-toggle="modal" data-target="#verfiy-phone-modal-div-id">
                        Verify
                        </button>
                        <span class="my-business-red-font-color font-18   padding-horizontal-0-inresponsive  display-block ">* Phone numbers are only need for verification</span>
                     </div>
                     <!-- / form item end-->
                     <!--form item start-->
                  <!--    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group margin-top-20">
                        <label class="form-check-label ">
                        <input type="checkbox" class="form-check-input option-input margin-left-5 margin-right-5" value="">
                        <span class="check-lable-span">
                        Make my number private
                        </span>
                        </label>
                     </div> -->
                     <!-- / form item end-->          
                  </div>
                  <!-- / form item end-->
                  <!--image uplaod item start-->
                  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 margin-top-20 profile-setting-upload-image-div">
                     <label for="auction-category-id" class="auction-form-label">
                     <span>Upload your photo</span>
                     <span class="my-business-red-font-color">*</span>
                     </label>
                     <div class=" item-upload">
                        <label for="logo-btn" class="profile-setting-upload-image-icon" id="auction-upload-label-for-image">
                        <span><i class="far fa-image"></i></span>
                        </label>
                        <input id="logo-btn" type="file" style="display:none;" name="logo" onchange="GetFileSize()">
                        <img id="logo_preview" src="" width="100%" class="auction-upload-image-photo-place">
                     </div>
                  </div>
                  <!-- / image uplaod item end-->
                  <!--form item start-->
                  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 form-group margin-top-20">
                     <label for="setting-profile-address-id" class="setting-profile-form-label">
                     <span>Adderss</span>
                     </label>
                     <input type="text" class="form-control my-business-input-style " id="setting-profile-address-id" placeholder="">
                  </div>
                  <!-- / form item end-->
                  <!--form item start-->
                  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 form-group margin-top-20">
                     <label for="setting-profile-zib-code-id" class="setting-profile-form-label">
                     <span>ZIP Code</span>
                     </label>
                     <input type="text" class="form-control my-business-input-style " id="setting-profile-zib-code-id" placeholder="" name='zip'>
                  </div>
                  <!-- / form item end-->
                  <!--form item start-->
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group margin-top-25 margin-bottom-30">
                     <button type="button" class="btn  my-business-button-style hvr-pulse-shrink" id="proceed-btn-id" >
                     Proceed
                     </button>
                  </div>
                  <!-- / form item end-->
               </div>
            </form>
            <!--/ setting-page-the-firest-of-form-section end-->
         </div>
      </div>
   </div>
   <!--/setting-form-section end-->
</section>
<!--/my-business-profile-setting-form-page end-->
<!--verification modal start-->
<div class="modal fade  verfiy-phone-modal-class" id="verfiy-phone-modal-div-id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false" >
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <img class="modal-title" id="" src="../img/Trans5.png" width="150px" height="auto" />
         </div>
         <div class="modal-body">
            <!--form item start-->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group margin-top-20 verfiy-phone-modal-div">
               <h4 class="my-business-red-font-color flash-warning-class" style="display: none" id="verfication-code-alert" >please enter verification code </h4>
               <label for="setting-profile-date-of-birth-id" class="setting-profile-form-label display-block">
               <span>Enter your verification code</span>
               <span class="my-business-red-font-color">*</span>
               </label>
               <div class=" modal-text-input-div ">
                  <input type="text" class="form-control my-business-input-style display-inline-block " id="phone-first-digit" placeholder="">
                  <input type="text" class="form-control my-business-input-style display-inline-block " id="phone-second-digit" placeholder="">
                  <input type="text" class="form-control my-business-input-style display-inline-block " id="phone-third-digit" placeholder="">
                  <input type="text" class="form-control my-business-input-style display-inline-block " id="phone-fourth-digit" placeholder=""> 
               </div>
               <div class="text-center margin-vertical-25">
                  <p class="text-center display-block ">Didn't receive the code?</p>
                  <a href="#" class="display-block">Send code again</a>
                  <a href="#" class="display-block">Change phone number</a>
               </div>
               <!--form item start-->
               <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group margin-top-25 margin-bottom-30">
                  <button class="btn  my-business-button-style" id="verification-submit" >
                  Send Code
                  </button>
               </div>
               <!-- / form item end-->
            </div>
            <!-- / form item end-->
         </div>
      </div>
   </div>
</div>
<!-- / verification modal end-->
<!--proceed modal start-->
<div class="modal  proceed-modal-class" id="proceed-modal-div-id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  >
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <img class="modal-title" id="" src="../img/Trans5.png" width="150px" height="auto" />
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <div class="modal-body">
            <!--form item start-->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group margin-top-20 verfiy-phone-modal-div">
               <h3>Do you have a new businees ?</h3>
               <!--form item start-->
               <div class="margin-auto text-center margin-top-25 margin-bottom-20">
                  <button type="button" class="btn btn-success padding-horizontal-25 padding-vertical-5">Yes</button>
                  <button type="button" class="btn btn-danger padding-horizontal-25 padding-vertical-5">No</button>
               </div>
               <!-- / form item end-->
            </div>
            <!-- / form item end-->
         </div>
      </div>
   </div>
</div>
<!-- / proceed modal end-->
<!--proceed modal start-->
<div class="modal  verifaction-modal-class" id="verifaction-modal-div-id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  >
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-body">
            <!--form item start-->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group margin-top-20 verfiy-phone-modal-div">
               <h1 class="text-center success-font-color font-70" ><i class="fas fa-check-circle"></i></h1>
               <h2 class="text-center success-font-color font-weight-bold" >Success</h2>
               <h5 class="text-center margin-bottom-15" >your verification code was sent</h5>
            </div>
            <!-- / form item end-->
         </div>
      </div>
   </div>
</div>
<!-- / proceed modal end-->
@include('partials.website.footer')