<?php

// start session
session_start();

// initialize connection variables
$http = $_SERVER['HTTP_HOST'];
$host = "";
$user = "";
$pass = "";
$dbname = "";

// environment is localhost
if($http === 'localhost' || $http === '127.0.0.1'):
	$host = 'localhost';
	$username = 'root';
	$password = '';
	$dbname = 'zuri_task_apr_23_2021';

//	environment is online
else:
	//Get Heroku ClearDB connection information
	$cleardb_url = parse_url("mysql://bcc99456d62e26:de06b3f3@us-cdbr-east-03.cleardb.com/heroku_7296d17177d64f8?reconnect=true");
	$host = $cleardb_url["host"];
	$username = $cleardb_url["user"];
	$password = $cleardb_url["pass"];
	$dbname = substr($cleardb_url["path"],1);
endif;

try
{
    $conn = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
}
catch(PDOException $error)
{
    die("Error connecting to database: ".$eror->getMessage());
}
?>