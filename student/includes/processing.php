
<?
//session_start();
include('../../config/init.php');

include('../../config/configuration.php');



if(isset($_POST['edit_question_admin']) ){
    $question_id = $_POST['question_id']; 
    $exam_id = $_POST['exam_id'];  

    $get_questions = $getFromGeneric->get_single('question', $question_id);

    $get_options = $getFromGeneric->get_single_g('options', 'question_id', $question_id);
    $option = '';



    $question = '
    <label for="exampleInputPassword1">Question</label>
    <input type="hidden" name="exam_id" id="exam_id" vaue="">
    <textarea class="form-control" required name="question"  id="question" placeholder="Enter course description..">'.$get_questions->question.'</textarea>

    ';
   
    $sn =0;
    foreach($get_options  as $options){
        $sn +=1;
        $option .='
        <div class="form-group  col-6">
            <label for="exampleInputEmail1">Option '.$sn.'</label>
            <input type="text" required class="form-control" name="option1"  value="'.$options->option.'"  id="option1"   placeholder="Enter Option One ..">
        </div>
        
        ';
    }
  
}

if(isset($_POST['rating'])){
     
     
    $rating = $_POST['rating'];
    $id = $_POST['std_id'];
    $course_id = $_POST['course_id'];
    $comment = $_POST['comment'];


    $save = $getFromGeneric->create('rating' , array('student_id'=>$id, 'course_id'=>$course_id,'rating'=>$rating));
    if($save){
       $review = $getFromGeneric->create('reviews' , array('student_id'=>$id, 'course_id'=>$course_id,'comment'=>$comment));
        if($review){
            $outpu = array(
                'success'	=>	true,    
               
                'result' => $id,
               
               
            );
        }
    }
  

      
    

    echo json_encode($outpu);

  


}


