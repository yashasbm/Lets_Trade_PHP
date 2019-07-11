<?php
/**
 * Created by PhpStorm.
 * User: sacha
 * Date: 5/13/2019
 * Time: 12:11 AM
 */

require_once("config.php");


$pid=$_GET['pid'];
$remail=$_GET['remail'];
$status = "Pending";

$character_array = array_merge(range(0, 9));
$requestid = "";
for ($i = 0; $i < 4; $i++) {
    $requestid .= $character_array[rand(
        0, (count($character_array) - 1)
    )];
}
$result = sendRequest($pid,$requestid,$remail,$status);
if($remail){
    echo "<script type='text/javascript'>if (confirm('Press a button!')) {
    ".header('LOCATION:feed.php');"
  } else {
  }</script>";
    //header("LOCATION: feed.php");
}
?>


