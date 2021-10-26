
<?php

    
      // Student  Portal Routes   
     // session_start();

      

       if(isset($_GET['dashboard'])){
         include('../student/dashboard.php');
         }
        
       
         elseif(isset($_GET['lessons'])){
             include('../student/student-lessons.php');
         }

         elseif(isset($_GET['assignment'])){
            include('../student/assignment.php');
        } 
         elseif(isset($_GET['submit_ass'])){
            include('../student/submit_ass.php');
        }
         elseif(isset($_GET['learning'])){
            include('../student/learning.php');
        }
         elseif(isset($_GET['quiz_prep'])){
             include('../student/quiz_prep.php');
         } 
         elseif(isset($_GET['quiz_menu'])){
             include('../student/quiz_menu.php');
         } 
         elseif(isset($_GET['student-home'])){
             include('../student/student.php');
         } 
         elseif(isset($_GET['billing'])){
             include('../student/student-billing.php');
         }
         elseif(isset($_GET['subscribe'])){
             include('../student/student-course-purchase.php');
         } 
         elseif(isset($_GET['start_course'])){
             include('../student/start-course.php');
         } 
         elseif(isset($_GET['student_courses'])){
             include('../student/student-courses.php');
         } 
         elseif(isset($_GET['my_courses'])){
             include('../student/my-courses.php');
         }
         
         elseif(isset($_GET['search_course'])){
             include('../student/search_course.php');
         }   
          elseif(isset($_GET['search_by_cat'])){
             include('../student/search_by_cat.php');
         }


         elseif(isset($_GET['search_courses-stu'])){
             include('../student/search_courses-stu.php');
         }   
          elseif(isset($_GET['search_by_cat-stu'])){
             include('../student/search_by_cat-stu.php');
         }


         elseif(isset($_GET['reg-course'])){
             include('../student/reg-course.php');
         } 
         elseif(isset($_GET['edit-account'])){
             include('../student/edit_account.php');
         } 
         elseif(isset($_GET['logout'])){
             include('../student/logout.php');
         } 

         elseif(isset($_GET['ajax'])){
            include('../student/includes/processing.php');
        } 
        elseif(isset($_GET['schedule_exam'])){
            include('../student/schedule_exam.php');
        } 


        elseif(isset($_GET['reschedule_exam'])){
            include('../student/reschedule_exam.php');
        } 


        elseif(isset($_GET['result'])){
            include('../student/result.php');
        }


        elseif(isset($_GET['quiz_result'])){
            include('../student/quiz_result.php');
        }


        elseif(isset($_GET['chat'])){
            include('../student/chat.php');
        }


        elseif(isset($_GET['message'])){
            include('../student/messages.php');
        }
        elseif(isset($_GET['student-dashboard'])){
            include('../student/dashboard.php');
    }


/*
        else {
                include('../student/dashboard.php');
        }
*/
?>