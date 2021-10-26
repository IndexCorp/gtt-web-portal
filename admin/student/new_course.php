<?php
    $courses = 'active';
 ?>
 <?php

    if(isset($_GET['new_course'])){
        if(!empty($_GET['new_course'])){
            $id = $_GET['new_course'];

            $new_course = $getFromCourse->get_single('courses', $id);

        }
       
    }
?>  
   <!-- Content -->
  <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


<div class="page__heading border-bottom">
    <div class="container-fluid page__container d-flex align-items-center">
        <h1 class="mb-0">Course Creation Page</h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <form method="post" >
        <?php 
            if(@$new_course->publish == 0){

          
        ?>
         <input type="hidden" name="course_id" value="<?=@$id;?>">
         <input type="hidden" name="status" value="publish">
         <input type="submit"  name="publish_course" class="btn btn-outline-success ml-auto" value="Publish">
                <?php  }elseif(@$new_course->publish == 1){ ?>

                    <input type="hidden" name="course_id" value="<?=$id;?>">
                    <input type="hidden" name="status" value="unpublish">
       
                     <input type="submit"  name="publish_course" class="btn btn-outline-danger ml-auto" value="Unpublish">
      

                <?php }?>
       
       
        </form>
    </div>
    <div class="mb-1 ml-5">
        <a href="admin/courses" class="badge badge-dark-gray text-white" onclick="goBack()">Back to Courses</a>
    </div>
</div>
<div class="bg-white border-bottom mb-3">
    <div class="container-fluid nav nav-tabs" role="tablist">
        <a href="#c-basic" class="active" data-toggle="tab" role="tab" aria-controls="activity_all" aria-selected="true">Basic</a>
       <?php
         if(!empty($_GET['new_course'])){
       ?>
        <a href="#c-images" data-toggle="tab" role="tab" aria-selected="false">Upload Images</a>
        <a href="#c-curriculum" data-toggle="tab" role="tab" aria-selected="false">Course Content</a>
        <a href="#c-pricing" data-toggle="tab" role="tab" aria-selected="false">Pricing</a>
            <?php }else{?>
                <a href="" data-toggle="tab" role="tab" aria-selected="false">Upload Images</a>
                <a href="" data-toggle="tab" role="tab" aria-selected="false">Course Content</a>
        <a href="" data-toggle="tab" role="tab" aria-selected="false">Pricing</a>
         <?php }?>
    </div>
</div>

<div class="container page__container">
    <div class="tab-content">
        <div class="tab-pane active show fade" id="c-basic">
            <!-- FIRST TAB CONTENT -->
            <form method="post" action="admin/new_course/<?=@$id?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Course Name</label>
                    <?php 
                    if(!empty($_GET['new_course'])){  ?>
                    <input type="hidden"  value="update" name="det">
                    <input type="hidden"  value="<?=$id?>" name="ids">
                    <?php }else{ ?>
                        <input type="hidden"  value="save" name="det">
                    <?php }?>
                    <input type="text" required  class="form-control" id="exampleInputEmail1" value="<?=@$new_course->course_name;?>" name="course_name" placeholder="Enter course name ..">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Course Abbreviation</label>
                    <input type="text" required class="form-control" id="exampleInputEmail1" name="course_abrev" value="<?=@$new_course->course_abrev;?>"  placeholder="Enter course abrev ..">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Course Short Description</label>
                    <textarea class="form-control" required id="exampleInputPassword1" name="short_disc" placeholder="Enter course description.."><?=@$new_course->descs;?></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Course Long Description</label>
                    <textarea class="form-control" required id="exampleInputPassword1" name="course_disc" placeholder="Enter course description.."><?=@$new_course->long_desc;?></textarea>
                </div>
                <div class="form-group" data-select2-id="16">
                    <label for="select01">Course Category</label>
                    <select id="select01" name="course_cat" data-toggle="select" required class="form-control select2-hidden-accessible" data-select2-id="select01" tabindex="-1" aria-hidden="true">
                       
                       
                        <?php
                        if(!empty($_GET['new_course'])){
                            $category = $getFromCourse->get_single('course_category', $new_course->cat_id);
                        ?>
                         <option value="<?=@$category->id?>" ><?=@$category->cat_name;?></option>
                            <?php }else{?>
                                <option value="" >Select Course Category</option>
                                <?php }?>
                        <?php

                            $categories =  $getFromCourse->get_multi('course_category');
                            
                            foreach($categories as $cat):

                            ?>

                        <option value="<?=$cat->id?>"><?=$cat->cat_name;?></option>
                        
                        <?php endforeach;?>
                       
                    </select>
                </div>
                <div class="form-group" data-select2-id="17">
                    <label for="select01">Course Level</label>
                    <select id="select01" name="course_level" required data-toggle="select" class="form-control select2-hidden-accessible" data-select2-id="select01" tabindex="-1" aria-hidden="true">
                    <?php
                        if(!empty($_GET['new_course'])){
                           
                        ?>
                         <option value="<?=@$new_course->level;?>"><?=@$new_course->level;?></option>
                         <?php }else{?>
                            <option value="">Select Level</option>
                         <?php }?>
                        <option value="Beginner">Beginner</option>
                        <option value="Intermediate">Intermediate</option>
                        <option value="Expert">Expert</option>
                    </select>
                </div>
               

                <?php 
                    if(!empty($_GET['new_course'])){
                       echo '<input type="submit" name="details" value="Update" class="btn btn-warning">';
                    }else{
                        echo '<input type="submit" name="details" value="Save" class="btn btn-success">';
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
                            <form method="post" action="admin/new_course/<?=@$id?>" enctype="multipart/form-data">
                                <h4 class="card-header__title">Course Images</h4>
                                <div class="form-group dropzone" data-select2-id="18" action="/file-upload" multiple="">
                                    <label for="select01">Course Avatar</label>
                                    <div class="fallback">
                                        <img src="<?=BASE_URL?>admin/<?=@$new_course->avatar;?>" class="img-thumbnail">
                                        <input type="file"  name="avatar"  id ="avatar" class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group dropzone" data-select2-id="18" action="/file-upload" multiple="">
                                    <label for="select01">Course Preview Picture</label>
                                    <div class="fallback">
                                        <input type="hidden" name="id" value="<?=$id;?>">
                                        <img src="<?=BASE_URL?>admin/<?=@$new_course->img_preview;?>" class="img-thumbnail">
                                       
                                        <input type="file"  name="img_preview" id = "img_preview" class="form-control" >
                                    </div>
                                </div>

                                
                                <input type="submit" name="update_course_image" value="Update Image" class="btn btn-warning">
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
            <form method="post" action="admin/new_course/<?=@$id?>">
                <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    <input type="number" step="any" class="form-control" name="price" id="exampleInputEmail1" value="<?=@$new_course->price;?>" placeholder="Enter course price ..">
                    <input type="hidden" class="form-control" name="id" id="exampleInputEmail1" value="<?=@$new_course->id;?>" >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Discounted Price</label>
                    <input class="form-control" type="number" step="any" name="discount"  id="exampleInputPassword1" placeholder="Enter discounted price.." value="<?=@$new_course->disc_price;?>">
                </div>
                
                <input name="price_info" value="Update"  type="submit" class="btn btn-warning">
            </form>
        </div>
        
    </div>
</div>

</div>
<!-- // END content -->
