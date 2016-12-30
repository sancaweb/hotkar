<div class="navbar-wrapper2 navbar-fixed-top">
      <div class="container">
		<div class="navbar mtnav">

			<div class="container offset-3">
			  <!-- Navigation-->
			  <div class="navbar-header">
				<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
				 <i class="fa fa-align-justify" aria-hidden="true"></i> Menu
				</button>
				
			  </div>
			  <a href="<?php echo $this->uri->baseUri;?>" class="navbar-brand">
				<img src="<?php echo $this->uri->baseUri.STYLE;?>images/logo2.png" alt="Travel Agency Logo" class="logo"/>
				</a>
			  <div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right" style="font-size:1.2em;">
				  <li <?php if($menu=='home'){echo 'class="active"';} ?>><a href="<?php echo $this->uri->baseUri;?>">Home</a></li>
				  <li <?php if($menu=='hotel'){echo 'class="active"';} ?>><a href="<?php echo $this->uri->baseUri;?>index.php/hotel">Hotel</a></li>
				  
				  <li <?php if($menu=='cek_pemesanan'){echo 'class="active"';} ?>><a href="<?php echo $this->uri->baseUri;?>index.php/booking/cek_pemesanan">Cek Pemesanan</a></li>
				  <?php 
					if($this->session->getValue('id_user')){
						?>
						<li><a href="<?php echo $this->uri->baseUri;?>index.php/holog/logout">Logout</a></li>
						<li><a href="<?php echo $this->uri->baseUri;?>index.php/admhotel">Admin Panel</a></li>
						
						<?php
					}else{
					}
				  ?>
				  
				  <!--
				  <li><a href="#">Daftar</a></li> -->
					<!--
				  <li class="dropdown">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">Akun<b class="lightcaret mt-2"></b></a>
					<ul class="dropdown-menu">
					  <li class="dropdown-header">Aligned Right Dropdown</li>	
					  <li><a href="#">Sample Link 1</a></li>
					  <li><a href="#">Sample Link 2</a></li>
					</ul>
				  </li>	 -->
				</ul>
			  </div>
			  <!-- /Navigation-->			  
			</div>
		
        </div>
      </div>
    </div>