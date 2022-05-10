<?php

require_once('connection.php');

$sql = "SELECT * FROM champions";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    echo $row["champion_name"] . " " . $row["armor"] . "<br>";
}

?>