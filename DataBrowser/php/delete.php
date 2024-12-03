<?php
header('Content-Type: application/json'); // Ensure the response is JSON

$host = "localhost";
$username = "root";
$password = "";
$database = "sneakers_db";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Database connection failed."]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $model = isset($_POST['model']) ? $conn->real_escape_string($_POST['model']) : '';
    $colorway = isset($_POST['colorway']) ? $conn->real_escape_string($_POST['colorway']) : '';

    if (empty($model) || empty($colorway)) {
        echo json_encode(["status" => "error", "message" => "Model and colorway are required."]);
        exit;
    }

    $sql = "DELETE FROM sneakers WHERE model = '$model' AND colorway = '$colorway'";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => "success", "message" => "Sneaker deleted successfully!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error deleting sneaker: " . $conn->error]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}

$conn->close();
?>
