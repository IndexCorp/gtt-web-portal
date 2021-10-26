
 <!-- Content -->
 <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


<div class="page__heading">
    <div class="container-fluid page__container">
        <h1 class="mb-0">School Management</h1>
    </div>
</div>

<div class="container-fluid page__container">
    <div class="card">
        
        <div class="card-header">
             <form class="form-inline" method="post" id="student_search_form">
             
             <?php 
                    if(isset($_SESSION['super_admin'])){
                
                ?>
                  <div class="custom-control mb-2 mr-sm-2 mb-sm-0">
                <a href="admin/create_school/"  class="btn btn-outline-primary ml-auto">
                   New School
                </a>
                </div>
                <?php } ?>

               
            </form>
            
        </div>


        <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values="[&quot;js-lists-values-employee-name&quot;]">

            <table class="table mb-0 thead-border-top-0">
                <thead>
                    <tr>

                        <th style="width: 18px;">
                           S/N
                        </th>

                      <!--  <th>school Name</th> -->
                        <th >School Name</th>
                        <th >Image</th>
                        <?php 
                    if(isset($_SESSION['super_admin'])){
                
                ?>
                        <th style="width: 150px;">Action</th>
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



                if(isset($_GET['school'])){
                
                        $limit = 10;
                    if($_GET['school'] == 0){
                            $page = 1;
                        $offset = (($page - 1)* $limit );
                    }else{
                        $page = $_GET['school'];
                        $offset = (($page - 1)* $limit );
                    }

                    $cur =  $paginations =$getFromCourse->pagination_lower('school', $offset, $limit);

                    $lower = ($page - 1) * $limit + $cur;
                    $uper = $getFromCourse->pagination_count('school');


                    
                    
                    $paginations =$getFromCourse->pagination('school', $offset, $limit, 'school_name');
                    $sn = 0;
                    foreach($paginations as $school):
                        $sn +=1;
                


                ?>
                
                    <tr class="selected" >
                        <td>
                           <?=$sn;?>
                        </td>
                   <td>

                            <div class="media align-items-center">
                                
                                <div class="media-body">

                                    <span class="js-lists-values-em;?></ployee-name"><?=$school->school_name?></span>

                                </div>
                            </div>

                        </td> 
                        <?php /*  <!--       <td>
                     
                        //  $courses = $getFromGeneric->get_singles('student_courses', $school->id);
                            //var_dump($courses);
                         //   foreach($courses as $course):
                         ?>
                             <span class="badge badge-soft-info"><?=$getFromGeneric->get_single('courses', $course->course_id)->course_abrev;?></span>
                           
                            <?php //endforeach;?>
                        </td>
*/?>
                        <td>

                            <div class="media align-items-center">
                                <div class="avatar avatar-xs mr-2">
                                    <img src="<?=BASE_URL?>admin/<?=$school->avatar;?>" alt="Avatar" class="avatar-img rounded-circle">
                                </div>
                               
                            </div>

                        </td>
                        <?php 
                    if(isset($_SESSION['super_admin'])){
                
                ?>
                        <td> 
                                <a class="btn btn-light" href="admin/create_school/<?= $school->id;?>">Edit</a>
                        </td>
                       
                        
                        <?php }?>
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

                            <a href="admin/school/<?=$page - 1?>" class=""><i class="material-icons float-left">arrow_backward</i></a>
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
<!-- // END content -->