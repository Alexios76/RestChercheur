<?php
include_once('../config/database.php');

// Fetch NC values from the database
$sql = "SELECT DISTINCT NC FROM aff";
$stmt = $pdo->query($sql);

if ($stmt) {
    $ncValues = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($ncValues); // Return NC values as JSON
} else {
    echo json_encode([]); // Return an empty array if no NC values are retrieved
}
?>
