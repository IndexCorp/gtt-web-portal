<?php
    $start_course = 'active';

?>
   <?php 
        if(isset($_GET['learning'])){
            $course_id = $_GET['learning'];

            $course = $getFromCourse->get_single('courses', $course_id);
           // $ongoing = $getFromCourse->update('student_courses', $course->id, array(''))
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
                                        <h1 class="text-white mb-0"><?=$course->course_name;?> (<?=$course->course_abrev;?>) </h1>
                                        <p class="lead text-white"><?=$course->descs;?> </p>
                                        <div class="my-2 text-white d-flex">
                                            <strong class="mr-4 "><i class="material-icons icon-16pt icon-light">weekend</i> <?=$course->level;?> </strong>
                                            <strong><i class="material-icons icon-16pt icon-light">watch_later</i> </strong>
                                        </div>
                                    </div>
                                </div>


                                <div class="mt-1">
                                    <button class="btn btn-light btn-rounded mr-2">Resume Course</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="container-fluid page__container">
                        
                        <div class="row">
                            <div class="col-lg-10">
                               

                                <div class="">
                                    <ul class="list-group list-lessons">
                                    <?php
                                         $course_contents =  $getFromCourse->get_single_g('course_content','course_id', $course_id);
                                                $sn = 0;
                                        
                                                foreach($course_contents as $content):
                                            $sn +=1;
                                            $type = $content->type;

                                            if($type == 'Video'){
                                      
                                    ?>
                                       <a href="#modal-learning" name="modal_learning_name" id="modal_learning_id <?=$content->id?>"  my_value="<?=$content->link?>" my_id="<?=$content->id?>"   my_course_id="<?=$course->id?>" data-toggle="modal" data-id="<?=$content->id;?>" >
                                            
                                             <li class="list-group-item d-flex text-danger"><?=$sn?>. <?=$content->title?>
                                                <div class="ml-auto d-flex align-items-center">
                                                <span class="badge badge-warning mr-2"><?=$content->type;?></span>
                                                    <span class="text-muted"><i class="material-icons icon-16pt icon-light">watch_later</i> <?=$content->duration?></span>
                                                </div>
                                            </li>
                                        </a> 
                                        <?php }else{?> 

                                          <a href="#modal-audio" name="modal_audio_name" id="modal_audio_id <?=$content->id?>"  my_value="<?=$content->link?>"  my_id="<?=$content->id?>"  my_course_id="<?=$course->id?>"  data-toggle="modal" data-id="<?=$content->id;?>" >
                                            
                                             <li class="list-group-item d-flex text-danger"><?=$sn?>. <?=$content->title?>
                                                <div class="ml-auto d-flex align-items-center">
                                                <span class="badge badge-warning mr-2"><?=$content->type;?></span>
                                                    <span class="text-muted"><i class="material-icons icon-16pt icon-light">watch_later</i> <?=$content->duration?></span>
                                                </div>
                                            </li>
                                        </a> 


                                        <?php }
                                    endforeach;?>
                                       
                                        
                                    </ul>
                                </div>
                            </div>
                           
                        </div>
                    </div>


                </div>
                <!-- // END BODY -->

         