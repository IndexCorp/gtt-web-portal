<?php
    $courses = 'active';
 ?>
<!-- Content -->
<div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


    <div class="page__heading border-bottom">
        <div class="container-fluid page__container d-flex align-items-center">
            <h1 class="mb-0">Courses</h1>
            <a href="admin/courses" class="badge badge-dark-gray text-white" onclick="goBack()">Back to Courses</a>
            <?php 
                    if(isset($_SESSION['super_admin'])  OR isset($_SESSION['course'])){
                
                ?>   
            <a href="admin/new_course" class="btn btn-success ml-auto"><i class="material-icons">add</i> New Course</a>
     <?php } ?>   
     
     
     </div>
    </div>

    <div class="container-fluid page__container">

      
        <form class=" mb-3 border-bottom pb-3" method="post" id="admin_course_search_form">
            <div class="d-flex">
                <div class="search-form mr-3 search-form--light">
                    <input type="text" class="form-control"  name="search_item" placeholder="Search courses" id="search_course">
                    <button class="btn" type="submit" name="search_course_admin" id="search_course_admin"><i class="material-icons">search</i></button>
                </div>

                <div class="form-inline ml-auto">
                    <div class="form-group mr-3">
                        <label for="cat_search_admin" class="form-label mr-1">Category</label>
                        <select id="cat_search_admin" class="form-control" style="width: 200px;">
                        <option value="" >Select Course Category</option>
                   
                            
                             
                   <?php

                       $categories =  $getFromCourse->get_multi_sort('course_category', 'cat_name');
                       
                       foreach($categories as $cat):

                       ?>

                   <option value="<?=$cat->id?>"><?=$cat->cat_name;?></option>
                   
                   <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="publish_search" class="form-label mr-1">Published</label>
                        <select id="publish_search" class="form-control custom-select" style="width: 200px;">
                        <option selected="">Select Status</option>
                            <option value="1">Publish</option>
                            <option value="0">Draft</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>



        <div class="row">

            <?php

           // $courses =  $getFromCourse->get_multi('courses');
               
            //foreach($courses as $course):
         
            ?>

            <?php 

            if(isset($_GET['courses_search'])){
                $term = $_GET['courses_search'];
                $sn = 0;
                $news = $getFromCourse->get_course_g($term);
            //  var_dump($news);
                foreach($news as $course):
                    $sn +=1;
            ?>


            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex flex-column flex-sm-row">
                            <a href="#" class="avatar mb-3 w-xs-plus-down-100 mr-sm-3">
                            <img src="<?=BASE_URL?>/admin/<?=$course->avatar;?>" alt="Card image cap" class="avatar-img rounded-circle">
                         </a>
                            <div class="flex" style="min-width: 200px;">
                                <div class="d-flex">
                                    <div>
                                        <h4 class="card-title mb-1" style="color: blue;"><?=$course->course_name?> </h4>
                                    </div>
                                    <div class="dropdown ml-auto">
                                        <a href="#" class="dropdown-toggle text-muted" data-caret="false" data-toggle="dropdown">
                                            <i class="material-icons">more_vert</i>
                                        </a>

                                        <?php 
                    if(isset($_SESSION['super_admin'])  OR isset($_SESSION['course'])){
                
                ?>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="admin/new_course/<?=$course->id?>">Edit Course</a>
                                            <a class="dropdown-item" href="course_stat/<?=$course->course_abrev?>">Statistics</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item text-danger" href="course_archive/<?=$course->course_abrev?>">Archive</a>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="d-flex align-items-end">
                                    <div class="d-flex flex flex-column mr-3">
                                        <div class="d-flex align-items-center py-2 border-bottom">
                                            <span class="mr-2">&#36; <?=$course->disc_price?></span>
                                            <small class="text-muted ml-auto">
                                            <?php
                                                $count_sales = $getFromCourse->count_course_sales($course->course_abrev);
                                                echo $count_sales;
                                            
                                            ?> SALES</small>
                                        </div>
                                        <div class="d-flex align-items-center py-2">
                                            <span class="badge badge-soft-info mr-2"><?=$course->course_abrev?></span>
                                            <span class="badge badge-soft-secondary"><?=$course->level?></span>
                                          
                                            <?php 
                    if(isset($_SESSION['super_admin'])  OR isset($_SESSION['course'])){
                
                ?>
                  <a href="admin/new_course/<?=$course->id?>" class="btn btn-primary ml-auto"><i class="material-icons">edit</i> Edit Course</a>
                <?php }?>
                
                         </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        <?php endforeach; }?>
       
        </div>

    </div>

</div>
<!-- // END content -->