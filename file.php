<?php 

/*phpinfo();
$a = array(1,2,3,4);
$x =  array_sum($a);
echo "$x";
*/
/*
	echo $path =  __FILE__;
	echo __LINE__;
	echo __DIR__;
	if (is_file($path)) {
		echo "Ture";
	}
	if (is_dir(__DIR__)) {
		echo "Ture";
	}
	if (file_exists($path)) {
		echo "Ture";
	}*/
	if(isset($_POST['upload'])){
	 $file_temp = $_FILES['file']['tmp_name'];
	 $file_name = $_FILES['file']['name'];
	 $dir = 'website';
	 move_uploaded_file($file_temp,$dir.'/'.$file_name);

	}
?>
<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
	<body>
		<form method="post" enctype="multipart/form-data" action="file.php">
			<input type="file" name="file" />
			<input type="submit" name="upload" 	/> 
		</form>
	</body>
	</html>
