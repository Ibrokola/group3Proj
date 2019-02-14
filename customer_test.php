<?php
/*****************************************************************************
* 
* Author: Tim Leslie
* Date: February 6, 2019.
* Course: CPRG 210 Web Application Development
* Assignment: PHP Final Assignment
* Purpose: This is a test customer page.
*
******************************************************************************/
include_once('php/head.php');
include('php/functions_final.php');
include('php/variables.php');
?>
    <body>       
        <header class="page-header">
            <h1 class="txt-center">Travel Experts Customer Page</h1>
        </header>
<?php
    include('php/menu_hz.php');
?>

<?php
    if (isset($_POST['Buy'])) {
        if (!empty($_POST)) {
            print("<p>" . $_POST['Buy'] . "</p>");
        }
    }
?>
</body>





