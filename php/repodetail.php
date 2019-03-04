<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");	
	require_once './db.php';
	
	filter_var_array($_REQUEST, FILTER_SANITIZE_STRING);
    $id = (int)$_REQUEST['id'];
	if (!is_int($id)) {
		die("Invalid ID");
	}
	
	$conn = connectDB();

	$result = getRespositoryDetail($conn, $id);

	$rownum = 0;
	$output = array();
	$output['records'] = array();		
	if ($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			$output['records'][$rownum]['id'] = $row['id'];
			$output['records'][$rownum]['name'] = $row['name'];
			$output['records'][$rownum]['url'] = $row['url'];
			$output['records'][$rownum]['created_at'] = $row['created_at'];
			$output['records'][$rownum]['pushed_at'] = $row['pushed_at'];
			$output['records'][$rownum]['description'] = $row['description'];
			$output['records'][$rownum]['stargazers_count'] = $row['stargazers_count'];
			
			$rownum++;			
		}
		$output = json_encode($output);
	}
	
	$conn->close();
	echo($output);
?>