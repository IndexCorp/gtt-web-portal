<?php
    //session_start();

    global $pdo;
  
   include('database/dbcon.php');
   include('mail/class.smtp.php');
   include('mail/class.phpmailer.php');
   include('autoload.php');
  
   
   
   date_default_timezone_set('Africa/Lagos');
  
   $getFromPayment = new Paymentgateway();
   $getFromGeneric  = new Generic($pdo);
   $getFromBlog  = new Blog($pdo);
   $getFromProduct  = new Product($pdo);
   $getFromCourse = new Course($pdo);
    $getFromAdmin = new Admin($pdo);
    $getFromStudent = new Student($pdo);
    $getFromMain = new Main($pdo);   
    $getFromExam = new Exam($pdo);

    // define("BASE_URL", "http://192.168.43.241/gtt/");
    
    
   
?>