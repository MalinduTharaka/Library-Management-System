<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/nav.css">

  <script src="js/nav.js"></script>

</head>
<body style="background-image: url('img/library-bg.jpg'); background-size: cover;">

<?php
    include_once 'includes/header.php';
?>
<div class="container">
  <h2>Library Management System</h2>
  <h5>Welcome to our online library—an expansive digital hub for knowledge seekers. Dive into a realm where books merge with technology, offering a seamless journey through the vast landscapes of literature and information.</h5>

</div>

<div class="container2">
  <ul type="none">
    <li><a href="..\Assignment2\index.php"><button type="button" class="btn btn-lg mb-1" id="b1">Book Registation</button></a></li>
    <li><a href="..\Borrow\index.php"><button type="button" class="btn btn-lg mb-1" id="b2">Book Barrow</button></li>
    <li><a href="..\Book category\new.php"><button type="button" class="btn btn-lg mb-1" id="b3">Book Catogorize</button></li>
    <li><a href="..\Member registration\user_registration_index.php"><button type="button" class="btn btn-lg mb-1" id="b4">Member Register</button></li>  
  </ul>
</div>
</body>
</html>
