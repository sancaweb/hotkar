<!-- Javascript -->
	<?php if(isset($page)){
		if($page=='home'){
			?>
    <!-- This page JS -->
	<script src="<?php echo $this->uri->baseUri.STYLE;?>assets/js/js-index3.js"></script>	
		<script src="<?php echo $this->uri->baseUri.STYLE;?>assets/js/js-scroll-page.js"></script>
	<?php
		}
	}?>
	
    <!-- Custom functions -->
    <script src="<?php echo $this->uri->baseUri.STYLE;?>assets/js/functions.js"></script>
	
        <!-- jQuery KenBurn Slider  -->
    <script type="text/javascript" src="<?php echo $this->uri->baseUri.STYLE;?>rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

	
	<!-- Easing -->
    <script src="<?php echo $this->uri->baseUri.STYLE;?>assets/js/jquery.easing.js"></script>
	
   <!-- Nicescroll  -->	
	<script src="<?php echo $this->uri->baseUri.STYLE;?>assets/js/jquery.nicescroll.min.js"></script>
	
    <!-- CarouFredSel -->
    <script src="<?php echo $this->uri->baseUri.STYLE;?>assets/js/jquery.carouFredSel-6.2.1-packed.js"></script>
    <script src="<?php echo $this->uri->baseUri.STYLE;?>assets/js/helper-plugins/jquery.touchSwipe.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->uri->baseUri.STYLE;?>assets/js/helper-plugins/jquery.mousewheel.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->uri->baseUri.STYLE;?>assets/js/helper-plugins/jquery.transit.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->uri->baseUri.STYLE;?>assets/js/helper-plugins/jquery.ba-throttle-debounce.min.js"></script>
	
    <!-- Custom Select -->
	<script type='text/javascript' src='<?php echo $this->uri->baseUri.STYLE;?>assets/js/jquery.customSelect.js'></script>	

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo $this->uri->baseUri;?>style/bootstrap/js/bootstrap.min.js"></script>
	
	<?php if(isset($page)){
		if($page=='list' || $page=='hotel'){
		?>			
		<script src="<?php echo $this->uri->baseUri.STYLE;?>assets/js/js-list3.js"></script>
		<script src="<?php echo $this->uri->baseUri.STYLE;?>assets/js/counter.js"></script>
		 <!-- Counter -->
		
	
		<?php
	}
	//admhotel
	if($page=='admhotel'){
		?>
		<!-- Select2 -->
<script src="<?php echo $this->uri->baseUri.ADM_STYLE;?>plugins/select2/select2.js"></script>
		<script>
		jQuery(function () {
			jQuery(".select2").select2();
		});
		 
		</script>
		<!-- lightbox -->
		<script src="<?php echo $this->uri->baseUri;?>style/lightbox/js/lightbox.min.js" type="text/javascript"></script>	
		<?php
		$this->output(TEMPLATE.'js/form_hotel');
		$this->output(TEMPLATE.'js/edit_hotel');
	}
	if($page=='change_password'){
		$this->output(TEMPLATE.'js/edit_user');
	}
	//END admhotel
	
		if($page=='detail_hotel'){
			?>
			<!-- New Carousel -->			
			
    <script src="<?php echo $this->uri->baseUri.STYLE;?>new_carousel/jssor.slider-21.1.6.mini.js" type="text/javascript"></script>
    <script src="<?php echo $this->uri->baseUri.STYLE;?>new_carousel/new_carousel.js" type="text/javascript"></script>
	<!-- END New Carousel -->
	
		<script src="<?php echo $this->uri->baseUri.STYLE;?>assets/js/js-details.js"></script>
					
		<script src="<?php echo $this->uri->baseUri.STYLE;?>assets/js/js-scroll-page.js"></script>	
		<script src="<?php echo $this->uri->baseUri.STYLE;?>assets/js/counter.js"></script>		
		<!-- Carousel-->	
		<script src="<?php echo $this->uri->baseUri.STYLE;?>assets/js/initialize-carousel-detailspage.js"></script>	
		<script>
			/*autocomplete muncul setelah user mengetikan minimal2 karakter */
			var jkabkot=jQuery;
			jkabkot.noConflict();
			jkabkot(function() {  
				jkabkot( "#auto_kabkot" ).autocomplete({
					
				 source: "<?php echo $this->uri->baseUri;?>index.php/data_json/cari_kabkot",  
				   minLength:2, 
				});
			});
			</script>
			
			<?php $this->output(TEMPLATE.'js/input_review');?>
		<script src="<?php echo $this->uri->baseUri.STYLE;?>slide_review.js"></script>
			<?php
			$this->output(TEMPLATE.'js/scroll_rev');
		}
		
		if($page=='booking_form' || $page=='procek_pemesanan'  || $page=='booking_review' || $page=='info_pembayaran' || $page=='finish_booking'){
			?>
		<script src="<?php echo $this->uri->baseUri.STYLE;?>assets/js/js-details.js"></script>			
		<script src="<?php echo $this->uri->baseUri.STYLE;?>assets/js/js-scroll-page.js"></script>			
	<!-- Javascript  -->
	<script src="<?php echo $this->uri->baseUri.STYLE;?>assets/js/js-payment.js"></script>
	<!-- Load Animo -->
	<script src="<?php echo $this->uri->baseUri.STYLE;?>plugins/animo/animo.js"></script>
			<?php
		}
	} ?>
	
	
	<?php if(isset($page)){
		if($page == 'home'  || $page == 'list' || $page=='hotel'){
			?>
			<script>
				/*autocomplete muncul setelah user mengetikan minimal2 karakter */
				var teko=jQuery;
				teko.noConflict();
				teko(function() {  
					teko( "#auto_complete" ).autocomplete({
						
					 source: "<?php echo $this->uri->baseUri;?>index.php/data_json/cari_hotel",  
					   minLength:2, 
					});
				});
				</script>
			<?php
		}
		
		if($page=='cek_pemesanan'){
			?>
						
		<script src="<?php echo $this->uri->baseUri.STYLE;?>assets/js/js-scroll-page.js"></script>			
				<script src="<?php echo $this->uri->baseUri.STYLE;?>assets/js/js-new-homepage.js"></script>
			<?php
		}
	} //END ISSET $PAGE
	?>

	<script>
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
	</script>