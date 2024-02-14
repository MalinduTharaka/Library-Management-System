<?php
// Establish database connection
$connection = mysqli_connect('localhost', 'root', '', 'database');

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get book_id from form
    $book_id = $_POST['bookid'];

    // Prepare DELETE query
    $sql = "DELETE FROM book WHERE book_id = '$book_id'";

    // Execute query
    if (mysqli_query($connection, $sql)) {
        echo "Book deleted successfully";
    } else {
        echo "Error deleting book: " . mysqli_error($connection);
    }
}

// Close database connection
mysqli_close($connection);
?>
