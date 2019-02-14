<?php
    include('php/includes/session_top.php');
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Travel Experts Agency</title>

        <link href="https://fonts.googleapis.com/css?family=Marck+Script|Aclonica|Berkshire+Swash|Metrophobic" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/10up-sanitize.css/8.0.0/sanitize.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.css">
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
         
        <!-- Begin Header -->
        <header class="container-header">

            <!-- <div class="container"> -->
            <!-- Begin Bootstrap Nav -->
            <?php
                include('php/includes/nav.php');
            ?>
            <!-- End Bootstrap Nav -->

            <!-- </div> -->
            <!-- Start Landing Carousel -->
            <!-- Annoying carousel, no time to fix -->
            <!-- <div class="landing-carousel">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="img/travel1.jpeg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="img/travel2.jpeg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="img/travel3.jpeg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div> -->
            <!-- End Landing Carousel -->

            <!-- Start landing Jumbotron -->
            <div class="jumbotron jumbotron-fluid jumbotron-landing wow zoomIn" data-wow-delay="100ms">
                <div class="container">
                    <?php include('php/includes/time.php'); ?>
                    <h1 class="display-4 index-greeting wow fadeInDown" data-wow-delay="450ms">Ready to see world?</h1>
                    <p class="lead wow bounceInUp" data-wow-delay="500ms">Let's do it together...</p>
                </div>
            </div>

            <!-- End landing Jumbotron -->

            <!-- Start Landing Greetings -->

            <h1 class="landing-greetings h1-responsive"> Welcome to travel experts</h1>

            <p class='lead text-center'>The world is at your finger tips... Explore!!</p>

            <!-- End Landing Greetings -->

            <br>
            
        </header>
        <!-- End Header -->

        <!-- Begin Main -->
        <main>
            <div class="container">
                <div class="main">

                <h4 class="packages-display h3-responsive"> Your packages</h4>

                <!-- <hr> -->
                <br>
                    <div class="card-deck">
                        <div class="card package wow slideInLeft" data-wow-delay="500ms">
                            <img src="img/carib-new.jpeg" class="card-img-top" alt="caribbean">
                            <div class="card-body">
                                <h4 class="card-title h4-responsive"> <strong> Caribbean New Year</strong></h4>
                                <p class="card-text">Cruise the caribbean and celebrate the New Year.</p>
                            </div>
                            <blockquote class="blockquote mb-0 card-body">
                                <footer class="">
                                   <p class='lead'> CAD$ 5200 </p>
                                </footer>
                            </blockquote>
                        </div>
                        <div class="card package wow slideInUp" data-wow-delay="0.1s">
                            <img src="img/Polyn.jpeg" class="card-img-top" alt="polynesian">
                            <div class="card-body">
                                <h4 class="card-title h4-responsive"> <strong> Polynesian Paradise</strong></h4>
                                <p class="card-text">8 Days All Inclusive Hawaiian Vacation.</p>
                            </div>
                            <blockquote class="blockquote mb-0 card-body">
                                <footer class="">
                                   <p class='lead'> CAD$ 3310 </p>
                                </footer>
                            </blockquote>
                        </div>
                        <div class="card package wow slideInRight" data-wow-delay="0.2s">
                            <img src="img/Asian.jpeg" class="card-img-top" alt="asian">
                            <div class="card-body">
                                <h4 class="card-title h4-responsive"> <strong>Asian Expedition </strong></h4>
                                <p class="card-text">Airfaire, Hotel and Eco Tour.</p>
                            </div>

                            <blockquote class="blockquote mb-0 card-body">
                                <footer class="">
                                   <p class='lead'> CAD$ 3100 </p>
                                </footer>
                            </blockquote>
                        </div>
                    </div>
                        <br>
                        <a href="packages.php"><button class='btn btn-outline-primary btn-block float-center more'>More</button></a>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js"></script>
        <script src="js/main.js"></script>

        <script>
            new WOW().init();
        </script>
        <!-- End JavaScript -->

    </body>

</html>