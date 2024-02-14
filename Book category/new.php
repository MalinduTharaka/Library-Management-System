<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Category Registration</title>

  <link href="mstyle.css" rel="stylesheet" />
  <script src="script.js"></script>
</head>
<body>
  <?php
    include_once '..\login\includes\header.php';
  ?>
  <div class="container">
    <div class="row mb-12">
      <div class="col-md-7 mx-auto align-items-center">
        <!-- Category Registration Form -->
        <form action="phps\insert_member.php" id="register" method="post" class="styled-form">
          <h3 style="color:white">Category Registration</h3><br>
          <?php include('phps\check_insert.php'); ?>
          

          <p id="p2">Last Category ID: <?php echo htmlspecialchars($lastMemberID); ?></p>
          <label for="category_id">Category ID: </label>
          <input type="text" name="category_id" required /><br/>

          <label for="category_name">Category name: </label>
          <input type="text" name="category_name" required /><br/>

          <label for="date_modified">Date modified: </label>
          <input type="text" id="date_modified" name="date_modified" required /><br/><br/>
          
          <button type="submit" class="submit-button">Register</button><br/>

          
        </form>
       
      </div>

      <div class="col-md-5 mx-auto align-items-center">
        <!-- Delete Record Form -->
        <form action="phps\delete_category.php" id="delete_category_form" method="post" class="second-form">
          <h5 style="color:white">Delete record</h5>
          <label for="delete_category_id">Category ID: </label>
          <input type="text" name="delete_category_id" required /><br/>
          <button type="submit" class="delete-button b5">Delete</button>
          <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Get the form element
                var deleteForm = document.getElementById('delete_category_form');
              
                // Add a submit event listener to the form
                deleteForm.addEventListener('submit', function (event) {
                  // Get the Category ID input value
                  var categoryIdInput = document.getElementsByName('delete_category_id')[0].value;
              
                  // Define a regular expression for the desired format (C followed by 3 digits)
                  var categoryIdPattern = /^C\d{3}$/;
              
                  // Check if the input matches the pattern
                  if (!categoryIdPattern.test(categoryIdInput)) {
                    // If not, prevent the form submission
                    event.preventDefault();
              
                    // Display an alert or handle the error in your preferred way
                    alert('Category ID should be in the format CXXX (e.g., C001)');
                  }
                });
              });
          </script>
        </form>

        <div class="line-break"></div>

        <!-- Update Form -->
        <form action="update.php" id="update_category_form" method="post" class="second-form2">
          <button type="submit" class="update-button b5">Update</button>
        </form>
      </div>
    </div>
    <div class="row mb-6">
      <div class="col-md-12 mx-auto">
        <form action="phps\view_c.php" id="view_category_form" method="post" class="second-form3">
          <button type="submit" class="update-button b4">View all category details</button>
        </form>
      </div>
    </div>
  </div>

  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
