<?php
/***************************************
* Author: Ibraheem Kolawole
* Date: February 11, 2019
* Purpose: Check time and give appropriate greetings
* Requires: php internal time() method, getdate() method.
****************************************/

    date_default_timezone_set('America/Edmonton');
    $currTime = getdate(time());
    
    // print($currTime); // explode it

    $currentDateTime = date("h:i:sa");

    if ($currTime['hours'] > 18) {
        $class = 'evening';
        $greeting = 'Good evening';
    } elseif ($currTime['hours'] > 12) {
        $class = 'afternoon';
        $greeting = 'Good afternoon';
    } else {
        $class = 'morning';
        $greeting = 'Good morning';
    }

    print("<div class='$class'> <h3> $greeting </h3></div>");

    print("<br>");
?>