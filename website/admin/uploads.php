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
                      
                            uploads <small> Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                                                <div class="col-md-6">
                            
                            <form enctype="multipart/form-data" method="post" >

                            <div class="form-group">
                                <input type="text" name="title" class="form-control">
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="file" name="file" >
                            </div>
                            <br>
                                <input type="submit" name="upload" value="Uploads">
                                
                                  </form>

                              <?php 

                                if(isset($_POST["upload"])){
                                    $upload = new Upload();
                                    $upload->title = $_POST["title"];
                                    $user = Users::show_by_id($_SESSION['user_id']);
                                    $file = $_FILES["file"];
                                    if($upload->set_file($file)){
                                        echo "allowed";
                                        
                                        $upload->save_file();
                                        print_r($upload->error);
                                    }else{
                                        echo "Not allowed";
                                    }
                                }

                         ?>

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