
//   all ------------------
function initCitybook() {
    "use strict";
    //   loader ------------------
    $(".loader-wrap").fadeOut(300, function () {
        $("#main").animate({
            opacity: "1"
        }, 300);
    });
 



//    //   Bubbles ------------------
    $('<div class="bubbles"></div>').appendTo(".bubble-bg");
    var bArray = [];
    var sArray = [5, 10, 15, 20];
    for (var i = 0; i < $('.bubbles').width(); i++) {
        bArray.push(i);
    }
    function randomValue(arr) {
        return arr[Math.floor(Math.random() * arr.length)];
    }
    setInterval(function () {
        var size = randomValue(sArray);
        $('.bubbles').append('<div class="individual-bubble" style="left: ' + randomValue(bArray) + 'px; width: ' + size + 'px; height:' + size + 'px;"></div>');
        $('.individual-bubble').fadeOut(5000, function () {
            $(this).remove()
        });
    }, 350);

    //   appear------------------
    $(".stats").appear(function () {
        $(".num").countTo();
    });
    // Share   ------------------
    $(".share-container").share({
        networks: ['facebook', 'pinterest', 'googleplus', 'twitter', 'linkedin']
    });
    var shrcn = $(".share-container");
    function showShare() {
        shrcn.removeClass("isShare");
        shrcn.addClass("visshare");
    }
    function hideShare() {
        shrcn.addClass("isShare");
        shrcn.removeClass("visshare");
    }
    $(".showshare").on("click", function () {
        $(this).toggleClass("vis-butsh");
        $(this).find("span").text($(this).text() === 'Close' ? 'Share' : 'Close');
        if ($(".share-container").hasClass("isShare")) showShare();
        else hideShare();
    });
 

    // twitter ------------------
    if ($("#footer-twiit").length > 0) {
        var config1 = {
            "profile": {
                "screenName": 'envatomarket'
            },
            "domId": 'footer-twiit',
            "maxTweets": 2,
            "enableLinks": true,
            "showImages": false
        };
        twitterFetcher.fetch(config1);
    }

    // choosse ------------------

	 $('.chosen-select').niceSelect();




   
	
	
    // Counter ------------------
    if ($(".counter-widget").length > 0) {
        var countCurrent = $(".counter-widget").attr("data-countDate");
        $(".countdown").downCount({
            date: countCurrent ,
            offset: 0
        });
    }
 
}









    //   Star Raiting ------------------

//   Init All ------------------
$(function () {
    initCitybook();
});


	
			

	 
	 
	 			
			