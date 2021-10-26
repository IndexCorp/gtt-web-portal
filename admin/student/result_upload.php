<?php
    //include('includes/header.inc.php');
    include_once('../../config/configuration.php');
    include_once('../../config/init.php');




  include('../includes/header_new.php');
    ?>
 <?php


    if(isset($_GET['std'])){
        if(!empty($_GET['std'])){
            $student_id = $_GET['std'];
            $course_id = $_GET['course_id'];


            $student_details = $getFromExam->get_single('user', $student_id);
            $course_details = $getFromExam->get_single('courses', $course_id);
           
        }
       
       
    }
    if(isset($_GET['res_id'])){

       $res_id = $_GET['res_id'];
        $result_details= $getFromExam->get_single('result', $res_id);
        $student_id = $result_details->student_id;
        $course_id =  $result_details->course_id;


        $student_details = $getFromExam->get_single('user', $student_id);
        $course_details = $getFromExam->get_single('courses', $course_id);
       
       


       
    }
?>  
   <!-- Content -->
  <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


<div class="page__heading border-bottom">
    <div class="container-fluid page__container d-flex align-items-center">
        <h1 class="mb-0">Upload Result for <span style="color: red;"> <?=@$student_details->firstname.' '. @$student_details->surname;?></span></h1>
      
    </div>
    <div class="mb-1 ml-5">
        <a href="admin/manage_result/<?=@$student_id;?>" class="badge badge-dark-gray text-white" >Back </a>
    </div>
</div>
<div class="bg-white border-bottom mb-3">
    <div class="container-fluid nav nav-tabs" role="tablist">
        <a href="#c-basic" class="active" data-toggle="tab" role="tab" aria-controls="activity_all" aria-selected="true"><?=@$course_details->course_name;?> <span style="color: red;">Result </span></a>
      
    </div>
</div>

