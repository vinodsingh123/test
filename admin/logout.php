<?php  
    session_start();
    session_destroy();

    //setcookie('uid', '', time() - 1); // empty value and old timestamp
    header('location:../login.php');
?>