<?php
    include_once("classes.php");

    function ConnectDB() {
        include("variables_db.php");    
        $link = new mysqli($host, $user, $password, $dbname);
        if ($link->connect_error) {
            print("There was an error connecting:" .
            $link->connect_error);
           exit();
        }
        else if ($link) {
            //echo "Connection was successful.<br>";
            //echo mysqli_get_host_info($link);
        }
        else {
            echo "Unknown failure.";
            exit();
        }
        return $link;
    }

    function CloseDB($link) {
        mysqli_close($link);
    }
    function writeLog($sql, $agent_data) {
        $fh = fopen('db_log.txt', 'a');
        fwrite($fh, $sql . "\n");
        fwrite($fh, print_r($agent_data, true));
        fclose($fh);
        print("finished writing.<br>");
    }

    function agentCreateObj($agent_obj) {

        $inputArr = $agent_obj->buildArray();
        print_r($inputArr);

        $dbh = ConnectDB();
        //Set a variable to the database table to be changed.
        $targetTable = 'agents';
            
        return insertRow($inputArr, $agent_obj, $targetTable);
       
        CloseDB($dbh);
    }

    function getTypeString($obj) {
        // This is a contrived way to produce the mySQL typestring
        // because I have not implemented a way to query the database
        // for field types. This method accesses a static array which
        // maps property name to property type.
        $type_str = "";
        foreach($obj as $key => $value) {
            $type_str .= Agent::$fieldTypes[$key]; 
        }
        return $type_str;
    }
    function typeString($keys, $testTypeArray) {

        $type_str = "";
        foreach($keys as $key) {
            $type_str .= $testTypeArray[Agent::$fieldNames[$key]]; 
        }
        print("**********");
        print_r($type_str);
        return $type_str;
    }

    function insertRow($testArr, $agent_obj, $targetTable) {
        $numElements = count($testArr);
        $mysqli = ConnectDB();
       
        $testKey   = "";
        $testValue = "";
        $testVal   = "";
        $tableInsert = 'agents';
        $testTypeString = $agent_obj->getTypeString();
        $testTypeArray2 = buildtypestring($mysqli, $targetTable);
        print("testTypeArray2");
        print_r($testTypeArray2);
        

        // Build the first part of the SQL statement by iterating through the property names.
        $testString = "INSERT INTO $tableInsert (";
        $count=0;
        foreach($testArr as $x => $xValue) {
            $count++;
            if ($count < $numElements) {
                print("Agent static parameter next:");
                print(Agent::$fieldNames[$x]."<br>");   // Use a static hash table from the class to map property
                                                        // names to database field names.  Credit : instructor and class collaboration
                                                        // for this solution. 
                $testKey .= Agent::$fieldNames[$x] . ", ";
                $testVal .= "?, ";
                $testValue .= "'".$xValue."'" . ", ";
            }
            else {
                $testKey .= Agent::$fieldNames[$x];
                $testVal .= "?";
                $testValue .= "'".$xValue."'";
            }          
        }

        //Complete the sql statement.
        $testString = $testString . $testKey . ") VALUES (" . $testVal . ")";

        $stmt = $mysqli->stmt_init();
        $stmt->prepare($testString);

        $keys   = array_keys($testArr);
        print("keys:");
        print_r($keys);
        $testTypeString2 = typeString($keys, $testTypeArray2);


        $args = array($testTypeString2);
        reset($keys);
        foreach ($keys as $key) {
            $args[] = &$testArr[$key];
        } 
		call_user_func_array(array($stmt,"bind_param"), $args);

        $result = $stmt->execute();
        $stmt->close();
        $mysqli->close();

        if ($result) {
            print("<h1>Insert was successful.</h1>");
            return true;
        } else {
            print("<h1>Insert failed.</h1>");
            return false;
        }
    }   
    function readValidUsers() {
        if(!file_exists('php/validUsers.txt')) {
            print("File does not exist.<br>");
            return NULL;
        }
        $contentArray = file('php/validUsers.txt');
        print_r($contentArray);
        foreach($contentArray as $line) {
            print("Starting foreach loop.");
            $tempArray = explode(" ", $line);
            print_r($tempArray[0]);
            print_r($tempArray[1]);
            $outputArray[$tempArray[0]]= $tempArray[1];
        }
        return $outputArray;
    }
    function checkUserPass($name, $pass, $validUsers) {
        print(gettype($name).gettype($pass).strlen($name).strlen($pass));
        print("Starting checkUserPass");
        print_r($validUsers);
        foreach ($validUsers as $key=>$value) {
            print("key ".$key."value ".$value."<br>");
            print(strlen($key).strlen($value));
            if((trim($key) == trim($name)) && (trim($value) == trim($pass))) {
                print("User authenticated.<br>");
                return true;
            }
        }
        return false;
    }

    // Modified from instructor-provided example code to build an associative array by perusing the travel
    // database. First modification is to accept a table argument and the second is to build an associative
    // array with db Field names as keys and their associated value types as characters (eg: i, d, s, b).
    // This allows later code to prepare sql statements independently of the property order of
    // various data objects.  In other words, the Agent object has properties out of order with the
    // database field names and now with this associative array, the code should be generic.
    function buildtypestring($dbh, $targetTable)
	{
			//get table info to build type string for bind param function
		$typestring = "";
        $res = mysqli_query($dbh, "DESCRIBE " . $targetTable);
        print_r($res);
        $typeArray = array();
		while($row = mysqli_fetch_assoc($res))
		{
            print_r($row);
			// these next to lines are to test to see what 'DESCRIBE agents' returns
			// print_r($row);
			// print("<br>");
//			if ($row["Extra"] != "auto_increment")
//			{
				$match = array();
				// reges to get only the text
				preg_match("/^[a-z]+/", $row['Type'], $match);
				switch ($match[0])
				{
					case "tinyint";
					case "smallint";
					case "mediumint";
					case "bigint";
                    case "int":
                        $tempType = "i";
						$typestring .= "i";
						break;
					case "decimal";
					case "double";
					case "real";
                    case "float":
                        $tempType = "d";
						$typestring .= "d";
						break;
					case "tinytext";
					case "mediumtext";
					case "longtext";
					case "date";
					case "time";
					case "timestamp";
					case "datetime";
					case "year";
                    case "varchar":
                        $tempType = "s";
						$typestring .= "s";
						break;
                    default:
                        $tempType = "b";
						$typestring .= "b";
				}
//			}
            // Build associative array elements, e.g. 'AgtMiddleInitial' => 's'
            $typeArray[$row["Field"]] = $tempType;
		}
		return $typeArray;
    }    

    function readTable($dbh, $targetTable)
	{
	    //get table info to build type string for bind param function
		$typestring = "";
        $res   = mysqli_query($dbh, "DESCRIBE " . $targetTable);
        $res2  = mysqli_query($dbh, "SELECT * FROM " . $targetTable);
        $count = mysqli_num_rows($res2);
        // print($count);
       
        // print("<br>");
        // print("DESCRIBE table:<br>");
        // print_r($res);
        // print("Finished DESCRIBE table:<br>");
        // print("SELECT * FROM table:<br>");
        // print_r($res2);
        // print("SELECT * FROM table:<br>");

        // print("Print rows of the resulting SELECT:<br>");
		// while($row = mysqli_fetch_assoc($res2))
		// {
        //     print_r($row);
        //     print("<br>");				
        // }
        // print_r($res2);
		return $res2;
	}
    function readTableObj($dbh, $targetTable)
	{
	    //get table info to build type string for bind param function
		$typestring = "";
        $res   = mysqli_query($dbh, "DESCRIBE " . $targetTable);
        $res2  = mysqli_query($dbh, "SELECT * FROM " . $targetTable);
        $count = mysqli_num_rows($res2);

        $objArr = array();
        while($row = mysqli_fetch_assoc($res2))
		{
            $tempObj = new Package($row['PackageId'], $row['PkgName'], $row['PkgStartDate'],
            $row['PkgEndDate'], $row['PkgDesc'], $row['PkgBasePrice'], $row['PkgAgencyCommission']); 
            $objArr[] = $tempObj;			
        }
		return $objArr;
	}

?>