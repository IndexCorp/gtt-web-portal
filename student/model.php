
<?php




// Student   SCHEDULE  Exam

if(isset($_POST['student_schedule_exam'])){

  
  //$exam_id = $_POST['exam_id'];
  $course_id = $_POST['course_id'];
  $studnt_id = $_SESSION['login_id'];
  $starting = $_POST['starting'];
  //$ending = $_POST['ending'];


  $create_schedule = $getFromCourse->create('schedule_final', array('student_id'=>$student_id, 'course_id'=>$course_id,'exam_date'=>$starting));



  if($create_schedule){ 

   
    echo "<script type='text/javascript'>
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
   toastr.success('Exam has been Scheduled .')
     
       /* Toast.fire({
          type: 'success',
          title: ' Course Details Saved .'
        })*/
     
    });
  /*  setInterval(() => {
      window.open('student/schedule_exam/','_self');
    }, 2000);*/
  
  </script>";
 
  }else{
    echo "<script type='text/javascript'>
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
      toastr.error('  Failed to Schedule Exam.')
    
    
    
    });
  
                
  
  </script>"; 


      }
}




// Exam Postponement Notification 

if(isset($_POST['postpone_exam']))
{
    
}


// Notify Students of Exams

if(isset($_POST['notify_student_exam']))
{

  $exam_id = $_POST['exam_id'];
  $course_id = $_POST['course_id'];
  $start_date = $_POST['start_date'];

  $get_exam_det= $getFromExam->get_single('exam', $exam_id);

  $get_course_det= $getFromExam->get_single('courses', $course_id);


  $subject = "Global Trade Tutor Examination Notice";
        
  

  $get_students = $getFromExam->get_single_g('student_courses', 'course_id', $course_id);
  
  foreach($get_students as $get_std){
    $get_studes = $getFromExam->get_single('user', $get_std->student_id);
    $email = $get_studes->email;

    $body = "
  <html>
  <head>
  <title>Global Trade Tutor Examination Notice</title>
  </head>
  <body>
  <p> Dear ".$get_studes->firstname."</p>
  <p>This is to notify you that your  ".$get_exam_det->exam_name."  exam  is starting on ".$start_date." </p>
  <p> Login to your portal <a href='https://tutor.globaltradecollege.com/auth/'>Here</a> to Start your Exam.</p>
  <p>Thanks</p>
  <h3>Global Trade College</h3>
  </body>
  </html>
  ";



    $send_mail = $getFromGeneric->sendmail($email,$subject,$body);

   

  }

  $bodys = "
  <html>
  <head>
  <title>Global Trade Tutor Examination Notice</title>
  </head>
  <body>
  <p> Dear Admin</p>
  <p>This is to notify you that  ".$get_exam_det->exam_name."  exam  is starting on ".$get_exam_det->start_date." </p>
  <p> Login to your portal <a href='https://tutor.globaltradecollege.com/auth/'>Here</a> to Start your Exam.</p>
  <p>Thanks</p>
  <h3>Global Trade College</h3>
  </body>
  </html>
  ";
  $send_mail = $getFromGeneric->sendmail('info@3timpex.com',$subject,$bodys);



if($send_mail){ 


  echo "<script type='text/javascript'>
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
      toastr.success(' Exam Notification has been Sent to all student.')
     
       /* Toast.fire({
          type: 'success',
          title: ' Price Info Saved .'
        })*/
     
    });
   setInterval(() => {
      window.open('admin/schedule_exam/','_self');
    }, 1000);
  
  </script>";
 
  }else{
    echo "<script type='text/javascript'>
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
      toastr.error('  Failed to Send the Exam Notifications.')
    
    
    
    });
  
                
  
  </script>"; 

}



}






// ADMIN CREATE SCHEDULE 

if(isset($_POST['create_schedule_exam'])){

  $exam_id = $_POST['exam_id'];
  $course_id = $_POST['course_id'];
  $starting = $_POST['starting'];
  $ending = $_POST['ending'];


  $create_schedule = $getFromCourse->create('course_exam', array('exam_id'=>$exam_id,'course_id'=>$course_id,'start_date'=>$starting,'end_date'=>$ending));



  if($create_schedule){ 

   
    echo "<script type='text/javascript'>
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
   toastr.success('Exam has been Scheduled .')
     
       /* Toast.fire({
          type: 'success',
          title: ' Course Details Saved .'
        })*/
     
    });
    setInterval(() => {
      window.open('admin/schedule_exam/','_self');
    }, 2000);
  
  </script>";
 
  }else{
    echo "<script type='text/javascript'>
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
      toastr.error('  Failed to Schedule Exam.')
    
    
    
    });
  
                
  
  </script>"; 


      }
}

