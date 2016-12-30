var slidrev=jQuery;
	slidrev.noConflict();
	//This is a fix for when the slider is used in a hidden div
	function testTriger(){
		setTimeout(function (){
			slidrev(".cstyle01").resize();
		}, 500);	
	}
	
function trigerJslider(){
  jQuery("#Slider1").slider({ from: 0, to: 9, step: 0.5, smooth: true, round: 1, dimension: "", skin: "round" });
  testTriger();
  }
	
function trigerJslider2(){
  jQuery("#Slider2").slider({ from: 0, to: 9, step: 0.5, smooth: true, round: 1, dimension: "", skin: "round" });
  }
  
	function trigerJslider3(){
	  jQuery("#Slider3").slider({ from: 0, to: 9, step: 0.5, smooth: true, round: 1, dimension: "", skin: "round" });
	  }
	  
	  
function trigerJslider4(){
  jQuery("#Slider4").slider({ from: 0, to: 9, step: 0.5, smooth: true, round: 1, dimension: "", skin: "round" });
  }
  
  