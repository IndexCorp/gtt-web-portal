<?php

session_start();

session_destroy();
session_unset();
//header("Location : login");
echo "<script>window.open('auth','_self')</script>";

?>