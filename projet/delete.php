<?php
include_once('../config/database.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Handle form submission
    $np = $_GET['np'];

    // Delete from the database
    $stmt = $pdo->prepare("DELETE FROM projet WHERE NP = ?");
    $stmt->execute([$np]);
    
    header("Location: index.html"); // Redirect back to the index page
    exit();
}
?>