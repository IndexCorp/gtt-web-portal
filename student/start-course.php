<?php
    $start_course = 'active';

?>
   <?php 
        if(isset($_GET['start_course'])){
            $course_id = $_GET['start_course'];


            $course = $getFromCourse->get_single('courses', $course_id);
        }
    
    ?>
                <!-- CONTENT -->
                <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


                    <div class="hero-banner bg-dark d-flex flex-row align-items-center" style="height:250px;">
                        <div class="container-fluid page__container">
                            <div class="d-flex flex-column">
                                <div class="mb-1">
                                    <a href="student/my_courses/" class="badge badge-dark-gray text-white" onclick="goBack()">Back to Courses</a>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <div class="mr-3">
                                        <img src="<?=BASE_URL?>/admin/<?=$course->avatar;?>" width="100" alt="rails logo">
                                    </div>
                                    <div>
                                        <h1 class="text-white mb-0"><?=$course->course_name;?> (<?=$course->course_abrev;?>)                                        </h1>
                                        <p class="lead text-white"><?=$course->descs;?> </p>
                                        <div class="my-2 text-white d-flex">
                                            <strong class="mr-4 "><i class="material-icons icon-16pt icon-light">weekend</i> <?=$course->level;?> </strong>
                                            <strong><i class="material-icons icon-16pt icon-light">watch_later</i> </strong>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-1">
                                    <a href="student/learning/<?=$course->id;?>" class="btn btn-light btn-rounded mr-2">Start Course</a><!--<a href="#" class="btn btn-outline-light text-white btn-hover-primary btn-rounded"><i class="material-icons">local_activity</i> Add to list</a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="container-fluid page__container">
                        
                        <div class="row">
                            <div class="col-lg-8">
                                <a class="dp-preview card">
                                    <img src="<?=BASE_URL?>/admin/<?=$course->img_preview;?>" alt="digital product" class="img-fluid">
                                   
                                </a>
                                <div class="mb-3"><strong class="text-dark-gray">DESCRIPTION</strong></div>
                                <p class="mb-3">
                                <?=$course->descs;?>
                                </p>


                                <div class="">
                                    <ul class="list-group list-lessons">
                                    <?php
                                         $course_contents =  $getFromCourse->get_single_g('course_content','course_id', $course_id);
                                                $sn = 0;
                                         foreach($course_contents as $content):
                                            $sn +=1;
                                      
                                    ?>
                                        <li class="list-group-item d-flex">
                                            <a ><?=$sn?>. <?=$content->title?></a>
                                            <div class="ml-auto d-flex align-items-center">
                                               <span class="badge badge-warning mr-2"><?=$content->type;?></span>
                                                <span class="text-muted"><i class="material-icons icon-16pt icon-light">watch_later</i> <?=$content->duration?></span>
                                            </div>
                                        </li>

                                        <?php endforeach;?>
                                       
                                        
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card card-body">

                                    <div class="mb-4">
                                        <a href="student/learning/<?=$course->id;?>" class="btn btn-success btn-block btn-lg">Start Learning</a>
                                        <a class="btn btn-warning  btn-block btn-lg ml-auto text-white" id="rate_this_courses" data-toggle="modal" data-target="#modal-rating" ><i class="material-icons" >star</i>Rate this Course</a>
                                    </div>

                                    <div class="mb-4 text-center">
                                        <div class="d-flex flex-column align-items-center justify-content-center">

                                            <span class="mb-1">
                                            <?php 
                                                $get_rating_count = $getFromCourse->get_count_where('rating', 'course_id', $course->id);
                                                $get_sum_rating = $getFromCourse->get_sum_where('rating', 'rating', 'course_id', $course->id);
                                                @$total_rating = $get_sum_rating /  $get_rating_count;
                                               // $total_rating = 4.5;

                                                $go = 1;

                                                while($go <= @round($total_rating)){

                                             
                                            ?>
                                                <a  class="rating-link active"><i class="material-icons ">star </i></a>
                                                    <?php  $go +=1;  }?>
                                            </span>
                                            <div class="d-flex align-items-center">
                                                <strong> <?php if($total_rating >=0){
                                                    echo $total_rating;
                                                }else{
                                                    echo 0;
                                                } ;?>/5</strong>
                                                <span class="text-muted ml-1">— <?=@$get_rating_count;?> reviews</span>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="list-group list-group-flush mb-4">
                                        <div class="list-group-item bg-transparent d-flex align-items-center px-0">
                                            <strong>Level</strong>
                                            <div class="ml-auto"><?=$course->level?></div>
                                        </div>
                                        <div class="list-group-item bg-transparent d-flex align-items-center px-0">
                                            <strong>Released</strong>
                                            <div class="ml-auto"><?=$course->date_created?></div>
                                        </div>
                                        <div class="list-group-item bg-transparent d-flex align-items-center px-0">
                                            <strong>Students</strong>
                                            <div class="ml-auto"><?=@$getFromCourse->count_courses($course->id);?></div>
                                        </div>
                                    </div>

                                    <div class="card card-body mb-0 bg-dark">
                                        <ul class="list-unstyled text-white ml-1 mb-0">
                                            <li class="d-flex align-items-center pb-1"><i class="material-icons icon-16pt text-white mr-2">check_circle</i> Created by the Global Trade Tutors</li>
                                            <li class="d-flex align-items-center pb-1"><i class="material-icons icon-16pt text-white mr-2">check_circle</i> 6 Months Support</li>
                                            <li class="d-flex align-items-center"><i class="material-icons icon-16pt text-white mr-2">check_circle</i> AIES Certification</li>
                                        </ul>
                                    </div>

                                </div>
                                
                            </div>
                        </div>
                    </div>


                </div>
                <!-- // END BODY -->

         