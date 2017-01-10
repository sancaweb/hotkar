<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Coming Soon Project</title>
     <!--REQUIRED STYLE SHEETS-->
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLE CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <!-- VEGAS STYLE CSS -->
    <link href="assets/scripts/vegas/jquery.vegas.min.css" rel="stylesheet" />
       <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet" />
     <!-- GOOGLE FONT -->
     <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
     <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    </head>
<body>

    <div class="loader"></div>

    <!-- MAIN CONTAINER -->
    <div class="container-fluid">
        <!-- NAVBAR SECTION -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://sanca.web.id" target="_blank">Sancaweb Development Indonesia On Project </a>
        </div>
        <div class="navbar-collapse collapse"><!--
          <ul class="nav navbar-nav navbar-right">
            <li ><a data-toggle="modal" data-target="#mAbout" href="#mHome"> ABOUT</a></li>
            <li><a data-toggle="modal" data-target="#mService" href="#mService">SERVICES</a></li>
            <li><a data-toggle="modal" data-target="#mContact" href="#myModal">CONTACT</a></li>
          </ul> -->
        </div>         
      </div>
    </div>
     <!-- END NAVBAR SECTION -->

         <!-- MAIN ROW SECTION -->
         <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-12">
                <div id="movingicon">
                      <i class="fa fa-globe fa-spin icon-color"></i>
                    <br />   
                  <div id="headLine"></div>   
                </div>              
            </div>
             <!--/. HEAD LINE DIV-->
            <div class="col-md-8 col-md-offset-2" >
                <div id="counter"></div>
                        <div id="counter-default" class="row">
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="inner">
                                    <div id="day-number" class="timer-number"></div>
                                    <div class="timer-text">HARI</div>
                                   
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="inner">
                                    <div id="hour-number" class="timer-number"></div>
                                    <div class="timer-text">JAM</div>
                                    
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="inner">
                                    <div id="minute-number" class="timer-number"></div>
                                    <div class="timer-text">MENIT</div>
                                  
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="inner">
                                    <div id="second-number" class="timer-number"></div>
                                    <div class="timer-text">DETIK</div>

                                   

                                </div>
                            </div>
                        </div>
                
            </div>
               <!--/. COUNTER DIV-->
           <!--  <div class="col-md-6 col-md-offset-3">    
               
               <div class="input-group">    
      <input type="text" class="form-control">
			  <span class="input-group-btn">
        <button class="btn btn-primary" type="button">  <i class="fa fa-cog fa-spin subscribe-icon"></i> SUBSCRIBE ! </button>
      </span>
    </div>       
                   </div>
             <!--/. SUBSCRIBE DIV-->
            <div class="col-md-6 col-md-offset-3">
                 <div class="social-links" >
                     <a href="https://www.facebook.com/SancawebIndonesia/" >  <i class="fa fa-facebook fa-4x"></i> </a>
                      <a href="https://plus.google.com/+sancasnake" >  <i class="fa fa-google-plus fa-4x"></i> </a>
                      <!--
					  <a href="#" >  <i class="fa fa-twitter fa-4x"></i> </a>
                      <a href="#" >  <i class="fa fa-linkedin fa-4x"></i> </a> -->
                      
                     </div>
            </div>
               <!--/. SOCIAL DIV-->
         </div>
     <!--END MAIN ROW SECTION -->
    </div>
      <!-- MAIN CONTAINER END -->
	  <?php include 'about_modal.php';?>	  
     <!--/. ABOUT MODAL POPUP DIV-->
	 
	  <?php include 'service_modal.php';?>	   
     <!--/. SERVICES MODAL POPUP DIV-->
	 
	  <?php include 'contact_modal.php';?>	    
    <!--/. CONTACT MODAL POPUP DIV-->
	
     <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
     <!-- CORE JQUERY  -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
     <!-- BOOTSTRAP CORE SCRIPT   -->
    <script src="assets/plugins/bootstrap.js"></script>
    <!-- COUNTDOWN SCRIPTS -->
    <script src="assets/plugins/jquery.countdown.js"></script>
    <script src="assets/js/countdown.js"></script>
    <!-- VEGAS SLIDESHOW SCRIPTS -->
    <script src="assets/plugins/vegas/jquery.vegas.min.js"></script>
     <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
     
</body>
</html>
