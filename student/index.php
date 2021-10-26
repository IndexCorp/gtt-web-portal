<?php

session_start();

include_once('../config/configuration.php');
  
  include_once('../config/init.php');

    if(!isset($_SESSION['login_id'])){

      //echo "<script>window.open('../auth','_self')</script>";
      echo '<script>window.location.replace("'.BASE_URL.'auth/")</script>';
    
    
   }  else{

    $std_id = @$_SESSION['login_id'];
      $fname = @$_SESSION['fname'];
      $email = @$_SESSION['email'];
      $sname = @$_SESSION['sname'];
      
      include('includes/header.php');
      
      include('../config/student_route.php');
  
      include('includes/sidebar.php');


      include('includes/footer.php');
      


      


    
    
include('includes/processing.php');
  
     


      include('includes/modal.php');
      include('includes/ajaxfile.php');     
      include('../config/model.php');

    
      



   }
?>