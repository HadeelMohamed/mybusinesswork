@include('partials.website.header')
    <!--my-business-confirmation-register-page start -->
    <section class="my-business-confirmation-register-page width-percent-100  ">
        <!--confirmation-register-section start -->
        <div class="confirmation-register-section width-percent-100  ">
            <div class="container">
                <div class="row text-center">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="width-percent-60 margin-auto mail-div">
                            <img src="{{asset('mybusinessnewwebsite/img/email-photo.svg')}}" alt="my business image" width="100%" height="100%" />
                        </div>
                        <h1 class="font-weight-bold margin-top-20">So far so good !!!</h1>
                        <p class="text-center margin-top-15">
                            <span class="display-block font-15 font-weight-bold grey-font-color">A confirmation email has been sent , please go to your inbox now. </span>
                            <span class="display-block font-15 font-weight-bold grey-font-color">Open the email titled with "please confirm my business email account" , then click the link to verify.</span>
                        </p>
                        <a href="{{ route('verification.resend') }}" class="nav-link font-15 text-center  font-weight-bold">Click here to resend aconfirmation email again</a>
                    </div>
                </div>

            </div>
        </div>
        <!--/confirmation-register-section end-->
    </section>
    <!--/my-business-confirmation-register-page end-->
@include('partials.website.footer')