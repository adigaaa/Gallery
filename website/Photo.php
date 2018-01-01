<?php include_once("admin/includes/init.php"); ?>
<?php include("includes/header.php") ?>
<?php include("includes/navigation.php") ?>
<?php

        if(empty($_GET["id"])){
            redirect("index.php");
        }
        $pic = Upload::show_by_id($_GET["id"]);
        $users = Users::show_by_id($_SESSION['user_id']);
        //$comments = new Comments();
        if (isset($_POST['post'])) {
          $comments = Comments::Create_Comment($pic->id,$users->username,$_POST['comment']);
          $comments->Create();
          //print_r($comments);
           /* echo "$pic->id";
            echo $users->username;
            echo $_POST['comment'];*/
        }
         $comments_show  = Comments::find_by_id($_GET["id"]); 

        $by = Users::show_by_id($pic->id_user_up);
        print_r($pic->id_user_up);

?>
<div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-12">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>Title : <?php echo $pic->title; ?></h1>
                

                <!-- Author -->
                <p class="lead">
                    by <a href="#"><?php print_r($by->username); ?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 24, 2013 at 9:00 PM</p>

                <hr>
                 
                <!-- Preview Image -->

                <img class="img-responsive" src="<?php echo  "admin".DS.image_dir.DS.$pic->image_name ; ?>" width="1200" alt="" >

                <hr>

                <!-- Post Content -->
                <p class="lead">
                    <?php 
                         echo   $pic->description; 
                    ?>
                </p>

                <hr>

                <!-- Blog Comments -->
                
              
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="post">

                        <div class="form-group">

                            <textarea class="form-control" rows="3" name="comment"></textarea>

                        </div>

                        <input type="submit" name="post" class="btn btn-primary">
                    </form>
                </div>
                
                 <?php 
                 if ($comments_show) {
                    foreach($comments_show as $value) { ?>
                 
                 
                <hr>
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                   
                        <h4 class="media-heading"><?php echo $value->author; ?>
                        </h4>
                        <?php echo $value->body; ?>
                    </div>
                    
                </div>
                    <?php  } } ?>

            </div>

<?php// include("includes/sidebar.php"); ?>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
<?php //include("includes/footer.php"); ?>