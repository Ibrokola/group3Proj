<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Contact | Travel Experts Agency</title>

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

            <div class="jumbotron jumbotron-fluid jumbotron-contact">
                <div class="container">
                    <h1 class="display-4 contact-greetings h1-responsive">Contact Us</h1>
                    <hr class="my-4">
                    <div class="comp-contacts">
                        <ul>
                            <li class="comp-contact-item"><strong>Email</strong>: info@travelexperts.ca</li>
                            <li class="comp-contact-item"><strong>Address</strong>: 164 7ST SE, Calgary, T2G 1S7</li>
                            <li class="comp-contact-item"><strong>Phone</strong>: +1 403 616 8080</li>
                        </ul>
                    </div>
                </div>
            </div>

        </header>

        <main>

            <div class="container">

                <div class="contact-main">

                    <div class="agent-box">

                        <h2 class="agent-contacts">Our Agents</h2>

                        <p class="description">You can also have a chat with any of our agents to tailor your travel experience.</p>

                        <div class="row">
                            <div class="col-sm-4 agent">
                                <div class="card">
                                    <img src="img/agent1.jpeg" class="card-img-top" alt="babs">
                                    <div class="card-body">
                                        <h4 class="card-title h4-responsive"><strong>Babs Kola</strong></h4>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><strong>Email</strong>: babs@travelexperts.ca</li>
                                        <li class="list-group-item"><strong>Address</strong>: <br> 164 7ST SE, <br> Calgary, <br> T2G 1S7</li>
                                        <li class="list-group-item"><strong>Phone</strong>: +1 403 616 8234</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-4 agent">
                                <div class="card">
                                    <img src="img/agent2.jpeg" class="card-img-top" alt="tobi">
                                    <div class="card-body">
                                        <h4 class="card-title h4-responsive"><strong>Tobi Adegun</strong></h4>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><strong>Email</strong>: tobi@travelexperts.ca</li>
                                        <li class="list-group-item"><strong>Address</strong>: <br> 164 7ST SE, <br> Calgary, <br> T2G 1S7</li>
                                        <li class="list-group-item"><strong>Phone</strong>: +1 403 616 8739</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-4 agent">
                                <div class="card">
                                    <img src="img/agent3.jpeg" class="card-img-top" alt="jide">
                                    <div class="card-body">
                                        <h4 class="card-title h4-responsive"><strong>Jide Cole</strong></h4>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><strong>Email</strong>: jide@travelexperts.ca</li>
                                        <li class="list-group-item"><strong>Address</strong>: <br> 164 7ST SE, <br> Calgary, <br> T2G 1S7</li>
                                        <li class="list-group-item"><strong>Phone</strong>: +1 403 616 9090</li>
                                    </ul>
                                </div>
                            </div>
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