<div class="container page__container">
    <div class="tab-content">
      

        <div class="tab-pane active show fade" id="c-basic">
           <!-- SECOND TAB CONTENT -->

            <div class="col-md">
                <div class="card shadow-none border bg-light">
                    <div class="card-body">
                        <div class="card-header bg-light d-flex align-items-center">
                            <div class="flex">










                <?php 
                    if(isset($_GET['res_id'])){

                   
                ?>
                     <form method="post" action="admin/student/result_upload.php?res_id=<?=@$res_id?>" enctype="multipart/form-data">
                           
                <?php }else{?>
                    <form method="post" action="admin/student/result_upload.php?std=<?=@$student_id?>&course_id=<?=@$course_id?>" enctype="multipart/form-data">
                           
                <?php }?>

                              
                            <div class="row">

                                <div class="col-12">
                                    <h3 for="select01">Module  </h3><br>
                                </div>
                                <div class=" col-4 form-group dropzone" data-select2-id="18" action="/file-upload">
                                    <label for="select01">Score </label>
                                                
                                   
                                         <input type="text"   name="module_1"  value="<?=@$result_details->module?>" class="form-control">
                                         <input type="hidden" name="student_id" value="<?=@$student_id;?>">
                                         <input type="hidden" name="course_id" value="<?=@$course_id;?>">
                                       
                                       <?php 
                                        if(isset($_GET['res_id'])){
                                       ?>
                                        <input type="hidden" name="res_id" value="<?=@$result_details->id;?>">
                                        <?php }?>
                                    </div>
                            

                                <div class=" col-4 form-group dropzone" >
                                    <label for="country"><strong>Select  Grade</strong></label><br>
                                    <select id="select01" name="module_1_grade" data-toggle="select"  class="form-control select2-hidden-accessible" data-select2-id="select01" tabindex="-1" aria-hidden="true">
                                
                                        <?php
                                            if(isset($_GET['res_id'])){
                                
                                        ?>   
                                        <option value="<?=$result_details->module_g?>" ><?=$result_details->module_g?></option>
                                            
                                            <?php }else{?> 
                                                <option value="" >Select Grade</option>
                                                 <?php }?>

                                          
                                        <option value="Distinction">Distinction</option>
                                        <option value="Credit">Credit</option>
                                        <option value="Pass">Pass</option>
                                        <option value="Fail">Fail</option>
                                        <option value="Nil">Nil</option>
                                        
                                       
                                    </select>

                             
                                </div>
                                <div class="col-4">
                                <label for=""><strong> </strong></label><br>
                                  

                                                     
                                    <?php 
                                            if(isset($_GET['res_id'])){
                                        ?>
                                    <input type="submit" name="update_module_1" value="Update Module " class="btn btn-outline-success">
                                    <?php }else{?>
                                        <input type="submit" name="update_module_1" value="Save Module " class="btn btn-outline-primary">
                                    <?php }?>
                                
                                </div>
                            </div>
                            </form>








                       <?php /*  <form method="post" action="admin/student/result_upload.php?std=<?=@student_id?>" enctype="multipart/form-data">
                         



                            <div class="row">
                                <div class="col-12">
                                    <h3 for="select01">Module 2 </h3><br>
                                </div>
                                <div class=" col-4 form-group dropzone" data-select2-id="18" action="/file-upload">
                                    <label for="select01">Score </label>
                                                
                                   
                                         <input type="text"   name="module_2"  value="<?=@$result_details->module_2?>" class="form-control">
                                         <input type="hidden" name="student_id" value="<?=@$student_id;?>">
                                         <input type="hidden" name="course_id" value="<?=@$course_id;?>">
                                       
                                       <?php 
                                        if(isset($_GET['res_id'])){
                                       ?>
                                        <input type="hidden" name="res_id" value="<?=@$result_details->id;?>">
                                        <?php }?>
                                      
                                    </div>
                            

                                <div class=" col-4 form-group dropzone" >
                                    <label for="country"><strong>Select  Grade</strong></label><br>
                                    <select id="select01" name="module_2_grade" data-toggle="select"  class="form-control select2-hidden-accessible" data-select2-id="select01" tabindex="-1" aria-hidden="true">
                                
                                        <?php
                                            if(isset($_GET['res_id'])){
                                
                                        ?>   
                                        <option value="<?=$result_details->module_2_g?>" ><?=$result_details->module_2_g?></option>
                                            
                                            <?php }else{?> 
                                                <option value="" >Select Grade</option>
                                                 <?php }?>

                                          
                                        <option value="Distinction">Distinction</option>
                                        <option value="Credit">Credit</option>
                                        <option value="Pass">Pass</option>
                                        <option value="Fail">Fail</option>
                                        <option value="Nil">Nil</option>
                                        
                                       
                                    </select>

                             
                                </div>
                                <div class="col-4">
                                <label for=""><strong> </strong></label><br>
                                  

                                                     
                                    <?php 
                                            if(isset($_GET['res_id'])){
                                        ?>
                                    <input type="submit" name="update_module_2" value="Update Module 2" class="btn btn-outline-success">
                                    <?php }else{?>
                                        <input type="submit" name="update_module_2" value="Save Module 2" class="btn btn-outline-primary">
                                    <?php }?>
                                
                                </div>
                            </div>                         
                          
                           </form>













                           <form method="post" action="admin/student/result_upload.php?std=<?=@student_id?>" enctype="multipart/form-data">
                         



                         <div class="row">
                             <div class="col-12">
                                 <h3 for="select01">Module 3 </h3><br>
                             </div>
                             <div class=" col-4 form-group dropzone" data-select2-id="18" action="/file-upload">
                                 <label for="select01">Score </label>
                                             
                                
                                      <input type="text"   name="module_3"  value="<?=@$result_details->module_3?>" class="form-control">
                                      <input type="hidden" name="student_id" value="<?=@$student_id;?>">
                                         <input type="hidden" name="course_id" value="<?=@$course_id;?>">
                                       
                                       <?php 
                                        if(isset($_GET['res_id'])){
                                       ?>
                                        <input type="hidden" name="res_id" value="<?=@$result_details->id;?>">
                                        <?php }?>
                                   
                                 </div>
                         

                             <div class=" col-4 form-group dropzone" >
                                 <label for="country"><strong>Select  Grade</strong></label><br>
                                 <select id="select01" name="module_3_grade" data-toggle="select"  class="form-control select2-hidden-accessible" data-select2-id="select01" tabindex="-1" aria-hidden="true">
                             
                                     <?php
                                         if(isset($_GET['res_id'])){
                             
                                     ?>   
                                     <option value="<?=$result_details->module_3_g?>" ><?=$result_details->module_3_g?></option>
                                         
                                         <?php }else{?> 
                                             <option value="" >Select Grade</option>
                                              <?php }?>

                                       
                                     <option value="Distinction">Distinction</option>
                                     <option value="Credit">Credit</option>
                                     <option value="Pass">Pass</option>
                                     <option value="Fail">Fail</option>
                                     <option value="Nil">Nil</option>
                                     
                                    
                                 </select>

                          
                             </div>
                             <div class="col-4">
                             <label for=""><strong> </strong></label><br>
                               

                                                  
                                 <?php 
                                         if(isset($_GET['res_id'])){
                                     ?>
                                 <input type="submit" name="update_module_3" value="Update Module 3" class="btn btn-outline-success">
                                 <?php }else{?>
                                     <input type="submit" name="update_module_3" value="Save Module 3" class="btn btn-outline-primary">
                                 <?php } ?>
                             
                             </div>
                         </div>                         
                       
                        </form>
                        <?php 










                           <form method="post" action="admin/student/result_upload.php?std=<?=@student_id?>" enctype="multipart/form-data">
                         



                         <div class="row">
                             <div class="col-12">
                                 <h3 for="select01">Final Module </h3><br>
                             </div>
                             <div class=" col-4 form-group dropzone" data-select2-id="18" action="/file-upload">
                                 <label for="select01">Score </label>
                                             
                                
                                      <input type="text"   name="module_f"  value="<?=@$result_details->final?>" class="form-control">
                                  
                                      <input type="hidden" name="student_id" value="<?=@$student_id;?>">
                                         <input type="hidden" name="course_id" value="<?=@$course_id;?>">
                                       
                                       <?php 
                                        if(isset($_GET['res_id'])){
                                       ?>
                                        <input type="hidden" name="res_id" value="<?=@$result_details->id;?>">
                                        <?php }?>
                                 </div>
                         

                             <div class=" col-4 form-group dropzone" >
                                 <label for="country"><strong>Select  Grade</strong></label><br>
                                 <select id="select01" name="module_f_grade" data-toggle="select"  class="form-control select2-hidden-accessible" data-select2-id="select01" tabindex="-1" aria-hidden="true">
                             
                                     <?php
                                         if(isset($_GET['res_id'])){
                             
                                     ?>   
                                     <option value="<?=$result_details->module_f_g?>" ><?=$result_details->module_f_g?></option>
                                         
                                         <?php }else{?> 
                                             <option value="" >Select Grade</option>
                                              <?php }?>

                                       
                                     <option value="Distinction">Distinction</option>
                                     <option value="Credit">Credit</option>
                                     <option value="Pass">Pass</option>
                                     <option value="Fail">Fail</option>
                                     <option value="Nil">Nil</option>
                                     
                                    
                                 </select>

                          
                             </div>
                             <div class="col-4">
                             <label for=""><strong> </strong></label><br>
                               

                                                  
                                 <?php 
                                         if(isset($_GET['res_id'])){
                                     ?>
                                 <input type="submit" name="update_module_f" value="Update Final Module" class="btn btn-outline-success">
                                 <?php }else{?>
                                     <input type="submit" name="update_module_f" value="Save Final Module" class="btn btn-outline-primary">
                                 <?php }?>
                             
                             </div>
                         </div>                         
                       
                        </form>*/?>










                            </div>

                           
                      
                        </div>
                    </div>
                </div>
            </div>

            <!-- END SECOND TAB -->
        </div>

     
        
    </div>
