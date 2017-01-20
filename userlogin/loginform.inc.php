<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="index.css" />
<style type="text/css">


	a {color:black;
	text-decoration: none;}
	s {font-weight:}

</style>
</head>
<body>
<div id="vann">
	<div class="_4"><h1>Sign In:</h1></div>
<?php
include 'connect.inc.php';

if(isset($_POST['username'])&&isset($_POST['password'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$password_hash=md5('$password');
	if(!empty($username)&&!empty($password)){

        $query ="SELECT `id` FROM `users` WHERE `username`='".mysqli_real_escape_string($link,$username)."' AND `password`='".mysqli_real_escape_string($link,$password)."'";
		if($query_run=mysqli_query($link,$query )){
			$query_num_rows = mysqli_num_rows($query_run);
			if($query_num_rows==0){
				?><div id="nav"><?php echo 'Invalid username/password'; ?></div><?php

			}else if($query_num_rows==1) {
				$id=mysqli_fetch_array($query_run);
				$user_id=$id[0];

				$_SESSION['user_id']=$user_id;


				if(!isset($_POST['checkbox'])){
					setcookie('user_id',$user_id,time()+5);
				}else{
					setcookie('user_id',$user_id,time()+60*5);
				}
				header('Location: index.php');
			}

		}
	}else{

	}
}
?>
<form id="form1"action="<?php echo $current_file; ?>" method="POST">
<input type='text' name='username'placeholder="username"id="input"><br><br><input type='password' id="input"name='password'placeholder="password"><br><br>
<input type="checkbox" name="checkbox"id="checkbox"> Keep me logged in.<br><br>
<div class="_6"><input type='submit' id="input"value='Login'></div>
<br><br><a href="register.php"><h3>Sign Up</h3></a></div>
</form>
</body>
</html>
