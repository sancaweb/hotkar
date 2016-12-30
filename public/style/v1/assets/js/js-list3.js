
//------------------------------
//Counter
//------------------------------

var counttel=jQuery;
	counttel.noConflict();

jQuery(function(counttel) {
"use strict";
	counttel('.countprice').countTo({
		from: 5,
		to: 80,
		speed: 1000,
		refreshInterval: 50,
		onComplete: function(value) {
			console.debug(this);
		}
	});
	counttel('.counthotel').countTo({
		from: 1,
		to: 53,
		speed: 2000,
		refreshInterval: 50,
		onComplete: function(value) {
			console.debug(this);
		}
	});			
});



//------------------------------
//Custom select
//------------------------------
jQuery(document).ready(function(){
"use strict";
	jQuery('.mySelectBoxClass').customSelect();

	/* -OR- set a custom class name for the stylable element */
	//jQuery('.mySelectBoxClass').customSelect({customClass:'mySelectBoxClass'});
});

var selectup=jQuery;
	selectup.noConflict();
	
function mySelectUpdate(){
"use strict";
	setTimeout(function (){
		selectup('.mySelectBoxClass').trigger('update');
	}, 200);
}

selectup(window).resize(function() {
"use strict";
	mySelectUpdate();
});





//------------------------------
//Niciscroll
//------------------------------
jQuery(document).ready(function() {
"use strict";
	var nice = jQuery("html").niceScroll({
		
		cursorcolor:"#ccc",
		//background:"#fff",	
		cursorborder :"0px solid #fff",			
		railpadding:{top:0,right:0,left:0,bottom:0},
		cursorwidth:"5px",
		cursorborderradius:"0px",
		cursoropacitymin:0,
		cursoropacitymax:0.7,
		boxzoom:true,
		autohidemode:false
	});  
	
	jQuery(".hotelstab").niceScroll({horizrailenabled:false});
	jQuery(".flightstab").niceScroll({horizrailenabled:false});
	jQuery(".vacationstab").niceScroll({horizrailenabled:false});
	jQuery(".carstab").niceScroll({horizrailenabled:false});
	jQuery(".cruisestab").niceScroll({horizrailenabled:false});
	jQuery(".flighthotelcartab").niceScroll({horizrailenabled:false});
	jQuery(".flighthoteltab").niceScroll({horizrailenabled:false});
	jQuery(".flightcartab").niceScroll({horizrailenabled:false});
	jQuery(".hotelcartab").niceScroll({horizrailenabled:false});
	
	jQuery('html').addClass('no-overflow-y');
	
});



//------------------------------
//Add rooms
//------------------------------
function addroom2(){
"use strict";
	$('.room2').addClass('block');
	$('.room2').removeClass('none');
	$('.addroom1').removeClass('block');
	$('.addroom1').addClass('none');
	
}
function removeroom2(){
"use strict";
	$('.room2').addClass('none');
	$('.room2').removeClass('block');
	
	$('.addroom1').removeClass('none');
	$('.addroom1').addClass('block');
}
function addroom3(){
"use strict";
	$('.room3').addClass('block');
	$('.room3').removeClass('none');
	
	$('.addroom2').removeClass('block');
	$('.addroom2').addClass('none');
}
function removeroom3(){
"use strict";
	$('.room3').addClass('none');
	$('.room3').removeClass('block');
	
	$('.addroom2').removeClass('none');
	$('.addroom2').addClass('block');			
}

	

	
//------------------------------
//slider parallax effect
//------------------------------
jQuery(document).ready(function($){
"use strict";
var $scrollTop;
var $headerheight;
var $loggedin = false;
	
if($loggedin == false){
  $headerheight = $('.navbar-wrapper2').height() - 20;
} else {
  $headerheight = $('.navbar-wrapper2').height() + 100;
}


$(window).scroll(function(){
"use strict";
  var $iw = $('body').innerWidth();
  $scrollTop = $(window).scrollTop();	   
	  if ( $iw < 992 ) {
	 
	  }
	  else{
	   $('.navbar-wrapper2').css({'min-height' : 110-($scrollTop/2) +'px'});
	  }
  $('#dajy').css({'top': ((- $scrollTop / 5)+ $headerheight)  + 'px' });
  //$(".sboxpurple").css({'opacity' : 1-($scrollTop/300)});
  $(".scrolleffect").css({'top': ((- $scrollTop / 5)+ $headerheight) + 50  + 'px' });
  $(".tp-leftarrow").css({'left' : 20-($scrollTop/2) +'px'});
  $(".tp-rightarrow").css({'right' : 20-($scrollTop/2) +'px'});
});

});


