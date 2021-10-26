
 
 <?php

if(isset($_GET['manage_result'])){
    if(!empty($_GET['manage_result'])){
        $id = $_GET['manage_result'];

        $result_upload = $getFromCourse->get_single('user', $id);

    }
   
}
?>

<!-- Content -->
 <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


<div class="page__heading">
    <div class="container-fluid page__container">
        <h1 class="mb-0"><span style="color:red"><?=$result_upload->firstname.' '.  $result_upload->surname;?></span> Results</h1>
    </div>
</div>

<div class="container-fluid page__container">

<div class="card">
    <div class="card-header">
    <h2 class="text-center">Diploma Course Results Table</h2>
     
    </div>

    <?php 

@$result =  @$getFromGeneric->get_singly_g('student_courses', 'course_id', 2);

@$result1 =  @$getFromGeneric->get_singly_g('student_courses', 'course_id', 3);

@$result2 =  @$getFromGeneric->get_singly_g('student_courses', 'course_id', 4);
   

@$result3 =  @$getFromGeneric->get_singly_g('student_courses', 'course_id', 5);

@$result4 =  @$getFromGeneric->get_singly_g('student_courses', 'course_id', 6);

@$result5 =  @$getFromGeneric->get_singly_g('student_courses', 'course_id', 7);
   
if(!empty($result) OR !empty($result1) OR !empty($result2)  OR !empty($result3) OR !empty($result4) OR !empty($result5) ){
 ?>

        <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values="[&quot;js-lists-values-employee-name&quot;]">

            <table class="table mb-0 thead-border-top-0">
                <thead>
                    <tr>

                        <th style="width: 18px;">
                           S/N
                        </th>

                        <th>Course Name</th>
                        <th>Module 1</th>
                   <th>Module 2</th>
                        <th>Module 3</th>
                        <th>Final Score</th>
                        <th>Total Score</th>                        
                        <th>Final Grade</th>
                        <th style="width: 150px;">Action</th>
                        
                    </tr>
                </thead>
                <tbody class="list" id="staff">
                <?php

                   $result =  $getFromGeneric->get_single_g('student_courses', 'student_id', $id);
                        $sn = 0;
                       // var_dump($result);
                   foreach($result as $resul):
                    if($resul->course_id != 2 AND $resul->course_id != 3 AND $resul->course_id != 4 AND $resul->course_id != 5 AND $resul->course_id != 6 AND $resul->course_id != 7){
                        continue;
                    }
                    $result_exam = $getFromExam->get_std_results_dip($resul->student_id, $resul->course_id);
                  
                    //var_dump($result_exam);
                    $total = $result_exam->module_1 + $result_exam->module_2 + $result_exam->module_3 + $result_exam->final;
                    
                    $sn +=1;

                ?>

                
                    <tr class="selected" >
                        <td>
                           <?=$sn;?>
                        </td>
                        <td>
                        <?php 
                          $courses = @$getFromGeneric->get_single('courses', $resul->course_id);

                          echo @$courses->course_name;
                        ?>

                           

                        </td>


                        <td> 
                        <?=@$result_exam->module_1;?>                     
                        </td>

                       <td>     
                        <?=@$result_exam->module_2;?>                       
                        </td>

                        <td> 
                        <?=@$result_exam->module_3;?>                           
                        </td>
                   
                     
                        <td> 
                        <?=@$result_exam->final;?>                           
                        </td>
                        <td> 
                            <?=@$total;?>                           
                        </td>
                         <td> 
                        <?=@$result_exam->final_grade;?>                           
                        </td>

                      <!--  <td>
                       
                             <a class="btn btn-outline-info" href="admin/student/open_file.php?id=<?//=$resul->id?>&type=result">Open File</a>
                           
                         
                        </td>-->
                         <td>
                         <?php 
                         if(!empty($result_exam)){ ?>
                            <a class="btn btn-outline-warning" href="admin/student/result_upload_dip.php?res_id=<?=@$result_exam->id?>">Edit Result</a>
                            <?php }else{ ?>
                            <a class="btn btn-outline-success" href="admin/student/result_upload_dip.php?std=<?=@$resul->student_id;?>&course_id=<?=@$resul->course_id;?>">Add Result</a>
                            <?php }?>
                        </td>
                      
                       
                        
                    </tr>
                 
                <?php endforeach; ?>
                    
                  

                </tbody>
            </table>
        </div>

   <?php  } ?>


</div>








    <div class="card">
        
        <div class="card-header">
      <h2 class="text-center">Student Course Results Table</h2>
            
        </div>

        <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values="[&quot;js-lists-values-employee-name&quot;]">

            <table class="table mb-0 thead-border-top-0">
                <thead>
                    <tr>

                        <th style="width: 18px;">
                           S/N
                        </th>

                        <th>Course Name</th>
                        <th>Module </th>
                      <!--  <th>Module 2</th>
                        <th>Module 3</th>-->
                        <th>Grade</th>

                         <th style="width: 150px;">Action</th>
                        
                    </tr>
                </thead>
                <tbody class="list" id="staff">
                <?php

                   $result =  $getFromGeneric->get_single_g('student_courses', 'student_id', $id);
                        $sn = 0;
                      
                       // var_dump($result);
                   foreach($result as $resul):
                    $result_exam = $getFromExam->get_std_results($resul->student_id, $resul->course_id);
                   //var_dump($result_exam);

                   if($resul->course_id == 2 OR $resul->course_id == 3 OR $resul->course_id == 4 OR $resul->course_id == 5 OR $resul->course_id == 6 OR $resul->course_id == 7){
                    continue;
                }
                    $sn +=1;
                ?>

                
                    <tr class="selected" >
                        <td>
                           <?=$sn;?>
                        </td>
                        <td>
                        <?php 
                          $courses = @$getFromGeneric->get_single('courses', $resul->course_id);

                          echo @$courses->course_name;
                        ?>

                           

                        </td>


                        <td> 
                        <?=@$result_exam->module;?>                     
                        </td>

                      <?php /*  <td>     
                        <?=@$result_exam->module_2;?>                       
                        </td>

                        <td> 
                        <?=@$result_exam->module_3;?>                           
                        </td>
                    */?>
                        <td> 
                        <?=@$result_exam->module_g;?>                           
                        </td>

                      <!--  <td>
                       
                             <a class="btn btn-outline-info" href="admin/student/open_file.php?id=<?//=$resul->id?>&type=result">Open File</a>
                           
                         
                        </td>-->
                         <td>
                         <?php 
                         if(!empty($result_exam)){ ?>
                            <a class="btn btn-outline-warning" href="admin/student/result_upload.php?res_id=<?=@$result_exam->id?>">Edit Result</a>
                            <?php }else{ ?>
                            <a class="btn btn-outline-success" href="admin/student/result_upload.php?std=<?=@$resul->student_id;?>&course_id=<?=@$resul->course_id;?>">Add Result</a>
                            <?php }?>
                        </td>
                      
                       
                        
                    </tr>
                 
                <?php endforeach; ?>
                    
                  

                </tbody>
            </table>
        </div>

     


    </div>

</div>


</div>
<!-- // END content -->