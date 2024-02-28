<?php
include_once('../config/database.php');

// Query to retrieve Aff data
$sql = "SELECT * FROM aff";
$stmt = $pdo->query($sql);

if ($stmt) {
    $affs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($affs); // Return the data as JSON
} else {
    echo json_encode([]); // Return an empty array if no data is retrieved
}
?>
