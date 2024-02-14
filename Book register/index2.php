<?php
$connection = mysqli_connect('localhost','root','','database');
$table = "<div class='container'><div><table class='table'>";
$table .= "<tr><th>Bookr ID</th><th>Book Name</th><th>Category Id</th></tr>";

  $query = "SELECT * FROM book";
  $record = mysqli_query ($connection,$query);
  if ($record) {
      if (mysqli_num_rows($record) > 0) {
          // Fetch all rows and display them
          while ($row = mysqli_fetch_assoc($record)) {
              $table .= "<tr><td>" . $row['book_id'] . "</td><td>" . $row['book_name'] . "</td><td>" . $row['category_id'] ."</td></tr>";
          }

          $table .= "</table></div></div>";
      } else {
          $table = "No records found";
      }
  } else {
      $table = "Query failed: " . mysqli_error($connection);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors"/>
    <meta name="generator" content="Hugo 0.118.2" />
    <title>View Member</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/checkout/"/>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3" />

    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet"/>

    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="nav\navStyle.css" />

    <style>
        body {
      background-image: url('im.jpg');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;

        }

        body::before {
          content: "";
          position: absolute;
          top: 0;
          right: 0;
          bottom: 0;
          left: 0;
          z-index: -1;
        }
        body, table {
        margin: 50px;
        padding: 0;
        font-family: Arial, sans-serif;
      }

      /* Style the table */
      table {
          width: 100%;
          border-collapse: collapse;
          margin: 20px 0;
          box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
          margin-top: 200px;
        }

      th, td {
        padding: 15px;
        text-align: left;
        border-bottom: 2px solid #ddd;
      }

      th {
        background-color: white;
      }
      td {
        background-color: white;
      }

      tr:nth-child(even) {
        background-color: #f9f9f9;
      }

      tr:hover {
        background-color: #e0e0e0;
      }
    </style>
    <title>Member Details</title>
</head>
<body>
<?php include_once '..\login\includes\header.php'; ?>
<?php

  echo $table; 
  
  ?>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>