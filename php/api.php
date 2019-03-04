<?php
require_once '../vendor/autoload.php';

/*
 * callAPI
 *
 * Uses the GitHub API to return a list of PHP repositories that have more than 1000 stars
 * Uses PHP Github-API 
 * @see https://github.com/KnpLabs/php-github-api/
 *
 * @return json $repositories_values The result of the API call to GitHub
 */	
function callAPI() {
	$client = new \Github\Client();
	$repos = $client->api('search')->repositories('stars:>=1000 language:php','stars', 'desc');
	
	$repositories_values = '';
	foreach($repos['items'] as $key => $value) {
		if ($repositories_values) {
			$repositories_values .=", ";
		}
		$repositories_values .= "(".
			$value['id'].",".
			"'".$value['name']."',".
			"'".$value['url']."',".
			"'".$value['created_at']."',".
			"'".$value['pushed_at']."',".
			'"'.$value['description'].'",'.
			$value['stargazers_count'].
			")";
	}
	$repositories_values .=";";
	
	return $repositories_values;
}	
?>