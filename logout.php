<?php 
    session_start();

    if($_SESSION['agent_logged_in']){

        unset($_SESSION['agent_logged_in']);

    } elseif($_SESSION['customer_logged_in']) {
        
        unset($_SESSION['customer_logged_in']);

        unset($_SESSION["customer_logged_in_id"]);
        
    }

    header("Location: http://127.0.0.1:8020/index.php");

?>