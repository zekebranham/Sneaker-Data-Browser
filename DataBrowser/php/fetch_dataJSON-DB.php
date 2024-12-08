<?php
//Preliminary step, NOT NEEDED anymnore. Was just means to feed JSON data to the MySQL database
// Database connection settings
require 'config.php'; // Include the configuration file 

$jsonFile = './mycollection.json'; // Path to your JSON file
$jsonData = json_decode(file_get_contents($jsonFile), true);

//Insert JSON data into the database
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

$conn->close();

echo "Data successfully imported into the database.";
?>