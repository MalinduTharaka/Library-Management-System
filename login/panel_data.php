<?php
session_start();
include "db_conn.php";
include 'php/User.php';

// Assuming you have a session variable named user_id set when the user logs in
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    try {
        $stmt = $conn->prepare("SELECT * FROM user WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    include_once 'includes/header.php';
} else {
    // Redirect to login page or handle unauthorized access
    header("Location: login.php");
    exit();
}
?>
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

<h2 style="padding: 20px;">Database Information</h2>

    
    <?php if($results): ?>
        <div class="container3" style="padding: 20px; ">
            <table class="table table-dark table-hover" style="width: 50%; background: white; margin-left: auto; margin-right: auto ">
                <tr><th>User ID</th><th>First name</th><th>Last name</th><th>Email</th></tr>
                <?php foreach ($results as $row): ?>
                    <tr>
                        <td><?= $row['user_id'] ?></td>
                        <td><?= $row['first_name'] ?></td>
                        <td><?= $row['last_name'] ?></td>
                        <td><?= $row['email'] ?></td>

                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    <?php else: ?>
        <p>No user data found.</p>
    <?php endif; ?>
</body>
</html>
