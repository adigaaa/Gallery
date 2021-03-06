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
                            Comments <small> Statistics Overview</small>
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
                <th>Author</th>
                <th>body</th>
                <th>Delete</th>
                                    
            </thead>
            <tbody>
            <?php 
                $users = Comments::show_all();
                        foreach ($users as $key =>$value) {
                           
                         ?>
                            <tr>
                            <td><?php echo $value->id; ?></td>
                            <td><?php echo $value->author; ?></td>
                            <td><?php echo $value->body ?></td>
                            
                                <div class="pictures_link">
                                <a href="Delete_comments.php?id=<?php echo $value->id; ?>">Delete</a>
                            </div>
                            </td>
                            
                            <td><?php echo $value->image_name; ?></td>
                            <td><?php echo $value->size; ?></td>
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