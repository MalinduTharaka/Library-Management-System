// script.js

document.addEventListener('DOMContentLoaded', function () {
    // Get the form element
    var registerForm = document.getElementById('register');
  
    // Add a submit event listener to the form
    registerForm.addEventListener('submit', function (event) {
      // Get the Category ID input value
      var categoryIdInput = document.getElementsByName('category_id')[0].value;
  
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
// script.js

document.addEventListener('DOMContentLoaded', function () {
    // Get the form element
    var registerForm = document.getElementById('register');
  
    // Get the Date Modified input element
    var dateModifiedInput = document.getElementById('date_modified');
  
    // Add a click event listener to the Date Modified row
    dateModifiedInput.addEventListener('click', function () {
      // Set the default value to the current date and time
      dateModifiedInput.value = getCurrentDateTime();
    });
  
    // Function to get the current date and time in the format YYYY-MM-DD HH:MM:SS
    function getCurrentDateTime() {
      var currentDate = new Date();
      var year = currentDate.getFullYear();
      var month = ('0' + (currentDate.getMonth() + 1)).slice(-2); // Months are zero-based
      var day = ('0' + currentDate.getDate()).slice(-2);
      var hours = ('0' + currentDate.getHours()).slice(-2);
      var minutes = ('0' + currentDate.getMinutes()).slice(-2);
      var seconds = ('0' + currentDate.getSeconds()).slice(-2);
  
      return year + '-' + month + '-' + day + ' ' + hours + ':' + minutes + ':' + seconds;
    }
  });
  

  