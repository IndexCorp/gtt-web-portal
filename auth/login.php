<?php 
session_start();
session_regenerate_id(true);
include_once('../config/configuration.php');
 
?>




<?php

if(isset($_POST['login'])){


include_once('../config/init.php');

$email =$_POST['email'];
$password =$_POST['password'];

if(!empty($email) or !empty($password)){
  $email	=   $getFromGeneric->checkInput($email);
  $password	= $getFromGeneric->checkInput($password);

  if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
          echo "<script type='text/javascript'>
          $(function() {
            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
            });
        
              Toast.fire({
                type: 'error',
                title: '    Invalid Email format.'
              })
           
          });
        
        </script>";
     

  }else{
    session_unset();
    //session_destroy();
          $user = $getFromGeneric->login($email, MD5($password));
       
$sessionId = session_id();

    if($user){
              $getFromGeneric->update('user', $user->id, array('last_login'=> date('Y/m/d h:i:s', time())));
            $get_role = $getFromGeneric->get_single_g('admin_role', 'admin_id', $user->id);
            if(!empty($get_role)){
                $role_id = $get_role->role_id;
                if($role_id == 1){
                    $_SESSION['super_admin'] = role_id;

                }elseif( $role_id == 2){
                    $_SESSION['view'] = role_id;

                }

            }
              if($user->type == 'teacher'){
                  $_SESSION['admin_id'] = $user->id;

              
                 echo "<script>window.location.replace('https://globaltradetutor.com/admin/', '_self')</script>";
               
              }else{
                  $_SESSION['login_id'] = $user->id;
              
                  
                   echo "<script>window..location.replace('https://globaltradetutor.com/student/student-dashboard/', '_self')</script>";
                
                  
              }

        
              /*echo "<script type='text/javascript'>
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
  
        Toast.fire({
          type: 'success',
          title: ' Welcome ".$user->firstname.".'
        })
     
    });
    setInterval(() => {
      window.open('".BASE_URL.$link."','_self');
    }, 2000);
  
  </script>";*/
            
      //echo "<script>$('#error').click()</script>";
        
    
    }else{
              echo "<script type='text/javascript'>
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
  
        Toast.fire({
          type: 'error',
          title: 'Invalid Email or Password.'
        })
     
    });
  
  </script>";
          }

  }



}else{
      echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
    
          Toast.fire({
            type: 'error',
            title: '   Please Enter Email and Password.'
          })
       
      });
    
    </script>";

}
}



?>




<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
<base href="<?=BASE_URL?>">
  <meta charset="ANSI">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>

 <meta name="robots" content="noindex">

  <!-- Perfect Scrollbar -->
  <link type="text/css" href="assets/vendor/perfect-scrollbar.css" rel="stylesheet">



  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">


  <!-- App CSS -->
  <link type="text/css" href="assets/css/app.css" rel="stylesheet">
  <link type="text/css" href="assets/css/app.rtl.css" rel="stylesheet">

  <!-- Material Design Icons -->
  <link type="text/css" href="assets/css/vendor-material-icons.css" rel="stylesheet">
  <link type="text/css" href="assets/css/vendor-material-icons.rtl.css" rel="stylesheet">

  <!-- Font Awesome FREE Icons -->
  <link type="text/css" href="assets/css/vendor-fontawesome-free.css" rel="stylesheet">
  <link type="text/css" href="assets/css/vendor-fontawesome-free.rtl.css" rel="stylesheet">

  <!-- ion Range Slider -->
  <link type="text/css" href="assets/css/vendor-ion-rangeslider.css" rel="stylesheet">
  <link type="text/css" href="assets/css/vendor-ion-rangeslider.rtl.css" rel="stylesheet">




</head>

<body class="layout-login-centered-boxed">





  <div class="layout-login-centered-boxed__form">
      <div class="d-flex flex-column justify-content-center align-items-center mt-2 mb-2 navbar-light">
          <a href="<?=BASE_URL?>" class="navbar-brand text-center mb-2 mr-0" style="min-width: 0">
              <!-- LOGO -->
              <span class="mr-1">
                  <!-- LOGO -->
                  <img src="assets/images/logos/icon_logoo.png" alt="">
              </span>

              <span class="ml-1">Global Trade Tutors </span>
<?php 


