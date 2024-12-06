<?php
include 'Sneakers.php';
//OLD method, for inserting into the JSON file directly

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $newSneaker = [
//         "make" => $_POST['make'],
//         "model" => $_POST['model'],
//         "colorway" => $_POST['colorway'],
//         "price" => (float) $_POST['price'],
//         "newRelease" => filter_var($_POST['newRelease'], FILTER_VALIDATE_BOOLEAN),
//         "picture" => $_POST['picture']
//     ];

//     Sneaker::insert($newSneaker);
//     echo "Sneaker inserted successfully!";
// }

//New method, updated the MySQL database directly

require 'config.php'; // Include the configuration file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data from the form
    $make = $conn->real_escape_string($_POST['make']);
    $model = $conn->real_escape_string($_POST['model']);
    $colorway = $conn->real_escape_string($_POST['colorway']);
    $price = (float) $_POST['price'];
    $new_release = $_POST['newRelease'] === "true" ? 1 : 0; // Convert boolean to tinyint
    $picture = $conn->real_escape_string($_POST['picture']);

    // Insert the new sneaker into the database
    $sql = "INSERT INTO sneakers (make, model, colorway, price, new_release, picture)
            VALUES ('$make', '$model', '$colorway', $price, $new_release, '$picture')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => "success", "message" => "Sneaker inserted successfully!"]);
    } else {
        echo json_encode(["status" => "error", "message" => $conn->error]);
    }
}

$conn->close();
?>

