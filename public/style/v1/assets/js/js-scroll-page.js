//------------------------------
//Slider parallax effect
//------------------------------
	
jQuery(document).ready(function(jQuery){
"use strict";
var jQueryscrollTop;
var jQueryheaderheight;
var jQueryloggedin = false;
	
if(jQueryloggedin == false){
  jQueryheaderheight = jQuery('.navbar-wrapper2').height() - 20;
} else {
  jQueryheaderheight = jQuery('.navbar-wrapper2').height() + 100;
}


jQuery(window).scroll(function(){
"use strict";
  var jQueryiw = jQuery('body').innerWidth();
  jQueryscrollTop = jQuery(window).scrollTop();	   
	  if ( jQueryiw < 992 ) {
	 
	  }
	  else{
	   jQuery('.navbar-wrapper2').css({'min-height' : 110-(jQueryscrollTop/2) +'px'});
	  }
  jQuery('#dajy').css({'top': ((- jQueryscrollTop / 5)+ jQueryheaderheight)  + 'px' });
  //jQuery(".sboxpurple").css({'opacity' : 1-(jQueryscrollTop/300)});
  jQuery(".scrolleffect").css({'top': ((- jQueryscrollTop / 5)+ jQueryheaderheight) + 30  + 'px' });
  jQuery(".tp-leftarrow").css({'left' : 20-(jQueryscrollTop/2) +'px'});
  jQuery(".tp-rightarrow").css({'right' : 20-(jQueryscrollTop/2) +'px'});
});

});
	
	
	
//------------------------------
//SCROLL ANIMATIONS
//------------------------------	

	jQuery(window).scroll(function(){    
	"use strict";	
		var jQueryiw = jQuery('body').innerWidth();
		
		if(jQuery(window).scrollTop() != 0){
			jQuery('.mtnav').stop().animate({top: '0px'}, 500);
			jQuery('.logo').stop().animate({width: '250px'}, 100);

		}       
		else {
			 if ( jQueryiw < 992 ) {
			  }
			  else{
			   jQuery('.mtnav').stop().animate({top: '30px'}, 500);
			  }
			
			
			jQuery('.logo').stop().animate({width: '500px'}, 100);		
	
		}
		
		
		//Social
		if(jQuery(window).scrollTop() >= 300){
			jQuery('.social1').stop().animate({top:'0px'}, 100);
			
			setTimeout(function (){
				jQuery('.social2').stop().animate({top:'0px'}, 100);
			}, 100);
			
			setTimeout(function (){
				jQuery('.social3').stop().animate({top:'0px'}, 100);
			}, 200);
			
			setTimeout(function (){
				jQuery('.social4').stop().animate({top:'0px'}, 100);
			}, 300);
			
			setTimeout(function (){
				jQuery('.gotop').stop().animate({top:'0px'}, 200);
			}, 400);				
			
		}       
		else {
			setTimeout(function (){
				jQuery('.gotop').stop().animate({top:'100px'}, 200);
			}, 400);	
			setTimeout(function (){
				jQuery('.social4').stop().animate({top:'-120px'}, 100);				
			}, 300);
			setTimeout(function (){
				jQuery('.social3').stop().animate({top:'-120px'}, 100);		
			}, 200);	
			setTimeout(function (){
			jQuery('.social2').stop().animate({top:'-120px'}, 100);		
			}, 100);	

			jQuery('.social1').stop().animate({top:'-120px'}, 100);			

		}
		
		
	});	