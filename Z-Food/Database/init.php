<?php
require_once 'config.php';
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

$db = new PDO('mysql:host=DB_HOST;dbname=', ' DB_PASS', '');
