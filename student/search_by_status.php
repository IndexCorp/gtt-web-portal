<?php
    $search_by_status = 'active';

?>
          
          <!-- CONTENT -->
          <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


<div class="page__heading">
    <div class="container-fluid page__container">
        <h1 class="mb-0">My Courses
</h1>
    </div>
</div>

<div class="container-fluid page__container">
    <div class="container-fluid page__container">
        <form action="#" class="mb-3 border-bottom pb-3">
            <div class="d-flex">
                <div class="search-form mr-3 search-form--light">
                    <input type="text" class="form-control" placeholder="Search courses" id="searchSample02">
                    <button class="btn" type="button"><i class="material-icons">search</i></button>
                </div>
            </form>
                <div class="form-inline ml-auto">
                    <div class="form-group mr-3">
                        <label for="custom-select" class="form-label mr-1">Category</label>
                        <select id="custom" class="form-control custom-select" style="width: 200px;">
                            <option selected="">All categories</option>
                            <?php

                                $categories =  $getFromCourse->get_multi('course_category');

                                foreach($categories as $cat):

                                ?>

                                <option value="<?=$cat->id?>"><?=$cat->cat_name;?></option>

                                <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="published01" class="form-label mr-1">Status</label>
                        <select id="published01" class="form-control custom-select" style="width: 200px;">
                            <option selected="">All</option>
                            <option value="1">In Progress</option>
                            <option value="2">Completed</option>
                            <option value="3">New Courses</option>
                        </select>
                    </div>
                </div>
            </div>
      

        <div class="row">

        <?php 

            if(isset($_GET['search_by_status'])){
                $c_id = $_GET['search_by_status'];
             
                $news =$getFromCourse->get_single_g('courses', 'status', $c_id);
                
                foreach($news as $data):
            
        ?>

            <div class="col-md-3">
                <div class="card card__course">
                    <div class="card-header card-header-large card-header-dark bg-dark d-flex justify-content-center">
                        <a class="card-header__title  justify-content-center align-self-center d-flex flex-column" href="student/start_course/<?=$data->id;?>">
                            <span><img src="<?=BASE_URL?>/admin/<?=$data->avatar;?>" class="mb-1" style="width:100%; height: auto;" alt="logo"></span>
                        </a>
                    </div>
                    <div class="p-3">
                        <span class="course__subtitle"><?=$data->course_name;?> (<?=$data->course_abrev;?>)</span>

                        <div class="mb-2">
                           
                            <small class="text-muted">(<?=$getFromCourse->count_courses($data->id);?> + &nbsp;students)</small>
                        </div>
                        <div class=" align-items-center">
                            <a href="student/start_course/<?=$data->id;?>" class="btn btn-primary ml-auto">Start Course <i class="material-icons">arrow_forward</i></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
                endforeach;
                    }
                
            
            ?>
               
        </div>
        <hr>
        <div class="d-flex flex-row align-items-center mb-3">
           <!-- <div class="form-inline">
                View
                <select class="custom-select ml-2">
                    <option value="20" selected="">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                    <option value="200">200</option>
                </select>
            </div>-->
           
        </div>

    </div>
</div>


</div>
<!-- // END header-layout__content -->
