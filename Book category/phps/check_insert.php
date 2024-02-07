<?php

// Establish a connection to the database
$connection = mysqli_connect('localhost', 'root', '', 'database');

// Check the connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to get the last member's member_id from the 'member' table
$query = "SELECT category_id FROM bookcategory ORDER BY category_id DESC LIMIT 1";
$result = mysqli_query($connection, $query);

// Check if the query was successful
if ($result) {
    // Fetch the result as an associative array
    $row = mysqli_fetch_assoc($result);

    // Close the result set
    mysqli_free_result($result);

    // Close the database connection
    mysqli_close($connection);

    // Extract the member_id from the associative array
    $lastMemberID = $row['category_id'];
} else {
    // Handle the case where the query fails
    $lastMemberID = "Error fetching member ID";
}

?> <!-- show las member ID -->