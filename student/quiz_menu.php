<?php
    $quiz_menu = 'active';

?>
                <!-- Header Layout Content -->
                <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


                    <div class="page__heading border-bottom">
                        <div class="container-fluid page__container d-flex align-items-center">
                            <h1 class="mb-0">Mock Exams Menu</h1>
                         </div>
                    </div>

                    <div class="container-fluid page__container">

                    <!--    <form action="#" class="mb-3 border-bottom">
                            <div class="form-group form-inline">
                                <label class="form-label mr-1" for="custom-select">Category</label><br>
                                <select id="custom-select" class="form-control custom-select" style="width: 200px;">
                                    <option selected>All categories</option>
                                    <option value="1">Vue.js</option>
                                    <option value="2">Node.js</option>
                                    <option value="3">GitHub</option>
                                </select>
                            </div>
                        </form>-->



                        <div class="card-columns">

                        <?php 
                            $get_exams = $getFromExam->get_exams($_SESSION['login_id']);

                            foreach ($get_exams as $exams):
                                $get_exam_detail = $getFromExam->exam_details($exams->exam_id);
                        ?>

                            <div class="card">
                                <div class="card-body media">
                                    <div class="media-left">
                                        <a  class="avatar avatar-lg mr-1">
                                            <img src="<?=BASE_URL;?>/admin/<?=$get_exam_detail->avatar;?>" alt="Exam image cap" class="avatar-course-img">
                                        </a>
                                    </div>
                                    <div class="media-body align-self-center">
                                        <h4 class="card-title mb-0"><a><?=$get_exam_detail->exam_name;?></a></h4>
                                        <span class="text-muted"><?=$get_exam_detail->question_no;?> Questions</span>
                                    </div>
                                </div>
                                <div class="card-footer d-flex bg-light">
                                    <div>
                                        <a href="student/quiz_result/<?=$exams->exam_id?>" class="btn btn-outline-success"> Review Result</a>
                                    </div>
                                    <div class="ml-auto">
                                    <form method="post"  action="student/quiz_prep/">
                                    <input type="hidden" name="exam_id" value="<?=$exams->exam_id; ?>">
                                    <input type="hidden" name="course_id" value="<?=$exams->course_id; ?>">
                                    <input type="hidden" name="question_no" value="<?=$get_exam_detail->question_no; ?>">
                                    <input type="hidden" name="student_id" value="<?=$_SESSION['login_id']; ?>">
                                   
                                   
                                   
                                        <input type="submit" name="start_student_exam"  class="btn btn-outline-primary btn-lg" value="Start Test">
                                    </form>
                                    </div>
                                </div>
                            </div>

                            <?php endforeach;?>

                         
                        </div>
                    </div>


                </div>
                <!-- // END header-layout__content -->

          