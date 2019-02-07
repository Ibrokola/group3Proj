<?php 
    include_once('top.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Day 6 Class</title>

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
    <p class="lead register-heading">6th Class PHP</p>
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



        <div class="" id="">
            <?php 

                include_once('page4.php');
                // 2nd to last assignment...

                if(isset($_POST['submit'])) {
                    $user_list = GetUsers();
                    $users = array();

                    foreach($user_array as $row) {
                        $item = explod(",", $row);
                        $users[trim($items[0])] = trim($items[1]);
                    }
                    return $users;
                }

                if (isset($_POST['submit'])) {
                    $user_list = GetUsers();
                    if (isset($user_list[$_POST["username"]])) {
                        if ($user_list[$_POST['username']] === $_POST["password"]){
                            print("You are logged in!");
                            $_SESSION["logged_in"] = true;
                            header("Location: http://localhost/assignment/newagent.php");
                        } else {
                            print("That was not a correct username or password, please try again.");
                        }
                    }
                } else {
                    print("That was not a correct username or password, please try again.");
                }
            ?>
            <section>
            <h2 class="text-center">Login  </h2>
            <br>
            <br>
            <form name="registerForm" method="post" action="#">
                <div class="form-row">
                    <div class="form-group col-md-6">

                        <label for="username"> <strong>Username</strong> </label>
                        <input type="text" class="form-control focus validate" name="username" 
                        id="username" maxlength=20 placeholder="First Name">
                        
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">

                        <label for="password"> <strong>Password</strong> </label>
                        <input type="password" class="form-control focus validate" name="password" 
                        id="password" maxlength=20 placeholder="Password">
                        
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">

                        <label for="address"> <strong>Address</strong> </label>
                        <input type="text" class="form-control focus validate" name="address" 
                        id="address" maxlength=20 placeholder="Address">
                        
                    </div>
                </div>
                <div class="form-row">
                    <!-- <div class="form-group col-md-6">
                        <label for="phpPhone"> <strong>Business Phone No.</strong> </label>
                        <input type="text" class="form-control focus validate" name="phone" 
                        id="phpPhone" maxlength=20 placeholder="Phone"> -->
                        
                    <!-- </div>
                    <div class="form-group col-md-6">
                        <label for="phpEmail"> <strong>Email</strong> </label>
                        <input type="email" class="form-control focus validate" name="email" id="phpEmail" maxlength=20 placeholder="Email">
                        
                    </div> -->
                </div>
            </form>
            </section>
        </div>
        
        <!-- <form action="#" method="post" enctype="multipart/form-data">
            <h3>Please be careful uploading a file</h3>
            <input type="file" name="upload">
            <input type="submit" class='btn btn-success' value='submit'>
        </form> -->
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
<!-- <script src="js/main-gallery.js"></script> -->
<script src="js/main.js"></script>
<!-- End JavaScript -->
    
</body>
</html>