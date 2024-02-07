<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Category Registration</title>

  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <link href="style.css" rel="stylesheet" />
  <script src="script.js"></script>
</head>
<body>
  <div class="container">
    <div class="row mb-12">
    <?php
            session_start();

            // Check if there is a message set
            if (isset($_SESSION['message'])) {
                $message = $_SESSION['message'];
                $message_type = $_SESSION['message_type'];

                // Display the message with appropriate styling
                echo '<p style=" color: ' . ($message_type === 'success' ? 'green' : 'red') . ';">' . $message . '</p>';

                // Clear the session variables to avoid displaying the same message again
                unset($_SESSION['message']);
                unset($_SESSION['message_type']);
            }
          ?>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
