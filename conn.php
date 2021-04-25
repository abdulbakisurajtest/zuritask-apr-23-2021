<?php

// start session
session_start();

// initialize connection variables
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'zuri_task_apr_23_2021';

try
{
    $conn = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
}
catch(PDOException $error)
{
    die("Error connecting to database: ".$eror->getMessage());
}
?>