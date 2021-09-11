<?php
//db details
$dbHost = 'localhost:3307';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'digitalbloodbank';

//Connect and select the database
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>