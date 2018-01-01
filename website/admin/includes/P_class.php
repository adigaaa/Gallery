<?php


class P_class{

	protected static $table_name;

	public static function show_all(){
		$show = static::Set_Query("SELECT * FROM ".static::$table_name);
		return $show;
	}

	public static function show_by_id($id){
		$query = static::Set_Query("SELECT * FROM ".static::$table_name." WHERE id =$id");
		if(!empty($query)){
			return array_shift($query);
		}
		else{
			return false;
		}
	}
	public static function Set_Query($query){

		global $database;
		$result = $database->sql($query);
		$show_object = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$show_object[] = static::instantiation($row);
		}
		return $show_object;
		

	}
		public static function instantiation($row){
	       $object = get_called_class();
	       $the_object = new $object;
	       /*
	       $the_object->id         =$row['id'];
	       $the_object->username   =$row['username'];
	       $the_object->password   =$row['password'];
	       $the_object->first_name =$row['first_name'];*/

	       foreach ($row as $attribute => $value) {
	       		
	       		if($the_object->check_attribute($attribute)){
	       			$the_object->$attribute = $value;
	       		}

	       }
	       return $the_object;
	}


	private function check_attribute($attribute){
		$object_propreties = get_object_vars($this);
		return array_key_exists($attribute,$object_propreties);
	}
	private function properties(){
		global $database;
		$array = array();
		foreach (static::$properties as $pro) {
			if (property_exists($this, $pro)) {
				$array[$pro] = $this->$pro;
			}
		}
		return $array;
	}
	public function Clean(){
		global $database;
		$data = $this->properties();
		$array = array();
		foreach ($data as $key => $value) {
			if (!empty($value)) {
				$array[$key] = $database->real_escape($value);

			}
		}
		return $array;
	}
	public function Create(){
		global $database;
		$properties = $this->Clean();
		print_r($properties);
		//print_r($properties);
		$sql = "INSERT INTO " .static::$table_name . "(". implode(",",array_keys($properties)) .") ";
		$sql .= "VALUES('". implode("','",array_values($properties)) ."')";

		if($database->sql($sql)){
			$this->id  = $database->the_insert_id();
			echo "Craeted";
		}else{
			die(mysqli_error($database->connect));
		}
	}
	public function Delete(){
		global $database;
		$sql = "DELETE FROM ". static::$table_name ." WHERE id = ". $database->real_escape($this->id);
		
		 $check =  $database->sql($sql);
		
		if($check){
			echo "DELETED !!!";
			return (mysqli_affected_rows($database->connect) == 1)? true : false;
		}else{
			echo "Not Deleted";
		}

	}
	public function save(){
		isset($this->id) ? $this->Update() : $this->Create(); 
	}
	public function Update(){
		global  $database;
		$properties = $this->Clean();
		$array = array();
		foreach ($properties as $key => $value) {
			$array[$key] = "$key = '$value'";
		}
		$sql = "UPDATE ".static::$table_name . " SET " . implode(",",$array) . "WHERE id = " . $this->id;
		/*global $database;
		$sql = "UPDATE ".self::$table_name . " SET ";
		$sql .= " username = '".$database->real_escape($this->username) . "',";
		$sql .= " password = '".$database->real_escape($this->password). "',";
		$sql .= " first_name = '".$database->real_escape($this->first_name). "',";
		$sql .= " last_name = '".$database->real_escape($this->last_name)."'";
		$sql .= " WHERE id=".$database->real_escape($this->id);*/
		if($database->sql($sql)){
			echo "Updated";
			return (mysqli_affected_rows($database->connect) == 1) ? true : false;

		}else{
			echo "Error Update";
		}
	}
	
	public static  function Count(){
		global $database;
		$sql  = "SELECT COUNT(*) FROM  " . static::$table_name ;
		$result =  $database->sql($sql);
		 $rows = mysqli_fetch_assoc($result);
		return array_shift($rows);
	} 

}

?>
