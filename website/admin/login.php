<?php 
require_once("includes/header.php");
//$session->logout();
if($session->is_login()){
	echo "string";
	redirect("index.php");

}
if(isset($_POST['submit'])){
	 $username = trim($_POST['username']);
	 $password = trim($_POST['password']);
	

 $user_found = Users::verfiy($username,$password);	
	if($user_found){
		$session->login($user_found);
		redirect("index.php");

	}else{
	 echo	$msg = "<h1 class='bg-danger'>The Username or Password is Not Correct</h1>";
	}
}else{
	$username = "";
	$password = "";
	
}
if(isset($_GET['false'])){
 $session->logout();
header("Location:login.php");

}

?>
<div class="col-md-4 col-md-offset-5">
	
<form action="" method="post" >
<div class="form-group">
	<label for="username">Username</label>
	<input type="text" class="form-control" name="username" value="<?php echo htmlentities($username) ?>">
	</div>
<div class="form-group">
	<label for="password">Passowrd</label>
	<input type="password" class="form-control" name="password">

</div>

<div class="form-group">
	<label for="login">Login</label>
	<input type="submit" class="btn btn-primary" value="login" name="submit">


 </div>
</form>


</form>

</div>