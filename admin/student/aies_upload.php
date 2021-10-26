<?php
    //include('includes/header.inc.php');

    include_once('../../config/configuration.php');
   
    include_once('../../config/init.php');
   




  include('../includes/header_new.php');
    ?>
 <?php


    if(isset($_GET['std'])){
        if(!empty($_GET['std'])){
            $id = $_GET['std'];


            $aies_upload = $getFromCourse->get_single('user', $id);

        }
        if(isset($_GET['aies'])){
            $aies_id = $_GET['aies'];

            $aies_details= $getFromCourse->get_single('aies_letter', $aies_id);
        }
       
    }
?>  
   <!-- Content -->
  <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


<div class="page__heading border-bottom">
    <div class="container-fluid page__container d-flex align-items-center">
        <h1 class="mb-0">Upload AIES Letter for <span style="color: red;"> <?=$aies_upload->firstname.' '. $aies_upload->surname;?></span></h1>
      
    </div>
    <div class="mb-1 ml-5">
        <a href="admin/manage_aies/<?=$id?>" class="badge badge-dark-gray text-white" >Back </a>
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
                            <form method="post" action="admin/student/aies_upload.php?std=<?=@$id?>" enctype="multipart/form-data">
                                <h4 class="card-header__title">Student AIES Letter</h4>
                                <div class="form-group dropzone" data-select2-id="18" action="/file-upload">
                                    <label for="country"><strong>Select  Course</strong></label><br>
                                    <select id="select01" name="course_id" data-toggle="select" required class="form-control select2-hidden-accessible" data-select2-id="select01" tabindex="-1" aria-hidden="true">
                                
                                    <?php
                                        if(isset($_GET['aies'])){
                            
                                       ?>   
                                           <option value="<?=$getFromCourse->get_single('courses', $aies_details->course_id)->id;?>" ><?=$getFromCourse->get_single('courses', $aies_details->course_id)->course_name;?></option>
                                            
                                            <?php }else{?> 
                                                <option value="" >Select Course</option>
                                                 <?php }

                                            $courses =  @$getFromCourse->get_single_g('student_courses','student_id',$id );
                                            
                                            foreach($courses as $course):
                                                $get_cour = $getFromCourse->get_single('courses', $course->course_id);

                                            ?>

                                        <option value="<?=@$get_cour->id?>"><?=@$get_cour->course_name;?></option>
                                        
                                        <?php endforeach;?>
                                
                                    </select>

                             
                                </div>

                                <div class="form-group dropzone" data-select2-id="18" action="/file-upload">
                                <label for="select01">AIES Letter</label>
                                             
                                <?php
                                        if(isset($_GET['aies'])){
                            
                                       ?>   
                                           <br><label for="select01" style="color:red"><?=$aies_details->letter;?></label>
                                     
                                         
                                               <?php }?>
                                    <div class="fallback">
                                    <?php
                                        if(isset($_GET['aies'])){
                            
                                       ?>
                                         <input type="file"  name="avatar"  id ="avatar"  accept=".doc, .docx, .pdf" class="form-control">
                                      <?php }else{?>
                                        <input type="file"  name="avatar"  id ="avatar"  accept=".doc, .docx, .pdf" class="form-control" required>
                                      <?php }?>
                                       <?php 
                                        if(isset($_GET['aies'])){
                                       ?>
                                        <input type="hidden" name="id" value="<?=@$aies_id;?>">
                                        <?php }?>
                                    </div>
                                </div>
                               
                                <?php 
                                        if(isset($_GET['aies'])){
                                       ?>
                                <input type="submit" name="update_student_aies" value="Update AIES Letter" class="btn btn-outline-success">
                                <?php }else{?>
                                    <input type="submit" name="update_student_aies" value="Upload AIES Letter" class="btn btn-outline-primary">
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






    if(isset($_POST['update_student_aies'])){

        $eid = @$_POST['id'];
        $course_id = $_POST['course_id'];
  
        if(isset($_FILES['avatar']) ){
          if(!empty($_FILES['avatar']['name'][0])){
                  $fileRoots = $getFromCourse->uploadDoc($_FILES['avatar']);


                  if(isset($_POST['id'])){
  
                    $up_doc =  $getFromCourse->update('aies_letter', $eid, array('student_id'=>$id, 'course_id'=>$course_id,'letter' => $fileRoots));
                   
                 }else{
                   $up_doc =  $getFromCourse->create('aies_letter', array('student_id'=>$id, 'course_id'=>$course_id, 'letter' => $fileRoots));
                   
                 }

            }else{
                if(isset($_POST['id'])){
      
                    $up_doc =  $getFromCourse->update('aies_letter', $eid, array('student_id'=>$id, 'course_id'=>$course_id));
                   
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
       toastr.success(' AIES Letter  Saved.')
         
           /* Toast.fire({
              type: 'success',
              title: ' AIES Letter Details Saved .'
            })*/
         
        });
       setInterval(() => {
          window.open('admin/manage_aies/".$id."','_self');
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
          toastr.error('  Failed to Save Letter.')
        
        
        
        });
      
        setInterval(() => {
          window.open('admin/manage_aies/".$id."','_self');
        }, 2000);         
      
      </script>"; 
  
 
  
                  }
   
      }
  
  
  
  











?>