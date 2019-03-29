<?php

header("Content-Type: application/json");

$routes = array_slice($routes, 1);
$error = true;
$data = null;
$message = "Not Found";

$post = $_POST;
if ($_POST) {
	foreach ($_POST as $key => $value) {
		if (is_string($value)) {
			$_POST[$key] = mysqli_escape_string($conn, $_POST[$key]);
		}
	}
}

include join("/", $routes).".php";

if ($error == true) {
	$output = new stdClass();
	$output->error = true;
	$output->success = false;
	$output->message = $message;
	$output->data = $data;
} else {
	$output = new stdClass();
	$output->error = false;
	$output->success = true;
	$output->message = $message;
	$output->data = $data;
}

print_r(json_encode($output));

mysqli_close($conn);

?>