<?php

// database info

define('DB_HOST', 'localhost');
define('DB_USER', 'beshari_jamal');
define('DB_PASSWORD', 'Fslhggi14!');
define('DB_DATABASE', 'beshari_PROJECT2');

//this funciton write routes to a data base that has ()
function write_routes(){
	//echo("writing routes..  ");
	$url = "http://api.bart.gov/api/route.aspx?cmd=routes&key=MW9S-E7SL-26DU-VV8V";
    #$url = "hey.xml";
    $doc=new DomDocument;
    $doc->validateOnParse=true;
    $doc->Load($url);
    $s=simplexml_import_dom($doc);
	
	$dsn = 'mysql:host='.DB_HOST.';dbname='.DB_DATABASE;
	try
	{
	//echo("connecting to db..  ");
  //$dbh = new PDO("pgsql:host=$host;port=5432;dbname=$db;user=$user;password=$pass");
	$dbh = new PDO($dsn, DB_USER, DB_PASSWORD);
  	echo "Connected<p>";
	}
	catch (Exception $e)
	{
		$dbh = null;
  		echo "Unable to connect: " . $e->getMessage() ."<p>";
	}
	$dbh = new PDO($dsn, DB_USER, DB_PASSWORD);
    $r=$s->routes; //$r is anode of an array of all routes
	// prepare and bind
	$insert = $dbh->prepare("INSERT INTO routes (name, abbr, routeID, number, color) VALUES (:name, :abbr, :routeID, :number, :color)");
	//print_r($r);
	$name='empty';
	$abbr='emy';
	$routeID='empty';
	$number=0;
	$color='empty';
	//var_dump($insert);
	if ($insert)
	{
	$insert->bindParam(':name', $name, PDO::PARAM_STR);
	$insert->bindParam(':abbr', $abbr, PDO::PARAM_STR);
	$insert->bindParam(':routeID', $routeID, PDO::PARAM_STR);
	$insert->bindParam(':number', $number, PDO::PARAM_INT);
	$insert->bindParam(':color', $color, PDO::PARAM_STR);
	}
	else
	{
		//echo('insertion incomplete....');
		$dbh = null;
		return null;		
	}
    foreach($r->route as $route){
        $name=$route->name;
		$abbr=$route->abbr;
		$routeID=$route->routeID;
		$number=intval($route->number);
		$color=$route->color;
		$result=$insert->execute();
		if(!$result){
			//echo("could not write routes into database <br>");
			$dbh = null;
			return null;

		}
    }
	return null;
}


function write_stations(){
	//echo("writing routes..  ");
	$url = "http://api.bart.gov/api/stn.aspx?cmd=stns&key=MW9S-E7SL-26DU-VV8V";
    #$url = "hey.xml";
    $doc=new DomDocument;
    $doc->validateOnParse=true;
    $doc->Load($url);
    $s=simplexml_import_dom($doc);
	
	$dsn = 'mysql:host='.DB_HOST.';dbname='.DB_DATABASE;
	try
	{
	//echo("connecting to db..  ");
  //$dbh = new PDO("pgsql:host=$host;port=5432;dbname=$db;user=$user;password=$pass");
	$dbh = new PDO($dsn, DB_USER, DB_PASSWORD);
  	//echo "Connected<p>";
	}
	catch (Exception $e)
	{
		$dbh = null;
  	//	echo "Unable to connect: " . $e->getMessage() ."<p>";
	}
	$dbh = new PDO($dsn, DB_USER, DB_PASSWORD);
    $r=$s->stations; //$r is a node of an array of all stations
	// prepare and bind
	$insert = $dbh->prepare("INSERT INTO stations (name, abbr, gifts_latitude, gifts_longitude) VALUES (:name, :abbr, :lat, :long)");
	//print_r($r);
	$name='empty';
	$abbr='emy';
	$routeID='empty';
	$lat='empty';
	$long='empty';
	//var_dump($insert);
	if ($insert)
	{
	$insert->bindParam(':name', $name, PDO::PARAM_STR);
	$insert->bindParam(':abbr', $abbr, PDO::PARAM_STR);
	$insert->bindParam(':lat', $lat);
	$insert->bindParam(':long', $long);
	}
	else
	{
	//	echo('insertion incomplete....');
		$dbh = null;
		return null;		
	}
    foreach($r->station as $station){
        $name=$station->name;
		$abbr=$station->abbr;
		$lat=$station->gtfs_latitude;
		$long=$station->gtfs_longitude;
		$result=$insert->execute();
		if(!$result){
		//	echo("could not write stations into database exec <br>");
			$dbh = null;
			return null;

		}
    }
	return null;
}


function get_routes(){
	//write_routes();
	 //write_stations();
		
	//echo("gettign routes..  ");
	// connect to server and select database
	$dsn = 'mysql:host='.DB_HOST.';dbname='.DB_DATABASE;
	
	try
	{
	$dbh = new PDO($dsn, DB_USER, DB_PASSWORD);
  	//echo "Connected<p>";
	}
	catch (Exception $e)
	{
		$dbh = null;
  	//	echo "Unable to connect: " . $e->getMessage() ."<p>";
	}
	
	// get the routes
	$query = sprintf('SELECT name, abbr, number, color FROM routes WHERE 1');
	$result = $dbh->query($query);
	//var_dump($result);
	//sizeof($result);
	if ($result)
	{ 
	    $arr = array();
	    while ($row = $result->fetch()) {
			//$arr[]=$row; same as the next statemnt
			array_push($arr, $row);
	    }
		$dbh = null;
		//print_r($arr);
		return $arr;
	}
	else{
		$dbh = null;
		//write_routes();
	}
	// close connection
	return null;
}
?>
