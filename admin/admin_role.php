
 
  <!-- Content -->
  <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


<div class="page__heading border-bottom">
    <div class="container-fluid page__container d-flex align-items-center">
        <h3 class="mb-0">Assign Roles to Admin</h3>
        
    </div>
</div>


<div class="container-fluid page__container">
    <div class="tab-content">
        <div class="tab-pane active show fade" id="c-bio">
        <form method="post" action="admin/role/">

            <div class="row">


                <div class="col-4 offset-2">
                    <div class="form-group">
                        <label for="country"><strong>Select Admin</strong></label><br>
                        <select id="select01" name="admin_id" data-toggle="select" required class="form-control select2-hidden-accessible" data-select2-id="select01" tabindex="-1" aria-hidden="true">
                    
                    
                    
                                    <option value="" >Select Admin</option>
                                    
                                    <?php

                                $admins =  @$getFromExam->get_single_g('user','type', 'teacher');
                                
                                foreach($admins as $admin):

                                ?>

                            <option value="<?=@$admin->id?>"><?=@$admin->firstname. ' ' .@$admin->surname ?></option>
                            
                            <?php endforeach;?>
                    
                        </select>

                    </div>
                </div>


                <div class="col-4">
                    <div class="form-group">
                        <label for="country"><strong>Select  Role</strong></label><br>
                        <select id="select01" name="role_id" data-toggle="select" required class="form-control select2-hidden-accessible" data-select2-id="select01" tabindex="-1" aria-hidden="true">
                    
                    
                    
                                    <option value="" >Select Role</option>
                                    
                                    <?php

                                $roles =  @$getFromExam->get_multi('role');
                                
                                foreach($roles as $role):

                                ?>

                            <option value="<?=@$role->id?>"><?=@$role->role;?></option>
                            
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
            
            <div class="row">
                <div class="col-6 offset-3">
                    <div class="form-group">
                        <button type="submit" name="create_role" class="btn btn-outline-primary btn-lg">Assign Role</button>
                    
                
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

                    <th>User</th>
                    <th >Role</th>
                  <!--  <th >Start Date</th>
                    <th >End Date</th>-->
                    <th >Action</th>
                   
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



            if(isset($_GET['role'])){
            
                    $limit = 10;
                if($_GET['role'] == 0){
                        $page = 1;
                    $offset = (($page - 1)* $limit );
                }else{
                    $page = $_GET['role'];
                    $offset = (($page - 1)* $limit );
                }

                $cur =  $paginations =$getFromCourse->pagination_lower('admin_role', $offset, $limit);

                $lower = ($page - 1) * $limit + $cur;
                $uper = $getFromCourse->pagination_count('admin_role');


                
                
                $paginations =$getFromCourse->pagination('admin_role', $offset, $limit, 'date_created');
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

                               
                        <span ><?=@$getFromGeneric->get_single('user', $schedule->admin_id)->firstname;?></span>
                    
                            </div>
                        </div>

                    </td>
                    <td>
                   
                        <span class="badge badge-soft-info"><?=$getFromGeneric->get_single('role', $schedule->role_id)->role;?></span>
                    
                     
                    </td>

                   <!-- <td>

                    <span ><?//=$schedule->start_date;?></span>
                    
                     

                    </td>

                    <td>

                    <span ><?//=$schedule->end_date;?></span>

                    delete_schedule_exam

                    </td>-->

                    <td> 
                    <form method="POST" action="admin/role">
                        <input type="hidden" name="admin_role_id"  value="<?= $schedule->id;?>">
                           <button name="delete_admin_role" type="submit" class="btn btn-outline-danger">Delete</a>
                    </form>      
                    </td>
                    <td>

                    
                    </td>

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

                        <a href="admin/role/<?=$page - 1?>" class=""><i class="material-icons float-left">arrow_backward</i></a>
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