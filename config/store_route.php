
<?php

    
        // store Portal Routes   


        if(isset($_GET['home']))

        {
            include('../store/home.php');
        }


    
         elseif(isset($_GET['product']))
         {

             include('../store/single.php');
         } 

         elseif(isset($_GET['cat_product']))
         {

             include('../store/cat_product.php');
         } 

 
         else
         {
            include('../store/home.php');
        } 

?>