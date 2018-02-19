<?php

include '../core/pdo.php';

$user_id = $_POST['user_id'];

$query = '';
$columns = array('id','first_name', 'phone_no', 'physical_address');

$query .= "SELECT * FROM customers INNER JOIN sectors ON sectors.id = customers.sector_id WHERE customers.supervisor_id = '$user_id' AND ";

if (isset($_POST["search"]["value"])) {
	$search_value = $_POST["search"]["value"];
	$query .= ' (customers.id LIKE "%'.$search_value.'%" 
	OR customers.first_name LIKE "%'.$search_value.'%"
	OR customers.last_name LIKE "%'.$search_value.'%"
	OR customers.other_names LIKE "%'.$search_value.'%"
	OR customers.phone_no LIKE "%'.$search_value.'%"
	OR customers.physical_address LIKE "%'.$search_value.'%")
	';
}

if (isset($_POST['order'])) {
	$query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}else{
	$query .= 'ORDER BY customers.id DESC ';
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
	$sub_array[] = $row['physical_address'];
	$data[] = $sub_array;
}

function get_total_all_records($db){
	$statement = $db->prepare("SELECT * FROM customers ");
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