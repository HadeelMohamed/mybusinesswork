/*slider*/
$('.owl-carousel').owlCarousel({
  loop: true,
  margin: -10,
  rtl: false,
  nav: true,
  responsive: {
    0: {
      items: 1
    },
    600: {
      items: 3
    },
    1000: {
      items: 4
    }
  }
})


//hover on deropdown menu
$('.my-business-big-menu ul.navbar-nav li.dropdown , .my-business-big-menu .menu-with-out-logo .dropdown').hover(function () {
  $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn(500);
}, function () {
  $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut(500);
});


//search-menu-mobile
$(document).ready(function () {
  $("#show-mobile-search-form-button").click(function () {
    $("#search-menu-mobile-open-div").slideToggle();
  });
});
//search-menu-mobile-refersh-resize
$(document).ready(function () {
  $(window).resize(function () {
    var width = $(document).width();
    var h = $(document).height();
    $('.width').html(width);
    $('.height').html(h);

    if (width <= 768) {
      $('.search-menu-form').css({
        'display': 'none'
      });
    } else {
      $('.search-menu-form').css({
        'display': 'flex'
      });
    }
  });
});

//----auction-image-upload-image-script-start

//get-file-images
function GetFileSize() {
  console.log('changed');
  var fi = document.getElementById('logo-btn');


  if (fi.files.length > 0) {

    for (var i = 0; i <= fi.files.length - 1; i++) {

      var fsize = fi.files.item(i).size;

      // if (fsize > 2097152) {

      //   alert('image size > 2M');
      //   $('#logo_preview').empty();
      //   $('#logo-btn').val('');
      // }

    }
  }
}


//image-preview
function logo_preview(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#logo_preview').attr('src', e.target.result);
      $('#logo_preview').attr('width', 150);
    }

    reader.readAsDataURL(input.files[0]);
  }
}


$("#logo-btn").change(function () {
  logo_preview(this);
  $("#auction-upload-label-for-image").css("display", "none");
});


//----auction-image-upload-image-script-end

//select2 script start
$(document).ready(function () {
  $(".selec-two-class").select2({

  })

});
//show hide product service scritpt
function hideAuctionproductservice() {
  document.getElementById('product-service-on-click-show').style.display = 'none';
}

function showAuctionproductservice() {
  document.getElementById('product-service-on-click-show').style.display = 'block';
}
//show hide quantity scritpt
function hideAuctionquantitydiv() {
  document.getElementById('quantity-div-show-id').style.display = 'none';
}

function showAuctionquantitydiv() {
  document.getElementById('quantity-div-show-id').style.display = 'block';
}

//verifaction alert script alert()
$(document).ready(function () {

  $("#verification-submit").click(function () {
    if ($("#phone-first-digit").val() == "" || $("#phone-second-digit").val() == "" || $("#phone-third-digit").val() == "" || $("#phone-fourth-digit").val() == "") {

      $('#verfiy-phone-modal-div-id').modal('show');
      $('#verfiy-phone-modal-div-id').modal({
        backdrop: 'static',
        keyboard: false
      })

      $('#verfication-code-alert').slideDown('100').css('display', 'block');

      return false;

    } else {

      $('#verfication-code-alert').slideUp('100').css('display', 'none');

      $('#verfiy-phone-modal-div-id').modal('hide');
      $('#verifaction-modal-div-id').modal('show');
      return true;
    }

  });

});
//flat picker script start
$(".resetDate").flatpickr({
  wrap: true,
  weekNumbers: true,
});
//proceed modal script start

// $(document).ready(function () {

//   $("#proceed-btn-id").click(function () {

//     $('#proceed-modal-div-id').modal('show');

//   });

// });





  //cpmpany phone verifaction alert script alert()
$(document).ready(function () {

  $("#companyverification-submit").click(function () {
    if ($("#company-phone-first-digit").val() == "" || $("#company-phone-second-digit").val() == "" || $("#company-phone-third-digit").val() == "" || $("#company-phone-fourth-digit").val() == "") {

      $('#company-verfiy-phone-modal-div-id').modal('show');
      $('#company-verfiy-phone-modal-div-id').modal({
        backdrop: 'static',
        keyboard: false
      })

      $('#company-verfication-code-alert').slideDown('100').css('display', 'block');

      return false;

    } else {

      $('#company-verfication-code-alert').slideUp('100').css('display', 'none');

      $('#company-verfiy-phone-modal-div-id').modal('hide');
      $('#company-sucess-verifaction-modal-div-id').modal('show');
      return true;
    }

  });

});



  //freelance phone verifaction alert script alert()