// Admi Create Exam

if(isset($_POST['exam_course'])){

  $exam_name  = $_POST['exam_name'];
  $question_no  = $_POST['question_no'];
  $duration  = $_POST['duration'];
 // $avatar  = $_POST['avatar'];
  $det  = $_POST['det'];
  $ids  = @$_POST['ids'];


  if($det == 'save'){

    
        if(isset($_FILES['avatar']) ){
          if(!empty($_FILES['avatar']['name'][0])){
                  $avatar = $getFromCourse->uploadImage($_FILES['avatar']);
                  $create_exam = $getFromExam->create('exam',  array('exam_name'=>$exam_name,'question_no'=>$question_no,'duration'=>$duration,'avatar'=>$avatar ));
          }
                
        }
       
   
    if($create_exam){ 

   
      echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
     toastr.success('Exam Details Saved.')
       
         /* Toast.fire({
            type: 'success',
            title: ' Course Details Saved .'
          })*/
       
      });
      setInterval(() => {
        window.open('admin/new_exam/".$create_exam."','_self');
      }, 2000);
    
    </script>";
   
    }else{
      echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.error('  Failed to Save Exam Details.')
      
      
      
      });
    
                  
    
    </script>"; 


        }
    

  }else{
    $ids = $_POST['ids'];

    if(isset($_FILES['avatar']) ){
      if(!empty($_FILES['avatar']['name'][0])){
              $avatar = $getFromCourse->uploadImage($_FILES['avatar']);
              $create_exam = $getFromCourse->update('exam',  $ids, array('exam_name'=>$exam_name,'question_no'=>$question_no,'duration'=>$duration,'avatar'=>$avatar ));
      }else{
        $create_exam = $getFromCourse->update('exam',  $ids, array('exam_name'=>$exam_name,'question_no'=>$question_no,'duration'=>$duration));
  
      }
    }
   
    if($create_exam){ 

   
      echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
     toastr.success('Exam Details Updated.')
       
         /* Toast.fire({
            type: 'success',
            title: ' Course Details Updated .'
          })*/
       
      });
      setInterval(() => {
        window.open('admin/new_exam/".$ids."','_self');
      }, 2000);
    
    </script>";
   
    }else{
      echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.error('  Failed to Update Exam Details.')
      
      
      
      });
      setInterval(() => {
        window.open('admin/new_exam/".$ids."','_self');
      }, 2000);
    
                  
    
    </script>"; 


        }
    

  }
   
   



  

}

//Admin Set Question 

if(isset($_POST['set_question'])){
  
    $question = $_POST['question'];
    // $subject_id = $_GET['question'];
    // $subject_id = 1;

    $correct = $_POST['correct'];
    $exam_id = $_POST['exam_id'];
    $option = array();
    $option[1] =  $_POST['option1'];
    $option[2] =  $_POST['option2'];
    $option[3] =  $_POST['option3'];
    $option[4] =  $_POST['option4'];
    $option[5] =  $_POST['option5'];


    $createQuestion = $getFromExam->create('question',  array('question'=>$question, 'exam_id'=>$id));
        
    if($createQuestion){ 

      $question_id = $createQuestion;

      $createOptions = $getFromExam->createOption($question_id, $correct, $option);     
      
      
  if($createOptions){ 

    echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.success(' Question Saved.')
       
         /* Toast.fire({
            type: 'success',
            title: ' Price Info Saved .'
          })*/
       
      });
     setInterval(() => {
        window.open('admin/new_exam/".$id."','_self');
      }, 1000);
    
    </script>";
   
    }else{
      echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.error('  Failed to Create Question.')
      
      
      
      });
    
      setInterval(() => {
        window.open('admin/new_exam/".$id."','_self');
      }, 1000);
    
                  
    
    </script>"; 

  }
    }
}

//Category Data

if(isset($_POST['category_data'])){

  $cat_name = $_POST['cat_name'];
  //$avatar = $_POST['avatar'];
  //$cat_type = $_POST['cat_type']; 
   $cat_id = @$_POST['cat_id'];
 

  if(isset($_FILES['avatar']) ){
    if(!empty($_FILES['avatar']['name'][0])){
            $fileRoot = $getFromCourse->uploadImage($_FILES['avatar']);
    }
  }

  if($_POST['cat_type']  == 'update'){

      
  $cat_info = $getFromCourse->update('course_category', $cat_id, array('cat_name'=>$cat_name,'avatar'=>$fileRoot));
  
  if($cat_info){ 

    echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.success(' Category Info Updated.')
       
         /* Toast.fire({
            type: 'success',
            title: ' Price Info Saved .'
          })*/
       
      });
     setInterval(() => {
        window.open('admin/create_category/".$cat_id."','_self');
      }, 1000);
    
    </script>";
   
    }else{
      echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.error('  Failed to Update Category Info.')
      
      
      
      });
    
                  
    
    </script>"; 

  }



  }else{
    
  $cat_info = $getFromCourse->create('course_category', array('cat_name'=>$cat_name, 'avatar'=>$fileRoot));
  
  if($cat_info){ 

    echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.success(' Category Info Saved.')
       
         /* Toast.fire({
            type: 'success',
            title: ' Price Info Saved .'
          })*/
       
      });
     setInterval(() => {
        window.open('admin/create_category/','_self');
      }, 1000);
    
    </script>";
   
    }else{
      echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.error('  Failed to Create Category.')
      
      
      
      });
    
                  
    
    </script>"; 

  }




  }
  
 


}










