<html>
<body>

<div class="page">
<?php 
require_once('header.php');

require_once('connection.php');

// if ($_SERVER['REQUEST_METHOD'] != 'POST') {

//     echo "<form method='post' action='delete-champion.php'>";
//     echo "<table style='border: solid 1px black;'>";
//     echo "<tbody>";
//     echo "<tr><td>Champion Name</td><td><input name='champion_name' type='text' size='25'></td></tr>";
    
//     echo "<tr><td></td><td><input type='submit' value='Submit'></td></tr>";
    
//     echo "</tbody>";
//     echo "</table>";
//     echo "</form>";

if (!isset($_GET['champion_name']) && $_SERVER['REQUEST_METHOD'] != 'POST') {
    
    // Retrieve list of employees
    $stmt = $conn->prepare("SELECT champion_name FROM champions ORDER BY champion_name");
    $stmt->execute();
    
    echo "<form method='post'>";
    echo "<select style='font-size: 18px; margin-right: 10px' name='champion_name'>";
    echo "<option value='0' selected disabled>Select a champion</option>";
    
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        echo "<option value='$row[champion_name]'>$row[champion_name]</option>";
    }

    // echo "<tr><td></td><td><input type='submit' value='Submit'></td></tr>";
    
    echo "</select>";
    echo "<tr><td></td><td><input type='submit' value='Delete'></td></tr>";
    echo "</form>";
    exit();
}

else {
    
    // try {
    $stmt = $conn->prepare("DELETE FROM champions WHERE champion_name = ?;");

    $stmt->bind_param('s', $_POST['champion_name']);

        
    $stmt->execute();
    // } catch (PDOException $e) {
    //     echo "Error: " . $e->getMessage();
    //     die();
    // }

    echo "Success";    
}

?>

<div>
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