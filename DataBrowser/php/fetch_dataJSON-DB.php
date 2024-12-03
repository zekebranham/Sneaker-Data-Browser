<?php
//Preliminary step, NOT NEEDED anymnore. Was just means to feed JSON data to the MySQL database
// Database connection settings
$host = "localhost"; // Hostname (use "localhost" for local development)
$username = "root";  // Default username for XAMPP
$password = "";      // Default password for XAMPP
$database = "sneakers_db"; // Name of the database

// Step 1: Connect to the database
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Parse the JSON file
$jsonFile = './mycollection.json'; // Path to your JSON file
$jsonData = json_decode(file_get_contents($jsonFile), true);

// Step 3: Insert JSON data into the database
foreach ($jsonData as $sneaker) {
    $make = $conn->real_escape_string($sneaker['make']);
    $model = $conn->real_escape_string($sneaker['model']);
    $colorway = $conn->real_escape_string($sneaker['colorway']);
    $price = (float) $sneaker['price'];
    $new_release = $sneaker['newRelease'] ? 1 : 0; // Convert boolean to tinyint
    $picture = $conn->real_escape_string($sneaker['picture']);

    // Insert the sneaker into the database
    $sql = "INSERT INTO sneakers (make, model, colorway, price, new_release, picture)
            VALUES ('$make', '$model', '$colorway', $price, $new_release, '$picture')";

    if ($conn->query($sql) !== TRUE) {
        echo "Error inserting record: " . $conn->error . "<br>";
    }
}

// Close the connection
$conn->close();

echo "Data successfully imported into the database.";
?>