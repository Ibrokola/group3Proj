<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="index.php"><img src="img/logo3.png" alt="logo" width="50" height="50"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end wow bounceInRight" id="navbarNav">
            <ul class="navbar-nav" id="navbar-cont">

               <?php 
               
                // if (isset($_SESSION["customer_logged_in"]) && isset($_SESSION['customer_first_name'])){

                //     $cust_name = $_SESSION['customer_first_name'];

                //     print(
                //         '<li class="nav-item">
                //            <span style="margin-top:100px;"> Welcome ' . $cust_name . ' </span>
                //         </li>');
                // }

               ?>

                <li class="nav-item">
                    <a class="nav-link" href="index.php" data-toggle="tooltip" data-placement="bottom" title="home"><i class="fas fa-home fa-2x" alt="home"></i> <span class="sr-only">(current)</span><span class="d-md-none nav-hidden">Home</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gallery.php"><span class="d-md-block"><i class="far fa-images fa-2x" title="Gallery"></i></span><span class="d-md-none nav-hidden">Gallery</span></a>
                </li>

                <?php
                    if(isset($_SESSION['agent_logged_in'])){ 
                        print('<li class="nav-item">
                            <a class="nav-link" href="customers.php"><span class="d-md-block"><i class="fas fa-users fa-2x" title="Customers"></i></span><span class="d-md-none nav-hidden">Customers</span></a>
                        </li>');
                    }
                ?>

                <li class="nav-item">
                    <a class="nav-link" href="contact.php"><span class="d-md-block"><i class="fas fa-mail-bulk fa-2x" title="Contact"></i></span><span class="d-md-none nav-hidden">Contact</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="packages.php"><span class="d-md-block"><i class="fas fa-gift fa-2x" title="Packages"></i></span><span class="d-md-none nav-hidden">Register</span></a>
                </li>

                <?php
                    if(isset($_SESSION['agent_logged_in'])){ 
                        print('<li class="nav-item">
                            <a class="nav-link" href="newAgent.php"><span class="d-md-block"><i class="fas fa-plus fa-2x" title="New Agent"></i></span><span class="d-md-none nav-hidden">New Agent</span></a>
                        </li>');
                    }
                ?>

                <?php
                    // if(isset($_SESSION['customer_logged_in'])){ 
                    //     print('<li class="nav-item">
                    //         <a class="nav-link" href="bookpage.php"><span class="d-md-block"><i class="fas fa-calendar-check fa-2x" title="New Booking"></i></span><span class="d-md-none nav-hidden">New Booking</span></a>
                    //     </li>');
                    // }
                ?>

                <?php
                    // Refactor this later....
                    if(!isset($_SESSION['agent_logged_in']) && !isset($_SESSION['customer_logged_in'])){
                        print(
                        '<li class="nav-item">
                            <a class="nav-link" href="register.php"><span class="d-md-block"><i class="fas fa-user-plus fa-2x" title="Register"></i></span><span class="d-md-none nav-hidden">Register</span></a>
                        </li>');
                    }

                    // if(!isset($_SESSION['customer_logged_in'])){
                    //     print(
                    //         '<li class="nav-item">
                    //             <a class="nav-link" href="register.php">
                    //                 <span class="d-md-block"><i class="fas fa-user-plus fa-2x" title="Register"></i></span>
                    //                 <span class="d-md-none nav-hidden">Register</span>
                    //             </a>
                    //         </li>');
                    // }
                ?>

                <?php 
                    if ((isset($_SESSION["agent_logged_in"]) && $_SESSION["agent_logged_in"] === true) || (isset($_SESSION["customer_logged_in"]) && $_SESSION["customer_logged_in"] === true)) {
                        print('<li class="nav-item">
                            <a class="nav-link" href="logout.php"><span class="d-md-block"><i class="fas fa-sign-out-alt fa-2x" title="Logout"></i></span><span class="d-md-none nav-hidden">Logout</span></a>
                        </li>');
                    } else {
                        print('<li class="nav-item">
                            <a class="nav-link" href="login.php"><span class="d-md-block"><i class="fas fa-sign-in-alt fa-2x" title="Login"></i></span><span class="d-md-none nav-hidden">Login</span></a>
                        </li>');
                    }
                ?>

                <!-- <li class="nav-item">
                    <a class="nav-link" href="links.php"><i class="fas fa-link fa-2x" title="links"></i></a>
                </li> -->
                <!-- <li class="nav-item">
                    <a class="nav-link" href="testCreateAgents.php"><i class="fas fa-link fa-2x" title="links"></i></a>
                </li> -->
            </ul>
        </div>
    </div>
</nav>