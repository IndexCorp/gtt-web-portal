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
								    	<li class="breadcrumb-item active" aria-current="page">All Courses</li>
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
									<h3 class="h3-xs">All Global Trade Course</h3>

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



					<!-- COURSES-5
				============================================= -->
				<section id="courses-5" class="courses-section division">
					<div class="container">


					


						<div class="row">

						<?php 

							if(isset($_GET['list'])){

									$limit = 10;
								if($_GET['list'] == 0){
										$page = 1;
									$offset = (($page - 1)* $limit );
								}else{
									$page = $_GET['list'];
									$offset = (($page - 1)* $limit );
								}

								$cur =  $paginations =$getFromCourse->pagination_lower('courses', $offset, $limit);

								$lower = ($page - 1) * $limit + $cur;
								$uper = $getFromCourse->pagination_count('courses');


								
								
								$paginations =$getFromCourse->pagination('courses', $offset, $limit, 'id');
								if(!empty($paginations)){
								foreach($paginations as $data):
								//	$user = $getFromGeneric->get_single('user', $data->student_id);
								//	$course = $getFromGeneric->get_single('courses', $data->course_id);

						?>




							<!-- COURSES LIST -->
							<div class="col-lg-6">
								<!-- COURSE #1 -->
								<div class="cbox-5 b-bottom">
									<a href="course_details/<?=$data->id;?>">
										<div class="row">
										
											<!-- Course Description -->	
											<div class="col-sm-7 cbox-5-txt">
												<h5 class="h5-xs"><?=$data->course_name;?></h5>
												<p class="p-sm grey-color"><?=$data->total_duration;?> Hours - Updated <?=$getFromCourse->timeago($data->date_created);?> ago</p> 

												<!-- Rating -->
												<div class="course-rating">
												<?php 
                                                $get_rating_count = $getFromCourse->get_count_where('rating', 'course_id', $data->id);
                                                $get_sum_rating = $getFromCourse->get_sum_where('rating', 'rating', 'course_id', $data->id);
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
                                                } ;?> (<?=@$get_rating_count;?> Reviews)</span>
												</div>
											</div>

											<!-- Course Data -->	
											<div class="col-sm-3 cbox-5-data text-center clearfix">
												<p class="grey-color"><i class="fas fa-users"></i> <?=$getFromCourse->get_count_where('student_courses', 'course_id',$data->id);?></p>
											</div>

											<!-- Course Price -->	
											<div class="col-sm-2 cbox-5-price text-right clearfix">
												<span class="course-price"> &#36;<?=number_format($data->disc_price,2);?></span>
												<span class="old-price"> &#36; &nbsp;<?=number_format($data->price,2);?></span>
											</div>

										</div>
									</a>
								</div>	<!-- END COURSE #1 -->	


							</div>	<!-- END COURSES LIST -->

						<?php endforeach;}else{ ?>
											<h2>No Course Available</h2>
											<?php }}?>



							


						


						</div>	  <!-- End row -->


					</div>     <!-- End container -->
				</section>	<!-- END COURSES-5 -->




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

                                 <li class="page-item"><a class="page-link" href="list/<?=$page - 1?>" tabindex="-1"><i class="fas fa-angle-left"></i> </a></li>
									   
                            <?php }?>
                              <?=$lower;?> <span class=" text-center text-black"> &nbsp;&nbsp;&nbsp;of &nbsp;&nbsp;&nbsp; <?=$uper;?></span>
                                
                              
                                 <?php 
                                    if($lower == $uper){

                                 
                                ?>
                                    <?php }else{
                                        ?> 
                                           <li class="page-item"><a class="page-link" href="list/<?=$page + 1?>"><i class="fas fa-angle-right"></i> </a></li>
								
                                      
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




				<!-- COURSES-1
				============================================= -->
				<section id="courses-1" class="wide-100 courses-section division">
					<div class="container">


						<!-- SECTION TITLE -->	
						<div class="row">	
							<div class="col-md-12">
								<div class="section-title mb-40">

									<!-- Title 	-->	
									<h4 class="h4-xl">Top 10 Online Courses</h4>	

									<!-- Text -->	
									<p class="p-md">Aliquam a augue suscipit, luctus neque purus ipsum neque dolor primis libero 
									   tempus, blandit posuere and ligula varius magna a porta
									</p>

								</div>	
							</div>
						</div>


						<!-- COURSES HOLDER -->
						<div class="row courses-grid">

					<?php 

						$popula_courses = $getFromMain->most_popular_courses();
						//var_dump($popula_courses);
						if(!empty($popula_courses)){
						foreach($popula_courses as $popula_course):
					?>


						<!-- COURSE #1 -->
						<div class="col-md-6 col-lg-4 col-xl-3">
							<div class="cbox-1">
								<a href="course_details/<?=$popula_course->course_id;?>">
											
									<!-- Image -->
									<img class="img-fluid" src="<?=BASE_URL;?>/admin/<?=$popula_course->img_preview;?>" alt="course-preview" />

									<!-- Text -->
									<div class="cbox-4-txt">	

										<!-- Course Tags 
										<p class="course-tags">
											<span>2 months</span>
											<span>60 hours</span>
										</p>-->

										<!-- Course Title -->
										<h5 class="h5-xs"><?=$popula_course->course_name;?> (<?=$popula_course->course_abrev;?>)</h5>

										<!-- Course Rating -->
										<div class="course-rating clearfix">
										<?php 
                                                $get_rating_count = $getFromCourse->get_count_where('rating', 'course_id', $popula_course->course_id);
                                                $get_sum_rating = $getFromCourse->get_sum_where('rating', 'rating', 'course_id', $popula_course->course_id);
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
                                                } ;?> (<?=@$get_rating_count;?> Reviews)</span>
										</div>

										<!-- Course Price -->
										<span class="course-price"><span class="old-price">&#36; &nbsp;<?=number_format($popula_course->price,2);?></span> &#36; &nbsp;<?=number_format($popula_course->disc_price,2);?></span>

									</div>

								</a>
							</div>
						</div>	<!-- END COURSE #1 -->	
						<?php endforeach;}else{?>
						<h1>No Course Available !!</h1>
						<?php }?>

					</div>     <!-- End container -->
				</section>	<!-- END COURSES-1 -->




				<!-- CATEGORIES-1
				============================================= -->
				<section id="categories-1" class="bg-whitesmoke categories-section division">
					<div class="container">


						<!-- SECTION TITLE -->	
						<div class="row">	
							<div class="col-md-12">
								<div class="section-title mb-40">

									<!-- Title 	-->	
									<h4 class="h4-xs">Courses Categories</h4>	

									<!-- Text -->	
									<p class="p-md">Discover thousands of online courses from the best experts</p>

								</div>
							</div>
						</div>


						<div class="row d-flex align-items-center">
							<div class="col text-center">


								<?php 
									$categories = $getFromGeneric->get_multi('course_category');
									foreach($categories as $category):
								?>	


								<!-- CATEGORIE BOX #1 -->
								<div class="c1-box">
									<a href="course_cat/<?=$category->id;?>">
										<div class="c1-box-txt">

											<h5 class="h5-xs"><?=$category->cat_name;?></h5>
											<p><?=$getFromCourse->get_count_where('courses', 'cat_id', $category->id);?> Courses</p>

										</div>
									</a>
								</div>	<!-- END CATEGORIE BOX #1 -->
										<?php endforeach;?>




							


							</div>
						</div>    <!-- End row --> 	
					</div>	   <!-- End container --> 	
				</section>	<!-- End CATEGORIES-1 --> 




				


				
			
		


			


				<!-- BANNER-3
				============================================= -->
				<section id="banner-3" class="bg-whitesmoke bg-map banner-section division">
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
										<h4 class="h4-xs">Find the right English language course for you</h4>

										<!-- Button -->	
										<a href="#courses-5" class="btn btn-rose tra-white-hover">Select Course</a>

									</div>
								</div>	<!-- END BANNER TEXT -->


							</div>   <!-- End row -->
						</div>    <!-- End banner-3-holder -->
					</div>	   <!-- End container -->
				</section>	<!-- END BANNER-3 -->




				