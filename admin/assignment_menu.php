
 <!-- Content -->
 <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


<div class="page__heading">
    <div class="container-fluid page__container">
        <h1 class="mb-0">Assignment Menu</h1>
    </div>
</div>

<div class="container-fluid page__container">
    <div class="card">
    <?php 
                    if(isset($_SESSION['super_admin'])){
                
                ?>  
        <div class="card-header">
             <form class="form-inline" method="post" id="student_search_form">
             
                <div class="custom-control mb-2 mr-sm-2 mb-sm-0">
                <a href="admin/assignment/"  class="btn btn-outline-primary ml-auto">
                   New Assignment
                </a>
                </div>

               
            </form>
            
        </div>
        <?php } ?>


        <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values="[&quot;js-lists-values-employee-name&quot;]">

            <table class="table mb-0 thead-border-top-0">
                <thead>
                    <tr>

                        <th style="width: 18px;">
                           S/N
                        </th>

                        <th>Title</th>
                        <th >Course</th>
                        <th >Due Date</th>

                        <?php 
                    if(isset($_SESSION['super_admin'])){
                
                ?>
                        <th>Action</th>
                      <?php } ?> 
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



                if(isset($_GET['assignment-menu'])){
                
                        $limit = 10;
                    if($_GET['assignment-menu'] == 0){
                            $page = 1;
                        $offset = (($page - 1)* $limit );
                    }else{
                        $page = $_GET['assignment-menu'];
                        $offset = (($page - 1)* $limit );
                    }

                    $cur =  $paginations =$getFromCourse->pagination_lower('assignment', $offset, $limit);

                    $lower = ($page - 1) * $limit + $cur;
                    $uper = $getFromCourse->pagination_count('assignment');


                    
                    
                    $paginations =$getFromCourse->pagination('assignment', $offset, $limit, 'id');
                    $sn = 0;
                    foreach($paginations as $category):
                        $sn +=1;
                


                ?>
                
                    <tr class="selected" >
                        <td>
                           <?=$sn;?>
                        </td>
                        <td>

                            <div class="media align-items-center">
                                
                                <div class="media-body">

                                    <span class="js-lists-values-em;?></ployee-name"><?=$category->title?></span>

                                </div>
                            </div>

                        </td>
                        <td>
                        
                             <span class="badge badge-soft-info"><?=$getFromGeneric->get_single('courses', $category->course_id)->course_name;?></span>
                           
                         
                        </td>

                        <td>

                            <div class="media align-items-center">

                                    <?=$category->due_date;?>
                                
                               
                            </div>

                        </td>
                        <?php 
                    if(isset($_SESSION['super_admin'])){
                
                ?>
                        <td> 
                                <a class="btn btn-outline-primary" href="admin/assignment/<?=$category->id;?>">Edit</a>
                                <a class="btn btn-outline-success" href="admin/assignment_list/<?=$category->id?>">Assignments</a>
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

                            <a href="admin/assignment_list/<?=$page - 1?>" class=""><i class="material-icons float-left">arrow_backward</i></a>
                            <?php }?>
                              <?=$lower;?> <span class=" text-center text-black">of  <?=$uper;?></span>
                                
                              
                                 <?php 
                                    if($lower == $uper){

                                 
                                ?>
                                    <?php }else{
                                        ?> 
                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href="admin/assignment_list/<?=$page + 1?>" class=""><i class="material-icons float-right">arrow_forward</i></a>
                                        <?php }?>
 
                                </div>
        </div>


    </div>

</div>


</div>
<!-- // END content -->