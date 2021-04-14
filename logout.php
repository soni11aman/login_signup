<?php 
    session_start();
    $_SESSION['email']="";
    $_SESSION['nam']="";
    $_SESSION['logout']="1";
    header("Location: index.php");
?>