?>
           
          </a>
      </div>

      <div class="card card-body">
     


          <form action="auth/login" method="POST">
              <div class="form-group">
                  <label class="text-label" for="email_2">Email Address:</label>
                  <div class="input-group input-group-merge">
                      <input id="email_2" name="email" type="email" required="" class="form-control form-control-prepended" placeholder="Enter your Email Address">
                      <div class="input-group-prepend">
                          <div class="input-group-text">
                              <span class="far fa-envelope"></span>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="form-group">
                  <label class="text-label" for="password_2">Password:</label>
                  <div class="input-group input-group-merge">
                      <input id="password_2" name="password" type="password" required="" class="form-control form-control-prepended" placeholder="Enter your password">
                      <div class="input-group-prepend">
                          <div class="input-group-text">
                              <span class="fa fa-key"></span>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="form-group">
                  <input type="submit" class="btn btn-block btn-primary" value="Login" name="login">
              </div>
        
              <div class="form-group text-center">
                  <a href="#">Forgot password?</a> <br>
                  Don't have an account? <a class="text-body text-underline" href="<?=BASE_URL?>register/">Sign up!</a>
              </div>
          </form>
      </div>
  </div>


  <!-- jQuery -->
  <script src="assets/vendor/jquery.min.js"></script>

  <!-- Bootstrap -->
  <script src="assets/vendor/popper.min.js"></script>
  <script src="assets/vendor/bootstrap.min.js"></script>




  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      
  <!-- SweetAlert2 -->
  <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Toastr -->
  <script src="plugins/toastr/toastr.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>



  <!-- Perfect Scrollbar -->
  <script src="assets/vendor/perfect-scrollbar.min.js"></script>

  <!-- DOM Factory -->
  <script src="assets/vendor/dom-factory.js"></script>

  <!-- MDK -->
  <script src="assets/vendor/material-design-kit.js"></script>

  <!-- Range Slider -->
  <script src="assets/vendor/ion.rangeSlider.min.js"></script>
  <script src="assets/js/ion-rangeslider.js"></script>

  <!-- App -->
  <script src="assets/js/toggle-check-all.js"></script>
  <script src="assets/js/check-selected-row.js"></script>
  <script src="assets/js/dropdown.js"></script>
  <script src="assets/js/sidebar-mini.js"></script>
  <script src="assets/js/app.js"></script>

  <!-- App Settings (safe to remove) -->
  <script src="assets/js/app-settings.js"></script>




</body>
</html>

<?php

if(isset($_POST['login'])){


include_once('../config/init.php');

$email =$_POST['email'];
$password =$_POST['password'];

if(!empty($email) or !empty($password)){
  $email	=   $getFromGeneric->checkInput($email);
  $password	= $getFromGeneric->checkInput($password);

  if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
          echo "<script type='text/javascript'>
          $(function() {
            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
            });
        
              Toast.fire({
                type: 'error',
                title: '    Invalid Email format.'
              })
           
          });
        
        </script>";
     

  }else{
    session_unset();
    //session_destroy();
          $user = $getFromGeneric->login($email, MD5($password));
       
$sessionId = session_id();

    if($user){
              $getFromGeneric->update('user', $user->id, array('last_login'=> date('Y/m/d h:i:s', time())));
              if($user->type == 'teacher'){
                  $_SESSION['admin_id'] = $user->id;
                 $link = 'admin/dashboard';
              }else{
                  $_SESSION['login_id'] = $user->id;
                  echo 'Succcess';
                  header("Location : http://localhost/student/student-dashboard/");
                  exit();
              }

        
              /*echo "<script type='text/javascript'>
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
  
        Toast.fire({
          type: 'success',
          title: ' Welcome ".$user->firstname.".'
        })
     
    });
    setInterval(() => {
      window.open('".BASE_URL.$link."','_self');
    }, 2000);
  
  </script>";*/
            
      //echo "<script>$('#error').click()</script>";
        
    
    }else{
              echo "<script type='text/javascript'>
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
  
        Toast.fire({
          type: 'error',
          title: 'Invalid Email or Password.'
        })
     
    });
  
  </script>";
          }

  }



}else{
      echo "<script type='text/javascript'>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
    
          Toast.fire({
            type: 'error',
            title: '   Please Enter Email and Password.'
          })
       
      });
    
    </script>";

}
}



?>
