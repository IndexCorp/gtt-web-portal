  
  
   <?php
    $student = 'active';
 ?>
       <?php 

if(isset($_GET['student_search_cat'])){
    $url_d = $_GET['student_search_cat'];

   
}


?>   <!-- Content -->


  <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


<div class="page__heading">
    <div class="container-fluid page__container">
        <h1 class="mb-0">Student Search Result</h1>
        <a href="admin/student" class="badge badge-dark-gray text-white" onclick="goBack()">Back to Student</a>
    </div>
</div>

<div class="container-fluid page__container">
    <div class="card">
        
        <div class="card-header">
        
            <form class="form-inline" method="post" id="student_search_form">
                <label class="mr-sm-2" for="inlineFormFilterBy">Filter by:</label>
                <div class="search-form mr-3 search-form--light">

                <input type="text" name="student_search" class="form-control" placeholder="Search courses" id="student_search">
                    <input class="btn " name="submit_search" value="" type="submit"><i type="submit" id="search_btn" class="btn material-icons">search</i>
               
                </div><label class="sr-only" for="category_search">Role</label>
                <select id="category_search" class="custom-select mb-2 mr-sm-2 mb-sm-0">
                    <option value="">All courses</option>
                    <?php

                            $courses =  $getFromCourse->get_multi_sort('courses','course_name');
                            
                            foreach($courses as $cat):

                            ?>

                        <option value="<?=$cat->id?>"><?=$cat->course_abrev;?></option>
                        
                        <?php endforeach;?>
                </select>


                <label class="sr-only" for="school_search">Role</label>
                <select id="school_search" class="custom-select mb-2 mr-sm-2 mb-sm-0">
                    <option value="">All Schools</option>
                   
                            
                             
                        <?php

                            $schools =  $getFromCourse->get_multi_sort('school','school_name');
                            
                            foreach($schools as $sch):

                            ?>

                        <option value="<?=$sch->id?>"><?=$sch->school_name;?></option>
                        
                        <?php endforeach;?>
                </select>

                
                <?php 
                    if(isset($_SESSION['super_admin'])  OR isset($_SESSION['student'])){
                
                ?>
                <div class="custom-control mb-2 mr-sm-2 mb-sm-0">
                <a href="admin/student_reg/"  class="btn btn-outline-primary ml-auto">
                   New Student
                </a>
                </div>
                <?php } ?>

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

                        <th>Student Name</th>
                        <th >Courses</th>
                        <th style="width: 37px;">Status</th>
                        <th style="width: 120px;">Last Login</th>
                        
<?php 
                    if(isset($_SESSION['super_admin'])  OR isset($_SESSION['student'])){
                
                ?>
                         <th style="width: 150px;">Action</th>
                        <th style="width: 24px;"></th>
                        <?php }?>
                    </tr>
                </thead>
                <tbody class="list" id="staff">
                <?php

                 /*  $students =  $getFromGeneric->get_multi('user');
                        $sn = 0;
                   foreach($students as $student):
                    $sn +=1;*/
                ?>


                <?php 

                if(isset($_GET['student_search_cat'])){
                    $cat_id = $_GET['student_search_cat'];
                    $sn = 0;
                    $news = $getFromAdmin-> search_student_by_course($cat_id);
                    //var_dump($news);
                    foreach($news as $new):
                        $sn +=1;
                        $student = $getFromAdmin->get_single('user', $new->student_id);
                        //var_dump($student);
                ?>


<tr class="selected">

<td>
   <?=$sn;?>
</td>
<td>

    <div class="media align-items-center">
        <div class="avatar avatar-xs mr-2">
        
        <img src="<?=BASE_URL?>admin/<?=$student->profileimage;?>" alt="Avatar" class="avatar-img rounded-circle">
                                </div>
        <div class="media-body">

            <span class="js-lists-values-em;?></ployee-name"><?=@$student->firstname .' '. @$student->surname;?></span>

        </div>
    </div>

</td>
<td>
 <?php 
  $courses = @$getFromGeneric->get_single_g('student_courses','student_id', $student->id);
    //var_dump($courses);
    foreach($courses as $course):
 ?>
     <span class="badge badge-soft-info"><?=@$getFromGeneric->get_single('courses', $course->course_id)->course_abrev;?></span>
   
    <?php endforeach;?>
</td>
<td>
<?php 
    if (@$student->statu == 1){

    ?>
<span class="badge badge-success">Active
</span>
<?php
}else{

?>

<span class="badge badge-danger">Inactive
</span>
<?php } ?></td>
<td><small class="text-muted"> <?=@$getFromGeneric->timeAgo($student->last_login);?></small></td>

<?php 
                    if(isset($_SESSION['super_admin'])  OR isset($_SESSION['student'])){
                
                ?>
<td>
    <div class="media align-items-center">
        <?php
            if(@$student->statu == 1){
        
        ?>
        <form method="post" action="admin/student/">
                <input type="hidden" name="student_id" value="<?=@$student->id?>" >
             <input type="submit"  name="student_deactivate"  class="btn btn-danger" value="Deactivate">
        </form>
        <?php }else{ ?>
            <form method="post" action="admin/student/">
            <input type="hidden" name="student_id" value="<?=@$student->id?>" >
            <input type="submit" name="student_activate" class="btn btn-success" value="Activate">
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
        <a class="dropdown-item" href="admin/chat/<?=$student->id?>">Start Chat</a>
        
        <a class="dropdown-item" href="admin/profile/<?=@$student->id?>">Student Profile</a>
                             <a class="dropdown-item" href="admin/student_reg/<?=@$student->id?>">Edit Profile</a>
            <a class="dropdown-item"  href="admin/manage_result/<?=$student->id?>">Input Result</a> 
                                       <a class="dropdown-item"  href="admin/manage_aies/<?=@$student->id?>">Upload AIES Letter</a>
            <a class="dropdown-item"  href="admin/manage_cert/<?=@$student->id?>">Upload Certificate</a>
        </div>
    </div>
</td>
<?php } ?>
</tr>

                <?php endforeach; }?>
                    
                  

                </tbody>
            </table>
        </div>

     

    </div>

</div>


</div>
<!-- // END content -->