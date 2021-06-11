<?php
date_default_timezone_set("Asia/Calcutta");
class Database{
	
	private $username = "root";
	private $password = "";
	protected $con;
	public function __construct(){
		$this->con= $this->connect();
	}
	public function connect(){
		$con = new mysqli('localhost', 'root', '', 'pot');
        return $con;
	}
	
}



?>