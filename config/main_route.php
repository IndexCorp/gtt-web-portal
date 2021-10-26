
<?php

    
// Main Website Redirection   
if(isset($_GET['contact'])){
     include('main/contact.php');
     }  
 
 
     elseif(isset($_GET['list'])){
         include('main/course_list.php');
     } 
     elseif(isset($_GET['course_cat'])){
         include('main/courses_by_cat.php');
     } 
     elseif(isset($_GET['reviews'])){
         include('main/reviews.php');
     }

    elseif(isset($_GET['course_details'])){
        include('main/course_detail.php');
    }
    elseif(isset($_GET['category'])){
        include('main/category_list.php');
    }

    elseif(isset($_GET['admin_quiz_menu'])){
        include('../admin/student/quiz-manager.php');
    } 
 
  /*  elseif(isset($_GET['register'])){
        include('auth/student_reg.php');
    }*/

    else{
        include('main/home.php');
    }

   
?>