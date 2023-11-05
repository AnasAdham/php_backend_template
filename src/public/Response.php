<?php

const API_URL = 'nginx/api.php';
// const API_URL = 'http://localhost:8080/api.php';

class Response
{
	public $status_code;
	public $success;
	public $data;
	public $error;

	public function __construct($data, $success = true, $status_code = 200)
	{
		$this->status_code = $status_code;
		if ($success) {
			$this->data = isset($data['data']) ? $data['data'] : $data;
		} else {
			$this->error = isset($data['error']) ? $data['error'] : $data;
		}
		$this->success = $success;
	}
}

class ApiException extends Exception
{
	protected $message;
	public function __construct($message)
	{
		parent::__construct($message);
	}
}

class RmApi
{
	const HEADER =  [
		'Content-Type: application/json',
		'Accept: application/json',
	];
	const CURL_POST_OPTIONS = [
		CURLOPT_URL => API_URL,
		CURLOPT_POST => true,
		CURLOPT_SSL_VERIFYHOST => false,
		CURLOPT_SSL_VERIFYPEER => false,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_HTTPHEADER => self::HEADER,
	];
	public static function post(array $data)
	{
		$ch = curl_init();
		$payload = json_encode($data);

		curl_setopt_array($ch, self::CURL_POST_OPTIONS);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

		$response = curl_exec($ch);
		if (curl_errno($ch)) throw new ApiException(curl_error($ch));

		$http_code =  curl_getinfo($ch, CURLINFO_HTTP_CODE);

		if ($http_code >= 200 && $http_code < 300) {
			$data = json_decode($response, true);
			$response = new Response($data);
		} else {
			$data = json_decode($response, true);
			$response = new Response($data, false, $http_code);
		}

		curl_close($ch);
		return $response;
	}
}
