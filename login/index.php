<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body style="background-image: url('img/loginpic.jpg'); background-size: cover;">
    <div class="d-flex justify-content-center align-items-center vh-100">
        
        <form class="shadow w-450 p-3" action="php/signup.php" method="POST">

            <h4 class="display-4 fs-1">Create Account</h4><br>
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
            <label class="form-label">User ID</label>
            <input type="text" 
                   class="form-control"
                   name="user_id"
                   value="<?php echo (isset($_GET['user_id'])) ? htmlspecialchars($_GET['user_id']) : ""; ?>">
          </div>

          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" 
                   class="form-control"
                   name="email"
                   value="<?php echo (isset($_GET['email'])) ? htmlspecialchars($_GET['email']) : ""; ?>">
          </div>

          <div class="mb-3">
            <label class="form-label">First Name</label>
            <input type="text" 
                   class="form-control"
                   name="first_name"
                   value="<?php echo (isset($_GET['first_name'])) ? htmlspecialchars($_GET['first_name']) : ""; ?>">
          </div>
          <div class="mb-3">
            <label class="form-label">Last Name</label>
            <input type="text" 
                   class="form-control"
                   name="last_name"
                   value="<?php echo (isset($_GET['last_name'])) ? htmlspecialchars($_GET['last_name']) : ""; ?>">
          </div>

          <div class="mb-3">
            <label class="form-label">User name</label>
            <input type="text" 
                   class="form-control"
                   name="uname"
                   value="<?php echo (isset($_GET['uname'])) ? htmlspecialchars($_GET['uname']) : ""; ?>">
          </div>

          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" 
                   class="form-control"
                   name="pass">
          </div>
          <ul type="none">
            <li><button type="submit" class="btn btn-primary">Sign Up</button></li>
            <li><label>You have a account : </label><a href="login.php" class="link-secondary">Login</a></li>
          </ul>
        </form>
    </div>
</body>
</html>
