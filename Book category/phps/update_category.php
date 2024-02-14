<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish database connection
    $connection = mysqli_connect('localhost', 'root', '', 'database');

    // Check connection
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve form data
    $category_id = mysqli_real_escape_string($connection, $_POST['category_id']);
    $category_name = mysqli_real_escape_string($connection, $_POST['category_name']);
    $date_modified = mysqli_real_escape_string($connection, $_POST['date_modified']);

    // Update query
    $update_query = "UPDATE bookcategory SET category_Name='$category_name', date_modified='$date_modified' WHERE category_id='$category_id'";

    // Perform the update
    if (mysqli_query($connection, $update_query)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    }

    // Close connection
    mysqli_close($connection);
}
?>
