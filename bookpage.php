<?php
    include('php/includes/session_top.php');

    if(!isset($_SESSION['customer_logged_in']) || $_SESSION['customer_logged_in'] !== true && !isset($_SESSION["customer_logged_in_id"])) {
        header("Location: http://127.0.0.1:8020/login.php");
    }
/***************************************
* Authors: Ibraheem, Tim, Mathew, Colin
* Date: February 15, 2019
****************************************/ 
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Book Package | Travel  Experts Agency</title>

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

            <div class="jumbotron jumbotron-fluid jumbotron-register">
                <div class="container">
                    <h1 class="display-4 register-greetings h1-responsive">Book Now</h1>
                    <hr class="my-4" style="color:white;">
                    <p class="lead register-heading">Start your amazing experience now..</p>
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

                        <?php

                        ?>
                            <form method='POST' name="registerForm" action="#">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="PackageName"> <strong>Package Name</strong> </label>
                                        <!-- Change to select field -->
                                        <input type="text" class="form-control focus validate" name="PackageName" id="PackageName" maxlength=20 placeholder="Package Name">
                                        <!-- <div class="focus-feedback">
                                            Enter maximum of 20 characters!
                                        </div>
                                        <div class="validation">
                                            FIrst Name required
                                        </div> -->
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tripDate"> <strong>Date</strong> </label>
                                        <input type="text" class="form-control focus validate" name="tripDate" id="tripDate" maxlength=20 placeholder="Trip Date">
                                        <!-- <div class="focus-feedback">
                                            Enter maximum of 20 characters!
                                        </div>
                                        <div class="validation">
                                            Last Name required
                                        </div> -->
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="customerId"> <strong>Customer</strong> </label>
                                        <input type="text" class="form-control focus validate" id="customerId" placeholder="Customer ID" name="customerId">
                                        <!-- <div class="focus-feedback">
                                            Enter a valid username!
                                        </div>
                                        <div class="validation">
                                            Username required
                                        </div> -->
                                    </div>    
                                    <div class="form-group col-md-4">
                                        <label for="pckgPrice"> <strong>Price</strong> </label>
                                        <input type="email" class="form-control focus validate" id="pckgPrice" placeholder="Price" name="pckgPrice">
                                        <!-- <div class="focus-feedback">
                                            Enter a valid email with @ and .com!
                                        </div>
                                        <div class="validation">
                                            Email required
                                        </div> -->
                                    </div>
                                </div>
                                <div class="form-row">
                                
                                </div>
                                                                    
                                <div class="form-row">
                                
                                </div>

                                <!-- type="submit" -->
                                <button type="submit" class="btn btn-sm btn-outline-success" id="submitBtn" name="bookBtn">Book</button>
                                <!-- <button type="button" class="btn btn-sm btn-outline-info" id="resetBtn" name="resBtn">Reset</button> -->
                        </form>
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