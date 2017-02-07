<?php
require_once('../model/model.php');

define('DB_HOST', 'localhost');
define('DB_USER', 'beshari_jamal');
define('DB_PASSWORD', 'Fslhggi14!');
define('DB_DATABASE', 'beshari_PROJECT2');
// connect to server and select database
$dsn = 'mysql:host='.DB_HOST.';dbname='.DB_DATABASE;
$dbh = new PDO($dsn, DB_USER, DB_PASSWORD);
//echo("successsfull connection to database...");
// recieve parameter
$stations = json_decode(stripslashes($_POST['routes']));
//$query = sprintf("SELECT COUNT(abbr) FROM stations");
//$rowCount = $dbh->query($query);
//var_dump($rowCount);

// get the routes
//print_r($stations);
$result = array();
foreach($stations as $st){
//	//echo("in the each funciton..");
	$query = sprintf("SELECT gifts_longitude FROM stations WHERE abbr='%s'",$st);
	//var_dump($query);
	$r = $dbh->prepare($query);
	$r->execute();
	$row=$r->fetch(PDO::FETCH_NUM);
	//var_dump($row[0]);
	$result[]=$row[0];
}
//var_dump($result);
if ($result)
{ 
	echo json_encode($result);
}
// close connection
$dbh = null;
?>