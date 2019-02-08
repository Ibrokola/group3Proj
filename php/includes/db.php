<?php
/***************************************
* Author: Ibraheem Kolawole
* Date: February 11, 2019
* Purpose: mysql database connection object
* Requires: mysqli_connect() and mysqli_close()
****************************************/
    function connectDB() {
        $dbh = mysqli_connect("127.0.0.1:3306", "admin", "P@ssw0rd", "travelexperts");
        return $dbh;
    }

    function closeDB($dbh) {
        mysqli_close($dbh);
    }
?>
