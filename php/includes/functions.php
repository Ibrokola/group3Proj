<?php
/***************************************
* Author: Ibraheem Kolawole
* Date: February 11, 2019
* Purpose: Agent insert function using prepared statements, getUsers(), getCustomers(), createAgentObj()
* Requires: connection to mysql db.php, 
            mysqli_prepare(), 
            mysqli_stmt_bind_param(), 
            mysqli_stmt_execute(),
            mysqli_stmt_close()
****************************************/ 

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


function getUsers(){
    $user_array = file("users.txt");

    $users = array();
    foreach ($user_array as $row) {
        $items = explode(", ", $row);
        $users[trim($items[0])] = trim($items[1]);
    }
    return $users;
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

            // $id, $fname, $lname, $phone, $email, $add, $city, $prov, $post, $country, $hphone, $agtId
        // append the object to the array
        $customers[] = $customer;
    }

    closeDB($dbh);

    return $customers;
}

?>