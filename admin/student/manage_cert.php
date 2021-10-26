
 
 <?php

if(isset($_GET['manage_cert'])){
    if(!empty($_GET['manage_cert'])){
        $id = $_GET['manage_cert'];

        $cert_upload = $getFromCourse->get_single('user', $id);

    }
   
}
?>

<!-- Content -->
 <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


<div class="page__heading">
    <div class="container-fluid page__container">
        <h1 class="mb-0"><span syle="color:red"><?=$cert_upload->firstname.' '.  $cert_upload->surname;?></span> Certificates</h1>
    </div>
</div>

<div class="container-fluid page__container">
    <div class="card">
        
        <div class="card-header">
        <form class="form-inline" method="post" id="student_search_form">
               

                <div class="custom-control mb-2 mr-sm-2 mb-sm-0">
                <a class="btn btn-outline-primary ml-auto" href="admin/student/cert_upload.php?std=<?=$id?>">
                   Upload New
                </a>
                </div>

               
            </form>
            
        </div>


        <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values="[&quot;js-lists-values-employee-name&quot;]">

            <table class="table mb-0 thead-border-top-0">
                <thead>
                    <tr>

                        <th style="width: 18px;">
                           S/N
                        </th>

                        <th>Course Name</th>
                        <th>Date Uploaded</th>
                         <th style="width: 150px;">Action</th>
                        <th style="width: 24px;">Edit</th>
                    </tr>
                </thead>
                <tbody class="list" id="staff">
                <?php

                   $cert =  $getFromGeneric->get_single_g('student_cert', 'student_id', $id);
                        $sn = 0;
                   foreach($cert as $cer):
                    $sn +=1;
                ?>

                
                    <tr class="selected" >
                        <td>
                           <?=$sn;?>
                        </td>
                        <td>
                        <?php 
                          $courses = $getFromGeneric->get_single('courses', $cer->course_id);

                          echo $courses->course_name;
                        ?>

                           

                        </td>


                        <td>

                       <?=$cer->date_created;?>
                        </td>
                        <td>
                       
                           <?php /*  <a class="btn btn-outline-info" href="admin/student/open_file.php?id=<?=$cer->id?>&type=cert?>">Open File</a>
                             */ ?>  <a class="btn btn-outline-primary" target="/"  href="document/<?=$cer->document?>">Open</a>
                     
                         
                        </td>
                         <td>
                            <a class="btn btn-outline-primary" href="admin/student/cert_upload.php?std=<?=$id?>&cert=<?=$cer->id?>">Edit</a>
                        </td>
                      
                       
                        
                    </tr>
                 
                <?php endforeach; ?>
                    
                  

                </tbody>
            </table>
        </div>

     

    </div>

</div>


</div>
<!-- // END content -->