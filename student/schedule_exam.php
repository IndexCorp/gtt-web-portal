
 
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
        <form method="post" action="student/schedule_exam/">

            <div class="row">


                <div class="col-4 offset-2">
                    <div class="form-group">
                        <label for="country"><strong>Select  Courses</strong></label><br>
                        <select id="select01" name="course_id" data-toggle="select" required class="form-control select2-hidden-accessible" data-select2-id="select01" tabindex="-1" aria-hidden="true">
                    
                    
                    
                                    <option value="" >Select Course</option>
                                    
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
                                <input id="dob" name="starting" type="datetime-local" class="form-control" placeholder="dob" >
                            </div>
                 
                </div>
            </div>

           
            
            <div class="row">
                <div class="col-6 offset-3">
                    <div class="form-group">
                        <button type="submit" name="tudent_schedule_exam" class="btn btn-outline-primary btn-lg">Schedule Exam</button>
                    
                
                    </div>
                </div>
            </div>
            
        </form>


        <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values="[&quot;js-lists-values-employee-name&quot;]">

        <table class="table mb-0 thead-border-top-0">
            <thead>
                <tr>

                    <th style="width: 18px;">
                    S/N
                    </th>

                    <th>Course</th>
                    <th >Exam Date</th>
                     <th style="width: 150px;">Status</th>
                     <th style="width: 150px;">Action</th>
                
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
                $std_id = $_SESSION['login_id'];
            
                    $limit = 10;
                if($_GET['schedule_exam'] == 0){
                        $page = 1;
                    $offset = (($page - 1)* $limit );
                }else{
                    $page = $_GET['schedule_exam'];
                    $offset = (($page - 1)* $limit );
                }

                $cur =  $paginations =$getFromCourse->pagination_lower_schedule_exam($std_id, $offset, $limit);

                $lower = ($page - 1) * $limit + $cur;
                $uper = $getFromCourse->pagination_count_schedule_exam($std_id);


                
                
                $paginations =$getFromCourse->pagination_schedule_exam($std_id, $offset, $limit, 'exam_date');
                //var_dump($paginations);
                $sn = 0;
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

                               
                        <span ><?=$getFromGeneric->get_single('courses', $schedule->course_id)->course_name;?></span>
                    
                            </div>
                        </div>

                    </td>
                   

                    <td>

                    <span ><?php 
                        if($schedule->postpone == 1){
                            echo $schedule->post_date;
                        }else{
                            echo $schedule->exam_date;
                        }
                ?></span>
                    
                     

                    </td>
                    <td>

                        <span ><?php 
                            if($schedule->approve == 1){
                            ?>
                              <span class="badge badge-soft-success">Approved</span>
                    <?php }elseif($schedule->approve == 2){?>
                        <span class="badge badge-soft-info"> Not Approved </span>
                

                     </span>
                       <?php }else{?>
                        <span class="badge badge-soft-warning"> Under Review</span>
                

                       <?php }?></span>

                    

                    </td>

                

                    <td> 
                    <form method="POST" action="student/schedule_exam">
                        <input type="hidden" name="exam_id"  value="<?= $schedule->id;?>">
                        <?php
                            if($schedule->taken == 1){
                        ?>
                         <a    class="btn btn-outline-warning text-warning">Taken</a>
                         <?php }else{ ?>
                            <button  name="student_mark_exam" type="submit" class="btn btn-outline-primary">Mark as Taken</button>
                        
                         <?php }?>
                    </form>   
                    </td>

                    <td> 
                    <?php 

                                            
                        $yea = date('Y');
                        $mont = date('m');
                        $day = date('d');


                        $check  = $getFromGeneric->get_single('schedule_final', $schedule->id);
                        $checky = $getFromGeneric->get_schedule_year($schedule->id);
                        $checkm = $getFromGeneric->get_schedule_month($schedule->id);
                        $checkd = $getFromGeneric->get_schedule_day($schedule->id);

                        $actual = $chck = (strtotime($check->exam_date) * 1000);
                        $chck = (strtotime($check->exam_date) * 1000) -  172800000;
                        $chcktoday = (strtotime(date("Y-m-d h:i:sa")) * 1000) ;

                        if($chcktoday > $chck and $chcktoday <= $actual){

                           
                                ?>
                                 <a class="btn btn-success"  href="student/reschedule_exam/<?=$schedule->id;?>"> Re-Schedule  </a>
                 
                                
                                <?php 



                    
                    }else{
                        echo ' <a class="btn btn-outline-primary" id="confirm_reschedule" >Re-Schedule</a>
                        ';
                    }

                     
                    ?>
                          </td>
                
                    
                    
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

                        <a href="student/schedule_exam/<?=$page - 1?>" class=""><i class="material-icons float-left">arrow_backward</i></a>
                        <?php }?>
                        <?=$lower;?> <span class=" text-center text-black">of  <?=$uper;?></span>
                            
                        
                            <?php 
                                if($lower == $uper){

                            
                            ?>
                                <?php }else{
                                    ?> 
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href="student/<?=$page + 1?>" class=""><i class="material-icons float-right">arrow_forward</i></a>
                                    <?php }?>

                            </div>
        </div>
                </div>

        


     
      
    </div>
</div>


</div>
<!-- // END content -->