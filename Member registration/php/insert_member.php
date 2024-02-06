<?php

// Establish a connection to the database
$connection = mysqli_connect('localhost', 'root', '', 'database');

// Check the connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $memberID = mysqli_real_escape_string($connection, $_POST['member_id']);
    $firstName = mysqli_real_escape_string($connection, $_POST['firstname']);
    $lastName = mysqli_real_escape_string($connection, $_POST['lastname']);
    $birthday = mysqli_real_escape_string($connection, $_POST['birthday']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);

    // Check if member_id already exists
    $checkQuery = "SELECT member_id FROM member WHERE member_id = '$memberID'";
    $checkResult = mysqli_query($connection, $checkQuery);

    if ($checkResult) {
        if (mysqli_num_rows($checkResult) > 0) {
            // Member_id already exists, show an error message
            header("Location: ../already_have.php");
        exit();
        } else {
            // Insert data into the 'member' table
            $insertQuery = "INSERT INTO member (member_id, first_name, last_name, birthday, email) VALUES ('$memberID', '$firstName', '$lastName', '$birthday', '$email')";

            if (mysqli_query($connection, $insertQuery)) {
                // Insertion successful
                $lastMemberID = $memberID;

                // Show a success message
                header("Location: ../reg_successful.php");
        exit();
            } else {
                // Handle the case where the insertion fails
                $lastMemberID = "Error inserting member";
            }
        }
    } else {
        // Handle the case where the check query fails
        $lastMemberID = "Error checking member ID";
    }
}

// Close the database connection
mysqli_close($connection);

// Rest of your code (if any)
// ...

?>