$(document).ready(function () {

  $("#freelance-verification-submit").click(function () {
    if ($("#free-phone-first-digit").val() == "" || $("#free-phone-second-digit").val() == "" || $("#free-phone-third-digit").val() == "" || $("#free-phone-fourth-digit").val() == "") {

      $('#freelance-verfiy-phone-modal-div-id').modal('show');
      $('#freelance-verfiy-phone-modal-div-id').modal({
        backdrop: 'static',
        keyboard: false
      })

      $('#freelance-verfication-code-alert').slideDown('100').css('display', 'block');

      return false;

    } else {

      $('#freelance-verfication-code-alert').slideUp('100').css('display', 'none');

      $('#freelance-verfiy-phone-modal-div-id').modal('hide');
      $('#freelance-sucess-modal-div-id').modal('show');
      return true;
    }

  });

});
//proceed modal script start

// 
//social linkes anmated
$("#company-face-so-btn-id").click(function(){
  $(".soical-input-type").toggleClass("active").focus;
  $(this).toggleClass("animate");
  $(".soical-input-type").val("");
});



//free lancer social linkes anmated
$("#free-face-so-btn-id").click(function(){
  $(".soical-input-type").toggleClass("active").focus;
  $(this).toggleClass("animate");
  $(".soical-input-type").val("");
});



//company indvidual form fad in out script

  $(document).ready(function(){
    
  $("#indevidual-id-link").click(function(){
    
    
    $('.frist-form-info-quest').css({'display': 'none'});
     $("#free-lancer-form-id").fadeIn(1100);
   
  });
  $("#company-id-link").click(function(){
    
    $('.frist-form-info-quest').css({'display': 'none'});
    $("#company-form-id").fadeIn(1100);
  });
});

  //business freelance info form tab script
var freeCurrenttab = 0; 
freeShowtab(freeCurrenttab); 

function freeShowtab(n) {
  console.log(n);
  var x = document.getElementsByClassName("freelance-tab");
  x[n].style.display = "block";
  if (n == 0) {
    document.getElementById("freelance-prevBtn").style.display = "none";
  } else {
    document.getElementById("freelance-prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("freelance-nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("freelance-nextBtn").innerHTML = "Next";
  }
  freeFixStepIndicator(n)
}

function freeNextPrev(n) {

  $.validator.addMethod('filesize', function (value, element, param) {
    return this.optional(element) || (element.files[0].size <= param)
}, 'File size must be less than {0}');

  $("#free-lancer-form-id").validate({
      ignore: [],    
       
  rules: {

       business_name:
    {
    
    required:true,

    },

      business_category:
    {
    
    required:true,

    },
      business_email:
    {
    
    required:true,

    },
 
     free_logo: {
            
                accept: "jpg,jpeg,png",
                filesize: 1000*1024,
            },


 
    
  },
  messages: {
         free_logo: {
      filesize:"file size must be less than 2M",
      
},
  }

});

  if ($("#free-lancer-form-id").valid()) {
    document.getElementsByClassName("freelanceStep")[freeCurrenttab].className += " freelanceFinish";
  }
 var form = $(this).closest("form");
    var validator = form.data("validator");
    var section = $(this).closest("div");
    var fields = section.find(":input");
  console.log($("#free-lancer-form-id").valid(),$("#free-lancer-form-id").validate().form(),fields.valid());
  var x = document.getElementsByClassName("freelance-tab");
  if (n == 1 && !fields.valid()) return false;
  x[freeCurrenttab].style.display = "none";
  freeCurrenttab = freeCurrenttab + n;
  if (freeCurrenttab >= x.length) {
    document.getElementById("freelance-regForm").submit();
    return false;
  }
 
  freeShowtab(freeCurrenttab);
}

function freeValidateform() {
    // var valid = true;
 
//console.log($("#free-lancer-form-id").valid(),'l');
 //return $("#free-lancer-form-id").valid(); 
}

function freeFixStepIndicator(n) {
  var i, x = document.getElementsByClassName("freelanceStep");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" freelanceActive", "");
  }
  
  x[n].className += " freelanceActive";
}















  //business company info form tab script
var currentTab = 0; 
showTab(currentTab); 

