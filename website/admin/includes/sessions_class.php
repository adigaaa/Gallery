<?php

class Session{

	public $session_id ;
	private $sign_in = false;



	public function is_login(){

		return $this->sign_in;
	}

	public function login($user){
		if($user){
			$this->session_id = $_SESSION['user_id'] = $user->id;
			$sign_in = ture;
		}
	}
	public function logout(){
		unset($_SESSION['user_id']);
		unset($this->session_id);
		$sign_in = false;	
	}

	function __construct(){
		session_start();
		$this->check_to_login();
	}
	public function check_to_login(){
		if (isset($_SESSION["user_id"])) {
			$this->session_id = $_SESSION['user_id'];
			$this->sign_in = true;
		}else{
			unset($this->session_id);
			$this->sign_in= false;
		}
		
	}


}

$session = new Session();


?>