<?php
include_once('../config/database.php');

// Query to retrieve Equipe data
$sql = "SELECT * FROM equipe";
$stmt = $pdo->query($sql);

if ($stmt) {
    $equipes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($equipes); // Return the data as JSON
} else {
    echo json_encode([]); // Return an empty array if no data is retrieved
}
?>
