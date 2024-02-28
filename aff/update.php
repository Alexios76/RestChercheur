
<?php
// Non-utilisé dans le projet final.
// Nous ne pouvons pas ajouter une fonction de modification à la 
// table "aff" car il n’y a pas d’identifiant unique.

include_once('../config/database.php');

if (isset($_GET['nc'])) {
    $nc = $_GET['nc'];

    // Fetch existing Aff data based on NC
    $stmt = $pdo->prepare("SELECT * FROM aff WHERE NC = ?");
    $stmt->execute([$nc]);
    $aff = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Extract data from the form submission
        $np = $_POST['np'];
        $nc = $_POST['nc'];
        $annee = $_POST['annee'];

        // Update Aff data in the database
        $updateStmt = $pdo->prepare("UPDATE aff SET ANNEE = ? WHERE NC = ? AND NP = ?");
        $updateStmt->execute([$annee, $nc, $np]);

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
*/
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Aff</title>
</head>
<body>
    <h1>Modifier Aff</h1>
    <form id="updateAffForm" action="update.php?nc=<?php echo $nc; ?>" method="POST">
        <label for="np">NP:</label>
        <input type="text" id="np" name="np" value="<?php echo $aff['NP']; ?>" readonly><br><br>
        
        <label for="nc">NC:</label>
        <input type="text" id="nc" name="nc" value="<?php echo $aff['NC']; ?>" readonly><br><br>

        <label for="annee">Année:</label>
        <input type="text" id="annee" name="annee" value="<?php echo $aff['ANNEE']; ?>" required><br><br>
        
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
