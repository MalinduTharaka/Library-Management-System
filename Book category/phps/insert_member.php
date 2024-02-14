<?php
$connection = mysqli_connect('localhost', 'root', '', 'database');

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function to sanitize input
function sanitizeInput($input) {
    return htmlspecialchars(trim($input));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the entered category_id
    $category_id = sanitizeInput($_POST["category_id"]);

    // Check if category_id already exists
    $checkQuery = "SELECT * FROM bookcategory WHERE category_id = '$category_id'";
    $result = mysqli_query($connection, $checkQuery);

    if (mysqli_num_rows($result) > 0) {
        // If category_id already exists, show error message
        echo '<p>Error: Category ID already exists. Please choose a different one.</p>';
    } else {
        // Continue with the registration process

        // Get other form data
        $category_name = sanitizeInput($_POST["category_name"]);
        $date_modified = sanitizeInput($_POST["date_modified"]);

        // Your insert query here
        $insertQuery = "INSERT INTO bookcategory (category_id, category_Name, date_modified) VALUES ('$category_id', '$category_name', '$date_modified')";

        if (mysqli_query($connection, $insertQuery)) {
            echo '<p>Category registered successfully.</p>';
        } else {
            echo '<p>Error: ' . mysqli_error($connection) . '</p>';
        }
    }

    // Close the connection
    mysqli_close($connection);
}
?>
