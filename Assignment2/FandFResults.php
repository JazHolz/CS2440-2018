<?php

//ini_set('display_startup_errors', 1);
//ini_set('display_errors', 1);
//error_reporting(-1);

//echo "Start...<br>";
$FName = $_POST["fname"];
$LName = $_POST["lname"];
$Phone = $_POST["phone"];
$Address = $_POST["address"];
$City = $_POST["city"];
$State = $_POST["state"];
$Zip = $_POST["zip"];
$month = $_POST["month"];
$day = $_POST["day"];
$year = $_POST["year"];
$Birthdate = $year . '-' . $month . '-' . $day;
$Username = $_POST["myusername"];
$Password = $_POST["mypassword"];
//echo "Before Hash...<br>";
$hash = password_hash($Password, PASSWORD_BCRYPT);
//echo "After Hash...<br>";
$Sex = $_POST["sex"];
$Relationship = $_POST["relation"];
$RequestType = $_POST["requestType"];

//echo "Variables created...<br>";

require_once 'DataBaseConnection.php';


//echo "Database connected...<br>";

//echo "Request Type: " . $RequestType . "<br>";

if ($RequestType == "Create")
{
    
    $query = "INSERT INTO `FriendsAndFamily`.`FANDF` (`FName`, `LName`, `Phone`, `Address`, `City`, `State`, `Zip`, `Birthdate`, `Username`, `Password`, `Sex`, `Relationship`) VALUES ('$FName', '$LName', '$Phone', '$Address', '$City', '$State', $Zip, '$Birthdate', '$Username', '$hash', '$Sex', '$Relationship')";


$success = $con->query($query);
    if ($success)
    {
        echo ($FName . " " . $LName . " was added successfully.");
    }
    else
    {
        die('Invalid Create query: ' . mysqli_error($con) . '<br>');
    }
}

if ($RequestType == "Update")
{
    
    $query = "SELECT Password FROM FriendsAndFamily.FANDF WHERE Username = '$Username'";

    $return = $con->query($query);
if (!$return) {
    die('Invalid query: ' . mysqli_error($con) . '<br>');
} else {
    while ($row = $return->fetch_assoc()) {
    $db_Password = $row['Password'];
    }

   if (!password_verify($Password, $db_Password)) {
   Echo 'Password invalid';
} else {
    $query = "UPDATE `FriendsAndFamily`.`FANDF` SET `FName` = '$FName', `LName` = '$LName', `Phone` = '$Phone', `Address` = '$Address', `City` = '$City', `State` = '$State', `Zip` = $Zip, `Birthdate` = '$Birthdate', `Sex` = '$Sex', `Relationship` = '$Relationship' WHERE `Username` = '$Username'";


$success = $con->query($query);
if ($success)
    {
        echo ($FName . " " . $LName . " was updated.");
    }
    else
    {
        die('Invalid query: ' . mysqli_error($con) . '<br>');
    }
} 
}
}

if ($RequestType == "Search")
{
$query = "SELECT * FROM FriendsAndFamily.FANDF WHERE 1 = 1";

if($FName != '')
{
    $query .= " AND FName = '$FName'";
}
if($LName != '')
{
    $query .= " AND LName = '$LName'";
}


    

$return = $con->query($query);
if (!$return) {
    //$message = "Whole query " . $showColumns . "<br>";
    //echo $message;
    die('Invalid query: ' . mysqli_error($con) . '<br>');
} else {
    echo "<table><th>FName</th><th>LName</th><th>Phone</th><th>Address</th><th>City</th><th>State</th><th>Zip</th><th>Birthdate</th><th>Sex</th><th>Relation</th>";
    while ($row = $return->fetch_assoc()) {
        echo "<tr><td>" . $row['FName'] 
                . "</td><td>" . $row['LName'] 
                . "</td><td>". $row['Phone']
                ." </td><td>".$row['Address']."</td>"
                ." </td><td>".$row['City']."</td>"
                ." </td><td>".$row['State']."</td>"
                ." </td><td>".$row['Zip']."</td>"
                ." </td><td>".$row['Birthdate']."</td>"
                ." </td><td>".$row['Sex']."</td>"
                ." </td><td>".$row['Relationship']."</td>"
                . "</tr>";
    }
    echo "</table><br>";
}
}

$con->close();