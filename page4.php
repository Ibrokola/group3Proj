<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Day 5 Class</title>

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
    <p class="lead register-heading">5th Class PHP</p>
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
                $host = "127.0.0.1:3306";
                $db = "travelexperts";
                $dsn= "mysql:host=$host;dbname=$db";
                $username = "admin";
                $password = "P@ssw0rd";

                try {
                    $pdo = new PDO($dsn, $username, $password);
                    if($pdo){
                        echo "Connected to the <strong>$db</strong> database successfully!";
                    }
                } catch (PDOException $e){
                    echo $e->getMessage();
                }
                print("<br>");
                print("<br>");

                // function classCreate() {

                // }

                function connectDB() {
                    $dbh = mysqli_connect("127.0.0.1:3306", "admin", "P@ssw0rd", "travelexperts");
                    return $dbh;
                }

                function closeDB($dbh) {
                    mysqli_close($dbh);
                }

                function agentCreate($agent_data) {
                    // $stmt = $db -> query("SELECT * FROM $agent_data");
                    // $row = $stmt -> fetch(PDO::FETCH_ASSOC);
                    // return $row;

                    $dbh = connectDB();

                    $sql = "INSERT INTO agents (
                        AgtFirstName,
                        AgtMiddleInitial,
                        AgtLastName,
                        AgtBusPhone,
                        AgtEmail,
                        AgtPosition,
                        AgencyId) VALUES (?,?,?,?,?,?,?)";
                
                    $stmt = mysqli_prepare($dbh, $sql);
                    mysqli_stmt_bind_param($stmt, 'ssssssi', 
                        $agent_data["AgtFirstName"],
                        $agent_data["AgtMiddleInitial"],
                        $agent_data["AgtLastName"],
                        $agent_data["AgtBusPhone"],
                        $agent_data["AgtEmail"],
                        $agent_data["AgtPosition"],
                        $agent_data["AgencyId"]);
                    $result = mysqli_stmt_execute($stmt);

                    $fh = fopen("agents.txt", "a");
                    
                    fwrite($fh, print_r($agent_data, true));
                    fclose($fh);

                    mysqli_stmt_close($stmt);

                    closeDB($dbh);
                    return $result;
                }
                // $created = agentCreate($pdo, 'agents');

                // print($created[AgtBusPhone]);

                $new_agent = array(
                    "AgtFirstName" => "Tobi",
                    "AgtMiddleInitial" => "B",
                    "AgtLastName" => "Kola",
                    "AgtBusPhone" => "(403) 616-8427",
                    "AgtEmail" => "tobskol@gmail.com",
                    "AgtPosition" => "Senior Agent",
                    "AgencyId" => 2);

                // agentCreate($new_agent);

                function myConnectDB($dbh) {
                    return $dbh;
                }

                function myCreateAgents($dbh, $agent_data) {
                    $dbh = myConnectDB($dbh);
                    $stmt = $dbh->prepare("INSERT INTO agents (
                        AgtFirstName,
                        AgtMiddleInitial,
                        AgtLastName,
                        AgtBusPhone,
                        AgtEmail,
                        AgtPosition,
                        AgencyId
                    ) VALUES (?,?,?,?,?,?,?)");

                    // $stmt -> bindParam(1, $AgtFirstName);
                    // $stmt -> bindParam(2, $AgtMiddleInitial);
                    // $stmt -> bindParam(3, $AgtLastName);
                    // $stmt -> bindParam(4, $AgtBusPhone);
                    // $stmt -> bindParam(5, $AgtEmail);
                    // $stmt -> bindParam(6, $AgtPosition);
                    // $stmt -> bindParam(7, $AgencyId);
                    $stmt->execute([$agent_data]);
                }

                $another_agent = array(
                    "AgtFirstName" => "Kabir",
                    "AgtMiddleInitial" => "K",
                    "AgtLastName" => "Kola",
                    "AgtBusPhone" => "(403) 616-8427",
                    "AgtEmail" => "kabskol@gmail.com",
                    "AgtPosition" => "Junior Agent",
                    "AgencyId" => 2);
                
                // myCreateAgents($pdo, $another_agent); // Finish Later

                // Start RegEx...
                $string = "abc my postal code is Q1Q 1F4 today, 
                T2J 2r5 W2W 2W2 is not";

                // if (preg_match("/abc/", $string)) {
                //     print("matched <br>");
                // } else {
                //     print("No match...<br>");
                // }

                // // Match to first
                // print("preg return value = ". preg_match("/[A-Za-z][0-9][A-Za-z] [0-9][A-Za-z][0-9]/", $string, $match) . "<br>");
                // print_r($match);
                // print("<br>");

                // // Match to all
                // print("preg return value = ". preg_match_all("/[A-Za-z][0-9][A-Za-z] [0-9][A-Za-z][0-9]/", $string, $match) . "<br>");
                // print_r($match);
                // print("<br>");

                // // Capitals only
                // print("preg return value = ". preg_match("/([A-Z][0-9][A-Z] [0-9][A-Z][0-9])/", $string, $match) . "<br>");
                // print_r($match); 
                // print("<br>");
                
                // // Match to all and ignore case
                // print("preg return value = ". preg_match_all("/[A-Z][0-9][A-Z] [0-9][A-Z][0-9]/i", $string, $match) . "<br>");
                // print_r($match);
                // print("<br>");
                
                // Email address regular expression.
                // (\.[a-z0-9])+
                $reg = "/^[_a-z0-9]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z0-9]+)*(\.[a-z]{2,3})$/i";

                // if (preg_match($reg, "ibro_babs@gmail.co.ca")) {
                //     print("Pattern Natched");
                // } else {
                //     print("Pattern didn't match");
                // }
                // $makeMatch = preg_match($reg, "ibro_babs@edu.sait.ab.ca");

                // if($makeMatch) {
                //     echo "Pattern Matched";
                // } else {
                //     echo "Pattern didn't match";
                // }
                // $new_string = preg_replace('/2W2/', '3W3', $string);

                // print("This is what I started with: <br> <h3>$string</h3>");
                // print("This is what I have now: <br> <h3>$new_string</h3>");

                // $phoneReg = "/\([0-9]{3}\) [0-9]{3}-[0-9]{4}/";
                // $phoneShort = "/\([\d]{3}\) [\d]{3}-[\d]{4}/";
                // $phoneEnf = "/\([4][0][3]\) [0-9]{3}-[0-9]{4}/";

                function GetUsers(){
                    $user_array = file("user.txt");
                }

                function GetCustomers() {
                    
                    include_once("page6.php");
                    
                    $dbh = connectDB();

                    $sql = "SELECT * FROM customers";

                    if(!$result = $dbh->query($sql)) {
                        echo "ERROR: the sql failed to execute. <br>";
                        echo "SQL: $sql <br>";
                        echo "Error #: ".  $dbh->errono . "<br>";
                        echo "Error msg: ". $db->error . " <br>";
                    }

                    if ($result === 0) {
                        echo "There were no results<br>";
                    }

                    $customers = array();
                    while ($cust = $result->fetch_assoc()) {
                        // Constructing customer attributes
                        $customer = new Customer(
                            $cust["CustomerId"],
                            $cust["CustFirstName"],
                            $cust["CustLastName"],
                            $cust["CustAddress"],
                            $cust["CustCity"],
                            $cust["CustProv"],
                            $cust["CustPostal"],
                            $cust["CustCountry"],
                            $cust["CustHomePhone"],
                            $cust["CustBusPhone"],
                            $cust["CustEmail"],
                            $cust["AgentId"]);
                        // adding the customer object to array of customers
                        $customer[] = $customer;
                    } // end of While loop...

                    closeDB($dbh);
                    return $customers;
                }
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