<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
	  <!-- Sidebar user panel -->
	  <div class="user-panel">
		<div class="pull-left image">
		  <img src="<?php echo $this->uri->baseUri.ADM_STYLE;?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
		</div>
		<div class="pull-left info">
		  <p>Alexander Pierce</p>
		  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
		</div>
	  </div>
	  <!-- search form -->
	  <form action="#" method="get" class="sidebar-form">
		<div class="input-group">
		  <input type="text" name="q" class="form-control" placeholder="Search...">
		  <span class="input-group-btn">
			<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
		  </span>
		</div>
	  </form>
	  <!-- /.search form -->
	  <!-- sidebar menu: : style can be found in sidebar.less -->
	  <ul class="sidebar-menu">
		<li class="header">MAIN NAVIGATION</li>
		<li <?php if($page=='home'){echo 'class="active"';}?>>
		  <a href="<?php echo $this->uri->baseUri;?>index.php/adm_home">
			<i class="fa fa-dashboard"></"></i> <span>Dashboard</span> <small class="label pull-right bg-green">new</small>
		  </a>
		</li>
		<li <?php if($page=='hotel'){echo 'class="active"';}?>>
		  <a href="<?php echo $this->uri->baseUri;?>index.php/adm_hotel">
			<i class="fa fa-university"></"></i> <span>Data Hotel</span> 
			<small class="label pull-right bg-green">new</small>
		  </a>
		</li>
		<li <?php if($page=='kamar'){echo 'class="active"';}?>>
		  <a href="<?php echo $this->uri->baseUri;?>index.php/adm_hotel/kamar">
			<i class="fa fa-bed"></"></i> <span>Data Kamar</span> <small class="label pull-right bg-green">new</small>
		  </a>
		</li>
		
		<li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
		<li class="header">LABELS</li>
		<li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
		<li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
		<li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
	  </ul>
	</section>
	<!-- /.sidebar -->
  </aside>