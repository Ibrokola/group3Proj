<?php
/***************************************
* Authors: Ibraheem Kolawole, Tim, Mathew
* Date: February 11, 2019
* Purpose: Agent insert function using prepared statements, getUsers(), getCustomers(), createAgentObj()
* Requires: connection to mysql db.php, 
            mysqli_prepare(), 
            mysqli_stmt_bind_param(), 
            mysqli_stmt_execute(),
            mysqli_stmt_close()
****************************************/ 

// For all get functions a single generic getfunc() could be used but
// for educational demonstration and project purpose it's not made DRY

function createAgent($agent_data) {

    include('db.php');

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

function createAgentObj($agent_data) {
    // Import database connection
    include("db.php");

    // import agent class
    include("oop.php");

    // The magic happens here
    $dbh = connectDB();

    $sql = "INSERT INTO agents (
        AgtFirstName,
        AgtMiddleInitial,
        AgtLastName,
        AgtBusPhone,
        AgtEmail,
        AgtPosition,
        AgencyId) VALUES (?,?,?,?,?,?,?)";

    $stmt = $dbh->prepare($sql);

    // create new agents from values passed in from $_POST
    $fresh_agent = new Agent(
        $fname = $agent_data['AgtFirstName'],
        $mini = $agent_data['AgtMiddleInitial'],
        $lname = $agent_data['AgtLastName'],
        $bphone = $agent_data['AgtBusPhone'],
        $email = $agent_data['AgtEmail'],
        $position = $agent_data['AgtPosition'],
        $aId = $agent_data['AgencyId']
    );

    // get the object data and bind to prepared statement 
    $stmt->bind_param('ssssssi', 
        $fresh_agent->getAgtFirstName(),
        $fresh_agent->getAgtMiddleIni(),
        $fresh_agent->getAgtLastName(),
        $fresh_agent->getAgtBusPhone(),
        $fresh_agent->getAgtEmail(),
        $fresh_agent->getAgtPosition(),
        $fresh_agent->getAgencyId());

    // execute the db insert
    $result = $stmt->execute();

    $fh = fopen("agents.csv", "a");
    
    fwrite($fh, print_r($fresh_agent, true));

    fclose($fh);

    $stmt->close();

    closeDB($dbh);

    return $result;
}

function getUsers($file_name){

    $user_array = file($file_name);

    $users = array();
    
    foreach ($user_array as $row) {
        $items = explode(", ", $row);
        $users[trim($items[0])] = trim($items[1]);
    }

    return $users;

}

function getUsername($file_name){

    $name_array = file($file_name);
    $users_name = array();

    foreach ($name_array as $name_row) {
        $items = explode(", ", $name_row);
        $users_name[trim($items[0])] = trim($items[2]);
    }

    return $users_name;

}

function createCustomerWithPass($cust_data) {

    // import DB
    include('db.php');

    // use db function above
    $dbh = connectDB();

    $sql = "INSERT INTO customers (
        CustFirstName,
        CustLastName,
        CustAddress,
        CustCity,
        CustProv,
        CustPostal,
        CustCountry,
        CustHomePhone,
        CustBusPhone,
        CustEmail,
        AgentId) VALUES (?,?,?,?,?,?,?,?,?,?,?)";

    $stmt = $dbh->prepare($sql);

    // import the oop class
    include('oop.php');

    // create new customers from values passed in from $_POST
    $fresh_cust = new NewCustomer(
        $fname = $cust_data["CustFirstName"],
        $lname = $cust_data["CustLastName"],
        $email = $cust_data["CustEmail"],
        $add = $cust_data["CustAddress"],
        $country = $cust_data["CustCountry"],
        $city = $cust_data["CustCity"],
        $prov = $cust_data["CustProv"],
        $post = $cust_data["CustPostal"],
        $hphone = $cust_data["CustHomePhone"],
        $phone = $cust_data["CustBusPhone"],
        $agtId = $cust_data["AgentId"]);

    // get the object data and bind to prepared statement 
    $stmt->bind_param('ssssssssssi', $fresh_cust->firstName, $fresh_cust->lastName, $fresh_cust->address, $fresh_cust->city, $fresh_cust->prov, $fresh_cust->postal, $fresh_cust->country, $fresh_cust->homePhone, $fresh_cust->busPhone, $fresh_cust->email, $fresh_cust->agentId);

    // execute the db insert
    $result = $stmt->execute();

    $stmt->close();

    closeDB($dbh);

    return $result;

}

