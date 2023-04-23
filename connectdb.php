<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pts";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// $showdata = "SELECT * FROM M_Member";
// $result = $conn->query($showdata);
// $conn->close();

// while($row = $result->fetch_assoc()) {
//     echo $row["Member_ID"]."   ".$row["Member_Name"]."   ".$row["Member_Surname"]."   ".$row["Member_Address"]."   ".$row["Member_Tel"]."<br>";
// }

?>
