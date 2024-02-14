<?php
$connection = mysqli_connect('localhost', 'root', '', 'database');

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['delete_btn'])) {
    $borrowid = mysqli_real_escape_string($connection, $_POST['borrowid']);

    // Perform the deletion query
    $sql = "DELETE FROM bookborrower WHERE borrow_id = '$borrowid'";

    if (mysqli_query($connection, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($connection);
    }
}

mysqli_close($connection);
?>
