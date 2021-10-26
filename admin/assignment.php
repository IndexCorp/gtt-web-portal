<?php
    $courses = 'active';
 ?>
 <?php

    if(isset($_GET['assignment'])){
        if(!empty($_GET['assignment'])){
            $id = $_GET['assignment'];

            $assignment = $getFromCourse->get_single('assignment', $id);

        }
       
    }
?>  
   <!-- Content -->
  <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


<div class="page__heading border-bottom">
    <div class="container-fluid page__container d-flex align-items-center">
        <h1 class="mb-0">Assignment Management Page</h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     
    </div>

    
    <div class="mb-1 ml-5">
        <a href="admin/assignment-menu/" class="badge badge-dark-gray text-white" onclick="goBack()">Back to Assignment</a>
    </div>
</div>
<div class="bg-white border-bottom mb-3">
    <div class="container-fluid nav nav-tabs" role="tablist">
        <a href="#c-basic" class="active" data-toggle="tab" role="tab" aria-controls="activity_all" aria-selected="true">Basic</a>
      
    </div>
</div>

<div class="container page__container">
    <div class="tab-content">
        <div class="tab-pane active show fade" id="c-basic">
            <!-- FIRST TAB CONTENT -->
            <form method="post" action="admin/assignment/<?=@$id?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Assignment Title</label>
                    <?php 
                    if(!empty($_GET['assignment'])){  ?>
                    <input type="hidden"  value="update" name="det">
                    <input type="hidden"  value="<?=$id?>" name="ids">
                    <?php }else{ ?>
                        <input type="hidden"  value="save" name="det">
                    <?php }?>
                    <input type="text" required  class="form-control" id="exampleInputEmail1" value="<?=@$assignment->title;?>" name="title" placeholder="Enter Assignment Title ..">
                </div>
               
               
                <div class="form-group">
                    <label for="exampleInputPassword1">Assignment Question</label>
                    <textarea class="form-control" required id="exampleInputPassword1" name="question" placeholder="Enter assignment description.."><?=@$assignment->question;?></textarea>
                </div>
                <div class="form-group" data-select2-id="16">
                    <label for="select01">Select Course </label>
                    <select id="select01" name="course_id" data-toggle="select" required class="form-control select2-hidden-accessible" data-select2-id="select01" tabindex="-1" aria-hidden="true">
                       
                       
                        <?php
                        if(!empty($_GET['assignment'])){
                            $category = $getFromCourse->get_single('courses', $assignment->course_id);
                        ?>
                         <option value="<?=@$category->id?>" ><?=@$category->course_name;?></option>
                            <?php }else{?>
                                <option value="" >Select Course </option>
                                <?php }?>
                        <?php

                            $categories =  $getFromCourse->get_multi('courses');
                            
                            foreach($categories as $cat):

                            ?>

                        <option value="<?=$cat->id?>"><?=$cat->course_name;?></option>
                        
                        <?php endforeach;?>
                       
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Due Date</label>
                    <input type="date" class="form-control" required id="exampleInputPassword1" value="<?=@$assignment->due_date?>" name="due_date">
                </div>
               
               

                <?php 
                    if(!empty($_GET['assignment'])){
                       echo '<input type="submit" name="assignment_submission" value="Update" class="btn btn-warning">';
                    }else{
                        echo '<input type="submit" name="assignment_submission" value="Save" class="btn btn-success">';
                    }
                ?>
               
            </form>

            
            <!-- END FIRST TAB CONTENT -->
        </div>

        
    </div>
</div>

</div>
<!-- // END content -->
