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
								    	<li class="breadcrumb-item"><a href="<?=BASE_URL;?>">Home</a></li>
								    	<li class="breadcrumb-item active" aria-current="page">Reviews</li>
								  	</ol>
								</nav>
							</div> 

						</div>	 <!-- End row -->
					</div>	<!-- End container -->		
				</div>	<!-- END BREADCRUMB -->	




				<!-- TESTIMONIALS-2
				============================================= -->
				<section id="reviews-2" class="wide-60 reviews-section division">
					<div class="container">
						<div class="row">
							<div class="col-md-12 reviews-grid">
								<div class="masonry-wrap grid-loaded">

                                <?php 

                                    if(isset($_GET['reviews'])){
                                    
                                            $limit = 10;
                                        if($_GET['reviews'] == 0){
                                                $page = 1;
                                            $offset = (($page - 1)* $limit );
                                        }else{
                                            $page = $_GET['reviews'];
                                            $offset = (($page - 1)* $limit );
                                        }

                                        $cur =  $paginations =$getFromCourse->pagination_lower('reviews', $offset, $limit);

                                        $lower = ($page - 1) * $limit + $cur;
                                        $uper = $getFromCourse->pagination_count('reviews');


                                        
                                        
                                        $paginations =$getFromCourse->pagination('reviews', $offset, $limit);
                                        if(!empty($paginations)){
                                        foreach($paginations as $data):
                                            $user = $getFromGeneric->get_single('user', $data->student_id);
                                             $course = $getFromGeneric->get_single('courses', $data->course_id);
                                    
                                    ?>



									<!-- TESTIMONIAL #1 -->
									<div class="review-2 masonry-item">
										<div class="review-2-txt">

											<!-- Text -->
											<p><?=$data->comment;?>
											</p>

											<!-- Author Data -->									
											<div class="review-2-author d-flex align-items-center">

												<!-- Author Avatar -->
												<div class="author-avatar">
													<img class="img-fluid" src="<?BASE_URL?>/admin/<?$student->avatar?>" alt="review-author-avatar" />
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
											
													<h5 class="h5-xs"><?=$student->firstname.' '.$student->surname;?>.</h5>	
													<span><?=$course->course_abrev;?> Student</span>
												</div>

											</div>
							
										</div>						
									</div>	<!--END  TESTIMONIAL #1 -->
                                            
                                            <?php endforeach;}else{ ?>
											<h2>No Course Available</h2>
											<?php }}?>

									

								</div>
							</div>									
						</div>	   <!-- End row --> 
					</div>	    <!-- End container -->
				</section>	 <!-- END TESTIMONIALS-2 -->




				<!-- PAGE PAGINATION
				============================================= -->
				<div class="page-pagination division">
					<div class="container">
						<div class="row">	
							<div class="col-md-12">
                            <nav aria-label="Page navigation">
									<ul class="pagination justify-content-center">
									
                            <?php 
                                    if($page == 1){

                                 
                                ?>
                                 <?php }else{
                                        ?> 

                            <a href="student/student_courses/<?=$page - 1?>" class=""><i class="material-icons float-left">arrow_backward</i></a>
                                 <li class="page-item disabled"><a class="page-link" href="reviews/<?=$page - 1?>" tabindex="-1"><i class="fas fa-angle-left"></i> Previous</a></li>
									    <li class="page-item active"><a class="page-link" href="#">Previous<span class="sr-only">(current)</span></a></li>
									   
                            <?php }?>
                              <?=$lower;?> <span class=" text-center text-black"> &nbsp;&nbsp;&nbsp;of &nbsp;&nbsp;&nbsp; <?=$uper;?></span>
                                
                              
                                 <?php 
                                    if($lower == $uper){

                                 
                                ?>
                                    <?php }else{
                                        ?> 
                                           <li class="page-item"><a class="page-link" href="reviews/<?=$page + 1?>"><i class="fas fa-angle-right"></i> </a></li>
								
                                      
                                        <?php }?>
                                        </ul>	
								</nav>

							<!--	<nav aria-label="Page navigation">
									<ul class="pagination justify-content-center">
										<li class="page-item disabled"><a class="page-link" href="#" tabindex="-1"><i class="fas fa-angle-left"></i></a></li>
									    <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
									    <li class="page-item"><a class="page-link" href="">.</a> </li>
									    <li class="page-item"><a class="page-link" href="">.</a></li>
									    <li class="page-item"><a class="page-link" href="#">4</a></li>
									    <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-right"></i></a></li>
									</ul>	
								</nav>	-->				

							</div>
						</div>  <!-- End row -->	
					</div> <!-- End container -->	
				</div>	<!-- END PAGE PAGINATION -->




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




				<!-- FOOTER-2
				============================================= -->
				<footer id="footer-2" class="footer division">
					<div class="container">


						<!-- FOOTER CONTENT -->
						<div class="row">


							<!-- FOOTER INFO -->
							<div class="col-md-5 col-lg-5 col-xl-4">
								<div class="footer-info mb-40">

									<!-- Footer Logo -->
									<!-- For Retina Ready displays take a image with double the amount of pixels that your image will be displayed (e.g 344 x 80 pixels) -->
									<img src="images/logo.png" width="172" height="40" alt="footer-logo">

									<!-- Text -->	
									<p>Aliquam orci a nullam tempor sapien gravida donec enim ipsum porta justo velna an auctor 
									   undo congue magna laoreet augue sapien
									</p>
								
								</div>	
							</div>	


							<!-- FOOTER PRODUCTS LINKS -->
							<div class="col-md-3 col-lg-3 col-xl-2">
								<div class="footer-links mb-40">
								
									<!-- Title -->
									<h5 class="h5-md">Quick Links</h5>

									<!-- Footer Links -->
									<ul class="foo-links clearfix">
										<li><a href="about.html">About eTreeks</a></li>
										<li><a href="categories-list.html">Courses Catalog</a></li>
										<li><a href="reviews.html">Our Testimonials</a></li>
										<li><a href="pricing.html">Premium Learning</a></li>
										<li><a href="blog-listing.html">From the Blog</a></li>								
									</ul>

								</div>
							</div>


							<!-- FOOTER COMPANY LINKS -->
							<div class="col-md-4 col-lg-4 col-xl-3">
								<div class="footer-links mb-40">
								
									<!-- Title -->
									<h5 class="h5-md">Popular Categories</h5>

									<!-- Footer Links -->
									<ul class="clearfix">
										<li><a href="#">Business English</a></li>
										<li><a href="#">Software Development</a></li>
										<li><a href="#">Finance & Accounting</a></li>
										<li><a href="#">Health and Fitness</a></li>
										<li><a href="#">Office Productivity</a></li>				
									</ul>

								</div>
							</div>


							<!-- FOOTER NEWSLETTER FORM -->
							<div class="col-md-7 col-xl-3">
								<div class="footer-form mb-20">

									<!-- Title -->
									<h5 class="h5-md">Stay in Touch</h5>

									<!-- Newsletter Form Input -->
									<form class="newsletter-form">
												
										<div class="input-group">
											<input type="email" autocomplete="off" class="form-control" placeholder="Your Email Address" required id="s-email">								
											<span class="input-group-btn">
												<button type="submit" class="btn btn-rose tra-rose-hover">Subscribe</button> 
											</span>
										</div>

										<!-- Newsletter Form Notification -->		
										<label for="s-email" class="form-notification"></label>
													
									</form>
															
								</div>
							</div>	<!-- END FOOTER NEWSLETTER FORM -->


						</div>	  <!-- END FOOTER CONTENT -->

			
						<!-- BOTTOM FOOTER -->
						<div class="bottom-footer">
							<div class="row">


								<!-- FOOTER COPYRIGHT -->
								<div class="col-lg-8">
									<ul class="bottom-footer-list">
										<li><p>&copy; Copyright eTreeks 2020</p></li>
										<li><p><a href="tel:123456789">508.746.9892</a></p></li>
										<li><p class="last-li"><a href="mailto:yourdomain@mail.com">hello@domain.com</a></p></li>
									</ul>
								</div>


								<!-- FOOTER SOCIALS LINKS -->
								<div class="col-lg-4 text-right">
									<ul class="foo-socials text-center clearfix">

										<li><a href="#" class="ico-facebook"><i class="fab fa-facebook-f"></i></a></li>
										<li><a href="#" class="ico-twitter"><i class="fab fa-twitter"></i></a></li>	
										<li><a href="#" class="ico-google-plus"><i class="fab fa-google-plus-g"></i></a></li>
										<li><a href="#" class="ico-tumblr"><i class="fab fa-tumblr"></i></a></li>			
																																				
										<!--
										<li><a href="#" class="ico-behance"><i class="fab fa-behance"></i></a></li>	
										<li><a href="#" class="ico-dribbble"><i class="fab fa-dribbble"></i></a></li>									
										<li><a href="#" class="ico-instagram"><i class="fab fa-instagram"></i></a></li>	
										<li><a href="#" class="ico-linkedin"><i class="fab fa-linkedin-in"></i></a></li>
										<li><a href="#" class="ico-pinterest"><i class="fab fa-pinterest-p"></i></a></li>								
										<li><a href="#" class="ico-youtube"><i class="fab fa-youtube"></i></a></li>										
										<li><a href="#" class="ico-vk"><i class="fab fa-vk"></i></a></li>
										<li><a href="#" class="ico-yelp"><i class="fab fa-yelp"></i></a></li>
										<li><a href="#" class="ico-yahoo"><i class="fab fa-yahoo"></i></a></li>
									    -->	

									</ul>
								</div>


							</div>
						</div>	<!-- END BOTTOM FOOTER -->


					</div>	   <!-- End container -->										
				</footer>	<!-- END FOOTER-2 -->




			</div>	<!-- END INNER PAGE WRAPPER -->
