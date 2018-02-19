<?php
$db = mysqli_connect('localhost','root','','dixpose');

if(mysqli_connect_errno()){
	echo "Database Connection Failed:" .mysqli_connect_errno();
	die();
}

session_start();
?>