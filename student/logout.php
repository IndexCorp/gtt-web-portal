<?php

session_start();

session_destroy();

//header("Location : login");
echo "<script>window.open('".BASE_URL."/auth','_self')</script>";

?>