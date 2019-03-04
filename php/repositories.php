<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");	
	require_once './api.php';
	require_once './db.php';
	
	$repositories_values = callAPI();
	$conn = connectDB();
	$result = updateRepositoryList($conn, $repositories_values);
	$result = getRepositoryList($conn);

	$rownum = 0;
	$output = array();
	$output['records'] = array();	
	if ($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			$output['records'][$rownum]['id'] = $row['id'];
			$output['records'][$rownum]['name'] = $row['name'];
			$output['records'][$rownum]['url'] = $row['url'];
			$output['records'][$rownum]['stargazers_count'] = $row['stargazers_count'];
			
			$rownum++;
		}
		$output = json_encode($output);
	}
	
	$conn->close();
	echo($output);
?>