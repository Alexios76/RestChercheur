<?php
include_once('../config/database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Extract data from the form submission
    $np = $_POST['np'];
    $nom = $_POST['nom'];
    $budget = $_POST['budget'];
    $equipe_id = $_POST['equipe_id'];

    // Insert Projet data into the database
    $stmt = $pdo->prepare("INSERT INTO projet (NP, NOM, BUDGET, NE) VALUES (?, ?, ?, ?)");
    $stmt->execute([$np, $nom, $budget, $equipe_id]);

    // Redirect after creation
    header("Location: index.html");
    exit();
}
?>
