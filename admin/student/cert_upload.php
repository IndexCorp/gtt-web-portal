<?php
    //include('includes/header.inc.php');

    include_once('../../config/init.php');
   

    
    include_once('../../config/configuration.php');
   




  include('../includes/header_new.php');
    ?>
 <?php


    if(isset($_GET['std'])){
        if(!empty($_GET['std'])){
            $id = $_GET['std'];


            $cert_upload = $getFromCourse->get_single('user', $id);

        }
        if(isset($_GET['cert'])){
            $cert_id = $_GET['cert'];

            $cert_details= $getFromCourse->get_single('student_cert', $cert_id);
        }
       
    }
?>  
   <!-- Content -->
  <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


<div class="page__heading border-bottom">
    <div class="container-fluid page__container d-flex align-items-center">
        <h1 class="mb-0">Upload Certificate for <span style="color: red;"> <?=$cert_upload->firstname.' '. $cert_upload->surname;?></span></h1>
      
    </div>
    <div class="mb-1 ml-5">
        <a href="admin/manage_cert/<?=$id?>" class="badge badge-dark-gray text-white" >Back </a>
    </div>
</div>
<div class="bg-white border-bottom mb-3">
    <div class="container-fluid nav nav-tabs" role="tablist">
        <a href="#c-basic" class="active" data-toggle="tab" role="tab" aria-controls="activity_all" aria-selected="true">Upload Letter</a>
      
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
                            <form method="post" action="admin/student/cert_upload.php?std=<?=@$id?>" enctype="multipart/form-data">
                                <h4 class="card-header__title">Student Certificate</h4>
                                <div class="form-group dropzone" data-select2-id="18" action="/file-upload">
                                    <label for="country"><strong>Select  Course</strong></label><br>
                                    <select id="select01" name="course_id" data-toggle="select" required class="form-control select2-hidden-accessible" data-select2-id="select01" tabindex="-1" aria-hidden="true">
                                
                                    <?php
                                        if(isset($_GET['cert'])){
                            
                                       ?>   
                                           <option value="<?=$getFromCourse->get_single('courses', $cert_details->course_id)->id;?>" ><?=$getFromCourse->get_single('courses', $cert_details->course_id)->course_name;?></option>
                                            
                                            <?php }else{?> 
                                                <option value="" >Select Course</option>
                                                 <?php }

                                            $courses =  @$getFromCourse->get_courses();
                                            
                                            foreach($courses as $course):

                                            ?>

                                        <option value="<?=@$course->id?>"><?=@$course->course_name;?></option>
                                        
                                        <?php endforeach;?>
                                
                                    </select>

                             
                                </div>

                                <div class="form-group dropzone" data-select2-id="18" action="/file-upload">
                                <label for="select01">Certificate</label>
                                             
                                <?php
                                        if(isset($_GET['cert'])){
                            
                                       ?>   
                                           <br><label for="select01" style="color:red"><?=$cert_details->document;?></label>
                                     
                                         
                                               <?php }?>
                                    <div class="fallback">
                                    <?php
                                        if(isset($_GET['cert'])){
                            
                                       ?>
                                         <input type="file"  name="avatar"  id ="avatar"  accept=".doc, .docx, .pdf" class="form-control">
                                      <?php }else{?>
                                        <input type="file"  name="avatar"  id ="avatar"  accept=".doc, .docx, .pdf" class="form-control" required>
                                      <?php }?>
                                       <?php 
                                        if(isset($_GET['cert'])){
                                       ?>
                                        <input type="hidden" name="id" value="<?=@$cert_id;?>">
                                        <?php }?>
                                    </div>
                                </div>
                               
                                <?php 
                                        if(isset($_GET['cert'])){
                                       ?>
                                <input type="submit" name="update_student_cert" value="Update Certificate" class="btn btn-outline-success">
                                <?php }else{?>
                                    <input type="submit" name="update_student_cert" value="Upload Certificate" class="btn btn-outline-primary">
                                <?php }?>
                           </form>
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






    if(isset($_POST['update_student_cert'])){

        $eid = @$_POST['id'];
        $course_id = $_POST['course_id'];
  
        if(isset($_FILES['avatar']) ){
          if(!empty($_FILES['avatar']['name'][0])){
                  $fileRoots = $getFromCourse->uploadDoc($_FILES['avatar']);


                  if(isset($_POST['id'])){
  
                    $up_doc =  $getFromCourse->update('student_cert', $eid, array('student_id'=>$id, 'course_id'=>$course_id,'document' => $fileRoots));
                   
                 }else{
                   $up_doc =  $getFromCourse->create('student_cert', array('student_id'=>$id, 'course_id'=>$course_id, 'document' => $fileRoots));
                   
                 }

            }else{
                if(isset($_POST['id'])){
      
                    $up_doc =  $getFromCourse->update('student_cert', $eid, array('student_id'=>$id, 'course_id'=>$course_id));
                   
                 }
            }
            
        }   
                  if(!empty($up_doc)){
                    
        echo "<script type='text/javascript'>
        $(function() {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
       toastr.success(' Certificate  Saved.')
         
           /* Toast.fire({
              type: 'success',
              title: ' cert Letter Details Saved .'
            })*/
         
        });
       setInterval(() => {
          window.open('admin/manage_cert/".$id."','_self');
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
          toastr.error('  Failed to Save Certificate.')
        
        
        
        });
      
        setInterval(() => {
          window.open('admin/manage_cert/".$id."','_self');
        }, 2000);         
      
      </script>"; 
  
 
  
                  }
   
      }
  
  
  
  











?>