
        <?php
    $student_dashboard = 'active';
    $get_prospectus = $getFromCourse->get_single('prospectus', 1);
  
   
?>
        <!-- Header Layout Content -->
                <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


                    <div class="container-fluid page__container">
                    <h2>Welcome <?=$fname.' '.$sname?> </h2>
                 <!--<div class="alert alert-soft-warning d-flex align-items-center card-margin" role="alert">
                            <i class="material-icons mr-3">error_outline</i>
                            <div class="text-body">You have <strong>5 days left</strong> on your subscription</div>
                            <a href="#" class="btn btn-warning ml-auto">Upgrade</a>
                        </div>-->

                        <div class="row">
                            <div class="col-lg-7">

                                <div class="card">
                                    <div class="card-header card-header-large bg-light d-flex align-items-center">
                                        <div class="flex">
                                            <h4 class="card-header__title">In Progress</h4>
                                            <div class="card-subtitle text-muted">Your recent courses</div>
                                        </div>
                                        <div class="ml-auto">
                                            <a href="student/my_courses/" class="btn btn-light">Browse All</a>
                                        </div>
                                    </div>




                                    <ul class="list-group list-group-flush mb-0" style="z-index: initial;">
                                        <?php
                                            $courses_list = $getFromCourse->get_in_progress($std_id);
                                            foreach($courses_list as $asd):
                                                $list = $getFromCourse->get_single('courses', $asd->course_id);

                                                $cert = @$getFromCourse->get_files_query('student_cert', $asd->course_id, $std_id );
    
                                                $aies = @$getFromCourse->get_files_query('aies_letter',  $asd->course_id, $std_id );
                                            

                                        ?>
                                            <li class="list-group-item" style="z-index: initial;">
                                                <div class="d-flex align-items-center">
                                                    <div class="media align-items-center">
                                                        <div class="avatar avatar-xs mr-2">
                                                        <a href="#" class="mr-3">
                                                        <img src="<?=BASE_URL?>/admin/<?=$list->avatar;?>" alt="course" class="avatar-img rounded-circle">

                                                    </a>
                                                          
                                                        </div>
                                                    
                                                    </div>
                                                   
                                                    <div class="flex">
                                                        <a href="student/learning/<?=$list->id;?>" class="text-body"><strong><?=$list->course_name;?></strong></a>
                                                        <div class="d-flex align-items-center">
                                                        <?php 
                                                            
                                                            $get_progress = $getFromCourse->course_progress($list->id);
                                                            $get_bit = $getFromCourse->course_course_viewed($list->id, $std_id);

                                                            $get_div =number_format(($get_bit / $get_progress) * 100, 2);
                                                            //$get_div = 89;
                                                        ?>
                                                            <div class="progress" style="width: 100px; height:4px;">
                                                            <?php 
                                                                if($get_div <= 20){
                                                            ?>
                                                                <div class="progress-bar bg-danger" role="progressbar" style="width: <?=$get_div?>%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    <?php }elseif($get_div <= 40){?>
                                                                        <div class="progress-bar bg-warning" role="progressbar" style="width: <?=$get_div?>%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                                

                                                                    <?php  }elseif($get_div <= 60){ ?>
                                                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: <?=$get_div?>%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                                

                                                                    <?php }elseif($get_div <= 80){?>
                                                                        <div class="progress-bar bg-primary" role="progressbar" style="width: <?=$get_div?>%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                                

                                                                    <?php  }elseif($get_div <= 100){ ?>
                                                                        <div class="progress-bar bg-success" role="progressbar" style="width: <?=$get_div?>%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                                


                                                                            <?php } ?>
                                                          </div>
                                                          
                                                            <small class="text-muted ml-2"><?=$get_div?>%</small>

                                                           
                                                        <!--    <small class="text-muted ml-2">25%</small>-->
                                                        </div>
                                                    </div>
                                                    <div class="dropdown ml-3">
                                                        <a href="#" class="dropdown-toggle text-muted" data-caret="false" data-toggle="dropdown">
                                                            <i class="material-icons">more_vert</i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item"  target="/" href="document/<?=@$aies->letter;?>" >AIES Letter</a>
                                                            <a class="dropdown-item"  target="/" href="document/<?=@$cert->document;?>">Certificate</a>
                                                         </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <?php endforeach;?>

                                      

                                    </ul>
                                </div>

                                
                                <?php /*       <div class="card">
                                        <div class="card-header card-header-large bg-light d-flex align-items-center">
                                            <div class="flex">
                                                <h4 class="card-header__title">My Results</h4>
                                                <div class="card-subtitle text-muted"> Assignments & Examinations</div>
                                            </div>
                                            <div class="dropdown ml-auto">
                                                <a class="btn btn-sm btn-light" href="#">View all</a>
                                            </div>
                                        </div>
    
    
    
                                        <ul class="list-group list-group-flush mb-0">
    
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body">
                                                        <a class="text-body mb-1" href="#"><strong>Certificate in Trade Customer Service (CTCS)</strong></a><br>
                                                        <div class="d-flex align-items-center">
                                                            <i class="material-icons icon-16pt text-muted mr-1">queue_play_next</i> <a href="take-course.html" class="small text-muted">Assignment</a>
                                                        </div>
                                                    </div>
                                                    <div class="media-right text-center d-flex align-items-center">
                                                        <span class="badge badge-warning mr-2">
                                                            Good
                                                        </span>
                                                        <h4 class="mb-0 text-warning">56%</h4>
                                                    </div>
                                                </div>
                                            </li>
    
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body">
                                                        <a class="text-body mb-1" href="#"><strong>Certified Basic Trade Professional (CBTP)</strong></a><br>
                                                        <div class="d-flex align-items-center">
                                                            <i class="material-icons icon-16pt text-muted mr-1">queue_play_next</i> <a href="take-course.html" class="small text-muted">Examination</a>
                                                        </div>
                                                    </div>
                                                    <div class="media-right text-center d-flex align-items-center">
                                                        <span class="badge badge-success mr-2">
                                                            Excellent
                                                        </span>
                                                        <h4 class="mb-0 text-success">98%</h4>
                                                    </div>
                                                </div>
                                            </li>
    
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body">
                                                        <a class="text-body mb-1" href="#"><strong>Certified Intermediate Trade Professional (CITP)</strong></a><br>
                                                        <div class="d-flex align-items-center">
                                                            <i class="material-icons icon-16pt text-muted mr-1">queue_play_next</i> <a href="take-course.html" class="small text-muted">Examination</a>
                                                        </div>
                                                    </div>
                                                    <div class="media-right text-center d-flex align-items-center">
                                                        <span class="badge badge-danger mr-2">
                                                            Failed
                                                        </span>
                                                        <h4 class="mb-0 text-danger">25%</h4>
                                                    </div>
                                                </div>
                                            </li>
    
                                        </ul>
                                    </div>

                              
                          */?>  </div>
                           
                         <div class="col-lg-5">
                                    <!-- START DOCUMENT -->
                                    <div class="card">
                                        <div class="card-header card-header-large bg-white d-flex align-items-center">
                                            <h4 class="card-header__title flex m-0">My Documents</h4>
                                           
                                        </div>
                                        
                                        <div class="list-group tab-content list-group-flush">
                                            <div class="tab-pane active show fade" id="activity_all">
    
    
                                                <div class="list-group-item list-group-item-action d-flex align-items-center ">
                                                    
    
                                                    <div class="flex">
                                                        <div class="d-flex align-items-middle">
                                                        
                                                            <strong class="text-15pt mr-1">Prospectus</strong>
                                                        </div>
                                                    </div>
                                                    <a class="btn btn-outline-info" target="/" href="document/<?=$get_prospectus->doc?>">Open File</a>
                           
    
                                                </div>


                                                
                                                <!-- Result-->
                                                <div class="list-group-item list-group-item-action d-flex align-items-center ">
                                                    
    
                                                    <div class="flex">
                                                        <div class="d-flex align-items-middle">
                                                        
                                                            <strong class="text-15pt mr-1"> Results </strong>

                                                        </div>
                                                    </div>
                                                    <a href="student/result/" class="btn btn-outline-primary">View</a>
    
    
                                                </div>

                           </div>
                           </div>
                           </div>
                           </div>
                           </div></div>

                </div>
                <!-- // END header-layout__content -->

          