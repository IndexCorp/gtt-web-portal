
          <?php
    $search_bu_cat_stu = 'active';

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
    <form  method="post" id="student_general_search_form" class="mb-3 border-bottom pb-3">
     
    <div class="d-flex">
                                    <div class="search-form mr-3 search-form--light">
                                    <input type="text" name="student_search" class="form-control" placeholder="Search courses" id="student_search">
                                        <input class="btn " name="submit_search" value="" type="submit"><i type="submit" id="search_btn" class="btn material-icons">search</i>
                                    </div>
                                </form>
                                    <div class="form-inline ml-auto">
                                        <div class="form-group mr-3">
                                            <label for="student_category" class="form-label mr-1">Category</label>
                                            <select id="student_category" class="form-control custom-select" style="width: 200px;">
                                                 <option selected="">All categories</option>
                            <?php

                                $categories =  $getFromCourse->get_multi('course_category');

                                foreach($categories as $cat):

                                ?>

                                <option value="<?=$cat->id?>"><?=$cat->cat_name;?></option>

                                <?php endforeach;?>
                        </select>
                    </div>
                   <!-- <div class="form-group">
                        <label for="published01" class="form-label mr-1">Status</label>
                        <select id="published01" class="form-control custom-select" style="width: 200px;">
                            <option selected="">All</option>
                            <option value="1">In Progress</option>
                            <option value="2">Completed</option>
                            <option value="3">New Courses</option>
                        </select>
                    </div>-->
                </div>
            </div>
            </form>
      

        <div class="row">

        <?php 

            if(isset($_GET['search_by_cat-stu'])){
                $c_id = $_GET['search_by_cat-stu'];
             
                $news =$getFromCourse->search_course_by_cat_stud($std_id, $c_id);
                
                foreach($news as $datas):
            
        ?>

            <div class="col-md-3">
                <div class="card card__course">
                    <div class="card-header card-header-large card-header-dark bg-dark d-flex justify-content-center">
                        <a class="card-header__title  justify-content-center align-self-center d-flex flex-column" href="student/start_course/<?=$getFromCourse->get_single('courses', $datas->course_id)->id;?>">
                            <span><img src="<?=BASE_URL?>/admin/<?=$getFromCourse->get_single('courses', $datas->course_id)->avatar;?>" class="mb-1" style="width:100%; height: auto;" alt="logo"></span>
                        </a>
                    </div>
                    <div class="p-3">
                        <span class="course__subtitle"><?=$getFromCourse->get_single('courses', $datas->course_id)->course_name;?> (<?=$getFromCourse->get_single('courses', $datas->course_id)->course_abrev;?>)</span>

                        <div class="mb-2">
                           
                            <small class="text-muted">(<?=$getFromCourse->count_courses($getFromCourse->get_single('courses', $datas->course_id)->id);?> + &nbsp;students)</small>
                        </div>
                        <div class=" align-items-center">
                            <a href="student/start_course/<?=$getFromCourse->get_single('courses', $datas->course_id)->id;?>" class="btn btn-primary ml-auto">Resume Course <i class="material-icons">arrow_forward</i></a>
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