/*
      MAin Menu Forms
*/


    // Contact Us Page
    if(isset($_POST['contact_us_page'])){


      $email = $_POST['email'];
      $tel = $_POST['tel'];
      $name = $_POST['name'];
     


      $contact_us = $getFromGeneric->create('contact_us',  array('email'=>$email, 'tel'=>$tel, 'customer_name'=>$name));

      if($contact_us){ 

     
        echo "<script type='text/javascript'>
        $(function() {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
       toastr.success('Your Details has been Received Our Customer Services will get in touch with you..')
         
           /* Toast.fire({
              type: 'success',
              title: ' Course Details Saved .'
            })*/
         
        });
        setInterval(() => {
          window.open('".BASE_URL."/contact/','_self');
        }, 2000);
      
      </script>";
     
      }else{
        echo "<script type='text/javascript'>
        $(function() {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
          toastr.error('  Failed! Please Try again.')
        
        
        
        });
      
                    
      
      </script>"; 

  
          }
      


  }



  
    // Contact Us Page
    if(isset($_POST['newsletter_footer'])){


      $email = $_POST['email'];
     


      $newsletter = $getFromGeneric->create('newsletter',  array('email'=>$email));

      if($newsletter){ 

     
        echo "<script type='text/javascript'>
        $(function() {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
       toastr.success('Stay Tuned for Our Newsletters...')
         
           /* Toast.fire({
              type: 'success',
              title: ' Course Details Saved .'
            })*/
         
        });
        setInterval(() => {
          window.open('".BASE_URL."/','_self');
        }, 2000);
      
      </script>";
     
      }else{
        echo "<script type='text/javascript'>
        $(function() {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
          toastr.error('  Failed! Please Try again.')
        
        
        
        });
      
                    
      
      </script>"; 

  
          }
      


  }


/*
      Education and Qualifications
*/
if(isset($_POST['save_student_qualification'])){

  $qualification = $_POST['qualification'];
  $pro_qualification = $_POST['pro_qualification'];
  $ond = @$_POST['ond'];
  $hnd = @$_POST['hnd'];
  $bsc = @$_POST['bsc'];
  $pgd = @$_POST['pgd'];
  $masters = @$_POST['masters'];
  $phd = @$_POST['phd'];
  $col_id = @$_POST['id'];

  $student_qualification_info = $getFromCourse->update('user', $col_id, array('qualification'=>$qualification, 'professionality'=>$pro_qualification, 'ond'=>$ond, 'hnd'=>$hnd, 'bsc'=>$bsc, 'pgd'=>$pgd, 'masters'=>$masters, 'phd'=>$phd));
  
    if($student_qualification_info){

      echo "<script type='text/javascript'>
        $(function() {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
          toastr.success(' Student Employment Info has Been Saved.')
         
           /* Toast.fire({
              type: 'success',
              title: ' Price Info Saved .'
            })*/
         
        });
       setInterval(() => {
          window.open('admin/student_reg/".$col_id."','_self');
        }, 2000);
      
      </script>";
     
      }else{
        echo "<script type='text/javascript'>
        $(function() {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
          toastr.error('  Failed to Save Employment Info.')
        
        
        
        });
      
                    
      
      </script>"; 

    }

}









/*
    * Admin Admin Activation/Deactivation Model
*/


//Student Activate


if(isset($_POST['student_activate_admin'])){
  $student = $_POST['student_id'];

  $update = $getFromAdmin->update('user', $student, array('statu'=>1));


    
if($update){ 

  echo "<script type='text/javascript'>
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
      toastr.success(' Admin activated Successfully.')
     
       /* Toast.fire({
          type: 'success',
          title: ' Price Info Saved .'
        })*/
     
    });
   setInterval(() => {
      window.open('admin/admin/','_self');
    }, 2000);
  
  </script>";
 
  }else{
    echo "<script type='text/javascript'>
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
      toastr.error('  Failed to activate Admin.')
      setInterval(() => {
          window.open('admin/admin/','_self');
        }, 2000);
    
    
    
    });
  
                
  
  </script>"; 

}

}

