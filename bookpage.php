<?php
    include('php/includes/session_top.php');

    if(!isset($_SESSION['customer_logged_in']) || $_SESSION['customer_logged_in'] !== true && !isset($_SESSION["customer_logged_in_id"])) {
        header("Location: http://127.0.0.1:8020/login.php");
    }

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

        <title>Book Package | Travel  Experts Agency</title>

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

                    <!-- <div class='row'>
                    <div class='col-md-8 offset-md-2'> -->

                        <?php
                            
                            // $packageId;
                            if (isset($_POST['bookNow'])) {
                                $packageId = $_POST['bookNow'];
                                $_SESSION['packageId'] = $packageId;
                            }

                            $book_data;

                            if (isset($_POST["bookBtn"])) {

                                if (!empty($_POST)) {

                                    foreach ($_POST as $key => $value){
                                        $book_data[$key] = $value;

                                    }
                                }

                                $any_err = "";

                                if(empty(trim($_POST['BookingDate']))) {
                                    $any_err .= "Date required";
                                    
                                    print('<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        Date required
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>');
                                }

                                if(empty(trim($_POST['TravelerCount']))) {
                                    $any_err .= "Number of people travelling required";

                                    print('<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            Number of people travelling required
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>');
                                }

                                if(empty(trim($_POST['TripTypeId']))) {
                                    $any_err .= "Trip type required";

                                    print('<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        Trip type required
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>');
                                }

                            }

                            include("php/includes/functions.php");

                            if(isset($any_err)) {
                                
                                if($any_err == '') {
                                    
                                    $result_book = bookPackage($book_data);

                                    // echo $result_book;

                                    if($result_book) {
                                        print('
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                Package booked successfully!
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>');
                                    } else {
                                        print('
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                OOps!, something went wrong. Please try again.
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>');
                                    }
                                }
                            }
                            if (!isset($_POST["bookBtn"])) {
                                $selected_pck = getPackage($_SESSION['packageId']);

                                $new_base = round($selected_pck["PkgBasePrice"], 2);
                                $new_com = round($selected_pck["PkgAgencyCommission"], 2);

                                $total = $new_base + $new_com;

                                    print(
                                        '
                                        <div class="row">
                                            <div class="col-md-6">');
                                                print('<div class="card">');
                                                    print('<ul class="list-group list-group-flush">');
                                                        print('<li class="list-group-item"><strong>Package</strong>: ' . $selected_pck["PkgName"] . '</li>');
                                                        print('<li class="list-group-item"><strong>Description</strong>: ' . $selected_pck["PkgDesc"] . '</li>');
                                                        print('<li class="list-group-item"><strong>Base Price (CAD) </strong>: ' . $selected_pck["PkgBasePrice"] . '</li>');
                                                        print('<li class="list-group-item"><strong>Commission (CAD) </strong>: ' . $selected_pck["PkgAgencyCommission"] . '</li>');
                                                        print('<li class="list-group-item"><strong>Total (CAD) </strong>: ' . $total . '</li>');
                                                    print('</ul>');
                                                print('</div>');
                                    print('</div>
                                        </div>
                                        ');
                            }

                            echo '<br>';
                            echo '<br>';
                            echo '<br>';
                        ?>

                            <form method='POST' name="bookForm" action="#">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="BookingDate"> <strong>Date</strong> </label>
                                        <input type="date" class="form-control focus validate" name="BookingDate" id="BookingDate">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="tripDate"> <strong>Number of Travellers</strong> </label>
                                        <input type="number" class="form-control focus validate" name="TravelerCount" id="TravelerCount">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <!-- <div class="form-group col-md-4"> -->
                                        <!-- <label for="customerId"> <strong>Customer</strong> </label> -->
                                        <input type="hidden" class="form-control focus validate" id="customerId" name="CustomerId" value='<?php echo $_SESSION["customer_logged_in_id"]; ?>'>
                                        <input type="hidden" class="form-control focus validate" id="PackageId" name="PackageId" value='<?php echo $_SESSION['packageId']; ?>'>
                                    <!-- </div> -->

                                    <div class="form-group col-md-6">
                                        <label for="tripAgency"> <strong>Tripe Type</strong> </label>
                                    
                                        <select class="form-control" name="TripTypeId" id="tripAgency">
                                            <option>--------</option> 
                                            <option value="B">(B)-Business</option>
                                            <option value="G">(G)-Group</option>
                                            <option value="G">(L)-Leisure</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                
                                </div>
                                                                    
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <!-- type="submit" -->
                                        <button type="submit" class="btn btn-block btn-outline-success" id="submitBtn" name="bookBtn">Book</button>
                                        <!-- <button type="button" class="btn btn-sm btn-outline-info" id="resetBtn" name="resBtn">Reset</button> -->
                                    </div>
                                </div>
                        </form>
                    </div>
                    <!-- </div>
                    </div> -->
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