if(isset($_POST['exam_id'])){
    

    $exam_id  = $_POST['exam_id'];
    $round  = $_POST['round'];
    $student_id  = $_POST['student_id'];
    $type  = $_POST['types'];
    
        if($type == 'first'){
        
            $get = $getFromExam->get_first_question_live($exam_id, $round, $student_id);
            $current_ids = $get->question_id;

        }elseif($type == 'nav'){
            $current_id = $_POST['question_id'];      
            $get = $getFromExam->get_navs_question_live($exam_id, $round, $student_id, $current_id);
            $current_ids = $get->question_id;
        
     
       
        }elseif($type == 'next'){
            $current_id = $_POST['current'];
           // $get_active = $getFromExam->get_single('live_question', $current_id);
             
    
                
            $get = $getFromExam->get_next_question_live($exam_id, $round, $student_id, $current_id);
            $current_ids = $get->question_id;
            
           
        }elseif($type == 'previous'){
            $current_id = $_POST['current'];
           
           // $get_active = $getFromExam->get_single('live_question', $current_id);
           
         
            
                $get = $getFromExam->get_previous_question_live($exam_id, $round, $student_id, $current_id);
                $current_ids = $get->question_id;
    
           }


  
    

    $get_nav = $getFromExam->get_nav_question_live($exam_id, $round, $student_id);
    $nav_html ='';
    $num = 0;
    $count_nav = 0;
    foreach($get_nav as $nav){
        $colors = $getFromExam->get_nav_color_live($exam_id, $round, $student_id,  $nav->question_id);
        if(!empty($colors)){
            $color = 'btn-warning';
        }else{
            $color = 'btn-light';
        }

        if($nav->question_id  == $current_ids){
            $color = 'btn-info'; 
        }
        $count_nav +=1;
        $get_nav_question = $getFromGeneric->get_single('question', $nav->question_id);
        $nav_html .= '
    
        <a href="#" id="nav_plane_btn"  onclick="topFunction()" style="width: 60px; height: 30px; margin: 2px;"    class=" nav_plane_btn btn '.$color.'"    my_question="'.$get_nav_question->id.'">
                 '.$count_nav.'
               
        </a>
        ';
   

    }
   
     
   

     //  var_dump($get);
       $current = $get->id;
       $num = $get->numbering;
      
       $get_question = $getFromGeneric->get_single('question', $get->question_id);
       $get_attache = $getFromExam->get_singly_g('attachement','question_id', $get->question_id);
    
       $htmlb ='';
       $htmlh= '
           <div class="media align-items-center">
               <div class="media-left">
                   <h3 class="m-0 text-primary mr-2"><strong></strong></h3>
               </div>
              <div class="media-body" id=" '.$get_question->question.'">
             


                   <h5 class="card-title m-0">
                   <strong style="color: red">('.$num. '). </strong> ' .$get_question->question.'
                   </h5>
               </div>
           </div>
          
      ';

      if( !empty($get_attache)){

     
      
      $htmlb .='
      <div class="row">
            
     
           <div class="col-12" ><img class="img-fluid" src="admin/'.@$get_attache->file.'"></div>
           <h3 style="color: red">'.@$get_attache->instruction.'</h3><br>
    
    
           </div>   
 ';
}

           $options = $getFromExam->get_rand_option($get->question_id);
           foreach($options as $option){ 
            $check = '';
                $option_check = $getFromExam->check_choosen_option($exam_id, $round, $get->question_id, $student_id);
                if($option_check){
                    if($option_check->option_id == $option->id){
                        $check = 'checked';
                    }
                }
  
       
           
           $htmlb .='
               <div class="form-group">
                    <div class="custom-control custom-checkbox ">
                            <input type="radio"  id="'.$option->id.'" '.$check.'   my_question="'.$get->question_id.'"  my_id="'.$option->id.'" name="option_button" class="answer_opt" >
                            <label for="'.$option->id.'">'.$option->options.'</label>

                        </div>
                </div>
        
          ';

        }
       
      
        
        
     

     
    
    if(!empty($current_ids)){
     //   alert(data.success);
        $output = array(
               'success'	=>	true, 
                'htmlh' => $htmlh,  
                'htmlb' => $htmlb,
                'nav_html' => $nav_html,   
                'current' => $current
                
            );
    }else{
          $output = array(
               'success'	=>	false, 
              
                
            );
    }
        
        echo json_encode($output);
}

    
if(isset($_POST['option_id'])){

        $option_id = $_POST['option_id'];
        $question_id = $_POST['question_id'];
        $exam_id = $_POST['exam_id'];
        $round = $_POST['round'];
        $student_id = $_POST['student_id'];
   

        $check_option = $getFromExam->check_marking($exam_id , $question_id, $round, $student_id);
        
        $mark_opt = $getFromExam->get_single('options', $option_id);

        if(!empty($check_option)){

            $marking_id = $check_option->id;
            $create_marking = $getFromExam->update('marking_up', $marking_id, array('option_id'=>$option_id, 'mark'=>$mark_opt->is_correct));
    
        }else{
            $create_marking = $getFromExam->create('marking_up', array('student_id'=>$student_id, 'round'=>$round,'exam_id'=>$exam_id, 'question_id'=>$question_id,'option_id'=>$option_id, 'mark'=>$mark_opt->is_correct));
    
        }


   


}



if(isset($_POST['c_id'])){
     
     
    $c_id = $_POST['c_id'];
    $course_id = $_POST['course_id'];
   
   
   
    $check = $getFromCourse->check_student_course_prog($_SESSION['login_id'], $course_id, $c_id);

    if($check > 0){
           $outputs = array(
                   'success'	=>	true,
                  
                  
                  
               );
       
     
    }else{
        $save = $getFromGeneric->create('student_course_progress', array('student_id' => $_SESSION['login_id'], 'course_id' =>$course_id, 'course_content_id' =>$c_id,'status'=>1));
    
   
        if($save){
            $outputs = array(
                   'success'	=>	true,
                  
                  
                  
               );
       }
     
    }

      
    

    echo json_encode($outputs);

  


}





if(isset($_POST['student_id'])){
     
     
    $c_id = $_POST['c_id'];
    $course_id = $_POST['course_id'];
    $student_id = $_POST['student_id'];
   
   
   
   /* $check = $getFromCourse->check_student_course_prog($_SESSION['login_id'], $course_id, $c_id);

    if($check >0){
        $save = $getFromCourse->update_course_progress($student_id, $course_id,$c_id);
    //$save = $getFromGeneric->update_where('student_course_progress',$check->id, array('status'=>1));
    
   
        if($save){
           $outputs = array(
                   'success'	=>	true,                 
                  
                  
               );
            }
     
    }else{*/
        $save1 = $getFromCourse->create('student_course_progress', array('student_id' => $student_id, 'course_id' =>$course_id, 'course_content_id' =>$c_id,'status'=>1));
    
   
        if($save1){
            $outputs = array(
                   'success'	=>	true,                 
                  
                  
               );
       }
     
    //}

      
    

    echo json_encode($outputs);

  


}