//Student De-Activated

if(isset($_POST['student_deactivate_admin'])){
  $student = $_POST['student_id'];

  $update = $getFromAdmin->update('user', $student, array('statu'=>0));

  
if($update){ 

  echo "<script type='text/javascript'>
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
      toastr.success(' Admin Deactivated.')
     
       /* Toast.fire({
          type: 'success',
          title: ' Price Info Saved .'
        })*/
     
    });
   setInterval(() => {
      window.open('admin/admin/','_self');
    }, 2000);
  
  </script>";
 
  }else{
    echo "<script type='text/javascript'>
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
      toastr.error('  Failed to deactivate Admin.')
      setInterval(() => {
          window.open('admin/admin/','_self');
        }, 2000);
    
    
    
    });
  
                
  
  </script>"; 

}

}










/*
    * Admin Student Activation Model
*/


//Student Activate


if(isset($_POST['student_activate'])){
  $student = $_POST['student_id'];

  $update = $getFromAdmin->update('user', $student, array('statu'=>1));


    
if($update){ 

  echo "<script type='text/javascript'>
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
      toastr.success(' Student activated Successfully.')
     
       /* Toast.fire({
          type: 'success',
          title: ' Price Info Saved .'
        })*/
     
    });
   setInterval(() => {
      window.open('admin/student/','_self');
    }, 2000);
  
  </script>";
 
  }else{
    echo "<script type='text/javascript'>
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
      toastr.error('  Failed to activate Student.')
      setInterval(() => {
          window.open('admin/student/','_self');
        }, 2000);
    
    
    
    });
  
                
  
  </script>"; 

}

}

//Student De-Activated

if(isset($_POST['student_deactivate'])){
  $student = $_POST['student_id'];

  $update = $getFromAdmin->update('user', $student, array('statu'=>0));

  
if($update){ 

  echo "<script type='text/javascript'>
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
      toastr.success(' Student Deactivated.')
     
       /* Toast.fire({
          type: 'success',
          title: ' Price Info Saved .'
        })*/
     
    });
   setInterval(() => {
      window.open('admin/student/','_self');
    }, 2000);
  
  </script>";
 
  }else{
    echo "<script type='text/javascript'>
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
      toastr.error('  Failed to deactivate Student.')
      setInterval(() => {
          window.open('admin/student/','_self');
        }, 2000);
    
    
    
    });
  
                
  
  </script>"; 

}

}








/*
    * Admin Admin Registration Model
*/


//Admin Bio Data

if(isset($_POST['admin_bio_data'])){

  $title = $_POST['title'];
  $surname = $_POST['surname'];
  $firstname = $_POST['firstname'];
  $gender = $_POST['gender'];
 /* $middlename = $_POST['middlename'];
  $dob = $_POST['dob'];
 
  $country = $_POST['country'];
  $address = $_POST['address'];*/
  $tel = $_POST['tel'];
  $email = $_POST['email'];
  $password = MD5($_POST['password']);
  $id_post = @$_POST['id_post'];

  /*if(isset($_FILES['profileimage']) ){
    if(!empty($_FILES['profileimage']['name'][0])){
            $fileRoot = $getFromCourse->uploadImage($_FILES['profileimage']);
    }
  }*/

  if($_POST['type_act']  == 'update'){

      
  $admin_bio = $getFromCourse->update('user', $id_post, array('surname'=>$surname,'title'=>$title,'firstname'=>$firstname,'gender'=>$gender,'email'=>$email,'tel'=>$tel,'password'=>$password,'type'=>'teacher'));
  
  if($admin_bio){ 

    echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.success(' Admin Bio Data Updated.')
       
         /* Toast.fire({
            type: 'success',
            title: ' Price Info Saved .'
          })*/
       
      });
     setInterval(() => {
        window.open('admin/manage-admin/".$id_post."','_self');
      }, 1000);
    
    </script>";
   
    }else{
      echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.error('  Failed to Update Admin Data.')
      
      
      
      });
    
                  
    
    </script>"; 

  }



  }else{
    
  $admin_bio = $getFromCourse->create('user', array('surname'=>$surname,'title'=>$title,'firstname'=>$firstname,'gender'=>$gender,'email'=>$email,'tel'=>$tel,'password'=>$password,'type'=>'teacher'));
  
  if($admin_bio){ 

    echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.success(' Admin Bio Data Saved.')
       
         /* Toast.fire({
            type: 'success',
            title: ' Price Info Saved .'
          })*/
       
      });
     setInterval(() => {
        window.open('admin/manage-admin/".$admin_bio."','_self');
      }, 1000);
    
    </script>";
   
    }else{
      echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.error('  Failed to Create Admin Data.')
      
      
      
      });
    
                  
    
    </script>"; 

  }




  }
  
 


}








