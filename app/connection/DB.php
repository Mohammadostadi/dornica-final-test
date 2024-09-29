<?php
require_once('MysqliDb.php');
session_start();

$host = 'localhost';
$user = 'root';
$password = '';
$dbName = 'dornica_final_test';


$db = new MysqliDb($host, $user, $password, $dbName);

date_default_timezone_set("Asia/Tehran");

$date = date('Y/m/d H:i:s');

