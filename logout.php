<?php
/**
 * Created by PhpStorm.
 * User: sacha
 * Date: 5/11/2019
 * Time: 1:13 AM
 */


session_start();
if (session_destroy()){
    header('Location: index.php');
}
?>