<!DOCTYPE html>
<html>
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login User</title>
	
	<!-- Bootstrap -->
	<link href="<?php echo $this->uri->baseUri.STYLE;?>dist/css/bootstrap.css" rel="stylesheet" media="screen">
	<link href="<?php echo $this->uri->baseUri.STYLE;?>assets/css/custom.css" rel="stylesheet" media="screen">

	<!-- Animo css-->
	<link href="<?php echo $this->uri->baseUri.STYLE;?>plugins/animo/animate+animo.css" rel="stylesheet" media="screen">
	
	<link href="<?php echo $this->uri->baseUri.STYLE;?>carousel/carousel.css" rel="stylesheet">
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="assets/js/html5shiv.js"></script>
	  <script src="assets/js/respond.min.js"></script>
	<![endif]-->
	
	<!-- Fonts -->	
	<link href='http://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:700,400,300,300italic' rel='stylesheet' type='text/css'>	
	<!-- Font-Awesome -->
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" media="screen" />
	<!--[if lt IE 7]><link rel="stylesheet" type="text/css" href="assets/css/font-awesome-ie7.css" media="screen" /><![endif]-->
	
	<!-- Load jQuery -->
	<script src="<?php echo $this->uri->baseUri.STYLE;?>assets/js/jquery.v2.0.3.js"></script>


	

  </head>
  <body>
	<!-- 100% Width & Height container  -->
	<div class="login-fullwidith">
		
		<!-- Login Wrap  -->
		<div class="login-wrap">
			<img src="<?php echo $this->uri->baseUri.STYLE;?>images/logo.png" class="login-img" alt="logo"/><br/>
			<div class="login-c1">
				<div class="cpadding50">
				<form data-toggle="validator" enctype="multipart/form-data" role="form" method="POST" action="<?php echo $this->uri->baseUri;?>index.php/holog/pro_log">
					<input name="username" autocomplete="off" type="text" class="form-control input-lg " placeholder="Username" required>
					<br/>
					<input name="password" type="password" class="form-control input-lg " placeholder="Password" required>
					<div class="line4"></div>
					<div class="col-md-7">
					<label class="size26"><?php echo $bil1.' '.$operatornya.' '.$bil2.' =';?></label>
					</div>
					<div class="col-md-5">
					<input name="hasil_isi" type="text" class="form-control input-lg" required>
					<input name="bil1" type="hidden" value="<?php echo $bil1;?>">
					<input name="operatornya" type="hidden" value="<?php echo $operatornya;?>">
					<input name="bil2" type="hidden" value="<?php echo $bil2;?>">
					</div>
					<div class="clearfix"></div>
					<div class="line4"></div>
				</div>				
				<div class="alignbottom">
					<button type="submit" class="btn-search4"  type="submit" >Submit</button>							
					
				</div>
				</form>
				
				<div class="login-c3">
				<div class="left"><a href="#" class="whitelink"><span></span>Website</a></div>
				<div class="right"><a href="#" class="whitelink">Lost password?</a></div>
				</div>	
			</div> <!-- END Login-c1 -->
				
		</div>
		<!-- End of Login Wrap  -->
	
	</div>	
	<!-- End of Container  -->

	<!-- Javascript  -->
	<script src="<?php echo $this->uri->baseUri.STYLE;?>assets/js/initialize-loginpage.js"></script>
	<script src="<?php echo $this->uri->baseUri.STYLE;?>assets/js/jquery.easing.js"></script>
	<!-- Load Animo -->
	<script src="<?php echo $this->uri->baseUri.STYLE;?>plugins/animo/animo.js"></script>
	
	<script>
	<?php 
	if(isset($animo)){
	if($animo=='on'){?>	
	$( document ).ready(function() {
		$('.login-wrap').animo( { animation: 'tada' } );
	});
	</script>
	<?php }else{
		
	}}?>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="<?php echo $this->uri->baseUri.STYLE;?>dist/js/bootstrap.min.js"></script>
  </body>
</html>