<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body style="background-image: url('img/loginpic.jpg'); background-size: cover;">
    <div class="container01 d-flex justify-content-center align-items-center vh-100">
        
        <form class="shadow w-450 p-3" action="php/edit_process.php" method="POST">
            <h4 class="display-4 fs-1">Edit Profile</h4><br>
            <?php if(isset($_GET['error'])){ ?>
            <div class="alert alert-danger" role="alert">
              <?php echo htmlspecialchars($_GET['error']); ?>
            </div>
            <?php } ?>

            <?php if(isset($_GET['success'])){ ?>
            <div class="alert alert-success" role="alert">
              <?php echo htmlspecialchars($_GET['success']); ?>
            </div>
            <?php } ?>
            <div class="mb-3">
              <label class="form-label">First Name</label>
              <input type="text" 
                     class="form-control"
                     name="first_name"
                     value="<?php echo (isset($_SESSION['first_name'])) ? htmlspecialchars($_SESSION['first_name']) : ""; ?>">
            </div>
            <div class="mb-3">
              <label class="form-label">Last Name</label>
              <input type="text" 
                     class="form-control"
                     name="last_name"
                     value="<?php echo (isset($_SESSION['last_name'])) ? htmlspecialchars($_SESSION['last_name']) : ""; ?>">
            </div>

            <div class="mb-3">
              <label class="form-label">User Name</label>
              <input type="text" 
                     class="form-control"
                     name="username"
                     value="<?php echo (isset($_SESSION['username'])) ? htmlspecialchars($_SESSION['username']) : ""; ?>">
            </div>

            <div class="mb-3">
              <label class="form-label">New Password</label>
              <input type="password" 
                     class="form-control"
                     name="new_password">
            </div>
            <ul class="list-unstyled d-flex justify-content-between">
              <li>
                <button type="submit" class="btn btn-success">Save Changes</button>
              </li>
              <li>
                <button type="button" class="btn btn-outline-primary" onclick="goToMenu()">Back to Menu</button>
              </li>
            </ul>
          </form>
    </div>

    <script>
      function goToMenu() {
        window.location.href = "home.php";
      }
    </script>
</body>
</html>
