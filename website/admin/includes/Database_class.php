<?php
//require_once("admin/includes/config.php"); 



class Database{
	
	public $connect;
	function __construct(){
		$this->connect();
	}
    public function connect(){

		//$this->connect = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
		$this->connect = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
		if ($this->connect->connect_errno) {
			die("Connnection faild " . mysqli_error());
		}
	}
	public function sql($sql){
		$result = mysqli_query($this->connect,$sql);
		return $result;
	} 
	private function check($check){
		if (!$check) {
			die("error Query" . mysqli_error());
		}
	}
	public function real_escape($var){

	 return	$real = mysqli_real_escape_string($this->connect,$var);
	}
	public function the_insert_id(){
		 return mysqli_insert_id($this->connect);
	}

}

$database = new Database();

?> 