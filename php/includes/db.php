<?php
/***************************************
* Author: Ibraheem Kolawole
* Date: February 11, 2019
* Purpose: mysql database connection object
* Requires: mysqli_connect() and mysqli_close()
****************************************/
    function connectDB() {
        // Procedural connection
        // $dbh = mysqli_connect("127.0.0.1:3306", "admin", "P@ssw0rd", "travelexperts");
        
        // OOP connection
        $dbh = new mysqli("127.0.0.1:3306", "admin", "P@ssw0rd", "travelexperts");

        if ($dbh->connect_errno) {
            print("Error number: " . $dbh->connect_error.PHP_EOL);
            exit();
        }

        return $dbh;
           
    }

    function closeDB($dbh) {
        // Procedural connection closing
        // mysqli_close($dbh);

        // OOP connection closing
        $dbh->close();
    }
?>
