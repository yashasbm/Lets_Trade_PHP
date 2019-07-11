<?php
/**
 * Created by PhpStorm.
*/
require_once("config.php");

$pid = $_GET['pid'];

$query = "DELETE FROM allposts WHERE pid = '$pid'";
$res= mysqli_query($mysqli,$query) or die(mysqli_error($mysqli));

$query2 = "DELETE FROM contactrequest WHERE pid = '$pid'";
$res= mysqli_query($mysqli,$query2) or die(mysqli_error($mysqli));

header("Location: myAccount.php");
return $res;

?>