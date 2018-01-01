<?php include_once("includes/init.php"); ?>
<?php 


if(empty($_GET["id"])){
	redirect("Comments.php");
}

$Comments = Comments::show_by_id($_GET["id"]);
$Comments->Delete();
redirect("Comments.php");

?>
