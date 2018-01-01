<!-- header -->
<?php include("includes/header.php") ?>

<!-- navigation  -->
<?php include("includes/top_menu.php"); ?>

<?php include("includes/sidebar_menu.php"); ?>

<!-- Dashboard -->
<?php include("includes/page_head.php"); ?>

<?php include("includes/content.php") ?>
<?php 

Users::Count();

?>

<!-- Footer -->

<?php include("includes/footer.php") ?>