<?php
session_start();
if (isset($_GET["page"]))
	$page = $_GET["page"];
else
	$page = "home";
$path = __DIR__ . '/../controller/' . $page . '.php';
if (file_exists($path))
	require($path);
?>
