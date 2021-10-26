
  <!-- Content -->
  <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


<div class="page__heading border-bottom">
    <div class="container-fluid page__container d-flex align-items-center">
        <h3 class="mb-0">Student Course Registration</h3>
        
    </div>
</div>


<div class="container-fluid page__container">
    <div class="tab-content">
        <div class="tab-pane active show fade" id="c-bio">
        <form method="post" action="admin/register-course">

<div class="row">


        <div class="col-3 offset-2">
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


        <div class="col-3">
            <div class="form-group">
                <label for="country"><strong>Select  Courses</strong></label><br>
                <select id="select01" name="course_id" data-toggle="select" required class="form-control select2-hidden-accessible" data-select2-id="select01" tabindex="-1" aria-hidden="true">
            
            
            
                            <option value="" >Select Course to Assign</option>
                            
                            <?php

                        $courses =  @$getFromCourse->get_multi('courses');
                        
                        foreach($courses as $course):

                        ?>

                    <option value="<?=@$course->id?>"><?=@$course->course_name;?></option>
                    
                    <?php endforeach;?>
            
                </select>

            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="country"><strong>Payment Status</strong></label><br>
                <select id="select01" name="pay_status" data-toggle="select" required class="form-control select2-hidden-accessible" data-select2-id="select01" tabindex="-1" aria-hidden="true">
            
            
            
                           
                <option value="" >Select Status</option>
                                                <option value="full_pay" >Fully Paid</option>
                                                <option value="band_1" >Band One</option>
                                                <option value="band_2" >Band Two</option>
                                                <option value="due">Yet to Pay</option>
                                                <option value="free_access" >Free Access</option>

                            
                        
            
                </select>

            </div>
        </div>

        <div class="col-6 offset-3">
            <div class="form-group">
                   <button type="submit" name="register_course_for_student1" class="btn btn-outline-primary btn-lg">Register Course</button>
            
        
            </div>
        </div>
    </div>
    </form>
        </div>

        


     
      
    </div>
</div>


</div>
<!-- // END content -->