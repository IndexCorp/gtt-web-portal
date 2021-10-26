
<?php 
    include_once('config/init.php');
	include_once('config/configuration.php')
?>

<!DOCTYPE html>

<html lang="en">


	<head>
    <base href="<?=BASE_URL?>">
		<meta charset="ANSI">
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta name="author" content="Jthemes"/>	
		<meta name="description" content="Leading Import Export Business Company in Nigeria | 3Timpex"/>
		<meta name="keywords" content="Responsive, HTML5 Template, Jthemes, Courses, Education, Learning, Online Education, Study">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
				
		<!-- SITE TITLE -->
		<title>Leading Import Export Business Company in Nigeria | 3Timpex</title>
		<link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
		
		<!-- FAVICON AND TOUCH ICONS  
		<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
		<link rel="icon" href="images/favicon.ico" type="image/x-icon">
		<link rel="apple-touch-icon" sizes="152x152" href="images/apple-touch-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="120x120" href="images/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="76x76" href="images/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
		<link rel="icon" href="images/apple-touch-icon.png" type="image/x-icon">-->

		<!-- GOOGLE FONTS -->
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">		
		<link href="https://fonts.googleapis.com/css?family=Muli:400,600,700,800,900&amp;display=swap" rel="stylesheet">

		<!-- BOOTSTRAP CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
				
		<!-- FONT ICONS -->
		<link href="https://use.fontawesome.com/releases/v5.11.0/css/all.css" rel="stylesheet" crossorigin="anonymous">		
		<link href="css/flaticon.css" rel="stylesheet">



		
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
  
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">







		<!-- PLUGINS STYLESHEET -->
		<link href="css/menu.css" rel="stylesheet">	
		<link id="effect" href="css/dropdown-effects/fade-down.css" media="all" rel="stylesheet">
		<link href="css/magnific-popup.css" rel="stylesheet">	
		<link href="css/flexslider.css" rel="stylesheet">
		<link href="css/owl.carousel.min.css" rel="stylesheet">
		<link href="css/owl.theme.default.min.css" rel="stylesheet">

		<!-- ON SCROLL ANIMATION -->
		<link href="css/animate.css" rel="stylesheet">

		<!-- TEMPLATE CSS -->
		<link href="css/style.css" rel="stylesheet">

		<!-- RESPONSIVE CSS -->
		<link href="css/responsive.css" rel="stylesheet"> 

	</head>




	<body>




		<!-- PRELOADER SPINNER
		============================================= -->		
		<div id="loader-wrapper">
			<div id="loading">
				<div id="loading-center">
					<div class="cssload-loading"><i></i><i></i><i></i><i></i></div>
				</div>
			</div>
		</div>




		<!-- PAGE CONTENT
		============================================= -->	
		<div id="page" class="page">




			<!-- HEADER
			============================================= -->
			<header id="header" class="header white-menu navbar-dark">
				<div class="header-wrapper">


					<!-- MOBILE HEADER -->
				    <div class="wsmobileheader clearfix">	
				    	<a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>	    	
				    	<span class="smllogo smllogo-black"><img src="images/logo.png" width="172" height="40" alt="mobile-logo"/></span>
				    	<span class="smllogo smllogo-white"><img src="images/logo-white.png" width="172" height="40" alt="mobile-logo"/></span>
				 	</div>


				 	<!-- NAVIGATION MENU -->
				  	<div class="wsmainfull menu clearfix">
	    				<div class="wsmainwp clearfix">


	    					<!-- LOGO IMAGE -->
	    					<!-- For Retina Ready displays take a image with double the amount of pixels that your image will be displayed (e.g 344 x 80 pixels) -->
	    					<div class="desktoplogo"><a href="<?=BASE_URL?>" class="logo-black"><img src="images/logo.png" width="172" height="40" alt="header-logo"></a></div>
	    					<div class="desktoplogo"><a href="<?=BASE_URL?>" class="logo-white"><img src="images/logo-white.png" width="172" height="40" alt="header-logo"></a></div>


	    					<!-- MAIN MENU -->
	      					<nav class="wsmenu clearfix">
	        					<ul class="wsmenu-list">

									<li class="nl-simple" aria-haspopup="true"><a href="<?=BASE_URL?>">Home</a></li>
									<li class="nl-simple" aria-haspopup="true"><a href="<?=BASE_URL?>#about-2">About</a></li>
									<li class="nl-simple" aria-haspopup="true"><a href="category">Course Category</a></li>
						       

								<!--	<li aria-haspopup="true"><a href="#courses-3">Courses <span class="wsarrow"></span></a>
	            						<ul class="sub-menu">
						           			<li aria-haspopup="true"><a href="list">Certificate in Trade Customer Service (CTCS)</a></li>
						           			<li aria-haspopup="true"><a href="list">Certified Basic Trade Professional (CBTP)</a></li>	
						           			<li aria-haspopup="true"><a href="list">Certified Intermediate Trade Professional (CITP)</a></li>				    
						              		<li aria-haspopup="true"><a href="list">Certified Advanced Trade Professionals (CATP)</a></li>
						              		<li aria-haspopup="true"><a href="list">Diploma in Export Trade Finance</a></li>
						              		<li aria-haspopup="true"><a href="list">Diploma in Export Business Management</a></li>
						           		</ul>
								    </li>	-->



                                    	<!-- MEGAMENU -->
						          	<li aria-haspopup="true"><a href="#">Mega Menu <span class="wsarrow"></span></a>
	            						<div class="wsmegamenu clearfix">
	             							<div class="container">
	               								<div class="row">


	               									<!-- MEGAMENU QUICK LINKS -->
													<div class="col-md-12 col-lg-3">

														<!-- Title -->
														<h3 class="title">Top 5 Online Courses:</h3>  

		               									<ul class="link-list clearfix">   
														   <?php 
														 	$get_five = $getFromMain->most_popular_courses_five();
															 
															 foreach($get_five as $get):
														   ?>						                    
										                    <li><a href="course_details/<?=$get->course_id?>"><?=$get->course_name?></a></li>
										                   <?php endforeach; ?>	
										                </ul>

										            </div>	<!-- END MEGAMENU QUICK LINKS -->


									                <!-- MEGAMENU FEATURED NEWS -->
									                <div class="col-md-12 col-lg-5">

									                	<!-- Title -->
									                    <h3 class="title">Featured News:</h3>
														<?php 
														$from = $getFromMain->featured_new();

														
														
														?>
									                    <!-- Image -->
									                    <div class="fluid-width-video-wrapper mb-15"><img src="<?=BASE_URL?>admin/<?=$from->img_url;?>" alt="featured-news" /></div>

									                    <!-- Text -->
									                    <h5 class="h5-md">
									                    	<a href="<?=BASE_URL?>blog/post/<?=$from->url_slug?>"><?=$from->title;?>
										                    </a>
									                    </h5>
									                    <p class="wsmwnutxt"><?=$from->descs;?>...
									                    </p>

														

									                </div>	<!-- END MEGAMENU FEATURED NEWS -->


									                <!-- MEGAMENU LATEST NEWS -->
									                <div class="col-md-12 col-lg-4">

									                	<!-- Title -->
	                    								<h3 class="title">Latest News:</h3>

	                    								<!-- Latest News -->
	                    								<ul class="latest-news">

														<?php 
														 	$get_three = $getFromMain->latest_news_three();
															 
															 foreach($get_three as $gets):
														   ?>						                    
										                   
															<!-- Post #1 -->
															<li class="clearfix d-flex align-items-center">

															<!-- Image -->
															<img class="img-fluid" src="<?=BASE_URL?>admin/<?=$gets->img_url?>" alt="blog-post-preview" />

															<!-- Text -->
															<div class="post-summary">
																<a href="blog/post/<?=$gets->url_slug;?>"><?=$gets->title;?>...</a>
																<p><?=$getFromGeneric->timeAgo($gets->date_created);?></p>
															</div>

															</li>
										                   <?php endforeach; ?>	
										
															
															
														</ul>
	                    							</div>	<!-- END MEGAMENU LATEST NEWS -->

									                
								                </div>  <!-- End row -->	
								            </div>  <!-- End container -->	
								        </div>  <!-- End wsmegamenu -->	
								    </li>	<!-- END MEGAMENU -->



							    	<li class="nl-simple" aria-haspopup="true"><a href="blog/home/">News</a></li>
									<li class="nl-simple" aria-haspopup="true"><a href="store/home/">Store</a></li>



							    	<li class="nl-simple" aria-haspopup="true"><a href="contact">Contacts</a></li>


								    <!-- DROPDOWN MENU -->
						          	<li aria-haspopup="true">
										<a href="auth" class="btn btn-md btn-rose tra-black-hover" target="_blank">Login/Sign Up</a>
								    </li>	<!-- END DROPDOWN MENU -->


								    <!-- HEADER BUTTON 
								    <li class="nl-simple" aria-haspopup="true">
								    	<a href="#" class="btn btn-rose tra-black-hover last-link">Get Started</a>
								    </li> -->


	        					</ul>
	        				</nav>	<!-- END MAIN MENU -->

	    				</div>
	    			</div>	<!-- END NAVIGATION MENU -->


				</div>     <!-- End header-wrapper -->
			</header>	<!-- END HEADER -->

