<?php
include_once('../config/database.php');

// Query to retrieve Projet data
$sql = "SELECT * FROM projet";
$stmt = $pdo->query($sql);

if ($stmt) {
    $projets = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($projets); // Return the data as JSON
} else {
    echo json_encode([]); // Return an empty array if no data is retrieved
}
?>
