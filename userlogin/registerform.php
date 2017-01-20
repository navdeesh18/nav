<html>
<head>
<style type="text/css">
 form {color:;}
 body {background-image:pic.png}
 div {border:3px solid blue;
	  position:absolute;
	  top:100px;
	  left:100px;}
</style>
</head>
<body>
<form action="register.php" method="POST">
	<div>Register:-</div>
	<br><br>firstname:<br><input type='text' name='firstname'  maxlength="40" value="<?php if(isset($firstname)){ echo $firstname;} ?>"><br><br>
	surname:<br><input type='text' name='surname' maxlength="40" value="<?php if(isset($surname)){echo $surname; }?>"><br><br>
	username:<br><input type='text' name='username' maxlength="30" value="<?php if(isset($username)){echo $username;} ?>"><br><br>
	password:<br><input type='password' name='password'><br><br>
	password_again:<br><input type='password' name='password_again'><br><br>
	<input type='submit' value='register'>
	</form>
	</body>
</html>	