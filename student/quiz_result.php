<?php
    $result = 'active';
 ?>
  <!-- Content -->
  <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


<div class="page__heading">
    <div class="container-fluid page__container">
        <h1 class="mb-0"> Exams Results</h1>
    </div>
</div>

<div class="container-fluid page__container">
    <div class="card">
        
        <div class="card-header">
            <form class="form-inline">
                <label class="mr-sm-2" for="inlineFormFilterBy">Filter by:</label>
                <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormFilterBy" placeholder="Type a name">

                <label class="sr-only" for="inlineFormRole">Role</label>
              

                

                <button type="button" class="btn btn-primary ml-auto">
                    <i class="material-icons mr-1">launch</i> Export
                </button>
            </form>
            
        </div>
        


        <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values="[&quot;js-lists-values-employee-name&quot;]">

            <table class="table mb-0 thead-border-top-0">
                <thead>
                    <tr>
                        <th>S/N</th>                       
                        <th>Course Name</th>
                        <th >Number of Question</th> 
                        <th >Result</th>
                        <th >Percentage</th>
                        <th>Exam Date</th>                      
                       
                    </tr>
                </thead>







                <tbody class="list" id="staff">




                <?php 



                        
                        $results =$getFromCourse->get_exam_mock($_GET['quiz_result'], $_SESSION['login_id']);
                        $sn = 0;
                        //var_dump($results);
                        foreach($results as $result):
                            $sn +=1;
                                          ?>

                    <tr class="selected">

                    <td><?=$sn;?></td>

                       
                        <td>

                            <div class="media align-items-center">
                                <div class="media-body">

                                    <span class="js-lists-values-employee-name"><?=@$getFromCourse->get_single('courses', $getFromCourse->get_single('course_exam', $result->exam_id)->course_id)->course_name;?></span>

                                </div>
                            </div>

                        </td>
                        <td>
                        
                        <?=$getFromCourse->get_single('exam', $result->exam_id)->question_no;?>
                       
                       
                       </td>
                        
                        <td>
                        <?php

                            $student_id = $_SESSION['login_id'];
                            $exam = $result->exam_id;
                            $round = $result->round;
                            $question_no = $getFromCourse->get_single('exam', $result->exam_id)->question_no;

                            $get_result = $getFromCourse->get_sum_result($student_id, $exam, $round);
                          echo $get_result;
                        
                        ?>
                        </td>
                        <td>
                        <?php

                            $student_id = $_SESSION['login_id'];
                            $exam = $result->exam_id;
                            $round = $result->round;
                            $question_no = $getFromCourse->get_single('exam', $result->exam_id)->question_no;

                            $get_result = $getFromCourse->get_sum_result($student_id, $exam, $round);
                            //$get_count_row = $getFromCourse->get_count_row_result($student_id, $exam, $round);
                            $percent = ($get_result / $question_no) * 100;
                           echo $percent.'%';
                           //echo $get_result;
                        
                        ?>
                        </td>
                        <td>
                        <?=$result->date_created;?>
                         </td>
                      
                       
                    </tr>
                    
                  

                    
                <?php endforeach; ?>
                </tbody>


            </table>



        </div>






      <!--  <div class="card-body text-right">
            15 <span class="text-muted">of 1,430</span> <a href="#" class="text-muted-light"><i class="material-icons ml-1">arrow_forward</i></a>
        </div>-->







    </div>

</div>


</div>
<!-- // END content -->