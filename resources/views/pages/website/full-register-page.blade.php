@include('partials.website.header')

    <!--my-business-business-info-page start -->
    <section class="my-business-business-info-page  width-percent-100  ">
        <!--business-info-form-section start -->
        <div class="business-info-form-section width-percent-100  ">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 individual-form-section">
                        <!--frist-form-info-quest-form-section start-->
                        <div class="row  margin-top-20 frist-form-info-quest">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 margin-bottom-55">
                                <h1 class="my-business-red-font-color font-weight-bold">Are you listing as</h1>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 text-center">
                                <div class=" company-individual-links-classs-mother-div">
                                    <a href="#" class="company-individual-links-classs" id="indevidual-id-link">
                                        <span class="display-block"><i class="fas fa-user-tie"></i></span>
                                        <span class="display-block">Freelancer</span>
                                    </a>

                                    <p class=" text-center display-block">
                                        Go viral and spread your skills & products to the world
                                    </p>
                                    <p class="display-block text-center">
                                        <apan class="display-inline-block">Know more about</apan>
                                        <span class="display-inline-block">
                                 <a href="#" class=" text-center display-block">
                                features and pricing plans
                                </a>
                                </span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 text-center">

                                <div class=" company-individual-links-classs-mother-div">
                                    <a href="#" class="company-individual-links-classs" id="company-id-link">
                                        <span class="display-block"><i class="fas fa-university"></i></span>
                                        <span class="display-block">Company</span>
                                    </a>

                                    <p class=" text-center display-block">
                                        Go viral and spread your skills & products to the world
                                    </p>
                                    <p class="display-block text-center">
                                        <apan class="display-inline-block">Know more about</apan>
                                        <span class="display-inline-block">
                                 <a href="#" class=" text-center display-block">
                                features and pricing plans
                                </a>
                                </span>
                                    </p>
                                </div>

                            </div>
                        </div>
                        <!--/ frist-form-info-quest-form-section end-->
                        <!--individual-form-section start-->
                        <form class="col-xl-12 col-lg-12 col-md-12 col-sm-12 individual-form-section padding-horizontal-0" id="free-lancer-form-id" name="free-lancer-form-id" style="display: none">
                            <div class="row  margin-top-20 ">
                                <!--form tab item div start-->
                                <div class="freelance-tab col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class=" row">
                                        <!--form item start-->
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <h1 class="my-business-red-font-color font-weight-bold">List your business now</h1>
                                        </div>
                                        <!-- / form item end-->
                                        <!--form item start-->
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12  margin-top-20 ">
                                            <h4 class=" font-weight-bold ">Your business profile info</h4>
                                        </div>
                                        <!-- / form item end-->
                                        <!--form item start-->
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 form-group padding-horizontal-0">
                                            <!--form item start-->
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group margin-top-20">
                                                <label for="business-info-business-name-id" class="business-info-form-label">
                                                    <span>Business name</span>
                                                </label>
                                                <input type="text" class="form-control my-business-input-style " id="business-info-business-name-id" placeholder="" name='business_name'>
                                            </div>
                                            <!-- / form item end-->
                                            <!--form item start-->
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group margin-top-20">
                                                <label class="form-check-label ">
                                                    <input type="checkbox" class="form-check-input option-input margin-left-5 margin-right-5" value="">
                                                    <span class="check-lable-span">
                              Use my profile name
                              </span>
                                                </label>
                                            </div>
                                            <!-- / form item end-->
                                            <!--form item start-->
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group margin-top-20">
                                                <label for="business-info-business-category-id" class="business-info-form-label">
                                                    <span>Business Category</span>
                                                    <span class="my-business-red-font-color">*</span>
                                                </label>
                                                <select id="business-info-business-category-id" class="form-control" name='business_category'>
                                                    <option selected>Choose your business category</option>
                                                   
                                                </select>
                                            </div>
                                            <!-- / form item end-->
                                        </div>
                                        <!-- / form item end-->
                                        <!--image uplaod item start-->
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 margin-top-20 profile-setting-upload-image-div text-center">
                                            <label for="" class="business-info-form-label font-18">Upload your photo now
                                            </label>
                                            <div class=" item-upload">
                                                <label for="freelance-logo-btn" class="profile-setting-upload-image-icon" id="freelance-logo-upload-label-for-image">
                                                    <span><i class="far fa-image"></i></span>
                                                </label>
                                                <input id="freelance-logo-btn" type="file" style="display:none;" name="free_logo" onchange="freeGetFileSize()">
                                                <img id="freelance-logo-preview" src="" width="100%" class="auction-upload-image-photo-place">
                                                <a href="#" class=" grey-font-color display-block " id="freelance-upload-logo">Upload your logo</a>
                                                <span class=" grey-font-color display-block" id="freelance-upload-or">or</span>
                                                <a href="#" class="grey-font-color display-block " id="freelance-upload-use-pic">Use your profile picture</a>
                                            </div>
                                        </div>
                                        <!-- / image uplaod item end-->
                                    </div>
                                </div>
                                <!-- / form tab item div end-->
                                <!--form tab item div start-->
                                <div class="freelance-tab col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class=" row">
                                        <!--form item start-->
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <h1 class="my-business-red-font-color font-weight-bold">List your business now</h1>
                                        </div>
                                        <!-- / form item end-->
                                        <!--form item start-->
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12  margin-top-20 ">
                                            <h4 class=" font-weight-bold ">Your business contact info</h4>
                                        </div>
                                        <!-- / form item end-->
                                        <!--form item start-->
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 form-group padding-horizontal-0">
                                            <!--form item start-->
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group margin-top-20 profile-settingphone-number-div">
                                                <label for="setting-profile-phone-id " class="setting-profile-form-label display-block">
                                                    <span>Telephone Number</span>
                                                    <span class="my-business-red-font-color">*</span>
                                                </label>
                                                <select id="setting-profile-phone-id" class="form-control selec-two-class">
                                                    <option selected>+020</option>
                                                    <option>+020</option>
                                                    <option>+020</option>
                                                    <option>+020</option>
                                                </select>
                                                <input type="tel" class="form-control my-business-input-style " id="business-info-company-phone-id" placeholder="">
                                                <span class="my-business-red-font-color font-18   padding-horizontal-0-inresponsive  display-block ">* Phone numbers are only need for verification</span>
                                                <button class="btn  my-business-button-style hvr-pulse-shrink" id="business-info-company-phone-verfication-modal" data-toggle="modal" data-target="#freelance-verfiy-phone-modal-div-id" type="button">
                                                    Verify
                                                </button>
                                            </div>
                                            <!-- / form item end-->
                                            <!--form item start-->
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group margin-top-20">
                                                <label class="form-check-label ">
                                                    <input type="checkbox" class="form-check-input option-input margin-left-5 margin-right-5" value="">
                                                    <span class="check-lable-span">
                              Make my number private
                              </span>
                                                </label>
                                            </div>
                                            <!-- / form item end-->
                                            <!--form item start-->
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group margin-top-20">
                                                <label for="business-info-business-email-id" class="business-info-form-label">
                                                    <span>Email Address</span>
                                                </label>
                                                <input type="email" class="form-control my-business-input-style " id="business-info-business-email-id" placeholder="" name='business_email'>
                                            </div>
                                            <!-- / form item end-->
                                        </div>
                                        <!-- / form item end-->
                                        <!--image uplaod item start-->
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 margin-top-20 social-inkes-div position-relative ">
                                            <div class="row">
                                                <!-- button social media item start -->
                                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12  social-inkes-div position-relative">
                                                    <div class="wrapper margin-top-5 position-relative">
                                                        <div class="search-box">
                                                            <div class="social-icon-animated-div" id="free-face-so-btn-id">
                                                                <span class="social-icon-span"><i class="fab fa-facebook-square"></i></span>
                                                                <span class="social-text-span">Facebook</span>
                                                            </div>
                                                        </div>
                                                        <input type="text" placeholder="" class="form-control soical-input-type">
                                                    </div>
                                                </div>
                                                <!-- / button social media item end -->
                                                <!-- button social media item start -->
                                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 social-inkes-div position-relative">
                                                    <div class="wrapper margin-top-5 position-relative">
                                                        <div class="search-box">
                                                            <div class="social-icon-animated-div" id="free-face-so-btn-id">
                                                                <span class="social-icon-span"><i class="fab fa-twitter-square"></i></span>
                                                                <span class="social-text-span">Twitter</span>
                                                            </div>
                                                        </div>
                                                        <input type="text" placeholder="" class="form-control soical-input-type">
                                                    </div>
                                                </div>
                                                <!-- / button social media item end -->
                                                <!-- button social media item start -->
                                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12  social-inkes-div position-relative">
                                                    <div class="wrapper margin-top-5 position-relative">
                                                        <div class="search-box">
                                                            <div class="social-icon-animated-div" id="free-face-so-btn-id">
                                                                <span class="social-icon-span"><i class="fab fa-instagram"></i></span>
                                                                <span class="social-text-span">Instgram</span>
                                                            </div>
                                                        </div>
                                                        <input type="text" placeholder="" class="form-control soical-input-type">
                                                    </div>
                                                </div>
                                                <!-- / button social media item end -->
                                                <!-- button social media item start -->
                                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 social-inkes-div position-relative">
                                                    <div class="wrapper margin-top-5 position-relative">
                                                        <div class="search-box">
                                                            <div class="social-icon-animated-div" id="free-face-so-btn-id">
                                                                <span class="social-icon-span"><i class="fab fa-linkedin"></i> </span>
                                                                <span class="social-text-span">linkedin</span>
                                                            </div>
                                                        </div>
                                                        <input type="text" placeholder="" class="form-control soical-input-type">
                                                    </div>
                                                </div>
                                                <!-- / button social media item end -->
                                                <!-- button social media item start -->
                                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12  social-inkes-div position-relative">
                                                    <div class="wrapper margin-top-5 position-relative">
                                                        <div class="search-box">
                                                            <div class="social-icon-animated-div" id="free-face-so-btn-id">
                                                                <span class="social-icon-span"><i class="fab fa-behance-square"></i></span>
                                                                <span class="social-text-span">Behance</span>
                                                            </div>
                                                        </div>
                                                        <input type="text" placeholder="" class="form-control soical-input-type">
                                                    </div>
                                                </div>
                                                <!-- / button social media item end -->
                                                <!-- button social media item start -->
                                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12  social-inkes-div position-relative">
                                                    <div class="wrapper margin-top-5 position-relative">
                                                        <div class="search-box">
                                                            <div class="social-icon-animated-div" id="free-face-so-btn-id">
                                                                <span class="social-icon-span"><i class="fas fa-globe"></i></span>
                                                                <span class="social-text-span">Website</span>
                                                            </div>
                                                        </div>
                                                        <input type="text" placeholder="" class="form-control soical-input-type">
                                                    </div>
                                                </div>
                                                <!-- / button social media item end -->

                                            </div>
                                        </div>
                                        <!-- / image uplaod item end-->
                                    </div>
                                </div>
                                <!-- / form tab item div end-->
                                <!--form tab item div start-->
                                <div class="freelance-tab col-xl-12 col-lg-12 col-md-12 col-sm-12 businees-location-tab">
                                    <div class=" row">
                                        <!--form item start-->
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <h1 class="my-business-red-font-color font-weight-bold">List your business now</h1>
                                        </div>
                                        <!-- / form item end-->
                                        <!--form item start-->
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12  margin-top-20 ">
                                            <h4 class=" font-weight-bold ">Your business location</h4>
                                        </div>
                                        <!-- / form item end-->
                                        <!--form item start-->
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 form-group padding-horizontal-0">
                                            <!--form item start-->
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group margin-top-20">
                                                <label for="freelance-business-info-country-id" class="business-info-form-label">
                                                    <span>Country</span>
                                                    <span class="my-business-red-font-color">*</span>
                                                </label>
                                                <select id="freelance-business-info-country-id" class="form-control selec-two-class">
                                                    <option selected>Choose your country</option>
                                                    <option>Country</option>
                                                    <option>Country</option>
                                                    <option>Country</option>
                                                </select>
                                            </div>
                                            <!-- / form item end-->
                                            <!--form item start-->
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group margin-top-20">
                                                <label for="freelance-business-info-city-id" class="business-info-form-label">
                                                    <span>City</span>
                                                    <span class="my-business-red-font-color">*</span>
                                                </label>
                                                <select id="freelance-business-info-city-id" class="form-control selec-two-class">
                                                    <option selected>Choose your city</option>
                                                    <option>City</option>
                                                    <option>City</option>
                                                    <option>City</option>
                                                </select>
                                            </div>
                                            <!-- / form item end-->
                                            <!--form item start-->
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group margin-top-20">
                                                <label for="freelance-business-info-street-id" class="business-info-form-label">
                                                    <span>Street</span>
                                                    <span class="my-business-red-font-color">*</span>
                                                </label>
                                                <input type="text" class="form-control my-business-input-style " id="freelance-business-info-street-id" placeholder="">
                                            </div>
                                            <!-- / form item end-->
                                            <!--form item start-->
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group margin-top-20">
                                                <label for="freelance-business-info-zib-code-id" class="business-info-form-label">
                                                    <span>ZIB Code</span>
                                                </label>
                                                <input type="text" class="form-control my-business-input-style " id="freelance-business-info-zib-code-id" placeholder="">
                                            </div>
                                            <!-- / form item end-->

                                        </div>
                                        <!-- / form item end-->
                                        <!--form item start-->
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 form-group margin-top-20">

                                            <!--form item start-->
                                            <div class="business-info-loction">

                                                <div class="my-business-red-font-color font-weight-bold font-80">
                                                    <i class="fas fa-map-marker-alt"></i>
                                                </div>
                                            </div>
                                            <!-- / form item end-->
                                            <!--form item start-->
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group margin-top-10 padding-horizontal-0">
                                                <label class="form-check-label ">
                                                    <input type="checkbox" class="form-check-input option-input margin-left-5 margin-right-5" value="">
                                                    <span class="check-lable-span">
                           I am online only
                           </span>
                                                </label>
                                            </div>
                                            <!-- / form item end-->
                                        </div>
                                        <!-- / form item end-->

                                    </div>
                                </div>
                                <!-- / form tab item div end-->
                                <!--form tab item div start-->
                                <div class="freelance-tab col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class=" row">
                                        <!--form item start-->
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12  margin-top-20 ">
                                            <h1 class=" my-business-red-font-color font-weight-bold">Your  annual business mrmbership costs $000</h1>
                                        </div>
                                        <!-- / form item end-->
                                        <!--form item start-->
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12  margin-top-20 ">
                                            <h4 class=" font-weight-bold ">Your are lisiting your business on MyBusiness . Your memebrship grants you using our excluive business service.</h4>
                                        </div>
                                        <!-- / form item end-->
                                        <!--form item start-->
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group">
                                            <label for="setting-profile-terms-id " class="setting-profile-form-label display-block  my-business-red-font-color font-16">
                                                * please read our terms and condition carefully.
                                            </label>
                                        </div>
                                        <!-- / form item end-->
                                        <!--form item start-->
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group tems-div-ul">
                                            <ul class="terms-ul-div">
                                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                                <li>Lorem Ipsum is simply dummy text of the printing.</li>
                                            </ul>
                                        </div>
                                        <!-- / form item end-->
                                        <!--form item start-->
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group ">
                                            <label class="form-check-label ">
                                                <input type="checkbox" class="form-check-input option-input margin-left-5 margin-right-5" value="">
                                                <span class="check-lable-span">
                           I agree to the terms and conditions
                           </span>
                                            </label>
                                        </div>
                                        <!-- / form item end-->
                                    </div>
                                </div>
                                <!-- / form tab item div end-->
                                <!--form item start next  button start-->
                                <div class=" col-12 margin-top-60 ">
                                    <div class="row ">
                                        <!--form item start  previous button start-->
                                        <div class="col-4">
                                            <button class="btn  hvr-pulse-shrink  tab-back-button " type="button" id="freelance-prevBtn" onclick="freeNextPrev(-1)">
                                                Back
                                            </button>
                                        </div>
                                        <!--/form item start previous button end-->
                                        <!--form item start next slider icon start-->
                                        <div class="col-4 text-center padding-horizontal-0">
                                            <span class="freelanceStep"></span>
                                            <span class="freelanceStep"></span>
                                            <span class="freelanceStep"></span>
                                        </div>
                                        <!-- / form item start next slider icon end-->
                                        <!--form item start  next button start-->
                                        <div class="col-4">
                                            <button class="btn  hvr-pulse-shrink tab-next-button" type="button" id="freelance-nextBtn" onclick="freeNextPrev(1)">
                                                Next
                                            </button>
                                        </div>
                                        <!--/ form item start next button end-->
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--/ individual-form-section end-->
                        <!--company-form-section start-->
                        <form class="col-xl-12 col-lg-12 col-md-12 col-sm-12 company-form-section padding-horizontal-0" id="company-form-id" style="display: none">
                            <div class="row  margin-top-20 ">
                                <!--form tab item div start-->
                                <div class="company-form-tab col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class=" row">
                                        <!--form item start-->
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <h1 class="my-business-red-font-color font-weight-bold">List your business now </h1>
                                        </div>
                                        <!-- / form item end-->
                                        <!--form item start-->
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12  margin-top-20 ">
                                            <h4 class=" font-weight-bold ">Your business profile info</h4>
                                        </div>
                                        <!-- / form item end-->
                                        <!--form item start-->
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 form-group padding-horizontal-0">
                                            <!--form item start-->
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group margin-top-20">
                                                <label for="company-info-business-name-id" class="business-info-form-label">
                                                    <span>Business name</span>
                                                </label>
                                                <input type="text" class="form-control my-business-input-style " id="company-info-business-name-id" placeholder="">
                                            </div>
                                            <!-- / form item end-->
                                            <!--form item start-->
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group margin-top-20">
                                                <label for="company-info-business-category-id" class="business-info-form-label">
                                                    <span>Business Category</span>
                                                    <span class="my-business-red-font-color">*</span>
                                                </label>
                                                <select id="company-info-business-category-id" class="form-control selec-two-class">
                                                    <option selected>Choose your business category</option>
                                                    <option>Category</option>
                                                    <option>Category</option>
                                                    <option>Category</option>
                                                </select>
                                            </div>
                                            <!-- / form item end-->
                                        </div>
                                        <!-- / form item end-->
                                        <!--image uplaod item start-->
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12  profile-setting-upload-image-div text-center">
                                            <label for="" class="business-info-form-label font-18">upload your company logo
                                            </label>
                                            <div class=" item-upload">
                                                <label for="company-logo-btn" class="profile-setting-upload-image-icon" id="company-upload-label-for-image-delete">
                                                    <span><i class="far fa-image"></i></span>
                                                </label>
                                                <input id="company-logo-btn" type="file" style="display:none;" name="logo" onchange="companyGetFileSize()">
                                                <img id="company-logo-preview" src="" width="100%" class="auction-upload-image-photo-place">
                                                <a href="#" class=" grey-font-color display-block  after-uplaod-img-delet-divs" id="company-uplod-text">Upload your logo</a>

                                            </div>
                                        </div>
                                        <!-- / image uplaod item end-->
                                    </div>
                                </div>
                                <!-- / form tab item div end-->
                                <!--form tab item div start-->
                                <div class="company-form-tab col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class=" row">
                                        <!--form item start-->
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <h1 class="my-business-red-font-color font-weight-bold">List your business now </h1>
                                        </div>
                                        <!-- / form item end-->
                                        <!--form item start-->
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12  margin-top-20 ">
                                            <h4 class=" font-weight-bold ">Your business contact info</h4>
                                        </div>
                                        <!-- / form item end-->
                                        <!--form item start-->
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 form-group padding-horizontal-0">
                                            <!--form item start-->
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group margin-top-20 profile-settingphone-number-div">
                                                <label for="setting-profile-phone-id " class="setting-profile-form-label display-block">
                                                    <span>Telephone Number</span>
                                                    <span class="my-business-red-font-color">*</span>
                                                </label>
                                                <select id="setting-profile-phone-id" class="form-control selec-two-class">
                                                    <option selected>+020</option>
                                                    <option>+020</option>
                                                    <option>+020</option>
                                                    <option>+020</option>
                                                </select>
                                                <input type="tel" class="form-control my-business-input-style " id="company-info-company-phone-id" placeholder="">
                                                <span class="my-business-red-font-color font-18   padding-horizontal-0-inresponsive  display-block ">* Phone numbers are only need for verification</span>
                                                <button class="btn  my-business-button-style hvr-pulse-shrink" id="company-info-company-phone-verfication-modal" data-toggle="modal" data-target="#company-verfiy-phone-modal-div-id" type="button">
                                                    Verify
                                                </button>
                                            </div>
                                            <!-- / form item end-->
                                            <!--form item start-->
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group margin-top-40">
                                                <label for="company-info-business-email-id" class="business-info-form-label">
                                                    <span>Email Address</span>
                                                </label>
                                                <input type="email" class="form-control my-business-input-style " id="company-info-business-email-id" placeholder="">
                                            </div>
                                            <!-- / form item end-->
                                        </div>
                                        <!-- / form item end-->
                                        <!--image uplaod item start-->
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 margin-top-20 social-inkes-div position-relative ">
                                            <div class="row">
                                                <!-- button social media item start -->
                                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12  social-inkes-div position-relative">
                                                    <div class="wrapper margin-top-5 position-relative">
                                                        <div class="search-box">
                                                            <div class="social-icon-animated-div" id="company-face-so-btn-id">
                                                                <span class="social-icon-span"><i class="fab fa-facebook-square"></i></span>
                                                                <span class="social-text-span">Facebook</span>
                                                            </div>
                                                        </div>
                                                        <input type="text" placeholder="" class="form-control soical-input-type">
                                                    </div>
                                                </div>
                                                <!-- / button social media item end -->
                                                <!-- button social media item start -->
                                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 social-inkes-div position-relative">
                                                    <div class="wrapper margin-top-5 position-relative">
                                                        <div class="search-box">
                                                            <div class="social-icon-animated-div" id="company-face-so-btn-id">

                                                                <span class="social-icon-span"><i class="fab fa-twitter-square"></i></span>
                                                                <span class="social-text-span">Twitter</span>
                                                            </div>
                                                        </div>
                                                        <input type="text" placeholder="" class="form-control soical-input-type">
                                                    </div>
                                                </div>
                                                <!-- / button social media item end -->
                                                <!-- button social media item start -->
                                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12  social-inkes-div position-relative">
                                                    <div class="wrapper margin-top-5 position-relative">
                                                        <div class="search-box">
                                                            <div class="social-icon-animated-div" id="company-face-so-btn-id">
                                                                <span class="social-icon-span"><i class="fab fa-instagram"></i></span>
                                                                <span class="social-text-span">Instgram</span>
                                                            </div>
                                                        </div>
                                                        <input type="text" placeholder="" class="form-control soical-input-type">
                                                    </div>
                                                </div>
                                                <!-- / button social media item end -->
                                                <!-- button social media item start -->
                                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 social-inkes-div position-relative">
                                                    <div class="wrapper margin-top-5 position-relative">
                                                        <div class="search-box">
                                                            <div class="social-icon-animated-div" id="company-face-so-btn-id">
                                                                <span class="social-icon-span"><i class="fab fa-linkedin"></i> </span>
                                                                <span class="social-text-span">linkedin</span>
                                                            </div>
                                                        </div>
                                                        <input type="text" placeholder="" class="form-control soical-input-type">
                                                    </div>
                                                </div>
                                                <!-- / button social media item end -->
                                                <!-- button social media item start -->
                                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12  social-inkes-div position-relative">
                                                    <div class="wrapper margin-top-5 position-relative">
                                                        <div class="search-box">
                                                            <div class="social-icon-animated-div" id="company-face-so-btn-id">
                                                                <span class="social-icon-span"><i class="fab fa-behance-square"></i></span>
                                                                <span class="social-text-span">Behance</span>
                                                            </div>
                                                        </div>
                                                        <input type="text" placeholder="" class="form-control soical-input-type">
                                                    </div>
                                                </div>
                                                <!-- / button social media item end -->
                                                <!-- button social media item start -->
                                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12  social-inkes-div position-relative">
                                                    <div class="wrapper margin-top-5 position-relative">
                                                        <div class="search-box">
                                                            <div class="social-icon-animated-div" id="company-face-so-btn-id">
                                                                <span class="social-icon-span"><i class="fas fa-globe"></i></span>
                                                                <span class="social-text-span">Website</span>
                                                            </div>
                                                        </div>
                                                        <input type="text" placeholder="" class="form-control soical-input-type">
                                                    </div>
                                                </div>
                                                <!-- / button social media item end -->

                                            </div>
                                        </div>
                                        <!-- / image uplaod item end-->
                                    </div>
                                </div>
                                <!-- / form tab item div end-->
                                <!--form tab item div start-->
                                <div class="company-form-tab col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class=" row">
                                        <!--form item start-->
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <h1 class="my-business-red-font-color font-weight-bold">List your business now </h1>
                                        </div>
                                        <!-- / form item end-->
                                        <!--form item start-->
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12  margin-top-20 ">
                                            <h4 class=" font-weight-bold ">Your business location</h4>
                                        </div>
                                        <!-- / form item end-->
                                        <!--form item start-->
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group margin-top-20">
                                            <a class="my-business-gray-link-color" id="add-more-loction-id" href="#">
                                                <span class="my-business-red-font-color font-18 display-inline-block padding-horizontal-5"><i class="fas fa-plus-square"></i></span>
                                                <span class="display-inline-block">
                           Add more than location 
                           </span>
                                            </a>
                                        </div>
                                        <!-- / form item end-->
                                        <!--form item start-->
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 " id="collaped-location-div" style="display:none">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group">
                                                <div class="row">
                                                    <!--form item start-->
                                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 form-group position-relative margin-top-10  colaapsed-location-div-mother ">
                                                        <div class="row">
                                                            <!--form item start-->
                                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group padding-horizontal-0">
                                                                <p class="my-business-red-font-color font-16  display-block font-weight-bold">
                                                                    location
                                                                </p>
                                                            </div>
                                                            <!-- /form item end-->
                                                            <!--form item start-->
                                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 form-group margin-top-10 padding-horizontal-0">

                                                                <label for="company-business-info-more-first-country-id" class="business-info-form-label">
                                                                    <span>Country</span>
                                                                    <span class="my-business-red-font-color">*</span>
                                                                </label>
                                                                <select id="company-business-info-more-first-country-id" class="form-control selec-two-class">
                                                                    <option selected>country</option>
                                                                    <option>Country</option>
                                                                    <option>Country</option>
                                                                    <option>Country</option>
                                                                </select>
                                                            </div>
                                                            <!-- / form item end-->
                                                            <!--form item start-->
                                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 form-group margin-top-10 padding-horizontal-0">
                                                                <label for="company-business-info-more-first-city-id" class="business-info-form-label">
                                                                    <span>City</span>
                                                                    <span class="my-business-red-font-color">*</span>
                                                                </label>
                                                                <select id="company-business-info-more-first-city-id" class="form-control selec-two-class">
                                                                    <option selected> city</option>
                                                                    <option>City</option>
                                                                    <option>City</option>
                                                                    <option>City</option>
                                                                </select>
                                                            </div>
                                                            <!-- / form item end-->
                                                            <!--form item start-->
                                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group padding-horizontal-0 margin-top-10">

                                                                <a class="my-business-red-font-color font-16 " href="#" id="second-location-idbtn">
                                                                    <span><i class="fas fa-plus-circle"></i></span>
                                                                    <span>Add another one</span>
                                                                </a>

                                                            </div>
                                                            <!-- / form item end-->
                                                        </div>

                                                    </div>
                                                    <!-- / form item end-->
                                                    <!--form item start-->
                                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 form-group position-relative margin-top-10 colaapsed-location-div-mother" id="second-appernce-div" style="display:none">
                                                        <div class="row">
                                                            <!--form item start-->
                                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group padding-horizontal-0">
                                                                <p class="my-business-red-font-color font-16  display-block font-weight-bold">
                                                                    location

                                                                </p>
                                                            </div>
                                                            <!-- /form item end-->
                                                            <!--form item start-->
                                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 form-group margin-top-10 padding-horizontal-0">

                                                                <label for="company-business-info-more-second-country-id" class="business-info-form-label">
                                                                    <span>Country</span>
                                                                </label>
                                                                <select id="company-business-info-more-second-country-id" class="form-control selec-two-class">
                                                                    <option selected> country</option>
                                                                    <option>Country</option>
                                                                    <option>Country</option>
                                                                    <option>Country</option>
                                                                </select>
                                                            </div>
                                                            <!-- / form item end-->
                                                            <!--form item start-->
                                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 form-group margin-top-10 padding-horizontal-0">
                                                                <label for="company-business-info-more-second-city-id" class="business-info-form-label">
                                                                    <span>City</span>
                                                                </label>
                                                                <select id="company-business-info-more-second-city-id" class="form-control selec-two-class">
                                                                    <option selected>city</option>
                                                                    <option>City</option>
                                                                    <option>City</option>
                                                                    <option>City</option>
                                                                </select>
                                                            </div>
                                                            <!-- / form item end-->
                                                            <!--form item start-->
                                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group  padding-horizontal-0">

                                                                <a class="my-business-red-font-color font-16  display-block margin-top-10" href="#" id="third-location-idbtn">
                                                                    <span><i class="fas fa-plus-circle"></i></span>
                                                                    <span>Add another one</span>
                                                                </a>

                                                            </div>
                                                            <!-- /form item end-->
                                                        </div>
                                                    </div>
                                                    <!-- / form item end-->
                                                    <!--form item start-->
                                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 form-group position-relative margin-top-10 colaapsed-location-div-mother " id="third-appernce-div" style="display:none">
                                                        <div class="row">
                                                            <!--form item start-->
                                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group padding-horizontal-0">
                                                                <p class="my-business-red-font-color font-16  display-block font-weight-bold">location</p>
                                                            </div>
                                                            <!-- /form item end-->
                                                            <!--form item start-->
                                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 form-group margin-top-10 padding-horizontal-0">

                                                                <label for="company-business-info-more-third-country-id" class="business-info-form-label">
                                                                    <span>Country</span>
                                                                </label>
                                                                <select id="company-business-info-more-third-country-id" class="form-control selec-two-class">
                                                                    <option selected>country</option>
                                                                    <option>Country</option>
                                                                    <option>Country</option>
                                                                    <option>Country</option>
                                                                </select>
                                                            </div>
                                                            <!-- / form item end-->
                                                            <!--form item start-->
                                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 form-group  margin-top-10 padding-horizontal-0">
                                                                <label for="company-business-info-more-third-city-id" class="business-info-form-label">
                                                                    <span>City</span>
                                                                </label>
                                                                <select id="company-business-info-more-third-city-id" class="form-control selec-two-class">
                                                                    <option selected> city</option>
                                                                    <option>City</option>
                                                                    <option>City</option>
                                                                    <option>City</option>
                                                                </select>
                                                            </div>
                                                            <!-- / form item end-->

                                                        </div>
                                                    </div>
                                                    <!-- / form item end-->
                                                    <!--form item start-->
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group margin-top-5 padding-horizontal-0" id="apprance-div-error" style="display:none">
                                                        <p class="my-business-red-font-color font-16  display-block font-weight-bold">
                                                            * Maximum three address location
                                                        </p>
                                                    </div>
                                                    <!-- / form item end-->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- / form item end-->
                                        <!--form item start-->
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 form-group padding-horizontal-0">
                                            <!--form item start-->
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group margin-top-20">
                                                <label for="company-business-info-country-id" class="business-info-form-label">
                                                    <span>Country</span>
                                                    <span class="my-business-red-font-color">*</span>
                                                </label>
                                                <select id="company-business-info-country-id" class="form-control selec-two-class">
                                                    <option selected>country</option>
                                                    <option>Country</option>
                                                    <option>Country</option>
                                                    <option>Country</option>
                                                </select>
                                            </div>
                                            <!-- / form item end-->
                                            <!--form item start-->
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group margin-top-20">
                                                <label for="company-business-info-city-id" class="business-info-form-label">
                                                    <span>City</span>
                                                    <span class="my-business-red-font-color">*</span>
                                                </label>
                                                <select id="company-business-info-city-id" class="form-control selec-two-class">
                                                    <option selected>city</option>
                                                    <option>City</option>
                                                    <option>City</option>
                                                    <option>City</option>
                                                </select>
                                            </div>
                                            <!-- / form item end-->
                                            <!--form item start-->
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group margin-top-20">
                                                <label for="company-business-info-street-id" class="business-info-form-label">
                                                    <span>Street</span>
                                                    <span class="my-business-red-font-color">*</span>
                                                </label>
                                                <input type="text" class="form-control my-business-input-style " id="company-business-info-street-id" placeholder="">
                                            </div>
                                            <!-- / form item end-->
                                            <!--form item start-->
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group margin-top-20">
                                                <label for="company-business-info-zib-code-id" class="business-info-form-label">
                                                    <span>ZIB Code</span>
                                                </label>
                                                <input type="text" class="form-control my-business-input-style " id="company-business-info-zib-code-id" placeholder="">
                                            </div>
                                            <!-- / form item end-->

                                        </div>
                                        <!-- / form item end-->
                                        <!--form item start-->
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 form-group margin-top-20">
                                            <!--form item start-->
                                            <div class="business-info-loction">

                                                <div class="my-business-red-font-color font-weight-bold font-80">
                                                    <i class="fas fa-map-marker-alt"></i>
                                                </div>
                                            </div>
                                            <!-- / form item end-->
                                        </div>
                                        <!-- / form item end-->
                                    </div>
                                </div>
                                <!-- / form tab item div end-->
                                <!--form tab item div start-->
                                <div class="company-form-tab col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class=" row">
                                        <!--form item start-->
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12  margin-top-20 ">
                                            <h1 class=" my-business-red-font-color font-weight-bold">Your  annual business mrmbership costs $000</h1>
                                        </div>
                                        <!-- / form item end-->
                                        <!--form item start-->
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12  margin-top-20 ">
                                            <h4 class="">Your are lisiting your business on MyBusiness . Your memebrship grants you using our excluive business service.</h4>
                                        </div>
                                        <!-- / form item end-->
                                        <!--form item start-->
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group">
                                            <label for="setting-profile-terms-id " class="setting-profile-form-label display-block  my-business-red-font-color font-16">
                                                * please read our terms and condition carefully.
                                            </label>
                                        </div>
                                        <!-- / form item end-->
                                        <!--form item start-->
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group tems-div-ul">
                                            <ul class="terms-ul-div">
                                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                                <li>Lorem Ipsum is simply dummy text of the printing.</li>
                                            </ul>
                                        </div>
                                        <!-- / form item end-->
                                        <!--form item start-->
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group ">
                                            <label class="form-check-label ">
                                                <input type="checkbox" class="form-check-input option-input margin-left-5 margin-right-5" value="">
                                                <span class="check-lable-span">
                           I agree to the terms and conditions
                           </span>
                                            </label>
                                        </div>
                                        <!-- / form item end-->
                                    </div>
                                </div>
                                <!-- / form tab item div end-->
                                <!--form item start next  button start-->
                                <div class=" col-12 margin-top-60 ">
                                    <div class="row ">
                                        <!--form item start  previous button start-->
                                        <div class="col-4">
                                            <button class="btn  hvr-pulse-shrink  tab-back-button " type="button" id="company-prevBtn" onclick="nextPrev(-1)">
                                                Back
                                            </button>
                                        </div>
                                        <!--/form item start previous button end-->
                                        <!--form item start next slider icon start-->
                                        <div class="col-4 text-center padding-horizontal-0">
                                            <span class="company-form-step"></span>
                                            <span class="company-form-step"></span>
                                            <span class="company-form-step"></span>
                                        </div>
                                        <!-- / form item start next slider icon end-->
                                        <!--form item start  next button start-->
                                        <div class="col-4">
                                            <button class="btn  hvr-pulse-shrink tab-next-button" type="button" id="company-nextBtn" onclick="nextPrev(1)">
                                                Next
                                            </button>
                                        </div>
                                        <!--/ form item start next button end-->
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--/ company-form-section end-->
                    </div>
                </div>
            </div>
            <!--/business-info-form-section end-->
    </section>
    <!--/my-business-business-info-page end-->
    <!--company modal start-->
    <div class="modal fade  verfiy-phone-modal-class" id="company-verfiy-phone-modal-div-id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img class="modal-title" id="" src="../img/Trans5.png" width="150px" height="auto" />
                </div>
                <div class="modal-body">
                    <!--form item start-->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group margin-top-20 verfiy-phone-modal-div">
                        <h4 class="my-business-red-font-color flash-warning-class" style="display: none" id="company-verfication-code-alert">please enter verification code </h4>
                        <label for="setting-profile-date-of-birth-id" class="setting-profile-form-label display-block">
                            <span>Enter your verification code</span>
                            <span class="my-business-red-font-color">*</span>
                        </label>
                        <div class=" modal-text-input-div ">
                            <input type="text" class="form-control my-business-input-style display-inline-block " id="company-phone-first-digit" placeholder="">
                            <input type="text" class="form-control my-business-input-style display-inline-block " id="company-phone-second-digit" placeholder="">
                            <input type="text" class="form-control my-business-input-style display-inline-block " id="company-phone-third-digit" placeholder="">
                            <input type="text" class="form-control my-business-input-style display-inline-block " id="company-phone-fourth-digit" placeholder="">
                        </div>
                        <div class="text-center margin-vertical-25">
                            <p class="text-center display-block">Didn't receive the code?</p>
                            <a href="#" class="display-block ">Send code again</a>
                            <a href="#" class="display-block">Change phone number</a>
                        </div>
                        <!--form item start-->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group margin-top-25 margin-bottom-30">
                            <button class="btn  my-business-button-style" id="companyverification-submit">
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
    <!-- / company verification modal end-->
    <!--company verivaction modal sucess modal start-->
    <div class="modal  verifaction-modal-class" id="company-sucess-verifaction-modal-div-id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <!--form item start-->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group margin-top-20 verfiy-phone-modal-div">
                        <h1 class="text-center success-font-color font-70"><i class="fas fa-check-circle"></i></h1>
                        <h2 class="text-center success-font-color font-weight-bold">Success</h2>
                        <h5 class="text-center margin-bottom-15">your verification code was sent</h5>
                    </div>
                    <!-- / form item end-->
                </div>
            </div>
        </div>
    </div>
    <!-- /company verivaction modal sucess modal end-->
    <!--freelance modal start-->
    <div class="modal fade  verfiy-phone-modal-class" id="freelance-verfiy-phone-modal-div-id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img class="modal-title" id="" src="../img/Trans5.png" width="150px" height="auto" />
                </div>
                <div class="modal-body">
                    <!--form item start-->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group margin-top-20 verfiy-phone-modal-div">
                        <h4 class="my-business-red-font-color flash-warning-class" style="display: none" id="freelance-verfication-code-alert">please enter verification code </h4>
                        <label for="setting-profile-date-of-birth-id" class="setting-profile-form-label display-block">
                            <span>Enter your verification code</span>
                            <span class="my-business-red-font-color">*</span>
                        </label>
                        <div class=" modal-text-input-div ">
                            <input type="text" class="form-control my-business-input-style display-inline-block " id="free-phone-first-digit" placeholder="">
                            <input type="text" class="form-control my-business-input-style display-inline-block " id="free-phone-second-digit" placeholder="">
                            <input type="text" class="form-control my-business-input-style display-inline-block " id="free-phone-third-digit" placeholder="">
                            <input type="text" class="form-control my-business-input-style display-inline-block " id="free-phone-fourth-digit" placeholder="">
                        </div>
                        <div class="text-center margin-vertical-25">
                            <p class="text-center display-block">Didn't receive the code?</p>
                            <a href="#" class="display-block ">Send code again</a>
                            <a href="#" class="display-block">Change phone number</a>
                        </div>
                        <!--form item start-->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group margin-top-25 margin-bottom-30">
                            <button class="btn  my-business-button-style" id="freelance-verification-submit">
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
    <!-- / freelance verification modal end-->
    <!--freelance verivaction modal sucess modal start-->
    <div class="modal  verifaction-modal-class" id="freelance-sucess-modal-div-id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <!--form item start-->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group margin-top-20 verfiy-phone-modal-div">
                        <h1 class="text-center success-font-color font-70"><i class="fas fa-check-circle"></i></h1>
                        <h2 class="text-center success-font-color font-weight-bold">Success</h2>
                        <h5 class="text-center margin-bottom-15">your verification code was sent</h5>
                    </div>
                    <!-- / form item end-->
                </div>
            </div>
        </div>
    </div>
    <!-- /freelance verivaction modal sucess modal end-->

@include('partials.website.footer')