/*
    * Admin Student Registration Model
*/


//Student Bio Data

if(isset($_POST['student_bio_data'])){

  $title = $_POST['title'];
  $surname = $_POST['surname'];
  $firstname = $_POST['firstname'];
  $middlename = $_POST['middlename'];
  $dob = $_POST['dob'];
  $gender = $_POST['gender'];
  $country = $_POST['country'];
  $address = $_POST['address'];
  $tel = $_POST['tel'];
   $password = MD5($_POST['password']);
   $pass = $_POST['password'];
  $email = $_POST['email'];
  $id_post = @$_POST['id_post'];

  if(isset($_FILES['profileimage']) ){
    if(!empty($_FILES['profileimage']['name'][0])){
            $fileRoot = $getFromCourse->uploadImage($_FILES['profileimage']);
            $student_bio = $getFromCourse->update('user', $id_post, array('surname'=>$surname,'password'=>$password,'title'=>$title,'firstname'=>$firstname,'middle_name'=>$middlename,'dob'=>$dob,'gender'=>$gender,'email'=>$email,'tel'=>$tel,'nationality'=>$country,'address'=>$address, 'type'=>'student', 'profileimage'=>$fileRoot));
    }else{
       
            $student_bio = $getFromCourse->update('user', $id_post, array('surname'=>$surname,'password'=>$password,'title'=>$title,'firstname'=>$firstname,'middle_name'=>$middlename,'dob'=>$dob,'gender'=>$gender,'email'=>$email,'tel'=>$tel,'nationality'=>$country,'address'=>$address, 'type'=>'student'));
            
          }
          
  }
       
  
 
  if($_POST['type_act']  == 'update'){

   
  if($student_bio){ 

    echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.success(' Student Bio Data Updated.')
       
         /* Toast.fire({
            type: 'success',
            title: ' Price Info Saved .'
          })*/
       
      });
     setInterval(() => {
        window.open('admin/student_reg/".$id_post."','_self');
      }, 1000);
    
    </script>";
   
    }else{
      echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.error('  Failed to Update Student Data.')
      
      
      
      });
    
                  
    
    </script>"; 

  }



  }else{
    
    $subject = "Global Trade Tutor";
        
    $body = "
    <html>
    <head>
    <title>Global Trade Tutor Login Details</title>
    </head>
    <body>
    <h2>Welcome <strong>".$firstname."</strong> to Global Trade Tutor</h2>
    <p> Click here to login to you <a href='http://tutor.globaltradecollege.com/auth'>Portal</a> </p>
    <table>
    <tr>
    <th>Email</th>
    
    <th></th>
    <th>Password</th>
    </tr>
    <tr>
    <td>".$email."</td>
    <td>&nbsp;&nbsp;&nbsp;</td>
    <td>".$pass."</td>
    </tr>
    </table>
    </body>
    </html>
    ";
    


  $student_bio = $getFromGeneric->create('user', array('surname'=>$surname,'password'=>$password,'title'=>$title,'firstname'=>$firstname,'middle_name'=>$middlename,'dob'=>$dob,'gender'=>$gender,'email'=>$email,'tel'=>$tel,'nationality'=>$country,'address'=>$address, 'type'=>'student', 'profileimage'=>$fileRoot));
  $send_mail = $getFromGeneric->sendmail($email,$subject,$body);

  if($student_bio &&  $send_mail){ 
  

    echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.success(' Student Bio Data Saved.')
       
         /* Toast.fire({
            type: 'success',
            title: ' Price Info Saved .'
          })*/
       
      });
     setInterval(() => {
        window.open('admin/student_reg/".$student_bio."','_self');
      }, 1000);
    
    </script>";
   
    }else{
      echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.error('  Failed to Create Student Data.')
      
      
      
      });
    
                  
    
    </script>"; 

  }




  }
  
 


}



//Delete Student Course Registration By Admin 

if(isset($_POST['delete_registered_student_course'])){
  $student_id = $_POST['student_id'];
  $course_id = $_POST['course_id'];

  
  $delete_course = $getFromGeneric->delete('student_courses', array('student_id'=> $student_id, 'course_id'=> $course_id));

  
  if($delete_course){ 

    echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.success('Course Removed Successfully.')
       
         /* Toast.fire({
            type: 'success',
            title: ' Price Info Saved .'
          })*/
       
      });
     setInterval(() => {
        window.open('admin/student_reg/".$student_id."','_self');
      }, 2000);
    
    </script>";
   
    }else{
      echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.error('  Failed to  Remove Course.')
      
      
      
      });
      setInterval(() => {
        window.open('admin/student_reg/".$student_id."','_self');
      }, 2000);
    
                  
    
    </script>"; 

  }
}







