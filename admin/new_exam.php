<?php
    $courses = 'active';
 ?>
 <?php

    if(isset($_GET['new_exam'])){
        if(!empty($_GET['new_exam'])){
            $id = $_GET['new_exam'];

            $new_exam = $getFromCourse->get_single('exam', $id);

        }
       
    }
?> 
 
    
   <!-- Content -->
  <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable   page" style="padding-top: 60px;" >


<div class="page__heading bg-white border-bottom" data-perfect-scrollbar>
    <div class="container-fluid page__container d-flex align-items-center">
        <h1 class="mb-0">Exam Management Page</h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      
    </div>
    <div class="mb-1 ml-5">
        <a href="admin/exam/" class="badge badge-dark-gray text-white" onclick="goBack()">Back to Exams</a>
    </div>
</div>
<div class="bg-white border-bottom mb-3" data-perfect-scrollbar>
    <div class="container-fluid nav nav-tabs bg-white" role="tablist">
        <a href="#c-basic" class="active" data-toggle="tab" role="tab" aria-controls="activity_all" aria-selected="true">Exam Info.</a>
       <?php
         if(!empty($_GET['new_exam'])){
       ?>
        <a href="#c-curriculum" data-toggle="tab" role="tab" aria-selected="false">Add Question to Exam</a>
            <?php }else{?>
                <a href="" data-toggle="tab" role="tab" aria-selected="false">Add Question to Exam</a>
         <?php }?>
    </div>
</div>

<div class="container bg-white page__container" data-perfect-scrollbar>
    <div class="tab-content bg-white">
        <div class="tab-pane active show fade bg-white" id="c-basic">
            <!-- FIRST TAB CONTENT -->
            <form method="post" action="admin/new_exam/<?=@$id?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Exam Name</label>
                    <?php 
                    if(!empty($_GET['new_exam'])){  ?>
                    <input type="hidden"  value="update" name="det">
                    <input type="hidden"  value="<?=$id?>" name="ids">
                    <?php }else{ ?>
                        <input type="hidden"  value="save" name="det">
                    <?php }?>
                    <input type="text" required  class="form-control" id="exampleInputEmail1" value="<?=@$new_exam->exam_name;?>" name="exam_name" placeholder="Enter Exam name ..">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Exam Duration(Minutes)</label>
                    <input type="text" required class="form-control" id="exampleInputEmail1" name="duration" value="<?=@$new_exam->duration;?>"  placeholder="Enter Exam Duration ..">
                </div>


                <div class="form-group">
                    <label for="exampleInputEmail1">Number of Questions</label>
                    <input type="text" required class="form-control" id="exampleInputEmail1" name="question_no" value="<?=@$new_exam->question_no;?>"  placeholder="Enter Question Number ..">
                </div>
               
              
                <div class="form-group dropzone" data-select2-id="18" action="/file-upload" multiple="">
                                    <label for="select01">Exam Avatar</label>
                                    <div class="fallback">
                                        <img src="<?=BASE_URL?>admin/<?=@$new_exam->avatar;?>" class="img-thumbnail">
                                      
                                      
                                        <?php 
                    if(!empty($_GET['new_exam'])){
                       echo '<input type="file"  name="avatar"  id ="avatar" class="form-control">';
                    }else{
                        echo '<input type="file"  name="avatar"  id ="avatar" class="form-control" required>';
                    }
                ?>
                
                
                                    </div>
               
               
                </div>
                <?php 
                    if(!empty($_GET['new_exam'])){
                       echo '<input type="submit" name="exam_course" value="Update Exam" class="btn btn-warning">';
                    }else{
                        echo '<input type="submit" name="exam_course" value="Save Exam" class="btn btn-success">';
                    }
                ?>
               
            </form>

            
            <!-- END FIRST TAB CONTENT -->
        </div>


      

        <div class="tab-pane fade" id="c-curriculum" data-perfect-scrollbar>
                <!-- SECOND TAB CONTENT -->

                <div class="row">

                <div class="col-md-6">
                    <div class="card shadow-none border bg-light">
                        <div class="card-body">
                        
                      <?php /*  <form method="post" action="admin/new_exam/<?=@$id?>" enctype="multipart/form-data">
            

                            <div class="form-group">
                                <label for="exampleInputPassword1">Question</label>
                                <input type="hidden" name="exam_id" vaue="<?=$id;?>">
                                <textarea class="form-control" required id="exampleInputPassword1" name="question" placeholder="Enter course description.."><?=@$new_course->descs;?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Option One</label>
                                <input type="text" required class="form-control" id="exampleInputEmail1" name="option1"   placeholder="Enter Option One ..">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Option Two</label>
                                <input type="text" required class="form-control" id="exampleInputEmail1" name="option2"   placeholder="Enter  Option  Two ..">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Option Three</label>
                                <input type="text" required class="form-control" id="exampleInputEmail1" name="option3"   placeholder="Enter  Option Three ..">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Option Four</label>
                                <input type="text" required class="form-control" id="exampleInputEmail1" name="option4"   placeholder="Enter  Option Four ..">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Option Five</label>
                                <input type="text" required class="form-control" id="exampleInputEmail1" name="option5"   placeholder="Enter  Option Five ..">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Correct Option</label>
                                <input type="number" required class="form-control" id="exampleInputEmail1" name="correct"   placeholder="Correct Option ..">
                            </div>

                            <div class="form-group">
                        
                            <input type="submit" name="set_question" value="Save Question" class="btn btn-outline-secondary btn-lg">
                            </div>
                        

                        </form>

                        */ ?>

                            <form method="post" action="admin/new_exam/<?=@$id?>" enctype="multipart/form-data">
                                <h4 class="card-header__title">Exam Questions</h4>
                               
                                <div class="form-group dropzone" data-select2-id="18" action="/file-upload" multiple="">

                                <?php 
                                
                                    $get_upload = $getFromExam->get_question_upload($_GET['new_exam']);
                                 ///   if(!empty($get_upload)){

                                  
                                ?>
                              <!--  <p>Please Go Throught the Questions and Make Sure it Follows the standard before you <strong>Confirm</strong></p>
                                <input type="hidden" name="set_id" value="<?//=$get_upload->id;?>" >
                                <input type="submit" name="set_question" value="Confirm Questions" class="btn btn-warning btn-lg">
                                 --> <?php //}else{ ?><br> 
                                  <p>Make Sure The Questions you are Uploading Conform with the Standard as shown in the file below</p>
                                  <br><a href="document/doc/quiz.txt" target="/" class="btn btn-outline-angular">View Sample File</a>
                                  <?php //}?> 
                                    
                                                                
                                <?php 
                                $des = $_GET['new_exam'];
                                   $conten =  $getFromCourse->get_question_file($des);
                                   if(!empty($conten)){

                                ?>
                                  <a  class="btn btn-outline-success"  href="document/<?=$conten->file;?>" target="/" >Review Question</a>
                                  <?php }?>
                                  
                                  <h3 for="select01">Exam Question Review</h3>
                                    <div class="fallback">
                                        <input type="hidden" name="exam_id" value="<?=$id;?>">


                                        <?php

                                        if(!empty($get_upload)){

                                            

                                           /* $questions = $getFromExam->XtractQuestion($getFromExam->get_question_upload($_GET['new_exam'])->file);
                                            var_dump($questions);
                                            $opt= ['A','B','C','D','E'];

                                            for ($i=0; $i < count($questions); $i++)
                                            { 
                                                echo ($i +1) . '.' .$questions[$i]['question'] . '<br>';

                                                $options = $questions[$i]['options'];
                                                for ($j=0; $j < count($options) ; $j++){ 
                                                    echo $opt[$j].'.'.$options[$j].'<br>';
                                                }
                                                echo 'Answer: '.$questions[$i]['answer'].'<br>';
                                            }*/

                                        }                           
                                        
                                        ?>
                                       
                                        <input type="file"  name="question_file" id = "question_file" class="form-control" >
                                    </div>
                                </div>

                                
                                <input type="submit" name="save_question" value="Upload Question" class="btn btn-warning">
                           </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                      <h1>Questions List</h1>
                     
                        
                        	<!-- COURSE CONTENT -->
		
