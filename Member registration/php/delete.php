<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the member ID from the form
    $memberIDToDelete = $_POST["firstname"];

    // Establish a connection to the database
    $connection = mysqli_connect('localhost', 'root', '', 'database');

    // Check the connection
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare the DELETE query
    $query = "DELETE FROM member WHERE member_id = ?";

    // Use prepared statement to prevent SQL injection
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "s", $memberIDToDelete);

    // Execute the query
    if (mysqli_stmt_execute($stmt)) {

        header("Location: ../delete_success.php");
        exit();
    } else {
        // Error deleting member
        echo "Error deleting member: " . mysqli_error($connection);
    }

    // Close the prepared statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($connection);
}
?>