//Student Course Registration By Admin 

if(isset($_POST['register_course_for_student1'])){
  $student_id = $_POST['student_id'];
  $course_id = $_POST['course_id'];
  

  $student_course_reg = $getFromCourse->create('student_courses', array('student_id'=>$student_id, 'course_id'=>$course_id));
  
  if($student_course_reg){ 

    echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.success('Course Registration Successsfull.')
       
         /* Toast.fire({
            type: 'success',
            title: ' Price Info Saved .'
          })*/
       
      });
     setInterval(() => {
        window.open('admin/register-course/','_self');
      }, 2000);
    
    </script>";
   
    }else{
      echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.error('  Failed to  Register Course.')
      
      
      
      });
      setInterval(() => {
        window.open('admin/register-course/','_self');
      }, 2000);
    
                  
    
    </script>"; 

  }



}




//Student Course Registration By Admin 

if(isset($_POST['register_course_for_student'])){
  $student_id = $_POST['student_id'];
  $course_id = $_POST['course_id'];
  

  $student_course_reg = $getFromCourse->create('student_courses', array('student_id'=>$student_id, 'course_id'=>$course_id));
  
  if($student_course_reg){ 

    echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.success('Course Registration Successsfull.')
       
         /* Toast.fire({
            type: 'success',
            title: ' Price Info Saved .'
          })*/
       
      });
     setInterval(() => {
        window.open('admin/student_reg/".$student_id."','_self');
      }, 2000);
    
    </script>";
   
    }else{
      echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.error('  Failed to  Register Course.')
      
      
      
      });
      setInterval(() => {
        window.open('admin/student_reg/".$student_id."','_self');
      }, 2000);
    
                  
    
    </script>"; 

  }



}



//Student Employment Data

if(isset($_POST['student_employment_data'])){

  $company = $_POST['company'];
  $position = $_POST['position'];
  $dept = $_POST['dept'];
  $town = $_POST['town'];
  $company_address = $_POST['company_address'];
  $country = $_POST['country'];
  $id = $_GET['student_reg'];
  $col_id = $_POST['id'];
 // $address = $_POST['address'];

  $student_employment_info = $getFromCourse->update('user', $col_id, array('company_name'=>$company, 'position'=>$position, 'dept'=>$dept, 'town'=>$town, 'company_address'=>$company_address, 'country'=>$country));
  
    if($student_employment_info){ 

      echo "<script type='text/javascript'>
        $(function() {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
          toastr.success(' Student Employment Info has Been Saved.')
         
           /* Toast.fire({
              type: 'success',
              title: ' Price Info Saved .'
            })*/
         
        });
       setInterval(() => {
          window.open('admin/student_reg/".$col_id."','_self');
        }, 2000);
      
      </script>";
     
      }else{
        echo "<script type='text/javascript'>
        $(function() {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
          toastr.error('  Failed to Save Employment Info.')
        
        
        
        });
        setInterval(() => {
          window.open('admin/student_reg/".$col_id."','_self');
        }, 2000);
      
                    
      
      </script>"; 

    }


}





/*
    * Admin Course Creation Model
*/


// Modal Post
if(isset($_POST['new_course_section'])){
    $title = $_POST['title'];
    $link = $_POST['link'];
    $duration = $_POST['duration'];
    $type = $_POST['type'];
    //$course_id = $_POST['course_id'];

    $section = $getFromCourse->create('course_content', array('course_id'=>$id,'title'=>$title,'link'=>$link,'duration'=>$duration,'type'=>$type));
  
    if($section){ 

      echo "<script type='text/javascript'>
        $(function() {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
          toastr.success(' Section Created Successfully.')
         
           /* Toast.fire({
              type: 'success',
              title: ' Price Info Saved .'
            })*/
         
        });
       setInterval(() => {
          window.open('admin/new_course/".$id."','_self');
        }, 2000);
      
      </script>";
     
      }else{
        echo "<script type='text/javascript'>
        $(function() {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
          toastr.error('  Failed to Create New Section.')
        
        
        
        });
        setInterval(() => {
          window.open('admin/new_course/".$id."','_self');
        }, 2000);
      
      
                    
      
      </script>"; 

    }
}



