<?php
    //include('includes/header.inc.php');

    include_once('../config/init.php');
   
    $doc = $getFromCourse->get_single('prospectus', 1);
            $file = $doc->doc;
         //   echo '<script>alert('.$file.')</script>';
  
      //  var_dump($doc);

    ?>
<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Prospectus</title>
</head>

<body>

    <?php 


    
    // Store the file name into variable
    $filepath = "../admin/".$file;
    // Header content type
   header("Content-type: application/pdf");
    // Send the file to the browser.
   readfile($filepath);



?>



</body>


</html>