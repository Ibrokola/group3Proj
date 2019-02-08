<?php
/***************************************
* Author: Ibraheem Kolawole
* Date: February 11, 2019
* Purpose: Agent insert function using prepared statement
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


function getUsers(){
    $user_array = file("users.txt");
    $users = array();
    foreach ($user_array as $row) {
        $items = explode(",", $row);
        $users[trim([$items[0]])] = trim($items[1]);
    }
    return $users;
}

?>