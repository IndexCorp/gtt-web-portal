	<!-- INNER PAGE WRAPPER
			============================================= -->	
			<div class="inner-page-wrapper">




				<!-- BREADCRUMB
				============================================= -->
				<div id="breadcrumb" class="division">
					<div class="container">
						<div class="row">

							<!-- BREADCRUMB NAV -->
							<div class="col-md-12">
								<nav aria-label="breadcrumb">
								  	<ol class="breadcrumb">
								    	<li class="breadcrumb-item"><a href="<?=BASE_URL?>">Home</a></li>
								    	<li class="breadcrumb-item active" aria-current="page">Course Categories</li>
								  	</ol>
								</nav>
							</div> 

						</div>	 <!-- End row -->
					</div>	<!-- End container -->		
				</div>	<!-- END BREADCRUMB -->	




				<!-- PAGE HERO
				============================================= -->	
				<section class="bg-05 page-hero-section division">
					<div class="container">	
						<div class="row">	
							<div class="col-md-12">
								<div class="hero-txt white-color">

									<!-- Title -->
									<h3 class="h3-xs">Course Categories</h3>

									<!-- Share Icons -->
									<div class="share-list">
										<ul class="share-social-icons text-center clearfix">
											<li><p><span><?=$getFromGeneric->get_count('courses');?> courses</span> found in <span><?=$getFromGeneric->get_count('course_category');?>  categories</span><p></li>					
											<li><a href="#" class="share-ico ico-facebook"><i class="fab fa-facebook-f"></i></a></li>
											<li><a href="#" class="share-ico ico-twitter"><i class="fab fa-twitter"></i></a></li>
											<li><a href="mailto:yourdomain@mail.com" class="share-ico ico-mail"><i class="far fa-envelope"></i></a></li>
											<!--<li><a href="#" class="share-ico ico-bookmark"><i class="far fa-bookmark"></i> 54.2k</a></li>	-->		
										</ul>
									</div>

									<!-- Text -->
									<p><span><?=$getFromGeneric->get_count('user', 'status', 'student');?>  students</span> are learning online on Global Trade</p>

								</div>
							</div>	<!-- END PAGE HERO TEXT -->
						</div>    <!-- End row --> 
					</div>	   <!-- End container --> 
				</section>	<!-- END PAGE HERO -->	




				<!-- CATEGORIES-2
				============================================= -->
				<section id="categories-2" class="wide-70 categories-section division">
					<div class="container">
						<div class="row">

						<?php 
							$get_cats = $getFromGeneric->get_multi('course_category');
							foreach($get_cats as $get_cat):
						?>
							<!-- CATEGORIE BOX  -->
							<div class="col-sm-6 col-lg-3 col-xl-2">
								<a href="course_cat/<?=$get_cat->id;?>">
									<div class="c2-box text-center">

										<!-- Icon --> 
										<img class="img-70" src="<?=BASE_URL?>/admin/<?=$get_cat->avatar;?>" alt="category-icon" />

										<!-- Text --> 
										<h5 class="h5-sm"><?=$get_cat->cat_name;?></h5>
										<p><?=$getFromGeneric->get_count_where('courses','cat_id',$get_cat->id);?> Courses</p>

									</div>
								</a>
							</div>	<!-- END CATEGORIE BOX  -->

								<?php endforeach;?>


						</div>    <!-- End row --> 	
					</div>	   <!-- End container --> 	
				</section>	<!-- End CATEGORIES-2 --> 




				<!-- ABOUT-4
				============================================= -->
				<section id="about-4" class="bg-lightgrey wide-70 about-section division">
					<div class="container">
						

						<!-- ABOUT TEXT -->
						<div class="row">	
						 	<div class="col-xl-10 offset-xl-1">
						 		<div class="a4-txt">

						 			<!-- Title -->	
									<h5 class="h5-xl text-center">Our goal is to make online education work for everyone</h5>

									<!-- Text -->
									<p>Sagittis congue augue egestas volutpat egestas magna suscipit egestas magna ipsum vitae purus 
									   efficitur ipsum primis and cubilia laoreet augue egestas luctus donec diam. Curabitur ac dapibus 
									   libero mauris donec ociis and neque. Phasellus blandit tristique justo ut aliquam. Aliquam vitae 
									   molestie nunc sapien justo, aliquet non molestie augue tempor sapien
									</p>  

								</div>
							</div>
						</div> 	<!-- END ABOUT TEXT -->


						<!-- ABOUT IMAGE -->
						<div class="row">	
						 	<div class="col-md-12">
								<div class="img-block">
									<img class="img-fluid" src="images/image-03.jpg" alt="about-image">
								</div>
							</div>
						</div>


						<!-- ABOUT BOXES -->
						<div class="a4-boxes">
							<div class="row d-flex align-items-center">

								<!-- BOX #1 -->		
								<div class="col-md-4">
									<div class="abox-4 icon-sm">

										<!-- Icon --> 
										<span class="flaticon-004-computer"></span>

										<!-- Text -->
										<div class="abox-4-txt">
											<h5 class="h5-lg">Trusted Content</h5>
											<p class="grey-color">Congue augue egestas magna volutpat dictum suscipit ipsum egestas
											   magna vitae purus
											</p>
										</div>

									</div>
								</div>	<!-- END BOX #1 -->	


								<!-- BOX #2 -->		
								<div class="col-md-4">
									<div class="abox-4 icon-sm">

										<!-- Icon --> 
										<span class="flaticon-028-learning-1"></span>

										<!-- Text -->
										<div class="abox-4-txt">
											<h5 class="h5-lg">Certified Teachers</h5>
											<p class="grey-color">Congue augue egestas magna volutpat dictum suscipit ipsum egestas
											   magna vitae purus
											</p>
										</div>

									</div>
								</div>	<!-- END BOX #2 -->	


								<!-- BOX #3 -->		
								<div class="col-md-4">
									<div class="abox-4 icon-sm">

										<!-- Icon --> 
										<span class="flaticon-032-tablet"></span>

										<!-- Text -->
										<div class="abox-4-txt">
											<h5 class="h5-lg">Lifetime Access</h5>
											<p class="grey-color">Congue augue egestas magna volutpat dictum suscipit ipsum egestas
											   magna vitae purus
											</p>
										</div>

									</div>
								</div>	<!-- END BOX #3 -->	


							</div>  <!-- End row --> 
						 </div>	  <!-- END ABOUT BOXES -->


					</div>	   <!-- End container --> 	
				</section>	<!-- End ABOUT-4 --> 




				<!-- PRICING-2
				============================================= -->
				<section id="pricing-2" class="bg-03 wide-60 pricing-section division">
					<div class="container">
						<div class="row d-flex align-items-center">


							<!-- PRICING TEXT -->
							<div class="col-lg-7">
								<div class="pricing-txt pc-25 white-color mb-40">
									
									<!-- Title -->	
									<h3 class="h3-lg">Go Global Trade Premium. Transform your life through online education.</h3>

									<!-- List -->	
									<ul class="txt-list mt-25">

										<li>Sagittis congue augue egestas volutpat egestas magna suscipit egestas magna ipsum vitae 
											purus efficitur ipsum primis and cubilia laoreet
									    </li>
														
										<li>Integer congue magna 1,000 free courses pretium ligula at rutrum risus luctus dolor auctor 
											ipsum blandit purus. Curabitur ac dapibus libero mauris donec ociis and neque. Blandit non 
											molestie sapien tristique justo ut aliquam			
										</li>

										<li>Feugiat 50% off ligula risus auctor egestas an augue mauri viverra tortor in iaculis placerat
										    eugiat mauris ipsum in viverra tortor and gravida
										</li>

									</ul>

								</div>	
							</div>	<!-- END PRICING TEXT -->


							<!-- PRICE PLAN PREMIUM -->
							<div class="col-lg-5">
								<div class="pricing-table">	

									<!-- Plan Price  -->
									<div class="pricing-plan text-center">
										<img class="img-75" src="images/crown.png" alt="price-icon" />
										<h5 class="h5-md">Premium Monthly</h5>	
										<p class="grey-color">For just $11.99 per month, you get:</p>
									</div>	
													
									<!-- Pricing Plan Features -->
									<ul class="features">
										<li>Exclusive Monthly Discounts <span><i class="fas fa-check"></i></span></li>
										<li>Your Discounts Never Expire <span><i class="fas fa-check"></i></span></li>
										<li>Up To 50% Off Your Certification <span><i class="fas fa-check"></i></span></li>						
										<li>High Resolution Videos <span><i class="fas fa-check"></i></span></li>
										<li>Offline Viewing <span><i class="fas fa-check"></i></span></li>
										<li>Uninterrupted Ad-Free Learning <span><i class="fas fa-check"></i></span></li>
										<li>24/7 Premium Support <span><i class="fas fa-check"></i></span></li>
									</ul>

									<!-- Pricing Table Button -->
									<div class="pricing-plan-btn text-center">
										<a href="#" class="btn btn-rose tra-black-hover">Go Premium</a>
									</div>
											
								</div>
							</div>	<!-- END PRICE PLAN PREMIUM -->


						</div>	  <!-- End row -->	
					</div>	   <!-- End container -->
				</section>	<!-- END PRICING-2 -->




				<!-- TESTIMONIALS-1
				============================================= -->
				<section id="reviews-1" class="wide-100 reviews-section division">
					<div class="container">


						<!-- SECTION TITLE -->	
						<div class="row">	
							<div class="col-md-12">
								<div class="section-title mb-60">

									<!-- Title 	-->	
									<h3 class="h3-sm">What Our Students Say</h3>	

									<!-- Text -->	
									<p class="p-md">Aliquam a augue suscipit, luctus neque purus ipsum neque dolor primis libero 
									   tempus, blandit posuere and ligula varius magna a porta
									</p>

									<!-- Button -->
									<div class="title-btn">
										<a href="reviews" class="btn btn-tra-grey rose-hover">Read All Reviews</a>
									</div> 
									
								</div>
							</div>
						</div>

						
						<!-- TESTIMONIALS CONTENT -->
						<div class="row">
							<div class="col-md-12">					
								<div class="owl-carousel owl-theme reviews-holder">

								<?php 
									$reviews = $getFromGeneric->get_reviews();
									foreach($reviews as $review):
										$student = $getFromGeneric->get_single('user', $review->student_id);
								?>
									<!-- TESTIMONIAL #1 -->
									<div class="review-1">

										<!-- Quote Icon -->
										<div class="quote-ico"><img src="images/left-quote.png" alt="quote-image" /></div>

										<!-- Testimonial Text -->
										<p><?=$review->comment;?>				   
										</p>

										<!-- Author Data -->
										<div class="review-1-author d-flex align-items-center">

											<!-- Author Avatar -->
											<div class="author-avatar">
												<img class="img-fluid" src="<?=BASE_URL;?>/admin/<?=$student->avatar;?>" alt="review-author-avatar" />
											</div>

											<!-- Testimonial Author -->
											<div class="review-author">

												<!-- Rating -->
												<div class="tst-rating">
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
												</div>	

												<h5 class="h5-xs"><?=$student->firsname .' '.$student->surname;?>.</h5>	
												<span><?=$student->professionality;?></span>
											</div>

										</div>									
																						
									</div>	<!--END  TESTIMONIAL #1 -->
							
										<?php endforeach;?>
									
								
								</div>
							</div>									
						</div>	<!-- END TESTIMONIALS CONTENT --> 
								
							
					</div>	   <!-- End container -->
				</section>	 <!-- END TESTIMONIALS-1 -->




				<!-- BANNER-3
				============================================= -->
				<section id="banner-3" class="bg-lightgrey bg-map banner-section division">
					<div class="container">
						<div class="banner-3-holder bg-lightdark">
							<div class="row d-flex align-items-center">


								<!-- BANNER IMAGE -->
								<div class="col-lg-8">
									<div class="banner-3-img">
										<img class="img-fluid" src="images/banner-3-img.jpg" alt="banner-image" />
									</div>
								</div>	<!-- END BANNER IMAGE -->


								<!-- BANNER TEXT -->
								<div class="col-lg-4">
									<div class="banner-3-txt white-color">

										<!-- Title -->	
										<h4 class="h4-xs">Learn something new every day with <span>eTreeks</span></h4>

										<!-- Button -->	
										<a href="courses-list.html" class="btn btn-rose tra-white-hover">Find Out More</a>

									</div>
								</div>	<!-- END BANNER TEXT -->


							</div>   <!-- End row -->
						</div>    <!-- End banner-3-holder -->
					</div>	   <!-- End container -->
				</section>	<!-- END BANNER-3 -->




			