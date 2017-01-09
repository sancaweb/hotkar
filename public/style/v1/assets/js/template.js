//Datepicker
jQuery(function() {
	"use strict";
		var dateToday = new Date(); 
		jQuery( "#datepicker,#datepicker3,#datepicker4,#datepicker5,#datepicker6,#datepicker7,#datepicker8" ).datepicker({
			dateFormat: "yy-mm-dd",
			minDate: dateToday
		}).datepicker("setDate",new Date());
		
		
		jQuery( "#datepicker2" ).datepicker({
			dateFormat: "yy-mm-dd",
			minDate: "+1"
		}).datepicker("setDate",new Date());
	});
	
//------------------------------
//CaroufredSell
//------------------------------
jQuery(document).ready(function(jQuery){

	jQuery("#foo").carouFredSel({
		width: "100%",
		height: 240,
		items: {
			visible: 5,
			minimum: 1,
			start: 2
		},
		scroll: {
			items: 1,
			easing: "easeInOutQuad",
			duration: 500,
			pauseOnHover: true
		},
		auto: false,
		prev: {
			button: "#prev_btn",
			key: "left"
		},
		next: {
			button: "#next_btn",
			key: "right"
		},				
		swipe: true
	});
	
	
	jQuery("#foo2").carouFredSel({
		width: "100%",
		height: 240,
		items: {
			visible: 5,
			minimum: 1,
			start: 2
		},
		scroll: {
			items: 1,
			easing: "easeInOutQuad",
			duration: 500,
			pauseOnHover: true
		},
		auto: false,				
		prev: {
			button: "#prev_btn2",
			key: "left"
		},
		next: {
			button: "#next_btn2",
			key: "right"
		},				
		swipe: true
	});
	

});

//------------------------------
//Nice Scroll
//------------------------------
jQuery(document).ready(function() {

	var nice = jQuery("html").niceScroll({
		cursorcolor:"#ccc",
		cursorborder :"0px solid #fff",			
		railpadding:{top:0,right:0,left:0,bottom:0},
		cursorwidth:"5px",
		cursorborderradius:"0px",
		cursoropacitymin:0,
		cursoropacitymax:0.7,
		boxzoom:true,
		horizrailenabled:false,
		autohidemode:false
	});  
	
	jQuery("#air").niceScroll({horizrailenabled:false});
	jQuery("#hotel").niceScroll({horizrailenabled:false});
	jQuery("#car").niceScroll({horizrailenabled:false});
	jQuery("#vacations").niceScroll({horizrailenabled:false});
	jQuery('.hotelstab2').removeClass('none');

	jQuery('html').addClass('no-overflow-y');
	
});

//------------------------------
//Add rooms
//------------------------------
function addroom2(){
"use strict";
	jQuery('.room2').addClass('block');
	jQuery('.room2').removeClass('none');
	jQuery('.addroom1').removeClass('block');
	jQuery('.addroom1').addClass('none');
	
}
function removeroom2(){
"use strict";
	jQuery('.room2').addClass('none');
	jQuery('.room2').removeClass('block');
	
	jQuery('.addroom1').removeClass('none');
	jQuery('.addroom1').addClass('block');
}
function addroom3(){
"use strict";
	jQuery('.room3').addClass('block');
	jQuery('.room3').removeClass('none');
	
	jQuery('.addroom2').removeClass('block');
	jQuery('.addroom2').addClass('none');
}
function removeroom3(){
"use strict";
	jQuery('.room3').addClass('none');
	jQuery('.room3').removeClass('block');
	
	jQuery('.addroom2').removeClass('none');
	jQuery('.addroom2').addClass('block');			
}

//------------------------------
//ROLLOVER
//------------------------------
	
var theSide = 'marginLeft';
var options = {};
options[theSide] = jQuery('.one').width()/2-15;
jQuery(".one")
	.mouseenter(function() {
		jQuery(".mhover", this).addClass( "block" );
		jQuery(".mhover", this).removeClass( "none" );
		jQuery(".icon", this).stop().animate(options, 100);
	})
jQuery(".one").mouseleave(function() {
		jQuery(".mhover", this).addClass( "none" );
		jQuery(".mhover", this).removeClass( "block" );
		jQuery(".icon", this).stop().animate({marginLeft:"0px"}, 100);
	});
	

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
	   jQuery('.navbar-wrapper2').css({'min-height' : 100-(jQueryscrollTop/2) +'px'});
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
		   jQuery('.mtnav').stop().animate({top: '10px'}, 500);
		  }
		
		
		jQuery('.logo').stop().animate({width: '350px'}, 100);		

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

//------------------------------
//Custom select
//------------------------------
var selup=jQuery;
	selup.noConflict();
	
jQuery(document).ready(function(){
"use strict";
	jQuery('.mySelectBoxClass').customSelect();
	
	/* -OR- set a custom class name for the stylable element */
	//jQuery('.mySelectBoxClass').customSelect({customClass:'mySelectBoxClass'});
});

function mySelectUpdate(){
"use strict";
	setTimeout(function (){
		selup('.mySelectBoxClass').trigger('update');
	}, 200);
}

selup(window).resize(function() {
"use strict";
	mySelectUpdate();
	
	
});