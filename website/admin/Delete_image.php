<?php include_once("includes/init.php"); ?>
<?php 


if(empty($_GET["id"])){
	redirect("images.php");
}

$image = Upload::show_by_id($_GET["id"]);
$image->Delete_pic();
redirect("images.php");

?>
