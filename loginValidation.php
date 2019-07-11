<?php
/**
 * Created by PhpStorm.
 * User: sacha
 * Date: 5/10/2019
 * Time: 11:39 PM
 */
session_start();
print_r($_POST);

require_once("config.php");

// Assigning $_POST values to individual variables for reuse.
$email = $_POST['uname'];
$password = $_POST['psw'];

$email = stripcslashes($email);
$password = stripcslashes($password);

$email = trim($email);
$password = trim($password);

$loginValidation = "SELECT * FROM user WHERE EmailAddress = '$email' AND Password = '$password'";
$result = mysqli_query($mysqli,$loginValidation) or die(mysqli_error($mysqli) );
$row = mysqli_num_rows($result);



if($row==1){
    echo "Welcome!";
    $_SESSION['login_user']=$email;
    echo $_SESSION['login_user'];
    header('Location:feed.php');
}
else{
    echo "Check Credientials";
}




?>
