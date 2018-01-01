<!-- header -->
<?php include("includes/header.php") ?>


<!-- navigation  -->
<?php include("includes/top_menu.php"); ?>

<?php include("includes/sidebar_menu.php"); ?>

<!-- Dashboard -->

<?php 

if(empty($_GET['id'])){
	redirect("images.php");
}
$image = Upload::show_by_id($_GET['id']);
if (isset($_POST["update"])) {
   $image->title =  $_POST["title"];
   $image->caption =   $_POST["caption"];
   $image->Alternate =   $_POST["alternate"];
   $image->description =   $_POST["description"];
   $image->save();

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
                        	<label for="Title">Title</label>
                        		<input type="text" name="title" class="form-control" value="<?php echo $image->title ?>">
                        	</div>
                        	<div class="form-group">
                        			<a class="thumbnail" href="#"><img src="<?php echo $image->get_path_files() ?>"></a>
                        	</div>
                        	<div class="form-group">
                        	<label for="Caption">Caption</label>
                        		<input type="text" name="caption" class="form-control" value="<?php echo $image->caption ?>">
                        	</div>
                        	<div class="form-group">
                        	<label for="alternate">Alternate Title</label>
                        		<input type="text" name="alternate" class="form-control" value="<?php echo $image->alternate ?>">
                        	</div>
                        	<div class="form-group">
                        	<label for="description">Description</label>
                        		<textarea cols="30" rows="10" class="form-control" name="description" ><?php echo $image->description; ?></textarea>
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
                        							Photo id: <span class="data photo_id_box"><?php echo $image->id; ?></span>
                        						</p>
                        						<p class="text">
                        							Filename:<span class="data"><?php echo $image->image_name ; ?></span>
                        						</p>
                        						<p class="text">
                        							File Type:<span class="data"><?php echo $image->type ; ?></span>
                        						</p>
                        						<p class="text">
                        							File Size: <span class="data"><?php echo $image->size ; ?></span>
                        						</p>

                        					</div >
                        					<div class="info-box-footer clearfix">
                        						<div class="info-box-footer pull-left">
                        							<a href="Delete_image.php?id=<?php echo $image->id ?>" class="btn btn-danger btn-lg">Delete</a>
                        							
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