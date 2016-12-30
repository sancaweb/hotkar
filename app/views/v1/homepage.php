<!DOCTYPE html>
<html>
  <?php $this->output(TEMPLATE.'header');?>
  
  <body id="top" >
    
	<!-- Top wrapper -->
	<?php $this->output(TEMPLATE.'top_menu');?>
	<!-- / Top wrapper -->


	<!--
	#################################
		- THEMEPUNCH BANNER -
	#################################
	-->
	<?php $this->output(TEMPLATE.'home_slider');?>

	<!-- WRAP/container -->
	<div class="wrap cstyle03">
		
		<?php $this->output(TEMPLATE.'konten/home');?>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<!-- FOOTER -->
		<?php echo $this->output(TEMPLATE.'footer');?>
	</div>
	
	
	<!-- / WRAP -->
	
	
    <?php $this->output(TEMPLATE.'footer_script');?>
  </body>
</html>
