<?php
    //include('includes/header.inc.php');

    include_once('../../config/init.php');
   

    if(isset( $_GET['id'])){
        $type =  $_GET['type'];
        $id =  $_GET['id'];
    
    
        if($type  == 'aies'){
            $doc = $getFromCourse->get_single('aies_letter',$id);
            $file = $doc->letter;
  
       
        }elseif($type  == 'cert'){
            $doc = $getFromCourse->get_single('student_cert',$id);
            $file = $doc->document;
  
       
    
        }elseif($type  == 'pros'){
            $doc = $getFromCourse->get_single('prospectus',$id);
            $file = $doc->doc;
           // var_dump($doc);
  
       
    
        }
    }
      //  var_dump($doc);

    ?>
<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
</head>

<body>

    <?php 


    
    // Store the file name into variable
    $filepath = "../".$file;
    // Header content type
  // header("Content-type: application/pdf");
    // Send the file to the browser.
  // readfile($filepath);


     #setting headers
     header('Content-Description: File Transfer');
     header('Cache-Control: public');
     header('Content-Type:  application/pdf');
     header("Content-Transfer-Encoding: binary");
     header('Content-Disposition: attachment; filename='. basename($filepath));
     header('Content-Length: '.filesize($filepath));
     ob_clean(); #THIS!
     flush();
     readfile($filepath);



?>



</body>


</html>
