<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish database connection
    $connection = mysqli_connect('localhost', 'root', '', 'database');

    // Check if the connection is successful
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve form data
    $borrowId = mysqli_real_escape_string($connection, $_POST['borrowid']);
    $bookId = mysqli_real_escape_string($connection, $_POST['Bookid']);
    $memberId = mysqli_real_escape_string($connection, $_POST['Memberid']);
    $borrowStatus = mysqli_real_escape_string($connection, $_POST['Borrowstatus']);

    // Check if the book_id exists in the book table
    $checkQuery = "SELECT * FROM book WHERE book_id = '$bookId'";
    $checkResult = mysqli_query($connection, $checkQuery);

    if (mysqli_num_rows($checkResult) == 0) {
        // Handle the case where the book_id does not exist in the book table
        echo "Error: Book with ID $bookId does not exist.";
    } else {
        // Prepare and execute the SQL query to update the row
        $query = "UPDATE bookborrower SET 
                  book_id = '$bookId', 
                  member_id = '$memberId', 
                  borrow_status = '$borrowStatus', 
                  borrower_date_modified = NOW() 
                  WHERE borrow_id = '$borrowId'";

        $result = mysqli_query($connection, $query);

        // Check if the update was successful
        if ($result) {
            echo "Record updated successfully";
        } else {
            // Handle the case where the update failed
            echo "Error updating record: " . mysqli_error($connection);
        }
    }

    // Close the database connection
    mysqli_close($connection);
}
?>
