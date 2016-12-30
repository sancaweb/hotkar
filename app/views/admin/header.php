<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $subtitle.' || '.$title;?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo $this->uri->baseUri;?>style/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo $this->uri->baseUri.ADM_STYLE;?>plugins/select2/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $this->uri->baseUri.ADM_STYLE;?>dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo $this->uri->baseUri.ADM_STYLE;?>dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<?php
		if($page=='hotel' || $page=='kamar'){
			?>
			<script src='<?php echo $this->uri->baseUri;?>style/tinymce/tinymce.min.js'></script>
	<!-- <script src='//cdn.tinymce.com/4/tinymce.min.js'></script> -->
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
			
			<?php
		}
	?>
	<!-- lightbox -->
		<link href="<?php echo $this->uri->baseUri;?>style/lightbox/css/lightbox.min.css" rel="stylesheet"/>
  </head>