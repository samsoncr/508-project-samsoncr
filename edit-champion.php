<html>
<body>
<div class="page">
<?php
require_once('header.php');

require_once('connection.php');

session_start();

if (!isset($_GET['champion_name']) && $_SERVER['REQUEST_METHOD'] != 'POST') {
    
    // Retrieve list of employees
    $stmt = $conn->prepare("SELECT champion_name FROM champions ORDER BY champion_name");
    $stmt->execute();
    
    echo "<form method='get'>";
    echo "<select style='font-size: 18px' name='champion_name' onchange='this.form.submit();'>";
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
    
    $champion_name = $_GET["champion_name"];
    $price = $_GET["price"];

    echo $champion_name;
    
    $stmt = $conn->prepare("SELECT * FROM champions WHERE champion_name=?");
    $stmt->bind_param('s', $champion_name);
    
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    
    echo "<form method='post' action='edit-champion.php'>";
    echo "<table style='border: solid 1px black;'>";
    echo "<tbody>";
    echo "<tr><td>Ability Haste</td><td><input value='$result[ability_haste]' name='ability_haste' type='text' size='25'></td></tr>";
    echo "<tr><td>Ability Power</td><td><input value = '$result[ability_power]' name='ability_power' type='text' size='25'></td></tr>";
    echo "<tr><td>Armor</td><td><input value = '$result[armor]' name='armor' type='text' size='25'></td></tr>";
    echo "<tr><td>Attack Damage</td><td><input value = '$result[attack_damage]' name='attack_damage' type='text' size='25'></td></tr>";
    echo "<tr><td>Attack Range</td><td><input value = '$result[attack_range]' name='attack_range' type='text' size='25'></td></tr>";
    echo "<tr><td>Attack Speed</td><td><input value = '$result[attack_speed]' name='attack_speed' type='text' size='25'></td></tr>";
    echo "<tr><td>Champion Name</td><td><input value = '$result[champion_name]' name='champion_name' type='text' size='25'></td></tr>";
    echo "<tr><td>Magic Resist</td><td><input value = '$result[magic_resist]' name='magic_resist' type='text' size='25'></td></tr>";
    echo "<tr><td>Movement Speed</td><td><input value = '$result[movement_speed]' name='movement_speed' type='text' size='25'></td></tr>";
    echo "<tr><td>Price</td><td><input value = '$result[price]' name='price' type='text' size='25'></td></tr>";
    echo "<tr><td></td><td><input type='submit' value='Submit'></td></tr>";
    
    echo "</tbody>";
    echo "</table>";
    echo "</form>";

    // echo "<form method='post' action='edit-champion.php'>";
    // echo "<table style='border: solid 1px black;'>";
    // echo "<tbody>";
    // echo "<tr><td>Champion Name</td><td><input name='first_name' type='text' size='25' value='$row[first_name]'></td></tr>";
    // echo "<tr><td>Last name</td><td><input name='last_name' type='text' size='25' value='$row[last_name]'></td></tr>";
    // echo "<tr><td>Email</td><td><input name='email' type='email' size='25' value='$row[email]'></td></tr>";
    // echo "<tr><td>Salary</td><td><input name='salary' type='number' min='0.01' step='0.01' size='8' value='$row[salary]'></td></tr>";
    // echo "<tr><td></td><td><input type='submit' value='Submit'></td></tr>";
    // echo "</tbody>";
    // echo "</table>";
    // echo "</form>";

    // echo $result->fetch_assoc()["armor"];
    
    // $row = $stmt->fetch();

    // echo "<form method='post' action='editEmployee.php'>";
    // echo "<table style='border: solid 1px black;'>";
    // echo "<tbody>";
    // echo "<tr><td>First name</td><td><input name='first_name' type='text' size='25' value='$row[first_name]'></td></tr>";
    // echo "<tr><td>Last name</td><td><input name='last_name' type='text' size='25' value='$row[last_name]'></td></tr>";
    // echo "<tr><td>Email</td><td><input name='email' type='email' size='25' value='$row[email]'></td></tr>";
    // echo "<tr><td>Salary</td><td><input name='salary' type='number' min='0.01' step='0.01' size='8' value='$row[salary]'></td></tr>";
    // echo "<tr><td></td><td><input type='submit' value='Submit'></td></tr>";
    // echo "</tbody>";
    // echo "</table>";
    // echo "</form>";
    
    // $_SESSION["editEmployee_employee_id"] = $employee_id;

    $_SESSION["editChampion_name"] = $champion_name;

    echo "set it to " . $_SESSION["editChampion_name"] . " also " . $champion_name;
    
}

else {
    
    // try {
    // $stmt = $conn->prepare("SELECT * FROM champions WHERE champion_name = ?;");
    $stmt = $conn->prepare("UPDATE champions SET champion_name = ?, ability_haste = ?, ability_power = ?, armor = ?, attack_damage = ?, attack_range = ?, attack_speed = ?, magic_resist = ?, movement_speed = ?, price = ? WHERE champion_name = ?;");

    $stmt->bind_param(
        'siiiiidiids',
        $_POST['champion_name'],
        $_POST["ability_haste"],
        $_POST["ability_power"],
        $_POST["armor"],
        $_POST["attack_damage"],
        $_POST["attack_range"],
        $_POST["attack_speed"],
        $_POST["magic_resist"],
        $_POST["movement_speed"],
        $_POST["price"],
        $_SESSION["editChampion_name"]
    );

    echo "changed champion name from " . $_SESSION["editChampion_name"] . " to " . $_POST['champion_name'];

        
    $stmt->execute();
    // } catch (PDOException $e) {
    //     echo "Error: " . $e->getMessage();
    //     die();
    // }
    unset ($_SESSION["editChampion_name"]);

    echo "Success";    
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

</div>
</body>
</html>