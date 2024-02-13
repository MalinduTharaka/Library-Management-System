<?php 
session_start();

if(isset($_POST['uname']) && isset($_POST['pass'])){

    include "../db_conn.php";

    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    $data = "uname=".$uname;
    
    if(empty($uname)){
    	$em = "User name is required";
    	header("Location: ../login.php?error=$em&$data");
	    exit;
    }else if(empty($pass)){
    	$em = "Password is required";
    	header("Location: ../login.php?error=$em&$data");
	    exit;
    }else {

      $sql = "SELECT * FROM user WHERE username = ?";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$uname]);
      
      if ($stmt->rowCount() == 1) {
          $user = $stmt->fetch();
      
          $id =  $user['user_id'];
          $email =  $user['email'];
          $first_name =  $user['first_name'];
          $last_name =  $user['last_name'];
          $username =  $user['username'];
          $stored_password =  $user['password'];
      
          if (password_verify($pass, $stored_password)) {
              $_SESSION['user_id'] = $id;
              $_SESSION['first_name'] = $first_name;
      
              header("Location: ../home.php");
              exit;
          } else {
              $em = "Incorrect username or password";
              header("Location: ../login.php?error=$em&$data");
              exit;
          }
      } else {
          $em = "Incorrect username or password";
          header("Location: ../login.php?error=$em&$data");
          exit;
      }
   }
}      
