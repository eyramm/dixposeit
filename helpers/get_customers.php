<?php
require_once '../core/init.php';
include 'helpers.php';


$column = array("customers.id", "customers.first_name", "customers.phone_no", "customers.location");

$query = "
	SELECT * FROM customers
	INNER JOIN sectors
	ON sectors.id = customers.sector_id

";

$query .= " WHERE ";

if (isset($_POST["search"]["value"])) {
	$search_value = $_POST["search"]["value"];
	$query .= ' customers.id LIKE "%'.$search_value.'%" ';
	$query .= 'OR customers.first_name LIKE "%'.$search_value.'%" 
	OR customers.phone_no LIKE "%'.$search_value.'%"
	OR customers.location LIKE "%'.$search_value.'% "
	';
}

if (isset($_POST['order'])) {
	$query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}else{
	$query .= 'ORDER BY customers.id DESC ';
}

// if ($_POST['length'] != -1) {
// 	$query .= 'LIMIT '.$_POST['start']. ', ' .$_POST['length'];
// }

$filtered_rows = mysqli_num_rows($db->query($query));
$result = $db->query($query);



$data = array();
foreach ($result as $row) {
	$sub_array = array();
	$sub_array[] = $row['id'];
	$sub_array[] = $row['first_name'];
	$sub_array[] = $row['phone_no'];
	$sub_array[] = $row['location'];
	$data[] = $sub_array;
}

function get_total_all_records($db){
	$query = $db->query("SELECT * FROM customers ");
	return mysqli_fetch_assoc($query);
}

$output = array(
	"draw" 				=>	intval($_POST['draw']),
	"recordsTotal"		=>	get_total_all_records($db),
	"recordsFiltered"	=>	$filtered_rows,
	"data"				=>	$data
);
echo json_encode($output);
?>