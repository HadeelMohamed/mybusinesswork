///////////////javascript hadeel
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
      minlength:"You must enter at least 6 char",
      required: "You must enter your password ",


    },
     password_confirm: {
         minlength:"You must enter at least 6 char",
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
    minlength : 6,
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
      minlength:"You must enter at least 6 char",
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

$("#business-info-business-category-id").select2({
    placeholder: "Select your job title"
    });

$("#freelance-business-info-country-id").select2({
    placeholder: "Select your  country"
    });

$("#freelance-business-info-city-id").select2({
    placeholder: "Select your  country"
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

  

         telephone :
    {
    
    required:true,


    },

   

 
     logo: {
            
                accept: "jpg,jpeg,png",
                filesize: 1000*1024,
            },

      gender :
    {
    
    required:true,
    },

         jobcategory:
    {
    
    required:true,
    
    },
         jobtitle :
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
  

if($("#profilesetting").validate().form() && iti.isValidNumber())
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

 $('.changevalidation').on('change', function() {
      var nameField = $('.changevalidation');
        if ($(this).is(':selected')) {
            nameField.prop("disabled", true);
        } else {
            nameField.prop("disabled", false);
        }
    nameField.valid();
    });


    });


 
  
  