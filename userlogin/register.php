
<html>
<head>
<link rel="stylesheet" type="text/css" href="index.css" />
<style tpye="text/css">
 form {color:white;}
 #van {padding-bottom:70px;padding-top:50px;padding-left:50px;padding-right:70px}
</style>
</head>
<body id="body1">

<div id="vann">
  <div class="_4"><h1>SignUp:</h1></div>
<?php
include 'core.inc.php';
include 'connect.inc.php';

if(!loggedin()) {

	if(isset($_POST['firstname'])&&isset($_POST['surname'])&&isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['password_again'])) {
		$firstname=$_POST['firstname'];
		$surname=$_POST['surname'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$password_hash=md5('$password');
		$password_again=$_POST['password_again'];



		if(!empty($firstname)&&!empty($surname)&&!empty($username)&&!empty($password)&&!empty($password_again)){
			if(strlen($username)>30 || strlen($firstname)>40 || strlen($surname)>40 ) {
				?><div id="nav"><?php echo 'You have exceded max length';?></div><?php
			}else{
			if($password!=$password_again) {
				?><div id="nav"><?php echo 'Password doesnt match.';?></div><?php
			}else{
				/*if(!isset($_POST['secure'])){

			$_SESSION['secure']= rand(1000,9999);
		}else if($_SESSION['secure']==$_POST['secure']) {*/

				$query="SELECT `username` FROM `users` WHERE `username`='".mysqli_real_escape_string($link,$username)."'";
				$query_run=mysqli_query($link,$query);
				if(mysqli_num_rows($query_run)==1) {
					?><div id="nav"><?php echo 'The username already exists';?></div><?php
				}else {
					$query="INSERT INTO `users` VALUES('','".mysqli_real_escape_string($link,$username)."','".mysqli_real_escape_string($link,$password)."','".mysqli_real_escape_string($link,$firstname)."','".mysqli_real_escape_string($link,$surname)."')";
					if($query_run=mysqli_query($link,$query)){
						header('Location: register_success.php');
					}else {
						?><div id="nav"><?php echo 'Cannot register';?></div><?php
					}
				}
			/*}else {
			echo 'incorrect try again';
			$_SESSION['secure']= rand(1000,9999);
		}*/
		}
	}
		}else {
			?><div id="nav"><?php echo 'Enter all fields';?></div><?php
			}
	}
}
else if(loggedin()){
	?><div id="nav"><?php echo 'You\'re already loggedin';?></div><?php
}
?><form id="form" action="register.php" method="POST">

	<input type='text' name='firstname' placeholder="Firstname" title="firstname" size=10  maxlength="40" value="<?php if(isset($firstname)){ echo $firstname;} ?>"><br><br>
	<input type='text' name='surname' placeholder="Surname" title="surname" size=10 maxlength="40" value="<?php if(isset($surname)){echo $surname; }?>"><br><br>
	<input type='text' name='username'placeholder="Username" title="username"maxlength="30" value="<?php if(isset($username)){echo $username;} ?>"><br><br>
	<input type='password' name='password'placeholder="Password"title="password"><br><br>
	<input type='password' name='password_again'placeholder="re-enter password"><br><br>
	<?php?>
	<br><!--<input type="text" size=10 placeholder="Enter here"title="enter what you see above"name="secure"><br><br><br>-->
	<div class="_6"><input type='submit' value='Register'></div></div>
	</form>

	</body>
</html>
