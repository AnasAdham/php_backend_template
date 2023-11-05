<?php

class Database
{
	private $host = '';
	private $db_name = 'php_curl';
	private $username = 'root';
	private $password = 'password';
	private $conn;


	// DB connect
	public function connect()
	{
		$this->conn = null;
	}
}
