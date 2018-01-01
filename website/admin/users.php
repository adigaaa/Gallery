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
                        <a href="add_users.php" class="btn btn-primary">add users</a>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                         <div class="col-md-12">
                            <table class="table table-hover">
            <thead>
                <th>id</th>
                <th>username</th>
                <th>profile picture</th>
                <th>first name</th>
                <th>last name</th>
               
                                    
            </thead>
            <tbody>
            <?php 
                $users = Users::show_all();
                        foreach ($users as $key =>$value) {
                           
                         ?>
                            <tr>
                            <td><?php echo $value->id; ?></td>
                            <td><?php echo $value->username; ?>
                                    <div class="pictures_link">
                                        <a href="Delete_users.php?id=<?php echo $value->id; ?>">Delete</a>
                                        <a href="Edit_users.php?id=<?php echo $value->id; ?>">Edit</a>
                                    </div>
                            </td>
                            <td> <img src="<?php echo $value->get_image();?>" height="400" width="480""></td>
                            <td><?php echo $value->first_name ?></td>
                            <td><?php echo $value->last_name ?></td>
                            
                            
                            
                            
                            <td><?php //echo $value->image_name; ?></td>
                            <td><?php //echo $value->size; ?></td>
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