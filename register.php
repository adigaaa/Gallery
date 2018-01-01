<?php 

$connect = mysqli_connect("localhost","root","","m");
if (!$connect) {
		die("error connect");
	}

if (isset($_POST["register"])) {
	$user = $_POST['user'];
	$pass = $_POST['password'];
	$query = "INSERT INTO reg(username,password) VALUES('$user','$pass')";
	$check =  mysqli_query($connect,$query);

	if (!$check) {
		die("error");
	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form action="register.php" method="post">
	
	<input type="text" name="user" />
	<input type="password" name="password" />
	<input type="submit" name="register" />

</form>

</body>
</html>