function showTab(n) {
  console.log(n);
  var x = document.getElementsByClassName("company-form-tab");
  x[n].style.display = "block";
  if (n == 0) {
    document.getElementById("company-prevBtn").style.display = "none";
  } else {
    document.getElementById("company-prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("company-nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("company-nextBtn").innerHTML = "Next";
  }
  fixStepIndicator(n)
}

function nextPrev(n) {
  var x = document.getElementsByClassName("company-form-tab");
  if (n == 1 && !validateForm()) return false;
  x[currentTab].style.display = "none";
  currentTab = currentTab + n;
  if (currentTab >= x.length) {
    document.getElementById("company-regForm").submit();
    return false;
  }
 
  showTab(currentTab);
}

function validateForm() {

  var x, y, i, valid = true;
  x = document.getElementsByClassName("company-form-tab");
  y = x[currentTab].getElementsByClassName("form-group");

  for (i = 0; i < y.length; i++) {
  
    if (y[i].value == "") {

      y[i].className += " invalid";
 
      valid = false;
    }
  }

  if (valid) {
    document.getElementsByClassName("company-form-step")[currentTab].className += " finish";
  }
  return valid; 
}

function fixStepIndicator(n) {
  var i, x = document.getElementsByClassName("company-form-step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  
  x[n].className += " active";
}










//----freelance-image-upload-image-script-start

//get-file-images
function freeGetFileSize() {
  console.log('changed');
  var fi = document.getElementById('freelance-logo-btn');


  if (fi.files.length > 0) {

    for (var i = 0; i <= fi.files.length - 1; i++) {

      var fsize = fi.files.item(i).size;

      // if (fsize > 2097152) {

      //   alert('image size > 2M');
      //   $('#freelance-logo-preview').empty();
      //   $('#freelance-logo-btn').val('');
      // }

    }
  }
}
  
  //image-preview
function freelogo_preview(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#freelance-logo-preview').attr('src', e.target.result);
      $('#freelance-logo-preview').attr('width', '100%' );
    }

    reader.readAsDataURL(input.files[0]);
  }
}


$("#freelance-logo-btn").change(function () {
  freelogo_preview(this);
  $("#freelance-logo-upload-label-for-image").css("display", "none");
  $("#freelance-upload-logo").css("display", "none");
  $("#freelance-upload-or").css("display", "none");
  $("#freelance-upload-use-pic").css("display", "none");
  $(".item-upload").css({"display": "flex","padding-top": "5px","padding-bottom": "5px","padding": "5px","padding": "10px",
    "align-items": "center",
    "justify-content": "center"});
    $("#freelance-logo-preview").css({"width": "100%" , "height": "100%"});

});


//----freelanc-image-upload-image-script-end

//----company-image-upload-image-script-start

//get-file-images
function companyGetFileSize() {
  console.log('changed');
  var fi = document.getElementById('company-logo-btn');


  if (fi.files.length > 0) {

    for (var i = 0; i <= fi.files.length - 1; i++) {

      var fsize = fi.files.item(i).size;

      // if (fsize > 2097152) {

      //   alert('image size > 2M');
      //   $('#company-logo-preview').empty();
      //   $('#company-logo-btn').val('');
      // }

    }
  }
}
  
  //image-preview
function compnylogo_preview(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#company-logo-preview').attr('src', e.target.result);
      $('#company-logo-preview').attr('width', '100%' );
    }

    reader.readAsDataURL(input.files[0]);
  }
}


$("#company-logo-btn").change(function () {
  compnylogo_preview(this);
  $("#company-upload-label-for-image-delete").css("display", "none");
  $("#company-uplod-text").css("display", "none");
  $("#company-uplod-or-text").css("display", "none");
  $("#company-uplod-use-pic").css("display", "none");
  $(".item-upload").css({"display": "flex","padding-top": "5px","padding-bottom": "5px","padding": "5px","padding": "10px",
    "align-items": "center",
    "justify-content": "center"});
    $("#company-logo-preview").css({"width": "100%" , "height": "100%"});

});


//----company-image-upload-image-script-end
//ADD MORE LOCATION SCRIPT
            $(document).ready(function() {
                $("#add-more-loction-id").click(function() {
                    $("#collaped-location-div").slideToggle();
                });
            });
//ADD MORE LOCATION one by one script

  $(document).ready(function(){
    
  $("#second-location-idbtn").click(function(){
    
    
    $('#second-location-idbtn').css({'display': 'none'});
     $("#second-appernce-div").fadeIn(1400);
   
  });
  $("#third-location-idbtn").click(function(){
    
    $('#third-location-idbtn').css({'display': 'none'});
    $("#third-appernce-div").fadeIn(1400);
     $("#apprance-div-error").fadeIn(1400);
  });

});