function getCustomerId($sql) {

    // import DB
    include('db.php');

    // use db function above
    $dbh = connectDB();

    $result = $dbh->query($sql);

    // Do error checking
    if(!$result) {
        echo "ERROR: The sql failed to execute. <br>";
        echo "SQL: $sql <br>";
        echo "Error #: " . $dbh->errorno . "<br>";
        echo "Error msg: " . $dbh->error . "<br>";
    }

    // $customer = $result;

    $cust_result = $result->fetch_assoc();

    closeDB($dbh);

    return $cust_result;
}

function getCustomers() {
    // import DB
    include('db.php');

    // import the oop class
    include("oop.php");

    // use db function above
    $dbh = connectDB();

    // give the query command
    $sql = "SELECT * FROM customers";

    // run the query on the DB
    $result = $dbh->query($sql);

    // Do error checking
    if(!$result) {
        echo "ERROR: The sql failed to execute. <br>";
        echo "SQL: $sql <br>";
        echo "Error #: " . $dbh->errorno . "<br>";
        echo "Error msg: " . $dbh->error . "<br>";
    }

    // Check for empty query, means customer is empty
    if ($result === 0) {
        echo "There were no results<br>";
    }

    // If customers exist, run the object query below
    $customers = array();
    while ($cust = $result->fetch_assoc()) {
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

        // append the object to the array
        $customers[] = $customer;
    }

    closeDB($dbh);

    return $customers;
}


function getAgencies() {
    // import DB
    include('db.php');

    // import the oop class
    include("oop.php");

    // call db function above
    $dbh = connectDB();

    // give the query command
    $sql = "SELECT * FROM agencies";

    // run the query on the DB
    $result = $dbh->query($sql);

    // Do error checking
    if(!$result) {
        echo "ERROR: The sql failed to execute. <br>";
        echo "SQL: $sql <br>";
        echo "Error #: " . $dbh->errorno . "<br>";
        echo "Error msg: " . $dbh->error . "<br>";
    }

    // Check for empty query, means customer is empty
    if ($result === 0) {
        echo "There were no results<br>";
    }
    
    // If agencies exist, run the object query below
    $agencies = array();

    while ($agncy = $result->fetch_assoc()) {
        $agency = new Agency(
            $agncy['AgencyId'],
            $agncy['AgncyAddress'],
            $agncy['AgncyCity'],
            $agncy['AgncyProv'],
            $agncy['AgncyPostal'],
            $agncy['AgncyCountry'],
            $agncy['AgncyPhone'],
            $agncy['AgncyFax']);

        // append object to array
        $agencies[] = $agency; 
    }
    
    closeDB($dbh);

    return $agencies;

}

function getPackages() {
    // import DB
    include('db.php');

    // import the oop class
    include("oop.php");

    // use db function above
    $dbh = connectDB();

    // give the query command
    $sql = "SELECT * FROM packages";

    // run the query on the DB
    $result = $dbh->query($sql);

    // Do error checking
    if(!$result) {
        echo "ERROR: The sql failed to execute. <br>";
        echo "SQL: $sql <br>";
        echo "Error #: " . $dbh->errorno . "<br>";
        echo "Error msg: " . $dbh->error . "<br>";
    }

    // Check for empty query, means customer is empty
    if ($result === 0) {
        echo "There were no results<br>";
    }

    $packages = array();
    while ($pack = $result->fetch_assoc()){
        $package = new Package(
            $pack['PackageId'],
            $pack['PkgName'],
            $pack['PkgStartDate'],
            $pack['PkgEndDate'],
            $pack['PkgDesc'],
            $pack['PkgBasePrice'],
            $pack['PkgAgencyCommission']);
    
        $packages[] = $package;
    }

    closeDB($dbh);
    
    return $packages;
}

?>