</div>

</div>
<!-- // END content -->
<?php

include('../includes/sidebar.inc.php');   

include('../includes/footer_new.php');






    if(isset($_POST['update_module_1'])){

        $module = $_POST['module_1'];
        $student_id = $_POST['student_id'];
        $course_id = $_POST['course_id'];
        $module_grade = $_POST['module_1_grade'];

  
       

                  if(isset($_POST['res_id'])){
                    $res_id = $_POST['res_id'];
       
  
                    $up_doc =  $getFromExam->update('result', $res_id, array('student_id'=>$student_id, 'course_id'=>$course_id,'module'=>$module, 'module_g'=>$module_grade));
                   
                 }else{
                   $up_doc =  $getFromExam->create('result', array('student_id'=>$student_id, 'course_id'=>$course_id,'module'=>$module, 'module_g'=>$module_grade));
                   $res_id = $up_doc;
       
                 }

       
       if($up_doc){
      //var_dump($up_doc);

      echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.success('Module 1 Saved.')
       
         /* Toast.fire({
            type: 'success',
            title: ' Price Info Saved .'
          })*/
       
      });

      setInterval(() => {
        window.open('admin/student/result_upload.php?res_id=".$res_id."','_self');
      }, 2000); 
 
    
    </script>";
   
      }else{
        echo "<script type='text/javascript'>
        $(function() {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
          toastr.error('  Failed to Save Module 1.')
        
        
        
        });
       
      setInterval(() => {
        window.open('admin/student/result_upload.php?res_id=".$res_id."','_self');
      }, 2000); 
 
             
      
      </script>"; 
  
 
  
                  }
   
      }
  
  
  
  


