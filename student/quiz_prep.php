<?php 


//Start Student Exam 

if(isset($_POST['start_student_exam'])){

    $exam_id = $_POST['exam_id'];
    $course_id = $_POST['course_id'];
    $student_id = $_POST['student_id'];
    $question_no = $_POST['question_no'];
  
    
    $check = $getFromExam->get_student_exam_details( $exam_id, $student_id);
    $rounb = $check->round + 1;

    $get_exam_time = $getFromExam->get_single('exam', $exam_id);
    
    $save_re_exam = $getFromExam->create('student_exam_re', array('duration'=>$get_exam_time->duration,'exam_id'=>$exam_id, 'student_id'=>$student_id, 'round'=> $rounb));
      
   // $fecth_4_round = $getFromExam->get_student_exam_roun( $exam_id, $student_id);
    if(!empty($check)){
        
      $save_exam = $getFromExam->update_exam_std($exam_id, $student_id);

      if($save_exam){
            $get_round = $getFromExam->get_student_exam_details($exam_id, $student_id);
            $round = $get_round->round;
            $exams = $getFromExam->get_rand_quest($exam_id, $question_no);
        // echo "<script>alert(".$exam_id . $question_no.")</script>";
        $num = 0;
            foreach($exams as $exam ){
                $num +=1;
                $q_id = $exam->id;
                $save_live = $getFromExam->create('live_question', array('numbering'=>$num,'exam_id'=>$exam_id, 'student_id'=>$student_id, 'question_id'=> $q_id, 'round'=> $round));
            
            }

        }

   
    }else{
         $save_exam = $getFromExam->create('student_exam', array('exam_id'=>$exam_id, 'student_id'=>$student_id, 'round'=>1));
      
      if($save_exam){
         $get_round = $getFromExam->get_student_exam_details($exam_id, $student_id);
        $round = $get_round->round;
        $exams = $getFromExam->get_rand_quest($exam_id, $question_no);
        $num = 0;
        foreach($exams as $exam ){
            $num +=1;
            $q_id = $exam->id;
            $save_live = $getFromExam->create('live_question', array('numbering'=>$num,'exam_id'=>$exam_id, 'student_id'=>$student_id, 'question_id'=> $q_id, 'round'=> $round));
           
        }

    }

    } 

  


    
  
  }




?>

           <!-- Header Layout Content -->
           <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


<div class="page__heading border-bottom">
    <div class="container-fluid page__container d-flex align-items-center">
      
    </div>
</div>

<div class="container-fluid page__container">
    <div class="row">
   
    <div class="col-md-2 offset-5">
   
    <a class="btn btn-outline-primary" href="<?=BASE_URL?>student/student-quiz.php?exam_id=<?=$exam_id;?>&round=<?=$round;?>">Start Exam </a>
    </div>

    </div>

</div>


</div>
<!-- // END header-layout__content -->

