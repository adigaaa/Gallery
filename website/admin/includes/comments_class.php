<?php

class Comments extends P_class{
		protected static $table_name = "comments";
		public static  $properties  =  array("id","photo_id","author","body");
		public $id,$photo_id,$author,$body;

		public static function Create_Comment($photo_id,$author,$body){

			if(!empty($photo_id) && !empty($author) && !empty($body)){
				$comment  = new Comments();
				$comment->photo_id = $photo_id ;
				$comment->author = $author;
				$comment->body = $body;
				return $comment;
			}else{
				return false;
			}
		}
		public static function find_by_id($photo_id){
			global $database;
			$sql = "SELECT * FROM " . self::$table_name ;
			$sql .= " WHERE photo_id = " . $database->real_escape($photo_id);
			$sql .=" ORDER BY photo_id ASC";

			return self::Set_Query($sql);
		}
	}


?>