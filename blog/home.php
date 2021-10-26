
				<!-- NEWS-3
				============================================= -->
				<section id="news-3" class="pt-100 news-section division">
					<div class="container">
					 	<div class="row">


					 		<!-- BLOG POSTS HOLDER -->
					 		<div class="col-lg-9">
					 			<div class="posts-holder pr-25">

                                 <?php 



                                if(isset($_GET['home'])){

                                        $limit = 10;
                                    if($_GET['home'] == 0){
                                            $page = 1;
                                        $offset = (($page - 1)* $limit );
                                    }else{
                                        $page = $_GET['home'];
                                        $offset = (($page - 1)* $limit );
                                    }

                                    $cur =  $paginations =$getFromBlog->pagination_lower_blog_main( $offset, $limit);

                                    $lower = ($page - 1) * $limit + $cur;
                                    $uper = $getFromBlog->pagination_count_blog_main();


                                    
                                    
                                    $paginations =$getFromBlog->pagination_blog_main( $offset, $limit);
                                    $sn = $offset;
                                    foreach($paginations as $blog):
                                        $sn +=1;



                                ?>


					 				<!-- ARTICLE  -->
					 				<div class="article-3 row d-flex align-items-center b-bottom">																						
										<!-- Article Preview -->
										<div class="col-md-4"> 
											<img class="img-fluid" src="admin/<?=$blog->img_url;?>" alt="article-preview">	
										</div>					
											
										<!-- Article Text -->		
										<div class="col-md-8">	

											<!-- Title -->
											<h4 class="h4-sm">
												<a href="blog/post/<?=$blog->url_slug;?>"><?=$blog->title;?></a>
											</h4>	

										<!-- Post Author -->
										<span><?=$getFromBlog->timeAgo($blog->date_created)?>; - By <?=$getFromBlog->get_single('user', $blog->author)->firstname;?></span>	

											
											<!-- Text -->
											<p><?=$blog->descs;?>
											</p> 

											<!-- Post Tags -->
											<div class="tags-cloud">
												<span class="badge"><a href="#">Ideas & Opinions</a></span>
												<span class="badge"><a href="#">Students</a></span> 	
												<span class="badge badge-danger"><a href="#">eTreeks News</a></span> 									
											</div>

										</div>	
															
									</div>	<!-- END ARTICLE #1 -->	


                             <?php endforeach; }?>
                    
              


					 			</div>
					 		</div>	<!-- END BLOG POSTS HOLDER -->


					 		<!-- SIDEBAR -->
							<aside id="sidebar" class="col-lg-3">


								<!-- SEARCH FIELD --> 
								<div id="search-field" class="sidebar-div mb-50">								
									<div class="input-group mb-3">
									  	<input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="search-field">
									 	<div class="input-group-append">
									    	<button class="btn" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
									 	</div>
									</div>
								</div>


								<!-- BLOG CATEGORIES --> 
								<div class="blog-categories sidebar-div mb-50">
									<ul class="blog-category-list clearfix">
									<?php
										$get_cats = $getFromBlog->get_multi('blog_category');

										foreach($get_cats as $cat):
									?>
										<li><a href="blog/cat_post/<?=$cat->id;?>"><?=$cat->cat_name;?></a> <span>(
											
											<?php 
													$count_cat = $getFromBlog->count_cats($cat->id);
													echo $count_cat;
												
												?>
										)</span></li>

										<?php endforeach; ?>
										
									</ul>
								</div>


							</aside>   <!-- END SIDEBAR -->


					 	</div>	  <!-- End row -->
					</div>	   <!-- End container -->	
				</section>	<!-- END NEWS-3 -->




				<!-- PAGE PAGINATION
				============================================= -->
				<!--<div class="page-pagination division">
					<div class="container">
						<div class="row">	
							<div class="col-md-12">

								<nav aria-label="Page navigation">
									<ul class="pagination justify-content-center">
										<li class="page-item disabled"><a class="page-link" href="#" tabindex="-1"><i class="fas fa-angle-left"></i></a></li>
									    <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
									    <li class="page-item"><a class="page-link" href="#">2</a> </li>
									    <li class="page-item"><a class="page-link" href="#">3</a></li>
									    <li class="page-item"><a class="page-link" href="#">4</a></li>
									    <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-right"></i></a></li>
									</ul>	
								</nav>					

							</div>
						</div>	
					</div> 
				</div>	<!-- END PAGE PAGINATION -->




				<!-- NEWSLETTER-1
				============================================= -->
				<section id="newsletter-1" class="newsletter-section division">
					<div class="container">
						<div class="bg-fixed newsletter-holder">
							<div class="row">


								<!-- SECTION TITLE -->	
								<div class="col-md-6 col-lg-5">
									<div class="newsletter-txt white-color">	
										<h3 class="h3-sm">Stay in Touch</h3>	
										<p>Get personalized course recommendations, track subjects and courses with reminders and more</p>	
									</div>								
								</div>


								<!-- NEWSLETTER FORM -->
								<div class="col-md-6 col-lg-7">
									<form class="newsletter-form white-color">
												
										<div class="input-group">
											<input type="email" autocomplete="off" class="form-control" placeholder="Your email address" required id="s-email">								
											<span class="input-group-btn">
												<button type="submit" class="btn btn-md btn-rose tra-white-hover">Subscribe Now</button>
											</span>										
										</div>

										<!-- Newsletter Form Notification -->	
										<label for="s-email" class="form-notification"></label>
													
									</form>							
								</div>	  <!-- END NEWSLETTER FORM -->


							</div>	  <!-- End row -->
						</div>    <!-- End newsletter-holder -->
					</div>	   <!-- End container -->	
				</section>	<!-- END NEWSLETTER-1 -->



