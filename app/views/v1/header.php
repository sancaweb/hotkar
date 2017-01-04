<head>
  	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $title;?></title>
	
    <!-- Bootstrap -->
    <link href="<?php echo $this->uri->baseUri;?>style/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="<?php echo $this->uri->baseUri.STYLE;?>assets/css/custom.css" rel="stylesheet" media="screen">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
	
    <!-- Fonts -->	
	<link href='http://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:700,400,300,300italic' rel='stylesheet' type='text/css'>	
	 <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--[if lt IE 7]><link rel="stylesheet" type="text/css" href="assets/css/font-awesome-ie7.css" media="screen" /><![endif]-->
	
    <!-- REVOLUTION BANNER CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="<?php echo $this->uri->baseUri.STYLE;?>css/fullscreen.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?php echo $this->uri->baseUri.STYLE;?>rs-plugin/css/settings.css" media="screen" />
	
    <!-- Picker UI-->
	<!--
	<link rel="stylesheet" type="text/css" media="all" href="<?php //echo $this->uri->baseUri.STYLE;?>assets/css/jquery-ui.css" /> -->
	
	<link rel="stylesheet" type="text/css" media="all"
      href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css"/>
	
	<!-- jQuery -->	
		<script src="<?php echo $this->uri->baseUri.STYLE;?>assets/js/jquery.v2.0.3.js"></script>
	<!-- Picker UI-->	
	<script src="<?php echo $this->uri->baseUri.STYLE;?>assets/js/jquery-ui.js"></script>
	
	<!-- Carousel -->
	<link href="<?php echo $this->uri->baseUri.STYLE;?>carousel/carousel.css" rel="stylesheet">
	<!-- Halaman list -->
	<?php if(isset($page)){
		if($page=='detail_hotel'){
			?>
	<!-- responsive slide -->
	<link rel="stylesheet" href="<?php echo $this->uri->baseUri;?>style/ResponsiveSlides/responsiveslides.css">
	<script type="text/javascript" src="<?php echo $this->uri->baseUri;?>style/ResponsiveSlides/responsiveslides.min.js"></script>
		
		<script>
		var responslide=jQuery;
				responslide.noConflict();
		  responslide(function() {
		   responslide(".rslides").responsiveSlides({
				auto: false,
				pager: true,
				speed: 300,
				//maxwidth: 200
			  });
		  });
		</script>
	<!-- New Carousel -->
	<link rel="stylesheet" type="text/css" href="<?php echo $this->uri->baseUri.STYLE;?>new_carousel/new_carousel.css" media="screen" />
	<!-- END Carousel -->
	
	<!-- bin/jquery.slider.min.css -->
	<link rel="stylesheet" href="<?php echo $this->uri->baseUri.STYLE;?>plugins/jslider/css/jslider.css" type="text/css">
	<link rel="stylesheet" href="<?php echo $this->uri->baseUri.STYLE;?>plugins/jslider/css/jslider.round-blue.css" type="text/css">
	<link rel="stylesheet" href="<?php echo $this->uri->baseUri.STYLE;?>plugins/jslider/css/jslider.round.css" type="text/css">
		<!-- bin/jquery.slider.min.js -->
	<script type="text/javascript" src="<?php echo $this->uri->baseUri.STYLE;?>plugins/jslider/js/jshashtable-2.1_src.js"></script>
	<script type="text/javascript" src="<?php echo $this->uri->baseUri.STYLE;?>plugins/jslider/js/jquery.numberformatter-1.2.3.js"></script>
	<script type="text/javascript" src="<?php echo $this->uri->baseUri.STYLE;?>plugins/jslider/js/tmpl.js"></script>
	<script type="text/javascript" src="<?php echo $this->uri->baseUri.STYLE;?>plugins/jslider/js/jquery.dependClass-0.1.js"></script>
	<script type="text/javascript" src="<?php echo $this->uri->baseUri.STYLE;?>plugins/jslider/js/draggable-0.1.js"></script>
	<script type="text/javascript" src="<?php echo $this->uri->baseUri.STYLE;?>plugins/jslider/js/jquery.slider.js"></script>
	<?php }
	
		if($page=='booking_form'){
			?>
			<!-- Animo css-->
	<link href="<?php echo $this->uri->baseUri.STYLE;?>plugins/animo/animate+animo.css" rel="stylesheet" media="screen">
			<?php
		}
	} ?>
	
	<?php
		if($page=='info_pembayaran' || $page=='finish_booking'){
			?>
			<link rel="stylesheet" type="text/css" href="<?php echo $this->uri->baseUri;?>style/countdown/css/jquery.countdown.css"> 
			<script type="text/javascript" src="<?php echo $this->uri->baseUri;?>style/countdown/js/jquery.plugin.min.js"></script> 
			<script type="text/javascript" src="<?php echo $this->uri->baseUri;?>style/countdown/js/jquery.countdown.min.js"></script>
			<script type="text/javascript" src="<?php echo $this->uri->baseUri;?>style/countdown/js/jquery.countdown-id.js"></script>
			<?php
			
			}?>
			<?php
				if(isset($book_date)){
					 if($book_date){
						 $book_datenya=$book_date;
						 $date_create=date_create($book_datenya);
						 
						 $book_date_format=date_format($date_create, 'F d, Y H:i:s');
						 
						 $date_time=new DateTime($book_date_format);
						 $date_modify=date_modify($date_time, "+1 hour");
						 $date_for_count=date_format($date_modify, 'F d, Y H:i:s');
						 $waktu_sekarang=date('F d, Y H:i:s');
						 
						 if($date_for_count < $waktu_sekarang){
							 $date_count='';
						 }else{
							 $date_count=$date_for_count;							 
							 if($page=='info_pembayaran'){
								?>
								<script>
								var countwak=jQuery;
									countwak.noConflict();
								countwak(document).ready(function() {
									var austDay = new Date("<?php echo $date_count;?>");
								countwak('#waktu_mundur').countdown({
									until: austDay, 
									layout: '<div class="itemc"><p>{hn}</p> <span>-{hl}-</span></div> <div class="itemc"><p>{mn}</p> <span>-{ml}-</span></div> <div class="itemc"><p>{sn}</p> <span>-{sl}-</span></div>',
									onExpiry: liftOff				
									});
								
								
								function liftOff() {
										countwak("#button_konfirmasi").replaceWith('<a id="button_konfirmasi" class="center btn-danger margtop20 btn-block">Mohon maaf, batas waktu pembayaran anda sudah habis. <br/>Silahkan ulangi kembali pemesanan.!</a>');
									}
								
								});
								</script>
								
								<?php
							}
						 }	
					 }
					 }
					 if($page=='finish_booking'){
						 $this->output(TEMPLATE.'js/js_finish_booking');
							}
					 
					 //Cek Pemesanan
					 if($page=='cek_pemesanan'){
						 ?>
						  <link href="<?php echo $this->uri->baseUri.STYLE;?>assets/css/style01.css" rel="stylesheet" media="screen">
						<!-- Masonry -->
						<link href="<?php echo $this->uri->baseUri.STYLE;?>assets/css/masonry.css" rel="stylesheet">
						<script src="<?php echo $this->uri->baseUri.STYLE;?>assets/js/masonry.pkgd.js"></script>
						<script>
						// http://masonry.desandro.com/masonry.pkgd.js added as external resource

						docReady( function() {

						  var container = document.querySelector('.masonry');
						  var button = document.querySelector('#toggle-button');
						  var msnry = new Masonry( container, {
							columnWidth: 2
						  });

						  var isActive = true;

						  eventie.bind( button, 'click', function() {
							if ( isActive ) {
							  msnry.destroy();
							} else {
							  msnry = new Masonry( container );
							}
							isActive = !isActive;
						  });

						});
						//@ sourceURL=pen.js
						</script>
						<?php
					 }
					 if($page=='admhotel'){
						 ?>
						 <!-- Select2 -->
						<link rel="stylesheet" href="<?php echo $this->uri->baseUri.ADM_STYLE;?>plugins/select2/select2.css">
						 <script src='<?php echo $this->uri->baseUri;?>style/tinymce/tinymce.min.js'></script>
						 <script>
	  tinymce.init({
		  relative_urls: false,
			remove_script_host : false,
		selector: '#mytextarea,#mytextarea_edit',
		  theme: 'modern',
		  height:300,
		  plugins: [
			'advlist autolink lists link image charmap print preview hr anchor pagebreak',
			'searchreplace wordcount visualblocks visualchars code fullscreen',
			'insertdatetime media nonbreaking save table contextmenu directionality',
			'emoticons template paste textcolor colorpicker textpattern imagetools responsivefilemanager'
		  ],
		  toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
		  toolbar2: 'print preview media | forecolor backcolor emoticons',
		  image_advtab: true,
		  templates: [
			{ title: 'Test template 1', content: 'Test 1' },
			{ title: 'Test template 2', content: 'Test 2' }
		  ],
		  content_css: [
			'//www.tinymce.com/css/codepen.min.css'
		  ],
		  external_filemanager_path:"<?php echo $this->uri->baseUri;?>assets/filemanager/filemanager/",
			filemanager_title:"Responsive Filemanager" ,
			external_plugins: { "filemanager" : "<?php echo $this->uri->baseUri;?>assets/filemanager/filemanager/plugin.min.js"},
			
	  });
	  </script>
	  <!-- lightbox -->
		<link href="<?php echo $this->uri->baseUri;?>style/lightbox/css/lightbox.min.css" rel="stylesheet"/>
						 <?php
					 }
				?>
	
			
  </head>