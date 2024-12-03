<?php
//This file is the child of fetch_dataJSON-DB.php
//Now, everything is read from MySQL rather than JSON

// Database connection settings
$host = "localhost";
$username = "root";
$password = "";
$database = "sneakers_db";

// Connect to the database
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all sneakers from the database
$sql = "SELECT * FROM sneakers";
$result = $conn->query($sql);

$sneakers = [];
if ($result->num_rows > 0) {
    // Fetch each row and add to the array
    while ($row = $result->fetch_assoc()) {
        $sneakers[] = [
            "id" => $row["id"], // Include ID
            "make" => $row["make"],
            "model" => $row["model"],
            "colorway" => $row["colorway"],
            "price" => (float) $row["price"],
            "newRelease" => (bool) $row["new_release"],
            "picture" => $row["picture"]
        ];
    }
}

// Close the connection
$conn->close();

// Output sneakers as JSON
header('Content-Type: application/json');
echo json_encode($sneakers, JSON_PRETTY_PRINT);
?>
