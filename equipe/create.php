<?php
include_once('../config/database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Extract data from the form submission
    $nom = $_POST['nom'];

    // Insert Equipe data into the database
    $stmt = $pdo->prepare("INSERT INTO equipe (NOM) VALUES (?)");
    $stmt->execute([$nom]);

    // Redirect after creation
    header("Location: index.html");
    exit();
}
?>
