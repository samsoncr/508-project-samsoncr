
<html>
<head>
    
</head>
<body>
<div class="page">

<?php
require_once('header.php');

require_once('connection.php');

$sql = "SELECT * FROM champions";
$result = $conn->query($sql);
// while($row = $result->fetch_assoc()) {
//     echo $row["champion_name"] . " " . $row["armor"] . "<br>";
// }
echo "<h2>All Champions</h2>";

echo "<table align='center' border='1'>
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
while($row = $result->fetch_assoc())
  {
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
echo "</table>";

?>

<br>
<br>


</div>
</body>
</html>