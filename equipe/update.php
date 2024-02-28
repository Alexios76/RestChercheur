<?php
include_once('../config/database.php');

// Check if NE parameter is passed
if (isset($_GET['ne'])) {
    $ne = $_GET['ne'];

    // Fetch existing Chercheur data based on ne
    $stmt = $pdo->prepare("SELECT * FROM equipe WHERE NE = ?");
    $stmt->execute([$ne]);
    $equipe = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Extract data from the form submission
        $nom = $_POST['nom'];

        // Update Chercheur data in the database
        $updateStmt = $pdo->prepare("UPDATE equipe SET NOM = ? WHERE NE = ?");
        $updateStmt->execute([$nom, $ne]);

        // Redirect to index.html after update
        header("Location: index.html");
        exit();
    }
} else {
    // Redirect if ne parameter is not provided
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Equipe</title>
</head>
<body>
    <h1>Modifier Equipe</h1>
    <form id="updateEquipeForm" action="update.php?ne=<?php echo $ne; ?>" method="POST">
        <input type="hidden" name="ne" value="<?php echo $equipe['NE']; ?>">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" value="<?php echo $equipe['NOM']; ?>" required><br><br>
        
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