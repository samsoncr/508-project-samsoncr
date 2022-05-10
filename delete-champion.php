<?php 

require_once('connection.php');

if ($_SERVER['REQUEST_METHOD'] != 'POST') {

    echo "<form method='post' action='delete-champion.php'>";
    echo "<table style='border: solid 1px black;'>";
    echo "<tbody>";
    echo "<tr><td>Champion Name</td><td><input name='champion_name' type='text' size='25'></td></tr>";
    
    echo "<tr><td></td><td><input type='submit' value='Submit'></td></tr>";
    
    echo "</tbody>";
    echo "</table>";
    echo "</form>";
} else {
    
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