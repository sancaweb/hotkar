<div id="dajy" class="fullscreen-container mtslide sliderbg fixed">
	<div class="fullscreenbanner">
		<ul>

			<!-- papercut fade turnoff flyin slideright slideleft slideup slidedown-->
		
			<!-- FADE -->
			<?php if($home_slide){
				$list_style=array(
					'papercut', 'fade', 'turnoff',
					'flyin', 'slideright','slideleft','slideup','slidedown');
					$x=0;
				foreach($home_slide as $home_slide){
					$x++;
					$style=array_rand($list_style);
					$stylenya=$list_style[$style];
					$nama_kecamatan=$this->pengaturan->get_nama_kec_karawang_byId($home_slide->kecamatan);
					if($nama_kecamatan){
						$nama_kecamatan=$nama_kecamatan->nama_kec;
					}else{
						$nama_kecamatan='';
					}
					$harga=$this->hotel->harga_terendah_kamar_byIdhotel($home_slide->id);	
					if($harga){
						$harga=$harga->harga;
					}else{
						$harga=00000;
					}
					
					
					?>
					<li data-transition="<?php echo $stylenya;?>" data-slotamount="1" data-masterspeed="300"> 										
						<img src="<?php echo $this->uri->baseUri.STYLE;?>images/slider/slide_<?php echo $x;?>.jpg" alt=""/>
						<div class="tp-caption scrolleffect sft medium_grey"
							 data-x="center"
							 data-y="120"
							 data-speed="1000"
							 data-start="800"
							 data-easing="easeOutExpo"  >
							 <div class="sboxpurple textcenter">
								<span class="lato size28 slim caps white"><?php echo $nama_kecamatan;?></span><br/><br/><br/>
								<span class="lato size100 slim caps white"><?php echo $home_slide->nama_hotel;?></span><br/><br/>
								<span class="lato size20 normal caps white">from</span><br/><br/>
								<span class="lato size48 slim uppercase yellow"><?php echo 'Rp. '.number_format($harga,0,'','.');?></span><br/>
							 </div>
						</div>	
					</li>
					<?php
				}
			}?>

		</ul>
		<div class="tp-bannertimer none"></div>
	</div>
</div>

<!--
##############################
 - ACTIVATE THE BANNER HERE -
##############################
-->
<script type="text/javascript">

	var tpj=jQuery;
	tpj.noConflict();

	tpj(document).ready(function() {

	if (tpj.fn.cssOriginal!=undefined)
		tpj.fn.css = tpj.fn.cssOriginal;

		tpj('.fullscreenbanner').revolution(
			{
				delay:9000,
				startwidth:1170,
				startheight:600,

				onHoverStop:"on",						// Stop Banner Timet at Hover on Slide on/off

				thumbWidth:100,							// Thumb With and Height and Amount (only if navigation Tyope set to thumb !)
				thumbHeight:50,
				thumbAmount:3,

				hideThumbs:0,
				navigationType:"bullet",				// bullet, thumb, none
				navigationArrows:"solo",				// nexttobullets, solo (old name verticalcentered), none

				navigationStyle:false,				// round,square,navbar,round-old,square-old,navbar-old, or any from the list in the docu (choose between 50+ different item), custom


				navigationHAlign:"left",				// Vertical Align top,center,bottom
				navigationVAlign:"bottom",					// Horizontal Align left,center,right
				navigationHOffset:30,
				navigationVOffset:30,

				soloArrowLeftHalign:"left",
				soloArrowLeftValign:"center",
				soloArrowLeftHOffset:20,
				soloArrowLeftVOffset:0,

				soloArrowRightHalign:"right",
				soloArrowRightValign:"center",
				soloArrowRightHOffset:20,
				soloArrowRightVOffset:0,

				touchenabled:"on",						// Enable Swipe Function : on/off


				stopAtSlide:-1,							// Stop Timer if Slide "x" has been Reached. If stopAfterLoops set to 0, then it stops already in the first Loop at slide X which defined. -1 means do not stop at any slide. stopAfterLoops has no sinn in this case.
				stopAfterLoops:-1,						// Stop Timer if All slides has been played "x" times. IT will stop at THe slide which is defined via stopAtSlide:x, if set to -1 slide never stop automatic

				hideCaptionAtLimit:0,					// It Defines if a caption should be shown under a Screen Resolution ( Basod on The Width of Browser)
				hideAllCaptionAtLilmit:0,				// Hide all The Captions if Width of Browser is less then this value
				hideSliderAtLimit:0,					// Hide the whole slider, and stop also functions if Width of Browser is less than this value


				fullWidth:"on",							// Same time only Enable FullScreen of FullWidth !!
				fullScreen:"off",						// Same time only Enable FullScreen of FullWidth !!


				shadow:0								//0 = no Shadow, 1,2,3 = 3 Different Art of Shadows -  (No Shadow in Fullwidth Version !)

			});


});
</script>