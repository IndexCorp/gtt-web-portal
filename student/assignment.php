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
                        <th>Title</th>
                        <th >Course</th>
                        <th >Due Date</th>
                        <th >Assignment File</th>
                        <th >Action</th>
                      
                    </tr>
                </thead>







                <tbody class="list" id="staff">




                <?php 



                        
                        $results =$getFromCourse->assignment_table($_SESSION['login_id']);
                        if(!empty($results)){
                        foreach($results as $result):
                                          ?>

                    <tr class="selected">
                    <td><?=@$result->title;?></td>
                       

                       
                        <td>

                            <div class="media align-items-center">
                                <div class="media-body">

                                    <span class="js-lists-values-employee-name"><?=$getFromCourse->get_single('courses', $result->course_id)->course_name;?></span>

                                </div>
                            </div>

                        </td>
                        <td><?=@$result->due_date?></td>
                        
                      
                        <td>
                        <?php 
                            $get_file = $getFromCourse->assignment_sub_check($std_id, $result->id);
                           // $getFromCourse->get_singly_g('assignent_sub', 'assignment_id', $result->id);


                        
                       
                      ?> 
                       <a class="btn btn-outline-warning" target="/" href="admin/<?=@$get_file->file?>">Download</a>
                        </td>
                        <td>
                        <div class="media align-items-center">
                                <a href="student/submit_ass/<?=$result->id?>" class="btn btn-outline-primary">Edit</a>
                            </div>
                        </td>
                    </tr>
                   
                       
                    
                <?php  endforeach; 
              }else{?>
                    <tr class="selected">

                                                
                                            
                    <td colspan="5">
                   <h2>No Assignment Yet</h2>
                    </td>
                    </tr>

                    <?php }?>
                    
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