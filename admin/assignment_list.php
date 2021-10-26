<?php 

    $get_id = $_GET['asssignment_list'];

?>
 
 
 <!-- Content -->
 <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


<div class="page__heading">
    <div class="container-fluid page__container">
        <h1 class="mb-0">Submission List</h1>
    </div>
    <div class="mb-1 ml-5">
        <a href="admin/assignment-menu/" class="badge badge-dark-gray text-white" onclick="goBack()">Back to Assignment</a>
    </div>
</div>

<div class="container-fluid page__container">
    <div class="card">
        
        <div class="card-header">
             <form class="form-inline" method="post" id="student_search_form">
             
              

               
            </form>
            
        </div>


        <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values="[&quot;js-lists-values-employee-name&quot;]">

            <table class="table mb-0 thead-border-top-0">
                <thead>
                    <tr>

                        <th style="width: 18px;">
                           S/N
                        </th>

                        <th>Student</th>
                        <th>File</th>
                        <th>Submisssion Date</th>
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



                if(isset($_GET['assignment_list'])){
                
                        $limit = 10;
                    if($_GET['assignment_list'] == 0){
                            $page = 1;
                        $offset = (($page - 1)* $limit );
                    }else{
                        $page = $_GET['assignment_list'];
                        $offset = (($page - 1)* $limit );
                    }

                    $cur =  $paginations =$getFromCourse->pagination_lower('assignment_sub', $offset, $limit);

                    $lower = ($page - 1) * $limit + $cur;
                    $uper = $getFromCourse->pagination_count('assignment_sub');


                    
                    
                    $paginations =$getFromCourse->pagination('assignment_sub', $offset, $limit, 'id');
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

                                    <span class="js-lists-values-em;?></ployee-name">
                                    
                                    <?php 
                                    
                                        $get_std = $getFromCourse->get_single('user', $category->student_id);

                                    echo $get_std->firstname .' ' . $get_std->surname;

                                    
                                    
                                    ?></span>

                                </div>
                            </div>

                        </td>
                        <td>
                        
                           <?=$category->file;?>
                           
                         
                        </td>

                        <td>

                            <div class="media align-items-center">

                                    <?=$category->date_created;?>
                                
                               
                            </div>

                        </td>

                        <td> 
                                <a class="btn btn-outline-success" href="admin/<?=$category->file?>" target="/">Open</a>
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