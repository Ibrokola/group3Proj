<?php 
    session_start();

    unset($_SESSION['logged_in']);
    header("Location: http://127.0.0.1:8020/index.php");
?>