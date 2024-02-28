<?php
include_once('../config/database.php');

// Fetch NP values from the database
$sql = "SELECT DISTINCT NP FROM aff";
$stmt = $pdo->query($sql);

if ($stmt) {
    $npValues = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($npValues); // Return NP values as JSON
} else {
    echo json_encode([]); // Return an empty array if no NP values are retrieved
}
?>
