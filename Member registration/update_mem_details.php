

<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta
      name="author"
      content="Mark Otto, Jacob Thornton, and Bootstrap contributors"
    />
    <meta name="generator" content="Hugo 0.118.2" />
    <title>Update Member Details</title>

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@docsearch/css@3"
    />

    <link
      href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css"
      rel="stylesheet"
    />


    <link href="nav/navStyle.css" rel="stylesheet" />
    <style>
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
        color: #fff;
        font-weight: bold;
      }
      #divForm {
        padding-top: 100px;
      }
      form {
        margin: auto; /* Center the form */
        max-width:450px;
        margin: 20px auto;
        padding: 10px;
        background-color: #DDF2FD;
        border-radius: 8px;
      }
      #f1{
        padding-top: 30px;
      }

      label {
        display: inline-block;
        width: 150px; /* Adjust the width as needed for label alignment */
        text-align: left;
        margin-bottom: 10px; /* Add space between labels */
      }

      input {
        width: 180px; /* Adjust the width as needed for input fields */
        padding: 5px; /* Add padding for better appearance */
        box-sizing: border-box; /* Include padding and border in the element's total width and height */
        margin-bottom: 10px; /* Add space between input fields */
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
      #pf{
        color: #fff;
      }

    </style>


  </head>
  <body class="bg-body-tertiary">
  <?php
    include_once '..\login\includes\header.php';
  ?>
    <div class="row mb-12">
    </div>
    <div id="divForm" class="row mb-3 text-center">
      <div class="col-md-12 themed-grid-col">
        <form action="php\update_details.php" method="post" id="f1">
          <h3>Member Details Update</h3><br>
          <p id="pu"></pu>
          <label for="update_member_id">Member ID: </label>
  <input type="text" name="update_member_id" required />
  <br />

  <label for="update_firstname">New First name: </label>
  <input type="text" name="update_firstname" required/>
  <br />

  <label for="update_lastname">New Last name: </label>
  <input type="text" name="update_lastname" required/>
  <br />

  <label for="update_birthday">New Birthday:</label>
  <input type="date" id="update_birthday" name="update_birthday" required />
  <br />

  <label for="update_email">New Email: </label>
  <input type="email" name="update_email" required />
  <br />

  <button id="b1" type="submit">Update</button>
        </form>
      </div>

    <footer class="my-5 pt-5 text-body-secondary text-center text-small">
      <p id="pf" class="mb-1">&copy; UOK | FCT | Library Management System</p>
    </footer>
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>
