<html>
<body>
<div class="page">
<?php 
require_once('header.php');

require_once('connection.php');

if ($_SERVER['REQUEST_METHOD'] != 'POST') {

    echo "<form method='post' action='add-champion.php'>";
    echo "<table style='border: solid 1px black;'>";
    echo "<tbody>";
    echo "<tr><td>Ability Haste</td><td><input name='ability_haste' type='text' size='25'></td></tr>";
    echo "<tr><td>Ability Power</td><td><input name='ability_power' type='text' size='25'></td></tr>";
    echo "<tr><td>Armor</td><td><input name='armor' type='text' size='25'></td></tr>";
    echo "<tr><td>Attack Damage</td><td><input name='attack_damage' type='text' size='25'></td></tr>";
    echo "<tr><td>Attack Range</td><td><input name='attack_range' type='text' size='25'></td></tr>";
    echo "<tr><td>Attack Speed</td><td><input name='attack_speed' type='text' size='25'></td></tr>";
    echo "<tr><td>Champion Name</td><td><input name='champion_name' type='text' size='25'></td></tr>";
    echo "<tr><td>Magic Resist</td><td><input name='magic_resist' type='text' size='25'></td></tr>";
    echo "<tr><td>Movement Speed</td><td><input name='movement_speed' type='text' size='25'></td></tr>";
    echo "<tr><td>Price</td><td><input name='price' type='text' size='25'></td></tr>";

    
    // Retrieve list of employees as potential manager of the new employee
    // $stmt = $conn->prepare("SELECT employee_id, first_name, last_name FROM employees");
    // $stmt->execute();
    
    // echo "<select name='manager_id'>";
    
    // echo "<option value='-1'>No manager</option>";
    
    // while ($row = $stmt->fetch()) {
    //     echo "<option value='$row[employee_id]'>$row[first_name] $row[last_name]</option>";
    // }
    
    // echo "</select>";
    // echo "</td></tr>";
    
    // echo "<tr><td>Department</td><td>";
    
    // // Retrieve list of departments
    // $stmt = $conn->prepare("SELECT department_id, department_name FROM departments");
    // $stmt->execute();
    
    // echo "<select name='department_id'>";
    
    // echo "<option value='-1'>No department</option>";
    
    // while ($row = $stmt->fetch()) {
    //     echo "<option value='$row[department_id]'>$row[department_name]</option>";
    // }
    
    // echo "</select>";
    // echo "</td></tr>";
    
    // echo "<tr><td>Job</td><td>";
    
    // // Retrieve list of jobs
    // $stmt = $conn->prepare("SELECT job_id, job_title FROM jobs");
    // $stmt->execute();
    
    // echo "<select name='job_id'>";
    
    // while ($row = $stmt->fetch()) {
    //     echo "<option value='$row[job_id]'>$row[job_title]</option>";
    // }
    
    // echo "</select>";
    // echo "</td></tr>";
    
    echo "<tr><td></td><td><input type='submit' value='Submit'></td></tr>";
    
    echo "</tbody>";
    echo "</table>";
    echo "</form>";
} else {
    
    // try {
    $stmt = $conn->prepare("INSERT INTO champions (ability_haste, ability_power, armor, attack_damage, attack_range, attack_speed, champion_name, magic_resist, movement_speed, price) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");

    $stmt->bind_param('iiiiidsiid', $_POST['ability_haste'], $_POST['ability_power'], $_POST['armor'], $_POST['attack_damage'], $_POST['attack_range']
    , $_POST['attack_speed'], $_POST['champion_name'], $_POST['magic_resist'], $_POST['movement_speed'], $_POST['price']);


        // $stmt->bindValue(':last_name', $_POST['last_name']);
        // $stmt->bindValue(':email', $_POST['email']);
        // $stmt->bindValue(':job_id', $_POST['job_id']);
        // $stmt->bindValue(':salary', $_POST['salary']);
        
        // if($_POST['manager_id'] != -1) {
        //     $stmt->bindValue(':manager_id', $_POST['manager_id']);
        // } else {
        //     $stmt->bindValue(':manager_id', null, PDO::PARAM_INT);
        // }
        
        // if($_POST['department_id'] != -1) {
        //     $stmt->bindValue(':department_id', $_POST['department_id']);
        // } else {
        //     $stmt->bindValue(':department_id', null, PDO::PARAM_INT);
        // }
        
    $stmt->execute();
    // } catch (PDOException $e) {
    //     echo "Error: " . $e->getMessage();
    //     die();
    // }

    echo "Success";    
}

?>
</div>

</body>
</html>