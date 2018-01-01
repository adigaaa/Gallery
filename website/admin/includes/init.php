<?php 
//require_once("config.php");
ob_start();
defined("DS") ? null : define("DS",DIRECTORY_SEPARATOR);
defined("Path") ? null :define("Path","C:".DS."xampp".DS."htdocs".DS."Gallery".DS."website".DS);
defined("Images") ? null : define("Images",Path."admin".DS."images".DS);
define("image_dir","images");
echo Images;
define("DB_HOST","localhost");
define("DB_USER","root");
define("DB_PASS","");
define("DB_NAME","gallery");


require_once("Database_class.php");
require_once("P_class.php");
require_once("users_class.php"); 
require_once("sessions_class.php");
require_once("upload_class.php");
require_once("check.php");
require_once("comments_class.php");
require_once("paginate.php");





//--------- Create
/*$user_add = new Users();
$user_add->username = "Waleed";
$user_add->password = "Waleed";
$user_add->first_name = "Waleed";
$user_add->last_name = "Waleed";
$user_add->save();*/
//-------------- Delete
/*$user =  Users::show_by_id(3);
echo $user->last_name;
print_r($user);
//print_r($user);
$user->Delete();*/
/*---Update
*/
/*$user = Users::show_by_id(4);
$user->first_name = "Hazem";
$user->last_name = "Waleed";
$user->save();
$user = new Users();
$user->username = "Murad";
$user->password = "ajsndsfdks";
$user->save();*/

?>
