<?php

include '../core/pdo.php';

$user_id = $_POST['user_id'];

$query = '';
$columns = array('sectors.id','sectors.name', '', '', '', '');

$query .= "SELECT sectors.*, electoral_areas.id as electoral_areas_id, electoral_areas.name as electoral_area_name FROM sectors INNER JOIN electoral_areas ON electoral_areas.id = sectors.electoral_area_id WHERE supervisor_id = '$user_id' AND ";


if (isset($_POST["search"]["value"])) {
	$search_value = $_POST["search"]["value"];
	$query .= ' (sectors.id LIKE "%'.$search_value.'%" 
	OR sectors.name LIKE "%'.$search_value.'%"
	)';
}

if (isset($_POST['order'])) {
	$query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}else{
	$query .= 'ORDER BY sectors.id DESC ';
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
	$query = "SELECT * FROM customers WHERE sector_id = :sector_id ";
	$statement = $db->prepare($query);
	$statement->execute(
			array(
				':sector_id'		=>	$row['id'],
			)
		);
	$count = $statement->rowCount();	
	$sub_array = array();
	$sub_array[] = $i+1;	
	$sub_array[] = $row['name'];
	$sub_array[] = '<button class="btn btn-info">View</button>';
	$sub_array[] = $count;
	$sub_array[] = '50%';
	$data[] = $sub_array;
}

function get_total_all_records($db){
	$user_id = $_POST['user_id'];
	$statement = $db->prepare("SELECT * FROM sectors WHERE supervisor_id = '$user_id' ");
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