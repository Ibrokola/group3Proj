<?php
/*****************************************************************************
* 
* Author: Tim Leslie
* Date: February 6, 2019.
* Course: CPRG 210 Web Application Development
* Assignment: PHP Final Assignment
* Purpose: This is the test Vacation Packages page with form method = 'post'
* functionality to send the purchased vacation package id to the Bookings page.
* website pages. Also, local time will be simulated to test the package 
* highlighting logic for vacation packages which have start dates earlier than
* the current date.
*
******************************************************************************/

    session_start();
    include('php/head.php');
?>
<?php
    include('php/variables.php');
    include('php/functions_final.php');
?>
    <body>       
        <header class="page-header">
            <h1 class="txt-center">Travel Experts Vacation Packages</h1>
        </header>
<?php
    include('php/menu_hz.php');
?>
<?php
    $dbh = ConnectDB();

    $resTable = readTableObj($dbh, 'packages');

    include('php/banner.php');
    print("<form method = 'post' action = 'customer_test.php'; style = 'width:100%;'>");
    print("<div style='text-align:center;'>");
    print("<table style='width: 80%; font-size: 18px;'>");


    $simTime = strtotime('01/01/2018'); // Set simulated time to Jan 01 2014
//    $simTime = strtotime('12/16/2016'); // Set simulated time to Jan 01 2014
    $simTimeString = date('Y-m-d', $simTime); // Simulated time back to string.

//  Object derived table.
    foreach($resTable as $object) {
        $tempArr = $object->buildArray(); // Returns associative array from object.
        $packageStart = strtotime($tempArr['PkgStartDate']);
        $packageEnd   = strtotime($tempArr['PkgEndDate']);
//        $packageStartString = date('Y-m-d', $packageStart);
//        $packageEndString   = date('Y-m-d', $packageEnd);

        if ($packageEnd >= $simTime) {
            if ($packageStart < $simTime) {
                printf("<td>%s</td><td style = 'color: red;'>%s", $tempArr['PkgDesc'], substr($tempArr['PkgStartDate'], 0, 10));
            }
            else {
                printf("<td>%s</td><td>%s", $tempArr['PkgDesc'], substr($tempArr['PkgStartDate'], 0, 10));
            }
            printf("</td><td>%s</td><td>$%7.2f</td>", substr($tempArr['PkgEndDate'], 0, 10), $tempArr['PkgBasePrice']);
            print("<td><input style='width: 100%' type = 'submit' value = 'Buy".$tempArr['PackageId']."'" . "name='Buy'></td>"); 
        print("</tr>");
        }
    }
    print("</table>");
    print("</div>");
    print("</form>");

    CloseDB($dbh);
?>
<?php
    include('php/footer.php');
?>