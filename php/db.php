<?php
/*
 * connectDB
 *
 * Establishes a connection to the mysql database
 * Please enter your database credentials here
 *
 * @return object database connection
 */	
function connectDB() {
	$conn = new mysqli('localhost', 'root', '', 'victr');
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	return $conn;
}	

/*
 * updateRepositoryList
 *
 * This function drops the database table and then populates it
 * with the data passed in to $values
 *
 * @param object $conn a database connection
 * @param string $values a string of values
 * @return object $result the result of the insert query
 */	
function updateRepositoryList($conn, $values) {
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}	
	$init_sql = "TRUNCATE TABLE github_repositories";
	$result = $conn->query($init_sql);
	
	$insert_sql = "INSERT INTO github_repositories (id, name, url, created_at, pushed_at, description, stargazers_count)
	VALUES ".$values;
	$result = $conn->query($insert_sql);
	return $result;
}	

/*
 * getRepositoryList
 *
 * Queries the datbase for the list of GitHub Repositories
 *
 * @param object $conn a database connection
 * @return string $result a list of the GitHub repositories stored in the database
 */	
function getRepositoryList($conn) {
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT id, name, url, stargazers_count FROM github_repositories ORDER BY stargazers_count DESC";
	$result = $conn->query($sql);
	return $result;
}

/*
 * getRespositoryDetail
 *
 * Queries the database and returns full details about a single GitHub Repository
 *
 * @param object $conn a database connection
 * @param int $id a GitHub Repository ID
 * @return string $result Full details of the GitHub repository stored in the database
 */
function getRespositoryDetail($conn, $id) {
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT id, name, url, created_at, pushed_at, description, stargazers_count FROM github_repositories 
	WHERE id=".$id." ORDER BY stargazers_count DESC";
	$result = $conn->query($sql);
	return $result;
}
?>