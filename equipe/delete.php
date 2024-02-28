<?php
include_once('../config/database.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Handle form submission
    $ne = $_GET['ne'];

    // Delete from the database
    $stmt = $pdo->prepare("DELETE FROM equipe WHERE NE = ?");
    $stmt->execute([$ne]);
    
    header("Location: index.html"); // Redirect back to the index page
    exit();
}
?>
