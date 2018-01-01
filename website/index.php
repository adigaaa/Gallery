<?php include("includes/header.php") ?>

<?php  

$page = !empty($_GET['page']) ? $_GET['page'] : 1;

$total_items = Upload::Count();
$items_per_page = 8;
$paginate = new Paginate($total_items,$page,$items_per_page);
print_r($paginate);
$sql = "SELECT * FROM uploads LIMIT {$items_per_page} OFFSET {$paginate->offset()}";
$image = Upload::Set_Query($sql);

 ?>
<!-- Navigation -->
<?php include("includes/navigation.php") ?>
    <!-- Page Content -->

<?php 	//$image = Upload::show_all(); ?>

            <!-- Blog Sidebar Widgets Column -->
            <div class="row">
            	<div class="col-md-12">
            	<div class="thumbnail row">
            		<?php foreach ($image as  $value) {
            			
            		?> 

            		
            			<div class="col-xs-6 col-md-3">
            				<a class="thumbnail" href="photo.php?id=<?php echo $value->id; ?>">
            					<img class="img-responsive home_page_photos" src="admin/<?php echo $value->get_path_files() ?>" height="400" width="400">
            				</a>
            			</div>
            		
            		<?php } ?>
            		</div>
            	</div>
            	
            </div>



<?php //include("includes/sidebar.php"); ?>
        <!-- /.row -->

        <hr>
        <div class="row">
        	<ul class="Pager">
        	<?php 
        		if ($total_items >= 1) {
        			
        			
        			if ($paginate->has_previous()) {
        				echo "<li class='previous'><a href='index.php?page={$paginate->previous()}'>Previous</a></li>";
        			}
        			if ($paginate->has_next()) {
        				echo "<li class='next'><a href='index.php?page={$paginate->next()}'>Next</a></li>";
        			}

        		}

        	?>
        		
        		
        	</ul>
        </div>

        <!-- Footer -->
<?php include("includes/footer.php"); ?>