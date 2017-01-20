<?php
include 'core.inc.php';
if(loggedin()){
	echo 'logged in yo';
}else{
	header('Location: index.php');
}

?>