/*
      

    if(isset($_POST['update_module_3'])){

        $module_3 = $_POST['module_3'];
        $student_id = $_POST['student_id'];
        $course_id = $_POST['course_id'];
        $module_3_grade = $_POST['module_3_grade'];

  
       

                  if(isset($_POST['res_id'])){
                    $res_id = $_POST['res_id'];
       
  
                    $up_doc =  $getFromExam->update('result', $res_id, array('student_id'=>$student_id, 'course_id'=>$course_id,'module_3'=>$module_3, 'module_3_g'=>$module_3_grade));
                   
                 }else{
                   $up_doc =  $getFromExam->create('result', array('student_id'=>$student_id, 'course_id'=>$course_id,'module_3'=>$module_3, 'module_3_g'=>$module_3_grade));
                   $res_id = $up_doc;
       
                 }

       
       if($up_doc){
      //var_dump($up_doc);

      echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.success('Module 3 Saved.')
       
       
      });

      setInterval(() => {
        window.open('admin/student/result_upload.php?res_id=".$res_id."','_self');
      }, 2000); 
 
    
    </script>";
   
      }else{
        echo "<script type='text/javascript'>
        $(function() {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
          toastr.error('  Failed to Save Module 3.')
        
        
        
        });
       
      setInterval(() => {
        window.open('admin/student/result_upload.php?res_id=".$res_id."','_self');
      }, 2000); 
 
             
      
      </script>"; 
  
 
  
                  }
   
      }
  
  
  
  




      

    if(isset($_POST['update_module_2'])){

        $module_2 = $_POST['module_2'];
        $student_id = $_POST['student_id'];
        $course_id = $_POST['course_id'];
        $module_2_grade = $_POST['module_2_grade'];

  
       

                  if(isset($_POST['res_id'])){
                    $res_id = $_POST['res_id'];
       
  
                    $up_doc =  $getFromExam->update('result', $res_id, array('student_id'=>$student_id, 'course_id'=>$course_id,'module_2'=>$module_2, 'module_2_g'=>$module_2_grade));
                   
                 }else{
                   $up_doc =  $getFromExam->create('result', array('student_id'=>$student_id, 'course_id'=>$course_id,'module_2'=>$module_2, 'module_2_g'=>$module_2_grade));
                   $res_id = $up_doc;
       
                 }

       
       if($up_doc){
      //var_dump($up_doc);

      echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.success('Module 2 Saved.')
       
        
       
      });

      setInterval(() => {
        window.open('admin/student/result_upload.php?res_id=".$res_id."','_self');
      }, 2000); 
 
    
    </script>";
   
      }else{
        echo "<script type='text/javascript'>
        $(function() {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
          toastr.error('  Failed to Save Module 2.')
        
        
        
        });
       
      setInterval(() => {
        window.open('admin/student/result_upload.php?res_id=".$res_id."','_self');
      }, 2000); 
 
             
      
      </script>"; 
  
 
  
                  }
   
      }
  
  
  */
  




      

    if(isset($_POST['update_module_f'])){

        $module_f = $_POST['module_f'];
        $student_id = $_POST['student_id'];
        $course_id = $_POST['course_id'];
        $module_f_grade = $_POST['module_f_grade'];

  
       

                  if(isset($_POST['res_id'])){
                    $res_id = $_POST['res_id'];
       
  
                    $up_doc =  $getFromExam->update('result', $res_id, array('student_id'=>$student_id, 'course_id'=>$course_id,'final'=>$module_f, 'module_f_g'=>$module_f_grade));
                   
                 }else{
                   $up_doc =  $getFromExam->create('result', array('student_id'=>$student_id, 'course_id'=>$course_id,'final'=>$module_f, 'module_f_g'=>$module_f_grade));
                   $res_id = $up_doc;
       
                 }

       
       if($up_doc){
      //var_dump($up_doc);

      echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.success('Final Module is Saved.')
       
         /* Toast.fire({
            type: 'success',
            title: ' Price Info Saved .'
          })*/
       
      });

      setInterval(() => {
        window.open('admin/student/result_upload.php?res_id=".$res_id."','_self');
      }, 2000); 
 
    
    </script>";
   
      }else{
        echo "<script type='text/javascript'>
        $(function() {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
          toastr.error('  Failed to Save Final Module .')
        
        
        
        });
       
      setInterval(() => {
        window.open('admin/student/result_upload.php?res_id=".$res_id."','_self');
      }, 2000); 
 
             
      
      </script>"; 
  
 
  
                  }
   
      }
  
  
  
  











?>