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


<?php 

$result =  $getFromGeneric->get_singly_g('student_courses', 'course_id', 2);

$result1 =  $getFromGeneric->get_singly_g('student_courses', 'course_id', 3);

$result2 =  $getFromGeneric->get_singly_g('student_courses', 'course_id', 4);   

$result3 =  $getFromGeneric->get_singly_g('student_courses', 'course_id', 5);

$result4 =  $getFromGeneric->get_singly_g('student_courses', 'course_id', 6);

$result5 =  $getFromGeneric->get_singly_g('student_courses', 'course_id', 7);
   
if(!empty($result) OR !empty($result1) OR !empty($result2)  OR !empty($result3) OR !empty($result4) OR !empty($result5) ){
 ?>


    <div class="card">
    <div class="card-header">
        <h1>Diploma Course Result</h1>
    </div>
        
      
        


 
        <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values="[&quot;js-lists-values-employee-name&quot;]">

            <table class="table mb-0 thead-border-top-0">
                <thead>
                    <tr>
                        <th>Course Name</th>
                        <th>Module 1</th>
                        <th>Module 2</th>
                        <th>Module 3</th>
                        <th>Final Exam </th>
                        <th>Total</th>
                        <th>Final Exam Grade</th>
                        
                    </tr>
                </thead>







                <tbody class="list" id="staff">




                <?php 



                        
                        $results =$getFromCourse->get_single_g('diploma_result', 'student_id', $_SESSION['login_id']);
                        
                        foreach($results as $result):
                            if($result->course_id != 2 AND $result->course_id != 3 AND $result->course_id != 4 AND $result->course_id != 5 AND $result->course_id != 6 AND $result->course_id != 7){
                                continue;
                            }
        $total =  $result->module_1 +$result->module_2 + $result->module_3 + $result->final;
                           
                                          ?>

                    <tr class="selected">

                       
                        <td>

                            <div class="media align-items-center">
                                <div class="media-body">

                                    <span class="js-lists-values-employee-name"><?=$getFromCourse->get_single('courses', $result->course_id)->course_name;?></span>

                                </div>
                            </div>

                        </td>
                        <td><?=@$result->module_1?></td>
                        
                        <td>
                        <?=@$result->module_2?>
                        </td>
                        <td>
                        <?=@$result->module_3?>
                        </td>
                        <td>
                        <?=@$result->final?>
                        </td>
                        <td>
                        <?=$total?>
                        </td>
                        <td>
                        <?=@$result->final_grade?>
                        </td>
                       
                    </tr>
                    
                  

                    
                <?php endforeach; ?>
                </tbody>


            </table>



        </div>
</div>
<?php }?>
        <div class="card">
  
        <div class="card-header">
        <h1>Course Result</h1>
    </div>
        
      
        

        <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values="[&quot;js-lists-values-employee-name&quot;]">

            <table class="table mb-0 thead-border-top-0">
                <thead>
                    <tr>
                        <th>Course Name</th>
                        <th >Module Score</th>
                        <th >Grade</th>
                       
                    </tr>
                </thead>







                <tbody class="list" id="staff">




                <?php 



                        
                        $results =$getFromCourse->get_single_g('result', 'student_id', $_SESSION['login_id']);
                        //var_dump($results);
                        foreach($results as $result):
                            if($result->course_id == 2 OR $result->course_id == 3 OR $result->course_id == 4 OR $result->course_id == 5 OR $result->course_id == 6 OR $result->course_id == 7){
                                continue;
                            }
                                          ?>

                    <tr class="selected">

                       
                        <td>

                            <div class="media align-items-center">
                                <div class="media-body">

                                    <span class="js-lists-values-employee-name"><?=$getFromCourse->get_single('courses', $result->course_id)->course_name;?></span>

                                </div>
                            </div>

                        </td>
                        <td><?=@$result->module?></td>
                        
                      
                        <td>
                        <?=@$result->module_g?>
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