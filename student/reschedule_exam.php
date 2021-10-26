
 <?php 
    $exam_shedul = $getFromCourse->get_single('schedule_final', $_GET['reschedule_exam']);
                                       
 
 ?>
  <!-- Content -->
  <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


    <div class="page__heading border-bottom">
        <div class="container-fluid page__container d-flex align-items-center">
            <h3 class="mb-0">Exam Scheduling Menu</h3>
            
        </div>
    </div>


    <div class="container-fluid page__container">
        <div class="tab-content">
            <div class="tab-pane active show fade" id="c-bio">
            <form method="post" action="student/reschedule_exam/">

                <div class="row">


                    <div class="col-4 offset-2">
                        <div class="form-group">
                            <label for="country"><strong>Select  Courses</strong></label><br>
                            <select id="select01" name="course_id" data-toggle="select" required class="form-control select2-hidden-accessible" data-select2-id="select01" tabindex="-1" aria-hidden="true">
                        
                        
                                        <?php 
                                            if(!empty($_GET['reschedule_exam'])){

                                                    $coursse = $getFromCourse->get_single('courses', $exam_shedul->course_id);
                                        
                                        ?>
                                        <option value="<?=$coursse->id;?>" ><?=$coursse->course_name;?></option>
                                                <?php }else{ ?>
                                                    <option value="" >Select Course</option>
                                    
                                                <?php }?>
                                        <?php

                                    $courses =  @$getFromExam->get_student_courses($std_id);
                                    
                                    foreach($courses as $course):

                                    ?>

                                <option value="<?=@$course->id?>"><?=@$course->course_name;?></option>
                                
                                <?php endforeach;?>
                        
                            </select>

                        </div>
                    </div>


                    <div class="col-4">
                                <div class="form-group">
                                    <label for="dob">Exam Date</label>

                                    <?php 
                                            if(!empty($_GET['reschedule_exam'])){

                                                
                                        ?>
                                        <input id="hide" type="hidden" name="schedule_id" value="<?=$exam_shedul->id?>" class="form-control">
                        
                                        <input id="dob" name="starting" value="<?=$exam_shedul->exam_date?>" type="datetime-local" class="form-control" placeholder="dob" ">
                        
                                                <?php }else{ ?>
                                                    <input id="dob" name="starting" type="datetime-local" class="form-control" placeholder="dob" ">
                        
                                                <?php }?>




                                    </div>
                    
                    </div>
                </div>

            
                
                <div class="row">
                    <div class="col-6 offset-3">
                        <div class="form-group">
                            <button type="submit" name="student_reschedule_exam" class="btn btn-outline-primary btn-lg">Schedule Exam</button>
                        
                    
                        </div>
                    </div>
                </div>
                
            </form>


        
            


        </div>
        
        </div>
    </div>


    </div>
<!-- // END content -->