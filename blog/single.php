	<?php 
	
		$get_post = $getFromBlog->get_singly_g_str('blog_post', 'url_slug', $_GET['post']);
		$get_pid = $getFromBlog->get_slug_from_post($_GET['post']);
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


									<!-- SINGLE POST TITLE -->
									<div class="single-post-title mb-35 text-center">

										<!-- Post Title -->
										<h3 class="h3-md"><?=$get_post->title;?></h3>

										<!-- Post Data -->
										<div class="single-post-data">
											<p>Posted by <?php 
											$he = $getFromBlog->get_single('user', $get_post->author);
											echo @$he->firstname;
											
											?> <br> <?=$getFromBlog->timeago($get_post->date_created);?> </p>
										</div>

									</div>	<!-- END SINGLE POST TITLE -->


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


									<!-- SINGLE POST SHARE LINKS -->
									<div class="row post-share-links d-flex align-items-center">

										<!-- POST TAGS -->
										<div class="col-md-9 col-xl-8 post-tags-list">
											<span><a href="#">eTreeks News</a></span>	
											<span><a href="#">Ideas & Opinions</a></span>
											<span><a href="#">Education Process</a></span>										
										</div>

										<!-- POST SHARE ICONS -->
										<div class="col-md-3 col-xl-4 post-share-list text-right">
											<ul class="share-social-icons text-center clearfix">														
												<li><a href="#" class="share-ico ico-facebook"><i class="fab fa-facebook-square"></i></a></li>
												<li><a href="#" class="share-ico ico-twitter"><i class="fab fa-twitter"></i></a></li>
												<li><a href="#" class="share-ico ico-like"><i class="far fa-bookmark"></i></a></li>			
											</ul>
										</div>

									</div>	<!-- END SINGLE POST SHARE -->


								
									<!-- OTHER POSTS
									============================================= -->
								
									<!-- POST COMMENTS -->
									<div class="post-comments">


										<!-- Title -->	
										<h4 class="h4-sm">Comments Section</h4>	


									

										<?php 
											@$ge_comments = $getFromBlog->get_comment_list($get_pid->id);
											//var_dump($ge_comments);

											foreach($ge_comments as $comment):
										?>
										<!-- COMMENT #3 -->
										<div class="media mt-40">

										
										 	<div class="media-body">

										 		<!-- Comment-4 Meta -->
										 		<div class="comment-meta">
											   		<h5 class="h5-sm mt-0 noto-font-700 purple-color"><?=$comment->names?></h5>
											   		<span class="comment-date"><?=$getFromBlog->timeago($comment->date_created);?>&#8194; </span>
												</div>
												
												<!-- Comment-4 Text -->	
										   		<p><?=$comment->comment?></p>

										   </div>
										</div>	<!-- END COMMENT #3 -->	

										<?php
									 endforeach; 
									 ?>


										<hr />


									

										<hr />	


									</div>	<!--END POST COMMENTS -->


									<!-- COMMENT FORM -->
									<div id="lseave-comment">
										
										<!-- Title -->
										<h4 class="h4-sm">Leave a Reply</h4>
										
										<!-- Text -->
										<p class="grey-color">Your email address will not be published. All comments go through moderation, 
										  so your comment won't display immediately.
										</p>

										<form  method="post" action="blog/post/<?=$_GET['post'];?>" class="row">

											<div  class="col-md-12 input-message">
							                	<p>Add Comment *</p>
							                	<textarea class="form-control message" name="comments"  autocomplete="on" name="message" rows="6" placeholder="Enter Your Comment Here* ..." required></textarea>
							                </div> 
					                                            
							                <div class="col-md-12">
							                	<p>Name*</p>
							                	<input type="text" name="names" autocomplete="on" class="form-control name" placeholder="Enter Your Name*" required> 
												<input type="hidden" name="post_id" autocomplete="on" class="form-control name" value="<?=@$get_pid->id;?>" placeholder="Enter Your Name*" required> 
							                </div>
							                        
							                <div class="col-md-12">
							                	<p>Email*</p>
							                	<input type="text" name="email" autocomplete="on" class="form-control email" placeholder="Enter Your Email*" required> 
							                </div>
							                                 
							                <!-- Contact Form Button -->
							                <div class="col-lg-12 mt-15 form-btn text-right"> 						                 
							                	<button type="submit" name="blog_comment_page" class="btn btn-rose tra-black-hover ">Post Your Comment</button> 
							                </div>
							                                                              
							               
						                                              
						                </form>	

										
																		
									
									</div>	<!-- END COMMENT FORM -->
									

								</div>
							</div>	<!-- END SINGLE POST CONTENT -->


						</div>
					</div>
				</section>	<!-- END SINGLE POST -->




			