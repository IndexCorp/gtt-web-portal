<?php
    $courses = 'active';
 ?>
 <?php

    if(isset($_GET['submit_ass'])){
        if(!empty($_GET['submit_ass'])){
            $id = $_GET['submit_ass'];

            $submit_ass = $getFromCourse->get_single('assignment', $id);

            $submit_ass_st = $getFromCourse->assignment_sub_check($std_id, $id);

        }
       
    }
?>  
   <!-- Content -->
  <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


<div class="page__heading border-bottom">
    <div class="container-fluid page__container d-flex align-items-center">
        <h1 class="mb-0">Assignment Submition Page</h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     
    </div>
    <div class="mb-1 ml-5">
        <a href="student/assignment/" class="badge badge-dark-gray text-white" onclick="goBack()">Back to Assignment</a>
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
            <form method="post" action="student/submit_ass/<?=@$id?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Assignment Title</label>
                    <?php 
                    if(!empty($_GET['submit_ass'])){  ?>
                    <h4><?=@$submit_ass->title;?></h4>
                   <?php /* <input type="hidden"  value="update" name="det">
                    <input type="hidden"  value="<?=$id?>" name="ids">
                    <?php }else{ ?>
                        <input type="hidden"  value="save" name="det">*/?>
                    <?php }?>
                            </div>
               
               
                <div class="form-group">
                    <label for="exampleInputPassword1">Assignment Question</label>
                    <h4 ><?=@$submit_ass->question;?></h4>
                </div>
                
                <div class="form-group">
                    <label for="exampleInputPassword1">Due Date</label>
                    <h4><?=$submit_ass->due_date?></h4>
                </div>



                                <div class="form-group dropzone" data-select2-id="18" action="/file-upload" multiple="">
                                    <label for="select01">Upload Assignment</label>
                                    <div class="fallback">
                                       
                                        <input type="file"  name="file" id = "doc" class="form-control" required>
                                    </div>
                                </div>

                                <?php 
                                if(!empty($submit_ass_st)){

                                
                                ?>
                                 <div class="form-group dropzone" data-select2-id="18" action="/file-upload" multiple="">
                                    <label for="select01">Preview Assignment</label>
                                    <div class="fallback">
                                       
                                        <a class="btn btn-outline-primary" target="/" href="admin/<?=$submit_ass_st->file;?>">Open File</a>
                                    </div>
                                </div>
                                <?php }?>
               
               

                <?php 
                   if(!empty($submit_ass_st)){

                    
                   ?>

                <input type="hidden"  value="update" name="det">
                <input type="hidden" name="submit_id" value="<?=@$submit_ass_st->id?>">
                   
                    <input type="hidden"  value="<?=$id?>" name="assignment_id">
                     
                   <input type="submit" name="assignment_submission_student" value="Replace Assignment" class="btn btn-warning">
                  <?php 
                    }else{
                        ?>
                         <input type="hidden"  value="<?=$id?>" name="assignment_id">
                         <input type="hidden" name="submit_id" value="<?=@$submit_ass_st->id?>">
                   
                           <input type="hidden"  value="save" name="det">
                  
                        <input type="submit" name="assignment_submission_student" value="Upload Assignment" class="btn btn-success">
                   <?php } ?>
              
            </form>

            
            <!-- END FIRST TAB CONTENT -->
        </div>

        
    </div>
</div>

</div>
<!-- // END content -->
