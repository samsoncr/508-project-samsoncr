<html>
<body>

<div class="page">
<?php 
require_once('header.php');

require_once('connection.php');


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
    
    echo "</select>";
    echo "<tr><td></td><td><input type='submit' value='Delete'></td></tr>";
    echo "</form>";
    exit();
}

else {
    

    if (!array_key_exists('champion_name', $_POST)) {
        die('error!!!!! You did not select a champion');
    }
    
    $stmt = $conn->prepare("DELETE FROM champions WHERE champion_name = ?;");

    $stmt->bind_param('s', $_POST['champion_name']);

        
    $stmt->execute();

    echo "Success";    
}

?>

</div>
</body>
</html>