<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Validate and sanitize input
    $bookId = $_POST["bookId"];
    $bookName = $_POST["bookName"];
    $bookCategory = $_POST["bookCategory"];

    // Establish database connection
    $connection = mysqli_connect('localhost', 'root', '', 'database');

    // Check connection
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Update the book in the database
    $sql = "UPDATE book SET book_name = '$bookName', category_id = '$bookCategory' WHERE book_id = '$bookId'";

    if (mysqli_query($connection, $sql)) {
        echo "Book updated successfully!";
    } else {
        echo "Error updating book: " . mysqli_error($connection);
    }

    // Close database connection
    mysqli_close($connection);
}
?>
