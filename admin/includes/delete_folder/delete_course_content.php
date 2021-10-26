<?php 
 include_once('../../../config/init.php');
 include_once('../../../config/init.php');
$content_id = $_GET['id'];
$back = $_GET['back'];
    $content = $getFromGeneric->delete('course_content', array('id'=> $content_id));

        echo '<script>alert("Section Deleted Successfully")</script>';
      echo "<script>window.open('../../../admin/new_course/".$back."','_self');</script>";

?>