<?php

/*$host = "host";
$user = "user";
$pass = "pass";
$BDname = "BDname";*/

$host = "localhost";
$user = "root";
$pass = "";
$BDname = "test";

/*$host = "mysql.hostinger.com.ua";
$user = "u229982031_root";
$pass = "poiuy097";
$BDname = "u229982031_main";*/

$admin = 'admin';
$adminPass = 123;
$LK_file_name = 'lk';

// Create connection
$connection = new PDO("mysql:host=$host;dbname=$BDname", $user, $pass);



?>