<!-- ACCORDION -->
<div id="accordion" role="tablist">

<?php 
    $contents =  $getFromCourse->get_single_g('question', 'exam_id', $id);
    $sn = 0;
    foreach($contents as $content):
        $sn+=1;

?>


    	<!-- CARD #2 -->
        <div class="card">

            <!-- Card Header -->
            <div class="card-header" role="tab" id="heading<?=$content->id;?>">
                <h5 class="h5-xs">
                    <a class="collapsed" data-toggle="collapse" href="#collapse<?=$content->id;?>" role="button" aria-expanded="false" aria-controls="collapse<?=$content->id;?>">
                    Question  <?=$sn;?>
                    </a>
                </h5>
               

                <!-- Header Data -->	
               
                <div class="hdr-data text-right"> 
                <form action="admin/edit_question/" method="post">
                <input type="hidden" name="exam_id" value="<?=$_GET['new_exam']?>">
                <input type="hidden" name="question_id" value="<?=$content->id;?>">
                <button type="submit" name="send_edit_det" class="btn btn-outline-warning" >Edit</button>
                
                </form>
                                        </div>
         <div class="hdr-data text-left"> 
                
         <form action="admin/new_exam/" method="post">
                <input type="hidden" name="exam_id" value="<?=$_GET['new_exam']?>">
                <input type="hidden" name="question_id" value="<?=$content->id;?>">
                <button type="submit" name="send_delete_det" class="btn btn-outline-danger" >Delete</button>
                
                </form>
           </div>

            </div>

            <!-- Card Body -->
            <div id="collapse<?=$content->id;?>" class="collapse" role="tabpanel" aria-labelledby="heading<?=$content->id;?>" data-parent="#accordion">
                <div class="card-body">



                    <!-- Text -->
                    <p><?=$content->question;?>. 
                    </p>
                    <input type="hidden" name="edit_question_id" id="edit_question_id" value="<?=$content->id;?>">

                    <!-- List -->
                    <ol class="txt-list mb-10">
                    <?php 
                                                    $question_id = $content->id;
                                                $options = $getFromExam->get_single_g('options', 'question_id', $question_id);
                                                foreach($options as $option):
                                                
                                                ?>
                        <li>
                        
                        <?=$option->options;?>  
                        <?php 
                            if($option->is_correct == 1){
                                echo ' <i class="fas fa-check" style="font-size: 20px; color:green;"></i> ';
                            }
                        ?>
                       </li>	

                        <?php endforeach;?>
                     <!--   <p class="align-right"> <a class="btn btn-outline-primary" >Edit</a></p>-->

                      
                    </ol>

                  
                
                </div>
            </div>

            </div>	<!-- END CARD #2 -->

    <?php 
    endforeach;

?>


    
    
</div>	<!-- END ACCORDION -->

</div>	<!-- END COURSE CONTENT -->

            
            
                    </div>

           
      
                 </div>
       

            <!-- END SECOND TAB -->
          
        
    </div>
</div>

</div>
<!-- // END content -->

