<?php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Establish database connection
    $connection = mysqli_connect('localhost', 'root', '', 'database');

    // Check connection
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Fetch data from the form
    $borrowid = mysqli_real_escape_string($connection, $_POST['borrowid']);
    $bookid = mysqli_real_escape_string($connection, $_POST['bookID']);
    $memberid = mysqli_real_escape_string($connection, $_POST['Memberid']);
    $borrowstatus = mysqli_real_escape_string($connection, $_POST['Borrowstatus']);

    // Get the current date and time with AM/PM format
    $borrower_date_modified = date("Y-m-d h:i:s A");

    // Insert data into the bookborrower table
    $query = "INSERT INTO bookborrower (borrow_id, book_id, member_id, borrow_status, borrower_date_modified)
              VALUES ('$borrowid', '$bookid', '$memberid', '$borrowstatus', '$borrower_date_modified')";

    if (mysqli_query($connection, $query)) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
    }

    // Close the database connection
    mysqli_close($connection);
}

?>
