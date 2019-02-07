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
                // $fh = fopen("test.txt", "w");
                // fwrite($fh, "This is a random text\n");
                // fwrite($fh, 'This is another random string on a new line');
                // fclose($fh);
                // print("Finished writing.<br>");

                // $dirh = opendir("/Users/ibraheemkolawole/Dropbox/SAIT/WebDev/assignments/Assignment-Ibraheem");
                // while (false != ($output = readdir($dirh))) {
                //     print("$output <br>");
                // }
                // closedir($dirh);

                // $array = file('test.txt');
                // print_r($array);

                // $password = "password";
                // $userpassword = "password";

                // $hash_db = password_hash($password, PASSWORD_DEFAULT);
                
                // print($hash_db);

                // print("<br>");
                
                // $hash_user = password_hash($userpassword, PASSWORD_DEFAULT);

                // print($hash_user);

                // print("<br>");

                // if (password_verify($userpassword, $hash_db)){
                //     print("You are logged in!");
                // } else {
                //     print("You shall not pass!");
                // }

                // setcookie("start_time", time(), time()+60*60*5);

                // $_COOKIE['name'] = time();

                // print($_COOKIE['name']);

                // if(isset($_POST['submit'])) {
                //     print("File name: " . $_FILES['upload']['name'] ."<br>");
                //     print("File tmp_name: " . $_FILES['upload']['tmp_name'] ."<br>");
                //     print("File size: " . $_FILES['upload']['size'] ."<br>");
                //     print("File type: " . $_FILES['upload']['type'] ."<br>");
                //     print("File erro: " . $_FILES['upload']['error'] ."<br>");
                //     // print("File name: " . $_FILES["upload"]["name"] ."<br>");

                //     if(move_uploaded_file($_FILES["upload"]["tmp_name"], '/Users/ibraheemkolawole/Dropbox/SAIT/WebDev/assignments/Assignment-Ibraheem/upload_file.txt')){
                //         print("file uploaded");
                //     } else {
                //         print("file upload had a problem");
                //     }
                // }

                // OOP //
            //     class Person {
            //         // public static $type = "human";
            //         public $height;
            //         private $weight;
            //         private $firstName;
            //         public $lastName;
                    
            //         public function setFirstName ($arg) {
            //             $this -> firstName = $arg;
            //         }

            //         public function getFirstName() {
            //             return $this -> firstName;
            //         }
            //     }

            // $babs = new Person();
            // $babs -> setFirstName('Babs');
            // $babs -> lastName = "Kola";
            // $firstBabs = $babs -> getFirstName();

            // echo "<br>";
            // // echo Person::type;

            // echo $babs -> lastName . " ";
            // //  echo $babs -> firstName;
            // echo $firstBabs;
            // echo "<br>";

            class Person {
                public $id;
                public $firstName;
                public $lastName;
                public $busPhone;
                public $email;


                public function __contruct($id, $fname, $lname, $phone, $email){
                    $this->id = $id;
                    $this->firstName = $fname;
                    $this->lastName = $lname;
                    $this->busPhone = $phone;
                    $this->email = $email;
                }

                public function __toString() {
                    return $this->firstName . " " . $this->lastName;
                }
            }
            
            class Customer extends Person {
                public $address;
                public $city;
                public $province;
                public $postal;
                public $country;
                public $homePhone;
                public $agentId;

                public function __contruct($id, $fname, $lname, $phone, $email, $add, $city, $prov, $post, $country, $hphone, $agtId) {
                    
                    parent::__contruct($id, $fname, $lname, $bphone, $email);

                    $this->address = $add;
                    $this->city = $city;
                    $this->province = $prov;
                    $this->postal = $post;
                    $this->country = $country;
                    $this->$homePhone = $hphone;
                    $this->agentId = $agtId;

                }

            }
            
            ?>
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