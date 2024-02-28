<?php
include_once('../config/database.php');

// Check if NC parameter is passed
if (isset($_GET['nc'])) {
    $nc = $_GET['nc'];

    // Fetch existing Chercheur data based on NC
    $stmt = $pdo->prepare("SELECT * FROM chercheur WHERE NC = ?");
    $stmt->execute([$nc]);
    $chercheur = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Extract data from the form submission
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $equipe_id = $_POST['equipe_id'];

        // Update Chercheur data in the database
        $updateStmt = $pdo->prepare("UPDATE chercheur SET NOM = ?, PRENOM = ?, NE = ? WHERE NC = ?");
        $updateStmt->execute([$nom, $prenom, $equipe_id, $nc]);

        // Redirect to index.html after update
        header("Location: index.html");
        exit();
    }
} else {
    // Redirect if NC parameter is not provided
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Chercheur</title>
</head>
<body>
    <h1>Modifier Chercheur</h1>
    <form id="updateChercheurForm" action="update.php?nc=<?php echo $nc; ?>" method="POST">
        <input type="hidden" name="nc" value="<?php echo $chercheur['NC']; ?>">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" value="<?php echo $chercheur['NOM']; ?>" required><br><br>
        
        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" value="<?php echo $chercheur['PRENOM']; ?>" required><br><br>
        
        <label for="equipe_id">Equipe:</label>
        <input type="text" id="equipe_id" name="equipe_id" value="<?php echo $chercheur['NE']; ?>" required><br><br>
        
        <button type="submit">Modifier</button>
        <button type="button" onclick="cancelUpdate()">Annuler</button>
    </form>
    <script>
        // Function to cancel the update action and return to index.html
        function cancelUpdate() {
        window.location.href = 'index.html';
        }
    </script>
</body>
</html>