//------------------------------
//Animations for this page
//------------------------------
var pageanimate=jQuery;
	pageanimate.noConflict();
pageanimate(document).ready(function(){
"use strict";
	pageanimate('.tip-arrow').css({'bottom':1+'px'});
	pageanimate('.tip-arrow').animate({'bottom':-9+'px'},{ duration: 700, queue: false });	
	
	pageanimate('.bookfilters').css({'margin-top':-40+'px'});
	pageanimate('.bookfilters').animate({'margin-top':0+'px'},{ duration: 1000, queue: false });	
	
	pageanimate('.topsortby').css({'opacity':0});
	pageanimate('.topsortby').animate({'opacity':1},{ duration: 1000, queue: false });	

	pageanimate('.itemscontainer').css({'opacity':0});
	pageanimate('.itemscontainer').animate({'opacity':1},{ duration: 1000, queue: false });			
});





//------------------------------
//Scroll animations
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





//------------------------------
//Change Tabs
//------------------------------
var changetab=jQuery;
	changetab.noConflict();
changetab(document).ready(function(){
"use strict";
	function mySelectUpdate(){
		setTimeout(function (){
			changetab('.mySelectBoxClass').trigger('update');
		}, 500);
	}
	mySelectUpdate();

	changetab('.hotelstab2').removeClass('none');
	
	changetab( "#optionsRadios1" ).click(function() {
	"use strict";
		changetab('.hotelstab2').removeClass('none');
		changetab('.flightstab2').addClass('none');
		changetab('.vacationstab2').addClass('none');
		changetab('.carstab2').addClass('none');
		changetab('.cruisestab2').addClass('none');
		changetab('.flighthotelcartab2').addClass('none');	
		changetab('.flighthoteltab2').addClass('none');								
		changetab('.flightcartab2').addClass('none');								
		changetab('.hotelcartab2').addClass('none');								
		mySelectUpdate();
	});
	changetab( "#optionsRadios2" ).click(function() {
	"use strict";
		changetab('.hotelstab2').addClass('none');
		changetab('.flightstab2').removeClass('none');
		changetab('.vacationstab2').addClass('none');
		changetab('.carstab2').addClass('none');
		changetab('.cruisestab2').addClass('none');
		changetab('.flighthotelcartab2').addClass('none');	
		changetab('.flighthoteltab2').addClass('none');								
		changetab('.flightcartab2').addClass('none');								
		changetab('.hotelcartab2').addClass('none');	
		mySelectUpdate();
	});						
	changetab( "#optionsRadios3" ).click(function() {
	"use strict";
		changetab('.hotelstab2').addClass('none');
		changetab('.flightstab2').addClass('none');
		changetab('.vacationstab2').removeClass('none');
		changetab('.carstab2').addClass('none');
		changetab('.cruisestab2').addClass('none');
		changetab('.flighthotelcartab2').addClass('none');	
		changetab('.flighthoteltab2').addClass('none');								
		changetab('.flightcartab2').addClass('none');								
		changetab('.hotelcartab2').addClass('none');									
		mySelectUpdate();
	});	
	changetab( "#optionsRadios4" ).click(function() {
	"use strict";
		changetab('.hotelstab2').addClass('none');
		changetab('.flightstab2').addClass('none');
		changetab('.vacationstab2').addClass('none');
		changetab('.carstab2').removeClass('none');
		changetab('.cruisestab2').addClass('none');
		changetab('.flighthotelcartab2').addClass('none');
		changetab('.flighthoteltab2').addClass('none');								
		changetab('.flightcartab2').addClass('none');								
		changetab('.hotelcartab2').addClass('none');									
		mySelectUpdate();
	});	
	changetab( "#optionsRadios5" ).click(function() {
	"use strict";
		changetab('.hotelstab2').addClass('none');
		changetab('.flightstab2').addClass('none');
		changetab('.vacationstab2').addClass('none');
		changetab('.carstab2').addClass('none');
		changetab('.cruisestab2').removeClass('none');
		changetab('.flighthotelcartab2').addClass('none');
		changetab('.flighthoteltab2').addClass('none');								
		changetab('.flightcartab2').addClass('none');								
		changetab('.hotelcartab2').addClass('none');									
		mySelectUpdate();
	});	
	changetab( "#optionsRadios6" ).click(function() {
	"use strict";
		changetab('.hotelstab2').addClass('none');
		changetab('.flightstab2').addClass('none');
		changetab('.vacationstab2').addClass('none');
		changetab('.carstab2').addClass('none');
		changetab('.cruisestab2').addClass('none');
		changetab('.flighthotelcartab2').removeClass('none');
		changetab('.flighthoteltab2').addClass('none');								
		changetab('.flightcartab2').addClass('none');								
		changetab('.hotelcartab2').addClass('none');									
		mySelectUpdate();
	});			
	changetab( "#optionsRadios7" ).click(function() {
	"use strict";
		changetab('.hotelstab2').addClass('none');
		changetab('.flightstab2').addClass('none');
		changetab('.vacationstab2').addClass('none');
		changetab('.carstab2').addClass('none');
		changetab('.cruisestab2').addClass('none');
		changetab('.flighthotelcartab2').addClass('none');
		changetab('.flighthoteltab2').removeClass('none');								
		changetab('.flightcartab2').addClass('none');								
		changetab('.hotelcartab2').addClass('none');									
		mySelectUpdate();
	});	
	changetab( "#optionsRadios8" ).click(function() {
	"use strict";
		changetab('.hotelstab2').addClass('none');
		changetab('.flightstab2').addClass('none');
		changetab('.vacationstab2').addClass('none');
		changetab('.carstab2').addClass('none');
		changetab('.cruisestab2').addClass('none');
		changetab('.flighthotelcartab2').addClass('none');
		changetab('.flighthoteltab2').addClass('none');								
		changetab('.flightcartab2').removeClass('none');								
		changetab('.hotelcartab2').addClass('none');									
		mySelectUpdate();
	});		
	changetab( "#optionsRadios9" ).click(function() {
	"use strict";
		changetab('.hotelstab2').addClass('none');
		changetab('.flightstab2').addClass('none');
		changetab('.vacationstab2').addClass('none');
		changetab('.carstab2').addClass('none');
		changetab('.cruisestab2').addClass('none');
		changetab('.flighthotelcartab2').addClass('none');
		changetab('.flighthoteltab2').addClass('none');								
		changetab('.flightcartab2').addClass('none');								
		changetab('.hotelcartab2').removeClass('none');									
		mySelectUpdate();
	});	

});







