<?php  
session_start();

if (isset($_SESSION['user_id']) && isset($_SESSION['first_name'])) {

    if(isset($_POST['first_name']) && isset($_POST['username'])){

        include "../db_conn.php";

        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $username = $_POST['username'];
        $new_password = $_POST['new_password'];

        if (empty($first_name)) {
            $em = "First name is required";
            header("Location: ../edit.php?error=$em");
            exit;
        } else if(empty($last_name)){
            $em = "Last name is required";
            header("Location: ../edit.php?error=$em");
            exit;
        } else {

            // Check for other validations if needed

            // Update the Database
            $sql = "UPDATE user SET first_name=?, last_name=?, username=?";
            
            // Include the password update only if a new password is provided
            if (!empty($new_password)) {
                $sql .= ", password=?";
                $new_password = password_hash($new_password, PASSWORD_DEFAULT);
            }

            $sql .= " WHERE user_id=?";
            
            $stmt = $conn->prepare($sql);

            // Bind parameters based on whether new password is provided or not
            if (!empty($new_password)) {
                $stmt->execute([$first_name, $last_name, $username, $new_password, $_SESSION['user_id']]);
            } else {
                $stmt->execute([$first_name, $last_name, $username, $_SESSION['user_id']]);
            }

            $_SESSION['first_name'] = $first_name;
            $_SESSION['last_name'] = $last_name;
            $_SESSION['username'] = $username;

            header("Location: ../edit.php?success=Your profile has been updated successfully");
            exit;
        }

    } else {
        header("Location: ../edit.php?error=error");
        exit;
    }

} else {
    header("Location: login.php");
    exit;
} 
