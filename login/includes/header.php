
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="css/nav.css">

  <script src="js/nav.js"></script>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <label class="navbar-brand">LMS</label>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="..\login\home.php">Home</a></li>
      <li><a href="..\Assignment2\index.php">Book Register</a></li>
      <li><a href="..\Borrow\index.php">Book Barrow</a></li>
      <li><a href="..\Book category\new.php">Catogorize</a></li>
      <li><a href="..\Member registration\user_registration_index.php">Member Register</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="..\login\panel_data.php"><span class="glyphicon glyphicon-sunglasses"></span> Admin panel</a></li>
      <li><a href="..\login\edit.php"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
      <li><a href="..\index.php" onclick="confirmLogout()"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
