<?php
include_once('../config/database.php');

// Check if NP parameter is passed
if (isset($_GET['np'])) {
    $np = $_GET['np'];

    // Fetch existing Chercheur data based on NC
    $stmt = $pdo->prepare("SELECT * FROM projet WHERE NP = ?");
    $stmt->execute([$np]);
    $projet = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Extract data from the form submission
        $nom = $_POST['nom'];
        $budget = $_POST['budget'];
        $equipe_id = $_POST['equipe_id'];

        // Update Chercheur data in the database
        $updateStmt = $pdo->prepare("UPDATE projet SET NOM = ?, BUDGET = ?, NE = ? WHERE NP = ?");
        $updateStmt->execute([$nom, $budget, $equipe_id, $np]);

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
    <title>Modifier Projet</title>
</head>
<body>
    <h1>Modifier Projet</h1>
    <form id="updateProjetForm" action="update.php?np=<?php echo $np; ?>" method="POST">
        <input type="hidden" name="np" value="<?php echo $projet['NP']; ?>">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" value="<?php echo $projet['NOM']; ?>" required><br><br>
        
        <label for="prenom">Budget:</label>
        <input type="text" id="budget" name="budget" value="<?php echo $projet['BUDGET']; ?>" required><br><br>
        
        <label for="equipe_id">Numéro equipe:</label>
        <input type="text" id="equipe_id" name="equipe_id" value="<?php echo $projet['NE']; ?>" required><br><br>
        
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