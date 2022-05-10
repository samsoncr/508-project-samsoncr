<?php

require_once('connection.php');

$sql = "SELECT * FROM champions";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    echo $row["champion_name"] . " " . $row["armor"] . "<br>";
}

?>
<html>
<body>

<div class="container-fluid mt-3 mb-3">
    <ul>
    	<li><a href="add-champion.php">add a champion</a></li>
    	<li><a href="edit-champion.php">edit a champion</a></li>
        <li><a href="delete-champion.php">delete a champion</a></li>  
    </ul>
</div>

</body>
</html>