
<html>
<body>

<?php

require_once('connection.php');

if (!isset($_GET['champion_name']) && $_SERVER['REQUEST_METHOD'] != 'POST') {
    
    // Retrieve list of employees
    $stmt = $conn->prepare("SELECT champion_name FROM champions ORDER BY champion_name");
    $stmt->execute();
    
    echo "<form method='get'>";
    echo "<select name='champion_name' onchange='this.form.submit();'>";
    echo "<option value='0' selected disabled>Select a champion</option>";
    
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        echo "<option value='$row[champion_name]'>$row[champion_name]</option>";
    }
    
    echo "</select>";
    echo "</form>";
    exit();

} 

if ($_SERVER['REQUEST_METHOD'] != 'POST') {

$stmt = $conn->prepare("SELECT * FROM champions WHERE champion_name=?");
$champion_name = "Lee Sin";
$stmt->bind_param('s', $_GET['champion_name']);
$stmt->execute();

$row = $stmt->get_result()->fetch_assoc();

echo $row['armor'];


// while($row = $result->fetch_assoc()) {
//     echo $row["champion_name"] . " " . $row["armor"] . "<br>";
// }

echo "<table border='1'>
<tr>
<th>Name</th>
<th>Armor</th>
<th>Ability Haste</th>
<th>Ability Power</th>
<th>Attack Damage</th>
<th>Attack Range</th>
<th>Attack Speed</th>
<th>Magic Resist</th>
<th>Movement Speed</th>
<th>Price</th>
</tr>";

  echo "<tr>";
  echo "<td>" . $row['champion_name'] . "</td>";
  echo "<td>" . $row['armor'] . "</td>";
  echo "<td>" . $row['ability_haste'] . "</td>";
  echo "<td>" . $row['ability_power'] . "</td>";
  echo "<td>" . $row['attack_damage'] . "</td>";
  echo "<td>" . $row['attack_range'] . "</td>";
  echo "<td>" . $row['attack_speed'] . "</td>";
  echo "<td>" . $row['magic_resist'] . "</td>";
  echo "<td>" . $row['movement_speed'] . "</td>";
  echo "<td>" . $row['price'] . "</td>";
  echo "</tr>";
  }


?>

<div class="container-fluid mt-3 mb-3">
    <ul>
    	<li><a href="add-champion.php">add a champion</a></li>
    	<li><a href="edit-champion.php">edit a champion</a></li>
        <li><a href="delete-champion.php">delete a champion</a></li>
        <li><a href="view-champion.php">view a champion</a></li>
    </ul>
</div>

</body>
</html>