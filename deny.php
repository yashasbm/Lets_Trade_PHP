<?php
/**
 * Created by PhpStorm.
 * User: sacha
 * Date: 5/13/2019
 * Time: 1:10 PM
 */

require_once("config.php");

$rid = $_GET['rid'];
$status = "Denied";

$result = statusUpdate($rid,$status);

if($result){
    header("LOCATION: myAccount.php");
}
?>