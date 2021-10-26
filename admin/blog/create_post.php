<?php
    $courses = 'active';
 ?>
 <?php

    if(isset($_GET['create_post'])){
        if(!empty($_GET['create_post'])){
            $id = $_GET['create_post'];

            $create_post = $getFromBlog->get_single('blog_post', $id);

        }
       
    }
?>  
   <!-- Content -->
  <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


<div class="page__heading border-bottom">
    <div class="container-fluid page__container d-flex align-items-center">
        <h1 class="mb-0">Blog Post Creation Page</h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <form method="post" >
        <?php 
            if(@$create_post->post_status == 0){

          
        ?>
         <input type="hidden" name="blog_id" value="<?=@$id;?>">
         <input type="hidden" name="status" value="publish">
         <input type="submit"  name="publish_blog" class="btn btn-outline-success ml-auto" value="Publish">
                <?php  }elseif(@$create_post->post_status == 1){ ?>

                    <input type="hidden" name="blog_id" value="<?=$id;?>">
                    <input type="hidden" name="status" value="unpublish">
       
                     <input type="submit"  name="publish_blog" class="btn btn-outline-danger ml-auto" value="Unpublish">
      

                <?php }?>
       
       
        </form>
    </div>
    <div class="mb-1 ml-5">
        <a href="admin/news" class="badge badge-dark-gray text-white" onclick="goBack()">Back to Blog Management</a>
    </div>
</div>
<div class="bg-white border-bottom mb-3">
    <div class="container-fluid nav nav-tabs" role="tablist">
        <a href="#c-basic" class="active" data-toggle="tab" role="tab" aria-controls="activity_all" aria-selected="true">Post</a>
       <?php
         if(!empty($_GET['create_post'])){
       ?>
        <a href="#c-images" data-toggle="tab" role="tab" aria-selected="false">Upload Images</a>
           <?php }else{?>
                <a href="" data-toggle="tab" role="tab" aria-selected="false">Upload Images</a>
                    <?php }?>
    </div>
</div>

