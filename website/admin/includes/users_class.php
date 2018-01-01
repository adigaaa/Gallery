<?php 

class Users extends P_class {


	protected static $table_name = "users";
	public static $properties = array("username","password","id","first_name","last_name","image_name","image_dir");
	public $username;
	public $password;
	public $id;
	public $first_name;
	public $last_name;
 	public $image_name;

 	public $image_holder = "http://placehold.it/400x400&text=image";

 	public $error = array();

		public $upload_error = array(

 		UPLOAD_ERR_OK 		  =>"There is no error, the file uploaded with success.",
		UPLOAD_ERR_INI_SIZE   =>"The uploaded file exceeds the upload_max_filesize directive in php.ini.", 
		UPLOAD_ERR_FORM_SIZE  =>"The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.",
		UPLOAD_ERR_PARTIAL    =>"The uploaded file was only partially uploaded.",
		UPLOAD_ERR_NO_FILE    =>"No file was uploaded.",
		UPLOAD_ERR_NO_TMP_DIR =>"Missing a temporary folder. Introduced in PHP 4.3.10 and PHP 5.0.3.",
		UPLOAD_ERR_CANT_WRITE =>"Failed to write file to disk. Introduced in PHP 5.1.0.",
		UPLOAD_ERR_EXTENSION  =>"A PHP extension stopped the file upload. Introduced in PHP 5.2.0."
	
	);

 	public function get_image(){
 		return empty($this->image_name) ?  $this->image_holder : image_dir.DS.$this->image_name;
 	}
 	public function Delete_pic(){
 		unlink(Images.$this->image_name);
			return true;
 	}
	public static function verfiy($username,$password){
		global $database;
		$username = $database->real_escape($username);
		$password = $database->real_escape($password);
		$query = "SELECT * FROM users WHERE ";
		$query .= "username = '{$username}' AND  password ='{$password}'";
		$set_query = self::Set_Query($query);
		if(!empty($set_query)){
			return array_shift($set_query);
		}else{
			return false;
		}
	 

	}
	public function set_file($file){
	//print_r($file);
	if(empty($file) || !is_array($file) || !$file)
	{
		$error[] = "File is not uploaded";
		return false;
	}elseif($file["error"] != 0 ){
		$this->error[] =  "Error Upload file ";//$this->upload_error[$file['error']]; 
		return false;
	}else{
		$this->image_name = basename($file['name']);
		$this->tmp_file = $file['tmp_name'];
		$this->type =  $file['type'];
		$this->size = ceil($file['size']/1024000)." MB";
		return true ;
	}
}


	public function save_file(){

		if($this->id){

			$this->save();

		}elseif(!empty($this->error)){

			return false;

		}elseif(empty($this->image_name) || empty($this->tmp_file)){

			$this->error[] = "File is not available";

			return false;
		}

		$target_path = Images.$this->image_name;
		print_r($target_path);
		var_dump(file_exists($target_path));
		if(file_exists($target_path)){

			$this->error[] = "File is already exists";
			return false;
		}
		if(move_uploaded_file($this->tmp_file,$target_path)){
			$this->image_path = $target_path;
			$this->Create();
			unset($this->tmp_file);
			return true;
		}else{
			$this->error[] = "File not allowed";
			return false;
		}


	}




}

?>
