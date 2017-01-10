<!-- jQuery 2.1.4 -->
<script src="<?php echo $this->uri->baseUri.ADM_STYLE;?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- jQuery UI -->
<script src="<?php echo $this->uri->baseUri.ADM_STYLE;?>plugins/jQueryUI/jquery-ui.min.js"></script>

<!-- Bootstrap 3.3.5 -->
<script src="<?php echo $this->uri->baseUri;?>style/bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?php echo $this->uri->baseUri.ADM_STYLE;?>plugins/select2/select2.js"></script>
<!-- FastClick -->
<script src="<?php echo $this->uri->baseUri.ADM_STYLE;?>plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $this->uri->baseUri.ADM_STYLE;?>dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo $this->uri->baseUri.ADM_STYLE;?>plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?php echo $this->uri->baseUri.ADM_STYLE;?>plugins/slimScroll/jquery.slimscroll.min.js"></script>


<!-- lightbox -->
		<script src="<?php echo $this->uri->baseUri;?>style/lightbox/js/lightbox.min.js" type="text/javascript"></script>	
<?php 
if($page=='hotel'){
	$this->output('admin/js/form_hotel');
}
if($page=='kamar'){
	$this->output('admin/js/form_kamar');
}



if($page=='kamar'){
	?>
	<script src="<?php echo $this->uri->baseUri;?>style/priceformat/jquery.price_format.min.js" type="text/javascript" ></script>
	<script>
		$('#harga').on('keyup', "input[id^='harga']", function() {
		$("input[id^='harga']").priceFormat({
			prefix: "",
			thousandsSeparator: ",",
			centsLimit: 0
		});
		});
		</script>
	<?php
}

?>