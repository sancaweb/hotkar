<!DOCTYPE html>
<html>
  <?php $this->output(TEMPLATE.'header');?>
  <body id="top" class="thebg" >
    
	<?php $this->output(TEMPLATE.'top_menu');?>
	
	<div class="container breadcrub">
	    <div>
		</div>
		<div class="clearfix"></div>
		<div class="brlines"></div>
	</div>	

	<!-- CONTENT -->
	<div class="container">

		
		<div class="container mt25 offset-0">
			
			
			<!-- CONTENT -->
			<div class="col-md-12 pagecontainer2 offset-0">
				
				<!-- LEFT MENU -->
				<div class="col-md-1 offset-0">
					<!-- Nav tabs -->
					<ul class="nav profile-tabs">
					  <li <?php if($menu_tab == 'profile'){echo 'class="active"';}?>>
						<a href="<?php echo $this->uri->baseUri;?>index.php/admhotel" >
						<span class="profile-icon"></span>
						Your profile
						</a></li>
					  <li <?php if($menu_tab == 'booking'){echo 'class="active"';}?>>
						  <a href="<?php echo $this->uri->baseUri;?>index.php/admhotel/booking_list" >
						  <span class="bookings-icon"></span>						  
						  Booking List
						  </a></li>
						  <!--
					  <li <?php //if($menu_tab == 'room_list'){echo 'class="active"';}?>>
						  <a href="<?php //echo $this->uri->baseUri;?>index.php/admhotel/room_list" >
						  <span class="pages-icon"></span>								  
						  Data Kamar
						  </a></li> -->
					  <li <?php if($menu_tab == 'change_password'){echo 'class="active"';}?>>
						  <a href="<?php echo $this->uri->baseUri;?>index.php/admhotel/change_password" >
						  <span class="password-icon"></span>							  
						  Change password
						  </a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<!-- LEFT MENU -->
					
				<!-- RIGHT CPNTENT -->
				<div class="col-md-11 offset-0">
					<!-- Tab panes from left menu -->
					<div class="tab-content5">
					
					  <!-- TAB Profile -->
					  <?php $this->output($konten_page);?>
					  <!-- END OF TAB 1 -->	
					  	
					</div>
					<!-- End of Tab panes from left menu -->	
					
				</div>
				<!-- END OF RIGHT CPNTENT -->
			
			<div class="clearfix"></div><br/><br/>
			</div>
			<!-- END CONTENT -->			
			

			
		</div>
		
		
	</div>
	<!-- END OF CONTENT -->
	

	
	
	<!-- FOOTER -->
	
	<?php $this->output(TEMPLATE.'footer');?>
	
	
	<!-- Javascript  -->
	<script src="<?php echo $this->uri->baseUri.STYLE;?>assets/js/js-profile.js"></script>
	<?php $this->output(TEMPLATE.'footer_script');?>
  </body>
</html>
