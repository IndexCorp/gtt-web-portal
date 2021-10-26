<?php
include_once('../config/init.php');
   

    if(isset( $_GET['id'])){
        $type =  $_GET['type'];
        $id =  $_GET['id'];
    
    
        if($type  == 'aies'){
            $doc = $getFromCourse->get_single('aies_letter',$id);
            $file = $doc->letter;
         //   echo '<script>alert('.$file.')</script>';
  
       
          
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
    $filepath = "../admin/".$file;
    // Header content type
   header("Content-type: application/pdf");
    // Send the file to the browser.
   readfile($filepath);
?>



</body>


</html>