<div class="container page__container">
    <div class="tab-content">
        <div class="tab-pane active show fade" id="c-basic">
            <!-- FIRST TAB CONTENT -->
            <form method="post" action="admin/create_post/<?=@$id?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Blog Title</label>
                    <?php 
                    if(!empty($_GET['create_post'])){  ?>
                    <input type="hidden"  value="update" name="det">
                    <input type="hidden"  value="<?=$id?>" name="ids">
                    <?php }else{ ?>
                        <input type="hidden"  value="save" name="det">
                    <?php }?>
                    <input type="text" required  class="form-control" id="exampleInputEmail1" value="<?=@$create_post->title;?>" name="blog_title" placeholder="Enter course name ..">
                </div>
              
                <div class="form-group">
                    <label for="exampleInputPassword1"> Short Description</label>
                    <textarea class="form-control" required id="exampleInputPassword1" name="short_desc" placeholder="Enter Short description.."><?=@$create_post->descs;?></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Full Description</label>
                    <textarea class="form-control" required id="exampleInputPassword1" name="full_desc" placeholder="Enter Full description.."><?=@$create_post->body;?></textarea>
                </div>
                <div class="form-group" data-select2-id="16">
                    <label for="select01">Post Category</label>
                    <select id="select01" name="post_cat" data-toggle="select" required class="form-control select2-hidden-accessible" data-select2-id="select01" tabindex="-1" aria-hidden="true">
                       
                       
                        <?php
                        if(!empty($_GET['create_post'])){
                            $category = $getFromBlog->get_single('blog_category',$create_post->category);
                        ?>
                         <option value="<?=@$category->id?>" ><?=@$category->cat_name;?></option>
                            <?php }else{?>
                                <option value="" >Select Post Category</option>
                                <?php }?>
                        <?php

                            $categories =  $getFromCourse->get_multi('blog_category');
                            
                            foreach($categories as $cat):

                            ?>

                        <option value="<?=$cat->id?>"><?=$cat->cat_name;?></option>
                        
                        <?php endforeach;?>
                       
                    </select>
                </div>
               
               

                <?php 
                    if(!empty($_GET['create_post'])){
                       echo '<input type="submit" name="create_blog_post" value="Update" class="btn btn-warning">';
                    }else{
                        echo '<input type="submit" name="create_blog_post" value="Save" class="btn btn-success">';
                    }
                ?>
               
            </form>

            
            <!-- END FIRST TAB CONTENT -->
        </div>


        <div class="tab-pane fade" id="c-images">
            <!-- SECOND TAB CONTENT -->

            <div class="col-md">
                <div class="card shadow-none border bg-light">
                    <div class="card-body">
                        <div class="card-header bg-light d-flex align-items-center">
                            <div class="flex">
                            <form method="post" action="admin/create_post/<?=@$id?>" enctype="multipart/form-data">
                                <h4 class="card-header__title">Blog Images</h4>
                              
                                <div class="form-group dropzone" data-select2-id="18" action="/file-upload" multiple="">
                                    <label for="select01">Blog Picture</label>
                                    <div class="fallback">
                                        <input type="hidden" name="id" value="<?=$id;?>">
                                        <img src="<?=BASE_URL?>admin/<?=@$create_post->img_url;?>" class="img-thumbnail">
                                       
                                        <input type="file"  name="img_preview" id = "img_preview" class="form-control" required>
                                    </div>
                                </div>

                                
                                <input type="submit" name="update_blog_image" value="Update Image" class="btn btn-warning">
                           </form>
                            </div>

                           
                      
                        </div>
                    </div>
                </div>
            </div>

            <!-- END SECOND TAB -->
        </div>

        <div class="tab-pane fade" id="c-curriculum">
            <!-- SECOND TAB CONTENT -->

            <div class="col-md">
                <div class="card shadow-none border bg-light">
                    <div class="card-body">
                        <div class="card-header bg-light d-flex align-items-center">
                            <div class="flex">
                                <h4 class="card-header__title">Course Content</h4>
                                <div class="card-subtitle text-muted">Your course content here</div>
                            </div>
                            <div class="ml-auto">
                
                                <a class="btn btn-primary ml-auto text-white"  data-toggle="modal" data-target="#modal-default1" ><i class="material-icons" >add</i> Add new Section</a>
                            </div>
                        </div>
                        <div id="" class="card-list" data-toggle="dragula" data-dragula-moves="js-dragula-handle">
                        <?php

                            $contents =  $getFromCourse->get_single_g('course_content', 'course_id', $id);

                            foreach($contents as $content):
                              

                        ?>
                            <div class="card">
                                <div class="card-body media align-items-center">
                                    <div class="media-left mr-3">
                                    <span>
                                    <a href="admin/includes/delete_folder/delete_course_content.php?id=<?=$content->id;?>&back=<?=$id?>" id="delete_course_content" class="btn btn-danger "><i class="material-icons">close</i> </a>
                                 
                                    </span>
                                    
                                          </div>
                                    <div class="media-body">
                                        <strong><?=$content->title;?></strong><br>
                                       
                                        <span class="text-muted"><?=$content->duration;?></span>
                                    </div>

                                    <div class="media-right ml-3">
                                        <span><a href="admin/student/edit_course_content.php?id=<?=@$content->id;?>&back=<?=@$id?>" class="btn btn-outline-warning  ml-auto">Edit</a></span>
                                    </div>

                                    <?php 
                                        if($content->type == 'Video'){

                                      
                                    ?>
                                    <div class="media-right ml-3">
                                        <span><a class="btn btn-outline-primary  ml-auto" disabled >Video</a></span>
                                    </div>
                                    <?php }else{?>
                                    <div class="media-right ml-3">
                                        <span><a class="btn btn-outline-primary ml-auto" disabled>Audio</a></span>
                                    </div>
                                    <?php }?>
                                   
                                   
                                </div>
                            </div>
                        <?php endforeach;?>
                          

                        </div>
                    </div>
                </div>
            </div>

            <!-- END SECOND TAB -->
        </div>
        <div class="tab-pane fade" id="c-pricing">
            <form method="post" action="admin/create_post/<?=@$id?>">
                <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    <input type="number" step="any" class="form-control" name="price" id="exampleInputEmail1" value="<?=@$create_post->price;?>" placeholder="Enter course price ..">
                    <input type="hidden" class="form-control" name="id" id="exampleInputEmail1" value="<?=@$create_post->id;?>" >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Discounted Price</label>
                    <input class="form-control" type="number" step="any" name="discount"  id="exampleInputPassword1" placeholder="Enter discounted price.." value="<?=@$create_post->disc_price;?>">
                </div>
                
                <input name="price_info" value="Update"  type="submit" class="btn btn-warning">
            </form>
        </div>
        
    </div>
</div>

</div>
<!-- // END content -->
