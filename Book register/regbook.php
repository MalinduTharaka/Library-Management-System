<?php
// Establish database connection
$connection = mysqli_connect('localhost', 'root', '', 'database');

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $bookId = mysqli_real_escape_string($connection, $_POST['bookId']);
    $bookName = mysqli_real_escape_string($connection, $_POST['bookName']);
    $bookCategory = mysqli_real_escape_string($connection, $_POST['bookCategory']);

    // Insert data into the database
    $query = "INSERT INTO book (book_id, book_name, category_id) VALUES ('$bookId', '$bookName', '$bookCategory')";

    if (mysqli_query($connection, $query)) {
        echo "Book registration successful!";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
    }
}

// Close the database connection
mysqli_close($connection);
?>
