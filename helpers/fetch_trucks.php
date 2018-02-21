<?php

include '../core/pdo.php';

$user_id = $_POST['user_id'];

$query = '';
$columns = array('trucks.id','truck_categories.category', 'trucks.reg_no', 'trucks.mileage', '');

$query .= "SELECT trucks.*, truck_categories.id, truck_categories.category as category_name FROM trucks INNER JOIN truck_categories ON truck_categories.id = trucks.category_id WHERE supervisor_id = '$user_id' AND ";


if (isset($_POST["search"]["value"])) {
	$search_value = $_POST["search"]["value"];
	$query .= ' (trucks.id LIKE "%'.$search_value.'%" 
	OR trucks.reg_no LIKE "%'.$search_value.'%"
	OR trucks.mileage LIKE "%'.$search_value.'%"
	OR truck_categories.category LIKE "%'.$search_value.'%" )
	';
}

if (isset($_POST['order'])) {
	$query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}else{
	$query .= 'ORDER BY trucks.id DESC ';
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
	$sub_array[] = $row['category_name'];
	$sub_array[] = $row['reg_no'];
	$sub_array[] = $row['mileage'];
	$sub_array[] = '<button class="btn btn-info">View</button>';
	$data[] = $sub_array;
}

function get_total_all_records($db){
	$user_id = $_POST['user_id'];
	$statement = $db->prepare("SELECT * FROM trucks WHERE supervisor_id = '$user_id' ");
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