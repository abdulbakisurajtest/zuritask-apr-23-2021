<?php

// start session
session_start();

// instantiate database variables
$host = 'localhost';
$dbname = 'zuri_task_apr_23_2021';
$username = 'root';
$password = '';

try
{
    $conn = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
}
catch(PDOException $error)
{
    die("Error connecting to database: ".$eror->getMessage());
}
?>