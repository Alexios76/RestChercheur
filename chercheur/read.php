<?php
include_once('../config/database.php');

// Query to retrieve Chercheur data with Equipe information
$sql = "SELECT c.NC, c.NOM, c.PRENOM, e.NOM AS equipe_nom 
        FROM chercheur c 
        INNER JOIN equipe e ON c.NE = e.NE";

$stmt = $pdo->query($sql);

if ($stmt) {
    $chercheurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($chercheurs); // Return the data as JSON
} else {
    echo json_encode([]); // Return an empty array if no data is retrieved
}
?>
