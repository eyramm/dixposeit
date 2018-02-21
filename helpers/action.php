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
	if ($_POST['action'] == 'add_customer') {
		$supervisor_id = sanitize($_POST['supervisor_id']);
		$first_name = sanitize($_POST['first_name']);
		$last_name = sanitize($_POST['last_name']);
		$other_names = sanitize($_POST['other_names']);
		$phone_no = sanitize($_POST['phone_no']);
		$phone_no_2 = sanitize($_POST['phone_no_2']);
		$email = sanitize($_POST['email']);
		$physical_address = sanitize($_POST['physical_address']);
		$sector_id = sanitize($_POST['sector_id']);
		$street_name = sanitize($_POST['street_name']); //NOT INPUTTED
		$address_tag = sanitize($_POST['address_tag']);
		$customer_id = sanitize($_POST['customer_id']);

		$query = $db->query("INSERT INTO customers (supervisor_id, first_name, last_name, other_names, phone_no, phone_no_2, email, physical_address, sector_id, address_tag) VALUES ('$supervisor_id', '$first_name', '$last_name', '$other_names', '$phone_no', '$phone_no_2', '$email', '$physical_address', '$sector_id', '$address_tag') ");
		if ($query) {
			echo 1;
		}else{
			echo 0;

		}

	}

	if ($_POST['action'] == 'add_driver') {
		$supervisor_id = sanitize($_POST['supervisor_id']);
		$first_name = sanitize($_POST['first_name']);
		$last_name = sanitize($_POST['last_name']);
		$other_names = sanitize($_POST['other_names']);
		$phone_no = sanitize($_POST['phone_no']);
		$phone_no_2 = sanitize($_POST['phone_no_2']);
		$email = sanitize($_POST['email']);
		$license_id = sanitize($_POST['license_id']);
		$class_id = sanitize($_POST['class_id']);
		$sector_id = sanitize($_POST['sector_id']);

		$query = $db->query("INSERT INTO users (first_name, last_name, other_names, phone_no, phone_no_2, email, license_id, class_id, sector_id, parent, type) VALUES ('$first_name', '$last_name', '$other_names', '$phone_no', '$phone_no_2', '$email', '$license_id', '$class_id', '$sector_id', '$supervisor_id', 'driver') ");
		if ($query) {
			echo 1;
		}else{
			echo 0;

		}

	}		
}


?>