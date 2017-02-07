<?php
require_once('../model/model.php');
require_once('../includes/helper.php');
// get the routes
$routes = get_routes();
render('home',array('routes' => $routes));
?>