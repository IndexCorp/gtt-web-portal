	<?php
	$course_id = $_GET['course_details'];

	$course_details = $getFromCourse->get_singly_g('courses', 'id', $course_id);
	
	?>
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
								    	<li class="breadcrumb-item"><a href="list/">All Courses</a></li>
								    	<li class="breadcrumb-item active" aria-current="page">Course Details</li>
								  	</ol>
								</nav>
							</div> 

						</div>	 <!-- End row -->
					</div>	<!-- End container -->		
				</div>	<!-- END BREADCRUMB -->	



				<!-- COURSE DETAILS
				============================================= -->
				<section id="course-details" class="wide-40 course-section division">
					<div class="container">
						<div class="row">


							<!-- COURSE DESCRIPTION -->
							<div class="col-lg-8">
								<div class="course-txt pr-30">
								
									<!-- Course Title -->
									<h3 class="h3-sm"><?=@$course_details->course_name;?></h3>

									<!-- Course Shot Description -->
									<p class="p-md"><?=@$course_details->descs;?>
									</p>

									<!-- Course Short Data -->
									<p class="course-short-data">
										Created by: Global Trade Team &bull;</p> 
										<p class="course-short-data">	Last updated: <?=@$getFromCourse->timeago($course_details->total_duration);?> &bull; </p>
										
									

									<!-- Course Rating -->
									<div class="course-rating clearfix">
										
									<?php 
                                                $get_rating_count = $getFromCourse->get_count_where('rating', 'course_id', $course_details->id);
                                                $get_sum_rating = $getFromCourse->get_sum_where('rating', 'rating', 'course_id', $course_details->id);
                                                @$total_rating = $get_sum_rating /  $get_rating_count;
                                               // $total_rating = 4.5;

                                                $go = 1;

                                                while($go <= @round($total_rating)){

                                             
                                            ?>
                                               	<i class="fas fa-star"></i>

                                                    <?php  $go +=1;  }?>
											
											
											<span> <?php if($total_rating >=0){
                                                    echo $total_rating;
                                                }else{
                                                    echo 0;
                                                } ;?> (<?=@$get_rating_count;?> Ratings)</span>
									</div>

									<!-- WHAT YOU LEARN -->
									<div class="what-you-learn"><?=@$course_details->long_desc;?></div>	<!-- END WHAT YOU LEARN -->


									<!-- COURSE CONTENT -->
									<div class="cs-content cd-block">

										<!-- Small Title -->
										<h5 class="h5-xl">Course content</h5>

										<!-- Text -->
										<p class="p-md">Level <?=$course_details->level;?> &bull; <?=$getFromCourse->get_count_where('course_content', 'course_id', $course_details->id)?>Lectures &bull; <?=@$course_details->total_duration;?> Hours</p>

										<!-- ACCORDION -->
										<div id="accordion" role="tablist">

										<?php 
											$contents = $getFromCourse->get_single_g('course_content', 'course_id', $course_details->id);
											foreach($contents as $content):
										
										?>

											<!-- CARD #1 -->
						 					<div class="card">

						 						<!-- Card Header -->
											    <div class="card-header" role="tab" id="headingOne<?=$content->id;?>">

											    	<!-- Header Title -->	
											      	<h5 class="h5-xs">
											       		<a data-toggle="collapse" href="#collapseOne<?=$content->id;?>" role="button" aria-expanded="true" aria-controls="collapseOne">
											         		<?=$content->title;?>
											        	</a>
											    	 </h5>

											    	<!-- Header Data -->	
											    	<div class="hdr-data"><p><?=$content->duration?> min</p></div>

											    </div>

											    <!-- Card Body -->
											    <div id="collapseOne<?=$content->id;?>" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
											     	<div class="card-body">

														<!-- List -->
														<p><?=$content->title;?></p>

														<!-- Video link
											      		<p class="cb-video"><a class="video-popup2" href="https://www.youtube.com/watch?v=7e90gBu4pas">
											      			<i class="fas fa-play-circle"></i> Mauris donec ociis magnis sapien
											      		</a></p> -->

											     	</div>
											   	</div>

											</div>	<!-- END CARD #1 -->
											<?php 
											endforeach;
										
										?>


											
											
										</div>	<!-- END ACCORDION -->

									</div>	<!-- END COURSE CONTENT -->


								


									<?php

											@$reviews = $getFromCourse->get_single_g('reviews', 'course_id', $course_details->id) ;

											foreach($reviews as $review):
												@$user = $getFromCourse->get_singly_g('user', 'id', $review->student_id) ;

									
									
									?>


									<!-- TESTIMONIAL #1 -->
									<div class="review-4">
										<div class="review-4-txt">

											<!-- Text -->
											<p><?=@$review->comment?>
											</p>

											<!-- Author Data -->									
											<div class="review-4-author d-flex align-items-center">

												<!-- Author Avatar -->
												<div class="author-avatar">
													<img class="img-fluid" src="<?=BASE_URL?>/admin/<?=@$user->avatar?>" alt="review-author-avatar" />
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
											
													<h5 class="h5-xs"><?=@$user->firstname.' '.@$user->surname?>.</h5>	
													<span><?=$user->position;?></span>
												</div>

											</div>
							
										</div>						
									</div>	<!--END  TESTIMONIAL #1 -->

									<?php endforeach;?>


									

								</div>
							</div>	<!-- END COURSE DESCRIPTION -->		


							<!-- COURSE DATA -->
							<div class="col-lg-4">
								<div class="course-data">

									<!-- Image -->
									<img class="img-fluid" src="<?=BASE_URL?>/admin/<?=$course_details->img_preview;?>" alt="course-preview" />

									<!-- Course Price -->
									<div class="course-data-price text-center">&#36;<?=number_format($course_details->disc_price,2);?> <span class="old-price">&#36;<?=number_format($course_details->price,2);?></span>
										<p class="p-sm">16 days left at this price!</p>
									</div>

									<!-- Links -->
									<div class="course-data-links">
										<a href="auth/" class="btn btn-md btn-rose tra-grey-hover">Start Course Now</a>
										<a href="auth/" class="btn btn-md btn-tra-grey rose-hover">Subscribe Now</a>
									</div>

									<!-- List -->
									<div class="course-data-list">

										<span>This course includes:</span>

										<p><i class="fas fa-graduation-cap"></i> English, German, Italian and 7 more</p>
										<p><i class="far fa-play-circle"></i> 3 hours on-demand video</p>
										<p><i class="fas fa-file-archive"></i> 12 downloadable resources</p>				
										<p><i class="far fa-bookmark"></i> Full lifetime access</p>
										<p><i class="fas fa-mobile-alt"></i> Access on mobile and TV</p>
										<p><i class="far fa-id-card"></i> Certificate of Completion</p>
									</div>

								</div>
							</div>	<!-- END COURSE DATA -->



						</div>	  <!-- End row -->
					</div>	   <!-- End container -->		
				</section>	<!-- END COURSE DETAILS -->	




				


				<!-- COURSES-5
				============================================= -->
				<section id="courses-5" class="bg-whitesmoke courses-section division">
					<div class="container">


						<!-- SECTION TITLE -->	
						<div class="row">	
							<div class="col-md-12">
								<div class="section-title mb-60">

									<!-- Title 	-->	
									<h4 class="h4-xl">Browse Similar Courses</h4>

									<!-- Text -->	
									<p class="p-md">Aliquam a augue suscipit, luctus neque purus ipsum neque dolor primis libero 
									   tempus, blandit posuere and ligula varius magna a porta
									</p>	

									<!-- Button -->	
									<div class="title-btn">
										<a href="list" class="btn btn-tra-grey rose-hover">View All Courses</a>
									</div>
									
								</div>	
							</div>
						</div>


						<div class="row">


							<!-- COURSES LIST -->
							<div class="col-lg-6">


							<?php 
								$similars = $getFromCourse->get_single_g_six('courses', 'cat_id', $course_details->cat_id);

								foreach($similars as $similar):
							
							
							?>


								<div class="cbox-5 b-bottom">
									<a href="course_details/<?=$course_details->id?>">
										<div class="row">
										
											<!-- Course Description -->	
											<div class="col-sm-7 cbox-5-txt">
												<h5 class="h5-xs"><?=$course_details->course_name;?></h5>
												<p class="p-sm grey-color"><?=($course_details->total_duration)/60;?> Total Hours - Updated <?=$course_details->date_created?> ago</p> 

												<!-- Rating -->
												<div class="course-rating">
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<span class="cr-rating">4.89 (331 Reviews)</span>
												</div>
											</div>

											<!-- Course Data -->	
											<div class="col-sm-3 cbox-5-data text-center clearfix">
												<p class="grey-color"><i class="fas fa-users"></i> <?=$getFromCourse->get_count_where('student_courses', 'course_id',$course_details->id);?></p>
											</div>

											<!-- Course Price -->	
											<div class="col-sm-2 cbox-5-price text-right clearfix">
												<span class="course-price"> &#36;<?=number_format($course_details->disc_price,2);?></span>
												<span class="old-price"> &#36; &nbsp;<?=number_format($course_details->price,2);?></span>
											</div>

										</div>
									</a>
								</div>	<!-- END COURSE #1 -->


								<?php endforeach; ?>


							</div>	<!-- END COURSES LIST -->


						
						</div>	  <!-- End row -->


					</div>     <!-- End container -->
				</section>	<!-- END COURSES-5 -->




			