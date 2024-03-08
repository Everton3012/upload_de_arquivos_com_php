<?php 

$host = "localhost";
$db = "upload";
$user = "root";
$pass = "";

$mysqli = new mysqli($host, $user, $pass, $db);


if($mysqli->connect_errno) {
    echo "Connect failed: " ; $mysqli->connect_error;
    exit();
};
