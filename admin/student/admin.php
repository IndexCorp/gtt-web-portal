
 <!-- Content -->
  <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


<div class="page__heading">
    <div class="container-fluid page__container">
        <h1 class="mb-0">Admin Management</h1>
    </div>
</div>

<div class="container-fluid page__container">
    <div class="card">
        
        <div class="card-header">
        <form class="form-inline" method="post" id="student_search_form">
               

                <div class="custom-control mb-2 mr-sm-2 mb-sm-0">
                <a href="admin/manage-admin/"  class="btn btn-outline-primary ml-auto">
                   Create Admin
                </a>
                </div>

                <button type="button" class="btn btn-primary ml-auto">
                    <i class="material-icons mr-1">launch</i> Export
                </button>
            </form>
            
        </div>


        <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values="[&quot;js-lists-values-employee-name&quot;]">

            <table class="table mb-0 thead-border-top-0">
                <thead>
                    <tr>

                        <th style="width: 18px;">
                           S/N
                        </th>

                        <th>Admin Avatar</th>
                        <th>Admin Name</th>
                        <th >Courses</th>
                        <th style="width: 37px;">Status</th>
                        <th style="width: 120px;">Last Login</th>
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



                if(isset($_GET['admin'])){
                
                        $limit = 10;
                    if($_GET['admin'] == 0){
                            $page = 1;
                        $offset = (($page - 1)* $limit );
                    }else{
                        $page = $_GET['admin'];
                        $offset = (($page - 1)* $limit );
                    }

                    $cur =  $paginations =$getFromCourse->pagination_lower_ad('user', $offset, $limit);

                    $lower = ($page - 1) * $limit + $cur;
                    $uper = $getFromCourse->pagination_count_ad('user');


                    
                    
                    $paginations =$getFromCourse->pagination_ad('user', $offset, $limit);
                    $sn = 0;
                    foreach($paginations as $student):
                        $sn +=1;
                


                ?>
                
                    <tr class="selected" >
                        <td>
                           <?=$sn;?>
                        </td>
                        <td>

                            <div class="media align-items-center">
                                <div class="avatar avatar-xs mr-2">
                                    <img src="<?=BASE_URL?>admin/<?=$student->profileimage?>" alt="Avatar" class="avatar-img rounded-circle">
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
                          $courses = $getFromGeneric->get_singles('student_courses', $student->id);
                            //var_dump($courses);
                            foreach($courses as $course):
                         ?>
                             <span class="badge badge-soft-info"><?=$getFromGeneric->get_single('courses', $course->course_id)->course_abrev;?></span>
                           
                            <?php endforeach;?>
                        </td>
                        <td>
                        <?php 
                            if ($student->statu == 1){
                        
                            ?>
                        <span class="badge badge-success">Active
                        </span>
                        <?php
                       }else{
        
                        ?>
                        
                        <span class="badge badge-danger">Inactive
                        </span>
                       <?php } ?></td>
                        <td><small class="text-muted"> <?=$getFromGeneric->timeAgo($student->last_login);?></small></td>
                       <!-- <td>$1,402</td>-->
                        <td>
                            <div class="media align-items-center">
                                <?php
                                    if($student->statu == 1){
                                
                                ?>
                                <form method="post" action="admin/admin/">
                                        <input type="hidden" name="student_id" value="<?=$student->id?>" >
                                     <input type="submit"  name="student_deactivate_admin"  class="btn btn-danger" value="Deactivate">
                                </form>
                                <?php }else{ ?>
                                    <form method="post" action="admin/admin/">
                                    <input type="hidden" name="student_id" value="<?=$student->id?>" >
                                    <input type="submit" name="student_activate_admin" class="btn btn-success" value="Activate">
                                    </form>
                                     <?php }?>
                            </div>
                        </td>
                        <td>
                            <div class="dropdown ml-3">
                                <a href="#" class="dropdown-toggle text-muted" data-caret="false" data-toggle="dropdown" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" style="display: none;">
                                <a class="dropdown-item" href="admin/manage-admin/<?=$student->id?>">Edit Profile</a>
                                <a class="dropdown-item" href="admin/role/">Assign Role</a>
                                  
                                </div>
                                
                              
                            </div>
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

                            <a href="admin/student/<?=$page - 1?>" class=""><i class="material-icons float-left">arrow_backward</i></a>
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