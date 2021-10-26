
 
  <!-- Content -->
  <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


<div class="page__heading border-bottom">
    <div class="container-fluid page__container d-flex align-items-center">
        <h3 class="mb-0">Exam Scheduling Menu</h3>
        
    </div>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="admin/schedule_list/" class="badge badge-dark-gray text-white">View Schedule List</a>
       
</div>


<div class="container-fluid page__container">
    <div class="tab-content">
        <div class="tab-pane active show fade" id="c-bio">
        <form method="post" action="admin/schedule_for_student/">

            <div class="row">


                <div class="col-4 offset-2">
                <div class="form-group">
                <label for="country"><strong>Select Student</strong></label><br>
                <select id="select01" name="student_id" data-toggle="select" required class="form-control select2-hidden-accessible" data-select2-id="select01" tabindex="-1" aria-hidden="true">
            
            
            
                            <option value="" >Select Student</option>
                            
                            <?php

                        $students =  @$getFromCourse->get_mult_students();
                        
                        foreach($students as $student):

                        ?>

                    <option value="<?=@$student->id?>"><?=@$student->firstname .' '.@$student->surname;?></option>
                    
                    <?php endforeach;?>
            
                </select>

            </div>
                </div>


                <div class="col-4">
                    <div class="form-group">
                        <label for="country"><strong>Select  Course</strong></label><br>
                        <select id="select01" name="course_id" data-toggle="select" required class="form-control select2-hidden-accessible" data-select2-id="select01" tabindex="-1" aria-hidden="true">
                    
                    
                    
                                    <option value="" >Select Course</option>
                                    
                                    <?php

                                $courses =  @$getFromExam->get_mult_courses();
                                
                                foreach($courses as $course):

                                ?>

                            <option value="<?=@$course->id?>"><?=@$course->course_name;?></option>
                            
                            <?php endforeach;?>
                    
                        </select>

                    </div>
                </div>


                <div class="col-4 offset-2">
                            <div class="form-group">
                                <label for="dob">Exam Date</label>
                                <input id="dob" name="starting" type="date" class="form-control" placeholder="dob" value="<?=@$get_student->dob;?>">
                            </div>
                 
                </div>
            </div>

           
            
            <div class="row">
                <div class="col-6 offset-3">
                    <div class="form-group">
                        <button type="submit" name="admin_schedule_exam_for_student" class="btn btn-outline-primary btn-lg">Schedule Exam</button>
                    
                
                    </div>
                </div>
            </div>
            
        </form>


      
                </div>

        


     
      
    </div>
</div>


</div>
<!-- // END content -->