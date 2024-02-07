<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Category Registration</title>

  <link href="mstyle.css" rel="stylesheet" />
  <script src="script.js"></script>
  <script src="valid.js"></script>
</head>
<body>
<?php
    include_once '..\login\includes\header.php';
  ?>
  <div class="container">
    <div class="row mb-12">
      <div class="col-md-7 mx-auto align-items-center">
        <!-- Category Registration Form -->
        <form action="phps\update_category.php" id="update" method="post" class="update ">
          <h3 style="color:white">Category Registration</h3><br>

          <label for="category_id">Category ID: </label>
          <input type="text" name="category_id" required /><br/>

          <label for="category_name">Category name: </label>
          <input type="text" name="category_name" required /><br/>

          <label for="date_modified">Date modified: </label>
          <input type="text" id="date_modified" name="date_modified" required /><br/><br/>
          
          <button type="submit" class="submit-button">Update</button><br/>
          <a href="new.php">Back</a><br/>
          
          
        
          
        </form>
       
      </div>
        
    </div>
  </div>
  <script>
    document.getElementById('update').addEventListener('submit', function(event) {
    var categoryIdInput = document.getElementsByName('category_id')[0];
    var categoryIdValue = categoryIdInput.value.trim();
  
    // Define the regular expression pattern
    var categoryIdPattern = /^C\d{3}$/;
  
    // Check if the value matches the pattern
    if (!categoryIdPattern.test(categoryIdValue)) {
      // If not, show an alert and prevent form submission
      alert('Category ID should be in the format CXXX (e.g., C001)');
      event.preventDefault();
    }
  });
  </script>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
