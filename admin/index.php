<?php  

session_start();
if(!isset($_SESSION['admin_id'])){

      echo "<script>window.open('../auth','_self')</script>";
     // header('Location : http://localhost/gtt/auth/');
    
      
    }else{

   
  
      include_once('../config/configuration.php');
      include_once('../config/init.php');

      $admin_id = $_SESSION['admin_id'];
      $admin_det = $getFromAdmin->get_single('user', $admin_id);
      $fname = $admin_det->firstname;
      $sname = $admin_det->surname;
     // $sessionId = session_id();

     

      include('includes/header_new.php');
    



      include('../config/admin_route.php');




      include('includes/sidebar.inc.php');    
     // include('includes/footer.inc.php');
     include('includes/footer_new.php');
    
      include('includes/modal.php');
      include('includes/ajaxfiles.php');
      include('../config/model.php');

    }
?>








