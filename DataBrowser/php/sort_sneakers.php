<?php
// Database connection settings
$host = "localhost";
$username = "root";
$password = "";
$database = "sneakers_db";

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Determine the sorting criterion
$sort_by = isset($_GET['sort_by']) ? $_GET['sort_by'] : 'price'; // Default to sorting by price

// Map the sorting criterion to a database column
$valid_sorts = ['price', 'model', 'new_release'];
if (!in_array($sort_by, $valid_sorts)) {
    die("Invalid sort criterion.");
}

// Fetch and sort sneakers
$sql = "SELECT * FROM sneakers ORDER BY $sort_by ASC"; // Sort in ascending order
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorted Sneakers</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        table th {
            background-color: #f4f4f4;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>

<h1>Sorted Sneakers</h1>
<p>Sorting by: <?php echo htmlspecialchars($sort_by); ?></p>
<table>
    <thead>
        <tr>
            <th>Make</th>
            <th>Model</th>
            <th>Colorway</th>
            <th>Price</th>
            <th>New Release</th>
            <th>Picture</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['make']) . "</td>";
                echo "<td>" . htmlspecialchars($row['model']) . "</td>";
                echo "<td>" . htmlspecialchars($row['colorway']) . "</td>";
                echo "<td>$" . number_format($row['price'], 2) . "</td>";
                echo "<td>" . ($row['new_release'] ? "Yes" : "No") . "</td>";
                echo "<td><img src='" . htmlspecialchars($row['picture']) . "' alt='" . htmlspecialchars($row['model']) . "' style='width: 50px;'></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No sneakers found.</td></tr>";
        }
        ?>
    </tbody>
</table>

<a href="../sneakerObjects.html">Back to Home</a>

</body>
</html>
