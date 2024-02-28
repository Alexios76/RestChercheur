<?php
include_once('../config/database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Extract data from the request body
    $data = json_decode(file_get_contents("php://input"), true);

    // Check if required data is provided
    if (isset($data['np']) && isset($data['nc']) && isset($data['annee'])) {
        $np = $data['np'];
        $nc = $data['nc'];
        $annee = $data['annee'];

        try {
            // Delete Aff data from the database
            $stmt = $pdo->prepare("DELETE FROM aff WHERE NP = ? AND NC = ? AND ANNEE = ?");
            $stmt->execute([$np, $nc, $annee]);
            
            // Return success response
            http_response_code(200);
            echo json_encode(array("message" => "Aff deleted successfully."));
        } catch (PDOException $e) {
            // Return error response
            http_response_code(500);
            echo json_encode(array("message" => "Error deleting aff: " . $e->getMessage()));
        }
    } else {
        // Return error response if data is incomplete
        http_response_code(400);
        echo json_encode(array("message" => "Unable to delete aff. Incomplete data."));
    }
} else {
    // Return error response if not a POST request
    http_response_code(405);
    echo json_encode(array("message" => "Method Not Allowed"));
}
?>
