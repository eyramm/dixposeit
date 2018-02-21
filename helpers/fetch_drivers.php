<?php

include '../core/pdo.php';

$user_id = $_POST['user_id'];

$query = '';
$columns = array('users.id','users.first_name', 'users.phone_no', 'users.license_id', 'sectors.name');

$query .= "SELECT users.*, sectors.id, sectors.name as sector_name FROM users INNER JOIN sectors ON sectors.id = users.sector_id WHERE users.parent = '$user_id' AND ";

if(isset($_POST['is_sector'])){
	$sector_id = $_POST['is_sector'];
	$query .= " sectors.id = '$sector_id' AND ";
}
if (isset($_POST["search"]["value"])) {
	$search_value = $_POST["search"]["value"];
	$query .= ' (users.id LIKE "%'.$search_value.'%" 
	OR users.first_name LIKE "%'.$search_value.'%"
	OR users.last_name LIKE "%'.$search_value.'%"
	OR users.other_names LIKE "%'.$search_value.'%"
	OR users.phone_no LIKE "%'.$search_value.'%"
	OR users.license_id LIKE "%'.$search_value.'%"
	OR sectors.name LIKE "%'.$search_value.'%" )
	';
}

if (isset($_POST['order'])) {
	$query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}else{
	$query .= 'ORDER BY users.id DESC ';
}

if ($_POST['length'] != -1) {
	$query .= 'LIMIT '.$_POST['start']. ', ' .$_POST['length'];
}




$statement = $db->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$filtered_rows = $statement->rowCount();

$data = array();

foreach ($result as $i => $row) {	
	$sub_array = array();
	$sub_array[] = $i+1;
	$sub_array[] = $row['first_name']." ".$row['last_name']." ".$row['other_names'];
	$sub_array[] = $row['phone_no'];
	$sub_array[] = $row['license_id'];
	$sub_array[] = $row['sector_name'];
	$data[] = $sub_array;
}

function get_total_all_records($db){
	$user_id = $_POST['user_id'];
	$statement = $db->prepare("SELECT * FROM users WHERE parent = '$user_id' ");
	$statement->execute();
	return $statement->rowCount();
}

$output = array(
	"draw" 				=>	intval($_POST['draw']),
	"recordsTotal"		=>	get_total_all_records($db),
	"recordsFiltered"	=>	$filtered_rows,
	"data"				=>	$data
);
echo json_encode($output);

?>