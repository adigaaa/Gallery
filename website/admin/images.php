<!-- header -->
<?php include("includes/header.php") ?>


<!-- navigation  -->
<?php include("includes/top_menu.php"); ?>

<?php include("includes/sidebar_menu.php"); ?>

<!-- Dashboard -->


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
                         <div class="col-md-12">
                            <table class="table table-hover">
            <thead>
                <th>id</th>
                <th>Title</th>
                <th>Photo</th>
                <th>File name</th>
                <th>File size</th>
                <th>Comments</th>

                                    
            </thead>
            <tbody>
            <?php 
                $image = Upload::show_all();
                        foreach ($image as $key =>$value) {
                           $count = Comments::find_by_id($value->id);
                         ?>
                            <tr>
                            <td><?php echo $value->id; ?></td>
                            <td><?php echo $value->title; ?></td>
                            <td> <img src="<?php echo $value->get_path_files();?>" height="400" width="400"">
                                <div class="pictures_link">
                                <a href="Delete_image.php?id=<?php echo $value->id; ?>">Delete</a>
                                <a href="Edit_image.php?id=<?php echo $value->id; ?>">Edit</a>
                                <a href="../photo.php?id=<?php echo $value->id; ?>">View</a>
                            </div>
                            </td>
                            
                            <td><?php echo $value->image_name; ?></td>
                            <td><?php echo $value->size; ?></td>
                            <td><a href="comments_photo.php?id=<?php echo $value->id;?>"><?php echo count($count); ?></a></td>
                            </tr>
                            <?php } ?>
            </tbody>
        </table>
                            
                        </div>
                    </div>
                </div>
                       </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
</div>
    

<!-- Footer -->

<?php include("includes/footer.php") ?>