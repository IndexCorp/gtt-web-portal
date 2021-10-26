
 <!-- Content -->
 <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


<div class="page__heading">
    <div class="container-fluid page__container">
        <h1 class="mb-0">Category Management</h1>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <p>
       <a class="btn btn-secondary btn-xs" href="admin/news/"> Back to Blog</a>
      
        </p> 
    </div>
</div>

<div class="container-fluid page__container">
    <div class="card">
        
        <div class="card-header">
             <form class="form-inline" method="post" id="student_search_form">
             
                <div class="custom-control mb-2 mr-sm-2 mb-sm-0">
                <a href="admin/create-blog-category/"  class="btn btn-outline-primary ml-auto">
                   New Category
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

                        <th>Category Name</th>
                        <th >Image</th>
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



                if(isset($_GET['blog-category'])){
                
                        $limit = 10;
                    if($_GET['blog-category'] == 0){
                            $page = 1;
                        $offset = (($page - 1)* $limit );
                    }else{
                        $page = $_GET['blog-category'];
                        $offset = (($page - 1)* $limit );
                    }

                    $cur =  $paginations =$getFromCourse->pagination_lower('blog_category', $offset, $limit);

                    $lower = ($page - 1) * $limit + $cur;
                    $uper = $getFromCourse->pagination_count('blog_category');


                    
                    
                    $paginations =$getFromCourse->pagination('blog_category', $offset, $limit, 'cat_name');
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

                                    <span class="js-lists-values-em;?></ployee-name"><?=$category->cat_name?></span>

                                </div>
                            </div>

                        </td>
                       

                        <td>

                            <div class="media align-items-center">
                                <div class="avatar avatar-xs mr-2">
                                    <img src="<?=BASE_URL?>admin/<?=$category->avatar;?>" alt="Avatar" class="avatar-img rounded-circle">
                                </div>
                               
                            </div>

                        </td>

                        <td> 
                                <a class="btn btn-light" href="admin/create-blog-category/<?= $category->id;?>">Edit</a>
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

                            <a href="admin/blog-category/<?=$page - 1?>" class=""><i class="material-icons float-left">arrow_backward</i></a>
                            <?php }?>
                              <?=$lower;?> <span class=" text-center text-black">of  <?=$uper;?></span>
                                
                              
                                 <?php 
                                    if($lower == $uper){

                                 
                                ?>
                                    <?php }else{
                                        ?> 
                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href="admin/blog-category/<?=$page + 1?>" class=""><i class="material-icons float-right">arrow_forward</i></a>
                                        <?php }?>
 
                                </div>
        </div>


    </div>

</div>


</div>
<!-- // END content -->