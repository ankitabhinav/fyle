<?php
header("Access-Control-Allow-Origin: *");
$servername = "localhost";
$username = "**********";
$password = "**********";
$dbname = "***********";

$bank_name=$_REQUEST["bank_name"];
$bank_state=$_REQUEST["bank_state"];
$bank_city=$_REQUEST["bank_city"];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM `bank_details` WHERE `bank_name`='$bank_name' AND `bank_state`='$bank_state' AND `bank_city`='$bank_city'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $rows = array();
    while($row = $result->fetch_assoc()) {
      //  echo "MSG: " . $row["msg"]. " - TYPE: " . $row["type"]."<br>";
      $rows[] = $row;
     
    }
    print json_encode($rows);
} else {
    echo "0 results";
}
//echo $row;
$conn->close();
?>