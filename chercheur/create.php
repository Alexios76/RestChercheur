<?php
include_once('../config/database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $equipe_id = $_POST['equipe_id']; // Assuming equipe_id is submitted from the form

    // Insert into the database
    $stmt = $pdo->prepare("INSERT INTO chercheur (NOM, PRENOM, NE) VALUES (?, ?, ?)");
    $stmt->execute([$nom, $prenom, $equipe_id]);
    
    header("Location: index.html"); // Redirect back to the index page
    exit();
}
?>

