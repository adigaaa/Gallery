
<!-- header -->
<?php include("includes/header.php") ?>


<!-- navigation  -->
<?php include("includes/top_menu.php"); ?>

<?php include("includes/sidebar_menu.php"); ?>

<!-- Dashboard -->

<?php 
 //$users = Users::show_by_id($_GET['id']);
if(empty($_GET['id'])){
	redirect("images.php");
}else{
    $users = Users::show_by_id($_GET['id']);
    if (isset($_POST["update"]) ) {
       $users->username =  $_POST["username"];
       $users->first_name =   $_POST["first_name"];
       $users->last_name =   $_POST["last_name"];
       $users->password =   $_POST["password"];
       $image = $_FILES["photo"];
      
       
       if (!empty($users->password) && !empty($users->username) ) {
           $users->save();
       }
       if(!empty($image['name']) && $image['size'] != 0){
         $users->Delete_pic();
         $users->set_file($image);
         $users->save_file();
       }
      


}
}

?>
<div id="wrapper">

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Users <small> Edit</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                        <form method="post" enctype="multipart/form-data" action="">
                        	<div class="col-md-8">
                        		

                        	<div class="form-group">
                        	<label for="username">username</label>
                        		<input type="text" name="username" class="form-control" value="<?php echo $users->username ?>">
                        	</div>
                            <div class="form-group">
                            <label for="upload">upload</label>
                                <input type="file" name="photo" class="form-control" >
                            </div>
                        	<div class="form-group">
                        			<img height="360" width="360" src="<?php echo $users->get_image() ; ?>">
                        	</div>
                        	<div class="form-group">
                        	<label for="first_name">first_name</label>
                        		<input type="text" name="first_name" class="form-control" value="<?php echo $users->first_name ?>">
                        	</div>
                        	<div class="form-group">
                        	<label for="last_name">last_name Title</label>
                        		<input type="text" name="last_name" class="form-control" value="<?php echo $users->last_name ?>">
                        	</div>
                        	<div class="form-group">
                        	<label for="password">password</label>
                        		<input type="password" class="form-control" name="password" value="<?php echo $users->password; ?>" >
                        	</div>
                        	</div>

                        	

                        	<div class="col-md-4">
                        			<div class="photo-info-box">
                        			<div class="info-box-header"> 
                        				<h4>Save <span id="toggle" class="glyphicon glyphicon-menu-up "></span></h4>
                        			</div>
                        				<div class="inside">
                        					<div class="box-inner">
                        						<p class="text">
                        							<span class="glyphicon glyphicon-calendar"></span>Uploaded on :
                        						</p>
                        						<p class="text">
                        							user id: <span class="data photo_id_box"><?php echo $users->id; ?></span>
                        						</p>
                        						<p class="text">
                        							username:<span class="data"><?php echo $users->username ; ?></span>
                        						</p>
                        						

                        					</div >
                        					<div class="info-box-footer clearfix">
                        						<div class="info-box-footer pull-left">
                        							<a href="Delete_users.php?id=<?php echo $users->id ?>" class="btn btn-danger btn-lg">Delete</a>
                        							
                        						</div>
                        						<div class="info-box-update pull-right">
                        							<input type="submit" name="update" value="update" class="btn btn-primary btn-lg">
                        							
                        						</div>
                        						
                        					</div>
                        				</div>
                        				
                        			</div>
                        	</div>
                        	</form>


                    </div>
                </div>
                       </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
</div>
    

<!-- Footer -->

<?php include("includes/footer.php") ?>
?>