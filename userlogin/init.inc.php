<?php
/*$server="localhost";
$user="root";
$pass="";
$db="url_shortener";
$conn = mysqli_connect($server,$user,$pass,$db);
*/

$link = mysqli_connect("localhost", "root", "navdeesh18", "url_shortener");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

//echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
//echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;



//$path=dirname(__FILE__);
include_once("shortener.inc.php");
include_once("api.inc.php");

?>