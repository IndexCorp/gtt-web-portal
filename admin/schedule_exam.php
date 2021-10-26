
 
  <!-- Content -->
  <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


<div class="page__heading border-bottom">
    <div class="container-fluid page__container d-flex align-items-center">
        <h3 class="mb-0">Assign Exam to Courses</h3>
        
    </div>
</div>


<div class="container-fluid page__container">
    <div class="tab-content">
        <div class="tab-pane active show fade" id="c-bio">
        <form method="post" action="admin/schedule_exam/">

            <div class="row">


                <div class="col-4 offset-2">
                    <div class="form-group">
                        <label for="country"><strong>Select Exam</strong></label><br>
                        <select id="select01" name="exam_id" data-toggle="select" required class="form-control select2-hidden-accessible" data-select2-id="select01" tabindex="-1" aria-hidden="true">
                    
                    
                    
                                    <option value="" >Select Exam</option>
                                    
                                    <?php

                                $exams =  @$getFromExam->get_mult_exams();
                                
                                foreach($exams as $exam):

                                ?>

                            <option value="<?=@$exam->id?>"><?=@$exam->exam_name ?></option>
                            
                            <?php endforeach;?>
                    
                        </select>

                    </div>
                </div>


                <div class="col-4">
                    <div class="form-group">
                        <label for="country"><strong>Select  Courses</strong></label><br>
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
            </div>

          <!--  <div class="row">


                <div class="col-4 offset-2">
                            <div class="form-group">
                                <label for="dob">Starting Date</label>
                                <input id="dob" name="starting" type="date" class="form-control" placeholder="dob" value="<?//=@$get_student->dob;?>">
                            </div>
                </div>


                <div class="col-4">
                            <div class="form-group">
                                <label for="dob">End Date</label>
                                <input id="dob" name="ending" type="date" class="form-control" placeholder="dob" value="<?//=@$get_student->dob;?>">
                            </div>
                </div>

            </div>-->
            <?php 
                    if(isset($_SESSION['super_admin'])  OR isset($_SESSION['course'])){
                
                ?>
            <div class="row">
                <div class="col-6 offset-3">
                    <div class="form-group">
                        <button type="submit" name="create_schedule_exam" class="btn btn-outline-primary btn-lg">Assign Exam</button>
                    
                
                    </div>
                </div>
            </div>
            <?php }?>
            
        </form>


        <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values="[&quot;js-lists-values-employee-name&quot;]">

        <table class="table mb-0 thead-border-top-0">
            <thead>
                <tr>

                    <th style="width: 18px;">
                    S/N
                    </th>

                    <th>Exam Name</th>
                    <th >Course</th>
                  <!--  <th >Start Date</th>
                    <th >End Date</th>-->
                    <?php 
                    if(isset($_SESSION['super_admin'])  OR isset($_SESSION['course'])){
                
                ?>
                    <th >Action</th>
                    <th >Manage</th>
                <?php }?>
                </tr>
            </thead>
            <tbody class="list" id="staff">
            <?php

            /* $students =  $getFromGeneric->get_multi('user');
                    $sn = 0;
            foreach($students as $student):
                $sn +=1;*/
            ?>


            <?php 



            if(isset($_GET['schedule_exam'])){
            
                    $limit = 10;
                if($_GET['schedule_exam'] == 0){
                        $page = 1;
                    $offset = (($page - 1)* $limit );
                }else{
                    $page = $_GET['schedule_exam'];
                    $offset = (($page - 1)* $limit );
                }

                $cur =  $paginations =$getFromCourse->pagination_lower('course_exam', $offset, $limit);

                $lower = ($page - 1) * $limit + $cur;
                $uper = $getFromCourse->pagination_count('course_exam');


                
                
                $paginations =$getFromCourse->pagination('course_exam', $offset, $limit, 'end_date');
                $sn = 0;
                //var_dump($paginations);
                foreach($paginations as $schedule):
                    $sn +=1;
            


            ?>
            
                <tr class="selected" >
                    <td>
                    <?=$sn;?>
                    </td>
                    <td>

                        <div class="media align-items-center">
                            
                            <div class="media-body">

                               
                        <span ><?=@$getFromGeneric->get_single('exam', $schedule->exam_id)->exam_name;?></span>
                    
                            </div>
                        </div>

                    </td>
                    <td>
                   
                        <span class="badge badge-soft-info"><?=$getFromGeneric->get_single('courses', $schedule->course_id)->course_name;?></span>
                    
                     
                    </td>

                   <!-- <td>

                    <span ><?//=$schedule->start_date;?></span>
                    
                     

                    </td>

                    <td>

                    <span ><?//=$schedule->end_date;?></span>

                    delete_schedule_exam

                    </td>-->

                    <?php 
                    if(isset($_SESSION['super_admin'])  OR isset($_SESSION['course'])){
                
                ?>
                 <td> 
                  
                    <form method="POST" action="admin/schedule_exam">
                        <input type="hidden" name="schedule_id"  value="<?= $schedule->id;?>">
                           <button name="delete_schedule_exam" type="submit" class="btn btn-outline-danger">Delete</a>
                    </form>  
                     </td>
                    <td>
                  
                    <form method="POST" action="admin/schedule_exam">
                        <input type="hidden" name="exam_id"  value="<?= $schedule->exam_id;?>">
                        <input type="hidden" name="course_id"  value="<?= $schedule->course_id;?>">
                        <input type="hidden" name="start_date"  value="<?= $schedule->start_date;?>">
                            <button name="notify_student_exam" type="submit" class="btn btn-outline-primary">Notify Students</a>
                    </form>   
                    </td>
                    <?php }?>    
                  
                   <!-- <td> 
                        <a class="btn btn-outline-success" href="admin/create_schedule/<?= $schedule->id;?>">Postpone</a>
                    </td>-->
                
                    
                    
                </tr>
            
            <?php endforeach; }?>
                
            

            </tbody>
        </table>
        </div>

        <div class="card-body text-right">
        <div class="ml-auto">
                            <?php 
                                if($page == 1){

                            
                            ?>
                            <?php }else{
                                    ?> 

                        <a href="admin/schedule_exam/<?=$page - 1?>" class=""><i class="material-icons float-left">arrow_backward</i></a>
                        <?php }?>
                        <?=$lower;?> <span class=" text-center text-black">of  <?=$uper;?></span>
                            
                        
                            <?php 
                                if($lower == $uper){

                            
                            ?>
                                <?php }else{
                                    ?> 
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href="admin/student/<?=$page + 1?>" class=""><i class="material-icons float-right">arrow_forward</i></a>
                                    <?php }?>

                            </div>
        </div>
                </div>

        


     
      
    </div>
</div>


</div>
<!-- // END content -->