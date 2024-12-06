<?php
header('Content-Type: application/json');
require 'config.php'; // Include your database configuration

try {
    // Get the model and colorway from the POST request
    $model = isset($_POST['model']) ? trim($_POST['model']) : '';
    $colorway = isset($_POST['colorway']) ? trim($_POST['colorway']) : '';

    // Validate input
    if (empty($model) || empty($colorway)) {
        echo json_encode([
            "status" => "error",
            "message" => "Model and colorway are required."
        ]);
        exit();
    }

    // Check if the sneaker exists in the database
    $checkQuery = "SELECT COUNT(*) AS count FROM sneakers WHERE model = ? AND colorway = ?";
    $stmt = $conn->prepare($checkQuery);
    $stmt->bind_param("ss", $model, $colorway);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['count'] == 0) {
            // Sneaker not found
            echo json_encode([
                "status" => "error",
                "message" => "Sneaker not found in the database."
            ]);
            exit();
        }
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Error checking the database."
        ]);
        exit();
    }

    // Delete the sneaker if it exists
    $deleteQuery = "DELETE FROM sneakers WHERE model = ? AND colorway = ?";
    $stmt = $conn->prepare($deleteQuery);
    $stmt->bind_param("ss", $model, $colorway);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        // Successfully deleted
        echo json_encode([
            "status" => "success",
            "message" => "Sneaker deleted successfully."
        ]);
    } else {
        // Fallback error if delete fails unexpectedly
        echo json_encode([
            "status" => "error",
            "message" => "Failed to delete sneaker. Please try again."
        ]);
    }
} catch (Exception $e) {
    // Handle errors gracefully
    echo json_encode([
        "status" => "error",
        "message" => "Error: " . $e->getMessage()
    ]);
} finally {
    // Close the statement and connection
    if (isset($stmt)) {
        $stmt->close();
    }
    if (isset($conn)) {
        $conn->close();
    }
}
?>
