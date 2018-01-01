<?php
function __autoload($class){
$class = strtolower($class);
$file_path = "includes/{$class}.php";


if(file_exists($file_path)) {
	require_once($file_path);
}else{
	die("Not loaded file {$class}.php");
	
}

}
function redirect($location){
	
	header("Location: $location");
	
}



?>