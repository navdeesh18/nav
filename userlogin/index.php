<html><head><link rel="stylesheet" type="text/css" href="index.css"/>
<style type="text/css">
a {color:#7EADFC;}
._1 {position:absolute;
	top:10%;
	left:opx;}
</style></head><body><?php
require 'core.inc.php';
include 'connect.inc.php';
if(loggedin()){
	$firstname=getfield('firstname');
	$surname=getfield('surname');
	$id=getfield('id');
	?><div class=""><?php echo "you're logged in, $firstname $surname" ?></div>
	<a href='phpmailer\vendor\vendor\index.php'>send mail</a>
	<div class="_1"><h3><a href='logout.php'>Log out.</a><br /></h3></div><?php
	?><div class="_3"><?php echo '<a href="new.php">open</a><br>'; ?></div><?php
}else{include 'loginform.inc.php';}?></body></html>
