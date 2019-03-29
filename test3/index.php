<?php

	error_reporting(E_ALL);
	ini_set('display_errors', '1');

	date_default_timezone_set( 'Asia/Taipei' );
	setlocale(LC_TIME, "zh_TW.UTF-8");

	session_start();

	require_once "conf.php";
	require_once "models/db.php";

	$route = $_SERVER['REQUEST_URI'];

	$routes = array_slice(explode("/", $route), 1);

	if ($routes[0] == "api") {
		require_once "models/controllers.php";
		require_once "models/api.php";
		exit();
	} else {
 		$data = new stdClass();
		require_once "models/controllers.php";
	}

	switch ($routes[0]) {
		case "dashboard":
			// Login
			// Logout
			$view = "home";
			break;
		default:
			$view = "home";
	}


	if($routes[0] != 'home' && (!isset($view) || $view == 'home') && is_file("views/" . $routes[0] . ".php")) {
		$view = $routes[0];
	}


	if(empty($view)) {
		die('Not found. Please check again....');
	}

	include "views/" . $view . ".php";
	exit();

?>




