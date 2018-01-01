<?php

class Upload extends P_class{
		protected static $table_name = "uploads";
		public static  $properties  =  array("id","id_user_up","image_name","type","image_path","size","title","caption","Alternate","description");
		public $id,$id_user_up,$image_name,$type,$image_path,$size,$title,$caption,$alternate,$description;
		
		public $tmp_file;
		public $upload_dir = "images"; 
		public $error = array();
		public $extension = array('jpeg','png','gif');

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

	public function get_path_files(){
		return $this->upload_dir.DS.$this->image_name;
	}
	public function set_file($file){
		//print_r($file);
		if(empty($file) || !is_array($file) || !$file)
		{
			$error[] = "File is not uploaded";
			return false;
		}elseif($file["error"] != 0 ){
			$this->error[] = $this->upload_error[$file['error']]; 
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

			$this->Update();

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
		$extension = pathinfo($this->image_name);
		if (!in_array($extension['extension'],$this->extension)) {
			die('ha ha ha');
		}
		if(move_uploaded_file($this->tmp_file,$target_path)){
			global $user;
			$this->image_path = $target_path;
			$this->id_user_up = $user->id;
			$this->Create();
			unset($this->tmp_file);
			return true;
		}else{
			$this->error[] = "File not allowed";
			return false;
		}


	}
	public function Delete_pic(){
		
		if($this->Delete()){
			unlink(Images.$this->image_name);
			return true;
		}

	}


}
$photos = new Upload();


?>