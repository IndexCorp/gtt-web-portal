	<?php 
	
		$get_post = $getFromProduct->get_singly_g_str('product', 'url_slug', $_GET['product']);
		$get_pid = $getFromProduct->get_slug_from_product($_GET['product']);
		//var_dump($get_post);
		//var_dump($get_pid);
									
	?>
	<!-- SINGLE POST
				============================================= -->
				<section id="single-post" class="wide-80 single-post-section division">
					<div class="container">


						<!-- SINGLE POST CONTENT -->
						<div class="row">
							<div class="col-lg-10 offset-lg-1">
								<div class="single-post-wrapper">


									<!-- SINGLE POST names -->
									<div class="single-post-names mb-35 text-center">

										<!-- Post names -->
										<h3 class="h3-md"><?=$get_post->names;?></h3>

										<!-- Post Data -->
										<div class="single-post-data">
											<p>Posted by <?php 
											$he = $getFromProduct->get_single('user', $get_post->author);
											echo @$he->firstname;
											
											?> <br> <?=$getFromProduct->timeago($get_post->date_created);?> </p>
										</div>

									</div>	<!-- END SINGLE POST names -->


									<!-- BLOG POST TEXT -->
									<div class="single-post-txt">

										<!-- Text -->
										<p><?=$get_post->descs;?>
										</p>

									</div>


									<!-- BLOG MAIN POST IMAGE -->
						 			<div class="post-inner-img">
										<img class="img-fluid" src="admin/<?=$get_post->img_url;?>" alt="blog-post-image" />		
									</div>


									<!-- BLOG POST TEXT -->
									<div class="single-post-txt">

										<!-- Text -->
										<p><?=$get_post->body;?>
										</p> 

										
									</div>	<!-- END BLOG POST TEXT -->	


								
									<!-- OTHER POSTS
									============================================= -->
								

								</div>
							</div>	<!-- END SINGLE POST CONTENT -->


						</div>
					</div>
				</section>	<!-- END SINGLE POST -->




			