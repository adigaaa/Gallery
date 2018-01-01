<?php

?>

<!-- header -->
<?php include("includes/header.php") ?>


<!-- navigation  -->
<?php include_once("includes/top_menu.php"); ?>

<?php include_once("includes/sidebar_menu.php"); ?>

<!-- Dashboard -->

<?php 


if (isset($_POST["Create"])) {
    $users = new Users();
   $users->username =  $_POST["username"];
   $users->first_name =   $_POST["first_name"];
   $users->last_name =   $_POST["last_name"];
   $users->password =   $_POST["password"];
   $users->image_name = Images.$_FILES["file"]['name'];
   $from = $_FILES["file"]['tmp_name'];
   move_uploaded_file($from, $users->image_name);
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
                            Images <small> Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                        <form method="post">
                            <div class="col-md-8">
                                

                            <div class="form-group">
                            <label for="username">username</label>
                                <input type="text" name="username" class="form-control" >
                            </div>
                            
                            <div class="form-group">
                            <label for="first_name">first_name</label>
                                <input type="text" name="first_name" class="form-control" >
                            </div>
                            <div class="form-group">
                            <label for="last_name">last_name Title</label>
                                <input type="text" name="last_name" class="form-control" >
                            </div>
                            <div class="form-group">
                            <label for="password">password</label>
                                <input type="password" name="password" class="form-control" >
                            </div>
                            <div class="form-group">
                                <input type="file" name="file" >
                            </div>
                              <div class="form-group">
                                <input type="submit" name="Create" value="Create" class="btn btn-primary btn-lg">
                            </div>
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