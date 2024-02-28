<?php
include_once('../config/database.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Handle form submission
    $nc = $_GET['nc'];

    // Delete from the database
    $stmt = $pdo->prepare("DELETE FROM chercheur WHERE NC = ?");
    $stmt->execute([$nc]);
    
    header("Location: index.html"); // Redirect back to the index page
    exit();
}
?>
