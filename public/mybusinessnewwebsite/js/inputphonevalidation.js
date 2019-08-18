 var input = document.querySelector("#phonetest"),
      errorMsg = document.querySelector("#error-msg"),
   validMsg = document.querySelector("#valid-msg");
var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];




   var iti = window.intlTelInput(input, {



    
      customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
    return "e.g. " + selectedCountryPlaceholder;
  },
     
      utilsScript: "/mybusinessnewwebsite/intl/build/js/utils.js",
    });
var reset = function() {
  input.classList.remove("error");
  errorMsg.innerHTML = "";
  errorMsg.classList.add("hide");
  validMsg.classList.add("hide");
};

// on blur: validate
input.addEventListener('blur', function() {
  reset();
  if (input.value.trim()) {
    if (iti.isValidNumber()) {
       
      
      validMsg.classList.remove("hide");
    } else {
      input.classList.add("error");
      var errorCode = iti.getValidationError();
      errorMsg.innerHTML = errorMap[errorCode];
      errorMsg.classList.remove("hide");
    }
  }
});

// on keyup / change flag: reset
input.addEventListener('change', reset);
input.addEventListener('keyup', reset);

window.iti = iti;
// var intlNumber = $("#phonetest").intlTelInput("getNumber"); // get full number eg +17024181234
// var countryData = $("#phonetest").intlTelInput("getSelectedCountryData"); // get country data as obj 

//  var countryCode = countryData.dialCode; // using updated doc, code has been replaced with dialCode
// countryCode = "+" + countryCode; // convert 1 to +1

// var newNo = intlNumber.replace(countryCode, "(" + coountryCode+ ")");

  

  input.addEventListener("countrychange", function() {
    document.getElementById('calling_code').value=iti.selectedCountryData.dialCode;


  // do something with iti.getSelectedCountryData()
});
