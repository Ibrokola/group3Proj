<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="index.php"><img src="img/logo3.png" alt="logo" width="50" height="50"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav" id="navbar-cont">
                <li class="nav-item">
                    <a class="nav-link" href="index.php" data-toggle="tooltip" data-placement="bottom" title="home"><i class="fas fa-home fa-2x" alt="home"></i> <span class="sr-only">(current)</span><span class="d-md-none nav-hidden">Home</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gallery.php"><span class="d-md-block"><i class="far fa-images fa-2x" title="Gallery"></i></span><span class="d-md-none nav-hidden">Gallery</span></a>
                </li>
                <?php
                    if(isset($_SESSION['logged_in'])){ 
                        print('<li class="nav-item">
                            <a class="nav-link" href="customers.php"><span class="d-md-block"><i class="fas fa-users fa-2x" title="Customers"></i></span><span class="d-md-none nav-hidden">Customers</span></a>
                        </li>');
                    }
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php"><span class="d-md-block"><i class="fas fa-mail-bulk fa-2x" title="Contact"></i></span><span class="d-md-none nav-hidden">Contact</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php"><span class="d-md-block"><i class="fas fa-plus-square fa-2x" title="Register"></i></span><span class="d-md-none nav-hidden">Register</span></a>
                </li>

                <?php
                    if(isset($_SESSION['logged_in'])){ 
                        print('<li class="nav-item">
                            <a class="nav-link" href="newAgent.php"><span class="d-md-block"><i class="fas fa-user-plus fa-2x" title="New Agent"></i></span><span class="d-md-none nav-hidden">New Agent</span></a>
                        </li>');
                    }
                ?>

                <?php 
                    if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true) {
                        print('<li class="nav-item">
                            <a class="nav-link" href="logout.php"><span class="d-md-block"><i class="fas fa-sign-out-alt fa-2x" title="Logout"></i></span><span class="d-md-none nav-hidden">Logout</span></a>
                        </li>');
                    } else {
                        print('<li class="nav-item">
                            <a class="nav-link" href="login.php"><span class="d-md-block"><i class="fas fa-sign-in-alt fa-2x" title="Login"></i></span><span class="d-md-none nav-hidden">Login</span></a>
                        </li>');
                    }
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="links.php"><i class="fas fa-link fa-2x" title="links"></i></a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="testCreateAgents.php"><i class="fas fa-link fa-2x" title="links"></i></a>
                </li> -->
            </ul>
        </div>
    </div>
</nav>