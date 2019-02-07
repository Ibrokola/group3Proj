<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Day 2 Class</title>

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
    <p class="lead register-heading">2nd Class PHP</p>
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
                $float = 5.43265244999;
                $pos = 5;
                $neg = -5;

                print("This is round(): ".round($float, 7). "<br>");
                print("This is ceil(): ".ceil($float). "<br>");
                print("This is floor(): ".floor($float). "<br>");
                print("This is abs() pos: ".abs($pos). "<br>");
                print("This is abs() neg: ".abs($neg). "<br>");

                print('<br><br>');

                srand((double)microtime() * 1000000);
                $random = rand(33, 42);
                print("This is random: ".$random. "<br>");
                
                $jul_1 = date('l', mktime(0, 0, 0, 7, 1, 2000));
                $jul_2 = date('l', mktime(0, 0, 0, 7, 1, 2018));
                $jan_29 = date('l', mktime(0, 0, 0, 1, 29, 2019));
                print('<br><br>');
                print('<h3>Time</h3>');
                // print("Make time here, mktime: ".mktime()."<br>");
                // print("Formatted date".date("l", mktime(0, 0, 0, 7, 1, 2000));
                print ("July 1, 2000 is on a $jul_1 <br>");
                print ("July 1, 2018 is on a $jul_2 <br>");
                print ("Jan 29, 2019 is on a $jan_29 <br>");
                // print('Local time: '.localtime());

                print('<br><br>');
                $dateFormat = 'l jS\of F Y h:i:s A';
                $now = time() - 15000000;
                print("What does time look like? ". $now/60 ."<br/>");
                print("Time that I can understand: " .date($dateFormat));
                print("<br>");
                $chosen = mktime(18, 0, 0, 10, 31, 2012);
                print("This is the time I have chosen: ". date($dateFormat, $chosen));
                print("<br>");

                // $local_time = localtime(time());
                // print("Local time variable: ". $local_time );

                print("<br><h3>String token</h3>");
                $string = "my name is ibro";
                $tok = strtok($string, "\n");

                while ($tok !== false) {
                    print("$tok <br>");
                    $tok = strtok("\n");
                } 
                
                print("<br>");

                print('<h3>String index</h3>');
                print("Sub: ". substr($string, 8, 6). "<br>");

                print("<h3>Functions</h3> <br>");
                
                // $myGlobalVar = 5;

                // function myFunction($myVar) {
                //     $myVar++;
                //     return $myVar;
                // }
                // print(myFunction($myGlobalVar));

                function exFunc($firstNum, $secNum) {
                    $result = $firstNum + $secNum;
                    return $result;
                }
                print(exFunc(19, 8));

                print('<h3>Array</h3>');

                $arr = array(1, 2, 3, 4, 5);
                $arr[6] = 8;
                print(implode(', ',$arr));

                print('<h3>Associative Array</h3>');
            ?>
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
<!-- <script src="js/main-gallery.js"></script> -->
<script src="js/main.js"></script>
<!-- End JavaScript -->
    
</body>
</html>