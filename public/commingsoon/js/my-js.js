
	



$(document).ready(function(e) {
    $(".big-services").mouseover(function(){
		
$(this).find("img").css({
	"transform":"scale(1.2,1.2)",
	
});
	});
	
 $(".big-services").mouseout(function(){
		
$(this).find("img").css({
	"transform":"scale(1,1)",
	
});
	});	
	



$(".search-item").click(function(){
	
	$(".main-search-item2").toggleClass("hidden-search");
		$(".item-search-big2").slideToggle();

});


$(".language-btn").click(function(){
	
		$(".child-lang").slideToggle();

});


$('.carousel').carousel({
  interval: 100000
})

//$(".li-blogs").mouseover(function(){
//$(this).find(".absolute-blogs").slideDown();	
//});
//$(".li-blogs").mouseleave(function(){
//$(this).find(".absolute-blogs").slideUp();	
//});
	
});


$(document).ready(function(e) {
    $(".btn-menu-com").click(function(){
	$(".nav-details").slideToggle();	
		
	});
	 $(".label-upload-video-action").click(function(){
	$(".share-video").slideToggle();	
		
	});
	
	
});
	






$(window).scroll(function() {
    if ($(window).scrollTop() > 25) {
        $(".big-menu").css({
            'top': 0,
		'padding': '0px',
        });
		 $(".a-head").css({
		'position': 'static',

        });
		 $(".a-head img").css({
		'width': '200px',

        });
		
	
		
		
    } else {
		
		
		 $(".big-menu").css({
            'top': 50,
		'padding': '6px',
        });
		 $(".a-head").css({
		'position': 'absolute',

        });
		 $(".a-head img").css({
		'width': '335px',

        });
     
		
		
		    
    }
});








