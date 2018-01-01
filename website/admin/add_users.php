<!-- header -->
<?php include("includes/header.php") ?>


<!-- navigation  -->
<?php include("includes/top_menu.php"); ?>

<?php include("includes/sidebar_menu.php"); ?>

<!-- Dashboard -->

<?php 

$users = new Users();
if (isset($_POST["Create"])){
   $users->username =  $_POST["username"];
   $users->first_name =   $_POST["first_name"];
   $users->last_name =   $_POST["last_name"];
   $users->password =   $_POST["password"];
   $image = $_FILES["photo"];
   $users->set_file($image);
   $users->save_file();
   print_r($users->error);
   $users->save();

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
                                 <input type="file" name="photo" />
                             </div>
                        	<div class="form-group">
                        	<label for="username">username</label>
                        		<input type="text" name="username" class="form-control" >
                        	</div>
                        	
                        	<div class="form-group">
                        	<label for="first_name">first_name</label>
                        		<input type="text" name="first_name" class="form-control" >
                        	</div>
                        	<div class="form-group">
                        	<label for="last_name">last_name </label>
                        		<input type="text" name="last_name" class="form-control" >
                        	</div>
                        	<div class="form-group">
                        	<label for="password">password</label>
                        		<input type="password" name="password" class="form-control"  >
                        	</div>
                            <input type="submit" name="Create" class="btn btn-primary" value="Create">
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
