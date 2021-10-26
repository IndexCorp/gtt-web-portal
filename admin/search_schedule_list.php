<?php
    $student = 'active';
 ?>
 <!-- Content -->
  <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


<div class="page__heading">
    <div class="container-fluid page__container">
        <h1 class="mb-0">Schedule List</h1>
      
    </div>
</div>

<div class="container-fluid page__container">
    <div class="card">
        
        <div class="card-header">
        <form class="form-inline" method="post" id="schedule_search_form">
                <label class="mr-sm-2" for="inlineFormFilterBy">Filter by:</label>
                <div class="search-form mr-3 search-form--light">

                <input type="text" name="schedule_search" class="form-control" placeholder="Search " id="schedule_search">
                    <input class="btn " name="submit_search" value="" type="submit"><i type="submit" id="search_btn_sch" class="btn material-icons">search</i>
               
                </div><label class="sr-only" for="category_search">Role</label>
                <div class="custom-control mb-2 mr-sm-2 mb-sm-0">
                <?php 
                    if(isset($_SESSION['super_admin'])){
                
                ?>   <a href="admin/schedule_for_student/"  class="btn btn-outline-primary ml-auto">
                   Schedule for Student
                </a>
                <?php }?>
                </div>

               
            </form>
            
        </div>


        <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values="[&quot;js-lists-values-employee-name&quot;]">

            <table class="table mb-0 thead-border-top-0">
                <thead>
                    <tr>

                        <th style="width: 18px;">
                           S/N
                        </th>

                        <th>Student Image</th> 
                         <th>Student Name</th>
                        <th >Course</th>
                        <th style="width: 120px;">Exam Date</th>
                        <th style="width: 120px;">Status</th>
                       <!-- <th style="width: 51px;">Last Payment</th>-->
                        <th style="width: 150px;">Action</th>
                        <th style="width: 24px;"></th>
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



                if(isset($_GET['search_schedule_list'])){              
                    $paginations =$getFromCourse->get_schedule_likes($_GET['search_schedule_list']);
                   // var_dump($paginations);
                    
                    foreach($paginations as $schedules):
                        $student = $getFromCourse->get_single('user', $schedules->student_id);
                    
                      

                ?>
                
                    <tr class="selected" >
                       
                        <td>

                            <div class="media align-items-center">
                                <div class="avatar avatar-xs mr-2">
                                    <img src="<?=BASE_URL?>admin/<?=$student->profileimage;?>" alt="Avatar" class="avatar-img rounded-circle">
                                </div>
                              
                            </div>

                        </td>

                        <td>

                            <div class="media align-items-center">
                               
                                <div class="media-body">

                                    <span class="js-lists-values-em;?></ployee-name"><?=$student->firstname .' '. $student->surname?></span>

                                </div>
                            </div>

                            </td>
                        <td>
                         <?php 
                          $courses = $getFromGeneric->get_single('courses', $schedules->course_id);
                           
                         ?>
                             <span class=""><?=$courses->course_name;?></span>
                           
                        </td>
                       <td><small class="text-muted"> <?=$schedules->exam_date;?></small></td>
                       <td> <span class="badge badge-soft-warning">
                       
                              <?php
                                    if($schedules->approve == 1){
                                        echo 'Approved';
                                    }elseif($schedules->approve == 2){
                                        echo 'Disapproved';
                                    }else{
                                        echo 'Not Reviewed';
                                        
                                    }
                                ?>
                                
                                </span></td>
                        <td>
                            <div class="media align-items-center">
                                <?php
                                    if($schedules->approve == 1){
                                
                                ?>
                                <form method="post" action="admin/schedule_list/">
                                        <input type="hidden" name="schedule_id" value="<?=$schedules->id?>" >
                                     <input type="submit"  name="schedule_disapprove"  class="btn btn-danger" value="Disapprove">
                                </form>
                                <?php }elseif( $schedules->approve == 2  OR $schedules->approve == 0){ ?>
                                    <form method="post" action="admin/schedule_list/">
                                    <input type="hidden" name="schedule_id" value="<?=$schedules->id?>" >
                                    <input type="submit" name="approve_exam" class="btn btn-outline-success" value="Approve">
                                    </form>
                                     <?php }?>
                            </div>
                        </td>
                        <td>

                        <div class="media align-items-center">
                        <form action="admin/schedule_list/" method="post">
                        <input type="hidden" name="email" value="<?=$student->email;?>">
                        <input type="hidden" name="name" value="<?=$student->firstname;?>">
                        <button class="btn btn-outline-info"  type="submit" name="notify_exam_message_student">Notify Student</button>
                        </form>
                       
                                           
                            </div>
                           
                        </td>
                        
                    </tr>
                 
                <?php endforeach; 
            }
            
            ?>
                    
                  

                </tbody>
            </table>
        </div>

        <div class="card-body text-right">
      
        </div>


    </div>

</div>


</div>
<!-- // END content -->