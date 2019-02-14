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

        <title>Packages | Travel Experts Agency</title>

        <link href="https://fonts.googleapis.com/css?family=Marck+Script|Aclonica|Berkshire+Swash|Metrophobic" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/10up-sanitize.css/8.0.0/sanitize.css">
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <header class="container-header">

                <!-- Begin Bootstrap Nav -->
                    <?php
                        include('php/includes/nav.php');
                    ?>
                <!-- End Bootstrap Nav -->

            <div class="jumbotron jumbotron-fluid jumbotron-packages">
                <div class="container">
                    <h1 class="display-4 contact-greetings h1-responsive">Packages</h1>
                    <hr class="my-4">
                    
                </div>
            </div>

        </header>

        <main>

            <div class="container-fluid">

                <div class="contact-main">

                    <div class="agent-box">

                        <h2 class="agent-contacts">Your Packages</h2>

                        <p class="description lead fw-100">Created just for you. Browse through and book today.</p>

                        <br>

                        <div class="card-deck">
                            <div class="card package">
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
                            <div class="card package">
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
                            <div class="card package">
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
                            <div class="card package">
                                <img src="img/European.jpeg" class="card-img-top" alt="asian">
                                <div class="card-body">
                                    <h4 class="card-title h4-responsive"> <strong>European Vacation</strong></h4>
                                    <p class="card-text">Euro Tour with Rail Pass and Travel Insurance</p>
                                </div>

                                <blockquote class="blockquote mb-0 card-body">
                                    <footer class="">
                                    <p class='lead'> CAD$ 3280 </p>
                                    </footer>
                                </blockquote>
                            </div>
                        </div>
                        
                        <br>
                        <br>
                        <!-- <hr> -->

                        <h3 class="agent-contacts">Book Now</h3>
                    
                        <div class="table-responsive-lg">
                            <table class='table table-hover'>
                                <?php 
                                include('php/includes/functions.php');

                                $packages = getPackages();

                                print("<tr> <th>#</th> <th>Packages</th> <th>Start Date</th> <th>End Date</th> 
                                <th>Descritption</th> <th>Base Price (CAD) </th> <th>Agency Commission (CAD)</th> <th>Total (CAD)</th> <th> Book Now</th> </tr>");
                                    foreach($packages as $pack) {

                                        $start_date = $pack->getPkgStartDate();
                                        $end_date = $pack->getPkgEndDate();

                                        $new_start = new DateTime($start_date);
                                        $new_end = new DateTime($end_date);

                                        $format_start = $new_start->format('Y-m-d');
                                        $format_end = $new_end->format('Y-m-d');

                                        $new_base = round($pack->getPkgBasePrice(), 2);
                                        $new_com = round($pack->getPkgAgencyCommission(), 2);

                                        // $total = $pack->getPkgBasePrice() + $pack->getPkgAgencyCommission();
                                        $total = $new_base + $new_com;

                                        print("<tr>");

                                        print("<td>" . $pack->getPackageId() . "</td>");
                                        print("<td>" . $pack->getPackageName() . "</td>");
                                        print("<td>" . $format_start . "</td>");
                                        print("<td>" . $format_end . "</td>");
                                        print("<td>" . $pack->getPkgDesc() . "</td>");
                                        print("<td>" . $new_base . "</td>");
                                        print("<td>" . $new_com . "</td>");
                                        print("<td>" . $total . "</td>");
                                        print("<td> <a href='bookpage.php'> <button class='btn btn-outline-success btn-sm'>Book now</button> </a></td>");

                                        print("</tr>");
                                    }
                                    print('<br>');

                                    print('<br>');
                                    print('<br>');
                                    print('<br>');

                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php
            include('php/includes/footer.php');
        ?>

        <!-- Begin JavaScript -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <script src="js/main.js"></script>
        <!-- End JavaScript -->
    </body>

</html>