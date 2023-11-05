<?php


include_once './Response.php';


try {
	$data = RmApi::post([
		'gettype' => 'post',
		'data' => 1
	]);



	if ($data->success == true) {
		echo '<p style="color: green">' . $data->data['message'] . '</p>';
	} else {
		echo '<p style="color: red">' . $data->error['message'] . '</p>';
	}
} catch (Exception $th) {
	echo (string) $th;
}
