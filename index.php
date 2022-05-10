<?php
$servername = "cmsc508.com";
$username = "samsoncr";
$password = "V00905684";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>