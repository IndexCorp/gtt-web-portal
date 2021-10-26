<?php
    $courses = 'active';
 ?>
 <?php

    if(isset($_POST['send_edit_det'])){
            $id = $_POST['question_id'];

            $exam_id = $_POST['exam_id'];

            $edit_question = @$getFromExam->get_single('question', $id);
           
            $get_options = @$getFromExam->get_single_g('options','question_id', $id);
            $get_attach = @$getFromExam->get_singly_g('attachement','question_id', $id);

      
    }
?>  
   <!-- Content -->
  <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


<div class="page__heading border-bottom">
    <div class="container-fluid page__container d-flex align-items-center">
        <h1 class="mb-0">Edit Question Page</h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     
    </div>
    <div class="mb-1 ml-5">
        <a href="admin/new_exam/<?=$exam_id?>" class="badge badge-dark-gray text-white" onclick="goBack()">Back to Exam Management</a>
    </div>
</div>
<div class="bg-white border-bottom mb-3">
   
</div>

<div class="container page__container">
    <div class="tab-content">
        <div class="tab-pane active show fade" id="c-basic">
            <!-- FIRST TAB CONTENT -->
            <form method="post" action="admin/edit_question/<?=@$id?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Question</label>
                     <h4>
                  <?=@$edit_question->question;?></h4>
                   <?php /* <input type="hidden"  value="update" name="det">
                    <input type="hidden"  value="<?=$id?>" name="ids">
                    <?php }else{ ?>
                        <input type="hidden"  value="save" name="det">*/?>
                            </div>
               
               
                <div class="form-group">
                    <label for="exampleInputPassword1">Options</label>
                    <?php 
                        $sn = 0;
                        foreach($get_options as $option): 
                            $sn +=1;                 
                    
                    
                    ?>
                    <?php 
                    if($option->is_correct == 1){
                        $color = 'green';
                    }else{
                        $color = 'black';
                    }
                    ?>
                    <h5 style="color: <?=@$color;?>"><?=$sn . ').  ' . $option->options;?></h5>

                    <?php endforeach; ?>
                </div>
                
             



                                <div class="form-group dropzone" data-select2-id="18" action="/file-upload" multiple="">
                                    <label for="select01">Image Instruction</label>
                                    <div class="fallback">
                                       
                                        <input type="text"  name="instruction" class="form-control" value="<?=@$get_attach->title?>" required>
                                    </div>
                                </div>

                                <div class="form-group dropzone" data-select2-id="18" action="/file-upload" multiple="">
                                    <label for="select01">Upload Instruction</label>
                                    <div class="fallback">
                                       
                                        <input type="file"  name="file" id = "doc" class="form-control" required>
                                    </div>
                                </div>

                                <?php 
                                if(!empty($get_attach)){

                                
                                ?>
                                 <div class="form-group dropzone" data-select2-id="18" action="/file-upload" multiple="">
                                    <label for="select01">Preview Image</label>
                                    <div class="fallback">
                                       
                                        <img  src="admin/<?=$get_attach->file;?>">
                                    </div>
                                </div>
                                <?php }?>
               
               

                <?php 
                   if(!empty($get_attach)){

                    
                   ?>

                <input type="hidden"  value="update" name="det">
                <input type="hidden" name="submit_id" value="<?=@$get_attach->id?>">
                   
                <input type="hidden"  value="<?=$id?>" name="question_id">
                <input type="hidden"  value="<?=$exam_id?>" name="exam_id">
                     
                   <input type="submit" name="edit_question_admin" value="Replace Image" class="btn btn-warning">
                  <?php 
                    }else{
                        ?>
                         <input type="hidden"  value="<?=$id?>" name="question_id">
                         <input type="hidden" name="submit_id" value="<?=@$get_attach->id?>">
                   
                           <input type="hidden"  value="save" name="det">
                                    
                            <input type="hidden"  value="<?=$id?>" name="question_id">
                            <input type="hidden"  value="<?=$exam_id?>" name="exam_id">
                     
                  
                        <input type="submit" name="edit_question_admin" value="Upload File" class="btn btn-success">
                   <?php } ?>
              
            </form>

            
            <!-- END FIRST TAB CONTENT -->
        </div>

        
    </div>
</div>

</div>
<!-- // END content -->
