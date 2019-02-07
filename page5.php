<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Day 4 Class</title>

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
    <h1 class="display-4 register-greetings h1-responsive">Php Class</h1>
    <hr class="my-4">
    <p class="lead register-heading">4th Class PHP</p>
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
            // session_start();
        ?>

        <div class="" id="">
            <?php 
                $host = "127.0.0.1:3306";
                $db = "travelexperts";
                $dsn= "mysql:host=$host;dbname=$db";
                $username = "admin";
                $password = "P@ssw0rd";

                try {
                    $pdo = new PDO($dsn, $username, $password);
                    if($pdo){
                        echo "Connected to the <strong>$db</strong> database successfully!";
                    }
                } catch (PDOException $e){
                    echo $e->getMessage();
                }
                print("<br>");
                print("<br>");

                // if (isset($_GET["submit"])) {
                //     // validate
                //     // if validation is good
                //     // move on to the new page

                //     if ($_GET["name"] == 'Derek') {

                //         print("Derek already exists");

                //     } else {

                //         print("<a href='sait.ca'>Move along...</a>");
                    
                //     }
                // }

                // if(!isset($_COOKIE['start_time'])) {
                //     setcookie("start_time", time(), time()+60*30);
                // }

                if(!isset($_SESSION['start_time'])) {
                    $_SESSION["start_time"] = time();
                }

                if(!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {

                    header("Location: http://localhost/assignment/login.php");

                }

                $agent_data;
                if (isset($_POST["submit"])){
                    // $agent_data = array();
                    if (!empty($_POST)) {
                        foreach ($_POST as $key => $value){
                            $agent_data[$key] = $value;
                        }
                    }
                    $error_msg = "";

                    if (!$_POST["firstName"]) {
                        $error_msg .= "This field is required.<br> ";
                    } 
                    // else {
                    //     $agent_data["AgtFirstName"] = $_POST["firstName"];
                    //     // $agent_data["AgtFirstName"] = "";
                    // }
                    
                    if (!$_POST["lastName"]) {
                        $error_msg .= "This field is required <br>";
                    } 
                    // else {
                    //     $agent_data["AgtLastName"] = $_POST["lastName"];
                    //     // $agent_data["AgtLastName"] = "";

                    // }

                    if (!$_POST["phone"]) {
                        $error_msg .= "This field is required";
                    } 
                    // else {
                    //     $agent_data["AgtBusPhone"] = $_POST["phone"];
                    //     $agent_data["AgtBusPhone"] = "";
                    // }
                    // $agent_data["AgtMiddleInitial"] = null;
                    // $agent_data["AgtEmail"] = null;
                    // $agent_data["AgencyId"] = 1;
                    // $agent_data["AgtPosition"] = null;
                }

                if (isset($error_msg)){
                    if($error_msg == "") {
                        // header("location: http://localhost/process-agent.php");
                        include_once("page4.php");

                            // if (isset($_COOKIE["start_time"])) {
                            //     $change = time() - $_COOKIE["start_time"];
                            //     print("<h3 style='color:green'> You have been on this page for $change seconds</h3>");
                            // }

                            print("You have been here for ". time() - $_SESSION['start_time'] . "<br>");

                            $result = agentCreate($agent_data);

                            if ($result) {
                                print("The Agent was added");
                            } else {
                                print("The Agent wasn't added");
                            }
                        }
                } elseif (!empty($error_msg) > 0){
                    print "<h4 style='color:red;'>$error_msg</h4>";
                }
            ?>

            <h2 class="text-center">Add Agent</h2>
            <br>
            <br>
            <form name="registerForm" method="post" action="#">
                <div class="form-row">
                    <div class="form-group col-md-5">

                        <label for="phpFirstName"> <strong>First Name</strong> </label>
                        <input type="text" class="form-control focus validate" name="firstName" 
                        id="phpFirstName" maxlength=20 placeholder="First Name" value="<?php if (isset($agent_data["AgtFirstName"])) 
                        {echo $agent_data["AgtFirstName"];} else { echo "";}?>">
                        
                    </div>
                    <div class="form-group col-md-2">

                        <label for="phpMiddleName"> <strong>Middle Initial</strong> </label>
                        <input type="text" class="form-control focus validate" name="middleInitial" 
                        id="phpMiddleName" maxlength=20 placeholder="Inital">
                        
                    </div>
                    <div class="form-group col-md-5">

                        <label for="phpLastName"> <strong>Last Name</strong> </label>
                        <input type="text" class="form-control focus validate" name="lastName" 
                        id="phpLastName" maxlength=20 placeholder="Last Name" 
                        value="<?php if (isset($agent_data["AgtLastName"])) 
                        {echo $agent_data["AgtLastName"];} else { echo "";}?>">
                        
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="phpPhone"> <strong>Business Phone No.</strong> </label>
                        <input type="text" class="form-control focus validate" name="phone" 
                        id="phpPhone" maxlength=20 placeholder="Phone" 
                        value="<?php if (isset($agent_data["AgtBusPhone"])) 
                        {echo $agent_data["AgtBusPhone"];} else { echo "";}?>">
                        
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phpEmail"> <strong>Email</strong> </label>
                        <input type="email" class="form-control focus validate" name="email" id="phpEmail" maxlength=20 placeholder="Email">
                        
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="phpPosition"> <strong>Position</strong> </label>
                        <input type="text" class="form-control focus validate" name="position" id="phpPosition" maxlength=20 placeholder="Position">
                        
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phpAgency"> <strong>Agency</strong> </label>
                    
                        <select class="form-control" name="agency" id="phpAgency">
                            <option value="1">First Agency</option>
                            <option value="2">Second Agency</option>
                        </select>
                    </div>
                </div>
                <input type="submit" class="btn btn-sm btn-outline-success" id="submitBtn" name="submit" value='submit'>
            </form>
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