<?php

header('Access-Control-Alow-Origin: *');
header('Content-Type: application/json');
header('Accept: application/json');


// Enable this line below to enable using curl
$request_body = file_get_contents('php://input');
if (!empty($request_body)) {
	$request_data = json_decode($request_body, true);
	$_POST = $request_data;
}


if (empty($_POST)) {
	$_POST['gettype'] = $_GET['gettype'];
	$_POST['data'] = $_GET['data'];
}

if ($_POST['gettype'] == "post") {
	if ($_POST['data'] == 1) {
		return_response();
	} else {
		return_error_response();
	}
}


function return_response()
{
	http_response_code(200);
	echo json_encode([
		'data' => [
			'message' => "Data successfully retrieved"
		]
	]);
}

function return_error_response()
{
	http_response_code(400);
	echo json_encode([
		'error' => [
			'message' => "Error occured"
		]
	]);
}