/// Publish Course publish_course
if(isset($_POST['publish_course'])){
  
  $course_id = $_POST['course_id'];
  $status = $_POST['status'];

if($status == 'publish'){
  $section = $getFromCourse->update('courses', $course_id, array('publish'=>'1'));

  if($section){ 

    echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
      //  toastr.success(' Section Deleted Successfully.')
       
         Toast.fire({
            type: 'success',
            title: ' The Course has been Published! .'
          })
       
      });
     setInterval(() => {
        window.open('admin/new_course/".$course_id."','_self');
      }, 2000);
    
    </script>";
   
    }else{
      echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.error('  Failed to Publish this Course Try again!!.')
      
      
      
      });
      setInterval(() => {
        window.open('admin/new_course/".$course_id."','_self');
      }, 2000);
    
                  
    
    </script>"; 

  }

}elseif($status == 'unpublish'){
  $section = $getFromCourse->update('courses', $course_id, array('publish'=>'0'));

  if($section){ 

    echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
      //  toastr.success(' Section Deleted Successfully.')
       
         Toast.fire({
            type: 'success',
            title: ' The Course has been Unpublished! .'
          })
       
      });
     setInterval(() => {
        window.open('admin/new_course/".$course_id."','_self');
      }, 2000);
    
    </script>";
   
    }else{
      echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.error('  Failed to Unpublish this Course Try again!!.')
      
      
      
      });
      setInterval(() => {
        window.open('admin/new_course/".$course_id."','_self');
      }, 2000);
    
                  
    
    </script>"; 

  }
}
  
}

// Delete Course Content 
if(isset($_POST['delete_course_content'])){
    $video_link = $_POST['link'];
    $section_id = $_POST['section_id'];


    $section = $getFromCourse->update('course_content', $section_id, array('deleted'=>'1'));
  
    if($section){ 

      echo "<script type='text/javascript'>
        $(function() {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
          toastr.success(' Section Deleted Successfully.')
         
           /* Toast.fire({
              type: 'success',
              title: ' Price Info Saved .'
            })*/
         
        });
       setInterval(() => {
          window.open('admin/new_course/".$section_id."','_self');
        }, 2000);
      
      </script>";
     
      }else{
        echo "<script type='text/javascript'>
        $(function() {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
          toastr.error('  Failed to delete Section.')
        
        
        
        });
        setInterval(() => {
          window.open('admin/new_course/".$section_id."','_self');
        }, 2000);
      
                    
      
      </script>"; 

    }
}









// Audio Post
if(isset($_POST['section_audio'])){
    $audio_link = $_POST['link'];
    $section_id = $_POST['section_id'];


    $section = $getFromCourse->update('course_content',  $section_id, array('audio_link'=>$audio_link));
  
    if($section){ 

      echo "<script type='text/javascript'>
        $(function() {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
          toastr.success(' Section Audio Added.')
         
           /* Toast.fire({
              type: 'success',
              title: ' Price Info Saved .'
            })*/
         
        });
       setInterval(() => {
          window.open('admin/new_course/".$id."','_self');
        }, 2000);
      
      </script>";
     
      }else{
        echo "<script type='text/javascript'>
        $(function() {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
          toastr.error('  Failed to Add Section Audio.')
        
        
        
        });
        setInterval(() => {
          window.open('admin/new_course/".$id."','_self');
        }, 2000);
      
                    
      
      </script>"; 

    }
}