//------------------------------
// List Hover Animations
//------------------------------
var listhov=jQuery;
	listhov.noConflict();
listhov(document).ready(function(listhov){
	
"use strict";

	function StartAnime2() {
		var $wlist = listhov('.listitem').width();
		var $hlist = listhov('.listitem').height();

		listhov('.liover').css({
			"width":10+"%",
			"height":10+"%",
			"background-color":"#0099cc",
			"position":"absolute",
			"top":$hlist/2+"px", 
			"left":$wlist/2+"px", 
			"opacity":0.0, 
		});
		listhov('.fav-icon').css({
			"top":$hlist/2-11+"px",
			"left":-25+"px",
		});
		listhov('.book-icon').css({
			"top":$hlist/2-11+"px",
			"left":$wlist+"px",
		});
		
		listhov( ".listitem" )
			.mouseenter(function() {
			"use strict";
				listhov(this).find('.liover').stop().animate({ "left":10+"%","top":10+"%","width":80+"%","height":80+"%","opacity":0.5  });
				listhov(this).find('.book-icon').stop().animate({ "left":$wlist/2+18+"px" });
				listhov(this).find('.fav-icon').stop().animate({ "left":$wlist/2-42+"px" });


			})
			.mouseleave(function() {
			"use strict";
				listhov(this).find('.liover').stop().animate({ "left":$wlist/2+"px","top":$hlist/2+"px","width":10+"%","height":10+"%","opacity":0.0  });
				listhov(this).find('.book-icon').stop().animate({ "left":$wlist+"px" });
				listhov(this).find('.fav-icon').stop().animate({ "left":-25+"px" });
			
			});	
		
	}
	
	StartAnime2();
	
	listhov(window).resize(function() {
	"use strict";
		StartAnime2();					
	});
	


});














