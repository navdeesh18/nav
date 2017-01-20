<?php
include 'connect.inc.php';
//include 'loginform.inc.php';
ob_start();
session_start();
$current_file=$_SERVER['SCRIPT_NAME'];


if(isset($_SERVER['HTTP_REFERER'])&&!empty($_SERVER['HTTP_REFERER'])){
$http_referer=$_SERVER['HTTP_REFERER'];
}
function loggedin(){
	
	if(isset($_SESSION['user_id'])&& !empty($_SESSION['user_id']) && isset($_COOKIE['user_id'])){
		return true;
	}else{
		return false;
	}
}

function getfield($field) {
	global $link;
	$query ="SELECT `$field` FROM `users` WHERE `id`='".$_SESSION['user_id']."'";
	if($query_run = mysqli_query($link,$query)) {
		if($result = mysqli_fetch_array($query_run)){
			$query_result=$result[0];
			return $query_result;
		}
	}
}
?>