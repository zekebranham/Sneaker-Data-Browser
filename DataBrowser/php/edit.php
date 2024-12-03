<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "sneakers_db";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $make = $conn->real_escape_string($_POST['make']);
    $model = $conn->real_escape_string($_POST['model']);
    $colorway = $conn->real_escape_string($_POST['colorway']);
    $price = floatval($_POST['price']);
    $newRelease = $_POST['newRelease'] === "true" ? 1 : 0;

    $sql = "UPDATE sneakers SET 
            make='$make', 
            model='$model', 
            colorway='$colorway', 
            price=$price, 
            new_release=$newRelease 
            WHERE id=$id";
    file_put_contents('debug.log', "Received ID: $id\n", FILE_APPEND);

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => "success", "message" => "Sneaker updated successfully!"]);
    } else {
        file_put_contents('debug.log', "Query Error: " . $conn->error . "\n", FILE_APPEND);
        echo json_encode(["status" => "error", "message" => $conn->error]);
    }
}

$conn->close();
?>
