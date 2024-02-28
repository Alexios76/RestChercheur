<?php
include_once('../config/database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Extract data from the form submission
    $np = $_POST['np'];
    $nc = $_POST['nc'];
    $annee = $_POST['annee'];

    // Insert Aff data into the database
    $stmt = $pdo->prepare("INSERT INTO aff (NP, NC, ANNEE) VALUES (?, ?, ?)");
    $stmt->execute([$np, $nc, $annee]);

    // Redirect after creation
    header("Location: index.html");
    exit();
}
?>
