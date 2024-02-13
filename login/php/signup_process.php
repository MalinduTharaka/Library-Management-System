<?php 

if(isset($_POST['user_id']) && isset($_POST['email']) && isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['uname']) && isset($_POST['pass'])) {

    include "../db_conn.php";

    $user_id = $_POST['user_id'];
	$email = $_POST['email'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    $data = "user_id=" . urlencode($user_id) . "&email=" . urlencode($email) . "&first_name=" . urlencode($first_name) . "&last_name=" . urlencode($last_name) . "&uname=" . urlencode($uname);
    $regex = '/^U\d{3}$/';
	if (empty($user_id)) {
		$em = "User ID is required";
		header("Location: ../index.php?error=$em&$data");
		exit;
	} else if (!preg_match($regex, $user_id)) {
		$em = "Invalid username format. Please use U001, U002 Format";
		header("Location: ../index.php?error=$em&$data");
		exit;
	}else if (empty($email)) {
		$em = "Email is required";
		header("Location: ../index.php?error=$em&$data");
		exit;
	} else if (empty($first_name)) {
    	$em = "First name is required";
    	header("Location: ../index.php?error=$em&$data");
	    exit;
	} else if (empty($last_name)) {
    	$em = "Last name is required";
    	header("Location: ../index.php?error=$em&$data");
	    exit;
	} else if (empty($uname)) {
    	$em = "User name is required";
    	header("Location: ../index.php?error=$em&$data");
	    exit;
    } else if (empty($pass)) {
    	$em = "Password is required";
    	header("Location: ../index.php?error=$em&$data");
	    exit;
	} else if (strlen($pass) < 8) {
        $em = "Password should be at least 8 characters";
        header("Location: ../index.php?error=$em&$data");
        exit;
    } else {
    	// Hashing the password
    	$pass = password_hash($pass, PASSWORD_DEFAULT);

    	$sql = "INSERT INTO user (user_id, email, first_name, last_name, username, password) VALUES (?,?,?,?,?,?)";
    	$stmt = $conn->prepare($sql);
    	$stmt->execute([$user_id, $email, $first_name, $last_name, $uname, $pass]);

    	header("Location: ../index.php?success=Your account has been created successfully");
	    exit;
    }
} else {
	header("Location: ../index.php?error=error");
	exit;
}
