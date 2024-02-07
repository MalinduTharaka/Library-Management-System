<?php
// Establish database connection
$connection = mysqli_connect('localhost', 'root', '', 'database');

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get category ID from the form
    $delete_category_id = mysqli_real_escape_string($connection, $_POST['delete_category_id']);

    // Disable foreign key checks temporarily
    mysqli_query($connection, "SET foreign_key_checks = 0");

    // Prepare the SQL statement to delete the record
    $sql = "DELETE FROM bookcategory WHERE category_id = '$delete_category_id'";

    // Execute the SQL statement
    if (mysqli_query($connection, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($connection);
    }

    // Re-enable foreign key checks
    mysqli_query($connection, "SET foreign_key_checks = 1");
}

// Close the database connection
mysqli_close($connection);
?>
