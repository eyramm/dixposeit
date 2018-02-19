<?php

function is_logged_in(){
	if(isset($_SESSION['username'])){
		return true;
	}
	else{
		return false;
	}
}

function sanitize($dirty){
	return htmlentities($dirty, ENT_QUOTES, "UTF-8");
}

function pretty_date($date){
	return date("M d, Y @ h:i A", strtotime($date));
}



?>