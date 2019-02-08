<?php
    include_once("php/includes/session_top.php");

    // include_once("page6.php");

    // include_once("page4.php");

    // GetCustomers(); // getting an array of customer objects...
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customers | Travel Experts</title>

    <link href="https://fonts.googleapis.com/css?family=Marck+Script|Aclonica|Berkshire+Swash|Metrophobic" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/10up-sanitize.css/8.0.0/sanitize.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- Begin Header -->
<header class="container-header">

    <!-- Begin Bootstrap Nav -->
        <?php
            include('php/includes/nav.php');
        ?>
    <!-- End Bootstrap Nav -->

</div>

<div class="jumbotron jumbotron-fluid jumbotron-php">
<div class="container">
    <h1 class="display-4 register-greetings h1-responsive">Customers</h1>
    <hr class="my-4">
    <p class="lead register-heading">Customers list</p>
</div>
</div>

</header>
<!-- End Header -->
<br>

<!-- Begin Main -->
<main>
<div class="container">

<div class="register-main">

    <div class="register-box">
        <div class="table-responsive-sm container" id="php-table-container">
            <table class='table table-hover'>
                <?php 
                    // foreach($customers as $cust) {
                    //     print("<tr>");
                        
                    //     print("<td>" . $cust->id . "</td>");
                    //     print("<td>" . $cust . "</td>");
                    //     print("<td>" . $cust->address . "</td>");
                    //     print("<td>" . $cust->city . "</td>");
                    //     print("<td>" . $cust->prov . "</td>");
                    //     print("<td>" . $cust->postal . "</td>");
                    //     print("<td>" . $cust->country . "</td>");
                    //     print("<td>" . $cust->homePhone . "</td>");
                    //     print("<td>" . $cust->busPhone . "</td>");
                    //     print("<td>" . $cust->email . "</td>");
                    //     print("<td>" . $cust->agentId . "</td>");

                    //     print("</tr>");
                    // }
                ?>
            </table>
        </div>
    </div>
</div>
</div>
</main>
<!-- End Main -->

<!-- Begin Footer -->
    <?php
        include('php/includes/footer.php');
    ?>
<!-- End Footer -->

<!-- Begin JavaScript -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<!-- <script src="js/main-register.js"></script> -->
<script src="js/main.js"></script>
<!-- End JavaScript -->
    
</body>
</html>