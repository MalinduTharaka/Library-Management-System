<?php
// Database connection
$connection = mysqli_connect('localhost', 'root', '', 'database');

// Check the connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize input data to prevent SQL injection
    $update_member_id = mysqli_real_escape_string($connection, $_POST['update_member_id']);
    $update_fields = [];

    // Check and update first name if provided
    if (isset($_POST['update_firstname'])) {
        $update_fields[] = "first_name = '" . mysqli_real_escape_string($connection, $_POST['update_firstname']) . "'";
    }

    // Check and update last name if provided
    if (isset($_POST['update_lastname'])) {
        $update_fields[] = "last_name = '" . mysqli_real_escape_string($connection, $_POST['update_lastname']) . "'";
    }

    // Check and update birthday if provided
    if (isset($_POST['update_birthday'])) {
        $update_fields[] = "birthday = '" . mysqli_real_escape_string($connection, $_POST['update_birthday']) . "'";
    }

    // Check and update email if provided
    if (isset($_POST['update_email'])) {
        $update_fields[] = "email = '" . mysqli_real_escape_string($connection, $_POST['update_email']) . "'";
    }

    // Construct the update query
    if (!empty($update_fields)) {
        $update_query = "UPDATE member SET " . implode(', ', $update_fields) . " WHERE member_id = '$update_member_id'";

        // Execute the query
        if (mysqli_query($connection, $update_query)) {
            // Redirect to another page
            header("Location: ../rec_update_success.php");
            exit();
        } else {
            echo "Error updating member details: " . mysqli_error($connection);
        }
    } else {
        echo "No fields to update.";
    }
}

// Close the database connection
mysqli_close($connection);
?>
