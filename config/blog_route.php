
<?php

    
        // Blog Portal Routes   


        if(isset($_GET['home']))

        {
            include('../blog/home.php');
        }


    
         elseif(isset($_GET['post']))
         {

             include('../blog/single.php');
         } 

         elseif(isset($_GET['cat_post']))
         {

             include('../blog/cat_post.php');
         } 

 
         else
         {
            include('../blog/home.php');
        } 

?>