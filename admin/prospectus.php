
 <!-- Content -->
 <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


<div class="page__heading">
    <div class="container-fluid page__container">
        <h1 class="mb-0">Prospectus Management</h1>
    </div>
</div>

<div class="container-fluid page__container">
    <div class="card">
        
     


        <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values="[&quot;js-lists-values-employee-name&quot;]">

            <table class="table mb-0 thead-border-top-0">
                <thead>
                    <tr>

                        <th style="width: 18px;">
                           S/N
                        </th>

                        <th>Prospectus Open File </th>
                        <th>Manage </th>
                       
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



               
                    
                    $paginations =$getFromCourse->get_multi('prospectus');
                    $sn = 0;
                    foreach($paginations as $prospectus):
                        $sn +=1;
                


                ?>
                
                    <tr class="selected" >
                        <td>
                           <?=$sn;?>
                        </td>
                      
                        <td> 
                       <?php /* <a class="btn btn-outline-primary" target="/"  href="admin/student/open_file.php?id=<?=$prospectus->id?>&type=pros">Open</a>
                      */?>  
                      <a class="btn btn-outline-primary" target="/"  href="document/<?=$prospectus->doc?>">Open</a>
                        </td>

                        <td> 
                                <a class="btn btn-outline-success" href="admin/prospectus_create/<?= $prospectus->id;?>">Edit</a>
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