<?php
//This file is the child of fetch_dataJSON-DB.php
//Now, everything is read from MySQL rather than JSON

require 'config.php'; // Include the configuration file

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
