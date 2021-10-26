<?php
    $courses = 'active';
 ?>
<!-- Content -->
<div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


    <div class="page__heading border-bottom">
        <div class="container-fluid page__container d-flex align-items-center">
            <h1 class="mb-0">Exam Management Menu</h1>
            <?php 
                    if(isset($_SESSION['super_admin'])  OR isset($_SESSION['course'])){
                
                ?>
            <a href="admin/new_exam" class="btn btn-success ml-auto"><i class="material-icons">add</i> Create Exam</a>
       <?php }?> </div>
    </div>

    <div class="container-fluid page__container">

      
      



        <div class="row">

        <?php

           // $courses =  $getFromCourse->get_multi('courses');
               
            //foreach($courses as $course):
         
            ?>


            <?php 

            if(isset($_GET['exam'])){
            
                    $limit = 10;
                if($_GET['exam'] == 0){
                        $page = 1;
                    $offset = (($page - 1)* $limit );
                }else{
                    $page = $_GET['exam'];
                    $offset = (($page - 1)* $limit );
                }

                $cur =  $paginations =$getFromCourse->pagination_lower('exam', $offset, $limit);

                $lower = ($page - 1) * $limit + $cur;
                $uper = $getFromCourse->pagination_count('exam');


                
                
                $paginations =$getFromCourse->pagination('exam', $offset, $limit, 'exam_name');
                
                foreach($paginations as $exam):
            
            ?>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex flex-column flex-sm-row">
                            <a  class="avatar mb-3 w-xs-plus-down-100 mr-sm-3">
                                <img src="<?=BASE_URL?>/admin/<?=$exam->avatar;?>" alt="Card image cap" class="avatar-img rounded-circle">
                            </a>
                            <div class="flex" style="min-width: 200px;">
                                <div class="d-flex">
                                    <div>
                                        <h4 class="card-title mb-1" style="color: blue;"><?=$exam->exam_name?> </h4>
                                    </div>
                                    <div class="dropdown ml-auto">
                                        <a href="#" class="dropdown-toggle text-muted" data-caret="false" data-toggle="dropdown">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <?php 
                    if(isset($_SESSION['super_admin'])  OR isset($_SESSION['course'])){
                
                ?>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="admin/new_exam/<?=$exam->id?>">Edit Exam</a>
                                            <a class="dropdown-item" href="exam_stat/<?=$exam->id?>">Statistics</a>
                                            <div class="dropdown-divider"></div>
                                            <form method="post" action="admin/exam">
                                            <input type="hidden" name="exam_id" value="<?=$exam->id?>">
                                                 <button type="submit" class="dropdown-item text-danger"  name="send_delete_exam" >Delete Exam</button>
                               
                                            </form>
                                                    </div>

                                                    <?php } ?>
                                    </div>
                                </div>
                                <div class="d-flex align-items-end">
                                    <div class="d-flex flex flex-column mr-3">
                                        <div class="d-flex align-items-center py-2 border-bottom">
                                          <!--  <span class="mr-2"></span>-->
                                            <small class="text-muted ml-auto">
                                            <?php
                                             /*   $count_sales = $getFromexam->count_exam_sales($exam->id);
                                                echo $count_sales 20 Students;*/
                                            
                                            ?></small>
                                        </div>
                                        <div class="d-flex align-items-center py-2">
                                        <?php
                                            
                                            $get_courses = $getFromCourse->get_single_g('course_exam', 'exam_id', $exam->id);

                                            foreach($get_courses as $cours):
                                                $course = $getFromCourse->get_single('courses', $cours->course_id);
                                        ?>
                                            <span class="badge badge-soft-info mr-2"><?=$course->course_abrev;?></span>
                                            <?php endforeach;?>
                                         
                                            <?php 
                    if(isset($_SESSION['super_admin']) OR isset($_SESSION['course']) ){
                
                ?>
                  <a href="admin/new_exam/<?=$exam->id?>" class="btn btn-primary ml-auto"><i class="material-icons">edit</i> Manage Exam</a>
                         
                         <?php } ?>               </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        <?php endforeach; }?>
       
        </div>
        <div class="ml-auto">
                            <?php 
                                    if($page == 1){

                                 
                                ?>
                                 <?php }else{
                                        ?> 

                            <a href="admin/exam/<?=$page - 1?>" class=""><i class="material-icons float-left">arrow_backward</i></a>
                            <?php }?>
                              <?=$lower;?> <span class=" text-center text-black">of  <?=$uper;?></span>
                                
                              
                                 <?php 
                                    if($lower == $uper){

                                 
                                ?>
                                    <?php }else{
                                        ?> 
                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href="admin/exam/<?=$page + 1?>" class=""><i class="material-icons float-right">arrow_forward</i></a>
                                        <?php }?>
                            </div>

    </div>

</div>
<!-- // END content -->