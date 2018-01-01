<?php include("includes/init.php");  ?>
<?php

if(empty($_GET['id'])){
	redirect("users.php");
}
$users = Users::show_by_id($_GET['id']);
if($users->Delete_pic()){
$users->Delete();
redirect("users.php");

}


?>