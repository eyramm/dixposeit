<?php

require_once '../core/init.php';
include 'helpers.php';

if (isset($_POST['action'])) {

	if ($_POST['action'] == 'login') {
		$username = sanitize($_POST['username']);
		$password = sanitize($_POST['password']);

		$query = $db->query("SELECT * FROM users WHERE username = '$username' ");
	 	$user = mysqli_fetch_assoc($query);
	 	$hashed = password_hash($password, PASSWORD_DEFAULT);

	 	if (!password_verify($password, $user['password'])) {
	 		echo '0';
	 	}else{
	 		$_SESSION['username'] = $username;
	 		$_SESSION['user_id'] = $user['id'];
	 		$_SESSION['user_type'] = $user['type'];
	 		echo 1;
	 	}
	}	
}


?>