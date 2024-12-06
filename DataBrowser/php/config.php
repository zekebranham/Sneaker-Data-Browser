<?php
$servername = "localhost"; 
$username = "MarlonBranham"; 
$password = "csci130"; 
$dbname = "sneakers_db"; 

try {
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        echo json_encode(["status" => "error", "message" => "Database connection failed."]);
        exit;
    }
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
