
			<?php /*	<!-- NEWS-3
				============================================= -->
				<section id="news-3" class="pt-100 news-section division">
					<div class="container">
					 	<div class="row">


					 		<!-- store productS HOLDER -->
					 		<div class="col-lg-9">
					 			<div class="post-holder pr-25">

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

                                    $cur =  $paginations =$getFromProduct->pagination_lower_product_main( $offset, $limit);

                                    $lower = ($page - 1) * $limit + $cur;
                                    $uper = $getFromProduct->pagination_count_product_main();


                                    
                                    
                                    $paginations =$getFromProduct->pagination_product_main( $offset, $limit);
                                    $sn = $offset;
                                    foreach($paginations as $store):
                                        $sn +=1;



                                ?>


					 				<!-- ARTICLE  -->
					 				<div class="article-3 row d-flex align-items-center b-bottom">																						
										<!-- Article Preview -->
										<div class="col-md-4"> 
											<img class="img-fluid" src="admin/<?=$store->img_url;?>" alt="article-preview">	
										</div>					
											
										<!-- Article Text -->		
										<div class="col-md-8">	

											<!-- Title -->
											<h4 class="h4-sm">
												<a href="store/product/<?=$store->url_slug;?>"><?=$store->title;?></a>
											</h4>	

										<!-- product Author -->
										<span><?=$getFromProduct->timeAgo($store->date_created)?>; - By <?=$getFromProduct->get_single('user', $store->author)->firstname;?></span>	

											
											<!-- Text -->
											<p><?=$store->descs;?>
											</p> 

											<!-- product Tags -->
											<div class="tags-cloud">
												<span class="badge"><a href="#">Ideas & Opinions</a></span>
												<span class="badge"><a href="#">Students</a></span> 	
												<span class="badge badge-danger"><a href="#">eTreeks News</a></span> 									
											</div>

										</div>	
															
									</div>	<!-- END ARTICLE #1 -->	


                             <?php endforeach; }?>
                    
              


					 			</div>
					 		</div>	<!-- END store productS HOLDER -->


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


								<!-- store CATEGORIES --> 
								<div class="store-categories sidebar-div mb-50">
									<ul class="store-category-list clearfix">
									<?php
										$get_cats = $getFromProduct->get_multi('store_category');

										foreach($get_cats as $cat):
									?>
										<li><a href="store/cat_product/<?=$cat->id;?>"><?=$cat->cat_name;?></a> <span>(
											
											<?php 
													$count_cat = $getFromProduct->count_cats($cat->id);
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

											*/?>


					<!-- COURSES-3
			============================================= -->
			<section id="courses-3" class="division  pt-100 news-section ">
				<div class="container">


					<!-- SECTION TITLE -->	
					<div class="row">	
						<div class="col-md-12">
							<div class="section-title mb-60">

								<!-- Title 	-->	
								<h3 class="h3-sm">Most Recent Products</h3>	

							

							</div>	
						</div>
					</div>


					<!-- COURSES HOLDER -->
					<div class="row courses-grid">

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

	$cur =  $paginations =$getFromProduct->pagination_lower_product_main( $offset, $limit);

	$lower = ($page - 1) * $limit + $cur;
	$uper = $getFromProduct->pagination_count_product_main();


	
	
	$paginations =$getFromProduct->pagination_product_main( $offset, $limit);
	$sn = $offset;
	foreach($paginations as $store):
		$sn +=1;



?>


					<div class="col-lg-9 col-md-9">
						<div class="row">
						<!-- COURSE #1 -->
						<div class="col-md-4 col-lg-4 col-xl-4">
							<div class="cbox-1">
								<a href="store/product/<?=$store->url_slug;?>">
											
									<!-- Image -->
									<img class="img-fluid" src="<?=BASE_URL;?>/admin/<?=$store->img_url;?>" alt="Product-preview" />

									<!-- Text -->
									<div class="cbox-4-txt">	

										<!-- Course Tags
										<p class="course-tags">
											<span>2 months</span>
											<span>60 hours</span>
										</p> -->

										<!-- Course Title -->
										<h5 class="h5-xs"><?=$store->names;?></h5>

										<!-- Course Rating -->
										<div class="course-rating clearfix">
											<span><?=$store->descs?></span>
										</div>

										<!-- Course Price -->
										<span class="course-price">
											<p> &#36;<?=number_format($store->price,2);?></p>
										</span>

									</div>

								</a>
							</div>
							</div>

							</div>
						<?php endforeach;}else{?>
						<h1>No Product Available !!</h1>
						<?php }?>

						</div>	<!-- END COURSE #1 -->





						
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
								$get_cats = $getFromProduct->get_multi('product_category');

								foreach($get_cats as $cat):
							?>
								<li><a href="store/cat_product/<?=$cat->id;?>"><?=$cat->cat_name;?></a> <span>(
									
									<?php 
											$count_cat = $getFromProduct->count_cats($cat->id);
											echo $count_cat;
										
										?>
								)</span></li>

								<?php endforeach; ?>
								
							</ul>
						</div>


						</aside>   <!-- END SIDEBAR -->



					</div>	  <!-- END COURSES HOLDER -->
				</div>     <!-- End container -->
			</section>	<!-- END COURSES-3 -->




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
				</div>




			