// Course Info Post
    if(isset($_POST['price_info'])){
        $price = $_POST['price'];
        $disc_price = $_POST['discount'];
        $id = $_POST['id'];      
    $create_course = $getFromCourse->update('courses', $id, array('price'=>$price, 'disc_price'=>$disc_price));
  
    if($create_course){ 

      echo "<script type='text/javascript'>
        $(function() {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
          toastr.success(' Price Info Saved.')
         
           /* Toast.fire({
              type: 'success',
              title: ' Price Info Saved .'
            })*/
         
        });
        setInterval(() => {
          window.open('admin/new_course/".$id."','_self');
        }, 2000);
      
      </script>";
     
      }else{
        echo "<script type='text/javascript'>
        $(function() {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
          toastr.error('  Failed to Save Price Info.')
        
        
        
        });
        setInterval(() => {
          window.open('admin/new_course/".$id."','_self');
        }, 2000);
      
                    
      
      </script>"; 

    }


    }



    // Course Creating/ Updating Post
    if(isset($_POST['details'])){


        $abrev = $_POST['course_abrev'];
        $name = $_POST['course_name'];
        $desc = $_POST['course_disc'];
        $short = $_POST['short_disc'];
        $category = $_POST['course_cat'];
        $level = $_POST['course_level'];
        $det = $_POST['det'];
      //  $files = $_FILES['upload'];

      if($det == 'save'){
        $create_course = $getFromCourse->create('courses',  array('course_abrev'=>$abrev, 'course_name'=>$name, 'cat_id'=>$category, 'level'=>$level, 'long_desc'=>$desc, 'descs'=>$short));

        if($create_course){ 

       
          echo "<script type='text/javascript'>
          $(function() {
            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
            });
         toastr.success('Course Details Saved.')
           
             /* Toast.fire({
                type: 'success',
                title: ' Course Details Saved .'
              })*/
           
          });
          setInterval(() => {
            window.open('admin/new_course/".$create_course."','_self');
          }, 2000);
        
        </script>";
       
        }else{
          echo "<script type='text/javascript'>
          $(function() {
            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
            });
            toastr.error('  Failed to Save Course Details.')
          
          
          
          });
        
                      
        
        </script>"; 

    
            }
        

      }else{
        $ids = $_POST['ids'];
        $create_course = $getFromCourse->update('courses',  $ids, array('course_abrev'=>$abrev, 'course_name'=>$name, 'cat_id'=>$category, 'level'=>$level, 'long_desc'=>$desc, 'descs'=>$short));

        if($create_course){ 

       
          echo "<script type='text/javascript'>
          $(function() {
            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
            });
         toastr.success('Course Details Saved.')
           
             /* Toast.fire({
                type: 'success',
                title: ' Course Details Updated .'
              })*/
           
          });
          setInterval(() => {
            window.open('admin/new_course/".$ids."','_self');
          }, 2000);
        
        </script>";
       
        }else{
          echo "<script type='text/javascript'>
          $(function() {
            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
            });
            toastr.error('  Failed to Update Course Details.')
          
          
          
          });
          setInterval(() => {
            window.open('admin/new_course/".$ids."','_self');
          }, 2000);
        
                      
        
        </script>"; 

    
            }
        

      }
       
       


    }

    // Update Course Image

    if(isset($_POST['update_course_image'])){
      $id = $_POST['id'];
      if(isset($_FILES['img_preview']) && ($_FILES['avatar']) ){
        if(!empty($_FILES['img_preview']['name'][0])){
                $fileRoot = $getFromCourse->uploadImage($_FILES['img_preview']);
                $fileRoots = $getFromCourse->uploadImage($_FILES['avatar']);
              $up_img =  $getFromCourse->update('courses', $id, array('img_preview' => $fileRoot, 'avatar' => $fileRoots));
                if(!empty($up_img)){
                  
      echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
     toastr.success('Image Saved.')
       
         /* Toast.fire({
            type: 'success',
            title: ' Course Details Saved .'
          })*/
       
      });
      setInterval(() => {
        window.open('admin/new_course/".$id."','_self');
      }, 2000);
    
    </script>";
   
    }else{
      echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.error('  Failed to Save Image.')
      
      
      
      });
    
      setInterval(() => {
        window.open('admin/new_course/".$id."','_self');
      }, 2000);         
    
    </script>"; 

  }
}

                }
 
    }



    
/*
    * Admin Student Registration Model
*/


//Student Profile  Data Update

if(isset($_POST['edit_student_profile'])){

  $title = $_POST['title'];
  $surname = $_POST['surname'];
   $email = $_POST['email'];
  $firstname = $_POST['firstname'];
  $middlename = $_POST['middlename'];  
  $opass = $_POST['opass'];
  $npass = MD5($_POST['npass']); 
  $id = $_POST['id'];
  $subscribe = $_POST['subscribe'];
  $bio = $_POST['bio'];
  $country = $_POST['country']; 
  $profileimage = $_POST['profileimage'];
  $address = $_POST['address'];
  $instagram = $_POST['instagram'];
  $twitter = $_POST['twitter'];
  $facebook = $_POST['facebook'];
  $tel = $_POST['tel'];
  $freelance = $_POST['freelance'];



  $student_bio = $getFromCourse->update('user', $id, array('surname'=>$surname,'title'=>$title,'firstname'=>$firstname,'middle_name'=>$middlename,'password'=>$npass,'newsletter'=>$subscribe,'email'=>$email,'tel'=>$tel,'nationality'=>$country,'address'=>$address, 'bio'=>$bio,'profileimage'=>$profileimage, 'twitter'=>$twitter,'instagram'=>$instagram, 'facebook'=>$facebook,'freelance'=>$freelance));
  

  
    if($student_bio){ 

      echo "<script type='text/javascript'>
        $(function() {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
          toastr.success(' Student Bio Data Saved.')
         
           /* Toast.fire({
              type: 'success',
              title: ' Price Info Saved .'
            })*/
         
        });
       setInterval(() => {
          window.open('student/edit-account/','_self');
        }, 1000);
      
      </script>";
     
      }else{
        echo "<script type='text/javascript'>
        $(function() {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
          toastr.error('  Failed to Create Student Data.')
        
        
        
        });
      
                    
      
      </script>"; 

    }



}

?>