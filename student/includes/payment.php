<?php
//$link = BASE_URL.'config/init.php';
session_start();
include('../../config/init.php');

include('../../config/configuration.php');



if(isset($_POST['ref']) ){
    $course_id = $_POST['course_id']; 
    $amount = $_POST['amount'];  
    $student_id = $_POST['student_id']; 
    $invoice_no = $_POST['ref'];  

    $confirm = $getFromPayment->ConfirmPaystackPayment($amount, $invoice_no, 'sk_live_571fa213cb6d23ed13bf604ceeff308b2a937f22');
    if($confirm === true){

      $payment =  $getFromCourse->create('payment', array('student_id'=>$student_id,'course_id'=>$course_id,'amount'=>$amount,'invoice_no'=>$invoice_no,'status'=>'paid'));
      
      if($payment){
           $course =  $getFromCourse->create('student_courses', array('student_id'=>$student_id,'course_id'=>$course_id,'status'=>1));
    
            if($course){
                $outpu = array(
                    'success'	=>	true,  
                    'result' => $id,
                
                
                );
            }
        }



     
   }else{

    $outpu = array(
        'success'	=>	false,    
       
       
    );
       
   }

   
   echo json_encode($outpu);


}


?>