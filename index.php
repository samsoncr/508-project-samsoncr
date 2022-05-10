<?php
$servername = "cmsc508.com";
$username = "samsoncr";
$password = "V00905684";
$database = "project_samsoncr";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$db_success = $conn->select_db($database);
if (!$db_success) {
    die("failed to connect to $database");
}

$sql = "SELECT * FROM champions";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    echo $row["champion_name"] . " " . $row["armor"] . "<br>";
}
?>