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

			
			// 	$('#logo_preview').empty();
			// 	$('#logo-btn').val('');
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

			$('#verfication-code-alert').slideDown('300').css('display', 'block');

			return false;

		} else {

			$('#verfication-code-alert').slideUp('300').css('display', 'none');

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

// 	$("#proceed-btn-id").click(function () {

// 		$('#proceed-modal-div-id').modal('show');

// 	});

// });


//Validation modal in footer

$(document).ready(function(){
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var token = document.getElementsByName("csrfToken").value;

$("#registerformodal").validate({
  rules: {
    firstname: {
      required: true
      //minlength: 5,
      //maxlength: 10,
      //email: true
      //startWithA: true
    },
     lastname: {
      required: true
    },

    password :
     {
         minlength : 8,
      required:true,
           },
        password_confirm :
         {
            required:true,
             minlength : 8,
             equalTo :'[name="password"]'
        },

          email :
     {
      required:true,

      remote: {
          url: "/checkEmailUser",
            headers: {
                    'X-CSRF-Token': token
               },
          type: "post"
         },
},

},

// Custom message for error
  messages: {
    firstname: {
      required: "You must enter your first name"
    },

     lastname: {
      required: "You must enter your last name"
    },

     password: {
      minlength:"You must enter at least 8 char",
      required: "You must enter your password ",


    },
     password_confirm: {
         minlength:"You must enter at least 8 char",
 required: "You must enter your confirm  password ",
        equalTo : "Please enter the same password"
    },

     email: {
      required: "You must enter your email ",
         remote: "You must enter valid email ",
    },

  },

  highlight: function(element, errorClass) {
    $(element).closest(".span_error").addClass("has-error");
  },
  unhighlight: function(element, errorClass) {
    $(element).closest(".span_error").removeClass("has-error");
  },
  errorPlacement: function (error, element) {
    error.appendTo(element.parent().next());
  },
  errorPlacement: function (error, element) {
    if(element.attr("type") == "checkbox") {
      element.closest(".span_error").children(0).prepend(error);
    }
    else
      error.insertAfter(element);
  }
});



$("#loginformodal").validate({
  rules: {


    passwordlogin :
    {
    minlength : 8,
    required:true,
    },

 emaillogin :
    {
    required:true,


    },

},

// Custom message for error
  messages: {


      passwordlogin: {
      minlength:"You must enter at least 8 char",
      required: "You must enter your password ",
},

      emaillogin: {
      required: "You must enter your email ",
      remote: "You must enter valid email ",
      },

  },

  highlight: function(element, errorClass) {
    $(element).closest(".span_error").addClass("has-error");
  },
  unhighlight: function(element, errorClass) {
    $(element).closest(".span_error").removeClass("has-error");
  },
  errorPlacement: function (error, element) {
    error.appendTo(element.parent().next());
  },
  errorPlacement: function (error, element) {
    if(element.attr("type") == "checkbox") {
      element.closest(".span_error").children(0).prepend(error);
    }
    else
      error.insertAfter(element);
  }
});
});


///validate profile setting 



//append slud in regsiter modal in header
  $(document).ready(function(){
    var exh_slug_session = sessionStorage.getItem("exh_slug_session");
    console.log(exh_slug_session);
    $('#exh_slug_session').val(exh_slug_session);
    if (typeof exh_slug_session === 'undefined' || exh_slug_session === null) {
      // variable is undefined or null
      
    }else{
      $('#exh_slug_session').val(exh_slug_session);
    
    }
  });




    


   $('#loginmodalbutton').click(function(e) {


    // var formStatus = $('#loginformodal').validate().form();
    // console.log(formStatus);
        e.preventDefault();
 document.getElementById("dangermsgadd").innerHTML = "";

if($("#loginformodal").validate().form())
{

   formData = $('#loginformodal').serialize();




  $.post({

      headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    type: 'POST',
    url: '/loginformodal',
    data: formData,
     success: function(data){


if(data.status=='error')
{
    $('#login-modal-id').modal('show');
   document.getElementById("dangermsgadd").innerHTML = "";


    $('#login-modal-id').find('.errormodal').append('<span class="text-danger"><b>There is somtheing wrong in email or password</b></span>');

    
  }
else
  {
   
           location.reload(true);

  }

  
}

  })
  }
});

$(document).ready(function () {
$("#setting-profile-nationallity-id").select2({
    placeholder: "Select your nationality"
    });

$("#setting-profile-country-id").select2({
    placeholder: "Select your country"
    });

$("#setting-profile-phone-id").select2({
    placeholder: "code"
    });
$("#setting-profile-gender-id").select2({
  placeholder: "Select your gender",
      minimumResultsForSearch: -1

  });

$("#setting-profile-job-category-id").select2({
    placeholder: "Select your job category"
    });

$("#setting-profile-job-title-id").select2({
    placeholder: "Select your job title"
    });



$.validator.addMethod('filesize', function (value, element, param) {
    return this.optional(element) || (element.files[0].size <= param)
}, 'File size must be less than {0}');

  $("#profilesetting").validate({
  ignore: [],       
  rules: {

       date :
    {
    
    required:true,
    },
      nationallity :
    {
    
    required:true,
    },

       country :
    {
    
    required:true,
    },

        code :
    {
    
    required:true,
    },

         telephone :
    {
    
    required:true,
    minlength:10,
    maxlength:10
    },

           zip :
    {
    
   
    number: true,
    },

 
     logo: {
                required: true,
                accept: "jpg,jpeg,png",
                filesize: 1000*1024,
            },

      gender :
    {
    
    required:true,
    },
    
  },
  messages: {
         logo: {
      filesize:"file size must be less than 2M",
      
},
  }
});

  $('#proceed-btn-id').click(function() {

if($("#profilesetting").validate().form())
{
$('#proceed-modal-div-id').modal('show');

$('#proceed-modal-div-idsubmit').on('click', function(e){
    e.preventDefault();
   $("#profilesetting").submit();
})

}
 

  });
});


$(document).ready(function(){
    $('#setting-profile-job-category-id').on('change', function(){
     
        var jobcategoryID = $(this).val();
        if(jobcategoryID){
            $.ajax({
              headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
                type:'POST',
                url:'/getjobtitle',
                data:'jobcategoryID='+jobcategoryID,
                success:function(html){
                
                    $('#setting-profile-job-title-id').html(html);
                    
                }
            }); 
        }
    });


    });