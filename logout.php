<?php 
    session_start();

    unset($_SESSION['logged_in']);
    header("Location: http://localhost/assignment/index.php");
?>