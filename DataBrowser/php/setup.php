<?php
    $servername = "localhost"; 
    $username = "MarlonBranham"; 
    $password = "csci130"; 
    // Check if the database already exists
    $dbname = "sneakers_db";
    
    $sql = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$dbname'";
    $result = $conn->query($sql);

    // If the database doesn't exist, create it
    if (!($result && $result->num_rows > 0)) {
        // Create the database
        $sql = "CREATE DATABASE $dbname";
        if ($conn->query($sql) === TRUE) {
            echo "Database created successfully.<br>";
        } else {
            die("Error creating database: " . $conn->error);
        }

        // Select the newly created database
        $conn->select_db($dbname);

        // Create the Sneakers table
        $sql = "CREATE TABLE Sneakers (
            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            make VARCHAR(100) NOT NULL,
            model VARCHAR(100) NOT NULL,
            colorway VARCHAR(100) NOT NULL,
            price FLOAT NOT NULL,
            new_release tinyint NOT NULL,
            picture VARCHAR(255) NOT NULL
        )";

        if ($conn->query($sql) === TRUE) {
            echo "Table Sneakers created successfully.<br>";
        } else {
            die("Error creating table: " . $conn->error);
        }

        // Insert initial records
        $sql = "INSERT INTO sneakers (make, model, colorway, price, new_release, picture) VALUES 
                ('Nike', 'Air Max 90', 'Infrared', 120.00, 0, 'https://image.goat.com/transform/v1/attachments/product_template_pictures/images/099/906/876/original/695234_00.png.png?action=crop&width=300'),
                ('Adidas', 'Ultraboost 4.0', 'Core Black', 180.00, 0, 'https://image.goat.com/transform/v1/attachments/product_template_pictures/images/078/445/202/original/260085_00.png.png?action=crop&width=300'),
                ('Jordan', 'Air Jordan 1 Retro High OG BG', 'Bred Toe', 233.00, 0, 'https://image.goat.com/transform/v1/attachments/product_template_pictures/images/078/447/718/original/316403_00.png.png?action=crop&width=300'),
                ('Puma', 'Suede Classic 21', 'Chocolate Chip', 70.00, 1, 'https://image.goat.com/transform/v1/attachments/product_template_pictures/images/093/920/949/original/374915_87.png.png?action=crop&width=300'),
                ('Converse', 'Wmns Chuck Taylor All Star Madison Low', 'Pink Sage', 50.00, 1, 'https://image.goat.com/transform/v1/attachments/product_template_pictures/images/097/994/331/original/A06135F.png.png?action=crop&width=300')";

        if ($conn->query($sql) === TRUE) {
            echo "Initial records inserted successfully.<br>";
        } else {
            die("Error inserting records: " . $conn->error);
        }
    } else {
        // Select the existing database
        $conn->select_db($dbname);
        echo "Database already exists. Selected $dbname.<br>";
    }

    // Close the connection
    $conn->close();
?>
