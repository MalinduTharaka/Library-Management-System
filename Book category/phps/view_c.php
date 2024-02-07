<?php
// view_c.php

// Assuming your database connection code is here
$connection = mysqli_connect('localhost', 'root', '', 'database');

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch data from the bookcategory table
$query = "SELECT * FROM bookcategory";
$result = mysqli_query($connection, $query);

// Check if the query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($connection));
}

// Store the HTML table code in a variable
$table = "<table>
        <tr>
            <th>category_id</th>
            <th>category_Name</th>
            <th>date_modified</th>
        </tr>";

while ($row = mysqli_fetch_assoc($result)) {
    $table .= "<tr>
                <td>{$row['category_id']}</td>
                <td>{$row['category_Name']}</td>
                <td>{$row['date_modified']}</td>
              </tr>";
}

$table .= "</table>";

// Close the database connection
mysqli_close($connection);

// Echo the table separately

?>

<!DOCTYPE html>
<html lang="en">
    <style>
        body {
        font-family: Arial, sans-serif;
        margin: 300px;
        padding: 0px;
        background-color: #f0f0f0; /* Set a background color */
        color: #333; /* Set the default text color */
        background-image: url('../library.jpg'); /* Replace 'your-background-image.jpg' with the actual file path or URL of your background image */
        background-size: cover; /* You can use 'contain' or other values based on your preference */
        background-position: center;
        background-repeat: no-repeat;
            /* Add more styling if needed */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        
        /* Style the table header */
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid black;
        }
        
        /* Add some styling to alternate rows for better readability */
        tr:nth-child(even) {
            background-color: #ffffff;
        }
        
        /* Style the header row separately for a different background color */
        th {
            background-color: #ffffff;
            color: black;
        }
        
        /* Apply hover effect on rows for better interactivity */
        tr:hover {
            background-color: #e5e5e5;
        }
        td {
            background-color: #e5e5e5;
        }
        
    </style>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Categories</title>

  <link href="css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
  <?php echo $table; ?>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
