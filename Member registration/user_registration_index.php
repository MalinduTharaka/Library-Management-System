<?php

// Establish a connection to the database
$connection = mysqli_connect('localhost', 'root', '', 'database');

// Check the connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to get the last member's member_id from the 'member' table
$query = "SELECT member_id FROM member ORDER BY member_id DESC LIMIT 1";
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
    $lastMemberID = $row['member_id'];
} else {
    // Handle the case where the query fails
    $lastMemberID = "Error fetching member ID";
}

?> <!-- show las member ID -->

<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors"/>
    <meta name="generator" content="Hugo 0.118.2" />
    <title>Member Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3"/>
    
   
    <style> /* For backgroun and form */
     
     body {
      background-image: url('bg3.jpeg');
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

      h3{
        background-color:#427D9D ;
        font-size: 24px;
        text-align: center;
        height: 40px;
        border-radius: 5px;
        color:white;
        font-weight: bold;
        margin-top: 5px;
      }
      h5{
        background-color:#427D9D ;
        text-align: center;
        height: 30px;
        border-radius: 5px;
        color: #fff;
        font-weight: bold;
        margin-top: 5px;
      }
      #divForm {
        padding-top: 100px;
      }
      form {
        max-width: 300px;
        margin: auto;
      }
      #f1,#f3,#f4 {
            max-width: 400px;
            margin: 20px auto;
            padding: 10px;
            background-color: #DDF2FD;
            border-radius: 8px;
        }
      #f2{
        max-width: 400px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }
      #f1{
        padding-top: 30px;
        height:450px;
      }
      #f3,#f4{
        padding: 5px;
      }

      label {
        display: inline-block;
        width: 100px;
        text-align: left;
        margin-bottom: 10px;
      }

      input {
        width: 180px;
        padding: 5px;
        box-sizing: border-box;
        margin-bottom: 10px;
      }

      button {
        display: block;
        width: 100%;
        padding: 10px;
        background-color: #9BBCE8;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
      }
      #b3,#b4{
        display: block;
        width: 50%;
        padding: 10px;
        background-color: #9BBCE8;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 5px;

      }
      #pf{
        color: #fff;
      }
      #p1,#p2{
        background-color: #427D9D;
        color : #FFF;
        border-radius: 5px;
      }
      input{
        padding: 6px;
        margin-bottom: 5px;
        border-radius: 2px;
      }


    </style>
  </head>
  <?php include_once '..\login\includes\header.php'; ?>
  <body class="bg-body-tertiary">
    
    <div class="row mb-12">
    </div>

    <div id="divForm" class="row mb-3 text-center">  <!-- User registration form -->
      <div class="col-md-6 themed-grid-col">

      <form action="php\insert_member.php" id="f1" method="post">
          <h3>Member Registration</h3><br>
          <div class="row">
                <div class="col-md-6">
                    <p id="p1">Last Member ID:</p>
                </div>
                <div class="col-md-4">
                    <p id="p2"><?php echo htmlspecialchars($lastMemberID); ?></p>
                </div>
                <div class="col-md-2"></div>
          </div> 

          <label for="firstname">Member ID: </label>
          <input id="mid" type="text" name="member_id" required />
          <br />
          
          <label for="firstname">First name: </label>
          <input type="text" name="firstname" required />
          <br />

          <label for="lastname">Last name: </label>
          <input type="text" name="lastname" required />
          <br />

          <label for="birthday">Birthday:</label>
          <input type="date" id="birthday" name="birthday" required />
          <br />

          <label for="email">email: </label>
          <input type="email" name="email" required />
          <br />

          <br>
          <button id="b1" type='submit'>Register</button>
          <script>
    document.getElementById("f1").addEventListener("submit", function (event) {
        var memberIdInput = document.getElementById("mid");
        var memberIdValue = memberIdInput.value.trim();

        // Regular expression to match the required format (M followed by 3 digits)
        var memberIdRegex = /^M\d{3}$/;

        if (!memberIdRegex.test(memberIdValue)) {
            alert("Please enter a valid Member ID in M<000> format");
            event.preventDefault(); // Prevent form submission
        }
    });
</script>

        </form>
      </div>  <!-- user registration form end -->

      <div class="col-md-6 themed-grid-col">
        <br>
        <form action="update_mem_details.php" id="f2"><button id="b2" type="submit">Update Member Details</button><br></form><br><br><!-- include nmember detail update button -->

        <form action="php\delete.php"  method="post" id="f3"><!-- Delete Member Details -->
        <h5>Delete Member Details</h5>
        <label for="firstname">Member ID: </label>
          <input type="text" name="firstname" required />
          <br />
          <button type="submit" id="b3">Delete</button>
        </form><br><br>

        <form action="view.php" id="f4" method="post"><!-- View Member Details -->
        <h5>View Member Details</h5>
          <button type="submit" id="b4">View</button>
        </form>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>
