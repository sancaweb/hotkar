//------------------------------
//Custom select
//------------------------------
jQuery(document).ready(function(){
"use strict";
	jQuery('.mySelectBoxClass').customSelect();

	/* -OR- set a custom class name for the stylable element */
	//jQuery('.mySelectBoxClass').customSelect({customClass:'mySelectBoxClass'});
});
var selup=jQuery;
	selup.noConflict();
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
		
		
		
//------------------------------
//Animations for this page
//------------------------------
var anipage=jQuery;
	anipage.noConflict();
anipage(document).ready(function(){
"use strict";
	anipage('.tip-arrow').css({'bottom':1+'px'});
	anipage('.tip-arrow').animate({'bottom':-9+'px'},{ duration: 700, queue: false });	
	
	anipage('.bookfilters').css({'margin-top':-40+'px'});
	anipage('.bookfilters').animate({'margin-top':0+'px'},{ duration: 1000, queue: false });	
	
	anipage('.topsortby').css({'opacity':0});
	anipage('.topsortby').animate({'opacity':1},{ duration: 1000, queue: false });	

	anipage('.itemscontainer').css({'opacity':0});
	anipage('.itemscontainer').animate({'opacity':1},{ duration: 1000, queue: false });			
});


//------------------------------
//Counter
//------------------------------

jQuery(function($) {
"use strict";
	$('.countprice').countTo({
		from: 5,
		to: 36,
		speed: 1000,
		refreshInterval: 50,
		onComplete: function(value) {
			console.debug(this);
		}
	});
	$('.counthotel').countTo({
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
//Nicescroll
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