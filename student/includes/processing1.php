
<?php




if(isset($_POST['rating'])){
     
     
    $rating = $_POST['rating'];
    $id = $_POST['std_id'];
    $comment = $_POST['comment'];
   
  

        $outpu = array(
            
            'success'	=>	true,    
           
            'result' => $id,
           
           
        );
    

    echo json_encode($outpu);

  


}



if(isset($_POST['yellowo'])){
     
     
    $id = $_POST['yellowo'];
   
  

        $outpu = array(
            'success'	=>	true,    
           
            'result' => $id,
           
           
        );
    

    echo json_encode($outpu);

  


}




?>