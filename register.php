<?php
    include('php/includes/session_top.php');
/***************************************
* Authors: Ibraheem, Tim, Mathew, Collin
* Date: February 15, 2019
****************************************/
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Register | Travel  Experts Agency</title>

        <link href="https://fonts.googleapis.com/css?family=Marck+Script|Aclonica|Berkshire+Swash|Metrophobic" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/10up-sanitize.css/8.0.0/sanitize.css">
        <link rel="stylesheet" href="css/style.css">

        <link rel="icon" href="img/logo3.png">
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
                    <h1 class="display-4 register-greetings h1-responsive">Register Now</h1>
                    <hr class="my-4" style="color:white;">
                    <p class="lead register-heading">Start your amazing experience with us</p>
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
                            $cust_data;
                            if (isset($_POST["regBtn"])) {

                                if (!empty($_POST)) {
                                    
                                    // echo $_POST;

                                    foreach ($_POST as $key => $value){
                                        $cust_data[$key] = $value;
                                        
                                        // if ($cust_data[$key] == 'UserName') {
                                        //     print_r($cust_data[$key]);
                                        // }

                                    }
                                }

                                // echo implode(', ', $cust_data) . '<br>';

                                $username = "";
                                $any_err = "";

                                if(empty(trim($_POST['UserName']))) {
                                    $any_err .= "Username required";
                                }

                                if(empty(trim($_POST['password']))) {
                                    $any_err .= "password required";
                                }
                                // TODO: Add an else here to check customers.txt if username already exists

                                if(empty(trim($_POST['CustFirstName']))) {
                                    $any_err .= "First Name required";
                                }

                                if(empty(trim($_POST['CustLastName']))) {
                                    $any_err .= "Last Name required";
                                }

                                if(empty(trim($_POST['CustEmail']))) {
                                    $any_err .= "Email required";
                                }

                                if(empty(trim($_POST['CustAddress']))) {
                                    $any_err .= "Address required";
                                }

                                if(empty(trim($_POST['CustCountry']))) {
                                    $any_err .= "Country required";
                                }

                                if(empty(trim($_POST['CustCity']))) {
                                    $any_err .= "City required";
                                }

                                if(empty(trim($_POST['CustProv']))) {
                                    $any_err .= "Province required";
                                }

                                if(empty(trim($_POST['CustPostal']))) {
                                    $any_err .= "Postcode required";
                                }
                            }

                            include("php/includes/functions.php");

                            if(isset($any_err)) {
                                
                                if($any_err == '') {
                                    
                                    $result_cust = createCustomerWithPass($cust_data);

                                    // echo $result_cust;

                                    $fh = fopen("customers.txt", "a");

                                    $customer_credentials = $cust_data['UserName'] . ', ' . $cust_data['password'] . ', ' . $cust_data['CustFirstName'] . PHP_EOL ;

                                    fwrite($fh, $customer_credentials);

                                    fclose($fh);
                            
                                    if($result_cust) {
                                        print('
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                Your account has been created successful!
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>');
                                    } else {
                                        print('
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                OOps!, something went wrong. Please try again
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>');
                                    }
                                }
                            }

                        ?>
                            <form method='POST' name="registerForm" action="#">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="clientFirstName"> <strong>First Name</strong> </label>
                                        <input type="text" class="form-control focus validate" name="CustFirstName" id="clientFirstName" maxlength=20 placeholder="First Name">
                                        <div class="focus-feedback">
                                            Enter maximum of 20 characters!
                                        </div>
                                        <div class="validation">
                                            FIrst Name required
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="clientLastName"> <strong>Last Name</strong> </label>
                                        <input type="text" class="form-control focus validate" name="CustLastName" id="clientLastName" maxlength=20 placeholder="Last Name">
                                        <div class="focus-feedback">
                                            Enter maximum of 20 characters!
                                        </div>
                                        <div class="validation">
                                            Last Name required
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="clientUser"> <strong>Username</strong> </label>
                                        <input type="text" class="form-control focus validate" id="clientUser" placeholder="Username" name="UserName">
                                        <div class="focus-feedback">
                                            Enter a valid username!
                                        </div>
                                        <div class="validation">
                                            Username required
                                        </div>
                                    </div>    
                                    <div class="form-group col-md-4">
                                        <label for="clientEmail"> <strong>Email</strong> </label>
                                        <input type="email" class="form-control focus validate" id="clientEmail" placeholder="Email" name="CustEmail">
                                        <div class="focus-feedback">
                                            Enter a valid email with @ and .com!
                                        </div>
                                        <div class="validation">
                                            Email required
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="clientPassword"> <strong>Password</strong> </label>
                                        <input type="password" class="form-control focus validate" id="clientPassword" placeholder="Password" name="password">
                                        <div class="focus-feedback">
                                            Enter a valid password!
                                        </div>
                                        <div class="validation">
                                            Password required
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="address1"> <strong>Address</strong></label>
                                        <input type="text" class="form-control focus validate" id="address1" placeholder="1234 Main St" maxlength=50 name="CustAddress">
                                        <div class="focus-feedback">
                                            Enter maximum of 50 characters!
                                        </div>
                                        <div class="validation">
                                            Address required
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="address2"> <strong>Country</strong></label>
                                        <input type="text" class="form-control focus validate" id="address2" placeholder="Country" maxlength=50 name="CustCountry">
                                        <div class="focus-feedback">
                                            Enter maximum of 50 characters!
                                        </div>
                                        <div class="validation">
                                            Country required
                                        </div>
                                    </div>
                                </div>
                                                                    
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="city"> <strong>City</strong> </label>
                                        <input type="text" class="form-control focus validate" id="city" placeholder="Calgary" maxlength="10" name="CustCity">
                                        <div class="focus-feedback">
                                            Can't enter more than 10 characters!
                                        </div>
                                        <div class="validation">
                                            City required
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="province"> <strong>Province</strong> </label>
                                        <!-- <select id="province" class="form-control">
                                            <option selected>Choose...</option>
                                            <option>...</option>
                                        </select> -->
                                        <input type="text" class="form-control focus validate" id="province" placeholder="AB" maxlength="2" name="CustProv">
                                        <div class="focus-feedback">
                                            Can't enter more than 2 characters!
                                        </div>
                                        <div class="validation">
                                            Province required
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="postCode"> <strong>Post Code</strong> </label>
                                        <input type="text" class="form-control focus validate" id="postCode" placeholder="T3N 0M2" name="CustPostal">
                                        <div class="focus-feedback">
                                            Please enter post code in format T3N 0M2!
                                        </div>
                                        <div class="validation">
                                            Valid postal code required
                                        </div>
                                    </div>
                                </div>

                                <?php 
                                    print('Already have an account? Kindly <a href="login.php" style="color:green;">Login</a>');

                                    print('<br>');
                                    print('<br>');
                                ?>

                                <!-- type="submit" -->

                                <button type="submit" class="btn btn-sm btn-outline-success" id="submitBtn" name="regBtn">Register</button>
                                <button type="button" class="btn btn-sm btn-outline-info" id="resetBtn" name="resBtn">Reset</button>
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
        <script src="js/main-register.js"></script>
        <script src="js/main.js"></script>
        <!-- End JavaScript -->
    </body>

</html>